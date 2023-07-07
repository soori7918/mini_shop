<?php $__env->startSection('content'); ?>
    <div class="container bg-white pb-5">
        <h1 class="text-primary-theme py-3 px-3">مناطق</h1>
        <div class="row">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3 mt-2">
                    <a class="btn btn-primary btn-block" href="<?php echo e(route('front.villas.index', ['locations', $item->name])); ?>"><?php echo e($item->name); ?></a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>