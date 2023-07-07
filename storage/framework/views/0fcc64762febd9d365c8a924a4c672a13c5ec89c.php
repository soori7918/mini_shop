<?php $__env->startComponent('layouts.front'); ?>
    <?php $__env->slot('title'); ?> <?php if($setting->bime_title): ?><?php echo e($setting->bime_title); ?> <?php endif; ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('meta'); ?>
        <?php if($setting->bime_keywords): ?>
            <meta http-equiv="keywords" name="keywords" content="<?php echo e($setting->bime_keywords); ?>"/>
        <?php endif; ?>
        <meta property="og:title" content="<?php echo e($setting->title); ?>"/>
        <meta property="og:type" content="Insurance"/>
            <meta property="og:image" content="<?php echo e(asset('img/locations.jpg')); ?>"/>
        <meta property="og:url" content="http://villexer.com/travel-insurance"/>
        <meta property="og:site_name" content="<?php echo e($setting->title); ?>"/>
        <meta property="og:locale" content="fa_ir"/>
        <?php if($setting->bime_description): ?>
            <meta http-equiv="description" name="description" content="<?php echo e($setting->bime_description); ?>"/>
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

            #primary_nav_wrap {
                margin-top: 15px
            }

            #primary_nav_wrap ul {
                list-style: none;
                position: relative;
                float: right;
                margin: 0;
                padding: 0
            }

            #primary_nav_wrap ul a {
                display: block;
                color: #333;
                text-decoration: none;
                font-weight: 700;
                font-size: 12px;
                line-height: 32px;
                padding: 0 15px;
                font-family: "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif
            }

            #primary_nav_wrap ul li {
                position: relative;
                float: left;
                margin: 0;
                padding: 18px;
            }

            #primary_nav_wrap ul li.current-menu-item {
                background: #ddd
            }

            #primary_nav_wrap ul li:hover {
                background: #f6f6f6
            }

            #primary_nav_wrap ul ul {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                background: #fff;
                padding: 0
            }

            #primary_nav_wrap ul ul li {
                float: none;
                width: 200px
            }

            #primary_nav_wrap ul ul a {
                line-height: 120%;
                padding: 10px 15px
            }

            #primary_nav_wrap ul ul ul {
                top: 0;
                left: 100%
            }

            #primary_nav_wrap ul li:hover > ul {
                display: block
            }

            .header-title h1 {
                color: white;
                font-size: 32px;
                font-weight: bold;
                text-shadow: 0px 0px 10px rgb(0, 0, 0);
            }
            .sub-logo {
                top: 60px;
            }
        </style>
        <header class="sub-header"
                style="background:linear-gradient(0deg, rgba(44, 44, 44, 0.2), rgba(44, 168, 255, 0.4)),linear-gradient(0deg, rgba(187, 187, 187, 0.2), rgba(0, 0, 0, 0.4)),url(<?php echo e(asset('img/locations.jpg')); ?>) center no-repeat;background-size:cover;">
            <div class="container">
                <div class="sub-logo">
                    <a href="<?php echo e(url('/')); ?>"><img style="width: 200px"
                                                  src="<?php echo e(asset('uploads/file/1398-08-21/photos/istanbul.png')); ?>"
                                                  alt="استانبول سرویس"></a>
                </div>
                <div class="header-title">
                    <h1>بیمه مسافرتی</h1>
                </div>
            </div>
        </header>

        <div class="col-md-12">
            <nav id="primary_nav_wrap">
                <ul>
                    <?php $__currentLoopData = $insurances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $insurance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(route('front-bime-show',$insurance->slug)); ?>"><?php echo e($insurance->title); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </nav>
        </div>


        <section class="wheydo section">
            <div class="container">
                <div class="row">
                    <div class="whey-text col-md-12 text-justify">
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                            چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                            تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                            کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا
                            با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو
                            در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و
                            دشواری
                            موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی
                            دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار
                            گیرد.</p>
                        <br>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                            چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                            تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                            کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا
                            با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو
                            در زبان</p>
                    </div>
                </div>
            </div>
        </section>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>