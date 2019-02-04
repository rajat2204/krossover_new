<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'categories';
    protected $fillable = ['image','name','slug','status','created_at','updated_at'];

    public static function change($userID,$data){
        $isUpdated = false;
        $table_category = \DB::table('categories');
        if(!empty($data)){
            $table_category->where('id','=',$userID);
            $isUpdated = $table_category->update($data); 
        }
        return (bool)$isUpdated;
    }
}
