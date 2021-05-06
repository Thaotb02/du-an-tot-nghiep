@extends('layout-client')
<style>
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #e0dada;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
</style>
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
                                        src="{{asset('assets/admin/images/user-profile/bg-img1.jpg')}}" alt="bg-img">
                                    <div class="card-block user-info">
                                        <div class="col-md-12">
                                            <div class="media-left">
                                                <a href="" class="profile-image">
                                                    <img class="user-img img-radius" src="{{$pt->infor->avatar}}" alt="user-img"
                                                        style="border-radius: 50%;" width="150px" height="150px">
                                                </a>
                                            </div>
                                            <div class="media-body row">
                                                <div class="col-lg-12">
                                                    <div class="user-title">
                                                        <h2>{{$pt->infor->name}}</h2>
                                                        <span class="text-white">Huấn Luyện Viên
                                                            bộ môn {{ $pt->subject->subject_name}}
                                                        </span>
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
                    <div class="container emp-profile">
                <div class="row">
                    <div class="col-md-4">
                    <div class="profile-img">
                            <img src="{{$member->infor->avatar}}" alt=""/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Họ và Tên</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$member->infor->name}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$member->infor->email}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Số điện thoại</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$member->infor->phone}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Ngày sinh</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$member->infor->birth_date->format('d/m/Y')}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Giới tính</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$member->infor->gender == 1 ? 'Nam' : Nữ }}</p>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>     
               </div>
               <a href="{{route('client.pt-profile')}}" class="btn btn-secondary">Thoát</a>
            </div>
             </div>   
        </div>
    </div>
</div>
@endsection
