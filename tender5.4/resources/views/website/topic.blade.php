@extends('layouts.app')
@section('title')  المناقصات ليوم  @endsection
@section('content')
@section('active_archive')  class="active"  @endsection

<!-- start header -->
    <!-- start header -->
    <!-- start Tenders -->
<head>
    <link rel="stylesheet" href="{{asset('site/css/bootstrap-rtl.min.css')}}"
</head>
      <section class="alert alert-topic">
        <div class="container">
            <div class="row">
                <div class="col s12 center">
                    <i class="fa fa-line-chart"></i>
                    <h1>مناقصات</h1>
                    @if($type=='date')
                    <p>مناقصات يوم {{getdayarb((Carbon\Carbon::parse($date)->format('l')))}} الموافق {{$date}} في جميع الصحف الرسمية (الأخبار - الأهرام - الجمهورية) مقدمة مجانا من مناقصات مصر</p>
                    <p> رجاء العلم ان هذة 30% فقط من المناقصات التي تصدر يوما .. للحصول علي النسخة الكاملة يوميا علي بريدك الألكتروني يمكنك الاشتراك معنا عن طريق <a href="/subscribe">الرابط التالي</a></p>
                    <p>كما يمكنكم الاطلاع علي الأسعار وفترات الأشتراك عن طريق <a href="/subscribe">الرابط التالي</a></p>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- end alerts -->
    <section class="tender-info">
        <div class="container">
            <div class="row">
                
                <div class="right-align">
                    @foreach($item as $i)
                    <div class="col-xs-10 tender-box ">
                         <p>{{$i['item.title']}}</p>
                        <p> جريدة :  <a href="/tendersbynewspaper/{{$i['item.newspaper_id']}}">{{$i['item.newspaper']}}</a> - بتاريخ : {{$i['item.date']}}</p>
                        <p>التصنيفات :
                        @foreach($i['item.category'] as $category)
                            {{$category}}-
                        @endforeach
                        </p>
                        <a href="{{url('/content/'.$i['item.id'])}}">...(التفاصيل)</a>
                    </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </section>
    <br><br><br>
<body>
    <script src="{{asset('site/js/bootstrap.min.js')}}"></script>
</body>

@endsection