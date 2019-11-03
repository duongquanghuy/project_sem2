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
        $id   = $request->idCus;
    	$status = '';

        $cus = [
           'customer_fullname' =>$request->fullname,
            'customer_phone'    =>$request->phonenum,
        ];

        $data = DB::table('customer')
                            ->where('customer_phone' , $request->phonenum)
                            ->get();

        if (count($data) == 1) {
            $status = "so dien thoai da ton tai hoac ban chua chinh sua gi het";
         
        }else{
             DB::table('customer')
                        ->where('customer_id' ,$id)
                        ->update($cus);
            $status = "cap nhat thanh cong";
        }
  		
        return $status;

    }

    public function viewAddCustomer(Request $request){
        $id = $request->idCus;

    	$data = [
            'customer_fullname' =>$request->fullname,
            'customer_phone'    =>$request->phonenum,
        ];

        if (isset($id) && $id > 0) {
            //update
                DB::table('customer')
                        ->where('customer_id' ,$id)
                        ->update($data);

        }else{
            //insert
            DB::table('customer')->insert($data);
        }
    


    }
    public function displayCustomer(Request $request){

        $customerList = DB::table('customer')->paginate(10);
        $customerListCount = DB::table('customer')->count();

        $index =1 ;
        if(isset($request->page)){
            $index = ($request->page-1)*10+1;
        }

        return view('customers.indexCustomer')-> with([
            'index' =>$index,
            'customerList' => $customerList,
            'customerListCount' => $customerListCount
        ]);
    }
    public function viewSearchPhoneNum(Request $request){
        $phoneNum = $request->phoneNum ;

        $data = DB::table('customer')->where('customer_phone' , $phoneNum)
                                     ->get();

        return $data;

    }

    public function viewSearchCustomer(Request $request){
        $dataSearch = $request->search;

        $customerList = DB::table('customer')->where('customer_phone' , $dataSearch)
                                    ->orWhere('customer_fullname' , 'like' ,'%'.$dataSearch.'%')
                                    ->paginate(10);
        $index =1 ;
        if(isset($request->page)){
            $index = ($request->page-1)*10+1;
        }

        return view('customers.searchCustomer')-> with([
            'index' =>$index,
            'customerList' => $customerList
        ]);

    }

    public function vieweditCustomerID(Request $request){
        $id = $request->id;

        $data = DB::table('customer')->where('customer_id' , $id)
                                     ->get();         

        return $data;

    }
}
