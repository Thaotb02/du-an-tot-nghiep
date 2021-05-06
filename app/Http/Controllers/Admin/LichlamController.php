<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Lichlam;
class LichlamController extends Controller
{
    public function Lichlam(){
        $dulieu= DB::table('Schedules')->paginate(3);
        $list = DB::table('Schedules')->get();
        return view('backend.lichlam', compact('dulieu','list'));
    }

    public function Addlichlam(){
        $list = DB::table('Schedules')->get();
        $pt = DB::table('Pts')->get();
        $sub = DB::table('Times')->get();
        return view('backend.add-lichlam',compact('list','pt','sub'));
    }

    public function Editlichlam($id){
        $laydulieu = DB::table('Schedules')->get();
        $pt = DB::table('Pts')->get();
        $sub = DB::table('Times')->get();
        return view('backend.edit-lichlam',compact('laydulieu','pt','sub'));
    }

    public function postEditlichlam($id, Request $request){
        $data = $request->all();
        unset($data['_token']);
        $infor = DB::table('Schedules')
        ->where('id', $id)
        ->update($data);
        return redirect()->route('lichlam')->with('success', 'Sửa sản phẩm thành công');
    }
    public function Deletelichlam($id){
        DB::table('Schedules')->delete($id);
        return redirect()->route('lichlam')->with('success', 'Xóa sản phẩm thành công');
    }
    public function Valiaddlichlam(Lichlam $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $infor = DB::table('Schedules')->insert($data);
        return redirect()->route('lichlam')->with('success', 'Thêm sản phẩm thành công');
    }
}
