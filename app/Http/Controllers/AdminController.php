<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Session;
use DB;

session_start();
class AdminController extends Controller
{
    public function Index(){
    	return view('admin.admin_login');
    }

    public function GetDashboard(){

    	return view('admin.dashboard');
    }

    public function checkAdmin(Request $request){
    	
    	$admin_email = $request->admin_email;
    	$admin_password = md5($request->admin_password);
        // print($request->admin_email);
        // print($request->admin_password);
        // exit();
    	$result = DB::table('tbl_admin')
    				-> where('admin_email', $admin_email)
    				->where('admin_password', $admin_password)
    				->first();

        if($result){
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->admin_id);
            return Redirect::to('/dashboard');
        }else{
            Session::put('message', "Email or Password Invalid");
            return Redirect::to('/admin');
        }
    }
}
