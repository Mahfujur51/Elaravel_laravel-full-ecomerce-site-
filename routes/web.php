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


