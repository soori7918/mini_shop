
<?php $__env->startSection('style_css'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>

    <!-- PAGE DETAILS AREA START (portfolio-details) -->
    <div class="ltn__page-details-area ltn__portfolio-details-area mb-105">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="ltn__page-details-inner ltn__portfolio-details-inner">
                        <div class="ltn__blog-img">
                            <?php if($item->pic_1): ?>
                                <img src="<?php echo e($item->pic_1!=null?url($item->pic_1->path):url('source/assets/user/rtl/img/product-3/1.jpg')); ?>" alt="<?php echo e($item->name); ?>">
                            <?php endif; ?>
                        </div>
                        <p>
                            <span class="ltn__first-letter">V</span>
                            <?php if($item->price): ?>
                                <span class="d-block"> شروع قیمت : <?php echo e(number_format($item->price)); ?> لیر </span>
                            <?php endif; ?>
                            <?php if($item->place_description): ?>
                                <span class="d-block"> <?php echo e($item->place_description); ?> </span>
                            <?php endif; ?>
                            <?php if($item->meter_description): ?>
                                <span class="d-block"> <?php echo e($item->meter_description); ?> </span>
                            <?php endif; ?>
                        </p>
                        <p><?php echo e($item->short_text_1); ?></p>
                        <?php if($item->pic_2): ?>
                            <img src="<?php echo e($item->pic_2!=null?url($item->pic_2->path):url('source/assets/user/rtl/img/product-3/1.jpg')); ?>" alt="<?php echo e($item->name); ?>">
                        <?php endif; ?>
                        <p><?php echo e($item->count_description); ?></p>
                        <?php if($item->pic_3): ?>
                            <img src="<?php echo e(url($item->pic_3->path)); ?>" alt="<?php echo e($item->name); ?>">
                        <?php endif; ?>
                        <p><?php echo e($item->meter_description); ?></p>
                        <?php if($item->map_pic): ?>
                            <img src="<?php echo e(url($item->map_pic->path)); ?>" alt="<?php echo e($item->name); ?>">
                        <?php endif; ?>
                        <p>دسترسی ها</p>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="ltn__testimonial-item ltn__testimonial-item-3">
                                    <div class="ltn__testimonial-img">

                                        <img src="<?php echo e($item->access_bg!=null?url($item->access_bg->path):url('source/assets/user/rtl/img/product-3/1.jpg')); ?>" alt="Image">
                                    </div>
                                    <div class="ltn__testimoni-info">
                                        <?php echo $item->access_text; ?>

                                        <div class="ltn__testimoni-info-inner">
                                            <div class="ltn__testimoni-img">
                                                <img src="<?php echo e(url('source/assets/user/pic/logo.png')); ?>" alt="وندیداد">
                                            </div>
                                            <div class="ltn__testimoni-name-designation">
                                                <h4>Vandidad</h4>
                                            </div>
                                        </div>
                                        <div class="ltn__testimoni-bg-icon">
                                            <i class="fas fa-map-marked-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <?php if($item->pic_4): ?>
                            <img src="<?php echo e(url($item->pic_4->path)); ?>"  class="mt-4 w-100" alt="<?php echo e($item->name); ?>">
                        <?php endif; ?>

                        <?php if($item->pic_5): ?>
                            <img src="<?php echo e(url($item->pic_5->path)); ?>" class="mt-4 w-100" alt="<?php echo e($item->name); ?>">
                        <?php endif; ?>

                        <?php if($item->single_sample): ?>
                            <img src="<?php echo e(url($item->single_sample->path)); ?>" class="mt-4 w-100" alt="<?php echo e($item->name); ?>">
                        <?php endif; ?>

                        <?php if($item->possibilities): ?>
                            <img src="<?php echo e(url($item->possibilities->path)); ?>" class="mt-4 w-100" alt="<?php echo e($item->name); ?>">
                        <?php endif; ?>

                        <?php if($item->icon_possibilities): ?>
                            <img src="<?php echo e(url($item->icon_possibilities->path)); ?>" class="mt-4 w-100" alt="<?php echo e($item->name); ?>">
                        <?php endif; ?>

                        <?php if($item->map_home): ?>
                            <img src="<?php echo e(url($item->map_home->path)); ?>" class="mt-4 w-100" alt="<?php echo e($item->name); ?>">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar-area ltn__right-sidebar">
                        <!-- Menu Widget -->
                        <div class="widget-2 ltn__menu-widget ltn__menu-widget-2 text-uppercase">
                            <ul>
                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(route('user.project.show',$val->id)); ?>"><?php echo e($val->name); ?> <span><i class="fas fa-arrow-right"></i></span></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>

                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE DETAILS AREA END -->


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script_js'); ?> <?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>