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
                          Quản lý mã giảm giá
                        </li>
                        <li class="breadcrumb-item">
                           Cập nhật mã giảm giá
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
                        <h3 style="font-weight: 600">Cập nhật mã giảm giá</h3>
                     </div>
                     <div class="card-block">
                        <form id="main" method="post"action="{{route('discount.update',['id' => $discount->id])}}" enctype="multipart/form-data">
                           @csrf
                           <div class="form-group row">
                              <div class="col-sm-12">
                                 <label >Tên mã giảm giá  <span style="color: red">*</span></label>
                                 <input type="text" class="form-control" name="name" value="{{$discount->name}}"
                                 placeholder="Tên discount" />
                             @error('name')
                             <span class="messages" style="color:red">{{$message}}</span>
                             @enderror
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-sm-6">
                                 <label class="">Giảm giá (%)  <span style="color: red">*</span></label>
                                 <input type="number" class="form-control" name="price" value="{{$discount->price}}"
                                 placeholder="Giảm giá" />
                             @error('price')
                             <span class="messages" style="color:red">{{$message}}</span>
                             @enderror
                              </div>
                              <div class="col-sm-6">
                                <label >Số lượng  <span style="color: red">*</span></label>
                                <input type="number" class="form-control" name="quantity" value="{{$discount->quantity}}"
                                                    placeholder="Số lượng discount" />
                                                @error('quantity')
                                                <span class="messages" style="color:red">{{$message}}</span>
                                                @enderror
                             </div>
                           </div>

                           <div class="form-group row">
                            <div class="col-sm-6">
                               <label class="">Ngày bắt đầu  <span style="color: red">*</span></label>
                               <input type="date" class="form-control" name="start_day" value="{{$discount->start_day->format('Y-m-d')}}"
                               placeholder="Tên discount" />
                           @error('start_day')
                           <span class="messages" style="color:red">{{$message}}</span>
                           @enderror
                            </div>
                            <div class="col-sm-6">
                              <label >Ngày kết thúc  <span style="color: red">*</span></label>
                              <input type="date" class="form-control" name="finish_day" value="{{$discount->finish_day->format('Y-m-d')}}"
                                                    placeholder="Tên discount" />
                                                @error('finish_day')
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