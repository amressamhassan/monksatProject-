@extends('layouts.admin')
@section('title')
    اضافة مناقصة@endsection

@section('content')
    <div class="main-content">
        <div class="panel-content">

            <div class="container">
                <h2 class="main-title-sec">تفاصيل الرسالة</h2><br>
                <div class="panel-info">
                    <h4>اسم الشركة</h4>
                    <p>{{$con->company}}</p>
                </div>

                <div class="panel-info">
                    <h4>الاسم</h4>
                    <p>{{$con->name}}</p>
                </div>

                <div class="panel-info">
                    <h4>نص الرسالة</h4>
                    <p>{{$con->mes}}</p>
                </div>
                <div class="panel-info">
                    <h4>الايميل</h4>
                    <p>{{$con->email}}</p>
                </div>
                <div class="panel-info">
                    <h4>رقم التلفون</h4>
                    <p>{{$con->ph}}</p>
                </div>

                <div class="panel-info">
                    <h4> عنوان </h4>
                    <p>{{$con->address}}</p>
                </div>
                <div class="panel-info">
                    <a  href="{{url('/mes/'.$con->email)}}" class="btn btn-success">رد</a>
                </div>

            </div>

        </div><!-- Panel Content -->
        <!-- Panel Content -->
    </div>
@endsection