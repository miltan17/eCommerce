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
    	$data = array();
    	$data['manufacture_id'] = $request->manufacture_id;
    	$data['manufacture_name'] = $request->manufacture_name;
    	$data['manufacture_description'] = $request->manufacture_description;
    	$data['publication_status'] = $request->publication_status;

    	DB::table('tbl_manufacture')->insert($data);
    	$message = $data['manufacture_name']." Added Successfully !!";
    	Session::put('message', $message);
    	return Redirect::to('/all-manufacture');
    }

    public function AllManufacture(){

    	$allManufactureInfo = DB::table('tbl_manufacture')->get();


    	return view('admin.all_manufacture')
    			->with('all_manufacture_info', $allManufactureInfo);
    }
}
