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
                <?php echo e(Form::open(array('route' => 'property-store', 'method' => 'PUT', 'files' => true))); ?>

                <div class="form-group">
                    <?php echo e(Form::label('name', 'نام ویژگی')); ?>

                    <?php echo e(Form::text('name', '', array('class' => 'form-control'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('status', 'نمایش ')); ?>

                    <?php echo e(Form::select('status', array('no' => 'خیر', 'yes' => 'بله'), '', array('class' => 'form-control'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('type', 'مکان ویژگی')); ?>

                    <?php echo e(Form::select('type', array('0' => 'امکانات داخلی', '1' => 'امکانات رفاهی','2'=>'دسترسی ها'), '', array('class' => 'form-control'))); ?>

                </div>




                <div class="form-group">
                    <?php echo e(Form::label('name', 'آیکن ویژگی')); ?>

                    <div class="custom-file">
                        <?php echo e(Form::file('photo', array('accept' => 'image/*', 'class' => 'custom-file-input', 'id' => 'customFile'))); ?>

                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                <br/>
                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-rounded btn-secondary float-right"><i class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                <?php echo e(Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>افزودن', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left'))); ?>

                <?php echo e(Form::close()); ?>

            </div>
        </div>
    <?php $__env->endSlot(); ?>
    <?php $__env->startPush('stylesheets'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(url('assets/admin/css/bootstrap-select.min.css')); ?>"/>
    <?php $__env->stopPush(); ?>
    <?php $__env->startPush('scripts'); ?>
        <script type="text/javascript" src="<?php echo e(url('assets/admin/js/bootstrap-select.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(url('assets/admin/js/bootstrap-select-fa_IR.min.js')); ?>"></script>
        <script type="text/javascript">
            $('.selectpicker').selectpicker();
        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>