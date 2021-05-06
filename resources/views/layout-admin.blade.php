<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>Gymsoft</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#" />
    <meta name="keywords"
        content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app" />
    <meta name="author" content="#" />
    <link rel="icon" href="https://colorlib.com//polygon/adminty/files/assets/images/favicon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet" />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="{{asset('assets/admin/bower_components/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/icon/feather/css/feather.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/new.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/client/css/admin_dashboard.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/jquery.mCustomScrollbar.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/icon/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/icon/icofont/css/icofont.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/icon/feather/css/feather.css')}}">
    <link rel="stylesheet" type="text/css"
        href="{{asset('assets/admin/pages/data-table/css/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css"
        href="{{asset('assets/admin/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/pages/timeline/style.css')}}">
</head>

<body>
    <div class="theme-loader">
        <div class="ball-scale">
            <div class="contain">
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <!-- header -->
            @auth
            @include('admin/layout/header')
            @endauth


            <!-- end header -->
            <div id="sidebar" class="users p-chat-user showChat">
                <div class="had-container">
                    <div class="card card_main p-fixed users-main">
                        <div class="user-box">
                            <div class="chat-inner-header">
                                <div class="back_chatBox">
                                    <div class="right-icon-control">
                                        <input type="text" class="form-control search-text" placeholder="Search Friend"
                                            id="search-friends" />
                                        <div class="form-icon">
                                            <i class="icofont icofont-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-friend-list">
                                <div class="media userlist-box" data-id="1" data-status="online"
                                    data-username="Josephin Doe" data-toggle="tooltip" data-placement="left"
                                    title="Josephin Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius img-radius"
                                            src="{{asset('assets/admin/assets/images/avatar-3.jpg')}}"
                                            alt="Generic placeholder image " />
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Josephin Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="2" data-status="online"
                                    data-username="Lary Doe" data-toggle="tooltip" data-placement="left"
                                    title="Lary Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius"
                                            src="{{asset('assets/admin/assets/images/avatar-2.jpg')}}"
                                            alt="Generic placeholder image" />
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Lary Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="3" data-status="online" data-username="Alice"
                                    data-toggle="tooltip" data-placement="left" title="Alice">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius"
                                            src="{{asset('assets/admin/assets/images/avatar-4.jpg')}}"
                                            alt="Generic placeholder image" />
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alice</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="4" data-status="online" data-username="Alia"
                                    data-toggle="tooltip" data-placement="left" title="Alia">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius"
                                            src="{{asset('assets/admin/assets/images/avatar-3.jpg')}}"
                                            alt="Generic placeholder image" />
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alia</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="5" data-status="online" data-username="Suzen"
                                    data-toggle="tooltip" data-placement="left" title="Suzen">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius"
                                            src="{{asset('assets/admin/assets/images/avatar-2.jpg')}}"
                                            alt="Generic placeholder image" />
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Suzen</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <!-- sidebar -->
                    @auth
                    @include('admin/layout/sidebar')>
                    @endauth
                    <!-- end sidebar -->
                    <!-- content -->
                    @yield('content')
                    <!-- end content -->
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{asset('assets/client/js/jquery.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/admin/bower_components/jquery/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/client/js/jquery.easy-ticker.min.js')}}"></script>
    <script src="{{asset('assets/client/js/admin_index.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script type="text/javascript" src="{{asset('assets/admin/js/menu/menu-sidebar-fixed.js')}}"></script>
    <script src="{{asset('assets/admin/js/news.js')}}"></script>

    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <script type="text/javascript" src="{{asset('assets/admin/bower_components/select2/js/select2.full.min.js')}}">
    </script>
    <script type="text/javascript"
        src="{{asset('assets/admin/bower_components/bootstrap-multiselect/js/bootstrap-multiselect.js')}}">
    </script>
    <script type="text/javascript"
        src="{{asset('assets/admin/bower_components/multiselect/js/jquery.multi-select.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/pages/advance-elements/select2-custom.js')}}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
    CKEDITOR.replace( 'editor1', {
        filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
    } );
        
    </script>


    <script type="text/javascript"
        src="{{asset('assets/admin1/vendors/jquery-easy-ticker-master/jquery.easy-ticker.min.js ')}}"></script>

    <script type="text/javascript" src="{{asset('assets/admin/bower_components/select2/js/select2.full.min.js')}}">
    </script>
    <script type="text/javascript"
        src="{{asset('assets/admin/bower_components/bootstrap-multiselect/js/bootstrap-multiselect.js')}}">
    </script>
    <script type="text/javascript"
        src="{{asset('assets/admin/bower_components/multiselect/js/jquery.multi-select.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/pages/advance-elements/select2-custom.js')}}">
    </script>

    <script type="text/javascript" src="{{asset('assets/admin/bower_components/bootstrap/js/bootstrap.min.js')}}">
    </script>

    <script type="text/javascript"
        src="{{asset('assets/admin/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/bower_components/modernizr/js/modernizr.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/bower_components/modernizr/js/css-scrollbars.js')}}">
    </script>
    <script src="{{asset('assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/admin/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}">
    </script>

    <script src="{{asset('assets/admin/pages/data-table/js/jszip.min.js')}}"></script>
    <script src="{{asset('assets/admin/pages/data-table/js/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/admin/pages/data-table/js/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/admin/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/admin/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/admin/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}">
    </script>
    <script src="{{asset('assets/admin/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}">
    </script>
    <script
        src="{{asset('assets/admin/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}">
    </script>
    <script type="text/javascript" src="{{asset('assets/admin/bower_components/i18next/js/i18next.min.js')}}"></script>
    <script type="text/javascript"
        src="{{asset('assets/admin/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js')}}"></script>
    <script type="text/javascript"
        src="{{asset('assets/admin/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js')}}">
    </script>
    <script type="text/javascript"
        src="{{asset('assets/admin/bower_components/jquery-i18next/js/jquery-i18next.min.js')}}"></script>
    <script src="{{asset('assets/admin/pages/data-table/js/data-table-custom.js')}}"></script>
    <script src="{{asset('assets/admin/js/pcoded.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/vartical-layout.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script type="text/javascript"
        src="{{asset('assets/admin/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/admin/bower_components/chart.js/js/Chart.js')}}"></script>
    <script src="{{asset('assets/admin/pages/widget/amchart/amcharts.js')}}"></script>
    <script src="{{asset('assets/admin/pages/widget/amchart/serial.js')}}"></script>
    <script src="{{asset('assets/admin/pages/widget/amchart/light.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/js/SmoothScroll.js')}}"></script>
    <script src="{{asset('assets/admin/js/pcoded.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/vartical-layout.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/js/script.min.js')}}"></script>




    <!-- Tab -->



    <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->


    <script type="text/javascript" src="{{asset('assets/admin/bower_components/popper.js/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/bower_components/bootstrap/js/bootstrap.min.js')}}">
    </script>


    <!-- Calender -->
    <script type="text/javascript" src="{{asset('assets/admin/js/classie.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/bower_components/moment/js/moment.min.js')}}"></script>
    <script type="text/javascript"
        src="{{asset('assets/admin/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/bower_components/fullcalendar/js/fullcalendar.min.js')}}">
    </script>
    <script type="text/javascript" src="{{asset('assets/admin/pages/full-calender/calendar.js')}}"></script>

    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag("js", new Date());

    gtag("config", "UA-23581568-13");
    </script>
</body>

</html>