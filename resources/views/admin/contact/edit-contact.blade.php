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
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Thêm mới Contact</h4>

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
                                        <a href="{{route('contact.index')}}">Danh sách Contact</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="#">Sửa contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card d-flex align-items-center justify-content-center">
                                <div class="card-block col-sm-6">
                                    <form action="{{route('contact.edit',['id' => $contact->id])}}" method="POST" 
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Người phải hồi *</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="name" value="{{$contact->name}}"
                                                    placeholder="Người phải hồi" />
                                                @error('name')
                                                <span style="color : red" class="messages">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Email *</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="email" value="{{$contact->email}}"
                                                    placeholder="Email" />
                                                @error('email')
                                                <span style="color : red" class="messages">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Số điện thoại *</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="phone" value="{{$contact->phone}}"
                                                    placeholder="Số điện thoại" />
                                                @error('phone')
                                                <span style="color : red" class="messages">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Nội dung</label>
                                            <div class="col-sm-9">
                                                <textarea type="text" class="form-control" name="content" id="content"
                                                    placeholder="Nội dung feedback" >{{$contact->content}}</textarea>
                                                @error('content')
                                                <span style="color : red" class="messages">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3"></label>
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                                            </div>
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