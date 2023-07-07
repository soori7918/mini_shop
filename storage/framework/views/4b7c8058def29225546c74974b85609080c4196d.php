<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> <?php echo e($title); ?> <?php echo e($gallery->name); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="http://adib-it.com/" target="_blank"><img src="http://www.support.adib-it.com/img/logo.png" style="margin-top: 10px;"></a>
                    </div>
                    <h2><?php echo e($title); ?> <?php echo e($gallery->name); ?></h2>
                </div>
            </div>
            <div class="card-body">
                <div class="row gallery">
                    <?php $__currentLoopData = $gallery->photo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3">
                            <a data-fancybox="gallery" href="<?php echo e(url($photo->path)); ?>">
                                <img src="<?php echo e(url($photo->path)); ?>" alt="<?php echo e($gallery->name); ?>"/>
                            </a>
                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['gallery-photo-destroy', $photo->id] ]); ?>

                            <?php echo Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'btn btn-simple btn-danger mt-2', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']); ?>

                            <?php echo Form::close(); ?>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php echo e(Form::open(array('route' => 'gallery-photo-store', 'method' => 'PUT', 'files' => true))); ?>

                <?php echo e(Form::hidden('gallery', $gallery->id)); ?>

                <div class="form-group">
                    <?php echo e(Form::label('name', 'تصویر جدید  (برای آپلود چند فایل دکمه ctrl را نگهدارید)')); ?>

                    <div class="custom-file">
                        <?php echo e(Form::file('photo[]', array('accept' => 'image/*', 'class' => 'custom-file-input', 'id' => 'customFile' , 'multiple'))); ?>

                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                <br/>
                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-rounded btn-secondary float-right"><i class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                <?php echo e(Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>افزودن', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left'))); ?>

                <?php echo e(Form::close()); ?>

            </div>
        </div>
    <?php $__env->endSlot(); ?>
    <?php $__env->startPush('stylesheets'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/fancybox.min.css')); ?>"/>
    <?php $__env->stopPush(); ?>
    <?php $__env->startPush('scripts'); ?>
        <script type="text/javascript" src="<?php echo e(asset('js/fancybox.min.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>