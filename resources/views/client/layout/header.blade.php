<base href="{{asset('')}}">
<header class="header header-white">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="logo-img">
                        <a href="{{route('client.homepage')}}">
                            <img src="{{asset('assets/client/images/logohkc.png')}}" alt="" />
                        </a>
                    </div>
                </div>
                <div class="col-md-10">
                    <!-- Desktop Menubar -->
                    <div class="d-flex flex-center-y justify-content-end navigation-menu">
                        <div class="navigation-menu">
                            <ul class="menu sub-menu--slideLeft" minh-data="1">
                                <li class="mobile">
                                    <a href="#" id="toggle-menu-mobile" class="close-menu-mobile">
                                        <i class="fa fa-bars" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li class="  ">
                                    <a href="{{route('client.list-package')}}"><span>Chính sách giá</span>
                                    </a>
                                </li>
                                <li class="  ">
                                    <a href="{{route('client.listpt')}}"><span>Huấn luyện viên</span>
                                    </a>
                                </li>
                                <li class="  ">
                                    <a href="{{route('client.list-subject')}}"><span>Dịch vụ</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{route('client.blog')}}"><span>Tin tức</span>
                                    </a>
                                </li>
                                <li class="  ">
                                    <a href="{{route('client.contact')}}"><span>Liên hệ</span>
                                    </a>
                                </li>

                                @auth
                                @if(Auth::user()->role==1)
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="User-area">
                                        <div class="User-avtar">
                                            @if((Auth::user()->avatar) != null)
                                            <img src="{{Auth::user()->avatar}}" />
                                            @else
                                            <img src="{{asset('assets/client/images/homepage/img_avatar2.png')}}">
                                            @endif

                                        </div>

                                        <ul class="User-Dropdown U-open">
                                            <div class="profile-highlight">
                                                @if((Auth::user()->avatar) != null)
                                                <img src="{{Auth::user()->avatar}}" alt="profile-img" width=36
                                                    height=36>
                                                @else
                                                <img src="{{asset('assets/client/images/homepage/img_avatar2.png')}}"
                                                    alt="profile-img" width=36 height=36>
                                                @endif

                                                <div class="details">
                                                    <a id="profile-name"
                                                        href="{{route('client.profileMember',['id'=>Auth::user()->id])}}">{{Auth::user()->name}}</a>
                                                    @if (Auth::user()->role==1)
                                                    <p> Hội viên </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <li class="">
                                                <a href="{{route('client.profileMember',['id'=>Auth::user()->id])}}">Thông
                                                    tin cá
                                                    nhân
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('client.memberchangePassword')}}">Đổi Password
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('client.logout')}}">Đăng Xuất
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="detail-menu">
                                        <a id="profile-name"
                                            href="{{route('client.profileMember',['id'=>Auth::user()->id])}}">{{Auth::user()->name}}</a>
                                    </div>
                                </div>


                                @elseif(Auth::user()->role==2)
                                <div class="d-flex  align-items-center justify-content-center">
                                    <div class="User-area">
                                        <div class="User-avtar">
                                            @if((Auth::user()->avatar) != null)
                                            <img src="{{Auth::user()->avatar}}" />
                                            @else
                                            <img src="{{asset('assets/client/images/homepage/img_avatar2.png')}}">
                                            @endif
                                        </div>
                                        <ul class="User-Dropdown U-open">
                                            <div class="profile-highlight">
                                                @if((Auth::user()->avatar) != null)
                                                <img src="{{Auth::user()->avatar}}" alt="profile-img" width=36
                                                    height=36>
                                                @else
                                                <img src="{{asset('assets/client/images/homepage/img_avatar2.png')}}"
                                                    alt="profile-img" width=36 height=36>
                                                @endif
                                                <div class="details">
                                                    <a id="profile-name" href="">{{Auth::user()->name}}</a>
                                                </div>
                                            </div>
                                            <li class="">
                                                <a href="{{route('client.pt-profile')}}">Thông tin cá nhân
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('client.changePassword')}}">Đổi mật khẩu
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('client.logout')}}">Đăng Xuất
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="detail-menu">
                                        <a id="profile-name"
                                            href="{{route('client.pt-profile',['id'=>Auth::user()->id])}}">{{Auth::user()->name}}</a>
                                    </div>
                                </div>
                                @else
                                <div></div>
                                @endif
                                @endauth
                                @guest
                                <li class="">
                                    <a href="{{route('client.loginForm')}}"><span>Đăng nhập</span>
                                    </a>
                                </li>
                                @endguest
                                {{-- <a href="{{route('client.loginForm')}}" ><span>Đăng nhập</span></a> --}}
                                {{-- @auth
                        <a href="{{route('client.logout')}}" ><span>Đăng Xuất</span>
                                </a>
                                <a href="{{route('client.profileMember')}}"><span>Thông tin cá nhân</span>
                                </a> ---
                                <a href="{{route('client.changePassword')}}"><span>Đổi Password</span>
                                </a> ---
                                {{Auth::user()->name}}
                                @endauth --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Menu show on mobile only -->
<aside class="side-menu">
    <div id="sidebar-menu">
        <div class="navigation-menu">
            <ul class="sidebar-menu-wrapper metismenu" id="side-menu" minh-data="1">
                <li class="mobile">
                    <a href="#" style="text-align: right" id="close-menu-mobile">
                        <span>X</span>
                    </a>
                </li>
                <li class="  ">
                    <a href="{{route('client.list-package')}}"><span>Chính sách giá</span>
                    </a>
                </li>
                <li class="  ">
                    <a href="{{route('client.listpt')}}"><span>Huấn luyện viên</span>
                    </a>
                </li>
                <li class="  ">
                    <a href="{{route('client.list-subject')}}"><span>Dịch vụ</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{route('client.blog')}}"><span>Tin tức</span>
                    </a>
                </li>
                <li class="  ">
                    <a href="{{route('client.contact')}}"><span>Liên hệ</span>
                    </a>
                </li>
            </ul>
            @auth
            @if(Auth::user()->role==1)
            <div class="d-flex align-items-center justify-content-center">
                <div class="User-area">
                    <div class="User-avtar">
                        @if((Auth::user()->avatar) != null)
                        <img src="{{Auth::user()->avatar}}" />
                        @else
                        <img src="{{asset('assets/client/images/homepage/img_avatar2.png')}}">
                        @endif

                    </div>

                    <ul class="User-Dropdown U-open">
                        <div class="profile-highlight">
                            @if((Auth::user()->avatar) != null)
                            <img src="{{Auth::user()->avatar}}" alt="profile-img" width=36 height=36>
                            @else
                            <img src="{{asset('assets/client/images/homepage/img_avatar2.png')}}" alt="profile-img"
                                width=36 height=36>
                            @endif

                            <div class="details">
                                <a id="profile-name"
                                    href="{{route('client.profileMember',['id'=>Auth::user()->id])}}">{{Auth::user()->name}}</a>
                                @if (Auth::user()->role==1)
                                <p> Hội viên </p>
                                @endif
                            </div>
                        </div>
                        <li class="">
                            <a href="{{route('client.profileMember',['id'=>Auth::user()->id])}}">Thông
                                tin cá
                                nhân
                            </a>
                        </li>
                        <li class="">
                            <a href="{{route('client.memberchangePassword')}}">Đổi Password
                            </a>
                        </li>
                        <li class="">
                            <a href="{{route('client.logout')}}">Đăng Xuất
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="detail-menu">
                    <a id="profile-name"
                        href="{{route('client.profileMember',['id'=>Auth::user()->id])}}">{{Auth::user()->name}}</a>
                </div>
            </div>


            @elseif(Auth::user()->role==2)
            <div class="d-flex  align-items-center justify-content-center">
                <div class="User-area">
                    <div class="User-avtar">
                        @if((Auth::user()->avatar) != null)
                        <img src="{{Auth::user()->avatar}}" />
                        @else
                        <img src="{{asset('assets/client/images/homepage/img_avatar2.png')}}">
                        @endif
                    </div>
                    <ul class="User-Dropdown U-open">
                        <div class="profile-highlight">
                            @if((Auth::user()->avatar) != null)
                            <img src="{{Auth::user()->avatar}}" alt="profile-img" width=36 height=36>
                            @else
                            <img src="{{asset('assets/client/images/homepage/img_avatar2.png')}}" alt="profile-img"
                                width=36 height=36>
                            @endif
                            <div class="details">
                                <a id="profile-name" href="">{{Auth::user()->name}}</a>
                            </div>
                        </div>
                        <li class="">
                            <a href="{{route('client.pt-profile')}}">Thông tin cá nhân
                            </a>
                        </li>
                        <li class="">
                            <a href="{{route('client.changePassword')}}">Đổi mật khẩu
                            </a>
                        </li>
                        <li class="">
                            <a href="{{route('client.logout')}}">Đăng Xuất
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="detail-menu">
                    <a id="profile-name"
                        href="{{route('client.pt-profile',['id'=>Auth::user()->id])}}">{{Auth::user()->name}}</a>
                </div>
            </div>
            @else
            <div></div>
            @endif
            @endauth
            @guest
            <li class="">
                <a href="{{route('client.loginForm')}}"><span>Đăng nhập</span>
                </a>
            </li>
            @endguest
            {{-- <a href="{{route('client.loginForm')}}" ><span>Đăng nhập</span></a> --}}
            {{-- @auth
                        <a href="{{route('client.logout')}}" ><span>Đăng Xuất</span>
            </a>
            <a href="{{route('client.profileMember')}}"><span>Thông tin cá nhân</span>
            </a> ---
            <a href="{{route('client.changePassword')}}"><span>Đổi Password</span>
            </a> ---
            {{Auth::user()->name}}
            @endauth --}}
        </div>

    </div>

</aside>