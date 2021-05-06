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
                                    <h4>Danh sách lịch làm</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                     <i class="feather icon-home"></i> 
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Quản lý lịch làm</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Danh sách lịch làm</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <h4>Lọc để in danh sách Member đã book PT </h4>
                <form action="{{route('schedule.check')}}" method="POST">
                @csrf

                <select name="pt_id" class="js-example-basic-single col-sm-20">
                    <option value="">Tên Huấn Luyện Viên</option>
                    @foreach($pts as $pt)
                    <option value="{{$pt->id}}">{{$pt->infor->name}} {{$pt->infor->email}}</option>
                    @endforeach
                </select>
                <select class="form-control select2" id="select_box" name="pt_id">
                    @foreach($pts as $pt)
                    @if($pt_id !=null)
                    <option {{$pt_id == $pt->id ?'selected':''}} value="{{$pt->id}}">{{ $pt->infor->name }}</option>
                    @endif
                    <option value="{{$pt->id}}">{{ $pt->infor->name }}</option>
                    @endforeach
                </select>
                <br>
                <button type="submit" class="btn btn-primary m-b-0">Submit</button>


                </form>
                @if($pt_id !=null)
                <a href="{{route('schedule.exports',['id'=>$pt_id])}}" type="submit"
                    class="btn btn-primary m-b-0">Export</a>
                @endif --}}
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

                                    <a href="{{route('schedule.create')}}"
                                        class="btn btn-success m-b-20 float-right mb-4">
                                        <span class="icofont icofont-ui-add"></span> Thêm mới lịch làm</a>

                                    <div class="export mb-3">
                                        <a href="{{ route('export-schedule') }}" class="btn btn-info export"
                                            id="export-button"> Export file </a>
                                    </div>
                                    <!-- <button type="button" id="addRow" class="btn btn-primary m-b-20">+ Add Row</button> -->
                                    <div class="dt-responsive table-responsive">
                                        <table id="footer-select" class="table table-bordered table-striped responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th scope="col"><button class="btn btn-danger" id="xoa"
                                                            onclick="xoa()" style="display: none">Xoá</button> </th>
                                                    <th scope="col">STT</th>
                                                    <th scope="col">Tên huấn luyện viên</th>
                                                    <th scope="col">Ca làm</th>
                                                    <th scope="col">Ngày</th>
                                                    <th scope="col">Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($schedule as $no => $sche)
                                                <tr>
                                                    <th><input type="checkbox" id="value_check{{$sche->id}}"
                                                            aria-label="Checkbox for following text input"
                                                            onclick="Check({{$sche->id}})" name="check">
                                                    </th>
                                                    <th scope="row">{{$no+1}}</th>
                                                    <td>{{isset($sche->pt->infor) ? $sche->pt->infor->name : ''}}</td>
                                                    <td>{{isset($sche->time) ? $sche->time->time_name : ''}}</td>
                                                    <td>{{$sche->date->format('d/m/Y')}}</td>
                                                    <td class="dropdown">


                                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="feather icon-settings"></i>
                                                        </button>
                                                        <div
                                                            class="dropdown-menu dropdown-menu-right b-none contact-menu">

                                                            <a class="dropdown-item"
                                                                href="{{route('schedule.edit',['id'=>$sche->id])}}"><i
                                                                    class="icofont icofont-edit"></i>Sửa</a>
                                                            <a class="dropdown-item"
                                                                href="{{route('schedule.remove',['id' => $sche->id])}}"
                                                                onclick="return confirm('Bạn chắc chắn muốn xóa lịch làm này')"><i
                                                                    class="icofont icofont-ui-delete"></i>Xóa</a>




                                                        </div>


                                                        {{-- 
                                                        <div class="tabledit-toolbar btn-toolbar"
                                                            style="text-align: left;">
                                                            <div class="btn-group btn-group-sm d-flex"
                                                                style="float: none;">
                                                                <a href="{{route('schedule.edit',['id'=>$sche->id])}}"
                                                        class="tabledit-edit-button btn btn-primary waves-effect
                                                        waves-light"
                                                        style="float: none;margin: 5px;">
                                                        <span class="icofont icofont-ui-edit"></span>
                                                        </a>
                                                        <a href="{{route('schedule.remove',['id' => $sche->id])}}"
                                                            onclick="return confirm('Bạn chắc chắn muốn xóa lịch làm này')"
                                                            class="tabledit-delete-button btn btn-danger waves-effect waves-light"
                                                            style="float: none;margin: 5px;">
                                                            <span class="icofont icofont-ui-delete"></span>
                                                        </a>
                                    </div>
                                </div> --}}
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
var url_getsche = "{{route('schedule.deletesSchedele')}}";
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
    window.location.href = "{{route('schedule.list')}}";
}
</script>