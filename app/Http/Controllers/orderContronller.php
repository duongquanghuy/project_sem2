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

        $currentTime = date('Y-m-d');
       
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


    ///////////////////////////index//////////////////////////////////////
    public function displayOrder(Request $request){
        $order_id = $request->search;
        $orderList;
        $countOrderList;
        $index = 1 ;
        $noThing = 1;
        if($order_id != '' && (int)$order_id > 0){
            $orderList = DB::table('order')
                        ->where('order_id' , $order_id)
                       ->paginate(10);
             if($orderList == '' && count($orderList) == 0){
               $orderList = DB::table('order')->paginate(10);
               $noThing = 2;
             }          

        }else{
            $orderList = DB::table('order')->paginate(10);
            $noThing = 3;
        }
            $countOrderList = DB::table('order')->count(); 
            if(isset($request->page)){
                $index = ($request->page-1)*10+1;
            }
            return view('order.indexOrder')->with([
                'index' =>$index,
                'orderList' => $orderList,
                'countOrderList' => $countOrderList,
                'noThing' => $noThing,
            ]);

     

    }
 
    public function searchDaytime(Request $request){
    
        $date =   date('Y-m-d', strtotime($request->bday));
        $orderLists;
        $index = 1 ;
    
        $orderLists  =  (DB::table('order')->whereDate('created_at','=', $date))
                       ->paginate(10);
                    
       
        if(isset($request->page)){
            $index = ($request->page-1)*10+1;
        }    
        $orderLists->appends(request()->input())->links();

        return view('order.indexSearchDay')->with([
                    'index' => $index,
                    'orderLists' => $orderLists,
        ]);
    }
//////////////////////////////////////////////////
    public function editOrderID(Request $request){
            $id = $request->id;
            $index = 1 ;
            $fk_order_id = '';
            $orderList = DB::table('order_details')
                ->select('fk_order_id', 'product_id','product_name' , 'price','discount_product' , 'quantity_product' , 'totalPirice')
                ->join('product', 'product.product_id', '=', 'order_details.fk_product_id')
                ->where('order_details.fk_order_id', $id)
                ->get();
            foreach ($orderList as $item ) {
                $fk_order_id = $item->fk_order_id;
            
            }
              
            return view('order.editOrder')->with([
                'index'     => $index,
                'orderList' => $orderList,
                'fk_order_id' => $fk_order_id,
               
            ]);

    }

    public function addProductOreder(Request $request){
        $productID = $request->orde_product_id;
        $orderID = $request->fk_order_id;

        $data = DB::table('order_details')
                        ->where('fk_order_id','=',$orderID)
                        ->where('fk_product_id','=', $productID)
                        ->get();
        return $data;

    }

    public function addProductQuantityOreders(Request $request){
        $quantity = $request->quantity;
        $productID = $request->order_product_id;
        $orderID = $request->fk_order_id;
        $quantityID = 0;
        $quantityProduct = 0;
        $total = 0;
        $totalProduct ;
        $status = '';
        $data = DB::table('order_details')
                        ->select('fk_order_id', 'product_id','product_name'  , 'price','discount_product' , 'quantity_product','product_on_store' , 'totalPirice')
                        ->join('product', 'product.product_id', '=', 'order_details.fk_product_id')
                        ->where('fk_order_id','=',$orderID)
                        ->where('fk_product_id','=', $productID)
                        ->get();
        if ($data !='' && count($data) >0) {

            foreach ($data as $item) {

                if((-$quantity) < $item->quantity_product){
                    $quantityID  =  (int)$item->quantity_product  + (int)($quantity);
                    $quantityProduct  =  (int)$item->product_on_store  - (int)($quantity);
                    $total = $quantityID * ($item->price * ($item->discount_product/100));
                    $totalProduct = ($quantityID * $item->price) - $total;
                    DB::table('order_details')
                      ->where('fk_order_id','=',$orderID)
                      ->where('fk_product_id','=', $productID)
                      ->update([
                            'quantity_product' => $quantityID,
                            'totalPirice' => $totalProduct
                       ]);
                      /////
                    DB::table('product')
                      ->where('product_id','=',$productID)
                     
                      ->update([
                            'product_on_store' => $quantityProduct,
                           
                       ]);
                    $status = 'more success';
                    break;
                }else{
                    $status = 'Product number is invalid';
                     break;
                }
            }   
           
        }else{
            $orderProduct = DB::table('product')->where('product_id' , $productID)->get();

            if($quantity > 0){
                foreach ($orderProduct as $item ) {
                        $total = $quantity * ($item->price * ($item->discount_product/100));
                        $totalProduct = ($quantity * $item->price) - $total;
                        $quantityProduct  =  (int)$item->product_on_store  - (int)($quantity);

                          DB::table('order_details')->insert([
                            'fk_order_id' =>  $orderID,
                            'fk_product_id'=> $productID,
                            'discount_per_product' => $item->discount_product,
                            'quantity_product' => $quantity,
                            'totalPirice' => $totalProduct,
                        ]);
                          ////
                        DB::table('product')
                          ->where('product_id','=',$productID)
                         
                          ->update([
                                'product_on_store' => $quantityProduct,
                               
                           ]);
                    $status = 'more success';
                    break;
            }
           }else{
                $status = 'Product number is invalid';
           }

        }
       
        return $status;
    }   
    public function addProductQuantityOrederButton(Request $request){
            $quantity   =  $request->quantity;
            $product_id =  $request->product_id;
            $order_id   =  $request->fk_order_id;
            $quantityProduct= 0;
            $product = DB::table('product')->where('product_id' , $product_id)->get();
                foreach ($product as $item ) {
                    $quantityProduct  =  (int)$item->product_on_store  - (int)($quantity);
                
                   
                    

                    $total = $quantityID * ($item->price * ($item->discount_product/100));
                    $totalProduct = ($quantityID * $item->price) - $total;
                    DB::table('order_details')
                      ->where('fk_order_id','=',$order_id)
                      ->where('fk_product_id','=', $productID)
                      ->update([
                            'quantity_product' => $quantityID,
                            'totalPirice' => $totalProduct
                       ]);
                      /////
                    DB::table('product')
                      ->where('product_id','=',$productID)
                     
                      ->update([
                            'product_on_store' => $quantityProduct,
                           
                       ]);
                    $status = 'more success';
                    break;
                }

    }
}