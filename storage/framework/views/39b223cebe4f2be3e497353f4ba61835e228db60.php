<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> <?php echo e($title); ?> <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="http://adib-it.com/" target="_blank"><img src="http://www.support.adib-it.com/img/logo.png" style="margin-top: 10px;"></a>
                    </div>
                    <h2><?php echo e($title); ?> <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></h2>
                </div>
            </div>
            <div class="card-body">
                <div class="max-with">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>ایمیل : </strong><?php echo e($user->email); ?></li>
                        <li class="list-group-item"><strong> سطح دسترسی : </strong><?php echo e($user->roles()->pluck('name')->implode(' ')); ?></li>
                        <li class="list-group-item"><strong>موبایل : </strong><?php echo e($user->mobile); ?> <?php if($user->mobile_status == 'active'): ?><span class="badge badge-success">فعال</span><?php elseif($user->mobile_status == 'pending'): ?><span class="badge badge-warning">در انتظار تایید</span><?php endif; ?></li>
                        <li class="list-group-item"><strong>تاریخ عضویت : </strong><?php echo e(my_jdate($user->created_at, 'd F Y')); ?></li>
                        <li class="list-group-item"><strong>وضعیت ثبت نام : </strong><?php if($user->registration == 'complete'): ?><span class="badge badge-success">تکمیل شده</span><?php elseif($user->registration == 'not_completed'): ?><span class="badge badge-danger">تکمیل نشده</span><?php endif; ?></li>
                        <li class="list-group-item"><strong>وضعیت کلی : </strong><?php if($user->account_status == 'active'): ?><span class="badge badge-success">فعال</span><?php elseif($user->account_status == 'pending'): ?><span class="badge badge-warning">در انتظار تایید</span><?php elseif($user->account_status == 'blocked'): ?><span class="badge badge-secondary">مسدود شده</span><?php endif; ?></li>
                    </ul>
                    <br />
                    <a href="<?php echo e(URL::previous()); ?>" class="btn btn-rounded btn-secondary float-right"><i class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                    <a href="<?php echo e(route('user-edit', $user->id)); ?>" class="btn btn-rounded btn-success float-left mr-1"><i class="fa fa-edit ml-1"></i>ویرایش</a>
                </div>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>