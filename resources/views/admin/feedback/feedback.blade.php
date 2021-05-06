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
                                    <h3 style="font-weight: 600">Danh sách Feedback </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <i class="feather icon-home"></i>
                                    </li>
                                    <li class="breadcrumb-item">Quản lý feedback
                                    </li>
                                    <li class="breadcrumb-item">Danh sách feedback</a>
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
                                    <a href="{{route('feedback.create')}}"
                                        class="btn btn-success m-b-20 float-right mb-4">
                                        <span class="icofont icofont-ui-add"></span> Thêm mới feedback</a>
                                        <div class="export">
                                        <a href="{{ route('export-feedback') }}" class="btn btn-info export"
                                            id="export-button"> Export file </a>
                                    </div>
                                    <div class="dt-responsive table-responsive">
                                        <table id="footer-select"
                                            class="table table-striped table-bordered responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th scope="col"> <button class="btn btn-danger" id="xoa"
                                                            onclick="xoa()" style="display: none">Xoá</button> </th>
                                                    <th scope="col">STT</th>

                                                    <th scope="col">Hội viên</th>
                                                    <th scope="col">Huấn luyện viên</th>
                                                    <th scope="col">Ngày feedback</th>
                                                    <th scope="col">Nội dung feedback</th>
                                                    <th scope="col">Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($feedback as $no => $feed)
                                                <tr>
                                                    <th><input type="checkbox" id="value_check{{$feed->id}}"
                                                            aria-label="Checkbox for following text input"
                                                            onclick="Check({{$feed->id}})" name="check">
                                                    </th>
                                                    <th scope="row">{{$no+1}}</th>
                                                    <td>{{isset($feed->member->infor) ? $feed->member->infor->name : ''}}
                                                    </td>
                                                    <td>{{isset($feed->pt->infor) ? $feed->pt->infor->name : ''}}</td>
                                                    <td>{{$feed->created_at->format('d-m-Y')}}</td>
                                                    <td>{{$feed->content}}</td>
                                                    <td class="dropdown">
                                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="feather icon-settings"></i>
                                                        </button>
                                                        <div
                                                            class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                        
                                                            <a class="dropdown-item"
                                                                href="{{route('feedback.remove',['id' => $feed->id])}}"
                                                                onclick="return confirm('Bạn chắc chắn muốn xóa feedback này')"><i
                                                                    class="icofont icofont-ui-delete"></i>Xóa</a>
                                                        </div>

                                </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <th scope="col" class="th-checkbox"></th>
                                    <th scope="col" class="th-stt"></th>

                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col" class="th-action"></th>
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
var url_getsche = "{{route('feedback.deletesFeedback')}}";
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
    window.location.href = "{{route('feedback.list')}}";
}
</script>