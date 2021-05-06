@extends('layout-admin')
@section('content')
<div class="pcoded-content">
   <div class="pcoded-inner-content">
      <div class="main-body">
         <div class="page-wrapper">
            <div class="page-header">
               <div class="row align-items-end">
                  <div class="col-lg-8">
                     <div class="page-header-title">
                        <div class="d-inline">
                           <h4>Thông tin cá nhân</h4>
                           
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">
                           <li class="breadcrumb-item">
                              <a href="index.html"> <i class="feather icon-home"></i> </a>
                           </li>
                           <li class="breadcrumb-item"><a href="#!">Cài đặt tài khoản</a></li>
                           <li class="breadcrumb-item"><a href="#!">Thông tin cá nhân</a></li>
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
                                    <img class="user-img img-radius" src="{{Auth::user()->avatar}}" style="border-radius: 50%;" width="150px" height="150px" alt="user-img">
                                    </a>
                                 </div>
                                 <div class="media-body row">
                                    <div class="col-lg-12">
                                       <div class="user-title">
                                       <h2>{{$member->infor->name}}</h2>
                                          <span class="text-white">{{$member->infor->role==3? "Admin" :""}}</span> 
                                          <div class="label-main">
                                          <label class="label label-success">Đang hoạt động</label>
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
                              <a class="nav-link active" data-toggle="tab" href="#personal" role="tab">Thông tin cá nhân</a>
                              <div class="slide"></div>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#binfo" role="tab">Chỉ số cơ thể</a>
                              <div class="slide"></div>
                           </li>
                          
                           <li class="nav-item">
                              <a class="nav-link" href="{{route('member.edit',['id'=>$member->id])}}">Thay đổi thông tin</a>
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
                                                               <td>{{$member->infor->name}}</td>
                                                            </tr>
                                                            <tr>
                                                               <th scope="row">Giới tính</th>
                                                               <td>{{$member->infor->gender==1? "Nam" :"Nữ"}}</td>
                                                            </tr>
                                                            <tr>
                                                               <th scope="row">Birth Date</th>
                                                               <td>{{$member->infor->birth_date}}</td>
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
                                                               <th scope="row">Chiều cao</th>
                                                               <td>{{$member->height}}</td>
                                                            </tr>
                                                            <tr>
                                                               <th scope="row">Cân nặng</th>
                                                               <td>{{$member->weight}}</td>
                                                            </tr>
                                                            <tr>
                                                               <th scope="row">Tình trạng sức khỏe</th>
                                                               <td>{{$member->health}}</td>
                                                            </tr>
                                                            <tr>
                                                               @php 
                                                               $bmi = ($member->weight) / (($member->height)/100 *($member->height)/100) 
                                                               @endphp
                                                               <th scope="row">Chỉ số BMI</th>
                                                               
                                                               <td>{{number_format($bmi,2,',','')}}</td>
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
                                                               <td> {{$member->updated_at->format(' d-m-Y')}}</td>
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