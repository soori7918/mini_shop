<?php $__env->startComponent('layouts.front'); ?>
    <?php $__env->slot('title'); ?> <?php if($post->title): ?> <?php echo e($post->title); ?> <?php endif; ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('meta'); ?>
        <?php if($post->keywords): ?>
            <meta http-equiv="keywords" name="keywords" content="<?php echo e($post->keywords); ?>"/>
        <?php endif; ?>
        <?php if($post->description): ?>
            <meta http-equiv="description" name="description" content="<?php echo e($post->description); ?>"/>
        <?php endif; ?>

        <meta property="og:title" content="<?php echo e($post->title); ?>"/>
        <meta property="og:type" content="Blog"/>
        <meta property="og:url" content="<?php echo e(route('front-blog-show',$post->slug)); ?>"/>
        <meta property="og:image" content="<?php echo e(url($post->slider)); ?>"/>
        <meta property="og:site_name" content="<?php echo e($setting->title); ?>"/>
        <meta property="og:locale" content="fa_ir"/>
        <?php if($post->description): ?>
            <meta property="og:description" content="<?php echo e($post->description); ?>"/>
        <?php endif; ?>
    <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <style>
            .footer:before {
                background-color: #f8f8f8;
            }

            .title h6 {
                margin-bottom: 0;
            }

            .newslater form a {
                left: .8rem;
                margin-top: -3.01rem;
            }

            h4 {
                font-size: 18px;
            }

            h1, h2, h3 {
                font-size: 24px
            }

            @media (max-width: 500px) {
                img {
                    height: auto !important;
                }
            }

            .post-mobile-show {
                display: none;
            }

            @media (max-width: 800px) {
                .post-mobile-show {
                    display: block !important;
                }

                .mobile-post-hidden {
                    display: none !important;
                }
            }
        </style>
        <header class="sub-header"
                style="background:url(<?php if(isset($post->slider)): ?> <?php echo e(url($post->slider)); ?>) <?php endif; ?> center no-repeat;background-size:cover;">
            <div class="container">
                <div class="sub-logo">
                    <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('img/logo.svg')); ?>"
                                                  alt="&#1608;&#1740;&#1604;&#1705;&#1587;&#1585;"></a>
                </div>
                <div class="header-title">
                    <h1></h1>
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

                                    <?php echo e(Form::hidden('page_name_display', '&#1606;&#1608;&#1588;&#1578;&#1607; &#1740; ' . $post->title)); ?>

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
                                        &#1608;
                                        &#1662;&#1740;&#1575;&#1605; &#1607;&#1575;&#1740; &#1605;&#1607;&#1605; &#1585;&#1575;
                                        &#1575;&#1586; &#1591;&#1585;&#1740;&#1602; &#1662;&#1740;&#1575;&#1605;&#1705;
                                        &#1583;&#1585;&#1740;&#1575;&#1601;&#1578; &#1606;&#1605;&#1575;&#1740;&#1740;&#1583;.
                                        &#1606;&#1575;&#1605;&#1607; &#1607;&#1575;&#1740; &#1575;&#1740;&#1605;&#1740;&#1604;&#1740;
                                        &#1605;&#1575; &#1605;&#1705;&#1575;&#1606; &#1582;&#1608;&#1576;&#1740; &#1576;&#1585;&#1575;&#1740;
                                        &#1583;&#1585;&#1740;&#1575;&#1601;&#1578; &#1575;&#1591;&#1604;&#1575;&#1593;&#1575;&#1578;&#1548;
                                        &#1575;&#1604;&#1607;&#1575;&#1605; &#1576;&#1582;&#1588;&#1740; &#1607;&#1575;&#1740;
                                        &#1587;&#1601;&#1585; &#1608; &#1705;&#1587;&#1576; &#1575;&#1591;&#1604;&#1575;&#1593;&#1575;&#1578;
                                        &#1576;&#1740;&#1588;&#1578;&#1585; &#1587;&#1601;&#1585;&#1740; &#1576;&#1585;&#1575;&#1740;
                                        &#1593;&#1575;&#1588;&#1602;&#1575;&#1606; &#1587;&#1601;&#1585; &#1608;
                                        &#1583;&#1608;&#1587; &#1583;&#1575;&#1585;&#1575;&#1606; &#1575;&#1602;&#1575;&#1605;&#1578;
                                        &#1583;&#1585; &#1608;&#1740;&#1604;&#1575; &#1607;&#1575;&#1740; &#1582;&#1589;&#1608;&#1589;&#1740;
                                        &#1575;&#1587;&#1578; &#1607;&#1605;&#1670;&#1606;&#1740;&#1606; &#1588;&#1605;&#1575;
                                        &#1575;&#1586; &#1575;&#1740;&#1606; &#1591;&#1585;&#1740;&#1602; &#1583;&#1587;&#1578;&#1585;&#1587;&#1740;
                                        &#1576;&#1607; &#1570;&#1582;&#1585;&#1740;&#1606; &#1711;&#1588;&#1578;
                                        &#1607;&#1575;&#1740; &#1578;&#1601;&#1585;&#1740;&#1581;&#1740; &#1605;&#1575;
                                        &#1583;&#1585; &#1605;&#1602;&#1575;&#1589;&#1583; &#1605;&#1582;&#1578;&#1604;&#1601;
                                        &#1606;&#1740;&#1586; &#1662;&#1740;&#1583;&#1575; &#1605;&#1740; &#1705;&#1606;&#1740;&#1583;.</p>
                                </div>
                                <div class="post-sidebar mb-4">
                                    <h4>&#1605;&#1608;&#1590;&#1608;&#1593;&#1575;&#1578; &#1608;&#1576;&#1604;&#1575;&#1711;</h4>
                                    <ul id="0">
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
                                                                <ul class="ul_set">
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


                                                                        <li class="category-child"
                                                                            id="<?php echo e($category->id); ?>">
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
                                <div class="col-md-12 mb-4">
                                    <figure class="post">
                                        <section class="post-date text-center">
                                            <p><?php echo e(my_jdate($post->updated_at, 'd F Y')); ?></p>
                                        </section>
                                        <figcaption class="post-title text-center">
                                            <h1 style="font-size: 24px"><?php echo e($post->title); ?></h1>
                                            <p>&#1578;&#1608;&#1587;&#1591;
                                                : <?php echo e($post->author->first_name . ' ' .$post->author->last_name); ?></p>
                                            <p><?php echo e($post->category->name); ?></p>
                                        </figcaption>
                                        <section class="description">
                                            <?php echo html_entity_decode($post->body); ?>

                                        </section>
                                        <footer>
                                            <div class="item-stars">
                                                &#1575;&#1605;&#1578;&#1740;&#1575;&#1586;
                                                : <?php echo e(rank($rank, '&#1576;&#1583;&#1608;&#1606; &#1575;&#1605;&#1578;&#1740;&#1575;&#1586;')); ?>

                                            </div>
                                        </footer>
                                    </figure>
                                </div>
                                <div class="col-md-12">
                                    <div class="title mt-5 text-right">
                                        <h4>&#1606;&#1592;&#1585;&#1575;&#1578;</h4>
                                    </div>
                                    <span class="line-dot float-right w-100"></span>
                                    <button class="btn btn-info btn-comment-toggle">&#1606;&#1592;&#1585; &#1582;&#1608;&#1583;
                                        &#1585;&#1575; &#1579;&#1576;&#1578; &#1705;&#1606;&#1740;&#1583;
                                    </button>
                                    <div class="comment-send div-comment-toggle mt-2" style="display: none">
                                        <h6 class="text-grey-400 mb-3"><i
                                                    class="nc-icon ui-2_chat-round ml-2 mtp-1"></i>&#1575;&#1585;&#1587;&#1575;&#1604;
                                            &#1606;&#1592;&#1585;</h6>
                                        <?php echo e(Form::open(array('route' => 'post-comment-store', 'method' => 'PUT'))); ?>

                                        <?php echo e(Form::hidden('post_id', $post->id)); ?>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="float-left" style="margin-top:-30px">
                                                    <fieldset class="rating float-left">
                                                        <input type="radio" id="star5" name="rank" value="5"/><label
                                                                class="full" for="star5" data-toggle="tooltip"
                                                                title="&#1593;&#1575;&#1604;&#1740; - 5 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                                        <input type="radio" id="star4half" name="rank"
                                                               value="4.5"/><label class="half" for="star4half"
                                                                                   data-toggle="tooltip"
                                                                                   title="&#1582;&#1740;&#1604;&#1740; &#1582;&#1608;&#1576; - 4.5 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                                        <input type="radio" id="star4" name="rank" value="4"/><label
                                                                class="full" for="star4" data-toggle="tooltip"
                                                                title="&#1582;&#1740;&#1604;&#1740; &#1582;&#1608;&#1576; - 4 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                                        <input type="radio" id="star3half" name="rank"
                                                               value="3.5"/><label class="half" for="star3half"
                                                                                   data-toggle="tooltip"
                                                                                   title="&#1582;&#1608;&#1576; - 3.5 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                                        <input type="radio" id="star3" name="rank" value="3"/><label
                                                                class="full" for="star3" data-toggle="tooltip"
                                                                title="&#1582;&#1608;&#1576; - 3 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                                        <input type="radio" id="star2half" name="rank"
                                                               value="2.5"/><label class="half" for="star2half"
                                                                                   data-toggle="tooltip"
                                                                                   title="&#1605;&#1578;&#1608;&#1587;&#1591; - 2.5 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                                        <input type="radio" id="star2" name="rank" value="2"/><label
                                                                class="full" for="star2" data-toggle="tooltip"
                                                                title="&#1605;&#1578;&#1608;&#1587;&#1591; - 2 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                                        <input type="radio" id="star1half" name="rank"
                                                               value="1.5"/><label class="half" for="star1half"
                                                                                   data-toggle="tooltip"
                                                                                   title="&#1576;&#1583; - 1.5 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                                        <input type="radio" id="star1" name="rank" value="1"/><label
                                                                class="full" for="star1" data-toggle="tooltip"
                                                                title="&#1576;&#1583; - 1 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                                        <input type="radio" id="starhalf" name="rank"
                                                               value="0.5"/><label class="half" for="starhalf"
                                                                                   data-toggle="tooltip"
                                                                                   title="&#1582;&#1740;&#1604;&#1740; &#1576;&#1583; - 0.5 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                                    </fieldset>
                                                    <span class="float-left ml-2"> &#1575;&#1605;&#1578;&#1740;&#1575;&#1586; &#1576;&#1607; <?php echo e($post->title); ?></span>
                                                </div>
                                                <?php echo e(Form::textarea('body', '', array('placeholder' => '&#1605;&#1578;&#1606; &#1605;&#1608;&#1585;&#1583; &#1606;&#1592;&#1585; &#1585;&#1575; &#1608;&#1575;&#1585;&#1583; &#1705;&#1606;&#1740;&#1583;..', 'class' => 'form-control col'))); ?>

                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="name"><i class="nc-icon users_single-02 ml-2 mtp-1"></i>&#1606;&#1575;&#1605;
                                                    &#1588;&#1605;&#1575;</label>
                                                <?php if(auth()->guard()->check()): ?>
                                                    <?php echo e(Form::text('name', Auth::user()->first_name .' '. Auth::user()->last_name, array('class' => 'form-control col', 'readonly'))); ?>

                                                <?php endif; ?>
                                                <?php if(auth()->guard()->guest()): ?>
                                                    <?php echo e(Form::text('name', '', array('class' => 'form-control col'))); ?>

                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="email"><i class="nc-icon ui-1_email-85 ml-2 mtp-1"></i>&#1575;&#1740;&#1605;&#1740;&#1604;
                                                    &#1588;&#1605;&#1575;</label>
                                                <?php if(auth()->guard()->check()): ?>
                                                    <?php echo e(Form::email('email', Auth::user()->email, array('class' => 'form-control col', 'required', 'readonly'))); ?>

                                                <?php endif; ?>
                                                <?php if(auth()->guard()->guest()): ?>
                                                    <?php echo e(Form::email('email', '', array('class' => 'form-control col', 'required'))); ?>

                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <div class="g-recaptcha"
                                                     data-sitekey="6Lf7xE8UAAAAABkIxNqkox5E5QxoBvQVRltsbjJX"></div>
                                            </div>
                                        </div>
                                        <?php echo e(Form::button('<i class="fa fa-circle-o ml-1"></i>&#1575;&#1585;&#1587;&#1575;&#1604;', array('type' => 'submit', 'id' => 'submit-btn', 'class' => 'btn btn-rounded btn-success float-right mt-4'))); ?>

                                        <?php echo e(Form::close()); ?>

                                    </div>
                                </div>
                                <?php if(count($comments) > 0): ?>
                                    <div class="col-md-12">
                                        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $user = (object)unserialize($comment->creator);?>
                                            <div id="<?php echo e($comment->id); ?>" class="comment-send mt-4">
                                                <header class="comment-header">
                                                    <div class="float-right"><a
                                                                href="#<?php echo e($comment->id); ?>">#<?php echo e($comment->id); ?></a> |
                                                        &#1578;&#1608;&#1587;&#1591;
                                                        : <?php echo e($user->name); ?> <?php echo e(rank($comment->rank, '')); ?></div>
                                                    <div class="float-left">&#1578;&#1608;&#1587;&#1591;
                                                        : <?php echo e(my_jdate($comment->updated_at, 'd F Y')); ?></div>
                                                </header>
                                                <p><?php echo e($comment->body); ?></p>
                                                <footer class="comment-footer">
                                                    <div class="float-left">
                                                        <button class="btn btn-default answer"
                                                                data-id="<?php echo e($comment->id); ?>"
                                                                data-name="<?php echo e($user->name); ?>" data-toggle="modal"
                                                                data-target="#answer"><i
                                                                    class="fa fa-circle-o ml-1"></i>&#1662;&#1575;&#1587;&#1582;
                                                        </button>
                                                    </div>
                                                </footer>
                                                <?php echo $__env->make('blog.each', $comment, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <div class="mt-4">
                                        <?php echo e($comments->links()); ?>

                                    </div>
                                <?php endif; ?>


                                <div class="col-sm-12">
                                    <div class="post-sidebar newslater mt-4 post-mobile-show">
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


                                <div class="col-md-12">
                                    <div class="title mt-4 text-right">
                                        <h4>&#1605;&#1591;&#1575;&#1604;&#1576; &#1605;&#1585;&#1578;&#1576;&#1591;</h4>
                                    </div>
                                    <span class="line-dot float-right w-100"></span>
                                    <div class="float-right w-100">
                                        <?php if(count($posts) > 0): ?>
                                            <div class="row">
                                                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="<?php echo e(route('front-blog-show', $post->slug)); ?>"
                                                       class="col-md-4">
                                                        <figure class="box-article">
                                                            <?php if(isset($post->photo->path)): ?>
                                                                <img src="<?php echo e(url($post->photo->path)); ?>"
                                                                     alt="<?php echo e($post->title); ?>">
                                                            <?php endif; ?>
                                                            <figcaption class="box-article-title">
                                                                <h5><?php echo e($post->title); ?></h5>
                                                            </figcaption>
                                                        </figure>
                                                    </a>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        <?php else: ?>
                                            <p>&#1606;&#1608;&#1588;&#1578;&#1607; &#1575;&#1740; &#1608;&#1580;&#1608;&#1583;
                                                &#1606;&#1583;&#1575;&#1585;&#1583;.</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="modal fade" id="answer" tabindex="-1" role="dialog" aria-labelledby="answerLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="answerLabel">&#1662;&#1575;&#1587;&#1582; &#1576;&#1607; <span
                                    id="name-c"></span></h4>
                    </div>
                    <div class="modal-body">
                        <?php echo e(Form::open(array('route' => 'post-comment-store', 'method' => 'PUT'))); ?>

                        <?php echo e(Form::hidden('post_id', $post->id)); ?>

                        <?php echo e(Form::hidden('parent_id', '', array('id' => 'parent_id'))); ?>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <fieldset class="rating float-left" style="margin-top:-30px">
                                    <input type="radio" id="sub_star5" name="rank" value="5"/><label class="full"
                                                                                                     for="sub_star5"
                                                                                                     data-toggle="tooltip"
                                                                                                     title="&#1593;&#1575;&#1604;&#1740; - 5 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                    <input type="radio" id="sub_star4half" name="rank" value="4.5"/><label class="half"
                                                                                                           for="sub_star4half"
                                                                                                           data-toggle="tooltip"
                                                                                                           title="&#1582;&#1740;&#1604;&#1740; &#1582;&#1608;&#1576; - 4.5 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                    <input type="radio" id="sub_star4" name="rank" value="4"/><label class="full"
                                                                                                     for="sub_star4"
                                                                                                     data-toggle="tooltip"
                                                                                                     title="&#1582;&#1740;&#1604;&#1740; &#1582;&#1608;&#1576; - 4 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                    <input type="radio" id="sub_star3half" name="rank" value="3.5"/><label class="half"
                                                                                                           for="sub_star3half"
                                                                                                           data-toggle="tooltip"
                                                                                                           title="&#1582;&#1608;&#1576; - 3.5 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                    <input type="radio" id="sub_star3" name="rank" value="3"/><label class="full"
                                                                                                     for="sub_star3"
                                                                                                     data-toggle="tooltip"
                                                                                                     title="&#1582;&#1608;&#1576; - 3 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                    <input type="radio" id="sub_star2half" name="rank" value="2.5"/><label class="half"
                                                                                                           for="sub_star2half"
                                                                                                           data-toggle="tooltip"
                                                                                                           title="&#1605;&#1578;&#1608;&#1587;&#1591; - 2.5 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                    <input type="radio" id="sub_star2" name="rank" value="2"/><label class="full"
                                                                                                     for="sub_star2"
                                                                                                     data-toggle="tooltip"
                                                                                                     title="&#1605;&#1578;&#1608;&#1587;&#1591; - 2 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                    <input type="radio" id="sub_star1half" name="rank" value="1.5"/><label class="half"
                                                                                                           for="sub_star1half"
                                                                                                           data-toggle="tooltip"
                                                                                                           title="&#1576;&#1583; - 1.5 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                    <input type="radio" id="sub_star1" name="rank" value="1"/><label class="full"
                                                                                                     for="sub_star1"
                                                                                                     data-toggle="tooltip"
                                                                                                     title="&#1576;&#1583; - 1 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                    <input type="radio" id="sub_starhalf" name="rank" value="0.5"/><label class="half"
                                                                                                          for="sub_starhalf"
                                                                                                          data-toggle="tooltip"
                                                                                                          title="&#1582;&#1740;&#1604;&#1740; &#1576;&#1583; - 0.5 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                </fieldset>
                                <?php echo e(Form::textarea('body', '', array('placeholder' => '&#1605;&#1578;&#1606; &#1605;&#1608;&#1585;&#1583; &#1606;&#1592;&#1585; &#1585;&#1575; &#1608;&#1575;&#1585;&#1583; &#1705;&#1606;&#1740;&#1583;..', 'class' => 'form-control col'))); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <label for="name"><i class="nc-icon users_single-02 ml-2 mtp-1"></i>&#1606;&#1575;&#1605;
                                    &#1588;&#1605;&#1575;</label>
                                <?php if(auth()->guard()->check()): ?>
                                    <?php echo e(Form::text('name', Auth::user()->first_name .' '. Auth::user()->last_name, array('class' => 'form-control col', 'readonly'))); ?>

                                <?php endif; ?>
                                <?php if(auth()->guard()->guest()): ?>
                                    <?php echo e(Form::text('name', '', array('class' => 'form-control col'))); ?>

                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email"><i class="nc-icon ui-1_email-85 ml-2 mtp-1"></i>&#1575;&#1740;&#1605;&#1740;&#1604;
                                    &#1588;&#1605;&#1575;</label>
                                <?php if(auth()->guard()->check()): ?>
                                    <?php echo e(Form::email('email', Auth::user()->email, array('class' => 'form-control col', 'required', 'readonly'))); ?>

                                <?php endif; ?>
                                <?php if(auth()->guard()->guest()): ?>
                                    <?php echo e(Form::email('email', '', array('class' => 'form-control col', 'required'))); ?>

                                <?php endif; ?>
                            </div>
                        </div>
                        <?php echo e(Form::button('<i class="fa fa-circle-o ml-1"></i>&#1575;&#1601;&#1586;&#1608;&#1583;&#1606;', array('type' => 'submit', 'class' => 'btn btn-rounded btn-success float-left mt-4'))); ?>

                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" value="<?php echo e($post->category->id); ?>" class="id-post">
    <?php $__env->endSlot(); ?>

    <?php $__env->startPush('scripts'); ?>
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
                    if ($(value).attr('id') == $('.id-post').val()) {
                        $(value).children('a').css('font-weight', 'bold');
                        $(value).children('a').css('color', '#e91e63');
                        $.each($(value).parents('.drop-c'), function (key, val) {
                            $(val).css('display', 'block')
                        });
                    }
                });


            });


        </script>

        <script src="https://www.google.com/recaptcha/api.js"></script>
        <script type="text/javascript">
            $('.answer').click(function () {
                var id = $(this).data('id');
                var name = $(this).data('name');
                $('#name-c').text(name);
                $('#parent_id').val(id);
            });
            $('.btn-comment-toggle').click(function () {
                $('.div-comment-toggle').slideToggle();
            });


            $('#submit-btn').click(function () {
                var $captcha = $('#recaptcha'),
                    response = grecaptcha.getResponse();

                if (response.length === 0) {
                    alert('reCAPTCHA is mandatory');
                    if (!$captcha.hasClass("error")) {
                        $captcha.addClass("error");
                    }
                } else {
                    $captcha.removeClass("error");
                    $('#form-validation').submit();
                }
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>