<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\ZoneModel;
use Validator;
use DB;

class ReportsController extends Controller
{
    /*get all customer  details*/
	
	public function getCustomers()
	{
		$getproducts = DB::table('products')->get();
		return response()->json(['success' => true,'getproducts' => $getproducts], 200);
		
	}
}
