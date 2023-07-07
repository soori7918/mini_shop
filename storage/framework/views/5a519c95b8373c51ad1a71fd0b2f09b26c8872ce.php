<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('css/svg-turkiye-haritasi.css?v=').time()); ?>" rel="stylesheet"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('map.map', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="container bg-white m-auto">
        <div class="row">
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>