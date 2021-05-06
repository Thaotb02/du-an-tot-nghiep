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
                                    <h3 style="font-weight: 600">Danh sách loại gói tập </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <i class="feather icon-home"></i>
                                    </li>
                                    <li class="breadcrumb-item">Quản lý loại gói tập
                                    </li>
                                    <li class="breadcrumb-item">Danh sách loại gói tập</a>
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


                                    <a href="{{route('typepackage.create')}}"
                                        class="btn btn-success m-b-20 float-right mb-4">
                                        <span class="icofont icofont-ui-add"></span>Thêm mới loại gói tập</a>
                                    <div class="export mb-2">
                                        <a href="{{ route('export-typepackage') }}" class="btn btn-info export"
                                            id="export-button"> Export file </a>
                                    </div>
                                    <div class="dt-responsive table-responsive">
                                        <table id="footer-select"
                                            class="table table-striped table-bordered responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th scope="col"> <button class="btn btn-danger" id="xoa"
                                                            onclick="xoa()" style="display: none">Xóa</button>
                                                    </th>
                                                    <th scope="col">STT</th>
                                                    <th scope="col">Tên loại gói tập</th>
                                                    <th scope="col">Bộ môn</th>
                                                    <th scope="col">Thể loại</th>
                                                    <th scope="col">Bảo lưu</th>
                                                    <th scope="col">Giá niêm yết</th>
                                                    <th scope="col">Giá sale</th>
                                                    <th scope="col">Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($typePackAge as $no => $item)
                                                <tr>
                                                    <th><input type="checkbox" id="value_check{{$item->id}}"
                                                            aria-label="Checkbox for following text input"
                                                            onclick="Check({{$item->id}})" name="check"></th>
                                                    <th scope="row">{{$no + 1}}</th>
                                                    <td>{{$item->TypePackage_name}}</td>
                                                    <td>{{isset($item->subject) ? $item->subject->subject_name : '' }}
                                                    </td>
                                                    <td>
                                                        @if($item->catetoryPackage===1)
                                                        <span class="label label-danger">Không có PT</span>
                                                        @elseif($item->catetoryPackage===2)
                                                        <span class="label label-success">Có PT</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($item->security===1)
                                                        <span class="label label-danger">Không bảo lưu</span>
                                                        @elseif($item->security===2)
                                                        <span class="label label-success">Được bảo lưu</span>
                                                        @endif
                                                    </td>
                                                    <td> {{number_format($item->price,0,'','.')}} VNĐ</td>
                                                    @if ($item->price_sale)
                                                    <td>{{number_format($item->price_sale,0,'','.')}} VNĐ</td>
                                                    @else <td>Không sale</td>
                                                    @endif

                                                    <td class="dropdown">
                                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="feather icon-settings"></i>
                                                        </button>
                                                        <div
                                                            class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                            <a class="dropdown-item"
                                                                href="{{route('typepackage.edit',['id'=> $item->id])}}"><i
                                                                    class="icofont icofont-edit"></i>Sửa</a>
                                                            <a class="dropdown-item"
                                                                href="{{route('typepackage.remove',['id' => $item->id])}}"><i
                                                                    class="icofont icofont-ui-delete"></i>Xóa</a>
                                                            <a class="dropdown-item"
                                                                href="{{route('order.addmember',['id'=> $item->id])}}"><i
                                                                    class="icofont icofont-tasks-alt"></i>Gia hạn hóa
                                                                đơn mới</a>
                                                            <a class="dropdown-item"
                                                                href="{{route('order.addregister',['id'=> $item->id])}}"><i
                                                                    class="icofont icofont-ui-note"></i>Thêm hóa đơn
                                                                mới</a>

                                                        </div>
                                                    </td>
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
<div id="styleSelector">
</div>
</div>
</div>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
var url_getsche = "{{route('typepackage.deletestype')}}";
var arr = [];

function Check(id) {
    var x = document.getElementById("value_check" + id);

    if (x.checked == true) {
        console
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
    axios.post(url_getsche, {
        arr: arr
    });
    window.location.href = "{{route('typepackage.list')}}";
}
</script>