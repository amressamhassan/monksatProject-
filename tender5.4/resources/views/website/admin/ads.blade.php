@extends('layouts.admin')
@section('title')
    اضافة مناقصة@endsection

@section('content')
<div class="main-content">
    <div class="panel-content">

        <div class="container">
            <div class="row">
                <h2 class="main-title-sec">اضافة اعلان</h2><br>

                <form action="{{url('/news')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="input-group col-md-8">
                        <label>العنوان</label>
                        <input name="title" type="text" class="form-control" placeholder="العنوان">
                    </div>
                    <div class="input-group col-md-8">
                        <label for="exampleInputFile">الاعلان</label>
                        <textarea name="body" class="form-control" rows="3" cols="20" placeholder="اكتب الاعلان"></textarea>
                    </div>
                    <div class="input-group col-md-12">
                        <label for="exampleInputFile">اضافة صورة</label>
                        <input name="image" type="file" id="exampleInputFile">
                        <p class="help-block">يرجي اضافة صورة .</p>
                    </div>
                    <button type="submit" class="btn btn-success">اضافة</button>
                </form>

            </div>
        </div>
    </div><!-- Panel Content -->
</div>

@endsection