<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ThongKe;
use Carbon\Carbon;

class ThongKeController extends Controller
{
    public function filter_by_date(Request $req)
    {

        $from_date = $req->from_date;
        $to_date = $req->to_date;

        $sub365ngay = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        if($from_date == null)
        {
            $get = ThongKe::whereBetween('date',[$sub365ngay,$to_date])->orderBy('date','ASC')->get();
        }
        elseif ($to_date == null)
        {
            $get = ThongKe::whereBetween('date',[$from_date,$now])->orderBy('date','ASC')->get();
        }
        else{
        $get = ThongKe::whereBetween('date',[$from_date,$to_date])->orderBy('date','ASC')->get();
        }
        foreach($get as $key => $val)
        {
            $chart_data[] = array(
                'preiod' => $val->date,
                'order' => $val->SoDon,
                'profit' => $val->TongTien,
                'quantify' => $val->SoLuong

            );
        }

        echo $data = json_encode($chart_data);
    }

    public function chart30days(Request $req)
    {
        $data = $req->all();
        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        $get = ThongKe::whereBetween('date',[$dauthangnay,$now])->orderBy('date','ASC')->get();

        foreach($get as $key => $val)
        {
            $chart_data[] = array(
                'preiod' => $val->date,
                'order' => $val->SoDon,
                'profit' => $val->TongTien,
                'quantify' => $val->SoLuong

            );
        }

        echo $data = json_encode($chart_data);
    }

    public function dasboard_filter(Request $req)
    {
        $data = $req->all();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dauthangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoithangtruoc = Carbon::now('Asia/Ho_chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $sub7ngay = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $sub365ngay = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();

        $get1 = ThongKe::whereBetween('date',[$dauthangnay,$now])->orderBy('date','ASC')->get();

        if($data['dasboard_value'] == '7ngay')
        {
            $get = ThongKe::whereBetween('date',[$sub7ngay,$now])->orderBy('date','ASC')->get();
        }
        elseif($data['dasboard_value'] == 'thangtruoc')
        {
            $get = ThongKe::whereBetween('date',[$dauthangtruoc,$cuoithangtruoc])->orderBy('date','ASC')->get();
        }

        elseif($data['dasboard_value'] == 'thangnay')
        {
            $get = ThongKe::whereBetween('date',[$dauthangnay,$now])->orderBy('date','ASC')->get();
        }
        else{
            $get = ThongKe::whereBetween('date',[$sub365ngay,$now])->orderBy('date','ASC')->get();
        }

        
        
            
        foreach($get as $key => $val)
        {
            
            $chart_data[] = array(
                'preiod' => $val->date,
                'order' => $val->SoDon,
                'profit' => $val->TongTien,
                'quantify' => $val->SoLuong

            );
        
        }
    
        echo $data = json_encode($chart_data);
    }

    public function getDoanhThu()
    {
        $doanhthu = ThongKe::all();
        return view('baocao.doanhthu',['doanhthu'=>$doanhthu]);
    }

    public function filter_day(Request $req)
    {
        
            $from_date = $req->from_date;
            $to_date = $req->to_date;
            $sub365ngay = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
            $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            if($from_date == null)
            {
                $doanhthu = ThongKe::whereBetween('date',[$sub365ngay,$to_date])->orderBy('date','DESC')->get();
            }
            elseif($to_date == null)
            {
                $doanhthu = ThongKe::whereBetween('date',[$from_date,$now])->orderBy('date','DESC')->get();
            }
            else{
            $doanhthu = ThongKe::whereBetween('date',[$from_date,$to_date])->orderBy('date','DESC')->get();
            }
            return view('baocao.doanhthu_ajax',['doanhthu'=>$doanhthu]);
    }

    public function timkiemtheo(Request $req)
    {
        $data = $req->all();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dauthangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoithangtruoc = Carbon::now('Asia/Ho_chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $sub7ngay = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $sub365ngay = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();

        $get1 = ThongKe::whereBetween('date',[$dauthangnay,$now])->orderBy('date','ASC')->get();

        if($data['dasboard_value'] == '7ngay')
        {
            $doanhthu = ThongKe::whereBetween('date',[$sub7ngay,$now])->orderBy('date','ASC')->get();
        }
        elseif($data['dasboard_value'] == 'thangtruoc')
        {
            $doanhthu = ThongKe::whereBetween('date',[$dauthangtruoc,$cuoithangtruoc])->orderBy('date','ASC')->get();
        }

        elseif($data['dasboard_value'] == 'thangnay')
        {
            $doanhthu = ThongKe::whereBetween('date',[$dauthangnay,$now])->orderBy('date','ASC')->get();
        }
        else{
            $doanhthu = ThongKe::whereBetween('date',[$sub365ngay,$now])->orderBy('date','ASC')->get();
        }

        
        return view('baocao.doanhthu_ajax',['doanhthu'=>$doanhthu]);
    }
}
