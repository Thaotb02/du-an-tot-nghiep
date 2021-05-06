@extends ('layout-client')
@section('content')
<main>
    <base href="{{asset('')}}">
    <div class="main-wrapper" style="padding-top: 69.8px;">
        <a href="#">
            <div class="main-breadcrumb" style="opacity: 1;">
                <div class="breadcrumb-bg" data-desktop-src="background-image: url('');">
                </div>
            </div>
        </a>
        <section class="section section-pricing-detail profile-client">

            <div class="row m-pricing-detail">
                <div class="col-lg-12 content-text m-b-md-3">
                    <span class="detail-personal-js">
                        <ul class="tag-inline tag-col-3 nav nav-tabs m-b-24px m-t-md-3 d-block">
                            <li class="nav-item d-inline-block">
                                <a data-short-title="Classic" data-package-list="1" class="nav-link active"
                                    data-toggle="tab" href="#package-personal-list-1">Chi tiết bảo lưu</a>
                            </li>
                        </ul>
                        <div class="tab-content pl-3 mt-4">
                            <div class="tab-pane fade show active" id="package-personal-list-1">
                                <div class="rounded bg-white mt-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-block contact-details">
                                                    <div class="data_table_main table-responsive dt-responsive">
                                                        <table id="footer-select"
                                                            class="table  table-striped table-bordered nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">STT</th>
                                                                    <th scope="col">Tên hội viên</th>
                                                                    <th scope="col">Thời gian bảo lưu</th>
                                                                    <th scope="col">Phí bảo lưu</th>
                                                                    <th scope="col" >Số ngày bảo lưu</th>
                                                                 
                                                                    <th scope="col">Trạng thái thanh toán</th>
                                                                    <th scope="col">Trạng thái</th>
                                                                 
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($reserves as $no => $reserve)
                                                                <tr>
                                                                    <th scope="row">{{$no +1}}</th>
                                                <td>{{isset($reserve->order->member->infor) ? $reserve->order->member->infor->name : ''  }}
                                                </td>
                                                <td>{{$reserve->start_day->format('d-m-Y')}} -- {{$reserve->finish_day->format('d-m-Y')}} </td>   
                                                <td>
                                                   {{number_format($reserve->price,0,'','.')}} VNĐ
                                                </td>
                                                @php
                                                    $x = (strtotime($reserve->finish_day->format('d-m-Y')) - strtotime($reserve->start_day->format('d-m-Y')))/(60*60*24);
                                                    $y = (strtotime($reserve->finish_day->format('d-m-Y'))- strtotime($today))/(60*60*24);
                                                @endphp
                                                <td>{{ $x }} Ngày </td>
                                                   
                                                 
                                                 <td>
                                                    @if($reserve->status_pay==1)
                                                    <a href="{{route('order.changeStatusReserve',['id'=>$reserve->id])}}" class="label label-danger" onclick="return confirm('Bạn chắc chắn muốn chuyển trạng thái thành thanh toán Gói tập')">
                                                    <span class="icofont icofont-ui">Chưa thanh toán</span></a> 
                                                    @else 
                                                    <a href="{{route('order.changeStatusReserve',['id'=>$reserve->id])}}" class="label label-success" onclick="return confirm('Bạn chắc chắn muốn chuyển trạng thái thành chưa thanh toán Gói tập')">
                                                        <span class="icofont icofont-ui">Đã thanh toán</span></a> 
                                                         @endif
                                             </td>
                                             <td><span class="label label-danger">Hết Hạn Bảo Lưu</span></td>

                                                                </tr>
                                                                @endforeach
                                                               

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                    </span>
                </div>
            </div>
    </div>
    </section>
    </div>
</main>
@endsection