<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validations\Validate as Validations;
use App\Http\Controllers\Controller;
use Redirect;
use App\Models\Category;
use App\Models\Subcategories;
use App\Models\Products;

class HomeController extends Controller
{
	public function __construct(Request $request){

        parent::__construct($request);
        
    }

    public function index(Request $request)
    {
    	$data['view']='front.index';
		return view('front_home',$data);
    }
    public function category(Request $request,$type,$slug)
    {
      
    	$data['view']='front.category';
        $cat_id='';
        $sub_id='';
        if($type == 'sub'){
            $data['sub_cat'] = _arefy(Subcategories::where('slug',$slug)->first());
            $sub_id = $data['sub_cat']['id'];
            $data['cat']=$data['sub_cat']['cat_id'];
            // dd($sub_id);
        }else{

            $data['cat'] = _arefy(Category::where('slug',$slug)->first());
            $cat_id = $data['cat']['id'];
            $data['cat']=$cat_id;
            // dd($cat_id);
        }

        $where = 'status = "active"';
        $data['product'] = _arefy(Products::list('array',$where,$cat_id,$sub_id));
        $product = \App\Models\Products::paginate(15);
		return view('front_home',$data);
    }

    public function productView(Request $request,$slug)
    {
    	$data['view']='front.single-product';
		return view('front_home',$data);
    }

}
