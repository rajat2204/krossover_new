<?php

namespace Validations;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
/**
* 
*/
class Validate
{
	protected $data;
	public function __construct($data){
		$this->data = $data;
	}

	private function validation($key){
		$validation = [
			'id'				=> ['required'],
			'email'				=> ['nullable','email'],
			'req_email'			=> ['required','email'],
			'first_name' 		=> ['required','string'],
			'name' 				=> ['required','string'],
			'last_name' 		=> ['nullable','string'],
			'date_of_birth' 	=> ['nullable','string'],
			'gender' 			=> ['required','string'],
			'phone_code' 		=> ['nullable','required_with:mobile_number','string'],
			'mobile_number' 	=> ['nullable','numeric'],
			'req_mobile_number' 	=> ['required','required_with:phone_code','numeric'],
			'country' 			=> ['required','string'],
			'address'           => ['nullable','string','max:1500'],
			'qualifications'    => ['required','string','max:1500'],
			'specifications'    => ['nullable','string','max:1500'],
			'description'       => ['nullable','string','max:1500'],
			'required_description'  => ['required','string','max:1500'],
			'slug_cat'				=> ['required','max:255'],
			'title'             => ['required','string'],
			'profile_picture'   => ['required','mimes:doc,docx,pdf','max:2048'],
			'pin_code' 			=> ['nullable','max:6','min:4'],
			'appointment_date'  => ['required','string'],
			'type' 	            => ['required','string'],
			'phone' 	        => ['required','string','numeric'],
			'course' 	        => ['required','string'],
			'location' 	        => ['required','string'],
			'comments' 	        => ['required','string'],
			'password'          => ['required','string','max:50'],
			'price'				=> ['required','numeric'],
			'start_from'		=> ['required'],
			'photo'				=> ['required','mimes:jpg,jpeg,png','max:2408'],
			'photomimes'		=> ['mimes:jpg,jpeg,png','max:2408'],

		];
		return $validation[$key];
	}
	public function login(){
        $validations = [
            'email' 		       => $this->validation('email'),
			'password'       	   => $this->validation('password')
			
    	];

        $validator = \Validator::make($this->data->all(), $validations,[]);
        return $validator;		
	}

	public function createCategory($action='add'){
        $validations = [
            'name' 		        => $this->validation('name'),
			'slug'  			=> array_merge($this->validation('slug_cat'),[Rule::unique('categories')]),
    	];
		if($action='edit'){
			$validations['slug'] = array_merge($this->validation('slug_cat'),[
				Rule::unique('categories')->where(function($query){
					$query->where('id','!=',$this->data->id);
				})
			]);
		}
        $validator = \Validator::make($this->data->all(), $validations,[]);
        return $validator;		
	}
}