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
                                    <h4>Thông tin chi tiết</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                      <i class="feather icon-home"></i>
                                    </li>
                                    <li class="breadcrumb-item">Quản lý huấn luyện viên</li>
                                    <li class="breadcrumb-item">Thông tin chi tiết</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cover-profile">
                                <div class="profile-bg-img">
                                    <img class="profile-bg-img img-fluid"
                                        src="{{asset('assets/admin/images/user-profile/bg-img1.jpg')}}" alt="bg-img">
                                    <div class="card-block user-info">
                                        <div class="col-md-12">
                                            <div class="media-left">
                                                <a href="#" class="profile-image">
                                                    <img class="user-img img-radius" src="{{$pt->infor->avatar}}"
                                                        alt="user-img" style="border-radius: 50%;" width="150px"
                                                        height="150px">
                                                </a>
                                            </div>
                                            <div class="media-body row">
                                                <div class="col-lg-12">
                                                    <div class="user-title">
                                                        <h2>{{$pt->infor->name}}</h2>
                                                        <span
                                                            class="text-white">{{$pt->infor->role==2? "Huấn Luyện Viên" :""}}
                                                            bộ môn {{ $pt->subject->subject_name}}</span>
                                                        <div class="label-main">
                                                            <label
                                                                class="label label-success">{{$pt->status==1? "Đang hoạt động" :"Nghỉ làm"}}</label>
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
                                        <a class="nav-link" data-toggle="tab" href="#binfo" role="tab">Lịch làm việc</a>
                                        <div class="slide"></div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#contacts" role="tab">Hội viên đã
                                            đăng kí</a>
                                        <div class="slide"></div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#feedback" role="tab">Feedback</a>
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
                                                                            @if (\Session::has('success'))
                                                                                <div class="alert alert-success">
                                                                                    <ul>
                                                                                        <li>{!! \Session::get('success') !!}</li>
                                                                                    </ul>
                                                                                </div>
                                                                            @endif
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
                                                                                <tr>
                                                                                    <th scope="row">MÔ TẢ</th>
                                                                                    <td>{{$pt->descriptions}}</td>
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
                                                                                        VNĐ</td>
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
                                            <h5>Lịch làm việc</h5>
                                            <div class="card-header-right">
                                                <ul class="list-unstyled card-option">
                                                    <li><i class="feather icon-maximize full-card"></i></li>
                                                    <li><i class="feather icon-minus minimize-card"></i></li>
                                                    <li><i class="feather icon-trash-2 close-card"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <div class="data_table_main table-responsive dt-responsive">
                                                <table id="simpletable"
                                                    class="table  table-striped table-bordered nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>STT</th>
                                                            <th>Ca Làm</th>
                                                            <th>Thời gian bắt đầu</th>
                                                            <th>Thời gian kết thúc</th>
                                                            <th>Ngày</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($schedules as $no => $schedule)
                                                        <tr>

                                                            <td>{{$no+1}} </td>
                                                            <td>{{isset($schedule->time) ? $schedule->time->time_name : ''}}</td>
                                                            <td>{{isset($schedule->time) ? $schedule->time->time_start->format('h:i') : ''}}</td>
                                                            <td>{{isset($schedule->time) ? $schedule->time->time_finish->format('h:i') : ''}}</td>
                                                            <td>{{$schedule->date->format('d/m/Y')}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                 
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="contacts" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-header-text">Danh sách gói tập đã đăng kí</h5>
                                                </div>
                                                <div class="card-block contact-details">
                                                    <div class="data_table_main table-responsive dt-responsive">
                                                        <table id="simpletable"
                                                            class="table  table-striped table-bordered nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th>STT</th>
                                                                    <th>Tên loại gói tập</th>
                                                                 
                                                                    <th>Bộ môn</th>
                                                                    <th>Thời gian bắt đầu</th>
                                                                    <th>Thời gian kết thúc</th>
                                                                    <th>Tình trạng</th>
                                                                    <th>Hội viên đăng kí</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($orders as $no => $order)
                                                                <tr>

                                                                    <td>{{$no+1}} </td>
                                                                    <td>{{$order->typepackage->TypePackage_name}}</td>
                                                                    <td>{{$order->typepackage->subject->subject_name}}
                                                                    </td>
                                                                    <td>{{$order->start_date->format('d-m-Y')}}</td>
                                                                    <td> {{$order->finish_date->format('d-m-Y')}}</td>
                                                                    
                                                                    
                                                                    <td> @if($order->status==1)
                                                                        <span class=" label label-success ">Còn Hạn</span>
                                                                        @elseif($order->status==2) 
                                                                        <span class=" label label-danger ">Hết Hạn</span>
                                                                        @elseif($order->status ==3)
                                                                        <span class=" label label-warning ">Đang Bảo Lưu</span>
                                                                        @elseif($order->status ==4)
                                                                        <span class=" label label-danger ">Chuyển nhượng</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>{{$order->member->infor->name}}</td>

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

                                <div class="tab-pane" id="feedback" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-header-text">Danh sách feedback</h5>
                                                </div>
                                                <div class="card-block contact-details">
                                                    <div class="data_table_main table-responsive dt-responsive">
                                                        <table id="simpletable"
                                                            class="table  table-striped table-bordered nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th>STT</th>
                                                                    <th>Ngày feedback</th>
                                                                    <th>Nội dung feedback</th>
                                                                  
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                               @foreach ($feedbacks as $no => $feedback)
                                                               <tr>

                                                               <td>{{$no +1}}</td>
                                                                <td>{{$feedback->created_at->format('d-m-Y')}}</td>
                                                               <td>{{$feedback->content}}</td>

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
            </div>
        </div>
        <div id="styleSelector"></div>
    </div>
</div>
@endsection