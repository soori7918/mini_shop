@component('layouts.back')
    @slot('title') افزودن {{ $title }} @endslot
    @slot('body')
        <style>
            .budget_type{
                margin-top: 30px !important;
            }
        </style>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>
                    </div>
                    <h4>
                        ارزیابی
                    </h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('user_questionnaire_store')}}" method="post" enctype="multipart/form-data">
                    {{ Form::model($item, array('route' => array('user_questionnaire_store'), 'method' => 'POST', 'files' => true, 'style' => 'width:100%!important;min-width:100%!important')) }}
                    <input type="hidden" value="{{$id}}" name="user_id">
                    <div class="form-row">
                        @role('مدیر')
                        <div class="col-md-6">
                            <label for="user_id">کارشناس معرف</label>
                            <select class="form-control" id="user_id" name="user_id">
                                <option value="0" {{ old('user_id') == 0 ? 'selected' : ''  }}>ندارد</option>
                                @foreach(\App\User::role('مدیر ملک')->get() as $admin_user)
                                    <option
                                            value="{{ $admin_user->id }}"
                                            {{ old('user_id') == $admin_user->id ? 'selected' : '' }}>
                                        {{ $admin_user->first_name .' '.$admin_user->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @endrole

                        <div class="col-md-6">
                            <label for="first_name">آیا حیوان خانگی دارید؟ چه حیوانی‌ چه نژادی؟</label>
                            <input type="text"
                                   id="pet"
                                   name="pet"
                                   class="form-control"
                                   value="{{$item?$item->pet:''}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="property_type">منزل مد نظرتان از چه نوعی است ؟</label>
                            <select class="form-control selectpicker"
                                    id="property_type"
                                    name="property_type[]" multiple>
                                @php
                                    $property_type = [];
                                    if($item){
                                        if ($item->property_type != 'N;'){
                                            $property_type = unserialize($item->property_type);
                                        }
                                    }
                                @endphp
                                @foreach(\App\Villa::types() as $key => $type)
                                    <option
                                            value="{{ $key }}" {{ in_array($key,$property_type)? 'selected' : '' }}>{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                @php
                                    $villa_view = [];
                                    if($item){
                                        if ($item->villa_view != 'N;'){
                                            $villa_view = unserialize($item->villa_view);
                                        }
                                    }
                                @endphp
                                {{ Form::label('villa_view', 'چه منظره‌ای مد نظرتون هست؟') }}
                                {{ Form::select('villa_view[]', array('sea' => 'دریا', 'jungle' => 'جنگل', 'city' => 'شهر'), $villa_view, array('class' => 'form-control selectpicker','multiple', )) }}
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                {{ Form::label('vehicle', 'وسیلهٔ نقلیه شخصی دارید یا از وسایل نقلیه عمومی استفاده می‌کنید؟') }}
                                {{ Form::select('vehicle', array('شخصی' => 'شخصی', 'عمومی' => 'عمومی'), $item?$item->vehicle:'', array('class' => 'form-control selectpicker', )) }}
                            </div>
                        </div>
                        @if(auth()->user()->hasRole('call center(sales)'))
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                @php
                                    $properties_in = [];
                                    if($item){
                                        if ($item->properties_in != 'N;'){
                                            $properties_in = unserialize($item->properties_in);
                                        }
                                    }
                                @endphp
                                {{ Form::label('properties_in', 'چه امکانات داخلی براتون مهم هست که داشته باشه؟ ', array('style' => 'font-size: 10px')) }}
                                {{ Form::select('properties_in[]', array_pluck($propertiesin, 'name', 'id'), $properties_in, array('class' => 'form-control selectpicker', 'multiple')) }}
                            </div>
                        </div>
                        @else
                            <div class="col-md-6 col-xs-12 lavazem-container">
                                <label for="lavazem">امکانات داخلی چی براتون مهمه؟</label>
                                <select class="form-control selectpicker" id="lavazem" name="lavazem">
                                    <option value="مبله کامل" {{ old('type_request') == 'مبله کامل' ? 'selected' : '' }}>مبله کامل</option>
                                    <option value="آشپزخانه مبله" {{ old('type_request', 'آشپزخانه مبله') == 'آشپزخانه مبله' ? 'selected' : '' }}>آشپزخانه مبله</option>
                                    <option value="بدون وسایل" {{ old('type_request', 'بدون وسایل') == 'بدون وسایل' ? 'selected' : '' }}>بدون وسایل</option>
                                </select>
                            </div>
                        @endif
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                @php
                                    $properties_out = [];
                                    if($item){
                                        if ($item->properties_out != 'N;'){
                                            $properties_out = unserialize($item->properties_out);
                                        }
                                    }
                                @endphp
                                {{ Form::label('properties_out', 'چه امکانات رفاهی براتون مهم هست که داشته باشه؟ ', array('style' => 'font-size: 10px')) }}
                                {{ Form::select('properties_out[]', array_pluck($propertiesout, 'name', 'id'), $properties_out, array('class' => 'form-control selectpicker', 'multiple')) }}
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group @if($errors->has('slug')) has-danger @endif">
                                {{ Form::label('built_year', 'حداکثر سن بنا چقدر باشه؟ (نوساز = 0 یا سال را وارد نمایید)') }}
                                {{ Form::number('built_year', $item?$item->built_year:'', array('class' => 'form-control','min'=>0)) }}
                            </div>
                        </div>
                        <style>
                            .dollar-picker{
                                margin-top: 31px !important;
                            }
                        </style>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group bootstrap-selects @if($errors->has('price')) has-danger @endif">
                                {{ Form::label('price', 'قیمت حدودی مد نظرتون چقدر هست؟ ') }}
                                {{ Form::text('price', $item?(int)$item->price:'', array('class' => 'form-control text-center price_input price_mask')) }}  {{-- 'onkeypress' => 'isPriceKey($(this))' , --}}
                                {{ Form::select('price_type', array('lira'=>'لیر', 'dollar' => ' دلار','rial' => 'ریال', 'euro' => 'یورو'), $item?$item->price_type:'', array('class' => 'form-control selectpicker dollar-picker', 'style' => 'width:26%;margin-right:.2rem;float:right')) }}
                            </div>
                        </div>

                        @if(auth()->user()->hasRole('call center(sales)'))
                        <div class="col-md-12">
                            <label for="text" class="d-block w-100 mb-1">چه مواردی شما را از خرید آن خانه منصرف میکنند؟</label>
                            <textarea id="text" name="cancel_reasons" class="form-control">{{$item?$item->cancel_reasons:''}}</textarea>
                        </div>
                        @endif
                        <div class="col-md-12">
                            <label for="text" class="d-block w-100 mb-1">توضیحات</label>
                            <textarea id="text" name="description" class="form-control">{{$item?$item->description:''}}</textarea>
                        </div>
                        <style>
                            .custom-file-label{
                                padding-top: 7px;
                                height: 31px;
                            }
                            .link{
                                padding: .375rem .75rem;
                                padding-top: 0.375rem;
                                line-height: 1.5;
                                color: #ffffff;
                                background-color: rgba(255, 255, 255, 0.2);
                                border: 0px solid #ced4da;
                                border-radius: .25rem;
                            }
                        </style>
                        <div class="form-group">
                            {{ Form::label('name', 'پیوست') }}
                            <div class="custom-file">
                                {{ Form::file('file', array('accept' => '*', 'class' => 'custom-file-input', 'id' => 'customFile')) }}
                                <label class="custom-file-label" for="customFile">Choose file</label>
                                @if($item)
                                <a class="link" href="{{url($item->file)}}" target="_blank">مشاهده فایل آپلود شده</a>
                                @endif
                            </div>

                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mt-4 mr-auto">
                            <button type="submit" class="btn btn-block btn-success">ثبت</button>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    @endslot
    @push('stylesheets')
        <link rel="stylesheet" type="text/css" href="{{ url('assets/admin/css/bootstrap-datepicker.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ url('assets/admin/css/select2.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ url('assets/admin/css/bootstrap-select.min.css') }}"/>
        <style>
            .set-bg {
                text-align: center;
                background: #eeeeee61;
                color: #000;
                padding: 20px;
                border-radius: 5px;
            }
        </style>
    @endpush

    @push('scripts')
        <script type="text/javascript" src="{{ url('assets/admin/js/bootstrap-datepicker.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('assets/admin/js/bootstrap-datepicker-fa.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('assets/admin/js/bootstrap-select.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('assets/admin/js/bootstrap-select-fa_IR.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('assets/admin/js/select2.min.js') }}"></script>
        <script src="{{ url('assets/admin/js/jquery.mask.min.js') }}"></script>
        <script>
            $('#mobile').mask('(000) 000 0000');
            $('.price_mask').mask("#,##0", {reverse: true});

            var date = new Date();
            var day = ("0" + date.getDate()).slice(-2);
            var month = ("0" + (date.getMonth() + 1)).slice(-2);
            var today = date.getFullYear() + "-" + (month) + "-" + (day);
            $('.date').val(today);

        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxfZQk73sogROY9KKRmtPIsLSFSjX7o7w&libraries=places&callback=initialize"></script>
        <script type="text/javascript">
            $('.date-picker').each(function () {
                $(this).datepicker({
                    dateFormat: "yy-mm-dd"
                });
            });
            $('.select2').each(function () {
                $(this).select2();
            });
            living_country($('#living_country'));
            $('#living_country').change(function () {
                living_country($(this));
            })

            function living_country(el) {
                let val = el.val();
                if (val == 'iran') {
                    $('.bill').show();
                    $('.kimlik').hide();
                } else {
                    $('.bill').show();
                    $('.kimlik').show();
                }
            }

        </script>
    @endpush
@endcomponent
