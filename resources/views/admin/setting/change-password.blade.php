@extends('layout-admin')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/component.css')}}" />
<base href="{{asset('')}}">
<div class="pcoded-content">
<section class="login-block">

<div class="container">
   <div class="row">
      <div class="col-sm-12">
         <form class="md-float-material form-material" method="POST" action="{{route('login.change')}}">
            @csrf
            <div class="text-center">
               <img src="{{asset('assets/admin/images/logo-drak.png')}}" alt="logo.png">
            </div>
            <div class="auth-box card">
               <div class="card-block">
                  <div class="row m-b-20">
                     <div class="col-md-12">
                        <h3 class="text-center">Đổi mật khẩu</h3>
                     </div>
                  </div>
                  <div class="form-group form-primary">
                  <input type="password" name="old_password" class="form-control"  placeholder="Nhập mật khẩu cũ" value="{{old('old_password')}}">
                     
                     
                  </div>
                  <div class="form-group form-primary">
                     <input type="password" name="password" class="form-control"  placeholder="Mật khẩu mới">
                     @error('password')
                  <span class="form-bar"style="color: red" >{{$message}}</span>
                     @enderror
                  </div>
                  <div class="form-group form-primary">
                     <input type="password" name="password_confirmation" class="form-control"  placeholder="Nhập lại mật khẩu mới">
                     @error('password_confirmation')
                     <span class="form-bar" style="color: red">{{$message}}</span>
                     @enderror
                  </div>
                  @if (\Session::has('success'))
                  <div class="alert background-danger">
                     <ul>
                        <li>{!! \Session::get('success') !!}</li>
                     </ul>
                  </div>
                  @endif
                  <div class="row m-t-30">
                     <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Đổi mật khẩu</button>
                     </div>
                  </div>
                  <hr />
                  <div class="row">
                     <div class="col-md-10">
                        <p class="text-inverse text-left m-b-0">Bạn có thể đổi mật khẩu vì lý do bảo mật hoặc đặt lại mật khẩu nếu bạn quên.</p>
                     </div>
           
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
</div>

</section>
@endsection