<?php $__env->startComponent('layouts.auth'); ?>
    <?php $__env->slot('title'); ?> &#1608;&#1585;&#1608;&#1583; &#1576;&#1607; &#1587;&#1575;&#1740;&#1578; <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card" style="background-color: #fffffff2">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <img src="<?php echo e(asset('img/user.svg')); ?>" alt="&#1608;&#1585;&#1608;&#1583; &#1576;&#1607; &#1587;&#1575;&#1740;&#1578;"/>
                    </div>
                    <h2>&#1608;&#1585;&#1608;&#1583; &#1576;&#1607; &#1587;&#1575;&#1740;&#1578;</h2>
                </div>
            </div>
            <div class="card-body">
                <?php echo e(Form::open(array('route' => 'login'))); ?>

                <div class="form-group">
                    <?php echo e(Form::label('username', '&#1575;&#1740;&#1605;&#1740;&#1604; / &#1605;&#1608;&#1576;&#1575;&#1740;&#1604;')); ?>

                    <?php echo e(Form::text('username', '', array('class' => 'form-control'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('password', '&#1585;&#1605;&#1586; &#1593;&#1576;&#1608;&#1585;')); ?>

                    <?php echo e(Form::password('password', array('class' => 'form-control'))); ?>

                </div>
                <div class="checkbox">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">&#1605;&#1585;&#1575; &#1576;&#1607; &#1582;&#1575;&#1591;&#1585; &#1583;&#1575;&#1588;&#1578;&#1607; &#1576;&#1575;&#1588;</label>
                </div>
                <br/>
                <a href="<?php echo e(url('register')); ?>" class="btn btn-rounded btn-danger float-right"><i class="nc-icon users_single-02 mtp-1 ml-1"></i>&#1579;&#1576;&#1578; &#1606;&#1575;&#1605;</a>
                <?php echo e(Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>&#1608;&#1585;&#1608;&#1583;', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left mr-2'))); ?>

                <a href="<?php echo e(route('password.request')); ?>" class="btn btn-rounded btn-secondary float-left"><i class="fa fa-unlock ml-1"></i>&#1601;&#1585;&#1575;&#1605;&#1608;&#1588;&#1740; &#1585;&#1605;&#1586; &#1593;&#1576;&#1608;&#1585;</a>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>