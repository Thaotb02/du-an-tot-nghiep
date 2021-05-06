<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Model\Member;
use App\Model\Order;
use App\Model\Pt;
use App\Model\TypePackage;
use App\Model\Infor;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\updateMember;
use App\Model\Reserve;
use Illuminate\Support\Facades\Auth;
use App\Model\Subject;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Validated;
use Carbon\Carbon;
class MemberController extends Controller
{
    
	public function homepage()
	{
		$subjects =Subject::all();
		return view('client.layout.index',compact('subjects'));
	}



	public function getprofileMember($id){
		$today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
		$member = Member::where('infor_id',$id)->first();
		$member_id = $member->id;
		$subjects =Subject::all();
		$order = Order::where('member_id',$member_id)->get();
		$orders = Order::where('member_id',$member_id)->where('status',4)->get();
		$orders1 = Order::where('member_id',$member_id)->where('status_reserves',2)->get();
		$orders2 = Order::where('member_id',$member_id)->where('status_pass',2)->get();
	// dd($orders);
	$peopol = [];
	if($orders == ''){
	}else{
		foreach($orders as $item){
			$peopol = Order::where('pass',$item->id)->first();
		}
	}
		
		return view('client.member.profile',compact('order','member','subjects','orders','today','orders1','orders2','peopol'));
	}
	public function detailTransfer($id){
		$today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y'); 
        $order = Order::find($id);
        
		return view('client.member.detailTransfer',compact('today','order'));
	}
	public function detailReserve($id){
		$today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
		$reserves = Reserve::where('order_id',$id)->get();
		return view('client.member.detailReserve',compact('reserves','today'));
	}

	
	public function editProfileMember($id){
	
		$member = Member::find($id);
		$subjects =Subject::all();
		$orders = Order::where('member_id',$id)->get();
		return view('client.member.changeProfile',compact('member','subjects','orders'));
	}
	public function updateProfileMember($id ,updateMember $request){
        $member = Member::find($id);
        $infor = Infor::find($member->infor_id);
        $request->validate([
            'phone' => 'required|numeric|digits_between:10,11|unique:infors,phone,'.$infor->id,
            'email' => 'required|email|unique:infors,email,'.$infor->id,
            ],
            [
                'phone.unique' => 'số điện thoại đã tồn tại',
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
             if($request->hasFile('avatar')){
                if ($infor->avatar != null) {
					if (file_exists($infor->avatar)) {
						unlink($infor->avatar);
					}
				}
            $extension = $request->avatar->extension();
            $filename =  uniqid(). "." . $extension;
            $path = $request->avatar->storeAs(
              'anh', $filename, 'public'
            );
            $params['avatar'] = "storage/".$path;  
           }
           $infor->update($params);
        //    Lưu thông tin vào bảng member
        $data=[];
           $data['pt_id'] = 1;
           $data['status'] = 1;
           $data['weight'] = request()->get('weight');
           $data['health'] =request()->get('health');
           $data['height'] = request()->get('height');
           $member->update($data);
        return redirect()->route('client.homepage')->with('success', 'Update Member thành công');
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
					return redirect()->route('client.homepagess')->with('success', 'Bạn đã cập nhật mật khẩu thành công');
				}else{
					return redirect()->route('client.changePassword')->with('success', 'Bạn nhập mật khẩu cũ sai');
				}
	}
	
		public function changePt($id){
		$order = Order::find($id);
		$data = $order->typePackage_id;
		$pts = Pt::all();
		$typePackages = TypePackage::find($data); 
		return view('client.member.changePt',compact('order','pts','typePackages'));
	}
	public function saveChangePt(Request $request,$id){
		$data = Order::find($id);
		$data->fill($request->all());
		$order = [];
		$order['pt_id'] = request()->get('pt_id');
		$data->update($order);
		$email = $data->pt->infor->email;
		$content = [
			'name' => $data->pt->infor->name,
			'namemember' => $data->member->infor->name,
			'phone' =>$data->member->infor->phone,
			'address' =>$data->member->infor->address,
			'birth_date' => $data->member->infor->birth_date,
			'gender' => $data->member->infor->gender,
		];
		Mail::send('email.mailpt',$content, function($message) use ($email){
			$message->to($email,' ĐIỀN EMAIL CỦA BẠN MUỐN NHẬN MAIL VÀO ĐÂY', 'Visitor')->subject('Visitor Feedback!');
		});
		$email_member = $data->member->infor->email;
		$noidung = [
			'name_member' => $data->member->infor->name,
			'name_pt' => $data->pt->infor->name,
		];
		Mail::send('email.confirmpt',$noidung, function($message) use ($email_member){
			$message->to($email_member,' ĐIỀN EMAIL CỦA BẠN MUỐN NHẬN MAIL VÀO ĐÂY', 'Visitor')->subject('Visitor Feedback!');
		});
		return redirect()->route('client.profileMember')->with('success', 'Đổi HLV thành công');
	}




	
}