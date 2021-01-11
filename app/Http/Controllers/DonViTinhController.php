<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DonViTinh;

class DonViTinhController extends Controller
{
    public function getDanhSach()
    {
        $donvitinh = DonViTinh::all();
        return view('donvitinh.danhsach', ['donvitinh' => $donvitinh]);
    }

    public function getSua($id)
    {
        $donvitinh = DonViTinh::find($id);
        return view('donvitinh.sua', ['donvitinh' => $donvitinh]);
    }
 
    public function postSua(Request $request, $id)
    {
        $donvitinh = DonViTinh::find($id);
        $this->validate($request,
            ['txtTen' => 'required|min:2|max:50'],
            [
                'txtTen.required' => 'Chưa nhập tên đơn vị tính',
                'txtTen.min' => 'Tên đơn vị tính phải có ít nhất 2 ký tự',
                'txtTen.max' => 'Tên đơn vị tính có tối đa 50 ký tự'
            ]
        );
        $donvitinh->dvt_ma = $request->txtMa;
        $donvitinh->dvt_ten = $request->txtTen;
        $donvitinh->save();
        return redirect('qlkho/donvitinh/sua/'.$id)->with('thongbao', 'Sửa thành công');
    }

    public function getThem()
    {
        return view('donvitinh.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            ['txtTen' => 'required|unique:donvitinh,dvt_ten|min:2|max:50',
                'txtMa'=> 'required|unique:donvitinh,dvt_ma'],
                
            [
                'txtTen.required' => 'Chưa nhập tên đơn vị tính',
                'txtTen.unique' => 'Tên đơn vị tính đã tồn tại. Nhập tên khác',
                'txtTen.min' => 'Tên đơn vị tính phải có ít nhất 2 ký tự',
                'txtTen.max' => 'Tên đơn vị tính có tối đa 50 ký tự',
                'txtMa.unique' => 'Mã đơn vị tính đã tồn tại',
                'txtMa.required' => 'Chưa nhập mã đơn vị tính'
            ]
        );
        $donvitinh = new DonViTinh;
        $donvitinh->dvt_ma = $request->txtMa;
        $donvitinh->dvt_ten = $request->txtTen;
        $donvitinh->save();
        return redirect('qlkho/donvitinh/them')->with('thongbao', 'Thêm thành công');
    }

    public function getXoa(Request $request)
    {
        $id = $request->get('ID');
        $dvt = DonViTinh::where('id',$id)->first();
        return response()->json([
            'dvt'=>$dvt,
            ]);
    }
    public function postXoa($id)
    {
        $donvitinh = DonViTinh::find($id);
        try {
            $donvitinh->delete();
        } catch(\Exception $ex) {
            // return response()->json(['error' => '429 Too many requests']);
            return redirect('qlkho/donvitinh/danhsach')->with('loi', 'Không thể xóa được');
        }
        return redirect('qlkho/donvitinh/danhsach')->with('thongbao', 'Xóa thành công');
    }
}
