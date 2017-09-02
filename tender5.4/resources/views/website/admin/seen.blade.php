@extends('layouts.admin')
@section('title')
    اضافة مناقصة@endsection

@section('content')



    <div class="main-content">
        <div class="panel-content">

            <div class="container">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="right">اليوم</th>
                        <th class="right">تاريخ</th>
                        <th class="right">عدد المشاهدة</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($seen as $use)
                        <tr>
                            <td class="right">{{getdayarb(Carbon\Carbon::parse($use->date)->format('l'))}}</td>
                            <td class="right">{{$use->date}}</td>
                            <td class="right">{{$use->seen}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div><!-- Panel Content -->
        <!-- Panel Content -->
    </div>

@endsection