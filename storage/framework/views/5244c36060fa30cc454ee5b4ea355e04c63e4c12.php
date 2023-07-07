
<?php $__env->startSection('style_css'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <!-- PRODUCT DETAILS AREA START -->
    <div class="body">
        <div class="container py-5">
            <div class="row">
                <?php if($projects->count()): ?>
                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-12">
                        <div data-aos="fade-left"
                             data-aos-anchor="#example-anchor"
                             data-aos-offset="500"
                             data-aos-duration="500">

                            <a href="<?php echo e(route('user.project.show',$project->slug)); ?>">
                                <div class="project_item bg-white shadow-sm rounded-sm my-2">
                                    <div class="project_image position-relative">
                                        <img src="<?php echo e($project->image ?: ''); ?>" />
                                        <div class="project_image_detail "></div>
                                        <div class="project_image_detail_1 text-white d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <i class="fa fa-map-marker  px-2"></i>
                                                <small><?php echo e($project->getProjectCountry()."/".$project->getProjectCity()."/".$project->getProjectLocation()); ?></small>
                                            </div>
                                            <div class="d-flex align-items-center  justify-content-center">
                                                <i class="fa fa-eye small px-2"></i>
                                                <small><?php echo e(number_format($project->seen)); ?></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="project_content p-2">
                                        <div class="project_content_description d-flex flex-column">
                                            <strong class="py-2"><?php echo e($project->title); ?></strong>
                                            <span class="py-2 text-warning font-weight-bold"><?php echo e($project->price_label); ?> $ <?php echo e($project->start_price); ?></span>
                                            <p><?php echo e(str_limit($project->short_description, 30)); ?></p>
                                        </div>
                                        <div class="project_content_footer py-2 d-flex align-items-center justify-content-between">
                                            <ul class="project_detail">
                                                <li class="px-2"><i class="fa fa-superscript px-2" aria-hidden="true"></i><?php echo e($project->area); ?></li>
                                                <li class="px-2"><i class="fa fa-bed px-2" aria-hidden="true"></i><?php echo e($project->bedroom); ?></li>
                                                <li class="px-2"><i class="fa fa-bath px-2" aria-hidden="true"></i><?php echo e($project->bathroom); ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
            <?php echo e($projects->links()); ?>

        </div>
    </div>
    <!-- PRODUCT DETAILS AREA END -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script_js'); ?> <?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>