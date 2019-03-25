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
			'id'					=> ['required'],
			'email'					=> ['nullable','email'],
			'req_email'				=> ['required','email'],
			'first_name' 			=> ['required','string'],
			'name' 					=> ['required','string'],
			'name_product' 			=> ['required','string'],
			'last_name' 			=> ['nullable','string'],
			'date_of_birth' 		=> ['nullable','string'],
			'gender' 				=> ['required','string'],
			'phone_code' 			=> ['nullable','required_with:mobile_number','string'],
			'mobile_number' 		=> ['required','numeric'],
			'req_mobile_number' 	=> ['required','required_with:phone_code','numeric'],
			'country' 				=> ['required','string'],
			'address'           	=> ['nullable','string','max:1500'],
			'qualifications'    	=> ['required','string','max:1500'],
			'specifications'    	=> ['nullable','string','max:1500'],
			'description'       	=> ['required','string'],
			'slug_cat'				=> ['required','max:255'],
			'title'             	=> ['required','string'],
			'profile_picture'   	=> ['required','mimes:doc,docx,pdf','max:2048'],
			'pin_code' 				=> ['nullable','max:6','min:4'],
			'appointment_date'  	=> ['required','string'],
			'type' 	            	=> ['required','string'],
			'phone' 	        	=> ['required','string','numeric'],
			'course' 	        	=> ['required','string'],
			'location' 	        	=> ['required','string'],
			'comments' 	        	=> ['required','string'],
			'password'          	=> ['required','string','max:50'],
			'price'					=> ['required','numeric'],
			'start_from'			=> ['required'],
			'photo'					=> ['required','mimes:jpg,jpeg,png','max:2408'],
			'photomimes'			=> ['mimes:jpg,jpeg,png','max:2408'],
			'photo_null'			=> ['nullable'],
			'gallery'				=> ['mimes:jpg,jpeg,png','max:2048'],
			'gallery_null'			=> ['nullable'],
			'url' 				    => ['required','url'],
			'slug_no_space'		    => ['required','alpha_dash','max:255'],
			'password_check'	    => ['required'],
			'file'					=> ['required','mimes:pdf'],
			'newpassword'		    => ['required','max:10']	

		];
		return $validation[$key];
	}
	public function login(){
        $validations = [
            'email' 		       => $this->validation('req_email'),
			'password'       	   => $this->validation('password'),
    	];
        $validator = \Validator::make($this->data->all(), $validations,[]);
        return $validator;		
	}

	public function createCategory($action='add'){
        $validations = [
        	'image'				=> $this->validation('photo'),
            'name' 		        => $this->validation('name'),
			'slug'  			=> array_merge($this->validation('slug_no_space'),[Rule::unique('categories')]),
    	];
		if($action =='edit'){
			$validations['image'] 	= $this->validation('photo_null');
			$validations['slug'] = array_merge($this->validation('slug_no_space'),[
				Rule::unique('categories')->where(function($query){
					$query->where('id','!=',$this->data->id);
				})
			]);
		}
        $validator = \Validator::make($this->data->all(), $validations,[
        	'image.required' 				=> 'Category Image is required.',
			'image.mimes' 					=> 'Category Image should be in jpg,jpeg,png format.',
        	'name.required'     			=> 'Category Name is Required.',
        	'slug.required'     			=> 'Category Slug is Required.',
        	'slug.unique'     				=> 'This Category Slug has already been taken.',
        	'slug.alpha_dash'     			=> 'No spaces allowed in category slug.The Slug may only contain letters, numbers, dashes and underscores.',
        ]);
        return $validator;		
	}

	public function createSubCategory($action='add'){
        $validations = [
        	'cat_id' 			=> $this->validation('name'),
            'name' 		        => $this->validation('name'),
			'slug'  			=> array_merge($this->validation('slug_no_space'),[Rule::unique('subcategories')]),
    	];
    	
		if($action =='edit'){
			$validations['slug'] = array_merge($this->validation('slug_no_space'),[
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
    		'slug.alpha_dash'     	=> 	'No spaces allowed in sub-category slug.The Slug may only contain letters, numbers, dashes and underscores.',

    	]);
        return $validator;		
	}

	public function createCatalogue($action='add'){
        $validations = [
        	'file' 				=> $this->validation('file'),
    	];
    	
		// if($action =='edit'){
		// 	$validations['slug'] = array_merge($this->validation('slug_no_space'),[
		// 		Rule::unique('subcategories')->where(function($query){
		// 			$query->where('id','!=',$this->data->id);
		// 		})
		// 	]);
		// }
        $validator = \Validator::make($this->data->all(), $validations,[
    		'file.required' 		=>  'Catalogue File is required.',
    		'file.mimes' 			=>  'Catalogue File should be in .pdf format.',

    	]);
        return $validator;		
	}

	public function createBrand($action='add'){
        $validations = [
        	'category_id' 		=> $this->validation('name'),
            'brand_name' 		=> $this->validation('name'),
			'slug'  			=> array_merge($this->validation('slug_no_space'),[Rule::unique('brand')]),
    	];
    	
		if($action =='edit'){
			$validations['slug'] = array_merge($this->validation('slug_no_space'),[
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
    		'slug.alpha_dash'     		=> 'No spaces allowed in brand slug.The Slug may only contain letters, numbers, dashes and underscores.',
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

	public function productenquiry(){
        $validations = [
        	'name' 		=> $this->validation('name'),
            'email' 	=> $this->validation('req_email'),
            'mobile' 	=> $this->validation('mobile_number'),
    	];

        $validator = \Validator::make($this->data->all(), $validations,[
    		'name.required' 			=>  'Name is required',
    		'email.required'			=>  'E-mail is required',
    		'mobile.required'			=>  'Mobile Number is required',
    	]);
        return $validator;		
	}

	public function addcolor($action='add'){
        $validations = [
        	'color_name' 		=> $this->validation('name'),
        	'slug'  			=> array_merge($this->validation('slug_no_space'),[Rule::unique('color')]),
    	];
    	
        $validator = \Validator::make($this->data->all(), $validations,[
    		'color_name.required'				=>  'Color Name is required.',
    		'slug.required'						=>  'Color Slug is required.',
    		'slug.unique'						=>  'This Color Slug has already been taken.',
    		'slug.alpha_dash'     				=> 'No spaces allowed in color slug.The Slug may only contain letters, numbers, dashes and underscores.',
    	]);
        return $validator;		
	}

	public function addslider($action = 'edit')
	{
		$validations = [
        	'main_id' 				=> $this->validation('name'),
        	'title' 					=> $this->validation('name'),
        	'text' 						=> $this->validation('name'),
    	];
		$validator = \Validator::make($this->data->all(), $validations,[
			'main_id.required' 			=>  'Slider Image is required.',
			'title.required'				=>	'Title is required.',
			'text.required'					=>	'Text is required.',
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

	public function subscriber($action='add'){
		$validations = [
        	'EMAIL' 				=> $this->validation('req_email'),
    	];
		$validator = \Validator::make($this->data->all(), $validations,[
			'EMAIL.required'					=> 	'E-mail is required',
		]);
		return $validator;
	}

	public function contactaddress($action='edit'){
		$validations = [
        	'address' 				=> $this->validation('name'),
        	'email'					=> $this->validation('req_email'),
        	'mobile'				=> $this->validation('name'),
    	];
		$validator = \Validator::make($this->data->all(), $validations,[
			'address.required' 				=>  'Please enter your address.',
			'email.required'				=> 	'Please enter your E-mail.',
			'mobile.required'				=> 	'Please enter your Contact Number.',
		]);
		return $validator;
	}

	public function addoffer($action='edit'){
		$validations = [
        	// 'name' 				=> $this->validation('name'),
    	];
		$validator = \Validator::make($this->data->all(), $validations,[
			// 'name' 					=>  'Offer Name is required.',
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

	public function changePassword($action='add'){
        $validations = [
        	'password' 					=> $this->validation('password'),
			'new_password'  			=> $this->validation('password'),
            'confirm_password' 		    => $this->validation('password'),
    	];
    	
        $validator = \Validator::make($this->data->all(), $validations,[
    		'password.required' 			=>  'Old Password is required.',
    		'new_password.required' 		=>  'New password is required.',
    		'confirm_password.required' 	=>  'Confirm Password is required.',

    	]);
        return $validator;		
	}

	public function createProduct($action='add'){
		$validations = [
			'title'						=> $this->validation('name_product'),
			'code'						=> $this->validation('name_product'),
			'main_id'					=> $this->validation('name'),
			'sub_id'					=> $this->validation('name'),
			'feature_image'				=> $this->validation('photo'),
			'gallery.*'					=> $this->validation('gallery'),
			'description'				=> $this->validation('description'),
			'dimensions'				=> $this->validation('name'),
		];
		if($action == 'edit'){
			$validations['feature_image'] 	= $this->validation('photo_null');
			$validations['gallery'] 	= $this->validation('gallery_null');
		}
		
		$validator = \Validator::make($this->data->all(), $validations,[
			'title.required' 					=>  'Product Name is required.',
			'code.required' 					=>  'Product Code is required.',
			'main_id.required' 					=>  'Product Main Category is required.',
			'sub_id.required' 					=>  'Product Sub Category is required.',
			'brand_id.required' 				=>  'Product Brand is required.',
			'feature_image.required' 			=>  'Product Image is required.',
			'feature_image.mimes' 				=>  'Product Image should be in jpg,jpeg,png format.',
			'gallery.*.mimes' 					=> 	'Gallery Images should be in jpg,jpeg,png format.',
			'gallery.*.max' 					=> 	'Gallery Images should not be greater than 2MB.',
			'description.required' 				=>  'Product Description is required.',
			'dimensions.required' 				=>  'Product Dimension is required.',
		]);
		if(!empty($this->data->pallow) && empty($this->data->sizes)){
		    $validator->after(function ($validator){
				   $validator->errors()->add('sizes', 'The Sizes should be X,XL,XXL,M,L,S');
			});
		}
		if(!empty($this->data->pPrice) && empty($this->data->price)){
		    $validator->after(function ($validator){
				   $validator->errors()->add('price', 'The Price is required and should be numeric');
			});
		}
		if(!empty($this->data->ppPrice) && empty($this->data->previous_price)){
		    $validator->after(function ($validator){
				   $validator->errors()->add('previous_price', 'The Previous Price is required and should be numeric');
			});
		}
		if(!empty($this->data->pstock) && empty($this->data->stock)){
		    $validator->after(function ($validator){
				   $validator->errors()->add('stock', 'The Stock is required and should be numeric');
			});
		}

        return $validator;	
	}
}