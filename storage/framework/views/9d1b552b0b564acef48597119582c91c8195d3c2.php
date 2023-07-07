<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> ویرایش <?php echo e($title); ?> <?php echo e($profile->first_name); ?> <?php echo e($profile->last_name); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="http://adib-it.com/" target="_blank"><img src="http://www.support.adib-it.com/img/logo.png" style="margin-top: 10px;"></a>
                    </div>
                    <h2>ویرایش <?php echo e($title); ?> <?php echo e($profile->first_name); ?> <?php echo e($profile->last_name); ?></h2>
                </div>
            </div>
            <div class="card-body">
                <?php echo e(Form::model($profile, array('route' => array('profile-update', $profile->id), 'method' => 'PATCH' , 'files' => true))); ?>

                <div class="form-group">
                    <?php echo e(Form::label('first_name', 'نام')); ?>

                    <?php echo e(Form::text('first_name', null, array('class' => 'form-control'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('last_name', 'نام خانوادگی')); ?>

                    <?php echo e(Form::text('last_name', null, array('class' => 'form-control'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('email', 'ایمیل')); ?>

                    <?php echo e(Form::email('email', null, array('class' => 'form-control'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('mobile', 'موبایل')); ?>

                    <?php echo e(Form::text('mobile', null, array('class' => 'form-control', 'pattern' => '09[0-9]{9}'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('name', 'تصویر شاخص')); ?>

                    <div class="custom-file">
                        <?php echo e(Form::file('photo', array('accept' => 'image/*', 'class' => 'custom-file-input', 'id' => 'customFile'))); ?>

                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                <?php if(auth()->check() && auth()->user()->hasRole('کاربر')): ?>
                <div class="form-group form-group-radio">
                    <div class="radio">
                        <input type="radio" name="character" id="real" value="real" <?php echo e($profile->character == 'real' ? 'checked' : ''); ?>>
                        <label for="real">شخص حقیقی</label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="character" id="legal" value="legal" <?php echo e($profile->character == 'legal' ? 'checked' : ''); ?>>
                        <label for="legal">شخص حقوقی</label>
                    </div>
                </div>
                <?php endif; ?>
                <br/>
                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-rounded btn-secondary float-right"><i class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                <?php echo e(Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>ویرایش', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left'))); ?>

                <?php echo e(Form::close()); ?>

            </div>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>