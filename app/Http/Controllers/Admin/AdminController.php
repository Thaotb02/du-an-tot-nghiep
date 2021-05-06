<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Infor;
use App\Model\Member;
use App\Model\Pt;
use App\Model\Admin;
use App\Model\Order;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function editAdmin($id){
        $admin = Admin::find($id);
        return view('admin.adminManage.edit-admin',compact('admin'));
    }
    public function saveEditAdmin(Request $request,$id){
        $admin = Admin::find($id);
        $infor = Infor::find($admin->infor_id);
        $params=[];
        $params['name'] = request()->get('name');
        $params['gender'] = request()->get('gender');
        $params['birth_date'] = request()->get('birth_date');
        $params['email'] = request()->get('email');
        $params['address'] = request()->get('address');
             if($request->hasFile('avatar')){
            $extension = $request->avatar->extension();
            $filename =  uniqid(). "." . $extension;
            $path = $request->avatar->storeAs(
              'anh', $filename, 'public'
            );
            $params['avatar'] = "storage/".$path;  
           }
           $infor->update($params);
           $admin->update();
        return redirect()->route('Infor.list');
        }
        
}
