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

    public function category(){
        return $this->hasOne('App\Models\Category','id','cat_id');
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
            $table_products->where('cat_id',$cat_id);
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
