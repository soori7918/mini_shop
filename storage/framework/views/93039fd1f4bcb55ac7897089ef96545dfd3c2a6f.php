<?php $__env->startComponent('layouts.front'); ?>
    <?php $__env->slot('title'); ?> آژانس مسافرتی مرغاب <?php $__env->endSlot(); ?>
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
        <header class="sub-header" style="background:linear-gradient(0deg, rgba(44, 44, 44, 0.2), rgba(44, 168, 255, 0.4)),linear-gradient(0deg, rgba(187, 187, 187, 0.2), rgba(0, 0, 0, 0.4)),url(<?php echo e(asset('img/locations.jpg')); ?>) center no-repeat;background-size:cover;">
            <div class="container">
                <div class="sub-logo">
                    <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('img/logo.svg')); ?>" alt="ویلکسر"></a>
                </div>
                <div class="header-title">
                    <h1><?php echo e($item->title); ?></h1>
                </div>
            </div>
        </header>


        <section class="wheydo section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <img src="<?php echo e(url($item->photo->path)); ?>">
                    </div>
                    <div class="whey-text col-md-9 text-justify">
                        <?php echo $item->text; ?>

                    </div>
                </div>
            </div>
        </section>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>