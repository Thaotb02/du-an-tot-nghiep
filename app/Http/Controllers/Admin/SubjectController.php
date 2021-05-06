<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Subject;
use App\Http\Requests\Admin\SubjectRequest;
use App\Http\Requests\Admin\updateSubject;


class SubjectController extends Controller
{
    public function index(Request $request) 
    {
       
        $subject = Subject::all();
        return view('admin.subject.subject' , compact('subject'));
    }
    
    public function createSubject() 
    {
      return view('admin.subject.create-subject');
    }

    public function addSubject(SubjectRequest $request)
    {
     $subject = new Subject();
     $subject->fill($request->all());
     if($request->hasFile('image')){
        $extension = $request->image->extension();
        $filename =  uniqid(). "." . $extension;
        $path = $request->image->storeAs(
          'package', $filename, 'public'
        );
        $subject->image = "storage/".$path;  
       }
     $subject->save();
     return redirect()->route('subject.list')->with('success', 'Thêm bộ môn thành công');
    }

    public function deleteSubject($id) 
    {
        $subject = Subject::destroy($id);
        return redirect()->back()->with('success', 'Xoá bộ môn thành công'); 
    }

    public function editSubject($id) 
    {
        $subject = Subject::find($id);
        return view('admin.subject.edit-subject',[
            'subject' => $subject
        ]);
    }

    public function updateSubject($id, updateSubject $request) 
    {
        $subject = Subject::find($id);
        $subject->fill($request->all());
        if($request->hasFile('image')){
          $extension = $request->image->extension();
          $filename =  uniqid(). "." . $extension;
          $path = $request->image->storeAs(
            'package', $filename, 'public'
          );
          $subject->image = "storage/".$path;  
         }
         $subject->save();
         return redirect()->route('subject.list')->with('success', 'Cập nhật bộ môn thành công');
    }
    public function deletesSubject(Request $request)
    {
        $request = $request->all();
        $arr = $request['arr'];
        foreach($arr as $item){
           
          Subject::find($item)->delete();
       
         
        }
    }
}
