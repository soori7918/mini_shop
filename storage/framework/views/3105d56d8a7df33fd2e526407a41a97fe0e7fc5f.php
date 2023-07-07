<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="row">

            <div class="col-md-4">
                <div class="card card-stats">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-orange">
                                    <i class="nc-icon files_box"></i>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="numbers">
                                    <p class="card-category">Capacity</p>
                                    <h4 class="card-title">105GB</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="fa fa-refresh ml-2"></i>Updated now
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-stats">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-green">
                                    <i class="nc-icon business_bulb-63"></i>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="numbers">
                                    <p class="card-category">Revenue</p>
                                    <h4 class="card-title">$1,345</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="fa fa-calendar ml-2"></i>Last day
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-stats">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-blue">
                                    <i class="nc-icon ui-2_favourite-28"></i>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="numbers">
                                    <p class="card-category">Followers</p>
                                    <h4 class="card-title">+45</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="fa fa-refresh ml-2"></i>Updated now
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>