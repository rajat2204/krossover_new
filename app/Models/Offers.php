<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    protected $table = 'offer';
    protected $fillable = ['text','name','image','status','created_at','updated_at'];

    public static function change($userID,$data){
        $isUpdated = false;
        $table_offer = \DB::table('offer');
        if(!empty($data)){
            $table_offer->where('id','=',$userID);
            $isUpdated = $table_offer->update($data); 
        }
        return (bool)$isUpdated;
    }
}
