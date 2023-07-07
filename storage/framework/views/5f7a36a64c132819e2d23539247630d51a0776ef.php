
<?php $__env->startSection('style_css'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>

    <div class="body">
        <section class="blog py-3">
            <div class="container">
                <div class="row">


                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item->articles()->count()): ?>
                            <div class="row shadow-sm rounded-sm my-3 py-2">
                            <div class="col-lg-3 bg-white my-2 d-flex align-items-center justify-content-center">
                                <div class="section_title py-5">
                                    <h3 class="py-3"><?php echo e($item->name); ?></h3>
                                    <div class="section_title_border"></div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                        <div class="row">
                            <?php $__currentLoopData = $item->articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-4 col-12">
                                    <a href="<?php echo e(route('user.blog.show',$article->slug)); ?>">
                                        <div class="project_item bg-white shadow-sm rounded-sm my-2">
                                            <div class="project_image position-relative">
                                                <img src="<?php echo e($article->photo?url($article->photo):url('assets/user/pic/blog1.jpg')); ?>" alt="<?php echo e($article->title); ?>" width="100%" height="100%" />
                                                <div class="project_image_detail "></div>
                                                <div class="project_image_detail_1 text-white d-flex align-items-center justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        
                                                        
                                                    </div>
                                                    <div class="d-flex align-items-center  justify-content-center">
                                                        <i class="fa fa-eye small px-2"></i>
                                                        <small><?php echo e(number_format($article->seen)); ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="project_content p-2">
                                                <div class="project_content_description d-flex flex-column">
                                                    <strong class="py-2"><?php echo e($article->title); ?></strong>
                                                    
                                                    
                                                </div>
                                                <div class="project_content_footer py-2 d-flex align-items-center justify-content-between">

                                                    <div class="project_content_footer_author d-flex align-items-center justify-content-between">
                                                        <div class="icon d-flex">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                        <span class="mx-2"><?php echo e($article->user->first_name); ?></span>

                                                    </div>

                                                    <div class="project_content_footer_icon d-flex align-items-center justify-content-center">
                                                        <i class="far fa-calendar-alt px-2"></i><?php echo e(my_jdate($article->created_at,'Y/m/d')); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </section>
    </div>
    <!-- BLOG AREA START -->
    <!-- BLOG AREA END -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script_js'); ?> <?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>