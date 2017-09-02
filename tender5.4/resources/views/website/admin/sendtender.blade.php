@extends('layouts.admin')
@section('title')
    ارسال المناقصات
@endsection
@section('content')
    <div class="main-content">
        <div class="panel-content">
            <div class="container">
                <div class="row">
                    <h2 class="main-title-sec">ارسال مناقصات للمشتركين</h2><br>
            @foreach($data as $value)
            <form action="{{url('sendtrener')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="date" value="{{$value[1]}}">
                <input type="hidden" name="day" value="{{$value[0]}}">
                <button type="submit" class="btn btn-warning">ارسال مناقصات يوم {{$value[0]}} الموافق {{$value[1]}}</button>
            </form>
            @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection