@extends('layout-admin')
@section('content')

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
                                    <h3 style="font-weight: 600">Danh sách Huấn luyện viên </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="index.html"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item">Quản lý huấn luyện viên
                                    </li>
                                    <li class="breadcrumb-item">Danh sách huấn luyện viên
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

                                    <a href="{{route('pt.add')}}" class="btn btn-success m-b-20 float-right mb-4">
                                        <span class="icofont icofont-ui-add"></span> Thêm mới huấn luyện viên</a>
                                    <div class="export mb-3">
                                        <a href="{{ route('export-pt') }}" class="btn btn-info export"
                                            id="export-button"> Export file </a>
                                    </div>
                                    <div class="dt-responsive table-responsive">

                                        <table id="footer-select"
                                            class="table table-striped table-bordered display responsive nowrap ">
                                            <thead>
                                                <tr>
                                                    <th scope="col"><button class="btn btn-danger" id="delete"
                                                            onclick="xoa()" style="display: none">Xoá</button> </th>
                                                    <th scope="col">STT</th>
                                                    <th scope="col">Tên huấn luyện viên</th>
                                                    <th scope="col">Số điện thoại</th>
                                                    <th scope="col">Địa chỉ</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Bộ môn</th>
                                                    <th scope="col"  width='5%' >Trạng thái</th>
                                                    <th scope="col">Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pts as $no => $pt)
                                                <tr id="item{{$pt->id}}" class="active">
                                                    <th><input type="checkbox" id="value_check{{$pt->id}}"
                                                            aria-label="Checkbox for following text input"
                                                            onclick="Check({{$pt->id}})" name="check"></th>
                                                    <th scope="row">{{$no +1}}</th>
                                                    <td>{{isset($pt->infor) ? $pt->infor->name : ''  }}</td>
                                                    <td>{{isset($pt->infor) ? $pt->infor->phone : '' }}</td>
                                                    <td>{{isset($pt->infor) ? $pt->infor->address : '' }}</td>
                                                    <td>{{isset($pt->infor) ? $pt->infor->email : '' }}</td>
                                                    <td>{{isset($pt->subject) ? $pt->subject->subject_name : '' }}</td>
                                                    <td> @if($pt->status === 1)
                                                        <a href="{{route('pt.changeStatus',['id'=>$pt->id])}}"
                                                            class="label label-success"
                                                            onclick="return confirm('Bạn chắc chắn muốn block HLV')"
                                                            style="float: none;margin: 5px;">
                                                            <span class="icofont icofont-ui">Đang Hoạt Động</span></a>
                                                        @elseif($pt->status === 2)
                                                        <a href="{{route('pt.changeStatus',['id'=>$pt->id])}}"
                                                            class="label label-danger"
                                                            onclick="return confirm('Bạn chắc chắn muốn block HLV')"
                                                            style="float: none;margin: 5px;">
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
                                                                href="{{route('pt.edit',['id'=>$pt->id])}}"><i
                                                                    class="icofont icofont-edit"></i>Sửa</a>
                                                            <a class="dropdown-item"
                                                                href="{{route('pt.delete',['id'=>$pt->id])}}"><i
                                                                    class="icofont icofont-ui-delete"></i>Xóa</a>
                                                            <a class="dropdown-item"
                                                                href="{{route('pt.profile',['id'=>$pt->id])}}"><i
                                                                    class="icofont icofont-eye-alt"></i>Thông tin chi
                                                                tiết</a>


                                                        </div>



                                                        {{-- 
                                                        <div class="tabledit-toolbar btn-toolbar"
                                                            style="text-align: left;">
                                                            <div class="btn-group btn-group-sm d-flex"
                                                                style="float: none;">
                                                                <a href="{{route('pt.profile',['id'=>$pt->id])}}"class="btn
                                                        btn-info"style="float: none;margin: 5px;">
                                                        <span class="icofont icofont-eye-alt"></span>
                                                        </a>
                                                        <a href="{{route('pt.edit',['id'=>$pt->id])}}"
                                                            class="btn btn-inverse" style="float: none;margin: 5px;">
                                                            <span class="icofont icofont-ui-edit"></span>
                                                        </a>

                                                        <a href="{{route('pt.delete',['id'=>$pt->id])}}"
                                                            onclick="return confirm('Bạn chắc chắn muốn xóa huấn luyện viên này ')"
                                                            class="btn btn-danger" style="float: none;margin: 5px;">
                                                            <span class="icofont icofont-ui-delete"></span>
                                                        </a>

                                    </div> --}}
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

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
var url_getSP = "{{route('pt.deletePt')}}";
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
    window.location.href = "{{route('pt.list')}}";
}
</script>