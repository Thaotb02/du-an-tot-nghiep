@extends('layout-admin')
@section('content')
<link rel="stylesheet" href="{{asset('assets/admin/bower_components/select2/css/select2.min.css')}}" />
<link rel="stylesheet" type="text/css"
    href="{{asset('assets/admin/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css')}}" />
<link rel="stylesheet" type="text/css"
    href="{{asset('assets/admin/bower_components/multiselect/css/multi-select.css')}}" />
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                 
                                            <i class="feather icon-home"></i>
                                      
                                    </li>
                                    <li class="breadcrumb-item">
                                       Quản lý lịch làm
                                    </li>
                                    <li class="breadcrumb-item">
                                       Cập nhật lịch làm
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-body">
                    <div class="row justify-content-center">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 style="font-weight: 600">Cập nhật lịch làm</h3>
                                 </div>
                                <div class="card-block col-sm-12">
                                    <form action="{{route('schedule.update',['id' => $schedule->id])}}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label>Huấn luyện viên <span style="color: red">*</span></label>
                                                <select  name="pt_id" class="js-example-basic-single col-sm-12">
                                                    <option value="">Chọn huấn luyện viên</option>
                                                    @foreach($pt as $listPt)
                                                        <option @if ($listPt->id == $schedule->pt_id) selected @endif value="{{$listPt->id}}">{{$listPt->infor->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('pt_id')
                                                <span class="messages" style="color: red">{{$message}}</span>
                                                @enderror 
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                     
                                            <div class="col-sm-12">
                                                <label>Ca làm <span style="color: red">*</span></label>
                                                <select name="time_id[]" multiple="multiple" class="js-example-basic-single col-sm-12">
                                                    <option value="">Chọn ca làm</option>
                                                    @foreach($time as $times)
                                                       <option @if ($times->id == $schedule->time_id) selected @endif value="{{$times->id}}">{{$times->time_name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('time_id')
                                                <span class="messages" style="color: red">{{$message}}</span>
                                                @enderror 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                          
                                            <div class="col-sm-12">
                                                <label>Ngày <span style="color: red">*</span></label>
                                                <input type="date" value="{{$schedule->date->format('Y-m-d')}}" class="form-control" name="date" id="name"/>
                                            @error('date')
                                            <span class="messages" style="color: red">{{$message}}</span>
                                            @enderror  
                                            </div>
                                        </div>
                                        <div class="form-group row d-flex justify-content-center">
                                            <button id="btn-save" value="add" class="btn btn-primary mr-1 waves-effect waves-light">
                                            Cập nhật</button>
                                         </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection