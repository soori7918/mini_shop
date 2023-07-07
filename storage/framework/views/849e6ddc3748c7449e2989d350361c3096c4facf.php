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
                        <thead>
                        <tr>
                            <th>نام</th>
                            <th>ایمیل</th>
                            <th>موبایل</th>
                            <th>دلیل رد</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tbody>
                            <tr>
                                <td><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?> <?php if($user->account_status == 'active'): ?>
                                        <span class="badge badge-success">فعال</span><?php elseif($user->account_status == 'pending'): ?>
                                        <span class="badge badge-warning">در انتظار تایید</span><?php elseif($user->account_status == 'blocked'): ?>
                                        <span class="badge badge-secondary">مسدود شده</span><?php endif; ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td><?php echo e($user->mobile); ?></td>
                                <td><?php echo e($user->status_message); ?></td>
                                <td width="140">
                                    <div class="btn-inline">
                                        <a href="<?php echo e(route('user-show', $user->id)); ?>"
                                           class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-eye ml-1"></i>مشاهده مشخصات</a>
                                        <?php if(!auth()->user()->hasRole('watcher')): ?>
                                        <a href="<?php echo e(route('profile-edit', [$user->id,url()->current()])); ?>"
                                           class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-edit ml-1"></i>ویرایش</a>
                                        <?php if(auth()->check() && auth()->user()->hasRole('مدیر')): ?>
                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['user-destroy', $user->id] ]); ?>

                                        <?php echo Form::button('<i class="fa fa-times mr-1 ml-1"></i>حذف', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger float-left mr-1', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']); ?>

                                        <?php echo Form::close(); ?>

                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
                <div class="paginate p-3">
                    <?php echo e($users->links()); ?>

                    <?php if(!auth()->user()->hasRole('watcher')): ?>
                    <a href="<?php echo e((request()->has('role') && request()->get('role') == 3) ? route('user-property-create', (request()->has('role')) ? 'role=' . request()->get('role') : '') :  route('user-property-create')); ?>"
                       class="btn btn-rounded btn-primary float-left"><i
                                class="fa fa-circle-o ml-1"></i>افزودن</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>