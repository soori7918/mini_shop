<!-- HEADER AREA START (header-5) -->
<header class="ltn__header-area ltn__header-5 ltn__header-logo-and-mobile-menu-in-mobile ltn__header-transparent--- gradient-color-4---">
    <!-- ltn__header-top-area start -->
    <div class="ltn__header-top-area section-bg-6 top-area-color-white---">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="ltn__top-bar-menu">
                        <ul>
                            <?php if($contact_provider->email_header): ?>
                                <li><a href="mailto:<?php echo e(str_replace([' ','_','-'],'',$contact_provider->email_header)); ?>"><i class="icon-mail"></i> <?php echo e($contact_provider->email_header); ?></a></li>
                            <?php endif; ?>
                            <?php if($contact_provider->phone_header): ?>
                                <li><a href="tel:+<?php echo e(str_replace([' ','_','-'],'',$contact_provider->phone_header)); ?>" class="font_new"><i class="icon-call"></i> +<?php echo e($contact_provider->phone_header); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="top-bar-right text-right">
                        <div class="ltn__top-bar-menu">
                            <ul>

















                                <li>
                                    <!-- ltn__social-media -->
                                    <div class="ltn__social-media">
                                        <ul>
                                            <?php if($contact_provider->pinterest): ?>
                                                <li><a href="<?php echo e($contact_provider->pinterest); ?>" title="Pinterest" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
                                            <?php endif; ?>
                                            <?php if($contact_provider->youtube): ?>
                                                <li><a href="<?php echo e($contact_provider->youtube); ?>" title="Youtube" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                            <?php endif; ?>
                                            <?php if($contact_provider->linkedin): ?>
                                                <li><a href="<?php echo e($contact_provider->linkedin); ?>" title="Linkedin" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                            <?php endif; ?>
                                            <?php if($contact_provider->telegram): ?>
                                                <li><a href="<?php echo e($contact_provider->telegram); ?>" title="Telegram" target="_blank"><i class="fab fa-telegram-plane"></i></a></li>
                                            <?php endif; ?>
                                            <?php if($contact_provider->instagram): ?>
                                                <li><a href="<?php echo e($contact_provider->instagram); ?>" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                            <?php endif; ?>
                                            <?php if($contact_provider->twitter): ?>
                                                <li><a href="<?php echo e($contact_provider->twitter); ?>" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                            <?php endif; ?>
                                            <?php if($contact_provider->facebook): ?>
                                                <li><a href="<?php echo e($contact_provider->facebook); ?>" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                            <?php endif; ?>
                                                <?php if($contact_provider->aparat): ?>
                                                    <li>
                                                        <a href="<?php echo e($contact_provider->aparat); ?>" title="Aparat">
                                                            <img src="<?php echo e(url('assets/user/pic/aparat_69.png')); ?>" alt="vavdidad">
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                        </ul>
                                    </div>
                                </li>






                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ltn__header-top-area end -->

    <!-- ltn__header-middle-area start -->
    <div class="ltn__header-middle-area ltn__header-sticky ltn__sticky-bg-white">
        <div class="container">
            <div class="row ltr_1200">
                <div class="col">
                    <div class="site-logo-wrap">
                        <div class="site-logo">
                            <a href="<?php echo e(route('user.index')); ?>"><img src="<?php echo e(url('assets/user/pic/logo.png')); ?>" alt="Logo"></a>
                        </div>
                    </div>
                </div>
                <div class="col header-menu-column">
                    <div class="header-menu d-none d-xl-block">
                        <nav>
                            <div class="ltn__main-menu">
                                <ul>
                                    <li><a href="<?php echo e(route('user.index')); ?>">صفحه اصلی</a></li>
                                    <li>
                                        <a href="<?php echo e(route('user.villas.search','all')); ?>">خرید ملک در ترکیه</a>
                                        <ul class="sub-menu menu-pages-img-show">
                                            <?php $__currentLoopData = App\Villa::types_villa(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <a href="<?php echo e(route('user.villas.search',['all','type_villa'=>[$key]])); ?>"><?php echo e($type); ?></a>
                                            </li>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </li>

                                    <li><a href="<?php echo e(route('user.blog.index','eghamat_type')); ?>">اقامت در ترکیه</a>
                                        <ul class="sub-menu">
                                            <?php $__currentLoopData = $eghamat_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$eghamat_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <a href="<?php echo e(route('user.blog.index',$eghamat_cat->id)); ?>"><?php echo e($eghamat_cat->name); ?> <?php if(count($eghamat_cat->children)): ?> <span class="float-right">>></span> <?php endif; ?></a>
                                                    <?php if(count($eghamat_cat->children)): ?>
                                                        <ul class="sub-menu">
                                                            <?php $__currentLoopData = $eghamat_cat->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$eghamat_cat_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li>
                                                                    <a href="<?php echo e(route('user.blog.index',$eghamat_cat_child->id)); ?>"><?php echo e($eghamat_cat_child->name); ?></a>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo e(route('user.blog.index','shahrvandi_type')); ?>">شهروندی ترکیه</a>
                                        <ul class="sub-menu">
                                            <?php $__currentLoopData = $shahrvandi_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$shahrvandi_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <a href="<?php echo e(route('user.blog.index',$shahrvandi_cat->id)); ?>"><?php echo e($shahrvandi_cat->name); ?> <?php if(count($shahrvandi_cat->children)): ?> <span class="float-right">>></span> <?php endif; ?></a>
                                                    <?php if(count($shahrvandi_cat->children)): ?>
                                                        <ul class="sub-menu">
                                                            <?php $__currentLoopData = $shahrvandi_cat->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$shahrvandi_cat_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li>
                                                                    <a href="<?php echo e(route('user.blog.index',$shahrvandi_cat_child->id)); ?>"><?php echo e($shahrvandi_cat_child->name); ?></a>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo e(route('user.blog.index','job_type')); ?>">  کسب و کار در ترکیه</a>
                                        <ul class="sub-menu">
                                            <?php $__currentLoopData = $job_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$job_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <a href="<?php echo e(route('user.blog.index',$job_cat->id)); ?>"><?php echo e($job_cat->name); ?> <?php if(count($job_cat->children)): ?> <span class="float-right">>></span> <?php endif; ?></a>
                                                    <?php if(count($job_cat->children)): ?>
                                                        <ul class="sub-menu">
                                                            <?php $__currentLoopData = $job_cat->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$job_cat_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li>
                                                                    <a href="<?php echo e(route('user.blog.index',$job_cat_child->id)); ?>"><?php echo e($job_cat_child->name); ?></a>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </li>


                                    <li><a href="<?php echo e(route('user.blog.index','radio_vandidad_type')); ?>">رادیو وندیداد</a>
                                        <ul class="sub-menu">
                                            <?php $__currentLoopData = $radio_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$radio_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <a href="<?php echo e(route('user.blog.index',$radio_cat->id)); ?>"><?php echo e($radio_cat->name); ?> <?php if(count($radio_cat->children)): ?> <span class="float-right">>></span> <?php endif; ?></a>
                                                    <?php if(count($radio_cat->children)): ?>
                                                        <ul class="sub-menu">
                                                            <?php $__currentLoopData = $radio_cat->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$radio_cat_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li>
                                                                    <a href="<?php echo e(route('user.blog.index',$radio_cat_child->id)); ?>"><?php echo e($radio_cat_child->name); ?></a>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo e(route('user.blog.index','article_type')); ?>">وبلاگ</a>
                                        <ul class="sub-menu">
                                            <?php $__currentLoopData = $article_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$article_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <a href="<?php echo e(route('user.blog.index',$article_cat->id)); ?>"><?php echo e($article_cat->name); ?> <?php if(count($article_cat->children)): ?> <span class="float-right">>></span> <?php endif; ?></a>
                                                    <?php if(count($article_cat->children)): ?>
                                                        <ul class="sub-menu">
                                                            <?php $__currentLoopData = $article_cat->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$article_cat_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li>
                                                                    <a href="<?php echo e(route('user.blog.index',$article_cat_child->id)); ?>"><?php echo e($article_cat_child->name); ?></a>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo e(route('user.about')); ?>">درباره ما</a></li>
                                    <li><a href="<?php echo e(route('user.contact')); ?>">تماس با ما</a></li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fas fa-search"></i></a>
                                        <ul class="sub-menu menu-pages-img-show search_menu">
                                            <li class="p-0 px-2">
                                                <div class="search-container">
                                                    <form action="<?php echo e(route('user.search')); ?>" method="get">
                                                        <input type="text" id="search_input_header" placeholder="جستجو" name="search" required oninvalid="this.setCustomValidity('دنبال چه میگردید؟؟؟')" oninput="setCustomValidity('')">
                                                        <button type="submit" id="search_btn_header"><i class="fa fa-search"></i></button>
                                                    </form>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="ltn__header-options ltn__header-options-2">
                    <!-- Mobile Menu Button -->
                    <div class="mobile-menu-toggle d-xl-none">
                        <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                            <svg viewBox="0 0 800 600">
                                <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                <path d="M300,320 L540,320" id="middle"></path>
                                <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ltn__header-middle-area end -->
</header>
<!-- HEADER AREA END -->



<!-- Utilize Mobile Menu Start -->
<div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
    <div class="ltn__utilize-menu-inner ltn__scrollbar">
        <div class="ltn__utilize-menu-head">
            <div class="site-logo">
                <a href="<?php echo e(route('user.index')); ?>"><img src="<?php echo e(url('assets/user/pic/logo.png')); ?>" alt="Logo"></a>
            </div>
            <button class="ltn__utilize-close">×</button>
        </div>
        <div class="ltn__utilize-menu">
            <ul>
                <li class="search_menu">
                    <div class="search-container">
                        <form action="<?php echo e(route('user.search')); ?>" method="get">
                            <input type="text" id="search_input_header1" placeholder="جستجو" name="search" required oninvalid="this.setCustomValidity('دنبال چه میگردید؟؟؟')" oninput="setCustomValidity('')">
                            <button type="submit" id="search_btn_header1"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </li>
                <li><a href="<?php echo e(route('user.index')); ?>">صفحه اصلی</a></li>
                <li><a href="<?php echo e(route('user.villas.search',['all','room_num'=>['all'],'type_info'=>['all'],'state_id'=>''])); ?>">خرید ملک در ترکیه</a>
                    <ul class="sub-menu">
                        <?php $__currentLoopData = App\Villa::types_villa(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e(route('user.villas.search',['all','room_num'=>['all'],'type_info'=>['all'],'state_id'=>'','type_villa'=>[$key]])); ?>"><?php echo e($type); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </li>

                <li><a href="<?php echo e(route('user.blog.index','eghamat_type')); ?>">اقامت در ترکیه</a>
                    <ul class="sub-menu">
                        <?php $__currentLoopData = $eghamat_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$eghamat_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e(route('user.blog.index',$eghamat_cat->id)); ?>"><?php echo e($eghamat_cat->name); ?></a>
                            </li>
                            <?php if(count($eghamat_cat->children)): ?>
                                <?php $__currentLoopData = $eghamat_cat->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$eghamat_cat_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="pl-3">
                                        _ <a href="<?php echo e(route('user.blog.index',$eghamat_cat_child->id)); ?>"><?php echo e($eghamat_cat_child->name); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </li>
                <li><a href="<?php echo e(route('user.blog.index','shahrvandi_type')); ?>">شهروندی ترکیه</a>
                    <ul class="sub-menu">
                        <?php $__currentLoopData = $shahrvandi_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$shahrvandi_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e(route('user.blog.index',$shahrvandi_cat->id)); ?>"><?php echo e($shahrvandi_cat->name); ?></a>
                            </li>
                            <?php if(count($shahrvandi_cat->children)): ?>
                                <?php $__currentLoopData = $shahrvandi_cat->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$shahrvandi_cat_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="pl-3">
                                        _ <a href="<?php echo e(route('user.blog.index',$shahrvandi_cat_child->id)); ?>"><?php echo e($shahrvandi_cat_child->name); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </li>
                <li><a href="<?php echo e(route('user.blog.index','job_type')); ?>">  کسب و کار در ترکیه</a>
                    <ul class="sub-menu">
                        <?php $__currentLoopData = $job_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$job_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e(route('user.blog.index',$job_cat->id)); ?>"><?php echo e($job_cat->name); ?></a>
                            </li>
                            <?php if(count($job_cat->children)): ?>
                                <?php $__currentLoopData = $job_cat->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$job_cat_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="pl-3">
                                        _ <a href="<?php echo e(route('user.blog.index',$job_cat_child->id)); ?>"><?php echo e($job_cat_child->name); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </li>


                <li><a href="<?php echo e(route('user.blog.index','radio_vandidad_type')); ?>">رادیو وندیداد</a>
                    <ul class="sub-menu">
                        <?php $__currentLoopData = $radio_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$radio_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e(route('user.blog.index',$radio_cat->id)); ?>"><?php echo e($radio_cat->name); ?></a>
                            </li>
                            <?php if(count($radio_cat->children)): ?>
                                <?php $__currentLoopData = $radio_cat->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$radio_cat_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="pl-3">
                                        _ <a href="<?php echo e(route('user.blog.index',$radio_cat_child->id)); ?>"><?php echo e($radio_cat_child->name); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </li>
                <li><a href="<?php echo e(route('user.blog.index','article_type')); ?>">وبلاگ</a>
                    <ul class="sub-menu">
                        <?php $__currentLoopData = $article_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$article_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e(route('user.blog.index',$article_cat->id)); ?>"><?php echo e($article_cat->name); ?></a>
                            </li>
                            <?php if(count($article_cat->children)): ?>
                                <?php $__currentLoopData = $article_cat->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$article_cat_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="pl-3">
                                        _ <a href="<?php echo e(route('user.blog.index',$article_cat_child->id)); ?>"><?php echo e($article_cat_child->name); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </li>
                <li><a href="<?php echo e(route('user.about')); ?>">درباره ما</a></li>
                <li><a href="<?php echo e(route('user.contact')); ?>">تماس با ما</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- Utilize Mobile Menu End -->

<div class="ltn__utilize-overlay"></div>
<?php if(isset($title)): ?>
<!-- BREADCRUMB AREA START -->

<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image "  data-bg="<?php echo e(url('assets/user/pic/14.jpg')); ?>">
    <span class="bg_abs"></span>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h3 class="page-title"><?php echo e($title); ?></h3>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="<?php echo e(route('user.index')); ?>"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> صفحه اصلی </a></li>
                            <li><?php echo e($title); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- BREADCRUMB AREA END -->
<?php endif; ?>
