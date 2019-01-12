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
Route::get('category/{category_slug}','HomeController@category');
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
		Route::post('ajaxsubcategory', 'ProductController@ajaxsubCategory');
	});
});
