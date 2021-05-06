<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Member;
use App\Model\Infor;
use App\Model\Order;
use App\Model\Pt;
use App\Model\Contact;
use App\Model\Subject;
use App\Model\Package;

class DashboardController extends Controller
{
    public function listmembernew(){
        $members =Order::orderBy('created_at' ,'DESC')->paginate(5);
        $membernew =Member::orderBy('created_at' ,'DESC')->paginate(5);
        $allmember =Member::count();
        $pt_create_at =Pt::orderBy('created_at' ,'DESC')->paginate(1);
        $member_create_at =Member::orderBy('created_at' ,'DESC')->paginate(1);
        $total_create_at =Order::orderBy('created_at' ,'DESC')->paginate(1);
        $feedback_create_at =Contact::orderBy('created_at' ,'DESC')->paginate(1);
        $allpt =Pt::count();
        $allmoney =Order::all();
        $allSubject= Subject::all();
        $allfeedback =Contact::count();
        $total =0;
        $totalSubject = 0;
        return view('admin.layout.index',compact('members','allmember','allpt','pt_create_at','member_create_at','allmoney','total','total_create_at','allfeedback','feedback_create_at','membernew','allSubject','totalSubject'));
    }

 
}