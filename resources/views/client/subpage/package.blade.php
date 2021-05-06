@extends ('layout-client')
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Saira+Stencil+One&display=swap" rel="stylesheet">
@section('content')
@php
$query_strings = app('request')->input();
@endphp
<div class="main-breadcrumb">
    <div class="breadcrumb-bg">
        <div class="container" id="breadcrumb-banner">
            <img class=" breadcrumb-stripe" src="" />
            <div class="title-bg">Packages</div>
            <div class="title">Loại gói tập</div>
        </div>
    </div>
</div>

<section class="package">
    <div class="container">
        <div class="row justify-content-between align-items-center m-y-24px">
            <div class="col-md-8">
                <form action="" id="form-submit">
                    <ul class="news-list tag-inline tag-col-2 d-flex">
                        @foreach($subject as $sub)
                        <li class="tablinks">
                            <button name="s" type="submit" class="btn btn-brand btn-sm sub"
                                value="{{$sub->id}}">{{$sub->subject_name}}</button>
                        </li>
                        @endforeach
                    </ul>
                </form>
            </div>
            <div class="form-group col-md-4 m-t-md-2 mb-0">
                <form method="GET" action="" accept-charset="UTF-8">
                    <div class="input-group input-group-custom">
                        <input type="text" name="query" class="form-control search-post" id="search-post" autofocus
                            placeholder="Tìm kiếm">
                        <div class="input-group-append">
                            <button class="btn" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach($typepackages as $item)
                <div class="col-4 post">
                    <div class="package-item post-data">
                        <div class="package-item-image">
                            <img src="http://wgl-demo.net/ketofitt/wp-content/uploads/2020/06/prising-tables_02.png"
                                alt="">
                            <div class="pricing_price">
                                <h4 class="pricing_title">
                                    {{isset($item->subject) ? $item->subject->subject_name : ''  }}</h4>
                                <h4 class="pricing_title1">{{$item->TypePackage_name}}</h4>
                                <h4 class="pricing_title1">{{$item->catetoryPackage ==1 ? 'Không có HLV':'Có HLV'}}</h4>
                                <div class="pricing_price_wrap">

                                    <span class="pricing_price1">{{number_format($item->price,0,'','.')}}</span>
                                    <span class="pricing_currency">VNĐ</span>
                                    <span class="pricing_period">/ {{$item->TypePackage_name}}</span>
                                </div>

                            </div>
                        </div>
                        <div class="pricing_content">
                            <ul class="ketofitt_list ">
                                {!! $item->description!!}
                            </ul>

                        </div>
                        <div class="row d-flex justify-content-center package-submit">
                            <button type="submit" class="btn btn-brand btn-sm" data-toggle="modal"
                                style="margin-left: 20px;" data-target=".modal-sign-up">Đăng ký ngay</button>
                        </div>

                    </div>
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
                                            <button type="submit" data-control="submit" class="btn btn-brand">Đăng ký
                                                ngay</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
</section>
@endsection