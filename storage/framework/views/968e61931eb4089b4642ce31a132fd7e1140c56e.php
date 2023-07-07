<?php echo $__env->make('panel.particle.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="app">
    <div class="main mt-4">
        <div class="view-content container" data-direction="rtl">
            <div class="row">
                <aside class="col-md-3">
                    <div class="card mb-4">
                        <div class="card-body archive-card-title">
                            <i class="fa fa-tv ml-2"></i>
                            <?php if(auth()->check() && auth()->user()->hasRole('مدیر')): ?>
                            به پنل مدیریت خوش آمدید
                            <?php endif; ?>
                            <?php if(auth()->check() && auth()->user()->hasRole('مدیر ملک')): ?>
                            به پنل مدیریت ملک خوش آمدید
                            <?php endif; ?>
                            <?php if(auth()->check() && auth()->user()->hasRole('کاربر')): ?>
                            به پنل کاربری خوش آمدید
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="archive-menu-container mb-4">
                        <ul class="nav nav-pills nav-stacked">
                            <?php if(auth()->check() && auth()->user()->hasRole('مدیر')): ?>
                            <li>
                                <label>مدیریت کاربران</label>
                                <ul class="nav nav-pills nav-stacked">
                                    <li>
                                        <a href="<?php echo e(route('user-list')); ?>">لیست کاربران سایت</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('user-property-list', 'role=3')); ?>">لیست مدیران ملک</a>
                                    </li>
                                </ul>
                            </li>
                            <?php endif; ?>
                            <?php if(auth()->check() && auth()->user()->hasRole('مدیر')): ?>
                            <li>
                                <label>مدیریت محتوا</label>
                                <ul class="nav nav-pills nav-stacked">
                                    <li>
                                        <a href="<?php echo e(route('post-category-list')); ?>">لیست دسته بندی نوشته‌ها</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('post-list')); ?>">لیست نوشته‌ها</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('comment-list')); ?>">لیست کامنت‌ها</a>
                                    </li>
                                </ul>
                            </li>
                            <?php endif; ?>
                            <?php if(auth()->check() && auth()->user()->hasRole('مدیر')): ?>
                            <li>
                                <label>مدیریت ملکها</label>
                                <ul class="nav nav-pills nav-stacked">
                                    <li>
                                        <a href="<?php echo e(route('villa-category-list')); ?>">لیست دسته بندی شرکت ها</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('property-list')); ?>">لیست ویژگی‌ها</a>
                                    </li>
                                    <?php
                                        $villa_pending = 0;
                                        if (Auth::user()->id == 1) {
                                            $villa_pending = App\Villa::where('status', 'pending')->get();
                                            $villa_pending = count($villa_pending);
                                        }
                                    ?>
                                    <li>
                                        <a href="<?php echo e(route('villa-list')); ?>">
                                            لیست ملک‌ها
                                            <?php if($villa_pending > 0): ?>
                                                <span class="badge badge-warning"><?php echo e($villa_pending); ?></span>
                                            <?php endif; ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('city-list')); ?>">لیست شهرها</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('location-list')); ?>">لیست مناطق</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('gallery-list')); ?>">گالری ملک</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('location-gallery-list')); ?>">گالری محله</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('insurance-list')); ?>">لیست بیمه ها</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('re-list')); ?>">لیست رزرو ها</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('upload-list')); ?>">لیست فایل ها</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('share-list')); ?>">لینک شبگه اجتماعی</a>
                                    </li>
                                </ul>
                            </li>
                            <?php endif; ?>
                            <?php if(auth()->check() && auth()->user()->hasRole('مدیر ملک')): ?>
                            <li>
                                <label>مدیریت ملکها</label>
                                <ul class="nav nav-pills nav-stacked">
                                    
                                    
                                    
                                    
                                    
                                    
                                    <li>
                                        <a href="<?php echo e(route('villa-list')); ?>">لیست ملک‌ها</a>
                                    </li>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                </ul>
                            </li>
                            <?php endif; ?>
                            <?php if(auth()->check() && auth()->user()->hasRole('مدیر')): ?>
                            <li>
                                <label>مدیریت اعضای خبرنامه</label>
                                <ul class="nav nav-pills nav-stacked">
                                    <li>
                                        <a href="<?php echo e(route('newsletter-list-home')); ?>">لیست عضوهای صفحه اصلی</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('newsletter-list-location')); ?>">لیست عضوهای هر محله</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('newsletter-list-villa')); ?>">لیست عضوهای هر ملک</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('newsletter-list-blog')); ?>">لیست عضوهای مجله</a>
                                    </li>
                                </ul>
                            </li>
                            <?php endif; ?>
                            <?php if(auth()->check() && auth()->user()->hasRole('مدیر')): ?>
                            <li>
                                <label>مدیریت سایت</label>
                                <ul class="nav nav-pills nav-stacked">
                                    <li>
                                        <a href="<?php echo e(route('travel-list')); ?>">پاراگراف های صفحه اصلی و حریم خصوصی</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('slider-list')); ?>">لیست اسلایدرها</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('visitlogs')); ?>">لیست بازدید‌ها</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('contacts-list')); ?>">لیست تماس‌ها</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('question-list')); ?>">لیست پرسش ها</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('abouts-list')); ?>">درباره ما</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('settings-list')); ?>">لیست تنظیمات</a>
                                    </li>
                                </ul>
                            </li>
                            <?php endif; ?>
                            <?php if(auth()->check() && auth()->user()->hasRole('مدیر')): ?>
                            <li>
                                <label>مدیریت آیکال</label>
                                <ul class="nav nav-pills nav-stacked">
                                    <li>
                                        <a href="<?php echo e(route('ical-list')); ?>">لیست آیکاله ها</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('ical-create','0')); ?>">ساخت آیکال</a>
                                    </li>
                                </ul>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </aside>
                <section class="view col-md-9">
                    <?php echo $__env->make('panel.messages.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo e(isset($body) ? $body : 'بدون محتوا'); ?>

                </section>
<?php echo $__env->make('panel.particle.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>