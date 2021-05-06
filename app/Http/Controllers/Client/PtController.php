<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ContactRequest;
use App\Model\Pt;
use App\Model\Infor;
use App\Model\Schedule;
use App\Model\Member;
use App\Model\Feedback;
use App\Model\Order;
use App\Model\Subject;
use App\Http\Requests\Admin\updatePt;
use Illuminate\Support\Facades\DB;
use Symfony\Polyfill\Intl\Idn\Info;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Validated;
use Carbon\Carbon;
class PtController extends Controller
{
    public function profilePt()
	{    
        $data = Auth::user()->id;
        $pt = PT::where('infor_id',$data)->first();
        $pt_id = $pt->id;
        $schedules = Schedule::where('pt_id',$pt_id);
        $schedules = $schedules->whereDate('date','>=',Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'))->get();
        $feedback = Feedback::where('pt_id',$pt_id)->get();
        $orders = Order::where('pt_id',$pt_id)->get();
		return view('client.pt.profilePt',compact('pt','schedules','feedback','orders'));
    }   

    public function editProfilePt()
    {   
        $subjects = Subject::all();
        $data = Auth::user()->id;
        $pt = PT::where('infor_id',$data)->first();
        return view('client.pt.editProfilePt',compact('pt','subjects'));
    }

    public function updateProfilePt(updatePt $request) 
    {
        $data = Auth::user()->id;
        $pt = PT::where('infor_id',$data)->first();
        $infor = Infor::find($pt->infor_id);
        $request->validate([
            'phone' => 'required|regex:/0[0-9]{8}/|unique:infors,phone,'.$infor->id,
            'email' => 'required|email|unique:infors,email,'.$infor->id,
            ],
            [
                'phone.unique' => 'số điện thoại đã tồn tại',
                'phone.regex' => 'số điện thoại không đúng định dạng',
                'email.email' => 'email không đúng định dạng',
                'email.unique' => 'email đã tồn tại'
            ]
         );
        $params=[];
        $params['name'] = request()->get('name');
        $params['phone'] = request()->get('phone');
        $params['gender'] = request()->get('gender');
        $params['birth_date'] = request()->get('birth_date');
        $params['email'] = request()->get('email');
        $params['address'] = request()->get('address');
        $params['role'] = request()->get('role');
             if($request->hasFile('avatar')){
            $extension = $request->avatar->extension();
            $filename =  uniqid(). "." . $extension;
            $path = $request->avatar->storeAs(
              'anh', $filename, 'public'
            );
            $params['avatar'] = "storage/".$path;  
           }
           $infor->update($params);
           $data_pt=[];
           $data_pt['subject_id'] = request()->get('subject_id');
           $data_pt['salary'] = request()->get('salary');
           $data_pt['descriptions'] = request()->get('descriptions');
           $pt->update($data_pt);
           return redirect()->route('client.pt-profile')->with('success', 'Cập nhật thông tin thành công');
    }

    public function showProfile($id){ 
        $data = Auth::user()->id;
        $pt = PT::where('infor_id',$data)->first();
        $member=Member::find($id);
		return view('client.pt.profileMember',compact('pt','member'));
    }

    public function changePassword(){
		return view('client.member.change-password');
    }
    
    public function updateChangePassword(Request $request){
	
        $request->validate([
            'new_password' => 'required|min:5|max:17|',
            'confirm_password' => 'same:new_password',
        ],
        [
            'new_password.required' => 'Bạn phải nhập mật khẩu mới',
            'new_password.min' => 'Mật khẩu mới phải ít nhất 5 kí tự',
            'new_password.max' => 'Mật khẩu không được quá 17 kí tự',
            'confirm_password.same' => 'Phải nhập giống mật khẩu mới ',
        ]
    );
        
        $auth = auth()->user();
    
            if(Hash::check($request->old_password,$auth->password)){
                $auth->update([
                    'password' => bcrypt($request->new_password),
                ]);
                return redirect()->route('client.homepages')->with('success', 'Bạn đã cập nhật mật khẩu thành công');
            }else{
                return redirect()->route('client.changePassword')->with('success', 'Bạn nhập mật khẩu cũ sai');
            }
}
}