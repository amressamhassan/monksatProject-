
@extends('layouts.app')
@section('title')  | الرئيسية  @endsection
@section('active_home')  class="active"  @endsection

@section('content')
<!-- start registation -->
<section class="registation">
    <div class="container">
        <div class="row">
            <div class="col s12 main-reg">
                <h4 class="right">تسجيل جديد</h4><br>
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="input-field col s12 right">
                        <h5 class="right">الاسم</h5>
                        <input  id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="الاسم">
                    </div>
                    <div class="input-field col s12 right">
                        <h5 class="right">الايميل</h5>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="الايميل">
                    </div>
                    <div class="input-field col s12 right">
                        <h5 class="right">الباسورد</h5>
                        <input id="password" type="password" class="form-control" name="password" required placeholder="الباسورد">
                    </div>
                    <div class="input-field col s12 right">
                        <h5 class="right">اعد كتابة الباسورد</h5>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="اعد كتابة الباسورد">
                    </div>
                    <div class="col s12">
                        <button type="submit" class="waves-effect waves-light btn">تسجيل</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
@endsection
