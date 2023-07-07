
<?php $__env->startSection('style_css'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>

    <!-- 404 area start -->
    <div class="ltn__404-area ltn__404-area-1 mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="error-404-inner text-center">
                        <div class="error-img mb-30">
                            <img src="<?php echo e(url('source/assets/user/rtl/img/others/error-1.png')); ?>" alt="404">
                        </div>
                        <h1 class="error-404-title d-none">404</h1>
                        <h2>صفحه یافت نشد!</h2>
                        <!-- <h3>Oops! Looks like something going rong</h3> -->
                        <p>چیزی که دنبالش میگردی اینجا نیست</p>
                        <div class="btn-wrapper">
                            <a href="<?php echo e(route('user.index')); ?>" class="btn btn-transparent"><i class="fas fa-long-arrow-alt-left"></i> صفحه اصلی </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 404 area end -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script_js'); ?> <?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>