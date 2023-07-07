<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> مدیریت <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <style>
            .card-body > form {
                max-width: 100%;
            }
        </style>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="http://adib-it.com/" target="_blank"><img
                                    src="http://www.support.adib-it.com/img/logo.png" style="margin-top: 10px;"></a>
                    </div>
                    <h2>لیست <?php echo e($title); ?></h2>
                </div>
            </div>
            <div class="card-body">
                <?php echo e(Form::model($about, array('route' => array('abouts-update', $about->id), 'method' => 'PATCH'))); ?>

                <div class="float-right w-100 my-5">
                    <div class="add-more">
                        <a href="javascript:void(0)" class="btn btn-secondary click-to-add-description"><i
                                    class="fa fa-plus ml-2"></i><span>افزودن توضیحات بیشتر</span></a>
                        <hr/>
                    </div>
                    <div class="some_description">
                        <?php if($about->descriptions != 'N;'): ?>
                            <?php
                                $descriptions = unserialize($about->descriptions);
                            ?>
                            <?php $__currentLoopData = $descriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $description): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="parent-description">
                                    <div class="col-sm-12">
                                        <a href="javascript:void(0)" class="close-tab"><i class="fa fa-close"></i></a>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('some_title[]', 'عنوان')); ?>

                                            <?php echo e(Form::text('some_title[]', $description['title'], array('placeholder' => 'عنوان', 'class' => 'form-control', 'required'))); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('for[]', 'دسته بندی')); ?>

                                            <?php echo e(Form::select('for[]', array('سوالات پر تکرار' , 'نمایش در تب'), $description['for'], array('class' => 'form-control selectpicker'))); ?>

                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <?php echo e(Form::textarea('some_description[]', $description['description'], array('class' => 'form-control textarea', 'required'))); ?>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>



                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-rounded btn-secondary float-right"><i
                            class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
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

            $('.click-to-add-description').on('click', function () {
                var number = rollDice();
                otherAdd(number);
            });

            $('.close-tab').click(function () {
                $(this).parent().parent().remove()
            });

            function otherAdd(number) {
                $('.some_description').append('<div class="parent-description"><div class="col-sm-12"><a href="javascript:void(0)" class="close-tab"><i class="fa fa-close"></i></a></div><div class="col-md-6"><div class="form-group"><label for="for[]">دسته بندی</label><select class="form-control selectpicker" id="for[]" name="for[]"><option value="0">سوالات پر تکرار</option><option value="1">نمایش در تب</option></select></div></div><div class="col-sm-6"> <div class="form-group"><label for="some_title[]">عنوان</label> <input placeholder="عنوان" class="form-control" required name="some_title[]" type="text" id="some_title[]"></div></div><div class="col-sm-12"><div class="form-group"><textarea class="form-control textarea" required name="some_description[]" cols="50" rows="10"></textarea></div></div></div>');
                $('.close-tab').click(function () {
                    $(this).parent().parent().remove()
                });
                $('.textarea').ckeditor(textareaOptions);
            }

            function rollDice() {
                return (Math.floor(Math.random() * 6) + 1);
            }
        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>