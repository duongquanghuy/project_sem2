<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class employeesController extends Controller
{
    public function viewEmployees(Request $request){

    	$employeesList = DB::table('users')->paginate(10);
    	$employeesListCount = DB::table('users')->count();
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

    public function editEmployee(Request $request){

    	$id = $request->id;

    	$data = DB::table('users')->where('id', $id)->get();

    	return $data;
    }

    public function updateEmployee(Request $request){

    	$empRollNo = $request->empRollNo;
    	$empFullName = $request->empFullName;
    	$empBirthDay = $request->empBirthDay;
    	$empPhoneNumber = $request->empPhoneNumber;
    	$empAddress = $request->empAddress;

    	$updateEmp = [
    		'name' => $empFullName,
    		'birth_day' => $empBirthDay,
    		'phone_number' => $empPhoneNumber,
    		'address' => $empAddress,
    	];


    	DB::table('users')->where('id', $empRollNo)->update($updateEmp);

    	$status = 'Update Employee Success!';

    	return $status;
    }

    public function addEmployee(Request $request){

    	$empFullNameAdd = $request->empFullNameAdd;
    	$empBirthDayAdd = $request->empBirthDayAdd;
    	$empPhoneNumberAdd = $request->empPhoneNumberAdd;
    	$empAddressAdd = $request->empAddressAdd;

    	if ($empFullNameAdd == ''){
            $status = "Fullname cannot be null!";
            return $data;
        }

        $phoneNumberRegex = '/^[0-9]+$/';
        if ($empPhoneNumberAdd != ''){
            if(preg_match($phoneNumberRegex, $empPhoneNumberAdd) == false || strlen($empPhoneNumberAdd) > 13){
                $data = 'Wrong Phone Number Format!';
                return $data;
            }
        }

        $birthDayRegex = '/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/';
        if ($empBirthDayAdd != ''){
            if(preg_match($birthDayRegex, $empBirthDayAdd) == false){
                $data = 'Wrong Date Time Format!';
                return $data;
            }
        }

        $addEmp = [
    		'name' => $empFullNameAdd,
    		'birth_day' => $empBirthDayAdd,
    		'phone_number' => $empPhoneNumberAdd,
    		'address' => $empAddressAdd,
    	];

    	DB::table('users')->insert($addEmp);

    	$data = "Add Employee Success!";

    	return $data;
    }

    public function searchEmployee(Request $request){
    	$nameSearch = $request->stringSearch;

	    $employeesList = DB::table('users')->where('name', 'LIKE', '%' . $nameSearch . '%')->paginate(5);

    	return view('viewEmployees')->with([
			'employeesList' => $employeesList,
		]);
	}
}
