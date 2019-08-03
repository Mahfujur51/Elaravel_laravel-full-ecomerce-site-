<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class HomeController extends Controller
{
	public function index(){
		$all_publish_product=DB::table('tbl_products')
		->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
		->join('manufacture','tbl_products.manufacture_id','=','manufacture.manufacture_id')
		->where('pulished_status',1)
		->limit(9)
		->get();
		$manage_product= view('pages.home_content')
		->with('all_publish_product',$all_publish_product);
		return view('layout')
		->with('pages.home_content',$manage_product);
	//return view('pages.home_content');
	}
	public function product_by_category($category_id)
	{
		$product_by_category=DB::table('tbl_products')
		->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
		->select('tbl_products.*','tbl_category.category_name')
		->where('tbl_products.category_id',$category_id)
		->where('tbl_products.pulished_status',1)
		->limit(18)
		->get();
		$manage_product_by_category=view('pages.mnage_bycategory')
		->with('product_by_category',$product_by_category);
		return view('layout')
		->with('pages.mnage_bycategory',$manage_product_by_category);


	}
	public function show_product_by_brand($manufacture_id){
		$all_publish_product=DB::table('tbl_products')
		->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
		->join('manufacture','tbl_products.manufacture_id','=','manufacture.manufacture_id')
		->where('pulished_status',1)
		->limit(9)
		->get();
		$manage_product= view('pages.home_content')
		->with('all_publish_product',$all_publish_product);
		return view('layout')
		->with('pages.home_content',$manage_product);
	}
}