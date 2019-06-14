<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = ['title','code','main_id','sub_id','brand_id','description','dimensions','price','previous_price','stock','sizes','feature_image','policy','featured','latest','views','approved','status','created_at','updated_at'];

    public static function change($userID,$data){
        $isUpdated = false;
        $table_products = \DB::table('products');
        if(!empty($data)){
            $table_products->where('id','=',$userID);
            $isUpdated = $table_products->update($data); 
        }
        return (bool)$isUpdated;
    }

    public function category(){
        return $this->hasOne('App\Models\Category','id','main_id');
    }

    public function subcategory()
    {
        return $this->hasOne('App\Models\Subcategories','id','sub_id');  
    }

    public function productColor()
    {
        return $this->hasMany('App\Models\Product_Colors','product_id','id');  
    }

    public static function list($fetch='array',$where='',$cat_id='',$sub_id='',$keys=['*'],$order='id-desc',$limit='',$offset=''){
        $table_products = self::select($keys)
        ->with([
            'category' => function($q){
                $q->select('id','name');
            },
            'subcategory' => function($q){
                $q->select('id','name');
            },
            'productColor' => function($q){
                $q->select('id','color_id','product_id');
            },
        ]);
        if($where){
            $table_products->whereRaw($where);
        }
        if(!empty($cat_id)){
            $table_products->where('main_id',$cat_id);
        }
        if(!empty($sub_id)){
            $table_products->where('sub_id',$sub_id);
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
