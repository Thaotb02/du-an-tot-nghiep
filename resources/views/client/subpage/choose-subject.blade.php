@extends ('layout-client')
@section('content')
<main>
   <div class="main-wrapper" style="padding-top: 69.8px;">
      <a href="#">
         <div class="main-breadcrumb" style="opacity: 1;">
            <div class="breadcrumb-bg" data-desktop-src="background-image: url('https://citigym.com.vn/storage/uploads/chinh-sach-gia-1440x450.jpg');" data-mobile-src="background-image: url('https://citigym.com.vn/storage/uploads/gcmb-375x440-2-375x440.jpg');" style="background-image: url('https://citigym.com.vn/storage/uploads/chinh-sach-gia-1440x450.jpg');">
               <div class="container" id="breadcrumb-banner" style="">
                  <img class="breadcrumb-stripe" src="/themes/citigym/images/svg/stripe-breadcumb.svg">
               </div>
            </div>
         </div>
      </a>
      <form method="POST" action="" accept-charset="UTF-8" id="contactForm">
                  <div class="col-md-12">
                     <div class="form-group">
                        <select class="form-control" name="subject">
                           <option value="">Câu lạc bộ bạn muốn tham gia</option>
                           <option value="CITIGYM THÀNH THÁI QUẬN 10">CITIGYM THÀNH THÁI QUẬN 10
                           </option>
                           <option value="CITIGYM SUNRISE SOUTH, QUẬN 7">CITIGYM SUNRISE SOUTH, QUẬN 7
                           </option>
                           <option value="CITIGYM VẠN HẠNH MALL, QUẬN 10">CITIGYM VẠN HẠNH MALL, QUẬN
                              10
                           </option>
                           <option value="CITIGYM GOLDEN MANSION, QUẬN PHÚ NHUẬN">CITIGYM GOLDEN
                              MANSION, QUẬN PHÚ NHUẬN
                           </option>
                           <option value="CITIGYM SUN AVENUE, QUẬN 2">CITIGYM SUN AVENUE, QUẬN 2
                           </option>
                        </select>
                        <ul class="list-unstyled ml-1 mt-1" data-validation="eden-validation" data-field="subject"></ul>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <select class="form-control" name="content">
                           <option value="">Giờ nào chúng tôi có thể gọi bạn?</option>
                           <option value="9am-12pm">9am-12pm</option>
                           <option value="12pm-2pm">12pm-2pm</option>
                           <option value="2pm-5pm">2pm-5pm</option>
                           <option value="5pm-10pm">5pm-10pm</option>
                        </select>
                        <ul class="list-unstyled ml-1 mt-1" data-validation="eden-validation" data-field="content"></ul>
                     </div>
                  </div>
               </div>
               <button type="submit" data-control="submit" class="btn btn-brand">Đăng ký ngay</button>
            </div>
         </div>
      </div>
   </form>
   </div>
</main>
@endsection