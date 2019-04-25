<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sliders extends Model
{
    protected $table = 'sliders';
    protected $fillable = ['product_id','title','text','image','status','created_at','updated_at'];

    public static function change($userID,$data){
        $isUpdated = false;
        $table_slider = \DB::table('sliders');
        if(!empty($data)){
            $table_slider->where('id','=',$userID);
            $isUpdated = $table_slider->update($data); 
        }
        return (bool)$isUpdated;
    }

    public function product(){
        return $this->hasOne('App\Models\products','id','product_id');
    }

    public static function list($fetch='array',$where='',$keys=['*'],$order='id-desc',$limit=''){
        $table_sliders = self::select($keys)
        ->with([
            'product' => function($q){
                $q->select('id','title');
            },
        ]);
        if($where){
            $table_sliders->whereRaw($where);
        }
        if(!empty($cat_id)){
            $table_sliders->where('main_id',$cat_id);
        }
        if(!empty($sub_id)){
            $table_sliders->where('sub_id',$sub_id);
        }
                
        if(!empty($order)){
            $order = explode('-', $order);
            $table_sliders->orderBy($order[0],$order[1]);
        }
        if (!empty($offset)) {
            $table_sliders->offset($offset);
        }
        if (!empty($limit)) {
            $table_sliders->limit($limit);
        }
        if($fetch === 'array'){
            $list = $table_sliders->get();
            return json_decode(json_encode($list ), true );
        }
        elseif($fetch === 'paginate'){
            $list = $table_sliders->paginate(1);
            return json_decode(json_encode($list ), true );
        }else if($fetch === 'obj'){
            return $table_sliders->limit($limit)->get();                
        }else if($fetch === 'single'){
            return $table_sliders->get()->first();
        }else if($fetch === 'count'){
            return $table_sliders->get()->count();
        }else{
            return $table_sliders->limit($limit)->get();
        }
    }
}
