<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    public $table='review';
    protected $primarykey ='id';
    protected $fillable= [
        'review_value' ,'review_text','create_update','product_id','user_id'
    ]   ;
    public function product(){
        return $this->belongsTo('App\Models\Product','product_id');
    }
    public function users(){
        return $this->belongsTo('App\Models\Users','user_id');
    
    }
   


}
