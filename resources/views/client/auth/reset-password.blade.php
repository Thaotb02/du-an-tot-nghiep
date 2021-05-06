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
       <form method="POST" >
     @csrf
      <div class="modal-dialog">

         <div class="modal-content">
            <div class="modal-body p-x-3 p-y-3">
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu mới">
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <input type="password" name="password_comfirm" class="form-control" placeholder="Xác nhận mật khẩu mới">
                     </div>
                  </div>
               <button type="submit"  class="btn btn-brand">Xác nhận</button>
            </div>
         </div>
      </div>
   </form>
</div>
        
      </section>

   </div>
</main>

@endsection