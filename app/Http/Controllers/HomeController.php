<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validations\Validate as Validations;
use App\Http\Controllers\Controller;
use Redirect;


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
}
