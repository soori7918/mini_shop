<?php $__env->startComponent('layouts.front'); ?>
    <?php $__env->slot('title'); ?> <?php if($setting->about_title): ?><?php echo e($setting->about_title); ?> <?php endif; ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('meta'); ?>
        <?php if($setting->about_keywords): ?>
            <meta http-equiv="keywords" name="keywords" content="<?php echo e($setting->about_keywords); ?>"/>
        <?php endif; ?>
        <meta property="og:title" content="<?php echo e($setting->title); ?>"/>
        <?php if($slider && $slider->photo): ?>
            <meta property="og:image" content="<?php echo e(url($slider->photo->path)); ?>"/>
        <?php endif; ?>
        <meta property="og:type" content="About"/>
        <meta property="og:url" content="http://villexer.com/about-us"/>
        <meta property="og:site_name" content="<?php echo e($setting->title); ?>"/>
        <meta property="og:locale" content="fa_ir"/>
        <?php if($setting->about_description): ?>
            <meta http-equiv="description" name="description" content="<?php echo e($setting->about_description); ?>"/>
        <?php endif; ?>
    <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <style>
            .p-des {
                background-color: #eee;
                padding: 14px;
            }

            .p-head {
                background-color: #eee;
                padding: 9px;
                cursor: pointer;
            }

            .footer:before {
                background-color: #f8f8f8;
            }

            .header-title h4 {
                color: #fff;
            }

            .title h6 {
                margin-bottom: 0;
            }

            .post-sidebar ul {
                border: 0;
            }

            .post-sidebar ul li a.active {
                color: #e91e63;
            }

            .information .row .col:nth-of-type(2):before, .information .row .col:nth-of-type(3):before, .information .row .col:nth-of-type(4):before {
                top: 60px;
            }

            .header-title h1 {
                color: white;
                font-weight: bold;
                text-shadow: 0px 0px 10px rgb(0, 0, 0);
            }

            h2 {
                font-size: 17px;
            }

            .information .col-sm-12 h2 {
                font-weight: 400;
                color: #222;
                margin: 20px 0;
            }

        </style>
        
        

        <?php if($slider): ?>
            <header class="sub-header"
                    style="background:url(<?php echo e(url($slider->photo->path)); ?>) center no-repeat;background-size:cover;">
                <div class="container">
                    <div class="header-logo" style="margin-top: -80px;margin-right: -15px;">
                        <a href="<?php echo e(url('/')); ?>"><img style="width: 200px"
                                                      src="<?php echo e(asset('uploads/file/1398-08-21/photos/istanbul.png')); ?>"
                                                      alt="logo"></a>
                    </div>
                    <div class="header-title">
                        <h1 style="font-size: 32px"><?php echo e($slider->title); ?></h1>
                        <p><?php echo e($slider->shoar); ?></p>
                    </div>
                </div>
            </header>
        <?php endif; ?>

        <section class="wheydo section bg-white">

            <div class="container">
                <?php if($slider): ?>
                    <div class="text-justify mb-5" style="margin-top: -1%;"><?php echo $slider->text; ?></div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-4">
                        <aside class="post-sidebars">
                            <div class="post-sidebar">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <?php if($about->descriptions != 'N;'): ?>
                                        <?php
                                            $descriptions = unserialize($about->descriptions);
                                             $title = 1;
                                        ?>
                                        <?php $__currentLoopData = $descriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $description): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($description['for'] == 1): ?>
                                                <li>
                                                    <a class="<?php if($description === reset($descriptions)): ?> active <?php endif; ?>"
                                                       data-toggle="tab" href="#tab-<?php echo e($title); ?>"
                                                       role="tab"><i
                                                                class="fa fa-check-circle ml-2"></i><?php echo e($description['title']); ?>

                                                    </a>
                                                </li>
                                                <?php
                                                    $title++
                                                ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a data-toggle="tab" href="#tab-qu" role="tab">
                                                <i class="fa fa-check-circle ml-2"></i>
                                                سوالات پرتکرار
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </aside>
                    </div>
                    <div style="margin-top: 20px" class="col-md-8">
                        <div class="tab-content" id="myTabContent">
                            <?php if($about->descriptions != 'N;'): ?>
                                <?php
                                    $descriptions = unserialize($about->descriptions);
                                    $desc = 1;
                                ?>
                                <?php $__currentLoopData = $descriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $description): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($description['for'] == 1): ?>

                                        <div class="tab-pane fade <?php if($description === reset($descriptions)): ?> show active <?php endif; ?>"
                                             id="tab-<?php echo e($desc); ?>" role="tabpanel"
                                             aria-labelledby="contact-tab"><?php echo $description['description']; ?>

                                        </div>
                                        <?php
                                            $desc++
                                        ?>
                                    <?php endif; ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="tab-pane fade" id="tab-qu" role="tabpanel" aria-labelledby="contact-tab">
                                    <?php $__currentLoopData = $descriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $description): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($description['for'] == 0): ?>
                                            <div class="father-ul">
                                                <tag>
                                                    <p class="p-head">
                                                        <?php echo e($description['title']); ?>

                                                    </p>
                                                </tag>
                                                <hr/>
                                                <div class="p-des" style="display: none">
                                                    <?php echo $description['description']; ?>

                                                </div>
                                            </div>


                                        <?php endif; ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="information information2 section text-center">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <img src="<?php echo e(asset('img/cake.svg')); ?>" width="84" height="84"
                             alt="&#1578;&#1608;&#1604;&#1583; &#1608;&#1740;&#1604;&#1705;&#1587;&#1585;">
                        <h2>&#1578;&#1608;&#1604;&#1583; &#1608;&#1740;&#1604;&#1705;&#1587;&#1585;</h2>
                        <p>&#1588;&#1585;&#1705;&#1578; &#1608;&#1740;&#1604;&#1705;&#1587;&#1585; &#1576;&#1575;
                            &#1578;&#1580;&#1585;&#1576;&#1607;&#8204;&#1575;&#1740; &#1778;&#1781; &#1587;&#1575;&#1604;&#1607;
                            &#1608;&#1576;&#1585; &#1575;&#1587;&#1575;&#1587; &#1575;&#1740;&#1583;&#1607;&#8204;&#1575;&#1740;
                            &#1606;&#1608; &#1588;&#1705;&#1604; &#1711;&#1585;&#1601;&#1578;&#1607; &#1575;&#1587;&#1578;.
                            &#1605;&#1583;&#1740;&#1585;&#1575;&#1606; &#1608;&#1740;&#1604;&#1705;&#1587;&#1585;&#1548;
                            &#1587;&#1575;&#1576;&#1602;&#1607; &#1601;&#1593;&#1575;&#1604;&#1740;&#1578; &#1583;&#1585;
                            &#1586;&#1605;&#1740;&#1606;&#1607; &#1587;&#1601;&#1585;&#1607;&#1575;&#1740; &#1576;&#1740;&#1606;&#8204;&#1575;&#1604;&#1605;&#1604;&#1604;&#1740;
                            &#1608; &#1582;&#1583;&#1605;&#1575;&#1578; &#1711;&#1585;&#1583;&#1588;&#1711;&#1585;&#1740;
                            &#1608; &#1662;&#1588;&#1578;&#1740;&#1576;&#1575;&#1606;&#1740; &#1575;&#1586; &#1605;&#1587;&#1575;&#1601;&#1585;&#1575;&#1606;
                            &#1585;&#1575; &#1583;&#1585; &#1705;&#1575;&#1585;&#1606;&#1575;&#1605;&#1607; &#1582;&#1608;&#1583;
                            &#1583;&#1575;&#1585;&#1606;&#1583; &#1608; &#1575;&#1586; &#1570;&#1606;&#1580;&#1575;
                            &#1705;&#1607; &#1585;&#1588;&#1583; &#1589;&#1606;&#1593;&#1578; &#1711;&#1585;&#1583;&#1588;&#1711;&#1585;&#1740;
                            &#1585;&#1575; &#1583;&#1594;&#1583;&#1594;&#1607; &#1582;&#1608;&#1583; &#1605;&#1740;&#8204;&#1583;&#1575;&#1606;&#1606;&#1583;&#1548;
                            &#1576;&#1607; &#1711;&#1587;&#1578;&#1585;&#1588; &#1582;&#1583;&#1605;&#1575;&#1578;
                            &#1582;&#1608;&#1583; &#1583;&#1585; &#1586;&#1605;&#1740;&#1606;&#1607; &#1575;&#1580;&#1575;&#1585;&#1607;
                            &#1608;&#1740;&#1604;&#1575; &#1662;&#1585;&#1583;&#1575;&#1582;&#1578;&#1607;&#8204;&#1575;&#1606;&#1583;.</p>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <img src="<?php echo e(asset('img/visitor.svg')); ?>" width="84" height="84"
                             alt="&#1575;&#1608;&#1604;&#1740;&#1606; &#1588;&#1585;&#1705;&#1578; &#1608;&#1740;&#1604;&#1575; &#1607;&#1604;&#1583;&#1585; &#1575;&#1740;&#1585;&#1575;&#1606;&#1740;">
                        <h2>&#1575;&#1608;&#1604;&#1740;&#1606; &#1588;&#1585;&#1705;&#1578; &#1608;&#1740;&#1604;&#1575;
                            &#1607;&#1604;&#1583;&#1585; &#1575;&#1740;&#1585;&#1575;&#1606;&#1740;</h2>
                        <p>&#1608;&#1740;&#1604;&#1705;&#1587;&#1585;&#1548; &#1575;&#1608;&#1604;&#1740;&#1606; &#1588;&#1585;&#1705;&#1578;
                            &#1607;&#1608;&#1575;&#1662;&#1740;&#1605;&#1575;&#1740;&#1740; &#1575;&#1740;&#1585;&#1575;&#1606;&#1740;
                            &#1575;&#1580;&#1575;&#1585;&#1607;&#8204;&#1583;&#1607;&#1606;&#1583;&#1607; &#1608;&#1740;&#1604;&#1575;
                            &#1583;&#1585; &#1587;&#1585;&#1575;&#1587;&#1585; &#1583;&#1606;&#1740;&#1575;&#1548;
                            &#1605;&#1601;&#1578;&#1582;&#1585; &#1575;&#1587;&#1578; &#1705;&#1607; &#1582;&#1583;&#1605;&#1575;&#1578;
                            &#1605;&#1606;&#1581;&#1589;&#1585;&#1576;&#1607;&#8204;&#1601;&#1585;&#1583; &#1608;
                            &#1580;&#1583;&#1740;&#1583;&#1740; &#1585;&#1575; &#1576;&#1607; &#1578;&#1605;&#1575;&#1605;
                            &#1605;&#1587;&#1575;&#1601;&#1585;&#1575;&#1606; &#1575;&#1740;&#1585;&#1575;&#1606;&#1740;
                            &#1575;&#1585;&#1575;&#1574;&#1607; &#1605;&#1740;&#8204;&#1583;&#1607;&#1583;. &#1575;&#1586;
                            &#1575;&#1740;&#1606;&#1705;&#1607; &#1583;&#1585; &#1587;&#1575;&#1582;&#1578;&#1606;
                            &#1582;&#1575;&#1591;&#1585;&#1575;&#1578; &#1582;&#1608;&#1588; &#1605;&#1587;&#1575;&#1601;&#1585;&#1575;&#1606;&#1605;&#1575;&#1606;
                            &#1587;&#1607;&#1740;&#1605; &#1607;&#1587;&#1578;&#1740;&#1605;&#1548; &#1576;&#1607;
                            &#1582;&#1608;&#1583; &#1605;&#1740;&#8204;&#1576;&#1575;&#1604;&#1740;&#1605;.</p>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <img src="<?php echo e(asset('img/sharing.svg')); ?>" width="84" height="84"
                             alt="&#1608;&#1740;&#1688;&#1711;&#1740; &#1608;&#1740;&#1604;&#1705;&#1587;&#1585;">
                        <h2>&#1608;&#1740;&#1688;&#1711;&#1740; &#1608;&#1740;&#1604;&#1705;&#1587;&#1585;</h2>
                        <p>&#1608;&#1740;&#1604;&#1705;&#1587;&#1585; &#1576;&#1607; &#1605;&#1587;&#1575;&#1601;&#1585;&#1575;&#1606;
                            &#1602;&#1583;&#1585;&#1578; &#1575;&#1606;&#1578;&#1582;&#1575;&#1576; &#1605;&#1740;&#8204;&#1583;&#1607;&#1583;.
                            &#1576;&#1575; &#1608;&#1740;&#1604;&#1705;&#1587;&#1585;&#1548; &#1605;&#1587;&#1575;&#1601;&#1585;&#1575;&#1606;
                            &#1575;&#1586; &#1570;&#1586;&#1575;&#1583;&#1740; &#1705;&#1575;&#1605;&#1604; &#1583;&#1585;
                            &#1575;&#1606;&#1578;&#1582;&#1575;&#1576; &#1582;&#1583;&#1605;&#1575;&#1578; &#1576;&#1585;&#1582;&#1608;&#1585;&#1583;&#1575;&#1585;&#1606;&#1583;.
                            &#1605;&#1740;&#8204;&#1578;&#1608;&#1575;&#1606;&#1740;&#1583; &#1662;&#1740;&#1588;
                            &#1575;&#1586; &#1570;&#1594;&#1575;&#1586; &#1587;&#1601;&#1585;&#1548; &#1576;&#1585;&#1575;&#1740;
                            &#1711;&#1588;&#1578;&#8204;&#1607;&#1575;&#1740; &#1578;&#1601;&#1585;&#1740;&#1581;&#1740;
                            &#1582;&#1608;&#1583; &#1576;&#1585;&#1606;&#1575;&#1605;&#1607;&#8204;&#1585;&#1740;&#1586;&#1740;
                            &#1705;&#1606;&#1740;&#1583; &#1608; &#1575;&#1586; &#1587;&#1601;&#1585; &#1582;&#1608;&#1583;
                            &#1604;&#1584;&#1578; &#1576;&#1576;&#1585;&#1740;&#1583;. &#1608;&#1740;&#1604;&#1705;&#1587;&#1585;
                            &#1578;&#1593;&#1591;&#1740;&#1604;&#1575;&#1578; &#1608;&#1740;&#1604;&#1575;&#1740;&#1740;
                            &#1705;&#1575;&#1605;&#1604;&#1575; &#1575;&#1582;&#1578;&#1589;&#1575;&#1589;&#1740;
                            &#1576;&#1607; &#1588;&#1605;&#1575; &#1607;&#1583;&#1740;&#1607; &#1605;&#1740;&#8204;&#1705;&#1606;&#1583;.</p>
                    </div>
                </div>
            </div>
        </section>
        <?php $__env->startPush('scripts'); ?>
            <script>
                $(document).ready(function () {
                    $('.p-head').click(function () {

                        $(this).parent().parent().children('div').slideToggle();


                    });
                });
            </script>
        <?php $__env->stopPush(); ?>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>