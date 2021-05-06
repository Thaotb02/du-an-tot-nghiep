@extends('layout-admin')
@section('content')
<link rel="stylesheet" href="{{asset('assets/admin/bower_components/select2/css/select2.min.css')}}" />
<link rel="stylesheet" type="text/css"
   href="{{asset('assets/admin/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css')}}" />
<link rel="stylesheet" type="text/css"
   href="{{asset('assets/admin/bower_components/multiselect/css/multi-select.css')}}" />
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
                           <li class="breadcrumb-item">Quản lý loại gói tập</li>
                           <li class="breadcrumb-item">Cập nhật loại gói tập</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="page-body">
               <div class="row justify-content-center">
                  <div class="col-sm-6">
                     <div class="card">
                        <div class="card-header">
                           <h3 style="font-weight: 600">Cập nhật loại gói tập</h3>
                        </div>
                        <div class="card-block">
                           <form  method="post"action="{{route('typepackage.update',['id' => $typePackAge->id])}}" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group row">
                                 <div class="col-sm-12">
                                    <label >Tên loại gói tập  <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="TypePackage_name" value="{{$typePackAge->TypePackage_name}}"/>
                                    @error('TypePackage_name')
                                    <span class="messages" style="color:red">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <div class="col-sm-12">
                                    <label class="">Bộ môn  <span style="color: red">*</span></label>
                                    <select class="form-control select2" id="select_box" name="subject_id">
                                        @foreach($subjects as $sub)
                                        @if($sub->id == $typePackAge->subject_id)
                                        <option selected value="{{$typePackAge->subject_id}}">{{ $sub->subject_name }}</option>
                                        @else
                                        <option value="{{ $sub->id }}">{{ $sub->subject_name }}</option>
                                        @endif
                                    @endforeach
                                    </select>
                                   
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <div class="col-sm-6">
                                    <label >Bảo lưu  <span style="color: red">*</span></label>
                                    <select class="form-control select2" id="select_box" name="security">
                                       <option value="1" {{$typePackAge->security === 1 ? 'selected' : ''}}>Không được bảo lưu</option>
                                       <option value="2" {{$typePackAge->security === 2 ? 'selected' : ''}}>Được bảo lưu</option>
                                    </select>
                                    @error('security')
                                    <span class="messages" style="color:red">{{$message}}</span>
                                    @enderror
                                 </div>
                                 <div class="col-sm-6">
                                    <label >Thể loại  <span style="color: red">*</span></label>
                                    <select class="form-control select2" id="select_box" name="catetoryPackage">
                                       <option value="1" {{$typePackAge->catetoryPackage === 1 ? 'selected' : ''}}>Không có huấn luyện viên</option>
                                       <option value="2" {{$typePackAge->catetoryPackage === 2 ? 'selected' : ''}}>Có huấn luyện viên</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <div class="col-sm-6">
                                    <label class="">Giá niêm yết  <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="price" value="{{$typePackAge->price}}"/>   
                                    @error('price')
                                    <span class="messages" style="color:red">{{$message}}</span>
                                    @enderror
                                 </div>
                                 <div class="col-sm-6">
                                    <label >Giá sale</label>
                                    <input type="text" class="form-control" name="price_sale" value="{{$typePackAge->price_sale}}"/>
                                    @error('price_sale')
                                    <span class="messages" style="color:red">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <div class="col-sm-12">
                                    <label >Mô tả</label>
                                    <textarea type="text" name="description" class="form-control " id="editor1">{{$typePackAge->description}}</textarea>
                                    {{-- <textarea type="text" class="form-control" name="description" rows="9">{{$typePackAge->description}}</textarea> --}}
                                    @error('description')
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
   <div id="styleSelector"></div>
</div>
</div>
>
@endsection