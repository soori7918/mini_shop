<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('front/css/uikit.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('front/css/uikit-rtl.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('front/css/chosen.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front/css/font.css')); ?>">
    <link href="<?php echo e(asset('new/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('new/css/swiper-bundle.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('new/css/fonts.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('new/css/style.css?v=0.0.2')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('new/css/responsive.css')); ?>" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo e(asset('front/css/front.css')); ?>"/>

    <script src="<?php echo e(asset('front/js/uikit.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front/js/uikit-icons.min.js')); ?>"></script>
</head>

<body>
<div class="cover_b"></div>

    <section class=" header uk-visible@m">
        <div uk-grid class="uk-grid-collapse">
            <div class="uk-width-3-4">
                <ul>
                    <li>
                        <i class="fa fa-bars" onclick="open_menu()"></i>
                    </li>
                    <li><a href="#">پروژها</a></li>
                    <li><a href="#">وبلاگ</a></li>
                    <li><a href="#">تماس با ما</a></li>
                    <li><a href="#">ارتباط با ما</a></li>
                    <li><a href="#"><i class="fa fa-home"></i></a></li>
                </ul>
            </div>
            <div class="uk-width-1-4 uk-text-left">
                <ul>

                    <li><a href="<?php echo e(url('register')); ?>">ثبت نام</a></li>
                    <li><a href="<?php echo e(url('login')); ?>">ورود</a></li>
                    <li><a href="<?php echo e(route('front-index')); ?>">
                            <div class="logo_left">
                                <img src="<?php echo e(asset('img/bg/logo_t.png')); ?>" alt="">
                            </div></a></li>
                </ul>
            </div>

        </div>
    </section>
    <section class=" header uk-hidden@m">
        <div uk-grid class="uk-grid-collapse">
            <div class="uk-width-1-5 menu_btn">

                        <i class="fa fa-bars" onclick="open_menu()"></i>
            </div>
            <div class="uk-width-3-5 uk-text-right ">
                <ul>

                    <li><a href="<?php echo e(url('register')); ?>">ثبت نام</a></li>
                    <li><a href="<?php echo e(url('login')); ?>">ورود</a></li>
                    <li><a href="#">
                            <div class="logo_left">
                                <img src="<?php echo e(asset('img/bg/logo_t.png')); ?>" alt="">
                            </div></a></li>
                </ul>
            </div>
            <div class="uk-width-1-5 menu_btn uk-text-left">
                <i class="fa fa-bars" onclick="openNav()"></i>
            </div>

        </div>

    </section>

<section class="body">
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#">صفحه اصلی</a>
        <a href="#">پروژها</a>
        <a href="#">وبلاگ</a>
        <a href="#">تماس با ما</a>
        <a href="#">ارتباط با ما</a>
    </div>

    <ul class="menu_right" id="menu_box">
        <li><a href="#"><span>پروژها</span></a>
            <i class="fa fa-times close_menu" onclick="close_menu()"></i>
        </li>
        <li><a href="#"><span>پورتفوی</span></a></li>
        <li><a href="#"><span>پیشنهاد های ویژه</span></a></li>
        <li><a href="#"><span>مشاوره سرمایه گذاری</span></a></li>
        <li><a href="#"><span>مشاوره حقوقی</span></a></li>
        <li><a href="<?php echo e(route('front.company_registration')); ?>"><span>ثبت شرکت</span></a></li>
        <li><a href="#"><span>سوالات متداول</span></a></li>
        <li><a href="#"><span>مناطق استانبول</span></a></li>
        <li><a href="#"><span>وبلاگ</span></a></li>
        <li><a href="#"><span>تماس با ما</span></a></li>
        <li><a href="<?php echo e(route('front.about')); ?>"><span>درباره ما</span></a></li>
    </ul>

    <a href="<?php echo e(route('login_office')); ?>">
        <div class="login_expert">
            کارشناس
            <i class="fas fa-angle-double-right"></i>
        </div>
    </a>
    <div class="social_left">
        <div class="social_icon_box">
            <a href="#">
                <img src="<?php echo e(asset('img/wat.png')); ?>" alt="">
            </a>
        </div>
        <div class="social_icon_box">
            <a href="#">
                <img src="<?php echo e(asset('img/in.png')); ?>" alt="">
            </a>
        </div>
        <div class="social_icon_box">
            <a href="#">
                <img src="<?php echo e(asset('img/you.png')); ?>" alt="">
            </a>
        </div>
    </div>
    <div class=""></div>
    <div uk-grid class="uk-grid-collapse">
        <div class="uk-width-1-2m uk-width-4-5@s uk-align-center contect_body" >
            <?php echo $__env->yieldContent('contact'); ?>;
        </div>
    </div>
</section>
<section class="footer">
    <div class="uk-align-center footer_img_box">
        <img src="<?php echo e(url('src/images/star.png')); ?>" alt="">
    </div>
</section>

<section class="project-list">

</section>

<script src="<?php echo e(asset('new/js/jquery-3.5.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('new/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('new/js/swiper-bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('front/js/jscriptmenu.js')); ?>"></script>
<script src="<?php echo e(asset('front/js/chosen.jquery.js')); ?>"></script>

<script type="text/javascript">
    $(".chosen").chosen();
    function open_menu() {
        $('#menu_box').addClass("show");
    }
    function close_menu() {
        $('#menu_box').removeClass("show");
    }
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }

</script>

<?php echo $__env->yieldContent('script'); ?>;

<script src="<?php echo e(asset('new/js/script.js')); ?>"></script>
</body>
</html>
