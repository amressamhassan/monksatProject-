@extends('layouts.app')
@section('title')
    المناقصات | اشترك
@endsection
@section('active_subscribe')  class="active"  @endsection

@section('content')


    <!-- start header -->
    <!-- start registation -->
<section class="registation">
    <form action="{{url('/subscribe')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="container">
        <div class="row">
            <div class="col s12 main-reg">
                <h4 class="right">ترقية الاشتراك</h4><br>
                <input type="hidden" name="type" value="{{$type}}">
                    <div class="input-field col s12 right">
                        <h5 class="right">معلومات الدخول</h5>
                      @if (!Auth::guest())
                        <input name="email" id="icon_prefix"
                               disabled
                               type="text" class="validate"
                               value="{{Auth::user()->email}}"
                               placeholder="{{Auth::user()->email}}">
                    @else
                    <input name="email" id="icon_prefix"
                           type="text" class="validate"
                           value=""
                           placeholder="البريد الالكترونى">
                  @endif
                        <p class="right">هذا هو البريد الالكتروني الأساسي المسجل لدينا . رجاء التأكد من انة البريد الصحيح قبل متابعة الأشتراك -</p>
                    </div>
            </div>
            <div class="col s12 main-reg">
                <h5 class="right">البيانات الاساسية</h5>
                    <div class="input-field col s12 right">
                        <input name="company_name" id="icon_prefix" type="text" class="validate" placeholder="اسم الشركة">
                    </div>
                    <div class="input-field col s12 right">
                        <input name="name" id="icon_prefix" type="text" class="validate" placeholder=" الشخص المسئول">
                    </div>
                    <div class="input-field col s12 right">
                        <input name="company_address" id="icon_prefix" type="text" class="validate" placeholder="عنوان الشركة">
                    </div>
                    <div class="input-field col s12 m6">
                    </div>
                    <div class="input-field col s12 m6">
                        <select name="country">
                            <optgroup label="بلد">
                                <option selected >بلد</option>
                                @foreach($country as $value)
                                <option value="{{$value->id}}">{{$value->country}}</option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>



                    <div class="input-field col s12 m6">
                        <input name="phone" id="icon_prefix" type="tel" class="validate" placeholder="الموبايل">
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="Tphone" id="icon_prefix" type="tel" class="validate" placeholder="الهاتف">
                    </div>

                    <div class="input-field col s12">
                        <input name="fax" id="icon_prefix" type="tel" class="validate" placeholder="رقم الفاكس">
                    </div>
                <p class="right">رجاء التأكد من صحة المعلومات المقدمة لنتمكن من تفعيل اشترك سيادتكم -</p>
            </div>

            <h5 class="right">المجموعات السلعية</h5><br>
            <div class="col s12 main-reg">
                @foreach($cate as $value)
                    <div class="input-field col s12 m4 right-align">
                        
                         <span class="category-reg col s12">
                            <input name="category[]" value="{{$value->id}}" type="checkbox" id="test.{{$value->id}}"/>
                            <label for="test.{{$value->id}}">{{$value->category}}</label>
                       </span>
                    </div>
                @endforeach
                    <p class="right" style="color: rgb(169, 68, 66); display: block;" id="cat_not_slected">رجاء تحديد مجموعة سلعية واحدة علي الأقل -</p>
            </div>
            <div class="col s12 main-reg">

                    <div class="col s12">
                        <button type="submit" class="waves-effect waves-light btn">اشتراك</button>
                    </div>
            </div>
        </div>
    </div>
    </form>
</section>
    <!-- end Tenders -->

    <br><br><br>
    <br><br><br>
@endsection