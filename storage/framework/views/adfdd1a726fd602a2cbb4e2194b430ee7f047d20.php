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
                        لیست ارجاع
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
                            <th>نام</th>
                            <th>کارشناس</th>
                            <th>نوع مشتری</th>
                            <th>موبایل</th>
                            <th>منزل مد نظر</th>
                            <th>منظره</th>
                            <th>مناطق</th>
                            <th>امکانات داخلی</th>
                            <th>امکانات رفاهی</th>
                            <th>حیوان خانگی</th>
                            <th>وسیله نقلیه</th>
                            <th>حداکثر سال ساخت</th>
                            <th>بودجه</th>
                            <th>دلیل کنسلی</th>
                            <?php if(auth()->user()->hasRole('مدیر')): ?>
                            <th>تاریخ ثبت مشتری</th>
                            <th>تاریخ ثبت ارزیابی</th>
                            <th>تاریخ ثبت ارجاع</th>
                            <th>تعداد بازدید تا امروز</th>
                            <th>تعداد ارجاع کارشناس</th>
                            <?php endif; ?>
                            <?php if(auth()->user()->hasRole('call center') || auth()->user()->hasRole('call center(sales)')): ?>
                            <th>مشخصات مشتری</th>
                            <th>گزارش کارشناس</th>
                            <?php endif; ?>
                            <th>عملیات</th>
                        </tr>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>

                                    <?php if($user->questionnaire->account_status == 'active'): ?>
                                        <span class="badge badge-success">فعال</span>
                                    <?php elseif($user->questionnaire->account_status == 'pending'): ?>
                                        <span class="badge badge-warning">در انتظار تایید</span>
                                    <?php elseif($user->questionnaire->account_status == 'blocked'): ?>
                                        <span class="badge badge-secondary">مسدود شده</span>
                                    <?php endif; ?>

                                    <?php if(!auth()->user()->hasRole('مدیر ملک')): ?>
                                    <?php if($user->questionnaire->user): ?>
                                    <?php if($user->user): ?>
                                        <span
                                                class="badge badge-warning">نام کارشناس معرف : <?php echo e($user->user->first_name .' ' . $user->user->last_name); ?></span>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo e($user->refer?$user->refer->first_name.' '.$user->refer->last_name:''); ?>

                                </td>
                                <td>
                                    <?php if(!is_null($user->type_request)): ?>
                                        <?php
                                            $is_serialized=is_serialized($user->type_request);
                                        ?>
                                        <?php if(!$is_serialized): ?>
                                            <?php echo e($user->type_request == 'rent' ? 'اجاره' : 'خرید'); ?>

                                        <?php else: ?>
                                            <?php if(gettype(unserialize($user->type_request))=='array'): ?>
                                                <?php $__currentLoopData = unserialize($user->type_request); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e($property == 'rent' ? 'اجاره' : 'خرید'); ?> ,
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo e($user->mobile); ?>

                                </td>
                                <td>
                                    <?php
                                        $is_serialized=is_serialized($user->questionnaire->property_type);
                                    ?>
                                    <?php if(!$is_serialized): ?>
                                        <?php echo e(\App\Villa::types()[$user->questionnaire->property_type]); ?>

                                    <?php else: ?>
                                        <?php if(gettype(unserialize($user->questionnaire->property_type))=='array'): ?>
                                            <?php $__currentLoopData = unserialize($user->questionnaire->property_type); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e(\App\Villa::types()[$property]); ?> ,
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php
                                        $is_serialized=is_serialized($user->questionnaire->villa_view);
                                    ?>
                                    <?php if(!$is_serialized): ?>
                                        <?php echo e(\App\Villa::types()[$user->questionnaire->villa_view]); ?>

                                    <?php else: ?>
                                        <?php if(gettype(unserialize($user->questionnaire->villa_view))=='array'): ?>
                                            <?php $__currentLoopData = unserialize($user->questionnaire->villa_view); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($property); ?> ,
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if(!is_null($user->location)): ?>
                                        <?php
                                            $is_serialized=is_serialized($user->location);
                                        ?>
                                        <?php if($is_serialized): ?>
                                            <?php if(gettype(unserialize($user->location))=='array'): ?>
                                                <?php $__currentLoopData = unserialize($user->location); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                    <?php echo e($property); ?> ,
                                                    
                                                    
                                                    
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php
                                        $is_serialized=is_serialized($user->questionnaire->properties_in);
                                    ?>
                                    <?php if(!$is_serialized): ?>
                                        <?php echo e(\App\Villa::types()[$user->questionnaire->properties_in]); ?>

                                    <?php else: ?>
                                        <?php if(gettype(unserialize($user->questionnaire->properties_in))=='array'): ?>
                                            <?php $__currentLoopData = unserialize($user->questionnaire->properties_in); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e(\App\Property::find($property)["name"]); ?> ,
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php
                                        $is_serialized=is_serialized($user->questionnaire->properties_out);
                                    ?>
                                    <?php if(!$is_serialized): ?>
                                        <?php echo e(\App\Villa::types()[$user->questionnaire->properties_out]); ?>

                                    <?php else: ?>
                                        <?php if(gettype(unserialize($user->questionnaire->properties_out))=='array'): ?>
                                            <?php $__currentLoopData = unserialize($user->questionnaire->properties_out); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e(\App\Property::find($property)["name"]); ?> ,
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($user->questionnaire->pet); ?></td>
                                <td><?php echo e($user->questionnaire->vehicle); ?></td>
                                <td><?php echo e($user->questionnaire->built_year); ?></td>
                                <td><?php echo e($user->questionnaire->price); ?> <?php echo e($user->questionnaire->price_type); ?></td>
                                <td><?php echo e($user->questionnaire->cancel_reasons); ?></td>
                                <?php if(auth()->user()->hasRole('مدیر')): ?>
                                <td><?php echo e($user->created_at); ?></td>
                                <td><?php echo e($user->questionnaire->created_at); ?></td>
                                <td><?php echo e($user->referred_at); ?></td>
                                <td>0</td>
                                <td><?php echo e($user->referred_count); ?></td>
                                <?php endif; ?>
                                <?php if(auth()->user()->hasRole('call center') || auth()->user()->hasRole('call center(sales)')): ?>
                                <td class="text-center">
                                    <a href="<?php echo e(route('customer-show', $user->id)); ?>" class="btn btn-sm btn-warning mr-1"><i class="fa fa-eye ml-1"></i>مشاهده</a>
                                </td>
                                <td>
                                <?php if($user->refer_report): ?>
                                    <a href="javascript:void(0)" data-target="#reportModal"  data-userId="<?php echo e($user->id); ?>" data-report="<?php echo e($user->refer_report); ?>" data-toggle="modal" class="btn btn-success float-left mr-1 report">
                                        <i class="fa fa-pencil ml-1"></i>مشاهده گزارش
                                    </a>
                                <?php endif; ?>
                                </td>
                                <?php endif; ?>
                                <td>
                                    <div class="d-flex">
                                        <?php if(auth()->user()->hasRole('call center') || auth()->user()->hasRole('call center(sales)')): ?>
                                            <?php if($user->referee): ?>
                                                <?php if($user->referee->hasRole('call center')): ?>
                                                <a href="javascript:void(0)" data-target="#confirmRentModal" onclick="$('.user_id').val('<?php echo e($user->id); ?>');$('.confirm_refer_id').val('<?php echo e($user->refer_id); ?>');" data-toggle="modal" class="btn btn-info float-left mr-1">
                                                    <i class="fa fa-check ml-1"></i>تایید قرارداد
                                                </a>
                                                <?php else: ?>
                                                <a href="javascript:void(0)" data-target="#confirmSalesModal" onclick="$('.user_id').val('<?php echo e($user->id); ?>');$('.confirm_refer_id').val('<?php echo e($user->refer_id); ?>');" data-toggle="modal" class="btn btn-info float-left mr-1">
                                                    <i class="fa fa-check ml-1"></i>تایید قرارداد
                                                </a>



                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <a href="javascript:void(0)" data-target="#cancelModal" onclick="$('#cancel_id').val('<?php echo e($user->id); ?>');$('#cancel_refer_id').val('<?php echo e($user->refer_id); ?>');" data-toggle="modal" class="btn btn-danger float-left mr-1">
                                                <i class="fa fa-ban ml-1"></i>کنسل قرارداد
                                            </a>
                                        <?php endif; ?>
                                        <?php if(auth()->check() && auth()->user()->hasRole('مدیر ملک')): ?>
                                            <a href="javascript:void(0)" data-target="#reportModal" data-userId="<?php echo e($user->id); ?>" data-report="<?php echo e($user->refer_report); ?>" data-toggle="modal" class="btn btn-success float-left mr-1 report">
                                                <i class="fa fa-pencil ml-1"></i>ثبت گزارش
                                            </a>
                                        <?php endif; ?>
                                        <a href="javascript:void(0)" data-target="#denyModal" onclick="$('#deny_user_id').val('<?php echo e($user->id); ?>')" data-toggle="modal" class="btn btn-warning float-left mr-1">
                                            <i class="fa fa-ban ml-1"></i>لغو ارجاع
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
                
                <div class="modal" id="reserveModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="<?php echo e(route('contract-reserve-store')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <style>
                                    .price_type{
                                        top: 0;
                                        position: absolute;
                                        left: 0;
                                        text-align: center;
                                        height: 100%;
                                        line-height: 36px;
                                        background: #00000047;
                                    }
                                </style>
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">رزرو کردن معامله</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <input class="user_id" type="hidden" name="id" value="">
                                    <input class="confirm_refer_id" type="hidden" name="refer_id" value="">
                                    <div class="col-md-12 mb-3">
                                        <label for="budget">مبلغ فروش</label>
                                        <div class="p-relative">
                                            <input type="text" id="price_sales" name="price_sales" class="form-control price_sales" maxlength="100" required>
                                            <select class="form-control priceTypePicker priceTypePicker1 w-25" id="price_type" name="price_type">
                                                <?php $__currentLoopData = \App\User::currencies(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($key); ?>"><?php echo e($currency); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="budget">مبلغ خرید</label>
                                        <div class="p-relative">
                                            <input type="text" id="price_buy" name="price_buy" class="form-control price_buy" maxlength="100">
                                            <span class="price_type w-25 d-block"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="budget">مالیات</label>
                                        <div class="p-relative">
                                            <input type="text" id="tax" value="0" name="tax" class="form-control price_buy" maxlength="100">
                                            <span class="price_type w-25 d-block"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-12 villa_id_container">
                                        <h4 class="modal-title text-center my-2">انتخاب ملک</h4>
                                        <select class="form-control select2" id="villa_id" name="villa_id">
                                            <option value="">ندارد</option>
                                            <?php $__currentLoopData = \App\Villa::orderByDesc('created_at')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $villa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($villa->id); ?>">
                                                    <?php echo e($villa->id); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <style>
                                        .custom-file-label{
                                            padding-top: 7px;
                                            height: 31px;
                                        }
                                    </style>

                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <?php echo e(Form::label('name', 'پیوست قرارداد')); ?>

                                            <div class="custom-file">
                                                <?php echo e(Form::file('file', array('accept' => '*', 'class' => 'custom-file-input', 'id' => 'customFile'))); ?>

                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
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
                <div class="modal" id="confirmSalesModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="<?php echo e(route('contract-store')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <style>
                                .price_type{
                                    top: 0;
                                    position: absolute;
                                    left: 0;
                                    text-align: center;
                                    height: 100%;
                                    line-height: 36px;
                                    background: #00000047;
                                }
                            </style>
                            <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">تایید کردن معامله</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <input class="user_id" type="hidden" name="id" value="">
                                    <input class="confirm_refer_id" type="hidden" name="refer_id" value="">
                                        <div class="col-md-12 mb-3">
                                            <label for="budget">مبلغ فروش</label>
                                            <div class="p-relative">
                                                <input type="text" id="price_sales" name="price_sales" class="form-control price_sales" maxlength="100" required>
                                                <select class="form-control priceTypePicker priceTypePicker2 w-25" id="price_type" name="price_type">
                                                    <?php $__currentLoopData = \App\User::currencies(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($key); ?>"><?php echo e($currency); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="budget">مبلغ خرید</label>
                                            <div class="p-relative">
                                                <input type="text" id="price_buy" name="price_buy" class="form-control price_buy" maxlength="100">
                                                <span class="price_type w-25 d-block"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="budget">مالیات</label>
                                            <div class="p-relative">
                                                <input type="text" id="tax" value="0" name="tax" class="form-control price_buy" maxlength="100">
                                                <span class="price_type w-25 d-block"></span>
                                            </div>
                                        </div>

                                    <div class="col-md-12 villa_id_container">
                                        <h4 class="modal-title text-center my-2">انتخاب ملک</h4>
                                        <select class="form-control select2" id="villa_id" name="villa_id">
                                            <option value="">ندارد</option>
                                            <?php $__currentLoopData = \App\Villa::orderByDesc('created_at')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $villa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($villa->id); ?>">
                                                    <?php echo e($villa->id); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <style>
                                        .custom-file-label{
                                            padding-top: 7px;
                                            height: 31px;
                                        }
                                    </style>

                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <?php echo e(Form::label('name', 'پیوست قرارداد')); ?>

                                            <div class="custom-file">
                                                <?php echo e(Form::file('file', array('accept' => '*', 'class' => 'custom-file-input', 'id' => 'customFile'))); ?>

                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
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
                <div class="modal" id="confirmRentModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="<?php echo e(route('contract-store')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <style>
                                    .price_type{
                                        top: 0;
                                        position: absolute;
                                        left: 0;
                                        text-align: center;
                                        height: 100%;
                                        line-height: 36px;
                                        background: #00000047;
                                    }
                                </style>
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">تایید کردن معامله</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <input class="user_id" type="hidden" name="id" value="">
                                    <input class="confirm_refer_id" type="hidden" name="refer_id" value="">

                                        <div class="col-md-12 mb-3">
                                            <label for="budget">مبلغ کمیسیون</label>
                                            <div class="p-relative">
                                                <input type="text" id="price" name="price" class="form-control price" maxlength="100" required>
                                                <select class="form-control priceTypePicker priceTypePicker3 w-25" id="price_type" name="price_type">
                                                    <?php $__currentLoopData = \App\User::currencies(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($key); ?>"><?php echo e($currency); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="budget">مبلغ اجاره</label>
                                            <div class="p-relative">
                                                <input type="text" id="description" name="description" class="form-control description" maxlength="100">
                                                <span class="price_type w-25 d-block"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <div class="d-flex form-control mb-2">
                                                <input name="rent_by" id="rent_by_estate" value="estate" type="radio" class="ml-2" required>
                                                <label class="pt-1 w-100" for="rent_by_estate">
                                                    توسط
                                                    <mark><b>املاکی</b></mark>
                                                    اجاره داده شده هست
                                                </label>
                                            </div>
                                            <div class="d-flex form-control mb-2">
                                                <input name="rent_by" id="rent_by_expert" value="expert" type="radio" class="ml-2" required>
                                                <label class="pt-1 w-100" for="rent_by_expert">
                                                    توسط
                                                    <mark><b>کارشناس</b></mark>
                                                    اجاره داده شده هست
                                                </label>
                                            </div>
                                            <div class="d-flex form-control mb-2">
                                                <input name="rent_by" id="rent_by_experts_friend" value="experts_friend" type="radio" class="ml-2" required>
                                                <label class="pt-1 w-100" for="rent_by_experts_friend">
                                                    توسط
                                                    <mark><b>کارشناس همکار</b></mark>
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

                                        <div class="col-md-12 experts_friends_container d-none">
                                            <select class="form-control select2" id="expert2_id" name="expert2_id" required>
                                                <option value="" <?php echo e(old('expert2_id') == 0 ? 'selected' : ''); ?>>ندارد</option>
                                                <?php $__currentLoopData = \App\User::role('مدیر ملک')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option
                                                            value="<?php echo e($admin_user->id); ?>"
                                                            <?php echo e(old('user_id') == $admin_user->id ? 'selected' : ''); ?>>
                                                        <?php echo e($admin_user->first_name .' '.$admin_user->last_name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

                                    <style>
                                        .custom-file-label{
                                            padding-top: 7px;
                                            height: 31px;
                                        }
                                    </style>

                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <?php echo e(Form::label('name', 'پیوست قرارداد')); ?>

                                            <div class="custom-file">
                                                <?php echo e(Form::file('file', array('accept' => '*', 'class' => 'custom-file-input', 'id' => 'customFile'))); ?>

                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md-12 mb-3 card_file d-none">
                                            <div class="form-group">
                                                <?php echo e(Form::label('card_file', 'پیوست کارت ویزیت')); ?>

                                                <div class="custom-file">
                                                    <?php echo e(Form::file('card_file', array('accept' => '*', 'class' => 'custom-file-input', 'id' => 'customFile'))); ?>

                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>
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
                
                <div class="modal" id="cancelModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="<?php echo e(route('contract-cancel')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">کنسل کردن معامله</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <input id="cancel_id" type="hidden" name="id" value="">
                                    <input id="cancel_refer_id" type="hidden" name="refer_id" value="">

                                    <div class="col-md-12 mb-3">
                                        <div class="d-flex form-control mb-2">
                                            <input name="cancel_reasons" id="rent_by_estate" value="فایل مناسب با شرایط مشتری یافت نشد" type="checkbox" class="ml-2">
                                            <label class="pt-1 w-100" for="rent_by_estate">
                                                فایل مناسب با شرایط مشتری یافت نشد
                                            </label>
                                        </div>
                                        <div class="d-flex form-control mb-2" style="height: 55px">
                                            <input name="cancel_reasons" id="rent_by_expert" value="مشتری با املاکهای دیگری در ارتباط بود و از املاکهای دیگر منزل مورد نظر پیدا کرد" type="checkbox" class="ml-2">
                                            <label class="pt-1 w-100" for="rent_by_expert">
                                                مشتری با املاکهای دیگری در ارتباط بود و از املاکهای دیگر منزل مورد نظر پیدا کرد
                                            </label>
                                        </div>
                                        <div class="d-flex form-control mb-2">
                                            <input name="cancel_reasons" id="rent_by_experts_friend" value="مشتری منصرف شد" type="checkbox" class="ml-2">
                                            <label class="pt-1 w-100" for="rent_by_experts_friend">
                                                مشتری منصرف شد
                                            </label>
                                        </div>
                                    </div>

                                    <textarea name="cancel_reason" class="form-control d-none" id="" cols="30" rows="10" placeholder="توضیحات"></textarea>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">کنسل کن</button>
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
                                    <h4 class="modal-title">لغو ارجاع</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <input id="deny_user_id" type="hidden" name="id" value="">
                                    <textarea name="cancel_reason" class="form-control" id="" cols="30" rows="10" placeholder="توضیحات"></textarea>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">لغو ارجاع</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="modal" id="reportModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="<?php echo e(route('user-refer-report')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">گزارش کارشناش</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <input id="report_user_id" type="hidden" name="id" value="">
                                    <textarea name="refer_report" class="form-control" id="refer_report" cols="30" rows="10" placeholder="گزارش انجام یا عدم انجام کار"></textarea>
                                </div>

                                <?php if(auth()->check() && auth()->user()->hasRole('مدیر ملک')): ?>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">ثبت گزارش</button>
                                </div>
                                <?php endif; ?>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="paginate p-3">
                    <?php echo e($users->links()); ?>

                </div>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
    <?php $__env->startPush('scripts'); ?>
        <script>
            getPriceType($('.priceTypePicker1').find(":selected").text());
            getPriceType($('.priceTypePicker2').find(":selected").text());
            getPriceType($('.priceTypePicker3').find(":selected").text());
            $('.priceTypePicker').change(function () {
                let selected=$(this).find(":selected").text();
                console.log(selected);
                getPriceType(selected);
            })
            function getPriceType(selected){
                $('.price_type').html(selected);
            }

            relatedFunc($("input[name='rent_by']:checked").val());
            $("input[name='rent_by']").click(function() {
                var radioValue = $("input[name='rent_by']:checked").val();
                relatedFunc(radioValue)
            });
            function relatedFunc(radioValue){
                if(radioValue=='estate'){
                    $('.estate_container').removeClass('d-none');
                    $('.card_file').removeClass('d-none');
                    $('.experts_friends_container').addClass('d-none');

                    $('#estate_name').attr('required',true);
                    $('#estate_telephone').attr('required',true);
                    $('#expert2_id').attr('required',false);

                }else if(radioValue=='experts_friend'){
                    $('.experts_friends_container').removeClass('d-none');
                    $('.estate_container').addClass('d-none');
                    $('.card_file').addClass('d-none');

                    $('#estate_name').attr('required',false);
                    $('#estate_telephone').attr('required',false);
                    $('#expert2_id').attr('required',true);

                }else{
                    $('.estate_container').addClass('d-none');
                    $('.experts_friends_container').addClass('d-none');
                    $('.card_file').addClass('d-none');

                    $('#estate_name').attr('required',false);
                    $('#estate_telephone').attr('required',false);
                    $('#expert2_id').attr('required',false);
                }
            }
        </script>
        <script>
            $('.report').click(function () {
                $('#report_user_id').val($(this).attr('data-userId'))
                $('#refer_report').html($(this).attr('data-report'))
            })
        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>
