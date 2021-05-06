@extends('layout-admin')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/component.css')}}" />
<link rel="stylesheet" href="{{asset('assets/admin/bower_components/select2/css/select2.min.css')}}" />
<link rel="stylesheet" type="text/css"
    href="{{asset('assets/admin/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css')}}" />
<link rel="stylesheet" type="text/css"
    href="{{asset('assets/admin/bower_components/multiselect/css/multi-select.css')}}" />
<base href="{{asset('')}}">
<div class="pcoded-content">
<div class="">
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
                              Quản lý hóa đơn
                           </li>
                           <li class="breadcrumb-item">
                              Cập nhật hóa đơn
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
                           <h3 style="font-weight: 600">Chỉnh sửa ngày hoá đơn khi mở bảo lưu</h3>
                        </div>
                        <div class="card-block">
                           <form id="main" method="post"action="{{route('order.saveEditOrder',['id'=>$order->id])}}" enctype="multipart/form-data">
                              @csrf
                           
                              <div class="form-group row">
                               
                                 <div class="col-sm-6">
                                    <label class="">Ngày kết thúc gói tập <span style="color: red">*</span></label>
                                    <input type="date" class="form-control" id="" name="" readonly
                                                    value="{{$order->finish_date->format('Y-m-d')}}"
                                                    placeholder="ngày bắt đầu" />
                                 </div>
                                 <div class="col-sm-6">
                                    <label >Thêm ngày bảo lưu <span style="color: red">*</span></label>
                                    <input type="date" name="finish_date"  class="form-control" value="{{$order->finish_date}}">
                                    @error('finish_date')
                                    <span class="messages" style="color:red">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="form-group row d-flex justify-content-center">
                                 <button id="btn-save" value="add" class="btn btn-primary mr-1 waves-effect waves-light">
                                 Hoàn Thành</button>
                              </div>

</div> 
</div>
</div>
@endsection
