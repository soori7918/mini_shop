<?php $__env->startComponent('layouts.front'); ?>
    <?php
        $setting = App\Setting::find(1);
    ?>
    <?php $__env->slot('title'); ?> <?php if($setting->reg_title): ?><?php echo e($setting->reg_title); ?> <?php endif; ?> <?php $__env->endSlot(); ?>

    <?php $__env->slot('meta'); ?>
        <?php if($setting->reg_keywords): ?>
            <meta http-equiv="keywords" name="keywords" content="<?php echo e($setting->reg_keywords); ?>"/>
        <?php endif; ?>
        <?php if($setting->reg_description): ?>
            <meta http-equiv="description" name="description" content="<?php echo e($setting->reg_description); ?>"/>
        <?php endif; ?>
    <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <style>
            .card-body {
                margin-top: -6rem;
            }

            .w-100-show {
                width: 100%;
            }
            .marg-50{
                margin-top: 50px;
                padding: 37px;
            }
            @media (max-width: 800px) {
                .w-100-show {
                    width: 108% !important;
                }
                .card-body{
                    margin-top: -4%;
                }
                .marg-50{
                    margin-top: 0px;
                    padding: 1px 40px !important;
                }
            }
        </style>



        <?php
            $slider = App\Slider::where('page' , 5)->first();
        ?>
        <?php if($slider): ?>
            <header class="sub-header"
                    style="background:url(<?php echo e(url($slider->photo->path)); ?>) center no-repeat;background-size:cover;">
                <div class="container">
                    <div class="header-logo" style="margin-top: -80px;margin-right: -15px;">
                        <a href="<?php echo e(url('/')); ?>"><img style="width: 200px"
                                                      src="<?php echo e(asset('uploads/file/1398-08-21/photos/istanbul.png')); ?>"
                                                      alt="logo"></a>
                    </div>

                    <div class="header-title">
                        <h1 style="font-size: 32px"><?php echo e($slider->title); ?></h1>
                        <p><?php echo e($slider->shoar); ?></p>
                    </div>
                </div>
            </header>
        <?php endif; ?>



        <div style="height: 90%;background-color: #e6e6e6">
            <div class="container">
                <div class="row w-100-show"
                     style="float: right;background-color: white;margin-bottom: 40px;margin-top: 42px">
                    <div class="col-sm-12">
                        <div class="text-center">

                            
                            
                            <img src="<?php echo e(asset('/img/user.svg')); ?>">
                            <h2 style="text-align: center">عضو شوید</h2>
                            <hr/>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card-body">
                            <div class="marg-50" style="margin-top: 50px;border-radius: 10px;background-color: white !important;padding: 37px !important;">

                                <?php echo e(Form::open(array('route' => 'register'))); ?>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            
                                            <label><sup style="color: red;">*</sup> نام</label>
                                            <?php echo e(Form::text('first_name', '', array('class' => 'form-control' , 'required'  ,'oninvalid' => 'setCustomValidity("لطفا نام  خود را وارد کنی")' , 'onchange' => 'try{setCustomValidity("")}catch(e){}' ))); ?>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            
                                            <label><sup style="color: red;">*</sup> نام خانوادگی</label>
                                            <?php echo e(Form::text('last_name', '', array('class' => 'form-control' , 'required','oninvalid' => 'setCustomValidity("لطفا نام خانوادگی  خود را وارد کنی")' , 'onchange' => 'try{setCustomValidity("")}catch(e){}' ))); ?>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            
                                            <label><sup style="color: red;">*</sup> ایمیل</label>
                                            <?php echo e(Form::email('email', '', array('class' => 'form-control',  'required' , 'oninvalid' => 'setCustomValidity("لطفا ایمیل خود را وارد کنی")' , 'onchange' => 'try{setCustomValidity("")}catch(e){}' ))); ?>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            
                                            <label><sup style="color: red;">*</sup> موبایل</label>
                                            <?php echo e(Form::number('mobile', '', array('class' => 'form-control', 'required' , 'pattern' => '09[0-9]{9}' , 'oninvalid' => 'setCustomValidity("لطفا موبایل خود را وارد کنی")' , 'onchange' => 'try{setCustomValidity("")}catch(e){}' ))); ?>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            
                                            <label><sup style="color: red;">*</sup> رمز عبور</label>
                                            <?php echo e(Form::password('password', array('class' => 'form-control' , 'required' , 'oninvalid' => 'setCustomValidity("لطفا رمز عبور خود را وارد کنی")' , 'onchange' => 'try{setCustomValidity("")}catch(e){}' ))); ?>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            
                                            <label><sup style="color: red;">*</sup> تکرار رمز عبور</label>
                                            <?php echo e(Form::password('password_confirmation', array('class' => 'form-control' , 'required' , 'oninvalid' => 'setCustomValidity("لطفا تکرار رمز عبور خود را وارد کنی")' , 'onchange' => 'try{setCustomValidity("")}catch(e){}' ))); ?>

                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <br/>
                                        <div class="g-recaptcha"
                                             data-sitekey="6Lf7xE8UAAAAABkIxNqkox5E5QxoBvQVRltsbjJX"></div>

                                        <br/>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">

                                            <div style="display: flex" class="checkbox-control"><input
                                                        style="margin-left: 6px" id="chkAgreement" type="checkbox"
                                                        name="chkAgreement" required=""> <label
                                                        for="chkAgreement"><a target="_blank"
                                                                              href="<?php echo e(route('front-role')); ?>">حریم خصوصی
                                                        و شرایط و قوانین</a> استفاده از سرویس های سایت استانبول سرویس را مطالعه
                                                    نموده و با کلیه موارد آن موافقم.</label></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                    </div>
                                    <div class="col-sm-6">
                                        
                                        <button type="submit" class="btn btn-rounded btn-primary float-left" style="
