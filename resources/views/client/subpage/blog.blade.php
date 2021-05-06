@extends ('layout-client')
@section('content')
@php
$query_strings = app('request')->input();
@endphp
<a href="#">
    <div class="main-breadcrumb">
        <div class="breadcrumb-bg" style="background-image: url({{asset('assets/client/images/bannerpage.jpg')}});">
            <div class="container">
                <img class="breadcrumb-stripe" src="{{asset('assets/client/images/bannerpage.jpg')}}" />
                <div class="title-bg">Blogs</div>
                <div class="title">Tin tức</div>
            </div>
        </div>
    </div>

    <section class="section blog-list">
        <div class="container">
            <div class="row justify-content-between align-items-center m-y-24px">
                <div class="col-md-8">
                    <form action="" id="form-submit">
                        <ul class="news-list tag-inline tag-col-2 d-lg-inline-block">
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
                                <button class="btn" type="submit"><i class="fa fa-search"
                                        aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-list list-view-mobile">
                <div class="row">
                    @foreach($blog as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="post">
                            <div class="item post-data">
                                <a class="d-block item-img ratio-4-3" href="">
                                    <img src="{{$item->featured_image}}" class="content" />
                                </a>
                                <div class="item-body">
                                    <div class="category">
                                        {{isset($item->subject) ? $item->subject->subject_name : ''  }}
                                    </div>
                                    <a href=" {{route('client.detailblog',['id'=> $item->id])}}"
                                        class="title">{{$item->title}}</a>
                                    <div class="date">
                                        {{$item->created_at->format('d-m-Y')}}
                                    </div>
                                    <div class="description">{!! $item->content !!}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endsection