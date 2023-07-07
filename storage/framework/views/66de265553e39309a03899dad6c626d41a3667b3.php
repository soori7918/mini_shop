<?php $__env->startComponent('layouts.auth'); ?>
<?php $__env->startSection('styles'); ?>

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap-datepicker.min.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap-select.min.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/select2.min.css')); ?>"/>
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
<?php $__env->stopSection(); ?>
<?php
    $setting = App\Setting::find(1);
?>

<?php $__env->slot('body'); ?>
    <div class="uk-width-1-2@m uk-align-center cont_box_1">
        <div class="cont_box">
            <div class="title_box">
                <h3>ثبت نام</h3>
            </div>
            <?php echo e(Form::open(array('route' => 'register', 'method' => 'post', 'id' => 'reg_form', 'files' => true))); ?>



            <?php if(request()->get('ref')): ?>
                <input type="hidden" name="ref" value="<?php echo e(request()->get('ref')); ?>">
            <?php endif; ?>
            <div class="step_1" id="step_1">
                <input type="hidden" name="userType" value="1">
                <div class="control_box" style="position: relative">
                    <label for="mobile" class="float-right">موبایل</label>
                    <input id="mobile" name="mobile" type="text" class="text-left mobile"
                           style="direction:ltr; padding-left: 85px" placeholder="(---) --- ----" value="<?php echo e(old('mobile')); ?>" required>
                    <input type="text" name="type_country" id="type_country" value="<?php echo e(old('type_country','tr')); ?>" hidden>
                    <input type="text" name="type" id="type" value="expert_sell" hidden>
                    <div class="dropdown">
                        <button id="btn_type" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                            <input type="text" id="phone_type" value="90+" hidden>
                            <span id="type_num">90+</span>
                            <img id="image_set" src="<?php echo e(asset('new/img/icon/tr.png')); ?>">
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu" id="ul_type">
                            <li id="turk_li" class="dis_none"><a href="javascript:void(0);" onclick="set_type_tel('tr')"
                                                                 class="turk"><img
                                            src="<?php echo e(asset('new/img/icon/tr.png')); ?>"></a></li>
                            <li id="iran_li"><a href="javascript:void(0);" onclick="set_type_tel('fa')" class="iran"><img
                                            src="<?php echo e(asset('new/img/icon/fa.png')); ?>"></a></li>
                            <li id="order_li"><a href="javascript:void(0);" onclick="set_type_tel('order')" class="iran">
                                    <img src="<?php echo e(asset('new/img/icon/world.png')); ?>">
                                </a></li>
                        </ul>
                    </div>
                </div>
                <a class="btn btn-danger" onclick="send_code()">ارسال کد</a>
            </div>
            <div class="step_2" id="step_2" style="display: none">
                <input type="hidden" name="userType" value="1">
                <div class="control_box" style="position: relative">
                    <label for="mobile" class="float-right">کد ارسالی</label>

                    <input type="text" name="veryfi_code" id="veryfi_code" value="" >

                </div>
                <a class="btn btn-danger" onclick="check_code()">تائید کد</a>
            </div>

            <div class="step_3" id="step_3" style="display: none">
                <div class="control_box">
                    <label for="password" class="float-right">رمز عبور</label>
                    <input id="password" name="password" type="password"
                           class="text-left"
                           style="direction: ltr"
                           placeholder="رمز عبور خود را وارد کنید" value="<?php echo e(old('password')); ?>" required>
                </div>
                <div class="control_box">
                    <label for="password" class="float-right">تکرار رمز عبور</label>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                           class="text-left"
                           style="direction: ltr"
                           placeholder="تکرار رمز عبور خود را وارد کنید" value="<?php echo e(old('password_confirmation')); ?>" required>
                </div>
                <div class="control_box">
                    <label for="full_name" class="float-right">نام و نام خانوادگی</label>
                    <input id="full_name" name="full_name" type="text" placeholder="نام و نام خانوادگی"
                           value="<?php echo e(old('full_name')); ?>" required>
                </div>
                <div class="advanced uk-grid-small" uk-grid>
                    <?php
                        $user_id=0;
                            if (request('ref')){
                                $user=\App\User::where('code',request('ref'))->first();
                                if ($user){
                                    $user_id=$user->id;
                                }
                            }
                    ?>
                    <div class="control_box uk-width-1-2@s" <?php echo e($user_id>0?'hidden':''); ?>>
                        <label for="user_id">کارشناس معرف</label>
                        <select class="" id="user_id" name="user_id">
                            <option value="0" selected>بدون معرف</option>
                            <?php $__currentLoopData = \App\User::role(['مدیر ملک','مدیر','call center','call center(sales)'])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($admin_user->id); ?>" <?php echo e(old('user_id') || $user_id == $admin_user->id ? 'selected' : ''); ?>><?php echo e($admin_user->first_name .' '.$admin_user->last_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                </div>
                <div class="control_box mt-4">
                    <ul class="ul">
                        <li class="float-left w100">
                            <button class="d-none" id="reg_btn" type="submit">ثبت نام</button>
                            <button id="check" type="button">ثبت نام</button>
                        </li>
                        
                        
                        
                        
                    </ul>

                </div>
            </div>


            <div class="log_des_box">
                <p>قبلا در خانه استانبول ثبت نام کرده اید ؟<a href="<?php echo e(route('login_office')); ?>">وارد شوید</a></p>
            </div>

            <?php echo e(Form::close()); ?>

        </div>
    </div>
    <!-- The Modal -->
    <div class="modal" id="preloaderModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 style="line-height: 95px;text-align: right">
                                در حال انجام عملیات ...
                            </h3>
                        </div>
                        <div class="col-md-4">
                            <img src="<?php echo e(asset('img/preloader.gif')); ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->endSlot(); ?>
