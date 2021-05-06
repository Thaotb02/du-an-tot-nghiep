@extends('layout-client')
@section('content')
<base href="{{asset('')}}">
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cover-profile">
                                <div class="profile-bg-img">
                                    <img class="profile-bg-img img-fluid"
                                        src="{{asset('assets/client/images/bcl.jpg')}}" alt="bg-img">
                                    <div class="card-block user-info">
                                        <div class="col-md-12">
                                            <div class="media-left">
                                                @if(($pt->infor->avatar) != null)
                                                <a href="" class="profile-image-client">
                                                    <img class="user-img img-radius" src="{{$pt->infor->avatar}}"
                                                        alt="user-img" style="border-radius: 50%;" width="150px"
                                                        height="150px">
                                                </a>
                                                @else
                                                <a href="" class="profile-image">
                                                    <img class="user-img img-radius"
                                                        src="{{asset('assets/client/images/homepage/img_avatar2.png')}}"
                                                        alt="user-img" style="border-radius: 50%;" width="150px"
                                                        height="150px">
                                                </a>
                                                @endif
                                            </div>
                                            <div class="media-body row">
                                                <div class="col-lg-12">
                                                    <div class="user-title">
                                                        <h2>{{$pt->infor->name}}</h2>
                                                        <div>
                                                            <span
                                                                class="text-white">{{$pt->infor->role==2? "Huấn Luyện Viên" :"Admin"}}
                                                                bộ môn {{ $pt->subject->subject_name}}
                                                            </span>
                                                            <div>
                                                                <div class="label-main">
                                                                    <label
                                                                        class="label label-success">{{$pt->status==1? "Đang hoạt động" :"Nghỉ làm"}}</label>
                                                                </div>
                                                                <br>
                                                                <div class="label-main">

                                                                    <label class="btn btn-success"> <a
                                                                            href="{{route('client.edit-pt-profile')}}"
                                                                            style="color:white;">Sửa Thông
                                                                            tin</a></label>
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
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tab-header card">
                                <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#personal" role="tab">Thông
                                            tin cá nhân</a>
                                        <div class="slide"></div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#binfo" role="tab">Lịch làm</a>
                                        <div class="slide"></div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#contacts" role="tab">Feedback</a>
                                        <div class="slide"></div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#list" role="tab">Hội viên đã
                                            đăng kí</a>
                                        <div class="slide"></div>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active" id="personal" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header">
                                        </div>
                                        <div class="card-block">
                                            <div class="view-info">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="general-info">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-xl-6">
                                                                    <div class="table-responsive">
                                                                        <table class="table m-0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th scope="row">Tên</th>
                                                                                    <td>{{$pt->infor->name}}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Giới tính</th>
                                                                                    <td>{{$pt->infor->gender==1? "Nam" :"Nữ"}}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Ngày sinh</th>
                                                                                    <td>{{$pt->infor->birth_date->format('d-m-Y')}}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Địa chỉ</th>
                                                                                    <td>{{$pt->infor->address}}</td>
                                                                                </tr>

                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-xl-6">
                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th scope="row">Email</th>
                                                                                    <td><a href="#!"><span
                                                                                                class="__cf_email__"
                                                                                                data-cfemail="cd89a8a0a28da8b5aca0bda1a8e3aea2a0">[{{$pt->infor->email}}]</span></a>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Số điện thoại</th>
                                                                                    <td>{{$pt->infor->phone}}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Lương</th>
                                                                                    <td>{{number_format($pt->salary,0,'','.')}}
                                                                                        VNĐ
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row">Ngày tạo tài khoản
                                                                                    </th>
                                                                                    <td>{{$pt->created_at->format(' d-m-Y')}}
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
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
                                <div class="tab-pane" id="binfo" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header">
                                        </div>
                                        <div class="card-block">
                                            <div class="view-info">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="general-info">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-xl-12">
                                                                    <div class="table-responsive">
                                                                        <table class="table m-0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th scope="row">STT</th>
                                                                                    <th scope="row">Ca làm</th>
                                                                                    <th scope="row">Thời gian</th>
                                                                                    <th scope="row">Ngày</th>
                                                                                </tr>
                                                                                @foreach($schedules as $no => $schu)
                                                                                <tr>
                                                                                    <td>{{$no+1}}</td>
                                                                                    <td>{{isset($schu->time) ? $schu->time->time_name : ''}}
                                                                                    </td>
                                                                                    <td>{{isset($schu->time) ? $schu->time->time_start->format('h:i') : ''}}
                                                                                        ---
                                                                                        {{isset($schu->time) ? $schu->time->time_finish->format('h:i') : ''}}
                                                                                    </td>
                                                                                    <td>{{$schu->date->format('d/m/Y')}}
                                                                                    </td>
                                                                                </tr>
                                                                                @endforeach
                                                                            </tbody>
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
                                <div class="tab-pane" id="contacts" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header">
                                        </div>
                                        <div class="card-block">
                                            <div class="view-info">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="general-info">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-xl-12">
                                                                    <div class="table-responsive">
                                                                        <table class="table m-0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th scope="row">STT</th>
                                                                                    <th scope="row">Người Feedback</th>
                                                                                    <th scope="row">Nội Dung Feedback
                                                                                    </th>
                                                                                    <th scope="row">Ngày Feedback</th>
                                                                                </tr>
                                                                                @foreach($feedback as $no => $feed)
                                                                                <tr>
                                                                                    <td>{{$no+1}}</td>
                                                                                    <td>*******</td>
                                                                                    <td>{{$feed->content}}</td>
                                                                                    <td>{{$feed->created_at->format('d-m-Y')}}
                                                                                    </td>
                                                                                </tr>
                                                                                @endforeach
                                                                            </tbody>
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
                                <div class="tab-pane" id="list" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-header-text">Danh sách hội viên đã đăng kí</h5>
                                                </div>
                                                <div class="card-block contact-details">
                                                    <div class="data_table_main table-responsive dt-responsive">
                                                        <table id="simpletable"
                                                            class="table  table-striped table-bordered nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th>STT</th>
                                                                    <th>Tên loại gói tập</th>
                                                                    <th>Gói tập</th>
                                                                    <th>Bộ môn</th>
                                                                    <th>Tình trạng</th>
                                                                    <th>Hội viên</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
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
        <div id="styleSelector"></div>
    </div>
</div>



@endsection