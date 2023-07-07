<!DOCTYPE html>
<html class="no-js" lang="fa">
<head>
    <meta charset="utf-8">
    <meta auth="<?php echo e(Auth::check()); ?> <?php if(auth()->guard()->check()): ?> <?php echo e(Auth::user()->first_name); ?> <?php endif; ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo e($titleSeo); ?></title>
    <meta name="base-url" content="<?php echo e(url('/')); ?>"/>

    <meta name="robots" content="noindex, follow" />
    <?php if(trim($__env->yieldContent('meta'))): ?>
        <?php echo $__env->yieldContent('meta'); ?>
    <?php else: ?>
    <meta name="keywords" content="<?php echo e($keywordsSeo); ?>">
    <meta name="description" content="<?php echo e($descriptionSeo); ?>"/>
    <meta property="og:title" content="<?php echo e($titleSeo); ?>"/>
    <meta property="og:description" content="<?php echo e($descriptionSeo); ?>"/>
    <?php endif; ?>
    <meta name="googlebot" content="noindex">
    <meta name="bingbot" content="noindex">
    <meta name="baiduspider" content="noindex">

    <meta property="og:url" content="<?php echo e($urlPage); ?>">

    <meta property="og:image" content="<?php echo e(url('assets/user/pic/logo.png')); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Place favicon.png in the root directory -->
    <link rel="shortcut icon" href="<?php echo e(url('assets/user/pic/logo.png')); ?>" type="image/x-icon" />
    <!-- Font Icons css -->
    <link rel="stylesheet" href="<?php echo e(url('assets/user/css/font-icons.css')); ?>">
    <!-- plugins css -->
    <link rel="stylesheet" href="<?php echo e(url('assets/user/css/plugins.css')); ?>">
    <!-- Chosen css -->
    <link rel="stylesheet" href="<?php echo e(url('assets/user/chosen/css.css')); ?>">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="<?php echo e(url('assets/user/css/style.css')); ?>">
    <!-- Responsive css -->
    <link rel="stylesheet" href="<?php echo e(url('assets/user/css/responsive.css')); ?>">
    <?php echo $__env->yieldContent('style_css'); ?>
</head>
<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Add your site or application content here -->

