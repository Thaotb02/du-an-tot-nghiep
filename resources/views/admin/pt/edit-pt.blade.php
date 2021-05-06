@extends('layout-admin')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/component.css')}}" />
<base href="{{asset('')}}">
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-4">
                            <div class="page-header-title">
                                <div class="d-inline">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                      
                                            <i class="feather icon-home"></i>
                                      
                                    </li>
                                    <li class="breadcrumb-item">
                                        Quản lý huấn luyện viên
                                    </li>
                                    <li class="breadcrumb-item">
                                        Cập nhật thông tin huấn luyện viên
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-body">
                    <div class="row justify-content-center">
                        <div class="col-sm-8">
                            <div class="card">
                                <div class="card-header">
                                    <h3 style="font-weight: 600">Cập nhật thông tin huấn luyện viên</h3>
                                </div>
                                <div class="card-block">
                                    <form id="main" method="post" action="{{route('pt.saveedit',['id'=>$pt->id])}}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>Tên huấn luyện viên <span style="color: red">*</span></label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    value="{{isset($pt->infor) ? $pt->infor->name : '' }}" />
                                                @error('name')
                                                <span class="messages" style="color:red">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Email <span style="color: red">*</span></label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    value="{{isset($pt->infor) ? $pt->infor->email : '' }}" />
                                                @error('email')
                                                <span class="messages" style="color:red">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label class="">Ngày sinh <span style="color: red">*</span></label>
                                                <input type="date" class="form-control" id="" name="birth_date"
                                                    value="{{$pt->infor->birth_date->format('Y-m-d')}}" />
                                                @error('birth_date')
                                                <span class="messages" style="color:red">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Giới tính <span style="color: red">*</span></label>
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
                                                <label>Số điện thoại <span style="color: red">*</span></label>
                                                <input type="text" class="form-control" name="phone"
                                                    value="{{isset($pt->infor) ? $pt->infor->phone : '' }}" />
                                                @error('phone')
                                                <span class="messages" style="color:red">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Địa chỉ <span style="color: red">*</span></label>
                                                <input type="text" class="form-control" name="address"
                                                    value="{{isset($pt->infor) ? $pt->infor->address : '' }}" />
                                                @error('address')
                                                <span class="messages" style="color:red">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>Bộ môn <span style="color: red">*</span></label>
                                                <select class="form-control select2" id="select_box" name="subject_id">
                                                    @foreach($subjects as $sub)
                                                    @if($sub->id == $pt->subject_id)
                                                    <option selected value="{{$pt->subject_id}}">
                                                        {{ $sub->subject_name }}</option>
                                                    @else
                                                    <option value="{{ $sub->id }}">{{ $sub->subject_name }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                                @error('subject_id')
                                                <span class="messages" style="color:red">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Mức lương <span style="color: red">*</span></label>
                                                <input type="text" class="form-control" id="" name="salary"
                                                    value="{{$pt->salary}}" />
                                                @error('salary')
                                                <span class="messages" style="color:red">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <input type="hidden"  class="form-control" id="" name="role"
                                                value="{{$pt->infor->role}}" />
                                                {{-- <div class="form-group">
                                                    <label>Chức vụ <span style="color: red">*</span></label>
                                                    <select class="form-control select2" name="role"
                                                        id="inlineFormCustomSelectPref">
                                                        <option {{$pt->infor->role === 2 ? 'selected' : ''}} value="2">
                                                            Huấn luyện viên</option>
                                                    </select>
                                                </div> --}}
                                                <div class="form-group">
                                                    <label>Ghi chú</label>
                                                    <textarea name="descriptions" cols="2" rows="17"
                                                        class="form-control"> {{$pt->descriptions}}</textarea>
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
                                                                class="img-fluid" id="img-preview" width="">
                                                            <h1>Vui lòng chọn ảnh *</h1>
                                                        </span>
                                                    </div>
                                                </div>
                                                @error('avatar')
                                                <small style="color: red">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row d-flex justify-content-center">
                                            <button id="btn-save" value="add"
                                                class="btn btn-primary mr-1 waves-effect waves-light">
                                                Cập nhật</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    </script>