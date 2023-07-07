
<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container bg-white">
        <h1 class="text-primary-theme py-3 px-3"><?php echo e($blog->title); ?></h1>
        <div class="w100 container-fluid">
            <div class="row">
                <div class="mar_auto_ar">
                    <img src="<?php echo e($blog->photo!=null?url($blog->photo):''); ?>" alt="<?php echo e($blog->title); ?>">
                </div>
                <div class="col-sm-12 m-b-15">
                    <span title="تاریخ ثبت مقاله"> <i class="far fa-calendar-alt"></i> <?php echo e(my_jdate($blog->created_at,'Y/m/d')); ?> </span>
                    <span class="m-r-5" title=" بازدید مقاله"><i class="fa fa-eye"></i> <?php echo e($blog->seen); ?></span>
                    <span class="m-r-5" title=" جستجو مقاله"><i class="fa fa-search"></i> <?php echo e($blog->search); ?></span>
                </div>
                <div class="col-sm-12 text-justify m-b-15">
                    <h4> مقدمه
                        <span class="float-left auth_1" title="نویسنده"><i class="fa fa-edit"></i> <?php echo e($blog->author); ?> </span>
                        <?php if($blog->file==null || $blog->file==''): ?>
                        <?php else: ?>
                            <span class="float-left auth_1" title="دانلود فایل"> <a download href="<?php echo e(url($blog->file)); ?>"><i class="fa fa-download"></i> دانلود </a> </span>
                        <?php endif; ?>
                    </h4>
                    <?php echo e($blog->text_short); ?>


                </div>
                <div class="col-sm-12 text-justify m-b-15">
                    <h4>توضیحات</h4>
                    <?php echo $blog->text; ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>