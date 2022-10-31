<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>CREDO</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('public/assets-turist/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('public/assets-turist/css/style.c') }}ss">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('public/assets-turist/css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('public/assets-turist/images/fevicon.png') }}" type="image/gif" />
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/assets-turist/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets-turist/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets-turist/css/niceCountryInput.css') }}">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->
<body class="main-layout">


<!-- loader  -->
<div class="loader_bg">
    <div class="loader"><img src="{{ asset('public/assets-turist/images/loading.gif') }}" alt="#"/></div>
</div>
<!-- end loader -->
<!-- header -->
<div class="header">
    <div class="top_header">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">

                    <div class="select_main d-flex">
                        <div class="logo">
                            <a href="{{Request::is('news') ? route('main').'/':'' }}#"><img src="{{ asset('public/assets-turist/images/credo24.png') }}" width="85px" alt="#" /></a>
                        </div>
                        <div class="sign">
                            <div class="niceCountryInputSelector se_flag" style="width: 200px;" data-selectedcountry="UZ" data-showspecial="false" data-showflags="true" data-i18nall="All selected"
                                 data-i18nnofilter="No selection" data-i18nfilter="Filter" data-onchangecallback="onChangeCallback" />
                        </div>
                    </div>
                    <ul class="top_infomation">
                        <li><img src="{{ asset('public/assets-turist/images/ti_call.png') }}" alt="#"/>Tel : +998 77 010 99 99</li>
                        <li><img src="{{ asset('public/assets-turist/images/ti_mail.png') }}" alt="#"/><a href="Javascript:void(0)"> credo@gmail.com</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header_midil">
    <div class="container">
        <div class="row d_flex">
            <div class=" col-md-2 col-sm-3 logo_section">
                <div class="full">
                    <div class="center-desk">
                        <div class="logo">
                            <a href="{{Request::is('news') ? route('main').'/':'' }}#"><img src="{{ asset('public/assets-turist/images/credo24.jpg') }}" width="80px"
                                style="border-radius: 12px"
                                                      alt="#" /></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 col-md-8">
                <nav class="navigation navbar navbar-expand-md navbar-dark ">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarsExample04">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{Request::is('news') ? route('main').'/':'' }}#">Asosiy</a>
                            </li>
                            <li class="nav-item">
                            <li class="nav-item">
                                <a class="nav-link" href="{{Request::is('news') ? route('main').'/':'' }}#trip">Sayohatlar</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('news') }}">Yangiliklar</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{Request::is('news') ? route('main').'/':'' }}#about">Biz haqimizda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{Request::is('news') ? route('main').'/':'' }}#contact">Bog'lanish</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-md-2  d_none">
                <ul class="email text_align_right">
                    <li><a href="Javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i>   </a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
<!-- end header inner -->
<!-- top -->
<div class="full_bg">
    <div class="slider_main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- carousel code -->
                    <div id="carouselExampleIndicators" class="carousel slide">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <!-- first slide -->

                            @foreach($carousel as $item)
                            <div class="carousel-item {{ $loop->index == 0 ? 'active': '' }} ">
                                <div class="carousel-caption relative">
                                    <div class="row">
                                        <div  class="col-md-10 offset-md-1">
                                            <div class="board">
                                                <h1>{{ $item->head }} </h1>
                                                <p>{{ $item->text }}</p>
                                                <a class="read_more" href="Javascript:void(0)">Ko'proq</a>
                                                <a class="read_more" href="#contact">Bog'lanish</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                        </div>
                        <!-- controls -->
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end banner -->



@yield('main')






<div class="mapouter">
    <div class="gmap_canvas">
        <iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                src="https://maps.google.com/maps?q=41.270275,69.237248&hl=es;z=14&amp;output=embed">

        </iframe>
    </div>
    <style>.mapouter{position:relative;text-align:center;width:100%;height:478px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:478px;}.gmap_iframe {width:1086px!important;height:478px!important;}</style>
</div>



<!--  footer -->
<footer>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="follow text_align_left">
                        <h3 class="text-success">O‘ZINGIZGA MOS TURNI TOPA OLMADINGIZMI? UNDA BIZ BILAN
                            <a class="text-primary" href="{{Request::is('news') ? route('main').'/':'' }}#contact">BOG'LANING</a>

                        </h3>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="follow text_align_left">
                        <h3>Biz haqimizda</h3>
                        <p>CREDO – turoperatorlik va agentlik faoliyatini
                            muvaffaqiyatli olib borayotgan kompaniya. Kompaniya
                            jiddiy nufuzga, ajoyib o‘tmish va yorqin istiqbolga ega!</p>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <ul class="conta">
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i>	Toshkent shahar, Yunusobod tumani, Amir Temur ko'chasi 145-uy.
                        </li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i>+998 77 010 99 99</li>
                        <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="Javascript:void(0)"> credo@gmail.com</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <div class="follow text_align_left">
                        <h3>Ijtimoiy tarmoqlar</h3>
                        <ul class="social_icon ">
                            <li><a href="Javascript:void(0)"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="Javascript:void(0)"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="Javascript:void(0)"><i class="fa fa-telegram" aria-hidden="true"></i></a></li>
                            <li><a href="Javascript:void(0)"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>© 2020 All Rights Reserved. Design by <a href="https://abdurahman.uz"> IslamAbdurahman</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->
<!-- Javascript files-->
<script src="{{ asset('public/assets-turist/js/jquery.min.js') }}"></script>
<script src="{{ asset('public/assets-turist/js/bootstrap.bundle.min.j') }}s"></script>
<script src="{{ asset('public/assets-turist/js/jquery-3.0.0.min.js') }}"></script>
<script src="{{ asset('public/assets-turist/js/jquery.nice-select.min.j') }}s"></script>
<!-- sidebar -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="{{ asset('public/assets-turist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('public/assets-turist/js/niceCountryInput.js') }}"></script>
<script src="{{ asset('public/assets-turist/js/custom.js') }}"></script>
<script>  AOS.init();</script>
</body>
</html>
