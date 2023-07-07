<?php $__env->startComponent('layouts.auth1'); ?>
    <?php $__env->slot('title'); ?> پنل کارشناس <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <style>
            .w50{
                width: 50%!important;
            }
            ::-webkit-input-placeholder { /* Edge */
                text-align: right!important;
            }

            :-ms-input-placeholder { /* Internet Explorer 10-11 */
                text-align: right!important;
            }

            ::placeholder {
                text-align: right!important;
            }
            .log_des_box p
            {
                font-size: 13px;
            }
            .log_des_box p a
            {
                color: darkred;
                font-size: 15px;
                margin-right: 5px;
            }
        </style>
        
            
                
                    
                        
                    
                    
                
            
            
                
                
                    
                    
                
                
                    
                    
                
                
                    
                    
                
                
                
                
                
                
            
        
        <div class="uk-width-1-4@m uk-align-center cont_box_1">
            <div class="cont_box">
                <div class="title_box">
                    <h3>

                    ورود
                    </h3>
                </div>
                <?php echo e(Form::open(array('route' => 'login'))); ?>

                    <div class="control_box">
                        <label for="username" class="float-right">شماره مبایل</label>
                        <input name="username" type="text" class="text-left" style="direction: rtl" placeholder="بدون صفر(9121111111)">
                    </div>
                    <div class="control_box">
                        <label for="password" class="float-right">رمز عبور</label>
                        <input name="password" type="password" class="text-left" style="direction: ltr" placeholder="رمز عبور خود را وارد کنید">
                    </div>
                    <div class="control_box">
                        <ul class="ul">
                            <li class="check_box w50 text-right">
                                <input name="remember" type="checkbox" placeholder="">
                                مرا به خاطر بسپار
                            </li>
                            <li class="w50 text-left">
                                <button type="submit">ورود</button>
                            </li>
                        </ul>

                    </div>
                    <div class="log_des_box">
                        <p>کاربر جدید هستید؟<a href="<?php echo e(url('register')); ?>"> ثبت نام </a> در خانه استانبول</p>
                        <p class="text-centerr">
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#resetModal">رمز عبور خود را فراموش کرده ام</a>
                        </p>
                    </div>
                <?php echo e(Form::close()); ?>

            </div>
            <!-- The Modal -->
            <div class="modal" id="resetModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="<?php echo e(route('resetPassword')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h5 class="modal-title">رمز عبور خود را فراموش کرده ام!</h5>
                            <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body text-right">
                            <div class="col-md-12">
                                <label for="resetInput">شماره موبایل یا ایمیل خورد را وارد نمایید</label>
                                <input type="text" name="resetInput" class="form-control" id="resetInput" placeholder="شماره موبایل یا ایمیل" required>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">ارسال</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>