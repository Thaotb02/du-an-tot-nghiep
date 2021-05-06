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
                                                <th scope="col">Thời gian bảo lưu</th>
                                                <th scope="col">Phí bảo lưu</th>
                                                <th scope="col" >Số ngày bảo lưu</th>
                                                <th scope="col"> Số ngày còn lại </th>
                                                <th scope="col">Trạng thái thanh toán</th>
                                                <th scope="col">Trạng thái</th>
                                                <th scope="col"> Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($reserves as $no => $reserve)
                                            <tr id="item{{$reserve->id}}" class="active">
                                                 
                         
                                                <td>{{isset($reserve->order->member->infor) ? $reserve->order->member->infor->name : ''  }}
                                                </td>
                                                <td>{{$reserve->order->member->infor->phone}}</td>
                                                <td>{{$reserve->start_day->format('d-m-Y')}} -- {{$reserve->finish_day->format('d-m-Y')}} </td>   
                                                <td>
                                                   {{number_format($reserve->price,0,'','.')}} VNĐ
                                                </td>
                                                @php
                                                    $x = (strtotime($reserve->finish_day->format('d-m-Y')) - strtotime($reserve->start_day->format('d-m-Y')))/(60*60*24);
                                                    $y = (strtotime($reserve->finish_day->format('d-m-Y'))- strtotime($today))/(60*60*24);
                                                @endphp
                                                <td>{{ $x }} Ngày </td>
                                                   
                                                 <td>
                                                   @if($y > 0 )
                                                   {{$y}} Ngày
                                                   @else
                                                   0 Ngày
                                                   @endif
                                                 </td>
                                                 <td>
                                                   @if($reserve->status_pay==1)
                                                   <a href="{{route('order.changeStatusReserve',['id'=>$reserve->id])}}" class="label label-danger" onclick="return confirm('Bạn chắc chắn muốn chuyển trạng thái thành thanh toán Gói tập')">
                                                   <span class="icofont icofont-ui">Chưa thanh toán</span></a> 
                                                   @else 
                                                   <a href="{{route('order.changeStatusReserve',['id'=>$reserve->id])}}" class="label label-success" onclick="return confirm('Bạn chắc chắn muốn chuyển trạng thái thành chưa thanh toán Gói tập')">
                                                       <span class="icofont icofont-ui">Đã thanh toán</span></a> 
                                                        @endif
                                            </td>
                                                 <td>
                                                    @if($reserve->status==1)
                                                    <span class="label label-warning">Đang Bảo Lưu</span>
                                                    @else 
                                                    <span class="label label-success">Hết Hạn Bảo Lưu</span>
                                                    @endif
                                                </td>
                                             
                                               
                                                <td class="dropdown">
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                       <i class="feather icon-settings"></i>
                                                   </button>
                                                   <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                    <a class="dropdown-item" href="{{route('order.detailReserve',['id'=>$reserve->id])}}"><i class="icofont icofont-eye-alt"></i>Thông tin chi tiết</a>
                                                    
                                                   </div>

                                                </td>
                                            </tr>
                                            @endforeach
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
