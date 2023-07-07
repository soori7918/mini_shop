<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> افزودن <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card text-center" dir="rtl">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        
                        <h2>افزودن <?php echo e($title); ?></h2>
                    </div>
                </div>
                <div class="card-body">
                    <div class="post">
                        <form action="<?php echo e(route('menu-update',$menu->id)); ?>"  method="POST">
                            <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('title', 'عنوان')); ?>

                                    <?php echo e(Form::text('title', $menu->title, array('class' => 'form-control','id'=>'title'))); ?>


                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('slug', 'اسلاگ')); ?>

                                    <?php echo e(Form::text('slug',  $menu->slug, array('class' => 'form-control','id'=>'slug'))); ?>


                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('parent_id', 'منو والد')); ?>

                                    <select class="form-control" name="parent_id">
                                        <option value="">انتخاب کنید</option>
                                        <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($menu->id); ?>"><?php echo e($menu->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('url', 'آدرس')); ?>

                                    <?php echo e(Form::text('url',  $menu->url, array('class' => 'form-control'))); ?>


                                </div>
                            </div>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                        </div>
                        <br/>
                        <a href="<?php echo e(URL::previous()); ?>" class="btn btn-rounded btn-secondary float-right"><i class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                            <button type="submit" class="btn btn-rounded btn-primary float-left"><i class="fa fa-circle-o mtp-1 ml-1"></i>افزودن</button>
                        </form>
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
                    $('.textarea').ckeditor(textareaOptions)
                    slug('#title', '#slug');
                    console.log(slug('#title', '#slug'))
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