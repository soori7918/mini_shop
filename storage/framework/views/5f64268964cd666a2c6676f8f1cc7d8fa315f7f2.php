<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> ویرایش <?php echo e($title); ?> <?php echo e($item->title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <style>
            .d-ltr{
                direction: ltr!important;
            }
            label{
                direction: rtl!important;
            }
        </style>
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
                <?php echo e(Form::model($item,array('route' => array('contact-info-update', $item->id), 'method' => 'POST', 'files' => true))); ?>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?php echo e(Form::label('title', '* عنوان صفحه')); ?>

                            <?php echo e(Form::text('title',null, array('class' => 'form-control'))); ?>

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group" dir="ltr"  style="margin-bottom: 50px;text-align: left">
                            <label style="width: 100%;text-align: right;">* شماره تماس دفتر(982188884444)</label>
                            <?php echo e(Form::text('phone', null, array('placeholder' => '982188884444، 982188883333', 'id' => 'phone', 'class' => 'form-control phone'))); ?>

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group" dir="ltr"  style="margin-bottom: 50px;text-align: left">
                            <label style="width: 100%;text-align: right">شماره تماس هدر سایت(989121113333)</label>
                            <?php echo e(Form::text('phone_header', null, array('placeholder' => '989121113333',  'class' => 'form-control text-left d-ltr'))); ?>

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group" dir="ltr"  style="margin-bottom: 50px;text-align: left">
                            <label style="width: 100%;text-align: right">شماره تماس آی کال (989121113333)</label>
                            <?php echo e(Form::text('phone_icall', null, array('placeholder' => '989121113333',  'class' => 'form-control text-left d-ltr'))); ?>

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group" dir="ltr"  style="margin-bottom: 50px;text-align: left">
                            <label style="width: 100%;text-align: right">شماره تماس واتساپ(989121113333)</label>
                            <?php echo e(Form::text('whatsapp', null, array('placeholder' => '989121113333، 989121112222', 'id' => 'whatsapp', 'class' => 'form-control whatsapp'))); ?>

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group" dir="ltr"  style="margin-bottom: 50px;text-align: left">
                            <label style="width: 100%;text-align: right">شماره تماس واتساپ گوشه سایت(989121113333)</label>
                            <?php echo e(Form::text('phone_whatsapp', null, array('placeholder' => '989121113333',  'class' => 'form-control text-left d-ltr'))); ?>

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group" dir="ltr"  style="margin-bottom: 50px;text-align: left">
                            <label style="width: 100%;text-align: right">شماره همراه(989121113333)</label>
                            <?php echo e(Form::text('mobile', null, array('placeholder' => '989121113333، 989121112222', 'id' => 'mobile', 'class' => 'form-control mobile'))); ?>

                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <?php echo e(Form::label('address', '* آدرس')); ?>

                            <?php echo e(Form::text('address',null, array('class' => 'form-control'))); ?>

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group" dir="ltr"  style="margin-bottom: 50px;text-align: left">
                            <label style="width: 100%;text-align: right">ایمیل(test@mail.com)</label>
                            <?php echo e(Form::text('email', null, array('placeholder' => 'test1@mail.com، test2@mail.com', 'id' => 'email', 'class' => 'form-control email'))); ?>

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group" dir="ltr"  style="margin-bottom: 50px;text-align: left">
                            <label style="width: 100%;text-align: right">ایمیل هدر سایت(test@mail.com)</label>
                            <?php echo e(Form::text('email_header', null, array('placeholder' => 'test@mail.com',  'class' => 'form-control text-left d-ltr'))); ?>

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <?php echo e(Form::label('facebook', 'فیسبوک')); ?>

                            <?php echo e(Form::text('facebook',null, array('class' => 'form-control text-left d-ltr'))); ?>

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <?php echo e(Form::label('twitter', 'توئیتر')); ?>

                            <?php echo e(Form::text('twitter',null, array('class' => 'form-control text-left d-ltr'))); ?>

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <?php echo e(Form::label('instagram', 'اینستاگرام')); ?>

                            <?php echo e(Form::text('instagram',null, array('class' => 'form-control text-left d-ltr'))); ?>

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <?php echo e(Form::label('telegram', 'تلگرام')); ?>

                            <?php echo e(Form::text('telegram',null, array('class' => 'form-control text-left d-ltr'))); ?>

                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <?php echo e(Form::label('linkedin', 'لینکدین')); ?>

                            <?php echo e(Form::text('linkedin',null, array('class' => 'form-control text-left d-ltr'))); ?>

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <?php echo e(Form::label('pinterest', 'pinterest')); ?>

                            <?php echo e(Form::text('pinterest',null, array('class' => 'form-control text-left d-ltr'))); ?>

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <?php echo e(Form::label('youtube', 'یوتیوب')); ?>

                            <?php echo e(Form::text('youtube',null, array('class' => 'form-control text-left d-ltr'))); ?>

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <?php echo e(Form::label('aparat', 'آپارات')); ?>

                            <?php echo e(Form::text('aparat',null, array('class' => 'form-control text-left d-ltr'))); ?>

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <?php echo e(Form::label('iframe', 'آیفریم(نقشه)')); ?>

                            <?php echo e(Form::textarea('iframe',null, array('class' => 'form-control text-left d-ltr','rows'=>'3'))); ?>

                        </div>
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
            .card-body > form {
                max-width: 100% !important;
            }
        </style>
    <?php $__env->stopPush(); ?>
    <?php $__env->startPush('scripts'); ?>
        <script type="text/javascript" src="<?php echo e(url('assets/admin/js/selectize.min.js')); ?>"></script>
        <script type="text/javascript">
            $('#phone').selectize({
                plugins: {
                    remove_button: {
                        label: "×"
                    }
                },
                persist: false,
                createOnBlur: true,
                create: true
            });
            $('#whatsapp').selectize({
                plugins: {
                    remove_button: {
                        label: "×"
                    }
                },
                persist: false,
                createOnBlur: true,
                create: true
            });
            $('#mobile').selectize({
                plugins: {
                    remove_button: {
                        label: "×"
                    }
                },
                persist: false,
                createOnBlur: true,
                create: true
            });
            $('#email').selectize({
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