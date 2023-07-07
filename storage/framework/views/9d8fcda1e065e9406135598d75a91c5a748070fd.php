<?php $__env->startComponent('layouts.front'); ?>
    <?php $__env->slot('title'); ?> <?php echo e($setting->title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('meta'); ?>
        <?php if($setting->keywords): ?>
            <meta http-equiv="keywords" name="keywords" content="<?php echo e($setting->keywords); ?>"/>
        <?php endif; ?>
        <?php if($setting->description): ?>
            <meta http-equiv="description" name="description" content="<?php echo e($setting->description); ?>"/>
        <?php endif; ?>
        <meta property="og:title" content="<?php echo e($setting->title); ?>"/>
        <meta property="og:type" content="Villa"/>
        <meta property="og:url" content="<?php echo e(url('/')); ?>"/>
        <meta property="og:image" content="http://villexer.com/source/assets/img/header.jpg"/>

        <meta property="og:site_name" content="<?php echo e($setting->title); ?>"/>
        <meta property="og:locale" content="fa_ir"/>
        <?php if($setting->description): ?>
            <meta property="og:description" content="<?php echo e($setting->description); ?>"/>
        <?php endif; ?>
    <?php $__env->endSlot(); ?>

    <?php $__env->slot('body'); ?>
        <style>
            .img-svg-home {
                width: 86px;
                margin-bottom: 19px;
                background-color: white;
                padding: 18px;
                border-radius: 50%;
                margin-right: 35%;
                margin-top: -16px;
            }

            @media (max-width: 800px) {
                .header-title {
                    margin-top: 0vh !important;
                }

                .header-destination {
                    margin-top: 1rem;
                }

                .section-comment{
                    padding-bottom: 1rem !important;
                }
            }

            @media (max-width: 800px) {
                .container .circle {
                    height: 90px !important;
                    width: 70px;
                    padding: 3px;
                    margin-right: 5px;
                }
            }

            .img-svg-home:hover {
                background-color: black;
            }

            @media (max-width: 800px) {
                .text-justify {
                    padding: 4rem !important;
                }
            }

            @media (max-width: 800px) {
                .index-comment {
                    margin: 0 -65px 0 0;
                }
            }

            h4 {
                padding: 10px;
            }

            h2, h3 {
                font-size: 24px;
            }
        </style>
        <header class="header">
            <div class="container">
                <div class="header-logo" style="margin-top: -152px">
                    <a href="<?php echo e(url('/')); ?>"><img style="width: 135px" src="<?php echo e(asset('img/logo.svg')); ?>"
                                                  alt="logo"/></a>
                </div>
                <div class="header-title" style="margin-top: 24vh">
                    <h1 style="margin-top: 5rem;font-size: 24px"><b>&#1608;&#1740;&#1604;&#1705;&#1587;&#1585; &#1548;
                            &#1578;&#1593;&#1591;&#1740;&#1604;&#1575;&#1578;
                            &#1608;&#1740;&#1604;&#1575;&#1740;&#1740; ...</b>
                    </h1>
                </div>
                <div class="header-destination">
                    <a href="javascript:void(0)" class="btn btn-default">&#1575;&#1606;&#1578;&#1582;&#1575;&#1576;
                        &#1605;&#1602;&#1589;&#1583; &#1608;&#1740;&#1604;&#1575;&#1740;&#1740;</a>
                    <div class="header-destination-menu" data-direction="rtl">
                        <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('front-location-show', $location->url)); ?>" class="dropdown-item"><i
                                        class="nc-icon location_pin ml-2 mtp-1"></i><?php echo e($location->name); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="mouse"><span class="scroll"></span></div>
            </div>
        </header>



        <?php if(Auth::user()): ?>
            <section class="section bg-white" style="border-bottom: 0px;padding: 1rem">

                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="text-center" style="font-weight: bold">
                                <?php echo e(Auth::user()->first_name . ' ' . Auth::user()->last_name); ?> ,
                                &#1608;&#1740;&#1604;&#1585; &#1593;&#1586;&#1740;&#1586; &#1576;&#1607; &#1608;&#1740;&#1604;&#1705;&#1587;&#1585;
                                &#1582;&#1608;&#1588; &#1570;&#1605;&#1583;&#1740;&#1583;
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="section bg-white" style="border-top: 0px;border-bottom: 0px;padding: 1rem">
                <div class="container">
                    <div class="title text-center">
                        <h3>&#1608;&#1740;&#1604;&#1575;&#1607;&#1575;&#1740; &#1605;&#1608;&#1585;&#1583; &#1593;&#1604;&#1575;&#1602;&#1607;
                            &#1588;&#1605;&#1575;</h3>
                    </div>
                    <span class="line-dot"></span>
                    <?php

                    $likes = App\Like::where('user_id', Auth::user()->id)->get();
                    ?>

                    <?php if(count($likes) > 0): ?>
                        <div class="owl-carousel owl-carousel-index">

                            <?php $__currentLoopData = $likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $like): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $properties_in = unserialize($like->likable->properties_in);
                                    $properties_out = unserialize($like->likable->properties_out);
                                ?>

                                <div class="item">
                                    <a target="_blank" href="<?php echo e(route('front-villa-show', $like->likable->slug)); ?>"
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
                                <li><strong class="ml-2">&#1606;&#1575;&#1605; &#1608;&#1740;&#1604;&#1575; :</strong><?php echo e($like->likable->name); ?></li>
                                <li><strong class="ml-2">&#1605;&#1581;&#1604; &#1608;&#1740;&#1604;&#1575; :</strong><?php echo e($like->likable->district); ?></li>
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
                                                        برای هر نفر / هر شب
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
                                                        برای هر نفر / هر شب
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
                                                        برای هر نفر / هر شب
                                        </span>
                                        </span>
                                        <?php endif; ?>
                                    </a>
                                </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <style>
                            .btn-info-2 {
                                background-color: white !important;
                                border: 1px solid black !important;
                                color: black !important;
                                box-shadow: 0px 0px 0px 0px !important;
                                margin-top: -21px;
                            }
                        </style>

                        <div class="col-sm-12 text-center">
                            <a href="<?php echo e(route('front-favorites-list')); ?>" class="btn btn-info btn-info-2" type="button">&#1605;&#1588;&#1575;&#1607;&#1583;&#1607;
                                &#1576;&#1740;&#1588;&#1578;&#1585;</a>

                        </div>





                    <?php else: ?>


                        <p>&#1605;&#1581;&#1578;&#1608;&#1575;&#1740;&#1740; &#1740;&#1575;&#1601;&#1578; &#1606;&#1588;&#1583;</p>


                    <?php endif; ?>
                </div>
            </section>
            
        <?php endif; ?>




        <?php if(count($recently) > 0): ?>
            <section class="section bg-white">
                <div class="container">
                    <div class="title text-center">
                        <h3>&#1608;&#1740;&#1604;&#1575;&#1607;&#1575;&#1740;&#1740; &#1705;&#1607; &#1602;&#1576;&#1604;&#1575;
                            &#1583;&#1740;&#1583;&#1607; &#1575;&#1740;&#1583;</h3>
                    </div>

                    <span class="line-dot"></span>
                    <?php if(count($recently) > 0): ?>
                        <div class="owl-carousel owl-carousel-index">
                            <?php $__currentLoopData = $recently; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $villa = App\Villa::where('id' , $val->villa_id)->first();
                                ?>

                                <?php if(count($villa) == 1): ?>
                                    <?php
                                        $properties_in = unserialize($villa->properties_in);
                                        $properties_out = unserialize($villa->properties_out);
                                    ?>
                                    <div class="item">
                                        <a target="_blank" href="<?php echo e(route('front-villa-show', $villa->slug)); ?>"
                                           class="multimedia-box">
        <span class="image">
        <?php if(isset($villa->gallery->photo[0])): ?>
                <img src="<?php echo e(url($villa->gallery->photo[0]->path)); ?>" height="204"
                     alt="<?php echo e($villa->name); ?>"/>
            <?php else: ?>
                <img src="http://via.placeholder.com/350x150&text=None" alt="<?php echo e($villa->name); ?>">
            <?php endif; ?>
            <?php if($villa->discount): ?>
                <span class="discount"><?php echo e(percent($villa->price, $villa->discount)); ?></span>
            <?php endif; ?>





            <?php if(Auth::user()): ?>
                <?php
                    $like = App\Like::where('likable_type' , 'App\Villa')->where('likable_id' , $villa->id)->where('user_id' , Auth::user()->id)->first();
                ?>
            <?php else: ?>
                <?php
                    $like = null
                ?>
            <?php endif; ?>


            <span class="like-icon <?php if(!is_null($like)): ?> active <?php endif; ?>"
                  <?php if(auth()->guard()->check()): ?> data-id="<?php echo e($villa->id); ?>" <?php endif; ?>><i
                        class="nc-icon ui-2_favourite-28"></i></span>
        </span>
                                            <span class="details" style="min-height: 200px;">
        <ul class="name">
        <li><strong class="ml-2">&#1606;&#1575;&#1605; &#1608;&#1740;&#1604;&#1575; :</strong><?php echo e($villa->name); ?></li>
        <li><strong class="ml-2">&#1605;&#1581;&#1604; &#1608;&#1740;&#1604;&#1575; :</strong><?php echo e($villa->district); ?></li>
        </ul>
        <ul class="icons">
        <li data-toggle="tooltip"
            title="&#1578;&#1593;&#1583;&#1575;&#1583; &#1575;&#1578;&#1575;&#1602; <?php echo e($villa->number_of_rooms); ?>">
        <img src="<?php echo e(asset('img/villas/bedroom.svg')); ?>" width="16" height="16"
             alt="&#1578;&#1593;&#1583;&#1575;&#1583; &#1575;&#1578;&#1575;&#1602; <?php echo e($villa->number_of_rooms); ?>">
        <p><?php echo e($villa->number_of_rooms); ?> &#1575;&#1578;&#1575;&#1602;</p>
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
                                                <?php if($villa->discount): ?>

                                                    <strike><span class="discount-price">
        &#1602;&#1740;&#1605;&#1578; &#1575;&#1586;
        <span class="text-danger-300 m-x2"><span
                    class="numberPrice"><?php echo e($villa->price); ?> </span> <?php if($villa->price_type == 'rial'): ?>
                &#1585;&#1740;&#1575;
                &#1604; <?php elseif($villa->price_type == 'dollar'): ?>
                &#1583;&#1604;&#1575;
                &#1585; <?php elseif($villa->price_type == 'euro'): ?>
                &#1740;&#1608;&#1585;&#1608; <?php endif; ?></span>
                                                        برای هر نفر / هر شب
        </span></strike><br>

                                                    <span class="discount-price">
        &#1602;&#1740;&#1605;&#1578; &#1575;&#1586;
        <span class="text-success-300 m-x2"><span
                    class="numberPrice"><?php echo e(discount($villa->price, $villa->discount)); ?> </span> <?php if($villa->price_type == 'rial'): ?>
                &#1585;&#1740;&#1575;&#1604; <?php elseif($villa->price_type == 'dollar'): ?>
                &#1583;&#1604;&#1575;&#1585; <?php elseif($villa->price_type == 'euro'): ?>
                &#1740;&#1608;&#1585;&#1608; <?php endif; ?></span>
                                                        برای هر نفر / هر شب
        </span>
                                                <?php else: ?>
                                                    <span class="discount-price">
        &#1602;&#1740;&#1605;&#1578; &#1575;&#1586;
        <span class="text-success-300 m-x2"><span
                    class="numberPrice"><?php echo e($villa->price); ?> </span> <?php if($villa->price_type == 'rial'): ?>
                &#1585;&#1740;&#1575;&#1604; <?php elseif($villa->price_type == 'dollar'): ?>
                &#1583;&#1604;&#1575;&#1585; <?php elseif($villa->price_type == 'euro'): ?>
                &#1740;&#1608;&#1585;&#1608; <?php endif; ?></span>
                                                        برای هر نفر / هر شب
        </span>
        </span>
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        
                        
                        
                    <?php else: ?>
                        <p>&#1605;&#1581;&#1578;&#1608;&#1575;&#1740;&#1740; &#1740;&#1575;&#1601;&#1578; &#1606;&#1588;&#1583;</p>
                    <?php endif; ?>
                </div>
            </section>

        <?php endif; ?>






        <section class="information section text-center">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-3">
                        <i class="flaticon-layers"></i>
                        <h4 style="font-size: 16px">&#1605;&#1606;&#1581;&#1589;&#1585; &#1576;&#1607; &#1601;&#1585;&#1583;</h4>
                        <p>&#1582;&#1583;&#1605;&#1575;&#1578;&#1740; &#1601;&#1585;&#1575;&#1578;&#1585; &#1575;&#1586;
                            &#1570;&#1606;&#1670;&#1607; &#1578;&#1575; &#1705;&#1606;&#1608;&#1606; &#1583;&#1575;&#1588;&#1578;&#1607;
                            &#1575;&#1740;&#1583;&#1548; &#1576;&#1607; &#1587;&#1576;&#1705; &#1582;&#1575;&#1589;
                            &#1608; &#1576;&#1585;&#1575;&#1740; &#1575;&#1740;&#1580;&#1575;&#1583; &#1576;&#1607;&#1578;&#1585;&#1740;&#1606;
                            &#1588;&#1585;&#1575;&#1740;&#1591; &#1576;&#1585;&#1575;&#1740; &#1588;&#1605;&#1575;
                            &#1583;&#1585; &#1587;&#1601;&#1585;
                            &#1607;&#1605;&#1607; &#1608; &#1607;&#1605;&#1607; &#1606;&#1705;&#1575;&#1578;&#1740;
                            &#1575;&#1587;&#1578; &#1705;&#1607; &#1605;&#1575; &#1576;&#1607; &#1570;&#1606; &#1662;&#1575;&#1740;&#1576;&#1606;&#1583;&#1740;&#1605;
                            &#1608; &#1576;&#1585;&#1575;&#1740; &#1588;&#1605;&#1575; &#1601;&#1585;&#1575;&#1607;&#1605;
                            &#1705;&#1585;&#1583;&#1607; &#1575;&#1740;&#1605;.</p>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <i class="flaticon-users"></i>
                        <h4 style="font-size: 16px">&#1575;&#1606;&#1578;&#1582;&#1575;&#1576; &#1576;&#1575; &#1588;&#1605;&#1575;</h4>
                        <p>&#1586;&#1605;&#1575;&#1606; &#1587;&#1601;&#1585; &#1588;&#1605;&#1575; &#1575;&#1585;&#1586;&#1588;&#1605;&#1606;&#1583;
                            &#1575;&#1587;&#1578;&#1548; &#1576;&#1607; &#1607;&#1605;&#1740;&#1606; &#1582;&#1575;&#1591;&#1585;
                            &#1605;&#1575; &#1576;&#1607;&#1585;&#1740;&#1606; &#1608;&#1740;&#1604;&#1575; &#1607;&#1575;
                            &#1585;&#1575; &#1583;&#1585; &#1580;&#1584;&#1575;&#1576; &#1578;&#1585;&#1740;&#1606;
                            &#1605;&#1602;&#1575;&#1589;&#1583; &#1575;&#1586; &#1607;&#1585; &#1606;&#1592;&#1585;
                            &#1575;&#1606;&#1578;&#1582;&#1575;&#1576; &#1705;&#1585;&#1583;&#1607; &#1575;&#1740;&#1605;
                            &#1608; &#1588;&#1605;&#1575; &#1605;&#1740; &#1578;&#1608;&#1575;&#1606;&#1740;&#1583;
                            &#1570;&#1606; &#1670;&#1740;&#1586;&#1740; &#1705;&#1607; &#1605;&#1583; &#1606;&#1592;&#1585;
                            &#1583;&#1575;&#1585;&#1740;&#1583; &#1585;&#1575; &#1575;&#1606;&#1578;&#1582;&#1575;&#1576;
                            &#1606;&#1605;&#1575;&#1740;&#1740;&#1583;.</p>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <i class="flaticon-clipboard"></i>
                        <h4 style="font-size: 16px">&#1711;&#1575;&#1585;&#1575;&#1606;&#1578;&#1740; &#1602;&#1740;&#1605;&#1578;</h4>
                        <p>&#1578;&#1608;&#1575;&#1606;&#1587;&#1578;&#1607; &#1575;&#1740;&#1605; &#1576;&#1607;&#1578;&#1585;&#1740;&#1606;
                            &#1608;&#1740;&#1604;&#1575; &#1607;&#1575;&#1740; &#1605;&#1605;&#1705;&#1606; &#1583;&#1585;
                            &#1605;&#1602;&#1575;&#1589;&#1583; &#1605;&#1582;&#1578;&#1604;&#1601; &#1585;&#1575;
                            &#1576;&#1575; &#1578;&#1608;&#1580;&#1607; &#1576;&#1607; &#1593;&#1604;&#1575;&#1740;&#1602;
                            &#1605;&#1587;&#1575;&#1601;&#1585;&#1740;&#1606; &#1575;&#1740;&#1585;&#1575;&#1606;&#1740;
                            &#1662;&#1740;&#1583;&#1575; &#1705;&#1585;&#1583;&#1607;
                            &#1608; &#1576;&#1575; &#1575;&#1585;&#1578;&#1576;&#1575;&#1591; &#1605;&#1587;&#1578;&#1602;&#1740;&#1605;
                            &#1576;&#1575; &#1589;&#1575;&#1581;&#1576; &#1608;&#1740;&#1604;&#1575; &#1607;&#1575;
                            &#1576;&#1607;&#1578;&#1585;&#1740;&#1606; &#1602;&#1740;&#1605;&#1578; &#1585;&#1575;
                            &#1576;&#1585;&#1575;&#1740; &#1588;&#1605;&#1575; &#1583;&#1585;&#1740;&#1575;&#1601;&#1578;
                            &#1606;&#1605;&#1575;&#1740;&#1740;&#1605;.</p>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <i class="flaticon-support"></i>
                        <h4 style="font-size: 16px">&#1662;&#1588;&#1578;&#1740;&#1576;&#1575;&#1606;&#1740; 24 &#1587;&#1575;&#1593;&#1578;&#1607;</h4>
                        <p>&#1583;&#1585; &#1591;&#1608;&#1604; &#1587;&#1601;&#1585; &#1578;&#1740;&#1605; &#1605;&#1575;
                            &#1607;&#1605;&#1740;&#1588;&#1607; &#1740;&#1705; &#1578;&#1605;&#1575;&#1587; &#1578;&#1604;&#1601;&#1606;&#1740;
                            &#1576;&#1575; &#1588;&#1605;&#1575; &#1601;&#1575;&#1589;&#1604;&#1607; &#1583;&#1575;&#1585;&#1606;&#1583;
                            &#1578;&#1575; &#1607;&#1585; &#1570;&#1606;&#1670;&#1607; &#1606;&#1740;&#1575;&#1586;
                            &#1583;&#1575;&#1585;&#1740;&#1583; &#1576;&#1585;&#1575;&#1740; &#1588;&#1605;&#1575;
                            &#1601;&#1585;&#1575;&#1607;&#1605;
                            &#1705;&#1606;&#1606;&#1583;. &#1583;&#1585; &#1591;&#1608;&#1604; &#1587;&#1601;&#1585;
                            &#1578;&#1606;&#1607;&#1575; &#1606;&#1740;&#1587;&#1578;&#1740;&#1583; &#1608; &#1662;&#1588;&#1578;&#1740;&#1576;&#1575;&#1606;&#1740;
                            &#1605;&#1575; &#1705;&#1606;&#1575;&#1585; &#1588;&#1605;&#1575;&#1587;&#1578;.</p>
                    </div>
                </div>
            </div>
        </section>

        
        <?php if(count($villas) > 0): ?>

            <section class="section bg-white">
                <div class="container">

                    <div class="title text-center">
                        <h2>&#1608;&#1740;&#1604;&#1575;&#1607;&#1575;&#1740; &#1578;&#1582;&#1601;&#1740;&#1601;
                            &#1583;&#1575;&#1585;</h2>
                        
                        
                    </div>
                    <span class="line-dot"></span>
                    <?php if(count($villas) > 0): ?>
                        <div class="owl-carousel owl-carousel-index">
                            <?php $__currentLoopData = $villas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $villa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $properties_in = unserialize($villa->properties_in);
                                    $properties_out = unserialize($villa->properties_out);
                                ?>
                                <div class="item">
                                    <a target="_blank" href="<?php echo e(route('front-villa-show', $villa->slug)); ?>"
                                       class="multimedia-box">
                            <span class="image">
                                <?php if(isset($villa->gallery->photo[0])): ?>
                                    <img src="<?php echo e(url($villa->gallery->photo[0]->path)); ?>" height="204"
                                         alt="<?php echo e($villa->name); ?>"/>
                                <?php else: ?>
                                    <img src="http://via.placeholder.com/350x150&text=None" alt="<?php echo e($villa->name); ?>">
                                <?php endif; ?>
                                <?php if($villa->discount): ?>
                                    <span class="discount"><?php echo e(percent($villa->price, $villa->discount)); ?></span>
                                <?php endif; ?>


                                <?php if(Auth::user()): ?>
                                    <?php
                                        $like = App\Like::where('likable_type' , 'App\Villa')->where('likable_id' , $villa->id)->where('user_id' , Auth::user()->id)->first();
                                    ?>
                                <?php else: ?>
                                    <?php
                                        $like = null
                                    ?>
                                <?php endif; ?>


                                <span class="like-icon <?php if(!is_null($like)): ?> active <?php endif; ?>"
                                      <?php if(auth()->guard()->check()): ?> data-id="<?php echo e($villa->id); ?>" <?php endif; ?>><i
                                            class="nc-icon ui-2_favourite-28"></i></span>
                            </span>
                                        <span class="details" style="min-height: 200px;">
                            <ul class="name">
                                <li><strong class="ml-2">&#1606;&#1575;&#1605; &#1608;&#1740;&#1604;&#1575; :</strong><?php echo e($villa->name); ?></li>
                                <li><strong class="ml-2">&#1605;&#1581;&#1604; &#1608;&#1740;&#1604;&#1575; :</strong><?php echo e($villa->district); ?></li>
                            </ul>
                            <ul class="icons">
                                <li data-toggle="tooltip"
                                    title="&#1578;&#1593;&#1583;&#1575;&#1583; &#1575;&#1578;&#1575;&#1602; <?php echo e($villa->number_of_rooms); ?>">
                                        <img src="<?php echo e(asset('img/villas/bedroom.svg')); ?>" width="16" height="16"
                                             alt="&#1578;&#1593;&#1583;&#1575;&#1583; &#1575;&#1578;&#1575;&#1602; <?php echo e($villa->number_of_rooms); ?>">
                                         <p><?php echo e($villa->number_of_rooms); ?> &#1575;&#1578;&#1575;&#1602;</p>
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
                                            <?php if($villa->discount): ?>

                                                <strike><span class="discount-price">
                                                             &#1602;&#1740;&#1605;&#1578; &#1575;&#1586;
                                                    <span class="text-danger-300 m-x2"><span
                                                                class="numberPrice"> <?php echo e($villa->price); ?> </span> <?php if($villa->price_type == 'rial'): ?>
                                                            &#1585;&#1740;&#1575;
                                                            &#1604; <?php elseif($villa->price_type == 'dollar'): ?>
                                                            &#1583;&#1604;&#1575;
                                                            &#1585; <?php elseif($villa->price_type == 'euro'): ?>
                                                            &#1740;&#1608;&#1585;&#1608; <?php endif; ?></span>
                                                             &#1607;&#1585; &#1588;&#1576;
                                        </span></strike><br>


                                                <span class="discount-price">
                                                             &#1602;&#1740;&#1605;&#1578; &#1575;&#1586;
                                                <span class="text-success-300 m-x2"><span
                                                            class="numberPrice"><?php echo e(discount($villa->price, $villa->discount)); ?> </span> <?php if($villa->price_type == 'rial'): ?>
                                                        &#1585;&#1740;&#1575;
                                                        &#1604; <?php elseif($villa->price_type == 'dollar'): ?>
                                                        &#1583;&#1604;&#1575;
                                                        &#1585; <?php elseif($villa->price_type == 'euro'): ?> &#1740;&#1608;
                                                        &#1585;&#1608; <?php endif; ?></span>
                                                             &#1607;&#1585; &#1588;&#1576;
                                        </span>
                                            <?php else: ?>
                                                <span class="discount-price">
                                                             &#1602;&#1740;&#1605;&#1578; &#1575;&#1586;
                                                <span class="text-success-300 m-x2"><span
                                                            class="numberPrice"><?php echo e($villa->price); ?> </span> <?php if($villa->price_type == 'rial'): ?>
                                                        &#1585;&#1740;&#1575;
                                                        &#1604; <?php elseif($villa->price_type == 'dollar'): ?>
                                                        &#1583;&#1604;&#1575;
                                                        &#1585; <?php elseif($villa->price_type == 'euro'): ?> &#1740;&#1608;
                                                        &#1585;&#1608; <?php endif; ?></span>
                                                             &#1607;&#1585; &#1588;&#1576;
                                        </span>
                                        </span>
                                        <?php endif; ?>
                                    </a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        
                        
                    <?php else: ?>
                        <p>&#1605;&#1581;&#1578;&#1608;&#1575;&#1740;&#1740; &#1740;&#1575;&#1601;&#1578; &#1606;&#1588;&#1583;</p>
                    <?php endif; ?>
                </div>
            </section>
            
        <?php endif; ?>



        <section class="whey section" style="background: url('<?php echo e($travel->background); ?>') no-repeat center fixed;">
            <div class="container">
                <div class="title text-center">
                    <h3>&#1576;&#1607;&#1578;&#1585;&#1740;&#1606; &#1608; &#1585;&#1608;&#1740;&#1575;&#1740;&#1740;
                        &#1578;&#1585;&#1740;&#1606; &#1605;&#1602;&#1589;&#1583; &#1585;&#1575; &#1576;&#1585;&#1575;&#1740;
                        &#1582;&#1608;&#1583; &#1662;&#1740;&#1583;&#1575; &#1705;&#1606;&#1740;&#1583;!</h3>
                </div>
                <span class="line-dot line-opacity"></span>
                <div class="row">
                    <div class="whey-text col-md-6 text-justify">
                        <?php echo $travel->text; ?>

                    </div>
                    <div class="whey-header col-md-6 text-left"
                         style="background: url('<?php echo e($travel->photo); ?>') no-repeat center;">

                    </div>
                </div>
            </div>
        </section>
        <section class="maps section bg-white" style="padding-bottom:0">
            <div class="container">
                <div class="title text-center">
                    <h2>&#1605;&#1602;&#1575;&#1589;&#1583; &#1608;&#1740;&#1604;&#1575; &#1607;&#1575;&#1740; &#1588;&#1711;&#1601;&#1578;
                        &#1575;&#1606;&#1711;&#1740;&#1586; &#1605;&#1575; &#1583;&#1585; &#1606;&#1602;&#1575;&#1591;
                        &#1605;&#1582;&#1578;&#1604;&#1601; &#1580;&#1607;&#1575;&#1606;</h2>
                </div>
                <span class="line-dot"></span>
            </div>
            <div class="google-map" id="google-map-area" style="width:100%;height:400px"></div>
        </section>
        <section class="information information2 section text-center">
            <div class="container">
                <div class="title text-center">

                    <style>
                        h5 {
                            line-height: 1.5;
                        }
                    </style>
                    <h3>&#1670;&#1711;&#1608;&#1606;&#1607; &#1587;&#1601;&#1585;&#1740; &#1582;&#1575;&#1591;&#1585;&#1607;
                        &#1575;&#1606;&#1711;&#1740;&#1586; &#1585;&#1575; &#1576;&#1575; &#1608;&#1740;&#1604;&#1575;
                        &#1607;&#1575;&#1740; &#1605;&#1575; &#1585;&#1602;&#1605; &#1576;&#1586;&#1606;&#1740;&#1583;&#1567;</h3>
                </div>
                <span class="line-dot line-opacity"></span>
                <div class="row">
                    <div class="col-sm-4" style="height: 208px;">
                        <div class="img-svg-home">
                            <img src="<?php echo e(asset('img/111.svg')); ?>">
                        </div>
                        <h4 style="font-size: 18px">&#1580;&#1587;&#1578;&#1580;&#1608;
                            &#1705;&#1606;&#1740;&#1583;</h4>
                        <p>&#1575;&#1576;&#1578;&#1583;&#1575; &#1588;&#1607;&#1585; &#1605;&#1608;&#1585;&#1583;
                            &#1606;&#1592;&#1585; &#1582;&#1608;&#1583;&#1578;&#1608;&#1606; &#1585;&#1608; &#1575;&#1586;
                            &#1576;&#1740;&#1606; &#1605;&#1602;&#1575;&#1589;&#1583; &#1605;&#1575; &#1575;&#1606;&#1578;&#1582;&#1575;&#1576;
                            &#1705;&#1606;&#1740;&#1583; &#1608; &#1583;&#1585; &#1575;&#1608;&#1606; &#1588;&#1607;&#1585;
                            &#1576;&#1607; &#1583;&#1606;&#1576;&#1575;&#1604; &#1576;&#1607;&#1578;&#1585;&#1740;&#1606;
                            &#1608;&#1740;&#1604;&#1575;&#1740;&#1740;
                            &#1705;&#1607; &#1576;&#1585;&#1575;&#1740; &#1588;&#1605;&#1575; &#1608; &#1607;&#1605;&#1587;&#1601;&#1585;&#1575;&#1606;&#1578;&#1608;&#1606;
                            &#1605;&#1606;&#1575;&#1587;&#1576; &#1607;&#1587;&#1578; &#1576;&#1711;&#1585;&#1583;&#1740;&#1606;.</p>
                    </div>
                    <div class="col-sm-4" style="height: 208px;">
                        
                        <div class="img-svg-home">

                            <img src="<?php echo e(asset('img/222.svg')); ?>">
                        </div>
                        <h4 style="font-size: 18px">&#1605;&#1588;&#1608;&#1585;&#1578;
                            &#1705;&#1606;&#1740;&#1583;</h4>
                        <p>&#1576;&#1593;&#1583; &#1575;&#1586; &#1605;&#1588;&#1575;&#1607;&#1583;&#1607; &#1705;&#1585;&#1583;&#1606;
                            &#1608;&#1740;&#1604;&#1575;&#1607;&#1575;&#1740; &#1605;&#1608;&#1585;&#1583; &#1593;&#1604;&#1575;&#1602;&#1578;&#1608;&#1606;
                            &#1583;&#1585; &#1575;&#1608;&#1606; &#1588;&#1607;&#1585;&#1548; &#1576;&#1575; &#1605;&#1575;
                            &#1578;&#1605;&#1575;&#1587; &#1576;&#1711;&#1740;&#1585;&#1740;&#1606; &#1608; &#1575;&#1586;
                            &#1585;&#1575;&#1607;&#1606;&#1605;&#1575;&#1740;&#1740;
                            &#1607;&#1605;&#1705;&#1575;&#1585;&#1575;&#1606;&#8204;&#1605;&#1608;&#1606;
                            &#1705;&#1607; &#1606;&#1587;&#1576;&#1578; &#1576;&#1607; &#1608;&#1740;&#1604;&#1575;&#1607;&#1575;
                            &#1588;&#1606;&#1575;&#1582;&#1578; &#1705;&#1575;&#1605;&#1604; &#1583;&#1575;&#1585;&#1606;
                            &#1576;&#1607;&#1585;&#1607;&#8204;&#1605;&#1606;&#1583; &#1576;&#1588;&#1740;&#1606;.</p>
                    </div>
                    <div class="col-sm-4" style="height: 208px;">
                        
                        <div class="img-svg-home">
                            <img src="<?php echo e(asset('img/333.svg')); ?>">
                        </div>
                        <h4 style="font-size: 18px">&#1575;&#1606;&#1578;&#1582;&#1575;&#1576; &#1705;&#1606;&#1740;&#1583;</h4>
                        <p>&#1583;&#1585; &#1606;&#1607;&#1575;&#1740;&#1578; &#1576;&#1593;&#1583; &#1575;&#1586;
                            &#1575;&#1591;&#1605;&#1740;&#1606;&#1575;&#1606; &#1662;&#1740;&#1583;&#1575;&#1705;&#1585;&#1583;&#1606;
                            &#1575;&#1586; &#1605;&#1581;&#1604; &#1575;&#1602;&#1575;&#1605;&#1578;&#1548; &#1608;&#1740;&#1604;&#1575;&#1740;
                            &#1605;&#1608;&#1585;&#1583; &#1606;&#1592;&#1585; &#1585;&#1608; &#1585;&#1586;&#1585;&#1608;
                            &#1705;&#1606;&#1740;&#1606; &#1608; &#1578;&#1593;&#1591;&#1740;&#1604;&#1575;&#1578;
                            &#1601;&#1608;&#1602;
                            &#1575;&#1604;&#1593;&#1575;&#1583;&#1607;
                            &#1582;&#1608;&#1583;&#1578;&#1608;&#1606; &#1585;&#1608; &#1583;&#1585; &#1705;&#1606;&#1575;&#1585;
                            &#1607;&#1605;&#1587;&#1601;&#1585;&#1575;&#1606;&#1578;&#1608;&#1606; &#1585;&#1602;&#1605;
                            &#1576;&#1586;&#1606;&#1740;&#1606;! </p>
                    </div>
                </div>
            </div>
        </section>
        <section style="background-color: white !important;" class="sliders section bg-white">
            <div class="container">
                <div class="title text-center">
                    <h2>&#1582;&#1583;&#1605;&#1575;&#1578; &#1575;&#1587;&#1578;&#1579;&#1606;&#1575;&#1740;&#1740;
                        &#1608;&#1740;&#1604;&#1705;&#1587;&#1585;</h2>
                    <p style="padding-top: 10px;">&#1588;&#1605;&#1575; &#1605;&#1740; &#1578;&#1608;&#1575;&#1606;&#1740;&#1583;
                        &#1576;&#1607;
                        &#1580;&#1575;&#1740; &#1575;&#1602;&#1575;&#1605;&#1578; &#1583;&#1585; &#1607;&#1578;&#1604;
                        &#1576;&#1575; &#1602;&#1740;&#1605;&#1578; &#1607;&#1575;&#1740; &#1711;&#1586;&#1575;&#1601;
                        &#1608; &#1605;&#1581;&#1583;&#1608;&#1583;&#1740;&#1578; &#1607;&#1575;&#1740; &#1601;&#1585;&#1575;&#1608;&#1575;&#1606;&#1548;
                        &#1740;&#1705; &#1608;&#1740;&#1604;&#1575; &#1585;&#1575; &#1576;&#1575; &#1602;&#1740;&#1605;&#1578;
                        &#1605;&#1606;&#1575;&#1587;&#1576;
                        &#1608; &#1576;&#1583;&#1608;&#1606; &#1605;&#1581;&#1583;&#1608;&#1583;&#1740;&#1578; &#1575;&#1580;&#1575;&#1585;&#1607;
                        &#1606;&#1605;&#1575;&#1740;&#1740;&#1583;.</p>
                </div>
                <span class="line-dot"></span>
                <div class="row">
                    <div class="col-md-1"></div>
                    <style>
                        .container .circle {
                            height: 100px;
                            width: 100px;
                            padding: 3px;
                            margin-right: 8px;
                            /*background-color: blue;*/
                            /*border-radius: 50%;*/
                            /*text-align: center;*/
                            /*display: inline-block;*/
                            /*margin: 0 auto;*/
                            /*border: 1px solid;*/
                            /*color: #f1f1f1;*/

                        }

                        .circle img {
                            width: 100%;
                        }

                        @media (max-width: 800px) {
                            .mouse {
                                display: none;
                            }

                            .nav ul li {
                                padding: 0.7rem 1rem;
                            }

                            .section {
                                padding: 5rem 0;
                            }

                            .nav .container ul {
                                display: none !important;
                            }

                            .whey-header {
                                display: none;
                                background: url("<?php echo e($travel->photo); ?>") center no-repeat !important;
                            }

                            .container .circle {
                                height: 76px;
                                width: 70px;
                                padding: 3px;
                                margin-right: 5px;
                            }

                            h6 {
                                font-size: 8px !important;
                            }
                            .centered{
                                float: none;
                                display: inline-block;
                            }

                        }

                        h6 {
                            text-align: center;
                            font-size: 12px;
                            line-height: 0px;
                            color: #d4d7d9;
                            margin-top: 1rem;
                        }

                    </style>
                    <div class="col-md-12">
                        <div class="tp-banner-container">
                            <div class="tp-banner2" style="height: 110px;height: 123%">
                                <div class="col-md-12"
                                     style="padding-top: 15px;">
                                    <div class="container"
                                         style="position: relative; margin: 0 auto; line-height: 50px; width: 100%;margin-top: -3%;text-align: center">
                                        <div class="row centered">
                                            <div class="circle circle1 centered">
                                                <img src="<?php echo e(asset('img/black/CIP.png')); ?>" width="32"
                                                     height="32"
                                                     alt="&#1576;&#1604;&#1740;&#1578; &#1607;&#1608;&#1575;&#1662;&#1740;&#1605;&#1575;">
                                                <h6>&#1582;&#1583;&#1605;&#1575;&#1578; CIP</h6>
                                            </div>
                                            <div class="circle circle2 centered">
                                                <img src="<?php echo e(asset('img/black/ACCOMMODATION.png')); ?>" width="32"
                                                     height="32"
                                                     alt="&#1582;&#1583;&#1605;&#1575;&#1578; &#1575;&#1602;&#1575;&#1605;&#1578;">
                                                <h6>&#1582;&#1583;&#1605;&#1575;&#1578; &#1575;&#1602;&#1575;&#1605;&#1578;</h6>
                                            </div>
                                            <div class="circle circle3 centered">
                                                <img src="<?php echo e(asset('img/black/flight ticket .png')); ?>" width="32"
                                                     height="32"
                                                     alt="&#1576;&#1604;&#1740;&#1578; &#1607;&#1608;&#1575;&#1662;&#1740;&#1605;&#1575;">
                                                <h6>&#1576;&#1604;&#1740;&#1591; &#1607;&#1608;&#1575;&#1662;&#1740;&#1605;&#1575;</h6>
                                            </div>
                                            <div class="circle circle4 centered">
                                                <img src="<?php echo e(asset('img/black/HONEY MOON.png')); ?>" width="32"
                                                     height="32"
                                                     alt="&#1576;&#1604;&#1740;&#1578; &#1607;&#1608;&#1575;&#1662;&#1740;&#1605;&#1575;">
                                                <h6>&#1605;&#1575;&#1607; &#1593;&#1587;&#1604;</h6>
                                            </div>


                                            <div class="circle circle5 centered">
                                                <img src="<?php echo e(asset('img/black/INSURANCE.png')); ?>" width="32"
                                                     height="32"
                                                     alt="&#1576;&#1604;&#1740;&#1591; &#1607;&#1608;&#1575;&#1662;&#1740;&#1605;&#1575;">
                                                <h6>&#1576;&#1740;&#1605;&#1607; &#1605;&#1587;&#1575;&#1601;&#1585;&#1578;&#1740;</h6>
                                            </div>
                                            <div class="circle circle6 centered">
                                                <img src="<?php echo e(asset('img/black/marriage.png')); ?>" width="32"
                                                     height="32"
                                                     alt="&#1576;&#1604;&#1740;&#1578; &#1607;&#1608;&#1575;&#1662;&#1740;&#1605;&#1575;">
                                                <h6>&#1580;&#1588;&#1606; &#1593;&#1585;&#1608;&#1587;&#1740;</h6>
                                            </div>
                                            <div class="circle circle7 centered">
                                                <img src="<?php echo e(asset('img/black/RENT.png')); ?>" width="32"
                                                     height="32"
                                                     alt="&#1576;&#1604;&#1740;&#1578; &#1607;&#1608;&#1575;&#1662;&#1740;&#1605;&#1575;">
                                                <h6>&#1575;&#1580;&#1575;&#1585;&#1607; &#1605;&#1575;&#1588;&#1740;&#1606;</h6>
                                            </div>
                                            
                                            <div class="circle circle8 centered">
                                                <img src="<?php echo e(asset('img/black/TOURS.png')); ?>" width="32"
                                                     height="32"
                                                     alt="&#1576;&#1604;&#1740;&#1578; &#1607;&#1608;&#1575;&#1662;&#1740;&#1605;&#1575;">
                                                <h6>&#1711;&#1588;&#1578; &#1607;&#1575;&#1740; &#1578;&#1601;&#1585;&#1740;&#1581;&#1740;</h6>
                                            </div>
                                            <div class="circle circle9 centered">
                                                <img src="<?php echo e(asset('img/black/TRANSFER.png')); ?>" width="32"
                                                     height="32"
                                                     alt="&#1576;&#1604;&#1740;&#1578; &#1607;&#1608;&#1575;&#1662;&#1740;&#1605;&#1575;">
                                                <h6>&#1578;&#1585;&#1575;&#1606;&#1587;&#1601;&#1585; &#1601;&#1585;&#1608;&#1583;&#1711;&#1575;&#1607;&#1740;</h6>
                                            </div>
                                            <div class="circle circle10 centered">
                                                <img src="<?php echo e(asset('img/black/visa.png')); ?>" width="32"
                                                     height="32"
                                                     alt="&#1576;&#1604;&#1740;&#1578; &#1607;&#1608;&#1575;&#1662;&#1740;&#1605;&#1575;">
                                                <h6>&#1608;&#1740;&#1586;&#1575;&#1740; &#1605;&#1587;&#1575;&#1601;&#1585;&#1578;&#1740;</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </section>
        <section class="best section">
            <div class="container">
                <div class="title text-center">
                    <h2>&#1605;&#1581;&#1576;&#1608;&#1576; &#1578;&#1585;&#1740;&#1606; &#1605;&#1602;&#1575;&#1589;&#1583;
                        &#1608;&#1740;&#1604;&#1575;&#1740;&#1740;</h2>
                    
                    
                </div>
                <span class="line-dot"></span>
                <?php if(count($locations) == 2): ?>
                    <div class="location uk-grid-width-small-1-2 uk-grid-width-medium-1-2" data-uk-grid>
                        <?php elseif(count($locations) == 3): ?>
                            <?php $__env->startPush('stylesheets'); ?>
                                <style>
                                    .location > div:nth-child(3) a h5 {
                                        top: 35% !important;
                                    }

                                    .location > div:nth-child(3) {
                                        height: 230px !important;
                                        width: 100%;
                                    }

                                    .location > div img {
                                        width: 100%;
                                        height: 230px !important;
                                    }
                                </style>
                            <?php $__env->stopPush(); ?>
                            <div class="location uk-grid-width-small-1-2 uk-grid-width-medium-1-2" data-uk-grid>
                                <?php elseif(count($locations) == 4): ?>
                                    <?php $__env->startPush('stylesheets'); ?>
                                        <style>
                                            .location > div:nth-child(3) a h5 {
                                                top: 35% !important;
                                            }

                                            .location > div:nth-child(3) {
                                                height: 230px !important;
                                            }

                                            .location > div img {
                                                width: 100%;
                                                height: 230px !important;
                                            }
                                        </style>
                                    <?php $__env->stopPush(); ?>
                                    <div class="location uk-grid-width-small-1-2 uk-grid-width-medium-1-2" data-uk-grid>
                                        <?php elseif(count($locations) == 5): ?>
                                            <div class="location uk-grid-width-small-1-2 uk-grid-width-medium-1-3"
                                                 data-uk-grid>
                                                <?php endif; ?>
                                                <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="locations">
                                                        <div class="uk-panel">
                                                            <a href="<?php echo e(route('front-location-show', $location->url)); ?>">
                                                                <div style="width: 100%;background-size: cover;background-repeat: no-repeat;background-position: center;height: 250px;<?php if(!is_null($location->home)): ?> background-image: url('<?php echo e(url($location->home)); ?>') <?php endif; ?>"></div>
                                                                <span>
