<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PtRequest;
use App\Http\Requests\Admin\updatePt;
use Illuminate\Support\Facades\DB;
use App\Model\Pt;
use App\Model\Role;
use App\Model\Feedback;
use App\Model\Infor;
use App\Model\Schedule;
use App\Model\Order;
use App\Model\Subject;
class PtController extends Controller
{
    public function listPt(){
        $pts =Pt::all();
        return view('admin.pt.index',compact('pts'));
    }
    public function profilePt($id){
        $pt = Pt::find($id);
        $subjects = Subject::all();
        $schedules = Schedule::where('pt_id',$id)->get();
        $feedbacks = Feedback::where('pt_id',$id)->get();
        $orders = Order::where('pt_id',$id)->get();
        return view('admin.pt.profile-pt',compact('pt','subjects','orders','schedules','feedbacks'));
   
    }

    public function addPt(){
        $subjects = Subject::all();
    
        return view('admin.pt.create-pt',compact('subjects'));
    }

    public function savePt(PtRequest $request){
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
           $data->password = bcrypt(123456);
           $data->role = 2;
           $data->source = 0;
            $data->save();
        $pt = new Pt;
        $pt->infor_id = $data->id;
        $pt->subject_id = request()->subject_id;
        $pt->salary  = request()->salary;
        $pt->descriptions  = request()->descriptions;
        $pt->status = 1;
        // dd($pt);
        $pt->save();

        return  redirect()->route('pt.list')->with('success', 'Thêm thành công');
    }
    public function editPt($id){
        $pt = Pt::find($id);
        $subjects = Subject::all();
        
        return view('admin.pt.edit-pt',compact('pt','subjects'));
    }

    public function saveEditPt(updatePt $request,$id){
        $pt = Pt::find($id);
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
        return redirect()->route('pt.list')->with('success', 'Cập nhật huấn luyện viên thành công');
        }

    
    public function delete($id){
        $pt = Pt::find($id);
        $pt->delete();
       $infor =  Infor::find($pt->infor_id);
       $infor->delete();
       Schedule::where('pt_id',$id)->delete();
       return redirect()->route('pt.list')->with('success', 'Xóa huấn luyện viên thành công');
    }
    public function changeStatus($id){
        $data = Pt::find($id);
        $infor = Infor::find($data->infor_id);
        if($infor->role == 1){
            $infor->role = 0;
            $data->status = 2;
        }else{
            $infor->role = 1;
            $data->status = 1;
        }
        $infor->update();
        $data->update();

        return redirect()->route('pt.list')->with('success', 'Block huấn luyện viên');
    }
    public function deletePt(Request $request)
        {
            $request = $request->all();
            $arr = $request['arr'];
            foreach($arr as $item){
          
                $data = Pt::find($item);
                Infor::find($data->infor_id)->delete();
                Schedule::where('pt_id',$item)->delete();
                $data->delete();
             
            }
        }
}
