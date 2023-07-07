<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> افزودن <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <style>
            .price_input {
                padding-right: 35px;
                text-align: center !important;
            }

            .type_price {
                position: relative;
                top: 40px;
                right: -30px;
            }
        </style>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="<?php echo e(url('/')); ?>" target="_blank"><img src="<?php echo e(logo()); ?>" style="margin-top: 10px;"></a>
                    </div>
                    <h2>افزودن <?php echo e($title); ?></h2>
                </div>
            </div>
            <div class="card-body">
                <?php echo e(Form::open(array('route' => 'villa-store', 'method' => 'PUT', 'files' => true, 'style' => 'width:100%!important;min-width:100%!important'))); ?>

                <?php echo e(Form::hidden('latitude', '', array('id' => 'latitude'))); ?>

                <?php echo e(Form::hidden('longitude', '', array('id' => 'longitude'))); ?>

                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <?php echo e(Form::label('category_id', 'دسته بندی(پروژه)')); ?>

                            <select class="form-control selectpicker" name="category_id" id="category_id">
                                <option value="">ملک آزاد</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                            value="<?php echo e($category->id); ?>" <?php echo e(old('category_id') == $category->id ? 'selected' : ''); ?>><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <?php echo e(Form::label('type_villa', 'دسته ملک')); ?>

                            <?php echo e(Form::select('type_villa', App\Villa::types_villa(), '', array('class' => 'form-control selectpicker'))); ?>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-12 hide_box" >
                        <div class="form-group">
                            <label for="state_id">شهر</label>
                            <select class="form-control chosen-select select_js state_id " name="state_id" id="state_id" data-type="state_id" data-reply="city_id" data-name="شهر">
                                <option value="">انتخاب نمایید</option>
                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option data-target=".cityId<?php echo e($city->id); ?>" value="<?php echo e($city->id); ?>"<?php echo e(old('state_id') == $city->id ? 'selected' : ''); ?>><?php echo e($city->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 hide_box" >
                        <div class="form-group">
                            <label for="city_id">منطقه</label>
                            <select class="form-control chosen-select select_js city_id" name="city_id" id="city_id" data-type="city_id" data-reply="zone_id" data-name="منطقه">
                                <option value="">انتخاب نمایید</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 hide_box" >
                        <div class="form-group">
                            <label for="zone_id">محله</label>
                            <select class="form-control chosen-select  zone_id" name="zone_id" id="zone_id">
                                <option value="">ابتدا منطقه را انتخاب کنید</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 hide_box" >
                        <div class="form-group">
                            <label for="address">آدرس(محله)</label>
                            <input type="text" class="form-control" name="address"
                                   value="<?php echo e(old('address')); ?>">
                        </div>
                    </div>
                    <div class="col-md-6 hide_box"  ></div>
                    
                        
                            
                            

                            
                        
                    
                    
                    
                    
                    
                    
                    
                    
                        
                            
                            
                        
                    
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <?php echo e(Form::label('type_info', 'نوع ملک')); ?>

                            <?php echo e(Form::select('type_info', App\Villa::types(), '', array('class' => 'form-control selectpicker'))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group <?php if($errors->has('slug')): ?> has-danger <?php endif; ?>">
                            <?php echo e(Form::label('built_year', 'سن ساختمان (نوساز = 0 یا سال را وارد نمایید)')); ?>

                            <?php echo e(Form::number('built_year', 0, array('class' => 'form-control','min'=>0))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <?php echo e(Form::label('room_num', 'تعداد خواب')); ?>

                            <?php echo e(Form::number('room_num', 1, array('class' => 'form-control','min'=>0))); ?>

                            
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group <?php if($errors->has('number_of_wc')): ?> has-danger <?php endif; ?>">
                            <?php echo e(Form::label('number_of_wc', 'تعداد سرویس بهداشتی', array('style' => 'font-size: 10px'))); ?>

                            
                            <?php echo e(Form::number('number_of_wc', 1, array('class' => 'form-control','min'=>1))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <?php echo e(Form::label('b_or_t', 'بالکن یا تراس')); ?>

                            <?php echo e(Form::select('b_or_t', ['0'=>'ندارد','1'=>'دارد'], '', array('class' => 'form-control selectpicker'))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <?php echo e(Form::label('furniture', 'فرنیش')); ?>

                            <?php echo e(Form::select('furniture', ['0'=>'ندارد','1'=>'دارد'], '', array('class' => 'form-control selectpicker'))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <?php echo e(Form::label('kitchen', 'آشپزخانه')); ?>

                            <?php echo e(Form::select('kitchen', ['0'=>'اوپن','1'=>'بسته'], '', array('class' => 'form-control selectpicker'))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <?php echo e(Form::label('type_sale', 'نقد/اقساط')); ?>

                            <?php echo e(Form::select('type_sale', ['نقد'=>'نقد','نقد/اقساط'=>'نقد/اقساط'], '', array('class' => 'form-control selectpicker'))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <?php echo e(Form::label('villa_vip', 'ملک پیشنهادی')); ?>

                            <?php echo e(Form::select('villa_vip', ['0'=>'خیر','1'=>'بلی'], '', array('class' => 'form-control selectpicker'))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 d-none">
                        <div class="form-group">
                            <?php echo e(Form::label('status', 'وضعیت')); ?>

                            <?php echo e(Form::select('status', array('published' => 'انتشار', 'draft' => 'پیش نویس', 'pending' => 'در انتظار تایید'), '', array('class' => 'form-control selectpicker'))); ?>

                        </div>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                        
                            
                            

                        
                    


                    
                    
                    
                    
                    
                    
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group <?php if($errors->has('space')): ?> has-danger <?php endif; ?>">
                            <?php echo e(Form::label('area', 'متراژ ')); ?>

                            <?php echo e(Form::number('area', '', array('placeholder' => 'متراژ ', 'class' => 'form-control','min'=>1))); ?>

                        </div>
                    </div>
                    
                        
                            
                            
                        
                    
                    
                        
                            
                            
                        
                    
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group <?php if($errors->has('floor')): ?> has-danger <?php endif; ?>">
                            <?php echo e(Form::label('floor', 'طبقه')); ?>

                            <?php echo e(Form::number('floor', '', array('placeholder' => 'طبقه چندم', 'class' => 'form-control','min'=>0))); ?>

                        </div>
                    </div>

                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <?php echo e(Form::label('villa_view', 'منظره')); ?>

                            <?php echo e(Form::select('villa_view[]', App\Villa::villa_view(), '', array('class' => 'form-control selectpicker','multiple' ))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <?php echo e(Form::label('properties_in', 'امکانات داخلی', array('style' => 'font-size: 10px'))); ?>

                            <?php echo e(Form::select('properties_in[]', array_pluck($propertiesin, 'name', 'id'), '', array('class' => 'form-control selectpicker', 'multiple'))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 hide_box" >
                        <div class="form-group">
                            <?php echo e(Form::label('properties_out', 'امکانات رفاهی', array('style' => 'font-size: 10px'))); ?>

                            <?php echo e(Form::select('properties_out[]', array_pluck($propertiesout, 'name', 'id'), '', array('class' => 'form-control selectpicker', 'multiple'))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 hide_box">
                        <div class="form-group">
                            <?php echo e(Form::label('properties_access', 'دسترسی ها', array('style' => 'font-size: 10px'))); ?>

                            <?php echo e(Form::select('properties_access[]', array_pluck($propertiesaccess, 'name', 'id'), '', array('class' => 'form-control selectpicker', 'multiple'))); ?>

                        </div>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group bootstrap-selects <?php if($errors->has('price')): ?> has-danger <?php endif; ?>">
                            <?php echo e(Form::label('price', 'قیمت')); ?>

                            <span class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top" title="مبلغ وارد شده قیمت نهایی خانه استانبول میباشد"><i class="fa fa-info"></i></span>
                            <?php echo e(Form::text('price', '', array('class' => 'form-control text-center price_input','min'=>0))); ?>  
                            <?php echo e(Form::select('price_type', array('lira'=>'لیر'), '', array('class' => 'form-control selectpicker', 'style' => 'width:26%;margin-right:.2rem;float:right'))); ?>

                        </div>
                    </div>
                    
                        
                            
                            
                        
                    
                    
                        
                            
                            
                        
                    

                    
                        
                            
                            
                                
                                    
                                            
                                
                            
                        
                    

                    <div class="col-md-4 col-xs-12 d-none">
                        <div class="form-group <?php if($errors->has('name')): ?> has-danger <?php endif; ?>">
                            <?php echo e(Form::label('phone', 'شماره تماس')); ?>

                            <?php echo e(Form::text('phone', '', array('class' => 'form-control'))); ?>

                        </div>
                    </div>

                    <div class="col-md-4 col-xs-12 d-none">
                        <div class="form-group <?php if($errors->has('name')): ?> has-danger <?php endif; ?>">
                            <?php echo e(Form::label('phone1', 'شماره تماس جایگزین')); ?>

                            <?php echo e(Form::text('phone1', '', array('class' => 'form-control'))); ?>

                        </div>
                    </div>

                    <div class="col-md-4 col-xs-12 d-none">
                        <div class="form-group <?php if($errors->has('name')): ?> has-danger <?php endif; ?>">
                            <?php echo e(Form::label('whatsapp_phone', 'شماره تماس واتساپ')); ?>

                            <?php echo e(Form::text('whatsapp_phone', '', array('class' => 'form-control'))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group <?php if($errors->has('name')): ?> has-danger <?php endif; ?>">
                            <?php echo e(Form::label('name', 'عنوان ملک')); ?>

                            <?php echo e(Form::text('name', '', array('class' => 'form-control'))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group <?php if($errors->has('slug')): ?> has-danger <?php endif; ?>">
                            <?php echo e(Form::label('slug', 'نامک')); ?>

                            <?php echo e(Form::text('slug', '', array('class' => 'form-control'))); ?>

                        </div>
                    </div>
                    <div class="col-md-12 d-none">
                        <div class="row">
                            <div class="col-md-4 col-xs-12 d-none">
                                <div class="form-group <?php if($errors->has('name')): ?> has-danger <?php endif; ?>" style="display: inline-grid !important;">
                                    <?php echo e(Form::label('rent_by_estate', 'ملک در دست املاک')); ?>

                                    <div class="form-control text-center">
                                        <?php echo e(Form::checkbox('rent_by_estate', null , false,array('style' => "vertical-align:middle"))); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-xs-12 estate_container d-none">
                                <div class="form-group <?php if($errors->has('name')): ?> has-danger <?php endif; ?>">
                                    <?php echo e(Form::label('estate_name', 'نام املاکی')); ?>

                                    <?php echo e(Form::text('estate_name', null, array('class' => 'form-control'))); ?>

                                </div>
                            </div>
                            <div class="col-md-5 col-xs-12 estate_container d-none">
                                <div class="form-group <?php if($errors->has('name')): ?> has-danger <?php endif; ?>">
                                    <?php echo e(Form::label('estate_phone', 'شماره تماس املاکی')); ?>

                                    <?php echo e(Form::text('estate_phone', null, array('class' => 'form-control'))); ?>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-12 d-none">
                        <div class="row">
                            <div class="col-md-4 col-xs-12">
                                <div class="form-group <?php if($errors->has('name')): ?> has-danger <?php endif; ?>" style="display: inline-grid !important;">
                                    <?php echo e(Form::label('yedki', 'قرارداد انحصاری فروش(YETKI) دارد یا خیر؟')); ?>

                                    <div class="form-control text-center">
                                        <?php echo e(Form::checkbox('yedki', null , false,array('style' => "vertical-align:middle"))); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-xs-12 yedki_container d-none">
                                <div class="form-group <?php if($errors->has('name')): ?> has-danger <?php endif; ?>">
                                    <?php echo e(Form::label('yedki_percentage', 'مبلغ yedki به درصد')); ?>

                                    <?php echo e(Form::number('yedki_percentage', null, array('class' => 'form-control','min'=>'0'))); ?>

                                </div>
                            </div>
                            <div class="col-md-5 col-xs-12 yedki_container d-none">
                                <div class="form-group <?php if($errors->has('name')): ?> has-danger <?php endif; ?>">
                                    <?php echo e(Form::label('yedki_file', 'پیوست قرارداد yedki')); ?>

                                    <input class="form-control" type="file" id="yedki_file" name="yedki_file" accept="*">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12 d-none">
                        <div class="form-group">
                            
                            <?php $__currentLoopData = \App\Category::types(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="d-inline-block py-3">
                                    <label class="w-100">
                                        <input type="checkbox" id="types" name="types[]" value="<?php echo e($key); ?>"
                                               class="w-auto"
                                               style="width: auto" <?php echo e(old('types') && in_array($key, old('types')) ? 'checked' : ''); ?>>
                                        <span><?php echo e($type); ?></span>
                                    </label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <?php echo e(Form::textarea('body', 'توضیحات ملک', array('id' => 'body', 'class' => 'form-control textarea'))); ?>

                        </div>
                        <div class="form-group d-none">
                            <?php echo e(Form::textarea('services', 'توضیحات بیشتر ملک', array('id' => 'services', 'class' => 'form-control textarea'))); ?>

                        </div>
                        <div class="form-group d-none">
                            <?php echo e(Form::textarea('information', 'اطلاعات مفید ملک', array('id' => 'information', 'class' => 'form-control textarea'))); ?>

                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <div class="form-group d-none">
                            <?php echo e(Form::label('name', 'تصویر شاخص')); ?>

                            <div class="custom-file">
                                <?php echo e(Form::file('photo', array('accept' => 'image/*', 'class' => 'custom-file-input', 'id' => 'customFile'))); ?>

                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>

                        <div class="row mb-1">
                            <label for="video" class="ml-3">فیلم</label>
                            <input type="file" id="video" name="video" accept="video/mp4">
                        </div>








                        <div class="col-sm-12">
                            <div class="form-group">
                                <p>گالری(حداکثر 20 تصویر)</p>
                                <hr/>
                                <div class="villa-gallery"></div>
                                <div id="gallery-dropzone"></div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <p>نمای داخلی(حداکثر 20 تصویر)</p>
                                <hr/>
                                <div class="in-villa-gallery"></div>
                                <div id="gallery-in"></div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <p>نمای خارجی(حداکثر 20 تصویر)</p>
                                <hr/>
                                <div class="out-villa-gallery"></div>
                                <div id="gallery-out"></div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <p> پلن ها(حداکثر 20 تصویر)</p>
                                <hr/>
                                <div class="plan-villa-gallery"></div>
                                <div id="gallery-plan"></div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="form-group <?php if($errors->has('name')): ?> has-danger <?php endif; ?>">
                        <?php echo e(Form::label('link1', 'لینک ویدئو 1')); ?>

                        <?php echo e(Form::text('link1', null, array('class' => 'form-control'))); ?>

                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="form-group <?php if($errors->has('name')): ?> has-danger <?php endif; ?>">
                        <?php echo e(Form::label('link2', 'لینک ویدئو 2')); ?>

                        <?php echo e(Form::text('link2', null, array('class' => 'form-control'))); ?>

                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="form-group <?php if($errors->has('name')): ?> has-danger <?php endif; ?>">
                        <?php echo e(Form::label('link3', 'لینک ویدئو 3')); ?>

                        <?php echo e(Form::text('link3', null, array('class' => 'form-control'))); ?>

                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="form-group <?php if($errors->has('name')): ?> has-danger <?php endif; ?>">
                        <?php echo e(Form::label('link4', 'لینک ویدئو 4')); ?>

                        <?php echo e(Form::text('link4', null, array('class' => 'form-control'))); ?>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php echo e(Form::label('meta_keywords', 'کلمات کلیدی')); ?>

                            <?php echo e(Form::text('meta_keywords', '', array('class' => 'form-control' , 'placeholder' => 'با کاما (،) از هم جدا شود'))); ?>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php echo e(Form::label('meta_description', 'توضیحات سئو')); ?>

                            <?php echo e(Form::text('meta_description', '', array('class' => 'form-control' , 'placeholder' => 'با کاما (،) از هم جدا شود'))); ?>

                        </div>
                    </div>
                </div>
                <br/>


                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-rounded btn-secondary float-right"><i
                            class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                <?php echo e(Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>افزودن', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left'))); ?>

                <?php echo e(Form::close()); ?>

            </div>
            <!-- The Modal -->
            <div class="modal show" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header text-white">
                            <h4 class="modal-title text-white">شرایط ثبت آگهی</h4>
                            <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                        </div>

                        <?php if(auth()->user()->villa_rules_seen==0): ?>
                        <!-- Modal body -->
                        <div class="modal-body text-white text-justify">
                            <p><br>در نظر داشته باشید، به منظور تسهیل و تسریع فرآیند انتشار آگهی&zwnj;های ملک، ادمین ممکن است در مواردی بر اساس قوانین، متن یا عنوان آگهی شما را به طور جزئی تغییر دهد. همچنین ادمین مجاز است هرگونه پیام، آگهی و یا عکسی که در سایت ارسال می&zwnj;کنید به هر شکلی که ضروری بداند حذف نماید.<br>همچنین در صورت گزارش کارشناسی دیگر مبنی بر ثبت آگهی تکراری، ادمین موظف به حذف آن می&zwnj;باشد .<br>ادمین موظف است آگهی&zwnj;های بدون تصویر را حذف کند.<br>استفاده از عبارتات یا کلماتی مانند خفن،باکلاس،لاکچری و از این قبیل کلمات ممنوع است<br>استفاده از حروف و زبان انگلیسی ممنوع است<br>درج شماره تلفن کارشناس در متن آگهی ممنوع است<br><br>- آگهی&zwnj;هایی که فاقد متن توضیحات باشند ثبت نخواهند شد.<br><br>- قیمت کف ملک را با بررسی قیمت از چند املاکی و Sahibinden، مشخص کنید.<br><br>- توجه داشته باشید که، امکان اضافه کردن به قیمت Eklame وجود داشته باشد.<br><br>شرایط&nbsp;تصاویر آگهی&zwnj;ها<br><br>همواره از تصاویر باکیفیت و به صورت عمودی جهت بار گذاری استفاده نمایید ؛ اندازهٔ تصویر می&zwnj;بایست حداقل ۶۰۰*۶۰۰ و حجم آن حداکثر ۵۱۲ کیلوبایت باشد.<br><br>چنانچه یک یا چند بند از موارد زیر برای تصویر آگهی شما صدق کند، تصویر منتشر نخواهد شد:<br><br>- تصاویری که لوگو داشته باشند. (دقت داشته باشید که تصاویر شما باید بدون لوگو بارگذاری شوند. فرایند لوگو&zwnj;گذاری توسط سایت بطور خودکار صورت میگیرد)<br><br>- تصاویری که بیش از حد کوچک یا بی&zwnj;کیفیت باشند.<br><br>- تصاویری که غیر واقعی باشند.3D<br><br>- تصاویری که دارای کادر سیاه (یا سایر رنگ&zwnj;ها) باشند.<br>- تصاویری که تصویر اشخاص دیگر در آنها باشد (حتی در آینه و شیشه)<br><br>- تصاویری که نیاز به چرخش داشته باشند.<br><br>- تصاویری که به هر شکلی حاوی عبارات و یا تصاویر تبلیغاتی باشند.<br><br>- تصاویری که دارای شماره تماس، ایمیل و یا آدرس سایت باشند.</p>
                        </div>
                        <?php endif; ?>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">باشه</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    <?php $__env->endSlot(); ?>
    <?php $__env->startPush('stylesheets'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap-datepicker.min.css')); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap-select.min.css')); ?>"/>
        <link rel="stylesheet" href="<?php echo e(asset('dashboard/dropzone.css')); ?>">
    <?php $__env->stopPush(); ?>
    <?php $__env->startPush('scripts'); ?>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-datepicker.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-datepicker-fa.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-select.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-select-fa_IR.min.js')); ?>"></script>
        <script src="<?php echo e(asset('editor/laravel-ckeditor/ckeditor.js')); ?>"></script>
        <script src="<?php echo e(asset('editor/laravel-ckeditor/adapters/jquery.js')); ?>"></script>
        <script src="<?php echo e(asset('dashboard/dropzone.js')); ?>"></script>
        <script src="<?php echo e(asset('dashboard/panel.js')); ?>"></script>
        <script src="<?php echo e(asset('new/js/jquery.mask.min.js')); ?>"></script>
        <script>
            $('#price').mask("#,##0", {reverse: true});
        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5G5RWxvCPz-PBkobWYiTq-C4WIZqNe80&libraries=places&callback=initialize"></script>


        
        
        


        <?php if(auth()->user()->villa_rules_seen==0): ?>
            <script type="text/javascript">
                $(window).on('load',function(){
                    $('#myModal').modal('show');
                });
            </script>
            <?php $user=auth()->user(); $user->villa_rules_seen=1; $user->update(); ?>
        <?php endif; ?>



        <script type="text/javascript">
            var textareaOptions = {
                filebrowserImageBrowseUrl: '<?php echo e(url('filemanager?type=Images')); ?>',
                filebrowserImageUploadUrl: '<?php echo e(url('filemanager/upload?type=Images&_token=')); ?>',
                filebrowserBrowseUrl: '<?php echo e(url('filemanager?type=Files')); ?>',
                filebrowserUploadUrl: '<?php echo e(url('filemanager/upload?type=Files&_token=')); ?>',
                language: 'fa'
            };
            $('.textarea').ckeditor(textareaOptions);
            slug('#name', '#slug');

            $('.selectpicker').selectpicker();

            $('.click-to-add-description').on('click', function () {
                var number = rollDice();
                otherAdd(number);
            });

            function otherAdd(number) {
                $('.some_description').append('<div class="parent-description"><a href="javascript:void(0)" class="close-tab"><i class="fa fa-close"></i></a><div class="form-group"><label for="some_title[]">عنوان</label> <input placeholder="عنوان" class="form-control" required name="some_title[]" type="text" id="some_title[]"></div><div class="form-group"><textarea class="form-control textarea" required name="some_description[]" cols="50" rows="10"></textarea></div></div>');
                $('.close-tab').click(function () {
                    $(this).parent().remove();
                });
                $('.textarea').ckeditor(textareaOptions);
            }

            function rollDice() {
                return (Math.floor(Math.random() * 6) + 1);
            }

            var max_fields_room = 5;
            var wrapper_room = $(".some_room");
            var add_button_room = $(".click-to-add-room");
            var x_room = 0;
            $(add_button_room).click(function (e) {
                e.preventDefault();
                if (x_room < max_fields_room) {
                    wrapper_room.append(
                        '<div class="parent-room" data-id="' + x_room + '"> <a href="javascript:void(0)" class="remove-field"><i class="fa fa-close"></i></a> <div class="row"> <div class="col-md-3"> <div class="form-group row"> <label for="some_room" class="col-md-7">تعداد اتاق</label> <input class="form-control col-md-5" onkeypress="return isNumberKey(event)" name="some_room[' + x_room + '][]" type="text" required> </div> </div> <div class="col-md-9"> <a href="javascript:void(0)" class="btn btn-secondary mt-1 click-to-add-price" onclick="add_price($(this))"><i class="fa fa-plus ml-2"></i><span>افزودن قیمت</span></a> <div class="some_price"></div> </div> </div> </div>'
                    );
                    x_room++;
                }
            });
            $(wrapper_room).on("click", ".remove-field", function (e) {
                e.preventDefault();
                $(this).parent().remove();
                x_room--;
            });

            var x = 0;

            function add_price(add_button_price) {
                var number = rollDice();
                var wrapper_price = add_button_price.parent('div').find('.some_price');
                var id = add_button_price.parent('div').parent('div').parent('div').data('id');
                wrapper_price.append(
                    '<div class="row"> <div class="col-md-2"> <div class="form-group"> <input class="form-control date-in-' + x + '" name="some_room[' + id + '][date_in][]" type="text" placeholder="از تاریخ" readonly required></div> </div> <div class="col-md-2"> <div class="form-group"> <input class="form-control date-out-' + x + '" name="some_room[' + id + '][date_out][]" type="text" placeholder="تا تاریخ" readonly required></div> </div> <div class="col-md-2"> <div class="form-group"> <input class="form-control" name="some_room[' + id + '][min][]" type="text" onkeypress="return isNumberKey(event)" placeholder="حداقل" required></div> </div> <div class="col-md-6"> <div class="form-group bootstrap-selects"> <input class="form-control" name="some_room[' + id + '][some_price][]" type="text" style="width:36%;float:right"> <input class="form-control some_price_last" name="some_room[' + id + '][some_price_last][]" type="text" style="width:35%;margin-right: 2%;float:right"> <select class="form-control selectpicker" name="some_room[' + id + '][some_price_type][]" style="width:26%;float:right"> <option value="rial">ریال</option> <option value="dollar" selected>دلار</option> <option value="euro">یورو</option> </select></div> </div> <a href="javascript:void(0)" class="remove-field"><i class="fa fa-close"></i></a></div>'
                );
                var date1 = '.date-in-' + x;
                var date2 = '.date-out-' + x;

                var date_old = '.date-out-' + (x - 1);


                $(function () {
                    var date = new Date();
                    date.setDate(date.getDate());
                    $(date1).datepicker({
                        onClose: function (selectedDate) {
                            $(date2).datepicker("option", "minDate", selectedDate);
                        }
                    });
                    $(date2).datepicker({
                        onClose: function (selectedDate) {
                            $(date1).datepicker("option", "maxDate", selectedDate);
                        }
                    });
                });
                $('.selectpicker').selectpicker();
                $(wrapper_price).on("click", ".remove-field", function (e) {
                    $(this).parent().remove();
                });
                if ($('#last_discount').is(':checked')) {
                    $('.some_price_last').each(function () {
                        $(this).prop('required', true);
                        $(this).show();
                    });
                } else {
                    $('.some_price_last').each(function () {
                        $(this).val('');
                        $(this).prop('required', false);
                        $(this).hide();
                    });
                }
                x++;
            }

            $(document).ready(function () {
                var id = $('#location_id').val();
                var base_url = '<?php echo e(url("/")); ?>';
                $.getJSON(base_url + "/panel/districts/" + id, function (data) {
                    var district = $(".district");
                    district.empty();
                    district.append('<label for="district">محل ملک</label> <select class="form-control selectpicker" id="district" name="district"></select>');
                    $.each(data, function (index, value) {
                        $('#district').append('<option value="' + index + '">' + value + '</option>');
                    });
                    $('.selectpicker').selectpicker();
                });
            });

            $('#location_id').change(function () {
                var id = $(this).val();
                var base_url = '<?php echo e(url("/")); ?>';
                $.getJSON(base_url + "/panel/districts/" + id, function (data) {
                    var district = $(".district");
                    district.empty();
                    district.append('<label for="district">محل ملک</label> <select class="form-control selectpicker" id="district" name="district"></select>');
                    $.each(data, function (index, value) {
                        $('#district').append('<option value="' + index + '">' + value + '</option>');
                    });
                    $('.selectpicker').selectpicker();
                });
            });

            var lat = "41.00577583056861";
            var lng = "29.005781914082263";

            function initialize() {
                var latlng = new google.maps.LatLng(lat, lng);
                var options = {
                    zoom: 7,
                    center: latlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    styles: [{
                        "featureType": "all",
                        "elementType": "geometry.fill",
                        "stylers": [{"weight": "2.00"}]
                    }, {"featureType": "all", "elementType": "geometry.stroke", "stylers": [{"color": "#9c9c9c"}]}, {
                        "featureType": "all",
                        "elementType": "labels.text",
                        "stylers": [{"visibility": "on"}]
                    }, {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [{"color": "#f2f2f2"}]
                    }, {
                        "featureType": "landscape",
                        "elementType": "geometry.fill",
                        "stylers": [{"color": "#ffffff"}]
                    }, {
                        "featureType": "landscape.man_made",
                        "elementType": "geometry.fill",
                        "stylers": [{"color": "#ffffff"}]
                    }, {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [{"visibility": "off"}]
                    }, {
                        "featureType": "road",
                        "elementType": "all",
                        "stylers": [{"saturation": -100}, {"lightness": 45}]
                    }, {
                        "featureType": "road",
                        "elementType": "geometry.fill",
                        "stylers": [{"color": "#eeeeee"}]
                    }, {
                        "featureType": "road",
                        "elementType": "labels.text.fill",
                        "stylers": [{"color": "#7b7b7b"}]
                    }, {
                        "featureType": "road",
                        "elementType": "labels.text.stroke",
                        "stylers": [{"color": "#ffffff"}]
                    }, {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [{"visibility": "simplified"}]
                    }, {
                        "featureType": "road.arterial",
                        "elementType": "labels.icon",
                        "stylers": [{"visibility": "off"}]
                    }, {"featureType": "transit", "elementType": "all", "stylers": [{"visibility": "off"}]}, {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [{"color": "#46bcec"}, {"visibility": "on"}]
                    }, {
                        "featureType": "water",
                        "elementType": "geometry.fill",
                        "stylers": [{"color": "#c8d7d4"}]
                    }, {"featureType": "water", "elementType": "labels.text.fill", "stylers": [{"color": "#070707"}]}, {
                        "featureType": "water",
                        "elementType": "labels.text.stroke",
                        "stylers": [{"color": "#ffffff"}]
                    }],
                    draggable: true,
                    zoomControl: true,
                    mapTypeControl: false,
                    streetViewControl: false,
                    scrollwheel: true
                };
                var map = new google.maps.Map(document.getElementById("google-map-area"), options);
                var marker = new google.maps.Marker(
                    {
                        map: map,
                        draggable: true,
                        animation: google.maps.Animation.DROP,
                        icon: "<?php echo e(asset('img/pin.png')); ?>"
                    });

                function placeMarker(map, location) {
                    if (marker) {
                        marker.setPosition(location);
                    } else {
                        marker = new google.maps.Marker({
                            position: location,
                            map: map
                        });
                    }
                    document.getElementById("latitude").value = location.lat();
                    document.getElementById("longitude").value = location.lng();
                }

                placeMarker(map, latlng);
                google.maps.event.addDomListener(window, 'load', initialize);
                google.maps.event.addListener(map, 'click', function (event) {
                    placeMarker(map, event.latLng);
                });

                $('#map').on('shown.bs.modal', function () {
                    google.maps.event.trigger(map, "resize");
                });

            }

            $(document).ready(function () {
                if (!$('#last_discount').is(':checked')) {
                    $('.some_price_last').prop('required', false);
                    $('.some_price_last').hide();
                }
                $('#last_discount').change(function () {
                    if ($(this).is(':checked')) {
                        $('.some_price_last').each(function () {
                            $(this).prop('required', true);
                            $(this).show();
                        });
                    } else {
                        $('.some_price_last').each(function () {
                            $(this).val('');
                            $(this).prop('required', false);
                            $(this).hide();
                        });
                    }
                });
            });
        </script>
        <script>
            $.log = function (message) {
                var $logger = $("#logger");
                $logger.html($logger.html() + "\n * " + message);
            }
        </script>
        
        

        

        

        

        
        


        
        
        
        
        
        
        
        

        
        
        


        
        
        
        

        
        


        <script>
            $('#city_id').change(function () {

                var target = $(this).find(':selected').attr('data-target');
                $('#location_id option').hide();
                $('#location_id option:first').show();
                $(target).show();
                $('#location_id').val(0);
                $('#location_id').selectpicker('refresh');
            });
        </script>
        <script>
            sendImage('gallery-dropzone', "image/*", 30, 'gallery', 'post', 2, 'villa-gallery', 'gallery[]', 1, 768, 432);
            sendImage('gallery-in', "image/*", 30, 'in_gallery', 'post', 2, 'in-villa-gallery', 'in_gallery[]', 1, 768, 432);
            sendImage('gallery-out', "image/*", 30, 'out_gallery', 'post', 2, 'out-villa-gallery', 'out_gallery[]', 1, 768, 432);
            sendImage('gallery-plan', "image/*", 30, 'plan_gallery', 'post', 2, 'plan-villa-gallery', 'plan_gallery[]', 1, 768, 432);
        </script>
        <script>
            checkBuiltYear($( "#type" ).val());
            $("#type").on('change',function () {
                let selected=$(this).val();
                checkBuiltYear(selected);
            });
            function checkBuiltYear(selected) {
                if(selected=='new'){
                    $('#built_year').val(0);
                    $('#built_year').attr('disabled',true);
                }else{
                    $('#built_year').attr('disabled',false);
                }
            }
        </script>
        <script>
            $('#rent_by_estate').click(function () {
                if($(this).is(':checked')){
                    $('.estate_container').removeClass('d-none');
                }else{
                    $('.estate_container').addClass('d-none');
                }
            })
            chekYedki($('#yedki'));
            $('#yedki').click(function () {
                chekYedki($(this))
            })
            function chekYedki(yedki) {
                if(yedki.is(':checked')){
                    $('.yedki_container').removeClass('d-none');
                }else{
                    $('.yedki_container').addClass('d-none');
                }
            }
            $('#category_id').on('change',function () {
                var cat_id=$(this).val();
                if (cat_id==''){
                    $('.hide_box').show()
                }else
                {
                    $('.hide_box').hide()
                }
            })
            <?php if( old('category_id')!='' or old('category_id')!=null): ?>
            $('.hide_box').hide()
            <?php endif; ?>
        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>
