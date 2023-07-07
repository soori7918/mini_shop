<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> افزودن <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="<?php echo e(url('/')); ?>" target="_blank"><img src="<?php echo e(logo()); ?>" style="margin-top: 10px;"></a>
                    </div>

                    <h2>افزودن <?php echo e($title); ?></h2>
                </div>
            </div>
            <div class="card-body">
                <?php echo e(Form::open(array('route' => 'ical-store', 'method' => 'PUT','files' => true))); ?>

                <div class="form-group">
                    <?php echo e(Form::label('first_name', 'نام')); ?>

                    <?php echo e(Form::select('villa_id', $villas, $villa!=null?$villa->id:null, array('class' => 'form-control'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('file_name', ' فایل')); ?>

                    <?php echo e(Form::file('ical')); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('icalurl', ' آدرس فایل')); ?>

                    <?php echo e(Form::text('icalurl',$villa!=null?$villa->villaical->ical_url:null)); ?>

                </div>                
                <?php echo e(Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>افزودن', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left'))); ?>

                <?php echo e(Form::close()); ?>

            </div>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>