@extends('layout-client')
<!-- <link rel="stylesheet" type="text/css"
    href="{{asset('assets/admin/bower_components/bootstrap/css/bootstrap.min.css')}}" /> -->
@section('content')
<main>
    <div class="page-body">
        <div class="main-breadcrumb">
            <div class="breadcrumb-bg" style="background-image: url({{asset('assets/client/images/bannerpage.jpg')}});">
                <div class="container">
                    <img class="breadcrumb-stripe" src="{{asset('assets/client/images/bannerpage.jpg')}}" />
                    <div class="title-bg">Detail PT</div>
                    <div class="title">Thông tin chi tiết</div>
                </div>
            </div>
        </div>
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
                                                                            <td> {{isset($detailpt->infor) ? $detailpt->infor->name : '' }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Giới tính</th>
                                                                            <td>
                                                                                {{$detailpt->infor->gender==1? "Nam" :"Nữ"}}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Năm sinh</th>
                                                                            <td> {{$detailpt->infor->birth_date->format('d-m-Y')}}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Bộ môn</th>
                                                                            <td>
                                                                                {{isset($detailpt->subject) ? $detailpt->subject->subject_name : '' }}
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-xl-4">
                                                            <div class="" style="width:350px">
                                                                <img src="{{isset($detailpt->infor) ? $detailpt->infor->avatar : '' }}"
                                                                    alt="" width="100%">
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
                                                {{$detailpt->descriptions}}
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