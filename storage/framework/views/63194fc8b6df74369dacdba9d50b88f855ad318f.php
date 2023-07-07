<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> <?php echo e($title); ?> <?php echo e($post->title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="http://adib-it.com/" target="_blank"><img src="http://www.support.adib-it.com/img/logo.png" style="margin-top: 10px;"></a>
                    </div>
                    <h2><?php echo e($title); ?> <?php echo e($post->title); ?></h2>
                </div>
            </div>
            <div class="card-body">
                <div class="row mt-4 mb-4">
                    <div class="col-md-8 post-text">
                        <p class="text-justify"><?php echo str_limit(strip_tags($post->body), $limit = 300, $end = '...'); ?></p>
                        <hr/>
                        <?php echo html_entity_decode($post->body); ?>

                    </div>
                    <div class="col-md-4 post">
                        <?php if($post->photo): ?>
                            <img src="<?php echo e(url($post->photo->path)); ?>" alt="<?php echo e($post->title); ?>">
                        <?php else: ?>
                            <img src="<?php echo e(asset('img/default.jpg')); ?>" alt="<?php echo e($post->title); ?>">
                        <?php endif; ?>
                        <ul class="list-group mt-3">
                            <li class="list-group-item"><strong>نویسنده : </strong><?php echo e($post->author->first_name); ?> <?php echo e($post->author->last_name); ?></li>
                            <li class="list-group-item"><strong>دسته بندی : </strong><?php echo e($post->category->name); ?></li>
                            <li class="list-group-item"><strong>تاریخ ثبت : </strong><?php echo e(my_jdate($post->created_at, 'd F Y H:i')); ?></li>
                            <li class="list-group-item"><strong>تاریخ بروزرسانی : </strong><?php echo e(my_jdate($post->updated_at, 'd F Y H:i')); ?></li>
                            <li class="list-group-item"><strong>وضعیت : </strong><?php if($post->status == 'published'): ?><span class="badge badge-success">منتشر شده</span><?php elseif($post->status == 'pending'): ?><span
                                        class="badge badge-warning">در انتظار تایید</span><?php elseif($post->status == 'draft'): ?><span class="badge badge-secondary">پیش نویس</span><?php endif; ?></li>
                        </ul>
                    </div>
                </div>
                <br/>
                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-rounded btn-secondary float-right"><i class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                <a href="<?php echo e(route('post-edit', $post->id)); ?>" class="btn btn-rounded btn-success float-left mr-1"><i class="fa fa-edit ml-1"></i>ویرایش</a>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>