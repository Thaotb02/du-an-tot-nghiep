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
                           <li class="breadcrumb-item"><i class="feather icon-home"></i></li>
                           <li class="breadcrumb-item">
                              Quản lý hóa đơn
                           </li>
                           <li class="breadcrumb-item">
                              Bảo lưu hóa đơn
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
                           <h3 style="font-weight: 600">Bảo Lưu Hoá Đơn</h3>
                        </div>
                        <div class="card-block">
                           <form id="main" method="post"action="{{route('order.savereserve',['id'=>$order->id])}}" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group row">
                                 <div class="col-sm-6">
                                    <p>Tên hội viên: {{$order->member->infor->name}}</p>
                                    <p>Tên loại gói tập: {{$order->typePackage->TypePackage_name}}</p>
                                    <p>Ngày bắt đầu gói tập: {{$order->start_date->format('d-m-Y')}} </p>
                                    <p>Ngày kết thúc gói tập: {{$order->finish_date->format('d-m-Y')}}</p>
                                   
                                    <label class="">Phí bảo lưu: 8.000 VNĐ/Ngày</label>
                                 <input name="order_id" type="hidden"  class="form-control" value="{{$order->id}}">
                                    {{-- @error('name')
                                    <span class="messages" style="color:red">{{$message}}</span>
                                    @enderror --}}
                                 </div>
                              </div>
                              

                              <div class="form-group row">
                               
                                 <div class="col-sm-6">
                                    <label class="">Ngày bắt đầu bảo lưu <span style="color: red">*</span></label>
                                    <input type="date" id="dateup" class="form-control"
                                       name="start_day" value="" id>
                                       @error('start_day')
                                          <span class="messages" style="color:red">{{$message}}</span>
                                       @enderror
                                 </div>
                                 
                                 <div class="col-sm-6">
                                    <label >Ngày kết thúc bảo lưu <span style="color: red">*</span></label>
                                    <input type="date" name="finish_day"
                                       class="form-control"  style="height: 38px !important" >
                                       @error('finish_day')
                                          <span class="messages" style="color:red">{{$message}}</span>
                                       @enderror
                                       @if (\Session::has('success'))
                                       <span class="messages" style="color:red">{!! \Session::get('success') !!}</span>
                                       
                                   @endif
                                 </div>
                              </div>
                              <div class="col-sm-14">
                                <label >Lý do bảo lưu gói tập <span style="color: red">*</span></label>
                                <textarea name="reason" class="form-control " id="editor1">{{old('content')}}</textarea>
                             </div> 
                             <div class="form-group row mt-4">
                              <div class="col-sm-12" >
                                 
                                 <label >Phương thức thanh toán <span style="color: red">*</span></label>
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
                        </form>

                  
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
<script>
    function test() {
        var b = [];
        var year = [];
        var dateSelect = parseInt($('#select-date').val());
        var params = new Date($('#dateup').val());
        var date = params.getDate();
        var fullyear = params.getFullYear();
    
        var month = params.getMonth() + 1;
        var a = parseInt(month + dateSelect);
    
        if (a > 12) {
            year = fullyear + 1;
    
            b = a % 12;
            var fullDate = year + "-" + b + "-" + date;
        } else {
            var fullDate = fullyear  + "-" + a + "-" + date;
    
        }
        var input = document.getElementById('done');
        var abc = fullDate
        console.log(abc);
        input.value = fullDate;
    
        var myFunction = function(e) {
            console.log(e.target.value);
        }
    
        return;
    }
</script>