<?php

namespace App\Http\Controllers;

use Redirect;
use App\Models\Products;
use App\Models\Category;
use App\Models\StaticPages;
use App\Models\Subcategories;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validations\Validate as Validations;

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
        // $id = ___decrypt($id);
        $data['title'] = 'Contact Us';
        // dd($data['contactus']);
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
