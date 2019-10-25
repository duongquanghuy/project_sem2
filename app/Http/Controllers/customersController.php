<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class customersController extends Controller
{
    public function addCustomer(Request $request){
    	return view('customers.addCustomers');
    }
}
