<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" prefix="og:http://ogp.me/" itemscope="itemscope"
      itemtype="http://schema.org/WebPage">
<head>
    <title><?php echo e(isset($title) ? $title : ''); ?></title>
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
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/panel.css')); ?>"/>
    <style>
        iframe.skiptranslate {
            display: none !important
        }

        body {
            top: 0px !important;
        }

        .goog-te-gadget > * {
            display: none;
        }

        .goog-te-gadget {
            height: 25px !important;
            position: relative;
            overflow-y: hidden;
        }

        .goog-te-gadget > div {
            display: block !important;
        }
    </style>
</head>
<body>
<?php echo $__env->make('panel.particle.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>