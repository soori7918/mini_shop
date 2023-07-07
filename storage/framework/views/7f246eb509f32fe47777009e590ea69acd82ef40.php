
<?php $__env->startSection('style_css'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <div class="body">
        <div class="container py-5 mt-5">
            <div class="row py-2">
               <div class="col-4">
                   <div class="about_us_image">
                       <img src="<?php echo e(asset('user/pic/img-4.jpg')); ?>" />
                   </div>
               </div>
               <div class="col-8">
                   <div class="about_us">
                       <strong class="py-2">ما به مشتریان خود کمک می کنیم تا ملک خود را بدون دردسر پیدا کنند</strong>
                       <p>استیت فور استانبول با استفاده از تجربه استثنایی و دانش خود ، در مورد بازارهای ملکی ، به عنوان یک پایگاه گسترده مشتری مدار و متخصص آماده خدمتگزاری به مشتریان عزیز در سرتاسر استانبول است اعتماد شما سرمایه ماست ، آن را به بهترین شکل ممکن پاسخ می دهیم</p>
                       <ul>
                           <li><i class="fa fa-check px-2" ></i>پشتیبانی 24/7 در دسترس است</li>
                           <li><i class="fa fa-check px-2" ></i>دارای وکلای مجرب ترک</li>
                           <li><i class="fa fa-check px-2" ></i>دارای پروژه های اقساطی</li>
                           <li><i class="fa fa-check px-2" ></i>دارای پرونده های موفق شهروندی ترکیه</li>
                       </ul>
                   </div>
               </div>
            </div>
            <div class="row py-5">
               <div class="col-8  align-items-center justify-content-center">
                   <div class="about_us">

                       <strong class="py-2">از لحظه ورود شما به استانبول تا دریافت کلید

                           خانه رویائیتان همراه شما هستیم</strong>
                       <ul>
                           <li>
                               به هلدینگ پرآوازه و سازنده مطرح YIGIT GROUP با نام تجاری ESTATE 4 ISTANBUL خوش آمدید.
                           </li>
                           <li>
                               ما، ارائه دهنده خدمات پیشرو و مشاوره ای  مهاجرت در زمینه خرید ملک در کشور ترکیه هستیم.
                           </li>
                           <li>
                               با ESTATE 4 ISTANBUL سرمایه گذاریتان را شروع کنید ، شهروندی و پاسپورت ترکیه خود را در کمتر از 90 روز دریافت کنید.
                           </li>
                           <li>
                               هدف ما در هلدینگ YIGIT GROUP ارائه پرسودترین و باارزش ترین پیشنهاد ها برای خرید ملک و سرمایه گذاری در ترکیه است.
                           </li>
                       </ul>

                   </div>

               </div>
               <div class="col-4 py-2 align-items-center justify-content-center">
                   <div class="about_us_image">
                   <img src="<?php echo e(asset('user/pic/img-4.jpg')); ?>" />
                   </div>
               </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script_js'); ?> <?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>