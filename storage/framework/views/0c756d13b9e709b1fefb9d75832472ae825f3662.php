<?php $__env->startComponent('layouts.front'); ?>
    <?php
        $text = App\Travel::where('id' , 3)->first()
    ?>
    <?php $__env->slot('title'); ?> <?php if($setting->rule_title): ?><?php echo e($setting->rule_title); ?> <?php endif; ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('meta'); ?>
        <?php if($setting->rule_keywords): ?>
            <meta http-equiv="keywords" name="keywords" content="<?php echo e($setting->rule_keywords); ?>"/>
        <?php endif; ?>
        <meta property="og:title" content="<?php echo e($setting->title); ?>"/>
        <meta property="og:type" content="Terms-And-Conditions"/>
        <?php if($text->photo): ?>
            <meta property="og:image" content="<?php echo e(url($text->photo)); ?>"/>
        <?php endif; ?>
        <meta property="og:url" content="http://villexer.com/terms-and-Conditions"/>
        <meta property="og:site_name" content="<?php echo e($setting->title); ?>"/>
        <meta property="og:locale" content="fa_ir"/>
        <?php if($setting->rule_description): ?>
            <meta http-equiv="description" name="description" content="<?php echo e($setting->rule_description); ?>"/>
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
            .header-title h1 {
                color: white;
                font-size: 32px;
                font-weight: bold;
                text-shadow: 0px 0px 10px rgb(0, 0, 0);
            }
        </style>
        <header class="sub-header" style="background: url(<?php echo e(url($text->photo)); ?>) center no-repeat;background-size:cover;">
            <div class="container">

                <div class="sub-logo">
                    <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('img/logo.svg')); ?>" alt="ویلکسر"></a>
                </div>
                <div class="header-title">
                    <h1>حریم خصوصی و شرایط و قوانین</h1>
                </div>
            </div>
        </header>

        <section class="wheydo section">
            <div class="container">
                <div class="row">
                    <div class="whey-text col-md-12 text-justify">
                        <?php echo $text->text; ?>

                    </div>
                </div>
            </div>
        </section>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>