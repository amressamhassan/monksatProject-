@extends('layouts.app')
@section('title')
    المناقصات | الأرشيف
@endsection
@section('active_archive')  class="active"  @endsection

@section('content')

<section class="alert alert-topic">
    <div class="container">
        <div class="row">
            <div class="col s12 center">
                <i class="fa fa-search-plus"></i>
                <h1>{{$item[0]['item.title']}}</h1>
            </div>
        </div>
    </div>
</section>
<!-- end alerts -->

<!-- start Tenders -->
<section class="content-info">
    <div class="container">
        <div class="row">
            <img class="responsiv-img" src="{{url('/public'.Storage::url($item[0]['item.image_url']))}}">

            <div class="col s12 right-align">
                <div class="col s12 tender-box right">
                    <p> جريدة  {{$item[0]['item.newspaper']}}- بتاريخ :  {{$item[0]['item.date']}} </p>
                    <p>التصنيفات :
                        @foreach($item[0]['item.category'] as $category)
                            {{$category}}-
                        @endforeach
                    </p>                  </div>
                <p class="right col s12">
                    <span class="main-info">التفاصيل :</span>
                    <span>{{$item[0]['item.decs']}}</span>
                    <br>
                </p>
            </div>
            <div class="center">
                <a href="{{url('/public'.Storage::url($item[0]['item.image_url']))}}" download>
                <button class="waves-effect waves-light btn">تحميل</button>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- end Tenders -->

@endsection