<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="http://adib-it.com/" target="_blank"><img src="http://www.support.adib-it.com/img/logo.png" style="margin-top: 10px;"></a>
                    </div>

                </div>
            </div>
            <?php $user = (object)unserialize($comment->creator);?>
            <div class="card-body">
                <div class="row mt-4 mb-4">
                    <div class="col-md-7 post-text">
                        <p>توسط : <?php echo e($user->name); ?> - <?php echo e($user->email); ?></p>
                        <hr>
                        <?php echo html_entity_decode($comment->body); ?>

                    </div>
                    <div class="col-md-5 post">
                        <ul class="list-group mt-3">
                            <li class="list-group-item"><strong>تاریخ ثبت : </strong><?php echo e(my_jdate($comment->created_at, 'd F Y H:i')); ?></li>
                            <li class="list-group-item"><strong>تاریخ بروزرسانی : </strong><?php echo e(my_jdate($comment->updated_at, 'd F Y H:i')); ?></li>
                            <li class="list-group-item"><strong>وضعیت : </strong><?php if($comment->status == 'published'): ?><span class="badge badge-success">منتشر شده</span><?php elseif($comment->status == 'pending'): ?><span
                                        class="badge badge-warning">در انتظار تایید</span><?php endif; ?></li>
                        </ul>
                    </div>
                </div>
                <br/>
                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-rounded btn-secondary float-right"><i class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                <a href="<?php echo e(route('comment-edit', $comment->id)); ?>" class="btn btn-rounded btn-success float-left mr-1"><i class="fa fa-edit ml-1"></i>ویرایش</a>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>