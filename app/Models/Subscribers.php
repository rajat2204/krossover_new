<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscribers extends Model
{
	protected $table = 'subscribers';
	protected $fillable = ['EMAIL','status','created_at','updated_at'];

	public static function add($data){
        if(!empty($data)){
            return self::insertGetId($data);
        }else{
            return false;
        }   
    }

    public static function change($userID,$data){
        $isUpdated = false;
        $table_subscriber = \DB::table('subscribers');
        if(!empty($data)){
            $table_subscriber->where('id','=',$userID);
            $isUpdated = $table_subscriber->update($data); 
        }
        return (bool)$isUpdated;
    }
}
