@component('layouts.auth1')
@section('styles')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datepicker.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        ::-webkit-input-placeholder { /* Edge */
            text-align: right !important;
        }

        :-ms-input-placeholder { /* Internet Explorer 10-11 */
            text-align: right !important;
        }

        ::placeholder {
            text-align: right !important;
        }

        .text_l {
            text-align: left;
        }

        .set-bg {
            text-align: center;
            background: #eeeeee61;
            color: #000;
            padding: 20px;
            border-radius: 5px;
        }

        .select2-container {
            width: 100% !important;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple, .select2-container--default .select2-selection--multiple {
            border: unset !important;
            background: unset !important;
            background-color: unset !important;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__rendered {
            border: unset !important;
            border-radius: 50px;
            padding: 7px 15px !important;
            background-color: #ededed;
            width: 100%;
        }
    </style>
    <style>
        .control_box select {
            border: unset;
            border-radius: 50px;
            padding: 10px 15px;
            background-color: #ededed;
            width: 100%;
        }

        .selectgroup {
            display: -ms-inline-flexbox;
            display: inline-flex
        }

        .selectgroup-item {
            -ms-flex-positive: 1;
            flex-grow: 1;
            position: relative
        }

        .selectgroup-item + .selectgroup-item {
            margin-left: -1px
        }

        .selectgroup-item:not(:last-child) .selectgroup-button {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0
        }

        .selectgroup-item:not(:first-child) .selectgroup-button {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0
        }

        .selectgroup-input {
            opacity: 0;
            position: absolute;
            z-index: -1;
            top: 0;
            left: 0
        }

        .selectgroup-input-radio {
            opacity: 0;
            position: absolute;
            z-index: -1;
            top: 0;
            left: 0
        }

        .selectgroup-button {
            background-color: #fdfdff;
            border-color: #e4e6fc;
            border-width: 1px;
            border-style: solid;
            display: block;
            text-align: center;
            padding: 0 1rem;
            height: 44px;
            position: relative;
            cursor: pointer;
            border-radius: 50px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            font-size: 13px;
            min-width: 2.375rem;
            line-height: 44px
        }

        .selectgroup-button-icon {
            padding-left: 0.5rem;
            padding-right: 0.5rem
        }

        .selectgroup-button-icon i {
            font-size: 14px
        }

        .selectgroup-input-radio:focus + .selectgroup-button,
        .selectgroup-input-radio:checked + .selectgroup-button {
            background-color: #db2b2d;
            color: #fff;
            z-index: 1
        }

        .selectgroup-pills {
            display: block;
            flex-wrap: wrap;
            align-items: flex-start
        }

        .selectgroup-pills .selectgroup-item {
            margin-right: 0.5rem;
            flex-grow: 0
        }

        .selectgroup-pills .selectgroup-button {
            border-radius: 50px !important
        }

        .selectgroup-pills input:checked + span {
            background-color: #db2b2d;
            border-radius: 50px !important;
            color: #fff;
            z-index: 1
        }

        .single_label {
            float: left;
            font-size: 12px;
            padding: 0 15px;
            color: #3d3b3b;
        }

        .w100 {
            width: 100%;
        }

        .turk > img, .iran > img {
            width: 20px;
        }

        .dropdown-toggle::after {
            display: none;
        }

        #btn_type > img {
            width: 20px;
        }

        #btn_type {
            position: absolute;
            top: -34px;
            left: -10px;
            padding-right: 5px;
            padding-left: 5px;
            background: unset;
        }

        #btn_type:focus, #btn_type:active {
            outline: unset !important;
            border: unset !important;
        }

        button:focus {
            outline: none !important;
        }

        #ul_type {
            top: -10px;
            min-width: 72px;
            background: unset;
            border: unset;
            box-shadow: unset;
        }

        #ul_type > li > a {
            background: unset !important;
        }

        #ul_type > li > a:hover {
            background: unset;
        }

        .dis_none {
            display: none !important;
        }

        .btn-primary:hover {
            color: darkred !important;
            border: unset !important;
        }

        .btn-primary.active, .btn-primary:active, .open > .dropdown-toggle.btn-primary {
            color: darkred !important;
            border: unset !important;
        }

        #btn_type > #type_num {
            font-size: 12px;
        }

        .log_des_box p {
            font-size: 13px;
        }

        .log_des_box p a {
            color: darkred;
            font-size: 15px;
            margin-right: 5px;
        }

        #mobile::-webkit-input-placeholder { /* Edge */
            text-align: left !important;
            direction: ltr;
        }

        #mobile::-ms-input-placeholder { /* Internet Explorer 10-11 */
            text-align: left !important;
            direction: ltr;
        }

        #mobile::placeholder {
            text-align: left !important;
            direction: ltr;
        }
    </style>
@endsection
@php
    $setting = App\Setting::find(1);
@endphp

