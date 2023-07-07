<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> ویرایش رمز عبور <?php echo e($title); ?> <?php echo e($profile->first_name); ?> <?php echo e($profile->last_name); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="<?php echo e(url('/')); ?>" target="_blank"><img src="<?php echo e(logo()); ?>" style="margin-top: 10px;"></a>                    </div>
                    <h2>ویرایش رمز عبور <?php echo e($title); ?> <?php echo e($profile->first_name); ?> <?php echo e($profile->last_name); ?></h2>
                </div>
            </div>
            <div class="card-body">
                <?php echo e(Form::model($profile, array('route' => array('profile-password-update', $profile->id), 'method' => 'PATCH'))); ?>

                <div class="form-group">
                    <?php echo e(Form::label('password', 'رمز عبور')); ?>

                    <?php echo e(Form::password('password', array('class' => 'form-control'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('password', 'تکرار رمز عبور')); ?>

                    <?php echo e(Form::password('password_confirmation', array('class' => 'form-control'))); ?>

                </div>
                <br/>
                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-rounded btn-secondary float-right"><i class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                <?php echo e(Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>ویرایش', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left'))); ?>

                <?php echo e(Form::close()); ?>

            </div>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>