<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
	protected $table = 'color';
    protected $fillable = ['color_name','slug','status','created_at','updated_at'];
    
    public static function change($userID,$data){
        $isUpdated = false;
        $table_color = \DB::table('color');
        if(!empty($data)){
            $table_color->where('id','=',$userID);
            $isUpdated = $table_color->update($data); 
        }
        return (bool)$isUpdated;
    }
}
