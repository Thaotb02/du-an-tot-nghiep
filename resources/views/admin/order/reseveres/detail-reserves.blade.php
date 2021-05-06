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
                                    <h3 style="font-weight: 600"> Chi tiết hóa đơn bảo lưu </h3>
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
                                    <li class="breadcrumb-item">Chi tiết hóa đơn bảo lưu</a>
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
                    <div class="row">
                        <div class="col-sm-12">
                            
                            <div class="card">
                                <div class="card-block">                                  
                                    <div class="dt-responsive table-responsive">

                           
                                        
                                <div class="dt-responsive table-responsive">
                                   
                                      
                                    <table id="" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                               
                                                <th scope="col">Tên hội viên</th>
                                                <th scope="col">Số điện thoại</th>
                                                <th scope="col">Bộ môn</th>
                                                <th scope="col">Loại gói tập</th>
                                                <th scope="col">Thời gian</th>
                                                <th scope="col">Tổng tiền</th>
                                                <th scope="col">Trạng thái</th>
                                                <th scope="col">Hành Động</th>
                                               
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <tr id="item{{$order->id}}" class="active">
                                                   
                                                    <td>{{isset($order->member->infor) ? $order->member->infor->name : ''  }}
                                                    </td>
                                                    <td>{{$order->member->infor->phone}}</td>
                                                    <td>{{isset($order->typepackage) ? $order->typepackage->subject->subject_name : '' }}
                                                    </td>
                                                    <td>{{isset($order->typepackage) ? $order->typepackage->TypePackage_name : '' }}
                                                    </td>
                                                    <td>{{$order->start_date->format('d-m-Y')}} -- {{$order->finish_date->format('d-m-Y')}} </td>       
                                                    
                                                     <td>{{number_format($order->total_money,0,'','.')}} VNĐ</td>
                                                     @php
                                                     $x= (strtotime($order->finish_date)- strtotime($today))/(60*60*24);
                                                    @endphp
                                                   
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
                                                          @endif
                                                          <a class="dropdown-item" href="{{route('order.listorder')}}">Quay lại</a>
                                                          
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
                                                                      {{-- <a class="dropdown-item"  href="{{route('order.detailMemberReserve',['id'=>$order->id])}}"><i class="icofont icofont-edit"></i>Thông tin chi tiết</a> --}}
                                                                      <a class="dropdown-item"  href="{{route('order.editOrder',['id'=>$order->id])}}"><i class="icofont icofont-edit"></i> Cập nhật ngày</a>
                                                                     
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
                                                                
                                                            @elseif($order->status === 1 && $order->typepackage->security === 2 &&$order->status_reserves ===2 && $x >30)
                                                            
                                                            <span class="label label-success">Còn Hạn</span>
                                                            <td class="dropdown" >  
                                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="feather icon-settings"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                    <a class="dropdown-item"  href="{{route('order.detailMemberReserve',['id'=>$order->id])}}"><i class="icofont icofont-edit"></i>Lịch sử bảo lưu</a>
                                                                  <a class="dropdown-item" onclick="return confirm('Bạn chắc chắn muốn pass hoá đơn này')" href="{{route('order.pass',['id'=> $order->id])}}"><i class="icofont icofont-edit"></i>Chuyển nhượng</a>
                                                                  <a class="dropdown-item"  href="{{route('order.addNewMemberPass',['id'=> $order->id])}}"><i class="icofont icofont-edit"></i>Chuyển nhượng người mới</a>
                                                                 
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
                                                                 
                                                                 </div>
                                                            </td>
    
                                                     @endif
                                            </tr>
                                           
                                        </tbody>
                                      
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
