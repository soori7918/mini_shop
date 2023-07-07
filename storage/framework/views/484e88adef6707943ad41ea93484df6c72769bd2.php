<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> افزودن <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="http://adib-it.com/" target="_blank"><img src="http://www.support.adib-it.com/img/logo.png" style="margin-top: 10px;"></a>
                    </div>
                    <h2>افزودن <?php echo e($title); ?></h2>
                </div>
            </div>
            <div class="card-body">
                <?php echo e(Form::open(array('route' => 'insurance-store', 'method' => 'PUT', 'files' => true, 'style' => 'width:100%!important;min-width:100%!important'))); ?>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <?php echo e(Form::label('title', 'عنوان')); ?>

                            <?php echo e(Form::text('title', '', array('class' => 'form-control'))); ?>

                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <?php echo e(Form::label('slug', 'نامک')); ?>

                            <?php echo e(Form::text('slug', '', array('class' => 'form-control'))); ?>

                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo e(Form::textarea('text', '', array('id' => 'body', 'class' => 'form-control textarea'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('name', 'تصویر شاخص')); ?>

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
            slug('#title', '#slug');
        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>