<?php $__env->startSection('scripts'); ?>

    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-datepicker.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-datepicker-fa.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-select.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-select-fa_IR.min.js')); ?>"></script>
    <script src="<?php echo e(asset('editor/laravel-ckeditor/adapters/jquery.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('new/js/jquery.mask.min.js')); ?>"></script>

    <script>
        function send_code() {
            var mobile = $('#mobile').val();
            var type = $('#phone_type').val();
            if(type=='+++' || type=='98+'){
                $('#step_1').hide();
                $('#step_3').show();
            }else{
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "<?php echo e(route('front.register.office.send.code')); ?>",
                    method: "POST",
                    data: {
                        mobile: mobile,
                        type: type,
                    },
                    dataType: "json",
                    success: function (data) {
                        if (data.error==true){
                            alert(data.masage)
                        }else {
                            $('#step_1').hide();
                            $('#step_2').show();
                        }
                    }
                });
            }

        }
        function check_code() {
            var veryfi_code = $('#veryfi_code').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(route('front.register.office.check.code')); ?>",
                method: "POST",
                data: {
                    veryfi_code: veryfi_code,
                },
                dataType: "json",
                success: function (data) {

                    if (data.error==true){
                        alert(data.masage)
                    }else {
                        $('#step_2').hide();
                        $('#step_3').show();
                    }
                }
            });
        }

        function set_type_tel(a) {
            if (a == 'tr') {
                $('#turk_li').addClass('dis_none');
                $('#iran_li').removeClass('dis_none');
                $('#order_li').removeClass('dis_none');
                var src = '<?php echo e(asset('new/img/icon/tr.png')); ?>'
                document.getElementById("image_set").src = src;
                $('#type_num').html('90+')
                $('#phone_type').val('90+')
            }
            if (a == 'fa') {
                $('#iran_li').addClass('dis_none');
                $('#turk_li').removeClass('dis_none');
                var src = '<?php echo e(asset('new/img/icon/fa.png')); ?>'
                document.getElementById("image_set").src = src;
                $('#type_num').html('98+')
                $('#phone_type').val('98+')
            }
            if (a == 'order') {
                $('#order_li').addClass('dis_none');
                $('#turk_li').removeClass('dis_none');
                $('#iran_li').removeClass('dis_none');
                var src = '<?php echo e(asset('new/img/icon/world.png')); ?>'
                document.getElementById("image_set").src = src;
                $('#type_num').html('+++')
                $('#phone_type').val('+++')
            }
            $('#type_country').val(a)

        }

        <?php if(old('type_country') and old('type_country')=='fa'): ?>
        $(document).ready(function () {
            $('#iran_li').addClass('dis_none');
            $('#turk_li').removeClass('dis_none');
            var src = '<?php echo e(asset('new/img/icon/fa.png')); ?>'
            document.getElementById("image_set").src = src;
            $('#type_num').html('98+')
            $('#phone_type').val('98+')
        });
        <?php endif; ?>
        <?php if(old('type_country') and old('type_country')=='tr'): ?>
        $(document).ready(function () {
            $('#turk_li').addClass('dis_none');
            $('#iran_li').removeClass('dis_none');
            var src = '<?php echo e(asset('new/img/icon/tr.png')); ?>'
            document.getElementById("image_set").src = src;
            $('#type_num').html('90+');
            $('#phone_type').val('90+');
        });
        <?php endif; ?>
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

        // function user_type(el) {
        //     let category = el.val();
        //     if (category < 2) {
        //         $('.advanced').fadeIn();
        //     } else {
        //         $('.advanced').fadeOut()
        //     }
        // }
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
    <script>
        document.getElementById("check").onclick = function() {
            let allAreFilled = true;
            document.getElementById("reg_form").querySelectorAll("[required]").forEach(function(i) {
                if (!allAreFilled) return;
                if (!i.value) allAreFilled = false;
                if (i.type === "radio") {
                    let radioValueCheck = false;
                    document.getElementById("myForm").querySelectorAll(`[name=${i.name}]`).forEach(function(r) {
                        if (r.checked) radioValueCheck = true;
                    })
                    allAreFilled = radioValueCheck;
                }
            })
            if (allAreFilled) {
                $('#preloaderModal').modal('show');
            }
            $('#reg_btn').click();
        };
    </script>
    <script>
        $('#full_name').on('keypress', function (event) {
            var regex = new RegExp("^[a-zA-Z0-9]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (regex.test(key)) {
                event.preventDefault();
                $.jGrowl('فقط حروف فارسی مورد پذبرش است', {life: 3000, position: 'bottom-right', theme: 'bg-info'});
                return false;
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->renderComponent(); ?>
