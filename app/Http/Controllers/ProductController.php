<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use App\Models\Publisher;

class ProductController extends Controller
{
    public function home()
    {
        $products = Product::latest()->paginate(20);

        return view('product.home', compact('products'))

            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    public function index()
    {
        $products = Product::latest()->paginate(20);
        return view('product.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 20);
    }
    public function admin()
    {
        return view('admin.home');
    }
    public function create()
    {
        $publishers = Publisher::all();
        $categories = Category::all();
        return view('product.create', ['publishers' => $publishers, 'categories' => $categories]);
    }

    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'price' => 'required',
                'description' => 'required',
                'image.*' => 'required|image|mimes:jpg,jpeg,png|max:100000',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            // Tạo mới sản phẩm và lưu thông tin sản phẩm vào cơ sở dữ liệu
            $newProduct = new Product();
            $newProduct->name = $request->name;
            $newProduct->price = $request->price;
            $newProduct->description = $request->description;
            $newProduct->publisher_id = $request->publisher;
            $newProduct->save();

            // Lưu các hình ảnh liên quan đến sản phẩm vào cơ sở dữ liệu
            if ($request->hasfile('image')) {
                $productImages = [];
                $images = $request->file('image');
                foreach ($images as $image) {
                    $path = public_path('image/product');
                    $image_name = time() . '_' . $image->getClientOriginalName();
                    $image->move($path, $image_name);
                    $productImages[] = $image_name;

                    // Tạo mới đối tượng Image và lưu thông tin hình ảnh vào cơ sở dữ liệu
                    $newProductImage = new Image();
                    $newProductImage->image = $image_name;
                    $newProductImage->product()->associate($newProduct);
                    $newProductImage->save();
                }
            } else {
                $image_name = 'noname.jpg';
            }

            // Thực hiện chuyển hướng sau khi lưu thành công
            return redirect()->route('product.index')
                ->with('success', 'Product added successfully.');
        }
    }

    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('product.show', compact('product'));
    }
    public function edit($id)
    {
        $publishers = Publisher::all();

        $product = Product::with('publisher')->find($id);
        $publishers = Publisher::all();
        $categories = Category::all();
        return view('product.edit', ['product' => $product, 'publishers' => $publishers, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image.*' => 'image|mimes:jpg,jpeg,png|max:100000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Find the existing product
        $product = Product::findOrFail($id);

        // Check if new images were uploaded
        if ($request->hasfile('image')) {
            $Product_Images = [];

            // Remove existing images from the server
            foreach ($product->image as $image) {
                $imagePath = public_path('image/product') . '/' . $image->image;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $images = $request->file('image');
            foreach ($images as $image) {
                $path = public_path('image/product');
                $image_name = time() . '_' . $image->getClientOriginalName();
                $image->move($path, $image_name);
                $Product_Images[] = $image_name;
            }
        } else {
            // No new images uploaded, retain the existing images
            $Product_Images = $product->images->pluck('image')->toArray();
        }

        // Update the product attributes
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->publisher_id = $request->publisher;
        $product->save();

        // Update the product categories (assuming the relationship is defined properly)
        $product->category()->sync($request->input('categories'));

        // Update the product images
        if ($request->hasfile('image')) {
            $product->image()->delete(); // Delete existing images from the database
            foreach ($Product_Images as $image) {
                $newProductImage = new Image();
                $newProductImage->image = $image;
                $newProductImage->product_id = $product->id;
                $newProductImage->save();
            }
        }

        return redirect()->route('product.index')
            ->with('success', 'Product updated successfully.');
    }






    public function destroy($id)
    {
        // Find the existing product
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('product.index')
                ->with('error', 'Product not found.');
        }

        // Detach the product from all categories in the pivot table
        $product->category()->detach();

        // Delete the images related to the product from the server and the database
        foreach ($product->image as $image) {
            $imagePath = public_path('image/product') . '/' . $image->image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $image->delete();
        }

        // Now you can safely delete the product
        $product->delete();

        return redirect()->route('product.index')
            ->with('success', 'Product deleted successfully');
    }
}
