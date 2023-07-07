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
                <?php echo e(Form::model($item,array('route' => array('about-update', $item->id), 'method' => 'POST', 'files' => true))); ?>

                <div class="row">
                    <div class="col-12 text-center alert alert-info p-2">
                        برای تصویر خدمات از تصاویر png و برای درباره ما از jpg استفاده کنید
                    </div>











                    <div class="col-sm-6">
                        <div class="form-group">
                            <?php echo e(Form::label('title', '* عنوان')); ?>

                            <?php echo e(Form::text('title',null, array('class' => 'form-control'))); ?>

                        </div>
                    </div>
                    <?php if($item->page=='video'): ?>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <?php echo e(Form::label('text', '* لینک ویدئو')); ?>

                                <?php echo e(Form::text('text',null, array('class' => 'form-control video text-left','dir'=>'ltr','id' => 'video'))); ?>

                            </div>
                        </div>
                    <?php else: ?>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <?php echo e(Form::label('text', '* متن')); ?>

                            <?php echo e(Form::textarea('text',null, array('class' => 'form-control textarea','rows'=>4))); ?>

                        </div>
                    </div>
                        <div class="col-sm-12 text-input <?php if($item->page!='service' && $item->page!='home'): ?> d-none <?php endif; ?>">
                            <div class="form-group">
                                <?php echo e(Form::label('text_input', 'متن صفحه داخلی(درصورت ورود متن صفحه داخلی نمایش دارد)')); ?>

                                <?php echo e(Form::textarea('text_input',null, array('class' => 'form-control textarea','rows'=>4))); ?>

                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-sm-6 <?php if(in_array($item->id,[2,4])): ?> d-none <?php endif; ?>">
                        <div class="form-group">
                            <?php echo e(Form::label('pic', '* تصویر(png,jpg)')); ?>

                            <?php echo e(Form::file('pic', array('accept' => 'image/*'))); ?>

                        </div>
                        <?php if($item->pic): ?>
                            <img src="<?php echo e(url($item->pic)); ?>" style="height: 150px">
                        <?php endif; ?>
                    </div>
                </div>
                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-rounded btn-outline-warning float-right"><i class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                <?php echo e(Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>ویرایش', array('type' => 'submit', 'class' => 'btn btn-outline-success float-left'))); ?>

                <?php echo e(Form::close()); ?>

            </div>
        </div>
    <?php $__env->endSlot(); ?>
    <?php $__env->startPush('stylesheets'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(url('assets/admin/css/selectize.min.css')); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo e(url('assets/admin/css/bootstrap-select.min.css')); ?>"/>
        <style>
            .selectize-control.form-control
            {
                height: 100px;
            }
            .selectize-control.form-control>.selectize-input
            {
                overflow-y: auto!important;
            }
            .card-body > form {
                max-width: 100% !important;
            }
        </style>
    <?php $__env->stopPush(); ?>
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
            <script type="text/javascript" src="<?php echo e(url('assets/admin/js/selectize.min.js')); ?>"></script>
            <script type="text/javascript">
                $('#video').selectize({
                    plugins: {
                        remove_button: {
                            label: "×"
                        }
                    },
                    persist: false,
                    createOnBlur: true,
                    create: true
                });
            </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>