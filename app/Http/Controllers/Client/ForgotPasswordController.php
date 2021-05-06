<?php

namespace App\Http\Controllers\Client;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Infor;
use Mail;
class ForgotPasswordController extends Controller
{
    public function resetPasswordForm()
	{
		return view('client.auth.form-reset-password');
	}

	public function sendCodeResetPassword(Request $request)
	{
		$email = $request->email;
		$checkMember = Infor::where('email',$email)->first();
		if(!$checkMember || $checkMember ->role !== 1 & 2){
			return redirect()->route('client.reset-password-form')->with('thongbao','Không tồn tại email!');
		}
		$code =bcrypt(md5(time().$email));
		$checkMember->code=$code;
		$checkMember->time_code =Carbon::now();
		$checkMember->save();
		$url =route('client.reset-password',['code'=>$checkMember->code,'email'=>$email]);
		$data =['route'=>$url];
		Mail::send('client.auth.email-reset-password',$data , function($message)use($email){
	        $message->to($email, 'Visitor')->subject('Lấy lại mật khẩu!');
	    });
		return redirect()->route('client.reset-password-form')->with('thongbao','Link lấy lại mật khẩu đã được gửi trong email');
	}

	public function resetPassword(Request $request)
	{
		$code = $request->code;
		$email = $request->email;
		$checkAdmin = Infor::where(['code'=>$code,'email'=>$email])->first();
		if(!$checkAdmin){
			return redirect()->route('client.reset-password-form')->with('thongbao','đường dẫn lấy lại link không tồn tại');
		}
		return view('client.auth.reset-password');
	}

	public function saveChangePassword(Request $request)
	{
			$code = $request->code;
			$email = $request->email;
			$checkMember = Infor::where(['code'=>$code,'email'=>$email])->first();
			if(!$checkMember){
				return redirect()->route('client.reset-password-form')->with('thongbao','đường dẫn lấy lại link không tồn tại');
			}

			$checkMember->password=bcrypt($request->password);
			$checkMember->save();
			return redirect()->route('client.loginForm')->with('thongbao','Đổi mật khẩu thành công');
	
		
	}
}
