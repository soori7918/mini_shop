@extends('user.layouts.user')
@section('style_css')
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
    />

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
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
    <section class="project" >
        <div class="container" >
            <div class="row my-2 ">
                @if($project->project_property()->count())
                    <div class="col-10 bg-info d-flex flex-row rounded p-2 w-auto">
                    @foreach($project->project_property as $property)
                        <small class="text-dark">{{$property->name}},</small>
                    @endforeach
                    </div>
                @endif
                @if($project->project_category->count())
                    <div class="col-2 bg-info d-flex flex-row rounded p-2 mx-5 w-auto">
                    @foreach($project->project_category as $category)
                        <small class="text-dark">{{$category->title}},</small>
                    @endforeach
                    </div>
                @endif
            </div>
            <div class="row d-flex align-items-center justify-content-between">
                <div class="d-flex flex-column">
                <h2 class="text-dark  py-2">{{$project->title}}</h2>
                <h2 class="text-warning d-flex py-2">{{$project->price_label}}{{number_format($project->start_price)}}</h2>
                <small class="py-2"><i class="fa fa-map-marker px-2"></i>{{$project->getProjectCountry()."/".$project->getProjectCity()."/".$project->getProjectLocation()}}</small>
                </div>
                <div class="">
                    <button class="btn btn-success" id="cmd">خروجی pdf</button>
                </div>
            </div>
            <div class="row py-3">
                <!-- Slider main container -->
                <div class="swiper image_gallery">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach($project->photos as $photo)
                        <div class="swiper-slide"><img src="{{url($photo->path)}}" /> </div>
                        @endforeach
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>


                </div>
            </div>
            <div class="row card my-3 shadow-sm rounded-sm p-3">
                <h3 class="py-3">بررسی اجمالی</h3>
                <div class="row">
                    <div class="col-lg-3 col-12">
                        <div class="">
                            <h4 class="py-3">به روز شده در </h4>
                            <span>{{$project->updated_at}}</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-12">
                        <div class="">
                            <h4 class="py-3"><i class="fa fa-bed" aria-hidden="true"></i></h4>
                            <span>{{$project->bedroom}}</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-12">
                        <div class="">
                            <h4 class="py-3"><i class="fa fa-bath" aria-hidden="true"></i></h4>
                            <span>{{$project->bathroom}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row card my-3 shadow-sm rounded-sm p-3">
                <h3 class="py-3">توضیحات مختصر پروژه</h3>
                <div class="row">
                   <p>{{$project->short_description}}</p>
                </div>
                <h3 class="py-3">توضیحات مختصر پروژه</h3>
                <div class="row">
                   <p>{!! $project->description !!}</p>
                </div>
                <div class="row" id="content">
                   <h3 class="text-warning py-3">قیمت و متراژ پروژه :</h3>
                    <div class="col-8 mx-auto">
                    <table id="dataTable"  class="table table-striped  table-hover table-sm">
                        <thead>
                        <tr>
                            <th>تعداد اتاق</th>
                            <th>قیمت</th>
                            <th>مساحت</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($project->metrages as $key=>$item)
                            <tr>
                                <td>
                                    {{ $item->room }}
                                </td>
                                <td>
                                    {{ number_format($item->price) }}
                                </td>
                                <td>
                                    {{ $item->metrage }}
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="row">
                   <h3 class="text-warning py-3">نمونه پلان پروژه ها :</h3>
                    <div class="swiper plan_gallery">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            @foreach($project->plan_gallery as $photo)
                                <div class="swiper-slide"><img src="{{url($photo->path)}}" /> </div>
                            @endforeach
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>

                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>


                    </div>
                </div>
            </div>
            <div class="row card my-3 shadow-sm rounded-sm p-3">
                <div class="d-flex align-items-center justify-content-between">
                    <a class="" >
                        منطقه پروژه
                    </a>
{{--                    <div>--}}
{{--                        <i class="fa fa-arrow-down" aria-hidden="true" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"></i>--}}
{{--                    </div>--}}
                </div>

            <div >
                <div class="row">
                    <div class="col-lg-3 col-12">
                        <h4 class="py-3">آدرس:</h4>
                        <label>{{$project->getProjectCountry()}}</label>
                    </div>
                    <div class="col-lg-3 col-12">
                        <h4 class="py-3">شهر:</h4>
                        <label>{{$project->getProjectCity()}}</label>
                    </div>
                    <div class="col-lg-3 col-12">
                        <h4 class="py-3">منطقه:</h4>
                        <label>{{$project->getProjectLocation()}}</label>
                    </div>
                    <div class="col-lg-3 col-12">
                        <a class="btn btn-primary text-white">نمایش روی نقشه</a>
                    </div>
                </div>
            </div>
            </div>
            <div class="row card my-3 shadow-sm rounded-sm p-3">
                <div class="d-flex align-items-center justify-content-between">
                    <a class="" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        ویژگی های پروژه
                    </a>
{{--                    <div>--}}
{{--                        <i class="fa fa-arrow-down" aria-hidden="true" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"></i>--}}
{{--                    </div>--}}
                </div>

            <div >
                <div class="row py-3">
                    @foreach($project->project_property as $property)
                    <div class="col-lg-2 col-12">
                        <label><i class="fa fa-check text-success px-2"></i> {{$property->name}}</label>
                    </div>
                    @endforeach

                </div>
            </div>
            </div>
            <div class="row card my-3 shadow-sm rounded-sm p-3">
                <div class="d-flex align-items-center justify-content-between">
                   <h4 class="py-3">تماس با ما</h4>
                </div>

            <div>
                <div class="row py-3">
                   <div class="form-group col-lg-4 col-12">
                       <label>نام و نام خانوادگی</label>
                       <input class="form-control" name="name" placeholder="نام و نام خانوادگی">
                   </div>
                    <div class="form-group col-lg-4 col-12">
                       <label>ایمیل</label>
                       <input class="form-control" name="email" placeholder="ایمیل">
                   </div>
                    <div class="form-group col-lg-4 col-12">
                       <label>شماره تماس</label>
                       <input class="form-control" name="phone" placeholder="شماره تماس">
                   </div>
                    <div class="form-group col-12">
                        <label>توضیحات</label>
                        <textarea class="form-control"></textarea>
                    </div>
                </div>
                <div class=" d-flex align-items-center justify-content-center">
                    <button type="submit" class="btn btn-success mx-2">ارسال</button>
                    <button type="submit" class="btn btn-info mx-2">WhatsApp</button>
                </div>
            </div>
            </div>
            <div class="row card my-3 shadow-sm rounded-sm p-3">

                @if($project->agent)
                    <div class="row">
                    <div class="col-lg-3">
                        <img src="{{url($project->agent ? $project->agent->photo : '' )}}" />
                    </div>
                    <div class="col-lg-9">
                        <h3 class="py-3">{{$project->agent->name}}</h3>
                        <div>{!! $project->agent->description !!}</div>
                        <div><i class="fa fa-map-marker px-2 text-success"></i> {!! $project->agent->address !!}</div>
                        <div><i class="fa fa-phone px-2 text-success"></i>{!! $project->agent->phone !!}</div>
                    </div>
                    </div>
                @endif

            </div>
        </div>
    </section>
    </div>
    <!-- PAGE DETAILS AREA END -->


@endsection
@section('script_js')
<script>
    const swiper_slider = new Swiper('.image_gallery', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        // And if we need scrollbar
        scrollbar: {
            el: '.swiper-scrollbar',
        },
    });

    const swiper_plan = new Swiper('.plan_gallery', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        // And if we need scrollbar
        scrollbar: {
            el: '.swiper-scrollbar',
        },
    });
</script>
<script>
    var doc = new jsPDF();
    var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };

    $('#cmd').click(function () {
        doc.fromHTML($('#content').html(), 15, 15, {
            'width': 170,
            'elementHandlers': specialElementHandlers
        });
        doc.save('sample-file.pdf');
    });
</script>
{{--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>--}}

{{--<script type="text/javascript" src="{{asset('user/js/jquery.fancybox-1.3.4.pack.js')}}"></script>--}}
@endsection