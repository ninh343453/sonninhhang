@include('product.layout')
@extends('clien.layout.index')
@section('content')
    <h2 class="list-product-title">NEW FOOD</h2>

    <div class="list-product-subtitle">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <p>List New Food</p>
        <style>
            .square-image {
                width: 277px;
                height: 277px;
                object-fit: cover;
            }
        </style>

        <div class="product-group">

            <div class="row">


                @foreach ($products as $product)
                    <div class="col-xs-18 col-sm-6 col-md-4" style="margin-top:10px; max-width: 297px;">
                        <div class="img_thumbnail productlist">
                            <img class="images square-image" src="{{ asset('image/product/' . $product->image[0]->image) }}"
                                alt="">
                            <div class="caption">
                                <h4>{{ $product->name }}</h4>
                                <strong>Category:</strong>
                                @foreach ($product->category as $category)
                                    <a href="#"> {{ $category->name }}</a>
                                @endforeach
                                <p><strong>Price: </strong> ${{ $product->price }}</p>

                                <p class="purchase-info"><a href="{{ route('home.show', $product->id) }}"
                                        class="btn btn-primary btn-block text-center" role="button">View Detail</a> </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
