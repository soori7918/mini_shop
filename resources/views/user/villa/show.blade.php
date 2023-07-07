@extends('user.layouts.user')
@section('style_css')
    <style>
        .ltn__img-slide-item-4 img {
            width: 100%;
            height: 390px;
            object-fit: cover;
        }

        .bg-overlay-white-30:before {
            background: rgba(0, 0, 0, 0.3);
        }

        .ltn__breadcrumb-inner h3,
        .ltn__breadcrumb-inner li,
        .ltn__breadcrumb-inner li > a {
            color: #fff !important;
        }
        .ltn__shop-details-area
        {
            background: var(--section-bg-1);
            padding-top: 40px;
        }
        .ltn__breadcrumb-area
        {
            margin-bottom: 0;
        }
    </style>
@endsection
@section('body')
    <!-- The Modal/Lightbox -->
{{--    <div class="line_box">--}}
{{--        @if(count($item->in_gallery)>0)--}}
{{--            <div id="myModal1" class="modal">--}}
{{--                <span class="close cursor" onclick="closeModal(1)">&times;</span>--}}
{{--                <div class="modal-content">--}}

{{--                    <div class="org_box">--}}
{{--                        @foreach($item->in_gallery as $key=>$gallery_in)--}}
{{--                            <div class="mySlides mySlides1">--}}
{{--                                <div class="numbertext">{{$key+1}} / {{count($item->in_gallery)}}</div>--}}
{{--                                <img src="{{$gallery_in->path?url($gallery_in->path):''}}" style="width:100%">--}}
{{--                            </div>--}}
{{--                    @endforeach--}}

