<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> افزودن <?php echo e('پروژه'); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <style>
            .singel{
                padding: 40px!important;
                background-color: #d2cccc;
                border-radius: 7px;
                box-shadow: 0 0 5px 6px #000;
                color: #000!important;
            }
            .singel *{
                color: #000;
            }
        </style>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="<?php echo e(url('/')); ?>" target="_blank"><img src="<?php echo e(logo()); ?>" style="margin-top: 10px;"></a>

                    </div>
                    <h2>افزودن <?php echo e('پروژه'); ?></h2>
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <?php echo e(Form::open(array('route' => 'villa-category-store', 'method' => 'PUT', 'files'=>true))); ?>

                    <input type="hidden" name="type" value="villa">

                    
                        
                            
                            
                        
                                  
                            
                        
                        
                            
                            
                        
                                  
                            
                        
                    
                    <div class="row">
                        <div class="col-md-4">
                            <label for="code">کد</label>
                            <input type="text" name="code" id="code" class="form-control only-en"
                                   value="<?php echo e(rand(100000, 999999)); ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="name">نام پروژه</label>
                            <input type="text" class="form-control" name="name" id="name" value="<?php echo e(old('name')); ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="slug">نامک</label>
                            <input type="text" class="form-control" name="slug" id="slug" value="<?php echo e(old('slug')); ?>">
                        </div>
                        
                            
                                
                                
                            
                        
                        
                            
                                
                                
                            
                        
                        
                            
                                
                                
                            
                        
                        
                            
                                
                                
                            
                        
                        
                            
                                
                                
                            
                        
                        
                            
                                
                                
                            
                        
                        
                        
                        
                        
                        
                        
                        
                            
                                
                                
                            
                        
                        
                            
                                
                                
                            
                        
                        <div class="col-md-4 col-xs-12">
                            <div class="form-group">
                                <?php echo e(Form::label('properties_out', 'امکانات رفاهی', array('style' => 'font-size: 10px'))); ?>

                                <?php echo e(Form::select('properties_out[]', array_pluck($propertiesout, 'name', 'id'),null, array('class' => 'form-control selectpicker', 'multiple'))); ?>

                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <div class="form-group">
                                <?php echo e(Form::label('properties_access', 'دسترسی ها', array('style' => 'font-size: 10px'))); ?>

                                <?php echo e(Form::select('properties_access[]', array_pluck($propertiesaccess, 'name', 'id'),null, array('class' => 'form-control selectpicker', 'multiple'))); ?>

                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <div class="form-group <?php if($errors->has('price')): ?> has-danger <?php endif; ?>">
                                <?php echo e(Form::label('price', 'شروع قیمت از(لیر)')); ?>

                                <?php echo e(Form::text('price', null, array('class' => 'form-control price_mask'))); ?>

                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12">
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
                        <div class="col-md-4 col-xs-12">
                            <div class="form-group">
                                <label for="city_id">منطقه</label>
                                <select class="form-control chosen-select select_js city_id" name="city_id" id="city_id" data-type="city_id" data-reply="zone_id" data-name="منطقه">
                                    <option value="">انتخاب نمایید</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <div class="form-group">
                                <label for="zone_id">محله</label>
                                <select class="form-control chosen-select  zone_id" name="zone_id" id="zone_id">
                                    <option value="">ابتدا منطقه را انتخاب کنید</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="address">آدرس(محله)</label>
                                <input type="text" class="form-control" name="address" id="address"
                                       value="<?php echo e(old('address')); ?>">
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-4 col-xs-12">
                            <div class="form-group">
                                <label for="count_all_unit">تعداد کل واحد ها</label>
                                <input type="text" class="form-control text-center" name="count_all_unit" id="count_all_unit "
                                       value="<?php echo e(old('count_all_unit')); ?>">
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <div class="form-group">
                                <label for="count_sale_unit">تعداد واحد های فروش رفته</label>
                                <input type="number" class="form-control text-center" name="count_sale_unit" id="count_sale_unit"
                                       value="<?php echo e(old('count_sale_unit',0)); ?>">
                            </div>
                        </div>
                    </div>








                    <div class="form-group">
                        <label>تصویر پروژه</label>
                        <input type="file" class="gallery-multiple" name="photo" accept="image/*" >
                        <div class="gallery-preview">
                        </div>
                    </div>
                    
                        
                        
                        
                        
                    
                    
                        
                        
                        
                        
                    
                    
                        
                        
                        
                            
                                
                                    
                                    
                                    
                                    
                                
                            
                            
                                
                                    
                                    
                                
                            
                            
                                
                                    
                                    
                                
                            
                        
                        
                            
                                
                                    
                                    
                                
                            
                            
                                
                                    
                                    
                                
                            
                        
                        
                            
                                
                                    
                                    
                                
                            
                            
                                
                                    
                                    
                                
                            
                        
                        
                            
                                
                                    
                                    
                                
                            
                        
                        
                            
                                
                                    
                                    
                                
                            
                            
                                
                                
                        
                                  
                                
                            
                        
                        

                            
                                
                                
                        
                                  
                                
                            
                        
                        
                            
                                
                                    
                                    
                                
                            
                            
                                
                                    
                                    
                                
                            
                            
                                
                                    
                                    
                                
                            
                            
                                
                                    
                                    
                                
                            
                            
                                
                                    
                                    
                                
                            
                            
                                
                                    
                                    
                                
                            
                        
                    
                    <br/>
                    <a href="<?php echo e(URL::previous()); ?>" class="btn btn-rounded btn-secondary float-right"><i
                                class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                    <?php echo e(Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>افزودن', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left'))); ?>

                    <?php echo e(Form::close()); ?>

                </div>

            </div>
        </div>
    <?php $__env->endSlot(); ?>
    <?php $__env->startPush('stylesheets'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(url('assets/admin/css/bootstrap-datepicker.min.css')); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo e(url('assets/admin/css/bootstrap-select.min.css')); ?>"/>
    <?php $__env->stopPush(); ?>
    <?php $__env->startPush('scripts'); ?>
        <script type="text/javascript" src="<?php echo e(url('assets/admin/js/bootstrap-datepicker.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(url('assets/admin/js/bootstrap-datepicker-fa.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(url('assets/admin/js/bootstrap-select.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(url('assets/admin/js/bootstrap-select-fa_IR.min.js')); ?>"></script>
        <script src="<?php echo e(asset('editor/laravel-ckeditor/ckeditor.js')); ?>"></script>
        <script src="<?php echo e(asset('editor/laravel-ckeditor/adapters/jquery.js')); ?>"></script>
        <script src="<?php echo e(url('assets/admin/js/jquery.mask.min.js')); ?>"></script>
        <script>
            $('.price_mask').mask("#,##0", {reverse: true});
        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAx_3Y3D_LI7eTU4WZyZgX9mwuM8DmQeOo&libraries=places&callback=initialize"></script>

        <script type="text/javascript">
            slug('#name', '#slug');

            var lat = "41.006979471344955";
            var lng = "28.98226461381144";

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
                var map = new google.maps.Map(document.getElementById("google-map-area"), options);
                var marker = new google.maps.Marker(
                    {
                        map: map,
                        draggable: true,
                        animation: google.maps.Animation.DROP,
                        icon: "<?php echo e(url('assets/admin/pic/pin.png')); ?>"
                    });

                function placeMarker(map, location) {
                    if (marker) {
                        marker.setPosition(location);
                    } else {
                        marker = new google.maps.Marker({
                            position: location,
                            map: map,
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

                //
                // $('#city_id').change(function () {
                //     let that = $(this)
                //
                //     let latitude = $('option:selected', this).attr('data-latitude');
                //     let longitude = $('option:selected', this).attr('data-longitude');
                //     let latlng = new google.maps.LatLng(latitude, longitude);
                //     map.setCenter(new google.maps.LatLng(latitude, longitude));
                //     placeMarker(map, latlng)
                // })
            }

            // $('#city_id').change(function () {
            //     var target = $(this).find(':selected').attr('data-target');
            //     $('#location_id option').hide();
            //     $('#location_id option:first').show();
            //     $(target).show();
            //     $('#location_id').val(0);
            //     $('#location_id').selectpicker('refresh');
            // });
            $(".chosen-select").chosen();

        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>
