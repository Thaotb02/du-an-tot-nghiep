@extends('layout-admin')
@section('content')
@guest
<section class="login-block">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
  
            <form class="md-float-material form-material" method="POST" action="{{route('admin.sendCodeResetPassword')}}">
               @csrf
               <div class="text-center">
                  <img src="{{asset('assets/admin//images/logo-drak.png')}}" alt="logo.png">
               </div>
               
               <div class="auth-box card">
               @if(session('thongbao'))
    <div class="d-flex justify-content-start"><p class="btn btn-success "><i class="fas fa-check-circle" style="color: green;"></i>  {{session('thongbao')}}</p></div>
        @endif
                  <div class="card-block">
                     <div class="row m-b-20">
                        <div class="col-md-12">
                           <h3 class="text-left">Lấy lại mật khẩu</h3>
                        </div>
                     </div>
                     <div class="form-group form-primary">
                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                        @error('email')
                        <small style="color: red">{{$message}}</small>
                        @enderror
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Xác nhận</button>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <p class="text-inverse text-left m-b-0">Vui lòng cung cấp email để lấy lại mật khẩu</p>
                        </div>
                        <div class="col-md-6">
                        <p class="f-w-600 text-right">Quay lại<a href="{{route('admin.loginForm')}}">Đăng nhập.</a></p>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</section>
@endguest