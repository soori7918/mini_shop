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


                            <th></th>
                        </tr>
                        <?php if(count($items)>0): ?>
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($item->title); ?></td>


                                    <td class="text-center">
                                        <a href="<?php echo e(route('contact-info-edit',$item->id)); ?>" class="badge bg-primary ml-1" title="ویرایش"><i class="fa fa-edit"></i>  ویرایش</a>













                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center">موردی یافت نشد</td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>
                <div class="paginate p-3">
                    <?php echo e($items->links()); ?>


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
                        location.href = '<?php echo e(url('/')); ?>/panel/contact-info-active/'+id+'/'+type+'/'+item_type;
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
                        location.href = '<?php echo e(url('/')); ?>/panel/contact-info-destroy/'+id;
                    }
                })
            }
        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>