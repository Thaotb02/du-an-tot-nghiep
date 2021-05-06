<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function loginForm()
	{
		return view('client.auth.login');
	}
	public function chanelogin( Request $request){
		$request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:17',
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
			return redirect()->route('client.homepage');
	   }else{
			return redirect()->back()->with('success','Tài khoản hoặc mật khẩu không đúng');
	   }
	}
	public function logout()
	{
		Auth::logout();
		return redirect()->route('client.loginForm');
	}

}