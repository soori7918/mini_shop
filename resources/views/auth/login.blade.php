@extends('user.layouts.user')
@section('style_css') @endsection
@section('body')
    <!-- LOGIN AREA START -->
    <div class="ltn__login-area pb-65">
        <div class="container">
         
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="account-login-inner">
                        <form action="{{route('login')}}" method="post" class="ltn__form-box contact-form-box">
                            @csrf
                            <input type="text" name="username" class="text-center" placeholder="*ایمیل">
                            <input type="password" name="password" class="text-center" placeholder="*رمز عبور">
                            <div class="btn-wrapper mt-0">
                                <button class="theme-btn-1 btn btn-block" type="submit">ورود</button>
                            </div>
                            </form>
                    </div>        
                </div>    
            </div>
        </div>
    </div>
    <!-- LOGIN AREA END -->

@endsection
@section('script_js') @endsection