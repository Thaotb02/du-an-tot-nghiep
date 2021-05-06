@extends ('layout-client')
@section('content')
<main>
    <div class="breadcrumb-bg " style="height:300px"
        style="background-image: url({{asset('assets/client/images/bannerpage.jpg')}});">
        <div class="container" id="breadcrumb-banner" style="">
            <img class="breadcrumb-stripe" src="{{asset('assets/client/images/bannerpage.jpg')}}">
            <div class="title-bg">Subjects</div>
            <div class="title">Bộ môn</div>
        </div>
    </div>
    <section class="section section-service-services no-bg">
        <div class="container-fluid">
            <div class="text-center">
                <div class="section-title">
                    Các dịch vụ của chúng tôi
                </div>
                <h1 class="sub-description-title mx-auto seo-desc">
                    Chương trình luyện tập yoga, gym, kickboxing được thiết kế khoa học và phù hợp <br> từ chuyên gia sẽ
                    giúp bạn đạt được mục tiêu sức khỏe và hình thể.
                </h1>
                <div class="desc mx-auto sub-description">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="services-wrapper">
                <div class="row">
                    @foreach($subs as $sub)
                    <div class="col-xl-4 col-lg-4 col-md-4 col-4 pd-5">
                        <div class="item m-b-lg-3 categories-list" data-categories-list="4">
                            <div class="item-img">
                                <img src="{{$sub->image}}">
                            </div>
                            <div class="content-overlay">
                                <div class="content">
                                    <div class="title-service">{{$sub->subject_name}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h1 class="sub-description-title mx-auto seo-desc">{{$sub->description}}</h1>
                        </div>
                        <div class="row d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-brand btn-sm" data-toggle="modal"
                                style="margin-left: 20px;" data-target=".modal-sign-up">Đăng ký
                                ngay</button>
                        </div>
                        <div class="modal modal-sign-up fade">
                            <form method="POST" action="{{route('client.contactt')}}" accept-charset="UTF-8"
                                id="contactForm">
                                @csrf

                                <input name="_token" type="hidden"
                                    value="njgSllrjKbZBn54nsnC0Q6dt1m8HJIfbobqL9W62">
                                    @csrf
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title title-s1">Đăng ký tư vấn dịch vụ</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span></span><i class="fa fa-times" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body p-x-3 p-y-3">
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" name="name" class="form-control"
                                                                placeholder="Họ tên" />
                                                            <ul class="list-unstyled ml-1 mt-1"
                                                                data-validation="eden-validation" data-field="name"></ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="number" name="phone" class="form-control"
                                                                placeholder="Số điện thoại" />
                                                            <ul class="list-unstyled ml-1 mt-1"
                                                                data-validation="eden-validation" data-field="phone"></ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="email" name="email" class="form-control"
                                                                placeholder="Email" />
                                                            <ul class="list-unstyled ml-1 mt-1"
                                                                data-validation="eden-validation" data-field="email"></ul>
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
                                                            <ul class="list-unstyled ml-1 mt-1"
                                                                data-validation="eden-validation" data-field="content"></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex justify-content-center">
                                                    <button type="submit" data-control="submit" class="btn btn-brand">Đăng ký ngay</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    </div>
</main>
@endsection