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
use App\Models\StaticPages;
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
        $data['client'] = _arefy(Clients::where('status','active')->get());
        
        
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

    public function category(Request $request,Builder $builder,$type,$slug){
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
        
        $where = 'main_id ="'.$cat_id.'"';
        $where .= ' AND status != "trashed"';
        $data['product']=[];
        if(!empty($request->sub_cat_filter)){
            $where .= 'AND sub_id ="'.$request->sub_cat_filter.'"';
        }

        if(!empty($request->min_price)){
            $where .= 'AND price BETWEEN "'.$request->min_price.'" AND "'.$request->max_price.'"';
        }
        $product  = _arefy(Products::list('array',$where));
        if ($request->ajax()) {
            //pp($request->sub_cat_filter);
            return DataTables::of($product)
            ->editColumn('status',function($item){
                return ucfirst($item['status']);
            })
             ->editColumn('title',function($item){
                return ucfirst($item['title']);
            })
            ->editColumn('price',function($item){
                return '$'. ucfirst($item['price']);
            })
            ->editColumn('previous_price',function($item){
                return '<strike>'.'$'. ucfirst($item['previous_price']).'</strike>';
            })
             ->editColumn('feature_image',function($item){
                $pathUrl = url("product/".$item['id']);
                $imageurl = asset("assets/images/products/".$item['feature_image']);
                return '<a href="'.$pathUrl.'"><img src="'.$imageurl.'" height="60px" width="80px"></a>';
            })
            ->rawColumns(['previous_price', 'feature_image', 'action'])
            ->make(true);
        }

        $data['html'] = $builder

            ->parameters([ 
                "dom" => "<'row' <'col-md-6 col-sm-12 col-xs-4'l><'col-md-6 col-sm-12 col-xs-4'f>><'row' <'col-md-12'p>><'row filter'><'row white_box_wrapper database_table table-responsive'rt><'row' <'col-md-12'i>>",
                "pageLength"=> 6, "aLengthMenu"=> [[6, 24, 48, -1], [6, 24, 48, "All"]], "iDisplayLength"=> 6, 
                "example"=>"My Custom Message On Empty Table",
    
            ])
            ->addColumn(['data' => 'feature_image', 'name' => 'image',"render"=>'data','title' => 'Image','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'title', 'name' => 'title','title' => 'Product Title','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'price','name' => 'price','title' => 'Price','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'previous_price','name' => 'previous_price',"render"=>'data','title' => 'Previous Price','orderable' => false, 'width' => 120])
            ->addAction(['title' => '', 'orderable' => false, 'width' => 120]);
        
        return view('front_home')->with($data);
    }

    /*public function ajaxProduct(Request $request,$type,$slug){
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
    }*/

    public function productView(Request $request,$id){
        $data['offer'] = _arefy(Offers::where('status','active')->get());
        $data['social'] = _arefy(Social::where('status','active')->get());
        $data['productdata'] = Products::findOrFail($id);
        $data['category'] = _arefy(Category::where('id',$id)->first());
        $data['view']='front.single-product';
        return view('front_home',$data);
    }

    public function search(Request $request){
        $data['products'] = Products::where('title', 'like', '%'.$request->item.'%')->where('status', 'active')->get();
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

                $this->status   = true;
                $this->modal    = true;
                $this->alert    = true;
                $this->message  = "Product Enquiry has been submitted successfully.";
                $this->redirect = url('/');
            }
        }
        return $this->populateresponse();    
    }
}

