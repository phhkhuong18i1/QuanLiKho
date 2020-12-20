<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhuVuc;

class KhuVucController extends Controller
{
    public function getDanhSach()
    {
        $khuvuc = KhuVuc::all();
        return view('khuvuc.danhsach', ['khuvuc' => $khuvuc]);
    }

    public function getSua($id)
    {
        $khuvuc = KhuVuc::find($id);
        return view('khuvuc.sua', ['khuvuc'=> $khuvuc]);
    }

    public function postSua(Request $request, $id)
    {
        $khuvuc = KhuVuc::find($id);
        $this->validate($request,
            ['txtTen' => 'required|min:10|max:100',
            'txtMa' => 'required|min:1|max:100'],
            [
                'txtTen.required' => 'Chưa nhập tên khu vực',
                'txtTen.min' => 'Tên khu vực phải có ít nhất 10 ký tự',
                'txtTen.max' => 'Tên khu vực có tối đa 100 ký tự',
                'txtMa.required' => 'Chưa nhập mã khu vực',
                'txtMa.min' => 'Mã khu vực phải có ít nhất 1 ký tự',
                'txtMa.max' => 'Mã khu vực có tối đa 100 ký tự',
                
            ]
        );
        $khuvuc->kv_ma = $request->txtMa;
        $khuvuc->kv_ten = $request->txtTen;
        $khuvuc->save();
        return redirect('qlkho/khuvuc/sua/'.$id)->with('thongbao', 'Sủa thành công');
    }

    public function getThem()
    {
        return view('khuvuc.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            ['txtTen' => 'required|unique:khuvuc,kv_ten|min:10|max:100',
            'txtMa' => 'required|unique:khuvuc,kv_ma|min:10|max:100'],
            [
                'txtMa.required' => 'Chưa nhập mã khu vực',
                'txtMa.unique' => 'Mã khu vực đã tồn tại. Nhập mã khác',
                'txtMa.min' => 'Mã khu vực phải có ít nhất 1 ký tự',
                'txtMa.max' => 'Mã khu vực có tối đa 100 ký tự',
                'txtTen.required' => 'Chưa nhập tên khu vực',
                'txtTen.unique' => 'Tên khu vực đã tồn tại. Nhập tên khác',
                'txtTen.min' => 'Tên khu vực phải có ít nhất 10 ký tự',
                'txtTen.max' => 'Tên khu vực có tối đa 100 ký tự'
              
            ]
        );
        $khuvuc = new KhuVuc;
        $khuvuc->kv_ma = $request->txtMa;
        $khuvuc->kv_ten = $request->txtTen;
        $khuvuc->save();
        return redirect('qlkho/khuvuc/them')->with('thongbao', 'Thêm thành công');
    }

    public function postXoa($id)
    {
        $khuvuc = KhuVuc::find($id);
        try {
            $khuvuc->delete();
        } catch(\Exception $ex) {
            // return response()->json(['error' => '429 Too many requests']);
            return redirect('qlkho/khuvuc/danhsach')->with('loi', 'Không thể xóa được');
        }
        return redirect('qlkho/khuvuc/danhsach')->with('thongbao', 'Xóa thành công');
    }
}
