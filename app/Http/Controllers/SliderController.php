<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class SliderController extends Controller
{
	public function add_slider(){
		return view ('admin.add_slider');

	}
	public function save_slider(Request $request){
		$data=array();
		$data['slider_publish_satus'] = $request->slider_publish_satus;
		$image=$request->file('slider_image');
		if ($image) {
			$image_name=str_random(20);
			$ext=strtolower($image->getClientOriginalExtension());
			$image_full_name=$image_name.'.'.$ext;
			$upload_path='image/';
			$image_url=$upload_path.$image_full_name;
			$success=$image->move($upload_path,$image_full_name);
			if ($success) {
				$data['slider_image']=$image_url;
				DB::table('tbl_slider')->insert($data);
				Session::put('message','Slider added Successfully!!');
				return Redirect::to('/add-slider');
			}
		}
		$data['slider_image']="";
		DB::table('tbl_slider')->insert($data);
		Session::put('message','Slider addes Successfully without Image');
		return Redirect::to('/add-slider');
	}
	public function all_slider(){
		$all_slider_info=DB::table('tbl_slider')->get();
		$manage_category= view('admin.all_slider')
		->with('all_slider_info',$all_slider_info);
		return view('admin_layout')
		->with('admin.all_slider',$manage_category);
	}

   public function delete_slider($slider_id){

   	DB::table('tbl_slider')
   	->where('slider_id',$slider_id)
   	->delete();
   	return Redirect::to('/all-slider');

   }
   public function active_slider($slider_id){
   	DB::table('tbl_slider')
   	->where('slider_id',$slider_id)
   	->update(['slider_publish_satus'=>1]);
   	Session::put('message','Slider active Change');
		return Redirect::to('/all-slider');

   }  
    public function unactive_slider($slider_id){
   	DB::table('tbl_slider')
   	->where('slider_id',$slider_id)
   	->update(['slider_publish_satus'=>0]);
   	Session::put('message','Slider active Change');
		return Redirect::to('/all-slider');

   }

}