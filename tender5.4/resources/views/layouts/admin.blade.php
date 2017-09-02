<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>

    <!-- Meta-Information -->
    <title>@yield('title')
    </title>
    <meta charset="utf-8">
    
    <meta name="description" content="Glade is a clean and powerful ready to use responsive AngularJs Admin Template based on Latest Bootstrap version and powered by jQuery, Glade comes with 3 amazing Dashboard layouts. Glade is completely flexible and user friendly admin template as it supports all the browsers and looks awesome on any device.">
    <meta name="keywords" content="admin, admin dashboard, angular admin, bootstrap admin, dashboard, modern admin, responsive admin, web admin, web app, bitlers">
    <meta name="author" content="bitlers">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Vendor: Bootstrap Stylesheets http://getbootstrap.com -->
    <link rel="stylesheet" href="{{asset('site/admin/css/bootstrap.min.css')}}">

    <!-- Our Website CSS Styles -->
    <link rel="stylesheet" href="{{asset('site/admin/css/icons.css')}}">
    <link rel="stylesheet" href="{{asset('site/admin/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('site/admin/css/rtl.css')}}">
    <link rel="stylesheet" href="{{asset('site/admin/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('site/admin/css/magnific-popup.css')}}">

</head>
<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong>
    browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Our Website Content Goes Here -->
<header class="simple-normal">
    <div class="top-bar">
        <div class="logo">
            <a href="" title=""><i class="fa fa-bullseye"></i> مناقصات دوت كوم</a>
        </div>
        <div class="menu-options"><span class="menu-action"><i></i></span></div>
        <div class="search-dashboard">
            <div class="responsive-search">
            </div>
            <form>
            </form>
        </div><!-- Search Dashboard -->
        <div class="top-bar-quick-sec">
            <ul class="quick-notify-section custom-dropdowns">
                <li class="message-list dropdown">
                    <span><i class="fa fa-bell-o"></i><strong class="red-bg">{{contu()}}</strong></span>

                </li>
                <li class="notification-list dropdown">
                    <span><i class="fa fa-envelope-o"></i><strong class="skyblue-bg" >{{contm()}}</strong></span>
                </li>
            </ul>
            <span class="open-panel"><i class="fa fa-cog fa-spin"></i></span>
            <div class="name-area">
                <a href="javascript:void(0)" title=""><img src="{{url('site/img/logo.png')}}" alt="" /> <strong>
                        {{ Auth::user()->name }}
                    </strong></a>
            </div>
        </div>
    </div><!-- Top Bar -->
    <div class="side-menu-sec" id="header-scroll">
        <div class="quick-report-side">
        </div>
        <div class="side-menus">
            <span>القوائم الرئيسية</span>
            <nav>
                <ul class="parent-menu">
                    <li class="menu-item-has-children active">
                        <ul style="display: block;">
                            <li>
                                <form action="{{ route('logout') }}" class="form-horizontal" method="POST" >
                                    {{ csrf_field() }}

                                    <div class="main-button">
                                        <button type="submit" class="btn btn-danger">تسجيل خروج</button>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                
                <ul class="parent-menu">
                    <li class="menu-item-has-children active">
                        <ul style="display: block;">
                            <li><a href="{{url('/')}}" title="" class="to-site">الموقع الرئيسي</a></li>
                        </ul>
                    </li>
                </ul>
                
                <ul class="parent-menu">
                    <li class="menu-item-has-children active">
                        <ul style="display: block;">
                            <li><a href="{{url('/admin')}}" title="">الرئيسية</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="parent-menu">
                    <li class="menu-item-has-children active">
                        <a title=""><i class="ti-desktop"></i><span>المناقصات <i class="badge red-bg">جديد</i></span></a>
                        <ul style="display: block;">
                            <li><a href="{{url('/item')}}" title="">ادارة المناقصات</a></li>
                            <li><a href="{{url('/item/create')}}" title="">اضافة مناقصة</a></li>
                            <li><a href="{{url('/itemsend')}}" title="">ارسال المناقصات</a></li>
                            <li><a href="{{url('/seen')}}" title="">عدد الزوار</a></li>
                            <li><a href="{{url('/enduser')}}" title="">الفترة الباقية للمشتركين</a></li>


                        </ul>
                    </li>
                </ul>

                <ul class="parent-menu">
                    <li class="menu-item-has-children active">
                        <a title=""><i class="ti-desktop"></i><span>الاعلانات والعروض<i class="badge red-bg">جديد</i></span></a>
                        <ul style="display: block;">
                            <li><a href="{{url('/news/create')}}" title="">اضافة اعلان</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="parent-menu">
                    <li class="menu-item-has-children active">
                        <a title=""><i class="ti-desktop"></i><span>المشتركين<i class="badge red-bg">جديد</i></span></a>
                        <ul style="display: block;">
                            <li><a href="{{url('/user/1')}}" title="">ادارة المشتركين المفعلين</a></li>
                            <li><a href="{{url('/user/2')}}" title="">ادارة المشتركين الغير مفعلين</a></li>
                            <li><a href="{{url('/mail')}}">رسائل الزوار</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="parent-menu">
                    <li class="menu-item-has-children active">
                        <a title=""><i class="ti-desktop"></i><span>البلد<i class="badge red-bg">جديد</i></span></a>
                        <ul style="display: block;">
                            <li><a href="{{url('/country/create')}}" title="">اضافة بلد</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="parent-menu">
                    <li class="menu-item-has-children active">
                        <a title=""><i class="ti-desktop"></i><span>جريدة<i class="badge red-bg">جديد</i></span></a>
                        <ul style="display: block;">
                            <li><a href="{{url('/newspaper/create')}}" title="">اضافة جريدة</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="parent-menu">
                    <li class="menu-item-has-children active">
                        <a title=""><i class="ti-desktop"></i><span>وصف<i class="badge red-bg">جديد</i></span></a>
                        <ul style="display: block;">
                            <li><a href="{{url('/category/create')}}" title="">اضافة وصف</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="parent-menu">
                    <li class="menu-item-has-children active">
                        <a title=""><i class="ti-desktop"></i><span>ارسال رسالة<i class="badge red-bg">جديد</i></span></a>
                        <ul style="display: block;">
                            <li><a href="{{url('/mail/create')}}" title="">رسالة</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="parent-menu">
                    <li class="menu-item-has-children active">
                        <a title=""><i class="ti-desktop"></i><span>الاعدادت<i class="badge red-bg">جديد</i></span></a>
                        <ul style="display: block;">
                            <li><a href="{{url('/setting')}}" title="">ادارة</a></li>
                        </ul>
                    </li>
                </ul>



            </nav>
            <span class="footer-line">2017 Copyright<a title="" href="#"> 7DS</a></span>
        </div>
    </div>
</header>



@yield('content')


<!-- Vendor: Javascripts -->
<script src="{{asset('site/admin/js/jquery-2.1.3.js')}}"></script>
<script src="{{asset('site/admin/js/bootstrap.min.js')}}"></script>

<!-- Our Website Javascripts -->
<script src="{{asset('site/admin/js/app.js')}}"></script>
<script src="{{asset('site/admin/js/common.js')}}"></script>
<script src="{{asset('site/admin/js/home1.js')}}"></script>
<script src="{{asset('site/admin/js/test.js')}}"></script>
<script src="{{asset('site/admin/js/jquery.magnific-popup.min.js')}}"></script>


</body>
</html>