<?php if($comment->children->count() > 0): ?>
    <?php $__currentLoopData = $comment->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($comment->status == 'published'): ?>
            <?php $user = (object)unserialize($comment->creator);?>
            <div id="<?php echo e($comment->id); ?>" class="comment-send comment-sub mt-4">
                <header class="comment-header">
                    <div class="float-right"><a href="#<?php echo e($comment->id); ?>">#<?php echo e($comment->id); ?></a> | توسط : <?php echo e($user->name); ?> <?php echo e(rank($comment->rank, '')); ?></div>
                    <div class="float-left">تاریخ ثبت نظر : <?php echo e(my_jdate($comment->updated_at, 'd F Y')); ?></div>
                </header>
                <p><?php echo e($comment->body); ?></p>
                <footer class="comment-footer">
                    <div class="float-left">
                        <button class="btn btn-default answer" data-id="<?php echo e($comment->id); ?>" data-name="<?php echo e($user->name); ?>" data-toggle="modal" data-target="#answer"><i class="fa fa-circle-o ml-1"></i>پاسخ</button>
                    </div>
                </footer>
                <?php echo $__env->make('blog.each', $comment, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>