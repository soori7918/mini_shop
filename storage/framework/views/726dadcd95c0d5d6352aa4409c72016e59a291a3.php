<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> ویرایش <?php echo e($title); ?> <?php echo e($profile->first_name); ?> <?php echo e($profile->last_name); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="<?php echo e(url('/')); ?>" target="_blank"><img src="<?php echo e(logo()); ?>" style="margin-top: 10px;"></a>
                    </div>
                    <h2>ویرایش <?php echo e($title); ?> <?php echo e($profile->first_name); ?> <?php echo e($profile->last_name); ?>




                    </h2>
                </div>
            </div>
            <div class="card-body">
                <?php echo e(Form::model($profile, array('route' => array('profile-update', $profile->id), 'method' => 'PATCH' , 'files' => true))); ?>

                <input type="hidden" name="callback_url" value="<?php echo e(request('callback_url')?request('callback_url'):''); ?>">
                <?php if(auth()->user()->hasRole('مدیر') || auth()->user()->hasRole('call center') || auth()->user()->hasRole('call center(sales)') || auth()->user()->hasRole('تعیین کننده ملک')): ?>
                    <div class="form-group">
                        <label for="user_id">کارشناس معرف</label>
                        <select class="form-control select2" id="user_id" name="user_id">
                            <option value="0" <?php echo e((old('user_id') == 0 || !$profile->user_id) ? 'selected' : ''); ?>>
                                ندارد
                            </option>
                            <?php $__currentLoopData = \App\User::role(['مدیر ملک','مدیر','call center','call center(sales)','تعیین کننده ملک'])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option
                                        value="<?php echo e($admin_user->id); ?>"
                                        <?php echo e(old('user_id', $profile->user_id) == $admin_user->id ? 'selected' : ''); ?>>
                                    <?php echo e($admin_user->first_name .' '.$admin_user->last_name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <?php echo e(Form::label('first_name', 'نام')); ?>

                    <?php echo e(Form::text('first_name', null, array('class' => 'form-control'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('last_name', 'نام خانوادگی')); ?>

                    <?php echo e(Form::text('last_name', null, array('class' => 'form-control'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('email', 'ایمیل')); ?>

                    <?php echo e(Form::email('email', null, array('class' => 'form-control disabled'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('area_code', 'پیش شماره')); ?>

                    <?php echo e(Form::text('area_code', null, array('class' => 'form-control'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('mobile', 'موبایل')); ?>

                    <?php echo e(Form::text('mobile', null, array('class' => 'form-control'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('name', 'تصویر پروفایل')); ?>

                    <div class="custom-file">
                        <?php echo e(Form::file('photo', array('accept' => 'image/*', 'class' => 'custom-file-input', 'id' => 'customFile'))); ?>

                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                <?php if(auth()->user()->hasRole('مدیر')): ?>
                    <div class="form-group">
                        <label for="instant">دسترسی ها</label>
                        <?php echo Form::select('role_name[]',array_pluck(\App\Role::all(),'name','name'),$profile->getRoleNames(),['class'=>'form-control selectpicker','multiple']); ?>

                    </div>
                <?php endif; ?>
                <?php if(auth()->check() && auth()->user()->hasRole('کاربر')): ?>
                <div class="form-group form-group-radio">
                    <div class="radio">
                        <input type="radio" name="character" id="real"
                               value="real" <?php echo e($profile->character == 'real' ? 'checked' : ''); ?>>
                        <label for="real">شخص حقیقی</label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="character" id="legal"
                               value="legal" <?php echo e($profile->character == 'legal' ? 'checked' : ''); ?>>
                        <label for="legal">شخص حقوقی</label>
                    </div>
                </div>
                <?php endif; ?>
                <br/>
                <?php if(auth()->user()->hasRole('مدیر') || auth()->user()->hasRole('مدیر ملک')): ?>
                <div class="row mb-3" uk-grid>
                    <?php
                        $editables=[];
                        if (!is_null($profile->editables)){
                            if (is_serialized($profile->editables)){
                                $editables=unserialize($profile->editables);
                            }
                        }
                        if (is_null($editables)){
                            $editables=[];
                        }
                    ?>
                    <?php if(count($editables) && auth()->user()->hasRole('مدیر ملک')): ?>
                        <div class="col-md-12 pb-3">
                            <div class="alert alert-info px-3 py-2" style="display: initial">
                                مواردی که باید اصلاح شود : ↓
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(in_array('fname_en',$editables) || auth()->user()->hasRole('مدیر')): ?>
                    <div class="col-md-6">
                        <label for="fname_en" class="float-right">نام (لاتین پاسپورتی)</label>
                        <input id="fname_en" name="fname_en" class="form-control text-left" type="text"
                               placeholder="نام (لاتین پاسپورتی) " value="<?php echo e(old('fname_en', $profile->fname_en)); ?>">
                    </div>
                    <?php endif; ?>
                    <?php if(in_array('lname_en',$editables) || auth()->user()->hasRole('مدیر')): ?>
                    <div class="col-md-6">
                        <label for="lname_en" class="float-right">نام خانوادگی (لاتین پاسپورتی)</label>
                        <input id="lname_en" name="lname_en" class="form-control text-left" type="text"
                               placeholder="نام خانوادگی (لاتین پاسپورتی) " value="<?php echo e(old('lname_en', $profile->lname_en)); ?>">
                    </div>
                    <?php endif; ?>
                    <?php if(in_array('father_name',$editables) || auth()->user()->hasRole('مدیر')): ?>
                    <div class="col-md-6">
                        <label for="father_name" class="float-right">نام پدر</label>
                        <input id="father_name" class="form-control" name="father_name" type="text" placeholder="نام پدر "
                               value="<?php echo e(old('father_name', $profile->father_name)); ?>">
                    </div>
                    <?php endif; ?>
                    <?php if(in_array('gender',$editables) || auth()->user()->hasRole('مدیر')): ?>
                    <div class="col-md-6">
                        <label for="gender" class="float-right">جنسیت</label>
                        <?php echo e(Form::select('gender',['0'=>'مرد','1'=>'زن'], null, array('placeholder' => 'جنسیت', 'class' =>  'form-control'))); ?>

                    </div>
                    <?php endif; ?>
                    <?php if(in_array('living_country',$editables) || auth()->user()->hasRole('مدیر')): ?>
                    <div class="col-md-6">
                        <label for="living_country" class="float-right">کشور</label>
                        <?php echo e(Form::select('living_country',[array_pluck($country, 'fa_name', 'id')], null, array('id'=>'living_country','placeholder' => 'کشور', 'class' => 'form-control'))); ?>

                    </div>
                    <?php endif; ?>
                    <?php if(in_array('nationality',$editables) || auth()->user()->hasRole('مدیر')): ?>
                    <div class="col-md-6">
                        <label for="nationality" class="float-right">ملیت</label>
                        <input id="nationality" name="nationality" type="text" placeholder="ملیت"
                               class="form-control "
                               value="<?php echo e(old('nationality', $profile->nationality)); ?>">
                    </div>
                    <?php endif; ?>
                    <?php if(in_array('ncode',$editables) || auth()->user()->hasRole('مدیر')): ?>
                    <div class="col-md-6">
                        <div class="control_box">
                            <label for="nationality" class="float-right">َشماره پاسپورت/کدملی</label>
                            <input id="ncode" name="ncode" class="text-left form-control " type="text"
                                   placeholder="َشماره پاسپورت/کدملی" value="<?php echo e(old('ncode', $profile->ncode)); ?>"
                                   title=" فقط عدد و حروف a-z بصورت کوچک و بزرگ مجاز است">
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(in_array('postal_address',$editables) || auth()->user()->hasRole('مدیر')): ?>
                    <div class="col-md-12">
                        <label for="postal_address" class="float-right">آدرس کامل محل سکونت</label>
                        <textarea name="postal_address" id="postal_address" rows="3"
                                   class="form-control "
                                  placeholder="آدرس کامل محل سکونت"><?php echo e(old('postal_address', $profile->postal_address)); ?></textarea>
                    </div>
                    <?php endif; ?>
                    <?php if(in_array('address_pic',$editables) || auth()->user()->hasRole('مدیر')): ?>
                    <div class="col-md-12">
                        <label for="address_pic" class="float-right">پروف آدرس</label>
                        <input type="file" accept="image/*" name="address_pic" id="address_pic" class="form-control">
                        <?php if($profile->address_pic): ?>
                            <img style="display:block;max-height: 200px"
                                 src="<?php echo e(url($profile->address_pic)); ?>">
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    <?php if(in_array('passport_pic',$editables) || auth()->user()->hasRole('مدیر')): ?>
                    <div class="col-md-12">
                        <label for="passport_pic" class="float-right">پروف پاسپورت</label>
                        <input type="file" accept="image/*" name="passport_pic" id="passport_pic" class="form-control">
                        <?php if($profile->passport_pic): ?>
                            <img style="display:block;max-height: 300px"
                                 src="<?php echo e(url($profile->passport_pic)); ?>">
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-rounded btn-secondary float-right"><i
                            class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                <?php echo e(Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>ویرایش', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left'))); ?>

                <?php echo e(Form::close()); ?>

            </div>
        </div>
    <?php $__env->endSlot(); ?>
    <?php $__env->startPush('stylesheets'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap-datepicker.min.css')); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/select2.min.css')); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap-select.min.css')); ?>"/>
    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('scripts'); ?>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-datepicker.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-datepicker-fa.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-select.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-select-fa_IR.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxfZQk73sogROY9KKRmtPIsLSFSjX7o7w&libraries=places&callback=initialize"></script>
        <script type="text/javascript">
            $('.date-picker').each(function () {
                $(this).datepicker({
                    dateFormat: "yy-mm-dd"
                });
            });
            $('.select2').each(function () {
                $(this).select2();
            });
        </script>
        <script>
            $('#first_name,#last_name').on('keypress', function (event) {
                var regex = new RegExp("^[a-zA-Z0-9]+$");
                var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                if (regex.test(key)) {
                    event.preventDefault();
                    $.jGrowl('فقط حروف فارسی مورد پذبرش است', {life: 3000, position: 'bottom-right', theme: 'bg-info'});
                    return false;
                }
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>