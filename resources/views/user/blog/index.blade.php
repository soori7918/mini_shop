@extends('user.layouts.user')
@section('style_css') @endsection
@section('body')

    <div class="body">
        <section class="blog py-3">
            <div class="container">
                <div class="row">


                    @foreach($items as $item)
                        @if($item->articles()->count())
                            <div class="row shadow-sm rounded-sm my-3 py-2">
                            <div class="col-lg-3 bg-white my-2 d-flex align-items-center justify-content-center">
                                <div class="section_title py-5">
                                    <h3 class="py-3">{{$item->name}}</h3>
                                    <div class="section_title_border"></div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                        <div class="row">
                            @foreach($item->articles as $article)
                                <div class="col-lg-4 col-12">
                                    <a href="{{route('user.blog.show',$article->slug)}}">
                                        <div class="project_item bg-white shadow-sm rounded-sm my-2">
                                            <div class="project_image position-relative">
                                                <img src="{{$article->photo?url($article->photo):url('assets/user/pic/blog1.jpg')}}" alt="{{$article->title}}" width="100%" height="100%" />
                                                <div class="project_image_detail "></div>
                                                <div class="project_image_detail_1 text-white d-flex align-items-center justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        {{--                                        <i class="fa fa-map-marker  px-2"></i>--}}
                                                        {{--                                        <small>{{$article->getProjectCountry()."/".$article->getProjectCity()."/".$project->getProjectLocation()}}</small>--}}
                                                    </div>
                                                    <div class="d-flex align-items-center  justify-content-center">
                                                        <i class="fa fa-eye small px-2"></i>
                                                        <small>{{number_format($article->seen)}}</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="project_content p-2">
                                                <div class="project_content_description d-flex flex-column">
                                                    <strong class="py-2">{{$article->title}}</strong>
                                                    {{--                                    <span class="py-2 text-warning font-weight-bold">{{$article->price_label}} $ {{$project->start_price}}</span>--}}
                                                    {{--                                    <p>{{ str_limit($article->short_description, 30)}}</p>--}}
                                                </div>
                                                <div class="project_content_footer py-2 d-flex align-items-center justify-content-between">

                                                    <div class="project_content_footer_author d-flex align-items-center justify-content-between">
                                                        <div class="icon d-flex">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                        <span class="mx-2">{{$article->user->first_name}}</span>

                                                    </div>

                                                    <div class="project_content_footer_icon d-flex align-items-center justify-content-center">
                                                        <i class="far fa-calendar-alt px-2"></i>{{my_jdate($article->created_at,'Y/m/d')}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </section>
    </div>
    <!-- BLOG AREA START -->
    <!-- BLOG AREA END -->

@endsection
@section('script_js') @endsection