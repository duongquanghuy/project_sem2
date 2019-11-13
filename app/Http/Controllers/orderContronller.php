<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class orderContronller extends Controller
{
    public function viewAddOrders(Request $request){
    	return view('order.addOrder');
    }
    public function printOrderID(Request $request){
        $id = $request->orderId;

        $index =1 ;

        $order = DB::table('order')
                ->select('order_id' , 'em_roll_no_order' , 'created_at' , 'discount_nullable' , 'total_money' ,'customer_fullname' ,'customer_phone')
                ->join('customer', 'customer.customer_id', '=', 'order.customer_id_order')
                ->where('order_id', $id)
                ->get();  
        $orderList = DB::table('order_details')
                ->select('product_id' , 'product_name' , 'price' , 'quantity_product' , 'totalPirice')
                ->join('product', 'product.product_id', '=', 'order_details.fk_product_id')
             
                ->where('order_details.fk_order_id', $id)
        ->get();
        return view('order.reciept')->with([
            'index' => $index,
            'orderList' => $orderList,
            'order' => $order,
           
        ]);
    }

    public function viewAddProduct(Request $request){
    	$product_id = $request->product_id;

    	$data = [];

    	$productList =	DB::table('product')->where('product_id', $product_id)->get();

        foreach ($productList as $item) {
        	$dataItem = [
        		'product_id'	   => $item->product_id,
        		'category_id' 	   => $item->category_id,
        		'product_name'     => $item->product_name,
        		'exp_status'       => $item->exp_status,
        		'price'     	   => $item->price,
                'discount_product' => $item->discount_product,
        	];
        	$data[] = $dataItem;
        }

        return $data;



    }
    public function viewOrderPostPhone(Request $request){
		$phonenumber = $request->phonenumber;


		$data = DB::table('customer')
                            ->where('customer_phone' , $phonenumber)
                            ->get();

        return $data;
	}

    public function viewOrderPostProduct(Request $request){
        $totalProducts = $request->totalProducts;
        $productQuantity = $request->productQuantity;
        $productList = $request->productList;
        $customer_id = $request->customer_id;
        $note = $request->note;
        
        $total_money = 0;
        foreach ($productQuantity as $itemQ) {
             $total_money =  $total_money + ($itemQ['price'] * $itemQ['quantity']);
        }
   
        $discount_nullable = (($total_money - $totalProducts) / $total_money) *100;

        $currentTime = date('Y-m-d H:i:s');
       
                DB::table('order')->insert([
                        'em_roll_no_order' =>  '1',
                        'customer_id_order'=> $customer_id,
                        'note'             => $note,
                        'created_at' => $currentTime,
                        'updated_at'    => null,
                        'total_money'      =>  $total_money,
                        'total_money_discount' => $totalProducts,
                        'discount_nullable'=> $discount_nullable,
                ]);
    
           
        
     
        $id = DB::getPdo()->lastInsertId();
        
        foreach ($productQuantity as $item) {
                DB::table('order_details')->insert([
                        'fk_order_id' =>  $id,
                        'fk_product_id'=> $item['product_id'],
                        'discount_per_product'  => $item['discount'],
                        'quantity_product' => (int)$item['quantity'],
                        'totalPirice' => $item['totalPirice'],
                ]);
        } 

        return $id;



    }
}
