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
                                    <h3 style="font-weight: 600">Chi tiết hóa đơn bảo lưu</h3>
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
                                    {{-- <a href="{{route('order.listorder')}}"
                                        class="btn btn-primary m-b-20 float-right">Hoá Đơn </a> --}}
                                      
                                    <div class="dt-responsive table-responsive">

                               
                           
                                        
                                <div class="dt-responsive table-responsive">
                                   
                                      
                                    <table id="" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                               
                                                <th scope="col">Tên hội viên</th>
                                                <th scope="col" >Số điện thoại</th>
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
                                                    
                                                     <td> {{number_format($order->total_money,0,'','.')}} VNĐ</td>
                                                     @php
                                                     $x= (strtotime($order->finish_date)- strtotime($today))/(60*60*24);
                                                    @endphp
                                                    <td> 
                                                     @if($order->status=== 1)
                                                     <a href="{{route('order.changeStatusOrder',['id'=>$order->id])}}" class="label label-success" onclick="return confirm('Bạn chắc chắn muốn Block Gói tập')">
                                                     <span class="icofont icofont-ui">Còn Hạn</span></a>
                                                     <td>  
                                                        
                                                        <a onclick="return confirm('Bạn chắc chắn muốn xóa hoá đơn này')"
                                                        class=" btn btn-danger delete-product"
                                                        href="{{route('order.delete',['id'=>$order->id])}}">
                                                        <span class="icofont icofont-ui-delete"></span>
                                                    </a>
                                                    @if($order->typepackage->security == 2 && $x >31 )
                                                    <a onclick="return confirm('Bạn chắc chắn muốn pass hoá đơn này')"
                                                        class=" btn btn-primary m-b-0"
                                                        href="{{route('order.pass',['id'=> $order->id])}}">
                                                        <span class="icofont">PASS</span>
                                                        </a> 
                                                        @endif
                                                
                                                </td>
                                                    
                                                     @elseif($order->status === 2)
                                                     <span class="label label-danger">Hết Hạn</span>
                                                     <td>  <a onclick="return confirm('Bạn chắc chắn muốn xóa hoá đơn này')"
                                                        class=" btn btn-danger delete-product"
                                                        href="{{route('order.delete',['id'=>$order->id])}}">
                                                        <span class="icofont icofont-ui-delete"></span>
                                                    </a>
                                                    <a href="{{route('order.repeat',['id'=>$order->id])}}"class="btn btn-primary m-b-0">
                                                        Gia Hạn Lại
                                                         </a>
                                                    </td>
                                                    @elseif($order->status === 3 && $order->typepackage->security == 2 && $x >31 )

                                                         <a href="{{route('order.changeStatusOrder',['id'=>$order->id])}}" class="label label-warning" onclick="return confirm('Bạn chắc chắn muốn chuyển trạng thái bảo lưu Gói tập')">
                                                            <span class="icofont icofont-ui">Đang Bảo Lưu</span>  </a>
                                                    
                                                                @if($order->method ==2)

                                                                <td class="dropdown" >  
                                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="feather icon-settings"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        
                                                                      <a class="dropdown-item"  href="{{route('order.reserve',['id'=>$order->id])}}"><i class="icofont icofont-edit"></i> Bảo lưu</a>
                                                                      <a class="dropdown-item"  href="{{route('order.editOrder',['id'=>$order->id])}}"><i class="icofont icofont-edit"></i> Cập nhật ngày</a>
                                                                      
                                                                      <a class="dropdown-item" href="{{route('order.delete',['id'=>$order->id])}}" onclick="return confirm('Bạn chắc chắn muốn xóa hoá này')"><i class="icofont icofont-ui-delete"></i>Xóa</a>
                                                                     </div>

                                                                {{-- <a onclick="return confirm('Bạn chắc chắn muốn bảo lưu hoá đơn này')"
                                                                class=" btn btn-warning "
                                                                href="{{route('order.reserve',['id'=>$order->id])}}">
                                                                <span class="icofont "> Bảo Lưu</span>
                                                                   </a>
                                                                   <a href="{{route('order.editOrder',['id'=>$order->id])}}"class="btn btn-inverse "style="float: none;margin: 5px;">
                                                                      <span class="icofont icofont-ui-edit"></span>
                                                                      </a>
                                                                      <a onclick="return confirm('Bạn chắc chắn muốn xóa hoá đơn này')"
                                                            class=" btn btn-danger delete-product"
                                                            href="{{route('order.delete',['id'=>$order->id])}}">
                                                            <span class="icofont icofont-ui-delete"></span>
                                                        </a> --}}



                                                    </td>


                                                        @endif
                                                    
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
