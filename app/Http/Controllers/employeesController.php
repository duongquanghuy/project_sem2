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

    public function editEmployee(Request $request){

    	$id = $request->id;

    	$data = DB::table('employee')->where('em_roll_no', $id)->get();

    	return $data;
    }

    public function updateEmployee(Request $request){

    	$empRollNo = $request->empRollNo;
    	$empFullName = $request->empFullName;
    	$empBirthDay = $request->empBirthDay;
    	$empPhoneNumber = $request->empPhoneNumber;
    	$empAddress = $request->empAddress;

    	$updateEmp = [
    		'fullName' => $empFullName,
    		'birth_day' => $empBirthDay,
    		'phone_number' => $empPhoneNumber,
    		'address' => $empAddress,
    	];


    	DB::table('employee')->where('em_roll_no', $empRollNo)->update($updateEmp);

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
            return $status;
        }

        $phoneNumberRegex = '/^[0-9]+$/';
        if ($empPhoneNumberAdd != ''){
            if(preg_match($phoneNumberRegex, $empPhoneNumberAdd) == false || strlen($empPhoneNumberAdd) > 13){
                $status = 'Wrong Phone Number Format!';
                return $status;
            }
        }

        $birthDayRegex = '/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/';
        if ($empBirthDayAdd != ''){
            if(preg_match($birthDayRegex, $empBirthDayAdd) == false){
                $status = 'Wrong Date Time Format!';
                return $status;
            }
        }

        $addEmp = [
    		'fullName' => $empFullNameAdd,
    		'birth_day' => $empBirthDayAdd,
    		'phone_number' => $empPhoneNumberAdd,
    		'address' => $empAddressAdd,
    	];

    	DB::table('employee')->insert($addEmp);

    	$status = "Add Employee Success!";

    	return $status;
    }

    public function searchEmployee(Request $request){
    	$nameSearch = $request->stringSearch;

	    $employeesList = DB::table('employee')->where('fullName', 'LIKE', '%' . $nameSearch . '%')->paginate(5);

    	return view('viewEmployees')->with([
			'employeesList' => $employeesList,
		]);
	}
}
