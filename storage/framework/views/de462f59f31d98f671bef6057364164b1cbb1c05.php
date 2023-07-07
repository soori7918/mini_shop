<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> افزودن <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="http://adib-it.com/" target="_blank"><img
                                    src="http://www.support.adib-it.com/img/logo.png" style="margin-top: 10px;"></a>
                    </div>
                    <h2>افزودن <?php echo e($title); ?></h2>
                </div>
            </div>
            <div class="card-body">
                <?php echo e(Form::open(array('route' => 'user-store', 'method' => 'PUT'))); ?>

                <div class="form-group">
                    <?php echo e(Form::label('first_name', 'نام')); ?>

                    <?php echo e(Form::text('first_name', '', array('class' => 'form-control'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('last_name', 'نام خانوادگی')); ?>

                    <?php echo e(Form::text('last_name', '', array('class' => 'form-control'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('email', 'ایمیل')); ?>

                    <?php echo e(Form::email('email', '', array('class' => 'form-control'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('mobile', 'موبایل')); ?>

                    <?php echo e(Form::text('mobile', '', array('class' => 'form-control', 'pattern' => '09[0-9]{9}'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('password', 'رمز عبور')); ?>

                    <?php echo e(Form::password('password', array('class' => 'form-control'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('password', 'تکرار رمز عبور')); ?>

                    <?php echo e(Form::password('password_confirmation', array('class' => 'form-control'))); ?>

                </div>
                <?php if(request()->has('role')): ?>
                    <input type="hidden" name="role" value="<?php echo e(request()->get('role')); ?>">
                <?php endif; ?>
                <br/>
                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-rounded btn-secondary float-right"><i
                            class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                <?php echo e(Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>افزودن', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left'))); ?>

                <?php echo e(Form::close()); ?>

            </div>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>