<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Hash;
use App\Models\Category;
use App\Models\User;
use App\Models\Brands;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use Illuminate\Support\Facades\Validator;
use Validations\Validate as Validations;

class BrandsController extends Controller
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
        $data['view'] = 'admin.brandlist';
        $where = 'status != "trashed"';
        $brand  = _arefy(Brands::list('array',$where));
        if ($request->ajax()) {
            return DataTables::of($brand)
            ->editColumn('action',function($item){
                $html    = '<div class="edit_details_box">';
                $html   .= '<a href="'.url(sprintf('admin/brands/%s/edit',___encrypt($item['id']))).'"  title="Edit Detail"><i class="fa fa-edit"></i></a> | ';
                $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/brands/status/?id=%s&status=trashed',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('assets/images/delete.png').'"
                        data-ask="Would you like to Delete?" title="Delete"><i class="fa fa-fw fa-trash"></i></a> | ';
                if($item['status'] == 'active'){
                    $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/brands/status/?id=%s&status=inactive',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('assets/images/inactive-user.png').'"
                        data-ask="Would you like to change '.$item['brand_name'].' status from Active to Inactive?" title="Update Status"><i class="fa fa-fw fa-ban"></i></a>';
                }elseif($item['status'] == 'inactive'){
                    $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/brands/status/?id=%s&status=active',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('assets/images/active-user.png').'"
                        data-ask="Would you like to change '.$item['brand_name'].' status from Inactive to Active?" title="Update Status"><i class="fa fa-fw fa-check"></i></a>';
                }
                $html   .= '</div>';
                                
                return $html;
            })
            ->editColumn('status',function($item){
                return ucfirst($item['status']);
            })
             ->editColumn('brand_name',function($item){
                return ucfirst($item['brand_name']);
            })
            ->editColumn('category_id',function($item){
                return ucfirst($item['category']['name']);
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        $data['html'] = $builder
            ->parameters([
                "dom" => "<'row' <'col-md-6 col-sm-12 col-xs-4'l><'col-md-6 col-sm-12 col-xs-4'f>><'row filter'><'row white_box_wrapper database_table table-responsive'rt><'row' <'col-md-6'i><'col-md-6'p>>",
            ])
            ->addColumn(['data' => 'category_id', 'name' => 'category_id','title' => 'Category Name','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'brand_name', 'name' => 'brand_name','title' => 'Brand Name','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'slug','name' => 'slug','title' => 'Slug','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'status','name' => 'status','title' => 'Status','orderable' => false, 'width' => 120])
            ->addAction(['title' => 'Actions', 'orderable' => false, 'width' => 120]);
        return view('admin.home')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $data['categories'] = Category::where('status','=','active')->get();
        $data['view'] = 'admin.brandadd';
        return view('admin.home',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validation = new Validations($request);
        $validator  = $validation->createBrand();
        if ($validator->fails()) {
            $this->message = $validator->errors();
        }else{
            $brand = new Brands;
            $brand->fill($request->all());

            $brand->save();
            $this->status   = true;
            $this->modal    = true;
            $this->alert    = true;
            $this->message  = "Brand has been Added successfully.";
            $this->redirect = url('admin/brands');
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
        $data['view'] = 'admin.brandedit';
        $id = ___decrypt($id);
        $data['categories'] = Category::where('status','=','active')->get();
        $data['brand'] = _arefy(Brands::where('id',$id)->first());
        return view('admin.home',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $id = ___decrypt($id);
        $validation = new Validations($request);
        $validator  = $validation->createBrand('edit');
        if ($validator->fails()) {
            $this->message = $validator->errors();
        }else{
            $brand = Brands::findOrFail($id);
            $input = $request->all();
            $brand->update($input);
            $this->status   = true;
            $this->modal    = true;
            $this->alert    = true;
            $this->message  = "Brand has been Updated successfully.";
            $this->redirect = url('admin/brands');
        }
        return $this->populateresponse();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
    }

    public function changeStatus(Request $request){
        $userData                = ['status' => $request->status, 'updated_at' => date('Y-m-d H:i:s')];
        $isUpdated               = Brands::change($request->id,$userData);

        if($isUpdated){
            if($request->status == 'trashed'){
                $this->message = 'Deleted Brand successfully.';
            }else{
                $this->message = 'Updated Brand successfully.';
            }
            $this->status = true;
            $this->redirect = true;
            $this->jsondata = [];
        }
        return $this->populateresponse();
    }

    public function changepassword(){
        $data['view'] = 'admin.changepassword';
        $data['admin'] = _arefy(User::find(Auth::user()->id));
        return view('admin.home',$data);
    }

    public function adminchangePass(Request $request)
    {

      $validation = new Validations($request);
        $validator  = $validation->changePassword();
        if ($validator->fails()) {
            $this->message = $validator->errors();
        }else{

          $user = User::findOrFail(Auth::user()->id);
          if ($request->password){
            if (Hash::check($request->password, $user->password)){
                if ($request->new_password == $request->confirm_password){
                    $input['password'] = Hash::make($request->new_password);
                }else{
                    $this->message  =  $validator->errors()->add('confirm_password', 'Confirm Password Does not match.');
                    return $this->populateresponse();
                }
            }else{
                $this->message  =  $validator->errors()->add('confirm_password', 'Current Password Does not match.');
                    return $this->populateresponse();
            }
        }
        $user->update($input);
       
        $this->message = 'Admin Password has been Updated Successfully.';
        $this->modal    = true;
        $this->alert    = true;
        $this->status = true;
        $this->redirect = url('admin/home');
    }
    return $this->populateresponse();
  }
}