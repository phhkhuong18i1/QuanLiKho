<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhaSanXuat;
use App\KhuVuc;
class NhaSanXuatController extends Controller
{
    public function getDanhSach()
    {
        $nsx = NhaSanXuat::all();
        return view('nhasanxuat.danhsach', ['nsx' => $nsx]);
    }

    public function getSua($id)
    {   $khuvuc = KhuVuc::all();
        $nsx = NhaSanXuat::find($id);
        return view('nhasanxuat.sua', ['nsx' => $nsx,'khuvuc'=>$khuvuc]);
    }

    public function postSua(Request $request, $id)
    {
        $nsx = NhaSanXuat::find($id);
        $this->validate($request,
            ['txtTen' => 'required|min:10|max:100'],
            [
                'txtTen.required' => 'Chưa nhập tên nhà sản xuất',
                'txtTen.min' => 'Tên nhà sản xuất phải có ít nhất 10 ký tự',
                'txtTen.max' => 'Tên nhà sản xuất có tối đa 100 ký tự'
            ]
        );
        $nsx->nsx_ma = $request->txtMa;
        $nsx->nsx_ten = $request->txtTen;
        $nsx->kv_id = $request->sltKhuVuc;
        $nsx->save();
        return redirect('qlkho/nhasanxuat/sua/'.$id)->with('thongbao', 'Sửa thành công');
    }

    public function getThem()
    { $khuvuc = KhuVuc::all();
        return view('nhasanxuat.them',compact('khuvuc'));
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
    
            [   'txtMa' => 'required|unique:nhasanxuat,nsx_ma|min:1|max:10',
                'txtTen' => 'required|unique:nhasanxuat,ten|min:10|max:100'],
            [
                'txtMa.required' => 'Chưa nhập mã nhà sản xuất',
                'txtMa.unique' => 'Mã nhà sản xuất đã tồn tại. Nhập mã khác',
                'txtMa.min' => 'Mã nhà sản xuất phải có ít nhất 1 ký tự',
                'txtMa.max' => 'Mã nhà sản xuất có tối đa 10 ký tự',
                'txtTen.required' => 'Chưa nhập tên nhà sản xuất',
                'txtTen.unique' => 'Tên nhà sản xuất đã tồn tại. Nhập tên khác',
                'txtTen.min' => 'Tên nhà sản xuất phải có ít nhất 10 ký tự',
                'txtTen.max' => 'Tên nhà sản xuất có tối đa 100 ký tự'
            ]
        );
        $nsx = new NhaSanXuat;
        $nsx->nsx_ma = $request->txtMa;
        $nsx->nsx_ten = $request->txtTen;
        $nsx->kv_id = $request->$sltKhuVuc;
        $nsx->save();
        return redirect('qlkho/nhasanxuat/them')->with('thongbao', 'Thêm thành công');
    }

    public function postXoa($id)
    {
        $nsx = NhaSanXuat::find($id);
        try {
            $nsx->delete();
        } catch(\Exception $ex) {
            // return response()->json(['error' => '429 Too many requests']);
            return redirect('qlkho/nhasanxuat/danhsach')->with('loi', 'Không thể xóa được');
        }
        return redirect('qlkho/nhasanxuat/danhsach')->with('thongbao', 'Xóa thành công');
    }
}
