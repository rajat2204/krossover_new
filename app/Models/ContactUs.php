<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = 'contactus';
    protected $fillable = ['name','email','subject','message','created_at','updated_at'];

    public static function add($data){
        if(!empty($data)){
            return self::insertGetId($data);
        }else{
            return false;
        }   
    }

    public static function change($userID,$data){
        $isUpdated = false;
        $table_contactus = \DB::table('contactus');
        if(!empty($data)){
            $table_contactus->where('id','=',$userID);
            $isUpdated = $table_contactus->update($data); 
        }
        return (bool)$isUpdated;
    }
}
