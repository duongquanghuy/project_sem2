<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class controllerEmployeeManage extends Controller
{
    public function showAll(request $request){

    	//Doanh s? trong tháng

         // $test1= DB::table('employee')
         // ->leftJoin('order','employee.em_roll_no','=','order.em_roll_no_order')
         // ->SELECT(DB::raw('SUM(total_money) as totalMoney'),DB::raw('employee.em_roll_no as idEmployee'),DB::raw('`employee`.`fullName` as `nameEmployee`'))
         // ->Groupby('idEmployee','order.em_roll_no_order','nameEmployee')
         // ->WhereBetween('order.created_at',[$date_from,$date_to]);

         // $test2= DB::table('employee')
         // ->leftJoin('order','employee.em_roll_no','=','order.em_roll_no_order')
         // ->SELECT(DB::raw('SUM(total_money) as totalMoney'),DB::raw('employee.em_roll_no as idEmployee'),DB::raw('`employee`.`fullName` as `nameEmployee`'))
         // ->Groupby('idEmployee','order.em_roll_no_order','nameEmployee')
         // ->where('total_money', null)
         // ->union($test1)

         // ->get();
         // dd($test2);

         //  
    	
    	$employee = DB::table('users')->paginate(8);;

    	return view('employeeManage')->with([
    		'employee' => $employee
    	]);
    }
}
