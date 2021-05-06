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
               <div class="row justify-content-center">
                  <div class="col-sm-6">
                     <div class="card">
                        <div class="card-header">
                           <h3 style="font-weight: 600">Thêm mới hóa đơn</h3>
                        </div>
                        <div class="card-block">
                           <form id="main" method="post"action="{{route('order.saveaddmembe')}}" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group row">
                                 <div class="col-sm-12">
                                    <label >Tên hội viên <span style="color: red">*</span></label>
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
                                    @error('member_id')
                                    <span class="messages" style="color:red">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="form-group row mt-4">
                                 <div class="col-sm-6" >
                                    <label for=""> Bộ môn : {{$typePackages->subject->subject_name}}</label>
                                 </div>
                                 <div class="col-sm-6">
                                    <label for="">Loại gói tập: {{$typePackages->TypePackage_name}}</label>
                                    <input name="typePackage_id" type="hidden" value="{{$typePackages->id}}">
                                 </div>
                              </div>
                              <div class="form-group row mt-4">
                                <div class="col-sm-6" >
                                    <select class="custom-select" onchange="test();"
                                    id="select-date" name="time">
                                    <option selected value="">Thời Gian</option>
                                    <option value="1">1 tháng</option>
                                    <option value="3">3 tháng</option>
                                    <option value="6">6 tháng</option>
                                    <option value="12">12 tháng</option>
                                </select>
                                </div>
                             </div>
                             @error('time')
                                    <span class="messages" style="color:red">{{$message}}</span>
                             @enderror
                              <div class="form-group row">
                               
                                 <div class="col-sm-6">
                                    <label class="">Ngày bắt đầu <span style="color: red">*</span></label>
                                    <input type="date" id="dateup" name="start_date" class="form-control"
                                       name="start_date" value="" 
                                       onchange="test();">
                                       @error('start_date')
                                          <span class="messages" style="color:red">{{$message}}</span>
                                       @enderror
                                 </div>
                                 <div class="col-sm-6">
                                    <label >Ngày kết thúc <span style="color: red">*</span></label>
                                    <input type="text" name="finish_date"
                                       class="form-control" id="done"
                                       onchange="myFunction(event)" value="myValue">
                                 </div>
                              </div>
                              <div class="form-group row mt-4">
                                 <div class="col-sm-12" >
                                    <label >Người hướng dẫn</label>
                                    @if($typePackages->catetoryPackage ==2)
                                           
                                    <select class="form-control select2" id="select_box" name="pt_id">
                                       @foreach($pts as $pt)
                                       @if($pt->subject_id == $typePackages->subject->id)
                                       <option selected value="{{$pt->id}}">{{ $pt->infor->name }}</option>
                                       @endif
                                       @endforeach
                                       </select>
                                    @else
                                    : Không có người hướng dẫn
                                    <input name="pt_id" type="hidden"
                                       placeholder="Gói tập không có PT" value="1">
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row mt-9">
                                 <div class="col-sm-7" >
                                    <label >Tổng tiền :</label>
                                    @if($typePackages->price_sale != null)
                                    <input type="munber" readonly style="
                                       font-size: 24px;
                                       font-weight: 600;
                                       border: none;
                                       "
                                       value="{{number_format($typePackages->price_sale,0,'','.')}} VNĐ">
                                       <input type="hidden" name="total_money" value="{{$typePackages->price_sale}}">
                                    @else
                                    <input  type="munber" readonly style="font-size: 24px;font-weight: 600;border: none;"
                                       value="{{number_format($typePackages->price,0,'','.')}} VNĐ">
                                    <input type="hidden" name="total_money" value="{{$typePackages->price}}">
                                    @endif
                                    @if(Session::get('coupon'))
                                    <tr>
                                       <td>
                                          <label>Giảm giá :</label>
                                          @php
                                          if($typePackages->price_sale != null) 
                                          {
                                             $total = $typePackages->price_sale;
                                          }else{
                                             $total = $typePackages->price;
                                          }
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
                                             echo '
                                          <p> Tổng giảm :<span style="font-size: 24px;font-weight: 600;">'.number_format($total_coupon,0,'','.'),' </span>VNĐ</p>
                                          ';
                                          @endphp
                                          </p>
                                          <p>Giá tiền sau khi giảm : <span style="font-size: 24px;font-weight: 600;">{{number_format($total-$total_coupon,0,'','.')}} </span>VNĐ </p>
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
          <div class="alert alert-danger">{{session('status')}}</div>
          @endif
          </td>
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
<script>function test() {
   var month1 = [];
   var month2 = [];
   var month3 = [];
   var month4 = [];
   var month5 = [];
   var year = [];
   var year1 = [];
   var year3;
   var dateSelect = parseInt($('#select-date').val());
   console.log(dateSelect);
   var params = new Date($('#dateup').val());
   var miniFullDate = params.getTime();
   console.log(miniFullDate);
   var date = params.getDate();
   var fullyear = params.getFullYear();
   var month = params.getMonth() + 1;
   var a = parseInt(month + dateSelect);
   console.log(a);
   if (a === 24) {
       year = fullyear + 1;
       console.log(year);
       month1 = a - 12;
       console.log(month1);
       var fullDate = date + "-" + month1 + "-" + year;
   } else if (12 <= a <= 23) {
       year3 = fullyear + 1;
       console.log(year3);
       month2 = a % 12;
       console.log(month2);
       var fullDate = date + "-" + month2 + "-" + year3;
   }
   else if (a < 12) {
       year1 = fullyear;
       month3 = a;
       var fullDate = date + "-" + month3 + "-" + year1;
   } else if (24 < a < 36) {
       year = fullyear + 2;
       console.log(year);
       month5 = a % 12;
       console.log();
       var fullDate = date + "-" + month5 + "-" + year;
   }
   if (a === 36) {
       year = fullyear + 2;
       console.log(year);
       month4 = a - 24;
       var fullDate = date + "-" + month4 + "-" + year;
   }
   var input = document.getElementById('done');
   var abc = fullDate
   input.value = fullDate;
   var myFunction = function (e) {
       console.log(e.target.value);
   }
   return;
}
    </script>