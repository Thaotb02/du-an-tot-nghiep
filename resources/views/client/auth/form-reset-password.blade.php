@extends ('layout-client')
@section('content')

<main>
   <div class="main-wrapper" >
      <section class="section section-service-services no-bg">
         <div class="container-fluid">
            <div class="text-center">
               <div class="section-title">Quên mật khẩu</div>
               <p>Vui lòng cung cấp email để lấy lại mật khẩu</p>
               <div class="desc mx-auto sub-description">
               </div>
            </div>
         </div>
         <div class="container" style="padding-right: 16px;">
       <form method="POST" action="{{route('client.sendCodeResetPassword')}}" >
     @csrf
      <div class="modal-dialog">
      @if(session('thongbao'))
    <div class="d-flex justify-content-start"><p class="btn btn-success "><i class="fas fa-check-circle" style="color: green;"></i>  {{session('thongbao')}}</p></div>
        @endif
         <div class="modal-content">
            <div class="modal-body p-x-3 p-y-3">
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Email">
                     </div>
                  </div>
                        <div class="col-md-12">
                        <p class="f-w-600 text-right">Quay lại  <a href="{{route('client.loginForm')}}">Đăng nhập.</a></p>
                        </div>
                     </div>
               <button type="submit"  class="btn btn-brand">
                  Xác nhận</button>
            </div>
         </div>
      </div>
   </form>
</div>
        
      </section>

   </div>
</main>

@endsection