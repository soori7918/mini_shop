
<?php $__env->startSection('styles'); ?>
    <title>لیست مقالات - خانه استانبول</title>
    <meta property="og:title" content="لیست مقالات - خانه استانبول">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="header_media with_search_6 header_media_non_elementor"></div>
    <div class="container content_wrapper">
        <div class="row">
            <div class="col-xs-12 col-md-12 breadcrumb_container">
                <ol class="breadcrumb">
                    <li><a href="<?php echo e(url('/')); ?>/">خانه</a></li>
                    <li class="active">مقالات</li>
                </ol>
            </div>
            <div class=" col-md-9 col-md-push-3 rightmargin "><span class="entry-title listing_loader_title">Your search results</span>
                <div class="spinner" id="listing_loader">
                    <div class="rect1"></div>
                    <div class="rect2"></div>
                    <div class="rect3"></div>
                    <div class="rect4"></div>
                    <div class="rect5"></div>
                </div>
                <div id="listing_ajax_container"></div>
                <h1 class="entry-title title_prop hidden">Blog List – Sidebar Left</h1>
                <div class="single-content hidden">
                    <p>
                        A blog (a truncation of the expression “weblog”)[1] is a discussion or
                        informational website published on the World Wide Web consisting of
                        discrete, often informal diary-style text entries (“posts”). Posts are
                        typically displayed in reverse chronological order, so that the most
                        recent post appears first, at the top of the web page. Until 2009, blogs
                        were usually the work of a single individual,[citation needed]
                        occasionally of a small group.
                    </p>
                </div>
                <div class="blog_list_wrapper">
                    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6 listing_wrapper blog2v">
                            <div class="property_listing_blog"
                                 data-link="<?php echo e(route('blog-show',$blog->slug)); ?>">
                                <div class="blog_unit_image">
                                    <a href="<?php echo e(route('blog-show',$blog->slug)); ?>">
                                        <img src="<?php echo e($blog->photo!=null?url($blog->photo):''); ?>" class="lazyload img-responsive wp-post-image" alt="" loading="lazy" data-original="<?php echo e($blog->photo!=null?url($blog->photo):''); ?>" width="525" height="328">
                                    </a>
                                </div>
                                <h4>
                                    <a href="<?php echo e(route('blog-show',$blog->slug)); ?>" class="blog_unit_title"><?php echo e($blog->title); ?></a>
                                </h4>
                                <div class="blog_unit_meta"> <?php echo e($blog->created_at); ?></div>
                                <div class="listing_details the_grid_view">
                                    <?php echo e(str_limit($blog->text_short,100)); ?>

                                    <a href="<?php echo e(route('blog-show',$blog->slug)); ?>" class="unit_more_x">...</a>
                                </div>
                                <a class="read_more" href="<?php echo e(route('blog-show',$blog->slug)); ?>">
                                    ادامه مقاله
                                    <i class="fas fa-angle-left"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>











            </div>
            <div class="clearfix visible-xs"></div>
            <div class="col-xs-12 col-md-3 col-md-pull-9  widget-area-sidebar" id="primary">
                <div id="primary_sidebar_wrapper">
                    <ul class="xoxo">
                        <li id="footer_latest_widget-22"
                            class="widget widget-container sbg_widget BlogSidebar latest_listings"><h3
                                    class="widget-title-sidebar">Featured Listings</h3>
                            <script type="text/javascript">/* <![CDATA[ */ //<![CDATA[
                                jQuery(document).ready(function () {
                                    estate_sidebar_slider_carousel();
                                });
                                //]]> /* ]]> */</script>
                            <div class="latest_listings list_type">
                                <div class="widget_latest_internal"
                                     data-link="<?php echo e(url('/')); ?>/properties/luxury-house-in-greenville/">
                                    <div class="widget_latest_listing_image"><a
                                                href="<?php echo e(url('/')); ?>/properties/luxury-house-in-greenville/"><img
                                                    src="Blog%20List%20-%20Sidebar%20Left%20-%20WPResidence%20-%20Popular%20Customizable%20Real%20Estate%20WordPress%20Theme_files/house_nice_2-105x70.jpg"
                                                    alt="slider-thumb"
                                                    data-original="https://wpresidence.b-cdn.net/wp-content/uploads/2017/11/house_nice_2-105x70.jpg"
                                                    class="lazyload img_responsive" width="105" height="70"></a></div>
                                    <div class="listing_name "><span class="widget_latest_title"><a
                                                    href="<?php echo e(url('/')); ?>/properties/luxury-house-in-greenville/">Luxury House In Greenville</a></span>
                                        <span class="widget_latest_price"><span
                                                    class="price_label price_label_before">from</span> $ 86,000 <span
                                                    class="price_label"></span></span></div>
                                </div>
                                <div class="widget_latest_internal"
                                     data-link="<?php echo e(url('/')); ?>/properties/three-room-apartment/">
                                    <div class="widget_latest_listing_image"><a
                                                href="<?php echo e(url('/')); ?>/properties/three-room-apartment/"><img
                                                    src="Blog%20List%20-%20Sidebar%20Left%20-%20WPResidence%20-%20Popular%20Customizable%20Real%20Estate%20WordPress%20Theme_files/featured_property_large-105x70.jpg"
                                                    alt="slider-thumb"
                                                    data-original="https://wpresidence.b-cdn.net/wp-content/uploads/2017/09/featured_property_large-105x70.jpg"
                                                    class="lazyload img_responsive" width="105" height="70"></a></div>
                                    <div class="listing_name "><span class="widget_latest_title"><a
                                                    href="<?php echo e(url('/')); ?>/properties/three-room-apartment/">Three Room Apartment for Rent</a></span>
                                        <span class="widget_latest_price">$ 150,000 <span
                                                    class="price_label"></span></span></div>
                                </div>
                                <div class="widget_latest_internal"
                                     data-link="<?php echo e(url('/')); ?>/properties/apartment-building/">
                                    <div class="widget_latest_listing_image"><a
                                                href="<?php echo e(url('/')); ?>/properties/apartment-building/"><img
                                                    src="Blog%20List%20-%20Sidebar%20Left%20-%20WPResidence%20-%20Popular%20Customizable%20Real%20Estate%20WordPress%20Theme_files/home-105x70.jpg"
                                                    alt="slider-thumb"
                                                    data-original="https://wpresidence.b-cdn.net/wp-content/uploads/2017/01/home-105x70.jpg"
                                                    class="lazyload img_responsive" width="105" height="70"></a></div>
                                    <div class="listing_name "><span class="widget_latest_title"><a
                                                    href="<?php echo e(url('/')); ?>/properties/apartment-building/">Apartment with Subunits</a></span>
                                        <span class="widget_latest_price"><span
                                                    class="price_label price_label_before">from</span> $ 999 <span
                                                    class="price_label"></span></span></div>
                                </div>
                                <div class="widget_latest_internal"
                                     data-link="<?php echo e(url('/')); ?>/properties/3-rooms-mahattan-new-york/">
                                    <div class="widget_latest_listing_image"><a
                                                href="<?php echo e(url('/')); ?>/properties/3-rooms-mahattan-new-york/"><img
                                                    src="Blog%20List%20-%20Sidebar%20Left%20-%20WPResidence%20-%20Popular%20Customizable%20Real%20Estate%20WordPress%20Theme_files/house_nice-105x70.jpg"
                                                    alt="slider-thumb"
                                                    data-original="https://wpresidence.b-cdn.net/wp-content/uploads/2020/06/house_nice-105x70.jpg"
                                                    class="lazyload img_responsive" width="105" height="70"></a></div>
                                    <div class="listing_name "><span class="widget_latest_title"><a
                                                    href="<?php echo e(url('/')); ?>/properties/3-rooms-mahattan-new-york/">3 Rooms Manhattan</a></span>
                                        <span class="widget_latest_price">$ 550,000 <span
                                                    class="price_label"></span></span></div>
                                </div>
                                <div class="widget_latest_internal"
                                     data-link="<?php echo e(url('/')); ?>/properties/luxury-villa-in-rego-park/">
                                    <div class="widget_latest_listing_image"><a
                                                href="<?php echo e(url('/')); ?>/properties/luxury-villa-in-rego-park/"><img
                                                    src="Blog%20List%20-%20Sidebar%20Left%20-%20WPResidence%20-%20Popular%20Customizable%20Real%20Estate%20WordPress%20Theme_files/prop-105x70.jpg"
                                                    alt="slider-thumb"
                                                    data-original="https://wpresidence.b-cdn.net/wp-content/uploads/2014/05/prop-105x70.jpg"
                                                    class="lazyload img_responsive" width="105" height="70"></a></div>
                                    <div class="listing_name "><span class="widget_latest_title"><a
                                                    href="<?php echo e(url('/')); ?>/properties/luxury-villa-in-rego-park/">Luxury villa in Rego Park</a></span>
                                        <span class="widget_latest_price">$ 420 <span
                                                    class="price_label">/ month</span></span></div>
                                </div>
                            </div>
                        </li>
                        <li id="recent-posts-2"
                            class="widget widget-container sbg_widget BlogSidebar widget_recent_entries"><h3
                                    class="widget-title-sidebar">Recent Posts</h3>
                            <ul>
                                <li><a href="<?php echo e(url('/')); ?>/sidebar-on-the-right-search-widget/">Search
                                        widget on the right</a></li>
                                <li><a href="<?php echo e(url('/')); ?>/buying-a-home/">Buying a Home</a></li>
                                <li><a href="<?php echo e(url('/')); ?>/manhattan-apartments/">Manhattan Apartments</a>
                                </li>
                                <li><a href="<?php echo e(url('/')); ?>/why-live-in-new-york/">Why Live in New York</a>
                                </li>
                                <li><a href="<?php echo e(url('/')); ?>/selling-your-home/">Selling Your Home</a></li>
                            </ul>
                        </li>
                        <li id="search-5" class="widget widget-container sbg_widget BlogSidebar widget_search"><h3
                                    class="widget-title-sidebar">Search Keyword</h3>
                            <form method="get" id="searchform" action="<?php echo e(url('/')); ?>/"><input type="text"
                                                                                                        class="form-control"
                                                                                                        name="s"
                                                                                                        id="s"
                                                                                                        placeholder="Type Keyword">
                                <button class="wpresidence_button" id="submit-form">Search</button>
                                <input type="hidden" id="wpestate_default_search_nonce"
                                       name="wpestate_default_search_nonce" value="a300c71bff"><input type="hidden"
                                                                                                      name="_wp_http_referer"
                                                                                                      value="/blog-list/">
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>