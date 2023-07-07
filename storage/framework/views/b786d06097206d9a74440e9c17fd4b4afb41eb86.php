<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css"/>
    <style>
        .cu-pointer {
            cursor: pointer;
        }

        .introduction {
            transition: 0.4s all ease;
        }

        .introduction:hover {
            transform: scale(1.1);
        }

        .section-title-2 {
            display: block ruby;
        }

        .introduction-icon {
            width: 45px;
            margin-left: 10px;
        }

        .section-title-2 .title::after {
            width: 79%;
        }

        .introduction-pdf {
            width: 100%;
            display: block;
            text-align: left;
            direction: ltr;
            color: #fff;
            font-weight: 500;
            font-size: 21px;
            padding-left: 38px;
            margin-top: 10px;
        }

        .introduction-pdf img {
            width: 20px;
        }

        .introduction-film {
            width: 100%;
            display: block;
            text-align: left;
            direction: ltr;
            color: #fff;
            font-weight: 500;
            font-size: 21px;
            padding-left: 15px;
            margin: 0;
        }

        .introduction-film img {
            width: 35px;
        }

        a.pdf-download img {
            -webkit-box-shadow: 4px 5px 0px -1px rgba(121, 121, 121, 1);
            -moz-box-shadow: 4px 5px 0px -1px rgba(121, 121, 121, 1);
            box-shadow: 4px 5px 0px -1px rgba(121, 121, 121, 1);
        }

        .slider_mobile {
            display: none !important;
        }

        @media (max-width: 768px) {
            .slider_desktop {
                display: none !important;
            }

            .slider_mobile {
                display: block !important;
            }

            /*.carousel-item*/
            /*{*/
            /*    display: block!important;*/
            /*}*/
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">توجه</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="<?php echo e(asset('img/million_logo.png')); ?>" style="max-width: 100px;float: left">
                    <h3>کسب درآمد میلیونی در منزل خودتان با "میلیونر آکادمی"</h3>
                    <p>
                        شرکت کردن در این دوره های آنلاین برای عموم رایگان و از طریق اپلیکیشن zoom <img
                                src="https://assets.stickpng.com/images/5e8ce318664eae0004085461.png"
                                style="width: 25px;"> می باشد
                        جهت راهنمایی و اتصال به این دوره ها به شماره تماس زیر در واتس اپ ، همین حالا پیام ارسال کنید
                    </p>
                    <a  href="https://wa.me/905398209180" class="btn btn-success" style="direction: ltr;"><i
                                class="fa fa-whatsapp" aria-hidden="true"></i>
                        +90 539 820 9180</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                </div>
            </div>
        </div>
    </div>
    <main class="bg-dark-theme">
        <section class="main-bg">
            <div id="ki-slider" class="carousel slide slider_desktop" data-ride="carousel">

                <!-- Indicators -->
            
            
            
            
            
            
            

            <!-- The slideshow -->
                <div class="carousel-inner">
                    <?php $__currentLoopData = $slider_desktop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($slide->photo): ?>
                            <div class="carousel-item <?php echo e($key==0?'active':''); ?>">
                                <img src="<?php echo e(url($slide->photo->path)); ?>" class="background" alt="khaneistanbul">
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#ki-slider" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#ki-slider" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>

            </div>
            <div id="ki-slider1" class="carousel slide slider_mobile" data-ride="carousel">

                <!-- Indicators -->
            
            
            
            
            
            
            

            <!-- The slideshow -->
                <div class="carousel-inner">
                    <?php $__currentLoopData = $slider_mobile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1=> $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($slide->photo): ?>
                            <div class="carousel-item <?php echo e($key1==0?'active':''); ?>">
                                <img src="<?php echo e(url($slide->photo->path)); ?>" class="background" alt="khaneistanbul">
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#ki-slider1" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#ki-slider1" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>

            </div>
            
            <div class="sidebar left">
                <a class="button-top" href="<?php echo e(auth()->check() ? route('index') : route('login_office')); ?>">
                    <span class="title">کارشناس</span>
                    <img src="<?php echo e(asset('new/img/icon/arrow-right-double1.png')); ?>" style="width: 26px;height: 22.5px"
                         class="image-icon">
                </a>
                
                
                
                
                
            </div>
            <div class="main-content">
                <div class="m-auto1 main-items">
                    <a href="/" class="main-logo d-block">
                        <img src="<?php echo e(asset('new/img/logo/logo-4.png')); ?>" class="main-logo">
                    </a>

                    <style>
                        @media (max-width: 576px) {
                            .qs-container{
                                width: 320px !important;
                            }
                        }
                        .qs-position {
                            /*top: 50%;*/
                            -webkit-transform: translateY(-50%);
                            -ms-transform: translateY(-50%);
                            transform: translateY(-50%);
                        }
                        /*.qs-position {*/
                        /*    top: 50%;*/
                        /*}*/
                        .qs-position {
                            height: auto;
                            padding: 15px 0;
                            /*position: absolute;*/
                            text-align: center;
                            /*top: 55px;*/
                            transform: none;
                            -ms-transform: none;
                            -webkit-transform: none;
                            -moz-transform: none;
                            width: 100%;
                            z-index: 1;
                        }
                        .qs-container {
                            width: 800px;
                        }
                        /*.qs-container {*/
                        /*    width: 660px;*/
                        /*}*/
                        .qs-container {
                            display: inline-block;
                            height: auto;
                            /*width: 320px;*/
                            padding: 0;
                            position: relative;
                        }
                        .qs-transaction, .qs-main {
                            display: flex;
                            flex-direction: row;
                            flex-wrap: nowrap;
                            justify-content: center;
                            align-content: stretch;
                            align-items: flex-start;
                        }
                        .qs-transaction-item {
                            order: 0;
                            flex: 0 1 auto;
                            align-self: center;
                            margin: 0 30px;
                            padding: 7px;
                        }
                        .qs-main {
                            border-radius: 0;
                        }
                        .qs-main {
                            background: white !important;
                            justify-content: space-around;
                            box-shadow: 0 2px 4px rgba(0,0,0,0.3);
                            border-radius: 0 !important;
                        }
                        .qs-transaction, .qs-main {
                            display: flex;
                            flex-direction: row;
                            flex-wrap: nowrap;
                            justify-content: center;
                            align-content: stretch;
                            align-items: flex-start;
                            background: rgba(34,34,34,0.75);
                            border-radius: 20px 20px 0 0;
                        }
                        .qs-country {
                            min-width: 100px;
                        }
                        .qs-country, .qs-freetext, .qs-search-btn {
                            order: 0;
                            flex: 0 1 auto;
                            align-self: center;
                        }
                        .qs-country {
                            border-right: 1px solid #ccc;
                        }
                        .qs-container .qs-country .ui-select-container {
                            width: 100%;
                            border: 0;
                            height: auto;
                            color: #000;
                            padding: 0;
                            display: flex;
                            flex-flow: column;
                            align-items: center;
                        }
                        .qs-container .qs-country .ui-select-match {
                            width: 100%;
                            padding: 10px 0;
                        }
                        .qs-container .qs-country .btn.btn-default.form-control.ui-select-toggle {
                            border: 0;
                            background: transparent;
                            text-align: center !important;
                            box-shadow: none;
                        }
                        .qs-freetext {
                            flex: 1 1 auto;
                        }
                        .qs-country, .qs-freetext, .qs-search-btn {
                            order: 0;
                            flex: 0 1 auto;
                            align-self: center;
                        }
                        .qs-container .ui-widget input {
                            height: 50px;
                            background: #fff;
                            padding-left: 15px;
                        }
                        .qs-container .ui-widget input:focus{
                            outline: 0 !important;
                            border: 0 !important;
                        }
                        .qs-container .ui-widget input {
                            width: 100%;
                            border: 0;
                            height: auto;
                            color: #000;
                            background: #fff;
                            padding-left: 15px;
                            overflow: hidden;
                            text-overflow: ellipsis;
                        }
                        .qs-search-btn {
                            min-width: 60px;
                            cursor: pointer;
                        }
                        .qs-freetext {
                            flex: 1 1 auto;
                        }
                        .qs-search-btn a {
                            padding: 22px 14px 10px;
                        }
                        .qs-position .qs-search-btn a span {
                            background-image: url(<?php echo e(asset('new/files/icon-search.svg')); ?>);
                            background-size: cover;
                            width: 30px;
                            height: 30px;
                            display: inline-block;
                            position: relative;
                            top: 3px;
                        }
                        .adv-fields {
                            background: #f1f1f1;
                            padding: 15px;
                            display: none;
                            margin-top: -1px;
                            direction: ltr;
                        }
                        .adv-fields input,.adv-fields select{
                            font-size: 13px;
                        }
                        span.mflag {
                            width: 44px;
                            height: 30px;
                            display: inline-block;
                        }
                        .mflag-tr {
                            background-position: 0 89.256198%;
                        }
                        .mflag {
                            background: url(<?php echo e(asset('new/files/flags_responsive.png')); ?>) no-repeat;
                            background-position-x: 0%;
                            background-position-y: 0%;
                            background-size: auto;
                            background-size: 100%;
                        }
                        .qs-container .qs-country span.mflag {
                            width: 36px;
                            height: 24px;
                        }
                        .mflag-tr {
                            background-position: 0 89.256198%;
                        }
                    </style>
                    <div class="qs-position">

                        <div class="qs-container">

                            <form method="GET" action="<?php echo e(route('front.villas.search')); ?>" id="searchBar">
                                <div class="qs-transaction">
                                    <div class="qs-transaction-item">
                                        <div class="radio">
                                            <label id="saleLabel">
                                                <input type="radio" selected="" id="TransactionTypeSale"
                                                       name="TransactionTypeGroup" value="357"
                                                       class="ng-pristine ng-untouched ng-valid ng-not-empty"
                                                       checked="checked">
                                                <span class="text-white">خرید املاک و مستغلات</span>
                                            </label>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                </div>


                                <div class="qs-main" id="qs-simple">
                                    <!-- ngIf: !vm.IsOffice -->
                                    <div class="qs-country ng-scope" ng-if="!vm.IsOffice">
                                        <div class="ui-select-container ui-select-bootstrap dropdown ng-pristine ng-untouched ng-valid ng-scope ng-not-empty">
                                            <div class="ui-select-match ng-scope"
                                                 placeholder="Country">
                                    <span tabindex="-1" class="btn btn-default form-control ui-select-toggle" style="outline: 0;"><span>
                            <span class="mflag mflag-tr"></span>
                        </span>
                                        <i class="caret pull-right"></i>
                                        <a
                                                ng-show="$select.allowClear &amp;&amp; !$select.isEmpty() &amp;&amp; ($select.disabled !== true)"
                                                aria-label="Select box clear" style="margin-right: 10px"
                                                ng-click="$select.clear($event)"
                                                class="btn btn-xs btn-link pull-right ng-hide"><i
                                                    class="glyphicon glyphicon-remove"
                                                    aria-hidden="true"></i></a></span></div>
                                        </div>
                                    </div>
                                    <div class="qs-freetext qs-what">
                                        <div class="ui-widget typeahead-search-wrapper">
                                            <input type="text" name="search" placeholder="دنبال چه میگردید..." class="ng-pristine ng-untouched ng-valid ng-empty">
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    

                                    


                                    <div onclick="$('#searchBar').submit()" class="qs-search-btn" id="div_Search_Less">
                                        <a>
                                            <span></span></a>
                                    </div>

                                </div>
                                <div class="adv-fields" style="display: block;">
                                    <div class="row" style="direction: rtl">










                                        <div class="col-xs-12 col-sm-4">
                                            <div class="qs-min form-group">
                                                <input placeholder="تعداد خواب" type="number" class="form-control ng-pristine ng-untouched ng-valid ng-empty text-left" id="room_num" name="room_num">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4">
                                            <select class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="type_info" name="type_info">
                                                <?php $__currentLoopData = \App\Villa::types(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($key); ?>"><?php echo e($type); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-xs-12 col-sm-4">
                                            <select class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="location_id" name="location_id">
                                                <option value="">همه استانبول</option>
                                                <?php $__currentLoopData = \App\Location::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option class="cityId<?php echo e($l->city_id); ?>" value="<?php echo e($l->id); ?>"><?php echo e($l->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row px-3">
                                        <div class="col-md-12 col-xs-12">
                                            <div class="form-group bootstrap-selects <?php if($errors->has('price')): ?> has-danger <?php endif; ?>" style="direction: ltr">
                                                <?php echo e(Form::label('price', 'قیمت')); ?>

                                                <input type="text" class="js-range-slider" name="price" value="" />
                                                <span class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top" title="ملک‌های کمتر از ۲۰۰ هزار لیر مناسب ‌شان و سلیقه ی هموطنان عزیز ایرانی‌ نیست" style="position: absolute;left: -8px;top: 30px;"><i class="fa fa-info"></i></span>
                                                <span class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top" title="ملک‌های بالا تر از ۲۰ میلیون لیر، به دلایل قانونی‌، قابل نمایش در سایت نیستند. در صورت نیاز، از طریق کارشناسان مربوطه ی سازمان، مورد مد نظرتان را پیگیری کنید" style="position: absolute;right: -8px;top: 30px;"><i class="fa fa-info"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="adv-search-panel" ng-init="vm.showAdvSearchPanel(true)"
                                     ng-click="vm.showAdvSearchPanel()">
                                    <i id="show-more-less" class="show-more"></i>
                                </div>
                            </form>

                        </div>

                    </div>

                    
































                    <div class="slogan">
                        <img src="<?php echo e(asset('img/star.png')); ?>" class="slogan-item">
                    </div>
                </div>
            </div>
            <div class="chat-float">
                <a href="#">
                    
                </a>
            </div>
        </section>

        <section class="projects-style-1">
            <div class="section-title" data-aos="fade-down">
                <span class="title">دسته بندی ها</span>
                
                
            </div>

            <div class="row mt-5 aos-all">
                <?php
                $i = 0;
                ?>
                <?php $__currentLoopData = $projectTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $projectType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3 col-sm-6 col-xs-6 aos-item" <?php if(($i % 2)==0): ?> data-aos="fade-left"
                         <?php else: ?> data-aos="fade-right" <?php endif; ?>>
                        <div class="project-item-1">
                            <a href="<?php echo e(route('front.villas.index', ['type'=> $projectType])); ?>">
                                <div class="background imghvr-shutter-out-diag-1">
                                    <img src="<?php echo e(asset('new/img/slider-1.png')); ?>">
                                </div>
                            </a>
                            <a href="/">
                                <div class="title">
                                    <h5 class="first-title"><?php echo e($projectType); ?></h5>
                                    <h5 class="second-title"><?php echo e($typeVillas[$key] ? $typeVillas[$key]->name : $projectType); ?></h5>
                                </div>
                            </a>
                            <a href="<?php echo e(route('front.villas.index', ['type'=> $projectType])); ?>">
                                <div class="more">
                                    <h5>همه</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php
                    $i++;
                    ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
        <section class="projects-style-1">
            <div class="section-title" data-aos="fade-down">
                <span class="title">پروژه ها</span>
                
                
                
            </div>

            <div class="row mt-5">
                <?php
                $j = 0;
                ?>
                <?php $__currentLoopData = $villaCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3 col-sm-6 col-xs-6" <?php if(($j % 2)==0): ?> data-aos="fade-left"
                         <?php else: ?> data-aos="fade-right" <?php endif; ?>>
                        <div class="project-item-1">
                            <a href="<?php echo e(route('front.projects.show', $project->slug)); ?>">
                                <div class="background">
                                    <?php if(count($project->photos)): ?>
                                        <img src="<?php echo e(url($project->photos[0]->path)??'source/assets/new/img/logo/logo-4.png'); ?>"
                                             alt="">
                                    <?php endif; ?>
                                </div>
                            </a>
                            <a href="<?php echo e(route('front.projects.show', $project->slug)); ?>">
                                <div class="title only-first">
                                    <h5 class="first-title"><?php echo e($project->name); ?></h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php
                    $j++;
                    ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                <div class="section__box" data-aos="fade-up">
                    <a href="<?php echo e(route('front.projects.index')); ?>"
                       class="r-link ai-element ai-element_type1 ai-element1">
                        <span class="ai-element__label">همه پروژه ها</span>
                    </a>
                </div>

            </div>
        </section>
        <section class="introduction mt--10 cu-pointer"
                 onclick="window.open('<?php echo e(route('front.villas.locations')); ?>','_parent')" data-aos="zoom-in-right">
            <div class="content">
                <div class="intro-text text-white">
                    <h1 class="font-weight-bold">معرفی و بررسی</h1>
                    <h2>
                        <span class="text-primary-theme">بهترین مناطق</span>
                        استانبول
                        <br>
                        برای سرمایه گذاری
                    </h2>
                    <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="intro-gear">
                </div>
                <img class="float-left d-inline-block left-image" src="<?php echo e(asset('new/img/map.png')); ?>">
            </div>
        </section>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <section class="introduction mt-1 px-5 mt-12rem">
            <div class="section-title-2 mt-4" data-aos="zoom-in">
                <img class="introduction-icon" src="<?php echo e(asset('new/img/youtube.png')); ?>" alt="">
                <span class="title">ما رو بیشتر بشناسید</span>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3" data-aos="fade-up-left">
                            <div class="box-5">
                                <a class="pdf-download" href="#">
                                    <img src="<?php echo e(asset('new/img/khane-istanbul-pdf.jpg')); ?>">
                                </a>
                                <span class="introduction-pdf">
                                    PDF
                                    <img class="" src="<?php echo e(asset('new/img/pdf.png')); ?>" alt="">
                                </span>
                            </div>
                        </div>
                        <div class="col-md-9" data-aos="fade-up-right">
                            <iframe width="915" height="345" src="https://www.youtube.com/embed/pEXlTnPcHKw"
                                    class="youtube"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            <span class="introduction-film">
                                VIDEO
                                <img class="" src="<?php echo e(asset('new/img/film.png')); ?>" alt="">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
    <script src="<?php echo e(asset('new/js/jquery.mask.min.js')); ?>"></script>
    <script>
        var custom_values = [200000, 400000, 600000, 800000, 1000000, 1350000, 1700000, 2000000, 2500000, 3000000, 4000000, 5000000, 10000000, 20000000,'<?php echo e($price_max); ?>'];
        // be careful! FROM and TO should be index of values array
                <?php if(request('price')): ?>
        var my_from = custom_values.indexOf(<?php echo e(explode(';',request('price'))[0]); ?>);
        var my_to = custom_values.indexOf(<?php echo e(explode(';',request('price'))[1]); ?>);
                <?php else: ?>
        var my_from = custom_values.indexOf(400000);
        var my_to = custom_values.indexOf(1350000);
        <?php endif; ?>

        $(".js-range-slider").ionRangeSlider({
            type: "double",
            grid: true,
            from: my_from,
            to: my_to,
            values: custom_values
        });
    </script>
    <script>
        $(function () {
            $("#search_input").bind('input propertychange', function (e) {
                if (!/^[ پچجحخهعغفقثصضشسیبلاتنمکگوئدذرزطظژؤإأءًٌٍَُِّ  \s\n\r\t\d\(\)\[\]\{\}.,،;\-؛]+$/.test($(this).val())) {
                    $(document).ready(function () {
                        swal({
                            title: " عملیات ناموفق",
                            text: "از حروف انگلیسی استفاده نکنید",
                            icon: "warning",
                            timer: 3000,
                        })
                    });
                    $(this).val("");
                }
            });
        });
        var typed4 = new Typed('#search_input', {
            strings: [
                'دریافت اقامت ترکیه',
                'مزایای پاسپورت ترکیه',
                'انواع اقامت در ترکیه',
                'شرایط اخذ پاسپورت ترکیه',
                'نکات مهم در خرید ملک',
                'چگونه شرکت ثبت کنیم',
                'مراحل گرفتن پاسپورت ترکیه',
                'مراحل ثبت شرکت در ترکیه',
                'تاپو چیست؟',
                'افتتاح حساب در ترکیه',
                'سبک زندگی در استانبول',
                'انواع سند های ملکی در ترکیه',
                <?php $__currentLoopData = $article; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> '<?php echo e($ar->title); ?>',<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>],
            typeSpeed: 25,
            backSpeed: 1,
            attr: 'placeholder',
            bindInputFocusEvents: true,
            loop: true
        });
        var input = document.getElementById("search_input");
        input.addEventListener("keyup", function (event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                document.getElementById("search_btn").click();
            }
        });

        // $(document).ready(function () {
        //     $("#modal").modal('show');
        // });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>