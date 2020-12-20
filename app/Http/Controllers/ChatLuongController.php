<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChatLuong;

class ChatLuongController extends Controller
{
    public function getDanhSach()
    {
        $chatluong = ChatLuong::all();
        return view('chatluong.danhsach', ['chatluong' => $chatluong]);
    }

    public function getSua($id)
    {
        $chatluong = ChatLuong::find($id);
        return view('chatluong.sua', ['chatluong' => $chatluong]);
    }

    public function postSua(Request $request, $id)
    {
        $chatluong = ChatLuong::find($id);
        $this->validate($request,
            [   'txtMa' => 'required|min:1|max:10',
                'txtTen' => 'required|min:3|max:20'],
            [
                
                'txtMa.required' => 'Chưa nhập mã chất lượng',
                'txtMa.min' => 'Mã chất lượng phải có ít nhất 1 ký tự trở lên',
                'txtMa.max' => 'Mã chất lượng chỉ có tối đa 20 ký tự',
                'txtTen.required' => 'Chưa nhập tên chất lượng',
                'txtTen.min' => 'Tên chất lượng phải có ít nhất 3 ký tự trở lên',
                'txtTen.max' => 'Tên chất lượng chỉ có tối đa 20 ký tự'
            ]
        );
        $chatluong->cl_ma = $request->txtMa;
        $chatluong->cl_ten = $request->txtTen;
        $chatluong->save();
        return redirect('qlkho/chatluong/sua/'.$id)->with('thongbao', 'Sửa thành công');
    }

    public function getThem()
    {
        return view('chatluong.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [   'txtMa' => 'required|unique:chatluong,cl_ma|min:1|max:10',
                'txtTen' => 'required|unique:chatluong,cl_ten|min:3|max:20'],
            [
                'txtMa.required' => 'Chưa nhập mã chất lượng',
                'txtMa.unique' => 'Mã chất lượng đã tồn tại. Nhập mã khác',
                'txtMa.min' => 'Mã chất lượng phải có ít nhất 1 ký tự trở lên',
                'txtMa.max' => 'Mã chất lượng chỉ có tối đa 10 ký tự',
                'txtTen.required' => 'Chưa nhập tên chất lượng',
                'txtTen.unique' => 'Tên chất lượng đã tồn tại. Nhập tên khác',
                'txtTen.min' => 'Tên chất lượng phải có ít nhất 3 ký tự trở lên',
                'txtTen.max' => 'Tên chất lượng chỉ có tối đa 20 ký tự'
            ]
        );
        $chatluong = new ChatLuong;
        $chatluong->cl_ma = $request->txtMa;
        $chatluong->cl_ten = $request->txtTen;
        $chatluong->save();
        return redirect('qlkho/chatluong/them')->with('thongbao', 'Thêm thành công');
    }

    public function postXoa($id)
    {
        $chatluong = ChatLuong::find($id);
        try {
            $chatluong->delete();
        } catch(\Exception $ex) {
            // return response()->json(['error' => '429 Too many requests']);
            return redirect('qlkho/chatluong/danhsach')->with('loi', 'Không thể xóa được');
        }
        return redirect('qlkho/chatluong/danhsach')->with('thongbao', 'Xóa thành công');
    }
}
