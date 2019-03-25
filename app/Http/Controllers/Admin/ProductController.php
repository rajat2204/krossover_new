<?php

namespace App\Http\Controllers\Admin;

use App\Models\Colors;
use App\Models\Brands;
use App\Models\Products;
use App\Models\Product_Gallery;
use App\Models\Category;
use App\Models\Subcategories;
use App\Models\Product_Colors;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Validations\Validate as Validations;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function index(Request $request, Builder $builder){
        $data['view'] = 'admin.productlist';
        
        $where = 'status != "trashed"';
        $product  = _arefy(Products::list('array',$where));
        
        if ($request->ajax()) {
            return DataTables::of($product)
            ->editColumn('action',function($item){
                $html    = '<div class="edit_details_box">';
                $html   .= '<a href="'.url(sprintf('admin/products/%s/edit',___encrypt($item['id']))).'"  title="Edit Detail"><i class="fa fa-edit"></i></a> | ';
                $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/products/status/?id=%s&status=trashed',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('assets/images/delete.png').'"
                        data-ask="Would you like to Delete?" title="Delete"><i class="fa fa-fw fa-trash"></i></a> | ';
                if($item['status'] == 'active'){
                    $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/products/status/?id=%s&status=inactive',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('assets/images/inactive-user.png').'"
                        data-ask="Would you like to change '.$item['title'].' status from Active to Inactive?" title="Update Status"><i class="fa fa-fw fa-ban"></i></a>';
                }elseif($item['status'] == 'inactive'){
                    $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/products/status/?id=%s&status=active',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('assets/images/active-user.png').'"
                        data-ask="Would you like to change '.$item['title'].' status from Inactive to Active?" title="Update Status"><i class="fa fa-fw fa-check"></i></a>';
                }
                $html   .= '</div>';
                                
                return $html;
            })
            ->editColumn('status',function($item){
                return ucfirst($item['status']);
            })
            ->editColumn('title',function($item){
                return ucfirst($item['title']);
            })
            ->editColumn('code',function($item){
                if(!empty($item['code'])){
                    return ucfirst($item['code']);
                }
                else{
                    return 'N/A';
                }
            })
            ->editColumn('main_id',function($item){
                return ucfirst($item['category']['name']);
            })
            ->editColumn('sub_id',function($item){
                return ucfirst($item['subcategory']['name']);
            })
            ->editColumn('feature_image',function($item){
                $imageurl = asset("assets/images/products/".$item['feature_image']);
                return '<img src="'.$imageurl.'" height="100px" width="120px">';
            })
            ->rawColumns(['feature_image', 'action'])
            ->make(true);
        }

        $data['html'] = $builder
            ->parameters([
                "dom" => "<'row' <'col-md-6 col-sm-12 col-xs-4'l><'col-md-6 col-sm-12 col-xs-4'f>><'row filter'><'row white_box_wrapper database_table table-responsive'rt><'row' <'col-md-6'i><'col-md-6'p>>",
            ])
            ->addColumn(['data' => 'feature_image', 'name' => 'image',"render"=>'data','title' => 'Image','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'title', 'name' => 'title','title' => 'Product Title','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'code','name' => 'code','title' => 'Product Code','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'main_id','name' => 'main_id','title' => 'Main Category','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'sub_id','name' => 'sub_id','title' => 'Sub Category','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'status','name' => 'status','title' => 'Status','orderable' => false, 'width' => 120])
            ->addAction(['title' => 'Actions', 'orderable' => false, 'width' => 120]);
        return view('admin.home')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::where('status', '=', 'active')->get();
        $data['brands'] = Brands::where('status', '=', 'active')->get();
        $data['color'] = Colors::where('status','=','active')->get();
        $data['view'] = 'admin.productadd';
        return view('admin.home',$data);
    }

    public function ajaxsubCategory(Request $request)
    {
        $id = $request->id;
        $subcategory = Subcategories::where('cat_id',$id)->get();
        $subCategoryview = view('admin.template.ajaxproduct',compact('subcategory'));

        return Response($subCategoryview);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = new Validations($request);
        $validator  = $validation->createProduct();
        if ($validator->fails()){
            $this->message = $validator->errors();
        }else{
            $data = new Products();
            $data->fill($request->all());
            if ($file = $request->file('feature_image')){
                $photo_name = time().$request->file('feature_image')->getClientOriginalName();
                $file->move('assets/images/products',$photo_name);
                $data['feature_image'] = $photo_name;
            }
            if ($request->featured == 1){
            $data->featured = 1;
            }

            if ($request->pallow == ""){
                $data->sizes = null;
            }
            $data->save();

            $lastid = $data->id;
            if ($files = $request->file('gallery')){
                foreach ($files as $file){
                    $gallery = new Product_Gallery;
                    $image_name = str_random(2).time().$file->getClientOriginalName();
                    $file->move('assets/images/Product Gallery',$image_name);
                    $gallery['images'] = $image_name;
                    $gallery['product_id'] = $lastid;
                    $gallery->save();
                }
            }
            if(!empty($request->input("color_name"))){
                foreach ($request->input("color_name") as $colors){
                    $add_color = new Product_Colors;
                    $add_color->color_id = $colors;
                    $add_color->product_id = $lastid;
                    $add_color->save();
                }
            }
            $this->status   = true;
            $this->modal    = true;
            $this->alert    = true;
            $this->message  = "Product has been Added successfully.";
            $this->redirect = url('admin/products');
        }
        return $this->populateresponse();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit($id){
        $data['view'] = 'admin.productedit';
        $id = ___decrypt($id);
        $whereProduct = ' id = '.$id;
        $data['product'] = _arefy(Products::list('single',$whereProduct));
        $data['gallery'] = _arefy(Product_Gallery::where('product_id',$id)->get());
        $where = 'status != "trashed"';
        $data['categories'] = _arefy(Category::where('status', '=', 'active')->get());
        $data['subcategory'] = _arefy(Subcategories::where('status', '=', 'active')->where('id',$id)->get());
        $data['brands'] = _arefy(Brands::where('status', '=', 'active')->get());
        $data['color'] = Colors::where('status','=','active')->get();
        return view('admin.home',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = ___decrypt($id);
        $validation = new Validations($request);
        $validator  = $validation->createProduct('edit');
        if ($validator->fails()) {
            $this->message = $validator->errors();
        }else{
            $product = Products::findOrFail($id);
            $input = $request->all();
            if($file = $request->file('feature_image')){
                $photo_name = time().$request->file('feature_image')->getClientOriginalName();
                $file->move('assets/images/products',$photo_name);
                $input['feature_image'] = $photo_name;
            }
            if ($request->galdel == 1){
                $gal = Product_Gallery::where('product_id',$id);
                $gal->delete();
            }
            if ($request->pallow == ""){
                $input['sizes'] = null;
            }
            if ($request->featured == 1){
                $input['featured'] = 1;
            }else{
                $input['featured'] = 0;
            }
            $productcolor = Product_Colors::where('product_id',$id)->delete();
            if(!empty($request->color_name)){
                foreach ($request->color_name as $colors){
                    $add_color = new Product_Colors;
                    $add_color->color_id = $colors;
                    $add_color->product_id = $id;
                    $add_color->save();
                }
            }
            $product->update($input);
            if ($files = $request->file('gallery')){
                foreach ($files as $file){
                    $gallery = new Product_Gallery;
                    $image_name = str_random(2).time().$file->getClientOriginalName();
                    $file->move('assets/images/Product Gallery',$image_name);
                    $gallery['images'] = $image_name;
                    $gallery['product_id'] = $id;
                    $gallery->save();
                }
            }
            $this->status   = true;
            $this->modal    = true;
            $this->alert    = true;
            $this->message  = "Product has been Updated successfully.";
            $this->redirect = url('admin/products');
        }
            return $this->populateresponse();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeStatus(Request $request){
        $userData                = ['status' => $request->status, 'updated_at' => date('Y-m-d H:i:s')];
        $isUpdated               = Products::change($request->id,$userData);

        if($isUpdated){
            if($request->status == 'trashed'){
                $this->message = 'Deleted Products successfully.';
            }else{
                $this->message = 'Updated Products successfully.';
            }
            $this->status = true;
            $this->redirect = true;
            $this->jsondata = [];
        }
        return $this->populateresponse();
    }
}
