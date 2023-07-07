@extends('user.layouts.user')
@section('style_css')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css"/>
    <style>
        .nice-select {
            width: 100%;
        }

        .nice-select.chosen-select {
            display: none;
        }

        .irs--flat .irs-from, .irs--flat .irs-to, .irs--flat .irs-single, .irs-grid-text {
            direction: rtl;
        }
    </style>
@endsection
@section('body')

    <!-- PRODUCT DETAILS AREA START -->
    <div class="ltn__product-area ltn__product-gutter">
        <div class="container">
            <div class="row">
                <div class="col-lg-4  mb-100">
                    <aside class="sidebar ltn__shop-sidebar">
                        <!-- Advance Information widget -->
                        <form action="{{route('user.villas.search',$type_melk)}}" method="get" id="frm_submit_search"
                              class="widget ltn__menu-widget">
                            <input type="text" name="count_page" class="count_page" value="{{$count_page}}" hidden>
                            <input type="text" name="sort_id" class="sort_id" value="{{$sort_id}}" hidden>
                            <h4 class="ltn__widget-title">شهر</h4>
                            <select class="form-control chosen-select select_js state_id " name="state_id" id="state_id"
                                    data-type="state_id" data-reply="city_id" data-name="شهر">
                                <option value="">انتخاب نمایید</option>
                                @foreach($states as $city)
                                    <option data-target=".cityId{{$city->id}}"
                                            value="{{ $city->id }}" {{ $state_id == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                                @endforeach
                            </select>
                            <hr class="select_hr">
                            <h4 class="ltn__widget-title">منطقه</h4>
                            <select class="form-control chosen-select select_js city_id" name="city_id[]" id="city_id"
                                    data-type="city_id" data-reply="zone_id" data-name="منطقه" multiple
                                    data-placeholder="انتخاب منطقه">
                                @if(isset($citys) and $citys!='')
                                    @foreach($citys as $city)
                                        <option data-target=".cityId{{$city->id}}"
                                                value="{{ $city->id }}" {{  in_array($city->id,$city_id)? 'selected' : '' }}>{{ $city->name }}</option>
                                    @endforeach
                                @else
                                    <option value="">انتخاب نمایید</option>
                                @endif
                            </select>

                            <hr class="select_hr">
                            <h4 class="ltn__widget-title">دسته ملک</h4>
                            <select name="type_villa[]" data-placeholder="انتخاب دسته ملک" class="chosen-select"
                                    multiple>
                                @foreach(\App\Villa::types_villa() as $key=>$types)
                                    <option value="{{$key}}" {{in_array($key,$type_villa)?'selected':''}}>{{$types}}</option>
                                @endforeach
                            </select>
                        
                            <hr>
                            <h4 class="ltn__widget-title">نوع ملک</h4>
                            <select name="type_info[]" data-placeholder="انتخاب نوع ملک" class="chosen-select" multiple>
                                @foreach(\App\Villa::types() as $key=>$type)
                                    <option value="{{$key}}" {{in_array($key,$type_info)?'selected':''}}>{{$type}}</option>
                                @endforeach
                            </select>
                 
                            <hr>
                            <h4 class="ltn__widget-title">تعداد اتاق</h4>
                            <select name="room_num[]" data-placeholder="انتخاب تعداد اتاق" class="chosen-select"
                                    multiple>
                                @foreach(range(1,10) as $key)
                                    <option value="{{$key}}" {{in_array($key,$room_num)?'selected':''}}>{{$key}}</option>
                                @endforeach
                            </select>
                            <hr class="select_hr">

                            <div class="col-12">
                                <h4 class="ltn__widget-title ltn__widget-title-border---">متراژ</h4>
                                <input type="text" class="js-range-slider-area" name="area" value=""/>
                                <hr class="">
                            </div>
                            <!-- Price Filter Widget -->
                           
                            <h4 class="ltn__widget-title">فیلتر قیمت</h4>
                            <select name="price_type" class="chosen-select price_type_select">
                                <option value="price_lir" {{$price_type=='price_lir'?'selected':''}}>لیر</option>
                                <option value="price_toman" {{$price_type=='price_toman'?'selected':''}}>تومان</option>
                                <option value="price_dollar" {{$price_type=='price_dollar'?'selected':''}}>دلار</option>
                            </select>
                            <hr class="select_hr">
                            <div class="col-12 lir-rang {{$price_type=='price_lir'?'':'d-none'}}">
                                <h4 class="ltn__widget-title ltn__widget-title-border---">قیمت لیر</h4>
                                <input type="text" class="js-range-slider-price-lir" name="price_lir" value=""/>
                                <hr class="">
                            </div>
                            <div class="col-12 toman-rang {{$price_type=='price_toman'?'':'d-none'}}">
                                <h4 class="ltn__widget-title ltn__widget-title-border---">قیمت تومان</h4>
                                <input type="text" class="js-range-slider-price-toman" name="price_toman" value=""/>
                                <hr>
                            </div>
                            <div class="col-12 dollar-rang {{$price_type=='price_dollar'?'':'d-none'}}">
                                <h4 class="ltn__widget-title ltn__widget-title-border---">قیمت دلار</h4>
                                <input type="text" class="js-range-slider-price-dollar" name="price_dollar" value=""/>
                                <hr>
                            </div>
                            <div class="btn-wrapper text-center mt-0">
                                <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase w-100">جستجوی
                                    ملک
                                </button>
                            </div>
                        </form>

                    </aside>
                </div>
                <div class="col-lg-8 order-lg-2 mb-100">
                    <div class="ltn__shop-options">
                        <ul class="justify-content-start">
                            @if($items->total()>0)
                                <li>
                                    <div class="showing-product-number text-right">
                                        <span> {{$items->total()}} مورد یافت شد</span>
                                    </div>
                                </li>
                            @endif
                            <li>
                                <div class="short-by text-center">
                                    <select class="nice-select" id="sort_id">
                                        <option value="new" {{$sort_id=='new'?'selected':''}}>جدیدترین</option>
                                        <option value="min_price" {{$sort_id=='min_price'?'selected':''}}>ارزانترین
                                        </option>
                                        <option value="max_price" {{$sort_id=='max_price'?'selected':''}}>گرانترین
                                        </option>
                                        <option value="seen" {{$sort_id=='seen'?'selected':''}}>پربازدیدترین</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="short-by text-center">
                                    <select class="nice-select" id="count_page">
                                        <option value="12" {{$count_page==12?'selected':''}}>هر صفحه : 12</option>
                                        <option value="18" {{$count_page==18?'selected':''}}>هر صفحه : 18</option>
                                        <option value="24" {{$count_page==24?'selected':''}}>هر صفحه : 24</option>
                                        <option value="30" {{$count_page==30?'selected':''}}>هر صفحه : 30</option>
                                        <option value="36" {{$count_page==36?'selected':''}}>هر صفحه : 36</option>
                                        <option value="42" {{$count_page==42?'selected':''}}>هر صفحه : 42</option>
                                        <option value="48" {{$count_page==48?'selected':''}}>هر صفحه : 48</option>
                                    </select>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_product_grid">
                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                <div class="row">
                                @if(count($items))
                                    @foreach($items as $item)
                                        <!-- ltn__product-item -->
                                            <div class="col-xl-6 col-sm-6 col-12 px-1">
                                                @include('user.includes.villaCard',['villa'=>$item])
                                            </div>
                                    @endforeach
                                    <!--  -->
                                    @else
                                        <div class="alert alert-danger col-md-8 mx-auto text-center">
                                            یافت نشد!
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ltn__pagination-area text-center">
                        <div class="ltn__pagination">
                            {{$items->appends(Request::except('page'))->links()}}
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- PRODUCT DETAILS AREA END -->

@endsection
@section('script_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
    <script>
        $(".js-range-slider-price-lir").ionRangeSlider({
            type: "double",
            min: {{$price_min_all}},
            max: {{$price_max_all}},
            from: {{$price_min}},
            to: {{$price_max}},
            grid: true,
            step: 500,
            grid_num: 2,
            postfix: " لیر",
            prettify_enabled: true,
            prettify_separator: ","
        });
        $(".js-range-slider-price-toman").ionRangeSlider({
            type: "double",
            min: {{\App\Villa::convertPrice($price_min_all,'toman')}},
            max: {{\App\Villa::convertPrice($price_max_all,'toman')}},
            from: {{\App\Villa::convertPrice($price_min,'toman')}},
            to: {{\App\Villa::convertPrice($price_max,'toman')}},
            grid: true,
            step: 500,
            grid_num: 2,
            postfix: " تومان",
            prettify_enabled: true,
            prettify_separator: ","
        });
        $(".js-range-slider-price-dollar").ionRangeSlider({
            type: "double",
            min: {{\App\Villa::convertPrice($price_min_all,'dollar')}},
            max: {{\App\Villa::convertPrice($price_max_all,'dollar')}},
            from: {{\App\Villa::convertPrice($price_min,'dollar')}},
            to: {{\App\Villa::convertPrice($price_max,'dollar')}},
            grid: true,
            step: 500,
            grid_num: 2,
            postfix: " دلار",
            prettify_enabled: true,
            prettify_separator: ","
        });

        $(".js-range-slider-area").ionRangeSlider({
            type: "double",
            min: {{$area_min_all}},
            max: {{$area_max_all}},
            from: {{$area_min}},
            to: {{$area_max}},
            grid: true,
            step: 1,
            grid_num: 4,
            postfix: " متر",
            prettify_enabled: true,
            prettify_separator: ","
        });


        {{--$(".area_s").slider({--}}
        {{--    range: true,--}}
        {{--    min: {{$area_min_all}},--}}
        {{--    max: {{$area_max_all}},--}}
        {{--    values: [ {{$area_min}}, {{$area_max}} ],--}}
        {{--    slide: function (event, ui) {--}}
        {{--        $(".area_amount").val(ui.values[1] + " متر - " + ui.values[0] + " متر ");--}}
        {{--    }--}}
        {{--});--}}
        {{--$(".area_amount").val($(".area_s").slider("values", 1) +--}}
        {{--    " متر -  " + $(".area_s").slider("values", 0) + " متر ");--}}

    </script>
@endsection