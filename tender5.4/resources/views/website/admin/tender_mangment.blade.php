@extends('layouts.admin')

@section('title')
    اضافة مناقصة@endsection

@section('content')
    <div class="main-content">
        <div class="panel-content">
            @for ($i = 0; $i < count($dte); $i++)


            <div class="container">
                <div class="row">
                    <h2 class="main-title-sec">ادارة المناقصات</h2><br>
                    <h3 class="text-right">مناقصات {{$dte[$i]['year']}}</h3>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="right">عنوان</th>
                            <th class="right">اسم الشركة</th>
                            <th class="right">تاريخ</th>
                            <th class="right">صورة</th>
                            <th class="right">الادارة</th>
                        </tr>
                        </thead>
                        <tbody>
                         @foreach($item[$i] as $items)
                        <tr>
                            <td>{{$items->title}}</td>
                            <td>{{$items->company_name}}</td>
                            <td>{{$items->date}}</td>
                            <td class="text-center">
                                <!-- Button trigger modal -->
                                <img id="alternate-image" class="center-block img-responsive"
                                     src="{{url('/public'.Storage::url($items->image_url))}}" data-toggle="modal" data-target="#myModal">
                            </td>
                            <td class="text-center">
                              <!---<a href="/item/{{$items->id}}/edit"><button class="btn btn-info">تعديل</button></a>--->
                                  <form action="{{url('/item/'.$items->id)}}" method="post" >
                                      {{csrf_field()}}
                                      {{method_field('DELETE')}}
                                      <button type="submit" class="btn btn-danger">حذف</button>
                                  </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>


                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <img id="show" class="img-responsive" src="" style="width: 100%;height: 500px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>
                @endfor
        </div><!-- Panel Content -->
        <!-- Panel Content -->
    </div>
@endsection
