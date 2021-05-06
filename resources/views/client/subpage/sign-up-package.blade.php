@extends ('layout-client')
@section('content')

<main>
   <input type="hidden" id="page-speed" value="1">
   <div class="main-wrapper" style="padding-top: 69.8px;">
      <a href="#">
         <div class="main-breadcrumb" style="opacity: 1;">
            <div class="breadcrumb-bg" data-desktop-src="background-image: url('https://citigym.com.vn/storage/uploads/12-4.jpg');" data-mobile-src="background-image: url('https://citigym.com.vn/storage/uploads/14-4-375x440.jpg');" style="background-image: url('https://citigym.com.vn/storage/uploads/12-4.jpg');">
               <div class="container" id="breadcrumb-banner" style="">
                  <img class="breadcrumb-stripe" src="/themes/citigym/images/svg/stripe-breadcumb.svg">
                  <div class="title-bg">Find a Class</div>
                  <div class="title">Đăng kí</div>
               </div>
            </div>
         </div>
      </a>
      <section class="section section-service-services no-bg">
         <div class="container-fluid">
            <div class="text-center">
               <div class="section-title">
                  Đăng kí các gói tập                                         
               </div>
               <h1 class="sub-description-title mx-auto seo-desc">
                  Hãy đăng kí gói tập ngay hôm nay để trở thành hội viên mới nhất của HKC Fitness
               </h1>
               <div class="desc mx-auto sub-description">
               </div>
            </div>
         </div>
         <div class="container" style="padding-right: 16px;">
   <form method="POST" action="https://citigym.com.vn/chinh-sach-gia" accept-charset="UTF-8" id="contactForm">
      <input name="_token" type="hidden" value="njgSllrjKbZBn54nsnC0Q6dt1m8HJIfbobqL9W62">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title title-s1">Đăng ký tham quan câu lạc bộ</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <i class="remixicon-close-line"></i>
               </button>
            </div>
            <div class="modal-body p-x-3 p-y-3">
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Họ tên">
                        <ul class="list-unstyled ml-1 mt-1" data-validation="eden-validation" data-field="name"></ul>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <input type="number" name="phone" class="form-control" placeholder="Số điện thoại">
                        <ul class="list-unstyled ml-1 mt-1" data-validation="eden-validation" data-field="phone"></ul>
                     </div>
                  </div>
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
        
      </section>
      <section class="section section-sign-up-form stripe-section mb-0 fadeIn" style="background-image: url('/themes/citigym/images/clubs/11.jpg');">
         <div class="stripe-vector-1"><img src="/themes/citigym/images/svg/stripe-section-left.svg"></div>
         <div class="stripe-vector-2"><img src="/themes/citigym/images/svg/stripe-section-right.svg"></div>
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-md-8">
                  <div class="text-center">
                     <div class="section-title light">Đăng ký tham quan câu lạc bộ</div>
                  </div>
                  <form method="POST" action="https://citigym.com.vn/dich-vu" accept-charset="UTF-8" id="contactForm">
                     <input name="_token" type="hidden" value="bIIjfbjDpaZw9cqepFUCKc19ajJYufPMDRFZtSoJ">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <input type="text" name="name" class="form-control control-light" placeholder="Họ và tên">
                              <ul class="list-unstyled ml-1 mt-1" data-validation="eden-validation" data-field="name">
                              </ul>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input type="text" name="phone" class="form-control control-light" placeholder="Số điện thoại">
                              <ul class="list-unstyled ml-1 mt-1" data-validation="eden-validation" data-field="phone">
                              </ul>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <select class="form-control control-light" name="subject">
                                 <option value="">Câu lạc bộ bạn muốn tham gia</option>
                                 <option value="Citigym Thành Thái">Citigym Thành Thái</option>
                                 <option value="Citigym Phổ Quang">Citigym Phổ Quang</option>
                                 <option value="Citigym Bến Vân Đồn">Citigym Bến Vân Đồn</option>
                                 <option value="Citigym Lê Lợi">Citigym Lê Lợi</option>
                                 <option value="Citigym Vạn Hạnh Mall">Citigym Vạn Hạnh Mall</option>
                                 <option value="Citigym Sunrise">Citigym Sunrise</option>
                                 <option value="Citigym Quang Trung">Citigym Quang Trung</option>
                              </select>
                              <ul class="list-unstyled ml-1 mt-1" data-validation="eden-validation" data-field="subject">
                              </ul>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <select class="form-control control-light" name="content">
                                 <option value="">Giờ nào chúng tôi có thể gọi bạn?</option>
                                 <option value="9:00 AM - 12:00 PM">9:00 AM - 12:00 PM</option>
                                 <option value="12:00 PM - 2:00 PM">12:00 PM - 2:00 PM</option>
                                 <option value="2:00 PM - 5:00 PM">2:00 PM - 5:00 PM</option>
                                 <option value="5:00 PM - 10:00 PM">5:00 PM - 10:00 PM</option>
                              </select>
                              <ul class="list-unstyled ml-1 mt-1" data-validation="eden-validation" data-field="content">
                              </ul>
                           </div>
                        </div>
                        <input type="hidden" name="from_site" value="citigym.com.vn">
                        <input type="hidden" name="device" value="DESKTOP">
                        <input type="hidden" name="ip_user" value="8.38.148.145">
                        <input type="hidden" name="device_detail" value="">
                        <div class="col-md-12 text-center">
                           <button data-control="submit" type="button" class="btnSubmit btn btn-brand">Đăng ký ngay</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </section>
   </div>
</main>

@endsection