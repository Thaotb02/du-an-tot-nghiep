@extends('layout-admin')
@section('content')
@guest
<section class="login-block">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
         <form class="md-float-material form-material" method="POST">
            @csrf
               <div class="text-center">
                  <img src="{{asset('assets/admin/images/logo-drak.png')}}" alt="logo.png">
               </div>
               <div class="auth-box card">
                  <div class="card-block">
                     <div class="row m-b-20">
                        <div class="col-md-12">
                           <h3 class="text-center txt-primary">Đổi mật khẩu mới</h3>
                        </div>
                     </div>
                     <div class="form-group form-primary">
                        <input type="password" name="password" class="form-control" required="" placeholder="Mật khẩu mới">
                        <span class="form-bar"></span>
                        @error('password')
                        <small style="color: red">{{$message}}</small>
                        @enderror
                     </div>
                     <div class="form-group form-primary">
                        <input type="password" name="password_comfirm" class="form-control" required="" placeholder="Nhập lại mật khẩu mới">
                        <span class="form-bar"></span>
                        @error('password_comfirm')
                        <small style="color: red">{{$message}}</small>
                        @enderror
                     </div>
                
                     <div class="row m-t-30">
                        <div class="col-md-12">
                           <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">ĐỔI MẬT KHẨU</button>
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

