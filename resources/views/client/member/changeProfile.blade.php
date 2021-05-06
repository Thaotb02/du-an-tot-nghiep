@extends ('layout-client')
@section('content')
<main>
    <base href="{{asset('')}}">
    <div class="main-wrapper" style="padding-top: 69.8px;">
        <a href="#">
            <div class="main-breadcrumb" style="opacity: 1;">
                <div class="breadcrumb-bg" data-desktop-src="background-image: url('');">
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
                                                    action="{{route('client.updateProfile',['id'=>$member->id])}}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <div class="col-sm-6">
                                                            <label>Tên hội viên</label>
                                                            <input type="text" class="form-control" name="name"
                                                                id="name"
                                                                value="{{isset($member->infor) ? $member->infor->name : '' }}"
                                                                placeholder="Hãy nhập tên của bạn" />
                                                            @error('name')
                                                            <span class="messages" style="color:red">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label>Email</label>
                                                            <input type="email" class="form-control" id="email"
                                                                name="email"
                                                                value="{{isset($member->infor) ? $member->infor->email : '' }}"
                                                                placeholder="thêm email" />
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
                                                                value="{{$member->infor->birth_date->format('Y-m-d')}}"
                                                                placeholder="ngày sinh" />
                                                            @error('birth_date')
                                                            <span class="messages" style="color:red">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label>Giới tính</label>
                                                            <div class="form-radio d-flex">
                                                                <div class="radio radio-inline mr-5">
                                                                    <label>
                                                                        <input type="radio" name="gender" value="1"
                                                                            {{$member->infor->gender=="1"? "checked" : "" }}><i
                                                                            class="helper"></i>Nam
                                                                    </label>
                                                                </div>
                                                                <div class="radio radio-inline">
                                                                    <label>
                                                                        <input type="radio" name="gender" value="2"
                                                                            {{$member->infor->gender=="2"? "checked" : "" }}><i
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
                                                                value="{{isset($member->infor) ? $member->infor->phone : '' }}"
                                                                laceholder="Thêm số điên thoại" />
                                                            @error('phone')
                                                            <span class="messages" style="color:red">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label>Địa chỉ</label>
                                                            <input type="text" class="form-control" name="address"
                                                                value="{{isset($member->infor) ? $member->infor->address : '' }}"
                                                                placeholder="Thêm địa chỉ" />
                                                            @error('address')
                                                            <span class="messages" style="color:red">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-6">
                                                            <label>Cân nặng</label>
                                                            <input type="text" class="form-control" id="" name="weight"
                                                                value="{{$member->weight}}"
                                                                placeholder="Thêm cân nặng" />
                                                            @error('weight')
                                                            <span class="messages" style="color:red">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label>Chiều cao</label>
                                                            <input type="text" class="form-control" id="" name="height"
                                                                placeholder="Thêm chiều cao "
                                                                value="{{$member->height}}" />
                                                            @error('height')
                                                            <span class="messages" style="color:red">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Bệnh lý</label>
                                                                <textarea name="health" cols="2" rows="3"
                                                                    class="form-control">{{$member->health}}</textarea>
                                                                @error('health')
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
                                                                        <img src="{{isset($member->infor) ? $member->infor->avatar : '' }}"
                                                                            class="img-fluid" id="img-preview"
                                                                            width="100%">
                                                                        <h1>Vui lòng chọn ảnh *</h1>
                                                                    </span>
                                                                </div>
                                                                @error('avatar')
                                                                <small style="color: red">{{$message}}</small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row d-flex justify-content-center">
                                                        <button class="btn btn-primary ">
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