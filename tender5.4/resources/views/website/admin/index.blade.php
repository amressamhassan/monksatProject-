@extends('layouts.admin')
@section('title')
    الرئيسية

@endsection

@section('mess',$contact)
@section('unact',$usersac)

@section('content')
    <div class="main-content">
        <div class="panel-content">
            <div class="main-content-area">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="widget">
                            <div class="quick-report-widget">
                                <span>عدد المستخدمين</span>
                                <h4>{{$users}}</h4>
                                <i class="fa fa-user red-bg"></i>
                                <h5>عدد المستخدمين الغير مفعلين : {{ $usersunac }}</h5>
                            </div>
                        </div><!-- Widget -->
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="widget">
                            <div class="quick-report-widget">
                                <span>عدد المستخدمين</span>
                                <h4>{{$users}}</h4>
                                <i class="fa fa-user green-bg"></i>
                                <h5>عدد المستخدمين  المفعلين: {{$usersac}}</h5>
                            </div>
                        </div><!-- Widget -->
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="widget">
                            <div class="quick-report-widget">
                                <span>عدد المناقصات</span>
                                <h4 class="number">{{$item}}</h4>
                                <i class="fa fa-area-chart blue-bg"></i>
                            </div>
                        </div><!-- Widget -->
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="widget">
                            <div class="quick-report-widget">
                                <span>عدد الرسائل</span>
                                <h4 class="number">{{$contact}}</h4>
                                <i class="fa fa-envelope-open-o blue-bg"></i>
                            </div>
                        </div><!-- Widget -->
                    </div>
                </div>

            </div>
        </div>
</div>
@endsection

