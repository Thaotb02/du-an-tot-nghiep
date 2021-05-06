@extends('layout-admin')
@section('content')

<aside class="right-side right-padding">
    <div class="container-fluid">
        <h4 class="panel-title">
            <a href=""><i class="fa fa-fw fa-user"></i> Thêm thành viên </a>

        </h4>
        <form action="{{route('infor.addinfor')}}" id="frmProducts" name="frmProducts" class="form-horizontal"
            enctype="multipart/form-data" novalidate="" method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-modal">
                        <div class="form-group">
                            <label for="">Tên khác hàng *</label>
                            <input id="name" name="name" type="text" class="form-control">
                            @error('name')
        <small style="color: red">{{$message}}</small>
@enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Quyền *</label>
                            <select class="form-control select2" id="select_box" name="role">
                                <option>Chọn quyền</option>
                                <option value="0">Khách Hàng</option>
                                <option value="1">Huấn Luyện Viên</option>
                                <option value="2">Admin</option>
                            </select>
                        </div>
                        
                        <div class="form-group hide" id="0">
                            @error('typeMember')
        <small style="color: red">{{$message}}</small>
@enderror
                            <label class="control-label">Nguồn Maketting *</label>
                            <select class="form-control select2" name="typeMember">
                                <option>Chọn nguồn</option>
                                <option value="1">Huấn luyện viên</option>
                                <option value="2">FanPage</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Giới tính *</label>
                            <div class="radio-form">
                                <label class="container-radio">Nam
                                    <input type="radio" checked="checked" id="gender" name="gender" value="1">
                                    
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container-radio">Nữ
                                    <input type="radio" id="gender" name="gender" value="2">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Email *</label>
                            <input id="email" name="email" type="email" class="form-control">
                            @error('email')
        <small style="color: red">{{$message}}</small>
@enderror
                        </div>
                        <div class="form-group">
                            <label for="">Ngày Sinh *</label>
                            <input id="birth_date" name="birth_date" type="date" class="form-control">
                            @error('birth_date')
        <small style="color: red">{{$message}}</small>
@enderror
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ *</label>
                            <input id="address" name="address" type="text" class="form-control">
                            @error('address')
        <small style="color: red">{{$message}}</small>
@enderror
                        </div>
                        <div class="form-group">
                            <label for="">Số điện thoại *</label>
                            <input id="phone" name="phone" type="text" class="form-control">
                            @error('phone')
        <small style="color: red">{{$message}}</small>
@enderror
                        </div>
                        <div class="form-group hide" id="1">
                            <label class="control-label">Bộ Môn *</label>
                            @error('subject_id')
        <small style="color: red">{{$message}}</small>
@enderror
                    
                            <select class="form-control select2" id="select_box" name="subject_id">
                                <option>Chọn Bộ môn</option>
                                @foreach($subjects as $sub)
                                <option value="{{$sub->id}}">{{$sub->subject_name}}</option>
                                @endforeach
                            </select>

                            <label class="control-label">Lương *</label>
                            <input id="email" name="salary" type="text" class="form-control select2">
                            @error('salary')
        <small style="color: red">{{$message}}</small>
@enderror
                            <label for="">Ghi Chú</label>
                            <textarea class="form-control" id="" name="description" rows="5"></textarea>
                            @error('description')
        <small style="color: red">{{$message}}</small>
@enderror
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="upload">
                        <div class="form">
                            <input type="file" onchange="encodeImageFileAsURL(this)" id="image" name="avatar"
                                class="form-control">
                            <span>
                                <img src="{{ asset('').'upload/default-avatar.png' }}" class="img-fluid"
                                    id="img-preview" width="200px">
                                    @error('avatar')
                                    <small style="color: red">{{$message}}</small>
                            @enderror
                                <h1>Vui lòng chọn ảnh *</h1>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button id="btn-save" value="add" class="btn btn-primary mr-1 waves-effect waves-light">
                    Hoàn Thành</button>
        </form>

    </div>
    </div>
</aside>
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