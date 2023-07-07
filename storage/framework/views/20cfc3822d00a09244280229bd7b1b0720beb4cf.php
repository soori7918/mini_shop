<?php if(count($errors) > 0): ?>
    <?php $__env->startPush('scripts'); ?>
        <script type="text/javascript">
            $.jGrowl('<ul> <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <li><?php echo e($error); ?></li> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </ul>', {life: 3000, position: 'bottom-right', theme: 'bg-danger'});
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>
<?php if(Session::has('flash_message')): ?>
    <?php $__env->startPush('scripts'); ?>
        <script type="text/javascript">
            $.jGrowl('<?php echo session("flash_message"); ?>', {life: 3000, position: 'bottom-right', theme: 'bg-success'});
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>
<?php if(Session::has('err_message')): ?>
    <?php $__env->startPush('scripts'); ?>
        <script type="text/javascript">
            $.jGrowl('<?php echo session("err_message"); ?>', {life: 3000, position: 'bottom-right', theme: 'bg-danger'});
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>