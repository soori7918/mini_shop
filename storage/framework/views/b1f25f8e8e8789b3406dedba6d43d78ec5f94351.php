<?php if($category->children->count() > 0): ?>
    <ol class="dd-list">
        <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
<?php endif; ?>