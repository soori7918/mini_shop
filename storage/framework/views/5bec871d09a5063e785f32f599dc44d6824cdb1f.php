<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> افزودن <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card" dir="rtl">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="<?php echo e(url('/')); ?>" target="_blank"><img src="<?php echo e(logo()); ?>" style="margin-top: 10px;"></a>                      <h2>افزودن <?php echo e($title); ?></h2>
                </div>
            </div>
            <div class="card-body">
                <?php echo e(Form::open(array('route' => 'article-store', 'method' => 'PUT', 'files' => true, 'style' => 'width:100%!important;min-width:100%!important'))); ?>

                <?php echo e(Form::hidden('type', $type)); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <?php echo e(Form::label('category_id', 'دسته بندی')); ?>

                            <?php echo e(Form::select('category_id', [''=>'بدون دسته بندی',array_pluck($categories, 'name', 'id')], '', array('class' => 'form-control'))); ?>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo e(Form::label('title', 'عنوان ')); ?>

                            <?php echo e(Form::text('title', '', array('class' => 'form-control'))); ?>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo e(Form::label('slug', 'نامک')); ?>

                            <?php echo e(Form::text('slug', '', array('class' => 'form-control'))); ?>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php echo e(Form::label('text_short', 'خلاصه توضیحات')); ?>

                        <div class="form-group">
                            <?php echo e(Form::textarea('text_short', '', array('class' => 'form-control'))); ?>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <?php echo e(Form::label('text', 'توضیحات کامل')); ?>

                        <div class="form-group">
                            <?php echo e(Form::textarea('text', '', array('id' => 'body', 'class' => 'form-control textarea'))); ?>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo e(Form::label('photo', 'تصویر شاخص  410 * 650')); ?>

                            <?php echo e(Form::file('photo', array('accept' => 'image/*'))); ?>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php if($type=='radio_vandidad'): ?>
                                <?php echo e(Form::label('file', 'فایل mp3')); ?>

                                <?php echo e(Form::file('file', array('accept' => '.mp3'))); ?>

                                <?php else: ?>
                            <?php echo e(Form::label('file', 'فایل pdf')); ?>

                            <?php echo e(Form::file('file', array('accept' => '.pdf'))); ?>

                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo e(Form::label('status', 'وضعیت')); ?>

                            <?php echo e(Form::select('status', array('1' => 'انتشار', '0' => 'پیش نویس'), '', array('class' => 'form-control'))); ?>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo e(Form::label('author', 'نویسنده')); ?>

                            <?php echo e(Form::text('author', auth()->user()->first_name, array('class' => 'form-control'))); ?>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo e(Form::label('page_title', 'عنوان صفحه')); ?>

                            <?php echo e(Form::text('page_title', '', array('class' => 'form-control'))); ?>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php echo e(Form::label('keywords', 'کلمات کلیدی')); ?>

                            <?php echo e(Form::text('keywords', '', array('class' => 'form-control'))); ?>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php echo e(Form::label('description', 'توضیحات سئو')); ?>

                            <?php echo e(Form::text('description', '', array('class' => 'form-control'))); ?>

                        </div>
                    </div>
                </div>




                <br/>
                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-rounded btn-secondary float-right"><i
                            class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
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