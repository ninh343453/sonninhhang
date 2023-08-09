<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $table = 'product';
    protected $primarykey = 'id';

    protected $fillable = [
        'name', 'price', 'description', 'publisher_id'
    ];
    public function publisher()
    {
        return $this->belongsTo('App\Models\Publisher', 'publisher_id');
    }
    public function image()
    {
        return $this->hasMany(Image::class, 'product_id', 'id');
    }
    public function _cart_product()
    {
        return $this->hasMany('App\Models\CartProduct');
    }
    public function category()
    {
        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id');
    }

    public function _order_product()
    {
        return $this->hasMany('App\Models\OrderProduct');
    }
    public function _review()
    {
        return $this->hasMany('App\Models\Review');
    }
}
