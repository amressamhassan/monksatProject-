@extends('layouts.admin')
@section('title')
    اضافة مناقصة@endsection

@section('content')
    <div class="main-content">
        <div class="panel-content">

            <div class="container">
                <h2 class="main-title-sec">الرسائل</h2><br>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="right">الاسم</th>
                        <th class="right">الايميل</th>
                        <th class="right">رقم التليفون</th>
                        <th class="right" colspan="">الادارة</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($con as $coa)
                    <tr>
                        <td>{{$coa->name}}</td>
                        <td>{{$coa->email}}</td>
                        <td>{{$coa->ph}}</td>
                        <td class="text-center">
                            <a href="{{url('/message_details/'.$coa->id)}}" class="btn btn-warning">اظهار الرسالة</a>
                        </td>
                    </tr>
                    @endforeach
                </table>



            </div>

        </div><!-- Panel Content -->
        <!-- Panel Content -->
    </div>
@endsection