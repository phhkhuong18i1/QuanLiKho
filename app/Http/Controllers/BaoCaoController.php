<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VatTu;
use App\VatTuKho;
use App\Kho;
use App\NhomVatTu;
use DB;
use PDF;
use App\NhaPhanPhoi;
class BaoCaoController extends Controller
{

    public function getTonKho()
    {
        $vattu = VatTu::all();
        $vattukho = VatTuKho::join('vattu','vattu.id','=','vattukho.vattu_id')
        ->join('donvitinh','donvitinh.id','=','vattu.donvitinh_id')
        ->join('khovt','khovt.id','=','vattukho.kho_id')
            ->select(
                 'vattukho.soluong_nhap','vattukho.soluong_xuat',
                 'vattukho.soluong_ton','donvitinh.dvt_ten',
                 'vattu.id','vattu.vt_ten',
                 'vattu.giatien','vattu.created_at','khovt.kho_ten' )
            ->get();
        return view('baocao.tonkho',['vattu' => $vattu, 'vattukho' => $vattukho]);
       
    }

    public function getKhoHang(Request $req)
	{
        $khovt = Kho::where('id',$req->id)->first();
        $vattukho = VatTuKho::where('kho_id',$khovt->id)
        ->join('vattu','vattu.id','=','vattukho.vattu_id')
        ->join('donvitinh','donvitinh.id','=','vattu.donvitinh_id')
            ->select(
                 'vattukho.soluong_nhap','vattukho.soluong_xuat',
                 'vattukho.soluong_ton','donvitinh.dvt_ten',
                 'vattu.id','vattu.vt_ten',
                 'vattu.giatien','vattu.created_at' )
            ->get();
        $tongsl = DB::table('vattukho')
        ->where('vattukho.kho_id',$khovt->id)
        ->sum('soluong_ton');
    $tongtien = DB::table('vattukho')
        ->where('vattukho.kho_id',$khovt->id)
        ->join('vattu','vattu.id','=','vattukho.vattu_id')
        ->select(DB::raw('sum(vattukho.soluong_ton*vattu.giatien) as thanhtien') )
        ->get();
		return view('baocao.baocaokho',compact('khovt','vattukho','tongsl','tongtien'));
    }
    
    public function getNhomVT(Request $req)
	{
        $nhomvt = NhomVatTu::where('id',$req->id)->first();
        // $vattu = VatTu::where('nhomvattu_id',$nhomvt->id)
        // ->join('vattukho','vattu.id','=','vattukho.vattu_id')
        // ->select(
        //     DB::raw('sum(vattukho.soluong_nhap) as nhap'),
        //     DB::raw('sum(vattukho.soluong_xuat) as xuat'),
        //     DB::raw('sum(vattukho.soluong_ton) as ton'))
        // ->get();
        
        $vattu = DB::table('vattu')
        ->where('vattu.nhomvattu_id',$nhomvt->id)
        ->join('vattukho','vattu.id','=','vattukho.vattu_id')
        ->join('donvitinh','donvitinh.id','=','vattu.donvitinh_id')
        ->select(
            DB::raw('sum(vattukho.soluong_nhap) as nhap'),
            DB::raw('sum(vattukho.soluong_xuat) as xuat'),
            DB::raw('sum(vattukho.soluong_ton) as ton'),
            'donvitinh.dvt_ten',
            'vattu.id','vattu.vt_ten',
            'vattu.giatien','vattu.created_at'
            )
            ->groupBy('donvitinh.dvt_ten',
            'vattu.id','vattu.vt_ten',
            'vattu.giatien','vattu.created_at')
        ->get();
        $count = VatTu::where('nhomvattu_id',$nhomvt->id)->count();
        $tong = VatTu:: where('nhomvattu_id',$nhomvt->id)
            ->join('vattukho','vattu.id','=','vattukho.vattu_id')
            ->select(
                DB::raw('sum(vattukho.soluong_ton*vattu.giatien) as thanhtien')
                )
            ->get();

		return view('baocao.baocaonvt',compact('nhomvt','vattu','count','tong'));
    }
    
