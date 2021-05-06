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
                          Quản lý bộ môn
                        </li>
                        <li class="breadcrumb-item">
                           Cập nhật bộ môn
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
                        <h3 style="font-weight: 600">Cập nhật bộ môn</h3>
                     </div>
                     <div class="card-block">
                        <form id="main" method="post"action="{{route('subject.update',['id' => $subject->id])}}" enctype="multipart/form-data">
                           @csrf
                           <div class="form-group row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                 <label class="">Tên bộ môn  <span style="color: red">*</span></label>
                                 <input type="text" class="form-control" name="subject_name" id="name" value="{{old('subject_name',$subject->subject_name)}}"/>
                                                 @error('subject_name')
                                                <span class="messages" style="color:red">{{$message}}</span>
                                                 @enderror
                              </div>
                              <div class="form-group">
                                   <label class="">Mô tả</label>
                                   <textarea type="text" class="form-control" name="description" id="description" rows="13">{{old('description',$subject->description)}}</textarea>
                               @error('description')
                               <span class="messages" style="color:red">{{$message}}</span>
                               @enderror
                                </div>
                            </div>
                              <div class="col-sm-6">
                                <div class="upload">
                                    <div class="form">
                                        <input type="file" onchange="encodeImageFileAsURL(this)"
                                            id="image" name="image" class="form-control" src="/{{$subject->image}}" >
                                        <span>
                                            <img src="/{{$subject->image}}"
                                                class="img-fluid" id="img-preview" width="">
                                       
                                            <small style="color: red"></small>
                                          
                                            <h1>Vui lòng chọn ảnh *</h1>
                                        </span>
                                    </div>
                                </div>
                                @error('image')
                                <span class="messages" style="color:red">{{$message}}</span>
                                 @enderror
                             </div>
                           </div>
                           <div class="form-group row d-flex justify-content-center">
                              <button id="btn-save" value="add" class="btn btn-primary mr-1 waves-effect waves-light">
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
            $("#img-preview").attr("src", "{{ asset('').'upload/default-avatar.png' }}");
            return false;
        }
        var reader = new FileReader();
        reader.onloadend = function() {
            $("#img-preview").attr("src", reader.result);
        }
        reader.readAsDataURL(file);
    }
    </script>