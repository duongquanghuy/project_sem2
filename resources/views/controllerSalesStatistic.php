<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class controllerSalesStatistic extends Controller
{
    public function showAll(request $request){
    	return view('salesStatistic');
    }
}
