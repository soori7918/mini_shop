
<?php $__env->startSection('meta'); ?>
    <meta name="keywords" content="<?php echo e($item->keywords); ?>">
    <meta name="description" content="<?php echo e($item->description); ?>"/>
    <meta property="og:title" content="<?php echo e($item->page_title); ?>"/>
    <meta property="og:description" content="<?php echo e($item->description); ?>"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style_css'); ?>
<style>
    .ltn__blog-details-wrap img
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
                            <div class="ltn__blog-meta">
                                <ul class="d-flex">
                                    <li class="ltn__blog-author">
                                        <i class="far fa-user"></i><a><?php echo e($item->user?$item->user->first_name.' '.$item->last_name:$item->author); ?></a>
                                    </li>
                                    <li class="ltn__blog-date">
                                        <i class="far fa-calendar-alt"></i><?php echo e(my_jdate($item->created_at,'Y/m/d')); ?>

                                    </li>
                                    <li>
                                        <a><i class="far fa-eye"></i><?php echo e($item->seen); ?></a>
                                    </li>
                                    <?php if($item->type!='radio_vandidad' && $item->file): ?>
                                        <li>
                                            <a href="<?php echo e(url($item->file)); ?>" download><i class="far fa-download"></i>دانلود فایل</a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <?php if($item->photo): ?>
                                <div class="col-12 text-center">
                                    <img src="<?php echo e(url($item->photo)); ?>" alt="<?php echo e($item->title); ?>">
                                </div>
                            <?php endif; ?>
                            <?php echo $item->text; ?>

                            <?php if($item->type=='radio_vandidad' && $item->file): ?>
                                <div class="col-12 text-center" id="wrapper">
                                    <audio controls class="w-100">
                                        <source src="<?php echo e(url($item->file)); ?>" type="audio/mpeg">
                                    </audio>
                                </div>


                            <?php endif; ?>
                            <?php if($item->text_short): ?>
                            <blockquote>
                                <h6 class="ltn__secondary-color mt-0">خلاصه توضیحات</h6>
                                <?php echo e($item->text_short); ?>

                            </blockquote>
                            <?php endif; ?>

                        </div>
                        <!-- blog-tags-social-media -->
                        <div class="ltn__blog-tags-social-media mt-80 row">
                            <div class="ltn__social-media text-right col-lg-4">
                                <h4>اشتراک گذاری</h4>
                                <ul>
                                    <li><a href="http://www.facebook.com/sharer.php?m2w&s=100&p[url]=<?php echo e(route('user.blog.show',$item->id)); ?>&p[title]=<?php echo e($item->title); ?>" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://twitter.com/intent/tweet?text=<?php echo e($item->title); ?>&url=<?php echo e(route('user.blog.show',$item->id)); ?>" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo e(route('user.blog.show',$item->id)); ?>&title=<?php echo e($item->title); ?>" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="https://t.me/share/url?url=<?php echo e(route('user.blog.show',$item->id)); ?>&text=<?php echo e($item->title); ?>" title="Telegram"><i class="fab fa-telegram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <hr>
                        <!-- prev-next-btn -->
                        <div class="ltn__prev-next-btn row mb-50">
                            <div class="blog-prev col-lg-6">
                                <?php if(isset($prev_item)): ?>
                                    <h6>قبلی</h6>
                                    <p class="ltn__blog-title"><a href="<?php echo e(route('user.blog.show',$prev_item->id)); ?>"><?php echo e($prev_item->title); ?></a></p>
                                <?php endif; ?>
                            </div>
                            <div class="blog-prev blog-next text-right col-lg-6">
                                <?php if(isset($next_item)): ?>
                                    <p>بعدی</p>
                                    <p class="ltn__blog-title"><a href="<?php echo e(route('user.blog.show',$next_item->id)); ?>"><?php echo e($next_item->title); ?></a></p>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar-area blog-sidebar ltn__right-sidebar">
                        <!-- Top Rated Product Widget -->
                        <div class="widget ltn__top-rated-product-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border-2">آخرین نوشته ها</h4>
                            <ul>
                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blogs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <div class="top-rated-product-item clearfix">
                                        <div class="top-rated-product-img">
                                            <a href="<?php echo e(route('user.blog.show',$blogs->id)); ?>"><img src="<?php echo e($blogs->photo?url($blogs->photo):url('assets/user/pic/product.jpg')); ?>" alt="#"></a>
                                        </div>
                                        <div class="top-rated-product-info">
                                            <h6><a href="<?php echo e(route('user.blog.show',$blogs->id)); ?>"><?php echo e($blogs->title); ?> </a></h6>
                                            <div class="product-price">
                                                <span><i class="far fa-eye"></i> <?php echo e($blogs->seen); ?> </span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <?php if(count($villas)): ?>
                        <!-- Popular Product Widget -->
                        <div class="widget ltn__popular-product-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border-2">ملک های پیشنهادی</h4>
                            <div class="row ltn__popular-product-widget-active slick-arrow-1">
                            <?php $__currentLoopData = $villas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $villa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!-- ltn__product-item -->
                                    <div class="col-lg-12">
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
                                                        <img src="<?php echo e(url($project->photos[0]->path)); ?>" alt="<?php echo e($project->name); ?>">
                                                    <?php else: ?>
                                                        <img src="<?php echo e($project->pic!=null?url($project->pic):url('assets/user/pic/product.jpg')); ?>" alt="<?php echo e($project->name); ?>">
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
                                                            <a href="<?php echo e(route('user.villas.search',[$project->id,'room_num'=>['all'],'type_info'=>'all','city_id'=>'all'])); ?>"><i class="far fa-calendar-alt"></i><?php echo e(my_jdate($project->created_at,'Y/m/d')); ?></a>
                                                        </li>
                                                    </ul>
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
<?php $__env->startSection('script_js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>