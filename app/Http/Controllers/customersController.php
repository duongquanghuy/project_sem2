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
     
        foreach ($data as $item) {
        
            
            if($item->customer_fullname != $request->fullname && $item->customer_id == $id && $item->customer_phone == $request->phonenum){
                DB::table('customer')
                        ->where('customer_id' ,$id)
                        ->update($cus);
                $status = "cap nhat thanh cong fullname";

            }else if ($item->customer_phone == $request->phonenum && $item->customer_id == $id) {
                $status = "ban chua chinh sua gi het";
         
            }else{
                $status = "so dien thoai da ton tai";
            }

        }
        if (count($data) == 0) {
               DB::table('customer')
                        ->where('customer_id' ,$id)
                        ->update($cus);
                $status = "cap nhat thanh cong phone";
        }
      
  		
        return $status;

    }

    public function viewAddCustomer(Request $request){
      

    	$data = [
            'customer_fullname' =>$request->fullname,
            'customer_phone'    =>$request->phonenum,
        ];

            //insert
        DB::table('customer')->insert($data);

        $dataCustomer =  Db::table('customer')->where('customer_phone',$request->phonenum)->get(); 

        return $dataCustomer; 
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
