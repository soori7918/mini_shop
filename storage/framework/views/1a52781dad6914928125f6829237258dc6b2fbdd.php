<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> ویرایش <?php echo e($title); ?> <?php echo e($villa->name); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="http://adib-it.com/" target="_blank"><img
                                    src="http://www.support.adib-it.com/img/logo.png" style="margin-top: 10px;"></a>
                    </div>
                    <h2>ویرایش <?php echo e($title); ?> <?php echo e($villa->name); ?></h2>
                </div>
            </div>
            <div class="card-body">
                <?php echo e(Form::model($villa, array('route' => array('villa-update', $villa->id), 'method' => 'PATCH', 'files' => true, 'style' => 'width:100%!important;min-width:100%!important'))); ?>

                <?php echo e(Form::hidden('latitude', $villa->latitude, array('id' => 'latitude'))); ?>

                <?php echo e(Form::hidden('longitude', $villa->longitude, array('id' => 'longitude'))); ?>

                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <?php echo e(Form::label('category_id', 'دسته بندی')); ?>

                            <?php echo e(Form::select('category_id', array_pluck($categories, 'name', 'id'), null, array('class' => 'form-control selectpicker'))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group <?php if($errors->has('name')): ?> has-danger <?php endif; ?>">
                            <?php echo e(Form::label('name', 'نام ملک')); ?>

                            <?php echo e(Form::text('name', null, array('class' => 'form-control'))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group <?php if($errors->has('slug')): ?> has-danger <?php endif; ?>">
                            <?php echo e(Form::label('slug', 'نامک')); ?>

                            <?php echo e(Form::text('slug', null, array('class' => 'form-control'))); ?>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <?php echo e(Form::label('status', 'وضعیت')); ?>

                            <?php echo e(Form::select('status', array('published' => 'انتشار', 'draft' => 'پیش نویس', 'pending' => 'در انتظار تایید'), null, array('class' => 'form-control selectpicker'))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <?php echo e(Form::label('location_id', 'مقصد ملک')); ?>

                            <?php echo e(Form::select('location_id', array_pluck($locations, 'name', 'id'), null, array('class' => 'form-control selectpicker'))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group district">
                            <?php echo e(Form::label('district', 'محل ملک')); ?>

                            
                            <select name="district" class="district form-control selectpicker">
                                <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($district); ?>"
                                            <?php if($villa->district == $district): ?> selected <?php endif; ?>><?php echo e($district); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group <?php if($errors->has('number_of_servants')): ?> has-danger <?php endif; ?>">
                            <?php echo e(Form::label('number_of_servants', 'خدمتکاران')); ?>

                            <?php echo e(Form::text('number_of_servants', null, array('placeholder' => 'تعداد خدمتکاران', 'class' => 'form-control', 'onkeypress' => 'return isNumberKey(event)'))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group <?php if($errors->has('number_of_rooms')): ?> has-danger <?php endif; ?>">
                            <?php echo e(Form::label('number_of_rooms', 'تعداد اتاق')); ?>

                            <?php echo e(Form::text('number_of_rooms', null, array('placeholder' => 'تعداد اتاق', 'class' => 'form-control', 'onkeypress' => 'return isNumberKey(event)'))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group <?php if($errors->has('max_passenger')): ?> has-danger <?php endif; ?>">
                            <?php echo e(Form::label('max_passenger', 'مسافران')); ?>

                            <?php echo e(Form::text('max_passenger', null, array('placeholder' => 'تعداد مسافران', 'class' => 'form-control', 'onkeypress' => 'return isNumberKey(event)'))); ?>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group <?php if($errors->has('space')): ?> has-danger <?php endif; ?>">
                            <?php echo e(Form::label('space', 'فضای ملک')); ?>

                            <?php echo e(Form::text('space', null, array('placeholder' => 'فضای ملک', 'class' => 'form-control'))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group <?php if($errors->has('pool_space')): ?> has-danger <?php endif; ?>">
                            <?php echo e(Form::label('pool_space', 'فضای استخر')); ?>

                            <?php echo e(Form::text('pool_space', null, array('placeholder' => 'فضای استخر', 'class' => 'form-control'))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group <?php if($errors->has('number_of_wc')): ?> has-danger <?php endif; ?>">
                            <?php echo e(Form::label('number_of_wc', 'سرویس بهداشتی', array('style' => 'font-size: 10px'))); ?>

                            <?php echo e(Form::text('number_of_wc', null, array('placeholder' => 'تعداد سرویس بهداشتی', 'class' => 'form-control'))); ?>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <?php echo e(Form::label('villa_place', 'موقعیت ملک')); ?>

                            <?php echo e(Form::select('villa_place[]', array('exclusive_beach' => 'ساحل اختصاصی', 'sea_view' => 'دید به دریا', 'beach' => 'کنار دریا', 'see_the_forest' => 'دید به جنگل', 'in_city' => 'داخل شهر'), unserialize($villa->villa_place), array('class' => 'form-control selectpicker', 'multiple'))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <?php echo e(Form::label('properties_in', 'ویژگی های داخل', array('style' => 'font-size: 10px'))); ?>

                            <?php echo e(Form::select('properties_in[]', array_pluck($propertiesin, 'name', 'id'), unserialize($villa->properties_in), array('class' => 'form-control selectpicker', 'multiple'))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <?php echo e(Form::label('properties_out', 'ویژگی های خارج', array('style' => 'font-size: 10px'))); ?>

                            <?php echo e(Form::select('properties_out[]', array_pluck($propertiesout, 'name', 'id'), unserialize($villa->properties_out), array('class' => 'form-control selectpicker', 'multiple'))); ?>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <?php echo e(Form::label('nearest', 'ملکهای نزدیک', array('style' => 'font-size: 10px'))); ?>

                            <?php echo e(Form::select('nearest[]', array_pluck($villas, 'name', 'id'), unserialize($villa->nearest), array('class' => 'form-control selectpicker', 'multiple'))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <?php echo e(Form::label('villaNow', 'ملکهای مشابه', array('style' => 'font-size: 10px'))); ?>

                            <?php echo e(Form::select('villaNow[]', array_pluck($villas, 'name', 'id'), json_decode($villa->villa_now), array('class' => 'form-control selectpicker', 'multiple'))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group bootstrap-selects <?php if($errors->has('price')): ?> has-danger <?php endif; ?>">
                            <?php echo e(Form::label('price', 'قیمت')); ?>

                            <?php echo e(Form::text('price', null, array('class' => 'form-control', 'style' => 'width:42.9%;float:right'))); ?>

                            <?php echo e(Form::select('price_type', array('lira'=>'لیر', 'rial' => 'ریال', 'dollar' => 'دلار', 'euro' => 'یورو'), null, array('class' => 'form-control selectpicker', 'style' => 'width:26%;margin-right:.2rem;float:right'))); ?>

                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <div class="form-group">
                                <?php echo e(Form::label('discount', 'تخفیف')); ?>

                                <?php echo e(Form::text('discount', null, array('class' => 'form-control'))); ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <?php echo e(Form::label('title', 'عنوان')); ?>

                            <?php echo e(Form::text('title', null, array('class' => 'form-control'))); ?>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="checkbox mb-5">
                                <input type="checkbox" name="last_discount" id="last_discount" value="yes"
                                       <?php if($villa->last_discount == 'yes'): ?> checked <?php endif; ?>>
                                <label for="last_discount">تخفیف بالای 10 شب</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <?php echo e(Form::textarea('body', null, array('id' => 'body', 'class' => 'form-control textarea'))); ?>

                        </div>
                        <div class="form-group">
                            <?php echo e(Form::textarea('services', null, array('id' => 'services', 'class' => 'form-control textarea'))); ?>

                        </div>
                        <div class="form-group">
                            <?php echo e(Form::textarea('information', null, array('id' => 'information', 'class' => 'form-control textarea'))); ?>

                        </div>
                        <div class="float-right w-100 my-5">
                            <div class="add-more">
                                <a href="javascript:void(0)" class="btn btn-secondary click-to-add-room"
                                   style="margin-bottom: 15px;"><i
                                            class="fa fa-plus ml-2"></i><span>افزودن اتاق</span></a>
                                <?php echo e(Form::textarea('price_desc', null, array('class' => 'form-control textarea'))); ?>

                                <hr/>
                            </div>
                            <div class="some_room">
                                <?php if($villa->prices != 'N;'): ?>
                                    <?php
                                        $prices = unserialize($villa->prices);
                                        $rooms = 1;
                                    ?>
                                    <?php $__currentLoopData = $prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price => $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <div class="parent-room" data-id="<?php echo e($rooms); ?>">
                                            <a href="javascript:void(0)" class="remove-field"><i
                                                        class="fa fa-close"></i></a>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group row">
                                                        <label for="some_room" class="col-md-7">تعداد اتاق</label>
                                                        <input class="form-control col-md-5"
                                                               onkeypress="return isNumberKey(event)"
                                                               name="some_room[<?php echo e($rooms); ?>][]" type="text"
                                                               value="<?php echo e($room[0]); ?>" required></div>
                                                </div>
                                                <div class="col-md-9">
                                                    <a href="javascript:void(0)"
                                                       class="btn btn-secondary mt-1 click-to-add-price"
                                                       onclick="add_price($(this))"><i
                                                                class="fa fa-plus ml-2"></i><span>افزودن قیمت</span></a>
                                                    <div class="some_price">
                                                        <?php $__currentLoopData = $room['date_in']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $num => $date_in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <div class="form-group"><input
                                                                                class="form-control date"
                                                                                name="some_room[<?php echo e($rooms); ?>][date_in][]"
                                                                                type="text" value="<?php echo e($date_in); ?>"
                                                                                placeholder="از تاریخ"
                                                                                readonly required></div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group"><input
                                                                                class="form-control date"
                                                                                name="some_room[<?php echo e($rooms); ?>][date_out][]"
                                                                                type="text"
                                                                                value="<?php echo e($room['date_out'][$num]); ?>"
                                                                                placeholder="تا تاریخ"
                                                                                readonly required></div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group"><input class="form-control"
                                                                                                   name="some_room[<?php echo e($rooms); ?>][min][]"
                                                                                                   type="text"
                                                                                                   value="<?php echo e($room['min'][$num]); ?>"
                                                                                                   onkeypress="return isNumberKey(event)"
                                                                                                   placeholder="حداقل"
                                                                                                   required></div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group bootstrap-selects"><input
                                                                                class="form-control"
                                                                                name="some_room[<?php echo e($rooms); ?>][some_price][]"
                                                                                type="text"
                                                                                value="<?php echo e($room['some_price'][$num]); ?>"
                                                                                style="width:36%;float:right"> <input
                                                                                class="form-control some_price_last"
                                                                                name="some_room[<?php echo e($rooms); ?>][some_price_last][]"
                                                                                type="text"
                                                                                value="<?php if(isset($room['some_price_last'][$num])): ?><?php echo e($room['some_price_last'][$num]); ?><?php endif; ?>"
                                                                                style="width:32.9%;margin-right:2%;float:right; <?php if($villa->last_discount == 'no'): ?> display: none; <?php endif; ?>"
                                                                                <?php if($villa->last_discount == 'yes'): ?> required <?php endif; ?>
                                                                        >
                                                                        <select class="form-control selectpicker"
                                                                                name="some_room[<?php echo e($rooms); ?>][some_price_type][]"
                                                                                style="width:26%;margin-right:.2rem;float:right">
                                                                            <option value="rial"
                                                                                    <?php if($room['some_price_type'][$num] == 'rial'): ?> selected <?php endif; ?>>
                                                                                ریال
                                                                            </option>
                                                                            <option value="dollar"
                                                                                    <?php if($room['some_price_type'][$num] == 'dollar'): ?> selected <?php endif; ?>>
                                                                                دلار
                                                                            </option>
                                                                            <option value="euro"
                                                                                    <?php if($room['some_price_type'][$num] == 'euro'): ?> selected <?php endif; ?>>
                                                                                یورو
                                                                            </option>
                                                                        </select></div>
                                                                </div>
                                                                <a href="javascript:void(0)" class="remove-field"><i
                                                                            class="fa fa-close"></i></a></div>


                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $rooms++ ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="float-right w-100 my-5">
                            <div class="add-more">
                                <a href="javascript:void(0)" class="btn btn-secondary click-to-add-description"><i
                                            class="fa fa-plus ml-2"></i><span>افزودن توضیحات بیشتر</span></a>
                                <hr/>
                            </div>
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
                        <div class="form-group">
                            <div class="google-map" id="google-map-area" style="width:100%;height:250px"></div>
                        </div>
                        <div>
                            <input  id="geocomplete" type="text" placeholder="نام ملک یا آدرس ملک" size="90" />
                            <input id="find" type="button" class="btn btn-info" value="پیدا کردن" />
                        </div>
                        <div class="form-group">
                            <?php echo e(Form::label('name', 'تصویر شاخص')); ?>

                            <div class="custom-file">
                                <?php echo e(Form::file('photo', array('accept' => 'image/*', 'class' => 'custom-file-input', 'id' => 'customFile'))); ?>

                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
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
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>