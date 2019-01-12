<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = ['title','main_id','sub_id','description','price','previous_price','retailer_price','retailer_previous_price','stock','sizes','feature_image','policy','featured','views','approved','status','created_at','updated_at'];
}
