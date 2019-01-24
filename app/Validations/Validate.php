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
			'description'       => ['required','string','max:1500'],
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
			'photo_null'		=> ['nullable'],
			'url' 				=> ['required','url'],

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
		if($action =='edit'){
			$validations['slug'] = array_merge($this->validation('slug_cat'),[
				Rule::unique('categories')->where(function($query){
					$query->where('id','!=',$this->data->id);
				})
			]);
		}
        $validator = \Validator::make($this->data->all(), $validations,[
        	'name.required'     			=> 'Category Name is Required.',
        	'slug.required'     			=> 'Category Slug is Required.',
        	'slug.unique'     				=> 'This Category Slug has already been taken.',
        ]);
        return $validator;		
	}

	public function createSubCategory($action='add'){
        $validations = [
        	'cat_id' 			=> $this->validation('name'),
            'name' 		        => $this->validation('name'),
			'slug'  			=> array_merge($this->validation('slug_cat'),[Rule::unique('subcategories')]),
    	];
    	
		if($action =='edit'){
			$validations['slug'] = array_merge($this->validation('slug_cat'),[
				Rule::unique('subcategories')->where(function($query){
					$query->where('id','!=',$this->data->id);
				})
			]);
		}
        $validator = \Validator::make($this->data->all(), $validations,[
    		'cat_id.required' 		=>  'Please Select the Main Category.',
    		'name.required' 		=>  'Sub-Category Name is required.',
    		'slug.required' 		=>  'Sub-Category Slug is required.',
    		'slug.unique' 			=>  'This Sub-Category Slug has already been taken.',

    	]);
        return $validator;		
	}

	public function createBrand($action='add'){
        $validations = [
        	'category_id' 		=> $this->validation('name'),
            'brand_name' 		=> $this->validation('name'),
			'slug'  			=> array_merge($this->validation('slug_cat'),[Rule::unique('brand')]),
    	];
    	
		if($action =='edit'){
			$validations['slug'] = array_merge($this->validation('slug_cat'),[
				Rule::unique('brand')->where(function($query){
					$query->where('id','!=',$this->data->id);
				})
			]);
		}
        $validator = \Validator::make($this->data->all(), $validations,[
    		'category_id.required' 		=>  'Main Category is required',
    		'brand_name.required'		=>  'Brand Name is required',
    		'slug.required'				=>  'Brand Slug is required',
    		'slug.unique'				=>  'This Brand Slug has already been taken.',
    	]);
        return $validator;		
	}

	public function createstaticpage($action='edit'){
        $validations = [
        	'title' 		=> $this->validation('name'),
            'description' 	=> $this->validation('name'),
    	];

        $validator = \Validator::make($this->data->all(), $validations,[
    		'title.required' 			=>  'Title is required',
    		'description.required'		=>  'Description is required',
    	]);
        return $validator;		
	}

	public function addcolor($action='add'){
        $validations = [
        	'color_name' 		=> $this->validation('name'),
        	'slug'  			=> array_merge($this->validation('slug_cat'),[Rule::unique('color')]),
    	];
    	
        $validator = \Validator::make($this->data->all(), $validations,[
    		'color_name.required'				=>  'Color Name is required.',
    		'slug.required'						=>  'Color Slug is required.',
    		'slug.unique'						=>  'This Color Slug has already been taken.',
    	]);
        return $validator;		
	}

	public function addslider($action = 'add'){
		$validations = [
        	'image' 				=> $this->validation('photo'),
        	'title' 				=> $this->validation('name'),
        	'text' 					=> $this->validation('name'),
    	];
		if($action == 'edit'){
			$validations['image']	= $this->validation('photomimes');
	        $validations['title'] 	= $this->validation('name');
	        $validations['text'] 	= $this->validation('name');
		}
		$validator = \Validator::make($this->data->all(), $validations,[
			'image.required' 				=>  'Slider Image is required.',
			'image.mimes' 					=>  'Image should be in jpg,jpeg,png format.',
			'title.required'				=>	'Slider Title is required.',
			'text.required'					=>	'Slider Text is required.',
		]);
		return $validator;
	}

	public function whyus($action = 'edit'){
		$validations = [
        	'title' 				=> $this->validation('name'),
        	'description' 			=> $this->validation('name'),
    	];
		$validator = \Validator::make($this->data->all(), $validations,[
			'image.mimes' 					=>  'Image should be in jpg,jpeg,png format.',
			'title.required'				=>	'Title is required.',
			'description.required'			=>	'Description is required.',
		]);
		return $validator;
	}

	public function addsocialmedia(){
		$validations = [
        	'url' 				=> $this->validation('url'),
    	];
    	
		$validator = \Validator::make($this->data->all(), $validations,[
			'url.required'			=>	'Social Media URL is required.',
		]);
		return $validator;
	}

	public function addclient($action='add'){
		$validations = [
        	'image' 				=> $this->validation('photo'),
    	];
		if($action == 'edit'){
			$validations['image']	= $this->validation('photomimes');
		}
		$validator = \Validator::make($this->data->all(), $validations,[
			'image.required' 				=>  'Client Image is required.',
			'image.mimes' 					=>  'Image should be in jpg,jpeg,png format.',
		]);
		return $validator;
	}

	public function addgallery($action='edit'){
		$validations = [
        	'image' 				=> $this->validation('photomimes'),
        	'name'					=> $this->validation('name'),
    	];
		$validator = \Validator::make($this->data->all(), $validations,[
			'image.mimes' 					=>  'Image should be in jpg,jpeg,png format.',
			'name.required'					=> 	'Gallery Image Name is required',
		]);
		return $validator;
	}

	public function addoffer($action='edit'){
		$validations = [
        	'image' 				=> $this->validation('photomimes'),
    	];
		$validator = \Validator::make($this->data->all(), $validations,[
			'image.mimes' 					=>  'Image should be in jpg,jpeg,png format.',
		]);
		return $validator;
	}

	public function createContactUs($action='add'){
        $validations = [
        	'name' 				=> $this->validation('name'),
			'email'  			=> $this->validation('req_email'),
            'subject' 		    => $this->validation('name'),
            'message' 		    => $this->validation('name'),
    	];
    	
        $validator = \Validator::make($this->data->all(), $validations,[
    		'name.required' 		=>  'Name is required.',
    		'email.required' 		=>  'E-mail is required.',
    		'subject.required' 		=>  'Subject is required.',
    		'message.unique' 		=>  'Message is required.',

    	]);
        return $validator;		
	}

	public function createProduct($action='add'){
		$validations = [
			'title'						=> $this->validation('name'),
			'main_id'					=> $this->validation('name'),
			'sub_id'					=> $this->validation('name'),
			'brand_id'					=> $this->validation('name'),
			'feature_image'				=> $this->validation('photo'),
			// 'sizes'						=> $this->validation('name'),
			'description'				=> $this->validation('description'),
			'price'						=> $this->validation('price'),
			'previous_price'			=> $this->validation('price'),
			'stock'						=> $this->validation('name'),
			'policy'					=> $this->validation('name'),
		];
		if($action == 'edit'){
			$validations['feature_image'] 	= $this->validation('photo_null');
		}
		$validator = \Validator::make($this->data->all(), $validations,[
			'title.required' 					=>  'Product Name is required.',
			'main_id.required' 					=>  'Products Main Category is required.',
			'sub_id.required' 					=>  'Products Sub Category is required.',
			'brand_id.required' 				=>  'Product Brand is required.',
			'feature_image.required' 			=>  'Product Image is required.',
			'feature_image.mimes' 				=>  'Product Image should be in jpg,jpeg,png format.',
			// 'sizes.required'					=>  'Size field is required',
			'description.required' 				=>  'Product Description is required.',
			'price.required' 					=>  'Current Price for User is required.',
			'previous_price.required' 			=>  'Previous Price for User is required.',
			'stock.required' 					=>  'Product Stock is required.',
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