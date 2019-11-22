<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class controllerSaleOfCompany extends Controller
{
	public function saleOfCompany(Request $request){
		return view('saleOfCompany');
	}

    //THỐNG KÊ DOANH THU TOÀN BỘ TỪ TRƯỚC ĐẾN NAY
    public function saleTotalCompany(Request $request){
        $salary = DB::table('order')->sum('order.total_money');

        return view('salesTotalCompany')->with([
            'salary' => $salary,
        ]);
    }

    //THỐNG KÊ DOANH THU THEO KHOẢNG THỜI GIAN (NGÀY BẮT ĐẦU, NGÀY KẾT THÚC)
    public function saleByTime(Request $request){
        $startDay = $request->startDay;
        $endDay = $request->endDay;

        $salary = DB::table('order')->whereBetween('created_at', [$startDay, $endDay])
                                    ->sum('order.total_money');

        return view('saleByTime')->with([
            'startDay' => $startDay,
            'endDay' => $endDay,
            'salary' => $salary,
        ]);
    }
}
