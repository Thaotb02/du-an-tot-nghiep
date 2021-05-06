@extends ('layout-client')
@section('content')

<div class="breadcrumb-bg " style="height:300px"
    data-desktop-src="background-image: url('https://citigym.com.vn/storage/uploads/untitled-2-10.jpg');"
    data-mobile-src="background-image: url('https://citigym.com.vn/storage/uploads/untitled-3-8-375x440.jpg');"
    style="background-image: url('https://citigym.com.vn/storage/uploads/untitled-2-10.jpg');">
    <div class="container" id="breadcrumb-banner" style="">
        <img class="breadcrumb-stripe" src="themes/citigym/images/svg/stripe-breadcumb.svg">
        <div class="title-bg">Bộ môn</div>
        <div class="title">Bộ môn</div>
    </div>
</div>

<div class="container">
    <div class="row">

        <div class="content-text pr-lg-5 m-b-md-3 col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
            <div class="title-detail-bl">
                <h1>{{$detailSubject ->subject_name}}</h1>
            </div>
            <div class="date-detail-bl"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar-check"
                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                    <path fill-rule="evenodd"
                        d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                </svg>
            </div>
            <div class="des-detail-bl">
                <p>
                    {{$detailSubject ->description}}
                </p>
                <p class="img-content-bl" style="text-align:center"><img src=" {{$detailSubject->featured_image}}"
                        alt="">
                </p>
            </div>
        </div>

        <div class="blog-diff col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
            <div class="diff-bl">
                <p>Liên quan </p>
            </div>
            @foreach($blogConnection as $item)
            <div class="box-bl-diff">
                <div class="img-bl-diff"><a href=""><img src="{{asset('asset/client/img/01.jpg ')}}" alt=""></a>
                </div>
                <div class="title-bl-diff">
                    <a href="">{{$item->title}}</a>
                    <p>{{$item->created_at}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection