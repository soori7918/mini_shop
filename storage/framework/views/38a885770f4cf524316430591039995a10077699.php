<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> <?php echo e($title); ?> <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="<?php echo e(url('/')); ?>" target="_blank"><img src="<?php echo e(logo()); ?>" style="margin-top: 10px;"></a>
                    </div>
                    <h2><?php echo e($title); ?> <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></h2>
                </div>
            </div>
            <div class="card-body">
                <div class="max-with">
                    <?php if($user->hasRole('مدیر ملک') || auth()->user()->hasRole('call center') || auth()->user()->hasRole('call center(sales)')|| $user->hasRole('کارشناس فروش')): ?>

                        <ul class="list-group text-right" style="direction: rtl">
                            <li class="list-group-item"><strong>معرف : </strong>
                                <?php if($user->user): ?>
                                    <span class="badge badge-info"><?php echo e($user->user->first_name .' ' . $user->user->last_name); ?></span>
                                <?php elseif($user->ref1): ?>
                                    <span class="badge badge-info"><?php echo e($user->ref1->first_name .' ' . $user->ref1->last_name); ?></span>
                                <?php else: ?>
                                    ندارد
                                <?php endif; ?>
                            </li>
                            <li class="list-group-item"><strong>ایمیل
                                    : </strong><?php echo e($user->email); ?> <?php if($user->email_status == 'active'): ?><span
                                        class="badge badge-success">فعال</span><?php elseif($user->email_status == 'pending'): ?>
                                    <span class="badge badge-warning">در انتظار تایید</span><?php endif; ?></li>
                            <li class="list-group-item"><strong> سطح دسترسی
                                    : </strong><?php echo e($user->roles()->pluck('name')->implode(' ')); ?></li>
                            <li class="list-group-item"><strong>موبایل
                                    : </strong><?php echo e($user->area_code); ?><?php echo e($user->mobile); ?> <?php if($user->mobile_status == 'active'): ?><span
                                        class="badge badge-success">فعال</span><?php elseif($user->mobile_status == 'pending'): ?>
                                    <span class="badge badge-warning">در انتظار تایید</span><?php endif; ?></li>
                            <li class="list-group-item"><strong>تاریخ عضویت
                                    : </strong><?php echo e(my_jdate($user->created_at, 'd F Y')); ?></li>
                            <li class="list-group-item"><strong>وضعیت ثبت نام
                                    : </strong><?php if($user->registration == 'complete'): ?><span class="badge badge-success">تکمیل شده</span><?php elseif($user->registration == 'not_completed'): ?>
                                    <span class="badge badge-danger">تکمیل نشده</span><?php endif; ?></li>
                            <li class="list-group-item">
                                <strong>وضعیت کلی : </strong>
                                <?php if($user->account_status == 'active'): ?><span class="badge badge-success">فعال</span><?php elseif($user->account_status == 'pending'): ?>
                                    <span class="badge badge-warning">در انتظار تایید</span><?php elseif($user->account_status == 'blocked'): ?>
                                    <span class="badge badge-secondary">مسدود شده</span><?php endif; ?></li>
                            <li class="list-group-item"><strong>نام ونام خانوادگی (فارسی)
                                    : </strong><?php echo e($user->first_name.' '.$user->last_name); ?></li>
                            <li class="list-group-item"><strong>نام ونام خانوادگی (انگلیسی)
                                    : </strong><?php echo e($user->fname_en.' '.$user->lname_en); ?></li>
                            <li class="list-group-item"><strong>نام پدر : </strong><?php echo e($user->father_name); ?></li>
                            <li class="list-group-item"><strong>جنسیت : </strong><?php echo e($user->gender==0?'مرد':'زن'); ?></li>
                            <li class="list-group-item"><strong>کشور در حال زندگی
                                    : </strong><?php echo e($user->countrys?$user->countrys->fa_name:$user->living_country); ?></li>
                            <li class="list-group-item"><strong>ملیت : </strong><?php echo e($user->nationality); ?></li>
                            <li class="list-group-item"><strong>شغل
                                    : </strong><?php echo e($user->Job!=null?$user->Job:'ثبت نشده'); ?></li>
                            <li class="list-group-item"><strong>کدملی/شماره پاسپورت : </strong><?php echo e($user->ncode); ?></li>
                            <li class="list-group-item"><strong>آدرس : </strong><?php echo e($user->postal_address); ?></li>
                            <li class="list-group-item"><strong>پروف آدرس : </strong>
                                <?php if($user->address_pic): ?>
                                    <img style="display:block;max-height: 300px"
                                         src="<?php echo e(url($user->address_pic)); ?>">
                                <?php endif; ?>
                            </li>
                            <li class="list-group-item"><strong>پروف پاسپورت : </strong>
                                <?php if($user->passport_pic): ?>
                                    <img style="display:block;max-height: 300px"
                                         src="<?php echo e(url($user->passport_pic)); ?>">
                                <?php endif; ?>
                            </li>
                        </ul>
                    <?php elseif($user->hasRole('کاربر')): ?>
                        <ul class="list-group text-right" style="direction: rtl">
                            <li class="list-group-item"><strong>ایمیل : </strong><?php echo e($user->email); ?></li>
                            <li class="list-group-item"><strong> سطح دسترسی
                                    : </strong><?php echo e($user->roles()->pluck('name')->implode(' ')); ?></li>
                            <li class="list-group-item"><strong>موبایل
                                    : </strong><?php echo e($user->mobile); ?> <?php if($user->mobile_status == 'active'): ?><span
                                        class="badge badge-success">فعال</span><?php elseif($user->mobile_status == 'pending'): ?>
                                    <span class="badge badge-warning">در انتظار تایید</span><?php endif; ?></li>
                            <li class="list-group-item"><strong>تاریخ عضویت
                                    : </strong><?php echo e(my_jdate($user->created_at, 'd F Y')); ?></li>

                            <li class="list-group-item"><strong>وضعیت ثبت نام : </strong>
                                <?php if($user->registration == 'complete'): ?>
                                    <span class="badge badge-success">تکمیل شده</span>
                                <?php elseif($user->registration == 'not_completed'): ?>
                                    <span class="badge badge-danger">تکمیل نشده</span>
                                <?php endif; ?>
                            </li>

                            <li class="list-group-item"><strong>وضعیت کلی
                                    : </strong><?php if($user->account_status == 'active'): ?><span class="badge badge-success">فعال</span><?php elseif($user->account_status == 'pending'): ?>
                                    <span class="badge badge-warning">در انتظار تایید</span><?php elseif($user->account_status == 'blocked'): ?>
                                    <span class="badge badge-secondary">مسدود شده</span><?php endif; ?></li>
                            <li class="list-group-item"><strong>نام معرف : </strong><?php echo e($user->reagent); ?></li>
                            <li class="list-group-item"><strong>جنسیت : </strong><?php echo e($user->gender==0?'مرد':'زن'); ?></li>
                            <li class="list-group-item"><strong>کشور در حال زندگی
                                    : </strong><?php if($user->living_country=='iran'): ?>
                                    ایران <?php elseif($user->living_country=='turkey'): ?>
                                    ترکیه <?php else: ?><?php echo e($user->countrys?$user->countrys->fa_name:$user->living_country); ?> <?php endif; ?>
                            </li>
                            <li class="list-group-item"><strong>نحوه آشنایی : </strong><?php echo e($user->acquaintance); ?></li>
                            <li class="list-group-item"><strong>نوع درخواست : </strong><?php if($user->type_request=='rent'): ?>
                                    کرایه <?php elseif($user->type_request=='buy'): ?> خرید <?php endif; ?></li>
                            <?php
                                if ($user->location != null){
                                $location = unserialize($user->location);
                                }else{
                                $location = [];
                                }
                            ?>
                            <li class="list-group-item"><strong>منطقه مد نظر
                                    : </strong> <?php if(count($location)>0): ?> <?php $__currentLoopData = $location; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $loc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php $locc=\App\Location::find($loc)  ?> <?php if($key>0): ?>
                                    , <?php endif; ?> <?php echo e($locc->name); ?>  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php else: ?> ثبت نشده <?php endif; ?></li>
                            <li class="list-group-item"><strong>تعداد اتاق خواب : </strong><?php echo e($user->room_number); ?></li>
                            <li class="list-group-item"><strong>بودجه به لیر : </strong><span
                                        class="numberPrice"><?php echo e($user->budget); ?></span></li>
                            <li class="list-group-item"><strong>توضیح ملک مدنظر شما : </strong><?php echo e($user->text); ?></li>
                            <li class="list-group-item"><strong>نیاز به مشاوره آنلاین
                                    : </strong><?php if($user->consulting==0): ?> ندارم <?php elseif($user->consulting==1): ?> دارم <?php endif; ?>
                            </li>



                            <li class="list-group-item"><strong>فوری/عجله ندارم : </strong><?php echo e($user->instant); ?></li>
                            <?php if(auth()->user()->hasRole('مدیر')): ?>
                                <li class="list-group-item">
                                <strong>پروف آدرس : </strong>
                                    <?php if($user->address_pic): ?>
                                        <img style="display:block;max-height: 200px"
                                             src="<?php echo e(url($user->address_pic)); ?>">
                                    <?php endif; ?>
                                </li>
                                 <li class="list-group-item">
                                <strong>پروف پاسپورت : </strong>
                                    <?php if($user->passport_pic): ?>
                                        <img style="display:block;max-height: 300px"
                                             src="<?php echo e(url($user->passport_pic)); ?>">
                                    <?php endif; ?>
                                </li>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>
                    <?php if(auth()->user()->hasRole('مدیر') || auth()->user()->hasRole('مدیر ملک')): ?>
                    <form class="mt-4" action="<?php echo e(route('user-status-update',$user->id)); ?>" method="post"
                          enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <ul class="list-group text-right" style="direction: rtl">
                            <li class="list-group-item"><strong>تغییر وضعیت : </strong>
                                <div class="form-group" style="width: 120px">
                                    <?php echo e(Form::select('account_status',['active'=>'active','rejected'=>'rejected'], $user->account_status, array('class' => 'form-control mt-3'))); ?>

                                </div>
                            </li>
                            <li class="list-group-item status_message" style="display: <?php echo e($user->account_status == 'rejected' ? 'block' : 'none'); ?>"><strong>پیغام وضعیت برای کاربر : </strong>
                                <div class="form-group">
                                    <?php echo e(Form::textarea('status_message', $user->status_message, array('class' => 'form-control mt-3','rows'=>'3'))); ?>

                                </div>
                            </li>
                            <li class="list-group-item status_message">
                                <strong>بخش هایی که باید اصلاح شوند را مشخص نمایید : </strong>
                                <?php
                                    $editables=[];
                                    if (!is_null($user->editables)){
                                        if (is_serialized($user->editables)){
                                            $editables=unserialize($user->editables);
                                        }
                                    }
                                    if (is_null($editables)){
                                        $editables=[];
                                    }
                                ?>
                                <div class="form-group mt-3">
                                <div class="form-check-inline">
                                    <label class="form-check-label my-2">
                                        <input type="checkbox" name="editables[]" class="form-check-input ml-2" value="s" <?php echo e(in_array('fname_en',$editables)?'checked':''); ?>>نام (انگلیسی)
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label my-2">
                                        <input type="checkbox" name="editables[]" class="form-check-input ml-2" value="s" <?php echo e(in_array('lname_en',$editables)?'checked':''); ?>>نام خانوادگی (انگلیسی)
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label my-2">
                                        <input type="checkbox" name="editables[]" class="form-check-input ml-2" value="s" <?php echo e(in_array('father_name',$editables)?'checked':''); ?>>نام پدر
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label my-2">
                                        <input type="checkbox" name="editables[]" class="form-check-input ml-2" value="s" <?php echo e(in_array('gender',$editables)?'checked':''); ?>>جنسیت
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label my-2">
                                        <input type="checkbox" name="editables[]" class="form-check-input ml-2" value="s" <?php echo e(in_array('living_country',$editables)?'checked':''); ?>>کشور در حال زندگی
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label my-2">
                                        <input type="checkbox" name="editables[]" class="form-check-input ml-2" value="s" <?php echo e(in_array('nationality',$editables)?'checked':''); ?>>ملیت
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label my-2">
                                        <input type="checkbox" name="editables[]" class="form-check-input ml-2" value="s" <?php echo e(in_array('Job',$editables)?'checked':''); ?>>شغل
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label my-2">
                                        <input type="checkbox" name="editables[]" class="form-check-input ml-2" value="s" <?php echo e(in_array('ncode',$editables)?'checked':''); ?>>کدملی/شماره پاسپورت
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label my-2">
                                        <input type="checkbox" name="editables[]" class="form-check-input ml-2" value="s" <?php echo e(in_array('postal_address',$editables)?'checked':''); ?>>آدرس
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label my-2">
                                        <input type="checkbox" name="editables[]" class="form-check-input ml-2" value="address_pic" <?php echo e(in_array('address_pic',$editables)?'checked':''); ?>>پروف آدرس
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label my-2">
                                        <input type="checkbox" name="editables[]" class="form-check-input ml-2" value="passport_pic" <?php echo e(in_array('passport_pic',$editables)?'checked':''); ?>>پروف پاسپورت
                                    </label>
                                </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <?php echo e(Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>تغییر وضعیت', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left'))); ?>

                            </li>
                        </ul>
                    </form>
                    <?php endif; ?>
                    <br/>
                    <a href="<?php echo e(URL::previous()); ?>" class="btn btn-rounded btn-secondary float-right"><i
                                class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                    
                </div>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>