
<?php $__env->startSection('style_css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/jgrowl.min.css')); ?>"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>

    <!-- CONTACT ADDRESS AREA START -->
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="ltn__contact-address-area mb-90 <?php echo e($item->iframe?'mb--100':''); ?>">
        <div class="container">
            <div class="row">
                <?php if($keys>0): ?>
                    <div class="col-12">
                        <hr/>
                    </div>
                <?php endif; ?>
                <div class="col-12 mb-3">
                    <h4><?php echo e($item->title); ?></h4>
                </div>
                <div class="col-lg-4">
                    <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <img src="<?php echo e(url('source/assets/user/rtl/img/icons/10.png')); ?>" alt="Icon Image">
                        </div>
                        <h3>آدرس ایمیل</h3>
                        <p>
                            <?php if($item->email): ?>
                                <?php $__currentLoopData = $item->array_select($item->email); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$email): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($key>0): ?>
                                        <br>
                                    <?php endif; ?>
                                    <a href="mailto:<?php echo e(str_replace(' ','',$email)); ?>"><?php echo e($email); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <img src="<?php echo e(url('source/assets/user/rtl/img/icons/11.png')); ?>" alt="Icon Image">
                        </div>
                        <h3>شماره تماس دفتر</h3>
                        <p class="d-ltr">
                            <?php if($item->phone): ?>
                                <?php $__currentLoopData = $item->array_select($item->phone); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$phone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($key>0): ?>
                                        <br>
                                    <?php endif; ?>
                                    <a href="tel:+<?php echo e(str_replace(' ','',$phone)); ?>">+<?php echo e($phone); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                                <?php if($item->mobile): ?>
                                    <?php $__currentLoopData = $item->array_select($item->mobile); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$mobile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <br>
                                        <a href="tel:+<?php echo e(str_replace(' ','',$mobile)); ?>">+<?php echo e($mobile); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <img src="<?php echo e(url('source/assets/user/rtl/img/icons/12.png')); ?>" alt="Icon Image">
                        </div>
                        <h3>آدرس دفتر</h3>
                        <p <?php if(!preg_match('/^[^\x{600}-\x{6FF}]+$/u', str_replace("\\\\", "", $item->address))): ?> <?php else: ?> class="d-ltr" <?php endif; ?>>
                            <?php echo e($item->address); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTACT ADDRESS AREA END -->
    <?php if($item->iframe): ?>
        <!-- GOOGLE MAP AREA START -->
        <div class="google-map">
            <iframe src="<?php echo e($item->iframe); ?>" width="100%" height="100%" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        <!-- GOOGLE MAP AREA END -->
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <!-- CONTACT MESSAGE AREA START -->
    <div class="ltn__contact-message-area mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__form-box contact-form-box box-shadow white-bg">
                        <h4 class="title-2">ارتباط با ما</h4>
                        <form action="<?php echo e(route('user.contact.post')); ?>" method="post" id="frm_contact_submit">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-item input-item-name ltn__custom-icon">
                                        <input type="text" name="name" id="name" placeholder="* نام خود را وارد کنید">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-item input-item-email ltn__custom-icon">
                                        <input type="email" name="email" id="email" class="text-right d-ltr" placeholder="ایمیل خود را وارد کنید *">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-item input-item-phone ltn__custom-icon">
                                        <input type="text" name="phone" id="phone" class="text-right d-ltr" placeholder="شماره تماس(واتساپ) خود را وارد کنید">
                                    </div>
                                </div>
                            </div>
                            <div class="input-item input-item-textarea ltn__custom-icon">
                                <textarea name="message" id="message" placeholder="* متن پیام"></textarea>
                            </div>
                            <div class="btn-wrapper mt-0">
                                <a class="btn theme-btn-1 btn-effect-1 text-uppercase a_contact_submit">ارسال فرم</a>
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