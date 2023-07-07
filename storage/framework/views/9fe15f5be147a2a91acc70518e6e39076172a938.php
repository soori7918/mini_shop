<?php $__env->startComponent('layouts.front'); ?>
    <?php $__env->slot('title'); ?> <?php if($setting->offer_title): ?><?php echo e($setting->offer_title); ?> <?php endif; ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('meta'); ?>
        <?php if($setting->offer_keywords): ?>
            <meta http-equiv="keywords" name="keywords" content="<?php echo e($setting->offer_keywords); ?>"/>
        <?php endif; ?>
        <?php if($setting->offer_description): ?>
            <meta http-equiv="description" name="description" content="<?php echo e($setting->offer_description); ?>"/>
        <?php endif; ?>

        <meta property="og:title" content="<?php echo e($setting->offer_title); ?>" />
        <meta property="og:type" content="Blog" />
        <meta property="og:url" content="<?php echo e(route('front-blog')); ?>" />
        <meta property="og:image" content="<?php echo e(url($slider->photo->path)); ?>" />
        <meta property="og:site_name" content="<?php echo e($setting->title); ?>" />
        <meta property="og:locale" content="fa_ir" />
        <?php if($setting->offer_description): ?>
            <meta property="og:description" content="<?php echo e($setting->offer_description); ?>" />
        <?php endif; ?>

    <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <style>
            .footer:before {
                background-color: #f8f8f8;
            }

            .newslater form a {
                left: .8rem;
                margin-top: -3.01rem;
            }

            .section {
                padding: 0 0;
            }
            .header-title h1 {
                color: white;
                font-weight: bold;
                text-shadow: 0px 0px 10px rgb(0, 0, 0);
            }
            .sub-header .header-title h3 {
                margin-top: 1rem;
                text-shadow: 0px 0px 10px black;
                color: white;
                font-weight: bold;
            }
            .post-mobile-show {
                display: none;
            }

            @media (max-width: 800px) {
                .post-mobile-show {
                    display: block !important;
                }
                .mobile-post-hidden{
                    display: none !important;
                }
            }
        </style>
        <header class="sub-header"
                style="background:url(<?php if(isset($slider->photo->path)): ?> <?php echo e(url($slider->photo->path)); ?>) <?php endif; ?> center no-repeat;background-size:cover;">
            <div class="container">
                <div class="sub-logo">
                    <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('img/logo.svg')); ?>"
                                                  alt="&#1608;&#1740;&#1604;&#1705;&#1587;&#1585;"></a>
                </div>
                <div class="header-title">
                    <h1 style="font-size: 34px;"><?php echo e($slider->title); ?></h1>
                    <h3 style="font-size: 17px"><?php echo e($slider->shoar); ?></h3>
                </div>
            </div>
        </header>
        <section class="wheydo section">
            <div class="container">
                <p class="text-justify mb-5"><?php echo $slider->text; ?></p>
                <div class="post-list" data-direction="rtl" style="margin-top: 30px;">
                    <div class="row">

                        <div class="col-md-4">
                            <aside class="post-sidebars">
                                <div class="post-sidebar mb-4">
                                    <form role="search" enctype="multipart/form-data" method="post" id="searchform" class="searchform" action="<?php echo e(route('blog-search')); ?>">
                                        <div>
                                            <?php echo e(csrf_field()); ?>

                                            <input required type="text" name="search" id="s"
                                                   placeholder="&#1580;&#1587;&#1578;&#1580;&#1608; &#1705;&#1606;&#1740;&#1583;...">
                                            <button type="submit" class="undefined button submit">&#1580;&#1587;&#1578;&#1580;&#1608;
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="post-sidebar newslater mb-4 mobile-post-hidden">
                                    <h6 class="mb-3">&#1575;&#1608;&#1604;&#1740;&#1606; &#1606;&#1601;&#1585;&#1740;
                                        &#1576;&#1575;&#1588;&#1740;&#1583; &#1705;&#1607; &#1575;&#1586; &#1607;&#1605;&#1607;
                                        &#1670;&#1740;&#1586; &#1576;&#1575; &#1582;&#1576;&#1585; &#1605;&#1740;
                                        &#1588;&#1608;&#1583;</h6>
                                    <?php echo e(Form::open(array('route' => 'newsletter-store', 'method' => 'PUT'))); ?>

                                    <?php echo e(Form::hidden('page_name', 'blog')); ?>

                                    <?php echo e(Form::hidden('page_name_display', '&#1605;&#1580;&#1604;&#1607;')); ?>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                <input type="text" name="email" class="form-control"
                                                       placeholder="&#1575;&#1740;&#1605;&#1740;&#1604; &#1582;&#1608;&#1583; &#1585;&#1575; &#1608;&#1575;&#1585;&#1583; &#1705;&#1606;&#1740;&#1583;...">
                                            </div>
                                        </div>
                                        <span class="or text-grey-300 mt-2"></span>
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                <input type="text" name="mobile" pattern="09[0-9]{9}"
                                                       class="form-control"
                                                       placeholder="&#1605;&#1608;&#1576;&#1575;&#1740;&#1604; &#1582;&#1608;&#1583; &#1585;&#1575; &#1608;&#1575;&#1585;&#1583; &#1705;&#1606;&#1740;&#1583;...">
                                            </div>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" onclick="$(this).parent('form').submit()"><i
                                                class="fa fa-angle-left"></i></a>
                                    <?php echo e(Form::close()); ?>

                                    <p class="text-justify">

                                        &#1605;&#1587;&#1578;&#1602;&#1740;&#1605; &#1576;&#1575; &#1605;&#1575; &#1575;&#1586; &#1591;&#1585;&#1740;&#1602; &#1589;&#1606;&#1583;&#1608;&#1602; &#1608;&#1585;&#1608;&#1583;&#1740; &#1575;&#1740;&#1605;&#1740;&#1604;&#1578;&#1575;&#1606; &#1583;&#1585; &#1575;&#1585;&#1578;&#1576;&#1575;&#1591; &#1576;&#1575;&#1588;&#1740;&#1583; &#1608; &#1662;&#1740;&#1575;&#1605; &#1607;&#1575;&#1740; &#1605;&#1607;&#1605; &#1585;&#1575; &#1606;&#1740;&#1586;
                                        &#1575;&#1586; &#1591;&#1585;&#1740;&#1602; &#1662;&#1740;&#1575;&#1605;&#1705; &#1583;&#1585;&#1740;&#1575;&#1601;&#1578; &#1606;&#1605;&#1575;&#1740;&#1740;&#1583;. &#1606;&#1575;&#1605;&#1607; &#1607;&#1575;&#1740; &#1575;&#1740;&#1605;&#1740;&#1604;&#1740; &#1605;&#1575; &#1605;&#1705;&#1575;&#1606; &#1582;&#1608;&#1576;&#1740; &#1576;&#1585;&#1575;&#1740; &#1583;&#1585;&#1740;&#1575;&#1601;&#1578; &#1575;&#1591;&#1604;&#1575;&#1593;&#1575;&#1578;&#1548;
                                        &#1575;&#1604;&#1607;&#1575;&#1605; &#1576;&#1582;&#1588;&#1740; &#1607;&#1575;&#1740; &#1587;&#1601;&#1585; &#1608; &#1705;&#1587;&#1576; &#1575;&#1591;&#1604;&#1575;&#1593;&#1575;&#1578; &#1576;&#1740;&#1588;&#1578;&#1585; &#1587;&#1601;&#1585;&#1740; &#1576;&#1585;&#1575;&#1740; &#1593;&#1575;&#1588;&#1602;&#1575;&#1606; &#1587;&#1601;&#1585; &#1608; &#1583;&#1608;&#1587;&#1578; &#1583;&#1575;&#1585;&#1575;&#1606; &#1575;&#1602;&#1575;&#1605;&#1578;
                                        &#1583;&#1585; &#1608;&#1740;&#1604;&#1575; &#1607;&#1575;&#1740; &#1582;&#1589;&#1608;&#1589;&#1740; &#1575;&#1587;&#1578; &#1607;&#1605;&#1670;&#1606;&#1740;&#1606; &#1588;&#1605;&#1575; &#1575;&#1586; &#1575;&#1740;&#1606; &#1591;&#1585;&#1740;&#1602; &#1605;&#1740; &#1578;&#1608;&#1575;&#1606;&#1740;&#1583; &#1575;&#1591;&#1604;&#1575;&#1593;&#1575;&#1578; &#1580;&#1575;&#1604;&#1576; &#1608;&#1740;&#1604;&#1575;&#1607;&#1575;&#1740;
                                        &#1605;&#1582;&#1578;&#1604;&#1601; &#1608; &#1711;&#1588;&#1578; &#1607;&#1575;&#1740; &#1578;&#1601;&#1585;&#1740;&#1581;&#1740; &#1608; &#1576;&#1585;&#1578;&#1585;&#1740;&#1606; &#1605;&#1705;&#1575;&#1606; &#1607;&#1575;&#1740; &#1583;&#1740;&#1583;&#1606;&#1740; &#1607;&#1585; &#1605;&#1602;&#1589;&#1583; &#1585;&#1575; &#1606;&#1740;&#1586; &#1605;&#1591;&#1575;&#1604;&#1593;&#1607; &#1606;&#1605;&#1575;&#1740;&#1740;&#1583;.
                                    </p>
                                </div>
                                <div class="post-sidebar mb-4">
                                    <h3 style="font-size: 16px">&#1605;&#1608;&#1590;&#1608;&#1593;&#1575;&#1578; &#1608;&#1576;&#1604;&#1575;&#1711;</h3>
                                    <ul>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                            Session::put('count', $category->posts->count());
                                            ?>
                                            <div style="display: none">
                                                <?php echo $__env->make('blog.eachCat', $category, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                            </div>
                                            <li>
                                                <div class="drop-box">
                                                    <?php if($category->posts->count() != 0): ?>

                                                        <a href="<?php echo e(route('front-blog-cat', $category->slug)); ?>"
                                                           style="cursor: pointer"><?php echo e($category->name); ?>

                                                            (<?php echo e(Session::get('count')); ?>)
                                                        </a>

                                                        <div class="drop-c" style="display: none">
                                                            <?php if($category->children->count() > 0): ?>
                                                                <ul>
                                                                    <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php
                                                                        $old = Session::get('count');
                                                                        $new = $category->posts->count();
                                                                        $final = $old + $new;
                                                                        Session::put('count', $final);

                                                                        $number = 0;

                                                                        if ($category->children->count() > 0) {
                                                                            foreach ($category->children as $value) {
                                                                                $number += $value->posts->count();
                                                                            }

                                                                        }
                                                                        ?>

                                                                        <li>
                                                                            <?php if($category->posts->count() == 0): ?>

                                                                                <a style="cursor: pointer"><?php echo e($category->name); ?>

                                                                                    (<?php echo e($category->posts->count() + $number); ?>)</a>

                                                                            <?php else: ?>
                                                                                <a href="<?php echo e(route('front-blog-cat', $category->slug)); ?>"><?php echo e($category->name); ?>

                                                                                    (<?php echo e($category->posts->count() + $number); ?>)</a>
                                                                            <?php endif; ?>
                                                                            <?php echo $__env->make('blog.eachCat', $category, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                                                        </li>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </ul>
                                                            <?php endif; ?>
                                                        </div>
                                                    <?php else: ?>
                                                        <a style="cursor: pointer"><?php echo e($category->name); ?>

                                                            (<?php echo e(Session::get('count')); ?>)
                                                        </a>
                                                        <div class="drop-c" style="display: none">

                                                            <?php if($category->children->count() > 0): ?>
                                                                <ul>
                                                                    <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                                        <?php
                                                                        $old = Session::get('count');
                                                                        $new = $category->posts->count();
                                                                        $final = $old + $new;
                                                                        Session::put('count', $final);

                                                                        $number = 0;

                                                                        if ($category->children->count() > 0) {
                                                                            foreach ($category->children as $value) {
                                                                                $number += $value->posts->count();
                                                                            }

                                                                        }
                                                                        ?>


                                                                        <li>
                                                                            <?php if($category->posts->count() == 0): ?>

                                                                                <a style="cursor: pointer"><?php echo e($category->name); ?>

                                                                                    (<?php echo e($category->posts->count() + $number); ?>)</a>

                                                                            <?php else: ?>
                                                                                <a href="<?php echo e(route('front-blog-cat', $category->slug)); ?>"><?php echo e($category->name); ?>

                                                                                    (<?php echo e($category->posts->count() + $number); ?>)</a>
                                                                            <?php endif; ?>
                                                                            <?php echo $__env->make('blog.eachCat', $category, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                                                        </li>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </ul>
                                                            <?php endif; ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </li>
                                            <?php
                                            Session::forget('count');
                                            ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </aside>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('front-blog-show', $post->slug)); ?>">
                                        <div class="col-md-12 mb-4">
                                            <figure class="post">
                                                <section class="post-date text-center">
                                                    <p><?php echo e(my_jdate($post->updated_at, 'd F Y')); ?></p>
                                                </section>
                                                <figcaption class="post-title text-center">
                                                    <h2 style="font-size: 24px"><?php echo e($post->title); ?></h2>
                                                    <p>&#1578;&#1608;&#1587;&#1591;
                                                        : <?php echo e($post->author->first_name . ' ' .$post->author->last_name); ?></p>
                                                    <p><?php echo e($post->category->name); ?></p>
                                                </figcaption>
                                                <?php if($post->photo): ?>
                                                    <img width="650" src="<?php echo e(url($post->photo->path)); ?>"
                                                         alt="<?php echo e($post->title); ?>">
                                                <?php endif; ?>
                                                <section class="description">
                                                    <p><?php echo str_limit(strip_tags($post->body), $limit = 300, $end = '...'); ?></p>
                                                </section>
                                                <footer>
                                                    <a href="<?php echo e(route('front-blog-show', $post->slug)); ?>"
                                                       class="btn btn-info float-left ml-4 mb-4"><i
                                                                class="fa fa-angle-right ml-2"></i>&#1575;&#1583;&#1575;&#1605;&#1607;
                                                        &#1605;&#1591;&#1604;&#1576;</a>
                                                </footer>
                                            </figure>
                                        </div>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="post-sidebar newslater mb-4 post-mobile-show">
                                        <h6 class="mb-3">&#1575;&#1608;&#1604;&#1740;&#1606; &#1606;&#1601;&#1585;&#1740;
                                            &#1576;&#1575;&#1588;&#1740;&#1583; &#1705;&#1607; &#1575;&#1586; &#1607;&#1605;&#1607;
                                            &#1670;&#1740;&#1586; &#1576;&#1575; &#1582;&#1576;&#1585; &#1605;&#1740;
                                            &#1588;&#1608;&#1583;</h6>
                                        <?php echo e(Form::open(array('route' => 'newsletter-store', 'method' => 'PUT'))); ?>

                                        <?php echo e(Form::hidden('page_name', 'blog')); ?>

                                        <?php echo e(Form::hidden('page_name_display', '&#1583;&#1587;&#1578;&#1607; &#1576;&#1606;&#1583;&#1740;')); ?>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                                class="fa fa-envelope"></i></span>
                                                    <input type="text" name="email" class="form-control"
                                                           placeholder="&#1575;&#1740;&#1605;&#1740;&#1604; &#1582;&#1608;&#1583; &#1585;&#1575; &#1608;&#1575;&#1585;&#1583; &#1705;&#1606;&#1740;&#1583;...">
                                                </div>
                                            </div>
                                            <span class="or text-grey-300 mt-2"></span>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                    <input type="text" name="mobile" pattern="09[0-9]{9}"
                                                           class="form-control"
                                                           placeholder="&#1605;&#1608;&#1576;&#1575;&#1740;&#1604; &#1582;&#1608;&#1583; &#1585;&#1575; &#1608;&#1575;&#1585;&#1583; &#1705;&#1606;&#1740;&#1583;...">
                                                </div>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0)" onclick="$(this).parent('form').submit()"><i
                                                    class="fa fa-angle-left"></i></a>
                                        <?php echo e(Form::close()); ?>

                                        <p class="text-justify">&#1605;&#1587;&#1578;&#1602;&#1740;&#1605; &#1576;&#1575;
                                            &#1605;&#1575; &#1575;&#1586; &#1591;&#1585;&#1740;&#1602; &#1589;&#1606;&#1583;&#1608;&#1602;
                                            &#1608;&#1585;&#1608;&#1583;&#1740; &#1575;&#1740;&#1605;&#1740;&#1604;&#1578;&#1575;&#1606;
                                            &#1583;&#1585; &#1575;&#1585;&#1578;&#1576;&#1575;&#1591; &#1576;&#1575;&#1588;&#1740;&#1583;
                                            &#1608; &#1662;&#1740;&#1575;&#1605; &#1607;&#1575;&#1740; &#1605;&#1607;&#1605;
                                            &#1585;&#1575; &#1575;&#1586; &#1591;&#1585;&#1740;&#1602; &#1662;&#1740;&#1575;&#1605;&#1705;
                                            &#1583;&#1585;&#1740;&#1575;&#1601;&#1578; &#1606;&#1605;&#1575;&#1740;&#1740;&#1583;.
                                            &#1606;&#1575;&#1605;&#1607; &#1607;&#1575;&#1740; &#1575;&#1740;&#1605;&#1740;&#1604;&#1740;
                                            &#1605;&#1575; &#1605;&#1705;&#1575;&#1606; &#1582;&#1608;&#1576;&#1740;
                                            &#1576;&#1585;&#1575;&#1740;
                                            &#1583;&#1585;&#1740;&#1575;&#1601;&#1578; &#1575;&#1591;&#1604;&#1575;&#1593;&#1575;&#1578;&#1548;
                                            &#1575;&#1604;&#1607;&#1575;&#1605; &#1576;&#1582;&#1588;&#1740; &#1607;&#1575;&#1740;
                                            &#1587;&#1601;&#1585; &#1608; &#1705;&#1587;&#1576; &#1575;&#1591;&#1604;&#1575;&#1593;&#1575;&#1578;
                                            &#1576;&#1740;&#1588;&#1578;&#1585; &#1587;&#1601;&#1585;&#1740; &#1576;&#1585;&#1575;&#1740;
                                            &#1593;&#1575;&#1588;&#1602;&#1575;&#1606; &#1587;&#1601;&#1585; &#1608;
                                            &#1583;&#1608;&#1587;
                                            &#1583;&#1575;&#1585;&#1575;&#1606; &#1575;&#1602;&#1575;&#1605;&#1578;
                                            &#1583;&#1585;
                                            &#1608;&#1740;&#1604;&#1575; &#1607;&#1575;&#1740; &#1582;&#1589;&#1608;&#1589;&#1740;
                                            &#1575;&#1587;&#1578; &#1607;&#1605;&#1670;&#1606;&#1740;&#1606; &#1588;&#1605;&#1575;
                                            &#1575;&#1586; &#1575;&#1740;&#1606; &#1591;&#1585;&#1740;&#1602; &#1583;&#1587;&#1578;&#1585;&#1587;&#1740;
                                            &#1576;&#1607; &#1570;&#1582;&#1585;&#1740;&#1606; &#1711;&#1588;&#1578;
                                            &#1607;&#1575;&#1740;
                                            &#1578;&#1601;&#1585;&#1740;&#1581;&#1740; &#1605;&#1575; &#1583;&#1585;
                                            &#1605;&#1602;&#1575;&#1589;&#1583;
                                            &#1605;&#1582;&#1578;&#1604;&#1601; &#1606;&#1740;&#1586; &#1662;&#1740;&#1583;&#1575;
                                            &#1605;&#1740; &#1705;&#1606;&#1740;&#1583;.</p>
                                    </div>
                                </div>

                            </div>

                            <nav class="float-right mt-4 text-center">
                                <?php echo e($posts->links()); ?>

                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.drop-box a').click(function () {
                    $(this).parent().children('div').slideToggle();
                });
                $('.drop-c a').click(function () {
                    $(this).parent().children('ul').slideToggle();
                });
            });
        </script>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>