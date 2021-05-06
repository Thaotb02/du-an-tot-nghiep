<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">THỐNG KÊ</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="{{route('admin.home')}}">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Bảng điều khiển</span>
                </a>
            </li>
        </ul>
        <div class="pcoded-navigatio-lavel">NHÂN SỰ</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                    <span class="pcoded-mtext">Hội viên</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="{{route('member.list')}}">
                            <span class="pcoded-mtext">Danh sách hội viên</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{route('member.add')}}">
                            <span class="pcoded-mtext">Thêm mới hội viên</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                    <span class="pcoded-mtext">Huấn luyện viên</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="{{route('pt.list')}}">
                            <span class="pcoded-mtext">Danh sách huấn luyện viên</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{route('pt.add')}}">
                            <span class="pcoded-mtext">Thêm mới huấn luyện viên</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-clock"></i></span>
                    <span class="pcoded-mtext">Ca làm</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="{{route('time.index')}}">
                            <span class="pcoded-mtext">Danh sách ca làm</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{route('admin.time.create')}}">
                            <span class="pcoded-mtext">Thêm mới ca làm</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-calendar"></i></span>
                    <span class="pcoded-mtext"> Lịch làm</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="{{route('schedule.list')}}">
                            <span class="pcoded-mtext">Danh sách lịch làm</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{route('schedule.create')}}">
                            <span class="pcoded-mtext">Thêm mới lịch làm</span>
                        </a>
                    </li>
                </ul>
            </li>


        </ul>



        <!-- QUản lý dịch vụ -->

        <div class="pcoded-navigatio-lavel">DỊCH VỤ</div>
        <ul class="pcoded-item pcoded-left-item">

            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-file-plus"></i></span>
                    <span class="pcoded-mtext">Hóa đơn</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="{{route('order.listorder')}}">
                            <span class="pcoded-mtext">Danh sách hóa đơn</span>
                        </a>
                    </li>
                    <li class="">
                    <a href="{{route('order.listReserve')}}">
                            <span class="pcoded-mtext">Danh sách bảo lưu</span>
                        </a>
                    </li>
            
                    <li class="">
                        <a href="{{route('typepackage.list')}}">
                            <span class="pcoded-mtext">Thêm mới hóa đơn</span>
                        </a>
                    </li>
                </ul>
            </li>

         




            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
                    <span class="pcoded-mtext">Loại gói tập</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="{{route('typepackage.list')}}">
                            <span class="pcoded-mtext">Danh sách loại gói tập</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{route('typepackage.create')}}">
                            <span class="pcoded-mtext">Thêm mới loại gói tập</span>
                        </a>
                    </li>
                </ul>
            </li>



            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-book"></i></span>
                    <span class="pcoded-mtext">Bộ môn</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="{{route('subject.list')}}">
                            <span class="pcoded-mtext">Danh sách bộ môn</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{route('subject.create')}}">
                            <span class="pcoded-mtext">Thêm mới bộ môn</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-edit"></i></span>
                    <span class="pcoded-mtext">Bài viết</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="{{route('post.list')}}">
                            <span class="pcoded-mtext">Danh sách bài viết</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{route('post.add')}}">
                            <span class="pcoded-mtext">Thêm mới bài viết</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-percent"></i></span>
                    <span class="pcoded-mtext">Giảm giá</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="{{route('discount.list')}}">
                            <span class="pcoded-mtext">Danh sách mã giảm giá</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{route('discount.create')}}">
                            <span class="pcoded-mtext">Thêm mới mã giảm giá</span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>




        <!-- dsfsdfsd -->
        <div class="pcoded-navigatio-lavel">TƯƠNG TÁC</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-mail"></i></span>
                    <span class="pcoded-mtext">Feedback</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="{{route('feedback.list')}}">
                            <span class="pcoded-mtext">Danh sách feedback</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{route('feedback.create')}}">
                            <span class="pcoded-mtext">Thêm mới feedback</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-phone"></i></span>
                    <span class="pcoded-mtext">Liên hệ</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="{{route('contact.index')}}">
                            <span class="pcoded-mtext">Danh sách liên hệ</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{route('contact.create')}}">
                            <span class="pcoded-mtext">Thêm mới liên hệ</span>
                        </a>
                    </li>
                </ul>
            </li>

            <div class="pcoded-navigatio-lavel">TÀI KHOẢN</div>

            <li class="">
                <a href="{{route('admin.logout')}}" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất')">
                    <span class="pcoded-micon"><i class="feather icon-power"></i></span>
                    <span class="pcoded-mtext">Đăng xuất</span>
                </a>
            </li>



        </ul>
    </div>
</nav>