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
                    <?php echo e(Form::open(array('route' => 'about-store', 'method' => 'POST', 'files' => true))); ?>

                    <div class="row">
                        <div class="col-12 text-center alert alert-info p-2">
                            برای تصویر خدمات از تصاویر png و برای درباره ما از jpg استفاده کنید
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <?php echo e(Form::label('page', '* نوع فیلد')); ?>

                                <select name="page" class="form-control page_select">
                                    <option value="about">درباره ما</option>
                                    <option value="service">خدمات</option>
                                </select>
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
                                <?php echo e(Form::label('text', '* متن')); ?>

                                <?php echo e(Form::textarea('text',null, array('class' => 'form-control textarea','rows'=>4))); ?>

                            </div>
                        </div>
                        <div class="col-sm-12 text-input d-none">
                            <div class="form-group">
                                <?php echo e(Form::label('text_input', 'متن صفحه داخلی(درصورت ورود متن صفحه داخلی نمایش دارد)')); ?>

                                <?php echo e(Form::textarea('text_input',null, array('class' => 'form-control textarea','rows'=>4))); ?>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <?php echo e(Form::label('pic', '* تصویر(png,jpg)')); ?>

                                <?php echo e(Form::file('pic', array('accept' => 'image/*'))); ?>

                            </div>
                        </div>
                    </div>
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