{{--                    <!-- Next/previous controls -->--}}
{{--                        <a class="prev" onclick="plusSlides(1,-1)">&#10094;</a>--}}
{{--                        <a class="next" onclick="plusSlides(1,1)">&#10095;</a>--}}
{{--                    </div>--}}

{{--                    <!-- Caption text -->--}}
{{--                    <div class="caption-container">--}}
{{--                        <!-- Thumbnail image controls -->--}}
{{--                        @foreach($item->in_gallery as $key=>$gallery_in)--}}

{{--                            <div class="column">--}}

{{--                                <img class="demo" src="{{$gallery_in->path?url($gallery_in->path):''}}"--}}
{{--                                     onclick="currentSlide(1,{{$key+1}})" alt="Nature">--}}
{{--                            </div>--}}
{{--                        @endforeach--}}

{{--                    </div>--}}
{{--                </div>--}}


{{--            </div>--}}
{{--        @endif--}}
{{--        @if(count($item->out_gallery)>0)--}}
{{--            <div id="myModal2" class="modal">--}}
{{--                <span class="close cursor" onclick="closeModal(2)">&times;</span>--}}
{{--                <div class="modal-content">--}}

{{--                    <div class="org_box">--}}
{{--                        @foreach($item->out_gallery as $key=>$gallery_out)--}}
{{--                            <div class="mySlides mySlides2">--}}
{{--                                <div class="numbertext">{{$key+1}} / {{count($item->out_gallery)}}</div>--}}
{{--                                <img src="{{$gallery_out->path?url($gallery_out->path):''}}" style="width:100%">--}}
{{--                            </div>--}}
{{--                    @endforeach--}}

{{--                    <!-- Next/previous controls -->--}}
{{--                        <a class="prev" onclick="plusSlides(2,-1)">&#10094;</a>--}}
{{--                        <a class="next" onclick="plusSlides(2,1)">&#10095;</a>--}}
{{--                    </div>--}}

{{--                    <!-- Caption text -->--}}
{{--                    <div class="caption-container">--}}
{{--                        <!-- Thumbnail image controls -->--}}
{{--                        @foreach($item->out_gallery as $key=>$gallery_out)--}}

{{--                            <div class="column">--}}

{{--                                <img class="demo" src="{{$gallery_out->path?url($gallery_out->path):''}}"--}}
{{--                                     onclick="currentSlide(2,{{$key+1}})" alt="Nature">--}}
{{--                            </div>--}}
{{--                        @endforeach--}}

{{--                    </div>--}}
{{--                </div>--}}


{{--            </div>--}}
{{--        @endif--}}
{{--        @if(count($item->plan_gallery)>0)--}}
{{--            <div id="myModal3" class="modal">--}}
{{--                <span class="close cursor" onclick="closeModal(3)">&times;</span>--}}
{{--                <div class="modal-content">--}}

{{--                    <div class="org_box">--}}
{{--                        @foreach($item->plan_gallery as $key=>$gallery_plan)--}}
{{--                            <div class="mySlides mySlides3">--}}
{{--                                <div class="numbertext">{{$key+1}} / {{count($item->plan_gallery)}}</div>--}}
{{--                                <img src="{{$gallery_plan->path?url($gallery_plan->path):''}}" style="width:100%">--}}
{{--                            </div>--}}
{{--                    @endforeach--}}

{{--                    <!-- Next/previous controls -->--}}
{{--                        <a class="prev" onclick="plusSlides(3,-1)">&#10094;</a>--}}
{{--                        <a class="next" onclick="plusSlides(3,1)">&#10095;</a>--}}
{{--                    </div>--}}

{{--                    <!-- Caption text -->--}}
{{--                    <div class="caption-container">--}}
{{--                        <!-- Thumbnail image controls -->--}}
{{--                        @foreach($item->plan_gallery as $key=>$gallery_plan)--}}

{{--                            <div class="column">--}}

{{--                                <img class="demo" src="{{$gallery_plan->path?url($gallery_plan->path):''}}"--}}
{{--                                     onclick="currentSlide(3,{{$key+1}})" alt="Nature">--}}
{{--                            </div>--}}
{{--                        @endforeach--}}

{{--                    </div>--}}
{{--                </div>--}}


{{--            </div>--}}
{{--        @endif--}}
{{--        @if(count($item->photos)>0)--}}
{{--            <div id="myModal0" class="modal">--}}
{{--                <span class="close cursor" onclick="closeModal(0)">&times;</span>--}}
{{--                <div class="modal-content">--}}

{{--                    <div class="org_box">--}}
{{--                        @foreach($item->photos as $key=>$gallery_photo)--}}
{{--                            <div class="mySlides mySlides0">--}}
{{--                                <div class="numbertext">{{$key+1}} / {{count($item->photos)}}</div>--}}
{{--                                <img src="{{$gallery_photo->path?url($gallery_photo->path):''}}" style="width:100%">--}}
{{--                            </div>--}}
{{--                    @endforeach--}}

{{--                    <!-- Next/previous controls -->--}}
{{--                        <a class="prev" onclick="plusSlides(0,-1)">&#10094;</a>--}}
{{--                        <a class="next" onclick="plusSlides(0,1)">&#10095;</a>--}}
{{--                    </div>--}}

{{--                    <!-- Caption text -->--}}
{{--                    <div class="caption-container">--}}
{{--                        <!-- Thumbnail image controls -->--}}
{{--                        @foreach($item->photos as $key=>$gallery_photo)--}}

{{--                            <div class="column">--}}

{{--                                <img class="demo" src="{{$gallery_photo->path?url($gallery_photo->path):''}}"--}}
{{--                                     onclick="currentSlide(0,{{$key+1}})" alt="Nature">--}}
{{--                            </div>--}}
{{--                        @endforeach--}}

{{--                    </div>--}}
{{--                </div>--}}


{{--            </div>--}}
{{--        @endif--}}
{{--    </div>--}}
{{--    @if(count($item->photos))--}}
{{--        @section('bg_head')--}}
{{--            {{url($item->photos[0]->path)}}--}}
{{--        @endsection--}}
{{--    @endif--}}
{{--@section('gallery_villa')--}}
{{--    <div class="all_pic_box tab_pic_box">--}}
{{--        @if(count($item->photos)>0)--}}
{{--            <span onclick="openModal(0);currentSlide(0,1)"><i class="far fa-images"></i> گالری <span class="count_img">{{count($item->photos)}}</span> </span>--}}
{{--        @endif--}}
{{--        @if(count($item->in_gallery)>0)--}}
{{--            <span onclick="openModal(1);currentSlide(1,1)"><i class="far fa-images"></i> نمای داخلی <span class="count_img">{{count($item->in_gallery)}}</span>  </span>--}}
{{--        @endif--}}
{{--        @if(count($item->out_gallery)>0)--}}
{{--            <span onclick="openModal(2);currentSlide(2,1)"><i class="far fa-images"></i> نمای خارجی <span class="count_img">{{count($item->out_gallery)}}</span> </span>--}}
{{--        @endif--}}
{{--        @if(count($item->plan_gallery)>0)--}}
{{--            <span onclick="openModal(3);currentSlide(3,1)"><i class="far fa-images"></i> پلن ها <span class="count_img">{{count($item->plan_gallery)}}</span> </span>--}}
{{--        @endif--}}

{{--    </div>--}}
{{--@endsection--}}

<!-- SHOP DETAILS AREA START -->
<div class="ltn__shop-details-area pb-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                @if($item->sale_status=='active')
                    <span class="sale_status_span"><i class="fas fa-dollar-sign ml-1"></i> فروخته شد</span>
                @endif
                <div class="ltn__shop-details-inner ltn__page-details-inner mb-60">
                    <!-- IMAGE SLIDER AREA START (img-slider-3) -->
                    <div class=" ltn__img-slider-area">
                        <div class="container-fluid all_pic_box">
                            <div class="row ltn__image-slider-5-active slick-arrow-1 slick-arrow-1-inner ltn__no-gutter-all">
                                @foreach($item->photos as $photo)
                                    <div class="col-lg-12">
                                        <div class="ltn__img-slide-item-4">
                                            <a href="{{$photo->path?url($photo->path):url('assets/user/pic/slider_33.jpg')}}" data-rel="lightcase:myCollection">
                                                <img src="{{$photo->path?url($photo->path):url('assets/user/pic/slider_33.jpg')}}" alt="{{$item->name}}">
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <ul class="tab_pic_box">
                                @if(count($item->in_gallery)>0)
                                    <li>
                                        <a class="gallery" href="{{url($item->in_gallery[0]->path)}}" data-rel="lightcase:myCollection_in"><i class="far fa-images"></i> نمای داخلی <span class="count_img">{{count($item->in_gallery)}}</span> </a>
                                        @foreach($item->in_gallery as $key_in=> $in)
                                            @if($key_in>0)
                                                <a hidden href="{{$in->path?url($in->path):url('assets/user/pic/slider_33.jpg')}}" data-rel="lightcase:myCollection_in">
                                                    <img src="{{$in->path?url($in->path):url('assets/user/pic/slider_33.jpg')}}" alt="{{$item->name}}">
                                                </a>
                                            @endif
                                        @endforeach
                                    </li>
                                @endif
                                @if(count($item->out_gallery)>0)
                                        <li>
                                            <a class="gallery" href="{{url($item->out_gallery[0]->path)}}" data-rel="lightcase:myCollection_out"><i class="far fa-images"></i> نمای داخلی <span class="count_img">{{count($item->out_gallery)}}</span> </a>
                                            @foreach($item->out_gallery as $key_out=>$out)
                                                @if($key_out>0)
                                                    <a hidden href="{{$out->path?url($out->path):url('assets/user/pic/slider_33.jpg')}}" data-rel="lightcase:myCollection_out">
                                                        <img src="{{$out->path?url($out->path):url('assets/user/pic/slider_33.jpg')}}" alt="{{$item->name}}">
                                                    </a>
                                                @endif
                                            @endforeach
                                        </li>
                                @endif
                                @if(count($item->plan_gallery)>0)
                                        <li>
                                            <a class="gallery" href="{{url($item->plan_gallery[0]->path)}}" data-rel="lightcase:myCollection_plan"><i class="far fa-images"></i> نمای داخلی <span class="count_img">{{count($item->plan_gallery)}}</span> </a>
                                            @foreach($item->plan_gallery as $key_plan=>$plan)
                                                @if($key_plan>0)
                                                    <a hidden href="{{$plan->path?url($plan->path):url('assets/user/pic/slider_33.jpg')}}" data-rel="lightcase:myCollection_plan">
                                                        <img src="{{$plan->path?url($plan->path):url('assets/user/pic/slider_33.jpg')}}" alt="{{$item->name}}">
                                                    </a>
                                                @endif
                                            @endforeach
                                        </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <!-- IMAGE SLIDER AREA END -->
                    <div class="box_show_villa">
                        <h4 class="title-2">آدرس ملک</h4>
                        <label class="w-100 text-right mb-2"><span class="ltn__secondary-color"><i
                                        class="flaticon-pin"></i></span> {{$item->state?$item->state->name:''}}{{$item->city?' , '.$item->city->name:''}}{{$item->zone?' , '.$item->zone->name:''}}
                        </label>
                        <div class="form-group">
                            <div class="google-map" id="google-map-area" style="width:100%;height:250px"></div>
                        </div>
                    </div>

                    <div class="box_show_villa">
                        <h4 class="title-2">توضیحات ملک</h4>
                        {!! $item->body !!}
                    </div>
                    <div class="box_show_villa">
                        <h4 class="title-2">جزئیات ملک</h4>
                        <div class="property-detail-info-list clearfix mb-20 ltn__blog-meta">
                        <ul class="ul_w50">
                            <li><label> <i class="flaticon-square-shape-design-interface-tool-symbol mr-2"></i>متراژ: </label> <span>{{$item->area}} متر </span></li>
                            <li><label><i class="flaticon-bed mr-2"></i>خواب: </label> <span>{{$item->room_num}}</span></li>
                            <li><label><i class="flaticon-clean mr-2"></i>سرویس بهداشتی: </label> <span>{{$item->number_of_wc}}</span></li>
                            <li><label><i class="fas fa-sort-amount-up mr-2"></i>سن بنا: </label> <span>{{$item->built_year}}</span></li>
                            <li><label><i class="fas fa-chair mr-2"></i>فرنیش: </label> <span>{{$item->furniture==1?'دارد':'ندارد'}}</span></li>
                        </ul>
                        <ul class="ul_w50">
                            <li><label><i class="iconify mr-2" data-icon="ic-round-balcony" data-inline="false"></i>بالکن/تراس: </label> <span>{{$item->b_or_t==1?'دارد':'ندارد'}}</span></li>
                            <li><label><i class="fas fa-utensils mr-2"></i>آشپزخانه: </label> <span>{{$item->kitchen==1?'بسته':'اوپن'}}</span></li>
                            <li><label><i class="iconify mr-2" data-icon="mdi:home-floor-g" data-inline="false"></i>طبقه: </label> <span>{{$item->floor?$item->floor:'__'}}</span></li>
                            <li><label><i class="fas fa-hotel mr-2"></i>نوع ملک: </label> <span>{{$item->types(true,$item->type_info)}}</span></li>
                            <li><label><i class="far fa-image mr-2"></i>منظره: </label> <span>{{$item->villa_view_s($item->villa_view)}}</span></li>
                        </ul>
                    </div>
                    </div>
{{--                    @if(is_serialized($item->properties_in))--}}
                    <div class="box_show_villa">
                    <h4 class="title-2 mb-10">امکانات داخلی</h4>
                    <div class="property-details-amenities mb-60">
                        <div class="row">
                            @foreach($pro_in->chunk(count($pro_in)/3) as $pro_ins)
                                <div class="col-lg-4 col-md-6">
                                    <div class="ltn__menu-widget">
                                        <ul>
                                            @foreach($pro_ins as $pro_i)
                                                <li>
                                                    <label class="checkbox-item {{$item->check_pro($pro_i->id,$item->properties_in)?'active_l':'close_l'}}">{{$pro_i->name}}
                                                        @if($item->check_pro($pro_i->id,$item->properties_in))
                                                            <i class="fas fa-check-circle fa-lg"></i>
                                                        @else
                                                            <i class="fas fa-times-circle fa-lg"></i>
                                                        @endif
                                                    </label>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    </div>
{{--                    @endif--}}
{{--                    @if(is_serialized($item->properties_out))--}}
                    <div class="box_show_villa">
                    <h4 class="title-2 mb-10">امکانات رفاهی</h4>
                    <div class="property-details-amenities mb-60">
                        <div class="row">
                            @foreach($pro_out->chunk(count($pro_out)/3) as $pro_outs)
                                <div class="col-lg-4 col-md-6">
                                    <div class="ltn__menu-widget">
                                        <ul>
                                            @foreach($pro_outs as $pro_o)
                                                <li>
                                                    <label class="checkbox-item {{$item->check_pro($pro_o->id,$item->properties_out)?'active_l':'close_l'}}">{{$pro_o->name}}
                                                        @if($item->check_pro($pro_o->id,$item->properties_out))
                                                            <i class="fas fa-check-circle fa-lg"></i>
                                                        @else
                                                            <i class="fas fa-times-circle fa-lg"></i>
                                                        @endif
                                                    </label>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    </div>
{{--                    @endif--}}
{{--                    @if(is_serialized($item->properties_access))--}}
                    <div class="box_show_villa">
                    <h4 class="title-2 mb-10">دسترسی ها</h4>
                    <div class="property-details-amenities mb-60">
                        <div class="row">
                            @foreach($pro_access->chunk(count($pro_access)/3) as $pro_acces)
                                <div class="col-lg-4 col-md-6">
                                    <div class="ltn__menu-widget">
                                        <ul>
                                            @foreach($pro_acces as $pro_ac)
                                                <li>
                                                    <label class="checkbox-item {{$item->check_pro($pro_ac->id,$item->properties_access)?'active_l':'close_l'}}">{{$pro_ac->name}}
                                                        @if($item->check_pro($pro_ac->id,$item->properties_access))
                                                            <i class="fas fa-check-circle fa-lg"></i>
                                                        @else
                                                            <i class="fas fa-times-circle fa-lg"></i>
                                                        @endif
                                                    </label>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    </div>
{{--                    @endif--}}
                    @if($item->video || $item->link1 || $item->link2 || $item->link3 || $item->link4)
                        <div class="box_show_villa">
                        <h4 {{$check_video=false}} class="title-2">ویدئو</h4>
                        <div class="ltn__video-bg-img ltn__video-popup-height-500 bg-overlay-black-50 bg-image mb-60"
                             data-bg="{{url('assets/user/pic/video.jpg')}}">
                            @if($item->video)
                                <a class="{{$check_video==true?'d-none':''}} ltn__video-icon-2 ltn__video-icon-2-border---"
                                   {{$check_video=true}} href="{{url($item->video)}}" data-rel="lightcase:myVideo">
                                    <i class="fa fa-play"></i>
                                </a>
                            @endif
                            @if($item->link1)
                                <a class="{{$check_video==true?'d-none':''}} ltn__video-icon-2 ltn__video-icon-2-border---"
                                   {{$check_video=true}} href="{{$item->link1}}" data-rel="lightcase:myVideo">
                                    <i class="fa fa-play"></i>
                                </a>
                            @endif
                            @if($item->link2)
                                <a class="{{$check_video==true?'d-none':''}} ltn__video-icon-2 ltn__video-icon-2-border---"
                                   {{$check_video=true}} href="{{$item->link2}}" data-rel="lightcase:myVideo">
                                    <i class="fa fa-play"></i>
                                </a>
                            @endif
                            @if($item->link3)
                                <a class="{{$check_video==true?'d-none':''}} ltn__video-icon-2 ltn__video-icon-2-border---"
                                   {{$check_video=true}} href="{{$item->link3}}" data-rel="lightcase:myVideo">
                                    <i class="fa fa-play"></i>
                                </a>
                            @endif
                            @if($item->link4)
                                <a class="{{$check_video==true?'d-none':''}} ltn__video-icon-2 ltn__video-icon-2-border---"
                                   {{$check_video=true}} href="{{$item->link4}}" data-rel="lightcase:myVideo">
                                    <i class="fa fa-play"></i>
                                </a>
                            @endif
                        </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 mt-0">
                <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar---">
                    <!-- Popular Product Widget -->
                    <div class="widget ltn__popular-product-widget">
                        <h4 class="ltn__widget-title ltn__widget-title-border-2"> اطلاعات ملک</h4>
                        <div class="row ltn__popular-product-widget-active slick-arrow-1">
                                <div class="ltn__blog-meta d-flex mb-0">
                                    <ul>
                                        <li class="ltn__blog-date">
                                            <i class="fas fa-money-bill-wave"></i><label class="w-50 mb-0">قیمت به لیر:</label>{{number_format($item->price)}}
                                        </li>
                                        <li class="ltn__blog-date">
                                            <i class="fas fa-money-bill-wave"></i><label class="w-50 mb-0">قیمت به دلار:</label>{{number_format($item->convertPrice($item->price,'dollar'))}}
                                        </li>
                                        <li class="ltn__blog-date">
                                            <i class="fas fa-money-bill-wave"></i><label class="w-50 mb-0">قیمت به تومان:</label>{{number_format($item->convertPrice($item->price,'toman'))}}
                                        </li>
                                        <li class="ltn__blog-date">
                                            <i class="far fa-calendar-alt"></i> <label class="w-50 mb-0">تاریخ ثبت:</label>{{my_jdate($item->created_at,'Y/m/d')}}
                                        </li>
                                        <li class="ltn__blog-date">
                                            <i class="fas fa-network-wired"></i><label class="w-50 mb-0">دسته ملک:</label>{{$item->types_villa(true,$item->type_villa)}}
                                        </li>
                                        <li class="ltn__blog-date">
                                            <i class="fas fa-hand-holding-usd"></i> <label class="w-50 mb-0">فروش ملک:</label> {{$item->type_sale}}
                                        </li>
                                        @if($item->category)
                                            <li class="ltn__blog-date">
                                                <i class="far fa-building"></i><label class="w-50 mb-0">پروژه:</label> {{$item->category->name}}
                                            </li>
                                        @endif
                                        @if($item->sale_status=='active')
                                            <li class="ltn__blog-date">
                                                <i class="fas fa-dollar-sign"></i><label class="w-50 mb-0">وضعیت فروش:</label> فروخته شد
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                        <!--  -->
                        </div>
                    </div>
                @if(count($items))
                    <!-- Popular Product Widget -->
                    <div class="widget ltn__popular-product-widget">
                        <h4 class="ltn__widget-title ltn__widget-title-border-2">ملک های پیشنهادی</h4>
                        <div class="row ltn__popular-product-widget-active slick-arrow-1">
                        @foreach($items as $villa)
                            <!-- ltn__product-item -->
                                <div class="col-lg-12 px-3">
                                    @include('user.includes.villaCard',['villa'=>$villa])
                                </div>
                        @endforeach
                        <!--  -->
                        </div>
                    </div>
                    <!-- Popular Post Widget -->
                @endif
                    <div class="widget ltn__popular-post-widget">
                        <h4 class="ltn__widget-title ltn__widget-title-border-2">آخرین پروژه ها</h4>
                        <ul>
                            @foreach($projects as $project)
                                <li>
                                    <div class="popular-post-widget-item clearfix">
                                        <div class="popular-post-widget-img">
                                            <a href="{{route('user.project.show',$project->id)}}">
                                                @if(count($project->photos)>0)
                                                    <img src="{{url($project->photos[0]->path)}}"
                                                         alt="{{$project->name}}">
                                                @else
                                                    <img src="{{$project->pic!=null?url($project->pic):url('assets/user/pic/product.jpg')}}"
                                                         alt="{{$project->name}}">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="popular-post-widget-brief">
                                            <h6>
                                                <a href="{{route('user.villas.search',[$project->id,'room_num'=>['all'],'type_info'=>'all','city_id'=>'all'])}}">
                                                    {{$project->name}}
                                                </a>
                                            </h6>
                                            <h6>
                                                <a href="{{route('user.villas.search',[$project->id,'room_num'=>['all'],'type_info'=>'all','city_id'=>'all'])}}">
                                                    شروع قیمت از : {{number_format($project->price)}} لیر
                                                </a>
                                            </h6>
                                            <div class="ltn__blog-meta">
                                                <ul>
                                                    <li class="ltn__blog-date">
                                                        <a href="{{route('user.villas.search',[$project->id,'room_num'=>['all'],'type_info'=>'all','city_id'=>'all'])}}"><i
                                                                    class="far fa-calendar-alt"></i>{{my_jdate($project->created_at,'Y/m/d')}}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Top Rated Product Widget -->
                    <div class="widget ltn__top-rated-product-widget">
                        <h4 class="ltn__widget-title ltn__widget-title-border-2">آخرین نوشته ها</h4>
                        <ul>
                            @foreach($blog as $blogs)
                                <li>
                                    <div class="top-rated-product-item clearfix">
                                        <div class="top-rated-product-img">
                                            <a href="{{route('user.blog.show',$blogs->id)}}"><img
                                                        src="{{$blogs->photo?url($blogs->photo):url('assets/user/pic/product.jpg')}}"
                                                        alt="#"></a>
                                        </div>
                                        <div class="top-rated-product-info">
                                            <h6><a href="{{route('user.blog.show',$blogs->id)}}">{{$blogs->title}} </a>
                                            </h6>
                                            <div class="product-price">
                                                <span><i class="far fa-eye"></i> {{$blogs->seen}} </span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
<!-- SHOP DETAILS AREA END -->


@endsection
@section('script_js')
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxfZQk73sogROY9KKRmtPIsLSFSjX7o7w&libraries=places&callback=initialize"></script>
    <script>

        var lat = "{{ (float)$item->latitude }}";
        var lng = "{{ (float)$item->longitude }}";

        function initialize() {
            var latlng = new google.maps.LatLng(lat, lng);
            var options = {
                zoom: 7,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                draggable: true,
                zoomControl: true,
                mapTypeControl: false,
                streetViewControl: false,
                scrollwheel: true
            };

            var autocomplete = new google.maps.places.Autocomplete($("#address")[0], {});


            var map = new google.maps.Map(document.getElementById("google-map-area"), options);

            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var place = autocomplete.getPlace();
                var lat = place.geometry.location.lat();
                var lng = place.geometry.location.lng();
                var formatted_address = place.formatted_address;
                latlng = new google.maps.LatLng(lat, lng);
                placeMarker(map, latlng);
            });


            var marker = new google.maps.Marker(
                {
                    map: map,
                    draggable: false,
                    animation: google.maps.Animation.DROP,
                    icon: "{{ asset('img/pin.png') }}"
                });

            function placeMarker(map, location) {
                if (marker) {
                    marker.setPosition(location);
                } else {
                    marker = new google.maps.Marker({
                        position: location,
                        map: map
                    });
                }
                document.getElementById("latitude").value = location.lat();
                document.getElementById("longitude").value = location.lng();
            }

            placeMarker(map, latlng);
            google.maps.event.addDomListener(window, 'load', initialize);
            google.maps.event.addListener(map, 'click', function (event) {
                placeMarker(map, event.latLng);
            });

            $('#map').on('shown.bs.modal', function () {
                google.maps.event.trigger(map, "resize");
            });
        }

        // Open the Modal
        function openModal(id) {
            document.getElementById("myModal" + id).style.display = "block";
        }

        // Close the Modal
        function closeModal(id) {
            document.getElementById("myModal" + id).style.display = "none";
        }

        var slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(id, n) {
            showSlides(id, slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(id, n) {
            showSlides(id, slideIndex = n);
        }

        function showSlides(id, n) {
            var i;
            var slides = document.getElementsByClassName("mySlides" + id);
            var dots = document.getElementsByClassName("demo");
            // var captionText = document.getElementById("caption"+id);
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            // captionText.innerHTML = dots[slideIndex-1].alt;
        }
    </script>
@endsection