<?php
namespace App\Http\Controllers\Auth;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Infor;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Admin\LoginRequest;
use App\Http\Requests\Admin\ResetRequest;
use App\Http\Requests\Admin\ChangeResetPassword;
use Illuminate\Auth\Events\Validated;


class AdminController extends Controller
{
    public function loginForm()
    {
        return view('admin.auth.login');
    }
    public function login(LoginRequest $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:17',
        ],
        [
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu  phải ít nhất 5 kí tự',
            'password.max' => 'Mật khẩu không được quá 17 kí tự',
            'email.required' => 'Bạn chưa nhập email ',
            'email.email' => 'Email chưa đúng định dạng ',
        ]
            );
            $remember = $request->has('remember') ? true : false ;
        if(Auth::attempt(["email"=>$request->email,"password"=>$request->password])){
            return redirect()->route('admin.home')->with('success','Bạn đã đăng nhập thành công');
       }else{
            return redirect()->back()->with('success','Tài khoản hoặc mật khẩu không đúng');
       }
    }
    public function saveChangePassword(Request $request)
    {
            $code = $request->code;
            $email = $request->email;
            $checkAdmin = Infor::where(['code'=>$code,'email'=>$email])->first();
            if(!$checkAdmin){
                return redirect()->route('admin.reset-password-form')->with('thongbao','đường dẫn lấy lại link không tồn tại');
            }
            $checkAdmin->password=bcrypt($request->password);
            $checkAdmin->save();
            return redirect()->route('admin.loginForm')->with('thongbao','Đổi mật khẩu thành công');
        }
    public function ressetPasswordForm()
    {
        return view('admin.auth.form-reset-password');
    }
    public function sendCodeResetPassword(ResetRequest $request)
    {
        $email = $request->email;
        $checkAdmin = Infor::where('email',$email)->first();
        if(!$checkAdmin || $checkAdmin ->role !== 3){
            return redirect()->route('admin.reset-password-form')->with('thongbao','Không tồn tại email!');
        }
        $code =bcrypt(md5(time().$email));
        $checkAdmin->code=$code;
        $checkAdmin->time_code =Carbon::now();
        $checkAdmin->save();
        $url =route('admin.reset-password',['code'=>$checkAdmin->code,'email'=>$email]);
        $data =['router'=>$url];
        Mail::send('admin.auth.email-reset-password',$data , function($message)use($email){
            $message->to($email, 'Visitor')->subject('Lấy lại mật khẩu!');
        });
        return redirect()->route('admin.reset-password-form')->with('thongbao','Link lấy lại mật khẩu đã được gửi trong email');
    }
    public function ressetPassword(Request $request)
    {
        $code = $request->code;
        $email = $request->email;
        $checkAdmin = Infor::where(['code'=>$code,'email'=>$email])->first();
        if(!$checkAdmin){
            return redirect()->route('admin.reset-password-form')->with('thongbao','đường dẫn lấy lại link không tồn tại');
        }
        return view('admin.auth.reset-password');
    }
    public function saveChangeResetPassword(ChangeResetPassword $request)
    {
            $code = $request->code;
            $email = $request->email;
            $checkAdmin = Infor::where(['code'=>$code,'email'=>$email])->first();
            if(!$checkAdmin){
                return redirect()->route('admin.reset-password-form')->with('thongbao','đường dẫn lấy lại link không tồn tại');
            }
            $checkAdmin->password=bcrypt($request->password);
            $checkAdmin->save();
            return redirect()->route('admin.loginForm')->with('thongbao','Đổi mật khẩu thành công');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.loginForm');
    }
}