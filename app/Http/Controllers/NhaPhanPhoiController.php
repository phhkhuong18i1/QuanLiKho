<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhuVuc;
use App\NhaPhanPhoi;
 
class NhaPhanPhoiController extends Controller
{
    public function getDanhSach()
    {
        $npp = NhaPhanPhoi::all();
        return view('nhaphanphoi.danhsach', ['npp' => $npp]);
    }

    public function getSua($id)
    {
        $npp = NhaPhanPhoi::find($id);
        $khuvuc = KhuVuc::all();
        return view('nhaphanphoi.sua', ['npp' => $npp, 'khuvuc' => $khuvuc]);
    }

    public function postSua(Request $request, $id)
    {
        $npp = NhaPhanPhoi::find($id);
        $this->validate($request,
            [
                'txtTen' => 'required|min:10|max:100',
                'txtDiaChi' => 'required|min:10|max:100',
                'txtSDT' => 'required|min:10|max:20',
                'txtEmail' => 'required|min:10|max:100'
            ],
            [
                // NOTE: Tên
                'txtTen.required' => 'Chưa nhập tên nhà phân phối',
                'txtTen.min' => 'Tên nhà phân phối phải có ít nhất 10 ký tự',
                'txtTen.max' => 'Tên nhà phân phối có tối đa 100 ký tự',
                // NOTE: Số điện thoại
                'txtSDT.required' => 'Chưa nhập số điện thoại',
                'txtSDT.min' => 'Số điện thoại phải có ít nhất 10 ký tự',
                'txtSDT.max' => 'Số điện thoại có tối đa 20 ký tự',
                // NOTE: Địa chỉ
                'txtDiaChi.required' => 'Chưa nhập địa chỉ nhà phân phối',
                'txtDiaChi.min' => 'Địa chỉ nhà phân phối phải có ít nhất 10 ký tự',
                'txtDiaChi.max' => 'Địa chỉ nhà phân phối có tối đa 100 ký tự',
                // NOTE: Email
                'txtEmail.required' => 'Chưa nhập email nhà phân phối',
                'txtEmail.min' => 'Email nhà phân phối phải có ít nhất 10 ký tự',
                'txtEmail.max' => 'Email nhà phân phối có tối đã 100 ký tự',
            ]
        );
        $npp->npp_ten = $request->txtTen;
        $npp->diachi = $request->txtDiaChi;
        $npp->sodienthoai = $request->txtSDT;
        $npp->email = $request->txtEmail;
        $npp->khuvuc_id = $request->sltKhuVuc;
        $npp->save();
        return redirect('qlkho/nhaphanphoi/sua/'.$id)->with('thongbao', 'Sửa thành công');
    }

    public function getThem()
    {
        $khuvuc = KhuVuc::all();
        return view('nhaphanphoi.them', ['khuvuc' => $khuvuc]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'txtTen' => 'required|unique:nhaphanphoi,ten|min:10|max:100',
                'txtDiaChi' => 'required|unique:nhaphanphoi,diachi|min:10|max:100',
                'txtSoDienThoai' => 'required|unique:nhaphanphoi,sodienthoai|min:10|max:20',
                'txtEmail' => 'required|unique:nhaphanphoi,email|min:10|max:100'
            ],
            [
                // NOTE: Tên
                'txtTen.required' => 'Chưa nhập tên nhà phân phối',
                'txtTen.unique' => 'Tên nhà phân phối đã tồn tại. Nhập tên khác',
                'txtTen.min' => 'Tên nhà phân phối phải có ít nhất 10 ký tự',
                'txtTen.max' => 'Tên nhà phân phối có tối đa 100 ký tự',
                // NOTE: Số điện thoại
                'txtSoDienThoai.required' => 'Chưa nhập số điện thoại',
                'txtSoDienThoai.unique' => 'Số điện thoại đã tồn tại. Nhập số điện thoại khác',
                'txtSoDienThoai.min' => 'Số điện thoại phải có ít nhất 10 ký tự',
                'txtSoDienThoai.max' => 'Số điện thoại có tối đa 20 ký tự',
                // NOTE: Địa chỉ
                'txtDiaChi.required' => 'Chưa nhập địa chỉ nhà phân phối',
                'txtDiaChi.unique' => 'Địa chỉ nhà phân phối đã tồn tại. Nhập địa chỉ khác',
                'txtDiaChi.min' => 'Địa chỉ nhà phân phối phải có ít nhất 10 ký tự',
                'txtDiaChi.max' => 'Địa chỉ nhà phân phối có tối đa 100 ký tự',
                // NOTE: Email
                'txtEmail.required' => 'Chưa nhập email nhà phân phối',
                'txtEmail.unique' => 'Email nhà phân phối đã tồn tại. Nhập email khác',
                'txtEmail.min' => 'Email nhà phân phối phải có ít nhất 10 ký tự',
                'txtEmail.max' => 'Email nhà phân phối có tối đã 100 ký tự',
            ]
        );
        $npp = new NhaPhanPhoi;
        $npp->ten = $request->txtTen;
        $npp->diachi = $request->txtDiaChi;
        $npp->sodienthoai = $request->txtSoDienThoai;
        $npp->email = $request->txtEmail;
        $npp->khuvuc_id = $request->sltKhuVuc;
        $npp->save();
        return redirect('qlkho/nhaphanphoi/them')->with('thongbao', 'Thêm thành công');
    }

    public function postXoa($id)
    {
        $npp = NhaPhanPhoi::find($id);
        try {
            $npp->delete();
        } catch(\Exception $ex) {
            return redirect('qlkho/nhaphanphoi/danhsach')->with('loi', 'Không thể xóa được');
        }
        return redirect('qlkho/nhaphanphoi/danhsach')->with('thongbao', 'Xóa thành công');
    }
}
