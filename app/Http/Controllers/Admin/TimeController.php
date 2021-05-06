<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TimeRequest;
use App\Http\Requests\Admin\updateTime;
use Illuminate\Http\Request;
use App\Model\Time;
class TimeController extends Controller
{
    public function index()
	{
		$times=Time::all();
		return view('admin.time.index',['times'=>$times]);
	}

	public function createTime(){
		return view('admin.time.create-time');
	}

	public function storeTime(TimeRequest $request){
		    $data =request()->all();
            $param =\Arr::except($data,['_token']);
			Time::create($param);
            return redirect()->route('time.index')->with('success','Bạn đã thêm thành công!');
	}

	public function editTime($id){ 
        $times=Time::find($id);
		return view('admin.time.edit-time',['times'=>$times]);
	}

	public function updateTime(updateTime $request,$id){
		$time=Time::find($id);
		$params=[];
		$params['time_name'] = request()->get('time_name');
		$params['time_start'] = request()->get('time_start');
		$params['time_finish'] = request()->get('time_finish');
		$time ->update($params);
		return redirect()->route('time.index')->with('success','Bạn đã sửa thành công!');
	}

	public function destroyTime(Time $time){
		$time ->delete();
		return redirect()->route('time.index')->with('success','Bạn đã xóa thành công!');
	}

}
