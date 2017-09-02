@extends('layouts.admin')
@section('title')
    اضافة مناقصة@endsection

@section('content')
    <div class="main-content">
        <div class="panel-content">
            <div class="container">
                <h2 class="main-title-sec">الاعدادات</h2><br>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="right" >الاسم</th>
                        <th class="right" >الوصف</th>
                        <th class="right" >تعديل</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($st as $stt)
                    <tr>
                        <td>{{$stt->name}}</td>
                        <td>{{$stt->body}}</td>

                        <td class="text-center">
                            <a href="{{url('/setting/'.$stt->id.'/edit')}}" class="btn btn-warning">
                                <i class="fa fa-pencil-square-o"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div><!-- Panel Content -->
        <!-- Panel Content -->
    </div>
@endsection