<base href="{{asset('')}}">
<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <span class="mobile-menu" id="mobile-collapse"> <i class="feather icon-menu"></i> </span>
        <a href="{{route('admin.home')}}">
                <img class="img-fluid" src="{{asset('assets/admin/images/logo.png')}}" alt="Theme-Logo" />
            </a>
            <a class="mobile-options">
                <i class="feather icon-more-horizontal"></i>
            </a>
        </div>
        <div class="navbar-container container-fluid">
            <ul class="nav-left">
                <li class="header-search">
                    <div class="main-search morphsearch-search">
                        <div class="input-group">
                            <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                            <input type="text" class="form-control" />
                            <span class="input-group-addon search-btn"><i class="feather icon-search"></i></span>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#!" onclick="javascript:toggleFullScreen()">
                        <i class="feather icon-maximize full-screen"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav-right">
             
                <li class="user-profile header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            @if(Auth::user()->avatar == '')
                            <img src="{{asset('assets/admin/images/auth/icon-user-default.png')}}" class="img-radius" alt="User-Profile-Image" />             
                            
                               @else 
                               <img src="{{Auth::user()->avatar}}" class="img-radius" alt="User-Profile-Image" />
                               @endif
                            
                            <span>{{Auth::user()->name}}</span>
                            <i class="feather icon-chevron-down"></i>
                        </div>
                        <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn"
                            data-dropdown-out="fadeOut">
                            <li>
                                <a href="{{route('login.password')}}">
                                    <i class="feather icon-settings"></i> Đổi mật khẩu
                                </a>
                            </li>
                            <li>
                                <a href="{{route('member.profileadmin')}}">
                                    <i class="feather icon-user"></i> Thông tin cá nhân
                                </a>
                            </li>
                            <li>
                                <a href="{{route('admin.logout')}}" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất')">
                                    <i class="feather icon-log-out"></i> Đăng xuất
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
