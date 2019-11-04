<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class employeesController extends Controller
{
    public function viewEmployees(Request $request){

    	$employeesList = DB::table('employee')->paginate(10);
    	$employeesListCount = DB::table('employee')->count();
    	$emptyEmployeeNoti = 'There is no employee(s) on system!';

    	if ($employeesListCount > 0){

    		return view('employees.viewEmployees')->with([
    		'employeesList' => $employeesList,
    		'employeesListCount' => $employeesListCount,
    		]);

    	} else {

    		return view('employees.viewEmployees')->with([
    			'emptyEmployeeNoti' => $emptyEmployeeNoti
    		]);
    	}
    }


}
