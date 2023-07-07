
<?php $__env->startSection('style_css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/jgrowl.min.css')); ?>"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>

    <!-- CONTACT ADDRESS AREA START -->

        <div class="ltn__contact-address-area mb-90">
            <div class="container">
                <div class="row">
                    <div class="col-12 mb-3">
                        <h4><?php echo e($item->title); ?></h4>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                            <img src="<?php echo e(url($item->pic)); ?>" alt="Icon Image">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="mt-50">
                            <?php echo $item->text; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- CONTACT MESSAGE AREA START -->
    <div class="ltn__contact-message-area mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__form-box contact-form-box box-shadow white-bg">
                        <h4 class="title-2">درخواست مشاوره</h4>
                        <form action="<?php echo e(route('user.consulting.post')); ?>" method="post" id="frm_contact_submit1">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-item input-item-name ltn__custom-icon">
                                        <input type="text" name="name" id="name" placeholder="* نام و نام خانوادگی">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-item input-item-date mb-0 ltn__custom-icon">
                                        <input type="text" name="age" id="age" placeholder="سن"  pattern="[0-9]">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-item input-item-city ltn__custom-icon">
                                        <input type="text" name="city" id="city" placeholder="* شهر محل سکونت">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-item input-item-education ltn__custom-icon">
                                        <input type="text" name="education" id="education" placeholder="میزان تحصیلات">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-item input-item-login ltn__custom-icon">
                                        <input type="text" name="login_tr" id="login_tr" placeholder="* تا بحال ورود به ترکیه داشته اید؟">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-item input-item-count ltn__custom-icon">
                                        <input type="text" name="along_count" id="along_count" placeholder="* تعداد افرادحاضر همراه شما برای مهاجرت چند نفر میباشد؟">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-item input-item-time ltn__custom-icon">
                                        <input type="text" name="time_tr" id="time_tr" placeholder="* چه زمانی قصد مهاجرت یا سرمایه گذاری دارید؟">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-item input-item-know ltn__custom-icon">
                                        <input type="text" name="know_izmir" id="know_izmir" placeholder="* شناخت شما از شهر ازمیر به چه میزان است؟">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-item input-item-target ltn__custom-icon">
                                        <select name="target_tr" id="target_tr" class="input-item input-item-name ltn__custom-icon">
                                            <option value="">* هدف شما از مهاجرت کدام یک از موارد زیر است؟</option>
                                            <option value="اقامت">اقامت</option>
                                            <option value="شهروندی">شهروندی</option>
                                            <option value="سرمایه گذاری">سرمایه گذاری</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-item input-item-price ltn__custom-icon">
                                        <input type="text" name="start_price" id="start_price" placeholder="* شروع سرمایه گذاری  شما با چه مبلغی می باشد؟">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-item input-item-email ltn__custom-icon">
                                        <input type="email" name="email" id="email" class="text-right d-ltr" placeholder="ایمیل خود را وارد کنید *">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-item input-item-phone ltn__custom-icon">
                                        <input type="text" name="phone" id="phone" class="text-right d-ltr" pattern="[0-9]" placeholder="شماره تماس(واتساپ) خود را وارد کنید *">
                                    </div>
                                </div>





                            </div>
                            <div class="input-item input-item-textarea ltn__custom-icon">
                                <textarea name="message" id="message" placeholder="توضیح دیگر در صورت نیاز"></textarea>
                            </div>
                            <div class="btn-wrapper mt-0">
                                <a class="btn theme-btn-1 btn-effect-1 text-uppercase a_contact_submit1">ارسال فرم</a>
                            </div>
                            <p class="form-messege mb-0 mt-20"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTACT MESSAGE AREA END -->




<?php $__env->stopSection(); ?>
<?php $__env->startSection('script_js'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/jgrowl.min.js')); ?>"></script>
    <?php if(count($errors) > 0): ?>
        <script type="text/javascript">
            $.jGrowl('<ul> <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <li><?php echo e($error); ?></li> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </ul>', {
                life: 8000,
                position: 'bottom-right',
                theme: 'bg-danger'
            });
        </script>
    <?php endif; ?>
    <?php if(Session::has('flash_message')): ?>
        <script type="text/javascript">
            $.jGrowl('<?php echo session("flash_message"); ?>', {life: 8000, position: 'bottom-right', theme: 'bg-success'});
        </script>
    <?php endif; ?>
    <?php if(Session::has('err_message')): ?>
        <script type="text/javascript">
            $.jGrowl('<?php echo session("err_message"); ?>', {life: 8000, position: 'bottom-right', theme: 'bg-danger'});
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>