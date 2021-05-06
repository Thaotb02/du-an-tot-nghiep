@extends('layout-admin')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/component.css')}}" />
<base href="{{asset('')}}">
<div class="pcoded-content">
<section class="login-block">

<div class="container">
   <div class="row">
      <div class="col-sm-12">
         <form class="md-float-material form-material" method="POST" action="{{ route('password.confirm') }}">
            @csrf
            <div class="text-center">
               <img src="{{asset('assets/admin/images/logo-drak.png')}}" alt="logo.png">
            </div>
            <div class="auth-box card">
               <div class="card-block">
                  <div class="row m-b-20">
                     <div class="col-md-12">
                        <h3 class="text-center">Nhập mật khẩu cũ</h3>
                     </div>
                  </div>
                  <div class="form-group form-primary">
                     <input type="text" name="password" class="form-control" required="" placeholder="Mật khẩu cũ">
                     <a href="javascript:;void(0)" ><i class="fa fa-yey"></i> </a>
                     <span class="form-bar"></span>
                  </div>
                  @if (\Session::has('success'))
                  <div class="alert alert-success">
                     <ul>
                        <li>{!! \Session::get('success') !!}</li>
                     </ul>
                  </div>
                  @endif
                  <div class="row m-t-30">
                     <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Submit</button>
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