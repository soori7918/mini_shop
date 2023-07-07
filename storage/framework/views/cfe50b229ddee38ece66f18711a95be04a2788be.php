<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> مدیریت <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="<?php echo e(url('/')); ?>" target="_blank"><img src="<?php echo e(logo()); ?>" style="margin-top: 10px;"></a>
                    </div>

                    <h2>لیست <?php echo e($title); ?></h2>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="archive-table">
                        <?php $__currentLoopData = $newsletters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newsletter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php if($newsletter->email): ?> <?php echo e($newsletter->email); ?> <?php else: ?> بدون ایمیل <?php endif; ?></td>
                                <td><?php if($newsletter->mobile): ?> <?php echo e($newsletter->mobile); ?> <?php else: ?> بدون موبایل <?php endif; ?></td>
                                <td>
                                    <?php echo e($newsletter->page_name_display); ?>

                                </td>
                                <td width="140">
                                    <?php if(!auth()->user()->hasRole('watcher')): ?>
                                    <div class="btn-inline">
                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['newsletter-destroy', $newsletter->id] ]); ?>

                                        <?php echo Form::button('<i class="fa fa-ban ml-1"></i>حذف', ['type' => 'submit', 'class' => 'btn btn-danger float-left', 'onclick' => 'return confirm(" تمامی نظرات و کامنت های کاربر حذف خواهد شد ؟")']); ?>

                                        <?php echo Form::close(); ?>

                                    </div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
                <div class="paginate p-3">
                    <?php echo e($newsletters->links()); ?>

                </div>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>