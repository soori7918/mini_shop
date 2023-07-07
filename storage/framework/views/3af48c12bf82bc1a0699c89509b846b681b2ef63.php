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
                        <a href="http://adib-it.com/" target="_blank"><img src="http://www.support.adib-it.com/img/logo.png" style="margin-top: 10px;"></a>
                    </div>
                    <h2>لیست <?php echo e($title); ?></h2>
                </div>
            </div>
            <div class="card-body">
                <?php echo e(Form::model($settings, array('route' => array('settings-update', $settings->id), 'method' => 'PATCH'))); ?>

                <div class="form-group">
                    <?php echo e(Form::label('title', 'عنوان سایت')); ?>

                    <?php echo e(Form::text('title', null, array('class' => 'form-control'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('keywords', 'کلمات کلیدی')); ?>

                    <?php echo e(Form::text('keywords', null, array('class' => 'form-control'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('description', 'توضیحات')); ?>

                    <?php echo e(Form::text('description', null, array('class' => 'form-control'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('paginate', 'تعداد صفحه بندی')); ?>

                    <?php echo e(Form::text('paginate', null, array('class' => 'form-control'))); ?>

                </div>
                <br/>
            </div>

            <div class="card-body">
                <div class="card-header archive-card-header">
                    <div class="archive-circle-wrap">
                        <h2>متاتگ صفحات</h2>
                    </div>
                </div>
                <div class="row meta">
                    <h3 class="meta_label">درباره ما</h3>
                    <div class="form-group">
                        <?php echo e(Form::label('about_title', 'عنوان')); ?>

                        <?php echo e(Form::text('about_title', null, array('class' => 'form-control'))); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('about_keywords', 'کلمات کلیدی')); ?>

                        <?php echo e(Form::text('about_keywords', null, array('class' => 'form-control'))); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('about_description', 'توضیحات')); ?>

                        <?php echo e(Form::text('about_description', null, array('class' => 'form-control'))); ?>

                    </div>
                </div>
                <div class="row meta">
                    <h3 class="meta_label">ارتباط با ما</h3>
                    <div class="form-group">
                        <?php echo e(Form::label('contact_title', 'عنوان')); ?>

                        <?php echo e(Form::text('contact_title', null, array('class' => 'form-control'))); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('contact_keywords', 'کلمات کلیدی')); ?>

                        <?php echo e(Form::text('contact_keywords', null, array('class' => 'form-control'))); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('contact_description', 'توضیحات')); ?>

                        <?php echo e(Form::text('contact_description', null, array('class' => 'form-control'))); ?>

                    </div>
                </div>
                <div class="row meta">
                    <h3 class="meta_label">مقاصد ویلایی</h3>
                    <div class="form-group">
                        <?php echo e(Form::label('location_title', 'عنوان')); ?>

                        <?php echo e(Form::text('location_title', null, array('class' => 'form-control'))); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('location_keywords', 'کلمات کلیدی')); ?>

                        <?php echo e(Form::text('location_keywords', null, array('class' => 'form-control'))); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('location_description', 'توضیحات')); ?>

                        <?php echo e(Form::text('location_description', null, array('class' => 'form-control'))); ?>

                    </div>
                </div>
                <div class="row meta">
                    <h3 class="meta_label">مجله ویلکسر</h3>
                    <div class="form-group">
                        <?php echo e(Form::label('offer_title', 'عنوان')); ?>

                        <?php echo e(Form::text('offer_title', null, array('class' => 'form-control'))); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('offer_keywords', 'کلمات کلیدی')); ?>

                        <?php echo e(Form::text('offer_keywords', null, array('class' => 'form-control'))); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('offer_description', 'توضیحات')); ?>

                        <?php echo e(Form::text('offer_description', null, array('class' => 'form-control'))); ?>

                    </div>
                </div>

                <div class="row meta">
                    <h3 class="meta_label">بیمه مسافرتی</h3>
                    <div class="form-group">
                        <?php echo e(Form::label('bime_title', 'عنوان')); ?>

                        <?php echo e(Form::text('bime_title', null, array('class' => 'form-control'))); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('bime_keywords', 'کلمات کلیدی')); ?>

                        <?php echo e(Form::text('bime_keywords', null, array('class' => 'form-control'))); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('bime_description', 'توضیحات')); ?>

                        <?php echo e(Form::text('bime_description', null, array('class' => 'form-control'))); ?>

                    </div>
                </div>
                <div class="row meta">
                    <h3 class="meta_label">قوانین و مقررات</h3>
                    <div class="form-group">
                        <?php echo e(Form::label('rule_title', 'عنوان')); ?>

                        <?php echo e(Form::text('rule_title', null, array('class' => 'form-control'))); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('rule_keywords', 'کلمات کلیدی')); ?>

                        <?php echo e(Form::text('rule_keywords', null, array('class' => 'form-control'))); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('rule_description', 'توضیحات')); ?>

                        <?php echo e(Form::text('rule_description', null, array('class' => 'form-control'))); ?>

                    </div>
                </div>
                <div class="row meta">
                    <h3 class="meta_label">علاقه مندی های من</h3>
                    <div class="form-group">
                        <?php echo e(Form::label('fav_title', 'عنوان')); ?>

                        <?php echo e(Form::text('fav_title', null, array('class' => 'form-control'))); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('fav_keywords', 'کلمات کلیدی')); ?>

                        <?php echo e(Form::text('fav_keywords', null, array('class' => 'form-control'))); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('fav_description', 'توضیحات')); ?>

                        <?php echo e(Form::text('fav_description', null, array('class' => 'form-control'))); ?>

                    </div>
                </div>
                <div class="row meta">
                    <h3 class="meta_label">ثبت نام</h3>
                    <div class="form-group">
                        <?php echo e(Form::label('reg_title', 'عنوان')); ?>

                        <?php echo e(Form::text('reg_title', null, array('class' => 'form-control'))); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('reg_keywords', 'کلمات کلیدی')); ?>

                        <?php echo e(Form::text('reg_keywords', null, array('class' => 'form-control'))); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('reg_description', 'توضیحات')); ?>

                        <?php echo e(Form::text('reg_description', null, array('class' => 'form-control'))); ?>

                    </div>
                </div>
                <br/>
                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-rounded btn-secondary float-right"><i class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                <?php echo e(Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>ویرایش', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left'))); ?>

                <?php echo e(Form::close()); ?>

            </div>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>