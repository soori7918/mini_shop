<?php
    $villas = \App\Villa::where('status', 'published');
    $villasAsItems = $villas->orderBy('view', 'desc')->take('3')->get();
?>
<footer id="colophon" class="  footer_back_repeat_no  sticky_footer  ">
    <div id="footer-widget-area" class="row ">
        <div id="first" class="widget-area col-md-6 ">
            <ul class="xoxo">
                <li id="contact_widget-9" class="widget-container contact_sidebar"><h4 class="widget-title-footer">
                        تماس با ما</h4>
                    <div class="contact_sidebar_wrap">
                        <p class="widget_contact_addr">
                            <i class="fas fa-building"></i>
                            Vadi Istanbul _ A2 Office _ Floor 4 _ No : 33 _ Khaneistanbul _ Sariyer _ Ayazağa Mah _ Istanbul
                        </p>
                        <p class="widget_contact_phone"><i class="fas fa-phone"></i><a
                                    href="tel:%28305%29+555-4446">(+90) 534-352-22-22</a></p>
                        
                        <p class="widget_contact_email"><i class="far fa-envelope"></i><a
                                    href="mailto:Info@khaneistanbul.com.tr">Info@khaneistanbul.com.tr</a></p>
                        <p class="widget_contact_skype"><i class="fab fa-skype"></i>khaneistanbul</p>
                        <p class="widget_contact_url"><i class="fas fa-desktop"></i><a
                                    href="<?php echo e(url('/')); ?>">Khane Istanbul</a></p></div>
                </li>
                <li id="social_widget-10" class="widget-container social_sidebar">
                    <div class="social_sidebar_internal"><a href="<?php echo e(url('/')); ?>" target="_blank"><i
                                    class="fas fa-rss"></i></a><a href="<?php echo e(url('/')); ?>" target="_blank"><i
                                    class="fab fa-facebook-f"></i></a><a href="<?php echo e(url('/')); ?>" target="_blank"><i
                                    class="fab fa-twitter"></i></a><a href="<?php echo e(url('/')); ?>" target="_blank"><i
                                    class="fab fa-dribbble"></i></a><a href="<?php echo e(url('/')); ?>" target="_blank"><i
                                    class="fab fa-google-plus-g"></i></a><a href="<?php echo e(url('/')); ?>" target="_blank"><i
                                    class="fab fa-linkedin-in"></i></a><a href="<?php echo e(url('/')); ?>" target="_blank"><i
                                    class="fab fa-tumblr"></i></a><a href="<?php echo e(url('/')); ?>" target="_blank"><i
                                    class="fab fa-pinterest-p"></i></a><a href="<?php echo e(url('/')); ?>" target="_blank"><i
                                    class="fab fa-youtube"></i></a><a href="<?php echo e(url('/')); ?>" target="_blank"><i
                                    class="fab fa-vimeo-v"></i></a></div>
                </li>
            </ul>
        </div>
        <div id="second" class="widget-area col-md-3">
            <ul class="xoxo">
                <li id="property_categories-12" class="widget-container property_categories"><h4
                            class="widget-title-footer">املاک بر اساس دسته بندی</h4>
                    <div class="category_list_widget">
                        <ul>
                            <li><a href="https://khaneistanbul.com.tr/listings/apartments/">Apartments</a><span
                                        class="category_no">(13)</span></li>
                            <li><a href="https://khaneistanbul.com.tr/listings/condos/">Condos</a><span
                                        class="category_no">(8)</span></li>
                            <li><a href="https://khaneistanbul.com.tr/listings/houses/">Houses</a><span
                                        class="category_no">(5)</span></li>
                            <li><a href="https://khaneistanbul.com.tr/listings/industrial/">Industrial</a><span
                                        class="category_no">(1)</span></li>
                            <li><a href="https://khaneistanbul.com.tr/listings/land/">Land</a><span class="category_no">(1)</span>
                            </li>
                            <li><a href="https://khaneistanbul.com.tr/listings/offices/">Offices</a><span
                                        class="category_no">(2)</span></li>
                            <li><a href="https://khaneistanbul.com.tr/listings/retail/">Retail</a><span
                                        class="category_no">(4)</span></li>
                            <li><a href="https://khaneistanbul.com.tr/listings/villas/">Villas</a><span
                                        class="category_no">(4)</span></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div id="third" class="widget-area col-md-3">
            <ul class="xoxo">
                <li id="footer_latest_widget-21" class="widget-container latest_listings"><h4
                            class="widget-title-footer">ملک های اخیر</h4>
                    <script type="text/javascript">
                        /* <![CDATA[ */ //<![CDATA[
                        jQuery(document).ready(function () {
                            estate_sidebar_slider_carousel();
                        });
                        //]]> /* ]]> */
                    </script>
                    <div class="latest_listings list_type">
                        <?php $__currentLoopData = $villasAsItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="widget_latest_internal"
                                 data-link="<?php echo e(route('front.villas.show',$item->slug)); ?>">
                                <div class="listing_name ">
                                    <span class="widget_latest_title">
                                        <a href="<?php echo e(url('/')); ?>/properties/luxury-house-in-greenville/"><?php echo e($item->name); ?></a></span>
                                    
                                    
                                    
                                </div>
                                <div class="widget_latest_listing_image">
                                    <a href="<?php echo e(route('front.villas.show',$item->slug)); ?>">
                                        <img src="<?php echo e(count($item->photos)?url($item->photos[0]->path):asset('front/files/house_nice_2-105x70.jpg')); ?>" alt="slider-thumb" data-original="<?php echo e(count($item->photos)?url($item->photos[0]->path):asset('front/files/house_nice_2-105x70.jpg')); ?>" class="lazyload img_responsive" width="105" height="70">
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="sub_footer">
        <div class="sub_footer_content "><span
                    class="copyright"> Copyright 2021 |
                    <a href="https://adib-it.com" target="_blank">Adib-it</a>
                    . All Rights Reserved. </span>
            <div class="subfooter_menu">
                <div class="menu-footer-container">
                    <ul id="menu-footer" class="menu">
                        <li id="menu-item-7278"
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-7278"><a
                                    href="http://adib-it.com/support/">پشتیبانی کلاینت</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>