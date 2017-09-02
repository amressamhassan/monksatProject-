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

                <form action="{{url('/country')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="input-group col-md-8">
                        <label>اسم البلد</label>
                        <input name="country" type="text" class="form-control" placeholder="البلد">
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