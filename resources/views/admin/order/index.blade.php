@extends('layout-admin')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/new.css')}}" />
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
                                    <h3 style="font-weight: 600">Danh sách hóa đơn </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                       <i class="feather icon-home"></i>
                                    </li>
                                    <li class="breadcrumb-item">Quản lý hóa đơn
                                    </li>
                                    <li class="breadcrumb-item">Danh sách hóa đơn</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-body">
                    @if (\Session::has('success'))
                    <div class="alert background-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif
                </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-block">
                                    <a href="{{route('typepackage.list')}}"class="btn btn-success m-b-20 float-right mb-4">
                                        <span class="icofont icofont-ui-add"></span>Thêm mới hoá đơn</a>
                                        <div class="export mb-2">
                                            <a href ="{{ route('export-order') }}" class="btn btn-info export" id="export-button"> Export file </a>
                                  <div class="dt-responsive table-responsive">
                                    <table id="footer-select" class="table table-striped table-bordered respon-order" >
                                        <thead>
                                            <tr>
                                                <th scope="col">    
                                                    <button class="btn btn-danger" id="xoa" onclick="xoa()"
                                                    style="display: none">Xoá</button> 
                                                </th>
                                                <th scope="col">STT</th>
                                                <th scope="col" >Tên khách hàng</th>
                                                <th  scope="col">Số điện thoại</th>
                                                <th scope="col" >Bộ môn</th>
                                                <th scope="col" >Loại gói tập</th>
                                                <th scope="col" >Thời gian</th>
                                                <th scope="col" >Người hướng dẫn</th>
                                                <th scope="col" >Thể loại</th>
                                                <th scope="col" >Tổng tiền</th>
                                                <th scope="col"  > Bảo lưu </th>
                                                <th scope="col" >Trạng thái</th>
                                                <th scope="col" >Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $no => $order)
                                            <tr id="item{{$order->id}}" class="active">
                                                    <th> <input type="checkbox" id="value_check{{$order->id}}" aria-label="Checkbox for following text input" onclick="CheckBox({{$order->id}})" name="check"></th>
                                                <th scope="row">{{$no +1}}</th>
                                            <td>{{isset($order->member->infor) ? $order->member->infor->name : ''  }} </td>
                                            <td>{{$order->member->infor->phone}}</td>
                                                <td>{{isset($order->typepackage) ? $order->typepackage->subject->subject_name : '' }}
                                                </td>
                                                <td>{{isset($order->typepackage) ? $order->typepackage->TypePackage_name : '' }}
                                                </td>
                                                <td>{{$order->start_date->format('d-m-Y')}} -- {{$order->finish_date->format('d-m-Y')}} </td>       
                                                 <td>{{isset($order->pt->infor) ? $order->pt->infor->name : 'Không Có' }}</td>
                                                 <td>
                                                     @if($order->typepackage->security ==1 )
                                                     <span class="label label-danger">Không bảo lưu</span>
                                                     @else 
                                                     <span class="label label-success">Được bảo lưu</span>
                                                     @endif
                                                </td>
                                                 <td>
                                                    {{number_format($order->total_money,0,'','.')}} VNĐ
                                                </td>
                                                 @php
                                                 $x= (strtotime($order->finish_date)- strtotime($today))/(60*60*24);
                                             @endphp
                                                <td>
                                                    @if ($order->status_reserves ===2 )
                                                    <span><i class="icofont icofont-ui-check"></i></span>
                                                    @else
                                                    <span><i class="icofont icofont-ui-close"></i></span>
                                                    @endif
                                                </td>
                                                <td>
        
                                                 @if($order->status=== 1 && $order->status_reserves === 1 && $order->status_pass === 1 )
                                                 
                                                 <span class="label label-success">Còn Hạn</span>
                                                 <td class="dropdown" >  
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="feather icon-settings"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right b-none contact-menu" >
                                                        @if($order->typepackage->security === 2 && $x >31 && $order->status_pass=== 1 )
                                                      <a class="dropdown-item"  href="{{route('order.pass',['id'=> $order->id])}}"><i class="icofont icofont-edit"></i>Chuyển nhượng</a>
                                                      <a class="dropdown-item"  href="{{route('order.addNewMemberPass',['id'=> $order->id])}}"><i class="icofont icofont-edit"></i>Chuyển nhượng người mới</a>
                                                      <a class="dropdown-item"  href="{{route('order.reserve',['id'=>$order->id])}}"><i class="icofont icofont-edit"></i> Bảo lưu</a>
                                                      <a class="dropdown-item"  href="{{route('export-pdf',['id'=>$order->id])}}"><i class="icofont icofont-download"></i>in hóa đơn</a>
                                                    @else
                                                    <a class="dropdown-item"  href="{{route('export-pdf',['id'=>$order->id])}}"><i class="icofont icofont-download"></i>in hóa đơn</a>
                                                      @endif
                                                      
                                                      
                                                     </div>
                                                    </td>
                                                 @elseif($order->status === 2)
                                                 <span class="label label-danger">Hết Hạn</span>
                                                 <td class="dropdown" >  
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="feather icon-settings"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                        
                                                      <a class="dropdown-item"  href="{{route('order.repeat',['id'=>$order->id])}}"><i class="icofont icofont-edit"></i> Gia hạn lại</a>
                                                  
                                                     
                                                      <a class="dropdown-item"  href="{{route('export-pdf',['id'=>$order->id])}}"><i class="icofont icofont-download"></i>in hóa đơn</a>
                                                     </div>
                                                    </td>
                                                    @elseif($order->status === 4)
                                                 <span class="label label-danger">Chuyển nhượng</span>
                                                 <td class="dropdown" >  
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="feather icon-settings"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                        
                                                      <a class="dropdown-item"  href="{{route('order.repeat',['id'=>$order->id])}}"><i class="icofont icofont-edit"></i> Gia hạn lại</a>
                                                      <a class="dropdown-item"  href="{{route('order.listpass',['id'=>$order->id])}}"><i class="icofont icofont-edit"></i>Thông tin chuyển nhượng</a>
                                                     
                                                      <a class="dropdown-item"  href="{{route('export-pdf',['id'=>$order->id])}}"><i class="icofont icofont-download"></i>in hóa đơn</a>
                                                     </div>
                                                    </td>
                                                @elseif($order->status === 3 && $order->typepackage->security === 2 && $x >30 )
                                                        <span class="label label-warning">Đang Bảo Lưu</span>  
                                                            @if($order->status_reserves ===1)
                                                            <td class="dropdown" >  
                                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="feather icon-settings"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                  <a class="dropdown-item"  href="{{route('order.detailMemberReserve',['id'=>$order->id])}}"><i class="icofont icofont-edit"></i>Thông tin chi tiết</a>
                                                                  <a class="dropdown-item"  href="{{route('order.editOrder',['id'=>$order->id])}}"><i class="icofont icofont-edit"></i> Cập nhật ngày</a>
                                                                 
                                                                  <a class="dropdown-item"  href="{{route('export-pdf',['id'=>$order->id])}}"><i class="icofont icofont-download"></i>in hóa đơn</a>
                                                                 </div>
                                                            </td>
                                                            @else
                                                            <td class="dropdown" >  
                                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="feather icon-settings"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                            <a class="dropdown-item" onclick="return confirm('Bạn chắc chắn muốn pass hoá đơn này')" href="{{route('order.pass',['id'=> $order->id])}}"><i class="icofont icofont-edit"></i>Chuyển nhượng</a>
                                                                  <a class="dropdown-item"  href="{{route('order.detailMemberReserve',['id'=> $order->id])}}"><i class="icofont icofont-edit"></i>Chi tiết</a>
                                                                </div>
                                                            </td>
                                                            @endif
                                                        @elseif($order->status === 1 && $order->typepackage->security === 2 &&$order->status_reserves ===2 )
                                                        <span class="label label-success">Còn Hạn</span>
                                                        <td class="dropdown" >  
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="feather icon-settings"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item"  href="{{route('order.detailMemberReserve',['id'=>$order->id])}}"><i class="icofont icofont-edit"></i>Lịch sử bảo lưu</a>
                                                                 <a class="dropdown-item"  href="{{route('export-pdf',['id'=>$order->id])}}"><i class="icofont icofont-download"></i>in hóa đơn</a>
                                                                 @if($x >30)
                                                                 <a class="dropdown-item"  href="{{route('order.pass',['id'=> $order->id])}}"><i class="icofont icofont-edit"></i>Chuyển nhượng</a>
                                                                 <a class="dropdown-item"  href="{{route('order.addNewMemberPass',['id'=> $order->id])}}"><i class="icofont icofont-edit"></i>Chuyển nhượng người mới</a>
                                                                @endif
                                                             </div>
                                                        </td>
                                                        @elseif($order->status_pass === 2 )
                                                        <span class="label label-success"> Còn Hạn</span>
                                                        <td class="dropdown" >  
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="feather icon-settings"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item"  href="{{route('order.reserve',['id'=>$order->id])}}"><i class="icofont icofont-edit"></i> Bảo lưu</a>
                                                              
                                                                <a class="dropdown-item"  href="{{route('order.listpass',['id'=> $order->id])}}"><i class="icofont icofont-edit"></i>Chi tiết chuyển nhượng</a>
                                                              <a class="dropdown-item"  href="{{route('order.pass',['id'=> $order->id])}}"><i class="icofont icofont-edit"></i>Chuyển nhượng</a>
                                                              <a class="dropdown-item"  href="{{route('order.addNewMemberPass',['id'=> $order->id])}}"><i class="icofont icofont-edit"></i>Chuyển nhượng người mới</a>
                                                             
                                                              <a class="dropdown-item"  href="{{route('export-pdf',['id'=>$order->id])}}"><i class="icofont icofont-download"></i>in hóa đơn</a>
                                                             </div>
                                                        </td>
                                                 @endif
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                          <tr>
                                              <th scope="col" class="th-stt"></th>
                                              <th scope="col" class="th-stt"></th>
                                              <th scope="col"></th>
                                              <th scope="col"></th>
                                              <th scope="col"></th>
                                              <th scope="col"></th>
                                              <th scope="col"></th>
                                              <th scope="col"></th>
                                              <th scope="col"></th>
                                              <th scope="col"></th>
                                              <th scope="col"></th>
                                              <th scope="col"></th>
                                         
                                              <th scope="col" class="th-stt"></th>
                                             
                                          </tr>
                                      </tfoot>
                                    </table>
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
</div>
</div>
</div>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
var url_get = "{{route('order.deletesOrder')}}";
var arr = [];
function CheckBox(id) {
    var x = document.getElementById("value_check" + id);
    console.log(x);
    if (x.checked == true) {
        console.log(id);
        arr.unshift(id);
        $("#xoa").css('display', 'block');
      
    }
    if (x.checked == false) {
        var index = arr.indexOf(id);
        if (index > -1) {
            arr.splice(index, 1);
        }
        if (arr.length == 0) {
            $("#xoa").css('display', 'none');
      
        }
    }
}
function xoa() {
    axios.post(url_get, {
        arr: arr
    });
    window.location.href = "{{route('order.listorder')}}";
}
</script>