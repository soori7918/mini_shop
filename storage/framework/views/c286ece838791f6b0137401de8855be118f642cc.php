<nav class="main-navbar">
    <div class="container">
        <p class="float-left mt-4"><a href="<?php echo e(route('front-index')); ?>"><?php echo e($setting->title); ?></a></p>
        <?php if(auth()->guard()->guest()): ?>
                
            <?php else: ?>
                <div class="profile" data-direction="rtl">
                    <div class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->last_name); ?></a>
                        <div class="dropdown-menu">
                            <a href="<?php echo e(route('profile-show', Auth::user()->id)); ?>" class="dropdown-item"><i class="nc-icon users_single-02 mtp-2 ml-2"></i>پروفایل</a>
                            <a href="<?php echo e(route('profile-password', Auth::user()->id)); ?>" class="dropdown-item"><i class="nc-icon objects_key-25 mtp-2 ml-2"></i>تغییر رمز عبور</a>
                            <a href="javascript:void(0)" class="dropdown-item" onclick="$('.logout').submit()">
                                <form action="<?php echo e(route('logout')); ?>" method="POST" class="logout hidden"><?php echo e(csrf_field()); ?></form>
                                <i class="nc-icon media-1_button-power mtp-2 ml-2"></i>خروج
                            </a>
                        </div>
                    </div>
                </div>
                <div class="lang" data-direction="rtl">
                    <div id="google_translate_element"></div>
                </div>
        <?php endif; ?>
    </div>
</nav>