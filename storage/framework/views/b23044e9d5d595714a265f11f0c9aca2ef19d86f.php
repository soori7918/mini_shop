<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> ویرایش <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="http://adib-it.com/" target="_blank"><img src="http://www.support.adib-it.com/img/logo.png" style="margin-top: 10px;"></a>
                    </div>
                    <h2>ویرایش <?php echo e($title); ?></h2>
                </div>
            </div>
            <div class="card-body">
                <?php echo e(Form::model($item, array('route' => array('travel-update',$item->id), 'method' => 'PATCH', 'files' => true, 'style' => 'width:100%!important;min-width:100%!important'))); ?>

                <div class="form-group">
                    <?php echo e(Form::textarea('text', null, array('id' => 'body', 'class' => 'form-control textarea'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('photo', 'تصویر شاخص')); ?>

                    <?php echo e(Form::file('photo', array('accept' => 'image/*'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('background', 'تصویر پس زمینه')); ?>

                    <?php echo e(Form::file('background', array('accept' => 'image/*'))); ?>

                </div>
                <br/>
                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-rounded btn-secondary float-right"><i class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                <?php echo e(Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>ویرایش', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left'))); ?>

                <?php echo e(Form::close()); ?>

            </div>
        </div>
    <?php $__env->endSlot(); ?>
    <?php $__env->startPush('scripts'); ?>
        <script src="<?php echo e(asset('editor/laravel-ckeditor/ckeditor.js')); ?>"></script>
        <script src="<?php echo e(asset('editor/laravel-ckeditor/adapters/jquery.js')); ?>"></script>
        <script type="text/javascript">
            var textareaOptions = {
                filebrowserImageBrowseUrl: '<?php echo e(url('filemanager?type=Images')); ?>',
                filebrowserImageUploadUrl: '<?php echo e(url('filemanager/upload?type=Images&_token=')); ?>',
                filebrowserBrowseUrl: '<?php echo e(url('filemanager?type=Files')); ?>',
                filebrowserUploadUrl: '<?php echo e(url('filemanager/upload?type=Files&_token=')); ?>',
                language: 'fa'
            };
            $('.textarea').ckeditor(textareaOptions);
        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>