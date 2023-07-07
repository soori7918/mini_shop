<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> ویرایش <?php echo e('پروژه'); ?> <?php $__env->endSlot(); ?>
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
            .height_50{
                height: 50px;
            }
        </style>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="<?php echo e(url('/')); ?>" target="_blank"><img src="<?php echo e(logo()); ?>" style="margin-top: 10px;"></a>

                    </div>
                    <h2>ویرایش <?php echo e('پروژه'); ?></h2>
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <?php echo e(Form::model($category, array('route' => array('villa-category-update', $category->id), 'method' => 'PATCH', 'files' => true,))); ?>

                    <input type="hidden" name="type" value="villa">
                    <div class="form-group">
                        <label for="code">کد</label>
                        <input type="text" name="code" id="code" class="form-control only-en"
                               value="<?php echo e($category->code); ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">نام پروژه</label>
                        <input type="text" class="form-control" name="name" id="name"
                               value="<?php echo e(old('name', $category->name)); ?>">
                    </div>
                    <div class="form-group">
                        <label for="slug">نامک</label>
                        <input type="text" class="form-control" name="slug" id="slug"
                               value="<?php echo e(old('slug', $category->slug)); ?>">
                    </div>

                    <div class="form-group">
                        <label for="address">آدرس</label>
                        <input type="text" class="form-control" name="address" id="address"
                               value="<?php echo e(old('address', $category->address)); ?>">
                    </div>

                    
                        
                            
                            
                        
                                  
                            
                        
                        
                            
                            
                        
                                  
                            
                        
                    



                    <div class="row">
                        
                            
                                
                                
                            
                        
                        
                            
                                
                                
                            
                        
                        
                            
                                
                                
                            
                        
                        
                            
                                
                                
                            
                        
                        
                            
                                
                                
                            
                        
                        
                            
                                
                                
                            
                        






                        
                            
                                
                                
                            
                        
                        
                            
                                
                                
                            
                        
                        
                            
                                
                                
                            
                        
                        
                            
                                
                                
                            
                        
                        <div class="col-md-4 col-xs-12">
                            <div class="form-group <?php if($errors->has('price')): ?> has-danger <?php endif; ?>">
                                <?php echo e(Form::label('price', 'شروع قیمت از (لیر)')); ?>

                                <?php echo e(Form::number('price', null, array('class' => 'form-control'))); ?>

                            </div>
                        </div>
                    </div>

                    
                        
                            
                                
                                
                                    
                                    
                                        
                                                
                                                
                                    
                                
                            
                        
                        
                            
                                
                                
                                    
                                    
                                        
                                                
                                    
                                
                            
                        
                    
                    
                        
                        
                            
                        
                        
                               
                        
                               
                    
                    <div class="form-group">
                        <label>گالری</label>
                        <input type="file" class="gallery-multiple" name="gallery[]" accept="image/*" multiple>
                        <div class="gallery-preview">
                        </div>
                        <div class="row">
                            <style>
                                .gallery-delete {
                                    position: absolute;
                                    left: 15px;
                                    top: 10px;
                                    height: 20px;
                                    text-align: center;
                                    background: #f33434;
                                    color: white;
                                    border-radius: 10px;
                                    cursor: pointer;
                                    z-index: 101;
                                    padding: 0px 7px;
                                }
                            </style>
                            <?php $__currentLoopData = $category->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-2">
                                    <a href="<?php echo e(route('villa-category-photo-destroy',$photo->id)); ?>" class="gallery-delete">x</a>
                                    <a href="<?php echo e(url($photo->path)); ?>" target="_blank" class="">
                                        <img class="img-fluid" src="<?php echo e(url($photo->path)); ?>" alt="">
                                    </a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    
                        
                        
                        
                        

                        
                            
                                
                                    
                                
                            
                        
                    
                    
                        
                        
                        
                        
                        
                            
                                
                                    
                                
                            
                        
                    
                    <div class="singel">
                        <h3 class="text-center"> بخش سینگل پیج</h3>
                        <hr class="mt-3 mb-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>تصویر اول</label>
                                    <input type="file" class="gallery-multiple" name="pic_1" accept="image/*" >
                                    <div class="gallery-preview">
                                    </div>
                                </div>
                                <?php if($category->pic_1): ?>
                                <a href="<?php echo e(url($category->pic_1->path)); ?>">
                                    <img class="img-fluid height_50" src="<?php echo e(url($category->pic_1->path)); ?>" alt="">
                                </a>
                                    <?php endif; ?>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="address">توضیحات منطقه ای</label>
                                    <input type="text" class="form-control" name="place_description" id="place_description" value="<?php echo e(old('place_description',$category->place_description)); ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">توضیحات کوتاه اول</label>
                                    <input type="text" class="form-control" name="short_text_1" id="short_text_1" value="<?php echo e(old('short_text_1',$category->short_text_1)); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>تصویر دوم</label>
                                    <input type="file" name="pic_2" accept="image/*" >
                                </div>
                                <?php if($category->pic_2): ?>
                                    <a href="<?php echo e(url($category->pic_2->path)); ?>">
                                        <img class="img-fluid height_50" src="<?php echo e(url($category->pic_2->path)); ?>" alt="">
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="address">توضیحات (تعداد طبقات و واحد ها)</label>
                                    <input type="text" class="form-control" name="count_description" id="place_description" value="<?php echo e(old('place_description',$category->count_description)); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>تصویر سوم</label>
                                    <input type="file" name="pic_3" accept="image/*" >
                                </div>
                                <?php if($category->pic_3): ?>
                                    <a href="<?php echo e(url($category->pic_3->path)); ?>">
                                        <img class="img-fluid height_50" src="<?php echo e(url($category->pic_3->path)); ?>" alt="">
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="address">توضیحات (متراژ)</label>
                                    <input type="text" class="form-control" name="meter_description" id="meter_description" value="<?php echo e(old('meter_description',$category->meter_description)); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>تصویر موقعیت مکانی</label>
                                    <input type="file" name="map_pic" accept="image/*" >
                                </div>
                                <?php if($category->map_pic): ?>
                                    <a href="<?php echo e(url($category->map_pic->path)); ?>">
                                        <img class="img-fluid height_50" src="<?php echo e(url($category->map_pic->path)); ?>" alt="">
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>بگراند بخش دسترسی ها</label>
                                    <input type="file" name="access_bg" accept="image/*" >
                                </div>
                                <?php if($category->acess_bg): ?>
                                    <a href="<?php echo e(url($category->access_bg->path)); ?>">
                                        <img class="img-fluid height_50" src="<?php echo e(url($category->access_bg->path)); ?>" alt="">
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-12">
                                <label for="brief">دسترسی ها</label>
                                <div class="form-group">
                        <textarea class="textarea" id="access_text"
                                  name="access_text"><?php echo old('access_text',$category->access_text); ?></textarea>
                                </div>
                            </div>
                        </div>
                        

                            
                                
                                
                        
                                  
                                
                            
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>تصویر چهارم</label>
                                    <input type="file" name="pic_4" accept="image/*" >
                                </div>
                                <?php if($category->pic_4): ?>
                                    <a href="<?php echo e(url($category->pic_4->path)); ?>">
                                        <img class="img-fluid height_50" src="<?php echo e(url($category->pic_4->path)); ?>" alt="">
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>تصویر پنجم</label>
                                    <input type="file" name="pic_5" accept="image/*" >
                                </div>
                                <?php if($category->pic_5): ?>
                                    <a href="<?php echo e(url($category->pic_5->path)); ?>">
                                        <img class="img-fluid height_50" src="<?php echo e(url($category->pic_5->path)); ?>" alt="">
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>تصویر نمونه واحد ها</label>
                                    <input type="file" name="single_sample" accept="image/*" >
                                </div>
                                <?php if($category->single_sample): ?>
                                    <a href="<?php echo e(url($category->single_sample->path)); ?>">
                                        <img class="img-fluid height_50" src="<?php echo e(url($category->single_sample->path)); ?>" alt="">
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>تصویر امکانات رفاهی</label>
                                    <input type="file" name="possibilities" accept="image/*" >
                                </div>
                                <?php if($category->possibilities): ?>
                                    <a href="<?php echo e(url($category->possibilities->path)); ?>">
                                        <img class="img-fluid height_50" src="<?php echo e(url($category->possibilities->path)); ?>" alt="">
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>تصویر امکانات رفاهی(آیکن ها)</label>
                                    <input type="file" name="icon_possibilities" accept="image/*" >
                                </div>
                                <?php if($category->icon_possibilities): ?>
                                    <a href="<?php echo e(url($category->icon_possibilities->path)); ?>">
                                        <img class="img-fluid height_50" src="<?php echo e(url($category->icon_possibilities->path)); ?>" alt="">
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>تصویر نقشه واحد ها</label>
                                    <input type="file" name="map_home" accept="image/*" >
                                </div>
                                <?php if($category->map_home): ?>
                                    <a href="<?php echo e(url($category->map_home->path)); ?>">
                                        <img class="img-fluid height_50" src="<?php echo e(url($category->map_home->path)); ?>" alt="">
                                    </a>
                                <?php endif; ?>
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

            var lat = $('#city_id option:selected').attr('data-latitude');
            var lng = $('#city_id option:selected').attr('data-longitude');

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
                        icon: "<?php echo e(asset('img/pin.png')); ?>"
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


                $('#city_id').change(function () {
                    let that = $(this)

                    let latitude = $('option:selected', this).attr('data-latitude');
                    let longitude = $('option:selected', this).attr('data-longitude');
                    let latlng = new google.maps.LatLng(latitude, longitude);
                    map.setCenter(new google.maps.LatLng(latitude, longitude));
                    placeMarker(map, latlng)
                })
            }

            $('#city_id').change(function () {
                var target = $(this).find(':selected').attr('data-target');
                $('#location_id option').hide();
                $('#location_id option:first').show();
                $(target).show();
                $('#location_id').val(0);
                $('#location_id').selectpicker('refresh');
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>
