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
                              Quản lý feedback
                            </li>
                            <li class="breadcrumb-item">
                               Cập nhật feedback
                            </li>
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
                            <h3 style="font-weight: 600">Cập nhật feedback</h3>
                         </div>
                         <div class="card-block">
                            <form id="main" method="post"action="{{route('feedback.edit',['id' => $feedback->id])}}" enctype="multipart/form-data">
                               @csrf
                               <div class="form-group row">
                                <div class="col-sm-6">
                                   <label class="">Hội viên  <span style="color: red">*</span></label>
                                   <select name="member_id" class="js-example-basic-single col-sm-12">
                                    @foreach($Member as $mem)
                                          <option @if ($mem->id == $feedback->member_id) selected @endif value="{{$mem->id}}">{{$mem->infor->name}} {{$mem->infor->email}}</option>
                                    @endforeach
                                </select>
                                @error('member_id')
                                <span class="messages" style="color:red">{{$message}}</span>
                         @enderror
                                </div>
                                <div class="col-sm-6">
                                  <label >Huấn luyện viên  <span style="color: red">*</span></label>
                                  <select name="pt_id" class="js-example-basic-single col-sm-12">
                                    @foreach($pt as $listPt)
                                        <option @if ($listPt->id == $feedback->pt_id) selected @endif value="{{$listPt->id}}">{{$listPt->infor->name}}</option>
                                    @endforeach
                                    </select>
                                    @error('pt_id')
                                    <span class="messages" style="color:red">{{$message}}</span>
                                @enderror
                               </div>
                             </div>
                               <div class="form-group row">
                                  <div class="col-sm-12">
                                     <label >Nội dung  <span style="color: red">*</span></label>
                                     <textarea type="text" class="form-control" name="content" id="content" rows="8"
                                      >{{$feedback->content}}</textarea>
                                 @error('content')
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