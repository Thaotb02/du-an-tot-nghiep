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
                                    <h3 style="font-weight: 600">Danh sách bộ môn </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <i class="feather icon-home"></i>
                                    </li>
                                    <li class="breadcrumb-item">Quản lý bộ môn</li>
                                    <li class="breadcrumb-item">Danh sách bộ môn</a>
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
                                    <a href="{{route('subject.create')}}"
                                        class="btn btn-success m-b-20 float-right mb-4">
                                        <span class="icofont icofont-ui-add"></span> Thêm mới bộ môn</a>
                                    <div class="export">
                                        <a href="{{ route('export-subject') }}" class="btn btn-info export"
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
                                                    <th scope="col">Tên Bộ Môn</th>
                                                    <th scope="col">Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($subject as $no => $sub)
                                                <tr>
                                                    <th><input type="checkbox" id="value_check{{$sub->id}}"
                                                            aria-label="Checkbox for following text input"
                                                            onclick="Check({{$sub->id}})" name="check">
                                                    </th>
                                                    <td>{{$no +1}}</td>
                                                    <td>{{$sub->subject_name}}</td>
                                                    {{-- <td><img src="/{{$sub->image}}" alt=""style="width: 100px">
                                                    </td> --}}

                                                    <td class="dropdown">
                                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="feather icon-settings"></i>
                                                        </button>
                                                        <div
                                                            class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                            <a class="dropdown-item"
                                                                href="{{route('subject.edit',['id'=> $sub->id])}}"><i
                                                                    class="icofont icofont-edit"></i>Sửa</a>
                                                            <a class="dropdown-item"
                                                                href="{{route('subject.remove',['id' => $sub->id])}}"
                                                                onclick="return confirm('Bạn chắc chắn muốn xóa bộ môn này')"><i
                                                                    class="icofont icofont-ui-delete"></i>Xóa</a>

                                                        </div>
                                                        {{-- <div class="tabledit-toolbar btn-toolbar"
                                                            style="text-align: left;">
                                                            <div class="btn-group btn-group-sm d-flex"
                                                                style="float: none;">
                                                                <a href="{{route('subject.edit',['id'=> $sub->id])}}"
                                                        class="tabledit-edit-button btn btn-primary waves-effect
                                                        waves-light"
                                                        style="float: none;margin: 5px;">
                                                        <span class="icofont icofont-ui-edit"></span>
                                                        </a>
                                                        <a href="{{route('subject.remove',['id' => $sub->id])}}"
                                                            class="tabledit-delete-button btn btn-danger waves-effect waves-light"
                                                            style="float: none;margin: 5px;">
                                                            <span class="icofont icofont-ui-delete"></span>
                                                        </a>
                                                        </form>
                                    </div>
                                </div> --}}
                                </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col" class="th-checkbox"></th>
                                        <th scope="col" class="th-checkbox"></th>
                                        <th scope="col"></th>
                                        <th scope="col" class="th-checkbox"></th>
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
var url_getsche = "{{route('subject.deletesSubject')}}";
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
    window.location.href = "{{route('subject.list')}}";
}
</script>