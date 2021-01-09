<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\LienHe;
use Illuminate\Support\Facades\Auth;
class PageController extends Controller
{
    //
    public function getIndex()
    {
        return view('home');
    }

    public function getLienHe()
    {
        if(Auth::user()->role == 0)
        {
            $lienhe = LienHe::orderBy('date','DESC')->get();
            return view('lienhe_ds',compact('lienhe'));
        }
        else{
        return view('lienhe');
        }
    }

    public function postLienHe(Request $req)
    {
        $this->validate($req,
    
        [   'name' => 'required||min:1|max:50',
            'email' => 'required||min:5|max:50',
            'subject' => 'required||min:1|max:50',
            'message' => 'required||min:1|max:1000'],
        [
            'name.required' => 'Chưa nhập tên',
            'name.min' => 'tên phải có ít nhất 1 ký tự',
            'name.max' => 'Tên có tối đa 50 ký tự',
            'email.required' => 'Chưa nhập email',
            'email.min' => 'Tên nhà sản xuất phải có ít nhất 5 ký tự',
            'email.max' => 'Tên nhà sản xuất có tối đa 50 ký tự',
            'subject.required' => 'Chưa nhập chủ đề',
            'subject.min' => 'chủ đề phải có ít nhất 1 ký tự',
            'subject.max' => 'Tên nhà sản xuất có tối đa 50 ký tự',
            'message.required' => 'Chưa nhập nội dung',
            'message.min' => 'Tên nhà sản xuất phải có ít nhất 1 ký tự',
            'message.max' => 'Tên nhà sản xuất có tối đa 1000 ký tự'
        ]
        
        
    );
        $lh = new LienHe;
        $lh->date = date('Y-m-d');
        $lh->name = $req->name;
        $lh->email = $req->email;
        $lh->subject = $req->subject;
        $lh->message = $req->message;
        $lh->save();
   
        // $data = [
        //     'ib' => $message
        // ];

        // Mail::send('auth.Email.contact', $data, function($e) use($email,$name,$subject){
        //     $e->from('khuonghstvk@gmail.com', 'User');
        //     $e->to('khuonghstvk@gmail.com','Support')->subject('Liên hệ');
        // });
        return redirect()->back()->with('thongbao','Gửi đóng góp ý kiến thành công');

    }

    public function getPhanHoi($id)
    {
        $phanhoi = LienHe::where('id',$id)->first();
        return view('phanhoi',compact('phanhoi'));
    }

    public function postPhanHoi(Request $req)
    {
        $message = $req->message;
        $email = $req->email;

        $data = [
            'ib' => $message
        ];

        Mail::send('auth.Email.contact', $data, function($e) use($email){
            $e->from('khuonghstvk@gmail.com', 'Support');
            $e->to($email,'user')->subject('Phản hồi đóng góp ý kiến');
        });
        return redirect()->back()->with('thongbao','Gửi phản hồi thành công');
    }

    public function postXoa($id)
    {
        $lienhe = LienHe::find($id);
        try {
            $lienhe->delete();
        } catch(\Exception $ex) {
            return redirect('qlkho/lienhe')->with('loi', 'Không thể xóa được');
        }
        return redirect('qlkho/lienhe')->with('thongbao', 'Xóa thành công');
    }
}
