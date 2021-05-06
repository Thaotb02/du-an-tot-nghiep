@extends ('layout-client')
@section('content')

<main>
   <div class="main-wrapper" >
      <section class="section section-service-services no-bg">
         <div class="container-fluid">
            <div class="text-center">
               <div class="section-title">
                  Đăng Nhập                                      
               </div>
               <div class="desc mx-auto sub-description">
               </div>
            </div>
         </div>
         <div class="container" style="padding-right: 16px;">
       <form method="POST" action="{{route('client.chaneloginForm')}}" >
     @csrf
      <div class="modal-dialog">
      @if(session('thongbao'))
    <div class="d-flex justify-content-start"><p class="btn btn-success "><i class="fas fa-check-circle" style="color: green;"></i>  {{session('thongbao')}}</p></div>
        @endif
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title title-s1">Đăng nhập tài khoản của bạn</h5>
            </div>
            <div class="modal-body p-x-3 p-y-3">
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                        @error('email')
                        <span class="form-bar"style="color: red" >{{$message}}</span>
                           @enderror
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                     <input type="password" name="password" class="form-control" placeholder="Mật khẩu" value="{{old('email')}}">
                        @error('password')
                        <span class="form-bar"style="color: red" >{{$message}}</span>
                           @enderror 
                     </div>
                  </div>
                  @if (\Session::has('success'))
                  <div style="color: red">
                  <ul>
                     <li>{!! \Session::get('success') !!}</li>
                  </ul>
                  </div>
               @endif
                  <div class="col-12">
                           <div class="checkbox-fade fade-in-primary">
                              <label>
                              <input type="checkbox" value="remember">
                              <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                              <span class="text-inverse">Ghi nhớ mật khẩu</span>
                              </label>
                           </div>
                           <div class="forgot-phone text-right f-right">
                              <a href="{{route('client.reset-password-form')}}" class="text-right f-w-600"> Quên mật khẩu?</a>
                           </div>
                        </div>
               </div>
               <div class="row d-flex justify-content-center mt-4">
                  <button type="submit"  class="btn btn-brand">Đăng nhập</button>
               </div>
            
            </div>
         </div>
      </div>
   </form>
</div>
        
</section>

   </div>
</main>

@endsection