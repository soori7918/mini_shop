
<?php $__env->startSection('style_css'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <div class="body">
       <section class="conseling_section">
            <img src="<?php echo e(asset('user/pic/slider1.jpg')); ?>" />
       </section>
        <section class="project_list">
            <div class="container mt-5 my-5">
                <div class="row">
                    <?php if($projects->count()): ?>
                        <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-6 col-12 px-3 my-3">
                                <div class="bg-white shadow-sm project_list_card">
                                    <div class="row">
                                        <div class="col-lg-4 col-12 p-0">
                                            <div class="img_card">
                                                <img src="<?php echo e($project->image ?: ''); ?>" >
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-12 justify-content-right p-2">
                                            <h2 class="py-2"><?php echo e($project->title); ?></h2>
                                            <div class="section_title_border"></div>
                                            <ul>
                                                <li class="py-1">مساحت پروژه :<?php echo e($project->area); ?></li>
                                                <li class="py-1">تعداد خواب :<?php echo e($project->bedroom); ?></li>
                                                <li class="py-1">تعداد حمام : <?php echo e($project->bathroom); ?></li>
                                            </ul>
                                            <p><?php echo e(str_limit($project->short_description, 30)); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                            <div class="row py text-center">
                                <div class="col-lg-4 col-12 mx-auto">
                                    <a class="btn btn-warning" href="https://api.whatsapp.com/send/?phone=<?php echo e($setting->conseling_phone); ?>&text=خرید-خانه-در-استانبول&type=phone_number&app_absent=0">درخواست مشاوره</a>
                                </div>
                            </div>
                </div>
            </div>

        </section>
    </div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script_js'); ?> <?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>