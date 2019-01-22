<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
	protected $table = 'clients';
    protected $fillable = ['title','image','status','created_at','updated_at'];

    public static function change($userID,$data){
        $isUpdated = false;
        $table_client = \DB::table('clients');
        if(!empty($data)){
            $table_client->where('id','=',$userID);
            $isUpdated = $table_client->update($data); 
        }
        return (bool)$isUpdated;
    }
}
