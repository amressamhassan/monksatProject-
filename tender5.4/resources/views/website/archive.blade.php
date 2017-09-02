@extends('layouts.app')
@section('title')
    المناقصات | الأرشيف
@endsection
@section('active_archive')  class="active"  @endsection
@section('content')
<section class="archive-header">
    <div class="bg-archive">
    </div>
</section>
<section class="Tenders" style="margin-top:100px">

<?php $array=[]; ?>

@for($i=0;$i<count($item);$i++)
    <div class="container">
        <div class="row">
            <div class="col s12 center">
                <h5> {{$item[$i]['year']}}  أرشيف المناقصات</h5>
                @foreach($item[$i]['item'] as $it)
                    @if(!(in_array(Carbon\Carbon::parse($it->date)->format('m'), $array)))
                        <a href="{{url('/archive/'.Carbon\Carbon::parse($it->date)->format('Y-m'))}}">
                        <div class="col s6 m3 box hvr-float-shadow right">
                            <h6>مناقصات شهر {{(int)Carbon\Carbon::parse($it->date)->format('m')}}</h6>
                            <p>فقط من المناقصات والمزايدات الصادرة مقدمة مجانا من مناقصة</p>
                            <button class="btn waves-effect waves-light" type="submit" name="action">اعرض المناقصات
                            </button>
                        </div>
                        </a>
                        <?php $array[]=Carbon\Carbon::parse($it->date)->format('m'); ?>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endfor

</section>

<br><br><br>
<br><br><br>
@endsection