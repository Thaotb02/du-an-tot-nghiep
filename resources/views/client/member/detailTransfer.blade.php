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
                                    data-toggle="tab" href="#package-personal-list-1">Chi tiết chuyển nhượng</a>
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
                                                        <table id="" class="table  table-striped table-bordered nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th>STT</th>
                                                                    <th>Người được chuyển nhượng</th>
                                                                    <th>Tên loại gói tập</th>
                                                                    <th>Bộ môn</th>
                                                                    <th>Thời gian</th>
                                                                    <th>Huấn luyện viên</th>
                                                                    <th>Phí chuyển nhượng</th>
                                                                    <th>Tình trạng</th>
                                                                
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                <tr>
                                                                    <td>1 </td>
                                                                <td>{{$order->member->infor->name}} -- {{$order->member->infor->phone}}</td>
                                                                    <td>{{isset($order->typepackage) ? $order->typepackage->TypePackage_name : '' }}</td>
                                                                    <td>{{isset($order->typepackage) ? $order->typepackage->subject->subject_name : '' }}</td>
                                                                    <td> {{$order->start_date->format('d-m-Y')}}</td>
                                                                    <td>{{isset($order->pt->infor) ? $order->pt->infor->name : 'Không Có' }}</td>
                                                                <td>{{number_format($order->total_money,0,'','.')}} VNĐ</td>
                                                                <td> @if($order->status==1)
                                                                    <span class=" label label-success ">Còn Hạn</span>
                                                                    @elseif($order->status==2) 
                                                                    <span class=" label label-danger ">Hết Hạn</span>
                                                                    @elseif($order->status ==3)
                                                                    <span class=" label label-warning ">Đang Bảo Lưu</span>
                                                                    @elseif($order->status ==4)
                                                                    <span class=" label label-danger ">Chuyển nhượng</span>
                                                                    @endif</td>
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