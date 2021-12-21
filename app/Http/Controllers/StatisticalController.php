<?php

namespace App\Http\Controllers;

use App\Models\Statistical;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatisticalController extends Controller
{
    public function filter()
    {
        $data = $request->all();

        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        if($data['dashboard_value'] == '7ngay'){
            $get = Statistical::whereBetween([$sub7days, $now])->orderBy('date', 'ASC')->get();
        }elseif($data['dashboard_value'] == 'thangtruoc'){
            $get = Statistical::whereBetween([$dau_thangtruoc, $cuoi_thangtruoc])->orderBy('date', 'ASC')->get();
        }elseif($data['dashboard_value'] == 'thangnay'){
            $get = Statistical::whereBetween([$dauthangnay, $now])->orderBy('date', 'ASC')->get();
        }else{
            $get = Statistical::whereBetween([$sub365days, $now])->orderBy('date', 'ASC')->get();
        }

        foreach($get as $key=>$val){
            $chart_data[] = array(
                'date' => $val->date,
                'turnover' => $val->turnover,
                'total_order' => $val->total_order
            );
        }
        echo $data = json_encode($chart_data);
    }
}