<h5 style="font-size: 20px;">&#1575;&#1580;&#1575;&#1585;&#1607; &#1740; &#1608;&#1740;&#1604;&#1575; &#1583;&#1585; <?php echo e($location->name); ?></h5>
<p style="font-size: 15px"><?php echo e($location->slogan); ?></p>
</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>


                                    </div>
                            </div>
                    </div>
            </div>
        </section>
        <section class="wheydo section bg-white">
            <div class="container">
                <div class="title text-center">
                    <h3 style="direction: rtl">&#1608;&#1740;&#1604;&#1705;&#1587;&#1585;&#1563; &#1604;&#1608;&#1705;&#1587;
                        &#1608; &#1605;&#1606;&#1581;&#1589;&#1585;&#1576;&#1607; &#1601;&#1585;&#1583;&#1548; &#1575;&#1605;&#1575;
                        &#1576;&#1607; &#1589;&#1585;&#1601;&#1607;!</h3>
                    <p style="padding-top: 10px;">&#1586;&#1605;&#1575;&#1606; &#1588;&#1605;&#1575; &#1576;&#1575;
                        &#1575;&#1585;&#1586;&#1588;
                        &#1575;&#1587;&#1578;. &#1662;&#1587; &#1608;&#1602;&#1578;&#1740; &#1576;&#1585;&#1575;&#1740;
                        &#1587;&#1601;&#1585; &#1605;&#1740;&#1585;&#1608;&#1740;&#1583;&#1548; &#1670;&#1585;&#1575;
                        &#1576;&#1607;&#1578;&#1585;&#1740;&#1606; &#1575;&#1587;&#1578;&#1601;&#1575;&#1583;&#1607;
                        &#1585;&#1608; &#1575;&#1586;&#1588; &#1606;&#1576;&#1585;&#1740;</p>
                    <p>&#1608; &#1580;&#1575;&#1740;&#1740; &#1575;&#1602;&#1575;&#1605;&#1578; &#1705;&#1606;&#1740;
                        &#1705;&#1607; &#1605;&#1602;&#1583;&#1575;&#1585;&#1740; ... &#1605;&#1578;&#1601;&#1575;&#1608;&#1578;
                        &#1578;&#1585; &#1607;&#1587;&#1578;&#1588;&#1567;</p>
                </div>
                <?php
                    $text = App\Travel::where('id' , 2)->first();
                ?>
                <span class="line-dot"></span>
                <div class="row">
                    <div class="whey-header col-md-6 text-left"
                         <?php if(isset($text->photo)): ?> style="background-image: url(<?php echo e(url($text->photo)); ?>)" <?php endif; ?>>
                        <a href="<?php echo e(route('front-about')); ?>"
                           class="btn btn-info show-more">
                            &#1576;&#1585;&#1575;&#1740; &#1575;&#1591;&#1604;&#1575;&#1593;&#1575;&#1578;
                            &#1576;&#1740;&#1588;&#1578;&#1585; &#1705;&#1604;&#1740;&#1705; &#1705;&#1606;&#1740;&#1583;<i
                                    class="fa fa-angle-right ml-2"></i></a>
                    </div>
                    <div class="whey-text col-md-6 text-justify">
                        <div style="direction: rtl">
                            <?php echo $text->text; ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section-comment">
            <div class="container">
                <div class="title text-center">
                    <h4 style="font-size: 24px">&#1606;&#1592;&#1585;&#1575;&#1578; &#1705;&#1575;&#1585;&#1576;&#1585;&#1575;&#1606;</h4>

                </div>
                <span class="line-dot"></span>
                <div class="owl-carousel owl-carousel-comment">
                    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $user = (object)unserialize($comment->creator);?>
                        <div class="item">
                            <div class="index-comment">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="<?php echo e(asset('img/user.svg')); ?>" alt="avatar"/>
                                        <b><?php echo e($user->name); ?></b>
                                        <?php echo e(rank($comment->rank, '')); ?>

                                    </div>
                                    <div class="col-md-12" style="padding: 18px 87px 0px 87px">
                                        <b style=" text-align: justify;"><?php echo e($comment->body); ?></b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
        <section class="newslater section bg-white" data-direction="rtl">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="title">
                            <h5 style="float: right;font-size: 17px">&#1575;&#1608;&#1604;&#1740;&#1606; &#1606;&#1601;&#1585;&#1740;
                                &#1576;&#1575;&#1588;&#1740;&#1583; &#1705;&#1607; &#1575;&#1586; &#1607;&#1605;&#1607;
                                &#1670;&#1740;&#1586; &#1576;&#1575; &#1582;&#1576;&#1585; &#1605;&#1740; &#1588;&#1608;&#1740;&#1583;</h5>
                        </div>
                        <span class="line-dot"></span>
                        <?php echo e(Form::open(array('route' => 'newsletter-store', 'method' => 'PUT'))); ?>

                        <?php echo e(Form::hidden('page_name', 'home')); ?>

                        <?php echo e(Form::hidden('page_name_display', '' . '&#1589;&#1601;&#1581;&#1607; &#1575;&#1589;&#1604;&#1740;')); ?>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="text" name="email" class="form-control"
                                           placeholder="&#1575;&#1740;&#1605;&#1740;&#1604; &#1582;&#1608;&#1583; &#1585;&#1575; &#1608;&#1575;&#1585;&#1583; &#1705;&#1606;&#1740;&#1583;...">
                                </div>
                            </div>
                            <span class="or text-grey-300 mt-2"></span>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input type="text" name="mobile" pattern="09[0-9]{9}" class="form-control"
                                           placeholder="&#1605;&#1608;&#1576;&#1575;&#1740;&#1604; &#1582;&#1608;&#1583; &#1585;&#1575; &#1608;&#1575;&#1585;&#1583; &#1705;&#1606;&#1740;&#1583;...">
                                </div>
                            </div>
                        </div>
                        <a href="javascript:void(0)" onclick="$(this).parent('form').submit()"><i
                                    class="fa fa-angle-left"></i></a>
                        <?php echo e(Form::close()); ?>

                        <p class="text-justify">
                            &#1570;&#1582;&#1585;&#1740;&#1606; &#1583;&#1575;&#1606;&#1587;&#1578;&#1606;&#1740;
                            &#1607;&#1575;&#1740; &#1587;&#1601;&#1585; &#1588;&#1575;&#1605;&#1604; &#1583;&#1575;&#1606;&#1587;&#1578;&#1606;&#1740;
                            &#1607;&#1575;&#1740; &#1605;&#1602;&#1575;&#1589;&#1583; &#1605;&#1582;&#1578;&#1604;&#1601;&#1548;
                            &#1608;&#1740;&#1604;&#1575;&#1607;&#1575;&#1740; &#1575;&#1590;&#1575;&#1601;&#1607;
                            &#1588;&#1583;&#1607; &#1576;&#1607; &#1605;&#1602;&#1575;&#1589;&#1583; &#1605;&#1582;&#1578;&#1604;&#1601;
                            &#1605;&#1575;&#1548; &#1711;&#1588;&#1578;
                            &#1607;&#1575;&#1740; &#1578;&#1601;&#1585;&#1740;&#1581;&#1740; &#1605;&#1578;&#1606;&#1608;&#1593;
                            &#1608; &#1580;&#1583;&#1740;&#1583; &#1605;&#1602;&#1575;&#1589;&#1583; &#1605;&#1582;&#1578;&#1604;&#1601;
                            &#1608; &#1607;&#1585; &#1570;&#1606;&#1670;&#1607; &#1705;&#1607; &#1588;&#1605;&#1575;
                            &#1575;&#1606;&#1578;&#1592;&#1575;&#1585; &#1583;&#1575;&#1585;&#1740;&#1583; &#1575;&#1586;
                            &#1607;&#1585; &#1580;&#1575;&#1740;&#1740; &#1576;&#1583;&#1575;&#1606;&#1740;&#1583;
                            &#1578;&#1575; &#1583;&#1585;
                            &#1578;&#1589;&#1605;&#1740;&#1605; &#1570;&#1740;&#1606;&#1583;&#1607; &#1582;&#1608;&#1583;
                            &#1576;&#1585;&#1575;&#1740; &#1585;&#1601;&#1578;&#1606; &#1576;&#1607; &#1587;&#1601;&#1585;
                            &#1576;&#1607; &#1588;&#1605;&#1575; &#1705;&#1605;&#1705; &#1705;&#1606;&#1583; &#1585;&#1575;
                            &#1605;&#1575; &#1576;&#1585;&#1575;&#1740; &#1588;&#1605;&#1575; &#1583;&#1587;&#1578;&#1607;
                            &#1576;&#1606;&#1583;&#1740; &#1705;&#1585;&#1583;&#1607; &#1608; &#1605;&#1587;&#1578;&#1602;&#1740;&#1605;
                            &#1576;&#1607;
                            &#1575;&#1740;&#1605;&#1740;&#1604; &#1588;&#1605;&#1575; &#1605;&#1740; &#1601;&#1585;&#1587;&#1578;&#1740;&#1605;&#1548;
                            &#1607;&#1605;&#1670;&#1606;&#1740;&#1606; &#1588;&#1605;&#1575; &#1605;&#1740; &#1578;&#1608;&#1575;&#1606;&#1740;&#1583;
                            &#1575;&#1586; &#1570;&#1582;&#1585;&#1740;&#1606; &#1578;&#1582;&#1601;&#1740;&#1601;
                            &#1607;&#1575;&#1740; &#1608;&#1740;&#1604;&#1575;&#1607;&#1575;&#1740; &#1605;&#1582;&#1578;&#1604;&#1601;
                            &#1583;&#1585; &#1607;&#1605;&#1607; &#1605;&#1602;&#1575;&#1589;&#1583; &#1575;&#1586;
                            &#1591;&#1585;&#1740;&#1602; &#1662;&#1740;&#1575;&#1605;&#1705; &#1576;&#1585; &#1585;&#1608;&#1740;
                            &#1605;&#1608;&#1576;&#1575;&#1740;&#1604;&#1578;&#1575;&#1606; &#1605;&#1591;&#1604;&#1593;
                            &#1588;&#1608;&#1740;&#1583;.
                        </p>
                    </div>
                    <div class="col-md-7">
                        <div class="title">
                            <h5 style="float: right;font-size: 1.3rem">&#1605;&#1580;&#1604;&#1607; &#1608;&#1740;&#1604;&#1705;&#1587;&#1585;</h5>
                        </div>
                        <span class="line-dot"></span>
                        <div class="row">
                            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('front-blog-show', $post->slug)); ?>" class="col-md-3 col-xs-12">
                                    <figure class="box-article">
                                        <?php if(isset($post->photo->path)): ?>
                                            <img src="<?php echo e(url($post->photo->path)); ?>" alt="preview">
                                        <?php endif; ?>
                                        <figcaption class="box-article-title">
                                            <h5><?php echo str_limit($post->title, $limit = 30, $end = '...'); ?></h5>
                                        </figcaption>
                                    </figure>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php $__env->endSlot(); ?>
    <?php $__env->startPush('stylesheets'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/uikit.min.css')); ?>"/>
        <style type="text/css">
            .nav {
                display: list-item !important;
                background-color: transparent !important;
            }
        </style>
    <?php $__env->stopPush(); ?>
    <?php $__env->startPush('scripts'); ?>
        <script type="text/javascript" src="<?php echo e(asset('js/uikit.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/grid.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/jquery.plugins.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/jquery.revolution.min.js')); ?>"></script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxfZQk73sogROY9KKRmtPIsLSFSjX7o7w&libraries=places&callback=initialize"></script>

        <script>



            function initialize() {
                var latlng = new google.maps.LatLng("<?php echo e(number_format((float)15.3354628, 0, '.', '')); ?>", "<?php echo e(number_format((float)90.8191378, 0, '.', '')); ?>");
                var options = {
                    zoom: 3,
                    center: latlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    styles: [{
                        "featureType": "all",
                        "elementType": "geometry.fill",
                        "stylers": [{"weight": "2.00"}]
                    }, {"featureType": "all", "elementType": "geometry.stroke", "stylers": [{"color": "#9c9c9c"}]}, {
                        "featureType": "all",
                        "elementType": "labels.text",
                        "stylers": [{"visibility": "on"}]
                    }, {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [{"color": "#f2f2f2"}]
                    }, {
                        "featureType": "landscape",
                        "elementType": "geometry.fill",
                        "stylers": [{"color": "#ffffff"}]
                    }, {
                        "featureType": "landscape.man_made",
                        "elementType": "geometry.fill",
                        "stylers": [{"color": "#ffffff"}]
                    }, {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [{"visibility": "off"}]
                    }, {
                        "featureType": "road",
                        "elementType": "all",
                        "stylers": [{"saturation": -100}, {"lightness": 45}]
                    }, {
                        "featureType": "road",
                        "elementType": "geometry.fill",
                        "stylers": [{"color": "#eeeeee"}]
                    }, {
                        "featureType": "road",
                        "elementType": "labels.text.fill",
                        "stylers": [{"color": "#7b7b7b"}]
                    }, {
                        "featureType": "road",
                        "elementType": "labels.text.stroke",
                        "stylers": [{"color": "#ffffff"}]
                    }, {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [{"visibility": "simplified"}]
                    }, {
                        "featureType": "road.arterial",
                        "elementType": "labels.icon",
                        "stylers": [{"visibility": "off"}]
                    }, {"featureType": "transit", "elementType": "all", "stylers": [{"visibility": "off"}]}, {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [{"color": "#46bcec"}, {"visibility": "on"}]
                    }, {
                        "featureType": "water",
                        "elementType": "geometry.fill",
                        "stylers": [{"color": "#c8d7d4"}]
                    }, {"featureType": "water", "elementType": "labels.text.fill", "stylers": [{"color": "#070707"}]}, {
                        "featureType": "water",
                        "elementType": "labels.text.stroke",
                        "stylers": [{"color": "#ffffff"}]
                    }],
                    draggable: true,
                    zoomControl: true,
                    mapTypeControl: true,
                    streetViewControl: false,
                    scrollwheel: false
                };
                var map = new google.maps.Map(document.getElementById("google-map-area"), options);
                var locations = [
                        <?php $__currentLoopData = $villas_map; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $villa_map): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    ['<a href="villa-holiday-destinations/<?php echo e($villa_map->url); ?>"><?php echo e($villa_map->name); ?></a>', <?php echo e(number_format((float)$villa_map->latitude, 5, '.', '')); ?>, <?php echo e(number_format((float)$villa_map->longitude, 5, '.', '')); ?>, 4],
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ];
                var marker = new google.maps.Marker(
                    {
                        map: map,
                        draggable: true,
                        animation: google.maps.Animation.DROP,
                        icon: "/vila/assets/img/pin.png"
                    }), i;

                var infowindow = new google.maps.InfoWindow();

                for (i = 0; i < locations.length; i++) {
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                        map: map
                    });

                    google.maps.event.addListener(marker, 'click', (function (marker, i) {
                        return function () {
                            infowindow.setContent(locations[i][0]);
                            infowindow.open(map, marker);
                        }
                    })(marker, i));
                }
            }


            $(document).ready(function () {
                $('.circle1 img').hover(function () {
                    $(this).attr('src', 'http://villexer.com/source/assets/img/color/CIP-C.png');
                    $(this).parent().children('h6').css('color', 'black');
                    $(this).mouseleave(function () {
                        $(this).parent().children('h6').css('color', '#d4d7d9');
                        $(this).attr('src', 'http://villexer.com/source/assets/img/black/CIP.png')
                    });
                });
                $('.circle2 img').hover(function () {
                    $(this).attr('src', 'http://villexer.com/source/assets/img/color/ACCOMMODATION-C.png');
                    $(this).parent().children('h6').css('color', 'black');
                    $(this).mouseleave(function () {
                        $(this).parent().children('h6').css('color', '#d4d7d9');
                        $(this).attr('src', 'http://villexer.com/source/assets/img/black/ACCOMMODATION.png')
                    });
                });
                $('.circle3 img').hover(function () {
                    $(this).attr('src', 'http://villexer.com/source/assets/img/color/flight ticket -C.png');
                    $(this).parent().children('h6').css('color', 'black');
                    $(this).mouseleave(function () {
                        $(this).attr('src', 'http://villexer.com/source/assets/img/black/flight ticket .png');
                        $(this).parent().children('h6').css('color', '#d4d7d9');

                    });
                });
                $('.circle4 img').hover(function () {
                    $(this).attr('src', 'http://villexer.com/source/assets/img/color/HONEY MOON-C.png');
                    $(this).parent().children('h6').css('color', 'black');
                    $(this).mouseleave(function () {
                        $(this).attr('src', 'http://villexer.com/source/assets/img/black/HONEY MOON.png');
                        $(this).parent().children('h6').css('color', '#d4d7d9');
                    });
                });
                $('.circle5 img').hover(function () {
                    $(this).attr('src', 'http://villexer.com/source/assets/img/color/INSURANCE-C.png');
                    $(this).parent().children('h6').css('color', 'black');
                    $(this).mouseleave(function () {
                        $(this).attr('src', 'http://villexer.com/source/assets/img/black/INSURANCE.png');
                        $(this).parent().children('h6').css('color', '#d4d7d9');
                    });
                });
                $('.circle6 img').hover(function () {
                    $(this).attr('src', 'http://villexer.com/source/assets/img/color/marriage-C.png');
                    $(this).parent().children('h6').css('color', 'black');
                    $(this).mouseleave(function () {
                        $(this).attr('src', 'http://villexer.com/source/assets/img/black/marriage.png');
                        $(this).parent().children('h6').css('color', '#d4d7d9');
                    });
                });
                $('.circle7 img').hover(function () {
                    $(this).attr('src', 'http://villexer.com/source/assets/img/color/RENT-C.png');
                    $(this).parent().children('h6').css('color', 'black');
                    $(this).mouseleave(function () {
                        $(this).attr('src', 'http://villexer.com/source/assets/img/black/RENT.png');
                        $(this).parent().children('h6').css('color', '#d4d7d9');
                    });
                });
                $('.circle8 img').hover(function () {
                    $(this).attr('src', 'http://villexer.com/source/assets/img/color/TOURS-C.png');
                    $(this).parent().children('h6').css('color', 'black');
                    $(this).mouseleave(function () {
                        $(this).attr('src', 'http://villexer.com/source/assets/img/black/TOURS.png');
                        $(this).parent().children('h6').css('color', '#d4d7d9');
                    });
                });
                $('.circle9 img').hover(function () {
                    $(this).attr('src', 'http://villexer.com/source/assets/img/color/TRANSFER-C.png');
                    $(this).parent().children('h6').css('color', 'black');
                    $(this).mouseleave(function () {
                        $(this).attr('src', 'http://villexer.com/source/assets/img/black/TRANSFER.png');
                        $(this).parent().children('h6').css('color', '#d4d7d9');
                    });
                });
                $('.circle10 img').hover(function () {
                    $(this).attr('src', 'http://villexer.com/source/assets/img/color/visa-C.png');
                    $(this).parent().children('h6').css('color', 'black');
                    $(this).mouseleave(function () {
                        $(this).attr('src', 'http://villexer.com/source/assets/img/black/visa.png');
                        $(this).parent().children('h6').css('color', '#d4d7d9');
                    });
                });
            });
        </script>

        <script type="text/javascript">


            $('.tp-banner').revolution({
                delay: 9000,
                startwidth: 1170,
                startheight: 500,
                hideThumbs: 10
            });
        </script>
        <script>
            $(document).ready(function () {
                $('.numberPrice').text(function (index, value) {
                    return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                });
                setInterval(function () {
                    $('.arrows-1_minimal-right').click();
                }, 3000)
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>