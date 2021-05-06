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
                                    </div>
                                    --}}
                                    <div class="dt-responsive table-responsive">
                                        <td>
                                            <a class="btn btn-warning" href="{{route('order.listorder')}}">Quay lại</a>

                                        <table id="footer-select" class="table table-striped table-bordered nowrap">
                                <div class="dt-responsive table-responsive">
                                    <button class="btn btn-danger" id="xoa" onclick="xoa()"
                                        style="display: none">Xoá</button> <br>
                                    @if($orders->pass ==0)
                                    <table id="footer-select" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                         
                                                <th>STT</th>
                                                <th scope="col">Hội viên được chuyển nhượng</th>
                                                <th scope="col">Số điện thoại</th>
                                                <th scope="col">Bộ môn</th>
                                                <th scope="col">Loại gói tập</th>
                                                <th scope="col">Thời gian</th>
                                                <th scope="col">Người hướng dẫn</th>
                                                <th scope="col">Tổng tiền</th>
                                                <th scope="col">Trạng thái</th>
                                         
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach ($x as $no => $orders) --}}
                                            <tr id="item{{$members->id}}" class="active">
                                                   
                                                <th scope="row">1</th>
                                                <td>{{isset($members->member->infor) ? $members->member->infor->name : ''  }}
                                                </td>
                                                <td>{{$members->member->infor->phone}}</td>
                                                <td>{{isset($members->typepackage) ? $members->typepackage->subject->subject_name : '' }}
                                                </td>
                                                <td>{{isset($members->typepackage) ? $members->typepackage->TypePackage_name : '' }}
                                                </td>
                                                <td>{{$members->start_date->format('d-m-Y')}} -- {{$members->finish_date->format('d-m-Y')}} </td>       
                                                 <td>{{isset($members->pt->infor) ? $members->pt->infor->name : 'Không Có' }}</td>
                                                 <td>{{number_format($members->total_money,0,'','.')}} VNĐ</td>
                                                 <td> 
                                                    @if($members->status==1)
                                                    <span class=" label label-success ">Còn Hạn</span>
                                                    @elseif($members->status==2) 
                                                    <span class=" label label-danger ">Hết Hạn</span>
                                                    @elseif($members->status ==3)
                                                    <span class=" label label-warning ">Đang Bảo Lưu</span>
                                                    @elseif($members->status ==4)
                                                    <span class=" label label-danger ">Chuyển nhượng</span>
                                                    @endif
                                                 </td>
                                         
                                                
                                                 
                                            </tr>
                                            {{-- @endforeach --}}
                                        </tbody>
                                      
                                    </table>
                                    @elseif($orders->status==4 && $orders->status_pass==2) 
                                    <table id="footer-select" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                
                                                </th>
                                                <th scope="col">STT</th>
                                                <th scope="col">Hội viên chuyển nhượng</th>
                                                <th scope="col">Số điện thoại</th>
                                                <th scope="col">Bộ môn</th>
                                                <th scope="col">Loại gói tập</th>
                                                <th scope="col">Thời gian</th>
                                                <th scope="col">Người hướng dẫn</th>
                                                <th scope="col">Tổng tiền</th>
                                                <th scope="col">Trạng thái</th>
                          
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach ($x as $no => $orders) --}}
                                            <tr id="item{{$thang1->id}}" class="active">
                                                   
                                                <th scope="row">1</th>
                                                <td>{{isset($thang1->member->infor) ? $thang1->member->infor->name : ''  }}
                                                </td>
                                                <td>{{$thang1->member->infor->phone}}</td>
                                                <td>{{isset($thang1->typepackage) ? $thang1->typepackage->subject->subject_name : '' }}
                                                </td>
                                                <td>{{isset($thang1->typepackage) ? $thang1->typepackage->TypePackage_name : '' }}
                                                </td>
                                                <td>{{$thang1->start_date->format('d-m-Y')}} -- {{$thang1->finish_date->format('d-m-Y')}} </td>       
                                                 <td>{{isset($thang1->pt->infor) ? $thang1->pt->infor->name : 'Không Có' }}</td>
                                                 <td>{{number_format($thang1->total_money,0,'','.')}} VNĐ</td>
                                                 <td> 
                                                    @if($thang1->status==1)
                                                    <span class=" label label-success ">Còn Hạn</span>
                                                    @elseif($thang1->status==2) 
                                                    <span class=" label label-danger ">Hết Hạn</span>
                                                    @elseif($thang1->status ==3)
                                                    <span class=" label label-warning ">Đang Bảo Lưu</span>
                                                    @elseif($thang1->status ==4)
                                                    <span class=" label label-danger ">Chuyển nhượng</span>
                                                    @endif
                                                 </td>
                                             
                                                
                                                 
                                            </tr>
                                            {{-- @endforeach --}}
                                        </tbody>
                                   
                                    </table>

                                   
                                    
                                    <table id="footer-select" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                               
                                                <th scope="col">STT</th>
                                                <th scope="col">Hội viên được chuyển nhượng</th>
                                                <th scope="col">Số điện thoại</th>
                                                <th scope="col">Bộ môn</th>
                                                <th scope="col">Loại gói tập</th>
                                                <th scope="col">Thời gian</th>
                                                <th scope="col">Người hướng dẫn</th>
                                                <th scope="col">Tổng tiền</th>
                                                <th scope="col">Trạng thái</th>
                                                
                                         
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach ($y as $no => $order) --}}
                                            <tr class="active">
                                                  
                                                <th scope="row">1</th>
                                                <td>{{isset($thang3->member->infor) ? $thang3->member->infor->name : ''  }} 
                                                </td>
                                                <td>{{$thang3->member->infor->phone}}</td>
                                                <td>{{isset($thang3->typepackage) ? $thang3->typepackage->subject->subject_name : '' }}
                                                </td>
                                                <td>{{isset($thang3->typepackage) ? $thang3->typepackage->TypePackage_name : '' }}
                                                </td>
                                                <td>{{$thang3->start_date->format('d-m-Y')}} -- {{$thang3->finish_date->format('d-m-Y')}} </td>       
                                                 <td>{{isset($thang3->pt->infor) ? $thang3->pt->infor->name : 'Không Có' }}</td>
                                                 <td>{{number_format($thang3->total_money,0,'','.')}} VNĐ</td>
                                                 <td> 
                                                    @if($thang3->status==1)
                                                    <span class=" label label-success ">Còn Hạn</span>
                                                    @elseif($thang3->status==2) 
                                                    <span class=" label label-danger ">Hết Hạn</span>
                                                    @elseif($thang3->status ==3)
                                                    <span class=" label label-warning ">Đang Bảo Lưu</span>
                                                    @elseif($thang3->status ==4)
                                                    <span class=" label label-danger ">Chuyển nhượng</span>
                                                    @endif
                                                 </td>
                                    
                                                
                                                 
                                            </tr>
                                            {{-- @endforeach --}}
                                        </tbody>
                                      
                                    </table>
                                    @elseif($orders->status ==1 && $orders->status_pass==2)
                                    <table id="footer-select" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                
                                                
                                                <th scope="col">STT</th>
                                                <th scope="col">Hội viên chuyển nhượng</th>
                                                <th scope="col">Số điện thoại</th>
                                                <th scope="col">Bộ môn</th>
                                                <th scope="col">Loại gói tập</th>
                                                <th scope="col">Thời gian</th>
                                                <th scope="col">Người hướng dẫn</th>
                                                <th scope="col">Tổng tiền</th>
                                                <th scope="col">Trạng thái</th>
                                         
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach ($x as $no => $orders) --}}
                                            <tr id="item{{$thanggiua->id}}" class="active">
                                                   
                                                <th scope="row">1</th>
                                                <td>{{isset($thanggiua->member->infor) ? $thanggiua->member->infor->name : ''  }}
                                                </td>
                                                <td>{{$thanggiua->member->infor->phone}}</td>
                                                <td>{{isset($thanggiua->typepackage) ? $thanggiua->typepackage->subject->subject_name : '' }}
                                                </td>
                                                <td>{{isset($thanggiua->typepackage) ? $thanggiua->typepackage->TypePackage_name : '' }}
                                                </td>
                                                <td>{{$thanggiua->start_date->format('d-m-Y')}} -- {{$thanggiua->finish_date->format('d-m-Y')}} </td>       
                                                 <td>{{isset($thanggiua->pt->infor) ? $thanggiua->pt->infor->name : 'Không Có' }}</td>
                                                 <td>{{number_format($thanggiua->total_money,0,'','.')}} VNĐ</td>
                                                 <td> 
                                                    @if($thanggiua->status==1)
                                                    <span class=" label label-success ">Còn Hạn</span>
                                                    @elseif($thanggiua->status==2) 
                                                    <span class=" label label-danger ">Hết Hạn</span>
                                                    @elseif($thanggiua->status ==3)
                                                    <span class=" label label-warning ">Đang Bảo Lưu</span>
                                                    @elseif($thanggiua->status ==4)
                                                    <span class=" label label-danger ">Chuyển nhượng</span>
                                                    @endif
                                                </td>
                                                 
                                            </tr>
                                            {{-- @endforeach --}}
                                        </tbody>
                                     
                                    </table>
                                    @endif
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