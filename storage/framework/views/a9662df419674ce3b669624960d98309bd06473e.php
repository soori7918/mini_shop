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
                        <?php echo e($title); ?>

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
                            <th>نام مشتری</th>
                            <th>کارشناس</th>
                            <th>مشتری</th>
                            <th>علت کنسلی</th>
                            <th>عملیات</th>
                        </tr>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($item->user->first_name); ?> <?php echo e($item->user->last_name); ?>

                                    <?php if($item->user->questionnaire->account_status == 'active'): ?>
                                        <span class="badge badge-success">فعال</span>
                                    <?php elseif($item->user->questionnaire->account_status == 'pending'): ?>
                                        <span class="badge badge-warning">در انتظار تایید</span>
                                    <?php elseif($item->user->questionnaire->account_status == 'blocked'): ?>
                                        <span class="badge badge-secondary">مسدود شده</span>
                                    <?php endif; ?>

                                    <?php if($item->user->questionnaire->user): ?>
                                        <?php if($item->user): ?>
                                            <?php if($item->user->user): ?>
                                                <span
                                                        class="badge badge-warning">نام کارشناس معرف : <?php echo e($item->user->user->first_name .' ' . $item->user->user->last_name); ?></span>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($item->expert): ?>
                                        <?php echo e($item->expert->first_name); ?> <?php echo e($item->expert->last_name); ?>

                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?php echo e(route('customer-show', $item->user->id)); ?>" class="btn btn-sm btn-warning mr-1"><i class="fa fa-eye ml-1"></i>مشاهده</a>
                                </td>
                                <td><?php echo e($item->cancel_reasons); ?></td>
                                <td>
                                    <div class="d-flex">
                                        <?php if(!request()->type=='canceled'): ?>
                                            <a href="<?php echo e(route('contract-show',$item->id)); ?>" class="btn btn-info float-left mr-1">
                                                <i class="fa fa-check ml-1"></i>جزئیات
                                            </a>
                                        <?php endif; ?>
                                        
                                        
                                        
                                        
                                        
                                        
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
                
                <div class="modal" id="confirmModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="<?php echo e(route('contract-store')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">کنسل کردن معامله</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <input id="user_id" type="hidden" name="id" value="">

                                    <div class="col-md-12 mb-3">
                                        <label for="budget">مبلغ کمیسیون</label>
                                        <div class="p-relative">
                                            <input type="text" id="price" name="price" class="form-control price" maxlength="100">
                                            <select class="form-control priceTypePicker w-25" id="price_type" name="price_type">
                                                <?php $__currentLoopData = \App\User::currencies(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($key); ?>"><?php echo e($currency); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <div class="d-flex form-control mb-2">
                                            <input name="rent_by" id="rent_by_estate" value="estate" type="radio" class="ml-2">
                                            <label class="pt-1 w-100" for="rent_by_estate">
                                                توسط
                                                <mark><b>املاکی</b></mark>
                                                اجاره داده شده هست
                                            </label>
                                        </div>
                                        <div class="d-flex form-control mb-2">
                                            <input name="rent_by" id="rent_by_expert" value="expert" type="radio" class="ml-2">
                                            <label class="pt-1 w-100" for="rent_by_expert">
                                                توسط
                                                <mark><b>کارشناس</b></mark>
                                                اجاره داده شده هست
                                            </label>
                                        </div>
                                        <div class="d-flex form-control mb-2">
                                            <input name="rent_by" id="rent_by_experts_friend" value="experts_friend" type="radio" class="ml-2">
                                            <label class="pt-1 w-100" for="rent_by_experts_friend">
                                                توسط
                                                <mark><b>آشنای کارشناس</b></mark>
                                                اجاره داده شده هست
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-12 estate_container d-none">
                                        <div class="group-container">
                                            <h4 class="modal-title text-center">مشخصات املاکی</h4>
                                            <div class="col-md-12 mb-2">
                                                <label for="estate_name">نام املاکی</label>
                                                <input id="estate_name" name="estate_name" class="form-control" type="text">
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label for="estate_telephone">شماره تماس املاکی</label>
                                                <input id="estate_telephone" name="estate_telephone" class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>

                                    <style>
                                        .custom-file-label{
                                            padding-top: 7px;
                                            height: 31px;
                                        }
                                    </style>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <?php echo e(Form::label('name', 'پیوست')); ?>

                                            <div class="custom-file">
                                                <?php echo e(Form::file('file', array('accept' => 'image/*', 'class' => 'custom-file-input', 'id' => 'customFile'))); ?>

                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <textarea name="description" class="form-control" id="" cols="30" rows="4" placeholder="توضیحات..."></textarea>
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
                
                <div class="modal" id="denyModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="<?php echo e(route('user-refer-deny')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">کنسل کردن معامله</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <input id="deny_user_id" type="hidden" name="id" value="">
                                    <textarea name="cancel_reason" class="form-control" id="" cols="30" rows="10" placeholder="توضیحات"></textarea>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">کنسل کن</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
