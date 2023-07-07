<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> مدیریت <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="<?php echo e(url('/')); ?>" target="_blank"><img src="<?php echo e(logo()); ?>" style="margin-top: 10px;"></a>                    </div>
                    <h2>لیست <?php echo e($title); ?></h2>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">











                    <table class="archive-table">
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($post->title); ?></td>
                                <td><?php echo e($post->url); ?></td>
                                <td><?php echo e($post->slug); ?></td>
                                <td width="140">
                                    <?php if(!auth()->user()->hasRole('watcher')): ?>
                                        <div class="btn-inline">

                                            <a href="<?php echo e(route('project-category-edit', $post->id)); ?>" class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-edit ml-1"></i>ویرایش</a>
                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['project-category-delete', $post->id] ]); ?>

                                            <?php echo Form::button('<i class="fa fa-ban ml-1"></i>حذف', ['type' => 'submit', 'class' => 'btn btn-danger float-left', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']); ?>

                                            <?php echo Form::close(); ?>

                                        </div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
                <?php if(!auth()->user()->hasRole('watcher')): ?>
                    <div class="paginate p-3">
                        <?php echo e($items->links()); ?>

                        <a href="<?php echo e(route('project-category-create')); ?>" class="btn btn-rounded btn-primary float-left"><i class="fa fa-circle-o ml-1"></i>افزودن</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>