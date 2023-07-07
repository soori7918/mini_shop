<?php $__env->startComponent('layouts.front'); ?>
    <?php $__env->slot('title'); ?> <?php if($setting->contact_title): ?><?php echo e($setting->contact_title); ?> <?php endif; ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('meta'); ?>
        <?php if($setting->contact_keywords): ?>
            <meta http-equiv="keywords" name="keywords" content="<?php echo e($setting->contact_keywords); ?>"/>
        <?php endif; ?>
        <meta property="og:title" content="<?php echo e($setting->title); ?>"/>
        <?php if($slider && $slider->photo): ?>
            <meta property="og:image" content="<?php echo e(url($slider->photo->path)); ?>"/>
        <?php endif; ?>
        <meta property="og:type" content="ContactUs"/>
        <meta property="og:url" content="http://villexer.com/contact-us"/>
        <meta property="og:site_name" content="<?php echo e($setting->title); ?>"/>
        <meta property="og:locale" content="fa_ir"/>
        <?php if($setting->contact_description): ?>
            <meta http-equiv="description" name="description" content="<?php echo e($setting->contact_description); ?>"/>
        <?php endif; ?>
    <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <style>
            .footer:before {
                background-color: #f8f8f8;
            }

            .header-title h4 {
                color: #fff;
            }

            .title h6 {
                margin-bottom: 0;
            }

            .section {
                padding: 0 0;
            }

            .list-icon li {
                min-height: 0px !important;
            }

            .header-title h1 {
                color: white;
                font-weight: bold;
                text-shadow: 0px 0px 10px rgb(0, 0, 0);
            }

            @media (max-width: 500px) {
                .mobile {
                    margin-top: -18px;
                    padding-bottom: 0px;
                    height: 1360px;
                    margin-bottom: 0px !important;
                }
            }

            .mobile {
                margin-bottom: 12px;
            }
        </style>
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
        <section class="wheydo section">
            <div class="container">
                <?php if($slider): ?>
                    <p class="text-justify mb-4"><?php echo $slider->text; ?></p>
                <?php endif; ?>
                <div class="row mobile">
                    <div class="whey-text col-md-12" style="padding-bottom: 0px">
                        <div class="row">
                            <div class="col-md-3">
                                <ul class="list-icon">
                                    <li>
                                        <span class="icon-home"></span> <strong>آدرس :</strong>
                                        تهران ، بلوار آیت اله کاشانی ، خیابان بهمنی نژاد ، ساختمان شماره 15 ، روبروی باشگاه پرسپولیس ،واحد 1
                                    </li>
                                    <li>
                                        <span class="fa fa-phone"></span> <strong>تلفن :</strong> 02129495
                                    </li>

                                    <li>
                                        <span class="fa fa-clock-o"></span> <strong>&#1587;&#1575;&#1593;&#1575;&#1578;
                                            &#1705;&#1575;&#1585;&#1740; :</strong> &#1587;&#1575;&#1593;&#1578; 9
                                        &#1589;&#1576;&#1581; &#1578;&#1575;
                                        6
                                        &#1593;&#1589;&#1585;
                                    </li>
                                    <li>
                                        <span class="fa fa-envelope"></span> <strong>&#1575;&#1740;&#1605;&#1740;&#1604;
                                            :</strong> <a class="color"
                                                          href="mailto:info@istanbulservice.com">info@istanbulservice.com</a>
                                    </li>
                                    <li>

                                        <iframe style="margin-right: -11%"
                                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12960.397937875354!2d51.4346945!3d35.6991694!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd1fdaab003c100!2z2KLamNin2YbYsyDZhdiz2KfZgdix2KrbjCDZiNuM2YTaqdiz2LE!5e0!3m2!1sen!2s!4v1524577733934"
                                                width="100%" height="210" frameborder="0"></iframe>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-9">
                                <?php echo e(Form::open(array('route' => 'contact-store', 'method' => 'PUT', 'id' => 'form-validation'))); ?>

                                <div class="row">
                                    <?php if(auth()->guard()->check()): ?>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputName"><span style="color: #ed145b">*</span> &#1606;&#1575;&#1605;</label>
                                                <input required name="contact[first_name]" type="text"
                                                       class="form-control"
                                                       id="inputName"
                                                       value="<?php echo e(Auth::user()->first_name); ?>"
                                                       readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputLastName"><span style="color: #ed145b">*</span> &#1606;&#1575;&#1605;
                                                    &#1582;&#1575;&#1606;&#1608;&#1575;&#1583;&#1711;&#1740; </label>
                                                <input required name="contact[last_name]" type="text"
                                                       class="form-control"
                                                       id="inputLastName"
                                                       value="<?php echo e(Auth::user()->last_name); ?>"
                                                       readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputEmail"><span style="color: #ed145b">*</span> &#1575;&#1740;&#1605;&#1740;&#1604;
                                                </label>
                                                <input required name="contact[email]" type="email" class="form-control"
                                                       id="inputEmail" value="<?php echo e(Auth::user()->email); ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputMobile">&#1588;&#1605;&#1575;&#1585;&#1607; &#1605;&#1608;&#1576;&#1575;&#1740;&#1604; </label>
                                                <input name="contact[mobile]" value="<?php echo e(Auth::user()->mobile); ?>"
                                                       type="number" pattern="09[0-9]{9}" class="form-control"
                                                       id="inputMobile" readonly>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(auth()->guard()->guest()): ?>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputName"><span style="color: #ed145b">*</span> &#1606;&#1575;&#1605;
                                                </label>
                                                <input required name="contact[first_name]" type="text"
                                                       class="form-control"
                                                       id="inputName"
                                                       oninvalid="this.setCustomValidity('این فیلد اجباری است.')"
                                                       onchange="try{setCustomValidity('')}catch(e){}"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputLastName"><span style="color: #ed145b">*</span> &#1606;&#1575;&#1605;
                                                    &#1582;&#1575;&#1606;&#1608;&#1575;&#1583;&#1711;&#1740; </label>
                                                <input required name="contact[last_name]" type="text"
                                                       class="form-control"
                                                       id="inputLastName"
                                                       oninvalid="this.setCustomValidity('این فیلد اجباری است.')"
                                                       onchange="try{setCustomValidity('')}catch(e){}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputEmail"><span style="color: #ed145b">*</span> &#1575;&#1740;&#1605;&#1740;&#1604;
                                                </label>
                                                <input required name="contact[email]" type="email" class="form-control"
                                                       id="inputEmail"
                                                       oninvalid="this.setCustomValidity('این فیلد اجباری است.')"
                                                       onchange="try{setCustomValidity('')}catch(e){}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputMobile"><span style="color: #ed145b">*</span> &#1588;&#1605;&#1575;&#1585;&#1607;
                                                    &#1605;&#1608;&#1576;&#1575;&#1740;&#1604; </label>
                                                <input required name="contact[mobile]" type="number"
                                                       pattern="09[0-9]{9}"
                                                       class="form-control"
                                                       id="inputMobile"
                                                       oninvalid="this.setCustomValidity('این فیلد اجباری است.')"
                                                       onchange="try{setCustomValidity('')}catch(e){}">
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputLocation"><span style="color: #ed145b">*</span> &#1605;&#1608;&#1590;&#1608;&#1593;
                                                &#1662;&#1740;&#1575;&#1605; </label>
                                            <input required name="contact[location]" type="text" class="form-control"
                                                   id="inputLocation"
                                                   oninvalid="this.setCustomValidity('این فیلد اجباری است.')"
                                                   onchange="try{setCustomValidity('')}catch(e){}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="contact[LocationName]" value="." type="hidden"
                                                   class="form-control"
                                                   id="inputLocationName"
                                                   oninvalid="this.setCustomValidity('این فیلد اجباری است.')"
                                                   onchange="try{setCustomValidity('')}catch(e){}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="textareaMessage"><span style="color: #ed145b">*</span> &#1662;&#1740;&#1575;&#1605;
                                    </label>
                                    <textarea required name="contact[body]" class="form-control" rows="10"
                                              id="textareaMessage"
                                              oninvalid="this.setCustomValidity('این فیلد اجباری است.')"
                                              onchange="try{setCustomValidity('')}catch(e){}"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="g-recaptcha"
                                             data-sitekey="6Le-SsIUAAAAABBpNNOoWew8QWpLvphUpD-Jxr0t"></div>

                                    </div>
                                    <div class="col-sm-6">
                                        <button style="margin-top: 7%" id="submit-btn" class="btn btn-info float-left"
                                                type="submit"><i
                                                    class="fa fa-angle-right ml-2"></i>&#1575;&#1585;&#1587;&#1575;&#1604;
                                            &#1662;&#1740;&#1575;&#1605;
                                        </button>
                                    </div>
                                </div>

                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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