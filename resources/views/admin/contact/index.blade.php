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
                                    <h3 style="font-weight: 600">Danh sách liên hệ </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <i class="feather icon-home"></i>
                                    </li>
                                    <li class="breadcrumb-item">Quản lý liên hệ
                                    </li>
                                    <li class="breadcrumb-item">Danh sách liên hệ</a>
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
                                    
                                    <a href="{{route('contact.create')}}"
                                        class="btn btn-success m-b-20 float-right mb-4">
                                        <span class="icofont icofont-ui-add"></span> Thêm mới liên hệ</a>
                                    <div class="export">
                                        <a href="{{ route('export-contact') }}" class="btn btn-info export"
                                            id="export-button"> Export file </a>
                                    </div>
                                    <div class="dt-responsive table-responsive">
                                        <table id="footer-select" class="table table-striped responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th scope="col"><button class="btn btn-danger" id="xoa"
                                                            onclick="xoa()" style="display: none">Xoá</button> </th>
                                                    <th scope="col">STT</th>
                                                    <th scope="col">Họ và tên</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Số điện thoại</th>
                                                    <th scope="col">Nội dung</th>
                                                    <th scope="col">Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($contact as $no => $item)
                                                <tr>
                                                    <td scope="col"><input type="checkbox" id="value_check{{$item->id}}"
                                                            aria-label="Checkbox for following text input"
                                                            onclick="Check({{$item->id}})" name="check">

                                                    </td>
                                                    <th scope="row">{{$no+1}}</th>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->email}}</td>
                                                    <td>{{$item->phone}}</td>
                                                    <td>{{$item->content}}</td>
                                                    <td>
                                                        <div class="tabledit-toolbar btn-toolbar"
                                                            style="text-align: left;">
                                                            <div class="btn-group btn-group-sm d-flex"
                                                                style="float: none;">
                                                                {{-- <a href="{{route('contact.edit',['id'=> $item->id])}}"
                                                                class="btn btn-inverse"
                                                                style="float: none;margin: 5px;">
                                                                <span class="icofont icofont-ui-edit"></span>
                                                                </a> --}}
                                                                <a href="{{route('contact.remove',['id' => $item->id])}}"
                                                                    class="btn btn-danger"
                                                                    style="float: none;margin: 5px;"
                                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa liên hệ này ?')">
                                                                    <span class="icofont icofont-ui-delete"></span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th scope="col" class="th-checkbox"></th>
                                                    <th scope="col" class="th-stt"></th>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                    <th scope="col" class="th-action"></th>
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
var url_getsche = "{{route('contact.deletesContact')}}";
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
    window.location.href = "{{route('contact.index')}}";
}
</script>