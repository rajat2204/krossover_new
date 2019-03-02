<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $table = 'enquiry';
    protected $fillable = ['product_id','quantity','name','email','mobile','created_at','updated_at'];

    public static function add($data){
        if(!empty($data)){
            return self::insertGetId($data);
        }else{
            return false;
        }   
    }

    public static function change($userID,$data){
        $isUpdated = false;
        $table_enquiry = \DB::table('enquiry');
        if(!empty($data)){
            $table_enquiry->where('id','=',$userID);
            $isUpdated = $table_enquiry->update($data); 
        }
        return (bool)$isUpdated;
    }

    public function product()
    {
        return $this->hasOne('App\Models\Products','id','product_id');  
    }

    public static function list($fetch='array',$where='',$keys=['*'],$order='id-desc',$limit=''){
        $table_products = self::select($keys)
        ->with([
            'product' => function($q){
                $q->select('id','title','feature_image');
            },
        ]);
        if($where){
            $table_products->whereRaw($where);
        }
                
        if(!empty($order)){
            $order = explode('-', $order);
            $table_products->orderBy($order[0],$order[1]);
        }
        if (!empty($offset)) {
            $table_products->offset($offset);
        }
        if (!empty($limit)) {
            $table_products->limit($limit);
        }
        if($fetch === 'array'){
            $list = $table_products->get();
            return json_decode(json_encode($list ), true );
        }
        elseif($fetch === 'paginate'){
            $list = $table_products->paginate(1);
            return json_decode(json_encode($list ), true );
        }else if($fetch === 'obj'){
            return $table_products->limit($limit)->get();                
        }else if($fetch === 'single'){
            return $table_products->get()->first();
        }else if($fetch === 'count'){
            return $table_products->get()->count();
        }else{
            return $table_products->limit($limit)->get();
        }
    }
}
