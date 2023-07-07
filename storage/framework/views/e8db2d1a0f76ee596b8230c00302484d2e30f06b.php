<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> ویرایش قیمت دلار و تومان <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="<?php echo e(url('/')); ?>" target="_blank"><img src="<?php echo e(logo()); ?>" style="margin-top: 10px;"></a>
                    </div>

                    <h2>ویرایش قیمت دلار و تومان</h2>
                </div>
            </div>
            <div class="card-body">
                <?php echo e(Form::model($item,array('route' =>'price-convert-update', 'method' => 'POST', 'files' => true))); ?>

                <div class="row">
                    <div class="col-12 text-center alert alert-info p-2">
                        لطفا قیمت روز هر لیر را به دلار و تومان وارد نمایید
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?php echo e(Form::label('dolar', 'هر 1 لیر برابر با ... دلار')); ?>

                            <?php echo e(Form::text('dolar',null, array('class' => 'form-control text-center'))); ?>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?php echo e(Form::label('toman', 'هر 1 لیر برابر با ... تومان')); ?>

                            <?php echo e(Form::text('toman',null, array('class' => 'form-control text-center'))); ?>

                        </div>
                    </div>
                </div>
                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-rounded btn-outline-warning float-right"><i class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                <?php echo e(Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>ویرایش', array('type' => 'submit', 'class' => 'btn btn-outline-success float-left'))); ?>

                <?php echo e(Form::close()); ?>

            </div>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>