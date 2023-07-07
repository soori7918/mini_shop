
<?php $__env->startSection('style_css'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>

    <!-- ABOUT US AREA START -->
    <div class="ltn__about-us-area pb-115">
        <div class="container">
            <div class="row">
                <?php if(count($items)): ?>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 p-1">
                            <?php echo $__env->make('user.includes.serviceCard',['service'=>$service], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="alert alert-danger col-md-8 mx-auto text-center">
                        یافت نشد!
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- ABOUT US AREA END -->


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script_js'); ?> <?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>