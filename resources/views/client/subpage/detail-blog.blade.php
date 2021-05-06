@extends ('layout-client')
<link media="all" type="text/css" rel="stylesheet" href="{{asset('assets/client/css/img.css')}}" />
@section('content')

<a href="#">
    <div class="main-breadcrumb">
        <div class="breadcrumb-blog">
            <div class="container" id="breadcrumb-banner" style="display: block;">
                <div class="title-bg1">Tin tức</div>
                <div class="title1">Tin tức</div>
            </div>
        </div>
    </div>
</a>
<div class="container">
    <div class="row">
        <div class="content-text pr-lg-5 m-b-md-3 col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
            <div class="title-detail-bl mb-4">
                <h1>{{$detailBlog ->title}}</h1>
            </div>
            <div class="date-detail-bl d-flex"><svg width="1em" height="1em" viewBox="0 0 16 16"
                    class="bi bi-calendar-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                    <path fill-rule="evenodd"
                        d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                </svg>
                <p ml-4>{{$detailBlog ->created_at}}</p>
                <div class="author ml-4">
                    <p class="blog-author">Tác giả : {{$detailBlog->infor->name}}</p>
                </div>
            </div>

            <div class="des-detail-bl">
                <p class="img-blog">
                    {!! $detailBlog ->content !!}
                </p>
                <p class="img-content-bl" style="text-align:center"><img src=" {{$detailBlog->featured_image}}" alt=""
                        width="">
                </p>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="sidebar-wrapper">
                <div class="sidebar-title">Tin tức khác</div>
                <div class="sidebar-body">
                    @foreach($bloghome as $item)
                    <div class="list-view">
                        <a href="" class="item-img ratio-4-3">
                            <img src="{{$item->featured_image}}" class="content" />
                        </a>
                        <div class="item-content">
                            <a href="" class="titlee">{{$item->title}}</a>
                            <div class="date"><i class="remixicon-calendar-2-line"></i>{{$item->created_at}}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

    @endsection