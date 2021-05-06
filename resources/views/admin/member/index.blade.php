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
                                    <h3 style="font-weight: 600">Danh sách Hội viên </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="index.html"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item">Quản lý hội viên
                                    </li>
                                    <li class="breadcrumb-item">Danh sách hội viên</a>
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
                                    <a href="{{route('member.add')}}" class="btn btn-success m-b-20 float-right mb-4">
                                        <span class="icofont icofont-ui-add"></span> Thêm mới hội viên</a>
                                    <div class="export">
                                        <a href="{{ route('export-member') }}" class="btn btn-info export"
                                            id="export-button"> Export file </a>
                                    </div>
                                    <div class="dt-responsive table-responsive">
                                        <table id="footer-select"
                                            class="table table-striped table-bordered display responsive nowrap "
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col"> <button class="btn btn-danger" id="delete"
                                                            onclick="xoa()" style="display: none">Xoá</button> </th>
                                                    <th scope="col">STT</th>
                                                    <th scope="col">Tên Khách Hàng</th>
                                                    <th scope="col">Số Điện Thoại</th>
                                                    <th scope="col">Địa chỉ</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Quyền</th>
                                                    <th scope="col">Trạng thái</th>
                                                    <th scope="col">Hành Động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($members as $no => $member)
                                                <tr id="item{{$member->id}}" class="active">
                                                    <th> <input type="checkbox" id="value_check{{$member->id}}"
                                                            aria-label="Checkbox for following text input"
                                                            onclick="Check({{$member->id}})" name="check"> </th>
                                                    <th scope="row">{{$no +1}}</th>
                                                    <td>
                                                        {{-- <img src="{{isset($member->infor) ? $member->infor->avatar : ''  }}"
                                                        alt="user-img" style="border-radius: 50%;" width="70px"
                                                        height="70px">
                                                        &nbsp; --}}
                                                        {{isset($member->infor) ? $member->infor->name : ''  }}
                                                    </td>
                                                    <td>{{isset($member->infor) ? $member->infor->phone : '' }}</td>
                                                    <td>{{isset($member->infor) ? $member->infor->address : '' }}</td>
                                                    <td>{{isset($member->infor) ? $member->infor->email : '' }}</td>

                                                    <td>
                                                        @if($member->infor->role==1)
                                                        Hội viên
                                                        @elseif($member->infor->role==0)
                                                        Hội viên
                                                        @else
                                                        Admin
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if($member->status === 1)
                                                        <a href="{{route('member.changeStatus',['id'=>$member->id])}}"
                                                            class="label label-success"
                                                            onclick="return confirm('Bạn chắc chắn muốn khóa tài khoản hội viên này?')">
                                                            <span class="icofont icofont-ui">Đang Hoạt Động</span></a>
                                                        @elseif($member->status === 2)
                                                        <a href="{{route('member.changeStatus',['id'=>$member->id])}}"
                                                            class="label label-danger"
                                                            onclick="return confirm('Bạn chắc chắn muốn khóa tài khoản hội viên này?')">
                                                            <span class="icofont icofont-ui">Block</span></a>
                                                        @endif
                                                    </td>
                                                    <td class="dropdown">
                                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="feather icon-settings"></i>
                                                        </button>
                                                        <div
                                                            class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                            <a class="dropdown-item"
                                                                href="{{route('member.edit',['id'=>$member->id])}}"><i
                                                                    class="icofont icofont-edit"></i>Sửa</a>
                                                            <a class="dropdown-item"
                                                                href="{{route('member.delete',['id'=>$member->id])}}"
                                                                onclick="return confirm('Bạn có chắc chắn muốn xóa hội viên này ?')"><i
                                                                    class="icofont icofont-ui-delete"></i>Xóa</a>
                                                            <a class="dropdown-item"
                                                                href="{{route('member.profile',['id'=>$member->id])}}"><i
                                                                    class="icofont icofont-eye-alt"></i>Thông tin chi
                                                                tiết</a>
                                                        </div>
                                                        {{-- <div class="tabledit-toolbar btn-toolbar"style="text-align: left;">
                                             <div class="btn-group btn-group-sm d-flex"style="float: none;">
                                                <a href="{{route('member.profile',['id'=>$member->id])}}"class="btn
                                                        btn-info"style="float: none;margin: 5px;">
                                                        <span class="icofont icofont-eye-alt"></span>
                                                        </a>
                                                        <a href="{{route('member.edit',['id'=>$member->id])}}"
                                                            class="btn btn-inverse " style="float: none;margin: 5px;">
                                                            <span class="icofont icofont-ui-edit"></span>
                                                        </a>
                                                        <a href="{{route('member.delete',['id'=>$member->id])}}"
                                                            class="btn btn-danger"
                                                            onclick="return confirm('Bạn chắc chắn muốn xóa thành viên')"
                                                            style="float: none;margin: 5px;">
                                                            <span class="icofont icofont-ui-delete"> </span></a>
                                                        {{-- <a class="btn btn-danger btn-outline-danger btn-icon"><i class="icofont icofont-eye-alt"></i></a> --}}
                                                        {{-- </div> --}}
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
</div>
</div>
</div>
</div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
var url_getSP = "{{route('member.deleteMember')}}";
var arr = [];

function Check(id) {
    var x = document.getElementById("value_check" + id);

    if (x.checked == true) {
        console
        arr.unshift(id);
        $("#delete").css('display', 'block');

    }
    if (x.checked == false) {
        var index = arr.indexOf(id);
        if (index > -1) {
            arr.splice(index, 1);
        }
        if (arr.length == 0) {
            $("#delete").css('display', 'none');
        }
    }
}

function xoa() {
    axios.post(url_getSP, {
        arr: arr
    });
    window.location.href = "{{route('member.list')}}";
}
</script>