<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> مدیریت <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="<?php echo e(url('/')); ?>" target="_blank"><img src="<?php echo e(logo()); ?>" style="margin-top: 10px;"></a>
                    </div>
                    <h4>
                        جزئیات قرارداد
                    </h4>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="<?php echo e(route('user-search')); ?>" method="post" style="width: 95%;">
                        <div class="row">
                            <div class="col-md-6 col-sm-6" style="padding-left: 0;">
                                <input type="text" name="search" class="form-control" placeholder="جستجو...">
                            </div>
                            <div class="col-md-6 col-sm-6" style="padding-right: 0;">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <?php echo e(csrf_field()); ?>

                    </form>
                    <table class="archive-table has-lines">
                        <tr>
                            <th>مبلغ کمیسیون</th>
                            <td><?php echo e($item->portion->calculate_type=='percentage'?number_format($item->price_sales-$item->price_buy):number_format($item->price)); ?> <span class="badge badge-light"><?php echo e($item->price_type); ?></span></td>
                        </tr>
                        <tr>
                            <th>سهم ها</th>
                            <th>سود</th>
                        </tr>
                        <?php if($item->portion->calculate_type=='percentage'): ?>
                            <?php $price=$item->price_sales-$item->price_buy ?>
                            <tr>
                                <td>
                                    سهم دارنده فایل
                                    <span class="badge badge-success"><?php echo e($item->villa->user?$item->villa->user->first_name.' '.$item->villa->user->last_name:'نا مشخص'); ?></span>
                                    <span class="badge badge-primary"><?php echo e($item->portion->villa_creator); ?>%</span>
                                </td>
                                <td><?php echo e(number_format(($price*$item->portion->villa_creator)/100)); ?> <span class="badge badge-light"><?php echo e($item->price_type); ?></span></td>
                            </tr>
                            <tr>
                                <td>
                                    سهم کارشناس
                                    <span class="badge badge-success"><?php echo e($item->expert?$item->expert->first_name.' '.$item->expert->last_name:'نا مشخص'); ?></span>
                                    <span class="badge badge-primary"><?php echo e($item->portion->expert); ?>%</span>
                                </td>
                                <td><?php echo e(number_format(($price*$item->portion->expert)/100)); ?> <span class="badge badge-light"><?php echo e($item->price_type); ?></span></td>
                            </tr>
                            <tr>
                                <td>
                                    سهم معرف
                                    <span class="badge badge-success"><?php echo e($item->user->user?$item->user->user->first_name.' '.$item->user->user->last_name:'نا مشخص'); ?></span>
                                    <span class="badge badge-primary"><?php echo e($item->portion->reagent); ?>%</span>
                                </td>
                                <td><?php echo e(number_format(($price*$item->portion->reagent)/100)); ?> <span class="badge badge-light"><?php echo e($item->price_type); ?></span></td>
                            </tr>
                            <tr>
                                <td>
                                    سهم معرف معرف
                                    <span class="badge badge-success"><?php echo e($item->user->user->user?$item->user->user->user->first_name.' '.$item->user->user->user->last_name:'نا مشخص'); ?></span>
                                    <span class="badge badge-primary"><?php echo e($item->portion->reagent_reagent); ?>%</span>
                                </td>
                                <td><?php echo e(number_format(($price*$item->portion->reagent_reagent)/100)); ?> <span class="badge badge-light"><?php echo e($item->price_type); ?></span></td>
                            </tr>
                            <tr>
                                <td>
                                    سهم خیریه
                                    <span class="badge badge-primary"><?php echo e($item->portion->charity); ?>%</span>
                                </td>
                                <td><?php echo e(number_format(($price*$item->portion->charity)/100)); ?> <span class="badge badge-light"><?php echo e($item->price_type); ?></span></td>
                            </tr>
                            <tr>
                                <td>
                                    سهم کال سنتر
                                    <span class="badge badge-primary"><?php echo e($item->portion->call_center); ?>%</span>
                                </td>
                                <td><?php echo e(number_format(($price*$item->portion->call_center)/100)); ?> <span class="badge badge-light"><?php echo e($item->price_type); ?></span></td>
                            </tr>
                            <tr>
                                <td>
                                    سهم خانه استانبول
                                    <span class="badge badge-primary"><?php echo e($item->portion->company); ?>%</span>
                                </td>
                                <td><?php echo e(number_format(($price*$item->portion->company)/100)); ?> <span class="badge badge-light"><?php echo e($item->price_type); ?></span></td>
                            </tr>
                            <tr>
                                <td>
                                    مبغ یدکی
                                </td>
                                <td>
                                    <?php if($item->villa): ?>
                                        <?php if($item->villa->yedki_percentage>0): ?>
                                            <?php echo e(number_format(($price*$item->villa->yedki_percentage)/100)); ?>

                                            <span class="badge badge-light"><?php echo e($item->price_type); ?></span>
                                        <?php else: ?>
                                            وارد نشده
                                        <?php endif; ?>
                                    <?php else: ?>
                                        وارد نشده
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php else: ?>
                        <tr>
                            <td>
                                سهم املاکی
                                <span class="badge badge-primary">1 از <?php echo e($item->portion->estate); ?></span>
                            </td>
                            <td><?php echo e($item->portion->estate!=0?$item->price/$item->portion->estate:0); ?> <span class="badge badge-light"><?php echo e($item->price_type); ?></span></td>
                        </tr>
                        <tr>
                            <td>
                                سهم کارشناس
                                <span class="badge badge-success"><?php echo e($item->expert?$item->expert->first_name.' '.$item->expert->last_name:'نا مشخص'); ?></span>
                                <span class="badge badge-primary">1 از <?php echo e($item->portion->expert); ?></span>
                            </td>
                            <td>
                                <?php if(is_numeric($item->portion->expert)): ?>
                                <?php echo e($item->portion->expert!=0?$item->price/$item->portion->expert:0); ?> <span class="badge badge-light"><?php echo e($item->price_type); ?></span>
                                <?php else: ?>
                                    <?php
                                        $array=[];
                                        $array=explode('+',$item->portion->expert);
                                    ?>
                                    <?php $__currentLoopData = $array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($portion!=0?$item->price/$portion:0); ?> <span class="badge badge-light"><?php echo e($item->price_type); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                سهم کارشناس معرف مشتری
                                <span class="badge badge-success"><?php echo e($item->user->user?$item->user->user->first_name.' '.$item->user->user->last_name:'نا مشخص'); ?></span>
                                <span class="badge badge-primary">1 از <?php echo e($item->portion->reagent); ?></span>
                            </td>
                            <td><?php echo e($item->portion->reagent!=0?$item->price/$item->portion->reagent:0); ?> <span class="badge badge-light"><?php echo e($item->price_type); ?></span></td>
                        </tr>
                        <tr>
                            <td>
                                سهم کارشناس معرف ملک
                                <span class="badge badge-success"><?php echo e($item->expert2?$item->expert2->first_name.' '.$item->expert2->last_name:'نا مشخص'); ?></span>
                                <span class="badge badge-primary">1 از <?php echo e($item->portion->experts_friend); ?></span>
                            </td>
                            <td><?php echo e($item->portion->experts_friend!=0?$item->price/$item->portion->experts_friend:0); ?> <span class="badge badge-light"><?php echo e($item->price_type); ?></span></td>
                        </tr>
                        <tr>
                            <td>
                                سهم دفتر
                                <span class="badge badge-primary">1 از <?php echo e($item->portion->office); ?></span>
                            </td>
                            <td><?php echo e($item->portion->office!=0?$item->price/$item->portion->office:0); ?> <span class="badge badge-light"><?php echo e($item->price_type); ?></span></td>
                        </tr>
                        <?php endif; ?>
                    </table>
                    <div class="col-md-12 mt-3">
                        <label for="file">پیوست قرارداد</label>
                        <a class="form-control text-center" href="<?php echo e(url($item->file)); ?>" target="_blank">دانلود</a>
                    </div>
                    <?php if($item->card_file): ?>
                    <div class="col-md-12 mt-3">
                        <label for="file">کارت ویزیت</label>
                        <a class="form-control text-center" href="<?php echo e(url($item->card_file)); ?>" target="_blank">دانلود</a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
    <?php $__env->startPush('scripts'); ?>
        <script>
            relatedFunc($("input[name='rent_by']:checked").val());
            $("input[name='rent_by']").click(function() {
                var radioValue = $("input[name='rent_by']:checked").val();
                relatedFunc(radioValue)
            });
            function relatedFunc(radioValue){
                if(radioValue=='estate'){
                    $('.estate_container').removeClass('d-none')
                }else{
                    $('.estate_container').addClass('d-none')
                }
            }
        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>
