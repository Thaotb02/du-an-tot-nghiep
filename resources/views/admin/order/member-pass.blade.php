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
                                    <h3 style="font-weight: 600">Chi tiết hóa đơn chuyển nhượng</h3>
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
                                    <li class="breadcrumb-item">Chi tiết hóa đơn chuyển nhượng</a>
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
                                    class="btn btn-primary m-b-20 float-right">Thêm hoá đơn pass </a>
                                    <div class="export mb-2">
                                        <a href="{{ route('export-order') }}" class="btn btn-info export"
                                            id="export-button"> Export file </a>
                                    </div> --}}
                                    <div class="dt-responsive table-responsive">

<<<<<<< HEAD
                            
                         
                                <div class="dt-responsive table-responsive">
                                    <button class="btn btn-danger" id="xoa" onclick="xoa()"
                                        style="display: none">Xoá</button> <br>
                             
                                    <table id="footer-select" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                
                                          
                                                <th scope="col">Tên khách hàng</th>
                                             
                                                <th scope="col">Bộ môn</th>
                                                <th scope="col">Loại gói tập</th>
                                                <th scope="col">Thời gian</th>
                                                <th scope="col">Người hướng dẫn</th>
                                                <th scope="col">Tổng tiền</th>
                                                <th scope="col">Trạng thái</th>
                                                <th scope="col">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                            <tr id="item{{$order->id}}" class="active">
                                                   
                                               
                                                <td>{{isset($order->member->infor) ? $order->member->infor->name : ''  }}
                                                </td>
                                                <td>{{isset($order->typepackage) ? $order->typepackage->subject->subject_name : '' }}
                                                </td>
                                                <td>{{isset($order->typepackage) ? $order->typepackage->TypePackage_name : '' }}
                                                </td>
                                                <td>{{$order->start_date->format('d-m-Y')}} -- {{$order->finish_date->format('d-m-Y')}} </td>       
                                                 <td>{{isset($order->pt->infor) ? $order->pt->infor->name : 'Không Có' }}</td>
                                                 <td>{{$order->total_money}}
                                                
                                                </td>
                                                
                                                <td>
                                                    @if($order->status === 2)
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
                                            </td>
                                            <td></td>
                                               @endif
                                             
                                            </tr>
                                        
                                        </tbody>
                                      
                                    </table>
=======


                                        <div class="dt-responsive table-responsive">
                                            <button class="btn btn-danger" id="xoa" onclick="xoa()"
                                                style="display: none">Xoá</button> <br>

                                            <table id="footer-select"
                                                class="table table-striped  table-bordered nowrap">
                                                <thead>
                                                    <tr>


                                                        <th scope="col">Tên khách hàng</th>
                                                        <th scope="col">Bộ môn</th>
                                                        <th scope="col">Loại gói tập</th>
                                                        <th scope="col">Thời gian</th>
                                                        <th scope="col">Người hướng dẫn</th>
                                                        <th scope="col">Tổng tiền</th>
                                                        <th scope="col">Trạng thái</th>
                                                        <th scope="col">Hành động</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr id="item{{$order->id}}" class="active">


                                                        <td>{{isset($order->member->infor) ? $order->member->infor->name : ''  }}
                                                        </td>
                                                        <td>{{isset($order->typepackage) ? $order->typepackage->subject->subject_name : '' }}
                                                        </td>
                                                        <td>{{isset($order->typepackage) ? $order->typepackage->TypePackage_name : '' }}
                                                        </td>
                                                        <td>{{$order->start_date->format('d-m-Y')}} --
                                                            {{$order->finish_date->format('d-m-Y')}} </td>
                                                        <td>{{isset($order->pt->infor) ? $order->pt->infor->name : 'Không Có' }}
                                                        </td>
                                                        <td>{{$order->total_money}}

                                                        </td>

                                                        <td>
                                                            @if($order->status === 2)
                                                            <span class="label label-danger">Hết Hạn</span>
                                                        <td> <a onclick="return confirm('Bạn chắc chắn muốn xóa hoá đơn này')"
                                                                class=" btn btn-danger delete-product"
                                                                href="{{route('order.delete',['id'=>$order->id])}}">
                                                                <span class="icofont icofont-ui-delete"></span>
                                                            </a>
                                                            <a href="{{route('order.repeat',['id'=>$order->id])}}"
                                                                class="btn btn-primary m-b-0">
                                                                Gia Hạn Lại
                                                            </a>
                                                        </td>
                                                        </td>
                                                        <td></td>
                                                        @endif

                                                    </tr>

                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
>>>>>>> 1efae90dca1041cbdb5ea202c4a2c72c072b6a92
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