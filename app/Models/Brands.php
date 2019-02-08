<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $table = 'brand';
    protected $fillable = ['category_id','brand_name','slug','status','created_at','updated_at'];

    public static function change($userID,$data){
        $isUpdated = false;
        $table_brand = \DB::table('brand');
        if(!empty($data)){
            $table_brand->where('id','=',$userID);
            $isUpdated = $table_brand->update($data); 
        }
        return (bool)$isUpdated;
    }

    public function category(){
        return $this->hasOne('App\Models\Category','id','category_id');
    }

    public static function list($fetch='array',$where='',$cat_id='',$sub_id='',$keys=['*'],$order='id-desc'){
        $table_products = self::select($keys)
        ->with([
            'category' => function($q){
                $q->select('id','name');
            },
        ]);
        if($where){
            $table_products->whereRaw($where);
        }
        if(!empty($cat_id)){
            $table_products->where('category_id',$cat_id);
        }
                
        if(!empty($order)){
            $order = explode('-', $order);
            $table_products->orderBy($order[0],$order[1]);
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
