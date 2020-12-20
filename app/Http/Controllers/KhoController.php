<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kho;
use App\KhuVuc;

class KhoController extends Controller
{
    public function getDanhSach()
    {
        $kho = Kho::all();
        return view('kho.danhsach', ['kho' => $kho]);
    }

    public function getSua($id)
    {
        $kho = Kho::find($id);
        $khuvuc = KhuVuc::all();
        return view('kho.sua', ['kho' => $kho, 'khuvuc' => $khuvuc]);
    }

    public function postSua(Request $request, $id)
    {
        $kho = Kho::find($id);
        $this->validate($request,
            [
                'txtTen' => 'required|min:10|max:100',
                'txtSoDienThoai' => 'required|max:10',
                'txtDiaChi' => 'required|min:10|max:100',
                'txtLienHe' => 'require|min:10|max:100'
            ],
            [
                'txtTen.required' => 'Chưa nhập tên kho',
                'txtTen.min' => 'Tên kho phải có ít nhất 10 ký tự',
                'txtTen.max' => 'Tên kho có tối đa 100 ký tự',
                'txtSoDienThoai.required' => 'Chưa nhập số điện thoại',
                'txtSoDienThoai.max' => 'Số điện thoại kho có tối đa 10 ký tự',
                'txtDiaChi.required' => 'Chưa nhập địa chỉ kho',
                'txtDiaChi.min' => 'Địa chỉ kho phải có ít nhất 10 ký tự',
                'txtDiaChi.max' => 'Địa chỉ kho có tối đa 100 ký tự',
                'txtLienHe.required' => 'Chưa nhập liên hệ',
                'txtLienHe.min' => 'Liên hệ phải có ít nhất 10 ký tự',
                'txtLienHe.max' => 'Liên hệ có tối đa 100 ký tự'
            ]
        );
        $kho->kho_ten = $request->txtTen;
        $kho->kho_sdt = $request->txtSoDienThoai;
        $kho->k_diachi = $request->txtDiaChi;
        $kho->kho_lienhe = $request->txtLienHe;
        $kho->kv_id = $request->sltKhuVuc;
        $kho->save();
        return redirect('qlkho/kho/sua/'.$id)->with('thongbao', 'Sửa thành công');
    }

    public function getThem()
    {
        $khuvuc = KhuVuc::all();
        return view('kho.them', ['khuvuc' => $khuvuc]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'txtTen' => 'required|unique:kho,kho_ten|min:10|max:100',
                'txtSoDienThoai' => 'required|unique:kho,kho_sdt|max:10',
                'txtDiaChi' => 'required|unique:kho,k_diachi|min:10|max:100',
                'txtLienHe' => 'required|min:1|max:100'
            ],
            [
                'txtTen.required' => 'Chưa nhập tên kho',
                'txtTen.unique' => 'Tên kho đã tồn tại. Nhập tên khác',
                'txtTen.min' => 'Tên kho phải có ít nhất 10 ký tự',
                'txtTen.max' => 'Tên kho có tối đa 100 ký tự',
                'txtSoDienThoai.required' => 'Chưa nhập số điện thoại',
                'txtSoDienThoai.unique' => 'Số điện thoại đã tồn tại. Nhập số điện thoại khác',
                'txtSoDienThoai.min' => 'Số điện thoại phải có ít nhất 10 ký tự',
                'txtSoDienThoai.max' => 'Số điện thoại có tối đa 20 ký tự',
                'txtDiaChi.required' => 'Chưa nhập địa chỉ kho',
                'txtDiaChi.unique' => 'Địa chỉ kho đã tồn tại. Nhập địa chỉ khác',
                'txtDiaChi.min' => 'Địa chỉ kho phải có ít nhất 10 ký tự',
                'txtDiaChi.max' => 'Địa chỉ kho có tối đa 100 ký tự',
                'txtLienHe.required' => 'Chưa nhập liên hệ',
                'txtLienHe.min' => 'Liên hệ phải có ít nhất 1 ký tự',
                'txtLienHe.max' => 'Liên hệ có tối đa 100 ký tự'
            ]
        );
        $kho = new Kho;
        $kho->kho_ten = $request->txtTen;
        $kho->kho_sdt = $request->txtSoDienThoai;
        $kho->k_diachi = $request->txtDiaChi;
        $kho->kho_lienhe = $request->txtLienHe;
        $kho->khuvuc_id = $request->sltKhuVuc;
        $kho->save();
        return redirect('qlkho/kho/them')->with('thongbao', 'Thêm thành công');
    }

    public function postXoa($id)
    {
        $kho = Kho::find($id);
        try {
            $kho->delete();
        } catch(\Exception $ex) {
            return redirect('qlkho/kho/danhsach')->with('loi', 'Không thể xóa được');
        }
        return redirect('qlkho/kho/danhsach')->with('thongbao', 'Xóa thành công');
    }
}
