
<?php $__env->startSection('style_css'); ?>
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"  />
    <style>
        .swiper {
            width: 100%;
        }
        .search_item{
            background-color: white;
            border: none;
        }
        .filter-option-inner-inner{
            text-align: right;
        }
        /*body{*/
        /*    background-color: #f9f9f9;*/
        /*}*/

    </style>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <div class="body">

    <section class="slider">
        <div class="slider_box position-relative">
            <?php if(count($slider_desktop)): ?>
                <div class="swiper  swiper_slider position-relative ">

                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper ">

                        <!-- Slides -->
                        <?php $__currentLoopData = $slider_desktop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($slider->photo): ?>
                                <div class="swiper-slide position-relative">
                                    <img src="<?php echo e(url($slider->photo->path)); ?>" class="img_slider"  alt="vandidad">
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            <?php endif; ?>
            <div class="swiper__container ">
                <div class="container align-self-center">
                    <div class="row ">
                        <div class="col-lg-7 col-12">
                            <div class="banner-detail-box text-start ">
                                <h3 class="text-white py-3">به هلدینگ Estate 4 istanbul </h3>
                                <p  class="text-white">با خیال آسوده ، مستقیم از سازنده خرید کنید,با خیال آسوده ، مستقیم از سازنده خرید کنید,با خیال آسوده ، مستقیم از سازنده خرید کنید</p>
                                <a class="btn btn-light btn--active">رزرو مشاوره رایگان</a>
                                <a class="btn btn-light">اولین پیشنهاد پروژه  AKKENT plus</a>
                            </div>
                        </div>
                        <div class="col-lg-5 col-12 d-flex align-items-center justify-content-center ">
                            <form method="get" class="mx-auto">
                                <div class="banner-search-box">
                                    <div class="search-contents">
                                        <div class="form-group mx-1 py-2">
                                            <div class="dropdown bootstrap-select text-right">
                                                <select class="selectpicker search-fields text-right" name="area_from">
                                                    <option class="text-right">متراژ</option>
                                                    <option value="1000">1000</option>
                                                    <option value="800">800</option>
                                                    <option value="600">600</option>
                                                    <option value="400">400</option>
                                                    <option value="200">200</option>
                                                    <option value="100">100</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mx-1 py-2">
                                            <div class="dropdown bootstrap-select search-fields">
                                                <select class="selectpicker search-fields" name="room">
                                                    <option>تعداد اتاق</option>
                                                    <option value="8">8</option>
                                                    <option value="6">6</option>
                                                    <option value="4">4</option>
                                                    <option value="2">2</option>
                                                    <option value="1">1</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mx-1 py-2">
                                            <div class="dropdown bootstrap-select search-fields">
                                                <select class="selectpicker search-fields" name="bathroom">
                                                    <option>تعداد حمام</option>
                                                    <option value="4">4</option>
                                                    <option value="3">3</option>
                                                    <option value="2">2</option>
                                                    <option value="1">1</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mx-1 py-2">
                                            <input type="text" class="form-control" name="price" placeholder="شروع قیمت از">
                                        </div>
                                        <div class="form-group mx-1 py-2">
                                            <button type="submit"  class="btn btn-light w-100">جستجوی ملک</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
        <section class="project_section py-5">
            <div class="container">
                <div class="section_title py-5">
                    <h3 class="py-3">جدیدترین پروژه ها</h3>
                    <div class="section_title_border"></div>
                </div>
                <div class="project_section__navbar mb-2">
                    <div class="row">
                        <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-3 col-12">
                                <div data-aos="fade-left"
                                     data-aos-anchor="#example-anchor"
                                     data-aos-offset="500"
                                     data-aos-duration="500">

                                <a href="<?php echo e(route('user.project.show',$project->slug)); ?>">
                                    <div class="project_item bg-white shadow-sm rounded-sm my-2">
                                        <div class="project_image position-relative">
                                            <img src="<?php echo e($project->image ?: ''); ?>" />
                                            <div class="project_image_detail "></div>
                                            <div class="project_image_detail_1 text-white d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa fa-map-marker  px-2"></i>
                                                    <small><?php echo e($project->getProjectCountry()."/".$project->getProjectCity()."/".$project->getProjectLocation()); ?></small>
                                                </div>
                                                <div class="d-flex align-items-center  justify-content-center">
                                                    <i class="fa fa-eye small px-2"></i>
                                                    <small><?php echo e(number_format($project->seen)); ?></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="project_content p-2">
                                            <div class="project_content_description d-flex flex-column">
                                                <strong class="py-2"><?php echo e($project->title); ?></strong>
                                                <span class="py-2 text-warning font-weight-bold"><?php echo e($project->price_label); ?> $ <?php echo e($project->start_price); ?></span>
                                                <p><?php echo e(str_limit($project->short_description, 30)); ?></p>
                                            </div>
                                            <div class="project_content_footer py-2 d-flex align-items-center justify-content-between">
                                                <ul class="project_detail">
                                                    <li class="px-2"><i class="fa fa-superscript px-2" aria-hidden="true"></i><?php echo e($project->area); ?></li>
                                                    <li class="px-2"><i class="fa fa-bed px-2" aria-hidden="true"></i><?php echo e($project->bedroom); ?></li>
                                                    <li class="px-2"><i class="fa fa-bath px-2" aria-hidden="true"></i><?php echo e($project->bathroom); ?></li>
                                                </ul>

                                                
                                                
                                                
                                                
                                                

                                                

                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="counters-1  bg-white p-4 my-3 ">
            <div class="container p-3 rounded-sm">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 ">
                        <div class="container-box-1 m-1 delay-04s">
                            <i class="fa  py-3 fa-cubes text-dark" aria-hidden="true" style="font-size: 25px"></i>
                            <h2 class="py-2 text-warning" id="project_counter"></h2>
                            <h5 class="py-1 text-dark">تعداد پروژه ها</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 ">
                        <div class="container-box-1 m-1 delay-04s">
                            <i class="fa py-3 fa-gift text-dark" style="font-size: 25px"></i>
                            <h2 class="py-2 text-warning" id="article_counter"></h2>
                            <h5 class="py-1 text-dark">تعداد مقالات</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 ">
                        <div class="container-box-1 m-1 delay-04s">
                            <i class="fa py-3 fa-home text-dark" style="font-size: 25px"></i>
                            <h2 class="py-2 text-warning" id="city_counter"></h2>
                            <h5 class="py-1 text-dark">تعداد شهرها</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 ">
                        <div class="container-box-1 m-1 delay-04s">
                            <i class="fa py-3 fa-users text-dark" style="font-size: 25px"></i>
                            <h2 class="py-2 text-warning" id="agent_counter"></h2>
                            <h5 class="py-1 text-dark">تعداد نمایندگان</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="article-section">
            <div class="container">
                <div class="section_title py-5">
                    <h3 class="py-3">جدیدترین اخبار و مقالات</h3>
                    <div class="section_title_border"></div>
                </div>
                <div class="row py-2">

                    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-12">
                            <a href="<?php echo e(route('user.blog.show',$article->slug)); ?>">
                                <div class="project_item bg-white shadow-sm rounded-sm my-2">
                                    <div class="project_image position-relative">
                                        <img src="<?php echo e($article->photo?url($article->photo):url('assets/user/pic/blog1.jpg')); ?>" alt="<?php echo e($article->title); ?>" />
                                        <div class="project_image_detail "></div>
                                        <div class="project_image_detail_1 text-white d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                
                                                
                                            </div>
                                            <div class="d-flex align-items-center  justify-content-center">
                                                <i class="fa fa-eye small px-2"></i>
                                                <small><?php echo e(number_format($article->seen)); ?></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="project_content p-2">
                                        <div class="project_content_description d-flex flex-column">
                                            <strong class="py-2"><?php echo e($article->title); ?></strong>
                                            
                                            
                                        </div>
                                        <div class="project_content_footer py-2 d-flex align-items-center justify-content-between">

                                            <div class="project_content_footer_author d-flex align-items-center justify-content-between">
                                                <div class="icon d-flex">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <span class="mx-2"><?php echo e($article->user->first_name); ?></span>

                                            </div>

                                            <div class="project_content_footer_icon d-flex align-items-center justify-content-center">
                                                <i class="far fa-calendar-alt px-2"></i><?php echo e(my_jdate($article->created_at,'Y/m/d')); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>

        <section class="content bg-white py-lg-3">
                <div class="container">
                    <div class="element-box  py-3">
                        <?php $__currentLoopData = $project_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="element-box__item d-flex m-2 flex-column align-items-center shadow-sm py-4">
                                <div class="element-box__item__icon py-2">
                                    <?php if($project_category->type== "icon"): ?>
                                        <?php echo $project_category->icon; ?>

                                    <?php else: ?>
                                        <img src="<?php echo e(url($project_category->image ? $project_category->image : '')); ?>" width="50px" height="50px" />
                                    <?php endif; ?>
                                </div>
                                <strong><?php echo e($project_category->title); ?></strong>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </section>
        <section class="project_section py-lg-4">
            <div class="container">
                <div class="section_title py-5">
                    <h3 class="py-3">محبوب ترین شهرها</h3>
                    <div class="section_title_border"></div>
                </div>
                <div class="project_section__navbar mb-2">
                    <div class="row">

                                <div class="col-lg-4 col-12">
                                    <div class="row">
                                            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($key ==0 || $key == 1): ?>
                                                    <div class="col-12 my-2 col-lg-12">
                                                <a href="<?php echo e(route('user.project.show',$city->id)); ?>">
                                                    <div class="project_item bg-white shadow-sm rounded-sm">
                                                        <div class="project_image position-relative">
                                                            <?php $__currentLoopData = $city->photos->take(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <img src="<?php echo e(url($photo->path)); ?>" />
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="city_image_detail_1 text-dark d-flex align-items-center justify-content-between">
                                                                <div class="d-flex align-items-center">
                                                                    <small><?php echo e($city->name); ?></small>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-12">
                                    <div class="row" style="height: 100%">
                                            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($key == 2): ?>
                                                    <div class="col-12 my-2 col-lg-12">
                                                <a href="<?php echo e(route('user.project.show',$city->id)); ?>">
                                                    <div class="project_item bg-white shadow-sm rounded-sm" style="height: 100%">
                                                        <div class="project_image position-relative"  style="height: 100%">
                                                            <?php $__currentLoopData = $city->photos->take(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <img src="<?php echo e(url($photo->path)); ?>" />
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="city_image_detail_1 text-dark d-flex align-items-center justify-content-between">
                                                                <div class="d-flex align-items-center">
                                                                    <small><?php echo e($city->name); ?></small>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-12">
                                    <div class="row">
                                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($key ==3 || $key == 4): ?>
                                                <div class="col-12 my-2 col-lg-12">
                                                    <a href="<?php echo e(route('user.project.show',$city->id)); ?>">
                                                        <div class="project_item bg-white shadow-sm rounded-sm">
                                                            <div class="project_image position-relative">
                                                                <?php $__currentLoopData = $city->photos->take(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <img src="<?php echo e(url($photo->path)); ?>" />
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="city_image_detail_1 text-dark d-flex align-items-center justify-content-between">
                                                                    <div class="d-flex align-items-center">
                                                                        <small><?php echo e($city->name); ?></small>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>

                    </div>

                </div>
            </div>
        </section>

        <section class="project_section py-lg-4">
            <div class="container">
                <div class="section_title py-5">
                    <h3 class="py-3">نمایندگان ما</h3>
                    <div class="section_title_border"></div>
                </div>
                <div class="project_section__navbar mb-2">
                    <div class="row">
                        <?php $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-12">
                            <a href="<?php echo e(route('user.agent.show',$agent->slug)); ?>">
                                <div class="project_item bg-white shadow-sm rounded-sm">
                                <div class="project_image position-relative">
                                    <img src="<?php echo e($agent->photo ?: ''); ?>" />
                                    <div class="project_image_detail "></div>
                                    <div class="project_image_detail_1 text-white d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <small><?php echo e($agent->name); ?></small>
                                        </div>

                                    </div>
                                </div>
                                <div class="project_content p-2">
                                    <div class="project_content_description d-flex flex-column">
                                        <strong class="py-2"><?php echo e($agent->name); ?></strong>
                                        <p><?php echo str_limit($agent->description, 30); ?> </p>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script_js'); ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        const swiper = new Swiper('.swiper_slider', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
            autoplay: {
                delay: 5000,
            },
        });

        $(function () {
            $('select').selectpicker();
        });

        let upto=0;
        let upto1=0;
        let upto2=0;
        let upto3=0;


        let project_counts=setInterval(updatedProject);
        function updatedProject(){
            let count= document.getElementById("project_counter");
            count.innerHTML=++upto;
            if(upto === 200) {
                clearInterval(project_counts);
            }
        }


        let article_counts=setInterval(updatedArticle);
        function updatedArticle(){
            let count= document.getElementById("article_counter");
            count.innerHTML=++upto1;
            if(upto1 === 150) {
                clearInterval(article_counts);
            }
        }


        let city_counts=setInterval(updatedCity);
        function updatedCity(){
            let count= document.getElementById("city_counter");
            count.innerHTML=++upto2;
            if(upto2 === 100) {
                clearInterval(city_counts);
            }
        }

        let agent_counts=setInterval(updatedAgent);
        function updatedAgent(){
            let count= document.getElementById("agent_counter");
            count.innerHTML=++upto3;
            if(upto3 === 10) {
                clearInterval(agent_counts);
            }
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>