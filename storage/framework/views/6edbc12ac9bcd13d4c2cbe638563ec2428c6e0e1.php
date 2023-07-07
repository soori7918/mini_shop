
<?php $__env->startSection('style_css'); ?>
<style>
    .ltn__page-details-inner.ltn__blog-details-inner img
    {
        width: 90%!important;
        height: auto!important;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>

    <!-- PAGE DETAILS AREA START (blog-details) -->
    <div class="ltn__page-details-area ltn__blog-details-area mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="ltn__blog-details-wrap">
                        <div class="ltn__page-details-inner ltn__blog-details-inner">
                            <h2 class="ltn__blog-title">
                                <?php echo e($item->title); ?>

                            </h2>
                            <?php echo $item->text_input; ?>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-0">
                    <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar---">
                    <?php if(count($villas)): ?>
                        <!-- Popular Product Widget -->
                            <div class="widget ltn__popular-product-widget">
                                <h4 class="ltn__widget-title ltn__widget-title-border-2">ملک های پیشنهادی</h4>
                                <div class="row ltn__popular-product-widget-active slick-arrow-1">
                                <?php $__currentLoopData = $villas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $villa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <!-- ltn__product-item -->
                                        <div class="col-lg-12 px-3">
                                            <?php echo $__env->make('user.includes.villaCard',['villa'=>$villa], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <!--  -->
                                </div>
                            </div>
                            <!-- Popular Post Widget -->
                        <?php endif; ?>
                        <div class="widget ltn__popular-post-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border-2">آخرین پروژه ها</h4>
                            <ul>
                                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <div class="popular-post-widget-item clearfix">
                                            <div class="popular-post-widget-img">
                                                <a href="<?php echo e(route('user.project.show',$project->id)); ?>">
                                                    <?php if(count($project->photos)>0): ?>
                                                        <img src="<?php echo e(url($project->photos[0]->path)); ?>"
                                                             alt="<?php echo e($project->name); ?>">
                                                    <?php else: ?>
                                                        <img src="<?php echo e($project->pic!=null?url($project->pic):url('source/assets/user/rtl/img/product-3/1.jpg')); ?>"
                                                             alt="<?php echo e($project->name); ?>">
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            <div class="popular-post-widget-brief">
                                                <h6>
                                                    <a href="<?php echo e(route('user.villas.search',[$project->id,'room_num'=>['all'],'type_info'=>'all','city_id'=>'all'])); ?>">
                                                        <?php echo e($project->name); ?>

                                                    </a>
                                                </h6>
                                                <h6>
                                                    <a href="<?php echo e(route('user.villas.search',[$project->id,'room_num'=>['all'],'type_info'=>'all','city_id'=>'all'])); ?>">
                                                        شروع قیمت از : <?php echo e(number_format($project->price)); ?> لیر
                                                    </a>
                                                </h6>
                                                <div class="ltn__blog-meta">
                                                    <ul>
                                                        <li class="ltn__blog-date">
                                                            <a href="<?php echo e(route('user.villas.search',[$project->id,'room_num'=>['all'],'type_info'=>'all','city_id'=>'all'])); ?>"><i
                                                                        class="far fa-calendar-alt"></i><?php echo e(my_jdate($project->created_at,'Y/m/d')); ?>

                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <!-- Top Rated Product Widget -->
                        <div class="widget ltn__top-rated-product-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border-2">آخرین نوشته ها</h4>
                            <ul>
                                <?php $__currentLoopData = $blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blogs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <div class="top-rated-product-item clearfix">
                                            <div class="top-rated-product-img">
                                                <a href="<?php echo e(route('user.blog.show',$blogs->id)); ?>"><img
                                                            src="<?php echo e($blogs->photo?url($blogs->photo):url('source/assets/user/rtl/img/product/1.png')); ?>"
                                                            alt="#"></a>
                                            </div>
                                            <div class="top-rated-product-info">
                                                <h6><a href="<?php echo e(route('user.blog.show',$blogs->id)); ?>"><?php echo e($blogs->title); ?> </a>
                                                </h6>
                                                <div class="product-price">
                                                    <span><i class="far fa-eye"></i> <?php echo e($blogs->seen); ?> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE DETAILS AREA END -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script_js'); ?> <?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>