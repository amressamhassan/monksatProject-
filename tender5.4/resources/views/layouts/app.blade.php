<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="{{asset('site/img/logo.png')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')   </title>

    <!--Import Google Icon Font-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="{{asset('site/css/materialize.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('site/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/hover-min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/media-query.css')}}">
    @yield('style')
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://fonts.googleapis.com/css?family=Changa" rel="stylesheet">
    <!--[if lt IE 9]-->
    <script src="{{asset('site/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('site/js/respond.min.js')}}"></script>
    <!--[endif]-->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>

<body>

<!-- start navigation -->
<nav class="z-depth-3 navbar pinned">
    <div class="nav-wrapper container">
        @if (Auth::guest())
        <div class="drop-links left">
            <a class='btn-floating btn-large waves-effect waves-light pulse' href='#modal1'><i class="material-icons">person</i></a>
        </div>
        @else
        <div class="drop-links left">
            <a class='btn-floating btn-large waves-effect waves-light pulse' href='#modal1'><i class="fa fa-sign-out"></i></a>
        </div>

        @endif

        <a href="#" data-activates="mobile-demo" class="button-collapse right"><i class="material-icons">menu</i></a>

        <!-- start modal1 -->
        @if (Auth::guest())
        <div id="modal1" class="modal">
            <div class="container">
                <div class="modal-content center-align">
                    <h1>تسجيل الدخول</h1>
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                        <div class="input-field">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus id="email" type="email" placeholder="البريد الالكتروني" class="validate">
                        </div>

                        <div class="input-field col s12">
                            <input id="password"  placeholder="الرقم السري" class="validate" type="password" class="form-control" name="password" required>

                        </div>

                        <div class="center">
                            <button class="hvr-sweep-to-left btn waves-effect waves-light" type="submit" name="action">تسجيل دخول</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="center-align">

                            <a href="{{url('/rest')}}" class="hvr-float-shadow">نسيت كلمة السر</a>
                            <br>
                            <a href="{{url('/users/create')}}" class="hvr-float-shadow">تسجيل جديد</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @else
        <div id="modal1" class="modal">
            <div class="container">
                <div class="modal-content center-align">
                    <h5>shabancoooooooooooo</h5>
                    <h1>تسجيل خروج</h1>
                    <form class="form-horizontal" method="POST" action="{{ route('logout') }}">
                            {{ csrf_field() }}
                        <div class="center">
                            <button class="hvr-sweep-to-left btn waves-effect waves-light" type="submit" name="action">تسجيل خروج</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
        @endif

    <!-- start modal1 -->



        <ul id="nav-mobile" class="center hide-on-med-and-down">
            @if (!Auth::guest())
            @if(Auth::user()->users_type==1)
            <li><a href="{{url('/admin')}}">لوحة التحكم</a></li>
            @endif
            @endif
            <li><a href="{{url('/contact')}}"@yield('active_contact')>اتصل بنا</a></li>
            <li><a href="{{url('/subscribe')}}" @yield('active_subscribe')>اشترك الان</a></li>
            <li><a href="{{url('/archive')}}" @yield('active_archive')>ارشيف المناقصات</a></li>
            <li><a href="{{url('/')}}" @yield('active_home')>الرئيسية</a></li>
        </ul>

        <ul class="side-nav" id="mobile-demo" class="right hide-on-large-only">
            <li><a href="{{url('/')}}">الرئيسية</a></li>
            <li><a href="{{url('/archive')}}">ارشيف المناقصات</a></li>
            <li><a href="{{url('/subscribe')}}">اشترك الان</a></li>
            <li><a href="{{url('/contact')}}">اتصل بنا</a></li>
            @if (!Auth::guest())
                @if(Auth::user()->users_type==1)
                    <li><a href="{{url('/admin')}}">لوحة التحكم</a></li>
                @endif
            @endif
        </ul>

        <a href="{{url('/')}}"><img src="{{url('site/img/logo.png')}}" alt="Logo" class="hide-on-med-and-down responsive-img brand-logo left"></a>
    </div>
</nav>
<!-- end navigation -->

@yield('content')




<!-- start footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col l4 s4">
                <h5 class="white-text right-align">تواصل معنا</h5>
                <p class="grey-text text-lighten-4 right-align"><i class="material-icons prefix right">place</i>
                    {{getSetting('address')}}
                </p>
                <p class="grey-text text-lighten-4 right-align"><i class="material-icons prefix right">phone</i>
                    {{getSetting('phone1')}}- {{getSetting('phone2')}}
                </p>
            </div>

            <div class="footer-img col l4 s4">
                <a class="col s12 m6 l6" href="">
                    <img class="responsive-img tooltipped" data-position="top" data-delay="50" data-tooltip="حوالة" src="{{asset('site/img/payment/hewala.png')}}">
                </a>

                <a class="col s12 m6 l6" href="#">
                    <img class="responsive-img tooltipped" data-position="top" data-delay="50" data-tooltip="فوري" src="{{asset('site/img/payment/fawry.png')}}">
                </a>

                <a class="col s12 m6 l6" href="#">
                    <img class="responsive-img tooltipped" data-position="bottom" data-delay="50" data-tooltip="فودافون" src="{{asset('site/img/payment/vodafone.png')}}">
                </a>

                <a class="col s12 m6 l6" href="#">
                    <img class="responsive-img tooltipped" data-position="bottom" data-delay="50" data-tooltip="مندوب" src="{{asset('site/img/payment/mandoop.png')}}">
                </a>

            </div>

            <div class="col l3 s3">
                <h5 class="white-text right-align">عنا</h5>
                <p class="white-text text-lighten-4 right-align">
                    {{getSetting('aboutus')}}


                </p>
            </div>

            <div class="social center-align col l12 s12">
            <a href="{{getSetting('Facebook')}}"><i class="fa fa-facebook tooltipped" data-position="bottom" data-delay="50" data-tooltip="Facebook"></i></a>
            <a href="{{getSetting('Twitter')}}"><i class="fa fa-twitter tooltipped" data-position="bottom" data-delay="50" data-tooltip="Twitter"></i></a>
            <a href="{{getSetting('LinkedIn')}}"><i class="fa fa-linkedin tooltipped" data-position="bottom" data-delay="50" data-tooltip="LinkedIn"></i></a>
            <a href="{{getSetting('Pinterest')}}"><i class="fa fa-pinterest-p tooltipped" data-position="bottom" data-delay="50" data-tooltip="Pinterest"></i></a>
            </div>

        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <p class="grey-text text-lighten-4 center" href="#!">© 2017 Copyright 7DS</p>
        </div>
    </div>

</footer>
<!-- end footer -->








@yield('script')

<!--Import jQuery before materialize.js-->
<script src="{{asset('site/js/jquery-3.2.0.min.js')}}"></script>
<script src="{{asset('site/js/materialize.min.js')}}"></script>
<script src="{{asset('site/js/plugin.js')}}"></script>

</body>
</html>
