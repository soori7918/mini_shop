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
                    <form action="<?php echo e(route('user-search')); ?>" method="post" style="width: 95%;">
                        <div class="row">
                            <div class="col-md-6 col-sm-6" style="padding-left: 0;">
                                <input type="text" name="search" class="form-control" placeholder="جستجو...">
                            </div>
                            <div class="col-md-6 col-sm-6" style="padding-right: 0;">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <?php echo e(csrf_field()); ?>

                    </form>
                    <table class="archive-table">
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?> <?php if($user->account_status == 'active'): ?><span class="badge badge-success">فعال</span><?php elseif($user->account_status == 'pending'): ?><span class="badge badge-warning">در انتظار تایید</span><?php elseif($user->account_status == 'blocked'): ?><span class="badge badge-secondary">مسدود شده</span><?php endif; ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td><?php echo e($user->mobile); ?></td>
                                <td width="140">
                                    <div class="btn-inline">
                                        <a href="<?php echo e(route('user-show', $user->id)); ?>" class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-eye ml-1"></i>مشاهده</a>
                                        <a href="<?php echo e(route('user-edit', $user->id)); ?>" class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-edit ml-1"></i>ویرایش</a>
                                        <?php if($user->account_status != 'blocked'): ?>
                                            <?php echo Form::open(['method' => 'POST', 'route' => ['user-block', $user->id] ]); ?>

                                            <?php echo Form::button('<i class="fa fa-ban ml-1"></i>تعلیق', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger float-left', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']); ?>

                                            <?php echo Form::close(); ?>

                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
                <div class="paginate p-3">
                    <?php echo e($users->links()); ?>

                    <a href="<?php echo e(route('user-create')); ?>" class="btn btn-rounded btn-primary float-left"><i class="fa fa-circle-o ml-1"></i>افزودن</a>
                </div>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>