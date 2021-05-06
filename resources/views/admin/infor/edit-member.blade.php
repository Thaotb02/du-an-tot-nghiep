@extends('layout-admin')
@section('content')

<aside class="right-side right-padding">



    <div class="container-fluid">
        <div class="content-modal">
            <h4 class="panel-title">
                <i class="fa fa-fw fa-user"></i> Sửa Thông Tin Thành viên
            </h4>
            <form>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-modal">
                            <div class="form-group">
                                <label for="">Tên khác hàng *</label>
                                <input id="" name="" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Giới tính *</label>
                                <div class="radio-form">
                                    <label class="container-radio">Nam
                                        <input type="radio" checked="checked" name="radio">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container-radio">Nữ
                                        <input type="radio" name="radio">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Ngày sinh *</label>
                                <input id="" name="" type="date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Email *</label>
                                <input id="" name="" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ *</label>
                                <input id="" name="" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại *</label>
                                <input id="" name="" type="number" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Ghi Chú</label>
                                <textarea class="form-control" id="" rows="5"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-4">
                        <div class="upload">
                            <div class="form">
                                <input type="file">
                                <span>
                                    <i class="fa fa-cloud-upload fa-5x" aria-hidden="true"></i>
                                    <h1>Vui lòng chọn ảnh *</h1>
                                </span>
                            </div>
                        </div>
                        <div class="form-group " id="option_box">
                            <label class="control-label">Nguồn maketting *</label>
                            <select class="form-control select2">
                                <option>Chọn </option>
                                <option value="showPT">Huấn Luyện Viên
                                </option>
                                <option value="showfan">Fanpage</option>
                            </select>
                        </div>
                        <div class="form-group hide" id="showPT">
                            <label class="controhidel-label">Huấn Luyện
                                viên</label>
                            <select class="form-control select2  ">
                                <option>Chọn Huấn luyện viên</option>
                                <option value="AK">Bùi Văn Nam</option>
                                <option value="HI">An Sư Phụ</option>
                            </select>
                        </div>
                        <div class="form-group hide" id="showfan">
                            <label class="controhidel-label">Nguồn page</label>
                            <select class="form-control select2  ">
                                <option>Chọn nguồn</option>
                                <option value="AK">Bùi Văn Nam</option>
                                <option value="HI">An Sư Phụ</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Hoàn
                    Thành</button>
                <button type="submit" class="btn btn-secondary waves-effect">Thoát</button>
            </div>
        </div>

    </div>

</aside>

@endsection