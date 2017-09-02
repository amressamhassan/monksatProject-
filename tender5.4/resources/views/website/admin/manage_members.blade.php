@extends('layouts.admin')
@section('title')
    اضافة مناقصة@endsection

@section('content')



<div class="main-content">
    <div class="panel-content">

        <div class="container">
            <h2 class="main-title-sec">ادارة المشتركين</h2><br>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="right">اسم المشترك</th>
                    <th class="right">الايميل</th>
                    <th class="right">اسم الشركة</th>
                    <th class="right">العنوان</th>
                    <th class="right">تليفون</th>
                    <th class="right">فاكس</th>
                    <th class="right">تاريخ</th>
                    <th class="right">الادارة</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user as $use)
                <tr>
                    <td>{{$use->name}}</td>
                    <td>{{$use->email}}</td>
                    <td>{{$use->company_name}}</td>
                    <td>{{$use->company_address}}</td>
                    <td>{{$use->phone}}</td>
                    <td>{{$use->fax}}</td>
                    <td>{{$use->end_data}}</td>
                    <td class="text-center">
                        @if($act[0]==2)
                            <a href="{{url('/actvie/'.$use->id)}}" > <button  class="btn btn-warning">تفعيل</button></a>
                        @endif
                        <a href="{{url('/mes/'.$use->email)}}" class="btn btn-danger"><i class="fa fa-envelope"></i></a>
                    </td>
                </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection