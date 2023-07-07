<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> مدیریت <?php echo e($title); ?> <?php $__env->endSlot(); ?>
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
            <div class="col-md-12">
                <?php echo $__env->make('panel.villas.searchForm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div class="col-sm-12 col-md-12 px-3" style="border: 0px solid #e5eaef;background-color: rgba(255, 255, 255, 0.2);padding: 10px 0 0 0;">
                <div id="dataTable_filter" class="dataTables_filter">
                    <form action="<?php echo e(route('villa-find','published')); ?>" method="get">
                        <label>
                            <input type="search" name="search" class="form-control form-control-sm" placeholder="عنوان یا کد ملک">
                            <button type="submit" style="width: 100px" class="btn btn-primary">پیدا کن</button>
                        </label>
                    </form>
                </div>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>