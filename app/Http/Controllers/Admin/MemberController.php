<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\MemberRequest;
use App\Http\Requests\Admin\updateMember;
use App\Model\Member;
use App\Model\Infor;
use App\Model\Pt;
use App\Model\Admin;
use App\Model\Reserve;
use Carbon\Carbon;
use App\Model\Role;
use App\Model\Subject;
use App\Model\Order;
use Illuminate\Support\Facades\Mail;
use App\Model\TypePackage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Polyfill\Intl\Idn\Info;



class MemberController extends Controller
{
    public function listmember(){
        $members =Member::all();
        return view('admin.member.index',compact('members'));
    }
    public function addMember(){
        $pts = Pt::all();
        return view('admin.member.create-member',compact('pts'));
    }
    public function saveMember(MemberRequest $request){
        $data = new Infor();
        $data->fill($request->all());
        if($request->hasFile('avatar')){
            $extension = $request->avatar->extension();
            $filename =  uniqid(). "." . $extension;
            $path = $request->avatar->storeAs(
              'anh', $filename, 'public'
            );
            $data->avatar = "storage/".$path;  
           }
           $data->password = bcrypt(123456) ;
           $data->role = request()->role;
           $data->source = request()->source;
            $data->save();
            if(($data->source) == 1){
            $member = new Member;
            $member->status = 1;
            $member->infor_id = $data->id;
            $member->pt_id = 1;
            $member->weight =request()->weight;
            $member->health =request()->health;
            $member->height =request()->height;
            $member->save();
            }else{
                $member = new Member;
                $member->status = 1;
                $member->infor_id = $data->id;
                $member->pt_id =request()->pt_id;
                $member->weight =request()->weight;
                $member->health =request()->health;
                $member->height =request()->height;
                $member->save();
            }
            return  redirect()->route('member.list')->with('success', 'Th??m h???i vi??n th??nh c??ng'); 
    }
    public function editMember($id){
        $member = Member::find($id);
        $pts = Pt::all();
        return view('admin.member.edit-member',compact('member','pts'));
    }
    public function updateMember($id ,updateMember $request){
        $member = Member::find($id);
        $infor = Infor::find($member->infor_id);
        $request->validate([
            'phone' => 'regex:/0[0-9]{8}/|unique:infors,phone,'.$infor->id,
            'email' => 'email|unique:infors,email,'.$infor->id,
            ],
            [    
                'phone.unique' => 's??? ??i???n tho???i ???? t???n t???i',
                'phone.regex' => 's??? ??i???n tho???i kh??ng ????ng ?????nh d???ng',
                'email.unique' => 'email ???? t???n t???i',
                'email.email' => 'email kh??ng ????ng ?????nh d???ng'
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
        //    L??u th??ng tin v??o b???ng member
        $data=[];
           $data['pt_id'] = 1;
           $data['status'] = 1;
           $data['weight'] = request()->get('weight');
           $data['health'] =request()->get('health');
           $data['height'] = request()->get('height');
           $member->update($data);
        return redirect()->route('member.list')->with('success', 'C???p nh???t h???i vi??n th??nh c??ng');
        }
        public function profileMember($id){
            $member = Member::find($id);
            $subjects = Subject::all();
            $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
            $orderr = Order::where('member_id',$id)->get();
            $orders = Order::where('member_id',$id)->where('status',4)->get();
            $orders1 = Order::where('member_id',$id)->where('status_reserves',2)->get();
            $orders2 = Order::where('member_id',$id)->where('status_pass',2)->get();
            // dd($orders);
            $peopol = [];
            if($orders == ''){
            }else{
                foreach($orders as $item){
                    $peopol = Order::where('pass',$item->id)->first();
                }
            }
          
            
            
            
            return view('admin.member.profile-member',compact('orderr','member','subjects','orders','today','orders1','orders2','peopol'));
        }

        public function changePt($id){
            $order = Order::find($id);
            $data = $order->typePackage_id;
            $pts = Pt::all();
            $typePackages = TypePackage::find($data); 
            return view('admin.member.change-pt',compact('order','pts','typePackages'));
        }
        public function saveChangePt(Request $request,$id){
            $data = Order::find($id);
            $email_ptcu =$data->pt->infor->email ;
            $contentt = [
                'name_pt' => $data->pt->infor->name,
                'name_member' => $data->member->infor->name,
                'start_date' =>$data->start_date,
                'finish_date' =>$data->finish_date,
                
            ];
            Mail::send('email.confirmptold',$contentt, function($message) use ($email_ptcu){
                $message->to($email_ptcu,' ??I???N EMAIL C???A B???N MU???N NH???N MAIL V??O ????Y', 'Visitor')->subject('Visitor Feedback!');
            });
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
                $message->to($email,' ??I???N EMAIL C???A B???N MU???N NH???N MAIL V??O ????Y', 'Visitor')->subject('Visitor Feedback!');
            });
            $email_member = $data->member->infor->email;
            $noidung = [
                'name_member' => $data->member->infor->name,
                'name_pt' => $data->pt->infor->name,
            ];
            Mail::send('email.confirmpt',$noidung, function($message) use ($email_member){
                $message->to($email_member,' ??I???N EMAIL C???A B???N MU???N NH???N MAIL V??O ????Y', 'Visitor')->subject('Visitor Feedback!');
            });
            return redirect()->route('member.list')->with('success', '?????i HLV th??nh c??ng');
        }

        public function delete($id){
            $member = Member::find($id);
            $member->delete();
           $infor =  Infor::find($member->infor_id);
           $infor->delete();
           return redirect()->route('member.list')->with('success', 'X??a h???i vi??n th??nh c??ng');
        }
        public function profileAdmin(){
            $data = Auth::user()->id;
            $member = Member::where('infor_id',$data)->first();
            return view('admin.setting.profile-admin',compact('member'));
        }
        public function changeStatus($id){
            $data = Member::find($id);
            $infor = Infor::find($data->infor_id);
            if($infor->role == 1){
                $infor->role = 0;
                $data->status = 2;
                $infor->update();
                $data->update();
                return redirect()->route('member.list')->with('success', 'Block h???i vi??n th??nh c??ng');
            }else{
                $infor->role = 1;
                $data->status = 1;
                $infor->update();
                $data->update();
                return redirect()->route('member.list')->with('success', 'M??? block vi??n th??nh c??ng');
            }
          
        }
        public function deleteMember(Request $request)
        {
            $request = $request->all();
            $arr = $request['arr'];
            foreach($arr as $item){
                $data = Member::find($item);
                Infor::find($data->infor_id)->delete();
                $data->delete();
             
            }
        }


        
    }