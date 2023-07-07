
<?php $__env->startSection('content'); ?>
    <div style="background-image: url('<?php echo e(asset('img/header-bg.jpg')); ?>'); background-size: cover">
        <div class="container m-auto py-5">
            <div class="row py-5">
                <div class="col-md-8 d-flex align-items-center">
                    <div class="slogan-passport">
                        <h1>با خرید یک ملک در ترکیه شهروندی ترکیه را دریافت کنید</h1>
                        <h2 class="mt-5">و خدمات ما را رایگان دریافت کنید!</h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-form">
                        <div class="card-header">
                            درخواست تماس
                        </div>

                        <div class="card-body">
                            <form class="form-box" method="post" action="<?php echo e(route('front.passports.save')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label for="name">نام</label>
                                    <input type="text"
                                           class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>"
                                           id="name"
                                           name="name"
                                           maxlength="99"
                                           value="<?php echo e(old('name')); ?>"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">تلفن همراه</label>
                                    <input type="text"
                                           class="form-control <?php echo e($errors->has('phone') ? 'is-invalid' : ''); ?>"
                                           id="phone"
                                           name="phone"
                                           maxlength="15"
                                           value="<?php echo e(old('phone')); ?>"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label for="email">ایمیل</label>
                                    <input type="email"
                                           class="form-control <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>"
                                           id="email"
                                           name="email"
                                           maxlength="99"
                                           value="<?php echo e(old('email')); ?>"
                                           required>
                                </div>
                                <div class="form-group">
                            <textarea class="form-control <?php echo e($errors->has('message') ? 'is-invalid' : ''); ?>"
                                      id="message" name="message"
                                      placeholder="پیغام شما"><?php echo old('message'); ?></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 m-auto">
                                        <button type="submit" class="btn btn-block btn-primary">ثبت</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>