    public function getNPP(Request $req)
	{
        $nhapp = NhaPhanPhoi::where('id',$req->id)->first();
       
        $vattu = DB::table('vattu')
        ->where('vattu.nhaphanphoi_id',$nhapp->id)
        ->join('vattukho','vattu.id','=','vattukho.vattu_id')
        ->join('donvitinh','donvitinh.id','=','vattu.donvitinh_id')
        ->select(
            DB::raw('sum(vattukho.soluong_nhap) as nhap'),
            DB::raw('sum(vattukho.soluong_xuat) as xuat'),
            DB::raw('sum(vattukho.soluong_ton) as ton'),
            'donvitinh.dvt_ten',
            'vattu.id','vattu.vt_ten',
            'vattu.giatien','vattu.created_at'
            )
            ->groupBy('donvitinh.dvt_ten',
            'vattu.id','vattu.vt_ten',
            'vattu.giatien','vattu.created_at')
        ->get();
        $count = VatTu::where('nhaphanphoi_id',$nhapp->id)->count();
        $tong = DB::table('vattu')
                                                    ->where('vattu.nhaphanphoi_id',$nhapp->id)
                                                    ->join('vattukho','vattu.id','=','vattukho.vattu_id')
                                                    ->select(
                                                        DB::raw('(vattukho.soluong_ton*vattu.giatien) as thanhtien')
                                                        )
                                                    ->sum(DB::raw('(vattukho.soluong_ton*vattu.giatien)'));

		return view('baocao.baocaonpp',compact('nhapp','vattu','count','tong'));
    }
    public function getPDFNVT($id)
    {
        $nhomvt = NhomVatTu::where('id',$id)->first();

           $vattu = DB::table('vattu')
        ->where('vattu.nhomvattu_id',$nhomvt->id)
        ->join('vattukho','vattu.id','=','vattukho.vattu_id')
        ->join('donvitinh','donvitinh.id','=','vattu.donvitinh_id')
        ->select(
            DB::raw('sum(vattukho.soluong_nhap) as nhap'),
            DB::raw('sum(vattukho.soluong_xuat) as xuat'),
            DB::raw('sum(vattukho.soluong_ton) as ton'),
            'donvitinh.dvt_ten',
            'vattu.id','vattu.vt_ten',
            'vattu.giatien','vattu.created_at'
            )
            ->groupBy('donvitinh.dvt_ten',
            'vattu.id','vattu.vt_ten',
            'vattu.giatien','vattu.created_at')
        ->get();

        $tong = VatTu:: where('nhomvattu_id',$nhomvt->id)
        ->join('vattukho','vattu.id','=','vattukho.vattu_id')
        ->select(
            DB::raw('sum(vattukho.soluong_ton*vattu.giatien) as thanhtien')
            )
        ->get();
        $pdf = PDF::loadView('baocao.phieutonnvt',compact('nhomvt','vattu','tong'));
        return $pdf->stream();
    }
    public function getPDFK($id)
    {
        $khovt = Kho::where('id',$id)->first();

        $vattukho = VatTuKho::where('kho_id',$khovt->id)
        ->join('vattu','vattu.id','=','vattukho.vattu_id')
        ->join('donvitinh','donvitinh.id','=','vattu.donvitinh_id')
            ->select(
                 'vattukho.soluong_nhap','vattukho.soluong_xuat',
                 'vattukho.soluong_ton','donvitinh.dvt_ten',
                 'vattu.id','vattu.vt_ten',
                 'vattu.giatien','vattu.created_at' )
            ->get();
        $tongsl = DB::table('vattukho')
        ->where('vattukho.kho_id',$khovt->id)
        ->sum('soluong_ton');
    $tongtien = DB::table('vattukho')
        ->where('vattukho.kho_id',$khovt->id)
        ->join('vattu','vattu.id','=','vattukho.vattu_id')
        ->select(DB::raw('sum(vattukho.soluong_ton*vattu.giatien) as thanhtien') )
        ->get();
		
        $pdf = PDF::loadView('baocao.phieutonkho',compact('khovt','vattukho','tongsl','tongtien'));
        return $pdf->stream();
    }

    public function getPDFNPP($id)
    {
        $nhapp = NhaPhanPhoi::where('id',$id)->first();
       
        $vattu = DB::table('vattu')
        ->where('vattu.nhaphanphoi_id',$nhapp->id)
        ->join('vattukho','vattu.id','=','vattukho.vattu_id')
        ->join('donvitinh','donvitinh.id','=','vattu.donvitinh_id')
        ->select(
            DB::raw('sum(vattukho.soluong_nhap) as nhap'),
            DB::raw('sum(vattukho.soluong_xuat) as xuat'),
            DB::raw('sum(vattukho.soluong_ton) as ton'),
            'donvitinh.dvt_ten',
            'vattu.id','vattu.vt_ten',
            'vattu.giatien','vattu.created_at'
            )
            ->groupBy('donvitinh.dvt_ten',
            'vattu.id','vattu.vt_ten',
            'vattu.giatien','vattu.created_at')
        ->get();
        $count = VatTu::where('nhaphanphoi_id',$nhapp->id)->count();
        $tong = DB::table('vattu')
                                                    ->where('vattu.nhaphanphoi_id',$nhapp->id)
                                                    ->join('vattukho','vattu.id','=','vattukho.vattu_id')
                                                    ->select(
                                                        DB::raw('(vattukho.soluong_ton*vattu.giatien) as thanhtien')
                                                        )
                                                    ->sum(DB::raw('(vattukho.soluong_ton*vattu.giatien)'));

		
        $pdf = PDF::loadView('baocao.phieutonnpp',compact('nhapp','vattu','count','tong'));
        return $pdf->stream();
    }
}
