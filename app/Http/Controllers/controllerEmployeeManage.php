<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class controllerEmployeeManage extends Controller
{
    public function showAll(request $request){
    	$employee = DB::table('user')->get();
    }
}
