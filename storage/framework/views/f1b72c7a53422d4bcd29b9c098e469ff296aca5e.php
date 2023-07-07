<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card text-right" dir="rtl">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="<?php echo e(url('/')); ?>" target="_blank"><img src="<?php echo e(logo()); ?>" style="margin-top: 10px;"></a>
                    </div>
                    <h2><?php echo e($title); ?></h2>
                </div>
            </div>
            <div class="card-body">
                <div class="row mt-4 mb-4">
                    <div class="col-md-12">
                        <p>
                            <strong>نام : </strong>
                            <span><?php echo e($passport->name); ?></span>
                        </p>
                        <p>
                            <strong>شماره تلفن : </strong>
                            <span><?php echo e($passport->phone); ?></span>
                        </p>
                        <p>
                            <strong>ایمیل : </strong>
                            <span><?php echo e($passport->email); ?></span>
                        </p>
                        <p>
                            <strong>پیام : </strong>
                            <span><?php echo $passport->message; ?></span>
                        </p>
                    </div>
                </div>
                <br/>
                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-rounded btn-secondary float-right"><i
                            class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>