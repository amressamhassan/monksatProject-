
@extends('layouts.app')
@section('title')  | الرئيسية  @endsection
@section('active_home')  class="active"  @endsection

@section('content')
    <!-- start registation -->
    <section class="registation">
        <div class="container">
            <div class="row">
                <div class="col s12 main-reg">
                    <h4 class="center">اعادة الباسورد</h4><br>
                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <div class="input-field col s12 right">
                            <h5 class="center">الايميل</h5>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="الايميل">
                        </div>

                        <div class="col s12">
                            <button type="submit" class="waves-effect waves-light btn"><i class="material-icons center">email</i> ارسال</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
