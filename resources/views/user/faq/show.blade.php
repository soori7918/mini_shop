@extends('user.layouts.user')
@section('style_css') @endsection
@section('body')

    <!-- FAQ AREA START (faq-2) (ID > accordion_2) -->
    <div class="ltn__faq-area mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__faq-inner ltn__faq-inner-2">
                        <div id="accordion_2">
                            @foreach($faqs as $key=>$faq)
                            <!-- card -->
                            <div class="card">
                                <h6 class="collapsed ltn__card-title" data-toggle="collapse" data-target="#faq-item-{{$key}}-{{$faq->id}}" aria-expanded="false">
                                    {{$faq->question}}
                                </h6>
                                <div id="faq-item-{{$key}}-{{$faq->id}}" class="collapse" data-parent="#accordion_2">
                                    <div class="card-body">
                                        <p>
                                            {{$faq->answer}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQ AREA START -->

@endsection
@section('script_js') @endsection