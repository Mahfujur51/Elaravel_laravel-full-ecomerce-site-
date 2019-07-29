<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
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
		$image=$request->file('product_image');
		if ($image) {
			$image_name=str_random(20);
			$ext=strtolower($image->getClientOriginalExtention());
			$image_full_name=$image.'.'$ext;
			$upload_path='/image';
			$image_url=$upload_path.$image_full_name;
			$scuess=$image->move($upload_path,$image_full_name);
			if ($scuess) {
				$data['image']=$image_url;
				DB::table('tbl_products')->insert($data);
				Session::put('message','Product added Successfully!!');
				return Redirect::to()
						}			
			}
		}
	}