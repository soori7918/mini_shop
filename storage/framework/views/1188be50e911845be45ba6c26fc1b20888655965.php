<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> ویرایش <?php echo e($title); ?> <?php echo e($villa->name); ?> <?php $__env->endSlot(); ?>
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
                    <h2>ویرایش <?php echo e($title); ?> <?php echo e($villa->name); ?></h2>

                    <?php if($villa->status == 'failed'): ?>
                        <div class="alert alert-danger py-4 px-3 mt-2">
                            <strong>متاسفانه این ملک تایید نشده است : </strong>
                            <p><?php echo $villa->status_message; ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-body">
                <?php echo e(Form::model($villa, array('route' => array('villa-update', $villa->id), 'method' => 'PATCH', 'files' => true, 'style' => 'width:100%!important;min-width:100%!important'))); ?>

                <?php echo e(Form::hidden('latitude', $villa->latitude, array('id' => 'latitude'))); ?>

                <?php echo e(Form::hidden('longitude', $villa->longitude, array('id' => 'longitude'))); ?>

                <div class="row">
                    
                        
                            
                            
                                
                                
                                    
                                            
                                
                            
                        
                    

                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="city_id">شهر</label>
                            <select class="form-control selectpicker" name="city_id" id="city_id">
                                <option value="">انتخاب نمایید</option>
                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                            <?php echo e($city->id==$villa->city_id?'selected':''); ?> data-target=".cityId<?php echo e($city->id); ?>"
                                            value="<?php echo e($city->id); ?>" data-latitude="<?php echo e($city->latitude); ?>"
                                            data-longitude="<?php echo e($city->longitude); ?>"><?php echo e($city->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <?php echo e(Form::label('district', 'منطقه ملک')); ?>

                            <select class="form-control selectpicker" name="location_id" id="location_id">
                                <option value="">انتخاب نمایید</option>
                                <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($l->id==$villa->location_id?'selected':''); ?> class="cityId<?php echo e($l->city_id); ?>"
                                            value="<?php echo e($l->id); ?>"><?php echo e($l->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    
                        
                            
                            

                            
                        
                    
                    
                    
                    
                    
                    
                    
                    
                        
                            
                            
                        
                    
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <?php echo e(Form::label('type_info', 'نوع ملک')); ?>

                            <?php echo e(Form::select('type_info', App\Villa::types(), null, array('class' => 'form-control selectpicker'))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group <?php if($errors->has('slug')): ?> has-danger <?php endif; ?>">
                            <?php echo e(Form::label('built_year', 'سن ساختمان (نوساز = 0 یا سال را وارد نمایید)')); ?>

                            <?php echo e(Form::number('built_year', null, array('class' => 'form-control','min'=>0))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <?php echo e(Form::label('room_num', 'تعداد خواب')); ?>

                            <?php echo e(Form::number('room_num', null, array('class' => 'form-control','min'=>0))); ?>

                            
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group <?php if($errors->has('number_of_wc')): ?> has-danger <?php endif; ?>">
                            <?php echo e(Form::label('number_of_wc', 'تعداد سرویس بهداشتی', array('style' => 'font-size: 10px'))); ?>

                            <?php echo e(Form::number('number_of_wc', null, array('class' => 'form-control','min'=>1))); ?>

                            
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <?php echo e(Form::label('b_or_t', 'بالکن یا تراس')); ?>

                            <?php echo e(Form::select('b_or_t', ['0'=>'ندارد','1'=>'دارد'], null, array('class' => 'form-control selectpicker'))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <?php echo e(Form::label('furniture', 'فرنیش')); ?>

                            <?php echo e(Form::select('furniture', ['0'=>'ندارد','1'=>'دارد'], null, array('class' => 'form-control selectpicker'))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <?php echo e(Form::label('kitchen', 'آشپزخانه')); ?>

                            <?php
                                $kitchen=[];
                                if(!is_null($villa->kitchen))
                                {
                                    $is_serialized=is_serialized($villa->kitchen);
                                     if(!$is_serialized)
                                         {
                                             array_push($kitchen,$villa->kitchen);
                                         }
                                     else {
                                          if ($villa->kitchen != 'N;'){
                                            $kitchen = unserialize($villa->kitchen);
                                            }else{
                                            $kitchen = [];
                                            }
                                     }
                                }
                            ?>
                            <?php echo e(Form::select('kitchen[]', ['0'=>'اوپن','1'=>'بسته'], $kitchen, array('class' => 'form-control selectpicker','multiple'))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 d-none">
                        <div class="form-group">
                            <?php echo e(Form::label('status', 'وضعیت')); ?>

                            <?php echo e(Form::select('status', array('published' => 'انتشار', 'draft' => 'پیش نویس', 'pending' => 'در انتظار تایید'), null, array('class' => 'form-control selectpicker'))); ?>

                        </div>
                    </div>
                    
                        
                            
                            

                        
                    


                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                        
                            
                            
                        
                    
                    
                        
                            
                            
                        
                    
                    
                        
                            
                            
                        
                    
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group <?php if($errors->has('floor')): ?> has-danger <?php endif; ?>">
                            <?php echo e(Form::label('floor', 'طبقه')); ?>

                            <?php echo e(Form::number('floor', null, array('placeholder' => 'طبقه چندم', 'class' => 'form-control','min'=>0))); ?>

                        </div>
                    </div>

                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <?php echo e(Form::label('villa_view', 'منظره')); ?>

                            <?php
                                if(!is_null($villa->villa_view))
                                {
                                    $villa_show=[];
                                    $is_serialized=is_serialized($villa->villa_view);
                                     if(!$is_serialized)
                                         {
                                             array_push($villa_show,$villa->villa_view);
                                         }
                                     else {
                                          if ($villa->villa_view != 'N;'){
                                            $villa_show = unserialize($villa->villa_view);
                                            }else{
                                            $villa_show = [];
                                            }
                                     }
                                }
                            ?>
                            <?php echo e(Form::select('villa_view[]', App\Villa::villa_view(), $villa_show, array('class' => 'form-control selectpicker','multiple'))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <?php echo e(Form::label('properties_in', 'امکانات داخلی', array('style' => 'font-size: 10px'))); ?>

                            <?php
                                if ($villa->properties_in != 'N;'){
                                $properties_in = unserialize($villa->properties_in);
                                }else{
                                $properties_in = [];
                                }
                            ?>
                            <?php echo e(Form::select('properties_in[]', array_pluck($propertiesin, 'name', 'id'), $properties_in, array('class' => 'form-control selectpicker', 'multiple'))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <?php
                                if ($villa->properties_out != 'N;'){
                                $properties_out = unserialize($villa->properties_out);
                                }else{
                                $properties_out = [];
                                }
                            ?>
                            <?php echo e(Form::label('properties_out', 'امکانات رفاهی', array('style' => 'font-size: 10px'))); ?>

                            <?php echo e(Form::select('properties_out[]', array_pluck($propertiesout, 'name', 'id'), $properties_out, array('class' => 'form-control selectpicker', 'multiple'))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <?php
                                if ($villa->properties_access != 'N;'){
                                $properties_access = unserialize($villa->properties_access);
                                }else{
                                $properties_access = [];
                                }
                            ?>
                            <?php echo e(Form::label('properties_out', 'دسترسی ها', array('style' => 'font-size: 10px'))); ?>

                            <?php echo e(Form::select('properties_access[]', array_pluck($propertiesaccess, 'name', 'id'), $properties_access, array('class' => 'form-control selectpicker', 'multiple'))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group bootstrap-selects <?php if($errors->has('price')): ?> has-danger <?php endif; ?>">
                            <?php echo e(Form::label('price', 'قیمت')); ?>

                            <?php echo e(Form::text('price', null, array('class' => 'form-control text-center price_input','min'=>1))); ?>


                            <?php echo e(Form::select('price_type', array('lira'=>'لیر'), null, array('class' => 'form-control selectpicker', 'style' => 'width:26%;margin-right:.2rem;float:right'))); ?>

                        </div>
                    </div>
                    
                        
                            
                            
                        
                    
                    <div class="col-md-4 col-xs-12 d-none">
                        <div class="form-group">
                            <?php echo e(Form::label('villa_space', 'فضای آپارتمان')); ?>

                            <?php echo e(Form::select('villa_space', ['1'=>'Net','2'=>'Brüt'], null, array('class' => 'form-control selectpicker'))); ?>

                        </div>
                    </div>
                    
                        
                            
                            
                            
                                
                                    
                                
                            
                        
                    
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group <?php if($errors->has('name')): ?> has-danger <?php endif; ?>">
                            <?php echo e(Form::label('name', 'عنوان ملک')); ?>

                            <?php echo e(Form::text('name', null, array('class' => 'form-control'))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group <?php if($errors->has('slug')): ?> has-danger <?php endif; ?>">
                            <?php echo e(Form::label('slug', 'نامک')); ?>

                            <?php echo e(Form::text('slug', null, array('class' => 'form-control'))); ?>

                        </div>
                    </div>

                    <div class="col-md-4 col-xs-12 d-none">
                        <div class="form-group <?php if($errors->has('name')): ?> has-danger <?php endif; ?>">
                            <?php echo e(Form::label('phone', 'شماره تماس')); ?>

                            <?php echo e(Form::text('phone', null, array('class' => 'form-control'))); ?>

                        </div>
                    </div>

                    <div class="col-md-4 col-xs-12 d-none">
                        <div class="form-group <?php if($errors->has('name')): ?> has-danger <?php endif; ?>">
                            <?php echo e(Form::label('phone1', 'شماره تماس جایگزین')); ?>

                            <?php echo e(Form::text('phone1', null, array('class' => 'form-control'))); ?>

                        </div>
                    </div>

                    <div class="col-md-4 col-xs-12 d-none">
                        <div class="form-group <?php if($errors->has('name')): ?> has-danger <?php endif; ?>">
                            <?php echo e(Form::label('whatsapp_phone', 'شماره تماس واتساپ')); ?>

                            <?php echo e(Form::text('whatsapp_phone', null, array('class' => 'form-control'))); ?>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2 col-xs-12">
                                <div class="form-group <?php if($errors->has('name')): ?> has-danger <?php endif; ?>" style="display: inline-grid !important;">
                                    <?php echo e(Form::label('rent_by_estate', 'ملک در دست املاک')); ?>

                                    <div class="form-control text-center">
                                        <?php echo e(Form::checkbox('rent_by_estate', null , true,array('style' => "vertical-align:middle"))); ?>

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

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2 col-xs-12">
                                <div class="form-group <?php if($errors->has('name')): ?> has-danger <?php endif; ?>" style="display: inline-grid !important;">
                                    <?php echo e(Form::label('yedki', 'قرارداد انحصاری فروش(YETKI) دارد یا خیر؟')); ?>

                                    <div class="form-control text-center">
                                        <?php echo e(Form::checkbox('yedki', null , $villa->yedki?true:false,array('style' => "vertical-align:middle"))); ?>

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

                    <div class="col-md-12">
                        <div class="form-group">
                            
                            <?php $__currentLoopData = \App\Category::types(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="d-inline-block py-3">
                                    <label class="w-100">
                                        <input type="checkbox" id="types" name="types[]" value="<?php echo e($key); ?>"
                                               class="w-auto"
                                               style="width: auto"
                                                <?php echo e(old('types') && in_array($key, old('types')) ? 'checked' : ''); ?>

                                        <?php if(old('types') && in_array($key, old('types'))): ?> <?php echo e('checked'); ?> <?php elseif($villa->$key && $villa->$key == 1): ?> <?php echo e('checked'); ?> <?php endif; ?>
                                        >
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
                            <?php echo e(Form::textarea('body', null, array('id' => 'body', 'class' => 'form-control textarea'))); ?>

                        </div>
                        <div class="form-group d-none">
                            <?php echo e(Form::textarea('services', null, array('id' => 'services', 'class' => 'form-control textarea'))); ?>

                        </div>
                        <div class="form-group d-none">
                            <?php echo e(Form::textarea('information', null, array('id' => 'information', 'class' => 'form-control textarea'))); ?>

                        </div>
                        <div class="float-right w-100 my-5">
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            

                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            

                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            


                            
                            
                            
                            
                            
                            
                            
                            
                            
                        </div>
                        <div class="float-right w-100 my-5">
                            
                            
                            
                            
                            
                            <div class="some_description">
                                <?php if($villa->descriptions): ?>
                                    <?php
                                        $descriptions = unserialize($villa->descriptions);
                                    ?>
                                    <?php $__currentLoopData = $descriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $description): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="parent-description">
                                            <a href="javascript:void(0)" class="close-tab"><i
                                                        class="fa fa-close"></i></a>
                                            <div class="form-group">
                                                <?php echo e(Form::label('some_title[]', 'عنوان')); ?>

                                                <?php echo e(Form::text('some_title[]', $description['title'], array('placeholder' => 'عنوان', 'class' => 'form-control', 'required'))); ?>

                                            </div>
                                            <div class="form-group">
                                                <?php echo e(Form::textarea('some_description[]', $description['description'], array('class' => 'form-control textarea', 'required'))); ?>

                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        <div class="form-group d-none">
                            <?php echo e(Form::label('name', 'تصویر شاخص')); ?>

                            <div class="custom-file">
                                <?php echo e(Form::file('photo', array('accept' => 'image/*', 'class' => 'custom-file-input', 'id' => 'customFile'))); ?>

                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>

                        <div class="row w-100 mb-1">
                            <label for="video" class="ml-3">فیلم</label>
                            <input type="file" id="video" name="video" accept="video/mp4">
                        </div>

                        <?php if($villa->video): ?>
                            <div class="row w-100 mb-1">
                                <video width="320" height="240" controls>
                                    <source src="<?php echo e(url($villa->video)); ?>" type="video/mp4">
                                </video>
                            </div>
                        <?php endif; ?>

                        <div class="row w-100 mb-5">
                            <label class="ml-3">گالری</label>
                            <input type="file" class="gallery-multiple" name="gallery[]" accept="image/*" multiple="">
                            <div class="gallery-preview ui-sortable">
                                <?php $__currentLoopData = $villa->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="gallery-item" data-id="<?php echo e($photo->id); ?>">
                                        <div class="gallery-delete">x</div>
                                        <img src="<?php echo e(url($photo->path)); ?>">
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

                            <?php echo e(Form::text('meta_keywords', null, array('class' => 'form-control' , 'placeholder' => 'با کاما (،) از هم جدا شود'))); ?>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php echo e(Form::label('meta_description', 'توضیحات سئو')); ?>

                            <?php echo e(Form::text('meta_description', null, array('class' => 'form-control' , 'placeholder' => 'با کاما (،) از هم جدا شود'))); ?>

                        </div>
                    </div>
                </div>
                <br/>
                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-rounded btn-secondary float-right"><i
                            class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                <?php echo e(Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>ویرایش', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left'))); ?>

                <?php echo e(Form::close()); ?>

            </div>
        </div>
    <?php $__env->endSlot(); ?>
    <?php $__env->startPush('stylesheets'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap-datepicker.min.css')); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap-select.min.css')); ?>"/>
    <?php $__env->stopPush(); ?>
    <?php $__env->startPush('scripts'); ?>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-datepicker.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-datepicker-fa.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-select.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-select-fa_IR.min.js')); ?>"></script>
        <script src="<?php echo e(asset('editor/laravel-ckeditor/ckeditor.js')); ?>"></script>
        <script src="<?php echo e(asset('editor/laravel-ckeditor/adapters/jquery.js')); ?>"></script>
        <script src="<?php echo e(asset('new/js/jquery.mask.min.js')); ?>"></script>
        <script>
            $('#price').mask("#,##0", {reverse: true});
        </script>
        
        
        
        
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxfZQk73sogROY9KKRmtPIsLSFSjX7o7w&libraries=places&callback=initialize"></script>
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

            $('.date').datepicker();

            $('.selectpicker').selectpicker();

            $('.click-to-add-description').on('click', function () {
                var number = rollDice();
                otherAdd(number);
            });

            function otherAdd(number) {
                $('.some_description').append('<div class="parent-description"><a href="javascript:void(0)" class="close-tab"><i class="fa fa-close"></i></a><div class="form-group"><label for="some_title[]">عنوان</label> <input placeholder="عنوان" class="form-control" required name="some_title[]" type="text" id="some_title[]"></div><div class="form-group"><textarea class="form-control textarea" required name="some_description[]" cols="50" rows="10"></textarea></div></div>');
                $('.close-tab').click(function () {
                    $(this).parent().remove()
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


            var x = 1000;

            function add_price(add_button_price) {

                var number = x;


                var wrapper_price = add_button_price.parent('div').find('.some_price');
                var id = add_button_price.parent('div').parent('div').parent('div').data('id');
                wrapper_price.append(
                    '<div class="row"> <div class="col-md-2"> <div class="form-group"> <input class="form-control date-in-' + number + '" name="some_room[' + id + '][date_in][]" type="text" placeholder="از تاریخ" readonly required></div> </div> <div class="col-md-2"> <div class="form-group"> <input class="form-control date-out-' + number + '" name="some_room[' + id + '][date_out][]" type="text" placeholder="تا تاریخ" readonly required></div> </div> <div class="col-md-2"> <div class="form-group"> <input class="form-control" name="some_room[' + id + '][min][]" type="text" onkeypress="return isNumberKey(event)" placeholder="حداقل" required></div> </div> <div class="col-md-6"> <div class="form-group bootstrap-selects"> <input class="form-control" name="some_room[' + id + '][some_price][]" type="text" style="width:36%;float:right"> <input class="form-control some_price_last" name="some_room[' + id + '][some_price_last][]" type="text" style="width:35%;margin-right: 2%;float:right"> <select class="form-control selectpicker" name="some_room[' + id + '][some_price_type][]" style="width:26%;float:right"><option value="dollar">دلار</option> <option value="rial">ریال</option> <option value="euro">یورو</option> </select></div> </div> <a href="javascript:void(0)" class="remove-field"><i class="fa fa-close"></i></a></div>'
                );
                var date1 = '.date-in-' + number;
                var date2 = '.date-out-' + number;


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
                setTimeout(function () {

                    $.each($('.some_price_last'), function (index, value) {
                        if ($(value).val() == '') {
                            $(value).hide();
                            $(this).prop('required', false);
                        }
                    });
                }, 1000);
            });

            $(document).ready(function () {
                var id = $('#location_id').val();
                var base_url = '<?php echo e(url("/")); ?>';
                $.getJSON(base_url + "/panel/districts/" + id, function (data) {
                    var district = $(".district");
                    district.empty();
                    district.append('<label for="district">محل ملک</label> <select class="form-control selectpicker" id="district" name="district"></select>');
                    $.each(data, function (index, value) {
                        var villa_district = '<?php echo e($villa->district); ?>';
                        if (villa_district == value) {
                            $('#district').append('<option value="' + index + '" selected>' + value + '</option>');
                        } else {
                            $('#district').append('<option value="' + index + '">' + value + '</option>');
                        }
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

            var lat = "<?php echo e((float)$villa->latitude); ?>";
            var lng = "<?php echo e((float)$villa->longitude); ?>";

            function initialize() {
                var latlng = new google.maps.LatLng(lat, lng);
                var options = {
                    zoom: 7,
                    center: latlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    draggable: true,
                    zoomControl: true,
                    mapTypeControl: false,
                    streetViewControl: false,
                    scrollwheel: true
                };

                var autocomplete = new google.maps.places.Autocomplete($("#address")[0], {});


                var map = new google.maps.Map(document.getElementById("google-map-area"), options);

                google.maps.event.addListener(autocomplete, 'place_changed', function () {
                    var place = autocomplete.getPlace();
                    var lat = place.geometry.location.lat();
                    var lng = place.geometry.location.lng();
                    var formatted_address = place.formatted_address;
                    latlng = new google.maps.LatLng(lat, lng);
                    placeMarker(map, latlng);
                });


                var marker = new google.maps.Marker(
                    {
                        map: map,
                        draggable: false,
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
                    $('.some_price_last').prop('required', true);
                    $('.some_price_last').show();
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
        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>
