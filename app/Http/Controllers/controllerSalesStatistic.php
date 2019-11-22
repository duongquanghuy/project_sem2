<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon;
use DB;
class controllerSalesStatistic extends Controller
{
    public function showAll(request $request){
    	$now = Carbon\Carbon::now();
        $date_from = '2019-'.$now->month.'-01';
        $date_to=$now;
        $_employee= DB::table('users')
        ->leftJoin('order','users.id','=','order.user_id')
        ->SELECT(DB::raw('SUM(total_money) as `totalSales`'),DB::raw('users.id as userId'),DB::raw('`users`.`name` as `userName`'), DB::raw('users.email as userEmail'), DB::raw('users.birth_day as userBirthday'), DB::raw('users.phone_number as userPhoneNumber'), DB::raw('users.address as userAddress'), DB::raw('users.avatar as userAvatar'), DB::raw('users.level as userLevel'))
        ->Groupby('userId','order.user_id','users.name', 'users.email', 'users.birth_day', 'users.phone_number', 'users.address', 'users.avatar', 'users.level')
        ->WhereBetween('order.created_at',[$date_from,$date_to]);
        
        $employee = DB::table('users')
        ->leftJoin('order','users.id','=','order.user_id')
        ->SELECT(DB::raw('SUM(total_money) as totalSales'),DB::raw('users.id as userId'),DB::raw('`users`.`name` as `userName`'), DB::raw('users.email as userEmail'), DB::raw('users.birth_day as userBirthday'), DB::raw('users.phone_number as userPhoneNumber'), DB::raw('users.address as userAddress'), DB::raw('users.avatar as userAvatar'), DB::raw('users.level as userLevel'))
        ->Groupby('userId','order.user_id','users.name', 'users.email', 'users.birth_day', 'users.phone_number', 'users.address', 'users.avatar', 'users.level')
        ->where('total_money', null)
        ->union($_employee)
        ->paginate(10);

    	return view('salesStatistic')->with([
    		'employee' => $employee,
    		'isSearch' => false
    	]);
    }

    public function searchSales(request $request){
    	$request->validate([
            'from' => 'required',
            'to' => 'required'
        ], [
            'from.required' => 'You must enter start time',
            'to.required' => 'You must enter end time'
        ]);

        $idSearch = $request->id;
        $date_from = $request->from;
        $date_to = $request->to;

    	$_employee = DB::table('users')
        ->leftJoin('order', 'users.id', '=' , 'order.user_id')
        ->SELECT(DB::raw('SUM(total_money) as `totalSales`'),DB::raw('users.id as userId'),DB::raw('`users`.`name` as `userName`'))
        ->Groupby('userId','order.user_id','users.name')
        ->where('users.id', $idSearch)
        ->WhereBetween('order.created_at',[$date_from,$date_to]);
        // ->get();

        $employee = DB::table('users')
        ->leftJoin('order', 'users.id', '=' , 'order.user_id')
        ->SELECT(DB::raw('SUM(total_money) as `totalSales`'),DB::raw('users.id as userId'),DB::raw('`users`.`name` as `userName`'))
        ->Groupby('userId','order.user_id','users.name')
        ->where('users.id', $idSearch)
        ->where('total_money', null)
        ->union($_employee)
        ->get();
        
        return view('salesStatistic')->with([
    		'employee' => $employee,
    	]);
    }
}
