<!DOCTYPE html>
<html lang="vi">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/client/images/favicon1.png')}}" />

    <meta http-equiv="content-language" content="en" />
    <style type="text/css">
    .help-block {
        color: #dc3545;
    }

    .seo-desc {
        font-size: 16px;
        font-weight: normal;
    }

    @media (min-width: 768px) and (max-width: 992px) {
        .header .logo-img {
            top: 0;
        }
    }
    </style>
    <title>HKC Fitness - Kickfit Yoga & GYM</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:description" content="#" />
    <meta property="og:keywords" content="Home Page" />
    <meta property="og:image" content="" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/style.css')}}" />
    <link media="all" type="text/css" rel="stylesheet"
        href="{{asset('assets/client/plugins/bootstrap/dist/css/bootstrap.min.css')}}" />
    <link media="all" type="text/css" rel="stylesheet"
        href="{{asset('assets/client/plugins/slick-carousel/slick/slick-theme.css')}}" />
    <link media="all" type="text/css" rel="stylesheet"
        href="{{asset('assets/client/plugins/slick-carousel/slick/slick.css')}}" />
    <link media="all" type="text/css" rel="stylesheet"
        href="{{asset('assets/client/plugins/zurb-twentytwenty/css/twentytwenty.css')}}" />
    <link media="all" type="text/css" rel="stylesheet"
        href="{{asset('assets/client/plugins/metismenu/dist/metisMenu.min.css')}}" />
    <link media="all" type="text/css" rel="stylesheet"
        href="{{asset('assets/client/plugins/photoswipe/dist/photoswipe.css')}}" />
    <link media="all" type="text/css" rel="stylesheet"
        href="{{asset('assets/client/plugins/photoswipe/dist/default-skin/default-skin.css')}}" />
    <link media="all" type="text/css" rel="stylesheet" href="{{asset('assets/client/css/style.min.css')}}" />
    <link media="all" type="text/css" rel="stylesheet" href="{{asset('assets/client/css/custom.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/new.css')}}" />
    <script src="{{asset('assets/client/plugins/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/client/plugins/jquery.serializejson.min.js')}}"></script>
    <script src="{{asset('assets/client/plugins/wowjs/dist/wow.min.js')}}"></script>
</head>

