@extends ('layout-client')
@section('content')
<main>
    <base href="{{asset('')}}">
    <div class="main-wrapper" style="padding-top: 69.8px;">
        <a href="#">
            <div class="main-breadcrumb" style="opacity: 1;">
                <div class="breadcrumb-bg" data-desktop-src="background-image: url('');">
                    <div class="col-lg-12">
                        <div class="cover-profile">
                            <div class="profile-bg-img">
                                <div class="card-block user-info">
                                    <div class="col-md-12">
                                        <div class="media-left">
                                            <a href="" class="profile-image">
                                                <img class="user-img img-radius" src="{{$pt->infor->avatar}}"
                                                    alt="user-img" style="border-radius: 50%;" width="150px"
                                                    height="150px">
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
            </div>
        </a>
        <section class="section section-pricing-detail profile-client">
            <div class="container">
                <div class="row m-pricing-detail">
                    <div class="col-lg-12 content-text m-b-md-3">
                        <span class="detail-personal-js">
                            <ul class="tag-inline tag-col-3 nav nav-tabs m-b-24px m-t-md-3 d-block">
                                <li class="nav-item d-inline-block">
                                    <a data-short-title="Classic" data-package-list="1" class="nav-link active"
                                        data-toggle="tab" href="#package-personal-list-1">Sửa Thông tin cá nhân</a>
                                </li>
                            </ul>
                            <div class="tab-content pl-3 mt-4">
                                <div class="tab-pane fade show active" id="package-personal-list-1">
                                    <div class="container rounded bg-white mt-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form id="main" method="post"
                                                    action="{{route('client.update-pt-profile',['id'=>$pt->id])}}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <div class="col-sm-6">
                                                            <label>Tên huấn luyện viên</label>
                                                            <input type="text" class="form-control" name="name"
                                                                id="name"
                                                                value="{{isset($pt->infor) ? $pt->infor->name : '' }}" />
                                                            @error('name')
                                                            <span class="messages" style="color:red">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label>Email</label>
                                                            <input type="email" class="form-control" id="email"
                                                                name="email"
                                                                value="{{isset($pt->infor) ? $pt->infor->email : '' }}" />
                                                            @error('email')
                                                            <span class="messages" style="color:red">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-6">
                                                            <label class="">Ngày sinh</label>
                                                            <input type="date" class="form-control" id=""
                                                                name="birth_date"
                                                                value="{{$pt->infor->birth_date->format('Y-m-d')}}" />
                                                            @error('birth_date')
                                                            <span class="messages" style="color:red">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label>Giới tính</label>
                                                            <div class="form-radio">
                                                                <div class="radio radio-inline">
                                                                    <label>
                                                                        <input type="radio" name="gender" value="1"
                                                                            {{$pt->infor->gender=="1"? "checked" : "" }}><i
                                                                            class="helper"></i>Nam
                                                                    </label>
                                                                </div>
                                                                <div class="radio radio-inline">
                                                                    <label>
                                                                        <input type="radio" name="gender" value="2"
                                                                            {{$pt->infor->gender=="2"? "checked" : "" }}><i
                                                                            class="helper"></i>Nữ
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            @error('gender')
                                                            <span class="messages" style="color:red">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-6">
                                                            <label>Số điện thoại</label>
                                                            <input type="text" class="form-control" name="phone"
                                                                value="{{isset($pt->infor) ? $pt->infor->phone : '' }}" />
                                                            @error('phone')
                                                            <span class="messages" style="color:red">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label>Địa chỉ</label>
                                                            <input type="text" class="form-control" name="address"
                                                                value="{{isset($pt->infor) ? $pt->infor->address : '' }}" />
                                                            @error('address')
                                                            <span class="messages" style="color:red">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-6">

                                                            <div class="form-group">
                                                                <label>Ghi chú</label>
                                                                <textarea name="descriptions" cols="2" rows="13"
                                                                    class="form-control">{{$pt->descriptions}}</textarea>
                                                                @error('descriptions')
                                                                <span class="messages"
                                                                    style="color:red">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="upload">
                                                                <div class="form">
                                                                    <input type="file"
                                                                        onchange="encodeImageFileAsURL(this)" id="image"
                                                                        name="avatar" class="form-control">
                                                                    <span>
                                                                        <img src="{{isset($pt->infor) ? $pt->infor->avatar : '' }}"
                                                                            class="img-fluid" id="img-preview"
                                                                            width="200px">
                                                                        <h1>Vui lòng chọn ảnh *</h1>
                                                                    </span>
                                                                </div>

                                                            </div>
                                                            @error('avatar')
                                                            <small style="color: red">{{$message}}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="role" value="{{$pt->infor->role}}">
                                                    <input type="hidden" name="salary" value="{{$pt->salary}}">
                                                    <input type="hidden" name="subject_id" value="{{$pt->subject_id}}">
                                                    <div class="form-group row d-flex justify-content-center">
                                                        <button id="btn-save" value="add"
                                                            class="btn btn-primary mr-1 waves-effect waves-light">
                                                            Hoàn Thành</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
