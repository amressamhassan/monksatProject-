@extends('layouts.app')
@section('title')  | الرئيسية  @endsection
@section('active_home')  class="active"  @endsection

@section('content')
    <!-- start header -->
    <!-- start header -->
    <section class="header">
        <div class="bg-home">
            <div class="container">
                <div class="row">
                    <div class="col s12 center">
                        <h1>مناقصات دوت كوم</h1>
                        <p>المناقصات لحظة بلحظة</p>
                        <form action="{{url('/tenders')}}">

                        <div class="col s12">
                            <div class="col s5">
                                    {{csrf_field()}}
                                    <div class="input-field">
                                        <input name="search" id="search" type="search" required placeholder="ابحث عن ....">
                                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                    </div>
                            </div>
                            <div class="col s12">
                                <button class="hvr-bounce-to-bottom btn waves-effect waves-light amber" type="submit" name="action">ابحث الان
                                    <i class="material-icons right">search</i>
                                </button>
                            </div>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end header -->

    <!-- start alerts -->
    <section class="alert">
        <div class="container">
            <div class="row">
                <div class="col s12 center">
                    <i class="fa fa-comments-o"></i>
                    <h1>تنبيهات</h1>
                    <p>{{getSetting('role')}}</p>
            </div>
        </div>
    </section>
    <!-- end alerts -->

    <!-- start Tenders -->
    <section class="Tenders">
        <div class="container">
            <div class="row">
                <div class="col s12 center">
                    <h1>مناقصات</h1>
                    @for ($i = 7; $i >= 0; $i--)
                        <a href="{{url('/tendersbydate/'.$date[0][$i].'/all')}}">

                        <div class="col s6 m3 box hvr-float-shadow right">
                        <h6>مناقصات {{$date[1][$i]}}</h6>
                        <span>{{$date[0][$i]}}</span>
                        <p>فقط من المناقصات والمزايدات الصادرة مقدمة مجانا من مناقصة</p>
                      <button class="btn waves-effect waves-light" type="submit" name="action">اعرض المناقصات
                        </button>
                    </div>
                        </a>
                 @endfor

                </div>
            </div>
        </div>
    </section>
    <!-- end Tenders -->

    <!-- start suscripe -->
    <section class="suscripe">
        <div class="container">
            <div class="row">
                <div class="col s12 center">
                    <h3>اخر الاخبار والعروض</h3>
                    <p>لمتابعة اخر الاخبار والعروض قم بالاشتراك معنا</p>
                </div>
                <div class="col s12">
                    <form class="form-horizontal" action="{{url('/subscriptionNews')}}" method="post">
                        {{csrf_field()}}

                        <div class="input-field col s6">
                            <input name="email" id="icon_prefix" type="text" class="validate" placeholder="البريد الالكتروني">
                            <label for="icon_prefix"></label>
                        </div>
                        <button class="btn waves-effect waves-light red" type="submit" >اعرض المناقصات</button>

                    </form>
                </div>

            </div>
        </div>
    </section>
    <!-- end suscripe -->
@endsection
