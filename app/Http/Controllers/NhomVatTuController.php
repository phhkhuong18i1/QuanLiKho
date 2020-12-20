<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhomVatTu;

class NhomVatTuController extends Controller
{
    public function getDanhSach()
    {
        $nhomvattu = NhomVatTu::all();
        return view('nhomvattu.danhsach', ['nhomvattu' => $nhomvattu]);
    }

    public function getSua($id)
    {
        $nhomvattu = NhomVatTu::find($id);
        return view('nhomvattu.sua', ['nhomvattu' => $nhomvattu]);
    }

    public function postSua(Request $request, $id)
    {
        $nhomvattu = NhomVatTu::find($id);
        $this->validate($request,
            ['txtTen' => 'required|min:10|max:100'],
            [
                'txtTen.required' => 'Chưa nhập tên nhóm vật tư',
                'txtTen.min' => 'Tên nhóm vật tư phải có ít nhất 10 ký tự',
                'txtTen.max' => 'Tên nhóm vật tư có tối đa 100 ký tự'
            ]
        );
        $nhomvattu->nvt_ma = $request->txtMa;
        $nhomvattu->nvt_ten = $request->txtTen;
        $nhomvattu->save();
        return redirect('qlkho/nhomvattu/sua/'.$id)->with('thongbao', 'Sửa thành công');
    }

    public function getThem()
    {
        return view('nhomvattu.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            ['txtTen' => 'required|unique:nhomvattu,ten|min:10|max:100'],
            [
                'txtTen.required' => 'Chưa nhập tên nhóm vật tư',
                'txtTen.unique' => 'Tên nhóm vật tư đã tồn tại. Nhập tên khác',
                'txtTen.min' => 'Tên nhóm vật tư phải có ít nhất 10 ký tự',
                'txtTen.max' => 'Tên nhóm vật tư có tối đa 100 ký tự'
            ]
        );
        $nhomvattu = new NhomVatTu;
        $nhomvattu->nvt_ma = $request->txtMa;
        $nhomvattu->nvt_ten = $request->txtTen;
        return redirect('qlkho/nhomvattu/them')->with('thongbao', 'Thêm thành công');
    }

    public function postXoa($id) 
    {
        $nhomvattu = NhomVatTu::find($id);
        try {
            $nhomvattu->delete();
        } catch(\Exception $ex) {
            // return response()->json(['error' => '429 Too many requests']);
            return redirect('qlkho/nhomvattu/danhsach')->with('loi', 'Không thể xóa được');
        }
        return redirect('qlkho/nhomvattu/danhsach')->with('thongbao', 'Xóa thành công');
    }
}
