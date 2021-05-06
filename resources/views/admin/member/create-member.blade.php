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
               <div class="col-lg-8">
                  <div class="page-header-title">
                     <div class="d-inline">
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="page-header-breadcrumb">
                     <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                           <i class="feather icon-home"></i>
                        </li>
                        <li class="breadcrumb-item">
                          Quản lý hội viên
                        </li>
                        <li class="breadcrumb-item">
                           Thêm mới hội viên
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
                        <h3 style="font-weight: 600">Thêm mới hội viên</h3>
                     </div>
                     <div class="card-block">
                        <form id="main" method="post"action="{{route('member.saveadd')}}" enctype="multipart/form-data">
                           @csrf
                           <div class="form-group row">
                              <div class="col-sm-6">
                                 <label >Tên hội viên <span style="color: red">*</span></label>
                                 <input type="text" class="form-control"name="name"id="name"value="{{old('name')}}"/>
                                 @error('name')
                                 <span class="messages" style="color:red">{{$message}}</span>
                                 @enderror
                              </div>
                              <div class="col-sm-6">
                                 <label >Email <span style="color: red">*</span></label>
                                 <input type="email"class="form-control"id="email"name="email"value="{{old('email')}}"/>
                                 @error('email')
                                 <span class="messages" style="color:red">{{$message}}</span>
                                 @enderror
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-sm-6">
                                 <label class="">Ngày sinh <span style="color: red">*</span></label>
                                 <input type="date"class="form-control"id=""name="birth_date"value="{{old('birth_date')}}"/>
                                 @error('birth_date')
                                 <span class="messages" style="color:red">{{$message}}</span>
                                 @enderror
                              </div>
                              <div class="col-sm-6">
                                 <label>Giới tính <span style="color: red">*</span></label>
                                 <div class="form-radio">
                                    <div class="radio radio-inline">
                                       <label>
                                       <input type="radio" name="gender" value="1"><i class="helper"></i>Nam
                                       </label>
                                    </div>
                                    <div class="radio radio-inline">
                                       <label>
                                       <input type="radio" name="gender" value="2"><i class="helper"></i>Nữ
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
                                 <label >Số điện thoại <span style="color: red">*</span></label>
                                 <input type="text"class="form-control" name="phone" value="{{old('phone')}}" />
                                 @error('phone')
                                 <span class="messages" style="color:red">{{$message}}</span>
                                 @enderror
                              </div>
                              <div class="col-sm-6">
                                 <label >Địa chỉ <span style="color: red">*</span></label>
                                 <input type="text" class="form-control" name="address" value="{{old('address')}}"/>
                                 @error('address')
                                 <span class="messages" style="color:red">{{$message}}</span>
                                 @enderror
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-sm-6">
                                 <label >Cân nặng</label>
                                 <input type="text" class="form-control"id=""name="weight"value="{{old('weight')}}"/>
                                 @error('weight')
                                 <span class="messages" style="color:red">{{$message}}</span>
                                 @enderror
                              </div>
                              <div class="col-sm-6">
                                 <label >Chiều cao</label>
                                 <input type="text"class="form-control"id="" name="height" value="{{old('height')}}"/>
                                 @error('height')
                                 <span class="messages" style="color:red">{{$message}}</span>
                                 @enderror
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <label >Bệnh lý</label>
                                    <textarea name="health" cols="2" rows="3" class="form-control">{{old('health')}}</textarea>
                                    @error('health')
                                    <span class="messages" style="color:red">{{$message}}</span>
                                    @enderror
                                 </div>
                                 <div class="form-group">
                                    <label>Chức vụ <span style="color: red">*</span></label>
                                    <select class="form-control select2" id="" name="role">
                                       <option value="1">Hội viên</option>
                                       <option value="3">Admin</option>
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label>Nguồn <span style="color: red">*</span></label>
                                    <select class="form-control select2" id="select_box" name="source">
                                       <option value="1">Mạng xã hội</option>
                                       <option value="2">Huấn Luyện Viên</option>
                                    </select>
                                 </div>
                                 <div class="form-group hide" id="2">
                                    <label>Huấn luyện viên</label>
                                    <select class="form-control select2" id="select_box" name="pt_id">
                                       @foreach($pts as $pt)
                                       <option value="{{$pt->id}}">{{$pt->infor->name}}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="upload">
                                    <div class="form">
                                       <input type="file" onchange="encodeImageFileAsURL(this)" id="image" name="avatar"
                                          class="form-control">
                                       <span>
                                          <img src="{{ asset('').'upload/default-avatar.png' }}" class="img-fluid"
                                             id="img-preview" width="100%">
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
                              <button id="btn-save" value="add" class="btn btn-primary mr-1 waves-effect waves-light">
                              Hoàn Thành</button>
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