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
                <div class="table-responsive">
                    <table class="archive-table">
                        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $user = (object)unserialize($comment->creator);?>
                            <?php if(!is_null($user)): ?>
                                <tr>
                                    
                                    <td><?php echo e($user->name); ?> <?php echo e(rank($comment->rank, '')); ?></td>
                                    <td><?php echo e($comment->commendable->category->type); ?></td>
                                    <td><?php if($comment->commendable->name): ?><?php echo e($comment->commendable->name); ?><?php else: ?> <?php echo e($comment->commendable->title); ?> <?php endif; ?></td>
                                    <td><?php echo e($user->email); ?></td>

                                    


                                        
                                            
                                            
                                            


                                    <td width="140">
                                        <div class="btn-inline">
                                            <a href="<?php echo e(route('comment-show', $comment->id)); ?>"
                                               class="btn btn-sm btn-info float-left mr-1"><i
                                                        class="fa fa-eye ml-1"></i>مشاهده</a>
                                            <a href="<?php echo e(route('comment-edit', $comment->id)); ?>"
                                               class="btn btn-sm btn-info float-left mr-1"><i
                                                        class="fa fa-edit ml-1"></i>ویرایش</a>

                                            <a href="<?php echo e(route('comment-status2', $comment->id)); ?>"
                                               class="btn btn-sm btn-info float-left mr-1"><?php if($comment->main == 0): ?><span style="color:green;"><i class="fa fa-eye"></i>نمایش در صفحه اصلی  </span><?php else: ?> <span style="color: red"><i class="fa fa-eye"></i> عدم نمایش در صفحه اصلی </span><?php endif; ?></a>

                                            <?php echo Form::open(['method' => 'PATCH', 'route' => ['comment-status', $comment->id] ]); ?>

                                            <?php if($comment->status == 'published'): ?>
                                                <?php echo Form::hidden('status', 'pending'); ?>

                                                <?php echo Form::button('<i class="nc-icon ui-1_simple-remove ml-1"></i>عدم انتشار', ['type' => 'submit', 'class' => 'btn btn-danger float-left confirm']); ?>

                                            <?php elseif($comment->status == 'pending'): ?>
                                                <?php echo Form::hidden('status', 'published'); ?>

                                                <?php echo Form::button('<i class="nc-icon ui-1_check ml-1"></i>انتشار', ['type' => 'submit', 'class' => 'btn btn-success float-left confirm']); ?>

                                            <?php endif; ?>
                                            <?php echo Form::close(); ?>

                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['comment-destroy', $comment->id] ]); ?>

                                            <?php echo Form::button('<i class="fa fa-ban ml-1"></i>حذف', ['type' => 'submit', 'class' => 'btn btn-danger float-left', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']); ?>

                                            <?php echo Form::close(); ?>

                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
                <div class="paginate p-3">
                    <?php echo e($comments->links()); ?>

                </div>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>