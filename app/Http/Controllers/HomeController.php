<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validations\Validate as Validations;
use App\Http\Controllers\Controller;
use Redirect;
use App\Models\Category;
use App\Models\Subcategories;
use App\Models\Products;
use App\Models\StaticPages;

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

    public function staticPage(Request $request,$slug)
    {
        $data['staticpage'] = _arefy(StaticPages::where('slug',$slug)->first());
        // dd($data['staticpage']);
        $data['view']='front.static';
        return view('front_home',$data);
    }
    
    public function contactUs(Request $request)
    {
        $data['view']='front.contactus';
        return view('front_home',$data);
    }

    // public function termsandConditions(Request $request)
    // {
    //     $data['view']='front.termsandconditions';
    //     return view('front_home',$data);
    // }

    // public function privacyPolicy(Request $request)
    // {
    //     $data['view']='front.privacypolicy';
    //     return view('front_home',$data);
    // }

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

    public function productView(Request $request,$id)
    {
        $data['productdata'] = Products::findOrFail($id);
        $data['category'] = _arefy(Category::where('id',$id)->first());
        // dd($data['category']);
    	$data['view']='front.single-product';
		return view('front_home',$data);
    }

}
