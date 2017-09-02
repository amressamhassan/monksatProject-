@extends('layouts.admin')
@section('title')
ارسال رسالة@endsection

@section('content')
    <div class="main-content">
        <div class="panel-content">

            <div class="container">
                <div class="row">
                    <h2 class="main-title-sec">ارسال رسالة</h2><br>

                    <form action="{{url('/sendone')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="input-group col-md-8">
                            <label>الايميل</label>
                            <input name="email" value="{{$mes}}" type="email" class="form-control" placeholder="الايميل">

                        </div>
                        <div class="input-group col-md-8">
                            <label for="exampleInputPassword1">العنوان</label>
                            <input name="title" type="text" class="form-control" placeholder="العنوان">
                        </div>

                        <div class="input-group col-md-8">
                            <label for="exampleInputFile">اضافة رسالة</label>
                            <textarea name="mes" class="form-control" rows="3" placeholder="اكتب رسالة"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success">ارسال</button>
                    </form>

                </div>
            </div>



        </div><!-- Panel Content -->
        <!-- Panel Content -->
    </div>

@endsection