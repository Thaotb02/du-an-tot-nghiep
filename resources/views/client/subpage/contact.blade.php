@extends ('layout-client')
@section('content')

<p>

<div class="main-breadcrumb">
    <div class="breadcrumb-bg" style="background-image: url({{asset('assets/client/images/bannerpage.jpg')}});">
        <div class="container">
            <img class="breadcrumb-stripe" src="{{asset('assets/client/images/bannerpage.jpg')}}" />
            <div class="title-bg">Contact Us</div>
            <div class="title">Liên Hệ</div>
        </div>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="text-center">
            <div class="section-title">Liên hệ chúng tôi</div>
        </div>
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 order-sm-1-i">
                <div id="map-canvas" class="m-b-32px" style="height: 300px;"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="h6 title-s1">Địa chỉ</div>
                            Tầng 3 nhà văn hóa Tổ 2 Phường Dịch Vọng Hậu, số 40 Đặng Thùy Trâm, Cầu Giấy, Hà Nội
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <div class="h6 title-s1">Hotline</div>
                                <a href="tel:1900 633 638">0869 099 199</a>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="h6 title-s1">Email</div>
                                <a href="mailto:contact@citigym.com.vn">info@hkcfitness.com.vn</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 m-b-md-2">
                <form method="POST" action="{{route('client.create-contact')}}" accept-charset="UTF-8">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" value="" id="contact_name"
                            value="{{old('name')}}" placeholder="Họ Tên" />
                        @error('name')
                        <small style="color: red">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="phone" value="" id="contact_phone"
                            value="{{old('phone')}}" placeholder="Điện thoại" />
                        @error('phone')
                        <small style="color: red">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" value="" id="contact_email"
                            value="{{old('email')}}" placeholder="Email" />
                        @error('email')
                        <small style="color: red">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea cols="30" rows="3" class="form-control" id="contact_content" name="content"
                            placeholder="Nội dung">{{old('content')}}</textarea>
                    </div>
                    @error('content')
                    <small style="color: red">{{$message}}</small>
                    @enderror
                    <button type="submit" class="btn btn-brand">Gửi</button>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbjp4oQD8W4f59cdMrfQUFLb0EiMOfaYo"
    type="text/javascript"></script>
<script>
$(document).ready(function() {
    var myLatlng = new google.maps.LatLng(10.770069, 106.666245);

    var mapOptions = {
        zoom: 18,
        center: myLatlng,
    }

    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    var marker = new google.maps.Marker({
        position: myLatlng,
        animation: google.maps.Animation.BOUNCE
    });

    // To add the marker to the map, call setMap();
    marker.setMap(map);
    google.maps.event.trigger(map, "resize");

});
</script>
</p>

@endsection