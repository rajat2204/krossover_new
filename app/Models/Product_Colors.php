<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_Colors extends Model
{
    protected $table = 'product_color';
    protected $fillable = ['product_id', 'color_id','status','created_at','updated_at'];
}
