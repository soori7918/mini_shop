<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> مدیریت <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <style>
            img {
                max-width: 80%;
                max-height: 150px;
            }
        </style>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="http://adib-it.com/" target="_blank"><img src="http://www.support.adib-it.com/img/logo.png" style="margin-top: 10px;"></a>
                    </div>
                    <h2>لیست <?php echo e($title); ?></h2>
                    <p>درصورت نیاز به تغییر اسلایدر، اسلایدر کنونی حذف و اسلایدر جدید افزوده شود</p>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="archive-table">
                        <tr>
                            <td><h6>عنوان</h6></td>
                            <td><h6>شعار</h6></td>
                            <td><h6>صفحه</h6></td>
                            <td><h6>تصویر اسلایدر</h6></td>
                            <td width="140"><h6>عملیات</h6></td>
                        </tr>
                        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($slider->title); ?> </td>
                                <td><?php echo e($slider->shoar); ?> </td>
                                <td><?php if($slider->page == 1): ?> مقاصد سفر <?php elseif($slider->page == 2): ?>    مجله   <?php elseif($slider->page == 4): ?> ارتباط با ما  <?php elseif($slider->page == 3): ?>  درباره ما   <?php elseif($slider->page == 6): ?> علاقه مندی ها  <?php elseif($slider->page == 7): ?>  صفحات داخلی مجله <?php elseif($slider->page == 5): ?> ثبت نام <?php else: ?> تماس با ما <?php endif; ?> </td>
                                <td><a href="<?php echo e(url($slider->photo->path)); ?>" target="_blank"><img src="<?php echo e(url($slider->photo->path)); ?>"/></a></td>
                                <td width="140">
                                    <div class="btn-inline">
                                        <a href="<?php echo e(route('slider-edit', $slider->id)); ?>" class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-edit ml-1"></i>ویرایش</a>
                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['slider-destroy', $slider->id] ]); ?>

                                        <?php echo Form::button('<i class="fa fa-ban ml-1"></i>حذف', ['type' => 'submit', 'class' => 'btn btn-danger float-left', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']); ?>

                                        <?php echo Form::close(); ?>

                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
                <div class="paginate p-3">
                    <?php echo e($sliders->links()); ?>

                    <a href="<?php echo e(route('slider-create')); ?>" class="btn btn-rounded btn-primary float-left"><i class="fa fa-circle-o ml-1"></i>افزودن</a>
                </div>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>