<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class PageController extends Controller
{
    //
    public function getIndex()
    {
        return view('home');
    }

    public function getLienHe()
    {
        return view('lienhe');
    }

    public function postLienHe(Request $req)
    {
        $name = $req->name;
        $email = $req->email;
        $subject = $req->subject;
        $message = $req->message;

        $data = [
            'ib' => $message
        ];

        Mail::send('auth.Email.contact', $data, function($e) use($email,$name,$subject){
            $e->to($email, $name)->subject($subject);
        });
        return redirect()->back()->with('thongbao','Gửi phản hồi thành công');

    }
}
