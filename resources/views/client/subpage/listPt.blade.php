@extends ('layout-client')
@section('content')
@php
$query_strings = app('request')->input();
@endphp
<base href="{{asset('')}}">


<div class="main-breadcrumb">
    <div class="breadcrumb-bg">
        <div class="container" id="breadcrumb-banner">
            <div class="title-bg">personal training
            </div>
            <div class="title">Huấn Luyện Viên</div>
        </div>
    </div>
</div>

<section class="section section-service-services no-bg">
    <div class="container-fluid mb-4">
    </div>
    <div class="container">
        <div class="row justify-content-between align-items-center m-y-24px">
            <div class="col-md-8">
                <form action="" id="form-submit">
                    <ul class="news-list tag-inline tag-col-2 d-lg-inline-block d-flex">
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
        <div class="tab-content">
            <div class="tab-pane show active" id="categories-list-1">
                <div class="card-list list-view-mobile" id="services_list">
                    <div class="row m-b-1">
                        @foreach($pts as $pt)
                        <div class="col-lg-4 col-md-6 service-detail  ">
                            <div class=" user">
                                <div class="item user-data ">
                                    <div class="item-img ratio-4-3">
                                        <img src="{{isset($pt->infor) ? $pt->infor->avatar : ''  }}" class="content">
                                        </a>
                                    </div>
                                    <div class="item-body">
                                        <div class="category">
                                            {{isset($pt->subject) ? $pt->subject->subject_name : ''  }}</div>
                                        <a href=" {{route('client.detailpt',['id'=>$pt->id])}}"
                                            class="title">{{isset($pt->infor) ? $pt->infor->name : ''  }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection