<!DOCTYPE html>
<html data-ng-app="app" dir="ltr" class="ng-scope mm-background mm-front" lang="en"><!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="adib-it">
    <meta name="generator" content="ADIB IT">
    <meta property="og:title" content="خانه استانبول">
    <meta property="og:url" content="http://khaneistanbul.com.tr">
    <meta property="og:type" content="rent">
    <meta property="og:locale" content="fa_IR">
    <meta property="og:locale:alternate" content="en-us">
    <meta property="og:image" content="<?php echo e(asset('new/img/logo/logo-og.png')); ?>" />
    <title>خانه استانبول</title>
    <link rel="canonical" href="/">
    <meta name="theme-color" content="#dc2c2c">

    <link href="<?php echo e(asset('new/css/swiper-bundle.min.css')); ?>" rel="stylesheet">
    <link href="https://sachinchoolur.github.io/lightgallery.js/lightgallery/css/lightgallery.css" rel="stylesheet">
    <link href="<?php echo e(asset('new/css/fonts.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('new/css/style.css?v=').time()); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('new/css/responsive.css?v=').time()); ?>" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo e(asset('new/img/logo/logo-2.png')); ?>">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php echo $__env->yieldContent('styles'); ?>

    <style>
        @media (min-width: 768px) {
            .dis_none_desktop {
                display: none !important;
            }
        }

        .swal-text {
            direction: rtl;
            text-align: justify
        }

        .raychat_main_button {
            box-shadow: none !important;
        }

    </style>
    <script type="text/javascript">!function () {
            function t() {
                var t = document.createElement("script");
                t.type = "text/javascript", t.async = !0, localStorage.getItem("rayToken") ? t.src = "https://app.raychat.io/scripts/js/" + o + "?rid=" + localStorage.getItem("rayToken") + "&href=" + window.location.href : t.src = "https://app.raychat.io/scripts/js/" + o + "?href=" + window.location.href;
                var e = document.getElementsByTagName("script")[0];
                e.parentNode.insertBefore(t, e)
            }

            var e = document, a = window, o = "dbd5145d-aa28-4793-90bb-0b0f22340d37";
            "complete" == e.readyState ? t() : a.attachEvent ? a.attachEvent("onload", t) : a.addEventListener("load", t, !1)
        }();</script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SPMBYNWEXF"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-SPMBYNWEXF');
    </script>

    <title>Gayrimenkul Danışmanlığı | Keller Williams Türkiye | KW Turkiye</title>


    <script src="<?php echo e(asset('new/files/js_003.js')); ?>"></script>
    <script src="<?php echo e(asset('new/files/ai.js')); ?>"></script>
    <script type="text/javascript" charset="UTF-8" src="<?php echo e(asset('new/files/common.js')); ?>"></script>
    <script type="text/javascript" charset="UTF-8" src="<?php echo e(asset('new/files/util.js')); ?>"></script>

    <link ng-href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,400italic,700&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css" href="files/css_002.css">
    <link rel="stylesheet" id="stylesheet_WebsiteCssUrl" type="text/css" href="<?php echo e(asset('new/files/site.css')); ?>">
    <link rel="stylesheet" id="stylesheet_WebsiteCssUrl" type="text/css" href="<?php echo e(asset('new/files/site.min.css?v=').time()); ?>">
    <link rel="stylesheet" id="stylesheet_CustomCssUrl" type="text/css" href="<?php echo e(asset('new/files/custom.css')); ?>">
    <link href="<?php echo e(asset('new/files/css.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('new/files/app-styles.css?v=').time()); ?>" rel="stylesheet">

</head>

<body ng-controller="common.views.layout as vm" class="ng-scope">
<nav id="menu" class="mm-menu mm-horizontal mm-offcanvas mm-front">
    <!----------------------ADDED CUSTOM HAMBURGER MENU AND MENU SLIDE OUT------------------->
    <a class="show" style="display:none;">

        <button class="show-button" type="button">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

    </a>
    <!----------------------END ADDED CUSTOM HAMBURGER MENU AND MENU SLIDE OUT------------------->
    <ul class="mm-list mm-panel mm-opened mm-current ng-scope">
        <li class="menu-header"><a href="javascript:void(0);" class="close-menu"><img
                        src="<?php echo e(asset('new/files/menu-close.png')); ?>">منو</a>
        </li>
        <?php if(auth()->check()): ?>
            <form action="<?php echo e(route('logout')); ?>" method="POST" class="logout-form" id="frm_log1">
                <?php echo csrf_field(); ?>
            </form>
            <li>
                <a href="<?php echo e(route('index')); ?>">پنل کاربری</a>
            </li>
            <li>
                <a href="javascript:void(0);" onclick="return $('#frm_log1').submit()">خروج</a>
            </li>
            <li><a href="<?php echo e(route('front-favorites-list')); ?>">علاقه مندی ها</a></li>
        <?php else: ?>
            <li class="dis_none_desktop"><a href="<?php echo e(route('login')); ?>">ورود</a></li>
        <?php endif; ?>

        <li><a href="<?php echo e(route('front.villas.index','new')); ?>">پروژه های نوساز</a></li>
        <li><a href="<?php echo e(route('front.villas.index','old')); ?>">املاک دست دوم</a></li>
        <li><a href="<?php echo e(route('front.villas.index', ['all','type=پیشنهاد-ویژه'])); ?>">پیشنهاد های ویژه</a></li>
        <li><a href="<?php echo e(route('front.faq')); ?>">سوالات متداول</a></li>
        <li><a href="<?php echo e(route('front.villas.locations')); ?>">ناحیه های استانبول</a></li>
        <li><a href="<?php echo e(route('front.blog.index')); ?>">بلاگ</a></li>
        <li><a href="<?php echo e(route('front.passports.create')); ?>">پاسپورت ترکیه</a></li>
        <li><a href="<?php echo e(route('front-contact')); ?>">تماس با ما</a></li>
        <li><a href="#">مشاوره آنلاین</a></li>
        <li><a href="<?php echo e(route('front.about')); ?>">درباره ما</a></li>
    </ul>
</nav>
<div class="mm-page mm-slideout">
    <div ng-spinner-bar="" class="page-spinner-bar hide">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
    <div id="page" class="one-col mm-page mm-slideout home">
        <div class="shader"></div>
        <!-- ngInclude: '~/App/common/views/layout/header.cshtml' -->
        <div data-ng-include="'~/App/common/views/layout/header.cshtml'"
             data-ng-controller="common.views.layout.header as vm" class="ng-scope">
            <nav class="navbar navbar-default navbar-fixed-top always-open ng-scope">
                <div class="container">
                    <div class="navbar-header">
                        <a href="#menu" class="navbar-brand">
                            <button class="navbar-toggle" type="button"><span class="icon-bar"></span> <span
                                        class="icon-bar"></span> <span class="icon-bar"></span></button>
                        </a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="<?php echo e(route('front-index')); ?>">خانه</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('front.projects.index')); ?>">پروژه ها</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('front.blog.index')); ?>">بلاگ</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('front-contact')); ?>">تماس با ما</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('front.about')); ?>">درباره ما</a>
                        </li>
                    </ul>
                    <div class="nav-brand">
                        <a href="<?php echo e(url('/')); ?>" style="background-image: url('<?php echo e(asset('new/files/logo-200.png')); ?>');" class="nav-logo"></a>
                        <div class="dropdown user-dropdown-container">
                            <a type="button" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-2x fa-user"></i>
                            </a>
                            <div class="dropdown-menu user-dropdown">
                                <?php if(auth()->check()): ?>
                                    <h5 class="dropdown-header"><?php echo e(auth()->user()->first_name); ?> <?php echo e(auth()->user()->last_name); ?></h5>
                                    <form action="<?php echo e(route('logout')); ?>" method="POST" class="logout-form" id="frm_log2">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                    <a class="dropdown-item" href="<?php echo e(route('index')); ?>">پنل کاربری</a>
                                    <a class="dropdown-item" href="javascript:void(0);" onclick="return $('#frm_log2').submit()">خروج</a>
                                <?php else: ?>
                                    <a class="dropdown-item" href="<?php echo e(route('login')); ?>">ورود</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div class="fade-in-up">

            <div ng-controller="common.views.home.index as vm" class="ng-scope">
                <!-- ngInclude: vm.getInclude() -->
                <div ng-include="vm.getInclude()" onload="finishLoading()" class="ng-scope">

                    <?php echo $__env->yieldContent('content'); ?>

                </div>

            </div>
        </div>



























































        <div class="ng-scope">
            <footer class="ng-scope">






                <div class="footer-no-social" style="display: block ruby">
                    <h4>Info@khaneistanbul.com.tr
                    <i class="fa fa-envelope"></i>
                    </h4>
                    <h4 style="margin-right: 15px;"><a style="font-size: 21px;direction: ltr;unicode-bidi: plaintext;" class="contact-content" href="tel:0090 534 352 22 22">+90 534 352 22 22</a>
                    <i class="fa fa-phone-alt"></i>
                    </h4>
                </div>








                <div class="footer-links-small">
                    <a href="javascript:void(0)">Designed By</a>
                    <a href="https://adib-it.com" target="_blank">ADIB-IT.COM</a>
                    <span> | </span>
                    طراحی توسعه
                    <a href="https://adib-it.com" target="_blank">شرکت ادیب گستر عصر نوین</a>
                </div>
            </footer>
        </div>
    </div>
</div>


<script defer="defer" src="<?php echo e(asset('new/files/app-scripts.js')); ?>"></script>

<script src="<?php echo e(asset('new/files/jquery.js')); ?>" defer="defer"></script>

<script src="<?php echo e(asset('new/js/jquery-3.5.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('new/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('new/js/jquery.mask.min.js')); ?>"></script>
<script src="<?php echo e(asset('new/js/swiper-bundle.min.js')); ?>"></script>
<script src="https://sachinchoolur.github.io/lightgallery.js/static/js/jquery.justifiedGallery.min.js"></script>
<script src="https://sachinchoolur.github.io/lightgallery.js/lightgallery/js/lightgallery.js"></script>
<script src="https://sachinchoolur.github.io/lightgallery.js/lightgallery/js/lg-thumbnail.js"></script>
<script src="https://sachinchoolur.github.io/lightgallery.js/lightgallery/js/lg-share.js"></script>
<script src="https://sachinchoolur.github.io/lightgallery.js/lightgallery/js/lg-fullscreen.js"></script>
<script src="https://sachinchoolur.github.io/lightgallery.js/lightgallery/js/lg-zoom.js"></script>
<script src="https://sachinchoolur.github.io/lightgallery.js/lightgallery/js/lg-autoplay.js"></script>
<script src="https://sachinchoolur.github.io/lightgallery.js/lightgallery/js/lg-hash.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script src="https://kit.fontawesome.com/f113857976.js" crossorigin="anonymous"></script>
<script src="<?php echo e(asset('new/js/script.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>

<script>
    <?php if(session()->has('flash_message')): ?>
    $(document).ready(function () {
        swal({
            title: " عملیات موفق",
            text: "<?php echo e(session('flash_message')); ?>",
            icon: "success",
        })
    });
    <?php endif; ?>
    <?php if(session()->has('err_message')): ?>
    $(document).ready(function () {
        swal({
            title: " عملیات ناموفق",
            text: "<?php echo e(session('err_message')); ?>",
            icon: "warning",
        })
    });
    <?php endif; ?>
</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    $(document).ready(function () {
        $('.numberPrice').text(function (index, value) {
            return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    });
    AOS.init({
        easing: 'ease-in-out-sine'
    });
    CSS.registerProperty({
        name: '--r',
        syntax: '<percentage>',
        initialValue: '0%',
        inherits: false
    });
</script>
<script>
    function like(id,type,el) {
        $('.like-loader'+id).toggleClass('d-none');
        $(el).toggleClass('d-none');
        $.ajax({
            url:  '<?php echo e(url('/')); ?>'+'/add_fav/'+id+'/'+type,
            context: document.body
        }).done(function(data) {
            let liked='<?php echo e(asset('new/img/icon/heart_red.png')); ?>';
            let unliked='<?php echo e(asset('new/img/icon/heart_gray.png')); ?>';
            //alert(el)
            if(data=='liked'){
                $(el).attr('src',liked);
            }else{
                $(el).attr('src',unliked);
            }
            $('.like-loader'+id).toggleClass('d-none');
            $(el).toggleClass('d-none');
        });
    }
</script>
<?php echo $__env->yieldContent('scripts'); ?>

</body>
</html>