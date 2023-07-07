<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> افزودن <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <style>
            .budget_type{
                margin-top: 30px !important;
            }
        </style>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="<?php echo e(url('/')); ?>" target="_blank"><img src="<?php echo e(logo()); ?>" style="margin-top: 10px;"></a>
                    </div>
                    <h4>
                        افزودن مشتری
                    </h4>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('user-store-save')); ?><?php echo e(request('callback_url')?'?callback_url='.request('callback_url'):''); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-row">
                        <?php if(auth()->user()->hasRole('مدیر') || auth()->user()->hasRole('call center') || auth()->user()->hasRole('call center(sales)')): ?>
                        <div class="col-md-3">
                            <label for="user_id">کارشناس معرف</label>
                            <select class="form-control select2" id="user_id" name="user_id">
                                <option value="0" <?php echo e(old('user_id') == 0 ? 'selected' : ''); ?>>ندارد</option>
                                <?php $__currentLoopData = \App\User::role(['مدیر ملک','مدیر','call center','call center(sales)'])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                        value="<?php echo e($admin_user->id); ?>"
                                        <?php echo e(old('user_id') == $admin_user->id ? 'selected' : ''); ?>>
                                        <?php echo e($admin_user->first_name .' '.$admin_user->last_name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <?php endif; ?>

                        <div class="col-md-3">
                            <label for="first_name">نام</label>
                            <input type="text"
                                   id="first_name"
                                   name="first_name"
                                   class="form-control"
                                   maxlength="100"
                                   value="<?php echo e(old('first_name')); ?>" required>
                        </div>
                        <div class="col-md-3">
                            <label for="last_name">نام خانوادگی</label>
                            <input type="text"
                                   id="last_name"
                                   name="last_name"
                                   class="form-control"
                                   maxlength="100"
                                   value="<?php echo e(old('last_name')); ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="mobile">موبایل</label>
                            <div class="form-inline">
                                <input type="text"
                                       id="mobile"
                                       name="mobile"
                                       class="form-control"
                                       style="direction: ltr; text-align: left;width: 70%"
                                       maxlength="20"
                                       placeholder="(---) --- ----"
                                       value="<?php echo e(old('mobile')); ?>" required>
                                <input type="text"
                                       id="area_code"
                                       name="area_code"
                                       class="form-control"
                                       style="direction: ltr; text-align: left;width: 25%;margin-right: 5%"
                                       placeholder="---"
                                       value="<?php echo e(old('area_code')); ?>" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="mobile1">موبایل 2</label>
                            <div class="form-inline">
                                <input type="text"
                                       id="mobile1"
                                       name="mobile1"
                                       class="form-control"
                                       style="direction: ltr; text-align: left;width: 70%"
                                       maxlength="20"
                                       placeholder="(---) --- ----"
                                       value="<?php echo e(old('mobile1')); ?>">
                                <input type="text"
                                           id="area_code1"
                                           name="area_code1"
                                           class="form-control"
                                           style="direction: ltr; text-align: left;width: 25%;margin-right: 5%"
                                           placeholder="---"
                                           value="<?php echo e(old('area_code1')); ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="job">شغل</label>
                            <input type="text"
                                   id="job"
                                   name="job"
                                   class="form-control"
                                   maxlength="100"
                                   value="<?php echo e(old('job')); ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="email">ایمیل</label>
                            <input type="email"
                                   id="email"
                                   name="email"
                                   class="form-control"
                                   maxlength="100"
                                   value="<?php echo e(old('email')); ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="gender">جنسیت</label>
                            <select class="form-control"
                                    id="gender"
                                    name="gender">
                                <option value="0" <?php echo e(old('gender') == 0 ? 'selected' : ''); ?>>مرد</option>
                                <option value="1" <?php echo e(old('gender') == 1 ? 'selected' : ''); ?>>زن</option>
                            </select>
                        </div>










                        <div class="col-md-3">
                            <label for="type_request">نوع درخواست</label>
                            <select class="form-control selectpicker"
                                    id="type_request"
                                    name="type_request[]" multiple>
                                <option value="rent" <?php echo e(old('type_request') == 'rent' ? 'selected' : ''); ?>>اجاره
                                </option>
                                <option value="buy" <?php echo e(old('type_request', 'buy') == 'buy' ? 'selected' : ''); ?>>خرید
                                </option>
                            </select>
                        </div>

                        <div class="col-md-3 lavazem-container d-none">
                            <label for="lavazem">وسایل خانه</label>
                            <select class="form-control selectpicker" id="lavazem" name="lavazem">
                                <option value="مبله کامل" <?php echo e(old('lavazem') == 'مبله کامل' ? 'selected' : ''); ?>>مبله کامل</option>
                                <option value="آشپزخانه مبله" <?php echo e(old('lavazem', 'آشپزخانه مبله') == 'آشپزخانه مبله' ? 'selected' : ''); ?>>آشپزخانه مبله</option>
                                <option value="بدون وسایل" <?php echo e(old('lavazem', 'بدون وسایل') == 'بدون وسایل' ? 'selected' : ''); ?>>بدون وسایل</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="location">منطقه مدنظر</label>
                            <select class="form-control selectpicker"
                                    id="location"
                                    name="location[]" data-live-search="true" multiple>
                                <?php $__currentLoopData = \App\Location::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option data-tokens="<?php echo e($location->name); ?>" style="background: rgba(122,122,122,0.36)"
                                        value="<?php echo e($location->id); ?>" <?php echo e(in_array($location->id, old('location', [])) ? 'selected' : ''); ?>><?php echo e($location->name); ?></option>
                                       <?php $__currentLoopData = $location->dist($location->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $expload=explode('_',$item);
                                               ?>
                                            <option data-tokens="<?php echo e($expload[1]); ?>" value="<?php echo e($item); ?>" class="pl-4">district : <?php echo e($expload[1]); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="property_type">نوع</label>
                            <select class="form-control selectpicker"
                                    id="property_type"
                                    name="property_type[]" multiple>
                                <?php $__currentLoopData = \App\Villa::types(false); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                        value="<?php echo e($key); ?>" <?php echo e(old('property_type') == $key ? 'selected' : ''); ?>><?php echo e($type); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="property_usage">کاربری</label>
                            <select class="form-control selectpicker"
                                    id="property_usage"
                                    name="property_usage[]" multiple>
                                <?php $__currentLoopData = \App\Villa::usering(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $usering): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                        value="<?php echo e($key); ?>" <?php echo e(old('property_usage', 'residential') == $key ? 'selected' : ''); ?>><?php echo e($usering); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="room_number">تعداد اتاق + سالن</label>






                            <select class="form-control selectpicker"
                                    id="room_number"
                                    name="room_number[]" multiple>
                                    <option value="1+0" <?php echo e(old('room_number') == 1+0 ? 'selected' : ''); ?>>1+0</option>
                                    <option value="1+1" <?php echo e(old('room_number') == 1+1 ? 'selected' : ''); ?>>1+1</option>
                                    <option value="2+1" <?php echo e(old('room_number') == 2+1 ? 'selected' : ''); ?>>2+1</option>
                                    <option value="3+1" <?php echo e(old('room_number') == 3+1 ? 'selected' : ''); ?>>3+1</option>
                                    <option value="3+2" <?php echo e(old('room_number') == 3+2 ? 'selected' : ''); ?>>3+2</option>
                                    <option value="4+1" <?php echo e(old('room_number') == 4+1 ? 'selected' : ''); ?>>4+1</option>
                                    <option value="4+2" <?php echo e(old('room_number') == 4+2 ? 'selected' : ''); ?>>4+2</option>
                            </select>
                        </div>

                        <div class="col-md-3 bootstrap-selects">
                            <label for="budget">بودجه (خرید)</label>
                            <input type="text"
                                   id="budget"
                                   name="budget"
                                   class="form-control price"
                                   maxlength="100"
                                   value="<?php echo e(old('budget')); ?>" style="font-size: 16px">

                            <select class="form-control selectpicker select-picker-2 budget_type"
                                    id="budget_type"
                                    name="budget_type">
                                <?php $__currentLoopData = \App\User::currencies(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                        value="<?php echo e($key); ?>" <?php echo e(old('budget_type') == $key ? 'selected' : ''); ?>><?php echo e($currency); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-3 bootstrap-selects budget_sales_container d-none">
                            <label for="budget_sales">بودجه (اجاره)</label>
                            <input type="text"
                                   id="budget_sales"
                                   name="budget_sales"
                                   class="form-control price"
                                   maxlength="100"
                                   value="<?php echo e(old('budget')); ?>" style="font-size: 16px">

                            <select class="form-control selectpicker select-picker-2 budget_type"
                                    id="budget_type_sales"
                                    name="budget_type_sales">
                                <?php $__currentLoopData = \App\User::currencies(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                        value="<?php echo e($key); ?>" <?php echo e(old('budget_type') == $key ? 'selected' : ''); ?>><?php echo e($currency); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="date">تاریخ اعلام</label>
                            <input type="date"
                                   id="date"
                                   name="date"
                                   class="form-control date"
                                   maxlength="100"
                                   value="<?php echo e(old('date', date('m/d/yy'))); ?>">
                        </div>

                        <div class="col-md-3">
                            <label for="living_country">موقعیت جغرافیایی فعلی</label>
                            <select class="form-control"
                                    id="living_country"
                                    name="living_country">
                                <option value="iran" <?php echo e(old('living_country') == 'iran' ? 'selected' : ''); ?>>ایران
                                </option>
                                <option value="turkey" <?php echo e(old('living_country') == 'turkey' ? 'selected' : ''); ?>>ترکیه
                                </option>
                                <option value="emirates" <?php echo e(old('living_country') == 'emirates' ? 'selected' : ''); ?>>امارات
                                </option>
                                <option value="iraq" <?php echo e(old('living_country') == 'iraq' ? 'selected' : ''); ?>>عراق
                                </option>
                                <option value="georgia" <?php echo e(old('living_country') == 'georgia' ? 'selected' : ''); ?>>گرجستان
                                </option>
                                <option value="other" <?php echo e(old('living_country') == 'other' ? 'selected' : ''); ?>>سایر
                                </option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="consulting">نیاز به مشاوره آنلاین</label>
                            <select class="form-control"
                                    id="consulting"
                                    name="consulting">
                                <option value="0" <?php echo e(old('consulting') == 0 ? 'selected' : ''); ?>>ندارم</option>
                                <option value="1" <?php echo e(old('consulting') == 1 ? 'selected' : ''); ?>>دارم</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="instant">عجله دارد؟</label>
                            <select class="form-control"
                                    id="instant"
                                    name="instant">
                                <option <?php echo e(old('instant') == 'فوری' ? 'selected' : ''); ?>>فوری</option>
                                <option <?php echo e(old('instant') == 'عجله ندارم' ? 'selected' : ''); ?>>عجله ندارد</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="text" class="d-block w-100 mb-1">گزارش وضعیت ارتباط</label>
                            <textarea id="text" name="text" class="form-control"><?php echo old('text'); ?></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mt-4 mr-auto">
                            <button type="submit" class="btn btn-block btn-success">ثبت</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
    <?php $__env->startPush('stylesheets'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap-datepicker.min.css')); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/select2.min.css')); ?>"/>


        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap-select.min.css')); ?>"/>

        <style>
            .set-bg {
                text-align: center;
                background: #eeeeee61;
                color: #000;
                padding: 20px;
                border-radius: 5px;
            }
        </style>
    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('scripts'); ?>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-datepicker.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-datepicker-fa.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-select.min.js')); ?>"></script>

        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-select-fa_IR.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
        <script src="<?php echo e(asset('new/js/jquery.mask.min.js')); ?>"></script>
        <script>
            $('#mobile').mask('(000) 000 0000');
            $('#mobile1').mask('(000) 000 0000');
            $('#budget').mask("#,##0", {reverse: true});

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
        <script>
            getTypeValue($("#type_request"));
            $(document).ready(function(){
                $("#type_request").change(function(){
                    getTypeValue($(this));
                });
            });
            function getTypeValue(el) {
                var selected = el.children("option:selected").val();
                if(selected=='rent'){
                    $('.lavazem-container').removeClass('d-none');
                    $('.budget_sales_container').removeClass('d-none');
                }else{
                    $('.lavazem-container').addClass('d-none');
                    $('.budget_sales_container').addClass('d-none');
                }
            }
        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>
