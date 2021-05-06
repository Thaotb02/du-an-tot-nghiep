@extends('layout-client')
<!-- <link rel="stylesheet" type="text/css"
    href="{{asset('assets/admin/bower_components/bootstrap/css/bootstrap.min.css')}}" /> -->
@section('content')
<main>
    <div class="page-body">
        <a href="#">
            <div class="main-breadcrumb">
                <div class="breadcrumb-bg">
                    <div class="container">
                        <div class="title-bg">Huấn luyện viên</div>
                        <div class="title">Huấn luyện viên</div>
                    </div>
                </div>
            </div>
        </a>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-header card">
                        <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#personal" role="tab">Thông tin cá
                                    nhân</a>
                                <div class="slide"></div>
                            </li>

                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="personal" role="tabpanel">
                            <div class="card">
                                <div class="card-header"></div>
                                <div class="card-block">
                                    <div class="view-info">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="general-info">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xl-8">
                                                            <div class="table-responsive">
                                                                <table class="table m-0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row">Họ và tên </th>
                                                                            <td>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Giới tính</th>
                                                                            <td>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Năm sinh</th>
                                                                            <td>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Bộ môn</th>
                                                                            <td>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Số điện thoại</th>
                                                                            <td>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Email</th>
                                                                            <td>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Địa chỉ</th>
                                                                            <td>

                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-xl-4">
                                                            <div class="">
                                                                <img style="width: 300px;height: 350px;object-fit: cover;"
                                                                    src=" " alt="">
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                             <div class="view-info">
                                        descretipn
                                    </div>
                                        </div>
                                        <div class="col-4"></div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection