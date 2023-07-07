<!doctype html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="adib-it">
    <meta name="generator" content="ADIB IT">
    <meta id="csrf" name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="keywords" content="<?php echo e($keywordsSeo); ?>">
    <meta name="description" content="<?php echo e($descriptionSeo); ?>"/>
    <meta property="og:title" content="<?php echo e($titleSeo); ?>"/>
    <meta property="og:description" content="<?php echo e($descriptionSeo); ?>"/>
    <meta property="og:url" content="<?php echo e(url('/')); ?>">
    <meta property="og:type" content="rent">
    <meta property="og:locale" content="fa_IR">
    <meta property="og:locale:alternate" content="en-us">
    <meta property="og:image" content="<?php echo e(asset('new/img/logo/logo-og.png')); ?>" />
    <title><?php echo e($titleSeo); ?></title>
    <link rel="canonical" href="/">
    <meta name="theme-color" content="#dc2c2c">
    <link href="<?php echo e(asset('new/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('new/css/swiper-bundle.min.css')); ?>" rel="stylesheet">
    <link href="https://sachinchoolur.github.io/lightgallery.js/lightgallery/css/lightgallery.css" rel="stylesheet">
    <link href="<?php echo e(asset('new/css/fonts.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('new/css/style.css?v=').time()); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('new/css/responsive.css?v=').time()); ?>" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo e(asset('new/img/logo/logo-og.png')); ?>">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/select2.min.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap-select.min.css')); ?>"/>
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
</head>
<body>
<div class="loader dis_none" id="spinner_id">
    <img src="<?php echo e(asset('new/img/loading.gif')); ?>">
</div>
<nav class="navbar navbar-expand-lg site-header-1 py-3">
    <div class="hamburger" data-target="nav-menu">
        <div class="first-line"></div>
        <div class="middle-line"></div>
        <div class="last-line"></div>
    </div>
    <a class="navbar-brand d-none" href="<?php echo e(url('/')); ?>">
        <img src="<?php echo e(asset('new/img/logo/logo-4.png')); ?>" class="main-logo">
    </a>

    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo e(route('front.projects.index')); ?>">پروژه ها</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('front.blog.index')); ?>">بلاگ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('front-contact')); ?>">تماس با ما</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('front.about')); ?>">درباره ما</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-icon" href="<?php echo e(route('front-index')); ?>"><img
                        src="<?php echo e(asset('new/img/icon/home.png')); ?>"></a>
            </li>
        </ul>

        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <?php if(auth()->check()): ?>
                <form action="<?php echo e(route('logout')); ?>" method="POST" class="logout-form" id="frm_log2">
                    <?php echo e(csrf_field()); ?>

                </form>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('index')); ?>">پنل کاربری</a>
                </li>
                <div class="nav-divider"></div>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" onclick="return $('#frm_log2').submit()">خروج</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('front.register.office')); ?>">ثبت نام</a>
                </li>
                <div class="nav-divider"></div>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('login')); ?>">ورود</a>
                </li>
            <?php endif; ?>
            <li class="nav-item nav-item-logo">
                <a class="nav-logo" href="<?php echo e(route('front-index')); ?>"><img src="<?php echo e(asset('new/img/logo/logo-2.png')); ?>"></a>
            </li>
        </ul>
    </div>

    <div class="nav-menu" id="nav-menu">
        <ul>
            <?php if(auth()->check()): ?>
                <form action="<?php echo e(route('logout')); ?>" method="POST" class="logout-form" id="frm_log1">
                    <?php echo e(csrf_field()); ?>

                </form>
                <li class="dis_none_desktop">
                    <a href="<?php echo e(route('index')); ?>">پنل کاربری</a>
                </li>
                <li class="dis_none_desktop">
                    <a href="javascript:void(0);" onclick="return $('#frm_log1').submit()">خروج</a>
                </li>
                <li><a href="<?php echo e(route('front-favorites-list')); ?>">علاقه مندی ها</a></li>
            <?php else: ?>

                <li class="dis_none_desktop"><a href="<?php echo e(route('login')); ?>">ورود</a></li>
                <li class="dis_none_desktop"><a href="<?php echo e(route('front.register.office')); ?>">ثبت نام</a></li>
            <?php endif; ?>

            
            <li><a href="<?php echo e(route('front.villas.index')); ?>">املاک</a></li>
            <li><a href="<?php echo e(route('front.villas.index', ['all','type=پیشنهاد-ویژه'])); ?>">پیشنهاد های ویژه</a></li>
            <li><a href="<?php echo e(route('front.faq')); ?>">سوالات متداول</a></li>
            <li><a href="<?php echo e(route('front.villas.locations')); ?>">ناحیه های استانبول</a></li>
            <li><a href="<?php echo e(route('front.blog.index')); ?>">بلاگ</a></li>
            <li><a href="<?php echo e(route('front.passports.create')); ?>">پاسپورت ترکیه</a></li>
            <li><a href="<?php echo e(route('front-contact')); ?>">تماس با ما</a></li>
            <li><a href="#">مشاوره آنلاین</a></li>
            <li><a href="<?php echo e(route('front.about')); ?>">درباره ما</a></li>
        </ul>
    </div>
