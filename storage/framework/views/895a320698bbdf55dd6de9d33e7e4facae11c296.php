
<?php $__env->startSection('style_css'); ?>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css"/>
    <style>
        .nice-select {
            width: 100%;
        }

        .nice-select.chosen-select {
            display: none;
        }

        .irs--flat .irs-from, .irs--flat .irs-to, .irs--flat .irs-single, .irs-grid-text {
            direction: rtl;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>

    <!-- PRODUCT DETAILS AREA START -->
    <div class="ltn__product-area ltn__product-gutter">
        <div class="container">
            <div class="row">
                <div class="col-lg-4  mb-100">
                    <aside class="sidebar ltn__shop-sidebar">
                        <!-- Advance Information widget -->
                        <form action="<?php echo e(route('user.villas.search',$type_melk)); ?>" method="get" id="frm_submit_search"
                              class="widget ltn__menu-widget">
                            <input type="text" name="count_page" class="count_page" value="<?php echo e($count_page); ?>" hidden>
                            <input type="text" name="sort_id" class="sort_id" value="<?php echo e($sort_id); ?>" hidden>
                            <h4 class="ltn__widget-title">شهر</h4>
                            <select class="form-control chosen-select select_js state_id " name="state_id" id="state_id"
                                    data-type="state_id" data-reply="city_id" data-name="شهر">
                                <option value="">انتخاب نمایید</option>
                                <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option data-target=".cityId<?php echo e($city->id); ?>"
                                            value="<?php echo e($city->id); ?>" <?php echo e($state_id == $city->id ? 'selected' : ''); ?>><?php echo e($city->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <hr class="select_hr">
                            <h4 class="ltn__widget-title">منطقه</h4>
                            <select class="form-control chosen-select select_js city_id" name="city_id[]" id="city_id"
                                    data-type="city_id" data-reply="zone_id" data-name="منطقه" multiple
                                    data-placeholder="انتخاب منطقه">
                                <?php if(isset($citys) and $citys!=''): ?>
                                    <?php $__currentLoopData = $citys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option data-target=".cityId<?php echo e($city->id); ?>"
                                                value="<?php echo e($city->id); ?>" <?php echo e(in_array($city->id,$city_id)? 'selected' : ''); ?>><?php echo e($city->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <option value="">انتخاب نمایید</option>
                                <?php endif; ?>
                            </select>

                            <hr class="select_hr">
                            <h4 class="ltn__widget-title">دسته ملک</h4>
                            <select name="type_villa[]" data-placeholder="انتخاب دسته ملک" class="chosen-select"
                                    multiple>
                                <?php $__currentLoopData = \App\Villa::types_villa(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$types): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>" <?php echo e(in_array($key,$type_villa)?'selected':''); ?>><?php echo e($types); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            <hr>
                            <h4 class="ltn__widget-title">نوع ملک</h4>
                            <select name="type_info[]" data-placeholder="انتخاب نوع ملک" class="chosen-select" multiple>
                                <?php $__currentLoopData = \App\Villa::types(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>" <?php echo e(in_array($key,$type_info)?'selected':''); ?>><?php echo e($type); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            <hr>
                            <h4 class="ltn__widget-title">تعداد اتاق</h4>
                            <select name="room_num[]" data-placeholder="انتخاب تعداد اتاق" class="chosen-select"
                                    multiple>
                                <?php $__currentLoopData = range(1,10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>" <?php echo e(in_array($key,$room_num)?'selected':''); ?>><?php echo e($key); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <hr class="select_hr">

                            <div class="col-12">
                                <h4 class="ltn__widget-title ltn__widget-title-border---">متراژ</h4>
                                <input type="text" class="js-range-slider-area" name="area" value=""/>
                                <hr class="">
                            </div>
                            <!-- Price Filter Widget -->
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            <h4 class="ltn__widget-title">فیلتر قیمت</h4>
                            <select name="price_type" class="chosen-select price_type_select">
                                <option value="price_lir" <?php echo e($price_type=='price_lir'?'selected':''); ?>>لیر</option>
                                <option value="price_toman" <?php echo e($price_type=='price_toman'?'selected':''); ?>>تومان</option>
                                <option value="price_dollar" <?php echo e($price_type=='price_dollar'?'selected':''); ?>>دلار</option>
                            </select>
                            <hr class="select_hr">
                            <div class="col-12 lir-rang <?php echo e($price_type=='price_lir'?'':'d-none'); ?>">
                                <h4 class="ltn__widget-title ltn__widget-title-border---">قیمت لیر</h4>
                                <input type="text" class="js-range-slider-price-lir" name="price_lir" value=""/>
                                <hr class="">
                            </div>
                            <div class="col-12 toman-rang <?php echo e($price_type=='price_toman'?'':'d-none'); ?>">
                                <h4 class="ltn__widget-title ltn__widget-title-border---">قیمت تومان</h4>
                                <input type="text" class="js-range-slider-price-toman" name="price_toman" value=""/>
                                <hr>
                            </div>
                            <div class="col-12 dollar-rang <?php echo e($price_type=='price_dollar'?'':'d-none'); ?>">
                                <h4 class="ltn__widget-title ltn__widget-title-border---">قیمت دلار</h4>
                                <input type="text" class="js-range-slider-price-dollar" name="price_dollar" value=""/>
                                <hr>
                            </div>
                            <div class="btn-wrapper text-center mt-0">
                                <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase w-100">جستجوی
                                    ملک
                                </button>
                            </div>
                        </form>

                    </aside>
                </div>
                <div class="col-lg-8 order-lg-2 mb-100">
                    <div class="ltn__shop-options">
                        <ul class="justify-content-start">
                            <?php if($items->total()>0): ?>
                                <li>
                                    <div class="showing-product-number text-right">
                                        <span> <?php echo e($items->total()); ?> مورد یافت شد</span>
                                    </div>
                                </li>
                            <?php endif; ?>
                            <li>
                                <div class="short-by text-center">
                                    <select class="nice-select" id="sort_id">
                                        <option value="new" <?php echo e($sort_id=='new'?'selected':''); ?>>جدیدترین</option>
                                        <option value="min_price" <?php echo e($sort_id=='min_price'?'selected':''); ?>>ارزانترین
                                        </option>
                                        <option value="max_price" <?php echo e($sort_id=='max_price'?'selected':''); ?>>گرانترین
                                        </option>
                                        <option value="seen" <?php echo e($sort_id=='seen'?'selected':''); ?>>پربازدیدترین</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="short-by text-center">
                                    <select class="nice-select" id="count_page">
                                        <option value="12" <?php echo e($count_page==12?'selected':''); ?>>هر صفحه : 12</option>
                                        <option value="18" <?php echo e($count_page==18?'selected':''); ?>>هر صفحه : 18</option>
                                        <option value="24" <?php echo e($count_page==24?'selected':''); ?>>هر صفحه : 24</option>
                                        <option value="30" <?php echo e($count_page==30?'selected':''); ?>>هر صفحه : 30</option>
                                        <option value="36" <?php echo e($count_page==36?'selected':''); ?>>هر صفحه : 36</option>
                                        <option value="42" <?php echo e($count_page==42?'selected':''); ?>>هر صفحه : 42</option>
                                        <option value="48" <?php echo e($count_page==48?'selected':''); ?>>هر صفحه : 48</option>
                                    </select>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_product_grid">
                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                <div class="row">
                                <?php if(count($items)): ?>
                                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <!-- ltn__product-item -->
                                            <div class="col-xl-6 col-sm-6 col-12 px-1">
                                                <?php echo $__env->make('user.includes.villaCard',['villa'=>$item], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                            </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <!--  -->
                                    <?php else: ?>
                                        <div class="alert alert-danger col-md-8 mx-auto text-center">
                                            یافت نشد!
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ltn__pagination-area text-center">
                        <div class="ltn__pagination">
                            <?php echo e($items->appends(Request::except('page'))->links()); ?>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- PRODUCT DETAILS AREA END -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script_js'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
    <script>
        $(".js-range-slider-price-lir").ionRangeSlider({
            type: "double",
            min: <?php echo e($price_min_all); ?>,
            max: <?php echo e($price_max_all); ?>,
            from: <?php echo e($price_min); ?>,
            to: <?php echo e($price_max); ?>,
            grid: true,
            step: 500,
            grid_num: 2,
            postfix: " لیر",
            prettify_enabled: true,
            prettify_separator: ","
        });
        $(".js-range-slider-price-toman").ionRangeSlider({
            type: "double",
            min: <?php echo e(\App\Villa::convertPrice($price_min_all,'toman')); ?>,
            max: <?php echo e(\App\Villa::convertPrice($price_max_all,'toman')); ?>,
            from: <?php echo e(\App\Villa::convertPrice($price_min,'toman')); ?>,
            to: <?php echo e(\App\Villa::convertPrice($price_max,'toman')); ?>,
            grid: true,
            step: 500,
            grid_num: 2,
            postfix: " تومان",
            prettify_enabled: true,
            prettify_separator: ","
        });
        $(".js-range-slider-price-dollar").ionRangeSlider({
            type: "double",
            min: <?php echo e(\App\Villa::convertPrice($price_min_all,'dollar')); ?>,
            max: <?php echo e(\App\Villa::convertPrice($price_max_all,'dollar')); ?>,
            from: <?php echo e(\App\Villa::convertPrice($price_min,'dollar')); ?>,
            to: <?php echo e(\App\Villa::convertPrice($price_max,'dollar')); ?>,
            grid: true,
            step: 500,
            grid_num: 2,
            postfix: " دلار",
            prettify_enabled: true,
            prettify_separator: ","
        });

        $(".js-range-slider-area").ionRangeSlider({
            type: "double",
            min: <?php echo e($area_min_all); ?>,
            max: <?php echo e($area_max_all); ?>,
            from: <?php echo e($area_min); ?>,
            to: <?php echo e($area_max); ?>,
            grid: true,
            step: 1,
            grid_num: 4,
            postfix: " متر",
            prettify_enabled: true,
            prettify_separator: ","
        });


        
        
        
        
        
        
        
        
        
        
        

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>