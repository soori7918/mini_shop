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
                <div class="post">
                    <?php echo e(Form::open(array('route' => 'slider-store', 'method' => 'PUT', 'files' => true))); ?>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo e(Form::label('title', 'عنوان')); ?>

                                <?php echo e(Form::text('title', '', array('class' => 'form-control'))); ?>


                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo e(Form::label('shoar', 'شعار')); ?>

                                <?php echo e(Form::text('shoar', '', array('class' => 'form-control'))); ?>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php echo e(Form::textarea('text', '', array('class' => 'form-control textarea', 'required'))); ?>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo e(Form::label('page', 'صفحه')); ?>

                                <select name="page" class="form-control">
                                    <option value="1">مقاصد سفر</option>
                                    <option value="2">مجله</option>
                                    <option value="3">درباره ما</option>
                                    <option value="4">ارتباط با ما</option>
                                    <option value="5">ثبت نام</option>
                                    <option value="6">علاقه مندی ها</option>
                                    <option value="7">صفحات داخلی مجله</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-top: 10px;">
                            <div class="form-group">
                                <?php echo e(Form::label('photo', 'تصویر')); ?>

                                <?php echo e(Form::file('photo', array('accept' => '*/*'))); ?>

                            </div>
                        </div>
                    </div>
                    <br/>
                    <a href="<?php echo e(URL::previous()); ?>" class="btn btn-rounded btn-secondary float-right"><i class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                    <?php echo e(Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>افزودن', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left'))); ?>

                    <?php echo e(Form::close()); ?>

                </div>
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
            $('.click-to-add-description').on('click', function () {
                var number = rollDice();
                otherAdd(number);
            });

            function otherAdd(number) {
                $('.some_description').append('<div class="parent-description"><a href="javascript:void(0)" class="close-tab"><i class="fa fa-close"></i></a><div class="form-group"><label for="some_title[]">عنوان</label> <input placeholder="عنوان" class="form-control" required name="some_title[]" type="text" id="some_title[]"></div><div class="form-group"><textarea class="form-control textarea" required name="some_description[]" cols="50" rows="10"></textarea></div></div>');
                $('.close-tab').click(function () {
                    $(this).parent().remove()
                });
                $('.textarea').ckeditor(textareaOptions);
            }

            function rollDice() {
                return (Math.floor(Math.random() * 6) + 1);
            }
        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>