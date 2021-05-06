@extends ('layout-client')
@section('content')
<main>
    <div class="page-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="cover-profile">
                    <div class="profile-bg-img">
                        <img class="profile-bg-img img-fluid" src="{{asset('assets/client/images/bannerpage.jpg')}}"
                            alt="bg-img">
                        <div class="card-block user-info">
                            <div class="col-md-12">
                                <div class="media-left">
                                    <a href="#" class="profile-image-client">
                                        <img class="user-img img-radius" src="{{asset($member->infor->avatar)}}"
                                            width="90">
                                        <span alt="user-img" style="border-radius: 50%;" width="150px" height="150px">
                                    </a>
                                </div>
                                <div class="media-body row">
                                    <div class="col-lg-12">
                                        <div class="user-title">
                                            <h2>{{$member->infor->name}}</h2>
                                            <span class="text-white"> @if($member->infor->role==1)
                                                Hội viên
                                                @elseif($member->infor->role==0)
                                                Hội viên
                                                @else
                                                Admin
                                                @endif</span>
                                            <div class="label-main">
                                                @if($member->status === 1)
                                                <label class="label label-success">Đang hoạt động</label>
                                                @elseif($member->status === 2)
                                                <label class="label label-danger">Block</label>
                                                @endif
                                            </div>
                                            <br>
                                            <div class="label-main">

                                                <label class="btn btn-success"> <a
                                                        href="{{route('client.editProfile',['id'=>$member->id])}}"
                                                        style="color:white;">Sửa Thông tin</a></button>
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
                            <a class="nav-link active" data-toggle="tab" href="#personal" role="tab">Thông tin cá
                                nhân</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#binfo" role="tab">Chỉ số cơ thể</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#contacts" role="tab">Gói tập đã đăng kí</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#baoluu" role="tab">Lịch sử bảo lưu</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#chuyennhuong" role="tab">Lịch sử chuyển
                                nhượng</a>
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
                                                    <div class="col-lg-12 col-xl-6">
                                                        <div class="table-responsive">
                                                            <table class="table m-0">
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">Họ và tên </th>
                                                                        <td>{{$member->infor->name}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Giới tính</th>
                                                                        <td>
                                                                            <div class="radio radio-inline mr-4">
                                                                                <label>
                                                                                    <input type="radio" name="gender"
                                                                                        value="1" class="mr-2"
                                                                                        {{$member->infor->gender=="1"? "checked" : "" }}><i
                                                                                        class="helper"></i>Nam
                                                                                </label>
                                                                            </div>
                                                                            <div class="radio radio-inline">
                                                                                <label>
                                                                                    <input type="radio" name="gender"
                                                                                        class="mr-2" value="2"
                                                                                        {{$member->infor->gender=="2"? "checked" : "" }}><i
                                                                                        class="helper"></i>Nữ
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Email</th>
                                                                        <td>{{$member->infor->email}} </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Số điện thoại</th>
                                                                        <td>{{$member->infor->phone}} </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Địa chỉ</th>
                                                                        <td>{{$member->infor->address}}</td>
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
                                                                        <th scope="row" class="th-w30">Ngày sinh
                                                                        </th>
                                                                        <td>{{$member->infor->birth_date->format('d-m-Y')}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row" class="th-w30">Người giới
                                                                            thiệu </th>
                                                                        <td>{{isset($member->pt->infor) ? $member->pt->infor->name : 'Mạng xã hội' }}
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
                            <div class="card-header"></div>
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
                                                                        <th scope="row" class="th-w30">Chiều cao</th>
                                                                        <td>{{$member->height}} cm</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row" class="th-w30">Cân nặng</th>
                                                                        <td>{{$member->weight}} kg</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row" class="th-w30">Tình trạng sức
                                                                            khỏe</th>
                                                                        <td>{{$member->health}}</td>
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
                                                                        <th scope="row" class="th-w30">Ngày lấy thông
                                                                            tin</th>
                                                                        <td> {{$member->updated_at->format('d-m-Y')}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        @if($member->weight != null && $member->height
                                                                        !=
                                                                        null)
                                                                        @php
                                                                        $bmi = ($member->weight) /
                                                                        (($member->height)/100
                                                                        *($member->height)/100)
                                                                        @endphp
                                                                        <th scope="row" class="th-w30">Chỉ số BMI</th>

                                                                        <td>{{number_format($bmi,2,',','')}}</td>
                                                                        @else
                                                                        <td> Chưa cập nhật chỉ số BMI </td>
                                                                        @endif
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
                    <div class="tab-pane" id="contacts" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-header-text">Danh sách gói tập đã đăng kí</h5>
                                    </div>
                                    <div class="card-block contact-details">
                                        <div class="data_table_main table-responsive dt-responsive">
                                            <table id="simpletable" class="table  table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Tên loại gói tập</th>
                                                        <th>Bộ môn</th>
                                                        <th>Huấn luyện viên</th>
                                                        <th>Thời gian</th>
                                                        <th>Tổng tiền</th>
                                                        <th>Tình trạng</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders as $no => $order)
                                                    <tr>

                                                        <td>{{$no =1}} </td>
                                                        <td>{{$order->typepackage->TypePackage_name}}</td>

                                                        <td>{{$order->typepackage->subject->subject_name}}</td>
                                                        <td>
                                                            @if(($order->pt_id) ==1 )
                                                            Gói tập không có PT
                                                            @else
                                                            <a href="{{route('member.changeStatus',['id'=>$member->id])}}"
                                                                class="label label-danger"> {{$order->pt->infor->name}}
                                                            </a>

                                                            @endif
                                                        </td>
                                                        <td> {{$order->start_date->format('d-m-Y')}} --
                                                            {{$order->finish_date->format('d-m-Y')}}</td>
                                                        <td>{{number_format($order->total_money,0,'','.')}} VNĐ </td>
                                                        <td>
                                                            @if($member->status === 1)
                                                            <a href="{{route('member.changeStatus',['id'=>$member->id])}}"
                                                                class="label label-success"
                                                                onclick="return confirm('Bạn chắc chắn muốn Block Hội Viên')">
                                                                <span class="icofont icofont-ui">Đang Hoạt
                                                                    Động</span></a>
                                                            @elseif($member->status === 2)
                                                            <a href="{{route('member.changeStatus',['id'=>$member->id])}}"
                                                                class="label label-danger"
                                                                onclick="return confirm('Bạn chắc chắn muốn Block Hội Viên')">
                                                                <span class="icofont icofont-ui">Block</span></a>
                                                            @endif
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
                    <div class="tab-pane" id="baoluu" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-header-text">Danh sách gói tập đã bảo lưu</h5>
                            </div>
                            <div class="card-block contact-details">
                                <div class="data_table_main table-responsive dt-responsive">
                                    <table id="footer-select" class="table  table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên loại gói tập</th>
                                                <th>Bộ môn</th>
                                                <th>Huấn luyện viên</th>
                                                <th>Tình trạng</th>
                                                <th> Hành động </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders1 as $no => $order1)
                                            <tr>


                                                <td>{{$no +1}} </td>
                                                <td>{{$order1->typepackage->TypePackage_name}} </td>
                                                <td>{{$order1->typepackage->subject->subject_name}} </td>
                                                <td>@if(($order1->pt_id) ==1 )
                                                    Không có huấn luyện viên
                                                    @else
                                                    {{$order1->pt->infor->name}}
                                                    @endif </td>
                                                <td> @if($order1->status==1)
                                                    <span class=" label label-success ">Còn Hạn</span>
                                                    @elseif($order1->status==2)
                                                    <span class=" label label-danger ">Hết Hạn</span>
                                                    @elseif($order1->status ==3)
                                                    <span class=" label label-warning ">Đang Bảo Lưu</span>
                                                    @elseif($order1->status ==4)
                                                    <span class=" label label-danger ">Chuyển nhượng</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <a class="dropdown-item" style="color: red"
                                                        href="{{route('client.detailReserve',['id'=>$order1->id])}}"><i
                                                            class="icofont icofont-edit"></i> Chi tiết bảo
                                                        lưu</a>

                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane " id="chuyennhuong" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-header-text">Danh sách gói tập đã chuyển nhượng</h5>
                                    </div>
                                    <div class="card-block contact-details">
                                        <div class="data_table_main table-responsive dt-responsive">
                                            <table id="" class="table  table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Tên loại gói tập</th>
                                                        <th>Bộ môn</th>
                                                        <th>Huấn luyện viên</th>
                                                        <th>Người được chuyển nhượng </th>
                                                        <th>Tình trạng</th>
                                                        <th> Hành động </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders as $item)
                                                    @if($item->status==4)
                                                    <tr>
                                                        <td> 1</td>
                                                        <td>{{$peopol->typepackage->TypePackage_name}} </td>
                                                        <td>{{$peopol->typepackage->subject->subject_name}} </td>
                                                        <td>@if(($peopol->pt_id) ==1 )
                                                            Không có huấn luyện viên
                                                            @else
                                                            {{$peopol->pt->infor->name}}
                                                            @endif </td>
                                                        <td>{{$peopol->member->infor->name}} </td>
                                                        <td> @if($peopol->status==1)
                                                            <span class=" label label-success ">Còn Hạn</span>
                                                            @elseif($peopol->status==2)
                                                            <span class=" label label-danger ">Hết Hạn</span>
                                                            @elseif($peopol->status ==3)
                                                            <span class=" label label-warning ">Đang Bảo Lưu</span>
                                                            @elseif($peopol->status ==4)
                                                            <span class=" label label-danger ">Chuyển nhượng</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a class="dropdown-item"
                                                                href="{{route('client.detailTransfer')}}"><i
                                                                    class="icofont icofont-edit"></i>Chi tiết chuyển
                                                                nhượng</a>
                                                        </td>
                                                    </tr>
                                                    @endif
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
</main>
@endsection