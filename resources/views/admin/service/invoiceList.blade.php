@extends('layout-admin')
@section('content')
<aside class="right-side right-padding">
    <section class="content-header">
        <!--section starts-->
        <ol class="breadcrumb">
            <li>
                <a href="index-2.html">
                    <i class="fa fa-fw fa-home"></i> Home
                </a>
            </li>
            <li>
                <a href="news.html">Danh Sách Hoá đơn</a>
            </li>
        </ol>
    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <!-- Basic charts strats here-->
                <div class="header-user">
                    <div class="create-member">
                        <h2>Danh Sách Hoá đơn</h2>
                    </div>
                    <div class="search-member">
                        <div class="filter-member">
                            <select name="format" id="format">
                                <option selected disabled> Lọc Nhanh</option>
                                <option value="pdf">Địa chỉ</option>
                                <option value="txt">Gói</option>
                                <option value="epub">Thời hạn</option>
                                <option value="fb2">Ngày bắt đầu</option>
                            </select>
                            <select name="format" id="format">
                                <option selected disabled> Lọc Nhanh</option>
                                <option value="pdf">Địa chỉ</option>
                                <option value="txt">Gói</option>
                                <option value="epub">Thời hạn</option>
                                <option value="fb2">Ngày bắt đầu</option>
                            </select>
                            <select name="format" id="format">
                                <option selected disabled> Lọc Nhanh</option>
                                <option value="pdf">Địa chỉ</option>
                                <option value="txt">Gói</option>
                                <option value="epub">Thời hạn</option>
                                <option value="fb2">Ngày bắt đầu</option>
                            </select>
                        </div>

                        <div>
                            <form method="post">
                                <input type="text" class="textbox" placeholder="Search">
                                <input title="Search" value="" type="submit" class="button">
                            </form>
                        </div>
                    </div>
                    <div class="export-member">
                        <div class="filter-member">
                            <select name="format" id="format">
                                <option selected disabled> Lọc Nhanh</option>
                                <option value="pdf">Địa chỉ</option>
                                <option value="txt">Gói</option>
                                <option value="epub">Thời hạn</option>
                                <option value="fb2">Ngày bắt đầu</option>
                            </select>
                            <select name="format" id="format">
                                <option selected disabled> Lọc Nhanh</option>
                                <option value="pdf">Địa chỉ</option>
                                <option value="txt">Gói</option>
                                <option value="epub">Thời hạn</option>
                                <option value="fb2">Ngày bắt đầu</option>
                            </select>
                        </div>
                        <div class="export-member-item">
                            <div class="select-approx">
                                <label>Xem
                                    <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0"
                                        class="">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                    mục</label>
                            </div>
                            <div class="dt-buttons btn-group">
                                <button class="btn btn-default buttons-print" tabindex="0"
                                    aria-controls="DataTables_Table_0" type="button"><span>Print</span></button>
                                <button class="btn btn-default buttons-copy buttons-html5" tabindex="0"
                                    aria-controls="DataTables_Table_0" type="button"><span>Copy</span></button>
                                <button class="btn btn-default buttons-excel buttons-html5" tabindex="0"
                                    aria-controls="DataTables_Table_0" type="button"><span>Excel</span></button>
                                <button class="btn btn-default buttons-csv buttons-html5" tabindex="0"
                                    aria-controls="DataTables_Table_0" type="button"><span>CSV</span></button>
                                <button class="btn btn-default buttons-pdf buttons-html5" tabindex="0"
                                    aria-controls="DataTables_Table_0" type="button"><span>PDF</span></button>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal fade" id="invoice" tabindex="-1" role="dialog" aria-labelledby="basicModal"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content modal_all">
                            <div class="modal-header">
                                <h4 class="panel-title">
                                    <i class="fa fa-fw fa-user"></i>Hoá đơn chi tiết
                                </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body modal_content">
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
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light"><i
                                        class="fa fa-print" aria-hidden="true"></i> In Hoá Đơn
                                </button>
                                <button type="submit" class="btn btn-secondary waves-effect " data-dismiss="modal"
                                    aria-label="Close">Thoát</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="header-ion-add">
                            <!-- <i class="fa fa-plus-circle" aria-hidden="true" data-toggle="modal"
                                        data-target="#largeModal"></i> -->
                        </div>
                        <span class="pull-right">
                            <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        </span>
                    </div>
                    <div class="panel-body table-responsive">
                        <tbody>
                            <table class="table responsive nowrap table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col"><input type="checkbox" class="selectall" /> </th>
                                        <th scope="col">STT</th>
                                        <th scope="col">Hành Động</th>
                                        <th scope="col">Tên Khách Hàng</th>
                                        <th scope="col">Gói Tập</th>
                                        <th scope="col">Thời Hạn</th>
                                        <th scope="col">Ngày Bắt Đầu</th>
                                        <th scope="col">Ngày Kết Thúc</th>
                                        <th scope="col">Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th><input type="checkbox" class="individual" />
                                        </th>
                                        <th scope="row">1</th>
                                        <td><a class=" btn btn-primary" id="update_invoice_admin" href="javascript:;">
                                                <i class="fa fa-fw fa-edit"></i></a>

                                            <a class="delete btn btn-danger" id="delete_invoice_admin"
                                                href="javascript:;">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                        <td><img src="./img/admin/user1.png" alt=""> &nbsp; Bùi Trung Hiếu</td>
                                        <td>Gold</td>
                                        <td>3 tháng</td>
                                        <td>15/6/2020</td>
                                        <td>15/9/2020</td>
                                        <td>11.000.00</td>

                                    </tr>
                                    <tr>
                                        <th><input type="checkbox" class="individual" />
                                        </th>
                                        <th scope="row">2</th>
                                        <td><a class=" btn btn-primary" href="javascript:;">
                                                <i class="fa fa-fw fa-edit"></i></a> <a class="delete btn btn-danger"
                                                href="javascript:;">
                                                <i class="fa fa-trash-o"></i>
                                            </a></td>
                                        <td><img src="./img/admin/user1.png" alt=""> &nbsp;Tạ thị thơ</td>
                                        <td>Gold</td>
                                        <td>3 tháng</td>
                                        <td>15/6/2020</td>
                                        <td>15/9/2020</td>
                                        <td>11.000.00</td>
                                    </tr>
                                    <tr>
                                        <th><input type="checkbox" class="individual" />
                                        </th>
                                        <th scope="row">3</th>
                                        <td> <a class=" btn btn-primary" href="javascript:;">
                                                <i class="fa fa-fw fa-edit"></i></a>
                                            <a class="delete btn btn-danger" href="javascript:;">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                        <td> <img src="./img/admin/user1.png" alt=""> &nbsp;Trần thị miền thanh
                                            thản</td>
                                        <td>Gold</td>
                                        <td>3 tháng</td>
                                        <td>15/6/2020</td>
                                        <td>15/9/2020</td>
                                        <td>11.000.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>




@endsection