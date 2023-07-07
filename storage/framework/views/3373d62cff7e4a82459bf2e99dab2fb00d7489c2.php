
<?php $__env->startSection('style_css'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <!-- LOGIN AREA START -->
    <div class="ltn__login-area pb-65">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center">



                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="account-login-inner">
                        <form action="<?php echo e(route('login')); ?>" method="post" class="ltn__form-box contact-form-box">
                            <?php echo csrf_field(); ?>
                            <input type="text" name="username" class="text-center" placeholder="*ایمیل">
                            <input type="password" name="password" class="text-center" placeholder="*رمز عبور">
                            <div class="btn-wrapper mt-0">
                                <button class="theme-btn-1 btn btn-block" type="submit">ورود</button>
                            </div>



                        </form>
                    </div>
                </div>










            </div>
        </div>
    </div>
    <!-- LOGIN AREA END -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script_js'); ?> <?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>