</nav>
<?php echo $__env->yieldContent('nav'); ?>
<?php echo $__env->yieldContent('content'); ?>

<?php if($errors->any()): ?>
    <div class="alert alert-danger alert-dismissible fade show alert-popup" role="alert">
        <strong>خطا | </strong>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($error); ?>

            <br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<?php if(session()->has('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show alert-popup" role="alert">
        <strong>خطا | </strong>
        <?php echo e(session()->get('error')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php elseif(session()->has('success')): ?>
    <div class="alert alert-success alert-dismissible fade show alert-popup" role="alert">
        <strong>عملیات موفق | </strong><?php echo e(session()->get('success')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<style>
    .footer-map {
        border-bottom: 10px solid #0000000f;
        margin-bottom: 20px;
    }

    .footer-map iframe#map {
        border: 0;
        width: 100%;
        height: 250px;
        margin-bottom: -8px;
    }

    .footer-bg {
        opacity: 0.2;
        position: absolute;
        left: 20px;
        width: 400px;
        height: unset !important;
    }

    .contact-form input {
        background-color: #ededed;
        border-radius: 25px;
        height: 40px !important;
    }

    .contact-form textarea {
        background-color: #ededed;
        border-radius: 25px;
        height: 150px;
    }

    .contact-form button {
        background-color: #464343;
        border-radius: 25px;
        padding: 5px 20px !important;
    }

    .contact-form .form-group {
        margin-bottom: 0px !important;
    }

    .contact-form .form-group label {
        color: #ffffff;
        margin: 3px 20px;
    }

    .list-style-1 li {
        position: relative;
    }

    .list-style-1 li a i {
        position: absolute;
        right: -20px;
        top: 15px;
    }
</style>
<footer>
    <div class="container-fluid position-relative overflow-hidden mb-5">
        <img src="<?php echo e(asset('new/img/logo/logo-5.png')); ?>" class="footer-bg">
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="contact-form">
                        <form action="<?php echo e(route('front.contact.save')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <label for="name">نام و نام خانوادگی</label>
                                <input type="text" class="form-control" name="name" id="name" maxlength="80"
                                       value="<?php echo e(old('name')); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">ایمیل</label>
                                <input type="email" class="form-control" name="email" id="email" maxlength="80"
                                       value="<?php echo e(old('email')); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="subject">موضوع</label>
                                <input type="text" class="form-control" name="subject" id="subject" maxlength="30"
                                       value="<?php echo e(old('subject')); ?>" required>
                            </div>
                            <div class="form-group mt-3">
                            <textarea class="form-control" placeholder="متن پیام" id="message"
                                      name="message" maxlength="500" required><?php echo old('message'); ?></textarea>
                            </div>
                            <div class="form-group mt-3 text-left">
                                <button type="submit" class="btn btn-secondary btn-sm">ارسال</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3">
                    <ul class="contacts">
                        <li class="contact-item">
                            <img class="contact-icon" src="<?php echo e(asset('new/img/icon/email.png')); ?>">
                            <a class="contact-content"
                               href="mailto:info@khaneistanbul.com.tr">Info@khaneistanbul.com.tr</a>
                        </li>
                        <li class="contact-item">
                            <img class="contact-icon" src="<?php echo e(asset('new/img/icon/phone.png')); ?>">
                            <a class="contact-content" href="tel:0090 534 352 22 22">+90 534 352 22 22</a>
                        </li>
                        <li class="contact-item">
                            <img class="contact-icon" src="<?php echo e(asset('new/img/icon/address.png')); ?>">
                            <a class="contact-content" target="_blank"
                               href="https://www.google.com/maps/@41.1069517,28.9873898,16z">
                                Vadi Istanbul _ A2 Office _ Floor 4 _ No : 33 _ Khaneistanbul _ Sariyer _ Ayazağa Mah _
                                Istanbul
                            </a>
                        </li>
                        <li class="contact-item">
                            <img class="contact-icon" src="<?php echo e(asset('new/img/icon/youtube.png')); ?>">
                            <a class="contact-content" href="https://m.youtube.com/channel/UCcPZL7BUXrGCa_m02L8m2LQ">khaneistanbul</a>
                        </li>
                        <li class="contact-item">
                            <img class="contact-icon" src="<?php echo e(asset('new/img/icon/instagram.png')); ?>">
                            <a class="contact-content" href="https://www.instagram.com/khaneistanbul/?hl=en">khaneistanbul</a>
                        </li>
                        <li class="contact-item">
                            <img class="contact-icon" src="<?php echo e(asset('new/img/icon/whatsapp11.png')); ?>">
                            <a class="contact-content" href="https://wa.me/905343522222">khaneistanbul</a>
                        </li>
                        <li class="contact-item">
                            <img class="contact-icon" src="<?php echo e(asset('new/img/icon/twitter.png')); ?>">
                            <a class="contact-content" href="#">khaneistanbul</a>
                        </li>
                        <li class="contact-item">
                            <img class="contact-icon" src="<?php echo e(asset('new/img/icon/linkedin.png')); ?>">
                            <a class="contact-content" href="#">khaneistanbul</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <ul class="list-style-1">
                        
                                
                                
                            
                        <li><a href="<?php echo e(route('front.villas.index')); ?>">
                                <i class="fab fa-cloudsmith"></i>
                                املاک </a></li>
                        <li><a href="<?php echo e(route('front.villas.index', ['all','type=پیشنهاد-ویژه'])); ?>">
                                <i class="fab fa-cloudsmith"></i>
                                پیشنهاد های ویژه</a>
                        </li>

                        <li><a href="<?php echo e(route('front.faq')); ?>">
                                <i class="fab fa-cloudsmith"></i>
                                سوالات متداول</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <ul class="list-style-1">

                        <li><a href="<?php echo e(route('front.villas.locations')); ?>">
                                <i class="fab fa-cloudsmith"></i>
                                ناحیه های استانبول</a></li>
                        <li><a href="<?php echo e(route('front.blog.index')); ?>">
                                <i class="fab fa-cloudsmith"></i>
                                بلاگ</a></li>
                        <li><a href="#">
                                <i class="fab fa-cloudsmith"></i>
                                تماس با ما</a></li>
                        <li><a href="#">
                                <i class="fab fa-cloudsmith"></i>
                                مشاوره آنلاین</a></li>
                        <li><a href="<?php echo e(route('front.about')); ?>">
                                <i class="fab fa-cloudsmith"></i>
                                درباره ما</a></li>
                    </ul>
                </div>
            </div>
            <div class="row d-none">
                <div class="col-md-12">
                    <hr class="primary">
                </div>
            </div>
            <div class="row d-none">
                <ul class="socials">
                    <li class="social-item"><a href="#"><img src="<?php echo e(asset('new/img/icon/instagram.png')); ?>"></a></li>
                    <li class="social-item"><a href="#"><img src="<?php echo e(asset('new/img/icon/youtube.png')); ?>"></a></li>
                    <li class="social-item"><a href="#"><img src="<?php echo e(asset('new/img/icon/whatsapp.png')); ?>"></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-map mb-0">
        <iframe id="map" frameborder="0"
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6012.681010162577!2d28.986789000000005!3d41.10525400000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDHCsDA2JzE4LjkiTiAyOMKwNTknMTIuNCJF!5e0!3m2!1sfa!2sfr!4v1604241281424!5m2!1sfa!2sfr"
                allowfullscreen>
        </iframe>
    </div>
    <div class="d-block text-center copyright mt-0">
        Designed By
        <a href="https://adib-it.com" target="_blank">ADIB-IT.COM</a>
        <span> | </span>
        طراحی توسعه
        <a href="https://adib-it.com" target="_blank">شرکت ادیب گستر عصر نوین</a>

    </div>
</footer>

<script src="<?php echo e(asset('new/js/jquery-3.5.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('new/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('new/js/jquery.mask.min.js')); ?>"></script>
<script src="<?php echo e(asset('new/js/swiper-bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.cookie.js')); ?>"></script>
<script src="https://sachinchoolur.github.io/lightgallery.js/static/js/jquery.justifiedGallery.min.js"></script>
<script src="https://sachinchoolur.github.io/lightgallery.js/lightgallery/js/lightgallery.js"></script>
<script src="https://sachinchoolur.github.io/lightgallery.js/lightgallery/js/lg-thumbnail.js"></script>
<script src="https://sachinchoolur.github.io/lightgallery.js/lightgallery/js/lg-share.js"></script>
<script src="https://sachinchoolur.github.io/lightgallery.js/lightgallery/js/lg-fullscreen.js"></script>
<script src="https://sachinchoolur.github.io/lightgallery.js/lightgallery/js/lg-zoom.js"></script>
<script src="https://sachinchoolur.github.io/lightgallery.js/lightgallery/js/lg-autoplay.js"></script>
<script src="https://sachinchoolur.github.io/lightgallery.js/lightgallery/js/lg-hash.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="<?php echo e(asset('js/bootstrap-select.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
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
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
    });
    $(function () {
        //Initialize Select2 Elements
        $('.selectpicker').selectpicker()
    });
</script>
<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
