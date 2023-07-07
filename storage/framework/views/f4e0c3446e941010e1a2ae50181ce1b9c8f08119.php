<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> مدیریت <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="<?php echo e(url('/')); ?>" target="_blank"><img src="<?php echo e(logo()); ?>" style="margin-top: 10px;"></a>
                    </div>
                    <h4>
                        <?php echo e($title??''); ?>

                    </h4>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <style>
                        #dataTable_wrapper .col-md-6{
                            padding: 0 10px;
                        }
                    </style>
                    <table id="dataTable" class="archive-table table">
                        <thead>
                        <tr>
                            <th>نام</th>
                            <?php if(auth()->user()->hasRole('call center') || auth()->user()->hasRole('call center(sales)')): ?>
                                <th>معرف</th>
                            <?php endif; ?>
                            <th>شغل</th>
                            <th>تاریخ اعلام</th>
                            <th>تاریخ ثبت نام</th>
                            <th>ملک های معرفی شده</th>
                            <th>مشتریان معرفی شده</th>
                            <th>قراردادهای موفق</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>

                                    <?php if($user->account_status == 'active'): ?>
                                        <span class="badge badge-success">فعال</span>
                                    <?php elseif($user->account_status == 'pending'): ?>
                                        <span class="badge badge-warning">در انتظار تایید</span>
                                    <?php elseif($user->account_status == 'blocked'): ?>
                                        <span class="badge badge-secondary">مسدود شده</span>
                                    <?php endif; ?>

                                    <?php if($user->user): ?>
                                        <span class="badge badge-warning">نام کارشناس معرف : <?php echo e($user->user->first_name .' ' . $user->user->last_name); ?></span>
                                    <?php endif; ?>
                                </td>
                                <?php if(auth()->user()->hasRole('call center') || auth()->user()->hasRole('call center(sales)')): ?>
                                    <td><?php echo e($user->user?$user->first_name.' '.$user->last_name:'بدون معرف'); ?></td>
                                <?php endif; ?>
                                <td><?php echo e($user->job); ?></td>
                                <td><?php echo e($user->date); ?></td>
                                <td><?php echo e($user->created_at); ?></td>
                                <td><?php echo e(\App\Villa::where('user_id',$user->id)->count()); ?></td>
                                <td><?php echo e(\App\User::where('user_id',$user->id)->count()); ?></td>
                                <td><?php echo e(\App\Contract::where('expert_id',$user->id)->count()); ?></td>
                                <td>
                                    <a href="javascript:void(0)" data-target="#descModal" onclick="$('#user_id').val('<?php echo e($user->id); ?>');$('#reagent_description').html('<?php echo e($user->reagent_description); ?>');$('#username').html('<?php echo e($user->first_name.' '.$user->last_name); ?>')" data-toggle="modal" class="btn btn-primary float-left mr-1">
                                        توضیحات من
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal" id="descModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="<?php echo e(route('user-reagent-description-store')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">توضیحات معرف در مورد
                                    <span id="username"></span>
                                    </h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <input id="user_id" type="hidden" name="user_id" value="">
                                    <textarea name="reagent_description" class="form-control" id="reagent_description" cols="30" rows="10" placeholder="توضیحات"></textarea>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">ثبت</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
