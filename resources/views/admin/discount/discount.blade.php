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
                                    <h3 style="font-weight: 600">Danh sách mã giảm giá</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="index.html"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Quản lý mã giảm giá</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Danh sách mã giảm giá</a>
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

                                    <a href="{{route('discount.create')}}"
                                        class="btn btn-success m-b-20 float-right mb-4">
                                        <span class="icofont icofont-ui-add"></span> Thêm mới mã giảm giá</a>
                                    <div class="export mb-3">
                                        <a href="{{ route('export-discount') }}" class="btn btn-info export"
                                            id="export-button"> Export file </a>
                                    </div>
                                    <div class="dt-responsive table-responsive">
                                        <table id="footer-select"
                                            class="table table-striped table-bordered responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th scope="col"> <button class="btn btn-danger" id="xoa"
                                                            onclick="xoa()" style="display: none">Xoá</button></th>
                                                    <th scope="col">STT</th>
                                                    <th scope="col">Tên Discount</th>
                                                    <th scope="col">Mã Discount</th>
                                                    <th scope="col">Giảm giá (%)</th>
                                                    <th scope="col">Ngày bắt đầu</th>
                                                    <th scope="col">Ngày kết thúc</th>
                                                    <th scope="col">Số lượng</th>
                                                    <th scope="col">Trạng thái</th>
                                                    <th scope="col">Tình trạng</th>
                                                    <th scope="col">Hành Động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($discount as $no => $disc)
                                                <tr>
                                                    <th><input type="checkbox" id="value_check{{$disc->id}}"
                                                            aria-label="Checkbox for following text input"
                                                            onclick="Check({{$disc->id}})" name="check">
                                                    </th>
                                                    <th scope="row">{{$no+1}}</th>
                                                    <td>{{$disc->name}}</td>
                                                    <td>{{$disc->code}}</td>
                                                    <td>{{$disc->price}}%</td>
                                                    <td>{{$disc->start_day->format('d-m-Y')}}</td>
                                                    <td>{{$disc->finish_day->format('d-m-Y')}}</td>
                                                    <td>{{$disc->quantity}}</td>
                                                    <td>
                                                        <input data-id="{{$disc->id}}" class="toggle-class-discount"
                                                            type="checkbox" data-onstyle="success"
                                                            data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                                            data-off="InActive" {{ $disc->status ? 'checked' : '' }}>
                                                    </td>
                                                    <td>
                                                        @if($disc->start_day->format('Y-m-d')>$date)
                                                        <span class="label label-warning pushme2 with-color">Chưa bắt
                                                            đầu</span>
                                                        @elseif($disc->finish_day->format('Y-m-d')>=$date)
                                                        <span class="label label-primary pushme2 with-color">Còn
                                                            Hạn</span>
                                                        @else
                                                        <span class="label label-danger pushme2 with-color">Đã hết
                                                            hạn</span>
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
                                                                href="{{route('discount.edit',['id'=> $disc->id])}}"><i
                                                                    class="icofont icofont-edit"></i>Sửa</a>
                                                            <a class="dropdown-item"
                                                                href="{{route('discount.remove',['id' => $disc->id])}}"
                                                                onclick="return confirm('Bạn chắc chắn muốn xóa mã giảm giá này')"><i
                                                                    class="icofont icofont-ui-delete"></i>Xóa</a>
                                                        </div>
                                                        {{-- <div class="tabledit-toolbar btn-toolbar"
                                                            style="text-align: left;">
                                                            <div class="btn-group btn-group-sm d-flex"
                                                                style="float: none;">
                                                                <a href="{{route('discount.edit',['id'=> $disc->id])}}"
                                                        class="tabledit-edit-button btn btn-primary waves-effect
                                                        waves-light"
                                                        style="float: none;margin: 5px;">
                                                        <span class="icofont icofont-ui-edit"></span>
                                                        </a>
                                                        <a href="{{route('discount.remove',['id' => $disc->id])}}"
                                                            onclick="return confirm('Bạn chắc chắn muốn xóa voucher đơn này')"
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
                                    <td class="th-checkbox"></td>
                                    <td class="th-stt"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="th-action"></td>
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
var url_getsche = "{{route('discount.deletesDiscount')}}";
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
    window.location.href = "{{route('discount.list')}}";
}
</script>