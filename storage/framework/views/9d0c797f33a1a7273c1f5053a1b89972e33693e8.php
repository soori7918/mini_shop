<?php $__env->startComponent('layouts.front'); ?>
    <?php $__env->slot('title'); ?> <?php if($setting->fav_title): ?><?php echo e($setting->fav_title); ?> <?php endif; ?> <?php $__env->endSlot(); ?>
    <?php
        $slider = App\Slider::where('page' , 6)->first()
    ?>
    <?php $__env->slot('meta'); ?>
        <?php if($setting->fav_keywords): ?>
            <meta http-equiv="keywords" name="keywords" content="<?php echo e($setting->fav_keywords); ?>"/>
        <?php endif; ?>
        <?php if($setting->fav_description): ?>
            <meta http-equiv="description" name="description" content="<?php echo e($setting->fav_description); ?>"/>
        <?php endif; ?>

        <meta property="og:title" content="<?php echo e($setting->fav_title); ?>"/>
        <meta property="og:type" content="Villa"/>
        <meta property="og:url" content="<?php echo e(route('front-favorites-list')); ?>"/>
        <meta property="og:image" content="<?php echo e(url($slider->photo->path)); ?>"/>
        <meta property="og:site_name" content="<?php echo e($setting->title); ?>"/>
        <meta property="og:locale" content="fa_ir"/>
        <?php if($setting->fav_description): ?>
            <meta property="og:description" content="<?php echo e($setting->fav_description); ?>"/>
        <?php endif; ?>
    <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <style>
            .header-title h1 {
                color: white;
                font-size: 32px;
                font-weight: bold;
                text-shadow: 0px 0px 10px rgb(0, 0, 0);
            }
        </style>
        <header class="sub-header"
                style="background: url(<?php echo e(url($slider->photo->path)); ?>) center no-repeat;background-size:cover;">
            <div class="container">

                <div class="sub-logo">
                    <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('img/logo.svg')); ?>"
                                                  alt="&#1608;&#1740;&#1604;&#1705;&#1587;&#1585;"></a>
                </div>
                <div class="header-title">
                    <h1><?php echo e($slider->title); ?></h1>
                    <p><?php echo e($slider->shoar); ?></p>
                </div>
            </div>
        </header>



        <section class="villas section">
            <div class="container">
                <?php if(auth()->guard()->check()): ?>
                    <div class="dropdown">
                        <a style="color: #e91e63 !important;" href="javascript:void(0)"
                           class="dropdown-toggle"
                           data-toggle="dropdown"><?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->last_name); ?></a>
                        <div class="dropdown-menu" style="text-align: right">
                            <a href="<?php echo e(route('profile-show', Auth::user()->id)); ?>"
                               class="dropdown-item"><i
                                        class="nc-icon users_single-02 mtp-2 ml-2"></i>&#1662;&#1585;&#1608;&#1601;&#1575;&#1740;&#1604;</a>
                            <a href="<?php echo e(route('profile-password', Auth::user()->id)); ?>"
                               class="dropdown-item"><i
                                        class="nc-icon objects_key-25 mtp-2 ml-2"></i>&#1578;&#1594;&#1740;&#1740;&#1585;
                                &#1585;&#1605;&#1586; &#1593;&#1576;&#1608;&#1585;</a>
                            <a href="javascript:void(0)" class="dropdown-item"
                               onclick="$('.logout').submit()">
                                <form action="<?php echo e(route('logout')); ?>" method="POST"
                                      class="logout hidden"><?php echo e(csrf_field()); ?></form>
                                <i class="nc-icon media-1_button-power mtp-2 ml-2"></i>&#1582;&#1585;&#1608;&#1580;
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
                <div style="margin-top: 10px;margin-bottom: 10px">
                    <?php echo $slider->text; ?>

                </div>
                <div class="row">
                    <div class="col-md-4">
                        <aside class="post-sidebars">
                            <div class="post-sidebar mb-4">
                                <h5>&#1575;&#1588;&#1578;&#1585;&#1575;&#1705; &#1711;&#1584;&#1575;&#1585;&#1740;
                                    &#1576;&#1575; &#1583;&#1608;&#1587;&#1578;&#1575;&#1606;</h5>
                                <form role="search" method="post" id="searchform" class="searchform mt-4"
                                      action="<?php echo e(route('share')); ?>">
                                    <div>
                                        <input type="text" name="s" id="s"
                                               placeholder="&#1570;&#1583;&#1585;&#1587; &#1575;&#1740;&#1605;&#1740;&#1604;..."
                                               style="width:195px">
                                        <button type="submit" class="undefined button submit">&#1575;&#1585;&#1587;&#1575;&#1604;</button>
                                    </div>
                                    <?php echo e(csrf_field()); ?>

                                </form>
                            </div>
                            <div class="post-sidebar mb-4">
                                <h5>&#1575;&#1586; &#1605;&#1575; &#1583;&#1585;&#1576;&#1575;&#1585;&#1607; &#1608;&#1740;&#1604;&#1575;&#1740;
                                    &#1605;&#1608;&#1585;&#1583; &#1593;&#1604;&#1575;&#1602;&#1607; &#1740; &#1582;&#1608;&#1583;
                                    &#1576;&#1662;&#1585;&#1587;&#1740;&#1583;</h5>
                                <form action="<?php echo e(route('question-store')); ?>" method="post" id="contact_form"
                                      class="contact-form mt-5">
                                    <div class="row">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-3"><sup>*</sup> نام ویلا
                                            </label>
                                            <input required name="contact[name]" type="text" class="form-control col-9"
                                                   id="inputName">
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-3"> &#1575;&#1740;&#1605;&#1740;&#1604;
                                            </label>
                                            <input required name="contact[email]" type="email"
                                                   value="<?php echo e(Auth::user()->email); ?>"
                                                   class="form-control col-9"
                                                   id="inputEmail" disabled>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPhone" class="col-3"> &#1578;&#1604;&#1601;&#1606;
                                            </label>
                                            <input required name="contact[phone]" type="tel"
                                                   value="<?php echo e(Auth::user()->mobile); ?>" class="form-control col-9"
                                                   id="inputPhone" disabled>
                                        </div>
                                        <div class="form-group row">
                                            <label for="textareaMessage" class="col-3"><sup>*</sup> &#1662;&#1740;&#1575;&#1605;
                                            </label>
                                            <textarea required name="contact[body]" class="form-control col-9" rows="6"
                                                      id="textareaMessage"></textarea>
                                        </div>
                                    </div>
                                    <button class="btn btn-info float-left" type="submit"><i
                                                class="fa fa-angle-right ml-2"></i>&#1575;&#1585;&#1587;&#1575;&#1604;
                                        &#1662;&#1740;&#1575;&#1605;
                                    </button>
                                    <?php echo e(csrf_field()); ?>

                                </form>
                            </div>
                        </aside>
                    </div>
                    <div class="col-md-8">

                        <div class="villa-body mt-0">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <div class="row">
                                        <div class="col-sm-6">

                                            <a class="nav-item nav-link active one-a" id="nav-home-tab"
                                               data-toggle="tab"
                                               href="#nav-villa" role="tab" aria-controls="nav-villa"
                                               aria-selected="true">&#1608;&#1740;&#1604;&#1575;&#1607;&#1575;&#1740;
                                                &#1605;&#1608;&#1585;&#1583; &#1593;&#1604;&#1575;&#1602;&#1607; &#1605;&#1606;</a>

                                        </div>
                                        <div class="col-sm-6">
                                            
                                            
                                            
                                            

                                            <?php if(auth()->guard()->check()): ?>
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                            <?php endif; ?>
                                        </div>
                                    </div>


                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active a-one" id="nav-villa" role="tabpanel"
                                     aria-labelledby="nav-home-tab">
                                    <?php if(count($likes) > 0): ?>
                                        <div class="row">
                                            <?php $__currentLoopData = $likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $like): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-sm-6">
                                                    <?php
                                                        $properties_in = unserialize($like->likable->properties_in);
                                                        $properties_out = unserialize($like->likable->properties_out);
                                                    ?>

                                                    <div class="item">
                                                        <a target="_blank"
                                                           href="<?php echo e(route('front-villa-show', $like->likable->slug)); ?>"
                                                           class="multimedia-box"><span class="image">
                            <?php if(isset($like->likable->gallery->photo[0])): ?>
                                                                    <img src="<?php echo e(url($like->likable->gallery->photo[0]->path)); ?>"
                                                                         height="204"
                                                                         alt="<?php echo e($like->likable->name); ?>"/>
                                                                <?php else: ?>
                                                                    <img src="http://via.placeholder.com/350x150&text=None"
                                                                         alt="<?php echo e($like->likable->name); ?>">
                                                                <?php endif; ?>
                                                                <?php if($like->likable->discount): ?>
                                                                    <span class="discount"><?php echo e(percent($like->likable->price, $like->likable->discount)); ?></span>
                                                                <?php endif; ?>
                            </span>
                                                            <span class="details" style="min-height: 200px;">
                            <ul class="name">
                                <li><strong class="ml-2">&#1606;&#1575;&#1605; &#1608;&#1740;&#1604;&#1575; :</strong>

                                    <?php

                                        echo mb_strimwidth($like->likable->name, 0, 20, "...");

                                    ?>


                                </li>
                                <li><strong class="ml-2">&#1605;&#1581;&#1604; &#1608;&#1740;&#1604;&#1575; :</strong>

                                    <?php
                                        echo mb_strimwidth($like->likable->district, 0, 20, "...");


                                    ?>




                                </li>
                            </ul>
                            <ul class="icons">
                                <li data-toggle="tooltip"
                                    title="&#1578;&#1593;&#1583;&#1575;&#1583; &#1575;&#1578;&#1575;&#1602; <?php echo e($like->likable->number_of_rooms); ?>">
                                        <img src="<?php echo e(asset('img/villas/bedroom.svg')); ?>" width="16" height="16"
                                             alt="&#1578;&#1593;&#1583;&#1575;&#1583; &#1575;&#1578;&#1575;&#1602; <?php echo e($like->likable->number_of_rooms); ?>">
                                         <p><?php echo e($like->likable->number_of_rooms); ?> &#1575;&#1578;&#1575;&#1602;</p>
                                    </li>
                                <?php $__currentLoopData = $properties_in; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(isset(property($property)->name)): ?>
                                        <li data-toggle="tooltip" title="<?php echo e(property($property)->name); ?>">
                                     <?php if(isset(property($property)->photo->path)): ?>
                                                <img src="<?php echo e(url(property($property)->photo->path)); ?>" width="16"
                                                     height="16"
                                                     alt="<?php echo e(property($property)->name); ?>">
                                            <?php endif; ?>

                                            <p><?php echo e(property($property)->name); ?></p>
                                    </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $properties_out; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php if(isset(property($property)->name)): ?>
                                        <li data-toggle="tooltip" title="<?php echo e(property($property)->name); ?>">
                                     <?php if(isset(property($property)->photo->path)): ?>
                                                <img src="<?php echo e(url(property($property)->photo->path)); ?>" width="16"
                                                     height="16"
                                                     alt="<?php echo e(property($property)->name); ?>">
                                            <?php endif; ?>

                                            <p><?php echo e(property($property)->name); ?></p>
                                    </li>
                                    <?php endif; ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <button class="btn btn-info float-left" style="margin-top: 8px;"><i
                                        class="fa fa-angle-right ml-2"></i>&#1605;&#1588;&#1575;&#1607;&#1583;&#1607;</button>
                                                                <?php if($like->likable->discount): ?>
                                                                    <strike><span class="discount-price">
                                                             &#1602;&#1740;&#1605;&#1578; &#1575;&#1586;
                                                    <span class="text-danger-300 m-x2"><span
                                                                class="numberPrice"> <?php echo e($like->likable->price); ?> </span> <?php if($like->likable->price_type == 'rial'): ?>
                                                            &#1585;&#1740;&#1575;
                                                            &#1604; <?php elseif($like->likable->price_type == 'dollar'): ?>
                                                            &#1583;&#1604;&#1575;
                                                            &#1585; <?php elseif($like->likable->price_type == 'euro'): ?>
                                                            &#1740;&#1608;&#1585;&#1608; <?php endif; ?></span>
                                                                     &#1607;&#1585; &#1588;&#1576;
                                                    </span>
                                                </strike><br>


                                                                    <span class="discount-price">
                                                             &#1602;&#1740;&#1605;&#1578; &#1575;&#1586;
                                                    <span class="text-success-300 m-x2"><span
                                                                class="numberPrice"><?php echo e(discount($like->likable->price, $like->likable->discount)); ?> </span> <?php if($like->likable->price_type == 'rial'): ?>
                                                            &#1585;&#1740;&#1575;
                                                            &#1604; <?php elseif($like->likable->price_type == 'dollar'): ?>
                                                            &#1583;&#1604;&#1575;
                                                            &#1585; <?php elseif($like->likable->price_type == 'euro'): ?>
                                                            &#1740;&#1608;&#1585;&#1608; <?php endif; ?></span>
                                                             &#1607;&#1585; &#1588;&#1576;
                                        </span>
                                                                <?php else: ?>
                                                                    <span class="discount-price">
                                                             &#1602;&#1740;&#1605;&#1578; &#1575;&#1586;
                                                    <span class="text-success-300 m-x2"><span
                                                                class="numberPrice"><?php echo e($like->likable->price); ?> </span> <?php if($like->likable->price_type == 'rial'): ?>
                                                            &#1585;&#1740;&#1575;
                                                            &#1604; <?php elseif($like->likable->price_type == 'dollar'): ?>
                                                            &#1583;&#1604;&#1575;
                                                            &#1585; <?php elseif($like->likable->price_type == 'euro'): ?>
                                                            &#1740;&#1608;&#1585;&#1608; <?php endif; ?></span>
                                                             &#1607;&#1585; &#1588;&#1576;
                                        </span>
                                        </span>
                                                            <?php endif; ?>
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="tab-pane fade" id="nav-tour" role="tabpanel"
                                     aria-labelledby="nav-profile-tab">
                                    ...
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    <?php $__env->endSlot(); ?>
    <?php $__env->startPush('stylesheets'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/uikit.min.css')); ?>"/>
    <?php $__env->stopPush(); ?>
    <?php $__env->startPush('scripts'); ?>
        <script>
            $(document).ready(function () {
                $('.one-a').click(function () {
                    $('.tab-pane').removeClass('show active');
                    $('.a-one').addClass('show active');

                });
            });
        </script>
        <script type="text/javascript" src="<?php echo e(asset('js/uikit.min.js')); ?>"></script>
        <script type="text/javascript">
            $('.like-icon').click(function (event) {
                var fav = parseInt($('.favourite').text());
                var favp = fav + 1;
                var favm = fav - 1;
                event.preventDefault();
                $(this).toggleClass('active');
                var token = '<?php echo e(csrf_token()); ?>';
                var route = '<?php echo e(route("villa-like")); ?>';
                $.post(route, {_token: token, id: $(this).data('id')}, function (result) {
                    if (result == 1) {
                        $('.favourite').text(favp.toString());
                        $.jGrowl('&#1576;&#1607; &#1593;&#1604;&#1575;&#1602;&#1607; &#1605;&#1606;&#1583;&#1740; &#1607;&#1575; &#1575;&#1590;&#1575;&#1601;&#1607; &#1588;&#1583;.', {
                            life: 3000,
                            position: 'top-right',
                            theme: 'bg-success'
                        });
                    } else if (result == 2) {
                        $('.favourite').text(favm.toString());
                        $.jGrowl('&#1575;&#1586; &#1593;&#1604;&#1575;&#1602;&#1607; &#1605;&#1606;&#1583;&#1740; &#1607;&#1575; &#1581;&#1584;&#1601; &#1588;&#1583;.', {
                            life: 3000,
                            position: 'top-right',
                            theme: 'bg-warning'
                        });
                    } else {
                        $.jGrowl('&#1575;&#1576;&#1578;&#1583;&#1575; &#1608;&#1575;&#1585;&#1583; &#1587;&#1575;&#1740;&#1578; &#1588;&#1608;&#1740;&#1583;!', {
                            life: 3000,
                            position: 'top-right',
                            theme: 'bg-danger'
                        });
                    }
                });
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>