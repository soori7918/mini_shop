<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" prefix="og:http://ogp.me/" itemscope="itemscope"
      itemtype="http://schema.org/WebPage" <?php echo e(isset($dir) ? $dir : null); ?>>
<head>
    <title><?php echo e(isset($title) ? $title : 'ویلکسر'); ?></title>
    <?php echo e(isset($meta) ? $meta : null); ?>

    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>
    <meta name="base-url" content="<?php echo e(url('/')); ?>"/>
    <link rel="Shortcut Icon" type="image/x-icon" href="<?php echo e(asset('img/logo.png')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap.min.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/ripple.min.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/jgrowl.min.css')); ?>"/>
    <?php echo $__env->yieldPushContent('stylesheets'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/core.min.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/colors.min.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/fonts.min.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/owl.carousel.min.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/revolution.min.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/animate.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/front.css')); ?>"/>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>

    <style>
        body{
            overflow-x: hidden;
        }
        #button {
            display: inline-block;
            background-color: #e91e63;
            width: 36px;
            height: 36px;
            text-align: center;
            border-radius: 30px;
            position: fixed;
            bottom: 29px;
            right: 30px;
            transition: background-color .3s, opacity .5s, visibility .5s;
            opacity: 0;
            visibility: hidden;
            z-index: 1000;
        }

        #button::after {
            content: "\f077";
            font-family: FontAwesome;
            font-weight: normal;
            font-style: normal;
            font-size: 1em;
            line-height: 37px;
        }

        #button:hover {
            cursor: pointer;
            background-color: #333;
        }

        #button:active {
            background-color: #555;
        }

        #button.show {
            opacity: 1;
            visibility: visible;
        }

        .m-right-9 {
            margin-right: 9%;
        }

        .m-left-11 {
            margin-left: 6%;
        }

        .nav-item a {
            color: black !important;
        }

        .navbar-light .navbar-toggler {
            border-color: transparent !important;
        }

        .nav-item {
            padding: 9px;
        }

        .nav-mobile {
            display: none;
        }

        .sub-header .header-title p {
            font-weight: bold;
        }

        @media (max-width: 800px) {

            .sub-header .header-title p {
                margin-top: 0rem;
                font-weight: bold;
            }

            .sort li a {
                font-size: 10px;
            }

            .text-justify {

                padding-right: 7px;
                padding-left: 7px;

            }

            .sub-logo {
                margin-top: 48% !important;
                z-index: 7;
            }

            .sub-header .header-title {
                margin-top: 3vh !important;
            }

            .footer-top h5 {
                text-align: center;
            }

            .div-res {
                display: none;
            }

            .header-destination .btn {
                margin-top: 0px !important;
            }

            .nav-mobile {
                display: block;
            }

            .mtp-1 {
                float: right;
            }

            .favourite {
                display: none;
            }

            .nav ul li {
                padding: 0.7rem 1rem;
            }

            .m-right-9 {
                display: none !important;
            }

            .nav .container ul {
                display: none !important;
            }

            .whey-header {
                display: none;
            }

            .container .circle {
                height: 76px;
                width: 62px;
                padding: 3px;
                margin-right: 5px;
            }

            .information .row .col-sm-12:nth-of-type(2):before, .information .row .col-sm-12:nth-of-type(3):before, .information .row .col-sm-12:nth-of-type(4):before {
                display: none !important;
            }

            .header-title {
                margin-top: 10vh
            }

            .header-wrapper {
                height: 57vh !important;
            }

            .header {
                height: 57vh !important;
            }

            .sub-header {
                margin-top: -19vh;
            }

            .m-right-9 {
                margin-right: 0px;
            }

            .m-left-11 {
                margin-left: 0px;
            }

            .flipInX {
                display: none !important;
            }

            .footer-bottom {
                margin: 11rem 0;
            }

            .footer-top ul {
                text-align: right;
                padding-right: 0px;

            }

            .footer-ul {
                padding-right: 37% !important;
            }

            .footer-bottom > div i {
                font-size: 22px;
                border: 2px solid;
                color: #ed145b;
                width: 34px;
                height: 36px;
                text-align: center;
                line-height: 1.6;
                border-radius: 0px;
            }

            .padding-r-6 {
                padding-right: 0px;
            }

            .padding-r-6 .fa-phone {
                margin-top: 1rem;
            }

            .col-sm-7 ul .fa-map-marker {
                margin-top: 1rem;
            }

        }

        .padding-r-6 {
            padding-right: 6%;
        }

        .ribbon {
            position: absolute;
            -webkit-box-sizing: content-box;
            -moz-box-sizing: content-box;
            box-sizing: content-box;
            width: 0;
            height: 55px;
            border: 27px solid #e91e63ab;
            border-top: 0 solid;
            border-bottom: 15px solid rgba(0, 0, 0, 0);
            font: normal 90%/normal Arial, Helvetica, sans-serif;
            color: rgba(0, 0, 0, 1);
            -o-text-overflow: clip;
            text-overflow: clip;
            background: transparent;
        }

        .m-left-11 li a {
            color: black !important;
        }

        .m-right-9 li a {
            color: black !important;
        }

        .m-t-11 li a {
            color: black !important;

        }

        .m-t-11 li p {
            color: black !important;

        }

        .kio_sst:hover {
            background-color: #ed145b;
        }

        @media (max-width: 500px) {
            .mobile-footer {
                margin-right: -119px;
                margin-top: 17px;
            }
        }
    </style>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-117713864-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-117713864-1');
    </script>

