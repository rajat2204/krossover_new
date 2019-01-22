<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Whyus extends Model
{
    protected $table = 'whyus';
    protected $fillable = ['image','title','description','status','created_at','updated_at'];

    public static function list($fetch='array',$where='',$cat_id='',$sub_id='',$keys=['*'],$order='id-desc'){
        $table_whyus = self::select($keys);

        if($where){
            $table_whyus->whereRaw($where);
        }
                
        if(!empty($order)){
            $order = explode('-', $order);
            $table_whyus->orderBy($order[0],$order[1]);
        }
        if($fetch === 'array'){
            $list = $table_whyus->get();
            return json_decode(json_encode($list ), true );
        }else if($fetch === 'obj'){
            return $table_whyus->limit($limit)->get();                
        }else if($fetch === 'single'){
            return $table_whyus->get()->first();
        }else if($fetch === 'count'){
            return $table_whyus->get()->count();
        }else{
            return $table_whyus->limit($limit)->get();
        }
    }
}
