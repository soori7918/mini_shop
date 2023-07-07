<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> ویرایش <?php echo e($title); ?> <?php echo e($item->title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="<?php echo e(url('/')); ?>" target="_blank"><img src="<?php echo e(logo()); ?>" style="margin-top: 10px;"></a>
                    </div>

                    <h2>ویرایش <?php echo e($title); ?> <?php echo e($item->title); ?></h2>
                </div>
            </div>
            <div class="card-body">
                <?php echo e(Form::model($item,array('route' => array('meta-update', $item->id), 'method' => 'POST', 'files' => true))); ?>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <?php echo e(Form::label('url', '* آدرس صفحه')); ?>

                            <?php echo e(Form::text('url',null, array('class' => 'form-control dir-ltr'))); ?>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?php echo e(Form::label('title', '* عنوان صفحه')); ?>

                            <?php echo e(Form::text('title',null, array('class' => 'form-control'))); ?>

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <?php echo e(Form::label('key_word', '* کلمات کلیدی')); ?>

                            <?php echo e(Form::textarea('key_word',null, array('class' => 'form-control','rows'=>4))); ?>

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <?php echo e(Form::label('description', '* توضیحات')); ?>

                            <?php echo e(Form::textarea('description',null, array('class' => 'form-control','rows'=>4 ))); ?>

                        </div>
                    </div>
                </div>
                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-rounded btn-outline-warning float-right"><i class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                <?php echo e(Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>ویرایش', array('type' => 'submit', 'class' => 'btn btn-outline-success float-left'))); ?>

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