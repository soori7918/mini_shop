<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> <?php echo e('مدیریت شهرها'); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
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
                    <table class="archive-table">
                        <tr>
                            <td><h6>نام</h6></td>
                            <td><h6>تبدیل</h6></td>
                        </tr>
                            <tr>
                                <td>دلار</td>
                                <td>
                                    <form method="post" action="<?php echo e(route('arz-update','dolar')); ?>" style="margin-top: 25px">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="text" class="form-control text-left" name="price" value="<?php echo e($arz->dolar); ?>" onchange="this.form.submit()">
                                    </form>
                                </td>
                            </tr>
                        <tr>
                            <td>یورو</td>
                            <td>
                                <form method="post" action="<?php echo e(route('arz-update','euro')); ?>" style="margin-top: 25px">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="text" class="form-control text-left" name="price" value="<?php echo e($arz->euro); ?>" onchange="this.form.submit()">
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>ریال</td>
                            <td>
                                <form method="post" action="<?php echo e(route('arz-update','rial')); ?>" style="margin-top: 25px">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="text" class="form-control text-left" name="price" value="<?php echo e($arz->rial); ?>" onchange="this.form.submit()">
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="paginate p-3">
                </div>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>