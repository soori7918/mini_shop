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
                        <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $info = unserialize($contact->description);
                            ?>
                            <tr>
                                <td><?php echo e($info['first_name']); ?></td>
                                <td><?php echo e($info['last_name']); ?></td>
                                <td><?php echo e($info['email']); ?></td>
                                <td><?php echo e($info['mobile']); ?></td>
                                <td><?php echo e($info['location']); ?></td>
                                <td><?php echo e($info['LocationName']); ?></td>
                                <td><a data-toggle="popover" title="متن پیام" data-content="<?php echo e($info['body']); ?>">متن
                                        پیام</a></td>
                                <td width="140">
                                    <div class="btn-inline">
                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['contacts-destroy', $contact->id] ]); ?>

                                        <?php echo Form::button('<i class="fa fa-ban ml-1"></i>حذف', ['type' => 'submit', 'class' => 'btn btn-danger float-left', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']); ?>

                                        <?php echo Form::close(); ?>

                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
                <div class="paginate p-3">
                    <?php echo e($contacts->links()); ?>

                </div>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
    <?php $__env->startPush('scripts'); ?>
        <script type="text/javascript">
            $(document).ready(function () {
                $('[data-toggle="popover"]').popover();
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>