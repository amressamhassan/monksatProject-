@extends('layouts.admin')
@section('title')
    اضافة مناقصة@endsection

@section('content')

    <div class="main-content">
        <div class="panel-content">

            <div class="container">
                <div class="row">
                    <h2 class="main-title-sec">اضافة وصف</h2><br>

                    <form action="{{url('/category')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="input-group col-md-8">
                            <label>الوصف</label>
                            <input name="category" type="text" class="form-control" placeholder="الوصف">
                        </div>
                        <div class="col-xs-12 col-xs-offset-2 text-center">
                            <button type="submit" class="btn btn-success">اضافة وصف</button>
                        </div>
                    </form>

                </div>
            </div>



        </div><!-- Panel Content -->
        <!-- Panel Content -->
    </div>

@endsection