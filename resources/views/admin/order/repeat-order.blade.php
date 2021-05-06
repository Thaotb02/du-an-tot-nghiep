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
                               <i class="feather icon-home"></i></li>
                           <li class="breadcrumb-item">
                              Quản lý hóa đơn
                           </li>
                           <li class="breadcrumb-item">
                              Gia hạn tiếp hóa đơn
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
                           <h3 style="font-weight: 600">Gia hạn tiếp hóa đơn</h3>
                        </div>
                        <div class="card-block">
                           <form id="main" method="post"action="{{route('order.saverepeat')}}" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group row">
                                 <div class="col-sm-6">
                                    <p>Tên hội viên: {{isset($order->member->infor) ? $order->member->infor->name : '' }}</p>
                                    <p>Bộ môn: {{$order->typepackage->subject->subject_name}} </p>
                                    <p>Loại gói tập: {{$order->typepackage->TypePackage_name}}</p>
                                     <input type="hidden" name="member_id" value="{{$order->member->id}}">
                                     <input type="hidden" name="subject_id" value="{{$order->typepackage->subject->id}}">
                                     <input type="hidden" name="typePackage_id" value="{{$order->typepackage->id}}">
                                 </div>
                              </div>
                              <div class="form-group row">
                                <div class="col-sm-6" >
                                    <select name="time" class="custom-select" onchange="test();"
                                    id="select-date">
                                    <option selected value="">Thời Gian</option>
                                    <option value="1">1 tháng</option>
                                    <option value="3">3 tháng</option>
                                    <option value="6">6 tháng</option>
                                    <option value="12">12 tháng</option>
                                </select>
                                </div>
                                @error('time')
                                    <span class="messages" style="color:red">{{$message}}</span>
                                 @enderror
                             </div>

                              <div class="form-group row">
                               
                                 <div class="col-sm-6">
                                    <label class="">Ngày bắt đầu </label>
                                    <input type="date" id="dateup" class="form-control" name="start_date" value="" id="exampleInputEmail1" onchange="test();"
                                    aria-describedby="emailHelp">

                                    @error('start_date')
                                    <span class="messages" style="color:red">{{$message}}</span>
                                    @enderror
                                 </div>
                                
                                 <div class="col-sm-6">
                                    <label >Ngày kết thúc</label>
                                    <input type="text" name="finish_date" class="form-control" id="done" onchange="myFunction(event)" value="myValue">
                                 </div>
                              </div>

                              <div class="form-group row">
                                <div class="col-sm-12" >
                                   <label >Người hướng dẫn</label>
                                   @if($order->pt_id === 1)
                                   : Không có người hướng dẫn
                                   <input name="pt_id" type="hidden" value="1">
                                   @else
                                   <select class="form-control select2" id="select_box" name="pt_id">
                                    @foreach($pts as $pt)
                                    @if($pt->subject_id == $typePackages->subject->id)
                                    <option selected value="{{$pt->id}}">{{ $pt->infor->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                   @endif
                                </div>
                             </div>

                             <div class="form-group row mt-9">
                                <div class="col-sm-7" >
                                   <label >Tổng tiền :</label>
                                   <input type="text" readonly style="font-size: 24px;font-weight: 600;border: none;"
                                      value="{{number_format($order->total_money,0,'','.')}} VNĐ">
                                      <input type="hidden" name="total_money" value="{{$order->total_money}}">
                                      @if(Session::get('coupon'))
                                      <tr>
                                         <td class="mt-4">
                                            <label>Giảm giá: </label>
                                            @php
                                            $total = $order->total_money
                                            @endphp
                                         </td>
                                         <td>
                                            @if(Session::get('coupon'))
                                            @foreach(Session::get('coupon') as $key => $cou)
                                            <input type="hidden" name="coupon_code" value="{{$cou['code']}}">
                                            {{$cou['price']}} %
                                           
                                            <p>
                                               @php
                                               $total_coupon = ($total*$cou['price'])/100;
                                               echo '<p> Tổng giảm :'.number_format($total_coupon,0,',','.'),'VNĐ</p>';
                                            @endphp
                                            </p>
                                            <p>Giá tiền sau khi giảm : <span style="font-size: 24px;font-weight: 600;">{{number_format($total-$total_coupon,0,',','.')}} VNĐ</span> </p>
                                             @php
                                             $sub_total = $total-$total_coupon;
                                             @endphp
                                             <input type="hidden" name="sub_total" value="{{$sub_total}}">
                                            @endforeach
                                            @endif
                                         </td>
                                      </tr>
                                      @endif
                                </div>
                                <div class="col-sm-5" >
                                   <ul>
                                      <li>
                                         <button type="button" class="btn btn-default waves-effect" data-toggle="modal" data-target="#default-Modal">Mã giảm giá</button>
                        
                          </li>
                          </ul>
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
                        </form>




                        <div class="modal fade" id="default-Modal" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                               <div class="modal-content">
                                  <div class="modal-header">
                                     <h4 class="modal-title">Sử dụng mã giảm giá</h4>
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">×</span>
                                     </button>
                                  </div>
                                  <div class="modal-body">
          <form method="POST" action="{{url('/check_coupon')}}">
          @csrf
          <input type="text" class="form-control" name="coupon" placeholder="Nhập mã giảm giá">
        
          <td>
          @if(Session::get('coupon'))
          <a class="btn btn-default check_out" href="{{url('/unset-coupon')}}">Xóa mã</a>
          @endif
          @if (session('status'))
          <div class="alert alert-info">{{session('status')}}</div>
          </td>
          @endif
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Thoát</button>
          <button type="submit" class="btn btn-primary waves-effect waves-light check_coupon" name="check_coupon">Kiểm tra</button>
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