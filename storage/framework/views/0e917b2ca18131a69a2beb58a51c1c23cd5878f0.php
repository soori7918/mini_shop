<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> مدیریت <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="http://adib-it.com/" target="_blank"><img src="http://www.support.adib-it.com/img/logo.png" style="margin-top: 10px;"></a>
                    </div>
                    <h2>لیست <?php echo e($title); ?></h2>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="archive-table">
                        <?php $__currentLoopData = $visitlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visitlog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($visitlog->ip); ?></td>
                                <td dir="ltr"><?php echo e($visitlog->browser); ?></td>
                                <td><?php echo e($visitlog->os); ?></td>
                                <td><?php echo e($visitlog->user_name); ?></td>
                                <td title="<?php echo e(my_jdate($visitlog->updated_at, 'Y/m/d H:i:s')); ?>"><?php echo e($visitlog->last_visit); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
                <div class="paginate p-3">
                    <?php echo e($visitlogs->links()); ?>

                    <span class="btn btn-rounded btn-warning float-left">افراد آنلاین (<?php echo e($online); ?>)</span>
                </div>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>