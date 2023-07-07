
<?php $__env->startSection('style_css'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>

    <!-- PRODUCT DETAILS AREA START -->
    <div class="ltn__product-area ltn__product-gutter">
        <div class="container">
            <div class="row">
                <?php if(count($items)>0): ?>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 px-1">
                            <?php echo $__env->make('user.includes.projectCard',['item'=>$item], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-12 order-lg-2 mb-100">
                        <div class="ltn__pagination-area text-center">
                            <div class="ltn__pagination">
                                <?php echo e($items->appends(Request::except('page'))->links()); ?>

                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="alert alert-danger col-md-8 mx-auto text-center">
                        یافت نشد!
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- PRODUCT DETAILS AREA END -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script_js'); ?> <?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>