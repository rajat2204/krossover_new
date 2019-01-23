<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategories extends Model
{
	protected $table = 'subcategories';
    protected $fillable = ['cat_id','name','slug','status','created_at','updated_at'];

    public static function change($userID,$data){
        $isUpdated = false;
        $table_subcategory = \DB::table('subcategories');
        if(!empty($data)){
            $table_subcategory->where('id','=',$userID);
            $isUpdated = $table_subcategory->update($data); 
        }
        return (bool)$isUpdated;
    }
}
