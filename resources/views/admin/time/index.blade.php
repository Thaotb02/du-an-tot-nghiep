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
                                    <h3 style="font-weight: 600">Danh sách ca làm </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="index.html"> <i class="feather icon-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">Quản lý ca làm
                                    </li>
                                    <li class="breadcrumb-item">Danh sách ca làm</a>
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

                                    <a href="{{route('admin.time.create')}}"
                                        class="btn btn-success m-b-20 float-right mb-4">
                                        <span class="icofont icofont-ui-add"></span> Thêm mới ca làm</a>
                                    <div class="export">
                                        <a href="{{ route('export-time') }}" class="btn btn-info export"
                                            id="export-button"> Export file </a>
                                    </div>
                                    <div class="dt-responsive table-responsive">
                                        <table id="footer-select"
                                            class="table table-striped table-bordered responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th scope="col"><input type="checkbox" class="selectall" /> </th>
                                                    <th scope="col">STT</th>
                                                    <th scope="col">Tên ca</th>
                                                    <th scope="col">Thời gian bắt đầu</th>
                                                    <th scope="col">Thời gian kết thúc</th>
                                                    <th scope="col">Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($times as $no => $time)
                                                <tr>
                                                    <th><input type="checkbox" class="individual" />
                                                    </th>
                                                    <th scope="row">{{$no+1}}</th>
                                                    <td>{{$time->time_name}}</td>
                                                    <td>{{$time->time_start->format('h:i')}}</td>
                                                    <td>{{$time->time_finish->format('h:i')}}</td>

                                                    <td class="dropdown">
                                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="feather icon-settings"></i>
                                                        </button>
                                                        <div
                                                            class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                            <a class="dropdown-item"
                                                                href="{{route('admin.time.edit',['id'=>$time->id])}}"><i
                                                                    class="icofont icofont-edit"></i>Sửa</a>
                                                            <a class="dropdown-item"
                                                                href="{{route('admin.time.destroy',['time'=>$time->id])}}"
                                                                onclick="return confirm('Bạn chắc chắn muốn xóa ca làm này')"><i
                                                                    class="icofont icofont-ui-delete"></i>Xóa</a>
                                                        </div>
                                                        {{-- <div class="tabledit-toolbar btn-toolbar"
                                                            style="text-align: left;">
                                                            <div class="btn-group btn-group-sm d-flex"
                                                                style="float: none;">
                                                                <a href="{{route('admin.time.edit',['id'=>$time->id])}}"
                                                        class="btn btn-inverse"
                                                        style="float: none;margin: 5px;">
                                                        <span class="icofont icofont-ui-edit"></span>
                                                        </a>
                                                        <form
                                                            action="{{route('admin.time.destroy',['time'=>$time->id])}}"
                                                            onclick="return confirm('Bạn chắc chắn muốn xóa ca làm này')"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger"
                                                                style="float: none;margin: 5px;">
                                                                <span class="icofont icofont-ui-delete"></span>
                                                            </button>
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
                                        <th scope="col" class="th-stt"></th>
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