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
                              Thêm mới hóa đơn
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="page-body">
               {{-- @if (\Session::has('success'))
               <div class="alert alert-success">
                   <ul>
                       <li>{!! \Session::get('success') !!}</li>
                   </ul>
               </div>
           @endif --}}
               <div class="row justify-content-center">
                  <div class="col-sm-6">
                     <div class="card">
                        <div class="card-header">
                           <h3 style="font-weight: 600">Hoá đơn chuyển nhượng gói tập</h3>
                        </div>
                      
                        <div class="card-block">
                           <form id="main" method="post"action="{{route('order.savePassOrder',['id'=>$order->id])}}" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group row">
                                 
                                 <div class="col-sm-12">
                                    <label >Hội viên được chuyển nhượng <span style="color: red">*</span></label>
                                    <select name="member_id"
                                       class="js-example-basic-single col-sm-12">
                                       <option value="">Chọn hội viên</option>
                                       @foreach($members as $member)
                                       @if($member->infor->role ==1 )
                                       <option value="{{$member->id}}">{{$member->infor->name}}
                                          {{$member->infor->email}}
                                       </option>
                                       @endif
                                       @endforeach
                                    </select>
                                 </div>
                                 @error('member_id')
                                    <span class="messages" style="color:red">{{$message}}</span>
                                 @enderror
                              </div>
                              <div class="form-group row mt-4">
                                 <div class="col-sm-6" >
                                    <label for=""> Người chuyển nhượng : {{$order->member->infor->name}}</label>
                                 </div>
                                 <div class="col-sm-6" >
                                    <label for=""> Bộ môn : {{$typePackages->subject->subject_name}}</label>
                                 </div>
                                 
                                    <div class="col-sm-6" >
                                       <label >Người hướng dẫn :</label>
                                       @if($typePackages->catetoryPackage ==2)
                                       {{$order->pt->infor->name }}
                                    
                                       @else
                                       : Không có người hướng dẫn
                                       <input name="pt_id" type="hidden"
                                          placeholder="Gói tập không có PT" value="1">
                                       @endif
                                    
                                 </div>
                                 <div class="col-sm-6">
                                    <label for="">Loại gói tập:{{$typePackages->TypePackage_name}}</label>
                                    <input name="typePackage_id" type="hidden" value="{{$typePackages->id}}">
                                 </div>
                                 <div class="col-sm-6">
                                    <label for="">Ngày bắt đầu gói tập:{{$order->start_date->format('d-m-Y')}}</label>
                                  
                                 </div>
                                 <div class="col-sm-6">
                                    <label for="">Ngày kết thúc gói tập:{{$order->finish_date->format('d-m-Y')}}</label>
                                  
                                 </div>
                              </div>
                              <input type="hidden"   name="status_pass" value="" >
                              <div class="form-group row">
                               
                                 <div class="col-sm-6">
                                    <label class="">Ngày bắt đầu chuyển nhượng <span style="color: red">*</span></label>
                                    <input type="date" id="dateup" class="form-control"
                                 name="start_date" value="{{old('start_date')}}" id="exampleInputEmail1"
                                       onchange="test();" aria-describedby="emailHelp">
                                       @if (\Session::has('success'))
                                       <span class="messages" style="color:red">{!! \Session::get('success') !!}</span>
                                       
                                   @endif
                                 </div>
                                 
                                 @error('start_date')
                                    <span class="messages" style="color:red">{{$message}}</span>
                                 @enderror
                              
                                 <div class="col-sm-6">
                                    <label >Ngày kết thúc <span style="color: red">*</span></label>
                                    <input type="text" name="finish_date"  class="form-control" value="{{$order->finish_date->format('Y-m-d')}}">
                                 </div>
                              </div>
                              
                              <div class="form-group row mt-9">
                                 <div class="col-sm-7" >
                                    <label style="font-size: 20px;font-weight: 600;border: none;">
                                       Phí dịch vụ : 1.000.000 VNĐ</label>
                                    
                                 </div>                     
</div>
<div class="form-group row mt-4">
   <div class="col-sm-12" >
      <label >Phương thức thanh toán</label>
      <select class="form-control select2" id="select_box"
         name="payment_method">
         <option value="1">Thanh Toán Bằng Tiền Mặt</option>
         <option value="2">Thanh Toán Bằng Thẻ Ngân Hàng</option>
      </select>
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
