
<?php $__env->startSection('content'); ?>
    <style>
        .top-header, .bottom-header {
            background: #404140;
            height: 120px;
        }

        .a-l {
            position: absolute;
            left: 0;
        }

        .a-l img {
            width: 230px;
            margin-top: -2px;
        }

        .a-r {
            position: absolute;
            right: 0;
            bottom: 0;
        }

        .a-r img {
            width: 230px;
            margin-bottom: -2px;
        }

        .year-container {
            position: absolute;
            bottom: -15px;
            right: 0;
        }

        .year-container img {
            width: 140px;
        }

        .box-style-3 {
            border: .02px solid var(--primary-color);
            position:relative;
            background-color:white;
        }

        .box-style-3:hover {
            box-shadow:0px 0px 50px #dc2c2c3d;
            transform:scale(1.03);
            z-index:3
        }
        .box-style-3:hover .title-container{
            margin-right: 50px !important;
        }
        .img-title{
            width: 40px;
            position: absolute;
            top: 15px;
            right: 0px;
        }
        .hrs .hr-r{
            border: 2px solid #93171a;
            margin-bottom: 0.5rem;
            margin-top: 0.5rem;
        }
        .hrs .hr-l{
            border: 2px solid #ed3537;
            margin-bottom: 0.5rem;
            margin-top: 0.5rem;
        }
        .title-container{
            margin-right: 20px;
            position: relative;
        }
        .content-container{
            padding-right: 20px;
            padding-left: 5px;
        }
        .title-container h1{
            color: #414141;
            font-size: 38px;
        }
        .title-container .empphasize{
            color: #de1f29;
        }
        .title-container .p-en{
            display: block;
            text-transform: uppercase;
            font-weight: 400;
            font-size: 22px;
        }
        @media(max-width: 768px)
        {
            .title-container h1{
                padding-right: 50px!important;
                font-size: 25px;
            }
            .title-container .p-en
            {
                font-size: 17px;
            }
        }
    </style>
    <div class="container bg-white m-auto">
        <div class="row">
            
            <div class="col-md-12 box-style-3">
                <div class="title-container">
                    <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                    <h1 class="text-primary-theme pt-3 mb-0 px-3 pr-5">
                        درباره
                        <span class="empphasize">ما</span>
                        <p class="p-en">
                            our
                            <span class="empphasize">profile</span>
                        </p>
                    </h1>
                </div>
                <div class="hrs col-md-4">
                    <div class="row">
                        <div class="col-6 p-0">
                            <hr class="hr-r">
                        </div>
                        <div class="col-6 p-0">
                            <hr class="hr-l">
                        </div>
                    </div>
                </div>
                <div class="content-container">
                    <p style="text-align: justify;">خانه استانبول شهرت خود را بر اساس قدرت مالی ، پاسخگویی سریع به فرصت های
                        موجود در بازار و سابقه عملکرد مثبت از طرف مشتریان؛ بدست آورده است.</p>
                    <p style="text-align: justify;">شرکت ما محدود به مرزهای املاک و مستغلات سنتی هنگام خرید ، فروش و اجاره یا
                        مدیریت دارایی نمی باشد ، درعوض ما همیشه روشهای جدیدی را برای برطرف کردن نیاز مشتریان خود ارائه
                        میدهیم تا بتوانیم همچنان پیشرو در صنعت املاک باشیم.</p>
                    <p style="text-align: justify;">تیم ما هنگام مراجعه و بررسی پروژه ها ، قبل از نمایش به مشتری ، اطمینان
                        حاصل میکند تا کلیه املاک در وضعیتی خوب ، موقعیت مکانی و نمای عالی قرار داشته باشند. ما همچنین به طور
                        مداوم در حال بررسی عملکرد نیروهای اقتصادی در بازار کار هستیم. و با هر معامله ، ما بر داشتن روشی خلاق
                        همراه با کاربرد منطقی اصول املاک تأکید می کنیم.</p>
                </div>
                <div class="hrs col-md-12">
                    <div class="row">
                        <div class="col-6 p-0">
                            <hr class="hr-r">
                        </div>
                        <div class="col-6 p-0">
                            <hr class="hr-l">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12 box-style-3">
                <div class="title-container">
                    <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                    <h1 class="text-primary-theme pt-3 mb-0 px-3 pr-5">
                        ماموریت
                        <span class="empphasize">ما</span>
                        <p class="p-en">
                            our
                            <span class="empphasize">mission</span>
                        </p>
                    </h1>
                </div>
                <div class="hrs col-md-4">
                    <div class="row">
                        <div class="col-6 p-0">
                            <hr class="hr-r">
                        </div>
                        <div class="col-6 p-0">
                            <hr class="hr-l">
                        </div>
                    </div>
                </div>
                <div class="content-container">
                    <p>با توسعه و فروش املاک و با حفظ بالاترین سطح خدمات ، در تلاش برای تبدیل شدن به موفق ترین و مورد
                        اعتماد ترین شرکت املاک در استانبول هستیم.</p>
                </div>
                <div class="hrs col-md-12">
                    <div class="row">
                        <div class="col-6 p-0">
                            <hr class="hr-r">
                        </div>
                        <div class="col-6 p-0">
                            <hr class="hr-l">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12 box-style-3">
                <div class="title-container">
                    <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                    <h1 class="text-primary-theme pt-3 mb-0 px-3 pr-5">
                        دیدگاه
                        <span class="empphasize">ما</span>
                        <p class="p-en">
                            our
                            <span class="empphasize">vision</span>
                        </p>
                    </h1>
                </div>
                <div class="hrs col-md-4">
                    <div class="row">
                        <div class="col-6 p-0">
                            <hr class="hr-r">
                        </div>
                        <div class="col-6 p-0">
                            <hr class="hr-l">
                        </div>
                    </div>
                </div>
                <div class="content-container">
                <p style="text-align: justify;">در تلاش برای تبدیل شدن به معتبرترین شرکت مشاوره املاک در بین جامعه
                    ایرانیان در ترکیه هستیم. همچنین به دنبال ایجاد یک علامت تجاری جدید در صنعت املاک و فراهم آوردن
                    شرایطی مطلوب برای افراد تا بتوانند در خانه ی رویاهایشان زندگی کنند</p>
                </div>
                <div class="hrs col-md-12">
                    <div class="row">
                        <div class="col-6 p-0">
                            <hr class="hr-r">
                        </div>
                        <div class="col-6 p-0">
                            <hr class="hr-l">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12 box-style-3">
                <div class="title-container">
                    <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                    <h1 class="text-primary-theme pt-3 mb-0 px-3 pr-5">
                        ارزش های
                        <span class="empphasize">ما</span>
                        <p class="p-en">
                            our
                            <span class="empphasize">core</span>
                            values
                        </p>
                    </h1>
                </div>
                <div class="hrs col-md-4">
                    <div class="row">
                        <div class="col-6 p-0">
                            <hr class="hr-r">
                        </div>
                        <div class="col-6 p-0">
                            <hr class="hr-l">
                        </div>
                    </div>
                </div>
                <div class="content-container">
                    <h5 style="color: #414141">حقیقت :</h5>
                    <p style="text-align: justify;">
                        ما هرگز برای رسیدن به فروش خود، حقیقت را از شما پنهان نمیکنیم. ما اطمینان می دهیم که در رابطه با
                        املاک و پروژه ها و اطلاعاتشان به شما همیشه حقیقت را ارائه می دهیم
                    </p>
                    <h5 style="color: #414141">مسئولیت پذیری :</h5>
                    <p style="text-align: justify;">
                        ما اطمینان می دهیم که هر یک از اعضای تیم ما به اندازه کافی مسئولیت پذیر هستند تا در رابطه با نیازها
                        و سوالات مشتریان به شکلی حرفه ای پاسخگو باشند
                    </p>
                    <h5 style="color: #414141">درک :</h5>
                    <p style="text-align: justify;">
                        درک نیاز مشتریان یکی از مهمترین بخش های خدماتی است که ارائه میکنیم. با دانستن اینکه نیاز آنها چیست،
                        میتوان بهترین و مناسب ترین گزینه ها را با ارزیابی دقیق شرایط افراد گزینش کرد
                    </p>
                </div>
                <div class="hrs col-md-12">
                    <div class="row">
                        <div class="col-6 p-0">
                            <hr class="hr-r">
                        </div>
                        <div class="col-6 p-0">
                            <hr class="hr-l">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12 box-style-3">
                <div class="title-container">
                    <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                    <h1 class="text-primary-theme pt-3 mb-0 px-3 pr-5">
                        <span class="empphasize">کار تیمی و</span>
                        مهارت
                        <p class="p-en">
                            skilled
                            <span class="empphasize">and</span>
                            teamwork
                        </p>
                    </h1>
                </div>
                <div class="hrs col-md-4">
                    <div class="row">
                        <div class="col-6 p-0">
                            <hr class="hr-r">
                        </div>
                        <div class="col-6 p-0">
                            <hr class="hr-l">
                        </div>
                    </div>
                </div>
                <div class="content-container">
                    <p style="text-align: justify;">هیچ کار بزرگی بدون داشتن یک تیم حرفه ای به موفقیت نمیرسد. افراد تیم ما در
                        کنار هم مدام در تلاش هستند تا زمینه را برای راحتی مشتریان عزیزمان فراهم کنند</p>
                    <h5 class="text-primary-theme pt-1 px-3" style="color: #414141">مهارت :</h5>
                    <p style="text-align: justify;">تیم متخصص ما آموزش های آکادمیک و حرفه ای مختلفی را پشت سر می گذارند تا
                        بتوانند به بهترین حالت پاسخگوی نیاز مشتریان باشند
                    </p>
                </div>
                <div class="hrs col-md-12">
                    <div class="row">
                        <div class="col-6 p-0">
                            <hr class="hr-r">
                        </div>
                        <div class="col-6 p-0">
                            <hr class="hr-l">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12 box-style-3">
                <div class="title-container">
                    <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                    <h1 class="text-primary-theme pt-3 mb-0 px-3 pr-5">
                        اهداف
                        <span class="empphasize">تجاری ما</span>
                        <p class="p-en">
                            business
                            <span class="empphasize">goal</span>
                        </p>
                    </h1>
                </div>
                <div class="hrs col-md-4">
                    <div class="row">
                        <div class="col-6 p-0">
                            <hr class="hr-r">
                        </div>
                        <div class="col-6 p-0">
                            <hr class="hr-l">
                        </div>
                    </div>
                </div>
                <div class="content-container">
                    <h5 class="text-primary-theme pt-1 px-3" style="color: #414141">افزایش سودآوری :</h5>
                    <p style="text-align: justify;">
                        با تمرکز در فروش و بازاریابی شبکه ای و در عین حال کاهش هزینه های شرکت در تلاش برای افزایش سود شرکت و ارائه ی بهتر خدمات به شما عزیزان هستیم
                    </p>
                    <h5 class="text-primary-theme pt-1 px-3" style="color: #414141">افزایش بهره وری و مهارت کارمندان :</h5>
                    <p style="text-align: justify;">
                        با انجام یک آموزش ماهانه به طور منظم در تلاش برای افزایش مهارت و بروز کردن دانش کارکنان خود هستیم
                    </p>
                    <h5 class="text-primary-theme pt-1 px-3" style="color: #414141">خدمات با کیفیت بالا :</h5>
                    <p style="text-align: justify;">
                        برای اطمینان از رضایت همه مشتریان در تلاش برای بالاتر بردن کیفیت خدمات شرکت هستیم
                    </p>
                </div>
                <div class="hrs col-md-12">
                    <div class="row">
                        <div class="col-6 p-0">
                            <hr class="hr-r">
                        </div>
                        <div class="col-6 p-0">
                            <hr class="hr-l">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12 box-style-3">
                <div class="title-container">
                    <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                    <h1 class="text-primary-theme pt-3 mb-0 px-3 pr-5">
                        خدمات
                        <span class="empphasize">ما</span>
                        <p class="p-en">
                            our
                            <span class="empphasize">services</span>
                        </p>
                    </h1>
                </div>
                <div class="hrs col-md-4">
                    <div class="row">
                        <div class="col-6 p-0">
                            <hr class="hr-r">
                        </div>
                        <div class="col-6 p-0">
                            <hr class="hr-l">
                        </div>
                    </div>
                </div>
                <div class="content-container">
                    <p style="text-align: justify;">
                        <p class="mb-1">ارائه خدمات مشاوره براي خرید املاك</p>
                        <p class="mb-1">تحقیق و بررسی موقعیتهاي سرمایه گذاري</p>
                        <p class="mb-1">معرفی پروژه هاي ساختمانی در حال ساخت و آماده تحویل</p>
                        <p class="mb-1">برگزاری تور بازدید از پروژه های برتر استانبول</p>
                        <p class="mb-1">مدیریت حراج و قیمت فروش و مشاوره در زمینه سود و ریسک خرید املاك</p>
                        <p class="mb-1">ارائه تاریخچه و آمار از روند تغییرات قیمت املاك در مناطق مختلف در ترکیه</p>
                        <p class="mb-1">انجام و پیگیري کلیه مراحل اداري و ثبتی جهت دریافت سند مالکیت</p>
                    </p>
                </div>
                <div class="hrs col-md-12">
                    <div class="row">
                        <div class="col-6 p-0">
                            <hr class="hr-r">
                        </div>
                        <div class="col-6 p-0">
                            <hr class="hr-l">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12 box-style-3">
                <div class="title-container">
                    <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                    <h1 class="text-primary-theme pt-3 mb-0 px-3 pr-5">
                        تیم
                        <span class="empphasize">ما</span>
                        <p class="p-en">
                            <span class="empphasize">our</span>
                            team
                        </p>
                    </h1>
                </div>
                <div class="hrs col-md-4">
                    <div class="row">
                        <div class="col-6 p-0">
                            <hr class="hr-r">
                        </div>
                        <div class="col-6 p-0">
                            <hr class="hr-l">
                        </div>
                    </div>
                </div>
                <div class="content-container">
                    <p style="text-align: justify;">
                        خانه استانبول متشکل از پرسنل بسیار مجرب است که برای اطمینان از موفقیت شرکت با دقت انتخاب می شوند. ما به طور منظم جلسات بررسی ایده و نظرات کارکنان را برگزار می کنیم تا از روندهای نوظهور عقب نیفتیم و پا به پای استاندارد جهانی پیش رویم
                    </p>
                </div>
                <div class="hrs col-md-12">
                    <div class="row">
                        <div class="col-6 p-0">
                            <hr class="hr-r">
                        </div>
                        <div class="col-6 p-0">
                            <hr class="hr-l">
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="col-md-12 text-center py-4">
                <img style="width: 400px" src="<?php echo e(asset('new/img/ab-pic-min.png')); ?>" alt="">
            </div>
            
        </div>


    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>