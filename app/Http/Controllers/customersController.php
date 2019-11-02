<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class customersController extends Controller
{
    public function addCustomer(Request $request){
    	return view('customers.addCustomers');
    }

    public function viewPostPhones(Request $request){

    	$phoneNum = $request->phone_number;

    	$data = DB::table('customer')
    						->where('customer_phone' , $phoneNum)
    						->get();

  		return $data;


    }

    public function viewAddCustomer(Request $request){
   
    	$data = [
            'customer_fullname' =>$request->fullname,
            'customer_phone'    =>$request->phone_num,
        ];

    	DB::table('customer')->insert($data);


    }
    public function displayCustomer(Request $request){

        $customerList = DB::table('customer')->paginate(10);

        $index =1 ;
        if(isset($request->page)){
            $index = ($request->page-1)*10-1;
        }

        return view('customers.indexCustomer')-> with([
            'index' =>$index,
            'customerList' => $customerList
        ]);
    }
    public function viewSearchPhoneNum(Request $request){
        $phoneNum = $request->phoneNum ;

        $data = DB::table('customer')->where('customer_phone' , $phoneNum)
                                     ->get();

        return $data;

    }
}
