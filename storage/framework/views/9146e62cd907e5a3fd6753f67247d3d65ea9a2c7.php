
<?php $__env->startSection('style_css'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <?php if(count($items)): ?>
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($key>0): ?>
            <hr/>
        <?php endif; ?>
        <?php if($key%2==0): ?>
            <!-- ABOUT US AREA START -->
            <div class="ltn__about-us-area pt-120--- pb-50 mt--30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="about-us-img-wrap about-img-left">
                                <img src="<?php echo e($item->pic?url($item->pic):url('source/assets/user/rtl/img/others/13.png')); ?>" alt="About Us Image">
                            </div>
                        </div>
                        <div class="col-lg-6 align-self-center">
                            <div class="about-us-info-wrap">
                                <div class="section-title-area ltn__section-title-2--- mb-20">
                                    <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">درباره ما</h6>
                                    <h1 class="section-title"><?php echo e($item->title); ?><span>.</span></h1>
                                    <?php echo $item->text; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ABOUT US AREA END -->
        <?php else: ?>
            <!-- ABOUT US AREA START -->
            <div class="ltn__about-us-area pt-120--- pb-50 mt--30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="about-us-info-wrap">
                                <div class="section-title-area ltn__section-title-2--- mb-20">
                                    <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">درباره ما</h6>
                                    <h1 class="section-title"><?php echo e($item->title); ?><span>.</span></h1>
                                    <?php echo $item->text; ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-us-img-wrap about-img-left">
                                <img src="<?php echo e($item->pic?url($item->pic):url('source/assets/user/rtl/img/others/13.png')); ?>" alt="About Us Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ABOUT US AREA END -->
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <div class="container">
            <div class="row">
                <div class="alert alert-danger col-md-8 mx-auto text-center">
                    یافت نشد!
                </div>
            </div>
        </div>
    <?php endif; ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script_js'); ?> <?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>