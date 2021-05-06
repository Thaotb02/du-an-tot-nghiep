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
                              <a href="index.html"> <i class="feather icon-home"></i> </a>
                           </li>
                           <li class="breadcrumb-item">Quản lý hội viên
                           </li>
                           <li class="breadcrumb-item">Thông tin chi tiết
                           </li>
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
                           <img class="profile-bg-img img-fluid" src="{{asset('assets/admin/images/user-profile/bg-img1.jpg')}}" alt="bg-img">
                           <div class="card-block user-info">
                              <div class="col-md-12">
                                 <div class="media-left">
                                    <a href="#" class="profile-image">
                                       @if($member->infor->avatar == '')
                                               
                                             <img class="user-img img-radius" src="{{asset('assets/admin/images/auth/icon-user-default.png')}}" alt="user-img" style="border-radius: 50%;" width="150px" height="150px">
                                                @else 
                                                <img class="user-img img-radius" src="{{$member->infor->avatar}}" alt="user-img" style="border-radius: 50%;" width="150px" height="150px">
                                                
                                                @endif
                                   
                                    </a>
                                 </div>
                                 <div class="media-body row">
                                    <div class="col-lg-12">
                                       <div class="user-title">
                                          <h2>{{$member->infor->name}}</h2>
                                          <span class="text-white">   @if($member->infor->role==1)
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
                     <div class="tab-header card" >
                        <ul class="nav nav-tabs md-tabs tab-timeline"  role="tablist" id="mytab">
                           <li class="nav-item">
                              <a class="nav-link active"  data-toggle="tab" href="#personal" role="tab">Thông tin cá nhân</a>
                              <div class="slide"></div>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link"  data-toggle="tab" href="#binfo" role="tab">Chỉ số cơ thể</a>
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
                              <a class="nav-link" data-toggle="tab" href="#chuyennhuong" role="tab">Lịch sử chuyển nhượng</a>
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
                                                               <th scope="row">Tên</th>
                                                               <td>{{$member->infor->name}}</td>
                                                            </tr>
                                                            <tr>
                                                               <th scope="row">Giới tính</th>
                                                               <td>{{$member->infor->gender==1? "Nam" :"Nữ"}}</td>
                                                            </tr>
                                                            <tr>
                                                               <th scope="row">Ngày sinh</th>
                                                               <td>{{$member->infor->birth_date->format('d-m-Y')}}</td>
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
                                                               <th scope="row">Email</th>
                                                               <td><a href="#!"><span class="__cf_email__" data-cfemail="cd89a8a0a28da8b5aca0bda1a8e3aea2a0">[{{$member->infor->email}}]</span></a></td>
                                                            </tr>
                                                            <tr>
                                                               <th scope="row">Số điện thoại</th>
                                                               <td>{{$member->infor->phone}}</td>
                                                            </tr>
                                                            <tr>
                                                               <th scope="row">Nguồn</th>
                                                               <td>{{isset($member->pt->infor) ? $member->pt->infor->name : 'Mạng xã hội' }}</td>
                                                            </tr>
                                                            <tr>
                                                               <th scope="row">Ngày tạo tài khoản</th>
                                                               <td>{{$member->created_at->format('d-m-Y')}}</td>
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
                                                               <th scope="row">Chiều cao</th>
                                                               <td>{{$member->height}} cm</td>
                                                            </tr>
                                                            <tr>
                                                               <th scope="row">Cân nặng</th>
                                                               <td>{{$member->weight}} kg</td>
                                                            </tr>
                                                            <tr>
                                                               <th scope="row">Tình trạng sức khỏe</th>
                                                               <td>{{$member->health}}</td>
                                                            </tr>
                                                            <tr>
                                                               @if($member->weight != null && $member->height != null)
                                                               @php 
                                                               $bmi = ($member->weight) / (($member->height)/100 *($member->height)/100) 
                                                               @endphp
                                                               <th scope="row">Chỉ số BMI</th>
                                                               <td>{{number_format($bmi,2,',','')}}</td>
                                                               @else
                                                               <td> Chưa cập nhật chỉ số BMI </td>
                                                               @endif
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
                                                               <th scope="row">Ngày lấy thông tin</th>
                                                               <td> {{$member->updated_at->format('d-m-Y')}}</td>
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
                                          <table id="footer-select" class="table  table-striped table-bordered nowrap">
                                             <thead>
                                                <tr>
                                                   <th>STT</th>
                                                   <th>Tên loại gói tập</th>
                                                   <th>Bộ môn</th>
                                                   <th>Thời gian</th>
                                                   <th>Huấn luyện viên</th>
                                                   <th>Tổng tiền</th>
                                                   <th>Tình trạng</th>
                                                   <th> Hành động </th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                @foreach ($orderr as $no => $order)
                                                <tr>
                                                   <td>{{$no+1}} </td>
                                                   <td>{{$order->typepackage->TypePackage_name}}</td>
                                                   <td>{{$order->typepackage->subject->subject_name}}</td>
                                                   <td>{{$order->start_date->format('d-m-Y')}} -- {{$order->finish_date->format('d-m-Y')}} </td>
                                                  <td>
                                                      @if(($order->pt_id) ==1 )
                                                      Không có huấn luyện viên
                                                      @else 
                                                      {{$order->pt->infor->name}}
                                                      @endif
                                                   </td>
                                                   <td>   {{number_format($order->total_money,0,'','.')}} VNĐ</td>
                                                   <td> 
                                                      @if($order->status==1)
                                                      <span class=" label label-success ">Còn Hạn</span>
                                                      @elseif($order->status==2) 
                                                      <span class=" label label-danger ">Hết Hạn</span>
                                                      @elseif($order->status ==3)
                                                      <span class=" label label-warning ">Đang Bảo Lưu</span>
                                                      @elseif($order->status ==4)
                                                      <span class=" label label-danger ">Chuyển nhượng</span>
                                                      @endif
                                                   <td>
                                                  
                                                      @if ($order->pt_id == 1)
                                                      Không
                                                      @else
                                                      <a href="{{route('member.changept',['id'=> $order->id])}}" onclick="return confirm('Bạn có muốn đổi HLV không')" class="btn btn-primary block m-b" id="update"
                                                         style="float: left; ">Đổi HLV
                                                      </a>
                                                      @endif
                                                  
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
                                                   <th>Thời gian </th>
                                                   <th>Huấn luyện viên</th>
                                                   <th>Tổng tiền</th>
                                                   <th>Tình trạng</th>
                                                   <th> Hành động </th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                @foreach ($orders1  as $no => $order1)
                                               <tr> 
                                                 
                                                 
                                                   <td>{{$no +1}} </td>
                                                   <td>{{$order1->typepackage->TypePackage_name}} </td>
                                                   <td>{{$order1->typepackage->subject->subject_name}} </td>
                                                   <td>{{$order1->start_date->format('d-m-Y')}} -- {{$order1->finish_date->format('d-m-Y')}}</td>
                                                   <td>@if(($order1->pt_id) ==1 )
                                                      Không có huấn luyện viên
                                                      @else 
                                                      {{$order1->pt->infor->name}}
                                                      @endif </td>
                                                      <td>{{number_format($order1->total_money,0,'','.')}} VNĐ</td>
                                                   <td> @if($order1->status==1)
                                                      <span class=" label label-success ">Còn Hạn</span>
                                                      @elseif($order1->status==2) 
                                                      <span class=" label label-danger ">Hết Hạn</span>
                                                      @elseif($order1->status ==3)
                                                      <span class=" label label-warning ">Đang Bảo Lưu</span>
                                                      @elseif($order1->status ==4)
                                                      <span class=" label label-danger ">Chuyển nhượng</span>
                                                      @endif</td>
                                                
                                                   <td class="dropdown" >  
                                                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                          <i class="feather icon-settings"></i>
                                                      </button>
                                                      <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                          <a class="dropdown-item"  href="{{route('order.detailMemberReserve',['id'=>$order1->id])}}"><i class="icofont icofont-edit"></i> chi tiết bảo lưu</a>
                                                       </div>
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
                                                   <th>Thời gian</th>
                                                   <th>Huấn luyện viên</th>
                                                   <th>Người được chuyển nhượng </th>
                                                   <th>Tổng tiền</th>
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
                                                          <td>{{$peopol->start_date->format('d-m-Y')}} -- {{$peopol->finish_date->format('d-m-Y')}}</td>
                                                          <td>@if(($peopol->pt_id) ==1 )
                                                             Không có huấn luyện viên
                                                             @else 
                                                             {{$peopol->pt->infor->name}}
                                                             @endif </td>
                                                             <td>{{$peopol->member->infor->name}} </td>
                                                             <td>{{number_format($peopol->total_money,0,'','.')}} VNĐ</td>
                                                          <td> @if($peopol->status==1)
                                                             <span class=" label label-success ">Còn Hạn</span>
                                                             @elseif($peopol->status==2) 
                                                             <span class=" label label-danger ">Hết Hạn</span>
                                                             @elseif($peopol->status ==3)
                                                             <span class=" label label-warning ">Đang Bảo Lưu</span>
                                                             @elseif($peopol->status ==4)
                                                             <span class=" label label-danger ">Chuyển nhượng</span>
                                                             @endif</td>
                                                       
                                                          <td class="dropdown" >  
                                                             <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                 <i class="feather icon-settings"></i>
                                                             </button>
                                                             <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item"  href="{{route('order.profileMemberPass',['id'=> $peopol->id])}}"><i class="icofont icofont-edit"></i>Chi tiết chuyển nhượng</a>
                                                              </div>
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
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection