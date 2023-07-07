<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> &#1605;&#1583;&#1740;&#1585;&#1740;&#1578; <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="http://adib-it.com/" target="_blank"><img src="http://www.support.adib-it.com/img/logo.png" style="margin-top: 10px;"></a>
                    </div>
                    <h2>&#1604;&#1740;&#1587;&#1578; <?php echo e($title); ?></h2>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="archive-table">
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php if($post->type == 1): ?>
                                        skype
                                    <?php elseif($post->type == 2): ?>
                                        &#1711;&#1608;&#1711;&#1604;
                                    <?php elseif($post->type == 3): ?>
                                        linkedin
                                    <?php elseif($post->type == 4): ?>
                                        &#1570;&#1662;&#1575;&#1585;&#1575;&#1578;
                                    <?php elseif($post->type == 5): ?>
                                        &#1601;&#1740;&#1587;&#1576;&#1608;&#1705;
                                    <?php elseif($post->type == 6): ?>
                                        twitter
                                    <?php elseif($post->type == 7): ?>
                                        instagram
                                    <?php elseif($post->type == 8): ?>
                                        telegram
                                    <?php endif; ?>
                                </td>
                                <td width="140">
                                    <div class="btn-inline">
                                        <a href="<?php echo e(route('share-edit', $post->id)); ?>"
                                           class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-edit ml-1"></i>&#1608;&#1740;&#1585;&#1575;&#1740;&#1588;</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
                <div class="paginate p-3">
                    <?php echo e($posts->links()); ?>

                    
                </div>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>