<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\NhanVien;
use Carbon\Carbon;
use Mail;

class UserController extends Controller
{
    public function getDangNhap()
    {
        return view('auth.login');
    }

    public function postDangNhap(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'Chưa nhập email !',
                'password.required' => 'Chưa nhập mật khẩu !'
            ]
        );

        $rememberMe = $request->has('remember') ? true : false;
        $creds = $request->only(['email','password']);
        // NOTE: Nếu đăng nhập thành công
        if($token=auth()->attempt($creds,$rememberMe))
        {
            return redirect('qlkho/index');
        }
        else
            return redirect('qlkho/dangnhap')->with('thongbao', 'Đăng nhập không thành công !');
    }

    public function getDangXuat()
    {
        Auth::logout();
        return redirect('qlkho/dangnhap');
    }

    public function getDanhSach()
    {
        if(Auth::user()->role == 1)
        {
        $nhanvien = User::where('role','2')->get();
        return view('nhanvien.danhsach', ['nhanvien' => $nhanvien]);
        }
        else
        {
            $nhanvien = User::all();
            return view('nhanvien.danhsach', ['nhanvien' => $nhanvien]);
        }
    }

    public function getSua($id)
    {   
        $nhanvien = NhanVien::find($id);
        $user = User::find($id);
        return view('nhanvien.sua', ['nhanvien' => $nhanvien,'user'=>$user]);
    }

    public function postSua(Request $request, $id)
    {
        $nhanvien = NhanVien::find($id);
        $this->validate($request,
            ['txtTen' => 'required|min:1|max:100',
              'txtSDT' => 'required|max:10|min:10' ,
            'txtCMND' => 'required|min:9|max:9',
        'txtDiaChi' => 'required|min:5|max:100' ],
            [
                'txtTen.required' => 'Chưa nhập tên nhân viên',
                'txtTen.min' => 'Tên nhân viên phải có ít nhất 1 ký tự',
                'txtTen.max' => 'Tên nhân viên có tối đa 100 ký tự',
                'txtSDT.required' => 'Chưa nhập số điện thoại',
                'txtSDT.min' => 'Số điện thoại phải có ít nhất 10 ký tự',
                'txtSDT.max' => 'Số điện thoại có tối đa 10 ký tự',
                'txtCMND.required' => 'Chưa nhập chứng minh nhân dân',
                'txtCMND.min' => 'Chứng minh nhân dân phải có ít nhất 9 ký tự',
                'txtCMND.max' => 'Chứng minh nhân dân  có tối đa 9 ký tự',
                'txtDiaChi.required' => 'Chưa nhập địa chỉ',
                'txtDiaChi.min' => 'Địa chỉ phải có ít nhất 5 ký tự',
                'txtDiaChi.max' => 'Địa chỉ có tối đa 100 ký tự'
            ]
        );
        $nhanvien->nv_ten = $request->txtTen;
        $nhanvien->nv_sdt = $request->txtSDT;
        $nhanvien->GioiTinh = $request->GioiTinh;
        $nhanvien->CMND = $request->txtCMND;
        $nhanvien->nv_diachi = $request->txtDiaChi;

        $nhanvien->save();

        $user = User::find($id);
            $user->name = $request->txtTen;
            $user->role = $request->quyen;
            $user->save();


        return redirect('qlkho/nhanvien/sua/'.$id)->with('thongbao', 'Sửa thành công');
    }

    public function getThem()
    {
        return view('nhanvien.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,[
            'txtTen' => 'required|min:3',
            'txtSDT' => 'required|min:10|max:10',
            'rdoGioiTinh' =>'required',
            'txtCMND' => 'required|min:9|max:9',
            'txtDiaChi' => 'required|min:5',
            'txtEmail' => 'required|email|unique:users,email',
            'txtPass' =>'required|min:3|max:32',
            'txtPassAgain'=> 'required|same:txtPass'
        ],
        [
            'txtTen.required'=> 'Bạn chưa nhập tên nhân viên',
            'txtTen.min' => ' Tên nhân viên phải có ít nhất 3 ký tự',
            'txtSDT.required'=> 'Bạn chưa nhập số điện thoại nhân viên',
            'txtSDT.min' => ' Số điện thoại phải có ít nhất 10 số',
            'txtSDT.max'=> 'Số điện thoại tối đa 10 số',
            'rdoGioiTinh.required' => ' Chưa chọn giới tính',
            'txtCMND.required'=> 'Bạn chưa nhập số chứng minh nhân dân',
            'txtCMND.min' => ' Số chứng minh nhân dân phải có ít nhất 9 ký tự',
            'txtCMND.max' => ' Số chứng minh nhân dân phải có tối đa 9 ký tự',
            'txtDiaChi.required'=> 'Bạn chưa nhập địa chỉ',
            'txtDiaChi.min' => ' Địa chỉ phải có ít nhất 5 ký tự',
            'txtEmail.required' => 'Bạn chưa nhập email',
            'txtEmail.email' => 'Bạn chưa nhập đúng đinh dạng email',
            'txtEmail.unique' => 'Email đã tồn tại',
            'txtPass.required' => 'Bạn chưa nhập mật khẩu',
            'txtPass.min' => 'mật khẩu phải có ít nhất 3 ký tự',
            'txtPass.max' => 'mật khẩu chỉ được tối đa 32 ký tự',
            'txtPassAgain.required' => 'Bạn chưa nhập lại mật khẩu',
            'txtPassAgain.same' =>'Mật khẩu nhâp lại chưa đúng'
        ]);

        $user = new User;
        $user->name = $request->txtTen;
        $user->email = $request->txtEmail;
        $user->password = bcrypt($request->txtPass);
        $user->role = 2;
        $user->save();

        $nhanvien = new NhanVien;
        $nhanvien->id = $user->id;
        $nhanvien->nv_ten = $request->txtTen;
        $nhanvien->email = $user->email;
        $nhanvien->nv_sdt = $request->txtSDT;
        $nhanvien->GioiTinh = $request->rdoGioiTinh;
        $nhanvien->CMND = $request->txtCMND;
        $nhanvien->nv_diachi = $request->txtDiaChi;
        $nhanvien->save();

         return redirect('qlkho/nhanvien/them')->with('thongbao', 'thêm thành công');
    
    }

    public function getThongTin()
    {
        $nhanvien = NhanVien::where('id',Auth::user()->id)->first();
        return view('thukho.thongtin', ['nhanvien' => $nhanvien]);
    }

    public function postThongTin(Request $request)
    {
       
        $this->validate($request,
            ['txtTen' => 'required|min:1|max:100',
              'txtSDT' => 'required|max:10|min:10' ,
            'txtCMND' => 'required|min:9|max:9',
        'txtDiaChi' => 'required|min:5|max:100' ],
            [
                'txtTen.required' => 'Chưa nhập tên nhân viên',
                'txtTen.min' => 'Tên nhân viên phải có ít nhất 1 ký tự',
                'txtTen.max' => 'Tên nhân viên có tối đa 100 ký tự',
                'txtSDT.required' => 'Chưa nhập số điện thoại',
                'txtSDT.min' => 'Số điện thoại phải có ít nhất 10 ký tự',
                'txtSDT.max' => 'Số điện thoại có tối đa 10 ký tự',
                'txtCMND.required' => 'Chưa nhập chứng minh nhân dân',
                'txtCMND.min' => 'Chứng minh nhân dân phải có ít nhất 9 ký tự',
                'txtCMND.max' => 'Chứng minh nhân dân  có tối đa 9 ký tự',
                'txtDiaChi.required' => 'Chưa nhập địa chỉ',
                'txtDiaChi.min' => 'Địa chỉ phải có ít nhất 5 ký tự',
                'txtDiaChi.max' => 'Địa chỉ có tối đa 100 ký tự'
            ]
        
        );
            $user = User::find(Auth::user()->id);
            $user->name = $request->txtTen;
            $user->save();

        $nhanvien = NhanVien::find(Auth::user()->id);
        $nhanvien->nv_ten = $request->txtTen;
        $nhanvien->nv_sdt = $request->txtSDT;
        $nhanvien->GioiTinh = $request->GioiTinh;
        $nhanvien->CMND = $request->txtCMND;
        $nhanvien->nv_diachi = $request->txtDiaChi;
        $nhanvien->save();

        return redirect('qlkho/nhanvien/thongtin')->with('thongbao', 'Sửa thành công');
    }

    public function getDoiMK()
    {
        return view('thukho.doimatkhau');
    }
    public function postDoiMK(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $this->validate($request,
            [
                'txtPass' => 'required',
                'txtPassNew' => 'required|min:8|max:60',
                'txtPassAgain' => 'required|same:txtPassNew'
            ],
            [
                'txtPass.required' => 'Chưa nhập mật khẩu cũ',
                'txtPassNew.required' => 'Chưa nhập mật khẩu mới',
                'txtPassNew.min' => 'Mật khẩu mới phải có ít nhất 8 ký tự',
                'txtPassNew.max' => 'Mật khẩu mới có tối đa 60 ký tự',
                'txtPassAgain.required' => 'Chưa nhập lại mật khẩu mới',
                'txtPassAgain.same' => 'Mật khẩu nhập lại chưa khớp'
            ]
        );
        if($request->txtPass == $user->password)
        {
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('qlkho/nhanvien/doimatkhau')->with('thongbao', 'Sửa thông tin và đổi mật khẩu thành công');
        }
        else{
            return  redirect('qlkho/nhanvien/doimatkhau')->with('loi', 'Mật khẩu cũ không đúng');
        }
    }

    public function getResetPass()
    {
        return view('auth.email');
    }

    public function sendCodeResetPass(Request $request)
    {
        $email = $request->email;
        $check = User::where('email',$email)->first();

        if(!$check)
        {
            return redirect()->back()->with('thongbao','email không tồn tại');
        }

        $code = bcrypt(md5(time().$email));

        $check->code = $code;
        $check->time_code = Carbon::now();
        $check->save();

        $url = route('get.link.reset',['code'=>$check->code,'email'=>$email]);

        $data =[
            'route' => $url
        ];
        Mail::send('auth.Email.resetpassword', $data, function($message) use($email){
            $message->to($email, 'Visitor')->subject('Lấy lại mật khẩu');
        });
        return redirect()->back()->with('thongbao','link  đã được gửi vào email của bạn');
    }
    public function ResetPass(Request $request)
    {
        $code = $request->code;
        $email = $request->email;
        
        $checkUser = User::where([
            'code' => $code,
            'email' => $email
        ])->first();

        if(!$checkUser)
        {
            return redirect('/')->with('thongbao','Đường dẫn không đúng, vui lòng thử lại sau');
        }
        return view('auth.resetpass');
    }

    public function saveResetPass(Request $request)
    {
        $this->validate($request,[
            
            'password' =>'required|min:3|max:32',
            'passwordAgain'=> 'required|same:password'
        ],
        [
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'mật khẩu phải có ít nhất 3 ký tự',
            'password.max' => 'mật khẩu chỉ được tối đa 32 ký tự',
            'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same' =>'Mật khẩu nhâp lại chưa đúng'
        ]);

        $code = $request->code;
        $email = $request->email;
        
        $checkUser = User::where([
            'code' => $code,
            'email' => $email
        ])->first();

        if(!$checkUser)
        {
            return redirect('/')->with('thongbao','Đường dẫn không đúng, vui lòng thử lại sau');
        }

        $checkUser->password = bcrypt($request->password);
        $checkUser->save();

        return redirect('qlkho/dangnhap')->with('thongbao','mật khẩu đã được đổi');
    }

}
