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
Route::get('/','HomeController@index');
Route::get('aboutus','HomeController@aboutUs');
// Route::get('contactus','HomeController@contactUs');
Route::get('category/{type}/{category_slug}','HomeController@category');
Route::get('product/{product_slug}','HomeController@productView');


/***********************Front-Section****************************/
Route::get('admin/login','Admin\LoginController@login');
Route::post('admin/login','Admin\LoginController@authentication');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'/*,'middleware'=>'adminAuth'*/],function(){
Route::get('home','LoginController@home');

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
		Route::post('/status', 'ProductController@changeStatus');
			Route::post('ajaxsubcategory', 'ProductController@ajaxsubCategory');
	});

/***********************Slider-Section****************************/
Route::resource('sliders', 'SliderController');
	Route::group(['prefix' => 'sliders'],function(){
		Route::post('/status', 'SliderController@changeStatus');
	});

/***********************Brand-Section****************************/
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
Route::post('settings/title', 'SettingsController@title');
Route::post('settings/about', 'SettingsController@about');
Route::post('settings/address', 'SettingsController@address');
Route::post('settings/footer', 'SettingsController@footer');
Route::post('settings/logo', 'SettingsController@logo');
Route::post('settings/favicon', 'SettingsController@favicon');
Route::post('settings/background', 'SettingsController@background');
Route::resource('settings', 'SettingsController');
});
