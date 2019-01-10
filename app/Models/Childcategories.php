<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Childcategories extends Model
{
	protected $table = 'childcategories';
    protected $fillable = ['cat_id','sub_id','name','slug','status','created_at','updated_at'];

    public static function change($userID,$data){
        $isUpdated = false;
        $table_childcategory = \DB::table('childcategories');
        if(!empty($data)){
            $table_childcategory->where('id','=',$userID);
            $isUpdated = $table_childcategory->update($data);
        }
        return (bool)$isUpdated;
    }
}
