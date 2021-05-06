@extends('layout-admin')
@section('content')

<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    @if (\Session::has('success'))
                    <div class="alert background-success">
                       <ul>
                          <li>{!! \Session::get('success') !!}</li>
                       </ul>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                          
                            <div class="card bg-c-yellow update-card">
                                <div class="card-block">
  
                                    <div class="row align-items-end">
                                        <div class="col-8">
                                            <h2 class="text-white">{{$allmember ?? '' }} </h2>
                                            <h6 class="text-white m-b-0">Số Lượng Hội Viên</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <canvas id="update-chart-1" height="50"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <p class="text-white m-b-0"> update
                                        @foreach($member_create_at as $item)
                                        <i class="feather icon-clock text-white f-14 m-r-10"></i>
                                        {{$item->created_at->format('d-m-Y H:i:s')}}
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-c-green update-card">
                                <div class="card-block">
                                    <div class="row align-items-end">
                                        <div class="col-8">
                                            <h2 class="text-white">{{$allpt}} </h2>
                                            <h6 class="text-white m-b-0">Số Lượng Huấn Luyện Viên</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <canvas id="update-chart-2" height="50"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <p class="text-white m-b-0"> update
                                        @foreach($pt_create_at as $item)
                                        <i class="feather icon-clock text-white f-14 m-r-10"></i>
                                        {{$item->created_at->format('d-m-Y H:i:s')}}
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-c-pink update-card">
                                <div class="card-block">
                                    <div class="row align-items-end">
                                        <div class="col-8">
                                            @foreach($allmoney as $item)
                                            @php
                                            $total +=$item->total_money
                                            @endphp
                                            @endforeach
                                            <h2 class="text-white" style="font-size:19px">{{number_format($total,0,'','.')}} VNĐ</h2>

                                            <h6 class="text-white m-b-0">
                                                Tổng Tiền Thu
                                            </h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <canvas id="update-chart-3" height="50"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <p class="text-white m-b-0"> update
                                        @foreach($total_create_at as $item)
                                        <i class="feather icon-clock text-white f-14 m-r-10"></i>
                                        {{$item->created_at->format('d-m-Y H:i:s')}}
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-c-lite-green update-card">
                                <div class="card-block">
                                    <div class="row align-items-end">
                                        <div class="col-8">
                                            <h4 class="text-white">{{$allfeedback}}</h4>
                                            <h6 class="text-white m-b-0">Số Lượng Liên hệ</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <canvas id="update-chart-4" height="50"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <p class="text-white m-b-0"> update
                                        @foreach($feedback_create_at as $item)
                                        <i class="feather icon-clock text-white f-14 m-r-10"></i>
                                        {{$item->created_at->format('d-m-Y H:i:s')}}
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </div>

                       
                        <div class="col-xl-6 col-md-12 mt-4">
                            <h3 style="font-weight: 600">Hội viên mới đăng kí gói tập</h3>
                            <div class="box-model">
                               
                                <div class="newstick">
                                    <div class="recent">
                                        @foreach($members as $item)
                                        <div class="row flex-column ">
                                            <div class="d-flex align-items-center">
                                                @if($item->member->infor->avatar == null)
                                                <img src=" {{asset('assets/admin/images/auth/icon-user-default.png')}}"
                                                    class="recent-user-img" alt="image not found">
                                                
                                                @else 
                                                <img src=" {{isset($item->member->infor->avatar) ? $item->member->infor->avatar : ''  }}"
                                                    class="recent-user-img" alt="image not found">
                                                @endif
                                                <h5>
                                                    <a href="admin_userprofile.html"
                                                        class="text-primary">{{isset($item->member->infor) ? $item->member->infor->name : ''  }}
                                                    </a>
                                                </h5>
                                            </div>
                                            {{-- <small class="bind-package d-flex justify-content-between"><span
                                                    class="pull-right">
                                                    {{$item->created_at->format('d-m-Y')}}</span></small> --}}
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-12  mt-4 ">
                            <h3 style="font-weight: 600">Hội viên mới tham gia</h3>
                            <div class="box-model">
                              
                                <div class="newstick">
                                    <div class="recent">
                                        @foreach($membernew as $item)
                                        <div class="row flex-column ">
                                            <div class="d-flex align-items-center">
                                                @if($item->infor->avatar == '')
                                                <img src=" {{asset('assets/admin/images/auth/icon-user-default.png')}}"
                                                    class="recent-user-img" alt="image not found">
                                                
                                                @else 
                                                <img src=" {{isset($item->infor->avatar) ? $item->infor->avatar : ''  }}"
                                                    class="recent-user-img" alt="image not found">
                                                @endif
                                                <h5>
                                                    <a href="admin_userprofile.html"
                                                        class="text-primary">{{isset($item->infor) ? $item->infor->name : ''  }}
                                                    </a>
                                                </h5>
                                            </div>

                                            <small
                                                class="bind-package d-flex justify-content-between">{{isset($item->infor) ? $item->infor->email : ''  }}<span
                                                    class="pull-right">
                                                    {{$item->created_at->format('d-m-Y')}}</span></small>
                                        </div>
                                        @endforeach

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
</div>
@endsection