@endsection
<script>
function encodeImageFileAsURL(element) {
    var file = element.files[0];
    if (file === undefined) {
        $("#img-preview").attr("src", "{{ asset('').'upload/default-avata.png' }}");
        return false;
    }
    var reader = new FileReader();
    reader.onloadend = function() {
        $("#img-preview").attr("src", reader.result);
    }
    reader.readAsDataURL(file);
}
</script>

<!-- @extends('layout-client')
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
                    <div class="card-block">
                                    <form id="main" method="post" action="{{route('client.update-pt-profile',['id'=>$pt->id])}}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>Tên huấn luyện viên</label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    value="{{isset($pt->infor) ? $pt->infor->name : '' }}" />
                                                @error('name')
                                                <span class="messages" style="color:red">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    value="{{isset($pt->infor) ? $pt->infor->email : '' }}" />
                                                @error('email')
                                                <span class="messages" style="color:red">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label class="">Ngày sinh</label>
                                                <input type="date" class="form-control" id="" name="birth_date"
                                                    value="{{$pt->infor->birth_date->format('Y-m-d')}}" />
                                                @error('birth_date')
                                                <span class="messages" style="color:red">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Giới tính</label>
                                                <div class="form-radio">
                                                    <div class="radio radio-inline">
                                                        <label>
                                                            <input type="radio" name="gender" value="1"
                                                            {{$pt->infor->gender=="1"? "checked" : "" }} ><i
                                                                class="helper"></i>Nam
                                                        </label>
                                                    </div>
                                                    <div class="radio radio-inline">
                                                        <label>
                                                            <input type="radio" name="gender" value="2"
                                                            {{$pt->infor->gender=="2"? "checked" : "" }} ><i
                                                                class="helper"></i>Nữ
                                                        </label>
                                                    </div>
                                                </div>
                                                @error('gender')
                                                <span class="messages" style="color:red">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>Số điện thoại</label>
                                                <input type="text" class="form-control" name="phone"
                                                 value="{{isset($pt->infor) ? $pt->infor->phone : '' }}" />
                                                @error('phone')
                                                <span class="messages" style="color:red">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Địa chỉ</label>
                                                <input type="text" class="form-control" name="address"
                                                    value="{{isset($pt->infor) ? $pt->infor->address : '' }}" />
                                                @error('address')
                                                <span class="messages" style="color:red">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">

                                                <div class="form-group">
                                                    <label>Ghi chú</label>
                                                    <textarea name="descriptions" cols="2" rows="13"
                                                        class="form-control">{{$pt->descriptions}}</textarea>
                                                    @error('descriptions')
                                                    <span class="messages" style="color:red">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="upload">
                                                    <div class="form">
                                                        <input type="file" onchange="encodeImageFileAsURL(this)"
                                                            id="image" name="avatar" class="form-control">
                                                        <span>
                                                            <img src="{{isset($pt->infor) ? $pt->infor->avatar : '' }}"
                                                                class="img-fluid" id="img-preview" width="200px">
                                                            <h1>Vui lòng chọn ảnh *</h1>
                                                        </span>
                                                    </div>

                                                </div>
                                                @error('avatar')
                                                <small style="color: red">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <input type="hidden" name="role" value="{{$pt->infor->role}}">
                                        <input type="hidden" name="salary"  value="{{$pt->salary}}">
                                        <input type="hidden" name="subject_id" value="{{$pt->subject_id}}">
                                        <div class="form-group row d-flex justify-content-center">
                                            <button id="btn-save" value="add"
                                                class="btn btn-primary mr-1 waves-effect waves-light">
                                                Hoàn Thành</button>
                                        </div>
                                    </form>
                                </div>
                </div>
            </div>
        </div>
        <div id="styleSelector"></div>
    </div>
</div>
@endsection
<script>
    function encodeImageFileAsURL(element) {
        var file = element.files[0];
        if (file === undefined) {
            $("#img-preview").attr("src", "{{ asset('').'upload/default-avata.png' }}");
            return false;
        }
        var reader = new FileReader();
        reader.onloadend = function() {
            $("#img-preview").attr("src", reader.result);
        }
        reader.readAsDataURL(file);
    }
    </script> -->