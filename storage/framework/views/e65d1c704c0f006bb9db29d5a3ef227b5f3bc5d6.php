
<?php $__env->startSection('style_css'); ?>
<style>
    .data-table thead th{
        background: #696969!important;
    }
    .data-table *
    {
        font-family: 'IRANSans1'!important;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <?php if(count($slider_desktop)): ?>
        <!-- SLIDER AREA START (slider-3) -->
        <div class="ltn__slider-area ltn__slider-3 section-bg-2">
            <div class="ltn__slide-one-active slick-slide-arrow-1 slick-slide-dots-1">
                <!-- ltn__slide-item -->
                <?php $__currentLoopData = $slider_desktop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($slider->photo): ?>
                        <div class="<?php echo e($key>0?'d-none d-none_load_page':''); ?> ltn__slide-item ltn__slide-item-2 ltn__slide-item-3-normal---  ltn__slide-item-3 bg-image bg-overlay-theme-black-60">
                            <img src="<?php echo e(url($slider->photo->path)); ?>" class="ltn__slide-item-img1500" alt="vandidad">
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <!-- SLIDER AREA END -->
    <?php endif; ?>
    <div class="col-xl-6 col-lg-8 mx-auto col-md-10 mt-3">
        <div id="tgju-data"></div><script>var tgju_params = { type: "simple", items: ["price_dollar_rl","price_eur","price_aed","price_try"], columns: ["diff"], placeholder: "tgju-data", token: "webservice" };</script><script src="https://api.accessban.com/v1/widget"></script><style>body #tgju table.data-table thead th{background-color: #f3d1d1 !important;}body .tgju-copyright{background-color: #fff !important; display: none}body #tgju table.data-table thead th,body .tgju-copyright{color: #111 !important;}body #tgju table.data-table{border-color: #1a1a1a !important;}</style>
    </div>
    <?php if($response && count($response)): ?>
        <!-- Arz -->
        
        <div class="col-lg-8 col-md-11 col-sm-8 mx-auto mt-50">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-6 arz_div_col">
                        <div class="arz_price_echo">
                            <?php
                            $a = $response["usd"]['value'] * 10;
                            $change = $response["usd"]['change'] * 10;
                            $b = $a + $change;
                            $persend = (($b - $a) / $a) * 100
                            ?>
                            <?php if($change<0): ?>
                                <h3 class="title_arz text-center"><i class="fas fa-chevron-down text-danger mr-1"></i>
                                    دلار آمریکا </h3>
                            <?php elseif($change>0): ?>
                                <h3 class="title_arz text-center"><i class="fas fa-chevron-up text-success mr-1"></i>
                                    دلار آمریکا  </h3>
                            <?php else: ?>
                                <h3 class="title_arz text-center">
                                    دلار آمریکا  </h3>
                            <?php endif; ?>
                            <span class="price_arz <?php if($change<0): ?> text-danger <?php elseif($change>0): ?> text-success <?php endif; ?> d-block text-center"><?php echo e(number_format($response["usd"]['value']*10)); ?> <small> ریال</small></span>
                            <span class="change_arz d-block text-center"><?php echo e(str_replace('-','',number_format($response["usd"]['change']*10))); ?> (<?php echo e(str_replace('-','',round($persend,2))); ?>%)</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-6 arz_div_col">
                        <div class="arz_price_echo">
                            <?php
                            $a = $response["eur"]['value'] * 10;
                            $change = $response["eur"]['change'] * 10;
                            $b = $a + $change;
                            $persend = (($b - $a) / $a) * 100
                            ?>
                            <?php if($change<0): ?>
                                <h3 class="title_arz text-center"><i class="fas fa-chevron-down text-danger mr-1"></i>
                                    یورو </h3>
                            <?php elseif($change>0): ?>
                                <h3 class="title_arz text-center"><i class="fas fa-chevron-up text-success mr-1"></i>
                                    یورو </h3>
                            <?php else: ?>
                                <h3 class="title_arz text-center">
                                    یورو </h3>
                            <?php endif; ?>
                            <span class="price_arz  <?php if($change<0): ?> text-danger <?php elseif($change>0): ?> text-success <?php endif; ?> d-block text-center"><?php echo e(number_format($response["eur"]['value']*10)); ?> <small> ریال</small></span>
                            <span class="change_arz d-block text-center"><?php echo e(str_replace('-','',number_format($response["eur"]['change']*10))); ?> (<?php echo e(str_replace('-','',round($persend,2))); ?>%)</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-6 arz_div_col">
                        <div class="arz_price_echo">
                            <?php
                            $a = $response["try"]['value'] * 10;
                            $change = $response["try"]['change'] * 10;
                            $b = $a + $change;
                            $persend = (($b - $a) / $a) * 100
                            ?>
                            <?php if($change<0): ?>
                                <h3 class="title_arz text-center"><i class="fas fa-chevron-down text-danger mr-1"></i>
                                    لیر ترکیه </h3>
                            <?php elseif($change>0): ?>
                                <h3 class="title_arz text-center"><i class="fas fa-chevron-up text-success mr-1"></i>
                                    لیر ترکیه </h3>
                            <?php else: ?>
                                <h3 class="title_arz text-center">
                                    لیر ترکیه </h3>

                            <?php endif; ?>
                            <span class="price_arz  <?php if($change<0): ?> text-danger <?php elseif($change>0): ?> text-success <?php endif; ?> d-block text-center"><?php echo e(number_format($response["try"]['value']*10)); ?> <small> ریال</small></span>
                            <span class="change_arz d-block text-center"><?php echo e(str_replace('-','',number_format($response["try"]['change']*10))); ?> (<?php echo e(str_replace('-','',round($persend,2))); ?>%)</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-6 arz_div_col">
                        <div class="arz_price_echo">
                            <?php
                            $a = $response["aed"]['value'] * 10;
                            $change = $response["aed"]['change'] * 10;
                            $b = $a + $change;
                            $persend = (($b - $a) / $a) * 100
                            ?>
                            <?php if($change<0): ?>
                                <h3 class="title_arz text-center"><i class="fas fa-chevron-down text-danger mr-1"></i>
                                    درهم امارات </h3>
                            <?php elseif($change>0): ?>
                                <h3 class="title_arz text-center"><i class="fas fa-chevron-up text-success mr-1"></i>
                                    درهم امارات </h3>
                            <?php else: ?>
                                <h3 class="title_arz text-center">
                                    درهم امارات </h3>
                            <?php endif; ?>
                            <span class="price_arz  <?php if($change<0): ?> text-danger <?php elseif($change>0): ?> text-success <?php endif; ?> d-block text-center"><?php echo e(number_format($response["aed"]['value']*10)); ?> <small> ریال</small></span>
                            <span class="change_arz d-block text-center"><?php echo e(str_replace('-','',number_format($response["aed"]['change']*10))); ?> (<?php echo e(str_replace('-','',round($persend,2))); ?>%)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Arz -->
    <?php endif; ?>
    <!-- CAR DEALER FORM AREA START -->
    <div class="ltn__car-dealer-form-area mt-40 pb-115---">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__car-dealer-form-tab">
                        <div class="ltn__tab-menu  text-uppercase mb-n2">
                            <div class="nav">
                                <a class="active show" data-toggle="tab" href="#ltn__form_tab_1_1"><i class="fas fa-home"></i>جستجوی ملک</a>
                            </div>
                        </div>
                        <div class="tab-content bg-white box-shadow-1 pb-10">
                            <div class="tab-pane fade active show" id="ltn__form_tab_1_1">
                                <div class="car-dealer-form-inner">
                                    <form action="<?php echo e(route('user.villas.search','all')); ?>" method="get" class="ltn__car-dealer-form-box row ">

                                        <div class="col-lg-3 col-md-6 chosen_box">
                                            <label>شهر</label>
                                            <select class="form-control chosen-select select_js state_id " name="state_id" id="state_id" data-type="state_id" data-reply="city_id" data-name="شهر">
                                                <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option data-target=".cityId<?php echo e($city->id); ?>" value="<?php echo e($city->id); ?>" <?php echo e($city->id==35?'selected':''); ?>><?php echo e($city->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-md-6 chosen_box">
                                            <label>نوع ملک</label>
                                            <select class="chosen-select" name="type_info[]" class="chosen-select" multiple data-placeholder="انتخاب نوع ملک" multiple>
                                                
                                                <?php $__currentLoopData = \App\Villa::types(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($key); ?>"><?php echo e($type); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-md-6 price_select chosen_box">
                                            <label>قیمت</label>
                                            <select class="chosen-select" name="price" class="chosen-select">
                                                <option value="all">انتخاب کنید</option>
                                                <?php $__currentLoopData = $price_select; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($price['min_p']); ?> - <?php echo e($price['max_p']); ?>" dir="ltr"><?php echo e(number_format($price['min_p'])); ?> - <?php echo e(number_format($price['max_p'])); ?> TL</option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-md-6 chosen_box">
                                            <label>متراژ</label>
                                            <select class="chosen-select" name="area" class="chosen-select">
                                                <option value="all">انتخاب کنید</option>
                                                <?php $__currentLoopData = $area_select; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($area['min_a']); ?>;<?php echo e($area['max_a']); ?>" dir="ltr"><?php echo e(number_format($area['min_a'])); ?> - <?php echo e(number_format($area['max_a'])); ?> متر </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>


                                            <div class="btn-wrapper btn_search_index text-center mt-0">
                                                <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase">جستجو</button>
                                            </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CAR DEALER FORM AREA END -->


    <?php if(count($services)): ?>
        <!-- FEATURE AREA START ( Feature - 6) -->
        <div class="ltn__feature-area section-bg-1--- pt-115 pb-90 mb-120--- position-relative over_hide">

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area ltn__section-title-2--- text-center">
                            <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color mous_point" onclick="return window.location.assign('<?php echo e(route('user.service.index')); ?>')">جهت مشاهده تمام خدمات اینجا کلیک کنید </h6>
                            <h1 class="section-title">خدمات آوارتین گروپ</h1>
                        </div>
                    </div>
                </div>
                <div class="row ltn__custom-gutter---  justify-content-center">
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 p-1">
                            <?php echo $__env->make('user.includes.serviceCard',['service'=>$service], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <!-- FEATURE AREA END -->
    <?php endif; ?>
    <?php if(isset($video) && count($video->array_select($video->text))): ?>
    <!-- VIDEO AREA START -->
    <div class="ltn__video-popup-area ltn__video-popup-margin---">
        <div class="ltn__video-bg-img ltn__video-popup-height-600--- bg-overlay-black-30 bg-image bg-fixed ltn__animation-pulse1" data-bg="<?php echo e(url($video->pic?$video->pic:'assets/user/pic/blog1.jpg')); ?>">
            <?php $__currentLoopData = $video->array_select($video->text); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="ltn__video-icon-2 <?php echo e($key>0?'d-none':''); ?> ltn__video-icon-2-border---" href="<?php echo e($val); ?>" data-rel="lightcase:myCollectionVideo">
                    <i class="fa fa-play"></i>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <!-- VIDEO AREA END -->
    <?php endif; ?>
    <?php if(count($villasAsItems)): ?>
        <!-- SEARCH BY PLACE AREA START (testimonial-7) -->
        <div class="ltn__search-by-place-area section-bg-1 before-bg-top--- bg-image-top--- pt-115 pb-70" data-bg="<?php echo e(url('assets/user/rtl/img/bg/20.jpg')); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area ltn__section-title-2--- text-center">
                            <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">ملک های ثبت شده اخیر</h6>
                            <h1 class="section-title">املاک</h1>
                        </div>
                    </div>
                </div>
                <div class="row ltn__product-slider-item-three-active slick-arrow-1">
                <?php $__currentLoopData = $villasAsItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $villa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- ltn__product-item -->
                        <div class="col-lg-12 px-1">
                            <?php echo $__env->make('user.includes.villaCard',['villa'=>$villa], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!--  -->
                </div>
            </div>
        </div>
        <!-- SEARCH BY PLACE AREA END -->
    <?php endif; ?>
    <?php if($about2): ?>
        <!-- Abouts2 -->
        <div class="ltn__brand-logo-area ltn__brand-logo-1  pt-110 pb-110 plr--9 d-none---">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9 mx-auto">
                        <?php echo $about2->text; ?>

                        <div class="btn-wrapper text-center">
                            <a class="btn theme-btn-1 btn-effect-1 text-uppercas rounded" href="<?php echo e(route('user.consulting')); ?>">جهت مشاوره رایگان کلیک کنید</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Abouts2 -->
    <?php endif; ?>
    <?php if(count($villaCategories)): ?>
        <!-- PRODUCT SLIDER AREA START -->
        <div class="ltn__product-slider-area section-bg-1 ltn__product-gutter pt-115 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area ltn__section-title-2--- text-center">
                            <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">پروژه های ثبت شده اخیر</h6>
                            <h1 class="section-title">پروژه ها</h1>
                        </div>
                    </div>
                </div>
                <div class="row ltn__search-by-place-slider-1-active slick-arrow-1">
                    <?php $__currentLoopData = $villaCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $villaCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-12 px-1">
                            <?php echo $__env->make('user.includes.projectCard',['item'=>$villaCat], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <!-- PRODUCT SLIDER AREA END -->
    <?php endif; ?>

    <?php if($about1): ?>
        <!-- Abouts1 AREA START -->
        <div class="ltn__video-popup-area ltn__video-popup-margin---">
            <div class="ltn__video-bg-img ltn__video-popup-height-600--- bg-overlay-black-30 bg-image bg-fixed ltn__animation-pulse1" data-bg="<?php echo e($about1->pic?url($about1->pic):url('assets/user/pic/back.jpg')); ?>">
                <div class="fusion-text fusion-text-3">
                    <?php echo $about1->text; ?>

                    <div class="btn-wrapper text-center">
                        <a class="btn theme-btn-1 btn-effect-3 text-uppercas rounded" href="<?php echo e(route('user.blog.index','migration')); ?>">جهت مشاهده مطالب مهاجرت کلیک کنید</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Abouts1 AREA END -->
    <?php endif; ?>

    <?php if(count($selectedLocations)): ?>
        <!-- TESTIMONIAL AREA START -->
        <div class="ltn__testimonial-area ltn__testimonial-4 pt-115 pb-100 plr--9">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area ltn__section-title-2--- text-center">
                            <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">برترین و پربازدیدترین مناطق استانبول</h6>
                            <h1 class="section-title">مناطق استانبول</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ltn__img-slider-area">
                            <div class="container-fluid">
                                <div class="row ltn__image-slider-4-active slick-arrow-1 slick-arrow-1-inner ltn__no-gutter-all">
                                    <?php $__currentLoopData = $selectedLocations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selectedLocation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-lg-12">
                                            <div class="ltn__img-slide-item-4">
                                                <?php if(count($selectedLocation->photos)): ?>
                                                    <?php $__currentLoopData = $selectedLocation->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <a href="<?php echo e($photo->path?url($photo->path):url('assets/user/rtl/img/testimonial/1.jpg')); ?>" data-rel="lightcase:myCollection<?php echo e($selectedLocation->id); ?>">
                                                            <img <?php echo e($key>0?'hidden':''); ?> src="<?php echo e($photo->path?url($photo->path):url('assets/user/rtl/img/testimonial/1.jpg')); ?>" alt="<?php echo e($selectedLocation->name); ?>">
                                                        </a>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                <div class="ltn__img-slide-info">
                                                    <div class="ltn__img-slide-info-brief">
                                                        <h6><?php echo e($selectedLocation->name); ?></h6>

                                                            <h1><a>İzmir</a></h1>

                                                    </div>
                                                    <div class="btn-wrapper">
                                                        <a href="<?php echo e(route('user.villas.search',['all','state_id'=>35,'city_id'=>[$selectedLocation->id]])); ?>" class="btn theme-btn-1 btn-effect-1 text-uppercase">ملک ها</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- TESTIMONIAL AREA END -->
    <?php endif; ?>



    <?php if(count($article)): ?>
        <!-- BLOG AREA START (blog-3) -->
        <div class="ltn__blog-area section-bg-1 pt-120 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area ltn__section-title-2--- text-center">
                            <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">آخرین بلاگ ها</h6>
                            <h1 class="section-title">بلاگ</h1>
                        </div>
                    </div>
                </div>
                <div class="row  ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
                <?php $__currentLoopData = $article; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- Blog Item -->
                        <div class="col-lg-12 px-1">
                            <?php echo $__env->make('user.includes.blogCard',['blog'=>$blog], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!--  -->
                </div>
            </div>
        </div>
        <!-- BLOG AREA END -->
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script_js'); ?>
    <script>
        $( ".price_s" ).slider({
            range: true,
            min: <?php echo e($price_min_all); ?>,
            max: <?php echo e($price_max_all); ?>,
            values: [ <?php echo e($price_min_all); ?>, <?php echo e($price_max_all); ?> ],
            slide: function( event, ui ) {
                $( ".price_amount" ).val(  ui.values[ 0 ] + " لیر - " + ui.values[ 1 ] +" لیر " );
            }
        });
        $( ".price_amount" ).val(  $( ".price_s" ).slider( "values", 0 ) +
            " لیر -  " + $( ".price_s" ).slider( "values", 1 ) + " لیر " );

        $( ".area_s" ).slider({
            range: true,
            min: <?php echo e($area_min_all); ?>,
            max: <?php echo e($area_max_all); ?>,
            values: [ <?php echo e($area_min_all); ?>, <?php echo e($area_max_all); ?> ],
            slide: function( event, ui ) {
                $( ".area_amount" ).val(  ui.values[ 0 ] + " متر - " + ui.values[ 1 ] +" متر " );
            }
        });
        $( ".area_amount" ).val(  $( ".area_s" ).slider( "values", 0 ) +
            " متر -  " + $( ".area_s" ).slider( "values", 1 ) + " متر " );

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>