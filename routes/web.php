<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/***********************Front-Section****************************/

Route::get('/cache', function() { $exitCode = Artisan::call('cache:clear'); $exitCode = Artisan::call('cache:clear'); $exitCode = Artisan::call('cache:clear'); return 'DONE'; //Return anything 
});
Route::get('/config', function() { $exitCode = Artisan::call('config:cache'); $exitCode = Artisan::call('config:cache'); $exitCode = Artisan::call('config:cache'); return 'DONE'; //Return anything 
});
http://alc.studio/product/4/forever-ceiling-light
Route::get('/','HomeController@index');
Route::get('search','HomeController@search');
Route::get('pages/{slug}','HomeController@staticPage');
Route::get('contactus','HomeController@contactUs');
Route::post('contactussubmission','HomeController@contactUsForm');
Route::post('enquiry','HomeController@productEnquiry');
Route::get('category/{type}/{category_slug}','HomeController@category');
Route::get('product/{id}','HomeController@productView');
// Route::get('ajaxcategory/{type}/{category_slug}', 'HomeController@ajaxProduct');

/***********************Admin-Section****************************/
Route::get('admin/login','Admin\LoginController@login');
Route::get('admin/forgotpassword','Admin\LoginController@forgotPassword');
Route::get('admin/resetpassword','Admin\LoginController@resetPassword');
Route::post('admin/login','Admin\LoginController@authentication');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin','middleware'=>'admin'],function(){
	Route::get('home','LoginController@home');
	Route::get('logout',function(){
		\Auth::logout();
          return redirect('admin/login');
	});
/***********************Category-Section****************************/

Route::resource('categories', 'CategoryController');
	Route::group(['prefix' => 'categories'],function(){
		Route::post('/status', 'CategoryController@changeStatus');
	});

/***********************Sub-Category-Section****************************/
Route::resource('subcategories', 'SubcategoryController');
	Route::group(['prefix' => 'subcategories'],function(){
		Route::post('/status', 'SubcategoryController@changeStatus');
	});

/***********************Product-Section****************************/
Route::resource('products', 'ProductController');
	Route::group(['prefix' => 'subcategories'],function(){
			Route::post('ajaxsubcategory', 'ProductController@ajaxsubCategory');
	});
	Route::group(['prefix' => 'products'],function(){
		Route::post('/status', 'ProductController@changeStatus');
	});	

/***********************Slider-Section****************************/
Route::resource('sliders', 'SliderController');
	Route::group(['prefix' => 'sliders'],function(){
		Route::post('/status', 'SliderController@changeStatus');
	});

/***********************Brand-Section****************************/
Route::get('changepassword', 'BrandsController@changepassword');
Route::post('/changepassword','BrandsController@adminchangePass');
Route::resource('brands', 'BrandsController');
	Route::group(['prefix' => 'brands'],function(){
		Route::post('/status', 'BrandsController@changeStatus');
	});

/***********************Color-Section****************************/
Route::resource('colors', 'ColorsController');
	Route::group(['prefix' => 'colors'],function(){
		Route::post('/status', 'ColorsController@changeStatus');
	});

/***********************Settings-Section****************************/
Route::resource('staticpages', 'StaticPageController');
	Route::group(['prefix' => 'staticpages'],function(){
		Route::post('/status', 'StaticPageController@changeStatus');
	});

/***********************Clients-Section****************************/
Route::resource('clients', 'ClientController');
	Route::group(['prefix' => 'clients'],function(){
		Route::post('/status', 'ClientController@changeStatus');
	});

/***********************Why-Us-Section****************************/
Route::resource('whyus', 'WhyusController');

/***********************Inspirationla Gallery-Section****************************/
Route::resource('gallery', 'GalleryController');

/***********************Offers Section****************************/
Route::resource('offers', 'OfferController');
	Route::group(['prefix' => 'offers'],function(){
		Route::post('/status', 'OfferController@changeStatus');
	});

/***********************Social Media Section****************************/
Route::resource('social', 'SocialMediaController');
});
