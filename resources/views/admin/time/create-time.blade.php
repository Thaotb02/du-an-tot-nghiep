@extends('layout-admin')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/component.css')}}" />
<base href="{{asset('')}}">
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
                          Quản lý ca làm
                        </li>
                        <li class="breadcrumb-item">
                           Thêm mới ca làm
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
                        <h3 style="font-weight: 600">Thêm mới ca làm</h3>
                     </div>
                     <div class="card-block">
                        <form id="main" method="post"action="{{route('admin.time.store')}}" enctype="multipart/form-data">
                           @csrf
                           <div class="form-group row">
                              <div class="col-sm-12">
                                 <label >Tên ca <span style="color: red">*</span></label>
                                 <input type="text" class="form-control" name="time_name" id="name" value="{{old('time_name')}}"/>
                                                @error('time_name')
                                                <span class="messages" style="color: red">{{$message}}</span>
                                                @enderror
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-sm-6">
                                 <label class="">Thời gian bắt đầu <span style="color: red">*</span></label>
                                 <input type="time" class="form-control" name="time_start" id="name" value="{{old('time_start')}}"/>
                                                @error('time_start')
                                                <span class="messages" style="color: red">{{$message}}</span>
                                                @enderror 
                              </div>
                              <div class="col-sm-6">
                                <label >Thời gian kết thúc <span style="color: red">*</span></label>
                                <input type="time" class="form-control" name="time_finish" id="name" value="{{old('time_finish')}}"/>
                            @error('time_finish')
                            <span class="messages" style="color: red">{{$message}}</span>
                            @enderror
                             </div>
                           </div>
                           <div class="form-group row d-flex justify-content-center">
                              <button id="btn-save" value="add" class="btn btn-primary mr-1 waves-effect waves-light">
                              Hoàn Thành</button>
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
@endsection