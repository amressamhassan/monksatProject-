@extends('layouts.app')
@section('title') المناقصات | الاشتراك @endsection
@section('active_subscribe')  class="active"  @endsection

@section('style')
    <link rel="stylesheet" href="{{asset('site/css/about.css')}}">
    @endsection
@section('content')


    <!-- start header -->
    <section class="subscribe-header">
        <div class="bg-header">

            <div class="container">
                <div class="row">
                    <div class="col s12 right-align">
                        <h1>اختر باقتك</h1>
                        <p>اختر ما يناسبك من هذه الباقات</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- end header -->

    <!-- start subscribe -->
    <section class="subscribe center-align">
        <div class="container">
            <div class="row">
                <h1>اختر الباقة المناسبة</h1>

                <div class="col s12 m3">
                    <div class="box hvr-float-shadow">
                        <p>الذهبية</p>
                        <b>350 </b>
                        <p class="box-box">شهر 12</p>
                        <p>فقط من المناقصات</p>
                        <p>عبر الموقع فقط</p>
                        <p>الصفحة الرسمية فقط</p>
                        <p>لا يوجد ضمان تشغيل</p>
<form method="post" action="{{url('/subcribetion')}}" enctype="multipart/form-data">
{{csrf_field()}}
                        <input type="hidden" value="3" name="type">
                        <button class="btn waves-effect waves-light" type="submit" name="action">اشتري الان
                            <i class="material-icons right">trending_flat</i>
                        </button>
</form>

                    </div>
                </div>


                <div class="col s12 m3">
                    <div class="box hvr-float-shadow">
                        <p>البرونزية</p>
                        <b>200 </b>
                        <p class="box-box"> 6/شهر </p>
                        <p>فقط من المناقصات</p>
                        <p>عبر الموقع فقط</p>
                        <p>الصفحة الرسمية فقط</p>
                        <p>لا يوجد ضمان تشغيل</p>
 <form method="post" action="{{url('/subcribetion')}}" enctype="multipart/form-data">
    {{csrf_field()}}
                        <input type="hidden" value="2" name="type">
                        <button class="btn waves-effect waves-light" type="submit" name="action">اشتري الان
                            <i class="material-icons right">trending_flat</i>
                        </button>
</form>

                    </div>
                </div>


                <div class="col s12 m3">
                    <div class="box hvr-float-shadow">
                        <p>الفضية</p>
                        <b>100 </b>
                        <p class="box-box"> 3/ شهر </p>
                        <p>فقط من المناقصات</p>
                        <p>عبر الموقع فقط</p>
                        <p>الصفحة الرسمية فقط</p>
                        <p>لا يوجد ضمان تشغيل</p>
 <form method="post" action="{{url('/subcribetion')}}" enctype="multipart/form-data">
    {{csrf_field()}}
                        <input type="hidden" value="1" name="type">
                        <button class="btn waves-effect waves-light" type="submit" name="action">اشتري الان
                            <i class="material-icons right">trending_flat</i>
                        </button>
</form>

                    </div>
                </div>


                <div class="col s12 m3">
                    <div class="box hvr-float-shadow">
                        <p>المجانية</p>
                        <b>مجانا </b>
                        <p class="box-box"> 0/شهر </p>
                        <p>فقط من المناقصات</p>
                        <p>عبر الموقع فقط</p>
                        <p>الصفحة الرسمية فقط</p>
                        <p>لا يوجد ضمان تشغيل</p>
<form method="post" action="{{url('/subcribetion')}}" enctype="multipart/form-data">
{{csrf_field()}}
                        <input type="hidden" value="0" name="type">

                        <button class="btn waves-effect waves-light" type="submit" name="action">اشتري الان
                            <i class="material-icons right">trending_flat</i>
                        </button>
</form>
                    </div>
                </div>

        </div>
    </div>
</section>
    <!-- end subscribe -->
@endsection
