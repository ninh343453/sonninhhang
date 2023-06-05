<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    public $table='image';
    protected $primarykey ='id';
    protected $fillable= [
        'fileName'
    ]   ;
    public function product(){
        return $this->belongsTo('App\Models\Product','product_id');
    }
    
}
