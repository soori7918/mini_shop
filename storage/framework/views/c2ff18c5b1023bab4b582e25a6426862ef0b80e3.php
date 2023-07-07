<li id="advanced_search_widget-14" class="widget-container advanced_search_sidebar boxed_widget">
    <h3 class="widget-title-sidebar">جستجوی پیشرفته</h3>
    <form role="search" method="get" action="<?php echo e(route('front.villas.search1')); ?>">
        <input type="hidden" id="wpestate_regular_search_nonce" name="wpestate_regular_search_nonce" value="b4e4ead46b">
        <input type="hidden" name="_wp_http_referer" value="/properties/3-rooms-mahattan-new-york/">
        <div role="tabpanel" class="adv_search_tab " id="tab_prpg_adv6">








            <div class="tab-content">
                <div role="tabpanel" class="tab-pane  active" id="rentalssidebar">
                    <input type="hidden" name="filter_search_action[]" value="rentals">
                    <input type="hidden" name="adv6_search_tab" value="rentals">
                    <input type="hidden" name="term_id" class="term_id_class" value="2">
                    <input type="hidden" name="term_counter" class="term_counter" value="0">
                    <div class="col-md-3 categories">
                        <div class="dropdown form-control ">
                            <div data-toggle="dropdown" id="sidebar-adv_categ" class=" sidebar_filter_menu" xxmaca="" cacaall="" categories="" data-value="all">
                                منطقه
                                <span class="caret  caret_sidebar"></span>
                            </div>
                            <input type="hidden" name="city_id" value="">
                            <ul id="sidebar-categlist" class="dropdown-menu filter_menu" role="menu" aria-labelledby="sidebar-adv_categ">
                                <li  data-value="all">همه استانبول</li>
                                <?php $__currentLoopData = \App\City::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li  data-value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 cities">
                        <div class="dropdown form-control ">
                            <div data-toggle="dropdown" id="sidebar-advanced_city" class=" sidebar_filter_menu  " xxmaca="" cacaall="" cities="" data-value="all">نوع ملک
                                <span class="caret  caret_sidebar "></span>
                            </div>
                            <input type="hidden" name="type_info" value="">
                            <ul id="sidebar-adv-search-city" class="dropdown-menu filter_menu" role="menu" aria-labelledby="sidebar-advanced_city">
                                <li  data-value="all" data-value2="all">
                                    همه
                                </li>
                                <?php $__currentLoopData = \App\Villa::types(false); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li  data-value="<?php echo e($key); ?>" data-value2="<?php echo e($key); ?>" data-parentcounty="<?php echo e($key); ?>">
                                        <?php echo e($type); ?>

                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 property_bedrooms">
                        <div class="dropdown form-control ">
                            <div data-toggle="dropdown" id="sidebar-bedrooms" class=" sidebar_filter_menu  " xx="" maca="" cacaall="" bedrooms="" data-value="all">تعداد خواب
                                <span class="caret  caret_sidebar "></span>
                            </div>
                            <input type="hidden" name="room_num" value="">
                            <ul id="sidebar-search-bedrooms" class="dropdown-menu filter_menu" role="menu" aria-labelledby="sidebar-bedrooms">
                                <li  data-value="all">همه</li>
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



                    <div class="col-md-6 property_price">
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
                    <div class="col-md-3 submit_container_half ">
                        <input name="submit" type="submit" class="wpresidence_button advanced_submit_4" value="جستجوی ملک">
                    </div>

                    <div class="extended_search_check_wrapper">
                        <span id="adv_extended_close_sidebar" class="adv_extended_close_button"><i class="fas fa-times"></i></span>
                        <div class="extended_search_checker">
                            <input type="checkbox" id="back-yardsidebarrentals" name="back-yard" name-title="Back yard" value="1">
                            <label for="back-yardsidebarrentals">Back yard</label>
                        </div>
                        <div class="extended_search_checker">
                            <input type="checkbox" id="central-airsidebarrentals" name="central-air" name-title="Central Air" value="1">
                            <label for="central-airsidebarrentals">Central Air</label>
                        </div>
                        <div class="extended_search_checker">
                            <input type="checkbox" id="chair-accessiblesidebarrentals" name="chair-accessible" name-title="Chair Accessible" value="1">
                            <label for="chair-accessiblesidebarrentals">Chair Accessible</label>
                        </div>
                        <div class="extended_search_checker">
                            <input type="checkbox" id="elevatorsidebarrentals" name="elevator" name-title="Elevator" value="1">
                            <label for="elevatorsidebarrentals">Elevator</label>
                        </div>
                        <div class="extended_search_checker">
                            <input type="checkbox" id="fireplacesidebarrentals" name="fireplace" name-title="Fireplace" value="1">
                            <label for="fireplacesidebarrentals">Fireplace</label>
                        </div>
                        <div class="extended_search_checker">
                            <input type="checkbox" id="front-yardsidebarrentals" name="front-yard" name-title="Front yard" value="1">
                            <label for="front-yardsidebarrentals">Front yard</label>
                        </div>
                        <div class="extended_search_checker">
                            <input type="checkbox" id="garage-attachedsidebarrentals" name="garage-attached" name-title="Garage Attached" value="1">
                            <label for="garage-attachedsidebarrentals">Garage Attached</label>
                        </div>
                        <div class="extended_search_checker">
                            <input type="checkbox" id="laundrysidebarrentals" name="laundry" name-title="Laundry" value="1">
                            <label for="laundrysidebarrentals">Laundry</label>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane  " id="salessidebar">
                    <form serch5="" role="search" method="get"
                          action="https://www.khaneistanbul.com.tr/advanced-search/">
                        <input type="hidden" name="filter_search_action[]" value="sales">
                        <input type="hidden" name="adv6_search_tab" value="sales">
                        <input type="hidden" name="term_id" class="term_id_class" value="3">
                        <input type="hidden" name="term_counter" class="term_counter" value="1">
                        <div class="col-md-3 county_/_state">
                            <div class="dropdown form-control ">
                                <div data-toggle="dropdown" id="sidebar-county-state" class=" sidebar_filter_menu  " xxmaca="" cacaall="" states="" data-value="all">States <span class="caret  caret_sidebar "></span></div>
                                <input type="hidden" name="advanced_contystate" value="">
                                <ul id="sidebar-adv-search-countystate" class="dropdown-menu filter_menu" role="menu" aria-labelledby="sidebar-county-state">
                                    <li  data-value="all" data-value2="all">
                                        States
                                    </li>
                                    <li  data-value="new-jersey-state" data-value2="new-jersey-state">
                                        New Jersey State
                                    </li>
                                    <li  data-value="new-york-state" data-value2="new-york-state">
                                        New York State
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 property_status">
                            <div class="dropdown form-control ">
                                <div data-toggle="dropdown" id="sidebar-adv_status"
                                     class=" sidebar_filter_menu  " xxmaca="" cacaall=""
                                     property="" status="" data-value="all">Property Status
                                    <span class="caret  caret_sidebar "></span></div>
                                <input type="hidden" name="property_status" value="">
                                <ul id="sidebar-statuslist"
                                    class="dropdown-menu filter_menu" role="menu"
                                    aria-labelledby="sidebar-adv_status">
                                    <li  data-value="all">Property
                                        Status
                                    </li>
                                    <li  data-value="active">Active (2)
                                    </li>
                                    <li  data-value="hot-offer">Hot Offer
                                        (7)
                                    </li>
                                    <li  data-value="new-offer">New Offer
                                        (10)
                                    </li>
                                    <li  data-value="open-house">Open
                                        House (6)
                                    </li>
                                    <li  data-value="sold">Sold (1)</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 property_bedrooms">
                            <div class="dropdown form-control ">
                                <div data-toggle="dropdown" id="sidebar-min-beds"
                                     class=" sidebar_filter_menu  " xx="" maca="" cacaall=""
                                     min.="" beds="" data-value="all">Min. Beds <span
                                            class="caret  caret_sidebar "></span></div>
                                <input type="hidden" name="min-beds" value="">
                                <ul id="sidebar-search-min-beds"
                                    class="dropdown-menu filter_menu" role="menu"
                                    aria-labelledby="sidebar-min-beds">
                                    <li  data-value="all">Min. Beds</li>
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
                                <div data-toggle="dropdown" id="sidebar-min-baths"
                                     class=" sidebar_filter_menu  " xx="" maca="" cacaall=""
                                     min.="" baths="" data-value="all">Min. Baths <span
                                            class="caret  caret_sidebar "></span></div>
                                <input type="hidden" name="min-baths" value="">
                                <ul id="sidebar-search-min-baths"
                                    class="dropdown-menu filter_menu" role="menu"
                                    aria-labelledby="sidebar-min-baths">
                                    <li  data-value="all">Min. Baths</li>
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
                        <div class="col-md-3 property_size"><input type="text"
                                                                   id="sidebar-max-size"
                                                                   name="max-size"
                                                                   placeholder="Max. Size"
                                                                   class="advanced_select form-control">
                        </div>
                        <div class="col-md-6 property_price">
                            <div class="adv_search_slider"><p><label for="amount">Price
                                        range:</label> <span id="amount_3_sidebar"
                                                             class="wpresidence_slider_price">$ 0 to $ 1,500,000</span>
                                </p>
                                <div id="slider_price_3_sidebar"
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
                                       class="adv6_price_low price_active"
                                       name="price_low_3" value="0"> <input type="hidden"
                                                                            id="price_max_3"
                                                                            class="adv6_price_max price_active"
                                                                            name="price_max_3"
                                                                            value="1500000">
                            </div>
                        </div>
                        <div class="col-md-3 submit_container_half "><input name="submit"
                                                                            type="submit"
                                                                            class="wpresidence_button advanced_submit_4"
                                                                            value="Search Properties">
                        </div>
                        <div class="adv_extended_options_text"
                             id="adv_extended_options_text_sidebar">More Search Options
                        </div>
                        <div class="extended_search_check_wrapper"><span
                                    id="adv_extended_close_sidebar"
                                    class="adv_extended_close_button"><i
                                        class="fas fa-times"></i></span>
                            <div class="extended_search_checker"><input type="checkbox"
                                                                        id="back-yardsidebarsales"
                                                                        name="back-yard"
                                                                        name-title="Back yard"
                                                                        value="1"> <label
                                        for="back-yardsidebarsales">Back yard</label></div>
                            <div class="extended_search_checker"><input type="checkbox"
                                                                        id="central-airsidebarsales"
                                                                        name="central-air"
                                                                        name-title="Central Air"
                                                                        value="1"> <label
                                        for="central-airsidebarsales">Central Air</label></div>
                            <div class="extended_search_checker"><input type="checkbox"
                                                                        id="chair-accessiblesidebarsales"
                                                                        name="chair-accessible"
                                                                        name-title="Chair Accessible"
                                                                        value="1"> <label
                                        for="chair-accessiblesidebarsales">Chair
                                    Accessible</label></div>
                            <div class="extended_search_checker"><input type="checkbox"
                                                                        id="elevatorsidebarsales"
                                                                        name="elevator"
                                                                        name-title="Elevator"
                                                                        value="1"> <label
                                        for="elevatorsidebarsales">Elevator</label></div>
                            <div class="extended_search_checker"><input type="checkbox"
                                                                        id="fireplacesidebarsales"
                                                                        name="fireplace"
                                                                        name-title="Fireplace"
                                                                        value="1"> <label
                                        for="fireplacesidebarsales">Fireplace</label></div>
                            <div class="extended_search_checker"><input type="checkbox"
                                                                        id="front-yardsidebarsales"
                                                                        name="front-yard"
                                                                        name-title="Front yard"
                                                                        value="1"> <label
                                        for="front-yardsidebarsales">Front yard</label></div>
                            <div class="extended_search_checker"><input type="checkbox"
                                                                        id="garage-attachedsidebarsales"
                                                                        name="garage-attached"
                                                                        name-title="Garage Attached"
                                                                        value="1"> <label
                                        for="garage-attachedsidebarsales">Garage
                                    Attached</label></div>
                            <div class="extended_search_checker"><input type="checkbox"
                                                                        id="laundrysidebarsales"
                                                                        name="laundry"
                                                                        name-title="Laundry"
                                                                        value="1"> <label
                                        for="laundrysidebarsales">Laundry</label></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>
</li>