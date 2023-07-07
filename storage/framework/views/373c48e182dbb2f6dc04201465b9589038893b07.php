
<?php $__env->startSection('style_css'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>

    <!-- BLOG AREA START -->
    <div class="ltn__blog-area ltn__blog-item-3-normal mb-100">
        <div class="container">
            <div class="row">
                <?php if($type=='migration' && $about!=null): ?>
                    <div class="col-12 mb-3">
                        <?php echo $about->text_input; ?>

                    </div>
                <?php endif; ?>
                <?php if(count($items)>0): ?>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- Blog Item -->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-12 px-1">
                        <?php echo $__env->make('user.includes.blogCard',['blog'=>$blog], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!--  -->
                <?php else: ?>
                    <div class="alert alert-danger col-md-8 mx-auto text-center">
                        یافت نشد!
                    </div>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__pagination-area text-center">
                        <div class="ltn__pagination">
                            <?php echo e($items->appends(Request::except('page'))->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BLOG AREA END -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script_js'); ?> <?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>