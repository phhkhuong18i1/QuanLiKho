<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CongTrinh;

class CongTrinhController extends Controller
{
    public function getDanhSach()
    {
        $congtrinh = CongTrinh::all();
        return view('congtrinh.danhsach', ['congtrinh' => $congtrinh]);
    }

    public function getSua($id)
    {
        $congtrinh = CongTrinh::find($id);
        return view('congtrinh.sua', ['congtrinh' => $congtrinh]);
    }

    public function postSua(Request $request, $id)
    {
        $congtrinh = CongTrinh::find($id);
        $this->validate($request,
            [
                'txtTen' => 'required|min:10|max:100',
                'txtDiaChi' => 'required|min:10|max:100'
            ],
            [
                'txtTen.required' => 'Chưa nhập tên công trình',
                'txtTen.min' => 'Tên công trình phải có ít nhất 10 ký tự trở lên',
                'txtTen.max' => 'Tên công trình chỉ có tối đa 100 ký tự',
                'txtDiaChi.required' => 'Chưa nhập địa chỉ công trình',
                'txtDiaChi.min' => 'Địa chỉ công trình phải có ít nhất 10 ký tự trở lên',
                'txtDiaChi.max' => 'Địa chỉ công trình chỉ có tối đa 100 ký tự'
            ]
        );
        $congtrinh->ten = $request->txtTen;
        $congtrinh->diachi = $request->txtDiaChi;
        $congtrinh->save();
        return redirect('qlkho/congtrinh/sua/'.$id)->with('thongbao', 'Sửa thành công');
    }

    public function getThem()
    {
        return view('congtrinh.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'txtTen' => 'required|min:10|max:100',
                'txtDiaChi' => 'required|unique:coso,diachi|min:10|max:100'
            ],
            [
                'txtTen.required' => 'Chưa nhập tên công trình',
                'txtTen.min' => 'Tên công trình phải có ít nhất 10 ký tự',
                'txtTen.max' => 'Tên công trình có tối đa 100 ký tự',
                'txtDiaChi.required' => 'Chưa nhập địa chỉ công trình',
                'txtDiaChi.unique' => 'Địa chỉ công trình đã tồn tại. Nhập tên khác',
                'txtDiaChi.min' => 'Địa chỉ công trình phải có ít nhất 10 ký tự',
                'txtDiaChi.max' => 'Địa chỉ công trình có tối đa 100 ký tự'
            ]
        );
        $congtrinh = new CongTrinh;
        $congtrinh->ten = $request->txtTen;
        $congtrinh->diachi = $request->txtDiaChi;
        $congtrinh->save();
        return redirect('qlkho/congtrinh/them')->with('thongbao', 'Thêm thành công');
    }

    public function postXoa($id)
    {
        $congtrinh = CongTrinh::find($id);
        try {
            $congtrinh->delete();
        } catch(\Exception $ex) {
            // return response()->json(['error' => '429 Too many requests']);
            return redirect('qlkho/congtrinh/danhsach')->with('loi', 'Không thể xóa được');
        }
        return redirect('qlkho/congtrinh/danhsach')->with('thongbao', 'Xóa thành công');
    }
}
