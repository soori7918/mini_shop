<?php $__env->startComponent('layouts.auth'); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap-datepicker.min.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap-select.min.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/select2.min.css')); ?>"/>
    <style>
        .jGrowl-notification {
            text-align: right;
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
    </style>
<?php $__env->stopSection(); ?>
<?php
    $setting = App\Setting::find(1);
?>

<?php $__env->slot('body'); ?>
    <div class="uk-width-1-2@m uk-align-center cont_box_1" style="margin-top: 30px!important">
        <?php if($status=='pending'): ?>
            <div class="cont_box">
                <div class="title_box">
                    <p class="text-right">کد ارسالی به شماره همراه را وارد نمایید</p>
                </div>
                <?php echo e(Form::open(array('route' => 'front.complete', 'method' => 'get'))); ?>

                <div class="control_box">
                    
                    <input id="code" name="code" class="invoice-input text-left dir-ltr" type="text"
                           value="<?php echo e(old('mobile')); ?>">
                </div>

                <div class="control_box mt-4">
                    <ul class="ul">
                        <li class="mx-auto">
                            <button type="submit">بررسی</button>
                        </li>
                    </ul>

                </div>
                <?php echo e(Form::close()); ?>

            </div>
        <?php else: ?>
            <div class="cont_box">
                <div class="title_box">
                    <?php if(Auth::user()->hasRole('کاربر')): ?>
                        <h3>تکمیل ثبت نام کاربر</h3>
                    <?php elseif(Auth::user()->hasRole('مدیر ملک')): ?>
                        <h3>تکمیل ثبت نام کارشناس</h3>
                    <?php endif; ?>
                </div>
                <?php echo e(Form::open(array('route' => 'front.complete-store', 'method' => 'post', 'files' => true))); ?>

                <?php if(Auth::user()->hasRole('کاربر')): ?>
                    <div class="advanced uk-grid-small" uk-grid>
                        <div class="control_box uk-width-1-2@s">
                            <label for="reagent" class="float-right">نام معرف</label>
                            <input id="reagent" name="reagent" type="text" placeholder="نام معرف"
                                   value="<?php echo e(old('reagent')); ?>">
                        </div>
                        <div class="control_box uk-width-1-2@s">
                            <label for="email" class="float-right">ایمیل </label>
                            <input id="email" name="email" type="email" placeholder="ایمیل " value="<?php echo e(old('email')); ?>">
                        </div>
                        <div class="control_box uk-width-1-2@s">
                            <label for="gender" class="float-right">جنسیت</label>
                            <?php echo e(Form::select('gender',['0'=>'مرد','1'=>'زن'], null, array('placeholder' => 'جنسیت'))); ?>

                        </div>
                        <div class="control_box uk-width-1-2@s">
                            <label for="acquaintance" class="float-right">نحوه آشنایی</label>
                            <input id="acquaintance" name="acquaintance" type="text" placeholder="نحوه آشنایی"
                                   value="<?php echo e(old('acquaintance')); ?>">
                        </div>
                        <div class="control_box uk-width-1-2@s">
                            <label for="type_request" class="float-right">نوع درخواست</label>
                            <?php echo e(Form::select('type_request',['rent'=>'کرایه','buy'=>'خرید'], null, array('placeholder' => 'نوع درخواست'))); ?>

                        </div>
                        <div class="control_box uk-width-1-2@s">
                            <label for="location" class="float-right">منطقه مدنظر</label>
                            <?php echo e(Form::select('location[]',[array_pluck(\App\Location::all(), 'name', 'id')], null, array('class' => 'select2', 'multiple'))); ?>

                        </div>
                        <div class="control_box uk-width-1-2@s">
                            <label for="room_number" class="float-right">تعداد اتاق خواب</label>
                            <input id="room_number" name="room_number" type="number" placeholder="تعداد اتاق خواب"
                                   value="<?php echo e(old('room')); ?>">
                        </div>
                        <div class="control_box uk-width-1-2@s">
                            <label for="budget" class="float-right">بودجه به لیر</label>
                            <input id="budget" name="budget" type="text" placeholder="بودجه به لیر"
                                   value="<?php echo e(old('budget')); ?>">
                        </div>
                        <div class="control_box uk-width-1-2@s">
                            <label for="living_country" class="float-right">موقعیت جغرافیایی فعلی</label>
                            <?php echo e(Form::select('living_country',['iran'=>'ایران','turkey'=>'ترکیه'], auth()->user()->country=='tr'?'turkey':'iran', array('id'=>'living_country','placeholder' => 'موقعیت جغرافیایی فعلی'))); ?>

                        </div>
                        <div class="control_box uk-width-1-2@s">
                            <label for="consulting" class="float-right">نیاز به مشاوره آنلاین</label>
                            <?php echo e(Form::select('consulting',['0'=>'ندارم','1'=>'دارم'], null, array('placeholder' => 'نیاز به مشاوره آنلاین'))); ?>

                        </div>

                        <div class="control_box uk-width-1-1@s">
                            <label for="text" class="float-right">توضیح ملک مدنظر شما</label>
                            <textarea name="text" id="text" rows="3"
                                      placeholder="توضیح ملک مدنظر شما"><?php echo e(old('text')); ?></textarea>
                        </div>

                        <div class="selectgroup w-100">
                            <label class="selectgroup-item">
                                <input type="radio" name="instant" value="فوری" class="selectgroup-input-radio" checked>
                                <span class="selectgroup-button">فوری</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="instant" value="عجله ندارم" class="selectgroup-input-radio">
                                <span class="selectgroup-button">عجله ندارم</span>
                            </label>
                        </div>

                    </div>
                <?php elseif(Auth::user()->hasRole('مدیر ملک')): ?>
                    <div class="advanced uk-grid-small" uk-grid>

                        <div class="control_box uk-width-1-2@s">
                            <label for="fname_en" class="float-right">نام (لاتین پاسپورتی)</label>
                            <input id="fname_en" name="fname_en" class="text-left" type="text"
                                   placeholder="نام (لاتین پاسپورتی) " value="<?php echo e(old('fname_en')); ?>">
                        </div>
                        <div class="control_box uk-width-1-2@s">
                            <label for="lname_en" class="float-right">نام خانوادگی (لاتین پاسپورتی)</label>
                            <input id="lname_en" name="lname_en" class="text-left" type="text"
                                   placeholder="نام خانوادگی (لاتین پاسپورتی) " value="<?php echo e(old('lname_en')); ?>">
                        </div>
                        <div class="control_box uk-width-1-2@s">
                            <label for="father_name" class="float-right">نام پدر</label>
                            <input id="father_name" name="father_name" type="text" placeholder="نام پدر "
                                   value="<?php echo e(old('father_name')); ?>">
                        </div>
                        <div class="control_box uk-width-1-2@s">
                            <label for="email" class="float-right">ایمیل </label>
                            <input id="email" name="email" type="email" placeholder="ایمیل " value="<?php echo e(old('email')); ?>">
                        </div>
                        <div class="control_box uk-width-1-2@s">
                            <label for="gender" class="float-right">جنسیت</label>
                            <?php echo e(Form::select('gender',['0'=>'مرد','1'=>'زن'], null, array('placeholder' => 'جنسیت'))); ?>

                        </div>
                        <div class="control_box uk-width-1-2@s">
                            <label for="living_country" class="float-right">کشور</label>
                            <?php echo e(Form::select('living_country',[array_pluck($country, 'fa_name', 'id')], null, array('id'=>'living_country','placeholder' => 'کشور'))); ?>

                        </div>
                        <div class="control_box uk-width-1-2@s">
                            <label for="nationality" class="float-right">ملیت</label>
                            <input id="nationality" name="nationality" type="text" placeholder="ملیت"
                                   value="<?php echo e(old('nationality')); ?>">
                        </div>
                        <div class="control_box uk-width-1-2@s">
                            <div class="control_box">
                                <label for="nationality" class="float-right">َشماره پاسپورت/کدملی</label>
                                <input id="ncode" name="ncode" class="text-left" type="text"
                                       placeholder="َشماره پاسپورت/کدملی" value="<?php echo e(old('ncode')); ?>"
                                       title=" فقط عدد و حروف a-z بصورت کوچک و بزرگ مجاز است">
                            </div>
                        </div>
                        <div class="control_box uk-width-1-1@s">
                            <label for="postal_address" class="float-right">آدرس کامل محل سکونت</label>
                            <textarea name="postal_address" id="postal_address" rows="3"
                                      placeholder="آدرس کامل محل سکونت"><?php echo e(old('address')); ?></textarea>
                        </div>
                        <div class="control_box uk-width-1-1@s">
                            <label for="address_pic" class="float-right">پروف آدرس</label>
                            <input type="file" accept="image/*" name="address_pic" id="address_pic">
                        </div>
                        <div class="control_box uk-width-1-1@s">
                            <label for="passport_pic" class="float-right">پروف پاسپورت</label>
                            <input type="file" accept="image/*" name="passport_pic" id="passport_pic">
                        </div>
                    </div>
                <?php endif; ?>
                <div class="control_box mt-4">
                    <ul class="ul">
                        <li class="mx-auto">
                            <button type="submit">ادامه</button>
                        </li>
                    </ul>

                </div>
                <?php echo e(Form::close()); ?>

            </div>
        <?php endif; ?>
    </div>

<?php $__env->endSlot(); ?>
<?php $__env->startSection('scripts'); ?>

    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-datepicker.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('bundles/cleave-js/dist/cleave.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('bundles/cleave-js/dist/addons/cleave-phone.us.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-datepicker-fa.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-select.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-select-fa_IR.min.js')); ?>"></script>
    <script src="<?php echo e(asset('editor/laravel-ckeditor/adapters/jquery.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
    <script>
        var cleaveI = new Cleave('.invoice-input', {
            prefix: 'K-',
            // delimiter: '-',
            blocks: [7],
            uppercase: true
        });
    </script>
    <script>
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
        // living_country($('#living_country'));
        // $('#living_country').change(function () {
        //     living_country($(this));
        // })
        // function living_country(el) {
        //     let val=el.val();
        //     if(val=='iran'){
        //         $('.bill').show();
        //         $('.kimlik').hide();
        //     }else{
        //         $('.bill').show();
        //         $('.kimlik').show();
        //     }
        // }
        // let currentType=$('.selectgroup-input-radio:checked');
        // user_type(currentType);
        // $("input[name='type']").click(function() {
        //     user_type($(this));
        // });
        // function user_type(el) {
        //     let category = el.val();
        //     if(category<2){
        //         $('.advanced').fadeIn();
        //     }else{
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

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->renderComponent(); ?>