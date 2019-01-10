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

	public function createSubCategory($action='add'){
        $validations = [
        	'cat_id' 			=> $this->validation('name'),
            'name' 		        => $this->validation('name'),
			'slug'  			=> array_merge($this->validation('slug_cat'),[Rule::unique('subcategories')]),
    	];
    	
		if($action='edit'){
			$validations['slug'] = array_merge($this->validation('slug_cat'),[
				Rule::unique('categories')->where(function($query){
					$query->where('id','!=',$this->data->id);
				})
			]);
		}
        $validator = \Validator::make($this->data->all(), $validations,[
    		'cat_id.required' 		=>  'Main Category is required',

    	]);
        return $validator;		
	}

	public function createProduct($action='add'){
		$validations = [
			'title'						=> $this->validation('name'),
			// 'mainid'					=> $this->validation('name'),
			// 'subid'					=> $this->validation('name'),
			// 'childid'				=> $this->validation('name'),
			'feature_image'				=> $this->validation('photo'),
			'image'						=> $this->validation('photo'),
			'description'				=> $this->validation('description'),
			'price'						=> $this->validation('price'),
			'previous_price'			=> $this->validation('price'),
			'retailer_price'			=> $this->validation('price'),
			'retailer_previous_price'	=> $this->validation('price'),
			'stock'						=> $this->validation('name'),
			'policy'					=> $this->validation('name'),
		];
		// if($action == 'edit'){
		// 	$validations['photo'] 	= $this->validation('photo_null');
		// 	$validations['gallery'] = $this->validation('gallery_null');
		// }
		$validator = \Validator::make($this->data->all(), $validations,[
			'title.required' 					=>  'Product Name is required.',
			// 'mainid.required' 				=>  'Main Category is required.',
			// 'subid.required' 				=>  'Sub Category is required.',
			// 'childid.required' 				=>  'Child Category is required.',
			'feature_image.required' 			=>  'Image is required.',
			'feature_image.mimes' 				=>  'Image should be in jpg,jpeg,png format.',
			'image.required' 					=>  'Image is required.',
			'image.mimes' 						=>  'Image should be in jpg,jpeg,png format.',
			'description.required' 				=>  'Product Description is required.',
			'price.required' 					=>  'Price for User is required.',
			'previous_price.required' 			=>  'Previous Price for User is required.',
			'retailer_price.required' 			=>  'Current Price for Retailer is required.',
			'retailer_previous_price.required' 	=>  'Previous Price for Retailer is required.',
			'stock.required' 					=>  'Stock is required.',
			'policy.required' 					=>  'Product Buy/Return Policy is required.',
		]);
		if(!empty($this->data->pallow) && empty($this->data->sizes)){
		    $validator->after(function ($validator){
				   $validator->errors()->add('sizes', 'The Sizes should be X,XL,XXL,M,L,S');
			});
		}

        return $validator;	
	}
}