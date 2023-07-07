<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> ویرایش <?php echo e($title); ?> <?php echo e($gallery->name); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="http://adib-it.com/" target="_blank"><img src="http://www.support.adib-it.com/img/logo.png" style="margin-top: 10px;"></a>
                    </div>
                    <h2>ویرایش <?php echo e($title); ?> <?php echo e($gallery->name); ?></h2>
                </div>
            </div>
            <div class="card-body">
                <?php echo e(Form::model($gallery, array('route' => array('gallery-update', $gallery->id), 'method' => 'PATCH'))); ?>

                <div class="form-group">
                    <?php echo e(Form::label('villa_id', 'ویلا')); ?>

                    <?php echo e(Form::select('villa_id', array_pluck($villas, 'name', 'id'), null, array('class' => 'form-control selectpicker'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('name', 'نام')); ?>

                    <?php echo e(Form::text('name', null, array('class' => 'form-control'))); ?>

                </div>
                <br/>
                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-rounded btn-secondary float-right"><i class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                <?php echo e(Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>ویرایش', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left'))); ?>

                <?php echo e(Form::close()); ?>

            </div>
        </div>
    <?php $__env->endSlot(); ?>
    <?php $__env->startPush('stylesheets'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap-select.min.css')); ?>"/>
    <?php $__env->stopPush(); ?>
    <?php $__env->startPush('scripts'); ?>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-select.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-select-fa_IR.min.js')); ?>"></script>
        <script type="text/javascript">
            $('.selectpicker').each(function () {
                $(this).selectpicker();
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>