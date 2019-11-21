<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class overviewController extends Controller
{
    public function viewOverview(Request $request){
    	return view('overview.overview');
    }
}
