<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;

Session::start();

class ProductController extends Controller
{
    // public functon index(){

    // }

    public function AddProduct(){

    	return view('admin.add_product');
    }

    public function SaveProduct(Request $request){
    	$data = array();
    	$data['product_name'] = $request->product_name;
    	$data['category_id'] = $request->category_id;
    	$data['manufacture_id'] = $request->manufacture_id;
    	$data['product_short_description'] = $request->product_short_description;
    	$data['product_long_description'] = $request->product_long_description;
    	$data['product_price'] = $request->product_price;
    	$data['product_size'] = $request->product_size;
    	$data['product_color'] = $request->product_color;
    	$data['product_amount'] = $request->product_amount;
    	$data['publication_status'] = $request->publication_status;

    	$image = $request->file('product_image');

    	if($image){
    		$image_name = str_random(20);
    		$ext = strtolower($image->getClientOriginalExtension());
    		$image_full_name = $image_name.'.'.$ext;
    		$upload_path = 'image/';
    		$image_url = $upload_path.$image_full_name;
    		$success = $image->move($upload_path, $image_full_name);

    		if($success){
    			$data['product_image'] = $image_url;
    			DB::table('tbl_products')->insert($data);
    			Session::put('message', 'Product Added Successfully');
    			return Redirect::to('/add-product');
    		}
    	}

    	$data['product_image'] = "";
		DB::table('tbl_products')->insert($data);
		Session::put('message', 'Product Added Successfully Without Image');
		return Redirect::to('/add-product');
    }
}



































