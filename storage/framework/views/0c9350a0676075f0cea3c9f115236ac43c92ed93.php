    <?php $__env->slot('title'); ?> <?php if($villa->title): ?> <?php echo e($villa->title); ?> <?php else: ?> ویلکسر <?php endif; ?> <?php $__env->endSlot(); ?>

    <?php $__env->endSlot(); ?>
    <?php $__env->startSection('content'); ?>
        <style>
            @media (max-width: 576px) {
                button.slick-prev.slick-arrow {
                    margin-top: 115px;
                    margin-left: -40px;
                }

                button.slick-next.slick-arrow {
                    margin-top: 115px;
                    margin-right: -40px;
                }

                .sub-header .header-title h3 {
                    margin-top: 0rem !important;
                }

            }

            .property li:after {
                content: '';
            }

            .footer:before {
                background-color: #f8f8f8;
            }

            .header-title p {
                color: white !important;
            }

            .sub-header .header-title {
                margin-top: 11vh !important;
            }

            .draggable {

                margin-bottom: -4rem !important;
            }

            .slick-track {
                margin-top: 38px;
            }

            .slick-next, .slick-prev {
                top: -13rem;
            }

            .slider-for {
                padding-top: 0rem !important;
            }

            .title h6 {
                margin-bottom: 0;
            }

            .social-icon-share li {
                margin-right: 11%;
            }

            .like-icon {
                position: absolute;
                z-index: 99;
                left: 2rem;
                top: 4.5rem;
                width: 3rem;
                height: 3rem;
                margin-top: -4rem;
                background-color: #fff;
                color: #E91E63;
                font-size: 1.5rem;
                border-radius: 50%;
                text-align: center;
                line-height: 2.6;
                transition: all .3s ease-in-out;
            }

            .like-icon:hover, .like-icon.active {
                background-color: #e91e63;
                color: #fff;
                cursor: pointer;
            }

            .kiooo li:hover {
                -ms-transform: scale(1.5);
                -webkit-transform: scale(1.5);
                transform: scale(1.5);
                transition: 0.5s;
            }

            /*i.fa.fa-telegram {*/
            /*color: black;*/
            /*font-size: 32px;*/
            /*}*/

            /*i.fa.fa-instagram {*/
            /*color: black;*/
            /*font-size: 32px;*/
            /*}*/

            /*i.fa.fa-twitter {*/
            /*color: #e91e63;*/
            /*font-size: 32px;*/
            /*}*/

            /*i.fa.fa-facebook-f {*/

            /*color: black;*/
            /*font-size: 32px;*/
            /*}*/

            /*i.fa.fa-linkedin {*/
            /*color: black;*/
            /*font-size: 32px;*/
            /*}*/

            /*i.fa.fa-google-plus {*/
            /*color: black;*/
            /*font-size: 32px;*/
            /*}*/

            /*i.fa.fa-skype {*/
            /*color: black;*/
            /*font-size: 32px;*/
            /*}*/

            /*.social li {*/
            /*margin-top: 0;*/
            /*float: left;*/
            /*}*/

            /*.social {*/
            /*width: 100% !important;*/
            /*}*/

            .icon-share {
                color: black !important;
                font-size: 17px;
                padding-right: 13px;
                padding-left: 13px;
            }

            .header-title h2 {
                color: white;
                font-size: 32px;
                font-weight: bold;
                text-shadow: 0px 0px 10px rgb(0, 0, 0);
            }

            .sub-header .header-title h3 {
                margin-top: 1rem;
                text-shadow: 0px 0px 10px black;
                color: white;
            }

            .villa-price {
                padding: 2rem;
                cursor: pointer;
            }

            @media (max-width: 800px) {

                .post-sidebar ul li {
                    padding: 8px;
                }

                .load-description-price {
                    overflow-x: hidden !important;
                    padding-right: 5px;
                }

                body, html {
                    overflow-x: hidden;
                }

                .post-sidebar ul {
                    width: 100%;
                }

                .villa-price {
                    padding: 5px;
                }

                .sub-header .header-title {
                    margin-top: -1vh !important;
                }

                .slick-track {
                    width: 16000px !important;
                }

                .villa-slider {
                    padding-bottom: 42px !important;
                }

                table {
                    overflow-x: scroll !important;
                }

                .mobile-post-villa {
                    display: block !important;
                }

                .mobile-post-villa-right {
                    display: none !important;
                }

                .padding-15-mobile {
                    padding: 17px !important;
                }

                .slick-track {
                    top: -23px !important;
                    left: 0;
                }

                .slider-nav {
                    padding: 0 1.2rem 0rem !important;
                }
            }

            .mobile-post-villa {
                display: none;
            }

            .nearest {
                font-size: 20px;
            }

            .sub-header {
                margin-top: 0px !important;
            }
        </style>


        <header class="sub-header"

                <?php if(($villa->photo->path)): ?> style="background:url(<?php echo e(url($villa->photo->path)); ?>) center no-repeat;height:450px;background-size:cover;" <?php endif; ?>>
            <div class="container">
                <div class="header-logo" style="margin-top: -80px;margin-right: -15px;">
                    <a href="<?php echo e(url('/')); ?>"><img style="width: 200px"
                                                  src="<?php echo e(asset('uploads/file/1398-08-21/photos/istanbul.png')); ?>"
                                                  alt="logo"></a>
                </div>
                <div class="header-title">
                    <h2><?php echo e($villa->name); ?></h2>
                    <h3 style="font-size: 16px"><b><?php echo e($villa->district); ?> &#1548; <?php echo e($villa->location->name); ?></b></h3>
                </div>
            </div>
        </header>



        <section class="section" data-direction="rtl">
            <div class="container" style="margin-top: -70px;">
                <div class="row">
                    <div class="col-md-4">
                        <aside class="post-sidebars">
                            <div class="post-sidebar mb-4">
                                <div class="">


                                    <?php if(Auth::user()): ?>
                                        <?php
                                            $like = App\Like::where('likable_type' , 'App\Villa')->where('likable_id' , $villa->id)->where('user_id' , Auth::user()->id)->first();
                                        ?>
                                    <?php else: ?>
                                        <?php
                                            $like = null
                                        ?>
                                    <?php endif; ?>


                                    <h3 style="font-size: 16px">&#1575;&#1591;&#1604;&#1575;&#1593;&#1575;&#1578;
                                        &#1605;&#1607;&#1605; &#1608;&#1740;&#1604;&#1575;</h3>
                                    <span class="like-icon <?php if(!is_null($like)): ?> active animated bounce <?php endif; ?>"
                                          <?php if(auth()->guard()->check()): ?> data-id="<?php echo e($villa->id); ?>" <?php endif; ?>><i
                                            class="nc-icon ui-2_favourite-28"></i></span>
                                </div>
                                <?php
                                    $properties = unserialize($villa->properties);

                                     if ($villa->villa_place != 'N;'){
                                        $villa_places = unserialize($villa->villa_place);
                                        }else{
                                        $villa_places = [];
                                        }
                                ?>
                                <ul>


                                    <li><strong><img src="<?php echo e(asset('img/villas/map.svg')); ?>" class="ml-2" width="18"
                                                     height="18"
                                                     alt="&#1605;&#1581;&#1604; &#1608;&#1740;&#1604;&#1575;">&#1605;&#1581;&#1604;
                                            &#1608;&#1740;&#1604;&#1575; :
                                        </strong><?php echo e($villa->district); ?></li>


                                    <li>
                                        <strong><img src="<?php echo e(asset('img/villas/park.svg')); ?>" class="ml-2" width="18"
                                                     height="18"
                                                     alt="&#1605;&#1608;&#1602;&#1593;&#1740;&#1578; &#1608;&#1740;&#1604;&#1575;">&#1605;&#1608;&#1602;&#1593;&#1740;&#1578;
                                            &#1608;&#1740;&#1604;&#1575; :

                                        </strong>
                                        <?php $__currentLoopData = $villa_places; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $villa_place): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(count($villa_places) == 0): ?>
                                                -
                                            <?php endif; ?>
                                            <?php if(count($villa_places) == 1): ?>
                                                <?php if(count($villa_place) >= 1): ?> <?php echo e(villa_place($villa_place)); ?>  <?php endif; ?>
                                            <?php else: ?>
                                                <?php if(count($villa_place) >= 1): ?> <?php echo e(villa_place($villa_place)); ?>

                                                -
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </li>

                                    <li><strong><img src="<?php echo e(asset('img/villas/villa.svg')); ?>" class="ml-2" width="18"
                                                     height="18"
                                                     alt="&#1601;&#1590;&#1575;&#1740; &#1608;&#1740;&#1604;&#1575;">&#1601;&#1590;&#1575;&#1740;
                                            &#1705;&#1604; &#1608;&#1740;&#1604;&#1575; :
                                        </strong><?php echo e($villa->space); ?>

                                    </li>


                                    <li><strong><img src="<?php echo e(asset('img/villas/pool.svg')); ?>" class="ml-2" width="18"
                                                     height="18"
                                                     alt="&#1601;&#1590;&#1575;&#1740; &#1575;&#1587;&#1578;&#1582;&#1585;">&#1601;&#1590;&#1575;&#1740;
                                            &#1575;&#1587;&#1578;&#1582;&#1585; :
                                        </strong><?php echo e($villa->pool_space); ?></li>

                                    <li><strong><img src="<?php echo e(asset('img/villas/bedroom.svg')); ?>" class="ml-2" width="18"
                                                     height="18"
                                                     alt="&#1578;&#1593;&#1583;&#1575;&#1583; &#1575;&#1578;&#1575;&#1602;">&#1578;&#1593;&#1583;&#1575;&#1583;
                                            &#1575;&#1578;&#1575;&#1602; :
                                        </strong><?php echo e($villa->number_of_rooms); ?></li>


                                    <li><strong><img src="<?php echo e(asset('img/villas/people.svg')); ?>" class="ml-2" width="18"
                                                     height="18"
                                                     alt="&#1592;&#1585;&#1601;&#1740;&#1578; &#1605;&#1587;&#1575;&#1601;&#1585;">&#1592;&#1585;&#1601;&#1740;&#1578;
                                            &#1605;&#1587;&#1575;&#1601;&#1585; :
                                        </strong><?php echo e($villa->max_passenger); ?></li>


                                    <li>
                                        <strong><img src="<?php echo e(asset('img/villas/toilet.svg')); ?>" class="ml-2" width="18"
                                                     height="18"
                                                     alt="&#1578;&#1593;&#1583;&#1575;&#1583; &#1587;&#1585;&#1608;&#1740;&#1587; &#1576;&#1607;&#1583;&#1575;&#1588;&#1578;&#1740;">&#1578;&#1593;&#1583;&#1575;&#1583;
                                            &#1587;&#1585;&#1608;&#1740;&#1587; &#1576;&#1607;&#1583;&#1575;&#1588;&#1578;&#1740;
                                            :
                                        </strong><?php echo e($villa->number_of_wc); ?></li>


                                    <li><strong><img src="<?php echo e(asset('img/villas/maid.svg')); ?>" class="ml-2" width="18"
                                                     height="18"
                                                     alt="&#1578;&#1593;&#1583;&#1575;&#1583; &#1582;&#1583;&#1605;&#1578;&#1705;&#1575;&#1585;&#1575;&#1606;">&#1578;&#1593;&#1583;&#1575;&#1583;
                                            &#1582;&#1583;&#1605;&#1578;&#1705;&#1575;&#1585;&#1575;&#1606; :
                                        </strong>
                                        <?php if($villa->number_of_servants == 0): ?>
                                            &#1606;&#1583;&#1575;&#1585;&#1583;
                                        <?php else: ?>
                                            <?php echo e($villa->number_of_servants); ?>

                                        <?php endif; ?>

                                    </li>

                                    <?php if($villa->properties_in!='N;'): ?>
                                    <li>

                                        <strong>
                                            <img src="<?php echo e(asset('img/villas/breakfast.svg')); ?>" class="ml-2" width="18"
                                                 height="18" alt="&#1589;&#1576;&#1581;&#1575;&#1606;&#1607;">صبحانه
                                            رایگان :
                                        </strong>
                                        <?php
                                            $villa_breakfast = unserialize($villa->properties_in);
                                            if(in_array(96, $villa_breakfast)){
                                            $breakfast = '&#1583;&#1575;&#1585;&#1583;';
                                            }else {
                                            $breakfast = '&#1606;&#1583;&#1575;&#1585;&#1583;';
                                            }
                                        ?>

                                        <?php echo $breakfast; ?>

                                    </li>
                                    <?php endif; ?>
                                    <?php if($villa->properties_out!='N;'): ?>
                                    <li><strong><img src="<?php echo e(asset('img/villas/car.svg')); ?>" class="ml-2"
                                                     width="18"
                                                     height="18"
                                                     alt="&#1578;&#1585;&#1575;&#1606;&#1587;&#1601;&#1585;">ترانسفر
                                            رایگان :
                                        </strong>

                                        <?php
                                            $villa_car = unserialize($villa->properties_out);
                                            if(in_array(70, $villa_car)){
                                            $car = '&#1583;&#1575;&#1585;&#1583;';
                                            }else {
                                            $car = '&#1606;&#1583;&#1575;&#1585;&#1583;';
                                            }
                                        ?>

                                        <?php echo $car; ?>



                                    </li>
                                    <?php endif; ?>
                                    <?php if($villa->properties_in!='N;'): ?>
                                    <li><strong><img src="<?php echo e(asset('img/villas/wifi.svg')); ?>" class="ml-2"
                                                     width="18"
                                                     height="18"
                                                     alt="&#1575;&#1740;&#1606;&#1578;&#1585;&#1606;&#1578;">&#1575;&#1740;&#1606;&#1578;&#1585;&#1606;&#1578;
                                            :
                                        </strong>

                                        <?php
                                            $villa_wifi = unserialize($villa->properties_in);
                                            if(in_array(45, $villa_wifi)){
                                            $wifi = '&#1583;&#1575;&#1585;&#1583;';
                                            }else {
                                            $wifi = '&#1606;&#1583;&#1575;&#1585;&#1583;';
                                            }
                                        ?>

                                        <?php echo $wifi; ?>


                                    </li>
                                    <?php endif; ?>

                                    <li>
                                        <strong><img src="<?php echo e(asset('img/villas/price-tag.svg')); ?>" class="ml-2"
                                                     width="18"
                                                     height="18"
                                                     alt="&#1602;&#1740;&#1605;&#1578; &#1608;&#1740;&#1604;&#1575;">
                                            قیمت ویلا :
                                        </strong>
                                        <span class="numberPrice"> <?php echo e($villa->price); ?> </span> <?php if($villa->price_type == 'rial'): ?>
                                            &#1585;&#1740;&#1575;&#1604;
                                        <?php elseif($villa->price_type == 'dollar'): ?>
                                            &#1583;&#1604;&#1575;&#1585;
                                        <?php elseif($villa->price_type == 'euro'): ?>
                                            &#1740;
                                            &#1608;&#1585;&#1608;
                                        <?php elseif($villa->price_type == 'lira'): ?>
                                            لیر
                                        <?php endif; ?>
                                        روزانه
                                    </li>


                                    <li><strong><img src="<?php echo e(asset('img/villas/rich.svg')); ?>" class="ml-2" width="18"
                                                     height="18" alt="&#1578;&#1582;&#1601;&#1740;&#1601;">&#1578;&#1582;&#1601;&#1740;&#1601;
                                            :
                                        </strong><?php if($villa->discount): ?> <?php echo e(percent($villa->price, $villa->discount)); ?> <?php else: ?>
                                            &#1606;&#1583;&#1575;&#1585;&#1583; <?php endif; ?></li>


                                    <div class="social-buttons-section-post">


                                        <ul style="box-shadow: 1px 1px 6px 2px #eee;display: flex !important;padding: 7px;border-radius: 31px"
                                            class="social-icon-share kiooo">

                                            <a style="padding-top: 11px;border-left: 1px solid #eee">
                                                <li><i style="color: black !important"
                                                       class="fa fa-share-alt icon-share" aria-hidden="true"></i>
                                                </li>
                                            </a>


                                            <a target="_blank" style="margin-top: 11px"
                                               title="&#1575;&#1588;&#1578;&#1585;&#1575;&#1705; &#1711;&#1584;&#1575;&#1585;&#1740; &#1583;&#1585; &#1578;&#1604;&#1711;&#1585;&#1575;&#1605;"
                                               href="https://telegram.me/share/url?url=<?php echo e(url('/villa/' . $villa->slug)); ?>&text=<?php echo e($villa->name); ?>">
                                                <li><i style="color: #229acc !important"
                                                       class="fa fa-telegram icon-share"></i>
                                                </li>
                                            </a>
                                            <a target="_blank" style="margin-top: 11px"
                                               title="&#1575;&#1588;&#1578;&#1585;&#1575;&#1705; &#1711;&#1584;&#1575;&#1585;&#1740; &#1583;&#1585; &#1601;&#1740;&#1587; &#1576;&#1608;&#1705;"
                                               href="https://www.facebook.com/sharer.php?u=<?php echo e(url('/villa/' . $villa->slug)); ?>t=<?php echo e($villa->name); ?>">
                                                <li class="facebook-icon"><i style="color: #0274b3 !important"
                                                                             class="fa fa-facebook-f icon-share"></i>
                                                </li>
                                            </a>

                                            <a href="https://twitter.com/home?status=<?php echo e($villa->name); ?>A<?php echo e(url('/villa/' . $villa->slug)); ?>"
                                               target="_blank" style="margin-top: 11px"
                                               title="&#1575;&#1588;&#1578;&#1585;&#1575;&#1705; &#1711;&#1584;&#1575;&#1585;&#1740; &#1583;&#1585; &#1578;&#1608;&#1740;&#1740;&#1578;&#1585;">
                                                <li class="twitter-icon"><i style="color: #52cbff  !important"
                                                                            class="fa fa-twitter icon-share"></i></li>
                                            </a>

                                            <a href="https://instagram.com/share?url=<?php echo e(url('/villa/' . $villa->slug)); ?>"
                                               target="_blank" style="margin-top: 11px"
                                               title="&#1575;&#1588;&#1578;&#1585;&#1575;&#1705; &#1711;&#1584;&#1575;&#1585;&#1740; &#1583;&#1585; &#1575;&#1740;&#1606;&#1587;&#1578;&#1575;&#1711;&#1585;&#1575;&#1605;">
                                                <li class="google-icon"><i style="color: #ea4335  !important"
                                                                           class="fa fa-instagram icon-share"></i>
                                                </li>
                                            </a>

                                        </ul>
                                    </div>


                                </ul>
                            </div>
                            <div class="buttonsforbook">
                                <a id="inquire-now-button">&#1585;&#1586;&#1585;&#1608;</a>
                                <a id="book-now-button">&#1608;&#1740;&#1586;&#1575;</a>
                            </div>
                            <!-- Begin Taghvim -->
                        
                        
                        
                        
                        <!-- End Taghvim -->
                            <div class="post-sidebar text-justify mb-4 mobile-post-villa-right">
                                <h4 style="font-size: 18px">چرا با ما سفر بروید؟</h4>
                                <ul>
                                    <li><h5 style="font-size: 12px"><i class="fa fa-check-circle ml-2"
                                                                       style="color: #e8c060;font-size: 15px;position: relative;top: 2px;"></i>
                                            گارانتی بهترین قیمت
                                            :</h5></li>
                                </ul>

                                <p>با تلاش فراوان بهترین املاک ممکن در ترکیه را با توجه به علایق مسافران ایرانی، با بهترین قیمت و امکانات متفاوت پیدا میکنیم. </p>

                                <ul>
                                    <li><h5 style="font-size: 12px"><i class="fa fa-check-circle ml-2"
                                                                       style="color: #e8c060;font-size: 15px;position: relative;top: 2px;"></i>
                                            تنها ارائه‌دهندهٔ خدمات اقامتی در ترکیه هستیم که سیستماتیک این کار را انجام میدهیم  :</h5></li>
                                </ul>

                                <p>همواره به دنبال فراهم‌کردن بهترین کیفیت و خدمات سفر برای مسافرانمان هستیم. استانبول سرویس اقامت راحتی را در املاک اجاره ای خود برای شما در طول سفر فراهم
                                    می‌کند.</p>

                                <ul>
                                    <li><h5 style="font-size: 12px"><i class="fa fa-check-circle ml-2"
                                                                       style="color: #e8c060;font-size: 15px;position: relative;top: 2px;"></i>
                                            بهترین خانه ها با کیفیت خوب در مناطق مختلف شهر:</h5></li>
                                </ul>

                                <p>ما به کیفیت محل اقامت و تفریحات مسافرانمان حساس هستیم. در انتخاب آپارتمانها تنها به چشم‌انداز بی‌نظیر بسنده نمی‌کنیم و استانداردهای ما طیف گسترده‌ای از امکانات را در بر می‌گیرد تا اقامت دلچسبی برای شما فراهم کند.</p>

                                <ul>
                                    <li><h5 style="font-size: 12px"><i class="fa fa-check-circle ml-2"
                                                                       style="color: #e8c060;font-size: 15px;position: relative;top: 2px;"></i>
                                            ارائه خدمات جانبی:</h5></li>
                                </ul>

                                <p>مهیا کردن بهترین مکان برای اقامت در سفر، تنها هدف ما نیست. استانبول سرویس با فراهم‌کردن سایر خدمات تفریحی از جمله گشت‌های تفریحی، تفریحات آبی، اجاره کشتی های خصوصی و نیمه خصوصی، استفاده از زمین تنیس و گلف و... سفر را برای شما خاطره‌انگیز می‌کند. پیش از سفر، با برنامهٔ سفر خود آشنا شوید.</p>

                                <ul>
                                    <li><h5 style="font-size: 12px"><i class="fa fa-check-circle ml-2"
                                                                       style="color: #e8c060;font-size: 15px;position: relative;top: 2px;"></i>ترانسفر فرودگاهی :</h5></li>
                                </ul>

                                <p>با توجه به اینکه هزینه سفر های شهری در ترکیه بالاست و همچنین فرودگاه جدید استانبول بسیار دور از ظهر میباشد و بجز اتوبوس و تاکسی وسیله دیگری برای ترانسفر نمی باشد استانبول سرویس خودروهای با قیمت بسیار مناسب را برای جا به جایی در شهر تهیه کرده است.</a></p>
                            </div>
                            <div class="post-sidebar mb-4" style="padding: 15px;">
                                <div class="google-map" id="google-map-area" style="width:100%;height:250px"></div>
                            </div>
                        </aside>
                    </div>
                    <div class="col-md-8">
                        <?php if($villa->gallery): ?>
                            <div class="villa-slider" data-direction="ltr">
                                <div class="slider slider-for mb-4">
                                    <?php $__currentLoopData = $villa->gallery->photo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div><img src="<?php echo e(url($photo->path)); ?>"
                                                  alt="<?php if($photo->name): ?> <?php echo e($photo->name); ?> <?php endif; ?>"></div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="slider slider-nav">
                                    <?php $__currentLoopData = $villa->gallery->photo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div><img style="width: 104px;height: 57px;" src="<?php echo e(url($photo->path)); ?>"
                                                  alt="<?php if($photo->name): ?> <?php echo e($photo->name); ?> <?php endif; ?>">
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php elseif($villa->photo): ?>
                            <div class="villa-slider" data-direction="ltr">
                                <div class="slider slider-for mb-4">
                                    <?php if(isset($villa->photo)): ?>
                                        <div><img src="<?php echo e(url($villa->photo->path)); ?>"
                                                  alt="<?php if($villa->photo->name): ?> <?php echo e($villa->photo->name); ?> <?php endif; ?>"></div>
                                    <?php endif; ?>
                                </div>
                                <div class="slider slider-nav">
                                    <?php if(isset($villa->photo)): ?>
                                        <div><img style="width: 104px;height: 57px;"
                                                  src="<?php echo e(url($villa->photo->path)); ?>"
                                                  alt="<?php if($villa->photo->name): ?> <?php echo e($villa->photo->name); ?> <?php endif; ?>"></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>


                        <div class="villa-body p-0">
                            <div style="padding:2rem">
                                <div class="text-justify">
                                    <?php echo html_entity_decode($villa->body); ?>

                                </div>
                            </div>
                            <div class="item-stars mt-5">
                                <span><i class="fa fa-thumbs-o-up ml-2"></i>&#1575;&#1605;&#1578;&#1740;&#1575;&#1586; : <?php echo e(rank($rank, '&#1576;&#1583;&#1608;&#1606; &#1575;&#1605;&#1578;&#1740;&#1575;&#1586;')); ?></span>
                                <span class="mx-3">|</span>
                                <span><i class="fa fa-eye ml-2"></i>&#1578;&#1593;&#1583;&#1575;&#1583; &#1576;&#1575;&#1586;&#1583;&#1740;&#1583; : <?php echo e($villa->seen->count()); ?></span>
                            </div>
                        </div>

                        <div class="villa-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php if($villa->properties_in!='N;'): ?>
                                    <?php
                                        $properties_in = unserialize($villa->properties_in);
                                    ?>
                                    <h4 style="font-size: 18px;" class="text-center mb-4">&#1575;&#1605;&#1705;&#1575;&#1606;&#1575;&#1578;
                                        &#1583;&#1575;&#1582;&#1604; &#1608;&#1740;&#1604;&#1575;</h4>
                                    <ul class="villa-propery">
                                        <?php $__currentLoopData = $properties_in; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(isset(property($property)->name)): ?>

                                                <li data-toggle="tooltip" title="<?php echo e(property($property)->name); ?>">
                                                    <?php if(isset(property($property)->photo) && property($property)->photo): ?>
                                                        <?php if(isset(property($property)->photo->path)): ?>

                                                            <img src="<?php echo e(url(property($property)->photo->path)); ?>"
                                                                 width="25"
                                                                 height="25"
                                                                 alt="<?php echo e(property($property)->name); ?>">
                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                    <p><?php echo e(property($property)->name); ?></p>
                                                </li>
                                            <?php endif; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <?php if($villa->properties_out!='N;'): ?>
                                    <?php
                                        $properties_out = unserialize($villa->properties_out);
                                    ?>
                                    <h4 style="font-size: 18px" class="text-center mb-4">&#1575;&#1605;&#1705;&#1575;&#1606;&#1575;&#1578;
                                        &#1582;&#1575;&#1585;&#1580; &#1608;&#1740;&#1604;&#1575;</h4>
                                    <ul class="villa-propery">
                                        <?php $__currentLoopData = $properties_out; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <?php if(isset(property($property)->name)): ?>
                                                <li data-toggle="tooltip" title="<?php echo e(property($property)->name); ?>">
                                                    <?php if(isset(property($property)->photo) && property($property)->photo): ?>
                                                        <?php if(isset(property($property)->photo->path)): ?>
                                                            <img src="<?php echo e(url(property($property)->photo->path)); ?>"
                                                                 width="25"
                                                                 height="25"
                                                                 alt="<?php echo e(property($property)->name); ?>">
                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                    <p><?php echo e(property($property)->name); ?></p>
                                                </li>
                                            <?php endif; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>


                        <div class="villa-body services">
                            <h2 style="font-size: 18px;" class="text-center mb-4">&#1582;&#1583;&#1605;&#1575;&#1578;
                                &#1608; &#1587;&#1585;&#1608;&#1740;&#1587;
                                &#1607;&#1575;&#1740; &#1608;&#1740;&#1604;&#1575;&#1740; <?php echo e($villa->name); ?></h2>
                            <?php echo $villa->services; ?>

                            <hr class="my-5">
                            <h2 style="font-size: 18px" class="text-center mb-4">&#1575;&#1591;&#1604;&#1575;&#1593;&#1575;&#1578;
                                &#1605;&#1601;&#1740;&#1583;
                                &#1608;&#1740;&#1604;&#1575;&#1740; <?php echo e($villa->name); ?></h2>
                            <div style="overflow-x: auto;">
                                <?php echo $villa->information; ?>

                            </div>
                        </div>

                        <div class="boxes">
                            <?php if($villa->prices != 'N;'): ?>
                                <div class="villa-body villa-price">
                                    <?php
                                        $prices = unserialize($villa->prices);
                                    ?>
                                    <div class="dropdown-load">
                                        <h3 style="font-size: 16px" class="change-drop padding-15-mobile">&#1602;&#1740;&#1605;&#1578;
                                            &#1575;&#1580;&#1575;&#1585;&#1607;&#8204;&#1740;
                                            &#1608;&#1740;&#1604;&#1575;&#1740; <?php echo e($villa->name); ?><i
                                                class="fa fa-angle-down fa-down-p"></i></h3>
                                        <div class="load-description-price" style="display: none">
                                            <hr/>
                                            <div class="row mb-4" style="margin-right: -80px;">
                                                <div class="col-5 mx-auto">
                                                    <select id="rooms" class="form-control selectpicker ml-2">
                                                        <?php $__currentLoopData = $prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price => $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option style="margin-right: 5px"
                                                                    value="room-<?php echo e($room[0]); ?>"><?php echo e($room[0]); ?> &#1575;&#1578;&#1575;&#1602;
                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    <select id="prices-type" class="form-control selectpicker">
                                                        <option style="margin-right: 5px" value="default">1 &#1588;&#1576;
                                                            &#1740;&#1575; &#1576;&#1740;&#1588;&#1578;&#1585;
                                                        </option>
                                                        <?php if($villa->last_discount == 'yes'): ?>
                                                            <option style="padding-right: 5px" value="last">10 &#1588;&#1576;
                                                                &#1740;&#1575;
                                                                &#1576;&#1740;&#1588;&#1578;&#1585;
                                                            </option>
                                                        <?php endif; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php $__currentLoopData = $prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price => $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <table class="table rooms room-<?php echo e($room[0]); ?> text-center"
                                                       style="display: none">
                                                    <thead>
                                                    <th>&#1575;&#1586; &#1578;&#1575;&#1585;&#1740;&#1582;</th>
                                                    <th>&#1578;&#1575; &#1578;&#1575;&#1585;&#1740;&#1582;</th>
                                                    <th>&#1581;&#1583;&#1575;&#1602;&#1604; &#1586;&#1605;&#1575;&#1606;
                                                        &#1575;&#1602;&#1575;&#1605;&#1578;
                                                    </th>
                                                    <th style="    padding: 0 20px 0 20px !important;">&#1602;&#1740;&#1605;&#1578;</th>
                                                    </thead>
                                                    <tbody>
                                                    <?php if(isset($room['date_in'])): ?>
                                                        <?php $__currentLoopData = $room['date_in']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $num => $date_in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td><?php echo e($date_in); ?></td>
                                                                <td><?php echo e($room['date_out'][$num]); ?></td>
                                                                <td>
                                                                    <?php if($room['min'][$num] != 0 && !is_null($room['min'][$num])): ?><?php echo e($room['min'][$num]); ?>

                                                                    &#1588;&#1576;
                                                                    <?php else: ?>
                                                                        ---
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td>
                                                                    <?php if($room['some_price'][$num] == ''): ?>
                                                                        ---
                                                                    <?php else: ?>
                                                                        <span class="defaut-price numberPrice">
                                                                        <?php if(!is_null($room['some_price'][$num]) && $room['some_price'][$num] !=  ''): ?>

                                                                                <?php echo e($room['some_price'][$num]); ?>


                                                                            <?php else: ?>
                                                                                ---
                                                                            <?php endif; ?>

                                                                    </span>
                                                                        <span class="last-price"
                                                                              style="display: none"><?php if(isset($room['some_price_last'][$num] )): ?><?php echo e($room['some_price_last'][$num]); ?><?php endif; ?></span>

                                                                        <?php if(!is_null($room['some_price'][$num]) && $room['some_price'][$num] != '' && $room['some_price'][$num] != 0): ?>

                                                                            <?php if($room['some_price_type'][$num] == 'rial'): ?>
                                                                                &#1585;&#1740;&#1575;&#1604;
                                                                            <?php elseif($room['some_price_type'][$num] == 'dollar'): ?>
                                                                                &#1583;&#1604;&#1575;&#1585;
                                                                            <?php elseif($room['some_price_type'][$num] == 'euro'): ?>
                                                                                &#1740;&#1608;&#1585;&#1608;
                                                                            <?php endif; ?>
                                                                            برای هرشب
                                                                        <?php else: ?>
                                                                            ---

                                                                        <?php endif; ?>

                                                                    <?php endif; ?>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                    </tbody>
                                                </table>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <p class="text-grey-400 text-size-small mt-4"><?php if(isset($villa->price_desc )): ?><?php echo $villa->price_desc; ?><?php endif; ?></p>
                                        </div>
                                    </div>

                                </div>
                            <?php endif; ?>



                            <?php if($villa->descriptions != 'N;'): ?>
                                <?php
                                    $g_title = null
                                ?>
                                <?php
                                    $descriptions = unserialize($villa->descriptions);
                                ?>
                                <?php $__currentLoopData = $descriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $description): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($description['title'] == '&#1608;&#1740;&#1583;&#1574;&#1608;'): ?>
                                        <?php
                                            $g_title = $description['title'];
                                            $g_description = $description['description'];
                                        ?>
                                    <?php else: ?>
                                        <?php
                                            $g_title = null;
                                            $g_description = null;
                                        ?>
                                        <div class="villa-body" style="padding: 2rem; cursor: pointer">
                                            <div class="dropdown-load">
                                                <h3 style="font-size: 16px"
                                                    class="change-drop"><?php echo e($description['title']); ?><i
                                                        class="fa fa-angle-down fa-down-p"></i></h3>
                                                <div class="load-description" style="display: none">
                                                    <hr/>
                                                    <p class="text-justify"><?php echo $description['description']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>

                        <?php if($g_title != null): ?>
                            <div class="row">
                                <div class="col-md-12 my-5">
                                    <h4 class="mb-3">&#1601;&#1740;&#1604;&#1605;
                                        &#1608;&#1740;&#1604;&#1575;&#1740; <?php echo e($villa->name); ?></h4>
                                    <?php echo $g_description; ?>

                                </div>
                            </div>
                        <?php endif; ?>


                        <div class="float-right post-sidebar text-justify  w-100 mb-3 mt-3 mobile-post-villa">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4 style="font-size: 18px">&#1670;&#1585;&#1575; &#1576;&#1575; &#1608;&#1740;&#1604;&#1705;&#1587;&#1585;
                                        &#1587;&#1601;&#1585; &#1576;&#1585;&#1608;&#1740;&#1583;&#1567;</h4>
                                    <ul>
                                        <li><h5 style="font-size: 12px"><i class="fa fa-check-circle ml-2"
                                                                           style="color: #e8c060;font-size: 15px;position: relative;top: 2px;"></i>
                                                &#1711;&#1575;&#1585;&#1575;&#1606;&#1578;&#1740;
                                                &#1576;&#1607;&#1578;&#1585;&#1740;&#1606; &#1602;&#1740;&#1605;&#1578;
                                                :</h5></li>
                                    </ul>

                                    <p>&#1576;&#1575; &#1578;&#1604;&#1575;&#1588; &#1601;&#1585;&#1575;&#1608;&#1575;&#1606;
                                        &#1576;&#1607;&#1578;&#1585;&#1740;&#1606; &#1608;&#1740;&#1604;&#1575;&#1607;&#1575;&#1740;
                                        &#1605;&#1605;&#1705;&#1606; &#1583;&#1585; &#1605;&#1602;&#1575;&#1589;&#1583;
                                        &#1605;&#1582;&#1578;&#1604;&#1601; &#1585;&#1575; &#1576;&#1575; &#1578;&#1608;&#1580;&#1607;
                                        &#1576;&#1607; &#1593;&#1604;&#1575;&#1740;&#1602; &#1605;&#1587;&#1575;&#1601;&#1585;&#1575;&#1606;
                                        &#1575;&#1740;&#1585;&#1575;&#1606;&#1740;&#1548;
                                        &#1576;&#1575; &#1576;&#1607;&#1578;&#1585;&#1740;&#1606; &#1602;&#1740;&#1605;&#1578;
                                        &#1605;&#1605;&#1705;&#1606; &#1662;&#1740;&#1583;&#1575; &#1705;&#1585;&#1583;&#1607;&#8204;&#1575;&#1740;&#1605;.&nbsp;</p>

                                    <ul>
                                        <li><h5 style="font-size: 12px"><i class="fa fa-check-circle ml-2"
                                                                           style="color: #e8c060;font-size: 15px;position: relative;top: 2px;"></i>
                                                &#1578;&#1606;&#1607;&#1575;
                                                &#1575;&#1585;&#1575;&#1574;&#1607;&#8204;&#1583;&#1607;&#1606;&#1583;&#1607;&#1620;
                                                &#1582;&#1583;&#1605;&#1575;&#1578; &#1575;&#1602;&#1575;&#1605;&#1578;&#1740;
                                                &#1583;&#1585; &#1608;&#1740;&#1604;&#1575;&#1607;&#1575;&#1740; &#1575;&#1582;&#1578;&#1589;&#1575;&#1589;&#1740;
                                                :</h5></li>
                                    </ul>

                                    <p>&#1607;&#1605;&#1608;&#1575;&#1585;&#1607; &#1576;&#1607; &#1583;&#1606;&#1576;&#1575;&#1604;
                                        &#1601;&#1585;&#1575;&#1607;&#1605;&#8204;&#1705;&#1585;&#1583;&#1606; &#1576;&#1607;&#1578;&#1585;&#1740;&#1606;
                                        &#1705;&#1740;&#1601;&#1740;&#1578; &#1608; &#1582;&#1583;&#1605;&#1575;&#1578;
                                        &#1587;&#1601;&#1585; &#1576;&#1585;&#1575;&#1740; &#1605;&#1587;&#1575;&#1601;&#1585;&#1575;&#1606;&#1605;&#1575;&#1606;
                                        &#1607;&#1587;&#1578;&#1740;&#1605;. &#1608;&#1740;&#1604;&#1705;&#1587;&#1585;
                                        &#1575;&#1602;&#1575;&#1605;&#1578; &#1585;&#1575;&#1581;&#1578;&#1740; &#1585;&#1575;
                                        &#1583;&#1585; &#1608;&#1740;&#1604;&#1575;&#1607;&#1575;&#1740; &#1575;&#1582;&#1578;&#1589;&#1575;&#1589;&#1740;
                                        &#1576;&#1585;&#1575;&#1740; &#1588;&#1605;&#1575; &#1583;&#1585; &#1591;&#1608;&#1604;
                                        &#1587;&#1601;&#1585; &#1601;&#1585;&#1575;&#1607;&#1605; &#1605;&#1740;&#8204;&#1705;&#1606;&#1583;.</p>

                                    <ul>
                                        <li><h5 style="font-size: 12px"><i class="fa fa-check-circle ml-2"
                                                                           style="color: #e8c060;font-size: 15px;position: relative;top: 2px;"></i>
                                                &#1576;&#1607;&#1578;&#1585;&#1740;&#1606;
                                                &#1608;&#1740;&#1604;&#1575; &#1576;&#1575; &#1576;&#1607;&#1578;&#1585;&#1740;&#1606;
                                                &#1705;&#1740;&#1601;&#1740;&#1578; :</h5></li>
                                    </ul>

                                    <p>&#1605;&#1575; &#1576;&#1607; &#1705;&#1740;&#1601;&#1740;&#1578; &#1605;&#1581;&#1604;
                                        &#1575;&#1602;&#1575;&#1605;&#1578; &#1608; &#1578;&#1601;&#1585;&#1740;&#1581;&#1575;&#1578;
                                        &#1605;&#1587;&#1575;&#1601;&#1585;&#1575;&#1606;&#1605;&#1575;&#1606; &#1581;&#1587;&#1575;&#1587;
                                        &#1607;&#1587;&#1578;&#1740;&#1605;. &#1583;&#1585; &#1575;&#1606;&#1578;&#1582;&#1575;&#1576;
                                        &#1608;&#1740;&#1604;&#1575;&#1607;&#1575; &#1578;&#1606;&#1607;&#1575; &#1576;&#1607;
                                        &#1670;&#1588;&#1605;&#8204;&#1575;&#1606;&#1583;&#1575;&#1586; &#1576;&#1740;&#8204;&#1606;&#1592;&#1740;&#1585;
                                        &#1576;&#1587;&#1606;&#1583;&#1607; &#1606;&#1605;&#1740;&#8204;&#1705;&#1606;&#1740;&#1605;
                                        &#1608; &#1575;&#1587;&#1578;&#1575;&#1606;&#1583;&#1575;&#1585;&#1583;&#1607;&#1575;&#1740;
                                        &#1605;&#1575; &#1591;&#1740;&#1601; &#1711;&#1587;&#1578;&#1585;&#1583;&#1607;&#8204;&#1575;&#1740;
                                        &#1575;&#1586; &#1575;&#1605;&#1705;&#1575;&#1606;&#1575;&#1578; &#1585;&#1575;
                                        &#1583;&#1585; &#1576;&#1585;
                                        &#1605;&#1740;&#8204;&#1711;&#1740;&#1585;&#1583; &#1578;&#1575; &#1575;&#1602;&#1575;&#1605;&#1578;
                                        &#1583;&#1604;&#1670;&#1587;&#1576;&#1740; &#1576;&#1585;&#1575;&#1740; &#1588;&#1605;&#1575;
                                        &#1601;&#1585;&#1575;&#1607;&#1605; &#1705;&#1606;&#1583;.</p>

                                    <ul>
                                        <li><h5 style="font-size: 12px"><i class="fa fa-check-circle ml-2"
                                                                           style="color: #e8c060;font-size: 15px;position: relative;top: 2px;"></i>
                                                &#1575;&#1585;&#1575;&#1574;&#1607;
                                                &#1582;&#1583;&#1605;&#1575;&#1578; &#1580;&#1575;&#1606;&#1576;&#1740;
                                                :</h5></li>
                                    </ul>

                                    <p>&#1605;&#1607;&#1740;&#1575; &#1705;&#1585;&#1583;&#1606; &#1576;&#1607;&#1578;&#1585;&#1740;&#1606;
                                        &#1605;&#1705;&#1575;&#1606; &#1576;&#1585;&#1575;&#1740; &#1575;&#1602;&#1575;&#1605;&#1578;
                                        &#1583;&#1585; &#1587;&#1601;&#1585;&#1548; &#1578;&#1606;&#1607;&#1575; &#1607;&#1583;&#1601;
                                        &#1605;&#1575; &#1606;&#1740;&#1587;&#1578;. &#1608;&#1740;&#1604;&#1705;&#1587;&#1585;
                                        &#1576;&#1575; &#1601;&#1585;&#1575;&#1607;&#1605;&#8204;&#1705;&#1585;&#1583;&#1606;
                                        &#1587;&#1575;&#1740;&#1585;
                                        &#1582;&#1583;&#1605;&#1575;&#1578; &#1578;&#1601;&#1585;&#1740;&#1581;&#1740;
                                        &#1575;&#1586; &#1580;&#1605;&#1604;&#1607; &#1711;&#1588;&#1578;&#8204;&#1607;&#1575;&#1740;
                                        &#1578;&#1601;&#1585;&#1740;&#1581;&#1740;&#1548; &#1578;&#1601;&#1585;&#1740;&#1581;&#1575;&#1578;
                                        &#1570;&#1576;&#1740;&#1548; &#1575;&#1580;&#1575;&#1585;&#1607; &#1705;&#1588;&#1578;&#1740;
                                        &#1607;&#1575;&#1740; &#1582;&#1589;&#1608;&#1589;&#1740; &#1608; &#1606;&#1740;&#1605;&#1607;
                                        &#1582;&#1589;&#1608;&#1589;&#1740;&#1548;
                                        &#1575;&#1587;&#1578;&#1601;&#1575;&#1583;&#1607; &#1575;&#1586; &#1586;&#1605;&#1740;&#1606;
                                        &#1578;&#1606;&#1740;&#1587; &#1608; &#1711;&#1604;&#1601; &#1608;... &#1587;&#1601;&#1585;
                                        &#1585;&#1575; &#1576;&#1585;&#1575;&#1740; &#1588;&#1605;&#1575; &#1582;&#1575;&#1591;&#1585;&#1607;&#8204;&#1575;&#1606;&#1711;&#1740;&#1586;
                                        &#1605;&#1740;&#8204;&#1705;&#1606;&#1583;. &#1662;&#1740;&#1588; &#1575;&#1586;
                                        &#1587;&#1601;&#1585;&#1548; &#1576;&#1575;
                                        &#1576;&#1585;&#1606;&#1575;&#1605;&#1607;&#1620; &#1587;&#1601;&#1585; &#1582;&#1608;&#1583;
                                        &#1570;&#1588;&#1606;&#1575; &#1588;&#1608;&#1740;&#1583;. <a href="#">&#1711;&#1588;&#1578;
                                            &#1607;&#1575;&#1740;
                                            &#1578;&#1601;&#1585;&#1740;&#1581;&#1740; <?php echo e($villa->location->name); ?></a>
                                    </p>

                                    <ul>
                                        <li><h5 style="font-size: 12px"><i class="fa fa-check-circle ml-2"
                                                                           style="color: #e8c060;font-size: 15px;position: relative;top: 2px;"></i>
                                                &#1576;&#1740;&#1605;&#1607;&#1620;
                                                &#1587;&#1601;&#1585; :</h5></li>
                                    </ul>

                                    <p>&#1585;&#1593;&#1575;&#1740;&#1578; &#1575;&#1740;&#1605;&#1606;&#1740; &#1588;&#1605;&#1575;
                                        &#1583;&#1585; &#1581;&#1740;&#1606; &#1604;&#1584;&#1578;&#8204;&#1576;&#1585;&#1583;&#1606;
                                        &#1575;&#1586; &#1587;&#1601;&#1585;&#1548; &#1575;&#1586; &#1576;&#1586;&#1585;&#1711;&#8204;&#1578;&#1585;&#1740;&#1606;
                                        &#1583;&#1594;&#1583;&#1594;&#1607;&#8204;&#1607;&#1575;&#1740; &#1605;&#1575;&#1587;&#1578;.
                                        &#1576;&#1607; &#1583;&#1604;&#1740;&#1604; &#1582;&#1583;&#1605;&#1575;&#1578;
                                        &#1608;&#1740;&#1688;&#1607;&#1620; &#1608;&#1740;&#1604;&#1575;&#1548; &#1580;&#1585;&#1740;&#1605;&#1607;
                                        &#1585;&#1575; &#1576;&#1585;&#1575;&#1740; &#1588;&#1605;&#1575; &#1581;&#1584;&#1601;
                                        &#1605;&#1740; &#1705;&#1606;&#1740;&#1605; &#1578;&#1575; &#1583;&#1585;
                                        &#1705;&#1605;&#1575;&#1604;
                                        &#1570;&#1585;&#1575;&#1605;&#1588; &#1582;&#1575;&#1591;&#1585; &#1575;&#1586;
                                        &#1587;&#1601;&#1585; &#1582;&#1608;&#1583; &#1604;&#1584;&#1578;
                                        &#1576;&#1576;&#1585;&#1740;&#1583;. &#1576;&#1585;&#1575;&#1740; &#1575;&#1591;&#1604;&#1575;&#1593;&#1575;&#1578;
                                        &#1576;&#1740;&#1588;&#1578;&#1585; <a href="#">&#1575;&#1740;&#1606;&#1580;&#1575;
                                            &#1705;&#1604;&#1740;&#1705; &#1705;&#1606;&#1740;&#1583;.</a></p>
                                </div>
                            </div>
                        </div>


                        <div class="float-right w-100">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="title mt-5 text-right">
                                        <h5 style="font-size: 22px">&#1606;&#1592;&#1585;&#1575;&#1578;</h5>
                                    </div>
                                    <span class="line-dot float-right w-100"></span>
                                    <button class="btn btn-info btn-comment-toggle">&#1606;&#1592;&#1585; &#1582;&#1608;&#1583;
                                        &#1585;&#1575; &#1579;&#1576;&#1578; &#1705;&#1606;&#1740;&#1583;
                                    </button>
                                    <div class="comment-send div-comment-toggle mt-2" style="display: none">
                                        <h3 style="font-size: 20px" class="text-grey-400 mb-3"><i
                                                class="nc-icon ui-2_chat-round ml-2 mtp-1"></i>&#1575;&#1585;&#1587;&#1575;&#1604;
                                            &#1606;&#1592;&#1585;</h3>
                                        <?php echo e(Form::open(array('route' => 'villa-comment-store', 'method' => 'PUT', 'id' => 'form-validation'))); ?>

                                        <?php echo e(Form::hidden('villa_id', $villa->id)); ?>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="float-left" style="margin-top:-30px">
                                                    <fieldset class="rating float-left">
                                                        <input type="radio" id="star5" name="rank" value="5"/><label
                                                            class="full" for="star5" data-toggle="tooltip"
                                                            title="&#1593;&#1575;&#1604;&#1740; - 5 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                                        <input type="radio" id="star4half" name="rank"
                                                               value="4.5"/><label
                                                            class="half" for="star4half" data-toggle="tooltip"
                                                            title="&#1582;&#1740;&#1604;&#1740; &#1582;&#1608;&#1576; - 4.5 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                                        <input type="radio" id="star4" name="rank" value="4"/><label
                                                            class="full" for="star4" data-toggle="tooltip"
                                                            title="&#1582;&#1740;&#1604;&#1740; &#1582;&#1608;&#1576; - 4 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                                        <input type="radio" id="star3half" name="rank"
                                                               value="3.5"/><label
                                                            class="half" for="star3half" data-toggle="tooltip"
                                                            title="&#1582;&#1608;&#1576; - 3.5 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                                        <input type="radio" id="star3" name="rank" value="3"/><label
                                                            class="full" for="star3" data-toggle="tooltip"
                                                            title="&#1582;&#1608;&#1576; - 3 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                                        <input type="radio" id="star2half" name="rank"
                                                               value="2.5"/><label
                                                            class="half" for="star2half" data-toggle="tooltip"
                                                            title="&#1605;&#1578;&#1608;&#1587;&#1591; - 2.5 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                                        <input type="radio" id="star2" name="rank" value="2"/><label
                                                            class="full" for="star2" data-toggle="tooltip"
                                                            title="&#1605;&#1578;&#1608;&#1587;&#1591; - 2 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                                        <input type="radio" id="star1half" name="rank"
                                                               value="1.5"/><label
                                                            class="half" for="star1half" data-toggle="tooltip"
                                                            title="&#1576;&#1583; - 1.5 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                                        <input type="radio" id="star1" name="rank" value="1"/><label
                                                            class="full" for="star1" data-toggle="tooltip"
                                                            title="&#1576;&#1583; - 1 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                                        <input type="radio" id="starhalf" name="rank"
                                                               value="0.5"/><label
                                                            class="half" for="starhalf" data-toggle="tooltip"
                                                            title="&#1582;&#1740;&#1604;&#1740; &#1576;&#1583; - 0.5 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                                    </fieldset>
                                                    <span class="float-left ml-2"> &#1575;&#1605;&#1578;&#1740;&#1575;&#1586; &#1576;&#1607; &#1608;&#1740;&#1604;&#1575;</span>
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
                                                    <?php echo e(Form::email('email', '', array('class' => 'form-control col'))); ?>

                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <div class="g-recaptcha"
                                                     data-sitekey="6Lf7xE8UAAAAABkIxNqkox5E5QxoBvQVRltsbjJX"></div>
                                            </div>
                                        </div>
                                        <?php echo e(Form::button('<i class="fa fa-circle-o ml-1"></i>&#1575;&#1601;&#1586;&#1608;&#1583;&#1606;', array('type' => 'button', 'id' => 'submit-btn', 'class' => 'btn btn-rounded btn-success float-right mt-4'))); ?>

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
                                                    <div class="float-left">&#1578;&#1575;&#1585;&#1740;&#1582; &#1579;&#1576;&#1578;
                                                        &#1606;&#1592;&#1585;
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
                                                <?php echo $__env->make('villas.each', $comment, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <div class="mt-4">
                                        <?php echo e($comments->links()); ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>


                        <div class="float-right w-100" style="margin-bottom: -40px;">
                            <div class="row">
                                <?php if(unserialize($villa->nearest) != null): ?>
                                    <?php
                                        $nearests = unserialize($villa->nearest);
                                    ?>
                                    <div class="col-md-12">
                                        <div class="title mt-5 text-right">
                                            <h3 class="nearest">&#1608;&#1740;&#1604;&#1575;&#1607;&#1575;&#1740;
                                                &#1606;&#1586;&#1583;&#1740;&#1705;
                                                &#1576;&#1607;
                                                &#1608;&#1740;&#1604;&#1575;&#1740; <?php echo e($villa->name); ?></h3>
                                        </div>
                                        <span class="line-dot float-right w-100"></span>

                                        <div class="owl-carousel owl-carousel-villa-show">
                                            <?php $__currentLoopData = $nearests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nearest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>




                                                <?php
                                                    $properties_in2 = unserialize(nearest($nearest)->properties_in);
                                                    $properties_out2 = unserialize(nearest($nearest)->properties_out);
                                                ?>
                                                <div class="item">
                                                    <a href="<?php echo e(route('front-villa-show', nearest($nearest)->slug)); ?>"
                                                       class="multimedia-box">
                            <span class="image">
                                <?php if(nearest($nearest)->gallery->photo[0]): ?>
                                    <img src="<?php echo e(url(nearest($nearest)->gallery->photo[0]->path)); ?>" height="204"
                                         alt="<?php echo e(nearest($nearest)->name); ?>"/>
                                <?php else: ?>
                                    <img src="http://via.placeholder.com/360x204" height="204"
                                         alt="<?php echo e(nearest($nearest)->name); ?>"/>
                                <?php endif; ?>
                                <?php if(nearest($nearest)->discount != null): ?>
                                    <span class="discount"><?php echo e(percent(nearest($nearest)->price, nearest($nearest)->discount)); ?></span>
                                <?php endif; ?>



                                <?php if(Auth::user()): ?>
                                    <?php
                                        $like = App\Like::where('likable_type' , 'App\Villa')->where('likable_id' , nearest($nearest)->id)->where('user_id' , Auth::user()->id)->first();
                                    ?>
                                <?php else: ?>
                                    <?php
                                        $like = null
                                    ?>
                                <?php endif; ?>


                                <span class="like-icon <?php if(!is_null($like)): ?> active animated bounce <?php endif; ?>"
                                      <?php if(auth()->guard()->check()): ?> data-id="<?php echo e(nearest($nearest)->id); ?>" <?php endif; ?>><i
                                        class="nc-icon ui-2_favourite-28"></i></span>
                            </span>
                                                        <span class="details">
                            <ul class="name">
                                <li><strong class="ml-2">&#1606;&#1575;&#1605; &#1608;&#1740;&#1604;&#1575; :</strong><?php echo e(nearest($nearest)->name); ?></li>
                                <li><strong class="ml-2">&#1605;&#1581;&#1604; &#1608;&#1740;&#1604;&#1575; :</strong><?php echo e(nearest($nearest)->district); ?></li>
                            </ul>
                            <ul class="icons">
                                <li data-toggle="tooltip"
                                    title="&#1578;&#1593;&#1583;&#1575;&#1583; &#1575;&#1578;&#1575;&#1602; <?php echo e($villa->number_of_rooms); ?>">
                                        <img src="<?php echo e(asset('img/villas/bedroom.svg')); ?>" width="16" height="16"
                                             alt="&#1578;&#1593;&#1583;&#1575;&#1583; &#1575;&#1578;&#1575;&#1602; <?php echo e($villa->number_of_rooms); ?>">
                                         <p><?php echo e($villa->number_of_rooms); ?> &#1575;&#1578;&#1575;&#1602;</p>
                                    </li>
                                <?php $__currentLoopData = $properties_in2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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


                                <?php $__currentLoopData = $properties_out2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

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
                            <button class="btn btn-info float-left"><i class="fa fa-angle-right ml-2"></i>&#1605;&#1588;&#1575;&#1607;&#1583;&#1607;</button>
                                                            <?php if($villa->discount): ?>
                                                                <span class="discount-price">
                                                             &#1602;&#1740;&#1605;&#1578; &#1575;&#1586;
                                            <span class="text-success-300 m-x2"><?php echo e(discount($villa->price, $villa->discount)); ?> <?php if($villa->price_type == 'rial'): ?>
                                                    &#1585;&#1740;&#1575;&#1604; <?php elseif($villa->price_type == 'dollar'): ?>
                                                    &#1583;&#1604;&#1575;&#1585; <?php elseif($villa->price_type == 'euro'): ?>
                                                    &#1740;&#1608;&#1585;&#1608; <?php endif; ?></span>
                                                             &#1607;&#1585; &#1588;&#1576;
                                        </span>
                                                            <?php else: ?>
                                                                <span class="discount-price">
                                                             &#1602;&#1740;&#1605;&#1578; &#1575;&#1586;
                                            <span class="text-success-300 m-x2"><?php echo e($villa->price); ?> <?php if($villa->price_type == 'rial'): ?>
                                                    &#1585;&#1740;&#1575;&#1604; <?php elseif($villa->price_type == 'dollar'): ?>
                                                    &#1583;&#1604;&#1575;&#1585; <?php elseif($villa->price_type == 'euro'): ?>
                                                    &#1740;&#1608;&#1585;&#1608; <?php endif; ?></span>
                                                             &#1607;&#1585; &#1588;&#1576;
                                        </span>
                                                            <?php endif; ?>
                                                        </span>
                                                    </a>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                            </div>
                            <?php endif; ?>
                        </div>


                        <div class="float-right w-100" style="display: none;margin-bottom: -90px;">
                            <div class="row">
                                <?php if($villa->villa_now != null): ?>
                                    <?php
                                    $likes = App\Villa::where('id', json_decode($villa->villa_now))->get();
                                    ?>
                                    <div class="col-md-12">
                                        <div class="title mt-5 text-right">
                                            <h6>&#1608;&#1740;&#1604;&#1575;&#1607;&#1575;&#1740; &#1605;&#1588;&#1575;&#1576;&#1607;
                                                &#1576;&#1575;
                                                &#1608;&#1740;&#1604;&#1575;&#1740; <?php echo e($villa->name); ?></h6>
                                        </div>
                                        <span class="line-dot float-right w-100"></span>

                                        <div class="owl-carousel owl-carousel-villa-show">

                                            <?php $__currentLoopData = $likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $like): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $properties_in = unserialize($like->properties_in);
                                                    $properties_out = unserialize($like->properties_out);
                                                ?>

                                                <div class="item">
                                                    <a href="<?php echo e(route('front-villa-show', $like->slug)); ?>"
                                                       class="multimedia-box"><span class="image">
                            <?php if($like->gallery->photo[0]): ?>
                                                                <img src="<?php echo e(url($like->gallery->photo[0]->path)); ?>"
                                                                     height="204"
                                                                     alt="<?php echo e($like->name); ?>"/>
                                                            <?php else: ?>
                                                                <img src="http://via.placeholder.com/350x150&text=None"
                                                                     alt="<?php echo e($like->name); ?>">
                                                            <?php endif; ?>
                                                            <?php if($like->discount): ?>
                                                                <span class="discount"><?php echo e(percent($like->price, $like->discount)); ?></span>
                                                            <?php endif; ?>
                            </span>


                                                        <?php if(Auth::user()): ?>
                                                            <?php
                                                                $likeO = App\Like::where('likable_type' , 'App\Villa')->where('likable_id' , $like->id)->where('user_id' , Auth::user()->id)->first();
                                                            ?>
                                                        <?php else: ?>
                                                            <?php
                                                                $likeO = null
                                                            ?>
                                                        <?php endif; ?>


                                                        <span class="like-icon <?php if(!is_null($likeO)): ?> active animated bounce <?php endif; ?>"
                                                              <?php if(auth()->guard()->check()): ?> data-id="<?php echo e($like->id); ?>" <?php endif; ?>><i
                                                                class="nc-icon ui-2_favourite-28"></i></span>
                                                        <span class="details">
                            <ul class="name">
                                <li><strong class="ml-2">&#1606;&#1575;&#1605; &#1608;&#1740;&#1604;&#1575; :</strong><?php echo e($like->name); ?></li>
                                <li><strong class="ml-2">&#1605;&#1581;&#1604; &#1608;&#1740;&#1604;&#1575; :</strong><?php echo e($like->district); ?></li>
                            </ul>
                            <ul class="icons">
                                <li data-toggle="tooltip"
                                    title="&#1578;&#1593;&#1583;&#1575;&#1583; &#1575;&#1578;&#1575;&#1602; <?php echo e($like->number_of_rooms); ?>">
                                        <img src="<?php echo e(asset('img/villas/bedroom.svg')); ?>" width="16" height="16"
                                             alt="&#1578;&#1593;&#1583;&#1575;&#1583; &#1575;&#1578;&#1575;&#1602; <?php echo e($like->number_of_rooms); ?>">
                                         <p><?php echo e($like->number_of_rooms); ?> &#1575;&#1578;&#1575;&#1602;</p>
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
                            <button class="btn btn-info float-left"><i class="fa fa-angle-right ml-2"></i>&#1605;&#1588;&#1575;&#1607;&#1583;&#1607;</button>
                                                            <?php if($like->discount): ?>
                                                                <span class="discount-price">
                                                             &#1602;&#1740;&#1605;&#1578; &#1575;&#1586;
                                            <span class="text-success-300 m-x2"><?php echo e(discount($like->price, $like->discount)); ?> <?php if($like->price_type == 'rial'): ?>
                                                    &#1585;&#1740;&#1575;&#1604; <?php elseif($like->price_type == 'dollar'): ?>
                                                    &#1583;&#1604;&#1575;&#1585; <?php elseif($like->price_type == 'euro'): ?>
                                                    &#1740;&#1608;&#1585;&#1608; <?php endif; ?></span>
                                                             &#1607;&#1585; &#1588;&#1576;
                                        </span>
                                                            <?php else: ?>
                                                                <span class="discount-price">
                                                             &#1602;&#1740;&#1605;&#1578; &#1575;&#1586;
                                            <span class="text-success-300 m-x2"><?php echo e($like->price); ?> <?php if($like->price_type == 'rial'): ?>
                                                    &#1585;&#1740;&#1575;&#1604; <?php elseif($like->price_type == 'dollar'): ?>
                                                    &#1583;&#1604;&#1575;&#1585; <?php elseif($like->price_type == 'euro'): ?>
                                                    &#1740;&#1608;&#1585;&#1608; <?php endif; ?></span>
                                                             &#1607;&#1585; &#1588;&#1576;
                                        </span>
                                        </span>
                                                        <?php endif; ?>
                                                    </a>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                        </div>
                                    </div>
                            </div>
                            <?php endif; ?>
                        </div>


                    </div>
                </div>
            </div>
        </section>



        <section class="section pt-0" data-direction="rtl">
            <div class="container">
                <div class="reserve">
                    <div class="title mt-2 mb-3 text-center">
                        <h3 style="font-size: 20px" class="mb-2">&#1583;&#1585;&#1582;&#1608;&#1575;&#1587;&#1578;
                            &#1585;&#1586;&#1585;&#1608;
                            &#1608;&#1740;&#1604;&#1575;&#1740; <span id="name-v"><?php echo e($villa->name); ?></span></h3>
                        <p>&#1601;&#1585;&#1605; &#1586;&#1740;&#1585; &#1585;&#1575; &#1662;&#1585; &#1705;&#1585;&#1583;&#1607;
                            &#1608; &#1605;&#1606;&#1578;&#1592;&#1585; &#1578;&#1605;&#1575;&#1587; &#1575;&#1586;
                            &#1591;&#1585;&#1601; &#1705;&#1575;&#1585;&#1588;&#1606;&#1575;&#1587;&#1575;&#1606;
                            &#1608;&#1740;&#1604;&#1705;&#1587;&#1585; &#1576;&#1575;&#1588;&#1740;&#1583;</p>
                    </div>
                    <span class="line-dot float-right w-100"></span>
                    <div class="float-right w-100">
                        <form action="<?php echo e(route('villa-reserve-store')); ?>" method="post" id="contact_form"
                              class="contact-form">
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                                <?php if(auth()->guard()->check()): ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="hidden" name="reserve[villa_id]" value="<?php echo e($villa->id); ?>">
                                            <label for="inputName"><span style="color: red"> * </span> &#1606;&#1575;&#1605;</label>
                                            <input name="reserve[first_name]"
                                                   onchange="try{setCustomValidity('')}catch(e){}"
                                                   oninvalid="setCustomValidity('لطفا نام خود را وارد کنید')"
                                                   type="text" class="form-control"
                                                   id="inputName"
                                                   value="<?php echo e(Auth::user()->first_name); ?>"
                                                   readonly required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputLastName"><span style="color: red"> * </span>&#1606;&#1575;&#1605;
                                                &#1582;&#1575;&#1606;&#1608;&#1575;&#1583;&#1711;&#1740; </label>
                                            <input name="reserve[last_name]"
                                                   onchange="try{setCustomValidity('')}catch(e){}"
                                                   oninvalid="setCustomValidity('لطفا نام خانوادگی خود را وارد کنید')"
                                                   type="text" class="form-control"
                                                   id="inputLastName"
                                                   value="<?php echo e(Auth::user()->last_name); ?>"
                                                   readonly required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail"><span style="color: red"> * </span>&#1575;&#1740;&#1605;&#1740;&#1604;
                                            </label>
                                            <input name="reserve[email]" onchange="try{setCustomValidity('')}catch(e){}"
                                                   oninvalid="setCustomValidity('لطفا ایمیل خود را وارد کنید')"
                                                   type="email" class="form-control"
                                                   id="inputEmail" value="<?php echo e(Auth::user()->email); ?>" readonly required>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(auth()->guard()->guest()): ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="hidden" name="reserve[villa_id]" value="<?php echo e($villa->id); ?>">
                                            <label for="inputName"><span style="color: red"> * </span>&#1606;&#1575;&#1605;
                                            </label>
                                            <input name="reserve[first_name]"
                                                   onchange="try{setCustomValidity('')}catch(e){}"
                                                   oninvalid="setCustomValidity('لطفا نام خود را وارد کنید')"
                                                   type="text" class="form-control"
                                                   id="inputName" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputLastName"><span style="color: red"> * </span>&#1606;&#1575;&#1605;
                                                &#1582;&#1575;&#1606;&#1608;&#1575;&#1583;&#1711;&#1740; </label>
                                            <input name="reserve[last_name]"
                                                   onchange="try{setCustomValidity('')}catch(e){}"
                                                   oninvalid="setCustomValidity('لطفا نام خانوادگی خود را وارد کنید')"
                                                   type="text" class="form-control"
                                                   id="inputLastName" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail"><span style="color: red"> * </span> &#1575;&#1740;&#1605;&#1740;&#1604;
                                            </label>
                                            <input name="reserve[email]" onchange="try{setCustomValidity('')}catch(e){}"
                                                   oninvalid="setCustomValidity('لطفا ایمیل خود را وارد کنید')"
                                                   type="email" class="form-control"
                                                   id="inputEmail" required>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputPhone"><span style="color: red"> * </span> &#1578;&#1604;&#1601;&#1606;
                                        </label>
                                        <input name="reserve[phone]" onchange="try{setCustomValidity('')}catch(e){}"
                                               oninvalid="setCustomValidity('لطفا شماره تماس خود را وارد کنید')"
                                               type="number" class="form-control"
                                               id="inputPhone" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="dp1"><span style="color: red"> * </span>&#1578;&#1575;&#1585;&#1740;&#1582;
                                            &#1608;&#1585;&#1608;&#1583; </label>
                                        <input name="reserve[checkIn]" onchange="try{setCustomValidity('')}catch(e){}"
                                               oninvalid="setCustomValidity('لطفا تاریخ ورود خود را وارد کنید')"
                                               type="tel" class="form-control dated"
                                               id="dp1" readonly required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="dp2"><span style="color: red"> * </span> &#1578;&#1575;&#1585;&#1740;&#1582;
                                            &#1582;&#1585;&#1608;&#1580; </label>
                                        <input name="reserve[checkOut]" onchange="try{setCustomValidity('')}catch(e){}"
                                               oninvalid="setCustomValidity('لطفا تاریخ خروج را وارد کنید')" type="tel"
                                               class="form-control dated"
                                               id="dp2" readonly required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="inputPerson"><span style="color: red"> * </span> &#1578;&#1593;&#1583;&#1575;&#1583;
                                            &#1606;&#1601;&#1585;&#1575;&#1578; </label>
                                        <input name="reserve[person]" onchange="try{setCustomValidity('')}catch(e){}"
                                               oninvalid="setCustomValidity('لطفا تعداد نفرات خود را وارد کنید')"
                                               type="tel" class="form-control"
                                               id="inputPerson" onkeypress="return isNumberKey(event)" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="textareaMessage">&#1662;&#1740;&#1575;&#1605; </label>
                                <textarea name="reserve[body]" class="form-control" rows="6"
                                          id="textareaMessage"></textarea>
                            </div>
                            <button class="btn btn-info float-right" type="submit"><i
                                    class="fa fa-angle-right ml-2"></i>&#1579;&#1576;&#1578; &#1585;&#1586;&#1585;&#1608;
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="newslater section bg-white" data-direction="rtl">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="title">
                            <h6>دانستنی های استانبول</h6>
                        </div>
                        <span class="line-dot"></span>
                        <?php echo e(Form::open(array('route' => 'newsletter-store', 'method' => 'PUT'))); ?>

                        <?php echo e(Form::hidden('page_name', 'villa')); ?>

                        <?php echo e(Form::hidden('page_name_display', '&#1608;&#1740;&#1604;&#1575;&#1740; ' . $villa->name)); ?>

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

                        <p class="text-justify">&#1570;&#1582;&#1585;&#1740;&#1606; &#1583;&#1575;&#1606;&#1587;&#1578;&#1606;&#1740;
                            &#1607;&#1575;&#1740; &#1605;&#1585;&#1576;&#1608;&#1591; &#1576;&#1607;
                            <strong><?php echo e($villa->name); ?></strong> &#1608;&#1740;&#1604;&#1575;&#1740;
                            &#1605;&#1608;&#1585;&#1583; &#1593;&#1604;&#1575;&#1602;&#1607; &#1588;&#1605;&#1575;&#1548;
                            &#1608; &#1578;&#1582;&#1601;&#1740;&#1601; &#1607;&#1575;&#1740; &#1575;&#1740;&#1580;&#1575;&#1583;
                            &#1588;&#1583;&#1607; &#1576;&#1585;&#1575;&#1740; &#1575;&#1740;&#1606; &#1608;&#1740;&#1604;&#1575;&#1548;
                            &#1587;&#1601;&#1585; &#1576;&#1607;
                            <strong><?php echo e($villa->location->name); ?></strong> &#1608; &#1583;&#1575;&#1606;&#1587;&#1578;&#1606;&#1740;
                            &#1607;&#1575;&#1740; &#1570;&#1606;&#1548; &#1608;&#1740;&#1604;&#1575;&#1607;&#1575;&#1740;
                            &#1575;&#1590;&#1575;&#1601;&#1607; &#1588;&#1583;&#1607; &#1576;&#1607; &#1575;&#1740;&#1606;
                            &#1605;&#1602;&#1589;&#1583;&#1548; &#1711;&#1588;&#1578; &#1607;&#1575;&#1740; &#1578;&#1601;&#1585;&#1740;&#1581;&#1740;
                            &#1605;&#1578;&#1606;&#1608;&#1593; &#1608; &#1580;&#1583;&#1740;&#1583; &#1608; &#1607;&#1585;
                            &#1570;&#1606;&#1670;&#1607; &#1705;&#1607; &#1588;&#1605;&#1575; &#1575;&#1606;&#1578;&#1592;&#1575;&#1585;
                            &#1583;&#1575;&#1585;&#1740;&#1583; &#1575;&#1586;
                            <strong><?php echo e($villa->location->name); ?></strong> &#1576;&#1583;&#1575;&#1606;&#1740;&#1583;
                            &#1585;&#1575; &#1605;&#1575; &#1576;&#1585;&#1575;&#1740; &#1588;&#1605;&#1575; &#1583;&#1587;&#1578;&#1607;
                            &#1576;&#1606;&#1583;&#1740; &#1705;&#1585;&#1583;&#1607; &#1608; &#1605;&#1587;&#1578;&#1602;&#1740;&#1605;
                            &#1576;&#1607; &#1575;&#1740;&#1605;&#1740;&#1604; &#1588;&#1605;&#1575; &#1605;&#1740;
                            &#1601;&#1585;&#1587;&#1578;&#1740;&#1605;&#1548; &#1607;&#1605;&#1670;&#1606;&#1740;&#1606;
                            &#1588;&#1605;&#1575; &#1605;&#1740; &#1578;&#1608;&#1575;&#1606;&#1740;&#1583; &#1575;&#1586;
                            &#1570;&#1582;&#1585;&#1740;&#1606; &#1578;&#1582;&#1601;&#1740;&#1601; &#1607;&#1575;&#1740;
                            &#1575;&#1740;&#1606; &#1608;&#1740;&#1604;&#1575; &#1576;&#1585; &#1585;&#1608;&#1740;
                            &#1605;&#1608;&#1576;&#1575;&#1740;&#1604;&#1578;&#1575;&#1606;
                            &#1605;&#1591;&#1604;&#1593; &#1588;&#1608;&#1740;&#1583;.</p>
                    </div>
                    <div class="col-md-7">
                        <div class="title">
                            <h6>&#1605;&#1580;&#1604;&#1607; &#1608;&#1740;&#1604;&#1705;&#1587;&#1585;</h6>
                        </div>
                        <span class="line-dot"></span>
                        <div class="row">
                            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('front-blog-show', $post->slug)); ?>" class="col-md-3 col-xs-12">
                                    <figure class="box-article">
                                        <?php if(isset($post->photo->path)): ?>
                                            <img src="<?php echo e(url($post->photo->path)); ?>"
                                                 alt="<?php if($post->photo->name): ?> <?php echo e($post->photo->name); ?> <?php endif; ?>">
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
        <div class="modal fade" id="answer" tabindex="-1" role="dialog" aria-labelledby="answerLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="answerLabel">&#1662;&#1575;&#1587;&#1582; &#1576;&#1607; <span
                                id="name-c"></span></h4>
                    </div>
                    <div class="modal-body">
                        <?php echo e(Form::open(array('route' => 'villa-comment-store', 'method' => 'PUT'))); ?>

                        <?php echo e(Form::hidden('villa_id', $villa->id)); ?>

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
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('styles'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap-datepicker.min.css')); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap-select.min.css')); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap-select.min.css')); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/slick.min.css')); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/slick-theme.min.css')); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('myfiles/css/style.villa.v38.css')); ?>"/>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('scripts'); ?>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-datepicker.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-datepicker-fa.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-select.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-select-fa_IR.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/slick.min.js')); ?>"></script>
        <script src="https://www.google.com/recaptcha/api.js"></script>
        <script type="text/javascript" src="<?php echo e(asset('myfiles/js/lib.villa.v26.js')); ?>"></script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxfZQk73sogROY9KKRmtPIsLSFSjX7o7w&libraries=places&callback=initialize"></script>
        <script type="text/javascript">
            $(function () {
                var date = new Date();
                date.setDate(date.getDate());
                $("#dp1").datepicker({
                    minDate: new Date(),
                    onClose: function (selectedDate) {
                        $("#dp2").datepicker("option", "minDate", selectedDate);
                    }
                });
                $("#dp2").datepicker({
                    onClose: function (selectedDate) {
                        $("#dp1").datepicker("option", "maxDate", selectedDate);
                    }
                });
            });

            $('.slider-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.slider-nav',
            });
            $('.slider-nav').slick({
                slidesToShow: 6,
                slidesToScroll: 1,
                asNavFor: '.slider-for',
                dots: true,
                focusOnSelect: true,
            });
            setInterval(function () {
                // $('.slick-next').click()
            }, 5000);
            $('.answer').click(function () {
                var id = $(this).data('id');
                var name = $(this).data('name');
                $('#name-c').text(name);
                $('#parent_id').val(id);
            });


            $('.selectpicker').selectpicker();

            $('.change-drop').click(function () {
                $(this).parent().children('.load-description').slideToggle();
                $(this).parent().children('.load-description-price').slideToggle();
            });

            var lat = "<?php echo e(number_format((float)$villa->latitude, 5, '.', '')); ?>";
            var lng = "<?php echo e(number_format((float)$villa->longitude, 5, '.', '')); ?>";

            function initialize() {
                var latlng = new google.maps.LatLng(lat, lng);
                var options = {
                    zoom: 11,
                    center: latlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    draggable: true,
                    zoomControl: true,
                    mapTypeControl: true,
                    streetViewControl: false,
                    scrollwheel: false
                };
                var map = new google.maps.Map(document.getElementById("google-map-area"), options);
                var marker = new google.maps.Marker(
                    {
                        map: map,
                        draggable: false,
                        animation: google.maps.Animation.DROP,
                        icon: "<?php echo e(asset('img/pin.png')); ?>"
                    });

                function placeMarker(map, location) {
                    if (marker) {
                        marker.setPosition(location);
                    } else {
                        marker = new google.maps.Marker({
                            position: location,
                            map: map
                        });
                    }
                }

                placeMarker(map, latlng);
                google.maps.event.addDomListener(window, 'load', initialize);


                $('#map').on('shown.bs.modal', function () {
                    google.maps.event.trigger(map, "resize");
                });
            }

            $(document).ready(function () {
                var room = '.' + $('#rooms').val();
                $(room).show();
                $('#rooms').change(function () {
                    $('.rooms').hide();
                    var room = '.' + $(this).val();
                    $(room).show();
                });

                $('#prices-type').change(function () {
                    var prices_type = $(this).val();
                    if (prices_type == 'default') {
                        $('.defaut-price').show();
                        $('.last-price').hide();
                    } else {
                        $('.defaut-price').hide();
                        $('.last-price').show();
                    }
                })
            });

            $('.btn-comment-toggle').click(function () {
                $('.div-comment-toggle').slideToggle();
            });

            $('#submit-btn').click(function () {
                var $captcha = $('#recaptcha'),
                    response = grecaptcha.getResponse();

                if (response.length === 0) {
                    if (!$captcha.hasClass("error")) {
                        $captcha.addClass("error");
                    }
                } else {
                    $captcha.removeClass("error");
                    $('#form-validation').submit();
                }
            })

        </script>
        <script>
            $(document).ready(function () {
                $('.numberPrice').text(function (index, value) {
                    return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                });
            });
        </script>
        <script type="text/javascript">
            var titleofcal = "تقویم رزرو ویلای ";
            <?php if($villa->title): ?>
                titleofcal += '<?php echo e($villa->name); ?>';
            <?php else: ?>
                titleofcal += 'ویلکسر ';
                <?php endif; ?>
            var events = getevents();

            function getevents() {
                var events = new Array();
                var startdate = "";
                var ystart = "";
                var mstart = "";
                var dstart = "";
                var enddate = "";
                var yend = "";
                var mend = "";
                var dend = "";
                <?php if($events!=null): ?>
                    <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($event->summary !=null): ?>
                    startdate = '<?php echo e($event->dtstart); ?>';
                ystart = startdate.substr(0, 4);
                mstart = startdate.substr(4, 2);
                dstart = startdate.substr(6, 2);
                startdate = new Date(ystart, mstart - 1, dstart);
                enddate = '<?php echo e($event->dtend); ?>';
                yend = enddate.substr(0, 4);
                mend = enddate.substr(4, 2);
                dend = enddate.substr(6, 2);
                enddate = new Date(yend, mend - 1, dend);
                event = {'summary': '<?php echo e($event->summary); ?>', 'dtstart': startdate.getTime(), 'dtend': enddate.getTime()};
                events.push(event);
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                    return events;
            }

            function myFunctionTest(time) {
                var title = "";
                var isfirst = false;
                var islast = false;
                var summary = "";
                jQuery.each(events, function (i, item) {
                    var starttime = item.dtstart;
                    var endtime = item.dtend;
                    if ((time >= starttime) && (time <= endtime)) {
                        title = "Blocked";
                        summary = item.summary;
                        summary = summary.toLowerCase();
                        if (summary.search("reserved") !== -1)
                            title = "Reserved";
                        if (summary.search("booking") !== -1)
                            title = "Booking";
                        if (time == starttime)
                            isfirst = true;
                        if (time == endtime)
                            islast = true;
                    }
                });
                mTitle = {'title': title, 'isfirst': isfirst, 'islast': islast};
                return mTitle;
            }

        </script>
        <script>
            $(document).ready(function () {
                $('#taghvim').mydatepicker({
                    dateFormat: 'yy/mm/dd',
                    isRTL: true,
                    minDate: 0,
                    //numberOfMonths:($(window).width()>640)?2:1,
                    numberOfMonths: 1,
                });
            });

        </script>

    <?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>