@slot('body')
    <div class="uk-width-1-4@m uk-align-center cont_box_1">
        <div class="cont_box">
            <div class="title_box">
                <h3>ثبت نام</h3>
            </div>
            {{ Form::open(array('route' => 'register', 'method' => 'post', 'files' => true)) }}
            <div class="control_box" style="position: relative">
                <label for="mobile" class="float-right">موبایل</label>
                <input id="mobile" name="mobile" type="text" class="text-left mobile"
                       style="direction:ltr;padding-left: 85px" placeholder="(---) --- ----" value="{{old('mobile')}}">
                <input type="text" name="type_country" id="type_country" value="{{old('type_country','tr')}}" hidden>
                <input type="text" name="type" id="type" value="user" hidden>
                <div class="dropdown">
                    <button id="btn_type" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                        <span id="type_num">90+</span>
                        <img id="image_set" src="{{asset('new/img/icon/tr.png')}}">
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu" id="ul_type">
                        <li id="turk_li" class="dis_none"><a href="javascript:void(0);" onclick="set_type_tel('tr')"
                                                             class="turk"><img
                                        src="{{asset('new/img/icon/tr.png')}}"></a></li>
                        <li id="iran_li"><a href="javascript:void(0);" onclick="set_type_tel('fa')" class="iran"><img
                                        src="{{asset('new/img/icon/fa.png')}}"></a></li>
                        <li id="iran_li"><a href="javascript:void(0);" onclick="set_type_tel('')" class="iran">سایر</a></li>
                    </ul>
                </div>
            </div>
            <div class="control_box">
                <label for="password" class="float-right">رمز عبور</label>
                <input id="password" name="password" type="password" class="text-left"
                       style="direction: ltr"
                       placeholder="رمز عبور خود را وارد کنید" value="{{old('password')}}">
            </div>
            <div class="control_box">
                <label for="full_name" class="float-right">نام و نام خانوادگی</label>
                <input id="full_name" name="full_name" type="text" placeholder="نام و نام خانوادگی"
                       value="{{old('full_name')}}">
            </div>

            <div class="control_box">
                <label for="job" class="float-right">شغل</label>
                <input id="job" name="job" type="text" placeholder="شغل" value="{{old('job')}}">
            </div>

            <div class="control_box mt-4">
                <ul class="ul">
                    <li class="float-left w100">
                        <button type="submit">ثبت نام</button>
                    </li>
                    <li class="contact-item">
                        <img class="contact-icon" src="{{ asset('new/img/icon/instagram.png') }}">
                        <a class="contact-content" href="https://www.instagram.com/khaneistanbul/?hl=en">khaneistanbul</a>
                    </li>
                    {{--                        <li class="check_box">--}}
                    {{--                            <input name="remember" type="checkbox" placeholder="">--}}
                    {{--                            مرا به خاطر داشته باش--}}
                    {{--                        </li>--}}
                </ul>

            </div>
            <div class="log_des_box">
                <p>قبلا در خانه استانبول ثبت نام کرده اید ؟<a href="{{ url('login') }}">وارد شوید</a></p>
            </div>
            {{ Form::close() }}
        </div>
    </div>

@endslot
@section('scripts')

    <script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-datepicker-fa.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-select.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-select-fa_IR.min.js') }}"></script>
    <script src="{{ asset('editor/laravel-ckeditor/adapters/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('new/js/jquery.mask.min.js') }}"></script>

    <script>
        function set_type_tel(a) {
            if (a == 'tr') {
                $('#turk_li').addClass('dis_none');
                $('#iran_li').removeClass('dis_none');
                var src = '{{asset('new/img/icon/tr.png')}}'
                document.getElementById("image_set").src = src;
                $('#type_num').html('90+')
            }
            if (a == 'fa') {
                $('#iran_li').addClass('dis_none');
                $('#turk_li').removeClass('dis_none');
                var src = '{{asset('new/img/icon/fa.png')}}'
                document.getElementById("image_set").src = src;
                $('#type_num').html('98+')
            }
            $('#type_country').val(a)

        }

        @if(old('type_country') and old('type_country')=='fa')
        $(document).ready(function () {
            $('#iran_li').addClass('dis_none');
            $('#turk_li').removeClass('dis_none');
            var src = '{{asset('new/img/icon/fa.png')}}'
            document.getElementById("image_set").src = src;
            $('#type_num').html('98+')
            $('#mobile').attr("placeholder", "9×××××××××");
        });
        @endif
        @if(old('type_country') and old('type_country')=='tr')
        $(document).ready(function () {
            $('#turk_li').addClass('dis_none');
            $('#iran_li').removeClass('dis_none');
            var src = '{{asset('new/img/icon/tr.png')}}'
            document.getElementById("image_set").src = src;
            $('#type_num').html('90+')
            $('#mobile').attr("placeholder", "5×××××××××");
        });
        @endif
        // alert(currentType);
        // $("input:radio[name='type']").filter('[value=1]').prop('checked', true);
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

        let currentType = $('.selectgroup-input-radio:checked');
        user_type(currentType);
        $("input[name='type']").click(function () {
            user_type($(this));
        });

        function user_type(el) {
            let category = el.val();
            if (category < 2) {
                $('.advanced').fadeIn();
            } else {
                $('.advanced').fadeOut()
            }
        }
    </script>

    <script type="text/javascript">


        $('#submit-btn').click(function () {
            var $captcha = $('#recaptcha'),
                response = grecaptcha.getResponse();

            if (response.length === 0) {
                if (!$captcha.hasClass("error")) {
                    $captcha.addClass("error");
                }
            } else {
                $captcha.removeClass("error");
                $('#form-validation').submit();
            }
        })

        $('.mobile').mask('(000) 000 0000');
    </script>
@endsection
@endcomponent