@component('layouts.back')
    @slot('title') بررسی {{ $title }} {{ $villa->name }} @endslot
    @slot('body')
        <style>
            .price_input {
                padding-right: 35px;
                text-align: center !important;
            }

            .type_price {
                position: relative;
                top: 40px;
                right: -30px;
            }
        </style>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>
                    </div>
                    <h2>بررسی {{ $title }} {{ $villa->name }}
                        @switch($villa->status)
                            @case('pending')
                            <small><span class="badge badge-warning">درانتظار تایید</span></small>
                            @break
                            @case('published')
                            <small><span class="badge badge-success">تایید شده</span></small>
                            @break
                            @case('failed')
                            <small><span class="badge badge-danger">رد شده</span></small>
                            @break
                            @default
                        @endswitch
                    </h2>
                </div>
            </div>
            <div class="card-body">
                {{ Form::model($villa, array('route' => array('villa-update', $villa->id), 'method' => 'PATCH', 'files' => true, 'style' => 'width:100%!important;min-width:100%!important')) }}
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="city_id">شهر</label>
                            <select class="form-control selectpicker" name="city_id" id="city_id">
                                <option value="">انتخاب نمایید</option>
                                @foreach($cities as $city)
                                    <option
                                            {{$city->id==$villa->city_id?'selected':''}} data-target=".cityId{{$city->id}}"
                                            value="{{ $city->id }}" data-latitude="{{ $city->latitude }}"
                                            data-longitude="{{ $city->longitude }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            {{ Form::label('district', 'منطقه ملک') }}
                            <select class="form-control selectpicker" name="location_id" id="location_id">
                                <option value="">انتخاب نمایید</option>
                                @foreach($locations as $l)
                                    <option {{$l->id==$villa->location_id?'selected':''}} class="cityId{{$l->city_id}}"
                                            value="{{ $l->id }}">{{ $l->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{--<div class="col-md-4 col-xs-12">--}}
                        {{--<div class="form-group district">--}}
                            {{--{{ Form::label('district', 'محله ملک') }}--}}
                            {{--<select class="form-control selectpicker" name="district" id="district">--}}

                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--                    <div class="col-md-4 col-xs-12">--}}
                    {{--                        <div class="form-group">--}}
                    {{--                            {{ Form::label('location_id', 'مقصد ملک') }}--}}
                    {{--                            {{ Form::select('location_id', array_pluck($locations, 'name', 'id'), '', array('class' => 'form-control selectpicker')) }}--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--<div class="col-md-4 col-xs-12">--}}
                        {{--<div class="form-group">--}}
                            {{--{{ Form::label('type', 'دسته ملک') }}--}}
                            {{--{{ Form::select('type', array('new' => 'پروژه های نوساز','old' => 'املاک دست دوم'), null, array('class' => 'form-control selectpicker')) }}--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            {{ Form::label('type_info', 'نوع ملک') }}
                            {{ Form::select('type_info', App\Villa::types(), null, array('class' => 'form-control selectpicker')) }}
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group @if($errors->has('slug')) has-danger @endif">
                            {{ Form::label('built_year', 'سن ساختمان (نوساز = 0 یا سال را وارد نمایید)') }}
                            {{ Form::number('built_year', null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            {{ Form::label('room_num', 'تعداد خواب') }}
                            {{ Form::number('room_num', null, array('class' => 'form-control','min'=>0)) }}
                            {{--                            {{ Form::select('room_num', array('0' => '0 خوابه','1' => '1 خوابه', '2' => '2 خوابه', '3' => '3 خوابه', '4' => '4 خوابه', '5' => '5 خوابه','6' => '6 خوابه '), null, array('class' => 'form-control selectpicker')) }}--}}
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group @if($errors->has('number_of_wc')) has-danger @endif">
                            {{ Form::label('number_of_wc', 'تعداد سرویس بهداشتی', array('style' => 'font-size: 10px')) }}
                            {{ Form::number('number_of_wc', null, array('class' => 'form-control','min'=>1)) }}
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            {{ Form::label('b_or_t', 'بالکن یا تراس') }}
                            {{ Form::select('b_or_t', ['0'=>'ندارد','1'=>'دارد'], null, array('class' => 'form-control selectpicker')) }}
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            {{ Form::label('furniture', 'فرنیش') }}
                            {{ Form::select('furniture', ['0'=>'ندارد','1'=>'دارد'], null, array('class' => 'form-control selectpicker')) }}
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            {{ Form::label('kitchen', 'آشپزخانه') }}
                            @php
                                $kitchen=[];
                                if(!is_null($villa->kitchen))
                                {
                                    $is_serialized=is_serialized($villa->kitchen);
                                     if(!$is_serialized)
                                         {
                                             array_push($kitchen,$villa->kitchen);
                                         }
                                     else {
                                          if ($villa->kitchen != 'N;'){
                                            $kitchen = unserialize($villa->kitchen);
                                            }else{
                                            $kitchen = [];
                                            }
                                     }
                                }
                            @endphp
                            {{ Form::select('kitchen[]', ['0'=>'اوپن','1'=>'بسته'], $kitchen, array('class' => 'form-control selectpicker','multiple')) }}
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 d-none">
                        <div class="form-group">
                            {{ Form::label('status', 'وضعیت') }}
                            {{ Form::select('status', array('published' => 'انتشار', 'draft' => 'پیش نویس', 'pending' => 'در انتظار تایید'), null, array('class' => 'form-control selectpicker')) }}
                        </div>
                    </div>
                    {{--<div class="col-md-4 col-xs-12">--}}
                        {{--<div class="form-group">--}}
                            {{--{{ Form::label('salon_num', 'تعداد سالن') }}--}}
                            {{--{{ Form::number('salon_num', null, array('class' => 'form-control','min'=>1)) }}--}}
{{--                            {{ Form::select('salon_num', array('1' => '1 سالن', '2' => '2 سالن', '3' => '3 سالن'), null, array('class' => 'form-control selectpicker')) }}--}}
                        {{--</div>--}}
                    {{--</div>--}}


                    {{--                    <div class="col-md-4 col-xs-12">--}}
                    {{--                        <div class="form-group">--}}
                    {{--                            {{ Form::label('location_id', 'مقصد ملک') }}--}}
                    {{--                            {{ Form::select('location_id', array_pluck($locations, 'name', 'id'), null, array('class' => 'form-control selectpicker')) }}--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="col-md-4 col-xs-12">--}}
                    {{--                        <div class="form-group district">--}}
                    {{--                            {{ Form::label('district', 'محل ملک') }}--}}
                    {{--                            --}}{{--{{ Form::select('district', [], null, array('class' => 'form-control selectpicker')) }}--}}
                    {{--                            <select name="district" class="district form-control selectpicker">--}}
                    {{--                                @foreach($districts as $district)--}}
                    {{--                                    <option value="{{$district}}"--}}
                    {{--                                            @if($villa->district == $district) selected @endif>{{$district}}</option>--}}
                    {{--                                @endforeach--}}
                    {{--                            </select>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="col-md-4 col-xs-12">--}}
                    {{--                        <div class="form-group @if($errors->has('number_of_servants')) has-danger @endif">--}}
                    {{--                            {{ Form::label('number_of_servants', 'خدمتکاران') }}--}}
                    {{--                            {{ Form::text('number_of_servants', null, array('placeholder' => 'تعداد خدمتکاران', 'class' => 'form-control', 'onkeypress' => 'return isNumberKey(event)')) }}--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="col-md-4 col-xs-12">--}}
                    {{--                        <div class="form-group @if($errors->has('number_of_rooms')) has-danger @endif">--}}
                    {{--                            {{ Form::label('number_of_rooms', 'تعداد اتاق') }}--}}
                    {{--                            {{ Form::text('number_of_rooms', null, array('placeholder' => 'تعداد اتاق', 'class' => 'form-control', 'onkeypress' => 'return isNumberKey(event)')) }}--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="col-md-4 col-xs-12">--}}
                    {{--                        <div class="form-group @if($errors->has('max_passenger')) has-danger @endif">--}}
                    {{--                            {{ Form::label('max_passenger', 'مسافران') }}--}}
                    {{--                            {{ Form::text('max_passenger', null, array('placeholder' => 'تعداد مسافران', 'class' => 'form-control', 'onkeypress' => 'return isNumberKey(event)')) }}--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="col-md-4 col-xs-12">--}}
                    {{--                        <div class="form-group @if($errors->has('space')) has-danger @endif">--}}
                    {{--                            {{ Form::label('space', 'فضای ملک') }}--}}
                    {{--                            {{ Form::text('space', null, array('placeholder' => 'فضای ملک', 'class' => 'form-control')) }}--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="col-md-4 col-xs-12">--}}
                    {{--                        <div class="form-group @if($errors->has('pool_space')) has-danger @endif">--}}
                    {{--                            {{ Form::label('pool_space', 'فضای استخر') }}--}}
                    {{--                            {{ Form::text('pool_space', null, array('placeholder' => 'فضای استخر', 'class' => 'form-control')) }}--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--<div class="col-md-4 col-xs-12">--}}
                        {{--<div class="form-group ">--}}
                            {{--{{ Form::label('area', 'متراژ Brüt') }}--}}
                            {{--{{ Form::number('area', null, array('placeholder' => 'متراژ Brüt', 'class' => 'form-control','min'=>1)) }}--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4 col-xs-12">--}}
                        {{--<div class="form-group ">--}}
                            {{--{{ Form::label('area_net', 'متراژ Net') }}--}}
                            {{--{{ Form::number('area_net', null, array('placeholder' => 'متراژ Net', 'class' => 'form-control','min'=>1)) }}--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4 col-xs-12 ">--}}
                        {{--<div class="form-group @if($errors->has('floor_num')) has-danger @endif">--}}
                            {{--{{ Form::label('floor_num', 'تعداد طبقات') }}--}}
                            {{--{{ Form::number('floor_num', null, array('class' => 'form-control','min'=>1)) }}--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group @if($errors->has('floor')) has-danger @endif">
                            {{ Form::label('floor', 'طبقه') }}
                            {{ Form::number('floor', null, array('placeholder' => 'طبقه چندم', 'class' => 'form-control')) }}
                        </div>
                    </div>

                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            {{ Form::label('villa_view', 'منظره') }}
                            @php
                                if(!is_null($villa->villa_view))
                                {
                                    $villa_show=[];
                                    $is_serialized=is_serialized($villa->villa_view);
                                     if(!$is_serialized)
                                         {
                                             array_push($villa_show,$villa->villa_view);
                                         }
                                     else {
                                          if ($villa->villa_view != 'N;'){
                                            $villa_show = unserialize($villa->villa_view);
                                            }else{
                                            $villa_show = [];
                                            }
                                     }
                                }
                            @endphp
                            {{ Form::select('villa_view[]', App\Villa::villa_view(), $villa_show, array('class' => 'form-control selectpicker','multiple')) }}
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            {{ Form::label('properties_in', 'امکانات داخلی', array('style' => 'font-size: 10px')) }}
                            @php
                                if ($villa->properties_in != 'N;'){
                                $properties_in = unserialize($villa->properties_in);
                                }else{
                                $properties_in = [];
                                }
                            @endphp
                            {{ Form::select('properties_in[]', array_pluck($propertiesin, 'name', 'id'), $properties_in, array('class' => 'form-control selectpicker', 'multiple')) }}
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            @php
                                if ($villa->properties_out != 'N;'){
                                $properties_out = unserialize($villa->properties_out);
                                }else{
                                $properties_out = [];
                                }
                            @endphp
                            {{ Form::label('properties_out', 'امکانات رفاهی', array('style' => 'font-size: 10px')) }}
                            {{ Form::select('properties_out[]', array_pluck($propertiesout, 'name', 'id'), $properties_out, array('class' => 'form-control selectpicker', 'multiple')) }}
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            @php
                                if ($villa->properties_access != 'N;'){
                                $properties_access = unserialize($villa->properties_access);
                                }else{
                                $properties_access = [];
                                }
                            @endphp
                            {{ Form::label('properties_out', 'دسترسی ها', array('style' => 'font-size: 10px')) }}
                            {{ Form::select('properties_access[]', array_pluck($propertiesaccess, 'name', 'id'), $properties_access, array('class' => 'form-control selectpicker', 'multiple')) }}
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group bootstrap-selects @if($errors->has('price')) has-danger @endif">
                            {{ Form::label('price', 'قیمت') }}
                            {{ Form::text('price', null, array('class' => 'form-control text-center price_input price_mask')) }}

                            {{ Form::select('price_type', array('lira'=>'لیر', 'rial' => 'ریال', 'dollar' => 'دلار', 'euro' => 'یورو'), null, array('class' => 'form-control selectpicker', 'style' => 'width:26%;margin-right:.2rem;float:right')) }}
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            {{ Form::label('tip_info', 'نوع خدمات ملک') }}
                            {{ Form::select('tip_info', ['1'=>'مناسب برای اخذ شهروندی و پاسپورت ترکیه','2'=>'مناسب برای اخذ اقامت ترکیه'], null, array('class' => 'form-control selectpicker')) }}
                        </div>
                    </div>

{{--                    <div class="col-md-4 col-xs-12">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="usering">کاربری</label>--}}
{{--                            @php--}}
{{--                                if(!is_null($villa->usering))--}}
{{--                                    {--}}
{{--                                        $userings=[];--}}
{{--                                        $is_serialized_user=is_serialized($villa->usering);--}}
{{--                                         if(!$is_serialized_user)--}}
{{--                                             {--}}
{{--                                                 array_push($userings,$villa->usering);--}}
{{--                                             }--}}
{{--                                         else {--}}
{{--                                              if ($villa->usering != 'N;'){--}}
{{--                                                $userings = unserialize($villa->usering);--}}
{{--                                                }else{--}}
{{--                                                $userings = [];--}}
{{--                                                }--}}
{{--                                         }--}}
{{--                                    }--}}
{{--                            @endphp--}}
{{--                            <select class="form-control selectpicker" name="usering[]" id="usering" disabled multiple>--}}
{{--                                @foreach(App\Villa::usering() as $key => $usering)--}}
{{--                                    <option value="{{ $key }}"  @if(in_array($key,$userings)) selected @endif>{{ $usering }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group @if($errors->has('name')) has-danger @endif">
                            {{ Form::label('name', 'نام ملک') }}
                            {{ Form::text('name', null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group @if($errors->has('slug')) has-danger @endif">
                            {{ Form::label('slug', 'نامک') }}
                            {{ Form::text('slug', null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    @if($villa->user_id==auth()->id() || auth()->user()->hasRole('مدیر')|| auth()->user()->hasRole('تعیین کننده ملک'))
                    <div class="col-md-12">
                        <div class="form-group">
                            @foreach(\App\Category::types() as $key=>$type)
                                <div class="d-inline-block py-3">
                                    <label class="w-100">
                                        <input type="checkbox" id="types" name="types[]" value="{{ $key }}"
                                               class="w-auto"
                                               style="width: auto"
                                                {{ old('types') && in_array($key, old('types')) ? 'checked' : '' }}
                                        @if(old('types') && in_array($key, old('types'))) {{ 'checked' }} @elseif($villa->$key && $villa->$key == 1) {{ 'checked' }} @endif
                                        >
                                        <span>{{ $type }}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
                @if($villa->user_id==auth()->id() || auth()->user()->hasRole('مدیر') || auth()->user()->hasRole('تعیین کننده ملک'))
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            {{ Form::textarea('body', null, array('id' => 'body', 'class' => 'form-control textarea')) }}
                        </div>
                        <div class="form-group d-none">
                            {{ Form::textarea('services', null, array('id' => 'services', 'class' => 'form-control textarea')) }}
                        </div>
                        <div class="form-group d-none">
                            {{ Form::textarea('information', null, array('id' => 'information', 'class' => 'form-control textarea')) }}
                        </div>
                        <div class="float-right w-100 my-5">
                            {{--                            <div class="add-more">--}}
                            {{--                                <a href="javascript:void(0)" class="btn btn-secondary click-to-add-room"--}}
                            {{--                                   style="margin-bottom: 15px;"><i--}}
                            {{--                                            class="fa fa-plus ml-2"></i><span>افزودن اتاق</span></a>--}}
                            {{--                                {{ Form::textarea('price_desc', null, array('class' => 'form-control textarea')) }}--}}
                            {{--                                <hr/>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="some_room">--}}
                            {{--                                @if($villa->prices != 'N;')--}}
                            {{--                                    @php--}}
                            {{--                                        $prices = unserialize($villa->prices);--}}
                            {{--                                        $rooms = 1;--}}
                            {{--                                    @endphp--}}
                            {{--                                    @foreach($prices as $price => $room)--}}

                            {{--                                        <div class="parent-room" data-id="{{ $rooms }}">--}}
                            {{--                                            <a href="javascript:void(0)" class="remove-field"><i--}}
                            {{--                                                    class="fa fa-close"></i></a>--}}
                            {{--                                            <div class="row">--}}
                            {{--                                                <div class="col-md-3">--}}
                            {{--                                                    <div class="form-group row">--}}
                            {{--                                                        <label for="some_room" class="col-md-7">تعداد اتاق</label>--}}
                            {{--                                                        <input class="form-control col-md-5"--}}
                            {{--                                                               onkeypress="return isNumberKey(event)"--}}
                            {{--                                                               name="some_room[{{ $rooms }}][]" type="text"--}}
                            {{--                                                               value="{{ $room[0] }}" required></div>--}}
                            {{--                                                </div>--}}
                            {{--                                                <div class="col-md-9">--}}
                            {{--                                                    <a href="javascript:void(0)"--}}
                            {{--                                                       class="btn btn-secondary mt-1 click-to-add-price"--}}
                            {{--                                                       onclick="add_price($(this))"><i--}}
                            {{--                                                            class="fa fa-plus ml-2"></i><span>افزودن قیمت</span></a>--}}
                            {{--                                                    <div class="some_price">--}}
                            {{--                                                        @foreach($room['date_in'] as $num => $date_in)--}}

                            {{--                                                            <div class="row">--}}
                            {{--                                                                <div class="col-md-2">--}}
                            {{--                                                                    <div class="form-group"><input--}}
                            {{--                                                                            class="form-control date"--}}
                            {{--                                                                            name="some_room[{{ $rooms }}][date_in][]"--}}
                            {{--                                                                            type="text" value="{{ $date_in }}"--}}
                            {{--                                                                            placeholder="از تاریخ"--}}
                            {{--                                                                            readonly required></div>--}}
                            {{--                                                                </div>--}}
                            {{--                                                                <div class="col-md-2">--}}
                            {{--                                                                    <div class="form-group"><input--}}
                            {{--                                                                            class="form-control date"--}}
                            {{--                                                                            name="some_room[{{ $rooms }}][date_out][]"--}}
                            {{--                                                                            type="text"--}}
                            {{--                                                                            value="{{ $room['date_out'][$num] }}"--}}
                            {{--                                                                            placeholder="تا تاریخ"--}}
                            {{--                                                                            readonly required></div>--}}
                            {{--                                                                </div>--}}
                            {{--                                                                <div class="col-md-2">--}}
                            {{--                                                                    <div class="form-group"><input class="form-control"--}}
                            {{--                                                                                                   name="some_room[{{ $rooms }}][min][]"--}}
                            {{--                                                                                                   type="text"--}}
                            {{--                                                                                                   value="{{ $room['min'][$num] }}"--}}
                            {{--                                                                                                   onkeypress="return isNumberKey(event)"--}}
                            {{--                                                                                                   placeholder="حداقل"--}}
                            {{--                                                                                                   required></div>--}}
                            {{--                                                                </div>--}}
                            {{--                                                                <div class="col-md-6">--}}
                            {{--                                                                    <div class="form-group bootstrap-selects"><input--}}
                            {{--                                                                            class="form-control"--}}
                            {{--                                                                            name="some_room[{{ $rooms }}][some_price][]"--}}
                            {{--                                                                            type="text"--}}
                            {{--                                                                            value="{{ $room['some_price'][$num] }}"--}}
                            {{--                                                                            style="width:36%;float:right"> <input--}}
                            {{--                                                                            class="form-control some_price_last"--}}
                            {{--                                                                            name="some_room[{{ $rooms }}][some_price_last][]"--}}
                            {{--                                                                            type="text"--}}
                            {{--                                                                            value="@if(isset($room['some_price_last'][$num])){{$room['some_price_last'][$num]}}@endif"--}}
                            {{--                                                                            style="width:32.9%;margin-right:2%;float:right; @if($villa->last_discount == 'no') display: none; @endif"--}}
                            {{--                                                                            @if($villa->last_discount == 'yes') required @endif--}}
                            {{--                                                                        >--}}
                            {{--                                                                        <select class="form-control selectpicker"--}}
                            {{--                                                                                name="some_room[{{ $rooms }}][some_price_type][]"--}}
                            {{--                                                                                style="width:26%;margin-right:.2rem;float:right">--}}
                            {{--                                                                            <option value="rial"--}}
                            {{--                                                                                    @if($room['some_price_type'][$num] == 'rial') selected @endif>--}}
                            {{--                                                                                ریال--}}
                            {{--                                                                            </option>--}}
                            {{--                                                                            <option value="dollar"--}}
                            {{--                                                                                    @if($room['some_price_type'][$num] == 'dollar') selected @endif>--}}
                            {{--                                                                                دلار--}}
                            {{--                                                                            </option>--}}
                            {{--                                                                            <option value="euro"--}}
                            {{--                                                                                    @if($room['some_price_type'][$num] == 'euro') selected @endif>--}}
                            {{--                                                                                یورو--}}
                            {{--                                                                            </option>--}}
                            {{--                                                                        </select></div>--}}
                            {{--                                                                </div>--}}
                            {{--                                                                <a href="javascript:void(0)" class="remove-field"><i--}}
                            {{--                                                                        class="fa fa-close"></i></a></div>--}}


                            {{--                                                        @endforeach--}}
                            {{--                                                    </div>--}}
                            {{--                                                </div>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            {{--                                        @php $rooms++ @endphp--}}
                            {{--                                    @endforeach--}}
                            {{--                                @endif--}}
                            {{--                            </div>--}}
                        </div>
                        <div class="float-right w-100 my-5">
                            {{--                            <div class="add-more">--}}
                            {{--                                <a href="javascript:void(0)" class="btn btn-secondary click-to-add-description"><i--}}
                            {{--                                            class="fa fa-plus ml-2"></i><span>افزودن توضیحات بیشتر</span></a>--}}
                            {{--                                <hr/>--}}
                            {{--                            </div>--}}
                            <div class="some_description">
                                @if($villa->descriptions)
                                    @php
                                        $descriptions = unserialize($villa->descriptions);
                                    @endphp
                                    @foreach($descriptions as $description)
                                        <div class="parent-description">
                                            <a href="javascript:void(0)" class="close-tab"><i
                                                        class="fa fa-close"></i></a>
                                            <div class="form-group">
                                                {{ Form::label('some_title[]', 'عنوان') }}
                                                {{ Form::text('some_title[]', $description['title'], array('placeholder' => 'عنوان', 'class' => 'form-control', 'required')) }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::textarea('some_description[]', $description['description'], array('class' => 'form-control textarea', 'required')) }}
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        {{--                        <div class="form-group">--}}
                        {{--                            <div class="google-map" id="google-map-area" style="width:100%;height:250px"></div>--}}
                        {{--                        </div>--}}
                        {{--                        <div>--}}
                        {{--                            <input id="geocomplete" type="text" placeholder="نام ملک یا آدرس ملک" size="90"/>--}}
                        {{--                            <input id="find" type="button" class="btn btn-info" value="پیدا کردن"/>--}}
                        {{--                        </div>--}}
                        <div class="form-group d-none">
                            {{ Form::label('name', 'تصویر شاخص') }}
                            <div class="custom-file">
                                {{ Form::file('photo', array('accept' => 'image/*', 'class' => 'custom-file-input', 'id' => 'customFile')) }}
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>

                        @if($villa->video)
                            <div class="form-group mb-1">
                                <label class="d-block">ویدیو : </label>
                                <video width="320" height="240" controls>
                                    <source src="{{ url($villa->video) }}" type="video/mp4">
                                </video>
                            </div>
                        @endif

                        <div class="row w-100 mb-5">
                            <label class="ml-3">گالری</label>
{{--                            <input type="file" class="gallery-multiple" name="gallery[]" accept="image/*" multiple="">--}}
                            <div class="gallery-preview ui-sortable">
                                @foreach($villa->photos as $photo)
                                    <div class="gallery-item" data-id="{{ $photo->id }}">
                                        <div class="gallery-delete">x</div>
                                        <img src="{{ url($photo->path) }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('meta_keywords', 'کلمات کلیدی') }}
                            {{ Form::text('meta_keywords', null, array('class' => 'form-control' , 'placeholder' => 'با کاما (،) از هم جدا شود')) }}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('meta_description', 'توضیحات سئو') }}
                            {{ Form::text('meta_description', null, array('class' => 'form-control' , 'placeholder' => 'با کاما (،) از هم جدا شود')) }}
                        </div>
                    </div>
                </div>
                @endif

                {{ Form::close() }}

                <br/>
                @if($villa->user_id==auth()->id() || auth()->user()->hasRole('مدیر') || auth()->user()->hasRole('تعیین کننده ملک'))
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('villa-status', ['villa'=> $villa]) }}" method="POST"
                              class="d-inline float-left confirmation-form w-100 mb-2">
                            @csrf
                            <button type="submit" class="btn btn-success" name="status" value="published">تایید</button>
                            <button type="submit" class="btn btn-danger" name="status" value="failed">رد</button>
                            <div class="form-group mt-1 status-message">
                                <label class="d-block w-100 mb-1" for="status_message"></label>
                                <textarea class="form-control" id="status_message" name="status_message"
                                          style="font-size: 13px"
                                          placeholder="علت رد ...">{!! $villa->status_message !!}</textarea>
                            </div>
                        </form>
                        <a href="{{ URL::previous() }}" class="btn btn-rounded btn-secondary float-right"><i
                                    class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
        @php
            $villa->view+=1;
            $villa->update();
        @endphp
    @endslot
    @push('stylesheets')
        <link rel="stylesheet" type="text/css" href="{{ url('assets/admin/css/bootstrap-datepicker.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ url('assets/admin/css/bootstrap-select.min.css') }}"/>
    @endpush
    @push('scripts')
        <script type="text/javascript" src="{{ url('assets/admin/js/bootstrap-datepicker.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('assets/admin/js/bootstrap-datepicker-fa.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('assets/admin/js/bootstrap-select.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('assets/admin/js/bootstrap-select-fa_IR.min.js') }}"></script>
        <script src="{{ asset('editor/laravel-ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('editor/laravel-ckeditor/adapters/jquery.js') }}"></script>
        <script src="{{ url('assets/admin/js/jquery.mask.min.js') }}"></script>
        <script>
            $('.price_mask').mask("#,##0", {reverse: true});
        </script>
        {{--<script src="//cdn.ckeditor.com/4.9.1/full/ckeditor.js"></script>--}}
        {{--<script>--}}
        {{--CKEDITOR.replace( 'body' );--}}
        {{--</script>--}}
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxfZQk73sogROY9KKRmtPIsLSFSjX7o7w&libraries=places&callback=initialize"></script>
        <script type="text/javascript">
            var textareaOptions = {
                filebrowserImageBrowseUrl: '{{ url('filemanager?type=Images') }}',
                filebrowserImageUploadUrl: '{{ url('filemanager/upload?type=Images&_token=') }}',
                filebrowserBrowseUrl: '{{ url('filemanager?type=Files') }}',
                filebrowserUploadUrl: '{{ url('filemanager/upload?type=Files&_token=') }}',
                language: 'fa'
            };
            $('.textarea').ckeditor(textareaOptions);
            slug('#name', '#slug');

            $('.date').datepicker();

            $('.selectpicker').selectpicker();

            $('.click-to-add-description').on('click', function () {
                var number = rollDice();
                otherAdd(number);
            });

            function otherAdd(number) {
                $('.some_description').append('<div class="parent-description"><a href="javascript:void(0)" class="close-tab"><i class="fa fa-close"></i></a><div class="form-group"><label for="some_title[]">عنوان</label> <input placeholder="عنوان" class="form-control" required name="some_title[]" type="text" id="some_title[]"></div><div class="form-group"><textarea class="form-control textarea" required name="some_description[]" cols="50" rows="10"></textarea></div></div>');
                $('.close-tab').click(function () {
                    $(this).parent().remove()
                });
                $('.textarea').ckeditor(textareaOptions);
            }

            function rollDice() {
                return (Math.floor(Math.random() * 6) + 1);
            }

            var max_fields_room = 5;
            var wrapper_room = $(".some_room");
            var add_button_room = $(".click-to-add-room");
            var x_room = 0;
            $(add_button_room).click(function (e) {
                e.preventDefault();
                if (x_room < max_fields_room) {
                    wrapper_room.append(
                        '<div class="parent-room" data-id="' + x_room + '"> <a href="javascript:void(0)" class="remove-field"><i class="fa fa-close"></i></a> <div class="row"> <div class="col-md-3"> <div class="form-group row"> <label for="some_room" class="col-md-7">تعداد اتاق</label> <input class="form-control col-md-5" onkeypress="return isNumberKey(event)" name="some_room[' + x_room + '][]" type="text" required> </div> </div> <div class="col-md-9"> <a href="javascript:void(0)" class="btn btn-secondary mt-1 click-to-add-price" onclick="add_price($(this))"><i class="fa fa-plus ml-2"></i><span>افزودن قیمت</span></a> <div class="some_price"></div> </div> </div> </div>'
                    );
                    x_room++;
                }
            });
            $(wrapper_room).on("click", ".remove-field", function (e) {
                e.preventDefault();
                $(this).parent().remove();
                x_room--;
            });


            var x = 1000;

            function add_price(add_button_price) {

                var number = x;


                var wrapper_price = add_button_price.parent('div').find('.some_price');
                var id = add_button_price.parent('div').parent('div').parent('div').data('id');
                wrapper_price.append(
                    '<div class="row"> <div class="col-md-2"> <div class="form-group"> <input class="form-control date-in-' + number + '" name="some_room[' + id + '][date_in][]" type="text" placeholder="از تاریخ" readonly required></div> </div> <div class="col-md-2"> <div class="form-group"> <input class="form-control date-out-' + number + '" name="some_room[' + id + '][date_out][]" type="text" placeholder="تا تاریخ" readonly required></div> </div> <div class="col-md-2"> <div class="form-group"> <input class="form-control" name="some_room[' + id + '][min][]" type="text" onkeypress="return isNumberKey(event)" placeholder="حداقل" required></div> </div> <div class="col-md-6"> <div class="form-group bootstrap-selects"> <input class="form-control" name="some_room[' + id + '][some_price][]" type="text" style="width:36%;float:right"> <input class="form-control some_price_last" name="some_room[' + id + '][some_price_last][]" type="text" style="width:35%;margin-right: 2%;float:right"> <select class="form-control selectpicker" name="some_room[' + id + '][some_price_type][]" style="width:26%;float:right"><option value="dollar">دلار</option> <option value="rial">ریال</option> <option value="euro">یورو</option> </select></div> </div> <a href="javascript:void(0)" class="remove-field"><i class="fa fa-close"></i></a></div>'
                );
                var date1 = '.date-in-' + number;
                var date2 = '.date-out-' + number;


                $(function () {
                    var date = new Date();
                    date.setDate(date.getDate());
                    $(date1).datepicker({
                        onClose: function (selectedDate) {
                            $(date2).datepicker("option", "minDate", selectedDate);
                        }
                    });
                    $(date2).datepicker({
                        onClose: function (selectedDate) {
                            $(date1).datepicker("option", "maxDate", selectedDate);
                        }
                    });
                });


                $('.selectpicker').selectpicker();
                $(wrapper_price).on("click", ".remove-field", function (e) {
                    $(this).parent().remove();
                });
                if ($('#last_discount').is(':checked')) {
                    $('.some_price_last').each(function () {
                        $(this).prop('required', true);
                        $(this).show();
                    });
                } else {
                    $('.some_price_last').each(function () {
                        $(this).val('');
                        $(this).prop('required', false);
                        $(this).hide();
                    });
                }

                x++;
            }

            $(document).ready(function () {
                setTimeout(function () {

                    $.each($('.some_price_last'), function (index, value) {
                        if ($(value).val() == '') {
                            $(value).hide();
                            $(this).prop('required', false);
                        }
                    });
                }, 1000);
            });

            $(document).ready(function () {
                var id = $('#location_id').val();
                var base_url = '{{ url("/") }}';
                $.getJSON(base_url + "/panel/districts/" + id, function (data) {
                    var district = $(".district");
                    district.empty();
                    district.append('<label for="district">محل ملک</label> <select class="form-control selectpicker" id="district" name="district"></select>');
                    $.each(data, function (index, value) {
                        var villa_district = '{{$villa->district}}';
                        if (villa_district == value) {
                            $('#district').append('<option value="' + index + '" selected>' + value + '</option>');
                        } else {
                            $('#district').append('<option value="' + index + '">' + value + '</option>');
                        }
                    });
                    $('.selectpicker').selectpicker();
                });
            });

            $('#location_id').change(function () {
                var id = $(this).val();
                var base_url = '{{ url("/") }}';
                $.getJSON(base_url + "/panel/districts/" + id, function (data) {
                    var district = $(".district");
                    district.empty();
                    district.append('<label for="district">محل ملک</label> <select class="form-control selectpicker" id="district" name="district"></select>');
                    $.each(data, function (index, value) {
                        $('#district').append('<option value="' + index + '">' + value + '</option>');
                    });
                    $('.selectpicker').selectpicker();
                });
            });

            var lat = "{{ (float)$villa->latitude }}";
            var lng = "{{ (float)$villa->longitude }}";

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
                        icon: "{{ url('assets/admin/pic/pin.png') }}"
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

            $(document).ready(function () {
                if (!$('#last_discount').is(':checked')) {
                    $('.some_price_last').prop('required', true);
                    $('.some_price_last').show();
                }
                $('#last_discount').change(function () {
                    if ($(this).is(':checked')) {
                        $('.some_price_last').each(function () {
                            $(this).prop('required', true);
                            $(this).show();
                        });
                    } else {
                        $('.some_price_last').each(function () {
                            $(this).val('');
                            $(this).prop('required', false);
                            $(this).hide();
                        });
                    }
                });
            });
        </script>
        <script>
            $('#city_id').change(function () {
                var target = $(this).find(':selected').attr('data-target');
                $('#location_id option').hide();
                $('#location_id option:first').show();
                $(target).show();
                $('#location_id').val(0);
                $('#location_id').selectpicker('refresh');
            });

            $('input').not('input[type=hidden]').prop('disabled', true)
            $('select').prop('disabled', true)
            $('textarea').prop('disabled', true)

            let confirmationForm = $(".confirmation-form");
            confirmationForm.find('[name=status_message]').attr('disabled', false)
        </script>
    @endpush
@endcomponent
