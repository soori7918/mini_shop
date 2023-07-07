@extends('user.layouts.user')
@section('style_css') @endsection
@section('body')

    <!-- ABOUT US AREA START -->
    <div class="ltn__about-us-area pb-115">
        <div class="container">
            <div class="row">
                @if(count($items))
                    @foreach($items as $key=>$service)
                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 p-1">
                            @include('user.includes.serviceCard',['service'=>$service])
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-danger col-md-8 mx-auto text-center">
                        یافت نشد!
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- ABOUT US AREA END -->


@endsection
@section('script_js') @endsection