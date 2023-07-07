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
                    <form action="<?php echo e(route('ical-search')); ?>" method="post" style="width: 95%;">
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
                    <?php if(count($icals)): ?>
                    <table class="archive-table">
                        <?php $__currentLoopData = $icals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ical): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($ical->villa->name); ?></td>
                                <td><?php echo e($ical->ical_url); ?></td>  
                                <td><a class="btn btnprimary" href="<?php echo e(route('ical-create',$ical->villa->id)); ?>">ویرایش</a></td>
                                <td><a class="btn btnprimary" href="<?php echo e(route('ical-destroy',$ical->id)); ?>">حذف</a></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                    <?php else: ?>
                        موردی وجود ندارد
                    <?php endif; ?>
                </div>
                <div class="paginate p-3">
                    <?php echo e($icals->links()); ?>

                    <a href="<?php echo e(route('ical-create',0)); ?>" class="btn btn-rounded btn-primary float-left"><i class="fa fa-circle-o ml-1"></i>افزودن</a>
                </div>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>