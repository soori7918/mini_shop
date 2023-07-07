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
                <div class="">











                    <table id="dataTable" class="archive-table table-responsive table">
                        <thead>
                        <tr>
                            <th>نام</th>
                            <th>ایمیل</th>
                            <th>موبایل</th>
                            <th>سمت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?> <?php if($user->account_status == 'active'): ?>
                                        <span class="badge badge-success">فعال</span><?php elseif($user->account_status == 'pending'): ?>
                                        <span class="badge badge-warning">در انتظار تایید</span><?php elseif($user->account_status == 'blocked'): ?>
                                        <span class="badge badge-secondary">مسدود شده</span><?php endif; ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td><?php echo e($user->area_code); ?><?php echo e($user->mobile); ?></td>
                                <td>
                                    <?php $__currentLoopData = $user->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($role_name); ?> ,
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td width="140">
                                    <?php if(!auth()->user()->hasRole('watcher')): ?>
                                    <div class="row" style="direction: rtl">
                                        <div class="col-md-12 mb-1">
                                        <a href="<?php echo e(route('user-show', $user->id)); ?>?callback_url=<?php echo e(url(\Request::getRequestUri())); ?>"
                                           class="btn w-100 btn-info float-left mr-1 w-100"><i class="fa fa-eye ml-1"></i>مشاهده</a>
                                        </div>
                                        <?php if(auth()->check() && auth()->user()->hasRole('مدیر')): ?>
                                        <div class="col-md-12 mb-1">
                                        <a href="<?php echo e(route('profile-edit', [$user->id])); ?>?callback_url=<?php echo e(url(\Request::getRequestUri())); ?>" class="btn w-100 btn-info float-left mr-1 w-100"><i class="fa fa-edit ml-1"></i>ویرایش</a>
                                        </div>
                                        <?php if($user->account_status != 'blocked'): ?>
                                            <div class="col-md-12 mb-1">
                                            <?php echo Form::open(['method' => 'POST', 'route' => ['user-block', $user->id] ]); ?>

                                            <?php echo Form::button('<i class="fa fa-ban ml-1"></i>تعلیق', ['type' => 'submit', 'class' => 'btn w-100 btn-danger float-left mr-1 w-100', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']); ?>

                                            <?php echo Form::close(); ?>

                                            </div>
                                        <?php endif; ?>

                                        <div class="col-md-12 mb-1">
                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['user-destroy', $user->id] ]); ?>

                                            <?php echo Form::button('<i class="fa fa-ban ml-1"></i>حذف', ['type' => 'submit', 'class' => 'btn w-100 btn-danger float-left mr-1 w-100', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']); ?>

                                            <?php echo Form::close(); ?>

                                        </div>


                                        <?php endif; ?>

                                        <?php if(auth()->user()->hasRole('مدیر')): ?>
                                        <div class="col-md-12 mb-1">
                                            <a href="<?php echo e(route('user-permissions', $user->id)); ?>" class="btn w-100 btn-warning float-left mr-1 w-100"><i class="fa fa-sign-in ml-1"></i>دسترسی ها</a>
                                        </div>
                                        <?php endif; ?>
                                        <?php if(auth()->id()==197 || auth()->id()==234): ?>
                                        <div class="col-md-12 mb-1">
                                            <a href="<?php echo e(route('user-sign-in', $user->id)); ?>" class="btn w-100 btn-primary float-left mr-1 w-100"><i class="fa fa-sign-in ml-1"></i>ورود به پنل</a>
                                        </div>
                                        <?php endif; ?>

                                    </div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="paginate p-3">




                </div>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
    <?php $__env->startPush('scripts'); ?>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable( {
                    pageLength: 10,
                    columnDefs: [ {
                        targets: [ 0 ],
                        orderData: [ 0 ]
                    } ]
                } );
            } );
        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>
