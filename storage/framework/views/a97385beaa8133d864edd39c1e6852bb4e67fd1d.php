<div class="search_wrapper search_wr_6 with_search_on_end with_search_form_float" id="search_wrapper"
     style="top:35%;" data-postid="26087">
    <div id="search_wrapper_color"></div>
    <div class="adv-search-1  adv_extended_class" id="adv-search-6">
        <div class="adv6-holder">
            <div role="tabpanel" class="adv_search_tab wpestate_search_tab_align_center" id="tab_prpg_adv6">
                
                
                
                
                
                
                
                
                
                
                
                
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane  active" id="rentalsmainform">
                        <form serch5="" role="search" method="get" action="<?php echo e(route('front.villas.search1')); ?>" dir="rtl">
                            <input type="hidden" name="filter_search_action[]" value="rentals">
                            <input type="hidden" name="adv6_search_tab" value="rentals">
                            <input type="hidden" name="term_id" class="term_id_class" value="2">
                            <input type="hidden" name="term_counter" class="term_counter" value="0">
                            <div class="col-md-4 categories">
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                <div class="dropdown form-control ">
                                    <div data-toggle="dropdown" id="adv_categ" class="filter_menu_trigger" xxmaca="" cacaall="" categories="" data-value="all">
                                        منطقه
                                        <span class="caret  caret_filter "></span>
                                    </div>
                                    <input type="hidden" name="city_id" value="">
                                    <ul id="categlist" class="dropdown-menu filter_menu" style="left:15px !important;" role="menu" aria-labelledby="adv_categ">
                                        <li role="presentation" data-value="">همه استانبول</li>
                                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li role="presentation" data-value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            <div class="col-md-4 areas">
                                <div class="dropdown form-control ">
                                    <div data-toggle="dropdown" id="advanced_area"
                                         class=" filter_menu_trigger  " xxmaca="" cacaall="" areas=""
                                         data-value="all">نوع ملک <span class="caret  caret_filter "></span>
                                    </div>
                                    <input type="hidden" name="type_info" value="">
                                    <ul id="adv-search-area" class="dropdown-menu filter_menu" style="left:15px !important;" role="menu"
                                        aria-labelledby="advanced_area">
                                        <li role="presentation" data-value="all">نوع ملک</li>
                                        <?php $__currentLoopData = \App\Villa::types(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li role="presentation" data-value="<?php echo e($key); ?>"
                                                data-parentcity="<?php echo e($key); ?>"><?php echo e($type); ?>

                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 property_bedrooms">
                                <div class="dropdown form-control ">
                                    <div data-toggle="dropdown" id="bedrooms" class=" filter_menu_trigger  "
                                         xx="" maca="" cacaall="" bedrooms="" data-value="all">تعداد خواب
                                        <span class="caret  caret_filter "></span></div>
                                    <input type="hidden" name="room_num" value="">
                                    <ul id="search-bedrooms" class="dropdown-menu filter_menu" role="menu"
                                        aria-labelledby="تعداد خواب" style="left:15px !important;">
                                        <li role="presentation" data-value="all">تعداد خواب</li>
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
                            <div class="col-md-3 submit_container_half ">
                                <input name="submit" type="submit" class="wpresidence_button advanced_submit_4" value="جستجوی ملک">
                            </div>
                            <div class="col-md-9 property_price">
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
                            <div class="adv_extended_options_text" id="adv_extended_options_text_mainform">
                                More Search Options
                            </div>
                            <div class="extended_search_check_wrapper">
                                            <span id="adv_extended_close_mainform" class="adv_extended_close_button">
                                                <i class="fas fa-times"></i>
                                            </span>
                                <div class="extended_search_checker">
                                    <input type="checkbox"
                                           id="back-yardmainformrentals"
                                           name="back-yard"
                                           name-title="Back yard"
                                           value="1"> <label
                                            for="back-yardmainformrentals">Back yard</label></div>
                                <div class="extended_search_checker"><input type="checkbox"
                                                                            id="central-airmainformrentals"
                                                                            name="central-air"
                                                                            name-title="Central Air"
                                                                            value="1"> <label
                                            for="central-airmainformrentals">Central Air</label></div>
                                <div class="extended_search_checker"><input type="checkbox"
                                                                            id="chair-accessiblemainformrentals"
                                                                            name="chair-accessible"
                                                                            name-title="Chair Accessible"
                                                                            value="1"> <label
                                            for="chair-accessiblemainformrentals">Chair Accessible</label></div>
                                <div class="extended_search_checker"><input type="checkbox"
                                                                            id="elevatormainformrentals"
                                                                            name="elevator"
                                                                            name-title="Elevator" value="1">
                                    <label for="elevatormainformrentals">Elevator</label></div>
                                <div class="extended_search_checker"><input type="checkbox"
                                                                            id="fireplacemainformrentals"
                                                                            name="fireplace"
                                                                            name-title="Fireplace"
                                                                            value="1"> <label
                                            for="fireplacemainformrentals">Fireplace</label></div>
                                <div class="extended_search_checker"><input type="checkbox"
                                                                            id="front-yardmainformrentals"
                                                                            name="front-yard"
                                                                            name-title="Front yard"
                                                                            value="1"> <label
                                            for="front-yardmainformrentals">Front yard</label></div>
                                <div class="extended_search_checker"><input type="checkbox"
                                                                            id="garage-attachedmainformrentals"
                                                                            name="garage-attached"
                                                                            name-title="Garage Attached"
                                                                            value="1"> <label
                                            for="garage-attachedmainformrentals">Garage Attached</label></div>
                                <div class="extended_search_checker"><input type="checkbox"
                                                                            id="laundrymainformrentals"
                                                                            name="laundry"
                                                                            name-title="Laundry" value="1">
                                    <label for="laundrymainformrentals">Laundry</label></div>
                            </div>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane  " id="salesmainform">
                        <form serch5="" role="search" method="get" dir="rtl"
                              action="<?php echo e(url('/')); ?>/advanced-search/"><input type="hidden"
                                                                            name="filter_search_action[]"
                                                                            value="sales"><input
                                    type="hidden" name="adv6_search_tab" value="sales"> <input type="hidden"
                                                                                               name="term_id"
                                                                                               class="term_id_class"
                                                                                               value="3"> <input
                                    type="hidden" name="term_counter" class="term_counter" value="1">
                            <div class="col-md-3 county_/_state">
                                <div class="dropdown form-control ">
                                    <div data-toggle="dropdown" id="county-state"
                                         class=" filter_menu_trigger  " xxmaca="" cacaall="" states=""
                                         data-value="all">States <span class="caret  caret_filter "></span>
                                    </div>
                                    <input type="hidden" name="advanced_contystate" value="">
                                    <ul id="adv-search-countystate" class="dropdown-menu filter_menu"
                                        role="menu" aria-labelledby="county-state">
                                        <li role="presentation" data-value="all" data-value2="all">States
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
                                         status="" data-value="all">Property Status <span
                                                class="caret  caret_filter "></span></div>
                                    <input type="hidden" name="property_status" value="">
                                    <ul id="statuslist" class="dropdown-menu filter_menu" role="menu"
                                        aria-labelledby="adv_status">
                                        <li role="presentation" data-value="all">Property Status</li>
                                        <li role="presentation" data-value="active">Active (2)</li>
                                        <li role="presentation" data-value="hot-offer">Hot Offer (7)</li>
                                        <li role="presentation" data-value="new-offer">New Offer (10)</li>
                                        <li role="presentation" data-value="open-house">Open House (6)</li>
                                        <li role="presentation" data-value="sold">Sold (1)</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 property_bedrooms">
                                <div class="dropdown form-control ">
                                    <div data-toggle="dropdown" id="min-beds" class=" filter_menu_trigger  "
                                         xx="" maca="" cacaall="" min.="" beds="" data-value="all">Min. Beds
                                        <span class="caret  caret_filter "></span></div>
                                    <input type="hidden" name="min-beds" value="">
                                    <ul id="search-min-beds" class="dropdown-menu filter_menu" role="menu"
                                        aria-labelledby="min-beds">
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
                                         baths="" data-value="all">Min. Baths <span
                                                class="caret  caret_filter "></span></div>
                                    <input type="hidden" name="min-baths" value="">
                                    <ul id="search-min-baths" class="dropdown-menu filter_menu" role="menu"
                                        aria-labelledby="min-baths">
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
                                <div class="adv_search_slider"><p><label for="amount">Price range:</label>
                                        <span id="amount_3_mainform" class="wpresidence_slider_price">$ 0 to $ 1,500,000</span>
                                    </p>
                                    <div id="slider_price_3_mainform"
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
                                           class="adv6_price_low price_active" name="price_low_3" value="0">
                                    <input type="hidden" id="price_max_3"
                                           class="adv6_price_max price_active" name="price_max_3"
                                           value="1500000"></div>
                            </div>
                            <div class="col-md-3 submit_container_half "><input name="submit" type="submit"
                                                                                class="wpresidence_button advanced_submit_4"
                                                                                value="Search Properties">
                            </div>
                            <div class="adv_extended_options_text" id="adv_extended_options_text_mainform">
                                More Search Options
                            </div>
                            <div class="extended_search_check_wrapper"><span
                                        id="adv_extended_close_mainform" class="adv_extended_close_button"><i
                                            class="fas fa-times"></i></span>
                                <div class="extended_search_checker"><input type="checkbox"
                                                                            id="back-yardmainformsales"
                                                                            name="back-yard"
                                                                            name-title="Back yard"
                                                                            value="1"> <label
                                            for="back-yardmainformsales">Back yard</label></div>
                                <div class="extended_search_checker"><input type="checkbox"
                                                                            id="central-airmainformsales"
                                                                            name="central-air"
                                                                            name-title="Central Air"
                                                                            value="1"> <label
                                            for="central-airmainformsales">Central Air</label></div>
                                <div class="extended_search_checker"><input type="checkbox"
                                                                            id="chair-accessiblemainformsales"
                                                                            name="chair-accessible"
                                                                            name-title="Chair Accessible"
                                                                            value="1"> <label
                                            for="chair-accessiblemainformsales">Chair Accessible</label></div>
                                <div class="extended_search_checker"><input type="checkbox"
                                                                            id="elevatormainformsales"
                                                                            name="elevator"
                                                                            name-title="Elevator" value="1">
                                    <label for="elevatormainformsales">Elevator</label></div>
                                <div class="extended_search_checker"><input type="checkbox"
                                                                            id="fireplacemainformsales"
                                                                            name="fireplace"
                                                                            name-title="Fireplace"
                                                                            value="1"> <label
                                            for="fireplacemainformsales">Fireplace</label></div>
                                <div class="extended_search_checker"><input type="checkbox"
                                                                            id="front-yardmainformsales"
                                                                            name="front-yard"
                                                                            name-title="Front yard"
                                                                            value="1"> <label
                                            for="front-yardmainformsales">Front yard</label></div>
                                <div class="extended_search_checker"><input type="checkbox"
                                                                            id="garage-attachedmainformsales"
                                                                            name="garage-attached"
                                                                            name-title="Garage Attached"
                                                                            value="1"> <label
                                            for="garage-attachedmainformsales">Garage Attached</label></div>
                                <div class="extended_search_checker"><input type="checkbox"
                                                                            id="laundrymainformsales"
                                                                            name="laundry"
                                                                            name-title="Laundry" value="1">
                                    <label for="laundrymainformsales">Laundry</label></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        
        
        
        <div style="clear:both;"></div>
    </div>
</div>