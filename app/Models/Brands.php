<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $table = 'brand';
    protected $fillable = ['category_id','brand_name','slug','status','created_at','updated_at'];

    public static function change($userID,$data){
        $isUpdated = false;
        $table_brand = \DB::table('brand');
        if(!empty($data)){
            $table_brand->where('id','=',$userID);
            $isUpdated = $table_brand->update($data); 
        }
        return (bool)$isUpdated;
    }
}
