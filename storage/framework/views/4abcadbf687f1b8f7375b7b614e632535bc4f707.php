
<?php $__env->startSection('styles'); ?>
    <style>
        #accordion .card{
            margin-bottom: 20px;
            border: none;
        }
        #accordion .card-header{
            border: none;
            background: none;
        }
        #accordion .card-header .card-link{
            color: #000;
            margin-right: 30px;
            display: block;
        }
        #accordion .collapse{
            padding: .75rem 1.25rem;
        }
        #accordion .card-body{
            background: #f7f7f7;
            border-right: 1px solid #93171a;
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
        .img-title{
            width: 20px;
            position: absolute;
            top: 10px;
            right: 20px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container bg-white m-auto">
        <div class="row">

            <div id="accordion" class="col-md-12 my-5">

                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapse<?php echo e($key); ?>">
                            <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                            <?php echo e($item->question); ?>

                        </a>
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
                    <div id="collapse<?php echo e($key); ?>" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <?php echo e($item->answer); ?>

                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapse1">
                                <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                                آیا از راه دور در  ترکیه می توانیم خانه  خریداری کنیم؟
                            </a>
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
                        <div id="collapse1" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                بله شما به کمک وکیل خود می توانید روند قانونی خرید ملک در ترکیه را طی کنید
                            </div>
                        </div>
                    </div>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapse2">
                            <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                            اگـر در تــرکــیه زنـــدگـی نکـــنیــم فــقط بـا خرید خانه می توانیم اقامت آن کشور را بگیریم؟
                        </a>
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
                    <div id="collapse2" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            بـله شـما در هــرجای دنـیا که زندگی کنـید با خرید ملک در ترکیه می توانید دارای اقامت این کشور شوید
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapse3">
                            <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                            آیا می توان در همه ی  مناطق ترکیه خانه خرید؟
                        </a>
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
                    <div id="collapse3" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            بله شما با توجه به بودجه ای که برای خرید ملک در نظر گرفته اید می توانید در مناطق مختلف ترکیه ملک مورد نظر خود را خریداری کنید
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapse4">
                            <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                            آیـا بــا داشـــتـــن پـــاسپورت کــــشور ترکیه برای سفر به کشورهای اروپایی باید ویزا تهیه کرد؟
                        </a>
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
                    <div id="collapse4" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            بــسـتگی بــه کـــشور مــــورد نـــظرتان برای مقصد دارد، شــــمـــا بـــا پـــاسپورت کشــــور تـــرکیــه به 111 کشور بدون نیاز به ویزا می توانید سفر کنید
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapse5">
                            <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                            پاسپورت ترکیه تا چند سال اعتبار دارد؟
                        </a>
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
                    <div id="collapse5" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            پـــاســـپــورت کشور تـــرکـــیـــه تــا 10 سـال اعتبار دارد و پـس از آن هم قابل تمدید است
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapse6">
                            <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                            فرق پاســپورت ســـبز رنـــگ با پاسـپورت قــرمــز رنــگ چـــیه؟
                        </a>
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
                    <div id="collapse6" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            پاســــپورت ســـبز یا  ویـــژه ی 30   صـــــــفحه ای  کــــــه بــــــــا مــهر ویــــــژه هــــــــمـــراهــــــــــه، بـــــــه نمایندگان مجلس و مدیران و کارمندان درجه یک، دو و سه تعلق می گیره
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapse7">
                            <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                            آیا خونه هایی که خریداری  می شن بیمه دارن ؟
                        </a>
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
                    <div id="collapse7" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            خـــیر ولـــــی ما  مــــــی تـــونیم تو روند  بــــــیمه کردن خونتون  کــــــــــنارتـــون بـاشـــیم  و بـــهتون کمک کنیم
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapse8">
                            <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                            آیا هزینه ی زیادی بابت بــــیـــمه ی مــــنــــزل بـــاید پرداخت کرد؟
                        </a>
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
                    <div id="collapse8" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            خــــیر شما با 350 لیر یا حدودا 50 دلار می تونید خونتون رو بیمه کنید
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapse9">
                            <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                            این بیمه شامل چه حوادثی می شه؟
                        </a>
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
                    <div id="collapse9" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            ایـــن بیــــمه یـک بـــیمـــه ی اجــباریه کـه شــامــل حـــوادث آتــش ســـوزی،صاعقه،زلزله و انفـــجار بـــه مـــدت یـک سال می شه
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapse10">
                            <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                            با تـوجه به قیمـــت خـــونه نوع اقامـــت و شـــرایــط اون تغیــیر  می کنه؟
                        </a>
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
                    <div id="collapse10" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            بستگی به قیمت خونه ای که خــریداری مـی شه داره، از 250 هــزار دلـــار تا 1 میلیون دلار شرایطش یکسانه،اما اگر مـــبــلغ بیـــشــتر از یک میلیون دلـــار بـــاشــه ســـرمـــایه گــذاری مســـتقـــیم محـــسوب میشه و پاســــپـــورت سبــز رنـــگ بهــش تعلق می گیره
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapse11">
                            <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                            آیا سیستم آموزشی مدارس ترکیه شبیه به ایرانه؟
                        </a>
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
                    <div id="collapse11" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            بله سیستم آموزشی تـــرکـــیـــه بـــســـیار شــبیـــه به سیـــســتم آمـــوزشــــــــی ایــران مـــــی باشـد با این تفاوت که مـــدارس بین المللی و ایرانی هــم در این کشور وجود دارد
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapse12">
                            <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                            آیـا هـر شخـصی در مــدارس بین الــمللی مــی تواند ثبت نام کند ؟
                        </a>
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
                    <div id="collapse12" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            بله ، با این شرایط که دانـــش آمـــوز مـی بایستی در آزمـــون ورودی ایـــن مـــدارس شرکت کند، اگر سطح زبان و ســطح درسی دانش آموز بالا بــــاشـــد، از شرایط آسان تری بــــرای ثبـــت نــــام بـــرخــوردار خواهد شد
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapse13">
                            <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                            هزینه ی تحصیل در مدارس بــین المــــللی بــه چه صــورت است؟
                        </a>
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
                    <div id="collapse13" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            هــزینــه ی تــحصیل با توجه به ســـطح زبـــان دانـــش آموز و دروس تحصیلی تغییر می کند، امااین هزینه حدودا 10 هـــــــــزار دلــــار در سـال می باشد
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapse14">
                            <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                            آیا با ثبت نام در مدارس ایرانی مــی توان اقـــامت کشور ترکیه را گرفت؟
                        </a>
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
                    <div id="collapse14" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            خــیر ، بایــد حتما حداقل اقامت یکســـالــه داشـــته باشید، حــــتـــی بـــا اقــامــــت 6 مــاهه هم  نمی توانید ثبت نام کنید
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapse15">
                            <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                            هزینه ی ثبت نام مدارس ایرانی به چه صورت است؟
                        </a>
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
                    <div id="collapse15" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            شـــهریه ســـالانه ی این مدارس بـــیـــن 500 تا 1000 دلار می باشد
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapse16">
                            <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                            آیا زمانی که شهروند دایمی ترکیه شدم باید شهروندی فعلی خودم را باطل کنم؟
                        </a>
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
                    <div id="collapse16" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            خیر ، قوانین ترکیه اجازه مـــی دهــد شـــما شــــهرونــــدی دو تابعـــیتی یا چنـد تابعیتی داشته باشید، بستگی به قوانین کشور شما دار
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapse17">
                            <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                            آیا اگر پــــس از مدتی ملکی  که خــریداری کـرده بودیم را بفـــروشیــم اقامت خود را از دست می دهیم؟
                        </a>
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
                    <div id="collapse17" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            با فروش ملک شما اقامتی که از طریق خرید ملک گرفته بــــودید را از دســــت می دهـــــید زیــــرا دولت ترکیه این اقامـــــت را هر ساله تمدید می کند
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapse18">
                            <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                            آیـــا ایــــن قــــانون شامل ملک هایـــــی کـــــه بـــــا خـــــرید آنـــــها پاســـپورت تعلق می گیرد می شود؟
                        </a>
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
                    <div id="collapse18" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            خیر شما با خرید ملــک بـــــه ارزش 250 هـــــزار دلـــار یا بالاتر تابعیت و حق شهروندی ترکیه را می گیرید که با اقامت متفاوت است
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapse19">
                            <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                            آیا با هر گروه سنی می توان ملک خریداری کرد و سند به نام زد؟
                        </a>
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
                    <div id="collapse19" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            شـــما بـــا هر گروه سنی می توانید ملک خریداری کنید اما ســـند مـــلک فـــقــط به افراد بـــالـــای 18 سـال از نظر قانونی تعلق می گیرد
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapse20">
                            <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                            آیــــا قیــــمت خرید ملک برای اتبـــــــاع خــــــــــارجـی گران تر از شــــــــــــــهروند ترک است؟
                        </a>
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
                    <div id="collapse20" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            خیر قیمت خرید ملک بـــــرای تــــمای افـــراد، هم مهاجر هــــــم شـــــــهروند تـــرک یکسان است
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapse21">
                            <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                            اگـــر خــــانــــه ای کـــه خــریدیم مســــتـــاجــــر داشته باشد چه باید کرد؟
                        </a>
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
                    <div id="collapse21" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            کـــسی کــه می خواهد خانه را بــــفـروشد باید از یک مـــاه قـــبل به مـــستاجر بگوید که خــــانه را تخــــلیه کـــند، اگر مستاجر زمان داشته باشد در ایـــــن صــــورت بـــرای تــــخـــــلیه صاحب مــلک جدید می تواند 6 مـــاه بعد مستاجر را بیرون کند
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapse22">
                            <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                            آیـــا غیـــــر از شــهروندان ترک برای خرید ملک به خریداران وام تعلق می گیرد؟
                        </a>
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
                    <div id="collapse22" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            بــــله، بــــرای هـــر پـــــروژه متفاوت است، برای اطلاع دقیق از شرایط هر پروژه می توانید در مورد آن بپرسید
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapse23">
                            <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                            آیا برای نقل و انتقال سند باید مالیات پرداخت کرد؟
                        </a>
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
                    <div id="collapse23" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            بــله، 4 درصـــد از مـــــبـــلـــغ خــــریــــد مــــلـک که بصورت نصف بـیــن خریدار و فروشـنده تقسیم میـــشـود و 1 درصد هـم به عنوان مالـــــیات بــــر ارزش افــزوده که به عهده ی خریدار میباشد
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapse24">
                            <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                            آیا شرایط پرداخت مالیات برای همه به یک صورت است؟
                        </a>
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
                    <div id="collapse24" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            خـــــــیر، اگـــر بتــــوان ثابت کــرد که پـــول از خـــــــارج از کـــشور واریــــــــز شــــــــده اســــــت مـــــالــــک مــــــی تــــــواند هــــزیــــنــــــه ی یــــک درصـــــــدی کــــــه پــــرداخــــــت کـرده است را پس بگیر
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapse25">
                            <img src="<?php echo e(asset('new/img/icon/gear.png')); ?>" class="img-title" alt="">
                            آیــا کـــســـی کـــــه  در خــریـــد  ملـــــک شــــریک مــــی شــــــود  می تواند اقامـت و پاسپورت  تــــرکیــــه را دریـــافــــت کــنـــد؟
                        </a>
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
                    <div id="collapse25" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            خیــــر ، با خرید ملک فقط به یـک نــفر از اعـــضای خـــانــواده (کــــســـی کــــه ســــند ملک به نام اوســـــت) پــــاسپورت ، و به باقی اعضای خانواده ( همسر و فرزند زیر 18 سال ) اقامت دایم تعلق می گیرد
                        </div>
                    </div>
                </div>

            </div>

        </div>


    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>