<?php

namespace App\Http\Controllers;

use Redirect;
use App\Models\Whyus;
use App\Models\Offers;
use App\Models\Social;
use App\Models\Gallery;
use App\Models\Category;
use App\Models\Products;
use App\Models\ContactUs;
use App\Models\StaticPages;
use Illuminate\Http\Request;
use App\Models\Subcategories;
use App\Http\Controllers\Controller;
use Validations\Validate as Validations;

class HomeController extends Controller
{
	public function __construct(Request $request){
        parent::__construct($request);
    }

    public function index(Request $request){
        $where = 'status = "active"';
        $data['latest_product'] = _arefy(Products::list('array',$where,'','',['*'],'id-desc',8));
        $data['latest_product1'] = _arefy(Products::list('array',$where,'','',['*'],'id-desc',8,8));
        $whereWhyus = 'status = "active"';
        $data['whyus'] = _arefy(Whyus::list('array',$whereWhyus));
        $data['gallery'] = _arefy(Gallery::where('status','active')->get());
        $data['offer'] = _arefy(Offers::where('status','active')->get());
        $data['social'] = _arefy(Social::where('status','active')->get());
    	$data['view']='front.index';
		return view('front_home',$data);
    }

    public function staticPage(Request $request,$slug){
        $data['social'] = _arefy(Social::where('status','active')->get());
        $data['staticpage'] = _arefy(StaticPages::where('slug',$slug)->first());
        $data['view']='front.static';
        return view('front_home',$data);
    }
    
    public function contactUs(Request $request){
        $data['social'] = _arefy(Social::where('status','active')->get());
        $data['title'] = 'Contact Us';
        $data['view']='front.contactus';
        return view('front_home',$data);
    }

    public function contactUsForm(Request $request){
        $validation = new Validations($request);
        $validator  = $validation->createContactUs();
        if($validator->fails()){
            $this->message = $validator->errors();
        }else{
            $data['name']               =!empty($request->name)?$request->name:'';
            $data['email']              =!empty($request->email)?$request->email:'';
            $data['subject']             =!empty($request->subject)?$request->subject:'';
            $data['message']           =!empty($request->message)?$request->message:'';
            
            $inserId = ContactUs::add($data);
            if($inserId){
               $emailData               = ___email_settings();
               $emailData['name']       = !empty($request->name)?$request->name:'';
               $emailData['email']      = !empty($request->email)?$request->email:'';
               $emailData['subject']    = !empty($request->subject)?$request->subject:'';
               $emailData['message']    = !empty($request->message)?$request->message:'';
               $emailData['date']       = date('Y-m-d H:i:s');

               $emailData['custom_text'] = 'Your Enquiry has been submitted successfully';
               ___mail_sender($emailData['email'],$request->name,"enquiry_email",$emailData);

                $this->status   = true;
                $this->modal    = true;
                $this->alert    = true;
                $this->message  = "Enquiry has been submitted successfully.";
                $this->redirect = url('/');
            } 
        } 
        return $this->populateresponse();
    }

    public function category(Request $request,$type,$slug)
    {
        $data['offer'] = _arefy(Offers::where('status','active')->get());
        $data['social'] = _arefy(Social::where('status','active')->get());
        $data['view']='front.category';
        $data['type'] = $type;
        $cat_id='';
        $sub_id='';
        if($type == 'sub'){
            $data['cats'] = _arefy(Subcategories::where('slug',$slug)->first());
            $sub_id = $data['cats']['id'];
            $data['subcatid'] = $sub_id;
            $data['cat']=$data['cats']['cat_id'];
            $data['lowPrice'] = Products::where('status','active')->where('sub_id',$sub_id)
                ->orderBy('price','asc')
                ->first();
            $data['highPrice'] = Products::where('status','active')->where('sub_id', $sub_id)
                ->orderBy('price','desc')
                ->first();
        }else{
            $data['cats'] = _arefy(Category::where('slug',$slug)->first());
            $cat_id = $data['cats']['id'];
            $data['cat']=$cat_id;
            $data['cats']['cat_id']=$cat_id;
            $data['lowPrice'] = Products::where('status','active')->where('main_id',$cat_id)
                ->orderBy('price','asc')
                ->first();
            $data['highPrice'] = Products::where('status','active')->where('main_id', $cat_id)
                ->orderBy('price','desc')
                ->first();
        }
        
        $where = 'status = "active"';
        $data['product'] = _arefy(Products::list('paginate',$where,$cat_id,$sub_id));
		return view('front_home',$data);
    }

    public function ajaxProduct(Request $request,$type,$slug)
    {
        $data['social'] = _arefy(Social::where('status','active')->get());
        $data['products'] = Products::where('status','active')->where('main_id', $request->catId);
        if(!empty($request->subcatid)){
            $data['products']->where('sub_id',$request->subcatid);
        }
        if(!empty($request->brandid) && ($request->brandid!='all')){
            $data['products']->where('brand_id',$request->brandid);
        }
        if (!empty($request->minPrice) && ($request->maxPrice)){
            $data['products']->whereBetween('price', array($request->minPrice, $request->maxPrice));
        }
        $data['products']->orderBy('created_at','asc');
        $data['products']->take(9);
        $data['product'] = $data['products']->get();
        $html = view('front.ajaxcategoryProduct',$data);
        return Response($html);
    }

    public function productView(Request $request,$id){
        $data['offer'] = _arefy(Offers::where('status','active')->get());
        $data['social'] = _arefy(Social::where('status','active')->get());
        $data['productdata'] = Products::findOrFail($id);
        $data['category'] = _arefy(Category::where('id',$id)->first());
    	$data['view']='front.single-product';
		return view('front_home',$data);
    }
}
