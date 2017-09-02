@extends('layouts.admin')
@section('title')
    اضافة بلد
@endsection

@section('content')

    <div class="main-content">
        <div class="panel-content">

            <div class="container">
                <div class="row">
                    <h2 class="main-title-sec">اضافة بلد</h2><br>

                    <form action="{{url('/setting/'.$st->id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="input-group col-md-8">
                            <label>{{$st->name}}</label>
                        </div>
                        <div class="input-group col-md-8">
                            <input name="body" type="text" class="form-control" value="{{$st->body}}" placeholder="{{$st->body}}">
                        </div>
                        <div class="col-xs-12 col-xs-offset-2 text-center">
                            <button type="submit" class="btn btn-success">اضافة</button>
                        </div>
                    </form>

                </div>
            </div>



        </div><!-- Panel Content -->
        <!-- Panel Content -->
    </div>

@endsection