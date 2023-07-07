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
                <?php echo e(Form::open(array('route' => 'user-property-store', 'method' => 'PUT', 'files' => true))); ?>

                <div class="form-group">
                    <?php echo e(Form::label('first_name', 'نام')); ?>

                    <?php echo e(Form::text('first_name', '', array('class' => 'form-control'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('last_name', 'نام خانوادگی')); ?>

                    <?php echo e(Form::text('last_name', '', array('class' => 'form-control'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('email', 'ایمیل')); ?>

                    <?php echo e(Form::email('email', '', array('class' => 'form-control'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('mobile', 'موبایل')); ?>

                    <?php echo e(Form::text('mobile', '', array('class' => 'form-control', 'pattern' => '09[0-9]{9}'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('date_of_birth', 'تاریخ تولد')); ?>

                    <?php echo e(Form::text('date_of_birth', null, array('class' => 'form-control date-picker'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('birth_place', 'محل تولد')); ?>

                    <?php echo e(Form::text('birth_place', null, array('class' => 'form-control'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('mobile', 'شماره تماس')); ?>

                    <?php echo e(Form::text('mobile', null, array('class' => 'form-control'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('kimlik_number', 'شماره کیملیک')); ?>

                    <?php echo e(Form::text('kimlik_number', null, array('class' => 'form-control date-picker'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('education', 'تحصیلات')); ?>

                    <?php echo e(Form::text('education', null, array('class' => 'form-control date-picker'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('languages', 'مسلط به زبان های')); ?>

                    <?php echo e(Form::select('languages[]',$langs, null, array('class' => 'form-control selectpicker', 'multiple'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('marital', 'وضعیت تاهل')); ?>

                    <?php echo e(Form::select('marital',['0'=>'مجرد','1'=>'متاهل'], null, array('class' => 'form-control date-picker'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('gender', 'جنسیت')); ?>

                    <?php echo e(Form::select('gender',['0'=>'مرد','1'=>'زن'], null, array('class' => 'form-control date-picker'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('type', 'نوع کاربر')); ?>

                    <?php echo e(Form::select('type',['0'=>'کارشناس','1'=>'آژانس'], null, array('class' => 'form-control date-picker'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('living_country', 'محل زندگی')); ?>

                    <?php echo e(Form::select('living_country',['iran'=>'iran','turkey'=>'turkey'], null, array('class' => 'form-control'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('postal_address', 'آدرس پستی')); ?>

                    <?php echo e(Form::text('postal_address', null, array('class' => 'form-control'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('password', 'رمز عبور')); ?>

                    <?php echo e(Form::password('password', array('class' => 'form-control'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('password', 'تکرار رمز عبور')); ?>

                    <?php echo e(Form::password('password_confirmation', array('class' => 'form-control'))); ?>

                </div>
                <div class="form-group d-flex">
                    <div class="float-left mb-2 mr-4">
                        <span class="switch switch-success">
                            <label>
                                <span class="switch-title">وضعیت حساب کاربری</span>
                                <input type="checkbox" name="account_status" id="account_status" value="active" checked>
                                <span></span>
                            </label>
                        </span>
                    </div>
                    <div class="float-left d-flex mb-2">
                        <span class="switch switch-success">
                            <label>
                                <span class="switch-title">واتساپ دارد یا خیر</span>
                                <input type="checkbox" name="whatsapp" id="whatsapp" value="active">
                                <span></span>
                            </label>
                        </span>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group bill col-md-6">
                        <div class="set-bg">
                            <label>قبض تلفن</label>
                            <input type="file" class="gallery-multiple" name="bill" accept="image/*">
                        </div>
                    </div>
                    <div class="form-group kimlik col-md-6">
                        <div class="set-bg">
                            <label>تصویر کارت کیملیک</label>
                            <input type="file" class="gallery-multiple" name="kimlik" accept="image/*">
                        </div>
                    </div>
                </div>
                <?php if(request()->has('role')): ?>
                    <input type="hidden" name="role" value="<?php echo e(request()->get('role')); ?>">
                <?php endif; ?>
                <br/>
                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-rounded btn-secondary float-right"><i
                            class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                <?php echo e(Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>افزودن', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left'))); ?>

                <?php echo e(Form::close()); ?>

            </div>
        </div>
    <?php $__env->endSlot(); ?>
    <?php $__env->startPush('stylesheets'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap-datepicker.min.css')); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/select2.min.css')); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap-select.min.css')); ?>"/>
        <style>
            .set-bg{
                text-align: center;
                background: #eeeeee61;
                color: #000;
                padding: 20px;
                border-radius: 5px;
            }
        </style>
    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('scripts'); ?>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-datepicker.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-datepicker-fa.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-select.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-select-fa_IR.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxfZQk73sogROY9KKRmtPIsLSFSjX7o7w&libraries=places&callback=initialize"></script>
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
                let val=el.val();
                if(val=='iran'){
                    $('.bill').show();
                    $('.kimlik').hide();
                }else{
                    $('.bill').show();
                    $('.kimlik').show();
                }
            }
        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>