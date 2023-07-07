<?php echo $__env->make('panel.particle.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<style>
    .main{
        background-image: url(http://villexer.com/source/assets/img/header.jpg) !important;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>
<div class="app">
    <div class="main">
        <div class="view-content container" data-direction="rtl">
            <div class="row justify-content-md-center">
                <section class="view col-md-7 mt-4">
                    <?php echo $__env->make('panel.messages.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo e(isset($body) ? $body : 'بدون محتوا'); ?>

                </section>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make('panel.particle.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>