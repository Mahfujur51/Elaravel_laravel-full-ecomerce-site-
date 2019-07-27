<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class BrandController extends Controller
{
	public function index(){
		return view('admin.add_brand');
	}
	public function save_brand(Request $request){
		$data=array();
		$data['manufacture_id']=$request->manufacture_id;
		$data['manufacture_name']=$request->manufacture_name;
		$data['manufacture_description']=$request->manufacture_description;
		$data['publish_status']=$request->publish_status;
		DB::table('manufacture')->insert($data);

		Session::put('message','Brand Added Successfully!!');
		return Redirect::to('/add-brand');

	}

	public function all_brand(){
		$all_brand_info=DB::table('manufacture')->get();
		$manage_category= view('admin.all_brand')
		->with('all_brand_info',$all_brand_info);
		return view('admin_layout')
		->with('admin.all_brand',$manage_category);
    	//return view('admin.all_category');
	}
	public function delete_manufacture($manufacture_id){
		DB::table('manufacture')
		->where('manufacture_id',$manufacture_id)
		->delete();
		session::put('message','Brand Deleted Successfully');
		return Redirect::to('/all-brand');
	}


	public function unactive_manufacture($manufacture_id){
     DB::table('manufacture')
     ->where('manufacture_id',$manufacture_id)
     ->update(['publish_status'=>0]);
     Session::put('message','Categroy In-active Successfully');
     return Redirect::to('/all-brand');
	}
}
