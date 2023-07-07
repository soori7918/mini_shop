<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> مدیریت <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="http://adib-it.com/" target="_blank"><img
                                    src="http://www.support.adib-it.com/img/logo.png" style="margin-top: 10px;"></a>
                    </div>
                    <h2>لیست <?php echo e($title); ?></h2>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="<?php echo e(route('villa-search')); ?>" method="post" style="width: 95%;">
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
                    <?php if(count($villas)): ?>
                        <table class="archive-table">
                            <?php $__currentLoopData = $villas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $villa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <?php echo e($villa->name); ?>

                                        <?php switch($villa->status):
                                            case ('pending'): ?>
                                            <span class="badge badge-warning">درانتظار تایید</span>
                                            <?php break; ?>
                                            <?php case ('published'): ?>
                                            <span class="badge badge-success">تایید شده</span>
                                            <?php break; ?>
                                            <?php case ('failed'): ?>
                                            <span class="badge badge-danger">رد شده</span>
                                            <?php break; ?>
                                            <?php default: ?>
                                        <?php endswitch; ?>
                                    </td>
                                    <td><?php echo e(($villa->user) ? $villa->user->first_name . ' ' . $villa->user->last_name : 'بودن ادمین'); ?></td>
                                    <td><?php echo e($villa->category->name); ?></td>
                                    <td><?php echo e($villa->location->name); ?></td>
                                    <td width="140">
                                        <div class="btn-inline">
                                            <a href="<?php echo e(route('villa-show', $villa->id)); ?>"
                                               class="btn btn-sm btn-info float-left mr-1"><i
                                                        class="fa fa-eye ml-1"></i><?php echo e((Auth::user()->id == 1) ? 'بررسی' : 'مشاهده'); ?></a>
                                            <a href="<?php echo e(route('villa-edit', $villa->id)); ?>"
                                               class="btn btn-sm btn-info float-left mr-1"><i
                                                        class="fa fa-edit ml-1"></i>ویرایش</a>
                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['villa-destroy', $villa->id] ]); ?>

                                            <?php echo Form::button('<i class="fa fa-ban ml-1"></i>حذف', ['type' => 'submit', 'class' => 'btn btn-danger float-left', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']); ?>

                                            <?php echo Form::close(); ?>

                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    <?php else: ?>
                        موردی وجود ندارد
                    <?php endif; ?>
                </div>
                <div class="paginate p-3">
                    <?php echo e($villas->links()); ?>

                    <a href="<?php echo e(route('villa-create')); ?>" class="btn btn-rounded btn-primary float-left"><i
                                class="fa fa-circle-o ml-1"></i>افزودن</a>
                </div>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>