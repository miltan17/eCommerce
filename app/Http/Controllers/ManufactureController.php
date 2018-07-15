<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;

Session::start();
class ManufactureController extends Controller
{
    public function index(){
    	return view('admin.add_manufacture');
    }

    public function SaveManufacture(Request $request){
    	// $data = array();
    	// $data['manufacture_id'] = $request->manufacture_id;
    	// $data['manufacture_name'] = $request->manufacture_name;
    	// $data['manufacture_description'] = $request->manufacture_description;
    	// $data['publication_status'] = $request->publication_status;

    	// DB::table('tbl_manufacture')->insert($data);

    	DB::insert('insert into tbl_manufacture (manufacture_name, manufacture_description, publication_status) values (?, ?, ?)', [$request->manufacture_name, $request->manufacture_description, $request->publication_status]);


    	$message = $request->manufacture_name." Added Successfully !!";
    	Session::put('message', $message);
    	return Redirect::to('/all-manufacture');
    }

    public function AllManufacture(){

    	$allManufactureInfo = DB::table('tbl_manufacture')->get();


    	return view('admin.all_manufacture')
    			->with('all_manufacture_info', $allManufactureInfo);
    }

    public function PublishManufacture($manufacture_id){

    	DB::table('tbl_manufacture')
    			->where('manufacture_id', $manufacture_id)
    			->update(['publication_status' => 1]);
    	Session::put('message', 'Manufactured Published Sucessfully !!');
    	return Redirect::to('/all-manufacture');
    }

    public function UnPublishManufacture($manufacture_id){

    	DB::table('tbl_manufacture')
    			->where('manufacture_id', $manufacture_id)
    			->update(['publication_status' => 0]);
    	Session::put('message', 'Manufacture Unpublished Sucessfully !!');

    	return Redirect::to('/all-manufacture');
    }

    public function EditManufacture($manufacture_id){
    	$manufacture = DB::table('tbl_manufacture')
    				->where('manufacture_id', $manufacture_id)
    				->first();
    	return view('admin.edit_manufacture')->with('manufacture_info', $manufacture);
    }

    public function UpdateManufacture(Request $request, $manufacture_id){

    	DB::update('update tbl_manufacture set manufacture_name = ?, manufacture_description = ? where manufacture_id = ?', [$request->manufacture_name, $request->manufacture_description, $manufacture_id]);

    	Session::put('message', 'Manufacture Updated Successfully !!!');
    	return Redirect::to('/all-manufacture');
    }

    public function RemoveManufacture($manufacture_id){
    	DB::table('tbl_manufacture')
    			->where('manufacture_id', $manufacture_id)
    			->delete();
    	Session::put('message', 'Manufacture Removed Successfully');
    	return Redirect::back();
    }
}
