<!-- Body main wrapper start -->
<div class="body-wrapper">
<?php if(\Request::route()->getName()=='user.index'): ?>
   <?php echo $__env->make('user.layouts.header_index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php else: ?>
    <?php echo $__env->make('user.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>


   <?php echo $__env->yieldContent('body'); ?>

    <!-- CALL TO ACTION START (call-to-action-6) -->
    <div class="ltn__call-to-action-area call-to-action-6 before-bg-bottom" data-bg="<?php echo e(url('assets/user/rtl/img/1.jpg')); ?>">
           <div class="container">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="call-to-action-inner call-to-action-inner-6 ltn__secondary-bg text-center---">
                           <div class="coll-to-info text-color-white">

                               <h3>فقط انجامش بده چون ارزشش رو داری!</h3>
                               <p>وندیداد گروپ برآمده از ازمیر، فراتر از ترکیه</p>

                           </div>
                           <div class="btn-wrapper">
                               <a class="btn btn-effect-3 btn-white" href="<?php echo e(route('user.contact')); ?>">تماس با ما <i class="flaticon-call-center-agent"></i></a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
    <!-- CALL TO ACTION END -->

    <!-- FOOTER AREA START -->
    <footer class="ltn__footer-area  ">
        <div class="footer-top-area  section-bg-2 plr--5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-sm-12 col-12">
                        <div class="footer-widget footer-newsletter-widget">
                            <h4 class="footer-title"><?php echo e($contact_provider->title); ?></h4>
                            <div class="footer-address">
                                <ul>
                                    <?php if($contact_provider->address): ?>
                                    <li>
                                        <div class="footer-address-icon">
                                            <i class="icon-placeholder"></i>
                                        </div>
                                        <div class="footer-address-info">
                                            <?php if(!preg_match('/^[^\x{600}-\x{6FF}]+$/u', str_replace("\\\\", "", $contact_provider->address))): ?>
                                                <p class="text-justify"><?php echo e($contact_provider->address); ?></p>
                                                <?php else: ?>
                                                <p class="d-ltr text-justify"><?php echo e($contact_provider->address); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                    <?php endif; ?>
                                    <?php if($contact_provider->whatsapp): ?>
                                        <?php $__currentLoopData = $contact_provider->array_select($contact_provider->whatsapp); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $whatsapp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <div class="footer-address-icon">
                                                    <i class="icon-whatsapp"></i>
                                                </div>
                                                <div class="footer-address-info">
                                                    <p class="d-ltr"><a href="https://api.whatsapp.com/send?phone=+<?php echo e(str_replace([' ','_','-'],'',$whatsapp)); ?>">+<?php echo e($whatsapp); ?></a></p>
                                                </div>
                                            </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                        <?php if($contact_provider->phone): ?>
                                            <?php $__currentLoopData = $contact_provider->array_select($contact_provider->phone); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <div class="footer-address-icon">
                                                        <i class="icon-call"></i>
                                                    </div>
                                                    <div class="footer-address-info">
                                                        <p class="d-ltr"><a href="tel:+<?php echo e(str_replace([' ','_','-'],'',$phone)); ?>">+<?php echo e($phone); ?></a></p>
                                                    </div>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        <?php if($contact_provider->mobile): ?>
                                            <?php $__currentLoopData = $contact_provider->array_select($contact_provider->mobile); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mobile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <div class="footer-address-icon">
                                                        <i class="fas fa-mobile-alt"></i>
                                                    </div>
                                                    <div class="footer-address-info">
                                                        <p class="d-ltr"><a href="tel:+<?php echo e(str_replace([' ','_','-'],'',$mobile)); ?>">+<?php echo e($mobile); ?></a></p>
                                                    </div>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        <?php if($contact_provider->email): ?>
                                            <?php $__currentLoopData = $contact_provider->array_select($contact_provider->email); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $email): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <div class="footer-address-icon">
                                                        <i class="icon-mail"></i>
                                                    </div>
                                                    <div class="footer-address-info">
                                                        <p class="d-ltr"><a href="mailto:<?php echo e(str_replace([' ','_','-'],'',$email)); ?>"><?php echo e($email); ?></a></p>
                                                    </div>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                        <div class="col-xl-4 col-md-6 col-sm-12 col-12 px-5">
                            <h4 class="footer-title">دسترسی ها</h4>
                            <ul class="menu_footer menu_footer1">
                                <li><a href="<?php echo e(route('user.faq')); ?>">سوالات متداول</a></li>
                                <li><a href="<?php echo e(route('user.project.index')); ?>">پروژه ها</a></li>
                                <li><a href="<?php echo e(route('user.service.index')); ?>">خدمات وندیداد گروپ</a></li>
                                <li><a href="<?php echo e(route('user.about')); ?>">درباره ما</a></li>
                                <li><a href="<?php echo e(route('user.contact')); ?>">تماس با ما</a></li>
                            </ul>
                        </div>
                    <div class="col-xl-4 col-md-6 col-sm-12 col-12">
                        <?php if($about_footer): ?>
                            <h4 class="footer-title"><?php echo e($about_footer->title); ?></h4>
                            <div class="footer-widget footer-about-widget">
                                <?php echo $about_footer->text; ?>

                            </div>
                        <?php else: ?>
                        <h4 class="footer-title">درباره ما</h4>
                        <div class="footer-widget footer-about-widget">
                            <p class="text-justify">
                                شرکت وندیداد گروپ به عنوان اولین شرکت تخصصی ایرانی در حوزه سرمایه‌گذاری بین المللی، خرید ملک، امور بازرگانی، گردشگری و همچنین واردات و صادرات فعالیت می کند.
                            </p>
                            <p class="text-justify">
                                کارگزار تخصصی فروش املاک در ازمیر ترکیه با مجوز قانونی و عضو رسمی اتاق بازرگانی ازمیر با سال ها سابقه درخشان همراه شماست. اکنون با دارا بودن نمایندگی در پایتخت سرزمینمان نزدیکتر از همیشه به شما هستیم.
                            </p>
                        </div>
                         <?php endif; ?>
                    </div>
                    <div class="col-xl-8 col-md-6 col-sm-12 col-12 ltn__social-media mt-20">
                        <ul>
                            <?php if($contact_provider->pinterest): ?>
                                <li><a href="<?php echo e($contact_provider->pinterest); ?>" title="Pinterest" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
                            <?php endif; ?>
                                <?php if($contact_provider->youtube): ?>
                                    <li><a href="<?php echo e($contact_provider->youtube); ?>" title="Youtube" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                <?php endif; ?>
                                <?php if($contact_provider->linkedin): ?>
                                    <li><a href="<?php echo e($contact_provider->linkedin); ?>" title="Linkedin" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                <?php endif; ?>
                                <?php if($contact_provider->telegram): ?>
                                    <li><a href="<?php echo e($contact_provider->telegram); ?>" title="Telegram" target="_blank"><i class="fab fa-telegram-plane"></i></a></li>
                                <?php endif; ?>
                                <?php if($contact_provider->instagram): ?>
                                    <li><a href="<?php echo e($contact_provider->instagram); ?>" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <?php endif; ?>
                                <?php if($contact_provider->twitter): ?>
                                    <li><a href="<?php echo e($contact_provider->twitter); ?>" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <?php endif; ?>
                                <?php if($contact_provider->facebook): ?>
                                    <li><a href="<?php echo e($contact_provider->facebook); ?>" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="ltn__copyright-area ltn__copyright-2 section-bg-7  plr--5">
            <div class="container-fluid ltn__border-top-2">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="ltn__copyright-design clearfix">
                            <p>All Rights Reserved @ <a href="https://adib-it.com" target="_blank">AdibIT</a> <span class="current-year">2021</span></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 align-self-center">
                        <div class="ltn__copyright-menu text-right">
                            <ul>
                                <li><a href="https://adib-it.com" target="_blank">ADIB-IT.COM</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER AREA END -->
<?php if($contact_provider->phone_icall): ?>
    <!-- icall AREA START -->
        <div class="icall icall1">
            <a target="_blank" rel="noreferrer" href="tel:+<?php echo e(str_replace([' ','_','-'],'',$contact_provider->phone_icall)); ?>">
                <img class="social_img" src="<?php echo e(url('assets/user/pic/icall_1.png')); ?>" alt="آیکال وندیداد">
            </a>
        </div>
        <!-- icall AREA END -->
 <?php endif; ?>
    <?php if($contact_provider->phone_whatsapp): ?>
        <!-- WHATSAPP AREA START -->
            <div class="wat_sapp wat_sapp1">
                <a target="_blank" rel="noreferrer" href="https://api.whatsapp.com/send?phone=+<?php echo e(str_replace([' ','_','-'],'',$contact_provider->phone_whatsapp)); ?>">
                    <img class="social_img" src="<?php echo e(url('assets/user/pic/whatssapp_1.png')); ?>" alt="واتساپ وندیداد">
                </a>
            </div>
            <!-- WHATSAPP AREA END -->
    <?php endif; ?>


</div>
<!-- Body main wrapper end -->

<!-- preloader area start -->
<div class="preloader d-none" id="preloader">
    <div class="preloader-inner">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
</div>
<!-- preloader area end -->


<!-- All JS Plugins -->
<script src="<?php echo e(url('assets/user/js/plugins.js')); ?>"></script>
<!-- Chosen -->
<script src="<?php echo e(url('assets/user/chosen/js.js')); ?>"></script>
<!-- Main JS -->
<script src="<?php echo e(url('assets/user/js/main.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script defer>
    $(document).ready(function (){
       $('.d-none_load_page').removeClass('d-none')
    });
</script>
<?php echo $__env->yieldContent('script_js'); ?>
</body>
</html>