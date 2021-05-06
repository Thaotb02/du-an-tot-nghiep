@extends('layout-admin')
@section('content')

<aside class="right-side right-padding">
    <h4 class="panel-title">
        <i class="fa fa-fw fa-user"></i> Sửa hoá đơn
    </h4>
    <div class="container-fluid">
        <form>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-modal">
                        <div class="form-group">
                            <label for="">Tên khác hàng *</label>
                            <input id="" name="" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Thời Hạn *</label>
                            <select class="form-control select2">
                                <option>Chọn thời hạn</option>
                                <option value="">1 tháng</option>
                                <option value="HI">2 tháng</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Ngày bắt đầu *</label>
                            <input id="" name="" type="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Ngày kết thúc *</label>
                            <input id="" name="" type="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Gói tập *</label>
                            <select class="form-control select2" id="select_box">
                                <option>Chọn gói tập</option>
                                <option value="pro">Gói Tập Pro</option>
                                <option value="HI">Gói Tập b</option>
                            </select>
                        </div>
                        <div class="form-group hide" id="pro">
                            <label class="control-label">Huấn Luyện viên *</label>
                            <select class="form-control select2">
                                <option>Chọn Huấn luyện viên</option>
                                <option value="AK">Bùi Văn Nam</option>
                                <option value="HI">An Sư Phụ</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="col-sm-6">
                    <div class="title-pay">
                        <h3>Thông tin thanh toán</h3>
                    </div>
                    <div class=" flex-all">
                        <h5>Giá Gói Cước :</h5>
                        <span> 50.000.00 VNĐ</span>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Khuyến mãi *</label>
                        <select class="form-control select2" id="select_box">
                            <option>Chọn khuyến mãi</option>
                            <option value="pro"> giảm 10%</option>
                            <option value="HI">giảm 20 5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tổng tiền *</label>
                        <input id="" name="" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Kiểu thanh toán *</label>
                        <select class="form-control select2">
                            <option>Chọn kiểu thanh toán</option>
                            <option value="">tiền mặt</option>
                            <option value="">Chuyển khoản</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tiền khách trả</label>
                        <input id="" name="" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Ghi Chú</label>
                        <textarea class="form-control" id="" rows="5"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>

</aside>

@endsection