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
		$this->AdminAuthCheek();
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
		    		$this->AdminAuthCheek();
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
	public function active_manufacture($manufacture_id){
		DB::table('manufacture')
		->where('manufacture_id',$manufacture_id)
		->update(['publish_status'=>1]);
		Session::put('message','Categroy active Successfully');
		return Redirect::to('/all-brand');

	}
	public function edit_manufacture($manufacture_id){
$this->AdminAuthCheek();
		$manufacture_info=DB::table('manufacture')
		->where('manufacture_id',$manufacture_id)
		->first();
		$manufacture_info=view('admin.edit_brand')
		->with('manufacture_info',$manufacture_info);
		return view('admin_layout')
		->with('admin.edit_brand',$manufacture_info);



		//return view('admin.edit_category');
	}
	public function update_brand(Request $request,$manufacture_id){
		$data=array();
		$data['manufacture_name']=$request->manufacture_name;
		$data['manufacture_description']=$request->manufacture_description;
		DB::table('manufacture')
		->where('manufacture_id',$manufacture_id)
		->update($data);
		Session::put('message','Categroy Update Successfully!!');
		return Redirect::to('/all-brand');

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
