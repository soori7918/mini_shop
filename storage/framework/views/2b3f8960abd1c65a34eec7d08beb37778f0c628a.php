
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
                    <a href="https://wa.me/905398209180" class="btn btn-success" style="direction: ltr"><i
                                class="fa fa-whatsapp" aria-hidden="true"></i>
                        +90 539 820 9180</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                </div>
            </div>
        </div>
    </div>
    <main class="bg-light">
        <div class="search-carousel ng-scope">
            <div class="sidebar left">










            </div>
            <div class="qs-position">

                <h1>خانه استانبول</h1>

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
                                    <span>خرید املاک و مستغلات</span>
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
                                    <span tabindex="-1" class="btn btn-default form-control ui-select-toggle" style="outline: 0;">
                                        <span class="ui-select-placeholder text-muted ng-binding ng-hide">Country</span> <span>
                            <span class="mflag mflag-tr"></span>
                            <span class="qs-country-name ng-binding ng-scope">Turkey</span>
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
                        <div class="row">
                            <div class="col-xs-12 col-sm-2">
                                <div class="qs-min form-group">
                                    <input placeholder="حداکثر قیمت" class="form-control ng-pristine ng-untouched ng-valid ng-empty" id="ctl01_ctl00_ddlMaxPrice" name="max_price">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-2">
                                <div class="qs-min form-group">
                                    <input placeholder="حداقل قیمت" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty" id="ddlMinPrice" name="min_price">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-2">
                                <div class="qs-min form-group">
                                    <input placeholder="تعداد خواب" type="number" class="form-control ng-pristine ng-untouched ng-valid ng-empty" id="room_num" name="room_num">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3">
                                <select class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="type_info" name="type_info">
                                    <?php $__currentLoopData = \App\Villa::types(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>"><?php echo e($type); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-3">
                                <select class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" id="location_id" name="location_id">
                                    <option value="">منطقه...</option>
                                    <?php $__currentLoopData = \App\Location::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option class="cityId<?php echo e($l->city_id); ?>" value="<?php echo e($l->id); ?>"><?php echo e($l->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
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


            <div ng-class="{ 'search-expanded' : vm.showMore }" class="search-expanded">

                <div class="carousel slide" id="repCarousel" data-interval="8000" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <?php $__currentLoopData = $slider_mobile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1=> $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($slide->photo): ?>
                                <div class="item <?php echo e($key1==0?'active':''); ?>">
                                    <img alt="" src="<?php echo e(url($slide->photo->path)); ?>">
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>

            </div>
        </div>
        <section class="projects-style-1">
            <div class="section-title" data-aos="fade-down">
                <span class="title text-dark">دسته بندی ها</span>
                
                
            </div>

            <div class="row mt-5 aos-all">
                <?php
                $i = 0;
                ?>
                <?php $__currentLoopData = $projectTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $projectType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>





















                    <div class="col-xs-12 col-sm-4 blocks" <?php if(($i % 2)==0): ?> data-aos="fade-left"
                         <?php else: ?> data-aos="fade-right" <?php endif; ?>>
                        <div class="panel" style="min-height: max-content;box-shadow: none !important;">
                            <div class="panel-body">

                                <img style="width: 100%;max-height: 225px;" class="img-responsive" src="<?php echo e(asset('new/img/slider-1.png')); ?>">

                                <p><a href="<?php echo e(route('front.villas.index', ['type'=> $projectType])); ?>" class="">پیشنهاد ویژه</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 blocks" <?php if(($i % 2)==0): ?> data-aos="fade-left"
                         <?php else: ?> data-aos="fade-right" <?php endif; ?>>
                        <div class="panel" style="min-height: max-content;box-shadow: none !important;">
                            <div class="panel-body">

                                <img style="width: 100%;max-height: 225px;" class="img-responsive" src="https://khaneistanbul.com.tr/source/assets/uploads/categories/1399-08-03/photos/photo-55fe5e8501544cc0bd6cec2c9d666c79.JPG">

                                <p><a href="<?php echo e(route('front.villas.index', ['type'=> $projectType])); ?>" class="">پیشنهاد ویژه</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 blocks" <?php if(($i % 2)==0): ?> data-aos="fade-left"
                         <?php else: ?> data-aos="fade-right" <?php endif; ?>>
                        <div class="panel" style="min-height: max-content;box-shadow: none !important;">
                            <div class="panel-body">

                                <img style="width: 100%;max-height: 225px;" class="img-responsive" src="https://khaneistanbul.com.tr/source/assets/uploads/categories/1399-08-03/photos/photo-f8e7e967f9d47f1192c18d268c9798d7.JPG">

                                <p><a href="<?php echo e(route('front.villas.index', ['type'=> $projectType])); ?>" class="">پیشنهاد ویژه</a></p>
                            </div>
                        </div>
                    </div>
                    <?php
                    $i++;
                    ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
        <section class="projects-style-1" style="background: #eee">
            <div class="section-title" data-aos="fade-down">
                <span class="title text-dark">پروژه ها</span>
                
                
                
            </div>

            <div class="row mt-5">
                <?php
                $j = 0;
                ?>
                <?php $__currentLoopData = $villaCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xs-12 col-sm-3 blocks" <?php if(($j % 2)==0): ?> data-aos="fade-left"
                         <?php else: ?> data-aos="fade-right" <?php endif; ?>>
                        <div class="panel" style="min-height: max-content;box-shadow: none !important;background: transparent">
                            <div class="panel-body">

                                <?php if(count($project->photos)): ?>
                                    <img style="width: 100%;min-height: 225px;max-height: 225px;" class="img-responsive" src="<?php echo e(url($project->photos[0]->path)??'source/assets/new/img/logo/logo-4.png'); ?>">
                                <?php endif; ?>

                                <p><a href="<?php echo e(route('front.projects.show', $project->slug)); ?>" class=""><?php echo e($project->name); ?></a></p>
                            </div>
                        </div>
                    </div>
                    <?php
                    $j++;
                    ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                <div style="height: 40px" class="section__box" data-aos="fade-up">
                    <a href="<?php echo e(route('front.projects.index')); ?>" style="border-color: #000"
                       class="r-link ai-element ai-element_type1 ai-element1">
                        <span class="ai-element__label text-dark">همه پروژه ها</span>
                    </a>
                </div>

            </div>
        </section>
        <section class="projects-style-1">
            <div class="row">
                <div class="col-xs-12 col-sm-4 blocks">
                    <div class="panel" style="min-height: max-content;">
                        <div class="panel-body">
                            <h1>معرفی و بررسی</h1>
                            <img style="max-height: 135px" class="img-responsive" src="https://khaneistanbul.com.tr/source/assets/new/img/map.png">
                            <p style="min-height: 46px" class="text-center">معرفی و بررسی بهترین مناطق استانبول برای سرمایه گذاری</p>

                        </div>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-4 blocks">
                    <div class="panel" style="min-height: max-content;">
                        <div class="panel-body">
                            <h1>ما را بیشتر بشناسید</h1>
                            <img style="max-height: 135px" class="img-responsive" src="https://khaneistanbul.com.tr/source/assets/new/img/khane-istanbul-pdf.jpg">
                            <p style="min-height: 46px" class="text-center">ما را بیشتر بشناسید به صورت pdf</p>

                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4 blocks">
                    <div class="panel" style="min-height: max-content;">
                        <div class="panel-body">
                            <h1>ما را بیشتر بشناسید</h1>
                            <iframe ame style="height: 135px;width: 90%;" width="915" height="345" src="https://www.youtube.com/embed/pEXlTnPcHKw"
                                    class="youtube"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            <p style="min-height: 46px" class="text-center">ما را بیشتر بشناسید به صورت video</p>

                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>
    <div class="addthis-smartlayers addthis-smartlayers-desktop" aria-labelledby="at4-share-label" role="region"><div id="at4-share" class="at4-share addthis_32x32_style atss atss-left addthis-animated slideInLeft">
            <a role="button" tabindex="0" class="at-share-btn at-svc-facebook"><span class="at-icon-wrapper" style="background-color: rgb(59, 89, 152);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-facebook-1" class="at-icon at-icon-facebook" style="fill: rgb(255, 255, 255);"><title id="at-svg-facebook-1">Facebook</title><g><path d="M22 5.16c-.406-.054-1.806-.16-3.43-.16-3.4 0-5.733 1.825-5.733 5.17v2.882H9v3.913h3.837V27h4.604V16.965h3.823l.587-3.913h-4.41v-2.5c0-1.123.347-1.903 2.198-1.903H22V5.16z" fill-rule="evenodd"></path></g></svg></span></a>
            <a role="button" tabindex="0" class="at-share-btn at-svc-facebook"><span class="at-icon-wrapper" style="background-color: #f70000;"><svg fill="#fff" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg></span></a>

            <a role="button" tabindex="0" class="at-share-btn at-svc-whatsapp"><span class="at-icon-wrapper" style="background-color: rgb(77, 194, 71);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-whatsapp-3" class="at-icon at-icon-whatsapp" style="fill: rgb(255, 255, 255);"><title id="at-svg-whatsapp-3">WhatsApp</title><g><path d="M19.11 17.205c-.372 0-1.088 1.39-1.518 1.39a.63.63 0 0 1-.315-.1c-.802-.402-1.504-.817-2.163-1.447-.545-.516-1.146-1.29-1.46-1.963a.426.426 0 0 1-.073-.215c0-.33.99-.945.99-1.49 0-.143-.73-2.09-.832-2.335-.143-.372-.214-.487-.6-.487-.187 0-.36-.043-.53-.043-.302 0-.53.115-.746.315-.688.645-1.032 1.318-1.06 2.264v.114c-.015.99.472 1.977 1.017 2.78 1.23 1.82 2.506 3.41 4.554 4.34.616.287 2.035.888 2.722.888.817 0 2.15-.515 2.478-1.318.13-.33.244-.73.244-1.088 0-.058 0-.144-.03-.215-.1-.172-2.434-1.39-2.678-1.39zm-2.908 7.593c-1.747 0-3.48-.53-4.942-1.49L7.793 24.41l1.132-3.337a8.955 8.955 0 0 1-1.72-5.272c0-4.955 4.04-8.995 8.997-8.995S25.2 10.845 25.2 15.8c0 4.958-4.04 8.998-8.998 8.998zm0-19.798c-5.96 0-10.8 4.842-10.8 10.8 0 1.964.53 3.898 1.546 5.574L5 27.176l5.974-1.92a10.807 10.807 0 0 0 16.03-9.455c0-5.958-4.842-10.8-10.802-10.8z" fill-rule="evenodd"></path></g></svg></span></a>
            <a role="button" tabindex="0" class="at-share-btn at-svc-facebook"><span class="at-icon-wrapper" style="background-color: #dc0032;"><svg fill="#fff" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></span></a>
            <a role="button" tabindex="0" class="at-share-btn at-svc-email"><span class="at-icon-wrapper" style="background-color: rgb(132, 132, 132);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-email-4" class="at-icon at-icon-email" style="fill: rgb(255, 255, 255);"><title id="at-svg-email-4">Email</title><g><g fill-rule="evenodd"></g><path d="M27 22.757c0 1.24-.988 2.243-2.19 2.243H7.19C5.98 25 5 23.994 5 22.757V13.67c0-.556.39-.773.855-.496l8.78 5.238c.782.467 1.95.467 2.73 0l8.78-5.238c.472-.28.855-.063.855.495v9.087z"></path><path d="M27 9.243C27 8.006 26.02 7 24.81 7H7.19C5.988 7 5 8.004 5 9.243v.465c0 .554.385 1.232.857 1.514l9.61 5.733c.267.16.8.16 1.067 0l9.61-5.733c.473-.283.856-.96.856-1.514v-.465z"></path></g></svg></span></a><div id="at4-scc" class="at-share-close-control ats-transparent at4-show at4-hide-content" title="Hide"></div></div><div id="at4-soc" class="at-share-open-control at-share-open-control-left ats-transparent at4-hide" title="Show"></div></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
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


<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>