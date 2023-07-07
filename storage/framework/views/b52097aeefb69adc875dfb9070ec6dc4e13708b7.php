<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> مدیریت فایل ها<?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <style>
            img {
                max-width: 80%;
                max-height: 150px;
            }
        </style>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="http://adib-it.com/" target="_blank"><img src="http://www.support.adib-it.com/img/logo.png" style="margin-top: 10px;"></a>
                    </div>
                    <h2>لیست فایل ها</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="archive-table">
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($slider->id); ?> </td>
                                <td><?php if($slider->photo): ?><?php echo e(url($slider->photo->path)); ?><?php endif; ?></td>
                                <td>
                                    <?php if(isset($slider->photo->path)): ?>
                                        <img style="width: 100px" src="<?php echo e(url($slider->photo->path)); ?>">
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
                <div class="paginate p-3">
                    <?php echo e($data->links()); ?>

                </div>
            </div>
            <div class="col-sm-12">
                <?php echo e(Form::open(array('route' => 'upload-store', 'method' => 'post', 'files' => true))); ?>

                <div class="row">
                    <div class="col-md-6" style="margin-top: 10px;">
                        <div class="form-group">
                            <?php echo e(Form::label('photo', 'فایل خود را وارد کردن')); ?>

                            <?php echo e(Form::file('photo', array('accept' => '*/*'))); ?>

                        </div>
                    </div>
                </div>
                <div style="margin-bottom: 20px">
                    <?php echo e(Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>افزودن', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left'))); ?>

                </div>
                <br/>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>