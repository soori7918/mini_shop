
<?php $__env->startSection('style_css'); ?>
    <style>
        .ltn__img-slide-item-4 img {
            width: 100%;
            height: 390px;
            object-fit: cover;
        }

        .bg-overlay-white-30:before {
            background: rgba(0, 0, 0, 0.3);
        }

        .ltn__breadcrumb-inner h3,
        .ltn__breadcrumb-inner li,
        .ltn__breadcrumb-inner li > a {
            color: #fff !important;
        }
        .ltn__shop-details-area
        {
            background: var(--section-bg-1);
            padding-top: 40px;
        }
        .ltn__breadcrumb-area
        {
            margin-bottom: 0;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <!-- The Modal/Lightbox -->









































































































































































<!-- SHOP DETAILS AREA START -->
<div class="ltn__shop-details-area pb-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <?php if($item->sale_status=='active'): ?>
                    <span class="sale_status_span"><i class="fas fa-dollar-sign ml-1"></i> فروخته شد</span>
                <?php endif; ?>
                <div class="ltn__shop-details-inner ltn__page-details-inner mb-60">
                    <!-- IMAGE SLIDER AREA START (img-slider-3) -->
                    <div class=" ltn__img-slider-area">
                        <div class="container-fluid all_pic_box">
                            <div class="row ltn__image-slider-5-active slick-arrow-1 slick-arrow-1-inner ltn__no-gutter-all">
                                <?php $__currentLoopData = $item->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-lg-12">
                                        <div class="ltn__img-slide-item-4">
                                            <a href="<?php echo e($photo->path?url($photo->path):url('source/assets/user/rtl/img/img-slide/31.jpg')); ?>" data-rel="lightcase:myCollection">
                                                <img src="<?php echo e($photo->path?url($photo->path):url('source/assets/user/rtl/img/img-slide/31.jpg')); ?>" alt="<?php echo e($item->name); ?>">
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <ul class="tab_pic_box">
                                <?php if(count($item->in_gallery)>0): ?>
                                    <li>
                                        <a class="gallery" href="<?php echo e(url($item->in_gallery[0]->path)); ?>" data-rel="lightcase:myCollection_in"><i class="far fa-images"></i> نمای داخلی <span class="count_img"><?php echo e(count($item->in_gallery)); ?></span> </a>
                                        <?php $__currentLoopData = $item->in_gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_in=> $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($key_in>0): ?>
                                                <a hidden href="<?php echo e($in->path?url($in->path):url('source/assets/user/rtl/img/img-slide/31.jpg')); ?>" data-rel="lightcase:myCollection_in">
                                                    <img src="<?php echo e($in->path?url($in->path):url('source/assets/user/rtl/img/img-slide/31.jpg')); ?>" alt="<?php echo e($item->name); ?>">
                                                </a>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </li>
                                <?php endif; ?>
                                <?php if(count($item->out_gallery)>0): ?>
                                        <li>
                                            <a class="gallery" href="<?php echo e(url($item->out_gallery[0]->path)); ?>" data-rel="lightcase:myCollection_out"><i class="far fa-images"></i> نمای داخلی <span class="count_img"><?php echo e(count($item->out_gallery)); ?></span> </a>
                                            <?php $__currentLoopData = $item->out_gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_out=>$out): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($key_out>0): ?>
                                                    <a hidden href="<?php echo e($out->path?url($out->path):url('source/assets/user/rtl/img/img-slide/31.jpg')); ?>" data-rel="lightcase:myCollection_out">
                                                        <img src="<?php echo e($out->path?url($out->path):url('source/assets/user/rtl/img/img-slide/31.jpg')); ?>" alt="<?php echo e($item->name); ?>">
                                                    </a>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </li>
                                <?php endif; ?>
                                <?php if(count($item->plan_gallery)>0): ?>
                                        <li>
                                            <a class="gallery" href="<?php echo e(url($item->plan_gallery[0]->path)); ?>" data-rel="lightcase:myCollection_plan"><i class="far fa-images"></i> نمای داخلی <span class="count_img"><?php echo e(count($item->plan_gallery)); ?></span> </a>
                                            <?php $__currentLoopData = $item->plan_gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_plan=>$plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($key_plan>0): ?>
                                                    <a hidden href="<?php echo e($plan->path?url($plan->path):url('source/assets/user/rtl/img/img-slide/31.jpg')); ?>" data-rel="lightcase:myCollection_plan">
                                                        <img src="<?php echo e($plan->path?url($plan->path):url('source/assets/user/rtl/img/img-slide/31.jpg')); ?>" alt="<?php echo e($item->name); ?>">
                                                    </a>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <!-- IMAGE SLIDER AREA END -->
                    <div class="box_show_villa">
                        <h4 class="title-2">آدرس ملک</h4>
                        <label class="w-100 text-right mb-2"><span class="ltn__secondary-color"><i
                                        class="flaticon-pin"></i></span> <?php echo e($item->state?$item->state->name:''); ?><?php echo e($item->city?' , '.$item->city->name:''); ?><?php echo e($item->zone?' , '.$item->zone->name:''); ?>

                        </label>
                        <div class="form-group">
                            <div class="google-map" id="google-map-area" style="width:100%;height:250px"></div>
                        </div>
                    </div>

                    <div class="box_show_villa">
                        <h4 class="title-2">توضیحات ملک</h4>
                        <?php echo $item->body; ?>

                    </div>
                    <div class="box_show_villa">
                        <h4 class="title-2">جزئیات ملک</h4>
                        <div class="property-detail-info-list clearfix mb-20 ltn__blog-meta">
                        <ul class="ul_w50">
                            <li><label> <i class="flaticon-square-shape-design-interface-tool-symbol mr-2"></i>متراژ: </label> <span><?php echo e($item->area); ?> متر </span></li>
                            <li><label><i class="flaticon-bed mr-2"></i>خواب: </label> <span><?php echo e($item->room_num); ?></span></li>
                            <li><label><i class="flaticon-clean mr-2"></i>سرویس بهداشتی: </label> <span><?php echo e($item->number_of_wc); ?></span></li>
                            <li><label><i class="fas fa-sort-amount-up mr-2"></i>سن بنا: </label> <span><?php echo e($item->built_year); ?></span></li>
                            <li><label><i class="fas fa-chair mr-2"></i>فرنیش: </label> <span><?php echo e($item->furniture==1?'دارد':'ندارد'); ?></span></li>
                        </ul>
                        <ul class="ul_w50">
                            <li><label><i class="iconify mr-2" data-icon="ic-round-balcony" data-inline="false"></i>بالکن/تراس: </label> <span><?php echo e($item->b_or_t==1?'دارد':'ندارد'); ?></span></li>
                            <li><label><i class="fas fa-utensils mr-2"></i>آشپزخانه: </label> <span><?php echo e($item->kitchen==1?'بسته':'اوپن'); ?></span></li>
                            <li><label><i class="iconify mr-2" data-icon="mdi:home-floor-g" data-inline="false"></i>طبقه: </label> <span><?php echo e($item->floor?$item->floor:'__'); ?></span></li>
                            <li><label><i class="fas fa-hotel mr-2"></i>نوع ملک: </label> <span><?php echo e($item->types(true,$item->type_info)); ?></span></li>
                            <li><label><i class="far fa-image mr-2"></i>منظره: </label> <span><?php echo e($item->villa_view_s($item->villa_view)); ?></span></li>
                        </ul>
                    </div>
                    </div>

                    <div class="box_show_villa">
                    <h4 class="title-2 mb-10">امکانات داخلی</h4>
                    <div class="property-details-amenities mb-60">
                        <div class="row">
                            <?php $__currentLoopData = $pro_in->chunk(count($pro_in)/3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro_ins): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-4 col-md-6">
                                    <div class="ltn__menu-widget">
                                        <ul>
                                            <?php $__currentLoopData = $pro_ins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro_i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <label class="checkbox-item <?php echo e($item->check_pro($pro_i->id,$item->properties_in)?'active_l':'close_l'); ?>"><?php echo e($pro_i->name); ?>

                                                        <?php if($item->check_pro($pro_i->id,$item->properties_in)): ?>
                                                            <i class="fas fa-check-circle fa-lg"></i>
                                                        <?php else: ?>
                                                            <i class="fas fa-times-circle fa-lg"></i>
                                                        <?php endif; ?>
                                                    </label>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </ul>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    </div>


                    <div class="box_show_villa">
                    <h4 class="title-2 mb-10">امکانات رفاهی</h4>
                    <div class="property-details-amenities mb-60">
                        <div class="row">
                            <?php $__currentLoopData = $pro_out->chunk(count($pro_out)/3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro_outs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-4 col-md-6">
                                    <div class="ltn__menu-widget">
                                        <ul>
                                            <?php $__currentLoopData = $pro_outs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro_o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <label class="checkbox-item <?php echo e($item->check_pro($pro_o->id,$item->properties_out)?'active_l':'close_l'); ?>"><?php echo e($pro_o->name); ?>

                                                        <?php if($item->check_pro($pro_o->id,$item->properties_out)): ?>
                                                            <i class="fas fa-check-circle fa-lg"></i>
                                                        <?php else: ?>
                                                            <i class="fas fa-times-circle fa-lg"></i>
                                                        <?php endif; ?>
                                                    </label>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </ul>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    </div>


                    <div class="box_show_villa">
                    <h4 class="title-2 mb-10">دسترسی ها</h4>
                    <div class="property-details-amenities mb-60">
                        <div class="row">
                            <?php $__currentLoopData = $pro_access->chunk(count($pro_access)/3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro_acces): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-4 col-md-6">
                                    <div class="ltn__menu-widget">
                                        <ul>
                                            <?php $__currentLoopData = $pro_acces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro_ac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <label class="checkbox-item <?php echo e($item->check_pro($pro_ac->id,$item->properties_access)?'active_l':'close_l'); ?>"><?php echo e($pro_ac->name); ?>

                                                        <?php if($item->check_pro($pro_ac->id,$item->properties_access)): ?>
                                                            <i class="fas fa-check-circle fa-lg"></i>
                                                        <?php else: ?>
                                                            <i class="fas fa-times-circle fa-lg"></i>
                                                        <?php endif; ?>
                                                    </label>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </ul>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    </div>


                        <div class="box_show_villa">
                        <h4 <?php echo e($check_video=false); ?> class="title-2">ویدئو</h4>
                        <div class="ltn__video-bg-img ltn__video-popup-height-500 bg-overlay-black-50 bg-image mb-60"
                             data-bg="<?php echo e(url('source/assets/user/pic/video.jpg')); ?>">
                            <a class="<?php echo e($check_video==true?'d-none':''); ?> ltn__video-icon-2 ltn__video-icon-2-border---"
                               <?php echo e($check_video=true); ?> href="<?php echo e(url('source/assets/user/video/index.mp4')); ?>" data-rel="lightcase:myVideo">
                                <i class="fa fa-play"></i>
                            </a>
                            <?php if($item->video): ?>
                                <a class="<?php echo e($check_video==true?'d-none':''); ?> ltn__video-icon-2 ltn__video-icon-2-border---"
                                   <?php echo e($check_video=true); ?> href="<?php echo e(url($item->video)); ?>" data-rel="lightcase:myVideo">
                                    <i class="fa fa-play"></i>
                                </a>
                            <?php endif; ?>
                            <?php if($item->link1): ?>
                                <a class="<?php echo e($check_video==true?'d-none':''); ?> ltn__video-icon-2 ltn__video-icon-2-border---"
                                   <?php echo e($check_video=true); ?> href="<?php echo e($item->link1); ?>" data-rel="lightcase:myVideo">
                                    <i class="fa fa-play"></i>
                                </a>
                            <?php endif; ?>
                            <?php if($item->link2): ?>
                                <a class="<?php echo e($check_video==true?'d-none':''); ?> ltn__video-icon-2 ltn__video-icon-2-border---"
                                   <?php echo e($check_video=true); ?> href="<?php echo e($item->link2); ?>" data-rel="lightcase:myVideo">
                                    <i class="fa fa-play"></i>
                                </a>
                            <?php endif; ?>
                            <?php if($item->link3): ?>
                                <a class="<?php echo e($check_video==true?'d-none':''); ?> ltn__video-icon-2 ltn__video-icon-2-border---"
                                   <?php echo e($check_video=true); ?> href="<?php echo e($item->link3); ?>" data-rel="lightcase:myVideo">
                                    <i class="fa fa-play"></i>
                                </a>
                            <?php endif; ?>
                            <?php if($item->link4): ?>
                                <a class="<?php echo e($check_video==true?'d-none':''); ?> ltn__video-icon-2 ltn__video-icon-2-border---"
                                   <?php echo e($check_video=true); ?> href="<?php echo e($item->link4); ?>" data-rel="lightcase:myVideo">
                                    <i class="fa fa-play"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                        </div>

                </div>
            </div>
            <div class="col-lg-4 mt-0">
                <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar---">
                    <!-- Popular Product Widget -->
                    <div class="widget ltn__popular-product-widget">
                        <h4 class="ltn__widget-title ltn__widget-title-border-2"> اطلاعات ملک</h4>
                        <div class="row ltn__popular-product-widget-active slick-arrow-1">
                                <div class="ltn__blog-meta d-flex mb-0">
                                    <ul>
                                        <li class="ltn__blog-date">
                                            <i class="fas fa-money-bill-wave"></i><label class="w-50 mb-0">قیمت به لیر:</label><?php echo e(number_format($item->price)); ?>

                                        </li>
                                        <li class="ltn__blog-date">
                                            <i class="fas fa-money-bill-wave"></i><label class="w-50 mb-0">قیمت به دلار:</label><?php echo e(number_format($item->convertPrice($item->price,'dollar'))); ?>

                                        </li>
                                        <li class="ltn__blog-date">
                                            <i class="fas fa-money-bill-wave"></i><label class="w-50 mb-0">قیمت به تومان:</label><?php echo e(number_format($item->convertPrice($item->price,'toman'))); ?>

                                        </li>
                                        <li class="ltn__blog-date">
                                            <i class="far fa-calendar-alt"></i> <label class="w-50 mb-0">تاریخ ثبت:</label><?php echo e(my_jdate($item->created_at,'Y/m/d')); ?>

                                        </li>
                                        <li class="ltn__blog-date">
                                            <i class="fas fa-network-wired"></i><label class="w-50 mb-0">دسته ملک:</label><?php echo e($item->types_villa(true,$item->type_villa)); ?>

                                        </li>
                                        <li class="ltn__blog-date">
                                            <i class="fas fa-hand-holding-usd"></i> <label class="w-50 mb-0">فروش ملک:</label> <?php echo e($item->type_sale); ?>

                                        </li>
                                        <?php if($item->category): ?>
                                            <li class="ltn__blog-date">
                                                <i class="far fa-building"></i><label class="w-50 mb-0">پروژه:</label> <?php echo e($item->category->name); ?>

                                            </li>
                                        <?php endif; ?>
                                        <?php if($item->sale_status=='active'): ?>
                                            <li class="ltn__blog-date">
                                                <i class="fas fa-dollar-sign"></i><label class="w-50 mb-0">وضعیت فروش:</label> فروخته شد
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                        <!--  -->
                        </div>
                    </div>
                <?php if(count($items)): ?>
                    <!-- Popular Product Widget -->
                    <div class="widget ltn__popular-product-widget">
                        <h4 class="ltn__widget-title ltn__widget-title-border-2">ملک های پیشنهادی</h4>
                        <div class="row ltn__popular-product-widget-active slick-arrow-1">
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $villa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <!-- ltn__product-item -->
                                <div class="col-lg-12 px-3">
                                    <?php echo $__env->make('user.includes.villaCard',['villa'=>$villa], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!--  -->
                        </div>
                    </div>
                    <!-- Popular Post Widget -->
                <?php endif; ?>
                    <div class="widget ltn__popular-post-widget">
                        <h4 class="ltn__widget-title ltn__widget-title-border-2">آخرین پروژه ها</h4>
                        <ul>
                            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <div class="popular-post-widget-item clearfix">
                                        <div class="popular-post-widget-img">
                                            <a href="<?php echo e(route('user.project.show',$project->id)); ?>">
                                                <?php if(count($project->photos)>0): ?>
                                                    <img src="<?php echo e(url($project->photos[0]->path)); ?>"
                                                         alt="<?php echo e($project->name); ?>">
                                                <?php else: ?>
                                                    <img src="<?php echo e($project->pic!=null?url($project->pic):url('source/assets/user/rtl/img/product-3/1.jpg')); ?>"
                                                         alt="<?php echo e($project->name); ?>">
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                        <div class="popular-post-widget-brief">
                                            <h6>
                                                <a href="<?php echo e(route('user.villas.search',[$project->id,'room_num'=>['all'],'type_info'=>'all','city_id'=>'all'])); ?>">
                                                    <?php echo e($project->name); ?>

                                                </a>
                                            </h6>
                                            <h6>
                                                <a href="<?php echo e(route('user.villas.search',[$project->id,'room_num'=>['all'],'type_info'=>'all','city_id'=>'all'])); ?>">
                                                    شروع قیمت از : <?php echo e(number_format($project->price)); ?> لیر
                                                </a>
                                            </h6>
                                            <div class="ltn__blog-meta">
                                                <ul>
                                                    <li class="ltn__blog-date">
                                                        <a href="<?php echo e(route('user.villas.search',[$project->id,'room_num'=>['all'],'type_info'=>'all','city_id'=>'all'])); ?>"><i
                                                                    class="far fa-calendar-alt"></i><?php echo e(my_jdate($project->created_at,'Y/m/d')); ?>

                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <!-- Top Rated Product Widget -->
                    <div class="widget ltn__top-rated-product-widget">
                        <h4 class="ltn__widget-title ltn__widget-title-border-2">آخرین نوشته ها</h4>
                        <ul>
                            <?php $__currentLoopData = $blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blogs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <div class="top-rated-product-item clearfix">
                                        <div class="top-rated-product-img">
                                            <a href="<?php echo e(route('user.blog.show',$blogs->id)); ?>"><img
                                                        src="<?php echo e($blogs->photo?url($blogs->photo):url('source/assets/user/rtl/img/product/1.png')); ?>"
                                                        alt="#"></a>
                                        </div>
                                        <div class="top-rated-product-info">
                                            <h6><a href="<?php echo e(route('user.blog.show',$blogs->id)); ?>"><?php echo e($blogs->title); ?> </a>
                                            </h6>
                                            <div class="product-price">
                                                <span><i class="far fa-eye"></i> <?php echo e($blogs->seen); ?> </span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
<!-- SHOP DETAILS AREA END -->


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script_js'); ?>
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxfZQk73sogROY9KKRmtPIsLSFSjX7o7w&libraries=places&callback=initialize"></script>
    <script>

        var lat = "<?php echo e((float)$item->latitude); ?>";
        var lng = "<?php echo e((float)$item->longitude); ?>";

        function initialize() {
            var latlng = new google.maps.LatLng(lat, lng);
            var options = {
                zoom: 7,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                draggable: true,
                zoomControl: true,
                mapTypeControl: false,
                streetViewControl: false,
                scrollwheel: true
            };

            var autocomplete = new google.maps.places.Autocomplete($("#address")[0], {});


            var map = new google.maps.Map(document.getElementById("google-map-area"), options);

            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var place = autocomplete.getPlace();
                var lat = place.geometry.location.lat();
                var lng = place.geometry.location.lng();
                var formatted_address = place.formatted_address;
                latlng = new google.maps.LatLng(lat, lng);
                placeMarker(map, latlng);
            });


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
                document.getElementById("latitude").value = location.lat();
                document.getElementById("longitude").value = location.lng();
            }

            placeMarker(map, latlng);
            google.maps.event.addDomListener(window, 'load', initialize);
            google.maps.event.addListener(map, 'click', function (event) {
                placeMarker(map, event.latLng);
            });

            $('#map').on('shown.bs.modal', function () {
                google.maps.event.trigger(map, "resize");
            });
        }

        // Open the Modal
        function openModal(id) {
            document.getElementById("myModal" + id).style.display = "block";
        }

        // Close the Modal
        function closeModal(id) {
            document.getElementById("myModal" + id).style.display = "none";
        }

        var slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(id, n) {
            showSlides(id, slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(id, n) {
            showSlides(id, slideIndex = n);
        }

        function showSlides(id, n) {
            var i;
            var slides = document.getElementsByClassName("mySlides" + id);
            var dots = document.getElementsByClassName("demo");
            // var captionText = document.getElementById("caption"+id);
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            // captionText.innerHTML = dots[slideIndex-1].alt;
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>