<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> مدیریت <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <style>
            .gallery-item{

            }
            .gallery-item img{
                border-radius: 5px;
                margin: 0 3px;
            }
        </style>
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
                <div class="row mb-3">
                    <div class="col-md-3">
                        <a href="?type=manager" class="form-control text-center">
                            پیام های مدیریت
                            <span class="badge badge-pill badge-light"><?php echo e($manager); ?></span>
                            <?php if($unseenmanager>0): ?>
                            <span class="badge badge-pill badge-warning"><?php echo e($unseenmanager); ?></span>
                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="?type=admin" class="form-control text-center">
                            پیام های ادمین
                            <span class="badge badge-pill badge-light"><?php echo e($admin); ?></span>
                            <?php if($unseenadmin>0): ?>
                            <span class="badge badge-pill badge-warning"><?php echo e($unseenadmin); ?></span>
                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="?type=refers" class="form-control text-center">
                            ارجاعات
                            <span class="badge badge-pill badge-light"><?php echo e($refers); ?></span>
                            <?php if($unseenrefers>0): ?>
                            <span class="badge badge-pill badge-warning"><?php echo e($unseenrefers); ?></span>
                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="?type=org" class="form-control text-center">
                            اطلاعیه سازمان
                            <span class="badge badge-pill badge-light"><?php echo e($org); ?></span>
                            <?php if($unseenorg>0): ?>
                            <span class="badge badge-pill badge-warning"><?php echo e($unseenorg); ?></span>
                            <?php endif; ?>
                        </a>
                    </div>
                </div>
                <div class="">
                        <table id="dataTable" class="archive-table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>توضیحات</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <?php echo e($item->id); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->message); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->seen==0?'دیده نشده':'دیده شده'); ?>

                                    </td>
                                    <td width="140">
                                        <div class="<?php echo e(isMobile()?'d-block':'btn-inline'); ?>">
                                            <a href="<?php echo e(route('notification-show',$item->id)); ?>" class="btn btn-info">مشاهده پیام</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
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
