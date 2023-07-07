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
                        <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($location->name); ?></td>


                                <td><?php if(count($location->photos)): ?> <img src="<?php echo e(url($location->photos[0]->path)); ?>" style="height: 100px"> <?php endif; ?></td>
                                <td width="140">
                                    <?php if(!auth()->user()->hasRole('watcher')): ?>
                                    <div class="btn-inline">
                                        <?php switch($location->status_home):
                                            case ('pending'): ?>
                                            <span class="badge badge-danger ml-1">عدم نمایش در صفحه اصلی</span>
                                            <a href="<?php echo e(route('location-active',[$location->id,'active'])); ?>" title="نمایش در صفحه اصلی"><span class="badge badge-success"><i class="fa fa-check"></i> </span></a>
                                            <?php break; ?>
                                            <?php case ('active'): ?>
                                            <span class="badge badge-success ml-1">نمایش در صفحه اصلی</span>
                                            <a href="<?php echo e(route('location-active',[$location->id,'pending'])); ?>" title="عدم نمایش در صفحه اصلی"><span class="badge badge-danger"><i class="fa fa-close"></i> </span></a>
                                            <?php break; ?>
                                            <?php default: ?>
                                        <?php endswitch; ?>
                                        <a href="<?php echo e(route('location-edit', $location->id)); ?>" class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-edit ml-1"></i>تغییر تصویر</a>





                                    </div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
                <div class="paginate p-3">




                </div>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>