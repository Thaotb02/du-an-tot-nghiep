@extends('layout-admin')
@section('content')
<link rel="stylesheet" href="{{asset('assets/admin/bower_components/select2/css/select2.min.css')}}" />
<link rel="stylesheet" type="text/css"
href="{{asset('assets/admin/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/bower_components/multiselect/css/multi-select.css')}}" />
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                       
                                            <i class="feather icon-home"></i>
                                    
                                    </li>
                                    <li class="breadcrumb-item">
                                       Danh sách liên Hệ
                                    </li>
                                    <li class="breadcrumb-item">
                                        Thêm mới liên Hệ
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-sm-6">
                            <div class="card d-flex align-items-center justify-content-center">

                                <div class="card-header">
                                    <h3 style="font-weight: 600">Thêm liên hệ</h3>
                                 </div>
                                <div class="card-block col-sm-12">
                                    <form action="{{route('contact.store')}}" method="POST" 
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group ">
                                            <label class="col-form-label">Họ tên  <span style="color: red">*</span></label>
                                    
                                                <input type="text" class="form-control" name="name" value="{{old('name')}}"/>
                                                @error('name')
                                                <span style="color : red" class="messages">{{$message}}</span>
                                                @enderror
                                         
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label class="col-form-label">Email  <span style="color: red">*</span></label>
                                           
                                                <input type="text" class="form-control" name="email" value="{{old('email')}}"/>
                                                @error('email')
                                                <span style="color : red" class="messages">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="col-form-label">Số điện thoại  <span style="color: red">*</span></label>
                                                <input type="text" class="form-control" name="phone" value="{{old('phone')}}"/>
                                                @error('phone')
                                                <span style="color : red" class="messages">{{$message}}</span>
                                                @enderror
                                            </div>
                                           
                                        
                                        </div>
                                      
                                        <div class="form-group">
                                            <label class="col-form-label">Nội dung</label>
                                                <textarea type="text" class="form-control" name="content" cols="2" rows="8"
                                                 >{{old('content')}}</textarea>
                                                @error('content')
                                                <span style="color : red" class="messages">{{$message}}</span>
                                                @enderror
                                            
                                        </div>
                                        <div class="form-group d-flex justify-content-center">
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
    <div id="styleSelector"></div>
</div>
</div>
>
@endsection