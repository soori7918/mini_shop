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
                        <tr>
                            <th>عنوان</th>
                            <th>مکان</th>
                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                        <?php if(count($items)>0): ?>
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($item->title); ?></td>
                                    <td><?php echo e($item->pages($item->page)); ?></td>
                                    <td><?php echo $item->status($item->status); ?> <?php if($item->page=='service'): ?> صفحه اصلی : <?php echo $item->status($item->status_home); ?> <?php endif; ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo e(route('about-edit',$item->id)); ?>" class="badge bg-primary ml-1" title="ویرایش"><i class="fa fa-edit"></i> </a>
                                        <?php if(!in_array($item->id,[2,3,4,13,14])): ?>
                                        <a href="javascript:void(0);" onclick="del_row('<?php echo e($item->id); ?>')" class="badge bg-danger ml-1" title="حذف"><i class="fa fa-trash"></i> </a>
                                        <?php endif; ?>
                                        <?php if($item->page!='consulting'): ?>
                                            <?php if($item->status=='active'): ?>
                                            <a href="javascript:void(0);" onclick="active_row('<?php echo e($item->id); ?>','pending','status')" class="badge bg-success ml-1" title="نمایش  فعال است غیر فعال شود؟"><i class="fa fa-check"></i> وضعیت </a>
                                        <?php endif; ?>
                                        <?php if($item->status=='pending'): ?>
                                            <a href="javascript:void(0);" onclick="active_row('<?php echo e($item->id); ?>','active','status')" class="badge bg-danger ml-1" title="نمایش  غیر فعال است فعال شود؟"><i class="fa fa-close"></i> وضعیت  </a>
                                        <?php endif; ?>
                                            <?php endif; ?>
                                    <?php if($item->page=='service'): ?>
                                        <?php if($item->status_home=='active'): ?>
                                            <a href="javascript:void(0);" onclick="active_row('<?php echo e($item->id); ?>','pending','status_home')" class="badge bg-success ml-1" title="نمایش صفحه اصلی فعال است غیر فعال شود؟"><i class="fa fa-check"></i> صفحه اصلی </a>
                                        <?php endif; ?>
                                        <?php if($item->status_home=='pending'): ?>
                                            <a href="javascript:void(0);" onclick="active_row('<?php echo e($item->id); ?>','active','status_home')" class="badge bg-danger ml-1" title="نمایش صفحه اصلی غیر فعال است فعال شود؟"><i class="fa fa-close"></i> صفحه اصلی  </a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">موردی یافت نشد</td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>
                <div class="paginate p-3">
                    <?php echo e($items->links()); ?>

                    <a href="<?php echo e(route('about-create')); ?>" class="btn btn-rounded btn-primary float-left"><i class="fa fa-circle-o ml-1"></i>افزودن</a>
                </div>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
    <?php $__env->startPush('scripts'); ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            function active_row(id,type,item_type) {
                if(type=='pending')
                {
                    var text_user='غیر فعال می شود';
                }
                if(type=='active')
                {
                    var text_user='فعال می شود';
                }
                Swal.fire({
                    title: text_user ,
                    text: 'برای تغییر وضعیت مطمئن هستید؟',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = '<?php echo e(url('/')); ?>/panel/about-active/'+id+'/'+type+'/'+item_type;
                    }
                })
            }
            function del_row(id) {
                Swal.fire({
                    text: 'برای حذف مطمئن هستید؟',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = '<?php echo e(url('/')); ?>/panel/about-destroy/'+id;
                    }
                })
            }
        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>