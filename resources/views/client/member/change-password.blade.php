@extends ('layout-client')
@section('content')

<main>
   <div class="main-wrapper" >
      <section class="section section-service-services no-bg" style="padding-top: 100px;">
         <div class="container-fluid">
            <div class="text-center">
               <div class="section-title">
                  Đổi mật khẩu                                    
               </div>
               @if (\Session::has('success'))
                    <div class="alert background-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif
               <div class="desc mx-auto sub-description">
               </div>
            </div>
         </div>
         <div class="container" style="padding-right: 16px;">
         <form method="POST" action="{{route('client.memberupdatepassword')}}" accept-charset="UTF-8" id="contactForm">
            @csrf

      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title title-s1">Thay đổi mật khẩu của bạn</h5>
            </div>
            <div class="modal-body p-x-3 p-y-3">
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                     <input type="password" name="old_password" class="form-control" placeholder="Mật khẩu cũ" value="{{old('old_password')}}">
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <input type="password" name="new_password" class="form-control" placeholder="Mật khẩu mới">
                        @error('new_password')
                        <span class="form-bar"style="color: red" >{{$message}}</span>
                           @enderror
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <input type="password" name="confirm_password" class="form-control" placeholder="Nhập lại mật khẩu mới">
                        @error('confirm_password')
                        <span class="form-bar"style="color: red" >{{$message}}</span>
                           @enderror
                     </div>
                  </div>
                  
               <button type="submit" data-control="submit" class="btn btn-brand">Đổi mật khẩu</button>
            </div>
         </div>
      </div>
   </form>
</div>
        
      </section>

   </div>
</main>

@endsection