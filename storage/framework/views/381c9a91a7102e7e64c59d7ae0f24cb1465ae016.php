<?php $__env->startSection('nav'); ?>
    <nav class="site-header sticky-top py-1">
        <div class="px-3 d-flex flex-column flex-md-row">
            
            
            
            
            
            
            <p class="logo_p_view text-center">
                <span>Live Your Dreams</span>
            </p>
        </div>
    </nav>
    <style>
        .soldout{
            position: absolute;
            z-index: 100;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php
        $soldout=\App\Contract::where('villa_id',$villa->id)->first();
        $villa->view+=1;
        $villa->update();
    ?>
    <div class="pl-4 pb-4 pr-4 mobile-no-padding">
        <div class="bg-white">
            <ul hidden class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <img class="link-icon" src="<?php echo e(asset('new/img/icon/location.png')); ?>" width="17">
                        <span class="link-title">منطقه</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <img class="link-icon" src="<?php echo e(asset('new/img/icon/hourglass.png')); ?>" width="14">
                        <span class="link-title">زمان تحویل</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <img class="link-icon" src="<?php echo e(asset('new/img/icon/lira.png')); ?>" width="13">
                        <span class="link-title">شروع قیمت</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <img class="link-icon" src="<?php echo e(asset('new/img/icon/home-run.png')); ?>" width="17">
                        <span class="link-title">نوع ملک</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <img class="link-icon" src="<?php echo e(asset('new/img/icon/bedroom.png')); ?>" width="23">
                        <span class="link-title">تعداد خواب</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <img class="link-icon" src="<?php echo e(asset('new/img/icon/tailor.png')); ?>" width="25">
                        <span class="link-title">متراژ</span>
                    </a>
                </li>
                <li class="nav-item nav-logo">
                    <a class="nav-link" href="/">
                        <img class="link-logo" src="<?php echo e(asset('new/img/logo/logo-1.png')); ?>">
                    </a>
                </li>
            </ul>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 project-title">
                        <h1>
                            <?php if($soldout): ?>
                            <span class="badge badge-danger">فروخته شده</span>
                            <?php endif; ?>
                            <?php echo e($villa->name); ?>

                            <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="gear-icon">
                        </h1>
                        <h5><?php echo e($villa->city?$villa->city->name.',':''); ?><?php echo e($villa->location?' ناحیه : '.$villa->location->name.',':''); ?>

                            محله : <?php echo e($villa->district); ?></h5>
                        <p class="summary-price">







                            کد <?php echo e($villa->id); ?>

                        </p>
                    </div>
                    <div class="col-md-8">
                        <div class="product-slider">
                            <div class="box-static"></div>
                            <div class="swiper-container gallery-top">
                                <?php if($soldout): ?>
                                <div class="soldout">
                                    <img src="<?php echo e(asset('new/img/soldout.png')); ?>" alt="">
                                </div>
                                <?php endif; ?>
                                <div class="swiper-wrapper">
                                    <?php $__currentLoopData = $villa->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="swiper-slide" data-fancybox="gallery" href="<?php echo e(url($photo->path)); ?>"
                                             style="background-image:url(<?php echo e(url($photo->path)); ?>)"></div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-button-next swiper-button-white"></div>
                                <div class="swiper-button-prev swiper-button-white"></div>
                            </div>
                            <div class="swiper-container gallery-thumbs">
                                <div class="swiper-wrapper">
                                    <?php $__currentLoopData = $villa->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="swiper-slide"
                                             style="background-image:url(<?php echo e(url($photo->path)); ?>)"></div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <ul class="nano-list">
                            <li class="nano-item">
                                <a target="_blank"
                                   href="https://web.whatsapp.com/send?text=<?php echo e(route('front.villas.show', $villa->slug)); ?>"
                                   onclick="window.open('https://api.whatsapp.com/send?text=<?php echo e(route('front.villas.show', $villa->slug)); ?>')">
                                    <span class="title">اشتراک گذاری واتساپ</span>
                                    <img class="icon" src="<?php echo e(asset('new/img/icon/share.png')); ?>">
                                </a>
                            </li>
                            <li class="nano-item">
                                <a href="javascript:void(0);" <?php if(auth()->check()): ?> onclick="like('<?php echo e($villa->id); ?>','villa','.like'+<?php echo e($villa->id); ?>)" <?php else: ?> onclick="login_not(2)" <?php endif; ?>>
                                    <span class="title">پسندیدم</span>
                                    <?php if(auth()->check() and $villa->like): ?>
                                        <img class="icon like<?php echo e($villa->id); ?>" src="<?php echo e(asset('new/img/icon/heart_red.png')); ?>">
                                    <?php else: ?>
                                        <img class="icon like<?php echo e($villa->id); ?>" src="<?php echo e(asset('new/img/icon/heart_gray.png')); ?>">
                                    <?php endif; ?>
                                    <div style="vertical-align: middle;" class="like-loader<?php echo e($villa->id); ?> spinner-grow spinner-grow-sm text-danger d-none"></div>
                                </a>
                            </li>
                            
                            
                            
                            
                            
                            
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <div class="box-1">
                            <div class="box-header">
                                <img class="box-header-back" src="<?php echo e(asset('new/img/box-top.png')); ?>">
                                <h6 class="box-title">INFORMATION</h6>
                                <h6 class="box-description">اطلاعات</h6>
                            </div>
                            <div class="box-content">
                                <div class="w100_h100">
                                    <ul class="box-list str4 ">
                                        <li>
                                            <img class="list-icon" src="<?php echo e(asset('new/img/icon/k.png')); ?>">
                                            <p>
                                                <span class="list-title">نوع خدمات ملک</span>
                                                <span class="list-separator">:</span>
                                                <span class="list-description">
                                                    <?php if($villa->tip_info=='1'): ?> مناسب برای اخذ شهروندی و پاسپورت ترکیه
                                                    <?php elseif($villa->tip_info=='2'): ?>مناسب برای اخذ اقامت ترکیه
                                                    <?php endif; ?>
                                                </span>
                                            </p>
                                        </li>
                                        
                                            
                                            
                                                
                                                
                                                
                                                    
                                                    
                                                    
                                                    
                                                
                                            
                                        
                                        <li>
                                            <img class="list-icon" src="<?php echo e(asset('new/img/icon/k.png')); ?>">
                                            <p>
                                                <span class="list-title">نوع ملک</span>
                                                <span class="list-separator">:</span>
                                                <span class="list-description">
                                                    <?php if($villa->type_info==1): ?> دوبلکس
                                                    <?php elseif($villa->type_info==2): ?> باغچه کات
                                                    <?php elseif($villa->type_info==3): ?> تریبلکس
                                                    <?php endif; ?>
                                                    </span>
                                            </p>
                                        </li>
                                        <?php if($villa->type!='new'): ?>
                                            <li>
                                                <img class="list-icon" src="<?php echo e(asset('new/img/icon/k.png')); ?>">
                                                <p>
                                                    <span class="list-title">سن بنا</span>
                                                    <span class="list-separator">:</span>
                                                    <span class="list-description">
                                                  <?php echo e($villa->built_year); ?> سال
                                                    </span>
                                                </p>
                                            </li>
                                        <?php endif; ?>
                                        <li>
                                            <img class="list-icon" src="<?php echo e(asset('new/img/icon/k.png')); ?>">
                                            <p>
                                                <span class="list-title">بالکن/تراس</span>
                                                <span class="list-separator">:</span>
                                                <span class="list-description">
                                                    <?php if($villa->b_or_t==1): ?> دارد
                                                    <?php elseif($villa->b_or_t==0): ?> ندارد
                                                    <?php endif; ?>
                                                    </span>
                                            </p>
                                        </li>
                                        <li>
                                            <img class="list-icon" src="<?php echo e(asset('new/img/icon/k.png')); ?>">
                                            <p>
                                                <span class="list-title">فرنیش</span>
                                                <span class="list-separator">:</span>
                                                <span class="list-description">
                                                    <?php if($villa->furniture==1): ?> دارد
                                                    <?php elseif($villa->furniture==0): ?> ندارد
                                                    <?php endif; ?>
                                                    </span>
                                            </p>
                                        </li>
                                        <li>
                                            <img class="list-icon" src="<?php echo e(asset('new/img/icon/k.png')); ?>">
                                            <p>
                                                <span class="list-title">آشپزخانه</span>
                                                <span class="list-separator">:</span>
                                                <span class="list-description">
                                                    <?php if($villa->kitchen==1): ?> اوپن
                                                    <?php elseif($villa->kitchen==0): ?> بسته
                                                    <?php endif; ?>
                                                    </span>
                                            </p>
                                        </li>
                                        <li>
                                            <img class="list-icon" src="<?php echo e(asset('new/img/icon/k.png')); ?>">
                                            <p>
                                                <span class="list-title">تعداد سالن</span>
                                                <span class="list-separator">:</span>
                                                <span class="list-description">
                                                  <?php echo e($villa->salon_num); ?>

                                                    </span>
                                            </p>
                                        </li>
                                        <li>
                                            <img class="list-icon" src="<?php echo e(asset('new/img/icon/k.png')); ?>">
                                            <p>
                                                <span class="list-title">تعداد خواب</span>
                                                <span class="list-separator">:</span>
                                                <span class="list-description">
                                                  <?php echo e($villa->room_num); ?>

                                                    </span>
                                            </p>
                                        </li>
                                        <li>
                                            <img class="list-icon" src="<?php echo e(asset('new/img/icon/k.png')); ?>">
                                            <p>
                                                <span class="list-title">تعداد سرویس بهداشتی</span>
                                                <span class="list-separator">:</span>
                                                <span class="list-description">
                                                  <?php echo e($villa->number_of_wc); ?>

                                                    </span>
                                            </p>
                                        </li>
                                        
                                            
                                            
                                                
                                                
                                                
                                                  
                                                    
                                            
                                        
                                        <li>
                                            <img class="list-icon" src="<?php echo e(asset('new/img/icon/k.png')); ?>">
                                            <p>
                                                <span class="list-title">طبقه</span>
                                                <span class="list-separator">:</span>
                                                <span class="list-description">
                                                  <?php echo e($villa->floor); ?>





                                                    </span>
                                            </p>
                                        </li>
                                        <li>
                                            <img class="list-icon" src="<?php echo e(asset('new/img/icon/k.png')); ?>">
                                            <p>
                                                <span class="list-title">منظره</span>
                                                <span class="list-separator">:</span>
                                                <span class="list-description">
                                                    <?php if($villa->villa_view=='sea'): ?> دریا
                                                    <?php elseif($villa->villa_view=='city'): ?> شهر
                                                    <?php elseif($villa->villa_view=='jungle'): ?> جنگل
                                                    <?php endif; ?>
                                                    </span>
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="box-footer">
                                <img class="box-footer-back" src="<?php echo e(asset('new/img/box-bottom.png')); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php if($villa->link1): ?>
                <div class="container-fluid">
                    <div class="px-5 py-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="box-header py-3">
                                    <h3>ویدیو یوتیوب 1</h3>
                                </div>
                                <img src="<?php echo e(asset('new/img/man-woman.png')); ?>" class="image-max-logo">
                            </div>
                            <div class="col-md-8">
                                <iframe width="560" height="315" src="<?php echo e(str_replace('https://youtu.be','https://www.youtube-nocookie.com/embed',$villa->link1)); ?>?controls=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($villa->link2): ?>
                <div class="container-fluid">
                    <div class="px-5 py-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="box-header py-3">
                                    <h3>ویدیو یوتیوب 2</h3>
                                </div>
                                <img src="<?php echo e(asset('new/img/man-woman.png')); ?>" class="image-max-logo">
                            </div>
                            <div class="col-md-8">
                                <iframe width="560" height="315" src="<?php echo e(str_replace('https://youtu.be','https://www.youtube-nocookie.com/embed',$villa->link2)); ?>?controls=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($villa->link3): ?>
                <div class="container-fluid">
                    <div class="px-5 py-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="box-header py-3">
                                    <h3>ویدیو یوتیوب 3</h3>
                                </div>
                                <img src="<?php echo e(asset('new/img/man-woman.png')); ?>" class="image-max-logo">
                            </div>
                            <div class="col-md-8">
                                <iframe width="560" height="315" src="<?php echo e(str_replace('https://youtu.be','https://www.youtube-nocookie.com/embed',$villa->link3)); ?>?controls=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($villa->link4): ?>
                <div class="container-fluid">
                    <div class="px-5 py-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="box-header py-3">
                                    <h3>ویدیو یوتیوب 4</h3>
                                </div>
                                <img src="<?php echo e(asset('new/img/man-woman.png')); ?>" class="image-max-logo">
                            </div>
                            <div class="col-md-8">
                                <iframe width="560" height="315" src="<?php echo e(str_replace('https://youtu.be','https://www.youtube-nocookie.com/embed',$villa->link4)); ?>?controls=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($villa->video): ?>
                <div class="container-fluid">
                    <div class="px-5 py-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="box-header py-3">
                                    <h3>ویدیو <?php echo e($villa->name); ?></h3>
                                </div>
                                <img src="<?php echo e(asset('new/img/man-woman.png')); ?>" class="image-max-logo">
                            </div>
                            <div class="col-md-8">
                                <video controls class="w-100">
                                    <source
                                            src="<?php echo e(url($villa->video)); ?>"
                                            type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="box-2">
                <div class="box-header">
                    <h3>توضیحات</h3>
                </div>
                <div class="box-content">
                    <?php echo $villa->body; ?>

                </div>
            </div>

            <div class="box-2">
                <div class="box-header py-4">
                    <h3>امکانات داخلی</h3>
                </div>
                <div class="box-content">
                    <ul class="list-2">
                        <?php
                            if ($villa->properties_in != 'N;'){
                            $properties_in = unserialize($villa->properties_in);
                            }else{
                            $properties_in = [];
                            }
                        ?>
                        <?php $__currentLoopData = $propertiesin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $prop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-item <?php echo e(in_array($prop->id , $properties_in)?'active':''); ?> ">
                                <img class="icon"
                                     src="<?php echo e($prop->photo?url($prop->photo->path):asset('new/img/icon/k.png')); ?>">
                                <span class="title"><?php echo e($prop->name); ?></span>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <div class="box-2">
                <div class="box-header py-4">
                    <h3>امکانات رفاهی</h3>
                </div>
                <div class="box-content">
                    <ul class="list-2">
                        <?php
                            if ($villa->properties_out != 'N;'){
                            $properties_out = unserialize($villa->properties_out);
                            }else{
                            $properties_out = [];
                            }
                        ?>
                        <?php $__currentLoopData = $propertiesout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $prop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-item <?php echo e(in_array($prop->id , $properties_out)?'active':''); ?> ">
                                <img class="icon"
                                     src="<?php echo e($prop->photo?url($prop->photo->path):asset('new/img/icon/k.png')); ?>">
                                <span class="title"><?php echo e($prop->name); ?></span>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <div class="box-2">
                <div class="box-header py-4">
                    <h3>دسترسی ها</h3>
                </div>
                <div class="box-content">
                    <ul class="list-2">
                        <?php
                            if ($villa->properties_access != 'N;'){
                            $properties_access = unserialize($villa->properties_access);
                            }else{
                            $properties_access = [];
                            }
                        ?>
                        <?php $__currentLoopData = $propertiesaccess; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $prop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-item <?php echo e(in_array($prop->id , $properties_access)?'active':''); ?> ">
                                <img class="icon"
                                     src="<?php echo e($prop->photo?url($prop->photo->path):asset('new/img/icon/k.png')); ?>">
                                <span class="title"><?php echo e($prop->name); ?></span>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <div hidden class="box-2">
                <div class="box-header py-3">
                    <h3>دسترسی ها</h3>
                </div>
                <div class="box-content">
                    <ul class="list-3">
                        <?php
                            if ($villa->properties_out != 'N;'){
                            $properties_out = unserialize($villa->properties_out);
                            }else{
                            $properties_out = [];
                            }
                        ?>
                        <?php $__currentLoopData = $propertiesaccess; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $propt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="<?php echo e(in_array($prop->id , $properties_out)?'active':''); ?>"><?php echo e($propt->name); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <style>
        .popup-video-wrapper {
            width: 100%;
            height: 100%;
            min-height: 599px;
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            background: url(<?php echo e(asset('img/new/2.jpg')); ?>) center top no-repeat;
            background-size: auto;
            background-size: contain;
            position: relative;
        }
        .popup-video-wrapper h5 {
            position: absolute;
            top: 35px;
            right: 0;
            width: 60%;
            color: #FFF;
            font-weight: bold;
            font-size: 1.4em;
        }
        .youtube {
            background-color: #000;
            position: relative;
            padding-top: 56.25%;
            overflow: hidden;
            cursor: pointer;
        }
        .youtube iframe {
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
        }
        .position-relative {
            position: relative !important;
        }
        .popup-flex {
            display: flex;
            height: 100%;
            flex-direction: column;
            justify-content: center;
        }
        #popupForm .popup-form-info {
            margin: 0 0 20px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: start;
            -ms-flex-pack: start;
            justify-content: flex-start;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
        }
        #popupForm .popupFormTitle h4, #popupForm .popupFormTitle h4 {
            color: #000 !important;
        }
        #popupForm .popup-form-info h4 {
            text-transform: uppercase;
            font-size: 1.2rem;
            color: #000;
        }
        #popupForm .popupFormTitle h4:first-child, #popupForm .popupFormTitle h4:first-child {
            text-transform: uppercase !important;
            font-weight: bold;
        }
        #popupForm .popup-form-info h4:first-of-type {
            font-weight: bold;
        }
        #popupForm .popupFormTitle h4, #popupForm .popupFormTitle h4 {
            color: #000 !important;
        }
        #popupForm .popup-form-info h4 {
            text-transform: uppercase;
            font-size: 1.2rem;
            color: #000;
        }
        .tg-btn {
            padding: 8px 24px;
            border: 2px solid #ec6724;
            border-radius: 5px;
            color: #ec6724;
            display: inline-block;
            -webkit-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
            font-weight: 600;
            text-transform: uppercase;
        }
        .popup-logo {
            width: 40%;
            position: absolute;
            bottom: 30px;
            right: 30px;
        }
        .popup-form input::-webkit-input-placeholder { /* Edge */
            text-align: left;
        }

        .popup-form input:-ms-input-placeholder { /* Internet Explorer 10-11 */
            text-align: left;
        }

        .popup-form input::placeholder {
            text-align: left;
        }
    </style>
    <!-- The Modal -->
    <div class="modal" id="visitModal">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div dir="ltr" class="modal-body p-0">
                    <button type="button" class="close m-2" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="row">
                        <div class="col-12 col-lg-6 p-0">
                            <div class="popup-video-wrapper p-0">
                                <style>.h_iframe-aparat_embed_frame{position:relative;}.h_iframe-aparat_embed_frame .ratio{display:block;width:100%;height:auto;}.h_iframe-aparat_embed_frame iframe{position:absolute;top:0;left:0;width:100%;height:100%;}</style><div class="h_iframe-aparat_embed_frame"><span style="display: block;padding-top: 57%"></span><iframe src="https://www.aparat.com/video/video/embed/videohash/iMVex/vt/frame" title="istanbul love" allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe></div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mt-3 position-relative text-left">
                            <div class="popup-flex">
                                <div class="popup-form-info">
                                    <img src="https://www.tremglobal.com/assets/images/tremglobal-logo.svg" alt="Trem Global Logo" class="d-block d-lg-none img-fluid">
                                    <div class="popupFormTitle">
                                        <h4>Let us call you</h4>
                                        <h4>WE WILL HELP YOU TO CHOOSE BEST INVESTMENT FOR YOU</h4>
                                    </div>
                                </div>
                                <form action="<?php echo e(route('front.villas.visitWinner')); ?>" method="POST" class="popup-form" novalidate="novalidate">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <input type="text" id="popup_name" name="popup_name" class="form-control name" placeholder="Fullname">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="popup_mobile" name="popup_mobile" class="form-control mobile" placeholder="Phone Number">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="popup_email" name="popup_email" class="form-control email" placeholder="Email Address">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="q" value="basvuru">
                                        <input type="hidden" name="formSender" value="popup" class="popupFormSender">
                                        <input type="hidden" name="email2" class="properties" value="">
                                        <input type="hidden" name="countryData" class="countryData" value="">
                                        <button type="submit" class="tg-btn btn">Send</button>
                                    </div>
                                </form>
                                <div class="popup-logo">
                                    <img src="<?php echo e(asset('front/files/khane-logo-dark.png')); ?>" alt="Trem Global Logo" class="d-none d-lg-block img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        <?php if(auth()->check()): ?>
            <?php if(auth()->id()==197): ?>
            $('#visitModal').modal('show');
            <?php endif; ?>
        <?php endif; ?>
//         $.removeCookie('visit_time'); // => true
//         $.removeCookie('visited_time'); // => true
        let counter=$.cookie('visit_time')>0?$.cookie('visit_time'):0;
        let price=<?php echo e($villa->price); ?>;
        if (price>250000) {
            setInterval(function () {
                if ($.cookie('visit_time') > 0) {
                    $.cookie('visit_time')
                }
                $.cookie('visit_time', counter++,{ expires: 1 });
                console.log($.cookie('visit_time'));
                if ($.cookie('visit_time') > 120 && $.cookie('visited_time') != 1) {
                    $.cookie('visited_time', 1,{ expires: 1 });
                    $('#visitModal').modal('show');
                }
            }, 1000);
        }
    </script>
    <script>
        function login_not(a) {
            if (a == 2) {
                swal({
                    title: " عملیات ناموفق",
                    text: "برای ثبت در علاقه مندی ها ابتدا عضو خانه استانبول شوید",
                    icon: "warning",
                })
            }
            if (a == 3) {
                swal({
                    title: " عملیات ناموفق",
                    text: "برای دریافت کاتالوگ ابتدا عضو خانه استانبول شوید",
                    icon: "warning",
                })
            }

        }
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>