</head>
<body>
<div class="app" data-direction="rtl">


    <main class="main">


        <div class="container">

            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">&#1608;&#1585;&#1608;&#1583; &#1576;&#1607; &#1608;&#1740;&#1604;&#1705;&#1587;&#1585;</h4>
                        </div>
                        <div class="modal-body">
                            <?php echo e(Form::open(array('route' => 'login'))); ?>

                            <div class="form-group">
                                <?php echo e(Form::label('username', '&#1575;&#1740;&#1605;&#1740;&#1604;')); ?>

                                <?php echo e(Form::text('username', '', array('class' => 'form-control'))); ?>

                            </div>
                            <div class="form-group">
                                <?php echo e(Form::label('password', '&#1585;&#1605;&#1586; &#1593;&#1576;&#1608;&#1585;')); ?>

                                <?php echo e(Form::password('password', array('class' => 'form-control'))); ?>

                            </div>
                            <br/>
                        </div>
                        <div class="modal-footer">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="checkbox" style="margin-bottom: 10px;">
                                            <input type="checkbox" name="remember" id="remember">
                                            <label for="remember">&#1605;&#1585;&#1575; &#1576;&#1607; &#1582;&#1575;&#1591;&#1585;
                                                &#1583;&#1575;&#1588;&#1578;&#1607; &#1576;&#1575;&#1588;</label>
                                        </div>
                                        <span style="padding-right: 3px;">قبلا در ویلکسر ثبت نام نکرده اید؟</span><a
                                                href="<?php echo e(url('register')); ?>" target="_blank" style="color: #7e57c2">
                                            ویلر شوید. </a>
                                    </div>
                                    <div class="col-md-4">
                                        <?php echo e(Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>&#1608;&#1585;&#1608;&#1583;', array('type' => 'submit', 'class' => 'btn btn-rounded btn-danger float-left mr-2' , 'style' => 'margin-top : 5px'))); ?>

                                        <?php echo e(Form::close()); ?>

                                        <a data-toggle="modal" data-target="#forgetMy"
                                           href="<?php echo e(route('password.request')); ?>" style="margin-top: 5px;"
                                           class="btn btn-rounded btn-secondary float-left"><i
                                                    class="fa fa-unlock ml-1"></i>&#1601;&#1585;&#1575;&#1605;&#1608;&#1588;&#1740;
                                            &#1585;&#1605;&#1586; &#1593;&#1576;&#1608;&#1585;</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="modal fade" id="forgetMy" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content" style="margin-right: 16px">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">بازیابی رمز عبور</h4>
                        </div>
                        <div class="modal-body">
                            <?php echo e(Form::open(array('route' => 'passwordreset'))); ?>

                            <div class="form-group">
                                <?php echo e(Form::label('email', 'ایمیل خود را وارد کنید')); ?>

                                <?php echo e(Form::email('email', '', array('class' => 'form-control send-email' , 'required'))); ?>

                            </div>
                            <br/>
                        </div>
                        <div class="modal-footer">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">

                                        <span style="padding-right: 3px;">قبلا در ویلکسر ثبت نام نکرده اید؟</span><a
                                                href="<?php echo e(url('register')); ?>" target="_blank" style="color: #7e57c2">
                                            ویلر شوید. </a>
                                    </div>
                                    <div class="col-md-4">
                                        <?php echo e(Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>بازیابی', array('type' => 'button', 'class' => 'btn btn-rounded btn-danger btn-send float-left mr-2'))); ?>

                                        <?php echo e(Form::close()); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>


        <nav style="direction: ltr" class="navbar navbar-expand-lg navbar-light bg-light nav-mobile">
            <?php if(Auth::user()): ?>
                <a class="navbar-brand" href="<?php echo e(route('front-favorites-list')); ?>"><?php echo e(Auth::user()->first_name . ' ' . Auth::user()->last_name); ?></a>
            <?php else: ?>
                <a class="navbar-brand" data-toggle="modal" data-target="#myModal"> ورود / ثبت نام </a>
            <?php endif; ?>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div style="z-index: 2147483647; position: absolute;top: 100%;" class="collapse navbar-collapse"
                 id="navbarNavDropdown">
                <ul class="navbar-nav" style="background-color: #f8f9fa">

                    <li class="nav-item active">
                        <a href="<?php echo e(route('front-index')); ?>"><i
                                    class="fa fa-home ml-2 mtp-1"></i>صفحه اصلی</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo e(route('front-location-index')); ?>"><i
                                    class="nc-icon location_pin ml-2 mtp-1"></i>&#1605;&#1602;&#1575;&#1589;&#1583;
                            &#1608;&#1740;&#1604;&#1575;&#1740;&#1740;</a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)"><i class="nc-icon design_image ml-2 mtp-1"></i>&#1711;&#1588;&#1578;&nbsp&#1607;&#1575;&#1740;
                            &#1578;&#1601;&#1585;&#1740;&#1581;&#1740;</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('front-about')); ?>"><i class="nc-icon users_single-02 ml-2 mtp-1"></i>&#1583;&#1585;&#1576;&#1575;&#1585;&#1607;
                            &#1605;&#1575;</a>
                    </li>


                    <li class="nav-item">
                        <a href="<?php echo e(route('front-blog')); ?>"><i class="nc-icon files_paper ml-2 mtp-1"></i>&#1605;&#1580;&#1604;&#1607;
                            &#1608;&#1740;&#1604;&#1705;&#1587;&#1585;</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo e(route('front-contact')); ?>"><i class="nc-icon ui-2_chat-round ml-2 mtp-1"></i>&#1575;&#1585;&#1578;&#1576;&#1575;&#1591;
                            &#1576;&#1575; &#1605;&#1575;</a>
                    </li>
                    <?php if(Auth::user()): ?>
                        

                        
                        

                    <?php else: ?>
                        

                    <?php endif; ?>
                    <?php if(auth()->guard()->check()): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('front-favorites-list')); ?>"><i class="fa fa-heart ml-2 text-pink"></i>&#1593;&#1604;&#1575;&#1602;&#1607;
                                &#1605;&#1606;&#1583;&#1740; &#1607;&#1575;&#1740; &#1605;&#1606;<input
                                        class="favourite"
                                        value="<?php echo e(\App\Like::where('user_id', Auth::user()->id)->count()); ?>"></a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('login')); ?>"><i class="fa fa-heart ml-2 text-pink"></i>&#1593;&#1604;&#1575;&#1602;&#1607;
                                &#1605;&#1606;&#1583;&#1740; &#1607;&#1575;&#1740; &#1605;&#1606;<span></span>
                            </a>
                        </li>
                    <?php endif; ?>


                </ul>
            </div>
        </nav>


        <section class="view-content">

            <nav class="nav">
                <div class="container">

                    <div id="ribbon">

                        <div class="inset"></div>

                        <div class="container">
                            <div class="base"></div>
                            <div class="left_corner"></div>
                            <div class="right_corner"></div>
                        </div>

                    </div>

                    <div class="flipInX  animated">
                        <img style="position: absolute;z-index: 10000; max-width: 118px;top: -13px;"
                             src="<?php echo e(asset('img/stiker.png')); ?>">

                        <?php if(Auth::user()): ?>
                            <a style=" position: absolute;width: 182px;color: white;right: 30px;top: 20px;z-index: 10000; font-size: 10px"
                               href="<?php echo e(route('front-favorites-list')); ?>">
                                &#1582;&#1608;&#1588; &#1570;&#1605;&#1583;&#1740;&#1583;
                            </a>
                        <?php else: ?>


                            <a class="animation-ticket"
                               style=" position: absolute;width: 182px;color: white;right: 35px;top: 13px;z-index: 10000;"
                               data-toggle="modal" data-target="#myModal">&#1608;&#1585;&#1608;&#1583;
                                &#1576;&#1607;<br/> <span style="margin-right: 1px">&#1608;&#1740;&#1604;&#1705;&#1587;&#1585;</span>
                            </a>

                        <?php endif; ?>
                    </div>


                    <ul style="margin-top: 6%" class="float-right m-right-9" data-direction="rtl">
                        <?php if(Route::currentRouteName() != 'front-index'): ?>
                            
                            
                            
                        <?php endif; ?>
                        <li>
                            <a href="<?php echo e(route('front-location-index')); ?>"><i
                                        class="nc-icon location_pin ml-2 mtp-1"></i>&#1605;&#1602;&#1575;&#1589;&#1583;
                                &#1608;&#1740;&#1604;&#1575;&#1740;&#1740;</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="nc-icon design_image ml-2 mtp-1"></i>&#1711;&#1588;&#1578;&nbsp&#1607;&#1575;&#1740;
                                &#1578;&#1601;&#1585;&#1740;&#1581;&#1740;</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('front-about')); ?>"><i class="nc-icon users_single-02 ml-2 mtp-1"></i>&#1583;&#1585;&#1576;&#1575;&#1585;&#1607;
                                &#1605;&#1575;</a>
                        </li>
                    </ul>
                    <ul style="margin-top: 6%;  <?php if(auth()->guard()->check()): ?> margin-left: 6% <?php endif; ?>"
                        class="float-left <?php if(auth()->guard()->check()): ?> <?php else: ?> m-left-11 <?php endif; ?> m-t-11"
                        data-direction="rtl">
                        <li>
                            <a href="<?php echo e(route('front-blog')); ?>"><i class="nc-icon files_paper ml-2 mtp-1"></i>&#1605;&#1580;&#1604;&#1607;
                                &#1608;&#1740;&#1604;&#1705;&#1587;&#1585;</a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('front-contact')); ?>"><i class="nc-icon ui-2_chat-round ml-2 mtp-1"></i>&#1575;&#1585;&#1578;&#1576;&#1575;&#1591;
                                &#1576;&#1575; &#1605;&#1575;</a>
                        </li>
                        <?php if(Auth::user()): ?>
                            

                            
                            

                        <?php else: ?>
                            

                        <?php endif; ?>
                        <?php if(auth()->guard()->check()): ?>
                            <li>
                                <a href="<?php echo e(route('front-favorites-list')); ?>"><i class="fa fa-heart ml-2 text-pink"></i>&#1593;&#1604;&#1575;&#1602;&#1607;
                                    &#1605;&#1606;&#1583;&#1740; &#1607;&#1575;&#1740; &#1605;&#1606;<input
                                            class="favourite"
                                            value="<?php echo e(\App\Like::where('user_id', Auth::user()->id)->count()); ?>"
                                            disabled></a>
                            </li>
                        <?php else: ?>
                            <li>
                                <a data-toggle="modal" data-target="#myModal"><i class="fa fa-heart ml-2 text-pink"></i>&#1593;&#1604;&#1575;&#1602;&#1607;
                                    &#1605;&#1606;&#1583;&#1740; &#1607;&#1575;&#1740; &#1605;&#1606;<span></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
            <?php echo $__env->make('panel.messages.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo e(isset($body) ? $body : null); ?>

        </section>
        <footer class="footer" data-direction="rtl">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mb-5 text-center">
                            <img style="width: 147px" src="<?php echo e(asset('img/footer-logo.png')); ?>" alt="logo"/>
                        </div>
                        <span class="col-md-2"></span>
                        <div class="col-md-2">
                            <h5>&#1605;&#1602;&#1575;&#1589;&#1583; &#1608;&#1740;&#1604;&#1575;&#1740;&#1740;</h5>
                            <ul class="footer-ul">
                                <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e(route('front-location-show', $location->url)); ?>">&#1575;&#1580;&#1575;&#1585;&#1607;
                                            &#1608;&#1740;&#1604;&#1575;
                                            &#1583;&#1585; <?php echo e($location->name); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <span class="col-md-1"></span>
                        <div class="col-md-3">
                            <h5>
                                &#1711;&#1588;&#1578; &#1607;&#1575;&#1740; &#1578;&#1601;&#1585;&#1740;&#1581;&#1740;
                                &#1605;&#1602;&#1575;&#1589;&#1583; &#1608;&#1740;&#1604;&#1575;&#1740;&#1740;
                            </h5>

                            <ul class="footer-ul">
                                <li>
                                    <a href="javascript:void(0)">&#1711;&#1588;&#1578; &#1607;&#1575;&#1740; &#1578;&#1601;&#1585;&#1740;&#1581;&#1740;
                                        &#1662;&#1608;&#1705;&#1578;</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">&#1711;&#1588;&#1578; &#1607;&#1575;&#1740; &#1578;&#1601;&#1585;&#1740;&#1581;&#1740;
                                        &#1576;&#1575;&#1604;&#1740;</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">&#1711;&#1588;&#1578; &#1607;&#1575;&#1740; &#1578;&#1601;&#1585;&#1740;&#1581;&#1740;
                                        &#1587;&#1575;&#1605;&#1608;&#1740;&#1740;</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">&#1711;&#1588;&#1578; &#1607;&#1575;&#1740; &#1578;&#1601;&#1585;&#1740;&#1581;&#1740;
                                        &#1587;&#1585;&#1740;&#1604;&#1575;&#1606;&#1705;&#1575;</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">&#1711;&#1588;&#1578; &#1607;&#1575;&#1740; &#1578;&#1601;&#1585;&#1740;&#1581;&#1740;
                                        &#1711;&#1608;&#1575;</a>
                                </li>
                            </ul>
                        </div>
                        <span class="col-md-1"></span>
                        <div class="col-md-3 footer-ul">
                            <h5 class="mobile-footer">&#1575;&#1591;&#1604;&#1575;&#1593;&#1575;&#1578;
                                &#1576;&#1740;&#1588;&#1578;&#1585;</h5>
                            <ul>
                                <li>
                                    <a href="<?php echo e(route('front-bime')); ?>">&#1576;&#1740;&#1605;&#1607; &#1605;&#1587;&#1575;&#1601;&#1585;&#1578;&#1740;</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">&#1608;&#1740;&#1586;&#1575;</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('front-about')); ?>">&#1587;&#1608;&#1575;&#1604;&#1575;&#1578; &#1662;&#1585;
                                        &#1578;&#1705;&#1585;&#1575;&#1585;</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('front-blog')); ?>">&#1605;&#1580;&#1604;&#1607; &#1608;&#1740;&#1604;&#1705;&#1587;&#1585;</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('front-role')); ?>">&#1602;&#1608;&#1575;&#1606;&#1740;&#1606;
                                        &#1608; &#1605;&#1602;&#1585;&#1585;&#1575;&#1578;</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row footer-bottom">


                        <div class="col-md-3"></div>


                        <div class="col-md-6 text-center">

                            <div style="text-align: center;font-size: 15px;margin-bottom: -11%;color: #e91e63">
                                info@villexer.com
                            </div>

                            <ul class="social">
                                <li><a target="_blank" href="<?php echo e(App\Share::where('id' , 8)->first()->link); ?>"><i
                                                class="fa fa-telegram kio_sst"></i></a></li>
                                <li><a target="_blank" href="<?php echo e(App\Share::where('id' , 7)->first()->link); ?>"><i
                                                class="fa fa-instagram kio_sst"></i></a>
                                </li>
                                <li><a target="_blank" href="<?php echo e(App\Share::where('id' , 6)->first()->link); ?>"><i
                                                class="fa fa-twitter kio_sst"></i></a></li>
                                <li><a target="_blank" href="<?php echo e(App\Share::where('id' , 5)->first()->link); ?>"><i
                                                class="fa fa-facebook-f kio_sst"></i></a>
                                </li>
                                <li><a target="_blank" href="<?php echo e(App\Share::where('id' , 4)->first()->link); ?>"><i
                                                class="fa fa-aparat kio_sst"></i></a>
                                </li>
                                <li><a target="_blank" href="<?php echo e(App\Share::where('id' , 3)->first()->link); ?>"><i
                                                class="fa fa-linkedin kio_sst"></i></a>
                                </li>
                                <li><a target="_blank" href="<?php echo e(App\Share::where('id' , 2)->first()->link); ?>"><i
                                                class="fa fa-google kio_sst"></i></a>
                                </li>
                                <li><a target="_blank" href="<?php echo e(App\Share::where('id' , 1)->first()->link); ?>"><i
                                                class="fa fa-skype kio_sst"></i></a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-3"></div>


                        <div style="margin-top: -1%;padding-right: 12%" class="col-md-12">
                            <div class="row">
                                <div class="col-sm-5">

                                    <ul class="padding-r-6">

                                        <i style="width: 39px; height: 35px;font-size: 20px;" class="fa fa-phone"></i>
                                        

                                        <li class="float-left w-100" data-direction="rtl"
                                            style="line-height: 2;padding: 6px;font-size: 12px">
                                            &#1578;&#1604;&#1601;&#1606; &nbsp;:09127126637
                                            
                                        </li>
                                    </ul>

                                </div>
                                <div class="col-sm-7">

                                    <ul>
                                        <i style="width: 37px; height: 35px;font-size: 20px;"
                                           class="fa fa-map-marker"></i>

                                        <li class="float-left w-100" data-direction="rtl"
                                            style="line-height: 2;padding: 6px;font-size: 12px">
                                            &#1570;&#1583;&#1585;&#1587; : &#1578;&#1607;&#1585;&#1575;&#1606;&#1548;
                                            &#1582;&#1740;&#1575;&#1576;&#1575;&#1606; &#1587;&#1593;&#1583;&#1740;&#1548;
                                            &#1582;&#1740;&#1575;&#1576;&#1575;&#1606; &#1588;&#1607;&#1740;&#1583;
                                            &#1576;&#1585;&#1575;&#1583;&#1585;&#1575;&#1606; &#1602;&#1575;&#1574;&#1583;&#1740;&#1548;
                                            &#1662;&#1604;&#1575;&#1705; 88 &#1548; &#1605;&#1580;&#1578;&#1605;&#1593;
                                            &#1607;&#1583;&#1575;&#1740;&#1578; 1
                                        </li>
                                    </ul>


                                </div>
                            </div>
                            
                                
                                
                                     
                                    
                                
                            

                        </div>


                        <a id="button"></a>


                    </div>
                </div>
            </div>
        </footer>
    </main>
    <?php echo e(isset($map) ? $map : null); ?>

</div>
<script type="text/javascript" src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>

<script type="text/javascript" src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/ripple.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/jgrowl.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/jquery.plugins.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/jquery.revolution.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/front.js')); ?>"></script>

<script>


    $(document).ready(function () {

        var getUrl = window.location;
        var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];


        $('.btn-send').click(function () {

            $.ajax({
                url: baseUrl + '/' + 'passwordreset',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                dataType: 'JSON',
                data: {
                    'email': $('.send-email').val()
                },
                success: function (data) {
                    if (data.result == 0) {
                        $.jGrowl(data.message, {life: 3000, position: 'bottom-right', theme: 'bg-danger'});
                    }

                    if (data.result == 1) {
                        $('#forgetMy').hide();
                        $.jGrowl(data.message, {life: 3000, position: 'bottom-right', theme: 'bg-success'});
                    }
                }
            });

        });


        $('.just-persian').keyup(function () {

            var p = /^[\u0600-\u06FF\s]+$/;
            if (!p.test($(this).val())) {
                $(this).val('');
                $.jGrowl('فقط مجاز به وارد کردن کارکتر فارسی هستید', {
                    life: 3000,
                    position: 'bottom-right',
                    theme: 'bg-danger'
                });
            }

        });
    });

    $(window).scroll(function () {
        if (document.documentElement.clientHeight +
            $(document).scrollTop() >= document.body.offsetHeight) {
            $('.copy-right').css('display', 'none');
        } else {
            $('.copy-right').css('display', 'block');
        }
    });

    $(document).ready(function () {
        var btn = $('#button');

        $(window).scroll(function () {
            if ($(window).scrollTop() > 300) {
                btn.addClass('show');
            } else {
                btn.removeClass('show');
            }
        });

        btn.on('click', function (e) {
            e.preventDefault();
            $('html, body').animate({scrollTop: 0}, '300');
        });

        $('.animation-ticket').parent().hover(function () {
            $(this).children('a').addClass('animated flipInX');
            $(this).mouseleave(function () {
                $(this).children('a').removeClass('animated flipInX');
            });
        });


        // like unlike

        $('.like-icon').click(function (event) {
            var favp = 0;
            var favm = 0;
            var fav = $('.favourite').val();
            favp = parseInt(parseInt(fav) + 1);
            favm = parseInt(parseInt(fav) - 1);
            event.preventDefault();
            $(this).toggleClass('active animated bounce');
            var token = '<?php echo e(csrf_token()); ?>';
            var route = '<?php echo e(route("villa-like")); ?>';
            $.post(route, {_token: token, id: $(this).data('id')}, function (result) {
                if (result == 1) {
                    $('.favourite').val(favp.toString());
                    $.jGrowl('&#1576;&#1607; &#1593;&#1604;&#1575;&#1602;&#1607; &#1605;&#1606;&#1583;&#1740; &#1607;&#1575; &#1575;&#1590;&#1575;&#1601;&#1607; &#1588;&#1583;.', {
                        life: 3000,
                        position: 'top-right',
                        theme: 'bg-success'
                    });
                } else if (result == 2) {
                    $('.favourite').val(favm.toString());
                    $.jGrowl('&#1575;&#1586; &#1593;&#1604;&#1575;&#1602;&#1607; &#1605;&#1606;&#1583;&#1740; &#1607;&#1575; &#1581;&#1584;&#1601; &#1588;&#1583;.', {
                        life: 3000,
                        position: 'top-right',
                        theme: 'bg-warning'
                    });
                } else {
                    $.jGrowl('&#1575;&#1576;&#1578;&#1583;&#1575; &#1608;&#1575;&#1585;&#1583; &#1587;&#1575;&#1740;&#1578; &#1588;&#1608;&#1740;&#1583;!', {
                        life: 3000,
                        position: 'top-right',
                        theme: 'bg-danger'
                    });
                }
            });
        });

    });
</script>
<script type="text/javascript">
    $('.tp-banner').revolution(
        {
            delay: 9000,
            startwidth: 1170,
            startheight: 500,
            hideThumbs: 10
        });
</script>

<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php VisitLog::save();?>