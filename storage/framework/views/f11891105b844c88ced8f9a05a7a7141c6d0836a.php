
<?php $__env->startSection('styles'); ?>
    <title>جستجوی ویلا</title>
    <meta property="og:title" content="جستجوی ویلا - خانه استانبول">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
        <div class="container content_wrapper" dir="rtl">
            <div data-toggle="dropdown" id="second_filter_action" class="hide" data-value="Types"></div>
            <div data-toggle="dropdown" id="second_filter_categ" class="hide" data-value="Categories "></div>
            <div data-toggle="dropdown" id="second_filter_cities" class="hide" data-value="Cities"></div>
            <div data-toggle="dropdown" id="second_filter_areas" class="hide" data-value="Areas"></div>
            <div data-toggle="dropdown" id="second_filter_county" class="hide" data-value="States"></div>



                    <div class="row" dir="rtl">
                        <div id="google_map_prop_list_sidebar" class=" half_type1 half_position_left">
                            <div class="search_wrapper" id="xsearch_wrapper">
                                <div class="adv-search-1 halfsearch  adv_extended_class" id="adv-search-1" data-postid="6"
                                     data-tax="property_action_category">
                                    <div class="row" dir="rtl">
                                        <div role="tabpanel" class="adv_search_tab " id="tab_prpg_adv6">
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane rentals active" id="rentalshalf">
                                                    <form action="<?php echo e(route('front.villas.search1')); ?>" method="get">
                                                        <input type="hidden" name="filter_search_action[]" value="rentals">
                                                        <input type="hidden" name="adv6_search_tab" value="rentals">
                                                        <input type="hidden" name="term_id" class="term_id_class" value="2">
                                                        <input type="hidden" name="term_counter" class="term_counter" value="0">
                                                        <div class="col-md-4 categories float-right">
                                                            <div class="dropdown form-control ">
                                                                <div data-toggle="dropdown" id="adv_categ"
                                                                     class=" filter_menu_trigger  " xxmaca="" cacaall=""
                                                                     categories="" data-value="all">منطقه
                                                                    <span class="caret  caret_filter "></span>
                                                                </div>
                                                                <input type="hidden" name="filter_search_type[]" value="all">
                                                                <ul id="categlist" class="dropdown-menu filter_menu" role="menu"
                                                                    aria-labelledby="adv_categ">
                                                                    <li role="presentation" data-value="all">همه استانبول</li>
                                                                    <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$cit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <li role="presentation" data-value="apartments">
                                                                            <?php echo e($cit->name); ?></li>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 cities float-right">
                                                            <div class="dropdown form-control ">
                                                                <div data-toggle="dropdown" id="advanced_city"
                                                                     class=" filter_menu_trigger  " xxmaca="" cacaall="" cities=""
                                                                     data-value="all">ناحیه
                                                                    <span class="caret  caret_filter "></span>
                                                                </div>
                                                                <input type="hidden" name="advanced_city" value="">
                                                                <ul id="adv-search-city" class="dropdown-menu filter_menu"
                                                                    role="menu" aria-labelledby="advanced_city">
                                                                    <?php $__currentLoopData = $locate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$loc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li role="presentation" data-value="jersey-city"
                                                                        data-value2="jersey-city"
                                                                        data-parentcounty="new-jersey-state"><?php echo e($loc->name); ?>

                                                                    </li>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 float-right property_bedrooms">
                                                            <div class="dropdown form-control ">
                                                                <div data-toggle="dropdown" id="bedrooms"
                                                                     class=" filter_menu_trigger  " xx="" maca="" cacaall=""
                                                                     bedrooms="" data-value="all">تعداد خواب
                                                                    <span class="caret  caret_filter "></span>
                                                                </div>
                                                                <input type="hidden" name="room_num" value="">
                                                                <ul id="search-bedrooms" class="dropdown-menu filter_menu"
                                                                    role="menu" aria-labelledby="bedrooms">
                                                                    <li role="presentation" data-value="all">همه</li>
                                                                    <li data-value="1" value="1">1</li>
                                                                    <li data-value="2" value="2">2</li>
                                                                    <li data-value="3" value="3">3</li>
                                                                    <li data-value="4" value="4">4</li>
                                                                    <li data-value="5" value="5">5</li>
                                                                    <li data-value="6" value="6">6</li>
                                                                    <li data-value="7" value="7">7</li>
                                                                    <li data-value="8" value="8">8</li>
                                                                    <li data-value="9" value="9">9</li>
                                                                    <li data-value="10" value="10">10</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 property_price">
                                                            <div class="row px-3">
                                                                <div class="col-md-12 col-xs-12">
                                                                    <div class="form-group bootstrap-selects <?php if($errors->has('price')): ?> has-danger <?php endif; ?>" style="direction: ltr">
                                                                        <input type="text" class="js-range-slider" name="price" value="" />
                                                                        <span class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top" title="ملک‌های کمتر از ۲۰۰ هزار لیر مناسب ‌شان و سلیقه ی هموطنان عزیز ایرانی‌ نیست" style="position: absolute;left: -8px;top: 23px;"><i class="fa fa-info"></i></span>
                                                                        <span class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top" title="ملک‌های بالا تر از ۲۰ میلیون لیر، به دلایل قانونی‌، قابل نمایش در سایت نیستند. در صورت نیاز، از طریق کارشناسان مربوطه ی سازمان، مورد مد نظرتان را پیگیری کنید" style="position: absolute;right: -8px;top: 23px;"><i class="fa fa-info"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 submit_container_half" style="display: block">
                                                            <input name="submit" type="submit" class="wpresidence_button advanced_submit_4" value="جستجو ملک">
                                                        </div>
    
    
    
                                                        <div class="extended_search_check_wrapper">
                                                            <span
                                                                    id="adv_extended_close_half" class="adv_extended_close_button"><i
                                                                        class="fas fa-times"></i></span>
                                                            <div class="extended_search_checker">
                                                                <input type="checkbox" id="back-yardhalfrentals" name="back-yard"
                                                                       name-title="Back yard" value="1">
                                                                <label for="back-yardhalfrentals">Back yard</label>
                                                            </div>
                                                            <div class="extended_search_checker">
                                                                <input type="checkbox" id="central-airhalfrentals"
                                                                       name="central-air" name-title="Central Air" value="1">
                                                                <label for="central-airhalfrentals">Central Air</label>
                                                            </div>
                                                            <div class="extended_search_checker">
                                                                <input type="checkbox" id="chair-accessiblehalfrentals"
                                                                       name="chair-accessible" name-title="Chair Accessible"
                                                                       value="1">
                                                                <label for="chair-accessiblehalfrentals">Chair Accessible</label>
                                                            </div>
                                                            <div class="extended_search_checker">
                                                                <input type="checkbox" id="elevatorhalfrentals" name="elevator"
                                                                       name-title="Elevator" value="1">
                                                                <label for="elevatorhalfrentals">Elevator</label>
                                                            </div>
                                                            <div class="extended_search_checker">
                                                                <input type="checkbox" id="fireplacehalfrentals" name="fireplace"
                                                                       name-title="Fireplace" value="1">
                                                                <label for="fireplacehalfrentals">Fireplace</label>
                                                            </div>
                                                            <div class="extended_search_checker">
                                                                <input type="checkbox" id="front-yardhalfrentals" name="front-yard"
                                                                       name-title="Front yard" value="1">
                                                                <label for="front-yardhalfrentals">Front yard</label>
                                                            </div>
                                                            <div class="extended_search_checker">
                                                                <input type="checkbox" id="garage-attachedhalfrentals"
                                                                       name="garage-attached" name-title="Garage Attached"
                                                                       value="1">
                                                                <label for="garage-attachedhalfrentals">Garage Attached</label>
                                                            </div>
                                                            <div class="extended_search_checker">
                                                                <input type="checkbox" id="laundryhalfrentals" name="laundry"
                                                                       name-title="Laundry" value="1">
                                                                <label for="laundryhalfrentals">Laundry</label>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                                <div role="tabpanel" class="tab-pane rentals " id="saleshalf">
                                                    <input type="hidden" name="filter_search_action[]" value="sales">
                                                    <input type="hidden" name="adv6_search_tab" value="sales">
                                                    <input type="hidden" name="term_id" class="term_id_class" value="3">
                                                    <input type="hidden" name="term_counter" class="term_counter" value="1">
                                                    <div class="col-md-3 county_/_state">
                                                        <div class="dropdown form-control ">
                                                            <div data-toggle="dropdown" id="county-state"
                                                                 class=" filter_menu_trigger  " xxmaca="" cacaall="" states=""
                                                                 data-value="all">States
                                                                <span class="caret  caret_filter "></span>
                                                            </div>
                                                            <input type="hidden" name="advanced_contystate" value="">
                                                            <ul id="adv-search-countystate" class="dropdown-menu filter_menu"
                                                                role="menu" aria-labelledby="county-state">
                                                                <li role="presentation" data-value="all" data-value2="all">
                                                                    States
                                                                </li>
                                                                <li role="presentation" data-value="new-jersey-state"
                                                                    data-value2="new-jersey-state">New Jersey State
                                                                </li>
                                                                <li role="presentation" data-value="new-york-state"
                                                                    data-value2="new-york-state">New York State
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 property_status">
                                                        <div class="dropdown form-control ">
                                                            <div data-toggle="dropdown" id="adv_status"
                                                                 class=" filter_menu_trigger  " xxmaca="" cacaall="" property=""
                                                                 status="" data-value="all">Property Status
                                                                <span class="caret  caret_filter "></span>
                                                            </div>
                                                            <input type="hidden" name="property_status" value="">
                                                            <ul id="statuslist" class="dropdown-menu filter_menu" role="menu"
                                                                aria-labelledby="adv_status">
                                                                <li role="presentation" data-value="all">Property Status</li>
                                                                <li role="presentation" data-value="active">Active (2)</li>
                                                                <li role="presentation" data-value="hot-offer">Hot Offer (7)
                                                                </li>
                                                                <li role="presentation" data-value="new-offer">New Offer (10)
                                                                </li>
                                                                <li role="presentation" data-value="open-house">Open House (6)
                                                                </li>
                                                                <li role="presentation" data-value="sold">Sold (1)</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 property_bedrooms">
                                                        <div class="dropdown form-control ">
                                                            <div data-toggle="dropdown" id="min-beds"
                                                                 class=" filter_menu_trigger  " xx="" maca="" cacaall="" min.=""
                                                                 beds="" data-value="all">Min. Beds
                                                                <span class="caret  caret_filter "></span>
                                                            </div>
                                                            <input type="hidden" name="min-beds" value="">
                                                            <ul id="search-min-beds" class="dropdown-menu filter_menu"
                                                                role="menu" aria-labelledby="min-beds">
                                                                <li role="presentation" data-value="all">Min. Beds</li>
                                                                <li data-value="1" value="1">1</li>
                                                                <li data-value="2" value="2">2</li>
                                                                <li data-value="3" value="3">3</li>
                                                                <li data-value="4" value="4">4</li>
                                                                <li data-value="5" value="5">5</li>
                                                                <li data-value="6" value="6">6</li>
                                                                <li data-value="7" value="7">7</li>
                                                                <li data-value="8" value="8">8</li>
                                                                <li data-value="9" value="9">9</li>
                                                                <li data-value="10" value="10">10</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 property_bathrooms">
                                                        <div class="dropdown form-control ">
                                                            <div data-toggle="dropdown" id="min-baths"
                                                                 class=" filter_menu_trigger  " xx="" maca="" cacaall="" min.=""
                                                                 baths="" data-value="all">Min. Baths
                                                                <span class="caret  caret_filter "></span>
                                                            </div>
                                                            <input type="hidden" name="min-baths" value="">
                                                            <ul id="search-min-baths" class="dropdown-menu filter_menu"
                                                                role="menu" aria-labelledby="min-baths">
                                                                <li role="presentation" data-value="all">Min. Baths</li>
                                                                <li data-value="1" value="1">1</li>
                                                                <li data-value="2" value="2">2</li>
                                                                <li data-value="3" value="3">3</li>
                                                                <li data-value="4" value="4">4</li>
                                                                <li data-value="5" value="5">5</li>
                                                                <li data-value="6" value="6">6</li>
                                                                <li data-value="7" value="7">7</li>
                                                                <li data-value="8" value="8">8</li>
                                                                <li data-value="9" value="9">9</li>
                                                                <li data-value="10" value="10">10</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 property_size"><input type="text" id="max-size"
                                                                                               name="max-size"
                                                                                               placeholder="Max. Size"
                                                                                               class="advanced_select form-control">
                                                    </div>
                                                    <div class="col-md-6 property_price">
                                                        <div class="adv_search_slider">
                                                            <p>
                                                                <label for="amount">Price range:</label>
                                                                <span id="amount_3_half" class="wpresidence_slider_price">$ 0 to $ 1,500,000</span>
                                                            </p>
                                                            <div id="slider_price_3_half"
                                                                 class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                                                <div class="ui-slider-range ui-corner-all ui-widget-header"
                                                                     style="left: 0%; width: 100%;"></div>
                                                                <span tabindex="0"
                                                                      class="ui-slider-handle ui-corner-all ui-state-default"
                                                                      style="left: 0%;"></span><span tabindex="0"
                                                                                                     class="ui-slider-handle ui-corner-all ui-state-default"
                                                                                                     style="left: 100%;"></span>
                                                            </div>
                                                            <input type="hidden" id="price_low_3"
                                                                   class="adv6_price_low price_active" name="price_low_3"
                                                                   value="0">
                                                            <input type="hidden" id="price_max_3"
                                                                   class="adv6_price_max price_active" name="price_max_3"
                                                                   value="1500000">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 submit_container_half ">
                                                        <input name="submit" type="submit" class="wpresidence_button advanced_submit_4" value="Search Properties">
                                                    </div>
                                                    <div class="adv_extended_options_text" id="adv_extended_options_text_half">
                                                        More Search Options
                                                    </div>
                                                    <div class="extended_search_check_wrapper"><span
                                                                id="adv_extended_close_half" class="adv_extended_close_button"><i
                                                                    class="fas fa-times"></i></span>
                                                        <div class="extended_search_checker">
                                                            <input type="checkbox" id="back-yardhalfsales" name="back-yard"
                                                                   name-title="Back yard" value="1">
                                                            <label for="back-yardhalfsales">Back yard</label>
                                                        </div>
                                                        <div class="extended_search_checker">
                                                            <input type="checkbox" id="central-airhalfsales" name="central-air"
                                                                   name-title="Central Air" value="1">
                                                            <label for="central-airhalfsales">Central Air</label>
                                                        </div>
                                                        <div class="extended_search_checker">
                                                            <input type="checkbox" id="chair-accessiblehalfsales"
                                                                   name="chair-accessible" name-title="Chair Accessible"
                                                                   value="1">
                                                            <label for="chair-accessiblehalfsales">Chair Accessible</label>
                                                        </div>
                                                        <div class="extended_search_checker">
                                                            <input type="checkbox" id="elevatorhalfsales" name="elevator"
                                                                   name-title="Elevator" value="1">
                                                            <label for="elevatorhalfsales">Elevator</label>
                                                        </div>
                                                        <div class="extended_search_checker">
                                                            <input type="checkbox" id="fireplacehalfsales" name="fireplace"
                                                                   name-title="Fireplace" value="1">
                                                            <label for="fireplacehalfsales">Fireplace</label>
                                                        </div>
                                                        <div class="extended_search_checker">
                                                            <input type="checkbox" id="front-yardhalfsales" name="front-yard"
                                                                   name-title="Front yard" value="1">
                                                            <label for="front-yardhalfsales">Front yard</label>
                                                        </div>
                                                        <div class="extended_search_checker">
                                                            <input type="checkbox" id="garage-attachedhalfsales"
                                                                   name="garage-attached" name-title="Garage Attached"
                                                                   value="1">
                                                            <label for="garage-attachedhalfsales">Garage Attached</label>
                                                        </div>
                                                        <div class="extended_search_checker">
                                                            <input type="checkbox" id="laundryhalfsales" name="laundry"
                                                                   name-title="Laundry" value="1">
                                                            <label for="laundryhalfsales">Laundry</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" id="tax_categ_picked" value="">
                                        <input type="hidden" id="tax_action_picked" value="">
                                        <input type="hidden" id="tax_city_picked" value="">
                                        <input type="hidden" id="taxa_area_picked" value="">
                                    </div>
                                </div>
                                <div class="dropdown listing_filter_select order_filter  order_filter_single ">
                                    <div data-toggle="dropdown" id="a_filter_order" class="filter_menu_trigger" data-value="0">
                                        پیشفرض
                                        <span class="caret caret_filter"></span>
                                    </div>
                                    <ul id="filter_order" class="dropdown-menu filter_menu" role="menu" aria-labelledby="a_filter_order">
                                        <li role="presentation" data-value="1">ارزانترین قیمت</li>
                                        <li role="presentation" data-value="2">گرانترین قیمت</li>
                                        <li role="presentation" data-value="3">جدیترین</li>
                                        <li role="presentation" data-value="4">قدیمی ترین</li>
                                        <li role="presentation" data-value="0">پیشفرض</li>
                                    </ul>
                                </div>
                            </div>
                            <h1 class="entry-title title_prop">جستجوی پیشرفته (
                                
                                <?php echo e(count($items)); ?>

                                )
                            </h1>
                            <div class="spinner" id="listing_loader">
                                <div class="new_prelader"></div>
                            </div>
                            <div id="listing_ajax_container" class="ajax-map">
                                <?php $villasAsItems=$items ?>
                                <?php echo $__env->make('villas.item', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <div class="wpestate_listing_sh_loader">
                                    <div class="new_prelader"></div>
                                </div>
                                <div class="listinglink-wrapper_sh_listings">
                                    <span id="loadMoreVilla" data-url="<?php echo e(url()->full()); ?>" class="wpresidence_button wpestate_item_list_sh">مشاهده بیشتر املاک </span>
                                </div>
                            </div>

                            <div class="half-pagination">
                            </div>
                        </div>
                    </div>



            <div class="half_map_controllers_wrapper">
                <div class="half_mobile_toggle_listings half_control_visible"><i class="fas fa-bars"></i>Listings</div>
                <div class="half_mobile_toggle_map "><i class="far fa-map"></i> Map View</div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>