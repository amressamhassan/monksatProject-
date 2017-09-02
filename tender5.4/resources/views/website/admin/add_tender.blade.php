@extends('layouts.admin')
@section('title')
    اضافة مناقصة@endsection

@section('content')

    <div class="main-content">
        <div class="panel-content">

            <div class="container">
                <div class="row">
                    <h2 class="main-title-sec">اضافة مناقصة</h2><br>

                    <form action="{{url('/item')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="input-group col-md-8">
                            <label>عنوان </label>
                            <input name="title" type="text" class="form-control" placeholder="العنوان">
                        </div>
                        <div class="input-group col-md-8">
                            <label for="exampleInputPassword1">اسم الشركة</label>
                            <input name="company_name" type="text" class="form-control" placeholder="الاسم">
                        </div>

                        <div class="input-group col-md-8">
                            <label for="">الجريدة</label>
                            <select name="newspaper_id" class="form-control">
                                @foreach($newspaper as $newsp)
                                <option value="{{$newsp->id}}">{{$newsp->newspaper}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group col-md-12">
                            <label for="exampleInputFile">اضافة صورة</label>
                            <input name="image" type="file" id="exampleInputFile">
                            <p class="help-block">يرجي اضافة صورة .</p>
                        </div>
                        <div class="input-group col-md-8">
                            <label for="exampleInputFile">اضافة وصف</label>
                            <textarea name="decs" class="form-control" rows="3" cols="20"></textarea>
                        </div>
                        <div class="checkbox">
                            @foreach($category as $cat)
                                <br>
                            <label>
                                <input name="cata[]" type="checkbox" value="{{$cat->id}}"> {{$cat->category}}
                            </label>
                            @endforeach

                        </div>
                        <button type="submit" class="btn btn-success">اضافة</button>
                    </form>

                </div>
            </div>



        </div><!-- Panel Content -->
        <!-- Panel Content -->
    </div>

@endsection