<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> مدیریت <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <style>
            .dd-list{
                direction: rtl;
                text-align: right;
            }
            .dd-item{
                background: #ca5858;
                margin-bottom: 10px;
                padding: 5px 15px;
                line-height: 40px;
                border-radius: 3px;
            }
            .dd-handle{
                display: inline-block;
            }
            .btn-inline{
                display: inline-flex;
                float: left;
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
                <div class="dd">
                    <ol class="dd-list">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="dd-item" data-id="<?php echo e($category->id); ?>">
                                <div class="dd-handle"><?php echo e($category->name); ?> ( <?php echo e($category->user?$category->user['first_name'].' '.$category->user['last_name']:'مریم کیامرام'); ?> )</div>
                                <?php if(!auth()->user()->hasRole('watcher')): ?>
                                <div class="btn-inline pt-0">
                                    <a href="<?php echo e(route('villa-category-edit', $category->id)); ?>" class="btn btn-warning float-left mx-1 mb-0"><i class="fa fa-edit ml-1"></i>ویرایش</a>
                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['villa-category-destroy', $category->id] ]); ?>

                                    <?php echo Form::button('<i class="fa fa-ban ml-1"></i>حذف', ['type' => 'submit', 'class' => 'btn btn-danger float-left', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']); ?>

                                    <?php echo Form::close(); ?>

                                </div>
                                <?php endif; ?>
                                <?php echo $__env->make('panel.villa-categories.each', $category, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ol>
                </div>
                <?php if(!auth()->user()->hasRole('watcher')): ?>
                <div class="paginate p-3 d-flex">
                    <a href="<?php echo e(route('villa-category-create')); ?>" class="btn btn-rounded btn-primary float-left"><i class="fa fa-circle-o ml-1"></i>افزودن</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
    <?php $__env->startPush('scripts'); ?>
        <script type="text/javascript" src="<?php echo e(asset('js/easing.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/nestable.min.js')); ?>"></script>
        <script type="text/javascript">
            $('.dd').nestable();
            $('.dd').on('change', function () {
                $.post('<?php echo e(route('villa-category-sort')); ?>', {
                    sort: JSON.stringify($('.dd').nestable('serialize')),
                    _token: '<?php echo e(csrf_token()); ?>'
                }, function () {
                    $.jGrowl('ذخیره شد', {life: 3000, position: 'bottom-right', theme: 'bg-success'});
                });
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>