"><i class="fa fa-circle-o mtp-1 ml-1"></i>ثبت نام در استانبول سرویس
                                        </button>

                                    </div>
                                </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="card-body">
                            <div  class="marg-50"  style="border-radius: 10px;background-color: white !important;">
                                <p style="font-weight: bold;margin-top: 5%;line-height: 3">

                                    <i style="font-size: 22px;color: #585656" class="fa fa-shopping-basket"></i> .
                                    &#1587;&#1585;&#1740;&#1593;&#1578;&#1585; &#1608; &#1585;&#1575;&#1581;&#1578;&#1578;&#1585;
                                    &#1576;&#1575; &#1605;&#1575; &#1583;&#1585; &#1575;&#1585;&#1578;&#1576;&#1575;&#1591;
                                    &#1576;&#1575;&#1588;&#1740;&#1583;.
                                    <br/>
                                    <i style="font-size: 22px;color: #585656" class="fa fa-list-alt"></i> . &#1576;&#1607;
                                    &#1587;&#1575;&#1583;&#1711;&#1740; &#1587;&#1608;&#1575;&#1576;&#1602;
                                    &#1608; &#1601;&#1593;&#1575;&#1604;&#1740;&#1578; &#1582;&#1608;&#1583; &#1585;&#1575;
                                    &#1605;&#1583;&#1740;&#1585;&#1740;&#1578; &#1705;&#1606;&#1740;&#1583;.
                                    <br/>
                                    <i style="font-size: 22px;color: #585656" class="fa fa-heart"></i>. &#1604;&#1740;&#1587;&#1578;
                                    &#1593;&#1604;&#1575;&#1602;&#1607; &#1605;&#1606;&#1583;&#1740;
                                    &#1607;&#1575;&#1740; &#1582;&#1608;&#1583; &#1585;&#1575; &#1575;&#1740;&#1580;&#1575;&#1583;
                                    &#1705;&#1606;&#1740;&#1583;&#1548; &#1576;&#1607; &#1575;&#1588;&#1578;&#1585;&#1575;&#1705;
                                    &#1576;&#1586;&#1575;&#1585;&#1740;&#1583; &#1608; &#1570;&#1606; &#1607;&#1575;
                                    &#1585;&#1575; &#1583;&#1606;&#1576;&#1575;&#1604; &#1705;&#1606;&#1740;&#1583;.
                                    <br/>
                                    <i style="font-size: 22px;color: #585656" class="fa fa-wechat"></i>. &#1606;&#1602;&#1583;&#1548;
                                    &#1576;&#1585;&#1585;&#1587;&#1740; &#1608;
                                    &#1606;&#1592;&#1585;&#1575;&#1578;
                                    &#1582;&#1608;&#1583; &#1585;&#1575; &#1583;&#1585; &#1605;&#1608;&#1585;&#1583;
                                    &#1607;&#1578;&#1604; &#1607;&#1575; &#1608; &#1587;&#1575;&#1740;&#1585;
                                    &#1575;&#1605;&#1705;&#1575;&#1606;&#1575;&#1578;
                                    &#1576;&#1575; &#1583;&#1740;&#1711;&#1585;&#1575;&#1606; &#1576;&#1607; &#1575;&#1588;&#1578;&#1585;&#1575;&#1705;
                                    &#1711;&#1584;&#1575;&#1585;&#1740;&#1583;.
                                    <br/>
                                    <i style="font-size: 22px;color: #585656" class="fa fa-ticket"></i>. &#1583;&#1585;
                                    &#1580;&#1585;&#1740;&#1575;&#1606; &#1601;&#1585;&#1608;&#1588;
                                    &#1608; &#1578;&#1582;&#1601;&#1740;&#1601; &#1607;&#1575;&#1740; &#1608;&#1740;&#1688;&#1607;
                                    &#1608;&#1740;&#1604;&#1575;&#1607;&#1575;&#1740; &#1575;&#1602;&#1575;&#1605;&#1578;&#1740;&#1548;
                                    &#1576;&#1604;&#1740;&#1591; &#1607;&#1608;&#1575;&#1662;&#1740;&#1605;&#1575;
                                    &#1608; &#1587;&#1575;&#1740;&#1585; &#1575;&#1591;&#1604;&#1575;&#1593;&#1575;&#1578;
                                    &#1602;&#1585;&#1575;&#1585; &#1576;&#1711;&#1740;&#1585;&#1740;&#1583;.


                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-12 text-center" style="padding: 24px">
                        <p style="margin-top: 10px">
                        <hr style="margin-bottom: 2%"/>
                        قبلا در استانبول سرویس ثبت نام کرده اید : <a style="border-bottom: 1px dashed; color: #e91e63;"
                                                             data-toggle="modal" data-target="#myModal">ورود</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    <?php $__env->endSlot(); ?>
    <?php $__env->startPush('scripts'); ?>
        <script type="text/javascript">


            $('#submit-btn').click(function () {
                var $captcha = $('#recaptcha'),
                    response = grecaptcha.getResponse();

                if (response.length === 0) {
                    if (!$captcha.hasClass("error")) {
                        $captcha.addClass("error");
                    }
                } else {
                    $captcha.removeClass("error");
                    $('#form-validation').submit();
                }
            })

        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>