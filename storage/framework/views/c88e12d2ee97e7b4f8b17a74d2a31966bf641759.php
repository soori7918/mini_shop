<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> افزودن <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card" dir="rtl">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="<?php echo e(url('/')); ?>" target="_blank"><img src="<?php echo e(logo()); ?>" style="margin-top: 10px;"></a>
                        <h2>افزودن <?php echo e($title); ?></h2>
                    </div>
                </div>
                <div class="card-body">
                    <?php echo e(Form::open(array('route' => 'complain-store', 'method' => 'PUT', 'files' => true, 'style' => 'width:100%!important;min-width:100%!important'))); ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php echo e(Form::label('title', 'موضوع شکایت')); ?>

                                <?php echo e(Form::text('title', '', array('class' => 'form-control'))); ?>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo e(Form::label('for_id', 'طرف شکایت؟ ', array('style' => 'font-size: 10px'))); ?>

                                <select class="form-control select2" name="for_id">
                                    <option value="">انتخاب کنید</option>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($user->id); ?>">
                                            <?php echo e($user->first_name.' '.$user->last_name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>


                            </div>
                        </div>

                        <div class="col-md-6 ">
                            <div class="form-group">
                                <?php echo e(Form::label('date', 'در تاریخ')); ?>

                                <?php echo e(Form::date('date', '', array('class' => 'form-control'))); ?>

                            </div>
                        </div>
                    </div>
                    <div class="row">






                        <div class="col-md-12">
                            <?php echo e(Form::label('text', 'توضیحات کامل')); ?>

                            <div class="form-group">
                                <?php echo e(Form::textarea('text', '', array('id' => 'body', 'class' => 'form-control textarea'))); ?>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo e(Form::label('file', 'فایل')); ?>

                                <?php echo e(Form::file('file', array('accept' => '*'))); ?>

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
                <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-datepicker.min.js')); ?>"></script>
                <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-datepicker-fa.min.js')); ?>"></script>
                <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-select.min.js')); ?>"></script>
                <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-select-fa_IR.min.js')); ?>"></script>
                <script type="text/javascript" src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
                <script src="<?php echo e(asset('new/js/jquery.mask.min.js')); ?>"></script>
                <script>
                    $('#mobile').mask('(000) 000 0000');

                    var date = new Date();
                    var day = ("0" + date.getDate()).slice(-2);
                    var month = ("0" + (date.getMonth() + 1)).slice(-2);
                    var today = date.getFullYear() + "-" + (month) + "-" + (day);
                    $('.date').val(today);

                </script>
                <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxfZQk73sogROY9KKRmtPIsLSFSjX7o7w&libraries=places&callback=initialize"></script>
                <script type="text/javascript">
                    $('.date-picker').each(function () {
                        $(this).datepicker({
                            dateFormat: "yy-mm-dd"
                        });
                    });
                    $('.select2').each(function () {
                        $(this).select2();
                    });
                    living_country($('#living_country'));
                    $('#living_country').change(function () {
                        living_country($(this));
                    })

                    function living_country(el) {
                        let val = el.val();
                        if (val == 'iran') {
                            $('.bill').show();
                            $('.kimlik').hide();
                        } else {
                            $('.bill').show();
                            $('.kimlik').show();
                        }
                    }

                </script>
        <?php $__env->stopPush(); ?>
        <?php echo $__env->renderComponent(); ?>