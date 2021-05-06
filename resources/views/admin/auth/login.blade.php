@extends('layout-admin')
@section('content')
@guest

<section class="login-block">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
         <form class="md-float-material form-material" method="POST" action="{{route('admin.changelogin')}}">
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
                           <h3 class="text-center txt-primary">Đăng nhập</h3>
                        </div>
                     </div>
                     <p class="text-muted text-center p-b-5">Đăng nhập bằng tài khoản quản trị viên của bạn</p>
                     <div class="form-group form-primary">
                        <input type="text" name="email" class="form-control"  placeholder="Nhập email của bạn" value="{{old('email')}}">
                        @error('email')
                        <small style="color: red">{{$message}}</small>
                        @enderror
                     </div>
                     <div class="form-group form-primary">
                        <input type="password" name="password" class="form-control"  placeholder="Mật khẩu">
                        @error('password')
                        <small style="color: red">{{$message}}</small>
                        @enderror
                     </div>
                     @if (\Session::has('success'))
                           <div class="Swal" style="color: red">
                              <ul>
                                 <li>{!! \Session::get('success') !!}</li>
                              </ul>
                           </div>
                     @endif
                     <div class="row m-t-25 text-left">
                        <div class="col-12">
                           <div class="checkbox-fade fade-in-primary">
                              <label>
                              <input type="checkbox" value="remember">
                              <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                              <span class="text-inverse">Ghi nhớ mật khẩu</span>
                              </label>
                           </div>
                           <div class="forgot-phone text-right f-right">
                              <a href="{{route('admin.reset-password-form')}}" class="text-right f-w-600"> Quên mật khẩu?</a>
                           </div>
                        </div>
                     </div>
                     <div class="row m-t-30">
                        <div class="col-md-12">
                           <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">ĐĂNG NHẬP</button>
                        </div>
                     </div>
                  
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endguest

