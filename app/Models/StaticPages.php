<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaticPages extends Model
{
    protected $table = 'static_pages';
    protected $fillable = ['title','slug','description','image','status','created_at','updated_at'];

    public static function change($userID,$data){
        $isUpdated = false;
        $table_pages = \DB::table('static_pages');
        if(!empty($data)){
            $table_pages->where('id','=',$userID);
            $isUpdated = $table_pages->update($data); 
        }
        return (bool)$isUpdated;
    }
}
