<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Model\Infor;
// use App\Http\Requests\Admin\Password;
class LoginController extends Controller
{
        public function updatePassword(){
            return view('admin.setting.change-password');
        }
        public function changePassword( Request $request)
        {
            $request->validate([
                'password' => 'required|min:5|max:17|',
                'password_confirmation' => 'same:password',
            ],
            [
                'password.required' => 'Bạn phải nhập mật khẩu mới',
                'password.min' => 'Mật khẩu mới phải ít nhất 5 kí tự',
                'password.max' => 'Mật khẩu không được quá 17 kí tự',
                'password_confirmation.same' => 'Phải nhập giống mật khẩu mới ',
            ]
        
                );
            $auth = auth()->user();
		
            if(Hash::check($request->old_password,$auth->password)){
                $auth->update([
                    'password' => bcrypt($request->new_password),
                ]);
                return redirect()->route('admin.home')->with('success', 'Bạn đã cập nhật mật khẩu thành công');
            }else{
                return redirect()->route('login.password')->with('success', 'Bạn nhập mật khẩu cũ sai');
            }
        }
        
         
}
