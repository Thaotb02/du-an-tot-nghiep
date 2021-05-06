@extends('layout-admin')
@section('content')
<base href="{{asset('')}}">
<meta name="_token" content="{!! csrf_token() !!}" />

<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <div class="page-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Material Tab</h5>
                                        </div>
                                        <div class="card-block">
                                            <div class="row m-b-30">
                                                <div class="col-lg-12">
                                                    <div class="sub-title">Default</div>

                                                    <ul class="nav nav-tabs md-tabs" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-toggle="tab" href="#home3"
                                                                role="tab">Home</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#profile3"
                                                                role="tab">Profile</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#messages3"
                                                                role="tab">Messages</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#settings3"
                                                                role="tab">Settings</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                    </ul>

                                                    <div class="tab-content card-block">
                                                        <div class="tab-pane active" id="home3" role="tabpanel">
                                                            <p class="m-0">1. This is Photoshop's version of
                                                                Lorem IpThis is Photoshop's version of Lorem
                                                                Ipsum. Proin gravida nibh vel velit auctor
                                                                aliquet. Aenean sollicitudin, lorem quis
                                                                bibendum auctor, nisi elit consequat ipsum,
                                                                nec sagittis sem nibh id elit. Lorem ipsum
                                                                dolor sit amet, consectetuer adipiscing
                                                                elit. Aenean commodo ligula eget dolor.
                                                                Aenean mas Cum sociis natoque penatibus et
                                                                magnis dis.....</p>
                                                        </div>
                                                        <div class="tab-pane" id="profile3" role="tabpanel">
                                                            <p class="m-0">2.Cras consequat in enim ut
                                                                efficitur. Nulla posuere elit quis auctor
                                                                interdum praesent sit amet nulla vel enim
                                                                amet. Donec convallis tellus neque, et
                                                                imperdiet felis amet.</p>
                                                        </div>
                                                        <div class="tab-pane" id="messages3" role="tabpanel">
                                                            <p class="m-0">3. This is Photoshop's version of
                                                                Lorem IpThis is Photoshop's version of Lorem
                                                                Ipsum. Proin gravida nibh vel velit auctor
                                                                aliquet. Aenean sollicitudin, lorem quis
                                                                bibendum auctor, nisi elit consequat ipsum,
                                                                nec sagittis sem nibh id elit. Lorem ipsum
                                                                dolor sit amet, consectetuer adipiscing
                                                                elit. Aenean commodo ligula eget dolor.
                                                                Aenean mas Cum sociis natoque penatibus et
                                                                magnis dis.....</p>
                                                        </div>
                                                        <div class="tab-pane" id="settings3" role="tabpanel">
                                                            <p class="m-0">4.Cras consequat in enim ut
                                                                efficitur. Nulla posuere elit quis auctor
                                                                interdum praesent sit amet nulla vel enim
                                                                amet. Donec convallis tellus neque, et
                                                                imperdiet felis amet.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-xl-6">
                                                    <div class="sub-title">Below Tab</div>

                                                    <div class="tab-content card-block">
                                                        <div class="tab-pane active" id="home4" role="tabpanel">
                                                            <p class="m-0">1. This is Photoshop's version of
                                                                Lorem IpThis is Photoshop's version of Lorem
                                                                Ipsum. Proin gravida nibh vel velit auctor
                                                                aliquet. Aenean sollicitudin, lorem quis
                                                                bibendum auctor, nisi elit consequat ipsum,
                                                                nec sagittis sem nibh id elit. Lorem ipsum
                                                                dolor sit amet, consectetuer adipiscing
                                                                elit. Aenean commodo ligula eget dolor.
                                                                Aenean mas Cum sociis natoque penatibus et
                                                                magnis dis.....</p>
                                                        </div>
                                                        <div class="tab-pane" id="profile4" role="tabpanel">
                                                            <p class="m-0">2.Cras consequat in enim ut
                                                                efficitur. Nulla posuere elit quis auctor
                                                                interdum praesent sit amet nulla vel enim
                                                                amet. Donec convallis tellus neque, et
                                                                imperdiet felis amet.</p>
                                                        </div>
                                                        <div class="tab-pane" id="messages4" role="tabpanel">
                                                            <p class="m-0">3. This is Photoshop's version of
                                                                Lorem IpThis is Photoshop's version of Lorem
                                                                Ipsum. Proin gravida nibh vel velit auctor
                                                                aliquet. Aenean sollicitudin, lorem quis
                                                                bibendum auctor, nisi elit consequat ipsum,
                                                                nec sagittis sem nibh id elit. Lorem ipsum
                                                                dolor sit amet, consectetuer adipiscing
                                                                elit. Aenean commodo ligula eget dolor.
                                                                Aenean mas Cum sociis natoque penatibus et
                                                                magnis dis.....</p>
                                                        </div>
                                                        <div class="tab-pane" id="settings4" role="tabpanel">
                                                            <p class="m-0">4.Cras consequat in enim ut
                                                                efficitur. Nulla posuere elit quis auctor
                                                                interdum praesent sit amet nulla vel enim
                                                                amet. Donec convallis tellus neque, et
                                                                imperdiet felis amet.</p>
                                                        </div>
                                                    </div>

                                                    <ul class="nav nav-tabs md-tabs" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-toggle="tab" href="#home4"
                                                                role="tab">Home</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#profile4"
                                                                role="tab">Profile</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#messages4"
                                                                role="tab">Messages</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#settings4"
                                                                role="tab">Settings</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div id="styleSelector">
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{asset('assets/admin/bower_components/jquery/js/jquery.min.js')}}"></script>
<!-- <script type="text/javascript" src="../files/bower_components/jquery-ui/js/jquery-ui.min.js"></script> -->
<script type="text/javascript" src="{{asset('assets/admin/bower_components/popper.js/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/admin/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>




@endsection