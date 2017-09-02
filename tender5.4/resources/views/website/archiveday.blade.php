@extends('layouts.app')
@section('title')
    المناقصات | الأرشيف
@endsection
@section('active_archive')  class="active"  @endsection
@section('content')
    <!-- start header -->
    <section class="archive-header">
        <div class="bg-archive">
        </div>
    </section>
    <!-- end header -->
<section class="Tenders" style="margin-top:100px">
    <?php $array=[]; ?>
    @for($i=0;$i<count($item);$i++)
        <div class="container">
            <div class="row">
                <div class="col s12 center">
                    <h5> {{$item[$i]['year']}}  أرشيف المناقصات</h5>
                    @foreach($item[$i]['item'] as $it)
                        @if(!(in_array($it->date, $array)))
                            <a href="{{url('/tendersbydate/'.$it->date.'/nointerested')}}">
                                <div class="col s6 m3 box hvr-float-shadow right">
                                    <h6> مناقصات  {{getdayarb((Carbon\Carbon::parse($it->date)->format('l')))}}</h6>
                                    <h6> تاريخ  {{$it->date}}</h6>

                                    <p>فقط من المناقصات والمزايدات الصادرة مقدمة مجانا من مناقصة</p>
                                    <button class="btn waves-effect waves-light" type="submit" name="action">اعرض المناقصات
                                    </button>
                                </div>
                            </a>
                            <?php $array[]=$it->date; ?>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endfor
</section>
    <!-- end Tenders -->

    <br><br><br>
    <br><br><br>
@endsection