<body class="navigation-sticky">
    <div id="fb-root"></div>

    <div class="fb-customerchat" attribution="setup_tool" page_id="2040756246135872" theme_color="#A50000"
        logged_in_greeting="Liên hệ ngay để nhận những hỗ trợ và thông tin các chương trình ưu đãi hiện tại."
        logged_out_greeting="Liên hệ ngay để nhận những hỗ trợ và thông tin các chương trình ưu đãi hiện tại."></div>
    <script type="text/javascript">
    </script>
    <!-- Header -->
    @include('client/layout/header')
    <style>
    .header .navigation-menu ul li a {
        padding: 24px 18px;
    }

    .language-wrapper {
        display: flex;
        align-items: center;
        top: 45%;
        right: -6%;
        position: absolute;
        transform: translateY(-50%);
        color: #454545;
    }

    .dropdown-toggle::after {
        content: none;
    }

    .language-wrapper .language_bar_chooser li {
        display: block;
        float: none;
        background-color: transparent !important;
        padding-left: 10px;
    }

    .language-wrapper .language_bar_chooser li.active {
        background-color: #f5f6f8 !important;
    }

    .btn-secondary:hover {
        color: #454545;
        background-color: #fff;
        border: none;
    }

    .language-wrapper button .caret {
        display: none !important;
    }

    .language-wrapper .dropdown-menu li.active a span {
        color: #454545;
    }

    .language-wrapper .dropdown-menu li img {
        margin: 0 !important;
    }

    .language_bar_chooser.dropdown-menu li a {
        display: flex !important;
        align-items: center;
    }

    .language_bar_chooser.dropdown-menu li a:hover {
        text-decoration: none;
    }

    .language-wrapper .dropdown-menu li span {
        margin-left: 10px;
    }

    .show>.btn-secondary.dropdown-toggle,
    .btn-secondary:focus {
        color: #454545 !important;
        background-color: #fff !important;
        border: none !important;
    }

    .btn-secondary:focus,
    .show>.btn-secondary.dropdown-toggle:focus {
        box-shadow: none !important;
    }

    .dropdown-menu.show {
        top: 8px !important;
    }

    button.btn.btn-secondary.dropdown-toggle.active {
        font-size: 14px;
    }

    @media (min-width: 992px) {
        .mobile {
            display: none;
        }
    }

    @media (max-width: 992px) {
        .desktop {
            display: none;
        }

        .language-wrapper {
            position: relative !important;
            top: 10px;
            right: 0;
            left: -14px;
        }

        .dropdown {
            width: 100%;
        }

        .dropdown-menu.show {
            top: 8px !important;
            width: 100%;
        }
    }

    @media (min-width: 992px) {
        .header .navigation-menu ul:not(.submenu) {
            justify-content: flex-start;
        }
    }

    @media (min-width: 1200px) {
        .container {
            max-width: 1170px;
        }
    }
    </style>
    <style>
    @media (min-width: 960px) {
        .section-home-banner .slider-img>img {
            height: auto;
        }
    }

    @media (min-width: 768px) and (max-width: 992px) {
        .section-home-before-after .before-after-wrapper .slider-wrapper .next-chervon {
            right: 55px;
        }

        .sm-pd {
            padding: 5px 5px !important;
        }
    }

    .header_tag_seo {
        display: none;
    }

    .unset_css {
        all: unset;
    }

    .slider-img:not(first-child) {
        opacity: 0;
        position: absolute;
        top: 0;
        left: 0;
    }

    .slick-initialized .slider-img {
        opacity: 1;
        position: relative;
    }
    </style>
    <!-- End Header-->
    <main>
        <div class="main-wrapper">
            @yield('content')
        </div>

    </main>
    @include('client/layout/footer')
    <script>
    function changeMobileBanner() {
        $(".section-home-banner .slider-img > img").each(function(index, el) {
            window.innerWidth <= 480 ?
                $(el).attr("src", $(el).attr("data-mobile-src")) :
                $(el).attr("src", $(el).attr("data-desktop-src"));
        });
        $(".img-mobile").each(function(index, el) {
            window.innerWidth <= 480 ?
                $(el).attr("src", $(el).attr("data-mobile-src")) :
                $(el).attr("src", $(el).attr("data-desktop-src"));
        });

        window.innerWidth <= 480 ?
            $(".section-home-news").attr(
                "style",
                $(".section-home-news").attr("data-mobile-src")
            ) :
            $(".section-home-news").attr(
                "style",
                $(".section-home-news").attr("data-desktop-src")
            );

        window.innerWidth <= 480 ?
            $(".section-home-services").attr(
                "style",
                $(".section-home-services").attr("data-mobile-src")
            ) :
            $(".section-home-services").attr(
                "style",
                $(".section-home-services").attr("data-desktop-src")
            );

        window.innerWidth <= 480 ?
            $(".img-home-bmi").attr(
                "src",
                $(".img-home-bmi").attr("data-mobile-src")
            ) :
            $(".img-home-bmi").attr(
                "src",
                $(".img-home-bmi").attr("data-desktop-src")
            );
    }
    $(document).ready(function() {
        changeMobileBanner();

        $(window).resize(function() {
            $(".comparison-slider-wrapper .slider-wrapper")[0].slick.refresh();
        });
    });
    $(window).resize(function(event) {
        changeMobileBanner();
        $(".twentytwenty-container").css({
            height: "auto",
        });
    });
    </script>


    <script src="{{asset('assets/client/js/searchpost.js')}}"></script>
    <script src="{{asset('assets/client/plugins/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('assets/client/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/client/plugins/slick-carousel/slick/slick.min.js')}}"></script>
    <script src="{{asset('assets/client/plugins/metismenu/dist/metisMenu.min.js')}}"></script>
    <script src="{{asset('assets/client/plugins/zurb-twentytwenty/js/jquery.event.move.js')}}"></script>
    <script src="{{asset('assets/client/plugins/photoswipe/dist/photoswipe.min.js')}}"></script>
    <script src="{{asset('assets/client/plugins/zurb-twentytwenty/js/jquery.twentytwenty.js')}}"></script>
    <script src="{{asset('assets/client/js/style.min.js')}}"></script>
    <script src="{{asset('assets/client/js/menudrop.js')}}"></script>
    <script src="{{asset('assets/client/plugins/photoswipe/dist/photoswipe-ui-default.min.js')}}"></script>
    <script>
    $(window).on("load", function() {
        $(".twentytwenty-container").twentytwenty({
            no_overlay: true,
        });
    });
    </script>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-56P6JXJ" height="0" width="0"
            style="display: none; visibility: hidden"></iframe></noscript>
</body>

</html>