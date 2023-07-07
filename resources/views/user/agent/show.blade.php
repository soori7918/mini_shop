@extends('user.layouts.user')
@section('style_css')
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
    />

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <style>
        .swiper {
            width: 100%;
            height: 500px;
        }
        .swiper-slide img{
            border-radius: 20px;
            width: 100%;
            height: 100%;
        }
        .property_list{
            display: flex;
        }

    </style>

@endsection
@section('body')


    <!-- PAGE DETAILS AREA START (portfolio-details) -->
    <div class="body">
        <section class="project ">
            <div class="container">

                <div class="row card my-4shadow-sm rounded-sm p-3">
                    <div class="image_agent_card">
                        <img src="{{url($agent->photo)}}"  />
                    </div>
                    <div class="row">
                        <div class="col-lg-3 py-3 col-12">
                            <div class="">
                                <label>نام و نام خانوادگی :</label>
                                <p>{{$agent->name}}</p>
                            </div>
                        </div>
                        <div class="col-lg-12 py-3 col-12">
                            <div class="">
                                <label>توضیحات : </label>
                                <p>{!! $agent->description !!}</p>
                            </div>
                        </div>
                        <div class="col-lg-3 py-3 col-12">
                            <div class="">
                                <label>آدرس :</label>
                                <p>{!! $agent->address !!}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
    <!-- PAGE DETAILS AREA END -->


@endsection
@section('script_js')

@endsection