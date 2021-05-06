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
                           <a href="index.html">
                           <i class="feather icon-home"></i>
                           </a>
                        </li>
                        <li class="breadcrumb-item">
                          Quản lý bài viết
                        </li>
                        <li class="breadcrumb-item">
                           Cập nhật bài viết
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="page-body">
            <div class="row justify-content-center">
               <div class="col-sm-10">
                  <div class="card">
                     <div class="card-header">
                        <h3 style="font-weight: 600">Cập nhật bài viết</h3>
                     </div>
                     <div class="card-block">
                        <form id="main" method="post"action="{{route('post.update',['id' => $post->id])}}" enctype="multipart/form-data">
                           @csrf

                           <div class="form-group row">
                            <div class="col-sm-8">
                               <div class="form-group">
                                <label >Tiêu đề <span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="title" id="name" value="{{$post->title}}"/>
                            @error('title')
                            <span class="messages" style="color:red">{{$message}}</span>
                            @enderror
                               </div>
                              
                               <div class="form-group">
                                <label >Nội dung <span style="color: red">*</span></label>
                                <textarea name="content" class="form-control " id="editor1">{{$post->content}}</textarea>
                            </div>
                            @error('content')
                                <span class="messages" style="color:red">{{$message}}</span>
                            @enderror
                               </div>
                         
                           
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Danh mục <span style="color: red">*</span></label>
                                    <select class="form-control select2" id="select_box"
                                    name="subject_id">
                                    <option>Chọn Bộ môn</option>
                                    @foreach($subjects as $sub)
                                    <option @if ($sub->id == $post->subject_id) selected @endif value="{{$sub->id}}">{{$sub->subject_name}}</option>
                                    @endforeach
                                </select>
                                @error('subject_id')
                                <span class="messages" style="color:red">{{$message}}</span>
                                 @enderror
                                 </div>

                                 <div class="form-group">
                                    <label>Tác giả <span style="color: red">*</span></label>
                                    <select class="form-control select2" id="select_box"
                                    name="author">
                                    @foreach($author as $au)
                                    <option @if ($au->id == $post->author) selected @endif  value="{{$au->id}}">{{$au->name}}</option>
                                    @endforeach
                                </select>
                                @error('author')
                                <span class="messages" style="color:red">{{$message}}</span>
                                 @enderror
                                 </div>
                                <div class="form-group">
                                    <label>Trạng thái <span style="color: red">*</span></label>
                                    <select class="form-control select2" id="" name="status">
                                       <option @if (1== $post->status) selected @endif value="1">Hiện bài viết</option>
                                       <option @if (0== $post->status) selected @endif  value="0">Ẩn bài viết</option>
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label>Ảnh nổi bật <span style="color: red">*</span></label>
                                <div class="upload">
                                    <div class="form">
                                        <input type="file" onchange="encodeImageFileAsURL(this)"
                                            id="image" name="featured_image" class="form-control">
                                        <span>
                                            <img src="/{{$post->featured_image}}"
                                                class="img-fluid" id="img-preview">
                                            @error('featured_image')
                                            <small style="color: red">{{$message}}</small>
                                            @enderror
                                            <h1>Vui lòng chọn ảnh *</h1>
                                        </span>
                                    </div>
                                    </div>
                                </div>
                            </div>
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