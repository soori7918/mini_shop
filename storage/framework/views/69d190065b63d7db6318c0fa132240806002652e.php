
<?php $__env->startSection('styles'); ?>
    <title><?php echo e($villa->name); ?> - خانه استانبول</title>
    <meta property="og:title" content="<?php echo e($villa->name); ?> - خانه استانبول">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="header_media with_search_6 header_media_non_elementor">
        <div class="gallery_wrapper property_header_gallery_wrapper">
            <div class="status-wrapper"></div>
            <div class="col-md-6 image_gallery lightbox_trigger special_border" data-slider-no="1" style="background-image:url(<?php echo e(isset($villa->photos[0])?url($villa->photos[0]->path):''); ?>)  ">
                <div class="img_listings_overlay"></div>
            </div>
            <div class="col-md-3 image_gallery lightbox_trigger  special_border_top" data-slider-no="2" style="background-image:url(<?php echo e(isset($villa->photos[1])?url($villa->photos[1]->path):''); ?>)">
                <div class="img_listings_overlay"></div>
            </div>
            <div class="col-md-3 image_gallery lightbox_trigger  special_border_top" data-slider-no="3" style="background-image:url(<?php echo e(isset($villa->photos[2])?url($villa->photos[2]->path):''); ?>)">
                <div class="img_listings_overlay"></div>
            </div>
            <div class="col-md-3 image_gallery lightbox_trigger" data-slider-no="4" style="background-image:url(<?php echo e(isset($villa->photos[3])?url($villa->photos[3]->path):''); ?>)">
                <div class="img_listings_overlay"></div>
            </div>
            <div class="col-md-3 image_gallery last_gallery_item lightbox_trigger" data-slider-no="5" style="background-image:url(<?php echo e(isset($villa->photos[4])?url($villa->photos[4]->path):''); ?>)  ">
                <div class="img_listings_overlay img_listings_overlay_last"></div>
                <span class="img_listings_mes">مشاهده همه <?php echo e(count($villa->photos)); ?> عکس</span>
            </div>
        </div>
    </div>
    <div class="container content_wrapper">
        <div class="row">
            <div class="col-xs-12 col-md-12 breadcrumb_container">
                <ol class="breadcrumb">
                    <li><a href="<?php echo e(url('/')); ?>">خانه</a></li>
                    <li style="direction: ltr"><a href="javascript:void(0)" rel="tag"><?php echo e($villa->types(false,$villa->type_info)); ?></a></li>
                    <li class="active"><?php echo e($villa->name); ?></li>
                </ol>
            </div>
            <div class="notice_area col-md-12 ">
                <div class="single_property_labels">
                    <div class="property_title_label actioncat">
                        <a href="javascript:void(0)" rel="tag"><?php echo e($villa->types(false,$villa->type_info)); ?></a>
                    </div>
                </div>
                <div class="price_area">
                    <?php echo e(number_format($villa->price)); ?>

                    <span class="price_label"></span>
                </div>
                <h1 class="entry-title entry-prop"><?php echo e($villa->name); ?></h1>
                <div class="property_categs">
                    <i class="fas fa-map-marker-alt"></i>
                    Istanbul
    
    
    
                </div>
                <div class="prop_social">
                    <div class="share_unit" style="display: none;">
    
    
    
    
    
    
                                <a href="https://api.whatsapp.com/send?text=<?php echo e(route('front.villas.show', $villa->slug)); ?>"
                                class="social_whatsup" target="_blank">واتس اپ</a>
    
    
                    </div>
                    <div class="title_share share_list single_property_action" data-original-title="share this page">
                        <i class="fas fa-share-alt"></i>
                        اشتراک گذاری
                    </div>
                    <div id="add_favorites" class="title_share single_property_action isfavorite" data-postid="967" data-original-title="remove from favorites">
                        <i class="fas fa-heart"></i>
                        پسندیدم
                    </div>
                    <div id="print_page" class="title_share single_property_action" data-propid="967" data-original-title="print page">
                        <i class="fas fa-print"></i>
                        چاپ
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-3 widget-area-sidebar" id="primary">
                <div id="primary_sidebar_wrapper">
                    <ul class="xoxo">
                        <li id="multiple_currency_widget-6" class="widget-container multiple_currency_widget hidden">
                            <h3 class="widget-title-sidebar">Change Currency</h3>
                            <div class="dropdown form-control">
                                <div data-toggle="dropdown" id="sidebar_currency_list" class="sidebar_filter_menu">
                                    USD
                                    <span class="caret caret_sidebar"></span>
                                </div>
                                <input type="hidden" name="filter_curr[]" value="">
                                <ul id="list_sidebar_curr" class="dropdown-menu filter_menu list_sidebar_currency" role="menu" aria-labelledby="sidebar_currency_list">
                                    <li  data-curpos="before" data-coef="1" data-value="USD" data-symbol="USD" data-pos="-1">
                                        USD
                                    </li>
                                    <li  data-curpos="before" data-coef="0.890" data-value="EUR" data-symbol="EUR" data-pos="0">
                                        EUR
                                    </li>
                                    <li  data-curpos="after" data-coef="1.33" data-value="CAD" data-symbol="CAD" data-pos="1">
                                        CAD
                                    </li>
                                </ul>
                            </div>
                            <input type="hidden" id="wpestate_change_currency" value="3b80fd437d"></li>
                        <li id="measurement_unit_widget-6" class="widget-container measurement_unit_widget hidden">
                            <h3 class="widget-title-sidebar">Change Measurement</h3>
                            <div class="dropdown form-control">
                                <div data-toggle="dropdown" id="sidebar_measure_unit_list" class="sidebar_filter_menu">square feet - ft<sup>2</sup>
                                    <span class="caret caret_sidebar"></span>
                                </div>
                                <input type="hidden" name="filter_curr[]" value="">
                                <ul id="list_sidebar_measure_unit"
                                    class="dropdown-menu filter_menu list_sidebar_measure_unit" role="menu"
                                    aria-labelledby="sidebar_currency_list">
                                    <li  data-value="ft">square feet - ft<sup>2</sup></li>
                                    <li  data-value="m">square meters - m<sup>2</sup></li>
                                    <li  data-value="ac">acres - ac</li>
                                    <li  data-value="yd">square yards - yd<sup>2</sup></li>
                                    <li  data-value="ha">hectares - ha</li>
                                </ul>
                            </div>
                            <input type="hidden" id="wpestate_change_measure" value="9be9397372">
                        </li>
                        <?php echo $__env->make('villas.searchWrapper', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <li id="property_categories-10" class="widget-container property_categories"><h3
                                    class="widget-title-sidebar">دسته بندی ویلاها</h3>
                            <div class="category_list_widget">
                                <ul>
                                    <?php $__currentLoopData = $villa->types(false); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="javascript:void(0)"><?php echo e($category); ?></a>
                                        <span class="category_no">(<?php echo e(\App\Villa::where('type_info',$key)->count()); ?>)</span>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </li>
                        <li id="footer_latest_widget-19" class="widget-container latest_listings"><h3
                                    class="widget-title-sidebar">ویلاهای برگزیده</h3>
                            <script type="text/javascript">/* <![CDATA[ */ //<![CDATA[
                                jQuery(document).ready(function () {
                                    estate_sidebar_slider_carousel();
                                });
                                //]]> /* ]]> */</script>
                            <div class="latest_listings list_type">
                                <?php $__currentLoopData = $mostViewed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="widget_latest_internal" data-link="<?php echo e(route('front.villas.single',$item->slug)); ?>">
                                    <div class="widget_latest_listing_image">
                                        <a href="https://www.khaneistanbul.com.tr/properties/luxury-house-in-greenville/">
                                            <img src="<?php echo e(count($item->photos)?url($item->photos[0]->path):asset('front/files/featured3-525x328.jpg')); ?>" alt="slider-thumb" data-original="<?php echo e(count($item->photos)?url($item->photos[0]->path):asset('front/files/featured3-525x328.jpg')); ?>" class="lazyload img_responsive" width="105" height="70">
                                        </a>
                                    </div>
                                    <div class="listing_name ">
                                        <span class="widget_latest_title">
                                            <a href="<?php echo e(route('front.villas.single',$item->slug)); ?>"><?php echo e($item->name); ?></a></span>
                                        <span class="widget_latest_price">
    
                                            <?php echo e(number_format($item->price)); ?> <span class="price_label"></span>
                                        </span>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </li>
                        <li id="mortgage_widget-9" class="widget-container mortgage_calculator_li boxed_widget hidden">
                            <h3 class="widget-title-sidebar"> Mortgage Calculator</h3>
                            <div id="input_formula"><label for="sale_price">Sale Price</label>
                                <div class="sale_price_wrapper"><input type="text" id="sale_price" value="100000"
                                                                       class="form-control"></div>
                                <label for="percent_down">Percent Down</label>
                                <div class="percent_down_wrapper"><input type="text" id="percent_down" value="10"
                                                                         class="form-control"></div>
                                <label for="term_years">Term (Years)</label>
                                <div class="years_wrapper"><input type="text" id="term_years" value="30"
                                                                  class="form-control"></div>
                                <label for="interest_rate">Interest Rate in %</label>
                                <div class="interest_wrapper"><input type="text" id="interest_rate" value="5"
                                                                     class="form-control"></div>
                                <div id="morg_results"><span id="am_fin"></span> <span id="morgage_pay"></span>
                                    <span id="anual_pay"></span></div>
                                <button class="wpresidence_button" id="morg_compute">Calculate</button>
                            </div>
                        </li>
                        <li id="login_widget-12" class="widget-container loginwd_sidebar boxed_widget hidden">
                            <input type="hidden" id="security-login-forgot_wd" name="security-login-forgot_wd" value="6893ddaa15">
                            <input type="hidden" name="_wp_http_referer" value="/properties/3-rooms-mahattan-new-york/">
                            <div class="login_sidebar"><h3 class="widget-title-sidebar" id="login-div-title">
                                    Login</h3>
                                <div class="login_form" id="login-div">
                                    <div class="loginalert" id="login_message_area_wd"></div>
                                    <input type="text" class="form-control" name="log" id="login_user_wd"
                                           placeholder="Username"> <input type="password" class="form-control"
                                                                          name="pwd" id="login_pwd_wd"
                                                                          placeholder="Password"> <input
                                            type="hidden" name="loginpop" id="loginpop_wd" value="0"> <input
                                            type="hidden" id="security-login" name="security-login"
                                            value="04fe6ffafb-1620469359">
                                    <button class="wpresidence_button" id="wp-login-but-wd">Login</button>
                                    <div class="login-links"><a href="#" id="widget_register_sw">Need an account?
                                            Register here!</a> <a href="#" id="forgot_pass_widget">Forgot Password?</a>
                                        <div class="wpestate_social_login" id="facebookloginsidebar"
                                             data-social="facebook"> Login with Facebook
                                        </div>
                                        <div class="wpestate_social_login" id="googleloginsidebar"
                                             data-social="google">Login with Google
                                        </div>
                                        <div class="wpestate_social_login" id="twitterloginsidebar"
                                             data-social="twitter">Login with Twitter
                                        </div>
                                        <input type="hidden" class="wpestate_social_login_nonce" value="c9a7742c48">
                                    </div>
                                </div>
                                <h3 class="widget-title-sidebar" id="register-div-title">Register</h3>
                                <div class="login_form" id="register-div">
                                    <div class="loginalert" id="register_message_area_wd"></div>
                                    <input type="text" name="user_login_register" id="user_login_register_wd"
                                           class="form-control" placeholder="Username"> <input type="text"
                                                                                               name="user_email_register"
                                                                                               id="user_email_register_wd"
                                                                                               class="form-control"
                                                                                               placeholder="Email">
                                    <input type="password" name="user_password_wd" id="user_password_wd"
                                           class="form-control" placeholder="Password"> <input type="password"
                                                                                               name="user_password_retype_wd"
                                                                                               id="user_password_wd_retype"
                                                                                               class="form-control"
                                                                                               placeholder="Retype Password">
                                    <select id="new_user_type_wd" name="new_user_type_wd" class="form-control">
                                        <option value="0" selected="selected">Select User Type</option>
                                        <option value="1">User</option>
                                        <option value="3">Agency</option>
                                        <option value="4">Developer</option>
                                    </select><input type="checkbox" name="terms" id="user_terms_register_wd"><label
                                            id="user_terms_register_wd_label" for="user_terms_register_wd">I agree with
                                        <a href="https://www.khaneistanbul.com.tr/gdpr-terms-and-conditions/" target="_blank"
                                           id="user_terms_register_topbar_link">terms &amp; conditions</a> </label>
                                    <input type="hidden" id="security-register" name="security-register"
                                           value="cecd71b437-1620469359">
                                    <button class="wpresidence_button" id="wp-submit-register_wd">Register</button>
                                    <div class="login-links"><a href="#" id="widget_login_sw">Back to Login</a>
                                    </div>
                                </div>
                            </div>
                            <h3 class="widget-title-sidebar" id="forgot-div-title_shortcode">Reset Password</h3>
                            <div class="login_form" id="forgot-pass-div_shortcode">
                                <div class="loginalert" id="forgot_pass_area_shortcode"></div>
                                <div class="loginrow"><input type="text" class="form-control" name="forgot_email"
                                                             id="forgot_email_shortcode"
                                                             placeholder="Enter Your Email Address" size="20"></div>
                                <input type="hidden" id="security-login-forgot_wd" name="security-login-forgot_wd"
                                       value="6893ddaa15"><input type="hidden" name="_wp_http_referer"
                                                                 value="/properties/3-rooms-mahattan-new-york/">
                                <input type="hidden" id="postid" value="0">
                                <button class="wpresidence_button" id="wp-forgot-but_shortcode" name="forgot">Reset
                                    Password
                                </button>
                                <div class="login-links shortlog"><a href="#" id="return_login_shortcode">Return to
                                        Login</a></div>
                            </div>
                        </li>
                        <li id="social_widget-9" class="widget-container social_sidebar hidden">
                            <h3 class="widget-title-sidebar">Social Links:</h3>
                            <div class="social_sidebar_internal"><a href="#" target="_blank"><i
                                            class="fas fa-rss"></i></a><a href="#" target="_blank"><i
                                            class="fab fa-facebook-f"></i></a><a href="#" target="_blank"><i
                                            class="fab fa-twitter"></i></a><a href="#" target="_blank"><i
                                            class="fab fa-dribbble"></i></a><a href="#" target="_blank"><i
                                            class="fab fa-google-plus-g"></i></a><a href="#" target="_blank"><i
                                            class="fab fa-linkedin-in"></i></a><a href="#" target="_blank"><i
                                            class="fab fa-tumblr"></i></a><a href="#" target="_blank"><i
                                            class="fab fa-pinterest-p"></i></a><a href="#" target="_blank"><i
                                            class="fab fa-youtube"></i></a><a href="#" target="_blank"><i
                                            class="fab fa-vimeo-v"></i></a><a href="#" target="_blank"><i
                                            class="fab fa-instagram"></i></a><a href="#" target="_blank"><i
                                            class="fab fa-foursquare"></i></a></div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="clearfix visible-xs"></div>
            <div class=" col-md-9 rightmargin full_width_prop"><span class="entry-title listing_loader_title">Your search results</span>
                <div class="spinner" id="listing_loader">
                    <div class="rect1"></div>
                    <div class="rect2"></div>
                    <div class="rect3"></div>
                    <div class="rect4"></div>
                    <div class="rect5"></div>
                </div>
                <div id="listing_ajax_container"></div>
                <div class="single-content listing-content">
                    <div class="single-overview-section panel-group property-panel">
                        <h4 class="panel-title" id="">توضیحات کلی</h4>
                        <ul class="overview_element">
                            <li class="first_overview"> بروزرسانی:</li>
                            <li class="first_overview_date"><?php echo e($villa->updated_at); ?></li>
                        </ul>
                        <ul class="overview_element">
                            <li class="first_overview">
                                <svg width="798" height="569" viewBox="0 0 798 569" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M236.65 0H560.87C567.29 0 573.12 2.61 577.33 6.83L656.2 85.7C660.75 90.24 663.02 96.2 663.02 102.17L663.03 216.94C667.14 217.92 671.04 220 674.23 223.21L712.37 261.37C717.33 265.63 720.47 271.96 720.47 279.02V329.58H754.52C760.95 329.58 766.78 332.19 770.99 336.41L790.71 356.12C795.25 360.66 797.52 366.63 797.52 372.59L797.53 446.06C797.53 458.91 787.1 469.35 774.24 469.35H717.9V545.52C717.9 558.38 707.47 568.81 694.61 568.81H624.8C611.94 568.81 601.51 558.38 601.51 545.52V469.35H196.02V545.52C196.02 558.38 185.59 568.81 172.73 568.81H102.92C90.06 568.81 79.63 558.38 79.63 545.52V469.35H23.29C10.43 469.35 0 458.91 0 446.06V372.59C0 366.16 2.61 360.34 6.82 356.12L26.54 336.41C31.08 331.87 37.04 329.6 43.01 329.58H77.04V279.02C77.06 273.06 79.33 267.1 83.87 262.55L123.31 223.11C126.34 220.08 130.18 217.89 134.49 216.89V102.17C134.49 95.74 137.1 89.91 141.31 85.7L220.19 6.83C224.73 2.28 230.69 0.01 236.65 0V0ZM52.65 376.16L46.58 382.23V422.77C281.37 422.77 516.16 422.77 750.95 422.77V382.23L744.88 376.16C514.13 376.16 283.4 376.16 52.65 376.16V376.16ZM262.99 119.54H534.51C547.37 119.54 557.8 129.97 557.8 142.83V216.29H616.45V111.81L551.22 46.58H246.3L181.07 111.81V216.29H239.7V142.83C239.7 129.97 250.14 119.54 262.99 119.54V119.54ZM511.22 166.12H286.28V216.29H511.22V166.12ZM149.44 469.35H126.21V522.23H149.44V469.35ZM671.32 469.35H648.09V522.23H671.32V469.35ZM639.74 262.87C479.08 262.87 318.44 262.87 157.78 262.87H149.42L123.62 288.66V329.58H673.89V288.57L648.22 262.87H639.74V262.87Z" fill="#333333"></path>
                                </svg>
                            </li>
                            <li><?php echo e($villa->room_num); ?> اتاق</li>
                        </ul>
                        <ul class="overview_element">
                            <li class="first_overview">
                                <svg width="517" height="515" viewBox="0 0 517 515" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M53.7957 274.151C131 273.543 208.204 272.936 285.409 272.328C320.502 272.052 355.595 271.776 390.687 271.499C408.709 271.357 436.246 267.321 453.855 271.002C483.718 277.245 500.827 291.055 460.56 297.045C394.658 306.848 320.713 297.873 254.042 298.06C220.181 298.154 186.32 298.249 152.459 298.344C132.142 298.4 111.826 298.457 91.5092 298.514C84.737 298.533 77.9649 298.552 71.1927 298.571C52.3786 304.32 40.7481 296.826 36.3013 276.088C52.8826 279.86 59.9619 254.352 43.3362 250.57C24.104 246.195 9.18371 253.464 2.87718 272.911C-7.86142 306.025 12.9416 323.181 40.7178 325.119C107.664 329.789 176.766 324.739 243.883 324.551C313.315 324.357 383.305 326.686 452.681 323.869C475.355 322.948 505.639 324.33 513.939 298.79C523.252 270.129 504.563 248.411 478.428 244.846C413.411 235.977 340.514 245.431 274.881 245.948C201.186 246.528 127.491 247.108 53.7957 247.688C36.7748 247.822 36.7351 274.285 53.7957 274.151Z" fill="#222222"></path>
                                    <path d="M466.461 323.548C474.73 375.537 434.999 433.231 387.646 453.943C349.846 470.477 295.94 463.719 254.54 464.503C214.778 465.257 180.991 468.261 146.51 445.99C109.925 422.358 55.4102 377.073 57.7829 329.415C58.6303 312.393 32.165 312.438 31.3198 329.415C28.8418 379.189 68.1589 422.234 105.975 450.969C163.88 494.97 203.297 492.106 274.482 490.561C338.061 489.181 389.722 494.909 438.653 449.799C477.721 413.783 500.49 370.025 491.979 316.513C489.311 299.741 463.807 306.861 466.461 323.548Z" fill="#222222"></path>
                                    <path d="M334.065 61.9826C335.204 45.8633 330.105 43.7571 345.043 34.9641C356.06 28.4795 367.53 30.2771 379.689 30.2471C414.788 30.1607 403.851 39.6988 403.886 73.8339C403.94 127.831 403.995 181.828 404.05 235.825C404.067 252.852 430.531 252.881 430.513 235.825C430.461 184.67 430.409 133.515 430.357 82.3597C430.335 60.6536 439.565 21.7027 418.084 7.15394C401.503 -4.07547 349.393 -0.082615 330.83 5.5742C302.887 14.0895 309.347 37.2869 307.602 61.9826C306.402 78.9773 332.87 78.9021 334.065 61.9826Z" fill="#222222"></path>
                                    <path d="M352.821 107.029C330.46 107.037 304.602 110.618 282.562 107.149C285.198 109.176 287.834 111.203 290.47 113.23C287.659 109.117 303.833 98.2036 305.929 96.6067C312.01 91.9742 315.44 89.1697 322.877 88.4098C328.161 87.8699 337.461 87.4048 342.258 89.8401C353.907 95.7527 352.133 108.756 351.855 119.376C351.41 136.411 377.873 136.401 378.318 119.376C378.914 96.5592 374.266 71.7971 349.293 64.3223C339.232 61.3106 327.763 61.3313 317.357 62.0418C303.547 62.9849 295.08 71.5673 284.66 79.9306C272.257 89.8861 250.532 115.735 271.027 130.299C279.718 136.474 294.167 133.512 304.151 133.509C320.374 133.503 336.597 133.498 352.821 133.492C369.848 133.486 369.877 107.023 352.821 107.029Z" fill="#222222"></path>
                                    <path d="M341.354 158.199C341.354 162.021 341.354 165.844 341.354 169.666C341.354 186.694 367.817 186.722 367.817 169.666C367.817 165.844 367.817 162.021 367.817 158.199C367.817 141.171 341.354 141.143 341.354 158.199Z" fill="#222222"></path>
                                    <path d="M277.405 164.373C278.206 166.629 278.029 165.509 277.797 167.892C277.106 175.015 284.373 181.124 291.029 181.124C298.759 181.124 303.568 175.035 304.26 167.892C304.605 164.343 304.116 160.695 302.923 157.338C300.531 150.608 293.895 146.105 286.646 148.097C280.131 149.887 275.001 157.608 277.405 164.373Z" fill="#222222"></path>
                                    <path d="M307.834 203.186C307.834 205.832 307.834 208.479 307.834 211.125C307.834 228.153 334.297 228.181 334.297 211.125C334.297 208.479 334.297 205.832 334.297 203.186C334.297 186.158 307.834 186.13 307.834 203.186Z" fill="#222222"></path>
                                    <path d="M317.537 488.987C317.537 493.398 317.537 497.808 317.537 502.219C317.537 519.246 344 519.275 344 502.219C344 497.808 344 493.398 344 488.987C344 471.959 317.537 471.931 317.537 488.987Z" fill="#222222"></path>
                                    <path d="M170.226 487.222C170.226 492.221 170.226 497.219 170.226 502.218C170.226 519.245 196.689 519.274 196.689 502.218C196.689 497.219 196.689 492.221 196.689 487.222C196.689 470.194 170.226 470.166 170.226 487.222Z" fill="#222222"></path>
                                </svg>
                            </li>
                            <li><?php echo e($villa->number_of_wc); ?> سرویس بهداشتی</li>
                        </ul>
                        <ul class="overview_element">
                            <li class="first_overview">
                                <svg width="696" height="525" viewBox="0 0 696 525" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M693.732 158.062C692.963 146.618 685.277 138.75 672.98 138.75C668.368 138.75 663.757 138.75 659.145 138.75C633.781 138.75 616.104 165.931 616.104 165.931C614.567 169.507 612.261 172.368 609.187 176.66C606.112 166.646 603.806 158.063 601.501 150.194C590.74 114.431 573.831 80.8125 550.774 50.7708C534.633 29.3125 511.576 22.1598 486.212 17.8681C440.097 10.7153 391.675 0 345.56 0C298.676 0 254.098 10.7153 207.982 17.8681C182.619 22.1598 159.561 30.0278 143.421 50.7708C120.363 81.5278 103.454 114.431 92.6936 150.194C90.3879 158.063 88.0821 166.646 85.0077 176.66C81.9334 171.653 79.6277 168.792 78.0905 165.931C78.0905 165.931 60.4128 138.75 35.0493 138.75C30.4378 138.75 25.8264 138.75 21.2148 138.75C8.91736 139.465 1.23136 147.333 0.462769 158.062C0.462769 165.931 0.462769 174.514 0.462769 182.382C0.462769 194.542 9.68593 202.41 22.752 202.41C35.818 202.41 48.884 202.41 61.95 202.41C67.3302 202.41 72.7103 202.41 77.3218 202.41C78.0904 203.125 78.0905 203.84 78.8591 204.556C77.3219 205.271 75.0161 205.986 74.2475 207.417C41.1981 236.743 23.5205 272.507 24.2891 315.424C25.0577 341.174 27.3635 366.208 30.4379 391.958C32.7436 411.271 37.3552 430.583 47.3468 448.465C51.1898 456.333 56.5699 462.055 65.793 463.486C70.4045 464.201 70.4046 467.062 70.4046 469.924C70.4046 480.653 70.4046 490.667 70.4046 501.396C70.4046 516.417 79.6277 525 95.7681 525C109.603 525 122.669 525 136.503 525C154.181 525 162.635 516.417 162.635 500.681C162.635 492.813 162.635 484.229 162.635 475.646C224.891 479.938 286.379 482.083 347.866 482.083C409.353 482.083 471.609 479.938 533.096 475.646C533.096 484.229 533.096 492.813 533.096 500.681C533.096 516.417 542.319 525 559.228 525C573.063 525 586.129 525 599.964 525C616.104 525 625.327 516.417 625.327 501.396C625.327 490.667 625.327 480.653 625.327 469.924C625.327 466.347 626.096 464.201 629.939 463.486C639.162 462.055 644.542 455.618 648.385 448.465C657.608 430.583 662.988 411.271 665.294 391.958C668.368 366.924 670.674 341.174 671.442 315.424C672.211 272.507 654.533 236.743 621.484 207.417C619.947 205.986 618.41 205.986 616.872 204.556C617.641 203.84 617.641 203.125 618.41 202.41C623.79 202.41 629.17 202.41 633.782 202.41C646.848 202.41 659.914 202.41 672.98 202.41C686.046 202.41 694.5 194.542 695.269 182.382C694.5 173.799 694.5 165.931 693.732 158.062ZM124.206 183.097C134.198 144.472 149.569 108.708 171.09 74.375C172.627 72.2292 173.396 70.7986 174.933 70.0833C176.47 68.6527 178.007 67.9375 180.313 67.2222C194.148 61.5 234.883 67.9375 345.56 67.2222C456.237 67.9375 498.51 61.5 512.344 67.2222C514.65 67.9375 516.187 68.6527 517.724 70.0833C519.261 71.5138 520.799 72.9444 521.567 74.375C543.088 107.993 558.46 144.472 568.451 183.097C569.22 185.958 569.22 188.819 569.988 190.25C495.435 184.528 420.113 180.951 345.56 180.951C271.007 180.951 196.453 183.812 121.132 190.25C123.437 188.104 123.437 185.243 124.206 183.097ZM135.735 346.181C108.834 346.181 86.545 325.438 86.545 300.403C86.545 275.368 108.834 254.625 135.735 254.625C162.635 254.625 184.925 275.368 184.925 300.403C184.925 326.153 162.635 346.181 135.735 346.181ZM558.46 346.181C531.559 346.181 509.27 325.438 509.27 300.403C509.27 275.368 531.559 254.625 558.46 254.625C585.36 254.625 607.649 275.368 607.649 300.403C607.649 326.153 585.36 346.181 558.46 346.181Z" fill="#222222"></path>
                                </svg>
                            </li>
                            <li><?php echo e($villa->floor); ?> طبقه</li>
                        </ul>
                        <ul class="overview_element">
                            <li class="first_overview">
                                <svg width="400" height="400" viewBox="0 0 400 400" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M357.143 0H42.8571C31.4907 0 20.5898 4.50961 12.5526 12.5368C4.51529 20.5639 0 31.4511 0 42.8032V356.694C0 368.046 4.51529 378.933 12.5526 386.96C20.5898 394.987 31.4907 399.497 42.8571 399.497H357.143C368.509 399.497 379.41 394.987 387.447 386.96C395.485 378.933 400 368.046 400 356.694V42.8032C400 31.4511 395.485 20.5639 387.447 12.5368C379.41 4.50961 368.509 0 357.143 0ZM371.429 356.694C371.429 360.478 369.923 364.107 367.244 366.782C364.565 369.458 360.932 370.961 357.143 370.961H171.429V299.623H314.286C318.075 299.623 321.708 298.119 324.387 295.444C327.066 292.768 328.571 289.139 328.571 285.355C328.571 281.571 327.066 277.942 324.387 275.266C321.708 272.59 318.075 271.087 314.286 271.087H157.143C153.354 271.087 149.72 272.59 147.041 275.266C144.362 277.942 142.857 281.571 142.857 285.355V370.961H42.8571C39.0683 370.961 35.4347 369.458 32.7556 366.782C30.0765 364.107 28.5714 360.478 28.5714 356.694V171.213H142.857V199.748C142.857 203.532 144.362 207.162 147.041 209.837C149.72 212.513 153.354 214.016 157.143 214.016C160.932 214.016 164.565 212.513 167.244 209.837C169.923 207.162 171.429 203.532 171.429 199.748V114.142C171.429 110.358 169.923 106.729 167.244 104.053C164.565 101.377 160.932 99.8742 157.143 99.8742C153.354 99.8742 149.72 101.377 147.041 104.053C144.362 106.729 142.857 110.358 142.857 114.142V142.677H28.5714V42.8032C28.5714 39.0192 30.0765 35.3901 32.7556 32.7144C35.4347 30.0387 39.0683 28.5355 42.8571 28.5355H242.857V185.481C242.857 189.265 244.362 192.894 247.041 195.57C249.72 198.245 253.354 199.748 257.143 199.748H314.286C318.075 199.748 321.708 198.245 324.387 195.57C327.066 192.894 328.571 189.265 328.571 185.481C328.571 181.697 327.066 178.068 324.387 175.392C321.708 172.716 318.075 171.213 314.286 171.213H271.429V28.5355H357.143C360.932 28.5355 364.565 30.0387 367.244 32.7144C369.923 35.3901 371.429 39.0192 371.429 42.8032V356.694Z"
                                          fill="#222222"></path>
                                </svg>
                            </li>
                            <li>آشپزخانه : <?php echo e($villa->kitchen==1?'اوپن':'بسته'); ?></li>
                        </ul>
                        <ul class="overview_element">
                            <li class="first_overview">
                                <svg width="406" height="424" viewBox="0 0 406 424" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M290.204 0C297.84 0 304.03 6.19017 304.03 13.8261V66.9701C320.062 72.7236 331.682 88.0982 331.682 106C331.682 128.744 312.948 147.478 290.204 147.478C267.46 147.478 248.725 128.744 248.725 106C248.725 88.0982 260.345 72.7236 276.378 66.9701V13.8261C276.378 6.19017 282.568 0 290.204 0ZM115.073 0C122.709 0 128.899 6.19017 128.899 13.8261V66.9701C144.932 72.7236 156.552 88.0982 156.552 106C156.552 128.744 137.817 147.478 115.073 147.478C92.3294 147.478 73.5951 128.744 73.5951 106C73.5951 88.0982 85.2148 72.7236 101.247 66.9701V13.8261C101.247 6.19017 107.438 0 115.073 0ZM354.725 27.6522C382.648 27.6522 405.565 50.5689 405.565 78.4918V373.16C405.565 401.084 382.648 424 354.725 424H50.8396C22.917 424 0 401.084 0 373.16V78.4918C0 50.5689 22.917 27.6522 50.8396 27.6522H78.3478C85.6521 27.5489 92.3179 34.173 92.3179 41.4782C92.3179 48.7835 85.6521 55.4076 78.3478 55.3043H50.8396C37.7841 55.3043 27.6522 65.4359 27.6522 78.4918V156.695H377.913V78.4918C377.913 65.4359 367.781 55.3043 354.725 55.3043H327.217C319.913 55.4075 313.247 48.7835 313.247 41.4782C313.247 34.173 319.913 27.5489 327.217 27.6522H354.725ZM253.478 27.6522C261.114 27.6522 267.304 33.8421 267.304 41.4782C267.304 49.1139 261.114 55.3043 253.478 55.3043H152.087C144.451 55.3043 138.261 49.1139 138.261 41.4782C138.261 33.8421 144.451 27.6522 152.087 27.6522H253.478ZM377.913 184.348H27.6522V373.16C27.6522 386.216 37.7841 396.348 50.8396 396.348H354.725C367.781 396.348 377.913 386.216 377.913 373.16V184.348Z"
                                          fill="#222222"></path>
                                </svg>
                            </li>
                            <li>سن ساختمان :
                            <?php echo e($villa->built_year>0?$villa->built_year." سال":'نوساز'); ?>

                            </li>
                        </ul>
                    </div>
                    <div class="wpestate_property_description" id="wpestate_property_description_section"><h4
                                class="panel-title">توضیحات</h4>
                        <div>
                            <?php echo $villa->body; ?>

                        </div>
                        <div class="download_docs hidden">Documents</div>
                        <div class="document_down hidden">
                            <a href="" target="_blank">Energetic Certificate PDF<i class="fas fa-download"></i></a>
                        </div>
                        <div class="document_down hidden">
                            <a href="" target="_blank">Another PDF Sample<i class="fas fa-download"></i></a>
                        </div>
                    </div>
                    <div class="panel-group property-panel hidden" id="accordion_prop_addr">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion_prop_addr" href="#collapseTwo">
                                    <h4 class="panel-title"> آدرس</h4>
                                </a>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div class="listing_detail col-md-4"><strong>Address:</strong> Istanbul</div>
    
    
    
    
    
    
    
    
    
    
    
    
    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-group property-panel" id="accordion_prop_details">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion_prop_details" href="#collapseOne">
                                    <h4 class="panel-title" id="prop_det"> جزئیات</h4>
                                </a>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div class="listing_detail col-md-4">
                                        <strong>قیمت :</strong> <?php echo e(number_format($villa->price)); ?>

                                        <span class="price_label"></span>
                                    </div>
                                    <div class="listing_detail col-md-8" id="propertyid_display">
                                        <strong>نوع خدمات ملک :</strong>
                                        <?php if($villa->tip_info=='1'): ?> مناسب برای اخذ شهروندی و پاسپورت ترکیه
                                        <?php elseif($villa->tip_info=='2'): ?>مناسب برای اخذ اقامت ترکیه
                                        <?php endif; ?>
                                    </div>
                                    <div class="listing_detail col-md-4" id="propertyid_display">
                                        <strong>نوع ملک :</strong>
                                        <?php if($villa->type_info==1): ?> دوبلکس
                                        <?php elseif($villa->type_info==2): ?> باغچه کات
                                        <?php elseif($villa->type_info==3): ?> تریبلکس
                                        <?php endif; ?>
                                    </div>
                                    <div class="listing_detail col-md-4" id="propertyid_display">
                                        <strong>سن بنا :</strong>
                                        <?php echo e($villa->built_year>0?$villa->built_year." سال":'نوساز'); ?>

                                    </div>
                                    <div class="listing_detail col-md-4" id="propertyid_display">
                                        <strong>بالکن/تراس :</strong>
                                        <?php if($villa->b_or_t==1): ?> دارد
                                        <?php elseif($villa->b_or_t==0): ?> ندارد
                                        <?php endif; ?>
                                    </div>
                                    <div class="listing_detail col-md-4" id="propertyid_display">
                                        <strong>فرنیش :</strong>
                                        <?php if($villa->furniture==1): ?> دارد
                                        <?php elseif($villa->furniture==0): ?> ندارد
                                        <?php endif; ?>
                                    </div>
                                    <div class="listing_detail col-md-4" id="propertyid_display">
                                        <strong>آشپزخانه :</strong>
                                        <?php if($villa->kitchen==1): ?> اوپن
                                        <?php elseif($villa->kitchen==0): ?> بسته
                                        <?php endif; ?>
                                    </div>
                                    <div class="listing_detail col-md-4" id="propertyid_display">
                                        <strong>تعداد سالن :</strong>
                                        <?php echo e($villa->salon_num); ?>

                                    </div>
                                    <div class="listing_detail col-md-4" id="propertyid_display">
                                        <strong>تعداد سرویس بهداشتی :</strong>
                                        <?php echo e($villa->number_of_wc); ?>

                                    </div>
                                    <div class="listing_detail col-md-4" id="propertyid_display">
                                        <strong>طبقه :</strong>
                                        <?php echo e($villa->floor); ?>

                                    </div>
                                    <div class="listing_detail col-md-4" id="propertyid_display">
                                        <strong>منظره :</strong>
                                        <?php if($villa->villa_view=='sea'): ?> دریا
                                        <?php elseif($villa->villa_view=='city'): ?> شهر
                                        <?php elseif($villa->villa_view=='jungle'): ?> جنگل
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-group property-panel" id="accordion_prop_features">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion_prop_features" href="#collapseThree">
                                    <h4 class="panel-title" id="prop_ame"> امکانات</h4>
                                </a>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div class="listing_detail col-md-12 feature_block_Interior Details ">
                                        <div class="feature_chapter_name col-md-12"> امکانات داخلی</div>
                                        <?php
                                            if ($villa->properties_in != 'N;'){
                                            $properties_in = unserialize($villa->properties_in);
                                            }else{
                                            $properties_in = [];
                                            }
                                        ?>
                                        <?php $__currentLoopData = $propertiesin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $prop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(in_array($prop->id , $properties_in)): ?>
                                            <div class="listing_detail col-md-4">
                                                <?php echo $villa->icon(00); ?>

                                                <?php echo e($prop->name); ?>

                                            </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <div class="listing_detail col-md-12 feature_block_Outdoor Details ">
                                        <div class="feature_chapter_name col-md-12">امکانات رفاهی</div>
                                        <?php
                                            if ($villa->properties_out != 'N;'){
                                            $properties_out = unserialize($villa->properties_out);
                                            }else{
                                            $properties_out = [];
                                            }
                                        ?>
                                        <?php $__currentLoopData = $propertiesout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $prop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(in_array($prop->id , $properties_out)): ?>
                                                <div class="listing_detail col-md-4">
                                                    <?php echo $villa->icon(00); ?>

                                                    <?php echo e($prop->name); ?>

                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <div class="listing_detail col-md-12 feature_block_Utilities ">
                                        <div class="feature_chapter_name col-md-12">دسترسی ها</div>
                                        <?php
                                            if ($villa->properties_access != 'N;'){
                                            $properties_access = unserialize($villa->properties_access);
                                            }else{
                                            $properties_access = [];
                                            }
                                        ?>
                                        <?php $__currentLoopData = $propertiesaccess; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $prop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(in_array($prop->id , $properties_access)): ?>
                                                <div class="listing_detail col-md-4">
                                                    <?php echo $villa->icon(00); ?>

                                                    <?php echo e($prop->name); ?>

                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-group property-panel" id="accordion_video">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion_video" href="#collapseThreeOne"></a>
                                <h4 class="panel-title" id="prop_video">
                                    <a data-toggle="collapse" data-parent="#accordion_video" href="#collapseThreeOne">ویدئو </a>
                                </h4>
                            </div>
                            <div id="collapseThreeOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div class="property_video_wrapper">
                                        <div id="property_video_wrapper_player"></div>
                                        <a href="<?php echo e(url($villa->video??'/')); ?>" data-autoplay="true" data-vbtype="video" class="venobox vbox-item" style="display: block;height:350px;background: #000"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-group property-panel hidden" id="accordion_prop_map">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion_prop_map" href="#collapsemap"><h4 class="panel-title" id="prop_ame">نقشه</h4></a></div>
                            <div id="collapsemap" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div class="google_map_shortcode_wrapper  ">
                                        <div id="gmapzoomplus_sh" class="smallslidecontrol shortcode_control">
                                            <i class="fas fa-plus"></i>
                                        </div>
                                        <div id="gmapzoomminus_sh" class="smallslidecontrol shortcode_control">
                                            <i class="fas fa-minus"></i>
                                        </div>
                                        <div class="google_map_poi_marker">
                                            <div class="google_poish" id="transport">
                                                <img src="<?php echo e(asset('front/files/single/transport_icon.png')); ?>" class="dashboad-tooltip" data-placement="right" data-original-title="Transport"></div>
                                            <div class="google_poish" id="supermarkets">
                                                <img src="<?php echo e(asset('front/files/single/supermarkets_icon.png')); ?>" class="dashboad-tooltip" data-placement="right" data-original-title="Supermarkets">
                                            </div>
                                            <div class="google_poish" id="schools">
                                                <img src="<?php echo e(asset('front/files/single/schools_icon.png')); ?>" class="dashboad-tooltip" data-placement="right" data-original-title="Schools">
                                            </div>
                                            <div class="google_poish" id="restaurant">
                                                <img src="<?php echo e(asset('front/files/single/restaurant_icon.png')); ?>" class="dashboad-tooltip" data-placement="right" data-original-title="Restaurants">
                                            </div>
                                            <div class="google_poish" id="pharma">
                                                <img src="<?php echo e(asset('front/files/single/pharma_icon.png')); ?>" class="dashboad-tooltip" data-placement="right" data-original-title="Pharmacies">
                                            </div>
                                            <div class="google_poish" id="hospitals">
                                                <img src="<?php echo e(asset('front/files/single/hospitals_icon.png')); ?>" class="dashboad-tooltip" data-placement="right" data-original-title="Hospitals">
                                            </div>
                                        </div>
                                        <div id="slider_enable_street_sh" data-placement="bottom" data-original-title="Street View">
                                            <i class="fas fa-location-arrow"></i>
                                        </div>
                                        <div id="googleMap_shortcode" data-post_id="967"
                                             data-cur_lat="40.7217622754" data-cur_long="-73.9541244507"
                                             data-title="<?php echo e($villa->name); ?>" data-pin="apartmentssales"
                                             data-thumb="%3Cimg%20width%3D%22120%22%20height%3D%22120%22%20src%3D%22https%3A%2F%2Fwpresidence.b-cdn.net%2Fwp-content%2Fuploads%2F2020%2F06%2Fhouse_nice-120x120.jpg%22%20class%3D%22attachment-agent_picture_thumb%20size-agent_picture_thumb%20wp-post-image%22%20alt%3D%22%22%20loading%3D%22lazy%22%20srcset%3D%22https%3A%2F%2Fwpresidence.b-cdn.net%2Fwp-content%2Fuploads%2F2020%2F06%2Fhouse_nice-120x120.jpg%20120w%2C%20https%3A%2F%2Fwpresidence.b-cdn.net%2Fwp-content%2Fuploads%2F2020%2F06%2Fhouse_nice-150x150.jpg%20150w%2C%20https%3A%2F%2Fwpresidence.b-cdn.net%2Fwp-content%2Fuploads%2F2020%2F06%2Fhouse_nice-45x45.jpg%2045w%2C%20https%3A%2F%2Fwpresidence.b-cdn.net%2Fwp-content%2Fuploads%2F2020%2F06%2Fhouse_nice-36x36.jpg%2036w%22%20sizes%3D%22%28max-width%3A%20120px%29%20100vw%2C%20120px%22%20%2F%3E"
                                             data-price="%3Cspan%20class%3D%27infocur%20infocur_first%27%3E%3C%2Fspan%3E%24%20550%2C000%3Cspan%20class%3D%27infocur%27%3E%3C%2Fspan%3E"
                                             data-single-first-type="Apartments" data-single-first-action="Sales"
                                             data-rooms="3" data-size="5%2C825%20ft%3Csup%3E2%3C%2Fsup%3E"
                                             data-bathrooms="2"
                                             data-prop_url="https%3A%2F%2Fwpresidence.net%2Fproperties%2F3-rooms-mahattan-new-york%2F"
                                             data-pin_price="%24%20550K" data-clean_price="550000"
                                             style="position: relative; overflow: hidden;">
                                            <div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">
                                                <div style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px;"
                                                     class="gm-style">
                                                    <div style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; touch-action: pan-x pan-y;"
                                                         tabindex="0" aria-label="Map" aria-roledescription="map"
                                                         role="group">
                                                        <div style="z-index: 1; position: absolute; left: 50%; top: 50%; width: 100%; transform: translate(0px);">
                                                            <div style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;">
                                                                <div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
                                                                    <div style="position: absolute; z-index: 984; transform: matrix(1, 0, 0, 1, -16, -32);">
                                                                        <div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px;">
                                                                            <div style="width: 256px; height: 256px;"></div>
                                                                        </div>
                                                                        <div style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px;">
                                                                            <div style="width: 256px; height: 256px;"></div>
                                                                        </div>
                                                                        <div style="position: absolute; left: -256px; top: -256px; width: 256px; height: 256px;">
                                                                            <div style="width: 256px; height: 256px;"></div>
                                                                        </div>
                                                                        <div style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px;">
                                                                            <div style="width: 256px; height: 256px;"></div>
                                                                        </div>
                                                                        <div style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px;">
                                                                            <div style="width: 256px; height: 256px;"></div>
                                                                        </div>
                                                                        <div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px;">
                                                                            <div style="width: 256px; height: 256px;"></div>
                                                                        </div>
                                                                        <div style="position: absolute; left: -512px; top: 0px; width: 256px; height: 256px;">
                                                                            <div style="width: 256px; height: 256px;"></div>
                                                                        </div>
                                                                        <div style="position: absolute; left: -512px; top: -256px; width: 256px; height: 256px;">
                                                                            <div style="width: 256px; height: 256px;"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div>
                                                            <div style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div>
                                                            <div style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"></div>
                                                            <div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
                                                                <div style="position: absolute; z-index: 984; transform: matrix(1, 0, 0, 1, -16, -32);">
                                                                    <div style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                        <img style="width: 256px; height: 256px; user-select: none; border: 0px none; padding: 0px; margin: 0px; max-width: none;"
                                                                             draggable="false" alt=""

                                                                             src="<?php echo e(asset('front/files/single/vt.png')); ?>">
                                                                    </div>
                                                                    <div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                        <img style="width: 256px; height: 256px; user-select: none; border: 0px none; padding: 0px; margin: 0px; max-width: none;"
                                                                             draggable="false" alt=""

                                                                             src="<?php echo e(asset('front/files/single/vt_007.png')); ?>">
                                                                    </div>
                                                                    <div style="position: absolute; left: -256px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                        <img style="width: 256px; height: 256px; user-select: none; border: 0px none; padding: 0px; margin: 0px; max-width: none;"
                                                                             draggable="false" alt=""

                                                                             src="<?php echo e(asset('front/files/single/vt_006.png')); ?>">
                                                                    </div>
                                                                    <div style="position: absolute; left: -512px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                        <img style="width: 256px; height: 256px; user-select: none; border: 0px none; padding: 0px; margin: 0px; max-width: none;"
                                                                             draggable="false" alt=""

                                                                             src="<?php echo e(asset('front/files/single/vt_003.png')); ?>">
                                                                    </div>
                                                                    <div style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                        <img style="width: 256px; height: 256px; user-select: none; border: 0px none; padding: 0px; margin: 0px; max-width: none;"
                                                                             draggable="false" alt=""

                                                                             src="<?php echo e(asset('front/files/single/vt_005.png')); ?>">
                                                                    </div>
                                                                    <div style="position: absolute; left: -512px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                        <img style="width: 256px; height: 256px; user-select: none; border: 0px none; padding: 0px; margin: 0px; max-width: none;"
                                                                             draggable="false" alt=""

                                                                             src="<?php echo e(asset('front/files/single/vt_004.png')); ?>">
                                                                    </div>
                                                                    <div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                        <img style="width: 256px; height: 256px; user-select: none; border: 0px none; padding: 0px; margin: 0px; max-width: none;"
                                                                             draggable="false" alt=""

                                                                             src="<?php echo e(asset('front/files/single/vt_002.png')); ?>">
                                                                    </div>
                                                                    <div style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                        <img style="width: 256px; height: 256px; user-select: none; border: 0px none; padding: 0px; margin: 0px; max-width: none;"
                                                                             draggable="false" alt=""

                                                                             src="<?php echo e(asset('front/files/single/vt_008.png')); ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div style="z-index: 2; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; opacity: 0;"
                                                             class="gm-style-pbc"><p class="gm-style-pbt"></p></div>
                                                        <div style="z-index: 3; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; touch-action: pan-x pan-y;">
                                                            <div style="z-index: 4; position: absolute; left: 50%; top: 50%; width: 100%; transform: translate(0px);">
                                                                <div style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;">
                                                                    <div class="wpestate_marker apartments sales class_apartments class_sales"
                                                                         style="left: -7.64616e-7px; top: -12px;">
                                                                        <div class="interior_pin_price">$ 550K</div>
                                                                    </div>
                                                                </div>
                                                                <div style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div>
                                                                <div style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"></div>
                                                                <div style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;">
                                                                    <div class="mybox"
                                                                         style="transform: translateZ(0px); position: absolute; visibility: visible; width: 0px; left: -7.64616e-7px; top: 0.00000227336px;">
                                                                        <div class="info_details  price_infobox ">
                                                                            <span id="infocloser"
                                                                                  onclick="javascript:infoBox_sh.close();"></span>
                                                                            <div class="infobox_wrapper_image"><a
                                                                                        href="https://www.khaneistanbul.com.tr/properties/3-rooms-mahattan-new-york/"><img
                                                                                            src="<?php echo e(asset('front/files/single/house_nice-120x120.jpg')); ?>"
                                                                                            class="attachment-agent_picture_thumb size-agent_picture_thumb wp-post-image"
                                                                                            alt="" loading="lazy"
                                                                                            srcset="single/house_nice-120x120.jpg 120w, single/house_nice-150x150.jpg 150w, single/house_nice-45x45.jpg 45w, single/house_nice-36x36.jpg 36w"
                                                                                            sizes="(max-width: 120px) 100vw, 120px"
                                                                                            width="120" height="120"></a>
                                                                            </div>
                                                                            <div class="infobox_title"><a
                                                                                        href="https://www.khaneistanbul.com.tr/properties/3-rooms-mahattan-new-york/"
                                                                                        id="infobox_title">3 Rooms
                                                                                    Manhattan</a></div>
                                                                            <div class="prop_pricex"><span
                                                                                        class="infocur infocur_first"></span><?php echo e($villa->price); ?><span class="infocur"></span>
                                                                            </div>
                                                                            <div class="infobox_details"><span
                                                                                        id="inforoom">3 BD</span> <span
                                                                                        id="infobath">2 BA</span> <span
                                                                                        id="infosize">5,825 ft<sup>2</sup></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <iframe aria-hidden="true" tabindex="-1"
                                                            style="z-index: -1; position: absolute; width: 100%; height: 100%; top: 0px; left: 0px; border: medium none;"
                                                            __idm_frm__="19327352844" frameborder="0"></iframe>
                                                    <div style="pointer-events: none; width: 100%; height: 100%; box-sizing: border-box; position: absolute; z-index: 1000002; opacity: 0; border: 2px solid rgb(26, 115, 232);"></div>
                                                    <div></div>
                                                    <div></div>
                                                    <div></div>
                                                    <div></div>
                                                    <div>
                                                        <button style="background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; margin: 10px; padding: 0px; text-transform: none; appearance: none; position: absolute; cursor: pointer; user-select: none; border-radius: 2px; height: 40px; width: 40px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; overflow: hidden; display: none; top: 0px; right: 0px;"
                                                                draggable="false" title="Toggle fullscreen view"
                                                                aria-label="Toggle fullscreen view" type="button"
                                                                class="gm-control-active gm-fullscreen-control"><img
                                                                    style="height: 18px; width: 18px;"
                                                                    src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A"
                                                                    alt=""><img style="height: 18px; width: 18px;"
                                                                                src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A"
                                                                                alt=""><img
                                                                    style="height: 18px; width: 18px;"
                                                                    src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A"
                                                                    alt=""></button>
                                                    </div>
                                                    <div></div>
                                                    <div></div>
                                                    <div></div>
                                                    <div></div>
                                                    <div>
                                                        <div draggable="false"
                                                             style="user-select: none; height: 14px; line-height: 14px; z-index: 0; position: absolute; bottom: 14px; right: 0px;"
                                                             class="gm-style-cc">
                                                            <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                                                <div style="width: 1px;"></div>
                                                                <div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div>
                                                            </div>
                                                            <div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: none; padding-bottom: 0px;"></div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;">
                                                            <a style="position: static; overflow: visible; float: none; display: inline;"
                                                               target="_blank" rel="noopener"
                                                               href="https://maps.google.com/maps?ll=40.721762,-73.954124&amp;z=16&amp;t=m&amp;hl=en-US&amp;gl=US&amp;mapclient=apiv3"
                                                               title="Open this area in Google Maps (opens a new window)">
                                                                <div style="width: 66px; height: 26px; cursor: pointer;">
                                                                    <img style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; user-select: none; border: 0px none; padding: 0px; margin: 0px;"
                                                                         alt=""
                                                                         src="<?php echo e(asset('front/files/single/google_white5.png')); ?>"
                                                                         draggable="false"></div>
                                                            </a></div>
                                                    </div>
                                                    <div></div>
                                                    <div>
                                                        <div class="gmnoprint"
                                                             style="z-index: 1000001; position: absolute; right: 166px; bottom: 0px; width: 121px;">
                                                            <div draggable="false"
                                                                 style="user-select: none; height: 14px; line-height: 14px;"
                                                                 class="gm-style-cc">
                                                                <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                                                    <div style="width: 1px;"></div>
                                                                    <div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div>
                                                                </div>
                                                                <div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
                                                                    <a style="text-decoration: none; cursor: pointer; display: none;">Map
                                                                        Data</a><span>Map data ©2021 Google</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="gmnoprint gm-style-cc"
                                                             style="z-index: 1000001; user-select: none; height: 14px; line-height: 14px; position: absolute; right: 95px; bottom: 0px;"
                                                             draggable="false">
                                                            <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                                                <div style="width: 1px;"></div>
                                                                <div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div>
                                                            </div>
                                                            <div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
                                                                <a style="text-decoration: none; cursor: pointer; color: rgb(0, 0, 0);"
                                                                   href="https://www.google.com/intl/en-US_US/help/terms_maps.html"
                                                                   target="_blank" rel="noopener">Terms of Use</a>
                                                            </div>
                                                        </div>
                                                        <div draggable="false"
                                                             style="user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;"
                                                             class="gm-style-cc">
                                                            <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                                                <div style="width: 1px;"></div>
                                                                <div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div>
                                                            </div>
                                                            <div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
                                                                <a target="_blank" rel="noopener"
                                                                   title="Report errors in the road map or imagery to Google"
                                                                   dir="ltr"
                                                                   style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); text-decoration: none; position: relative;"
                                                                   href="https://www.google.com/maps/@40.7217623,-73.9541245,16z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3">Report
                                                                    a map error</a></div>
                                                        </div>
                                                        <div class="gmnoscreen"
                                                             style="position: absolute; right: 0px; bottom: 0px;">
                                                            <div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(0, 0, 0); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">
                                                                Map data ©2021 Google
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="background-color: white; padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); box-sizing: border-box; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 300px; height: 180px; position: absolute; left: 204px; top: 110px;">
                                                        <div style="padding: 0px 0px 10px; font-size: 16px; box-sizing: border-box;">
                                                            Map Data
                                                        </div>
                                                        <div style="font-size: 13px;">Map data ©2021 Google</div>
                                                        <button style="background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; display: block; border: 0px none; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: absolute; cursor: pointer; user-select: none; top: 0px; right: 0px; width: 37px; height: 37px;"
                                                                draggable="false" title="Close" aria-label="Close"
                                                                type="button" class="gm-ui-hover-effect"><img
                                                                    src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224px%22%20height%3D%2224px%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22%23000000%22%3E%0A%20%20%20%20%3Cpath%20d%3D%22M19%206.41L17.59%205%2012%2010.59%206.41%205%205%206.41%2010.59%2012%205%2017.59%206.41%2019%2012%2013.41%2017.59%2019%2019%2017.59%2013.41%2012z%22%2F%3E%0A%20%20%20%20%3Cpath%20d%3D%22M0%200h24v24H0z%22%20fill%3D%22none%22%2F%3E%0A%3C%2Fsvg%3E%0A"
                                                                    style="pointer-events: none; display: block; width: 13px; height: 13px; margin: 12px;">
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        /* <![CDATA[ */ //<![CDATA[
                        jQuery(document).ready(function () {
                            wpestate_show_morg_pie();
                            wpestate_show_stat_accordion();
                        });
                        //]]> /* ]]> */
                    </script>
                    <div class="agent_contanct_form hidden">
                        <h4 id="show_contact">تماس با ما</h4>
                        <div class="schedule_meeting">زمان بندی نمایش</div>
                        <div class="alert-box error">
                            <div class="alert-message" id="alert-agent-contact"></div>
                        </div>
                        <div class="schedule_wrapper ">
                            <div class="col-md-6">
                                <input name="schedule_day" class="schedule_day hasDatepicker" type="text" placeholder="روز" aria-required="true" id="dp1620471747505">
                            </div>
                            <div class="col-md-6">
                                <select name="schedule_hour" id="schedule_hour" class="form-control">
                                    <option value="0" selected="selected">زمان</option>
                                    <option value="7:00">7:00</option>
                                    <option value="7:15">7:15</option>
                                    <option value="7:30">7:30</option>
                                    <option value="7:45">7:45</option>
                                    <option value="8:00">8:00</option>
                                    <option value="8:15">8:15</option>
                                    <option value="8:30">8:30</option>
                                    <option value="8:45">8:45</option>
                                    <option value="9:00">9:00</option>
                                    <option value="9:15">9:15</option>
                                    <option value="9:30">9:30</option>
                                    <option value="9:45">9:45</option>
                                    <option value="10:00">10:00</option>
                                    <option value="10:15">10:15</option>
                                    <option value="10:30">10:30</option>
                                    <option value="10:45">10:45</option>
                                    <option value="11:00">11:00</option>
                                    <option value="11:15">11:15</option>
                                    <option value="11:30">11:30</option>
                                    <option value="11:45">11:45</option>
                                    <option value="12:00">12:00</option>
                                    <option value="12:15">12:15</option>
                                    <option value="12:30">12:30</option>
                                    <option value="12:45">12:45</option>
                                    <option value="13:00">13:00</option>
                                    <option value="13:15">13:15</option>
                                    <option value="13:30">13:30</option>
                                    <option value="13:45">13:45</option>
                                    <option value="14:00">14:00</option>
                                    <option value="14:15">14:15</option>
                                    <option value="14:30">14:30</option>
                                    <option value="14:45">14:45</option>
                                    <option value="15:00">15:00</option>
                                    <option value="15:15">15:15</option>
                                    <option value="15:30">15:30</option>
                                    <option value="15:45">15:45</option>
                                    <option value="16:00">16:00</option>
                                    <option value="16:15">16:15</option>
                                    <option value="16:30">16:30</option>
                                    <option value="16:45">16:45</option>
                                    <option value="17:00">17:00</option>
                                    <option value="17:15">17:15</option>
                                    <option value="17:30">17:30</option>
                                    <option value="17:45">17:45</option>
                                    <option value="18:00">18:00</option>
                                    <option value="18:15">18:15</option>
                                    <option value="18:30">18:30</option>
                                    <option value="18:45">18:45</option>
                                    <option value="19:00">19:00</option>
                                    <option value="19:15">19:15</option>
                                    <option value="19:30">19:30</option>
                                    <option value="19:45">19:45</option>
                                </select>
                            </div>
                        </div>
                        <input name="contact_name" id="agent_contact_name" type="text" placeholder="نام" aria-required="true" class="form-control">
                        <input type="text" name="email" class="form-control" id="agent_user_email" aria-required="true" placeholder="ایمیل">
                        <input type="text" name="phone" class="form-control" id="agent_phone" placeholder="شماره موبایل">
                        <textarea id="agent_comment" name="comment" class="form-control" cols="45" rows="8" aria-required="true">[ <?php echo e($villa->name); ?> ]</textarea>
                        <input type="submit" class="wpresidence_button agent_submit_class " id="agent_submit" value="ارسال ایمیل">
                        <a class="wpresidence_button wpresidence_button_inverse realtor_call" href="tel:305 555 4555">
                            <i class="fas fa-phone"></i> تماس
                            <span class="agent_call_no">305 555 4555</span>
                        </a>
                        <a class="wpresidence_button wpresidence_button_inverse realtor_whatsapp" href="https://api.whatsapp.com/send?phone=305%20555%204555&amp;text=Hello%20I%27m%20interested%20in%20%5B3%20Rooms%20Manhattan%5D%20https://www.khaneistanbul.com.tr/properties/3-rooms-mahattan-new-york/">
                            <i class="fab fa-whatsapp"></i> واتساپ
                        </a>
                        <input name="prop_id" type="hidden" id="agent_property_id" value="967">
                        <input name="prop_id" type="hidden" id="agent_id" value="45">
                        <input type="hidden" name="contact_ajax_nonce" id="agent_property_ajax_nonce" value="b5a6fe336a">
                    </div>
                    <div class="mylistings" id="property_similar_listings">
                        <h3 class="agent_listings_title_similar">ویلاهای مشابه</h3>
                        <?php $col_size=6; ?>
                        <?php echo $__env->make('villas.item', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="lightbox_property_wrapper">
        <div class="lightbox_property_wrapper_level2 ">
            <div class="lightbox_property_content row">
                <div class="lightbox_property_slider col-md-10">
                    <div id="owl-demo" class="owl-carousel owl-theme owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s;">
                                <?php $__currentLoopData = $villa->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="owl-item">
                                        <div class="item" href="#<?php echo e($key+1); ?>" style="background-image:url(<?php echo e(url($photo->path)); ?>)"></div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="owl-nav">
                            <button type="button"  class="owl-prev">
                                <div class="nextleft"><i class="demo-icon icon-left-open-big"></i></div>
                            </button>
                            <button type="button"  class="owl-next">
                                <div class="nextright"><i class="demo-icon icon-right-open-big"></i></div>
                            </button>
                        </div>
                        <div class="owl-dots disabled"></div>
                    </div>
                </div>
                <div class="lightbox_property_sidebar col-md-2">
                    <div class="lightbox_property_header">
                        <div class="entry-title entry-prop"><?php echo e($villa->name); ?></div>
                    </div>
                    <h4 class="lightbox_enquire">Want to find out more?</h4>
                    <div class="wpestate_agent_details_wrapper">
                        <div class="col-md-5 agentpic-wrapper">
                            <div class="agent-listing-img-wrapper" data-link="https://www.khaneistanbul.com.tr/agents/mike-rutter/">
                                <div class="agentpict"
                                     style="background-image:url(https://wpresidence.b-cdn.net/wp-content/uploads/2014/05/person_sam_davies-500x328.png)"></div>
                            </div>
                            <div class="agent_unit_social_single"><a href="https://www.khaneistanbul.com.tr/" target="_blank"><i
                                            class="fab fa-facebook-f"></i></a> <a href="https://www.khaneistanbul.com.tr/" target="_blank"><i
                                            class="fab fa-twitter"></i></a> <a href="https://www.khaneistanbul.com.tr/" target="_blank"><i
                                            class="fab fa-linkedin"></i></a> <a href="https://www.khaneistanbul.com.tr/" target="_blank"><i
                                            class="fab fa-pinterest"></i></a> <a href="#" target="_blank"><i
                                            class="fab fa-instagram"></i></a></div>
                        </div>
                        <div class="col-md-7 agent_details"><h3><a href="https://www.khaneistanbul.com.tr/agents/mike-rutter/">Mike
                                    Rutter</a></h3>
                            <div class="agent_position">buying agent</div>
                            <div class="agent_detail agent_phone_class"><i class="fas fa-phone"></i><a
                                        href="tel:305 555 4555">305 555 4555</a></div>
                            <div class="agent_detail agent_mobile_class"><i class="fas fa-mobile"></i><a
                                        href="tel:305 555 4555">305 555 4555</a></div>
                            <div class="agent_detail agent_email_class"><i class="far fa-envelope"></i><a
                                        href="mailto:michael@wpresidence.net">michael@wpresidence.net</a></div>
                            <div class="agent_detail agent_skype_class"><i class="fab fa-skype"></i>michael.wp</div>
                            <div class="agent_detail agent_web_class"><i class="fas fa-desktop"></i><a
                                        href="http://mywebsite.com/" target="_blank">mywebsite.com</a></div>
                            <div class="agent_detail agent_web_class"><strong>Member of:</strong> REMAX ASSOCIATION</div>
                        </div>
                        <div class="row custom_details_container"></div>
                    </div>
                    <div class="agent_contanct_form "><h4 id="show_contact">Contact Me</h4>
                        <div class="schedule_meeting">Schedule a showing?</div>
                        <div class="alert-box error">
                            <div class="alert-message" id="alert-agent-contact"></div>
                        </div>
                        <div class="schedule_wrapper ">
                            <div class="col-md-6"><input name="schedule_day" class="schedule_day hasDatepicker" type="text"
                                                         placeholder="Day" aria-required="true" id="dp1620471747506"></div>
                            <div class="col-md-6"><select name="schedule_hour" id="schedule_hour" class="form-control">
                                    <option value="0" selected="selected">Time</option>
                                    <option value="7:00">7:00</option>
                                    <option value="7:15">7:15</option>
                                    <option value="7:30">7:30</option>
                                    <option value="7:45">7:45</option>
                                    <option value="8:00">8:00</option>
                                    <option value="8:15">8:15</option>
                                    <option value="8:30">8:30</option>
                                    <option value="8:45">8:45</option>
                                    <option value="9:00">9:00</option>
                                    <option value="9:15">9:15</option>
                                    <option value="9:30">9:30</option>
                                    <option value="9:45">9:45</option>
                                    <option value="10:00">10:00</option>
                                    <option value="10:15">10:15</option>
                                    <option value="10:30">10:30</option>
                                    <option value="10:45">10:45</option>
                                    <option value="11:00">11:00</option>
                                    <option value="11:15">11:15</option>
                                    <option value="11:30">11:30</option>
                                    <option value="11:45">11:45</option>
                                    <option value="12:00">12:00</option>
                                    <option value="12:15">12:15</option>
                                    <option value="12:30">12:30</option>
                                    <option value="12:45">12:45</option>
                                    <option value="13:00">13:00</option>
                                    <option value="13:15">13:15</option>
                                    <option value="13:30">13:30</option>
                                    <option value="13:45">13:45</option>
                                    <option value="14:00">14:00</option>
                                    <option value="14:15">14:15</option>
                                    <option value="14:30">14:30</option>
                                    <option value="14:45">14:45</option>
                                    <option value="15:00">15:00</option>
                                    <option value="15:15">15:15</option>
                                    <option value="15:30">15:30</option>
                                    <option value="15:45">15:45</option>
                                    <option value="16:00">16:00</option>
                                    <option value="16:15">16:15</option>
                                    <option value="16:30">16:30</option>
                                    <option value="16:45">16:45</option>
                                    <option value="17:00">17:00</option>
                                    <option value="17:15">17:15</option>
                                    <option value="17:30">17:30</option>
                                    <option value="17:45">17:45</option>
                                    <option value="18:00">18:00</option>
                                    <option value="18:15">18:15</option>
                                    <option value="18:30">18:30</option>
                                    <option value="18:45">18:45</option>
                                    <option value="19:00">19:00</option>
                                    <option value="19:15">19:15</option>
                                    <option value="19:30">19:30</option>
                                    <option value="19:45">19:45</option>
                                </select></div>
                        </div>
                        <input name="contact_name" id="agent_contact_name" type="text" placeholder="Your Name"
                               aria-required="true" class="form-control"> <input type="text" name="email"
                                                                                 class="form-control" id="agent_user_email"
                                                                                 aria-required="true"
                                                                                 placeholder="Your Email"> <input
                                type="text" name="phone" class="form-control" id="agent_phone"
                                placeholder="Your Phone"><textarea id="agent_comment" name="comment" class="form-control"
                                                                   cols="45" rows="8" aria-required="true">I'm interested in [ <?php echo e($villa->name); ?> ] </textarea><input
                                type="submit" class="wpresidence_button agent_submit_class " id="agent_submit"
                                value="Send Email"><a class="wpresidence_button wpresidence_button_inverse realtor_call"
                                                      href="tel:305 555 4555"> <i class="fas fa-phone"></i> Call <span
                                    class="agent_call_no">305 555 4555</span></a><a
                                class="wpresidence_button wpresidence_button_inverse realtor_whatsapp"
                                href="https://api.whatsapp.com/send?phone=305%20555%204555&amp;text=Hello%20I%27m%20interested%20in%20%5B3%20Rooms%20Manhattan%5D%20https://www.khaneistanbul.com.tr/properties/3-rooms-mahattan-new-york/">
                            <i class="fab fa-whatsapp"></i> WhatsApp</a><input name="prop_id" type="hidden"
                                                                               id="agent_property_id" value="967"> <input
                                name="prop_id" type="hidden" id="agent_id" value="45"> <input type="hidden"
                                                                                              name="contact_ajax_nonce"
                                                                                              id="agent_property_ajax_nonce"
                                                                                              value="b5a6fe336a"></div>
                </div>
            </div>
            <div class="lighbox-image-close"><i class="fas fa-times" aria-hidden="true"></i></div>
        </div>
        <div class="lighbox_overlay"></div>
    </div>
    <script type="text/javascript">/* <![CDATA[ */ //<![CDATA[
        jQuery(document).ready(function () {
            estate_start_lightbox();
        });
        //]]> /* ]]> */
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>