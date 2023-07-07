<?php $__env->startSection('nav'); ?>
    <?php if(auth()->check()): ?>
        <nav class="site-header sticky-top py-1">
            <div class="px-3 d-flex flex-column flex-md-row">






                <p class="logo_p_view text-center">
                    <span>Live Your Dreams</span>
                </p>
            </div>
        </nav>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="pl-4 pb-4 pr-4 mobile-no-padding">
        <div class="bg-white">
            <ul class="nav" hidden>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <img class="link-icon" src="<?php echo e(asset('new/img/icon/location.png')); ?>" width="17">
                        <span class="link-title">منطقه</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <img class="link-icon" src="<?php echo e(asset('new/img/icon/hourglass.png')); ?>" width="14">
                        <span class="link-title">زمان تحویل</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <img class="link-icon" src="<?php echo e(asset('new/img/icon/lira.png')); ?>" width="13">
                        <span class="link-title">شروع قیمت</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <img class="link-icon" src="<?php echo e(asset('new/img/icon/home-run.png')); ?>" width="17">
                        <span class="link-title">نوع ملک</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <img class="link-icon" src="<?php echo e(asset('new/img/icon/bedroom.png')); ?>" width="23">
                        <span class="link-title">تعداد خواب</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <img class="link-icon" src="<?php echo e(asset('new/img/icon/tailor.png')); ?>" width="25">
                        <span class="link-title">متراژ</span>
                    </a>
                </li>
            </ul>

            <div class="container-fluid">
                <div class="row">
                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3 m_bot_15">
                            <a href="<?php echo e(route('front.projects.show', $project->slug)); ?>">
                                <div class="project-item">
                                    <div class="project-image">
                                        <?php if(count($project->photos)>0): ?>

                                            <img  style='--i: 1' src="<?php echo e(url($project->photos[0]->path)); ?>">
                                            <?php else: ?>
                                            <img src="<?php echo e($project->pic_1!=null?url($project->pic_1->path): asset('new/img/slider-1.png')); ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="project-title-1">
                                        <button class="like">
                                            <i class="far fa-heart"></i>
                                        </button>
                                        <h6><span><?php echo e($project->name); ?></span>
                                            <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="gear-icon">
                                        </h6>
                                        <h5><?php echo $project->brief ? $project->brief : 'بهترین پروژه'; ?> </h5>
                                        <p class="summary-price">
                                            <?php if($project->price): ?>
                                                شروع قیمت از
                                                <span class="price"><?php echo e(number_format($project->price)); ?></span>
                                                لیر
                                            <?php else: ?>
                                                تماس بگیرید
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>