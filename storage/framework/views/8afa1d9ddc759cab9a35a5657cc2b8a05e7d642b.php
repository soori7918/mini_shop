<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> مدیریت <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <style>
            h3.meta_label {
                width: 100%;
                text-align: center;
                margin-bottom: 10px;
                margin-top: 20px;
            }
            .meta .form-group {
                padding: 0 50px 0 50px;
            }
        </style>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="<?php echo e(url('/')); ?>" target="_blank"><img src="<?php echo e(logo()); ?>" style="margin-top: 10px;"></a>                    </div>
                    <h2>لیست <?php echo e($title); ?></h2>
                </div>
            </div>
            <div class="card-body ">
                <?php echo e(Form::model($settings, array('route' => array('settings.update', $settings->id), 'method' => 'PATCH','files'=>'true'))); ?>

                <div class="row">
                    <div class="form-group col-6">
                        <?php echo e(Form::label('title', 'عنوان سایت')); ?>

                        <?php echo e(Form::text('title', null, array('class' => 'form-control'))); ?>

                    </div>
                    <div class="form-group col-6">
                        <?php echo e(Form::label('keywords', 'کلمات کلیدی')); ?>

                        <?php echo e(Form::text('keywords', null, array('class' => 'form-control'))); ?>

                    </div>
                    <div class="form-group col-6">
                        <?php echo e(Form::label('description', 'توضیحات')); ?>

                        <?php echo e(Form::text('description', null, array('class' => 'form-control'))); ?>

                    </div>
                    <div class="form-group col-6">
                    <?php echo e(Form::label('paginate', 'تعداد صفحه بندی')); ?>

                    <?php echo e(Form::text('paginate', null, array('class' => 'form-control'))); ?>

                </div>
                </div>
                <div class="col-12 py-2 text-center">تنطیمات تماس با ما</div>
                <div class="row">
                    <div class="form-group col-6">
                        <?php echo e(Form::label('phone', 'شماره تماس')); ?>

                        <?php echo e(Form::text('phone', null, array('class' => 'form-control'))); ?>

                    </div>
                    <div class="form-group col-6">
                        <?php echo e(Form::label('address', 'آدرس')); ?>

                        <?php echo e(Form::text('address', null, array('class' => 'form-control'))); ?>

                    </div>
                    <div class="form-group col-6">
                        <?php echo e(Form::label('adress2', 'آدرس')); ?>

                        <?php echo e(Form::text('adress2', null, array('class' => 'form-control'))); ?>

                    </div>
                    <div class="form-group col-6">
                        <?php echo e(Form::label('tel', 'شماره  تماس')); ?>

                        <?php echo e(Form::text('tel', null, array('class' => 'form-control'))); ?>

                    </div>
                    <div class="form-group col-6">
                        <?php echo e(Form::label('insta', 'اینستا')); ?>

                        <?php echo e(Form::text('insta', null, array('class' => 'form-control'))); ?>

                    </div>
                    <div class="form-group col-6">
                        <?php echo e(Form::label('whatsapp', 'واتساپ')); ?>

                        <?php echo e(Form::text('whatsapp', null, array('class' => 'form-control'))); ?>

                    </div>
                    <div class="form-group col-6">
                        <?php echo e(Form::label('facebook', 'فیسبوک')); ?>

                        <?php echo e(Form::text('facebook', null, array('class' => 'form-control'))); ?>

                    </div>
                    <div class="form-group col-6">
                        <?php echo e(Form::label('twitter', 'تویتر')); ?>

                        <?php echo e(Form::text('twitter', null, array('class' => 'form-control'))); ?>

                    </div>
                    <div class="form-group col-6">
                        <?php echo e(Form::label('conseling_phone', 'شماره تماس')); ?>

                        <?php echo e(Form::text('conseling_phone', null, array('class' => 'form-control'))); ?>

                    </div>
                    <div class="form-group col-6">
                        <?php echo e(Form::label('email', 'ایمیل ')); ?>

                        <?php echo e(Form::text('email', null, array('class' => 'form-control'))); ?>

                    </div>
                    <div class="form-group col-6">
                        <?php echo e(Form::label('logo', 'لوگو ')); ?>

                        <?php echo e(Form::file('logo', null, array('class' => 'form-control'))); ?>

                    </div>
                </div>
                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-rounded btn-secondary float-right"><i class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                <?php echo e(Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>ویرایش', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left'))); ?>

                <?php echo e(Form::close()); ?>

            </div>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>