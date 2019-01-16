<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sliders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use Validations\Validate as Validations;

class SliderController extends Controller
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
        $data['view'] = 'Admin.sliderlist';
        
        $slider  = _arefy(Sliders::where('status','!=','trashed')->get());
       
        if ($request->ajax()) {
            return DataTables::of($slider)
            ->editColumn('action',function($item){
                
                $html    = '<div class="edit_details_box">';
                $html   .= '<a href="'.url(sprintf('admin/sliders/%s/edit',___encrypt($item['id']))).'"  title="Edit Detail"><i class="fa fa-edit"></i></a> | ';
                $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/sliders/status/?id=%s&status=trashed',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('/images/inactive-user.png').'"
                        data-ask="Would you like to Delete?" title="Delete"><i class="fa fa-trash"></i></a> | ';
                if($item['status'] == 'active'){
                    $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/sliders/status/?id=%s&status=inactive',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('/images/inactive-user.png').'"
                        data-ask="Would you like to change '.$item['title'].' status from active to inactive?" title="Update Status"><i class="fa fa-fw fa-ban"></i></a> | ';
                }elseif($item['status'] == 'inactive'){
                    $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/sliders/status/?id=%s&status=active',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('/images/active-user.png').'"
                        data-ask="Would you like to change '.$item['title'].' status from inactive to active?" title="Update Status"><i class="fa fa-fw fa-check"></i></a> | ';
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
            ->rawColumns(['action'])
            ->make(true);
        }

        $data['html'] = $builder
            ->parameters([
                "dom" => "<'row' <'col-md-6 col-sm-12 col-xs-4'l><'col-md-6 col-sm-12 col-xs-4'f>><'row filter'><'row white_box_wrapper database_table table-responsive'rt><'row' <'col-md-6'i><'col-md-6'p>>",
            ])
            ->addColumn(['data' => 'image', 'name' => 'image','title' => 'Slider Image','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'title','name' => 'title','title' => 'Title','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'text','name' => 'text','title' => 'Text','orderable' => false, 'width' => 120])
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
        $data['view'] = 'admin.slideradd';
        return view('admin.home',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // echo '<pre>'; print_r($request->all());die;
        $validation = new Validations($request);
        $validator  = $validation->addslider();
        if ($validator->fails()){
            $this->message = $validator->errors();
        }else{
            $slider = new Sliders();
            $slider->fill($request->all());

            if ($file = $request->file('image')){
                $photo_name = str_random(3).$request->file('image')->getClientOriginalName();
                $file->move('assets/images/sliders',$photo_name);
                $slider['image'] = $photo_name;
            }
            $slider->save();

            $this->status   = true;
            $this->modal    = true;
            $this->alert    = true;
            $this->message  = "Slider has been Added successfully.";
            $this->redirect = url('admin/sliders');
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
    public function edit($id)
    {
        $data['view'] = 'admin.slideredit';
        $id = ___decrypt($id);
        $data['slider'] = _arefy(Sliders::where('id',$id)->first());
        // dd($data['slider']);
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
        $validator  = $validation->addslider('edit');
        if ($validator->fails()) {
            $this->message = $validator->errors();
        }else{
            $slider = Sliders::findOrFail($id);
            $data = $request->all();

            if ($file = $request->file('image')){
                $photo_name = str_random(3).$request->file('image')->getClientOriginalName();
                $file->move('assets/images/sliders',$photo_name);
                $data['image'] = $photo_name;
            }
            $slider->update($data);

            $this->status   = true;
            $this->modal    = true;
            $this->alert    = true;
            $this->message  = "Slider has been Updated successfully.";
            $this->redirect = url('admin/sliders');
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
        $isUpdated               = Sliders::change($request->id,$userData);

        if($isUpdated){
            if($request->status == 'trashed'){
                $this->message = 'Deleted Slider successfully.';
            }else{
                $this->message = 'Updated Slider successfully.';
            }
            $this->status = true;
            $this->redirect = true;
            $this->jsondata = [];
        }
        return $this->populateresponse();
    }
}