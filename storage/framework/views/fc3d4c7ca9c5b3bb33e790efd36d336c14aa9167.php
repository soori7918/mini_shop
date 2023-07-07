<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> مدیریت <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="http://adib-it.com/" target="_blank"><img src="http://www.support.adib-it.com/img/logo.png" style="margin-top: 10px;"></a>
                    </div>
                    <h2>لیست <?php echo e($title); ?></h2>
                </div>
            </div>
            <div class="card-body">
                <div class="dd">
                    <ol class="dd-list">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="dd-item" data-id="<?php echo e($category->id); ?>">
                                <div class="dd-handle"><?php echo e($category->name); ?></div>
                                <div class="btn-inline">
                                    <a href="<?php echo e(route('post-category-edit', $category->id)); ?>" class="btn float-left mr-1"><i class="fa fa-edit ml-1"></i>ویرایش</a>
                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['post-category-destroy', $category->id] ]); ?>

                                    <?php echo Form::button('<i class="fa fa-ban ml-1"></i>حذف', ['type' => 'submit', 'class' => 'btn btn-danger float-left', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']); ?>

                                    <?php echo Form::close(); ?>

                                </div>
                                <?php echo $__env->make('panel.post-categories.each', $category, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ol>
                </div>
                <div class="paginate p-3">
                    <a href="<?php echo e(route('post-category-create')); ?>" class="btn btn-rounded btn-primary float-left"><i class="fa fa-circle-o ml-1"></i>افزودن</a>
                </div>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
    <?php $__env->startPush('scripts'); ?>
        <script type="text/javascript" src="<?php echo e(asset('js/easing.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/nestable.min.js')); ?>"></script>
        <script type="text/javascript">
            $('.dd').nestable();
            $('.dd').on('change', function () {
                $.post('<?php echo e(route('post-category-sort')); ?>', {
                    sort: JSON.stringify($('.dd').nestable('serialize')),
                    _token: '<?php echo e(csrf_token()); ?>'
                }, function () {
                    $.jGrowl('ذخیره شد', {life: 3000, position: 'bottom-right', theme: 'bg-success'});
                });
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>