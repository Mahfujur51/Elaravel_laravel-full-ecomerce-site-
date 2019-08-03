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

//.................................Fontend ...............................//
Route::get('/','HomeController@index')->name('index');

Route::get('/product_by_category/{category_id}','HomeController@product_by_category')->name('product_by_category');
Route::get('/product_by_brand/{manufacture_id}','HomeController@show_product_by_brand')->name('show_product_by_brand');










//..................Backend...................//
Route::get('/admin','AdminController@admin')->name('admin');
Route::get('/dashboard','AdminController@show_dashboard')->name('show_dashboard');
Route::post('/admin-dashboard','AdminController@dashboard')->name('dashboard');
Route::get('/logout','AdminController@logout')->name('logout');



//.....................Category Route........................//
Route::get('/add-category','CategoryController@index')->name('index');
Route::get('/all-category','CategoryController@all_category')->name('all_category');
Route::get('/edit-category/{category_id}','CategoryController@edit_category')->name('edit_category');
Route::post('/save-category','CategoryController@save_category')->name('save_category');
Route::get('/unactive_category/{category_id}','CategoryController@unactive_category')->name('unactive_category');
Route::get('/active_category/{category_id}','CategoryController@active_category')->name('active_category');
Route::post('/update-category/{category_id}','CategoryController@update_category')->name('update_category');
Route::get('/delete-category/{category_id}','CategoryController@delete_category')->name('delete_category');




//.....................Brand..........................//
Route::get('/add-brand','BrandController@index')->name('index');
Route::post('/save-brand','BrandController@save_brand')->name('save_brand');
Route::get('/all-brand','BrandController@all_brand')->name('all_brand');
Route::get('/delete-manufacture/{manufacture_id}','BrandController@delete_manufacture')->name('delete_manufacture');
Route::get('/unactive_manufacture/{maufacture_id}','BrandController@unactive_manufacture')->name('unactive_manufacture');
Route::get('/active_manufacture/{maufacture_id}','BrandController@active_manufacture')->name('active_manufacture');
Route::get('/edit-manufacture/{manufacture_id}','BrandController@edit_manufacture')->name('edit_manufacture');
Route::post('/update-Brand/{manufacture_id}','BrandController@update_brand')->name('update_brand');


//.................Product......................//

Route::get('/add-product','ProductController@index')->name('index');
Route::post('/save-product','ProductController@save_product')->name('save_product');
Route::get('/all-product','ProductController@all_product')->name('all_product');
Route::get('/unactive_product/{product_id}','ProductController@unactive_product')->name('unactive_product');
Route::get('/active_product/{product_id}','ProductController@active_product')->name('active_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product')->name('delete_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product')->name('edit_product');
Route::post('/update-product/{product_id}','ProductController@update_product')->name('update_product');



//...............Slider.............................//

Route::get('/add-slider','SliderController@add_slider')->name('add_slider');
Route::get('/all-slider','SliderController@all_slider')->name('all_slider');
Route::post('/save-slider','SliderController@save_slider')->name('save_slider');
Route::get('/delete-slider/{slider_id}','SliderController@delete_slider')->name('delete_slider');
Route::get('/active_slider/{slider_id}','SliderController@active_slider')->name('active_slider');
Route::get('/unactive_slider/{slider_id}','SliderController@unactive_slider')->name('unactive_slider');




//.............................Show Product..............//



