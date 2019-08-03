<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class ProductController extends Controller
{
	public function index(){
		return view('admin.add_product');
	}
	public function save_product(Request $request){
		$data=array();
		$data['product_name']= $request->product_name;
		$data['category_id']= $request->category_id;
		$data['manufacture_id']= $request->manufacture_id;
		$data['product_short_description']= $request->product_short_description;
		$data['product_long_description']= $request->product_long_description;
		$data['product_price']= $request->product_price;
		$data['pruduct_size']= $request->pruduct_size;
		$data['pruduct_color']= $request->pruduct_color;
		$data['pulished_status']= $request->pulished_status;
		$image=$request->file('pruduct_image');
		if ($image) {
			$image_name=str_random(20);
			$ext=strtolower($image->getClientOriginalExtension());
			$image_full_name=$image_name.'.'.$ext;
			$upload_path='image/';
			$image_url=$upload_path.$image_full_name;
			$scuess=$image->move($upload_path,$image_full_name);
			if ($scuess) {
				$data['pruduct_image']=$image_url;
				DB::table('tbl_products')->insert($data);
				Session::put('message','Product added Successfully!!');
				return Redirect::to('/add-product');
			}
		}
		$data['pruduct_image']="";
		DB::table('tbl_products')->insert($data);
		Session::put('message','Product addes Successfully without Image');
		return Redirect::to('/add-product');
	}
	public function all_product(){
		$all_product_info=DB::table('tbl_products')
		->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
		->join('manufacture','tbl_products.manufacture_id','=','manufacture.manufacture_id')
		->get();
		$manage_product= view('admin.all_product')
		->with('all_product_info',$all_product_info);
		return view('admin_layout')
		->with('admin.all_product',$manage_product);
	}
	public function unactive_product($product_id){
		DB::table('tbl_products')
		->where('product_id',$product_id)
		->update(['pulished_status'=>0]);
		Session::put('message','Product status inactive Change');
		return Redirect::to('/all-product');
	}
	public function active_product($product_id){
		DB::table('tbl_products')
		->where('product_id',$product_id)
		->update(['pulished_status'=>1]);
		Session::put('message','Product active Change');
		return Redirect::to('/all-product');
	}
	public function delete_product($product_id){
		DB::table('tbl_products')
		->where('product_id',$product_id)
		->delete();
		return Redirect::to('/all-product');
	}
	public function edit_product($product_id){
		$porduct_info=DB::table('tbl_products')
		->where('product_id',$product_id)
		->first();

		$porduct_info=view('admin.edit_product')
		->with('porduct_info',$porduct_info);
		return view('admin_layout')
		->with('admin.edit_product',$porduct_info);

	}

	public function update_product(Request $request,$product_id){
		$data=array();
		$data['product_name']=$request->product_name;
		$data['category_id']=$request->category_id;
		$data['manufacture_id']=$request->manufacture_id;
		$data['product_short_description']=$request->product_short_description;
		$data['product_long_description']=$request->product_long_description;
		$data['product_price']=$request->product_price;
		$data['pruduct_size']=$request->pruduct_size;
		$data['pruduct_color']=$request->pruduct_color;
		$data['pulished_status']=$request->pulished_status;
		$image=$request->file('pruduct_image');
		if ($image) {
			$image_name=str_random(20);
			$ext=strtolower($image->getClientOriginalExtension());
			$image_full_name=$image_name.'.'.$ext;
			$upload_path='image/';
			$image_url=$upload_path.$image_full_name;
			$scuess=$image->move($upload_path,$image_full_name);
			if ($scuess) {
				$data['pruduct_image']=$image_url;
				DB::table('tbl_products')->update($data);
				Session::put('message',' Update Product  Successfully!!');
				return Redirect::to('/all-product');
			}
		}
		$data['pruduct_image']="";
		DB::table('tbl_products')->update($data);
		Session::put('message','Product update Successfully without Image');
		return Redirect::to('/all-product');

	}



	public function AdminAuthCheek(){
		$admin_id=Session::get('admin_id');
		if($admin_id){
			return;
		}
		else{
			return Redirect::to('/admin')->send();
		}
	}
}