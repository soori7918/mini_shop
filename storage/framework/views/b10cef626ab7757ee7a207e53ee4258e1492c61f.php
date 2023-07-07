<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> <?php echo e($title); ?> <?php echo e($profile->first_name); ?> <?php echo e($profile->last_name); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <?php if(isset($profile->photo)): ?>
                        <div style="background-image: url(<?php echo e(url($profile->photo->path)); ?>);background-size: cover;background-repeat: no-repeat "
                             class="archive-circle">
                        </div>
                    <?php else: ?>
                        <div class="archive-circle">
                            <a href="<?php echo e(url('/')); ?>" target="_blank"><img src="<?php echo e(logo()); ?>" style="margin-top: 10px;"></a>
                        </div>
                    <?php endif; ?>
                    <h2><?php echo e($title); ?> <?php echo e($profile->first_name); ?> <?php echo e($profile->last_name); ?></h2>
                </div>
            </div>
            <div class="card-body">
                <div class="max-with">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>ایمیل : </strong><?php echo e($profile->email); ?></li>
                        <li class="list-group-item"><strong> سطح دسترسی
                                : </strong><?php echo e($profile->roles()->pluck('name')->implode(' ')); ?></li>
                        <li class="list-group-item"><strong>موبایل
                                : </strong><?php echo e($profile->area_code); ?><?php echo e($profile->mobile); ?> <?php if($profile->mobile_status == 'active'): ?><span
                                    class="badge badge-success">فعال</span><?php elseif($profile->mobile_status == 'pending'): ?>
                                <span class="badge badge-warning">در انتظار تایید</span><?php endif; ?></li>
                        <li class="list-group-item"><strong>تاریخ عضویت
                                : </strong><?php echo e(my_jdate($profile->created_at, 'd F Y')); ?></li>
                        <li class="list-group-item"><strong>وضعیت ثبت نام
                                : </strong><?php if($profile->registration == 'complete'): ?><span class="badge badge-success">تکمیل شده</span><?php elseif($profile->registration == 'not_completed'): ?>
                                <span class="badge badge-danger">تکمیل نشده</span><?php endif; ?></li>
                        <li class="list-group-item"><strong>وضعیت کلی
                                : </strong><?php if($profile->account_status == 'active'): ?><span class="badge badge-success">فعال</span><?php elseif($profile->account_status == 'pending'): ?>
                                <span class="badge badge-warning">در انتظار تایید</span>
                            <?php elseif($profile->account_status == 'blocked'): ?>
                                <span class="badge badge-secondary">مسدود شده</span>
                            <?php elseif($profile->account_status == 'rejected'): ?>
                                <span class="badge badge-danger">رد شده</span>
                                <p><?php echo $profile->status_message; ?></p>
                            <?php endif; ?>
                        </li>
                    </ul>
                    <br/>
                    <a href="<?php echo e(URL::previous()); ?>" class="btn btn-rounded btn-secondary float-right"><i
                                class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                    <a href="<?php echo e(route('profile-edit', $profile->id)); ?>"
                       class="btn btn-rounded btn-warning float-left mr-2"><i
                                class="nc-icon users_single-02 mtp-2 ml-1"></i>ویرایش پروفایل</a>
                    <a href="<?php echo e(route('profile-password', $profile->id)); ?>"
                       class="btn btn-rounded btn-danger float-left"><i class="nc-icon objects_key-25 mtp-2 ml-1"></i>ویرایش
                        رمز عبور</a>
                </div>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>