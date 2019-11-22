<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon;
use DB;

class controllerEmployeeManage extends Controller
{
    public function showAll(request $request){

    	//Doanh s? trong tháng
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
        // dd($employee);
        // $employee = DB::table('users')->paginate(8);;
        $levelEmployeeUpdate = null;
        return view('employeeManage')->with([
          'employee' => $employee,
          'levelEmployeeUpdate' => $levelEmployeeUpdate, 
          'edit' => false
      ]);
    }

    public function editEmployee(request $request){
        if(isset($request->id) && $request->id != null){

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

            $id = $request->id;
            $employeeUpdate = DB::table('users')
            ->where('id', $id)
            ->get();

            if($employeeUpdate != null && count($employeeUpdate) >0){
                $nameEmployee = $employeeUpdate[0]->name;
                $avatarEmployee = $employeeUpdate[0]->avatar;
                $levelEmployeeUpdate = $employeeUpdate[0]->level;
                $emailEmployeeUpdate = $employeeUpdate[0]->email;
                $phoneEmployeeUpdate = $employeeUpdate[0]->phone_number;
                $birthdayEmployeeUpdate = $employeeUpdate[0]->birth_day;
                $addressEmployeeUpdate = $employeeUpdate[0]->address;

                return view('employeeManage')->with([
                    'employee' => $employee,
                    'idEmployeeUpdate' => $id,
                    'nameEmployeeUpdate' => $nameEmployee,
                    'avatarEmployeeUpdate' => $avatarEmployee,
                    'levelEmployeeUpdate' => $levelEmployeeUpdate,
                    'emailEmployeeUpdate' => $emailEmployeeUpdate,
                    'phoneEmployeeUpdate' => $phoneEmployeeUpdate,
                    'birthdayEmployeeUpdate' => $birthdayEmployeeUpdate,
                    'addressEmployeeUpdate' => $addressEmployeeUpdate,
                    'edit' => true
                ]);
            }
        }
    }

    public function updateEmployee(request $request){

        $id = $request->id;
        $name = $request->name;
        $avatar = $request->urlAvatar;
        $email = $request->email;
        $level = $request->position;
        $phone = $request->phone;
        $birthday = $request->birthday;
        $address = $request->address;

        DB::table('users')
            ->where('id', $id)
            ->update([
                'name' => $name,
                'avatar' => $avatar,
                'email' => $email,
                'level' => $level,
                'phone_number' => $phone,
                'birth_day' => $birthday,
                'address' => $address
            ]);

            return redirect()->route('employee-manage');
    }

    public function deleteEmployee(Request $request){
        DB::table('users')
        ->where('id', $request->id)
        ->delete();
    }
}
