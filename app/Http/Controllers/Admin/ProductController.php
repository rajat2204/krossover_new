<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Subcategories;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
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
        
        $product  = _arefy(Products::where('status','!=','trashed')->get());
        if ($request->ajax()) {
            return DataTables::of($product)
            ->editColumn('action',function($item){
                $html    = '<div class="edit_details_box">';
                $html   .= '<a href="'.url(sprintf('admin/categories/%s/edit',___encrypt($item['id']))).'"  title="Edit Detail"><i class="fa fa-edit"></i></a> | ';
                if($item['status'] == 'active'){
                    $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/categories/status/?id=%s&status=inactive',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('/images/inactive-user.png').'"
                        data-ask="Would you like to change '.$item['name'].' status from active to inactive?" title="Update Status"><i class="fa fa-fw fa-ban"></i></a>';
                }elseif($item['status'] == 'inactive'){
                    $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/categories/status/?id=%s&status=active',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('/images/active-user.png').'"
                        data-ask="Would you like to change '.$item['name'].' status from inactive to active?" title="Update Status"><i class="fa fa-fw fa-check"></i></a>';
                }
                $html   .= '</div>';
                                
                return $html;
            })
            ->editColumn('status',function($item){
                return ucfirst($item['status']);
            })
             ->editColumn('name',function($item){
                return ucfirst($item['name']);
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        $data['html'] = $builder
            ->parameters([
                "dom" => "<'row' <'col-md-6 col-sm-12 col-xs-4'l><'col-md-6 col-sm-12 col-xs-4'f>><'row filter'><'row white_box_wrapper database_table table-responsive'rt><'row' <'col-md-6'i><'col-md-6'p>>",
            ])
            ->addColumn(['data' => 'name', 'name' => 'name','title' => 'Product Title','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'slug','name' => 'slug','title' => 'Price','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'slug','name' => 'slug','title' => 'Category','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'status','name' => 'status','title' => 'Status','orderable' => false, 'width' => 120])
            ->addAction(['title' => '', 'orderable' => false, 'width' => 120]);
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
            $data->category = $request->main_id.",".$request->subcategory;

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

    public function ajaxProduct(Request $request)
    {
        $id = $request->id;
        $subcategoryProduct = Childcategories::where('sub_id',$id)->get();
        $subProduct = view('admin.template.ajaxproduct',compact('subproduct'));
        return Response($subProduct);
    }


    public function edit($id)
    {
        //
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
        //
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
}
