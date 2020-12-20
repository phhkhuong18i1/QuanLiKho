<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VatTu;
use App\Kho;
use App\VatTuKho;
use App\DonViTinh;
use App\NhomVatTu;
use App\ChatLuong;
use App\NhaPhanPhoi;
use App\NhaSanXuat;
use PDF;
use Validator;
use DB;

class VatTuController extends Controller
{
    public function getDanhSach()
    {
         $vattu = VatTu::all();
        $vattukho = VatTuKho::all();
        return view('vattu.danhsach',['vattu' => $vattu, 'vattukho' => $vattukho]);
    }
    public function getDanhSachTon()
    {
         $vattu = VatTu::all();
        $vattukho = VatTuKho::all();
        return view('vattu.danhsachtonkho',['vattu' => $vattu, 'vattukho' => $vattukho]);
    }

    public function getDanhSachTonKho($id)
    {
         $vattu = VatTu::all();
        $vattukho = VatTuKho::where('kho_id',$id)->get();
        return view('baocao.tonkho',['vattu' => $vattu, 'vattukho' => $vattukho]);
    }
    

    public function getPDF()
    {
        $vattukho = VatTuKho::all();
        $pdf = PDF::loadView('vattu.phieuton', ['vattukho' => $vattukho]);
        return $pdf->stream();
    }

    public function getThem()
    {
        $donvitinh = DonViTinh::all();
        $nhomvattu = NhomVatTu::all();
        $chatluong = ChatLuong::all();
        $npp = NhaPhanPhoi::all();
        $nsx = NhaSanXuat::all();
        $kho = Kho::all();
        return view('vattu.them', [
            'dvt' => $donvitinh,
            'nvt' => $nhomvattu,
            'cl' => $chatluong,
            'npp' => $npp,
            'nsx' => $nsx,
            'kho' => $kho
        ]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'txtTen' => 'required|unique:vattu,vt_ten|min:1|max:100',
                'txtGiaNhap' => 'required|max:100',
                'txtGiaTien' => 'required|max:100'
            ],
            [
                'txtTen.required' => 'Chưa nhập tên vật tư',
                'txtTen.unique' => 'Tên vật tư đã tồn tại. Nhập tên vật tư khác',
                'txtTen.min' => 'Tên vật tư phải có ít nhất 1 ký tự',
                'txtTen.max' => 'Tên vật tư có tối đa 100 ký tự',
                'txtGiaNhap.required' => 'Chưa nhập giá tiền nhập vật tư',
                'txtGiaNhap.max' => 'Giá tiền nhập vật tư có tối đa 100 ký tự',
                'txtGiaTien.required' => 'Chưa nhập giá tiền bán vật tư',
                'txtGiaTien.max' => 'Giá tiền bán vật tư có tối đa 100 ký tự'
            ]
        );
        $vattu = new VatTu;
        $vattu->vt_ten = $request->txtTen;
        $vattu->gianhap = $request->txtGiaNhap;
        $vattu->giatien = $request->txtGiaTien;
        $vattu->donvitinh_id = $request->sltDonViTinh;
        $vattu->nhomvattu_id = $request->sltNhomVatTu;
        $vattu->chatluong_id = $request->sltChatLuong;
        $vattu->nhaphanphoi_id = $request->sltNhaPhanPhoi;
        $vattu->nhasanxuat_id = $request->sltNhaSanXuat;
        $vattu->save();
        $soluong = new Vattukho;
		$soluong->vattu_id = $vattu->id;
		$soluong->kho_id = $request->sltKho;
		$soluong->soluong_nhap = $request->txtSLuong;
		$soluong->soluong_ton = $request->txtSLuong;
		$soluong->soluong_xuat = 0;
		$soluong->save();
        return redirect('qlkho/vattu/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id)
    {
        $vattu = VatTu::find($id);
        $donvitinh = DonViTinh::all();
        $nhomvattu = NhomVatTu::all();
        $chatluong = ChatLuong::all();
        $npp = NhaPhanPhoi::all();
        $nsx = NhaSanXuat::all();
        $vattu = DB::table('vattu')->where('id', $id)->first();
		$khovt = DB::table('vattukho')->where('vattu_id',$id)->first();
        return view('vattu.sua', [
            'vattu' => $vattu,
            'dvt' => $donvitinh,
            'nvt' => $nhomvattu,
            'cl' => $chatluong,
            'npp' => $npp,
            'nsx' => $nsx,
            'khovt'=> $khovt
        ]);
    }

    public function postSua(Request $request, $id)
    {
        $vattu = VatTu::find($id);
        $this->validate($request,
            [
                'txtTen' => 'required|min:10|max:100',
                'txtGiaNhap' => 'required|max:100',
                'txtGiaTien' => 'required|max:100'
            ],
            [
                'txtTen.required' => 'Chưa nhập tên vật tư',
                'txtTen.min' => 'Tên vật tư phải có ít nhất 10 ký tự',
                'txtTen.max' => 'Tên vật tư có tối đa 100 ký tự',
                'txtGiaTien.required' => 'Chưa nhập giá tiền vật tư',
                'txtGiaTien.max' => 'Giá tiền vật tư có tối đa 100 ký tự'
            ]
        );
        $vattu->vt_ten = $request->txtTen;
        $vattu->gianhap = $request->txtGiaNhap;
        $vattu->giatien = $request->txtGiaTien;
        $vattu->donvitinh_id = $request->sltDonViTinh;
        $vattu->nhomvattu_id = $request->sltNhomVatTu;
        $vattu->chatluong_id = $request->sltChatLuong;
        $vattu->nhaphanphoi_id = $request->sltNhaPhanPhoi;
        $vattu->nhasanxuat_id = $request->sltNhaSanXuat;
        $vattu->save();
        $vattukho = VatTuKho::where('vattu_id', $id)->update([
			'kho_id' => $request->sltKho,
			'soluong_nhap' => $request->txtSLuong,
			'soluong_ton' => $request->txtSLuong,
			'soluong_xuat' => 0,
			
			]);;
        return redirect('qlkho/vattu/sua/'.$id)->with('thongbao', 'Sửa thành công');
    }

    public function getNhap()
    {
        $vattu = VatTu::all();
        $kho = Kho::all();
        return view('vattu.nhap', ['vattu' => $vattu, 'kho' => $kho]);
    }

    public function postNhap(Request $request)
    {
        $vattu = $request->sltVatTu;
        $kho = $request->sltKho;
        $index = DB::table('vattukho')->where('vattu_id',$vattu)->where('kho_id',$kho)->first();
        if (empty($index)) {
            $data = new VatTuKho;
            $data->kho_id = $request->sltKho;
            $data->vattu_id = $request->sltVatTu;
            $data->soluong_ton = 0;
            $data->save();
            return redirect('qlkho/vattu/nhap')->with('thongbao', 'Nhập thành công');
        }
        $id = $index->id;
        $vattukho = VatTuKho::find($id);
        if ($vattukho->kho_id == $kho && $vattukho->vattu_id == $vattu) {
            return redirect('qlkho/vattu/nhap')->with('loi', 'Dữ kiện bị trùng');
        }
    }

    public function postXoa($id)
    {
        $vattu = VatTu::find($id);
        try {
            $vattu->delete();
        } catch(\Exception $ex) {
            return redirect('qlkho/vattu/danhsach')->with('loi', 'Không thể xóa được');
        }
        return redirect('qlkho/vattu/danhsach')->with('thongbao', 'Xóa thành công');
    }
}
