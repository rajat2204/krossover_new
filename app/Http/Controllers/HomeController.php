<?php

namespace App\Http\Controllers;

use Redirect;
use App\Models\Whyus;
use App\Models\Offers;
use App\Models\Social;
use App\Models\Gallery;
use App\Models\Clients;
use App\Models\Enquiry;
use App\Models\Sliders;
use App\Models\Category;
use App\Models\Products;
use App\Models\ContactUs;
use App\Models\Subscribers;
use App\Models\StaticPages;
use App\Models\ContactAddress;
use Illuminate\Http\Request;
use App\Models\Subcategories;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
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
        $data['slider'] = _arefy(Sliders::where('status','active')->get());
        $data['categories'] = _arefy(Category::where('status','active')->get());
        $data['contact'] = _arefy(ContactAddress::where('status','active')->get());
    	$data['view']='front.index';
		return view('front_home',$data);
    }

    public function staticPage(Request $request,$slug){
        $data['social'] = _arefy(Social::where('status','active')->get());
        $data['contact'] = _arefy(ContactAddress::where('status','active')->get());
        $data['staticpage'] = _arefy(StaticPages::where('slug',$slug)->first());
        $data['view']='front.static';
        return view('front_home',$data);
    }

    public function catalogePage(Request $request){
        $data['view']='front.static';
        return view('pdf-flipbook/index',$data);
        
    }

    public function whyUs(Request $request){
        $data['social'] = _arefy(Social::where('status','active')->get());
        $data['contact'] = _arefy(ContactAddress::where('status','active')->get());
        $data['whyus'] = _arefy(Whyus::where('status','active')->get());
        $data['client'] = _arefy(Clients::where('status','active')->get());
        $data['view']='front.whyus';
        return view('front_home',$data);
    }
    
    public function contactUs(Request $request){
        $data['contact'] = _arefy(ContactAddress::where('status','active')->get());
        $data['social'] = _arefy(Social::where('status','active')->get());
        $data['title'] = 'Contact Us';
        $data['view']='front.contactus';
        return view('front_home',$data);
    }

    public function category(Request $request,Builder $builder,$type,$slug){
        $data['contact'] = _arefy(ContactAddress::where('status','active')->get());
        $data['offer'] = _arefy(Offers::where('status','active')->get());
        $data['social'] = _arefy(Social::where('status','active')->get());
        $data['view']='front.category';
        $data['type'] = $type;
        $cat_id='';
        $sub_id='';
        if($type == 'main'){
            $data['cats'] = _arefy(Category::where('slug',$slug)->first());
            $cat_id = $data['cats']['id'];
            $data['cat']=$cat_id;
            $data['cats']['cat_id']=$cat_id;
            // $data['lowPrice'] = Products::where('status','active')->where('main_id',$cat_id)
            //     ->orderBy('price','asc')
            //     ->first();
            // $data['highPrice'] = Products::where('status','active')->where('main_id', $cat_id)
            //     ->orderBy('price','desc')
            //     ->first();
        }
        
        $where = 'main_id ="'.$cat_id.'"';
        $where .= ' AND status != "trashed"';
        $data['product']=[];

        if(!empty($request->sub_cat_filter)){
            if($request->sub_cat_filter!="all"){
                $where .= 'AND sub_id ="'.$request->sub_cat_filter.'"';
            }
        }

        // if(!empty($request->min_price)){
        //     $where .= 'AND price BETWEEN "'.$request->min_price.'" AND "'.$request->max_price.'"';
        // }
        $product  = _arefy(Products::list('array',$where));
        if ($request->ajax()) {
            return DataTables::of($product)
            ->editColumn('status',function($item){
                return ucfirst($item['status']);
            })
             ->editColumn('title',function($item){
                return ucfirst($item['title']);
            })
            // ->editColumn('price',function($item){
            //     return '$'. ucfirst($item['price']);
            // })
            // ->editColumn('previous_price',function($item){
            //     return '<strike>'.'$'. ucfirst($item['previous_price']).'</strike>';
            // })
             ->editColumn('feature_image',function($item){
                $pathUrl = url("product/".___encrypt($item['id']));
                $imageurl = asset("assets/images/products/".$item['feature_image']);
                return '<a href="'.$pathUrl.'"><img src="'.$imageurl.'" height="60px" width="80px"></a>';
            })
            ->rawColumns(['feature_image', 'action'])
            ->make(true);
        }

        $data['html'] = $builder
            ->parameters([ 
                "dom" => "<'row' <'col-md-6 col-sm-12 col-xs-4'l><'col-md-6 col-sm-12 col-xs-4'f>><'row' <'col-md-12'p>><'row filter'><'row white_box_wrapper database_table table-responsive'rt><'row' <'col-md-12'i>>",
                "pageLength"=> 6, "aLengthMenu"=> [[6, 24, 48, -1], [6, 24, 48, "All"]], "iDisplayLength"=> 6,"example"=>"My Custom Message On Empty Table","searching"=> false,
    
            ])
            ->addColumn(['data' => 'feature_image', 'name' => 'image',"render"=>'data','title' => 'Image','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'title', 'name' => 'title','title' => 'Product Title','orderable' => false, 'width' => 120])
            // ->addColumn(['data' => 'price','name' => 'price','title' => 'Price','orderable' => false, 'width' => 120])
            // ->addColumn(['data' => 'previous_price','name' => 'previous_price',"render"=>'data','title' => 'Previous Price','orderable' => false, 'width' => 120])
            ->addAction(['title' => '', 'orderable' => false, 'width' => 120]);
        
        return view('front_home')->with($data);
    }

    public function productView(Request $request,$id){
        $id = ___decrypt($id);
        $data['contact'] = _arefy(ContactAddress::where('status','active')->get());
        $data['offer'] = _arefy(Offers::where('status','active')->get());
        $data['social'] = _arefy(Social::where('status','active')->get());
        $data['productdata'] = Products::findOrFail($id);
        $data['category'] = _arefy(Category::where('id',$id)->first());
        $data['view']='front.single-product';
        return view('front_home',$data);
    }

    public function search(Request $request){
        $data['products'] = _arefy(Products::where('title', 'like', '%'.$request->item.'%')->where('status', 'active')->get());
        $data['searchkey'] = $request->item;
        if ($data['searchkey'] == NULL) {
            $data['products'] = _arefy(Products::where('status', 'active')->get());
        }
        $html = view('front.suggestion',$data);
        return Response($html);
    }

    public function contactUsForm(Request $request){
        $validation = new Validations($request);
        $validator  = $validation->createContactUs();
        if($validator->fails()){
            $this->message = $validator->errors();
        }else{
            $data['name']               =!empty($request->name)?$request->name:'';
            $data['email']              =!empty($request->email)?$request->email:'';
            $data['subject']            =!empty($request->subject)?$request->subject:'';
            $data['message']            =!empty($request->message)?$request->message:'';
            
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
                $this->redirect = url('/contactus');
            } 
        } 
        return $this->populateresponse();
    }

    public function productEnquiry(Request $request){
        $validation = new Validations($request);
        $validator  = $validation->productenquiry();
        if ($validator->fails()) {
            $this->message = $validator->errors();
        }else{
            $data['product_id']          =!empty($request->product_id)?$request->product_id:'';
            $data['name']                =!empty($request->name)?$request->name:'';
            $data['email']               =!empty($request->email)?$request->email:'';
            $data['mobile']              =!empty($request->mobile)?$request->mobile:'';
            $data['quantity']            =!empty($request->quantity)?$request->quantity:'';
            $data['created_at']          = date('Y-m-d H:i:s');
            $data['updated_at']          = date('Y-m-d H:i:s');

            $enquiry = Enquiry::add($data);

            if($enquiry){
               $emailData               = ___email_settings();
               $emailData['name']       = !empty($request->name)?$request->name:'';
               $emailData['email']      = !empty($request->email)?$request->email:'';
               $emailData['mobile']     = !empty($request->mobile)?$request->mobile:'';
               $emailData['date']       = date('Y-m-d H:i:s');

               $emailData['custom_text'] = 'Your Product Enquiry has been submitted successfully';
               ___mail_sender($emailData['email'],$request->name,"product_enquiry_email",$emailData);

               $emailAdmin                  = ___email_settings();
               $emailAdmin['name']          = !empty($request->name)?$request->name:'';
               $emailAdmin['email_admin']   = !empty($request->email_admin)?$request->email_admin:'';
               $emailAdmin['email']         = 'preeti.igniterpro@gmail.com';
               $emailAdmin['mobile']        = !empty($request->mobile)?$request->mobile:'';
               $emailAdmin['quantity']      = !empty($request->quantity)?$request->quantity:'';
               $emailAdmin['date']          = date('Y-m-d H:i:s');

               $emailAdmin['custom_text'] = 'Your Product Enquiry has been submitted successfully';
               ___mail_sender($emailAdmin['email'],$request->name,"product_enquiry_email_admin",$emailAdmin);

                $this->status   = true;
                $this->modal    = true;
                $this->alert    = true;
                $this->message  = "Product Enquiry has been submitted successfully.";
                $this->redirect = url('/');
            }
        }
        return $this->populateresponse();    
    }

    public function Subscribe(Request $request){
        $validation = new Validations($request);
        $validator  = $validation->subscriber();
        if ($validator->fails()) {
            $this->message = $validator->errors();
        }else{
            $data['EMAIL']               = !empty($request->EMAIL)?$request->EMAIL:'';
            $data['created_at']          = date('Y-m-d H:i:s');
            $data['updated_at']          = date('Y-m-d H:i:s');

            $subscribe = Subscribers::add($data);

            if($subscribe){
            $emailData               = ___email_settings();
            $emailData['EMAIL']      = !empty($request->EMAIL)?$request->EMAIL:'';
            $emailData['date']       = date('Y-m-d H:i:s');

            $emailData['custom_text'] = 'You are subscribed successfully';
            ___mail_sender($emailData['EMAIL'],$request->date,"subscription",$emailData);

            $this->status   = true;
            $this->modal    = true;
            $this->alert    = true;
            $this->message  = "You are subscribed successfully.";
            $this->redirect = url('/');
            }
        }
        return $this->populateresponse();
    }
}

