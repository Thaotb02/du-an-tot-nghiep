<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\FeedbackRequest;
use App\Model\Feedback;
use App\Model\Infor;
use App\Model\PT;
use App\Model\Member;
use App\Model\Subject;



class FeedbackController extends Controller
{
    public function index(Request $request) 
    {
        $feedback = Feedback::all();
        $pt = PT::all();    
        $Member = Member::all();
        return view('admin.feedback.feedback' , compact('feedback','Member','pt'));
    }

    public function deleteFeedback($id) 
    {
        $feedback = Feedback::destroy($id);
        return redirect()->back()->with('success', 'Xoá feedback thành công'); 
    }
    
    public function createFeedback() 
    {
        $Member = Member::all();
        $pt = PT::all();
        return view('admin.feedback.create-feedback', compact('Member' , 'pt'));
    }

    public function storeFeedback(FeedbackRequest $request) 
    {
        $feedback = new Feedback();
        $feedback->fill($request->all());
        $feedback->save();
        return redirect()->route('feedback.list')->with('success', 'thêm feedback thành công');
    }

    public function editFeedback($id) 
    {
      $feedback = Feedback::find($id);
      $pt = PT::all();    
      $Member = Member::all();
      return view('admin.feedback.edit-feedback' , compact('feedback','Member','pt'));
    }
    
    public function updateFeedback($id,FeedbackRequest $request) 
    {
      $feedback = Feedback::find($id);
      $feedback->fill($request->all());
       $feedback->save();
       return redirect()->route('feedback.list')->with('success', 'cập nhật feedback thành công');
    }
    public function deletesFeedback(Request $request)
    {
        $request = $request->all();
        $arr = $request['arr'];
        foreach($arr as $item){
            Feedback::find($item)->delete();
        }
    }
}
