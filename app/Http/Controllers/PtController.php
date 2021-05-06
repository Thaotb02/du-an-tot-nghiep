<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Infor;
use App\Model\Pt;

class PtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pt = Pt::join('infors', 'infors.id', '=', 'pts.infor_id')
        ->select('pts.*','infors.name')->get();

        return view('admin.member.index')->with('pt', $pt);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $infor = Infor::create($request->input());
       
        return response()->json($infor);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $infor = Infor::find($id);
        return response()->json($infor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $infor = Infor::find($id);
        $infor->name = $request->name;
        $infor->birth_date = $request->birth_date;
        $infor->gender = $request->gender;
        $infor->address = $request->address;
        $infor->phone = $request->phone;
        $infor->avatar = $request->avatar;
        $infor->email  = $request->email ;
        $infor->status = 0;
        $infor->role = 0;
        $infor->password = 123456;

        $infor->save();
        return response()->json($infor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $infor = Infor::destroy($id);
        return response()->json($infor);
    }
}

