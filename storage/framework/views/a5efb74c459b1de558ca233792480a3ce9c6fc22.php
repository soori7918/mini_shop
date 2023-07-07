<?php $__env->startSection('styles'); ?>
<style>
    .hovereffect {
        width: 100%;
        height: 220px;
        float: left;
        overflow: hidden;
        position: relative;
        text-align: center;
        cursor: default;
        margin-top: 20px;
    }

    .hovereffect .overlay {
        width: 100%;
        height: 100%;
        position: absolute;
        overflow: hidden;
        top: 0;
        left: 0;
    }

    .hovereffect img {
        display: block;
        width: 100%;
        height:220px;
        position: relative;
        object-fit: contain;
        -webkit-transition: all 0.4s ease-in;
        transition: all 0.4s ease-in;
    }

    .hovereffect:hover img {
        filter: url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg"><filter id="filter"><feColorMatrix type="matrix" color-interpolation-filters="sRGB" values="0.2126 0.7152 0.0722 0 0 0.2126 0.7152 0.0722 0 0 0.2126 0.7152 0.0722 0 0 0 0 0 1 0" /><feGaussianBlur stdDeviation="3" /></filter></svg>#filter');
        filter: grayscale(1) blur(3px);
        -webkit-filter: grayscale(1) blur(3px);
        -webkit-transform: scale(1.2);
        -ms-transform: scale(1.2);
        transform: scale(1.2);
    }

    .hovereffect h2 {
        text-transform: uppercase;
        text-align: center;
        position: relative;
        font-size: 17px;
        padding: 10px;
        background: rgba(0, 0, 0, 0.6);
    }

    .hovereffect a.info {
        display: inline-block;
        text-decoration: none;
        padding: 7px 14px;
        border: 1px solid #fff;
        margin: 50px 0 0 0;
        background-color: transparent;
    }

    .hovereffect a.info:hover {
        box-shadow: 0 0 5px #fff;
    }

    .hovereffect a.info, .hovereffect h2 {
        -webkit-transform: scale(0.7);
        -ms-transform: scale(0.7);
        transform: scale(0.7);
        -webkit-transition: all 0.4s ease-in;
        transition: all 0.4s ease-in;
        opacity: 0;
        filter: alpha(opacity=0);
        color: #fff;
        text-transform: uppercase;
    }

    .hovereffect:hover a.info, .hovereffect:hover h2 {
        opacity: 1;
        filter: alpha(opacity=100);
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container bg-white">
        <h1 class="text-primary-theme py-3 px-3">بلاگ</h1>
        <div class="w100 container-fluid">
            <div class="row">
                <?php if(count($blogs)>0): ?>
                    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="hovereffect">
                                <img class="img-responsive" src="<?php echo e($blog->photo!=null?url($blog->photo):''); ?>" alt="">
                                <div class="overlay">
                                    <h2><?php echo e($blog->title); ?></h2>
                                    <a class="info" href="<?php echo e(route('front-blog-show',$blog->slug)); ?>">مشاهده مقاله</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="hovereffect">
                                <img class="img-responsive" src="<?php echo e($blog->photo!=null?url($blog->photo):''); ?>" alt="">
                                <div class="overlay">
                                    <h2><?php echo e($blog->title); ?></h2>
                                    <a class="info" href="<?php echo e(route('front-blog-show',$blog->slug)); ?>">مشاهده مقاله</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="hovereffect">
                                <img class="img-responsive" src="<?php echo e($blog->photo!=null?url($blog->photo):''); ?>" alt="">
                                <div class="overlay">
                                    <h2><?php echo e($blog->title); ?></h2>
                                    <a class="info" href="<?php echo e(route('front-blog-show',$blog->slug)); ?>">مشاهده مقاله</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="hovereffect">
                                <img class="img-responsive" src="<?php echo e($blog->photo!=null?url($blog->photo):''); ?>" alt="">
                                <div class="overlay">
                                    <h2><?php echo e($blog->title); ?></h2>
                                    <a class="info" href="<?php echo e(route('front-blog-show',$blog->slug)); ?>">مشاهده مقاله</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="hovereffect">
                                <img class="img-responsive" src="<?php echo e($blog->photo!=null?url($blog->photo):''); ?>" alt="">
                                <div class="overlay">
                                    <h2><?php echo e($blog->title); ?></h2>
                                    <a class="info" href="<?php echo e(route('front-blog-show',$blog->slug)); ?>">مشاهده مقاله</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="hovereffect">
                                <img class="img-responsive" src="<?php echo e($blog->photo!=null?url($blog->photo):''); ?>" alt="">
                                <div class="overlay">
                                    <h2><?php echo e($blog->title); ?></h2>
                                    <a class="info" href="<?php echo e(route('front-blog-show',$blog->slug)); ?>">مشاهده مقاله</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>