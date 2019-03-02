<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subscribers;
use App\Models\Enquiry;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SubscriberExport;
use App\Exports\ContactExport;
use App\Exports\EnquiryExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use Validations\Validate as Validations;

class SubscribersController extends Controller
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
        $data['view'] = 'admin.subscriberlist';
        
        $subscriber  = _arefy(Subscribers::where('status','!=','trashed')->get());
        if ($request->ajax()) {
            return DataTables::of($subscriber)
            ->editColumn('action',function($item){
                $html    = '<div class="edit_details_box">';
                $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/subscribers/status/?id=%s&status=trashed',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('assets/images/delete.png').'"
                        data-ask="Would you like to Delete?" title="Delete"><i class="fa fa-fw fa-trash"></i></a> ';
                $html   .= '</div>';
                                
                return $html;
            })
            ->make(true);
        }

        $data['html'] = $builder
            ->parameters([
                "dom" => "<'row' <'col-md-6 col-sm-12 col-xs-4'l><'col-md-6 col-sm-12 col-xs-4'f>><'row filter'><'row white_box_wrapper database_table table-responsive'rt><'row' <'col-md-6'i><'col-md-6'p>>",
            ])
            // ->addColumn(['data' => 'id', 'name' => 'id','title' => 'Subscriber ID#','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'EMAIL', 'name' => 'EMAIL','title' => 'Subscriber E-mail','orderable' => false, 'width' => 120])
            ->addAction(['title' => 'Actions', 'orderable' => false, 'width' => 120]);
        return view('admin.home')->with($data);
    }

    public function enquirylist(Request $request, Builder $builder){
        $data['view'] = 'admin.enquirylist';
        
        $where = 'status != "trashed"';
        $enquiries  = _arefy(Enquiry::list('array',$where));
        if ($request->ajax()) {
            return DataTables::of($enquiries)
            ->editColumn('action',function($item){
                $html    = '<div class="edit_details_box">';
                $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/enquiries/status/?id=%s&status=trashed',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('assets/images/delete.png').'"
                        data-ask="Would you like to Delete?" title="Delete"><i class="fa fa-fw fa-trash"></i></a> ';
                $html   .= '</div>';
                                
                return $html;
            })
            ->editColumn('product_id',function($item){
                return ucfirst($item['product']['title']);
            })
            ->editColumn('name',function($item){
                return ucfirst($item['name']);
            })
            ->make(true);
        }

        $data['html'] = $builder
            ->parameters([
                "dom" => "<'row' <'col-md-6 col-sm-12 col-xs-4'l><'col-md-6 col-sm-12 col-xs-4'f>><'row filter'><'row white_box_wrapper database_table table-responsive'rt><'row' <'col-md-6'i><'col-md-6'p>>",
            ])
            ->addColumn(['data' => 'product_id', 'name' => 'product_id','title' => 'Product Name','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'quantity', 'name' => 'quantity','title' => 'Product Quantity','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'name', 'name' => 'name','title' => 'Customer Name','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'email', 'name' => 'email','title' => 'Customer E-mail','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'mobile', 'name' => 'mobile','title' => 'Customer Contact','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'status', 'name' => 'status','title' => 'Status','orderable' => false, 'width' => 120])
            ->addAction(['title' => 'Actions', 'orderable' => false, 'width' => 120]);
        return view('admin.home')->with($data);
    }

    public function contactlist(Request $request, Builder $builder){
        $data['view'] = 'admin.contactslist';
        
        $contact  = _arefy(ContactUs::where('status','!=','trashed')->get());
        if ($request->ajax()) {
            return DataTables::of($contact)
            ->editColumn('action',function($item){
                $html    = '<div class="edit_details_box">';
                $html   .= '<a href="javascript:void(0);" 
                        data-url="'.url(sprintf('admin/contacts/status/?id=%s&status=trashed',$item['id'])).'" 
                        data-request="ajax-confirm"
                        data-ask_image="'.url('assets/images/delete.png').'"
                        data-ask="Would you like to Delete?" title="Delete"><i class="fa fa-fw fa-trash"></i></a> ';
                $html   .= '</div>';
                                
                return $html;
            })
            ->editColumn('name',function($item){
                return ucfirst($item['name']);
            })
            ->editColumn('subject',function($item){
                return ucfirst($item['subject']);
            })
            ->make(true);
        }

        $data['html'] = $builder
            ->parameters([
                "dom" => "<'row' <'col-md-6 col-sm-12 col-xs-4'l><'col-md-6 col-sm-12 col-xs-4'f>><'row filter'><'row white_box_wrapper database_table table-responsive'rt><'row' <'col-md-6'i><'col-md-6'p>>",
            ])
            ->addColumn(['data' => 'name', 'name' => 'name','title' => 'Customer Name','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'email', 'name' => 'email','title' => 'Customer E-mail','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'subject', 'name' => 'subject','title' => 'Subject','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'message', 'name' => 'message','title' => 'Message','orderable' => false, 'width' => 120])
            ->addColumn(['data' => 'status', 'name' => 'status','title' => 'Status','orderable' => false, 'width' => 120])
            ->addAction(['title' => 'Actions', 'orderable' => false, 'width' => 120]);
        return view('admin.home')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function exportExcel()
    {
        return Excel::download(new SubscriberExport, 'subscriber.xlsx');
    }

    public function exportExcelEnquiries()
    {
        return Excel::download(new EnquiryExport, 'enquiry.xlsx');
    }

    public function exportExcelContacts()
    {
        return Excel::download(new ContactExport, 'contact.xlsx');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function changeStatus(Request $request){
        $userData                = ['status' => $request->status, 'updated_at' => date('Y-m-d H:i:s')];
        $isUpdated               = Subscribers::change($request->id,$userData);

        if($isUpdated){
            if($request->status == 'trashed'){
                $this->message = 'Deleted Subscribers successfully.';
            }else{
                $this->message = 'Updated Subscribers successfully.';
            }
            $this->status = true;
            $this->redirect = true;
            $this->jsondata = [];
        }
        return $this->populateresponse();
    }

    public function changeStatusEnquiry(Request $request){
        $userData                = ['status' => $request->status, 'updated_at' => date('Y-m-d H:i:s')];
        $isUpdated               = Enquiry::change($request->id,$userData);

        if($isUpdated){
            if($request->status == 'trashed'){
                $this->message = 'Deleted Enquiry successfully.';
            }else{
                $this->message = 'Updated Enquiry successfully.';
            }
            $this->status = true;
            $this->redirect = true;
            $this->jsondata = [];
        }
        return $this->populateresponse();
    }

    public function changeStatusContacts(Request $request){
        $userData                = ['status' => $request->status, 'updated_at' => date('Y-m-d H:i:s')];
        $isUpdated               = ContactUs::change($request->id,$userData);

        if($isUpdated){
            if($request->status == 'trashed'){
                $this->message = 'Deleted Contacts successfully.';
            }else{
                $this->message = 'Updated Contacts successfully.';
            }
            $this->status = true;
            $this->redirect = true;
            $this->jsondata = [];
        }
        return $this->populateresponse();
    }
}
