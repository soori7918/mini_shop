<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> ویرایش <?php echo e($title); ?> <?php echo e($property->name); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="<?php echo e(url('/')); ?>" target="_blank"><img src="<?php echo e(logo()); ?>" style="margin-top: 10px;"></a>
                    </div>
                    <h2>ویرایش <?php echo e($title); ?> <?php echo e($property->name); ?></h2>
                </div>
            </div>
            <div class="card-body">
                <?php echo e(Form::model($property, array('route' => array('property-update', $property->id), 'method' => 'PATCH', 'files' => true))); ?>

                <div class="form-group">
                    <?php echo e(Form::label('name', 'نام ویژگی')); ?>

                    <?php echo e(Form::text('name', null, array('class' => 'form-control'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('status', 'نمایش ')); ?>

                    <?php echo e(Form::select('status', array('no' => 'خیر', 'yes' => 'بله'), null, array('class' => 'form-control'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('type', 'مکان ویژگی')); ?>

                    <?php echo e(Form::select('type', array('0' => 'امکانات داخلی', '1' => 'امکانات رفاهی','2'=>'دسترسی ها'), null, array('class' => 'form-control'))); ?>

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
            $('.selectpicker').selectpicker();
        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>