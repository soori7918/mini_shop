<?php $__env->startComponent('layouts.front'); ?>
    <?php $__env->slot('title'); ?> <?php if($location->title): ?> <?php echo e($location->title); ?> <?php endif; ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('dir'); ?> dir="rtl" <?php $__env->endSlot(); ?>
    <?php $__env->slot('meta'); ?>
        <?php if($location->meta_keywords): ?>
            <meta http-equiv="keywords" name="keywords" content="<?php echo e($location->meta_keywords); ?>"/>
        <?php endif; ?>
        <?php if($location->meta_description): ?>
            <meta http-equiv="description" name="description" content="<?php echo e($location->meta_description); ?>"/>
        <?php endif; ?>

        <meta property="og:title" content="<?php echo e($location->title); ?>"/>
        <meta property="og:type" content="Villa"/>
        <meta property="og:url" content="<?php echo e(route('front-location-show',$location->url)); ?>"/>
        <meta property="og:image" content="<?php echo e(url($location->slider)); ?>"/>
        <meta property="og:site_name" content="<?php echo e($setting->title); ?>"/>
        <meta property="og:locale" content="fa_ir"/>
        <?php if($location->meta_description): ?>
            <meta property="og:description" content="<?php echo e($location->meta_description); ?>"/>
        <?php endif; ?>
    <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <style>
            @media (max-width: 576px){
                .input-group {
                    width: 347px;
                }
                .goshi-nis{
                    display: none;
                }
                button.slick-prev.slick-arrow {
                    margin-top: 115px;
                    margin-left: -40px;
                }
                button.slick-next.slick-arrow {
                    margin-top: 115px;
                    margin-right: -40px;
                }
                .newslater form a{
                    left: 4.9rem;
                }
            }
            @media (min-width: 576px){
                .col {
                    -ms-flex: 0 0 50%;
                    flex: 0 0 50%;
                    max-width: 50%;
                }
            }
            .jGrowl-message {
                color: white !important;
            }

            .footer:before {
                background-color: #f8f8f8;
            }
            .active-fillter{
                background-color: #d0cece;
            }

            label {
                font-weight: bold !important;
            }

            .header-title h4 {
                color: #fff;
            }

            .title h6 {
                margin-bottom: 0;
            }

            .location > div:nth-child(3) {
                height: 207.52px;
            }

            .location > div:nth-child(3) img {
                height: 200px;
            }

            .location > div:nth-child(3) a h5 {
                top: 35%;
            }

            .multimedia-box .like-icon {
                position: absolute;
                z-index: 99;
                right: 1rem;
                width: 3rem;
                height: 3rem;
                margin-top: 1rem;
                background-color: #fff;
                color: #E91E63;
                font-size: 1.5rem;
                border-radius: 50%;
                text-align: center;
                line-height: 2.6;
                transition: all .3s ease-in-out;
            }

            .bootstrap-select.btn-group.show-tick .dropdown-menu li a span.text {
                margin-right: 5px;
            }

            .col-5 {
                margin-top: 5px;
            }

            .mb-4 {
                margin-top: 5px;
            }

            .ui-widget.ui-widget-content {
                border-top: 0 !important;
            }

            .header-title h1 {
                color: white;
                font-weight: bold;
                text-shadow: 0px 0px 10px rgb(0, 0, 0);
            }

            h2 {
                font-size: 20px;
            }

            .sub-header .header-title h3 {
                font-size: 17px;
                margin-top: 1rem;
                font-weight: bold;
                text-shadow: 0px 0px 10px black;
                color: white;
            }

            h3 {
                font-size: 18px;
            }

            @media (max-width: 800px) {
                #google-map-area {
                    display: none !important;
                }

                .display-in-mobile {
                    display: none !important;
                }
            }

        </style>
        <header class="sub-header"
                style="<?php if(!is_null($location->slider)): ?>background:url(<?php echo e(url($location->slider)); ?>) center no-repeat;background-size:cover;<?php endif; ?>">
            <div class="container">
                <div class="sub-logo">
                    <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('img/logo.svg')); ?>"
                                                  alt="&#1608;&#1740;&#1604;&#1705;&#1587;&#1585;"></a>
                </div>
                <div class="header-title">
                    <h1 style="font-size: 32px">&#1575;&#1580;&#1575;&#1585;&#1607; &#1608;&#1740;&#1604;&#1575;
                        &#1583;&#1585; <?php echo e($location->name); ?></h1>
                    <h3 style="font-size: 17px;"><?php echo e($location->slogan); ?></h3>
                </div>
            </div>
        </header>
        <section class="section pb-0">
            <div class="container">
                <?php echo html_entity_decode($location->body); ?>

            </div>
        </section>



        
        <!-- Begin Change -->

        <section class="filter section">
            <div class="container">
                <div class="title">
                    <h3 class="m-0">&#1580;&#1587;&#1578;&#1580;&#1608;&#1740; &#1608;&#1740;&#1604;&#1575; &#1583;&#1585; <?php echo e($location->name); ?></h3>
                </div>
                <span class="line-dot float-right w-100"></span>
                <ul class="sort float-right">
                    <li class="<?php if(isset($search)): ?> <?php if($search == "price-desc"): ?> active-fillter <?php endif; ?> <?php endif; ?>">
                        <form action="<?php echo e(route('front-location-sort')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($location->id); ?>">
                            <input type="hidden" name="sort" value="price-desc">
                            <a  href="javascript:void(0)" onclick="$(this).parent('form').submit()"><i
                                        class="fa fa-sort-amount-desc ml-2"></i>&#1711;&#1585;&#1575;&#1606;&#1578;&#1585;&#1740;&#1606;</a>
                        </form>
                    </li>
                    <li class="<?php if(isset($search)): ?> <?php if($search == "price-asc"): ?> active-fillter <?php endif; ?> <?php endif; ?>">
                        <form action="<?php echo e(route('front-location-sort')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($location->id); ?>">
                            <input type="hidden" name="sort" value="price-asc">
                            <a href="javascript:void(0)" onclick="$(this).parent('form').submit()"><i
                                        class="fa fa-sort-amount-asc ml-2"></i>&#1575;&#1585;&#1586;&#1575;&#1606;&#1578;&#1585;&#1740;&#1606;</a>
                        </form>
                    </li>
                    <li class="<?php if(isset($search)): ?> <?php if($search == "view"): ?> active-fillter <?php endif; ?> <?php endif; ?>">
                        <form action="<?php echo e(route('front-location-sort')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($location->id); ?>">
                            <input type="hidden" name="sort" value="view">
                            <a href="javascript:void(0)" onclick="$(this).parent('form').submit()"><i
                                        class="fa fa-eye ml-2"></i>&#1662;&#1585; &#1576;&#1575;&#1586;&#1583;&#1740;&#1583;&#1578;&#1585;&#1740;&#1606;</a>
                        </form>
                    </li>
                    <?php if(Route::currentRouteName() != 'front-location-show'): ?>
                        <li class="sort-remove">
                            <a href="<?php echo e(route('front-location-show', $location->url)); ?>"><i
                                        class="fa fa-remove ml-2"></i></a>
                        </li>
                    <?php endif; ?>
                </ul>
                <a href="javascript:void(0)" style="background-color: #eb0c57;border-radius: 0px;font-size: 14px;margin-left:15px;"
                   class="filter-btn btn btn-success float-left"><i
                            class="fa fa-filter ml-2"></i>&#1601;&#1740;&#1604;&#1578;&#1585; &#1607;&#1575;</a>
            </div>
        </section>



        <section id="filter-list" class="filter section bg-white"
                 style="border-top:0">
            <form action="<?php echo e(route('front-location-filter',$id)); ?>" method="post" id="frm-filter">
                <div class="container">
                    <div id="filters" class="row">
                        <div class="col-md-8">
                            <div class="row">

                                <?php if(isset($search)): ?>

                                    <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($property->status == 'yes'): ?>
                                            <div class="col-md-3 mb-4">
                                                <div class="checkbox">
                                                    <input type="checkbox"
                                                           <?php if(isset($search['pro'])): ?> <?php if(in_array($property->id , $search['pro'])): ?> checked
                                                           <?php endif; ?> <?php endif; ?> id="property-<?php echo e($property->id); ?>"
                                                           class="property"
                                                           value="<?php echo e($property->id); ?>" name="pro[]">
                                                    <label for="property-<?php echo e($property->id); ?>"><img
                                                                src="<?php echo e(url($property->photo->path)); ?>" width="16"
                                                                height="16"
                                                                alt="<?php echo e($property->name); ?>"
                                                                class="ml-2"><?php echo e($property->name); ?>

                                                    </label>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php else: ?>

                                    <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($property->status == 'yes'): ?>
                                            <div class="col-md-3 mb-4">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="property-<?php echo e($property->id); ?>"
                                                           class="property"
                                                           value="<?php echo e($property->id); ?>" name="pro[]">
                                                    <label for="property-<?php echo e($property->id); ?>"><img
                                                                src="<?php echo e(url($property->photo->path)); ?>" width="16"
                                                                height="16"
                                                                alt="<?php echo e($property->name); ?>"
                                                                class="ml-2"><?php echo e($property->name); ?>

                                                    </label>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                            </div>
        
                        </div>
                        <input type="hidden" value="<?php echo e($minPrice); ?>" name="from_price" class="min-price">
                        <input type="hidden" value="<?php echo e($maxPrice); ?>" name="until_price" class="max-price">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-group row">
                                    <?php if(isset($search['villa_place'])): ?>
                                        <?php
                                            $place = $search['villa_place'];
                                        ?>
                                    <?php else: ?>
                                        <?php
                                            $place = [];
                                        ?>
                                    <?php endif; ?>
                                    <?php echo e(Form::label('villa_place', '&#1605;&#1608;&#1602;&#1593;&#1740;&#1578; &#1608;&#1740;&#1604;&#1575;', array('class' => 'col-5'))); ?>

                                    <?php echo e(Form::select('villa_place[]', array('exclusive_beach' => '&#1587;&#1575;&#1581;&#1604; &#1575;&#1582;&#1578;&#1589;&#1575;&#1589;&#1740;', 'sea_view' => '&#1583;&#1740;&#1583; &#1576;&#1607; &#1583;&#1585;&#1740;&#1575;', 'beach' => '&#1705;&#1606;&#1575;&#1585; &#1583;&#1585;&#1740;&#1575;', 'see_the_forest' => '&#1583;&#1740;&#1583; &#1576;&#1607; &#1580;&#1606;&#1711;&#1604;' , 'in_city' => 'داخل شهر') , $place , array('id' => 'villa_place', 'class' => 'form-control selectpicker col-7','multiple'))); ?>

                                </div>
                            </div>


                            <div class="form-group">
                                <div class="form-group row">
                                    <?php echo e(Form::label('district', '&#1605;&#1581;&#1604; &#1608;&#1740;&#1604;&#1575;', array('class' => 'col-5'))); ?>

                                    <select name="district[]" id="district" class="form-control selectpicker col-7"
                                            multiple>
                                        <?php
                                            $districts = unserialize($location->districts);
                                        ?>
                                        <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if(isset($search['district'])): ?> <?php if(in_array($district , $search['district'])): ?> selected
                                                    <?php endif; ?> <?php endif; ?> value="<?php echo e($district); ?>"><?php echo e($district); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="form-group row">
                                    <?php echo e(Form::label('room', '&#1578;&#1593;&#1583;&#1575;&#1583; &#1575;&#1578;&#1575;&#1602;', array('class' => 'col-5'))); ?>

                                    <select name="room[]" id="room" class="form-control selectpicker col-7" multiple>
                                        <?php
                                            $rooms = [];
                                        foreach ($villas as $villa){
                                            if (!in_array($villa->number_of_rooms , $rooms)){
                                                array_push($rooms , $villa->number_of_rooms);
                                            }
                                        }
                                        sort($rooms);
                                        ?>
                                        <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if(isset($search['room'])): ?> <?php if(in_array($room , $search['room'])): ?> selected
                                                    <?php endif; ?> <?php endif; ?> value="<?php echo e($room); ?>"><?php echo e($room); ?>

                                                &#1575;&#1578;&#1575;&#1602;
                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                
                                <?php echo e(Form::label('enter-date', 'تاریخ ورود', array('class' => 'col-3','style'=>'margin-top:10px;font-size:12px;'))); ?>

                                <input type="text" autocomplete="off" readonly="true" name="fromdate" id="fromdate" class="form-control col-3" value="<?php echo e(isset($search['fromdate'])? $search['fromdate']:''); ?>" style="z-index:100;background-color:white;padding-right:3px;padding-left:0px;">
                                <?php echo e(Form::label('out-date', 'تاریخ خروج', array('class' => 'col-3','style'=>'margin-top:10px;font-size:12px;'))); ?>

                                <input type="text" autocomplete="off" readonly="true" name="todate" id="todate" class="form-control col-3" value="<?php echo e(isset($search['todate'])? $search['todate']:''); ?>" style="z-index:100;background-color:white;padding-right:3px;padding-left:0px;">
                                <input type="hidden" id="startfromdate" value="0">
                                <input type="hidden" id="starttodate" value="0">
                                
                                <div class="msg-error black" id="toDateError" style="margin-right:275px;margin-top:15px;">&nbsp;</div>                                
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 mb-4">
                                    <link rel="stylesheet"
                                          href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

                                    <span>
                                        <label for="amount">&#1602;&#1740;&#1605;&#1578; &#1575;&#1586; : </label>
                                        <input type="text" id="amount" readonly
                                               style="border:0; color:#bfbfbf; font-weight:bold;">
                                    </span>

                                    <div style="box-shadow: 0px 0px 0px !important;width:98%;" id="slider-range"></div>
                                </div>
                            </div>
                        </div>

                        <div style="overflow: hidden;width: 97%">

                             <button style="padding: 12px" type="submit" class="btn btn-info float-left btn-filter">&#1575;&#1593;&#1605;&#1575;&#1604;
                            &#1601;&#1740;&#1604;&#1578;&#1585;
                        </button>


                        <a href="<?php echo e(route('front-location-show', $location->url)); ?>" style="background-color: transparent;
    border-radius: 0px;
    color: black;
    padding:10px;
    border: 1px solid;"
                           class="btn btn-danger ml-2 float-left">&#1581;&#1584;&#1601;
                            &#1601;&#1740;&#1604;&#1578;&#1585;</a>
                       
                    </div>
                    </div>
                </div>
                <?php echo e(csrf_field()); ?>

            </form>
        </section>
       <!-- end Change -->




        <section class="villas section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 display-in-mobile" style="height: 760px;">
                        <div class="google-map" id="google-map-area" style="width:100%;height:83%">

                        </div>
                    </div>
                    <div class="col-md-8" style="height: 630px; overflow-y: scroll;">
                        <span class="loading" style="display:none">&#1583;&#1585; &#1581;&#1575;&#1604; &#1576;&#1575;&#1585;&#1711;&#1584;&#1575;&#1585;&#1740;...</span>


                        <?php if(count($villas) > 0): ?>
                            <?php
                                $id = 1;
                            ?>
                            <div class="row vilas">
                                <?php $__currentLoopData = $villas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $villa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $properties_in = unserialize($villa->properties_in);
                                        $properties_out = unserialize($villa->properties_out);
                                        if ($villa->villa_place != 'N;'){
                                        $villa_place = unserialize($villa->villa_place);
                                        }else{
                                        $villa_place = [];
                                        }
                                    ?>
                                    <div data-latitude="<?php echo e(number_format((float)$villa->latitude, 5, '.', '')); ?>"
                                         data-longitude="<?php echo e(number_format((float)$villa->longitude, 5, '.', '')); ?>"
                                         id="<?php echo e($id); ?>"
                                         class="col-md-6 mt-3 filter-box district-<?php echo e($villa->district); ?> room-<?php echo e($villa->number_of_rooms); ?> <?php $__currentLoopData = $villa_place; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($prp); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php $__currentLoopData = $properties_in; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if(isset(property($prp)->status)): ?> <?php if(property($prp)->status == 'yes'): ?> property-<?php echo e(property($prp)->id); ?> <?php endif; ?> <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php $__currentLoopData = $properties_out; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  <?php if(isset(property($prp)->status)): ?>  <?php if(property($prp)->status == 'yes'): ?> property-<?php echo e(property($prp)->id); ?> <?php endif; ?> <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php if(count($villas) == $id): ?> last-box <?php endif; ?>">
                                        <div class="item">
                                            <a target="_blank" href="<?php echo e(route('front-villa-show', $villa->slug)); ?>"
                                               class="multimedia-box">
                        <span class="image">
                        <?php if($villa->gallery): ?>
                                <img src="<?php if(isset($villa->gallery->photo[0]->path)): ?> <?php echo e(url($villa->gallery->photo[0]->path)); ?> <?php else: ?> http://tournab.com/lib/assets//img/deafult.jpg <?php endif; ?>"
                                     height="204"
                                     alt="<?php echo e($villa->name); ?>"/>
                            <?php elseif($villa->photo): ?>
                                <img src="<?php echo e(url($villa->photo->path)); ?>" height="204" alt="<?php echo e($villa->name); ?>"/>
                            <?php else: ?>
                                <img src="http://via.placeholder.com/350x150&text=None" alt="<?php echo e($villa->name); ?>">
                            <?php endif; ?>
                            <?php if($villa->discount): ?>
                                <span class="discount"><?php echo e(percent($villa->price, $villa->discount)); ?></span>
                            <?php endif; ?>
                            <?php if(Auth::user()): ?>
                                <?php
                                    $like = App\Like::where('likable_type' , 'App\Villa')->where('likable_id' , $villa->id)->where('user_id' , Auth::user()->id)->first();
                                ?>
                            <?php else: ?>
                                <?php
                                    $like = null
                                ?>
                            <?php endif; ?>
                            <span class="like-icon <?php if(!is_null($like)): ?> active <?php endif; ?>"
                                  <?php if(auth()->guard()->check()): ?> data-id="<?php echo e($villa->id); ?>" <?php endif; ?>><i
                                        class="nc-icon ui-2_favourite-28"></i></span>
                        </span>
                                                <span class="details" style="min-height: 200px;">
                        <ul class="name">
                        <li><strong class="ml-2">&#1606;&#1575;&#1605; &#1608;&#1740;&#1604;&#1575; :</strong><?php echo e($villa->name); ?></li>
                        <li style="font-size: 11px"><strong class="ml-2">&#1605;&#1581;&#1604; &#1608;&#1740;&#1604;&#1575; :</strong><?php echo e($villa->district); ?></li>
                        </ul>
                        <ul style="display: flex" class="icons">
                        <li style="width: 40%" data-toggle="tooltip"
                            title="&#1578;&#1593;&#1583;&#1575;&#1583; &#1575;&#1578;&#1575;&#1602; <?php echo e($villa->number_of_rooms); ?>">
                        <img src="<?php echo e(asset('img/villas/bedroom.svg')); ?>" width="16" height="16"
                             alt="&#1578;&#1593;&#1583;&#1575;&#1583; &#1575;&#1578;&#1575;&#1602; <?php echo e($villa->number_of_rooms); ?>">
                        <p><?php echo e($villa->number_of_rooms); ?> &#1575;&#1578;&#1575;&#1602;</p>
                        </li>
                            <?php if($villa->number_of_servants > 0): ?>
                                <li style="width: 40%" data-toggle="tooltip"
                                    title="&#1578;&#1593;&#1583;&#1575;&#1583; &#1582;&#1583;&#1605;&#1578;&#1705;&#1575;&#1585; <?php echo e($villa->number_of_servants); ?>">
                        <img src="<?php echo e(asset('img/villas/maid.svg')); ?>" width="16" height="16"
                             alt="&#1578;&#1593;&#1583;&#1575;&#1583; &#1582;&#1583;&#1605;&#1578;&#1705;&#1575;&#1585; <?php echo e($villa->number_of_servants); ?>">
                        <p><?php echo e($villa->number_of_servants); ?> &#1582;&#1583;&#1605;&#1578;&#1705;&#1575;&#1585;</p>
                        </li>
                            <?php endif; ?>
                            <?php $__currentLoopData = $properties_in; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(isset(property($property)->name)): ?>
                                    <?php if(isset(property($property)->photo->path)): ?>
                                        <?php if(property($property)->status == 'yes'): ?>
                                            <li style="width: 40%" data-toggle="tooltip"
                                                title="<?php echo e(property($property)->name); ?>">
                        <img src="<?php echo e(url(property($property)->photo->path)); ?>" width="16" height="16"
                             alt="<?php echo e(property($property)->name); ?>">
                        <p><?php echo e(property($property)->name); ?></p>
                        </li>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $properties_out; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(isset(property($property)->name)): ?>
                                    <?php if(isset(property($property)->photo->path)): ?>


                                        <?php if(property($property)->status == 'yes'): ?>
                                            <li style="width: 40%" data-toggle="tooltip"
                                                title="<?php echo e(property($property)->name); ?>">
                        <img src="<?php echo e(url(property($property)->photo->path)); ?>" width="16" height="16"
                             alt="<?php echo e(property($property)->name); ?>">
                        <p><?php echo e(property($property)->name); ?></p>
                        </li>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </ul>

                        <button class="btn btn-info float-left" style="margin-top: 8px;"><i
                                    class="fa fa-angle-right ml-2"></i>&#1605;&#1588;&#1575;&#1607;&#1583;&#1607;</button>
                                                    <?php if($villa->discount): ?>
                                                        <strike><span class="discount-price">
                        &#1602;&#1740;&#1605;&#1578; &#1575;&#1586;
                        <span class="text-danger-300 m-x2"><span
                                    class="numberPrice"> <?php echo e($villa->price); ?> </span> <?php if($villa->price_type == 'rial'): ?>
                                &#1585;&#1740;&#1575;&#1604;
                            <?php elseif($villa->price_type == 'dollar'): ?>

                                &#1583;&#1604;&#1575;&#1585;
                            <?php elseif($villa->price_type == 'euro'): ?>
                                &#1740;&#1608;&#1585;
                                &#1608; <?php endif; ?></span>
                                                                برای هر نفر / هر شب
                        </span></strike><br>

                                                        <span class="discount-price">
                        &#1602;&#1740;&#1605;&#1578; &#1575;&#1586;
                        <span class="text-success-300 m-x2"><?php echo e(discount($villa->price, $villa->discount)); ?> <?php if($villa->price_type == 'rial'): ?>
                                &#1585;&#1740;&#1575;&#1604; <?php elseif($villa->price_type == 'dollar'): ?>
                                &#1583;&#1604;&#1575;&#1585; <?php elseif($villa->price_type == 'euro'): ?> &#1740;&#1608;&#1585;
                                &#1608; <?php endif; ?></span>
                                                                برای هر نفر / هر شب
                        </span>
                                                    <?php else: ?>
                                                        <span class="discount-price">
                        &#1602;&#1740;&#1605;&#1578; &#1575;&#1586;
                        <span class="text-success-300 m-x2"><span
                                    class="numberPrice"> <?php echo e($villa->price); ?> </span> <?php if($villa->price_type == 'rial'): ?>
                                &#1585;&#1740;&#1575;&#1604; <?php elseif($villa->price_type == 'dollar'): ?>
                                &#1583;&#1604;&#1575;&#1585; <?php elseif($villa->price_type == 'euro'): ?> &#1740;&#1608;&#1585;
                                &#1608; <?php endif; ?></span>
                                                                برای هر نفر / هر شب
                        </span>
                                                    <?php endif; ?>
                        </span>
                                            </a>
                                        </div>
                                    </div>

                                    <?php
                                        $id++
                                    ?>


                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>


                        <?php endif; ?>


                        
                        
                        
                    </div>
                </div>

                <div class="location-details marg--6" style="margin-bottom: -1rem;background-color: black">
                    <div class="row">
                        <div class="col-md-10"><p class="text-justify">&#1605;&#1575; &#1580;&#1586;&#1574;&#1740;&#1575;&#1578;
                                &#1607;&#1585; &#1608;&#1740;&#1604;&#1575;&#1740;&#1740; &#1705;&#1607; &#1583;&#1585;
                                &#1608;&#1576; &#1587;&#1575;&#1740;&#1578; &#1605;&#1575; &#1608; &#1583;&#1585;
                                &#1588;&#1607;&#1585;&#1607;&#1575;&#1740; &#1578;&#1608;&#1585;&#1740;&#1587;&#1578;&#1740;
                                &#1608;&#1740;&#1604;&#1705;&#1587;&#1585; &#1607;&#1587;&#1578; &#1608; &#1582;&#1583;&#1605;&#1575;&#1578;&#1740;
                                &#1705;&#1607; &#1575;&#1585;&#1575;&#1574;&#1607; &#1605;&#1740; &#1583;&#1607;&#1606;&#1583;
                                &#1585;&#1575; &#1576;&#1607; &#1583;&#1602;&#1578; &#1576;&#1585;&#1585;&#1587;&#1740;
                                &#1605;&#1740; &#1705;&#1606;&#1740;&#1605; &#1578;&#1575; &#1605;&#1591;&#1605;&#1574;&#1606;
                                &#1588;&#1608;&#1740;&#1605; &#1705;&#1607; &#1570;&#1606;&#1607;&#1575; &#1575;&#1587;&#1578;&#1575;&#1606;&#1583;&#1575;&#1585;&#1583;&#1607;&#1575;&#1740;
                                &#1587;&#1582;&#1578;&#1711;&#1740;&#1585;&#1575;&#1606;&#1607; &#1605;&#1575; &#1585;&#1575;
                                &#1576;&#1585;&#1570;&#1608;&#1585;&#1583;&#1607; &#1605;&#1740; &#1705;&#1606;&#1606;&#1583;.
                                &#1576;&#1575; &#1605;&#1575; &#1578;&#1605;&#1575;&#1587; &#1576;&#1711;&#1740;&#1585;&#1740;&#1583;
                                &#1608; &#1740;&#1705;&#1740;
                                &#1575;&#1586; &#1605;&#1578;&#1582;&#1589;&#1589;&#1575;&#1606; &#1608;&#1740;&#1604;&#1575;
                                &#1605;&#1575; &#1582;&#1608;&#1588;&#1581;&#1575;&#1604; &#1582;&#1608;&#1575;&#1607;&#1583;
                                &#1588;&#1583; &#1705;&#1607; &#1583;&#1585; &#1740;&#1575;&#1601;&#1578;&#1606; &#1608;&#1740;&#1604;&#1575;&#1740;
                                &#1593;&#1575;&#1604;&#1740; &#1576;&#1575; &#1578;&#1608;&#1580;&#1607; &#1576;&#1607;
                                &#1606;&#1740;&#1575;&#1586;&#1607;&#1575;&#1740; &#1588;&#1605;&#1575; &#1705;&#1605;&#1705;
                                &#1705;&#1606;&#1583;.</p></div>
                        <div class="col-md-2"><a
                                    style="background-color: #f8f8f8 !important;color: black;line-height: 2;"
                                    href="<?php echo e(route('front-contact')); ?>"
                                    class="btn btn-info float-left"><i class="fa fa-question-circle-o ml-2"></i>&#1575;&#1591;&#1604;&#1575;&#1593;&#1575;&#1578;
                                &#1576;&#1740;&#1588;&#1578;&#1585;</a></div>
                    </div>
                </div>

                <div class="float-right w-100">
                    <div class="row">
                        <div class="goshi-nis col-md-2 mt-5">
                            <?php if($location->gallery): ?>
                                <?php $__currentLoopData = $location->gallery->photo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="float-right w-100 mt-4">
                                        <img src="<?php echo e(url($photo->path)); ?>" alt="<?php echo e($location->name); ?>"/>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-10">
                            <?php if($location->descriptions != 'N;'): ?>
                                <?php
                                    $descriptions = unserialize($location->descriptions);
                                ?>
                                <div class="float-right w-100 my-5">
                                    <div class="description uk-grid-width-small-1-2 uk-grid-width-medium-1-2"
                                         data-uk-grid>
                                        <?php $__currentLoopData = $descriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $description): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($description['title'] == '&#1608;&#1740;&#1583;&#1574;&#1608;'): ?>
                                                <?php
                                                    $g_title = $description['title'];
                                                    $g_description = $description['description'];
                                                ?>
                                            <?php else: ?>
                                                <?php
                                                    $g_title = null;
                                                    $g_description = null;
                                                ?>
                                                <div class="uk-panel">
                                                    <div class="descriptions">
                                                        <h2 class="mb-3"><?php echo e($description['title']); ?></h2>
                                                        <?php echo $description['description']; ?>

                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            <?php else: ?>
                                <?php
                                    $g_title = null;
                                    $g_description = null;
                                ?>
                            <?php endif; ?>
                        </div>
                        <?php if($g_title != null): ?>
                            <div class="col-md-12 my-5">
                                <h2 class="mb-3">&#1601;&#1740;&#1604;&#1605; &#1587;&#1601;&#1585;
                                    &#1576;&#1607; <?php echo e($location->name); ?></h2>
                                <?php echo $g_description; ?>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="float-right w-100">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="title mt-5 text-right">
                                <h4 style="font-size: 18px">&#1606;&#1592;&#1585;&#1575;&#1578;</h4>
                            </div>
                            <span class="line-dot float-right w-100"></span>
                            <button class="btn btn-info btn-comment-toggle">&#1606;&#1592;&#1585; &#1582;&#1608;&#1583;
                                &#1585;&#1575; &#1579;&#1576;&#1578; &#1705;&#1606;&#1740;&#1583;
                            </button>
                            <div class="comment-send div-comment-toggle mt-2" style="display: none">
                                <h6 class="text-grey-400 mb-3"><i class="nc-icon ui-2_chat-round ml-2 mtp-1"></i>&#1575;&#1585;&#1587;&#1575;&#1604;
                                    &#1606;&#1592;&#1585;</h6>
                                <?php echo e(Form::open(array('route' => 'location-comment-store', 'method' => 'PUT', 'id' => 'form-validation'))); ?>

                                <?php echo e(Form::hidden('location_id', $location->id)); ?>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <div class="float-left" style="margin-top:-30px">
                                            <fieldset class="rating float-left">

                                                <input type="radio" id="star5" name="rank" value="5"/><label
                                                        class="full"
                                                        for="star5"
                                                        data-toggle="tooltip"
                                                        title="&#1593;&#1575;&#1604;&#1740; - 5 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>

                                                <input type="radio" id="star4half" name="rank" value="4.5"/><label
                                                        class="half"
                                                        for="star4half"
                                                        data-toggle="tooltip"
                                                        title="&#1582;&#1740;&#1604;&#1740; &#1582;&#1608;&#1576; - 4.5 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>

                                                <input type="radio" id="star4" name="rank" value="4"/><label
                                                        class="full"
                                                        for="star4"
                                                        data-toggle="tooltip"
                                                        title="&#1582;&#1740;&#1604;&#1740; &#1582;&#1608;&#1576; - 4 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>

                                                <input type="radio" id="star3half" name="rank" value="3.5"/><label
                                                        class="half"
                                                        for="star3half"
                                                        data-toggle="tooltip"
                                                        title="&#1582;&#1608;&#1576; - 3.5 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>

                                                <input type="radio" id="star3" name="rank" value="3"/><label
                                                        class="full"
                                                        for="star3"
                                                        data-toggle="tooltip"
                                                        title="&#1582;&#1608;&#1576; - 3 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>

                                                <input type="radio" id="star2half" name="rank" value="2.5"/><label
                                                        class="half"
                                                        for="star2half"
                                                        data-toggle="tooltip"
                                                        title="&#1605;&#1578;&#1608;&#1587;&#1591; - 2.5 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>

                                                <input type="radio" id="star2" name="rank" value="2"/><label
                                                        class="full"
                                                        for="star2"
                                                        data-toggle="tooltip"
                                                        title="&#1605;&#1578;&#1608;&#1587;&#1591; - 2 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>

                                                <input type="radio" id="star1half" name="rank" value="1.5"/><label
                                                        class="half"
                                                        for="star1half"
                                                        data-toggle="tooltip"
                                                        title="&#1576;&#1583; - 1.5 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>

                                                <input type="radio" id="star1" name="rank" value="1"/><label
                                                        class="full"
                                                        for="star1"
                                                        data-toggle="tooltip"
                                                        title="&#1576;&#1583; - 1 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>

                                                <input type="radio" id="starhalf" name="rank" value="0.5"/><label
                                                        class="half"
                                                        for="starhalf"
                                                        data-toggle="tooltip"
                                                        title="&#1582;&#1740;&#1604;&#1740; &#1576;&#1583; - 0.5 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                            </fieldset>
                                            <span class="float-left ml-2"> &#1575;&#1605;&#1578;&#1740;&#1575;&#1586; &#1576;&#1607; <?php echo e($location->name); ?></span>
                                        </div>
                                        <?php echo e(Form::textarea('body', '', array('placeholder' => '&#1605;&#1578;&#1606; &#1605;&#1608;&#1585;&#1583; &#1606;&#1592;&#1585; &#1585;&#1575; &#1608;&#1575;&#1585;&#1583; &#1705;&#1606;&#1740;&#1583;..', 'class' => 'form-control col'))); ?>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name"><i class="nc-icon users_single-02 ml-2 mtp-1"></i>&#1606;&#1575;&#1605;
                                            &#1588;&#1605;&#1575;</label>
                                        <?php if(auth()->guard()->check()): ?>
                                            <?php echo e(Form::text('name', Auth::user()->first_name .' '. Auth::user()->last_name, array('class' => 'form-control col', 'readonly'))); ?>

                                        <?php endif; ?>
                                        <?php if(auth()->guard()->guest()): ?>
                                            <?php echo e(Form::text('name', '', array('class' => 'form-control col'))); ?>

                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email"><i class="nc-icon ui-1_email-85 ml-2 mtp-1"></i>&#1575;&#1740;&#1605;&#1740;&#1604;
                                            &#1588;&#1605;&#1575;</label>
                                        <?php if(auth()->guard()->check()): ?>
                                            <?php echo e(Form::email('email', Auth::user()->email, array('class' => 'form-control col', 'required', 'readonly'))); ?>

                                        <?php endif; ?>
                                        <?php if(auth()->guard()->guest()): ?>
                                            <?php echo e(Form::email('email', '', array('class' => 'form-control col', 'required'))); ?>

                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="g-recaptcha"
                                             data-sitekey="6Lf7xE8UAAAAABkIxNqkox5E5QxoBvQVRltsbjJX"></div>
                                    </div>
                                </div>
                                <?php echo e(Form::button('<i class="fa fa-circle-o ml-1"></i>&#1575;&#1601;&#1586;&#1608;&#1583;&#1606;', array('type' => 'button', 'id' => 'submit-btn', 'class' => 'btn btn-rounded btn-success float-right mt-4'))); ?>

                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                        <?php if(count($comments) > 0): ?>
                            <div class="col-md-12">
                                <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $user = (object)unserialize($comment->creator);?>
                                    <div id="<?php echo e($comment->id); ?>" class="comment-send mt-4">
                                        <header class="comment-header">
                                            <div class="float-right"><a
                                                        href="#<?php echo e($comment->id); ?>">#<?php echo e($comment->id); ?></a> |
                                                &#1578;&#1608;&#1587;&#1591;
                                                : <?php echo e($user->name); ?> <?php echo e(rank($comment->rank, '')); ?></div>
                                            <div class="float-left">&#1578;&#1575;&#1585;&#1740;&#1582; &#1579;&#1576;&#1578;
                                                &#1606;&#1592;&#1585;
                                                : <?php echo e(my_jdate($comment->updated_at, 'd F Y')); ?></div>
                                        </header>
                                        <p><?php echo e($comment->body); ?></p>
                                        <footer class="comment-footer">
                                            <div class="float-left">
                                                <button class="btn btn-default answer" data-id="<?php echo e($comment->id); ?>"
                                                        data-name="<?php echo e($user->name); ?>" data-toggle="modal"
                                                        data-target="#answer">
                                                    <i class="fa fa-circle-o ml-1"></i>&#1662;&#1575;&#1587;&#1582;
                                                </button>
                                            </div>
                                        </footer>
                                        <?php echo $__env->make('locations.each', $comment, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="mt-4">
                                <?php echo e($comments->links()); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="title mt-5 text-right">
                    <h3>&#1605;&#1602;&#1575;&#1589;&#1583; &#1605;&#1588;&#1575;&#1576;&#1607;
                        &#1576;&#1607; <?php echo e($location->name); ?></h3>
                </div>
                <span class="line-dot float-right w-100"></span>

                <div class="float-right w-100 location-magic">
                    <div class="location uk-grid-width-small-1-2 uk-grid-width-medium-1-3" data-uk-grid>
                        <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="locations">
                                <div class="uk-panel">
                                    <a href="<?php echo e(route('front-location-show', $item->url)); ?>">
                                        <img src="<?php echo e(url($item->photo->path)); ?>" alt="<?php echo e($item->name); ?>" style="width: 100%">
                                        <span>
                                    <h5>&#1575;&#1580;&#1575;&#1585;&#1607; &#1740; &#1608;&#1740;&#1604;&#1575; &#1583;&#1585; <?php echo e($item->name); ?></h5>
                                    <p><?php echo e($item->slogan); ?></p>
                                </span>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

            </div>
        </section>




        <section class="newslater section bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="title">
                            <h5 style="line-height: 1.3;font-size: 17px">&#1575;&#1608;&#1604;&#1740;&#1606; &#1606;&#1601;&#1585;&#1740;
                                &#1576;&#1575;&#1588;&#1740;&#1583; &#1705;&#1607; &#1575;&#1586; &#1607;&#1605;&#1607;
                                &#1670;&#1740;&#1586; &#1576;&#1575; &#1582;&#1576;&#1585; &#1605;&#1740;
                                &#1588;&#1608;&#1740;&#1583;</h5>
                        </div>
                        <span class="line-dot"></span>
                        <?php echo e(Form::open(array('route' => 'newsletter-store', 'method' => 'PUT'))); ?>

                        <?php echo e(Form::hidden('page_name', 'location')); ?>

                        <?php echo e(Form::hidden('page_name_display', '&#1605;&#1602;&#1589;&#1583; ' . $location->name)); ?>

                        <div class="row">
                            <div class="col">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="text" name="email" class="form-control"
                                           placeholder="&#1575;&#1740;&#1605;&#1740;&#1604; &#1582;&#1608;&#1583; &#1585;&#1575; &#1608;&#1575;&#1585;&#1583; &#1705;&#1606;&#1740;&#1583;...">
                                </div>
                            </div>
                            <span class="or text-grey-300 mt-2"></span>
                            <div class="col">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input type="text" name="mobile" pattern="09[0-9]{9}" class="form-control"
                                           placeholder="&#1605;&#1608;&#1576;&#1575;&#1740;&#1604; &#1582;&#1608;&#1583; &#1585;&#1575; &#1608;&#1575;&#1585;&#1583; &#1705;&#1606;&#1740;&#1583;...">
                                </div>
                            </div>
                        </div>
                        <a href="javascript:void(0)" onclick="$(this).parent('form').submit()"><i
                                    class="fa fa-angle-left"></i></a>
                        <?php echo e(Form::close()); ?>

                        <p class="text-justify">&#1570;&#1582;&#1585;&#1740;&#1606; &#1583;&#1575;&#1606;&#1587;&#1578;&#1606;&#1740;
                            &#1607;&#1575;&#1740; &#1587;&#1601;&#1585; &#1576;&#1607;
                            <strong><?php echo e($location->name); ?></strong>
                            &#1583;&#1604;&#1582;&#1608;&#1575;&#1607;
                            &#1588;&#1605;&#1575; &#1588;&#1575;&#1605;&#1604; &#1583;&#1575;&#1606;&#1587;&#1578;&#1606;&#1740;
                            &#1607;&#1575;&#1740; &#1570;&#1606;&#1548; &#1608;&#1740;&#1604;&#1575;&#1607;&#1575;&#1740;
                            &#1575;&#1590;&#1575;&#1601;&#1607; &#1588;&#1583;&#1607;&#1548;&#1711;&#1588;&#1578;
                            &#1607;&#1575;&#1740; &#1578;&#1601;&#1585;&#1740;&#1581;&#1740; &#1605;&#1578;&#1606;&#1608;&#1593;
                            &#1608; &#1580;&#1583;&#1740;&#1583; &#1548; &#1608; &#1607;&#1585; &#1570;&#1606;&#1670;&#1607;
                            &#1705;&#1607; &#1588;&#1605;&#1575;
                            &#1575;&#1606;&#1578;&#1592;&#1575;&#1585; &#1583;&#1575;&#1585;&#1740;&#1583; &#1575;&#1586;
                            &#1575;&#1740;&#1606; &#1605;&#1602;&#1589;&#1583; &#1585;&#1575; &#1576;&#1583;&#1575;&#1606;&#1740;&#1583;
                            &#1605;&#1575; &#1576;&#1585;&#1575;&#1740; &#1588;&#1605;&#1575; &#1583;&#1587;&#1587;&#1578;&#1607;
                            &#1576;&#1606;&#1583;&#1740; &#1705;&#1585;&#1583;&#1607; &#1608; &#1605;&#1587;&#1578;&#1602;&#1740;&#1605;
                            &#1576;&#1607; &#1575;&#1740;&#1605;&#1740;&#1604; &#1588;&#1605;&#1575; &#1605;&#1740;
                            &#1601;&#1585;&#1587;&#1578;&#1740;&#1605;&#1548; &#1607;&#1605;&#1670;&#1606;&#1740;&#1606;
                            &#1588;&#1605;&#1575; &#1605;&#1740; &#1578;&#1608;&#1575;&#1606;&#1740;&#1583; &#1575;&#1586;
                            &#1570;&#1582;&#1585;&#1740;&#1606; &#1578;&#1582;&#1601;&#1740;&#1601; &#1607;&#1575;&#1740;
                            &#1608;&#1740;&#1604;&#1575;&#1607;&#1575;&#1740;
                            <strong><?php echo e($location->name); ?></strong> &#1607;&#1605; &#1575;&#1586; &#1591;&#1585;&#1740;&#1602;
                            &#1662;&#1740;&#1575;&#1605;&#1705; &#1576;&#1585; &#1585;&#1608;&#1740; &#1605;&#1608;&#1576;&#1575;&#1740;&#1604;&#1578;&#1575;&#1606;
                            &#1605;&#1591;&#1604;&#1593; &#1588;&#1608;&#1740;&#1583;.</p>
                    </div>
                    <div class="col-md-7">
                        <div class="title">
                            <h5 style="line-height: 1.3;font-size: 17px">&#1605;&#1580;&#1604;&#1607; &#1608;&#1740;&#1604;&#1705;&#1587;&#1585;</h5>
                            
                        </div>
                        <span class="line-dot"></span>
                        <div class="row">
                            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('front-blog-show', $post->slug)); ?>" class="col-md-3 col-xs-12">
                                    <figure class="box-article">
                                        <?php if(isset($post->photo->path)): ?>
                                            <img src="<?php echo e(url($post->photo->path)); ?>" alt="preview">
                                        <?php endif; ?>
                                        <figcaption class="box-article-title">
                                            <h5><?php echo str_limit($post->title, $limit = 30, $end = '...'); ?></h5>
                                        </figcaption>
                                    </figure>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="modal fade" id="answer" tabindex="-1" role="dialog" aria-labelledby="answerLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="answerLabel">&#1662;&#1575;&#1587;&#1582; &#1576;&#1607; <span
                                    id="name-c"></span></h4>
                    </div>
                    <div class="modal-body">
                        <?php echo e(Form::open(array('route' => 'location-comment-store', 'method' => 'PUT'))); ?>

                        <?php echo e(Form::hidden('location_id', $location->id)); ?>

                        <?php echo e(Form::hidden('parent_id', '', array('id' => 'parent_id'))); ?>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <fieldset class="rating float-left" style="margin-top:-30px">
                                    <input type="radio" id="sub_star5" name="rank" value="5"/><label class="full"
                                                                                                     for="sub_star5"
                                                                                                     data-toggle="tooltip"
                                                                                                     title="&#1593;&#1575;&#1604;&#1740; - 5 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                    <input type="radio" id="sub_star4half" name="rank" value="4.5"/><label class="half"
                                                                                                           for="sub_star4half"
                                                                                                           data-toggle="tooltip"
                                                                                                           title="&#1582;&#1740;&#1604;&#1740; &#1582;&#1608;&#1576; - 4.5 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                    <input type="radio" id="sub_star4" name="rank" value="4"/><label class="full"
                                                                                                     for="sub_star4"
                                                                                                     data-toggle="tooltip"
                                                                                                     title="&#1582;&#1740;&#1604;&#1740; &#1582;&#1608;&#1576; - 4 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                    <input type="radio" id="sub_star3half" name="rank" value="3.5"/><label class="half"
                                                                                                           for="sub_star3half"
                                                                                                           data-toggle="tooltip"
                                                                                                           title="&#1582;&#1608;&#1576; - 3.5 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                    <input type="radio" id="sub_star3" name="rank" value="3"/><label class="full"
                                                                                                     for="sub_star3"
                                                                                                     data-toggle="tooltip"
                                                                                                     title="&#1582;&#1608;&#1576; - 3 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                    <input type="radio" id="sub_star2half" name="rank" value="2.5"/><label class="half"
                                                                                                           for="sub_star2half"
                                                                                                           data-toggle="tooltip"
                                                                                                           title="&#1605;&#1578;&#1608;&#1587;&#1591; - 2.5 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                    <input type="radio" id="sub_star2" name="rank" value="2"/><label class="full"
                                                                                                     for="sub_star2"
                                                                                                     data-toggle="tooltip"
                                                                                                     title="&#1605;&#1578;&#1608;&#1587;&#1591; - 2 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                    <input type="radio" id="sub_star1half" name="rank" value="1.5"/><label class="half"
                                                                                                           for="sub_star1half"
                                                                                                           data-toggle="tooltip"
                                                                                                           title="&#1576;&#1583; - 1.5 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                    <input type="radio" id="sub_star1" name="rank" value="1"/><label class="full"
                                                                                                     for="sub_star1"
                                                                                                     data-toggle="tooltip"
                                                                                                     title="&#1576;&#1583; - 1 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                    <input type="radio" id="sub_starhalf" name="rank" value="0.5"/><label class="half"
                                                                                                          for="sub_starhalf"
                                                                                                          data-toggle="tooltip"
                                                                                                          title="&#1582;&#1740;&#1604;&#1740; &#1576;&#1583; - 0.5 &#1587;&#1578;&#1575;&#1585;&#1607;"></label>
                                </fieldset>
                                <?php echo e(Form::textarea('body', '', array('placeholder' => '&#1605;&#1578;&#1606; &#1605;&#1608;&#1585;&#1583; &#1606;&#1592;&#1585; &#1585;&#1575; &#1608;&#1575;&#1585;&#1583; &#1705;&#1606;&#1740;&#1583;..', 'class' => 'form-control col'))); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <label for="name"><i class="nc-icon users_single-02 ml-2 mtp-1"></i>&#1606;&#1575;&#1605;
                                    &#1588;&#1605;&#1575;</label>
                                <?php if(auth()->guard()->check()): ?>
                                    <?php echo e(Form::text('name', Auth::user()->first_name .' '. Auth::user()->last_name, array('class' => 'form-control col', 'readonly'))); ?>

                                <?php endif; ?>
                                <?php if(auth()->guard()->guest()): ?>
                                    <?php echo e(Form::text('name', '', array('class' => 'form-control col'))); ?>

                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email"><i class="nc-icon ui-1_email-85 ml-2 mtp-1"></i>&#1575;&#1740;&#1605;&#1740;&#1604;
                                    &#1588;&#1605;&#1575;</label>
                                <?php if(auth()->guard()->check()): ?>
                                    <?php echo e(Form::email('email', Auth::user()->email, array('class' => 'form-control col', 'required', 'readonly'))); ?>

                                <?php endif; ?>
                                <?php if(auth()->guard()->guest()): ?>
                                    <?php echo e(Form::email('email', '', array('class' => 'form-control col', 'required'))); ?>

                                <?php endif; ?>
                            </div>
                        </div>
                        <?php echo e(Form::button('<i class="fa fa-circle-o ml-1"></i>&#1575;&#1601;&#1586;&#1608;&#1583;&#1606;', array('type' => 'submit', 'class' => 'btn btn-rounded btn-success float-left mt-4'))); ?>

                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>

    <?php $__env->endSlot(); ?>
    <?php $__env->startPush('stylesheets'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/uikit.min.css')); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap-datepicker.min.css')); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap-select.min.css')); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/fancybox.min.css')); ?>"/>
        <!-- begin change -->
         <link rel="stylesheet" type="text/css" href="<?php echo e(asset('myfiles/css/style.location.v33.css')); ?>"/>
         <!-- end change -->
    <?php $__env->stopPush(); ?>
    <?php $__env->startPush('scripts'); ?>
        <script type="text/javascript" src="<?php echo e(asset('js/uikit.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/grid.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-select.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-select-fa_IR.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/fancybox.min.js')); ?>"></script>
        <script src="https://www.google.com/recaptcha/api.js"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/jgrowl.min.js')); ?>"></script>
        <!-- begin change -->
          <script type="text/javascript" src="<?php echo e(asset('myfiles/js/lib.v26.location.js')); ?>"></script>  
        <!--end change -->

        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxfZQk73sogROY9KKRmtPIsLSFSjX7o7w&libraries=places&callback=initialize"></script>
        <script type="text/javascript">

            $('.btn-comment-toggle').click(function () {
                $('.div-comment-toggle').slideToggle();
            });

            $('.selectpicker').selectpicker();

            function initialize() {
                var latlng = new google.maps.LatLng("<?php echo e(number_format((float)$location->latitude, 5, '.', '')); ?>", "<?php echo e(number_format((float)$location->longitude, 5, '.', '')); ?>");
                var options = {
                    zoom: 11,
                    center: latlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    draggable: true,
                    zoomControl: true,
                    mapTypeControl: false,
                    streetViewControl: false,
                    scrollwheel: false
                };
                var map = new google.maps.Map(document.getElementById("google-map-area"), options);


                var markers = [];

                var infowindow = new google.maps.InfoWindow();

                var markImg = new google.maps.MarkerImage('http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=|00aeef|000000');
                var markImg2 = new google.maps.MarkerImage('http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=|00aeef|ffffff');


                var bounds = new google.maps.LatLngBounds();


                $(".filter-box").each(function (index) {
                    var markerLatLng = new google.maps.LatLng($(this).data("latitude"), $(this).data("longitude"));
                    var marker = new google.maps.Marker({
                        position: markerLatLng,
                        map: map,
                        icon: markImg,
                        animation: null
                    });
                    markers.push(marker);

                    bounds.extend(marker.getPosition());


                });


                map.fitBounds(bounds);


                $(".filter-box").on('mouseenter', function () {
                    var id = $(this).attr('id') - 1;
                    markers[id].setIcon();
                }).on('mouseleave', function () {
                    var id = $(this).attr('id') - 1;
                    markers[id].setIcon(markImg);
                });


            }


            $('.filter-btn').click(function () {
                $('#filter-list').slideToggle('fast');
            });


            $('.btn-filter').click(function () {

                if ($('#filters :checkbox:checked').length == 0) {
                    $('.filter-box').show();

                } else {

                    $('.filter-box').hide();

                    $('#filters :checkbox:checked').each(function () {
                        $('.' + $(this).val()).show();
                    });

                }

                var villa_place = '.' + $('#villa_place').val();
                $(villa_place).each(function () {
                    $(this).show();
                });

                var district = '.district-' + $('#district').val();
                $(district).each(function () {
                    $(this).show();
                });

                var room = '.room-' + $('#room').val();
                $(room).each(function () {
                    $(this).show();
                });

            });

            var stickyTop = $('#google-map-area').offset().top;

            // $(window).on('scroll', function () {
            //     if ($(window).scrollTop() >= stickyTop) {
            //         $('#google-map-area').css({position: 'fixed', top: '15px', width: '350px', height: '700px'});
            //     } else {
            //         $('#google-map-area').css({position: 'relative', top: 'auto', width: '100%', hegiht: 'auto'});
            //     }
            // });


            $('#submit-btn').click(function () {
                var $captcha = $('#recaptcha'),
                    response = grecaptcha.getResponse();

                if (response.length === 0) {
                    alert('reCAPTCHA is mandatory');
                    if (!$captcha.hasClass("error")) {
                        $captcha.addClass("error");
                    }
                } else {
                    $captcha.removeClass("error");
                    $('#form-validation').submit();
                }
            });

            $('.answer').click(function () {
                var id = $(this).data('id');
                var name = $(this).data('name');
                $('#name-c').text(name);
                $('#parent_id').val(id);
            });
        </script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script>
            $(document).ready(function () {
                $('.numberPrice').text(function (index, value) {
                    return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                });
            });
        </script>
        
        
        <script>
            $(function () {
                $("#slider-range").slider({
                    range: true,
                    min: parseInt($('.min-price').val()),
                    max: parseInt($('.max-price').val()),
                    values: [parseInt($('.min-price').val()), parseInt($('.max-price').val())],
                    slide: function (event, ui) {
                        $("#amount").val("" + ui.values[1] + " - " + ui.values[0]);
                        $('.min-price').val(ui.values[0]);
                        $('.max-price').val(ui.values[1]);
                    }
                });
                $("#amount").val("" + $("#slider-range").slider("values", 1) +
                    " - " + $("#slider-range").slider("values", 0));
            });
        </script>

        <!-- begin change -->
           <script type="text/javascript">
            var Rtltodate = true; 
            function SelecetedDatepicker(element,selectedDate,isRtl)
                {
                    if(element==='fromdate')
                    {
                        fromdate = selectedDate;
                        $('#starttodate').val(selectedDate);
                        $('#startfromdate').val(selectedDate);
                        Rtltodate = isRtl;
                        $('#frm-filter input[name="todate"]').mydatepicker('setRTL',isRtl);
                        $('#frm-filter input[name="todate"]').mydatepicker('setDate',selectedDate);   
                    }else{
                        todate = selectedDate;
                        $('#startfromdate').val("0");
                    }              
                    checkNight();
                }
                function closeDatePicker(element,selectedDate)
                {
                    if(element == 'fromdate')
                    {
                        if(selectedDate==="")
                        return;
                       $('#frm-filter input[name="todate"]').focus();
                    }else{
                        return;
                    }
                    return;
                }  
                function checkNight(){
                    var diff=0;
                    var fromDate=get('#frm-filter input[name="fromdate"]');
                    var toDate=get('#frm-filter input[name="todate"]');
                    var diffFromDate=dayOfYear(fromDate);
                    var diffToDate=dayOfYear(toDate);
                    if(diffFromDate<diffToDate){
                        diff=diffToDate-diffFromDate;
                    }
                    else if(diffFromDate>diffToDate){
                        diff=Math.abs(365-diffFromDate)+diffToDate;
                    }
                    var str = diff>0 ? diff+' شب'+' اقامت' : '&nbsp;' ;
                    $('#toDateError').html(str);
                } 
        </script>
          <script>
            $(document).ready(function(){   
                var datesFrom=$('#frm-filter input[name="fromdate"]').mydatepicker({
                    dateFormat:'yy/mm/dd',
                    isRTL:true,
                    minDate:0,                  
                    numberOfMonths:2,
                    onSelect:function(selectedDate){
                        SelecetedDatepicker('fromdate',selectedDate,true);
                        /*
                        console.log('dlkdlldlkd');
                        fromdate = selectedDate;
                        $('#starttodate').val(selectedDate);
                        $('#startfromdate').val(selectedDate);
                        dateTo.mydatepicker('setDate',selectedDate);*/
                        
                    },
                    onClose:function(selectedDate){
                        closeDatePicker('fromdate',selectedDate);
                        /*
                        //console.log(selectedDate==="");
                        console.log('ffffff');
                        if(selectedDate==="")
                        return;
                       dateTo.focus();*/ 
                    }
                });
                var dateTo=$('#frm-filter input[name="todate"]').mydatepicker({
                    dateFormat:'yy/mm/dd',
                    isRTL:true,
                    minDate:0,                  
                    numberOfMonths:2,
                    onSelect:function(selectedDate){
                        SelecetedDatepicker('todate',selectedDate,true);
                        /*
                        todate = selectedDate;
                        $('#startfromdate').val("0");
                        checkNight();*/
                    },
                    onClose:function(selectedDate){
                        closeDatePicker('todate',selectedDate)
                    }
                });               
            });

        </script>
        <!--end change -->
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>