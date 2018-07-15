<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;

Session::start();
class CategoryController extends Controller
{
    public function index(){
    	return view('admin.add_category');
    }

    public function SaveCategory(Request $request){
    // 	$data = array();
    // 	$data['category_id'] = $request->category_id;
    // 	$data['category_name'] = $request->category_name;
    // 	$data['category_description'] = $request->category_description;
    // 	$data['publication_status'] = $request->publication_status;

    // 	DB::table('tbl_category')->insert($data);

    	DB::insert('insert into tbl_category (category_name, category_description, publication_status) values (?, ?, ?)', [$request->category_name, $request->category_description, $request->publication_status]);

    	$message = $request->category_name." Added Successfully !!";
    	Session::put('message', $message);
    	return Redirect::to('/all-category');
    }

    public function AllCategory(){
    	$allCategoryInfo = DB::table('tbl_category')->get();


    	return view('admin.all_category')
    			->with('all_category_info', $allCategoryInfo);
    }

    public function PublishCategory($category_id){

    	DB::table('tbl_category')
    			->where('category_id', $category_id)
    			->update(['publication_status' => 1]);
    	Session::put('message', 'Category Published Sucessfully !!');
    	return Redirect::to('/all-category');
    }

    public function UnPublishCategory($category_id){

    	DB::table('tbl_category')
    			->where('category_id', $category_id)
    			->update(['publication_status' => 0]);
    	Session::put('message', 'Category Unpublished Sucessfully !!');

    	return Redirect::to('/all-category');
    }

    public function EditCategory($category_id){
    	$category = DB::table('tbl_category')
    				->where('category_id', $category_id)
    				->first();
    	return view('admin.edit_category')->with('category_info', $category);
    }

    public function UpdateCategory(Request $request, $category_id){

    	DB::table('tbl_category')
    			->where('category_id', $category_id)
    			->update(['category_name' => $request->category_name, 'category_description' => $request->category_description]);

    	Session::put('message', 'Category Updated Successfully !!!');
    	return Redirect::to('/all-category');
    }

    public function RemoveCategory($category_id){
    	DB::table('tbl_category')
    			->where('category_id', $category_id)
    			->delete();
    	Session::put('message', 'Category Removed Successfully');
    	return Redirect::back();
    }

}
















