<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;
    public $table='publisher';
    protected $primarykey ='id';
    protected $fillable= [
        'name','country'
    ]   ;
    public function product(){
        return $this->hasMany(Product::class ,'publisher_id','id');
    }


}
