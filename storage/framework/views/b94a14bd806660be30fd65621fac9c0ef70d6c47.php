<?php $__env->startComponent('layouts.front'); ?>
    <?php $__env->slot('title'); ?> <?php if($setting->location_title): ?><?php echo e($setting->location_title); ?> <?php endif; ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('meta'); ?>
        <?php if($setting->location_keywords): ?>
            <meta http-equiv="keywords" name="keywords" content="<?php echo e($setting->location_keywords); ?>"/>
        <?php endif; ?>
        <?php if($setting->location_description): ?>
            <meta http-equiv="description" name="description" content="<?php echo e($setting->location_description); ?>"/>
        <?php endif; ?>

        <meta property="og:title" content="<?php echo e($setting->location_title); ?>"/>
        <meta property="og:type" content="Villa"/>
        <meta property="og:url" content="<?php echo e(route('front-location-index')); ?>"/>
        <?php if($slider): ?>
            <meta property="og:image" content="<?php echo e(url($slider->photo->path)); ?>"/>
        <?php endif; ?>
        <meta property="og:site_name" content="<?php echo e($setting->title); ?>"/>
        <meta property="og:locale" content="fa_ir"/>
        <?php if($setting->location_description): ?>
            <meta property="og:description" content="<?php echo e($setting->location_description); ?>"/>
        <?php endif; ?>
    <?php $__env->endSlot(); ?>
    <?php $__env->slot('dir'); ?> dir="rtl" <?php $__env->endSlot(); ?>
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

            .location > div:nth-child(3) {
                height: 207.52px;
            }

            .location > div:nth-child(3) img {
                height: 195px;
            }

            .location > div:nth-child(3) a h5 {
                top: 35%;
            }

            .section {
                padding: 0 0;
            }

            .locations a span:hover {
                background-color: #00000075;
            }

            .locations h3 {
                position: absolute;
                top: 50%;
                width: 100%;
                text-align: center;
                color: #fff;
            }

            .locations h2 {
                position: absolute;
                top: 35%;
                width: 100%;
                text-align: center;
                color: #fff;
            }

            .header-title h1 {
                color: white;
                font-weight: bold;
                text-shadow: 0px 0px 10px rgb(0, 0, 0);
            }

            .with-bg {
                background-color: #0000005c;
                border-radius: 48px;
            }
            .locations .uk-panel {
                text-align: center;
            }
        </style>
        <?php if($slider): ?>
            <header class="sub-header"
                    style="background: url(<?php echo e(url($slider->photo->path)); ?>) center no-repeat;background-size:cover;">
                <div class="container">

                    <div class="header-logo" style="margin-top: -80px;margin-right: -15px;">
                        <a href="<?php echo e(url('/')); ?>"><img style="width: 200px"
                                                      src="<?php echo e(asset('uploads/file/1398-08-21/photos/istanbul.png')); ?>"
                                                      alt="logo"></a>
                    </div>
                    <div class="header-title">
                        <h1 style="font-size: 34px;color: #fff"><?php echo e($slider->title); ?></h1>
                        <p><?php echo e($slider->shoar); ?></p>
                    </div>
                </div>
            </header>
        <?php endif; ?>
        <section class="section">
            <div class="container">
                <?php if($slider): ?>
                    <p class="text-justify mb-5"><?php echo ($slider->text) ? $slider->text : ''; ?></p>
                <?php endif; ?>
                <div class="location uk-grid-width-small-1-2 uk-grid-width-medium-1-3" data-uk-grid
                     style="margin-top: 30px;">
                    <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="locations">
                            <div class="uk-panel">
                                <a href="<?php echo e(route('front-location-show',  $location->url)); ?>">
                                    <?php if($location->photo): ?>
                                        <img style="height: 240px" src="<?php echo e(url($location->photo->path)); ?>"
                                             alt="<?php echo e($location->name); ?>">
                                    <?php endif; ?>
                                    <span>
                                    <h2 style="font-size: 19px;" class="with-bg">
                                        اجاره ویلا در <?php echo e($location->name); ?>

                                    </h2>
                                    <h3 class="with-bg" style="font-size: 14px;">
                                        <?php echo e($location->slogan); ?>

                                    </h3>
                                </span>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
            </div>
        </section>
    <?php $__env->endSlot(); ?>
    <?php $__env->startPush('stylesheets'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/uikit.min.css')); ?>"/>
    <?php $__env->stopPush(); ?>
    <?php $__env->startPush('scripts'); ?>
        <script type="text/javascript" src="<?php echo e(asset('js/uikit.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/grid.min.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>