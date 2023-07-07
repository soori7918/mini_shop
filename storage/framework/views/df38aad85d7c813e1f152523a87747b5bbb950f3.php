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
                        گذرواژه جدید خود را وارد نمایید
                    </h3>
                </div>
                <?php echo e(Form::open(array('route' => 'resetPassword-update'))); ?>

                <input type="hidden" name="token" value="<?php echo e($token); ?>">
                <div class="control_box">
                    <label for="password" class="float-right">گذرواژه جدید</label>
                    <input name="password" type="password" class="text-left" style="direction: ltr" placeholder="گذرواژه جدید">
                </div>
                <div class="control_box">
                    <label for="password_confirmation" class="float-right">تکرار گذرواژه</label>
                    <input name="password_confirmation" type="password" class="text-left" style="direction: ltr" placeholder="تکرار گذرواژه">
                </div>
                <div class="control_box">
                    <ul class="ul">
                        <li class="w-100 text-left">
                            <button type="submit">ثبت</button>
                        </li>
                    </ul>
                </div>
                <?php echo e(Form::close()); ?>

            </div>
            <!-- The Modal -->
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>