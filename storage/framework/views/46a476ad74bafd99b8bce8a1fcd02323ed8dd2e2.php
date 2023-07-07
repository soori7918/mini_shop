<?php if($category->children->count() > 0): ?>
    <div class="drop-c" style="display: none">
        <ul class="ul_set">
            <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $old = Session::get('count');
                $new = $category->posts->count();
                $final = $old + $new;
                Session::put('count', $final);

                $number = 0;

                if ($category->children->count() > 0) {
                    foreach ($category->children as $value) {
                        $number += $value->posts->count();
                    }

                }


                ?>

                <li class="category-child" id="<?php echo e($category->id); ?>">
                    <?php if($category->posts->count() == 0): ?>

                        <a style="cursor: pointer"><?php echo e($category->name); ?>

                            (<?php echo e($category->posts->count() + $number); ?>)</a>

                    <?php else: ?>
                        <a href="<?php echo e(route('front-blog-cat', $category->slug)); ?>"><?php echo e($category->name); ?>

                            (<?php echo e($category->posts->count()); ?>)</a>
                    <?php endif; ?>
                    <?php echo $__env->make('blog.eachCat', $category, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>