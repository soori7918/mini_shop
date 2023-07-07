<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> مدیریت <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <style>
            .popover-header
            {
                background-color: #000000;
                color: #fff;
                text-align: center;
            }
            .popover_125
            {
                cursor: pointer;
            }
            .popover-body
            {
                text-align: justify;
                text-align-last: center;
                max-height: 200px;
                overflow-y: auto;
            }
            .bg_def
            {
                background: rgba(255,123,123,0.30);
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
                <div class="table-responsive">
                    <table class="archive-table" style="min-width: 2000px">
                        <tr>
                            <th>نام/سن</th>
                            <th>ایمیل</th>
                            <th>شماره تماس</th>
                            <th>شهر</th>
                            <th>تحصیلات</th>
                            <th>ورود به ترکیه؟</th>
                            <th>تعداد همراه</th>
                            <th>زمان مهاجرت</th>
                            <th>شناخت ازمیر</th>
                            <th>هدف</th>
                            <th>شروع سرمایه گذاری</th>
                            <th>متن پیام</th>
                        </tr>
                        <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="<?php echo e($contact->new==0?'bg_def':''); ?>"><?php echo e($contact->name); ?>/<?php echo e($contact->age); ?></td>
                                <td class="<?php echo e($contact->new==0?'bg_def':''); ?>"><?php echo e($contact->email); ?></td>
                                <td class="<?php echo e($contact->new==0?'bg_def':''); ?>"><?php echo e($contact->phone); ?></td>
                                <td class="<?php echo e($contact->new==0?'bg_def':''); ?>"><?php echo e($contact->city); ?></td>
                                <td class="<?php echo e($contact->new==0?'bg_def':''); ?>"><?php echo e($contact->education); ?></td>
                                <td class="<?php echo e($contact->new==0?'bg_def':''); ?>"><?php echo e($contact->login_tr); ?></td>
                                <td class="<?php echo e($contact->new==0?'bg_def':''); ?>"><?php echo e($contact->along_count); ?></td>
                                <td class="<?php echo e($contact->new==0?'bg_def':''); ?>"><?php echo e($contact->time_tr); ?></td>
                                <td class="<?php echo e($contact->new==0?'bg_def':''); ?>"><?php echo e($contact->know_izmir); ?></td>
                                <td class="<?php echo e($contact->new==0?'bg_def':''); ?>"><?php echo e($contact->target_tr); ?></td>
                                <td class="<?php echo e($contact->new==0?'bg_def':''); ?>"><?php echo e($contact->start_price); ?></td>

                                <td class="<?php echo e($contact->new==0?'bg_def':''); ?>"><a data-toggle="popover" class="popover_125" title="متن پیام" data-content="<?php echo e($contact->message); ?>">متن
                                        پیام</a></td>
                                <td width="140" class="<?php echo e($contact->new==0?'bg_def':''); ?>">
                                    <div class="btn-inline">
                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['contacts-destroy', $contact->id] ]); ?>

                                        <?php echo Form::button('<i class="fa fa-ban ml-1"></i>حذف', ['type' => 'submit', 'class' => 'btn btn-danger float-left', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']); ?>

                                        <?php echo Form::close(); ?>

                                    </div>
                                </td>
                            </tr>
                            <?php
                            $contact->new=1;$contact->update();
                            ?>
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