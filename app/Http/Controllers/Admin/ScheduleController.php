<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ScheduleRequest;
use App\Model\Pt;
use App\Model\Time;
use App\Model\Schedule;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExcelSchedule;
use Illuminate\Support\Arr;


class ScheduleController extends Controller
{
    public function index() 
    {
        $schedule = Schedule::all();
        $pts = Pt::all();
        $time = Time::all();
        $pt_id = null;
        return view('admin.schedule.index' , compact('schedule','pts','pt_id','time'));
    }
    
    public function createSchedule() 
    {
        $schedule = Schedule::all();
        $pt = Pt::all();
        $time = Time::all();
        return view('admin.schedule.create-schedule' , compact('schedule','pt','time'));
    }
    public function addSchedule(ScheduleRequest $request) 
    {
        $schedule = new Schedule();
        $schedule = $request->all();
        $time = $request->time_id;
        unset($schedule['_token']);
        foreach ($time as $items){
            $schedule = new Schedule();
            $schedule->pt_id = $request->pt_id;
		    $schedule->date = $request->date;
            $schedule->time_id = $items;
            $schedule->save();
        }
        return redirect()->route('schedule.list')->with('success', 'Thêm lịch làm thành công');
    }

    public function deleteSchedule($id) 
    {
        Schedule::destroy($id);
        return redirect()->back()->with('success', 'Xoá lịch làm thành công');
    }

    public function editSchedule($id) 
    {
        $schedule = Schedule::find($id);
        $pt = Pt::all();
        $time = Time::all();
        return view('admin.schedule.edit-schedule', compact('schedule','pt','time'));
    }

    public function updateSchedule($id, ScheduleRequest $request) 
    {
       $schedule = Schedule::find($id);
       $schedule->fill($request->all());
       $schedule->save();
       return redirect()->route('schedule.list')->with('success', 'Cập nhật lịch làm thành công');
    }
     public function deletesSchedele(Request $request)
     {
         $request = $request->all();
         $arr = $request['arr'];
         foreach($arr as $item){
            Schedule::destroy($item);
         }
     }
}