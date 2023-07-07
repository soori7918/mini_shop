<?php $__env->startComponent('layouts.front'); ?>
    <?php $__env->slot('title'); ?> &#1570;&#1688;&#1575;&#1606;&#1587; &#1605;&#1587;&#1575;&#1601;&#1585;&#1578;&#1740; &#1605;&#1585;&#1594;&#1575;&#1576; <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <style>
            .footer:before {
                background-color: #f8f8f8;
            }

            .newslater form a {
                left: .8rem;
                margin-top: -3.01rem;
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

        <?php
            $slider = App\Slider::where('page' , 7)->first()
        ?>
        <header class="sub-header"
                style="background: url(<?php echo e(url($slider->photo->path)); ?>) center no-repeat;background-size:cover;">
            <div class="container">

                <div class="sub-logo">
                    <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('img/logo.svg')); ?>"
                                                  alt="&#1608;&#1740;&#1604;&#1705;&#1587;&#1585;"></a>
                </div>
                <div class="header-title">
                    <h4><?php echo e($slider->title); ?></h4>
                    <p><?php echo e($slider->shoar); ?></p>
                </div>
            </div>
        </header>
        <section class="wheydo section">
            <div class="container">
                <div class="post-list" data-direction="rtl">
                    <div class="row">
                        <div class="col-md-4">
                            <aside class="post-sidebars">
                                <div class="post-sidebar mb-4">
                                    <form role="search" enctype="multipart/form-data" method="post" id="searchform"
                                          class="searchform" action="<?php echo e(route('blog-search')); ?>">
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

                                    <?php echo e(Form::hidden('page_name_display', '&#1583;&#1587;&#1578;&#1607; &#1576;&#1606;&#1583;&#1740; ' . $cat->name)); ?>

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

                                    <p class="text-justify">&#1605;&#1587;&#1578;&#1602;&#1740;&#1605; &#1576;&#1575;
                                        &#1605;&#1575; &#1575;&#1586; &#1591;&#1585;&#1740;&#1602; &#1589;&#1606;&#1583;&#1608;&#1602;
                                        &#1608;&#1585;&#1608;&#1583;&#1740; &#1575;&#1740;&#1605;&#1740;&#1604;&#1578;&#1575;&#1606;
                                        &#1583;&#1585; &#1575;&#1585;&#1578;&#1576;&#1575;&#1591; &#1576;&#1575;&#1588;&#1740;&#1583;
                                        &#1608; &#1662;&#1740;&#1575;&#1605; &#1607;&#1575;&#1740; &#1605;&#1607;&#1605;
                                        &#1585;&#1575; &#1575;&#1586; &#1591;&#1585;&#1740;&#1602; &#1662;&#1740;&#1575;&#1605;&#1705;
                                        &#1583;&#1585;&#1740;&#1575;&#1601;&#1578; &#1606;&#1605;&#1575;&#1740;&#1740;&#1583;.
                                        &#1606;&#1575;&#1605;&#1607; &#1607;&#1575;&#1740; &#1575;&#1740;&#1605;&#1740;&#1604;&#1740;
                                        &#1605;&#1575; &#1605;&#1705;&#1575;&#1606; &#1582;&#1608;&#1576;&#1740; &#1576;&#1585;&#1575;&#1740;
                                        &#1583;&#1585;&#1740;&#1575;&#1601;&#1578; &#1575;&#1591;&#1604;&#1575;&#1593;&#1575;&#1578;&#1548;
                                        &#1575;&#1604;&#1607;&#1575;&#1605; &#1576;&#1582;&#1588;&#1740; &#1607;&#1575;&#1740;
                                        &#1587;&#1601;&#1585; &#1608; &#1705;&#1587;&#1576; &#1575;&#1591;&#1604;&#1575;&#1593;&#1575;&#1578;
                                        &#1576;&#1740;&#1588;&#1578;&#1585; &#1587;&#1601;&#1585;&#1740; &#1576;&#1585;&#1575;&#1740;
                                        &#1593;&#1575;&#1588;&#1602;&#1575;&#1606; &#1587;&#1601;&#1585; &#1608; &#1583;&#1608;&#1587;
                                        &#1583;&#1575;&#1585;&#1575;&#1606; &#1575;&#1602;&#1575;&#1605;&#1578; &#1583;&#1585;
                                        &#1608;&#1740;&#1604;&#1575; &#1607;&#1575;&#1740; &#1582;&#1589;&#1608;&#1589;&#1740;
                                        &#1575;&#1587;&#1578; &#1607;&#1605;&#1670;&#1606;&#1740;&#1606; &#1588;&#1605;&#1575;
                                        &#1575;&#1586; &#1575;&#1740;&#1606; &#1591;&#1585;&#1740;&#1602; &#1583;&#1587;&#1578;&#1585;&#1587;&#1740;
                                        &#1576;&#1607; &#1570;&#1582;&#1585;&#1740;&#1606; &#1711;&#1588;&#1578; &#1607;&#1575;&#1740;
                                        &#1578;&#1601;&#1585;&#1740;&#1581;&#1740; &#1605;&#1575; &#1583;&#1585; &#1605;&#1602;&#1575;&#1589;&#1583;
                                        &#1605;&#1582;&#1578;&#1604;&#1601; &#1606;&#1740;&#1586; &#1662;&#1740;&#1583;&#1575;
                                        &#1605;&#1740; &#1705;&#1606;&#1740;&#1583;.</p>
                                </div>
                                <div class="post-sidebar mb-4">
                                    <h5>&#1605;&#1608;&#1590;&#1608;&#1593;&#1575;&#1578; &#1608;&#1576;&#1604;&#1575;&#1711;</h5>
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

                                                                        <li id="<?php echo e($category->id); ?>"
                                                                            class="category-child">
                                                                            <?php if($category->posts->count() == 0): ?>

                                                                                <a style="cursor: pointer"><?php echo e($category->name); ?>

                                                                                    (<?php echo e($category->posts->count() + $number); ?>

                                                                                    )</a>

                                                                            <?php else: ?>
                                                                                <a href="<?php echo e(route('front-blog-cat', $category->slug)); ?>"><?php echo e($category->name); ?>

                                                                                    (<?php echo e($category->posts->count() + $number); ?>

                                                                                    )</a>
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

                                                                        <li id="<?php echo e($category->id); ?>"
                                                                            class="category-child">
                                                                            <?php if($category->posts->count() == 0): ?>

                                                                                <a style="cursor: pointer"><?php echo e($category->name); ?>

                                                                                    (<?php echo e($category->posts->count() + $number); ?>

                                                                                    )</a>

                                                                            <?php else: ?>
                                                                                <a href="<?php echo e(route('front-blog-cat', $category->slug)); ?>"><?php echo e($category->name); ?>

                                                                                    (<?php echo e($category->posts->count() + $number); ?>

                                                                                    )</a>
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
                                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-12 mb-4">
                                        <a href="<?php echo e(route('front-blog-show', $post->slug)); ?>">
                                            <figure class="post">
                                                <section class="post-date text-center">
                                                    <p><?php echo e(my_jdate($post->updated_at, 'd F Y')); ?></p>
                                                </section>
                                                <figcaption class="post-title text-center">
                                                    <h5><?php echo e($post->title); ?></h5>
                                                    <p>&#1606;&#1608;&#1740;&#1587;&#1606;&#1583;&#1607;
                                                        : <?php echo e($post->author->first_name . ' ' .$post->author->last_name); ?></p>
                                                    <p><?php echo e($post->category->name); ?></p>
                                                </figcaption>
                                                <?php if($post->photo): ?>
                                                    <img src="<?php echo e(url($post->photo->path)); ?>" alt="<?php echo e($post->title); ?>">
                                                <?php endif; ?>
                                                <section class="description">
                                                    <p><?php echo str_limit(strip_tags($post->body), $limit = 300, $end = '...'); ?></p>
                                                </section>
                                                <footer>
                                                    <a href="<?php echo e(route('front-blog-show', $post->slug)); ?>"
                                                       class="btn btn-secondary float-left ml-4 mb-4"><i
                                                                class="fa fa-angle-right ml-2"></i>&#1575;&#1583;&#1575;&#1605;&#1607;</a>
                                                </footer>
                                            </figure>
                                        </a>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <input type="hidden" value="<?php echo e($cat->id); ?>" class="id-post">
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

                                        <?php echo e(Form::hidden('page_name_display', '&#1583;&#1587;&#1578;&#1607; &#1576;&#1606;&#1583;&#1740; ' . $cat->name)); ?>

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


                $.each($('.category-child'), function (index, value) {
                    console.log($('.id-post').val(), $(value).attr('id'));
                    if ($(value).attr('id') == $('.id-post').val()) {
                        console.log($(value));
                        $(value).children('a').css('font-weight', 'bold');
                        $(value).children('a').css('color', '#e91e63');
                        $.each($(value).parents('.drop-c'), function (key, val) {
                            $(val).css('display', 'block')
                        });
                    }
                });

            });
        </script>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>