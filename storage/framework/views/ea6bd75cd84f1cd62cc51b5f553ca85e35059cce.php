<?php $__env->startComponent('layouts.back'); ?>
    <?php $__env->slot('title'); ?> افزودن <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('body'); ?>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="http://adib-it.com/" target="_blank"><img
                                    src="http://www.support.adib-it.com/img/logo.png" style="margin-top: 10px;"></a>
                    </div>
                    <h2>افزودن <?php echo e($title); ?></h2>
                </div>
            </div>
            <div class="card-body">
                <?php echo e(Form::open(array('route' => 'location-store', 'method' => 'PUT', 'files' => true))); ?>

                <?php echo e(Form::hidden('latitude', '', array('id' => 'latitude'))); ?>

                <?php echo e(Form::hidden('longitude', '', array('id' => 'longitude'))); ?>

                <input type="hidden" name="refer" value="<?php echo e(request()->get('city')); ?>">

                <div class="form-group">
                    <?php echo e(Form::textarea('body', 'متن بالای صفحه', array('id' => 'body', 'class' => 'form-control textarea', 'rows' => 5))); ?>

                </div>
                <div class="form-group">
                    <label for="city_id">شهر</label>
                    <select class="form-control selectpicker" name="city_id" id="city_id">
                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($city->id); ?>" data-latitude="<?php echo e($city->latitude); ?>"
                                    data-longitude="<?php echo e($city->longitude); ?>"><?php echo e($city->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <?php echo e(Form::label('status', 'پرطرفدار')); ?>

                    <?php echo e(Form::select('status', array('manual' => 'نیست', 'best' => 'هست'), '', array('class' => 'form-control selectpicker'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('name', 'نام مقصد')); ?>

                    <?php echo e(Form::text('name', '', array('placeholder' => 'تهران, ایران', 'class' => 'form-control'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('url', 'url')); ?>

                    <?php echo e(Form::text('url', '', array('placeholder' => 'phuket', 'class' => 'form-control'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('districts', 'محل ها')); ?>

                    <?php echo e(Form::text('districts', '', array('placeholder' => 'محل 1، محل 2', 'id' => 'districts', 'class' => 'form-control districts'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('slogan', 'شعار')); ?>

                    <?php echo e(Form::text('slogan', '', array('class' => 'form-control'))); ?>

                </div>
                <div class="float-right w-100 my-5">
                    <div class="add-more">
                        <a href="javascript:void(0)" class="btn btn-secondary click-to-add-description"><i
                                    class="fa fa-plus ml-2"></i><span>افزودن توضیحات بیشتر</span></a>
                        <hr/>
                    </div>
                    <div class="some_description"></div>
                </div>
                <div class="form-group">
                    <div class="google-map" id="google-map-area" style="width:100%;height:250px"></div>
                </div>
                <div>
                    <input id="geocomplete" type="text" placeholder="نام ملک یا آدرس ملک" size="90"/>
                    <input id="find" type="button" class="btn btn-info" value="پیدا کردن"/>
                </div>
                <div class="form-group">
                    <?php echo e(Form::label('name', 'تصویر شاخص  263 * 555')); ?>

                    <?php echo e(Form::file('photo', array('accept' => 'image/*'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('name', 'تصویر اسلایدر  1350 * 450')); ?>

                    <?php echo e(Form::file('slider', array('accept' => 'image/*'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('home', 'تصویر در صفحه اصلی  555* 263 ')); ?>

                    <?php echo e(Form::file('home', array('accept' => 'image/*'))); ?>

                </div>
                <br>
                <div class="form-group">
                    <?php echo e(Form::label('title', 'عنوان')); ?>

                    <?php echo e(Form::text('title', '', array('class' => 'form-control' , 'placeholder' => 'عنوان صفحه'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('meta_keywords', 'کلمات کلیدی')); ?>

                    <?php echo e(Form::text('meta_keywords', '', array('class' => 'form-control' , 'placeholder' => 'با کاما (،) از هم جدا شود'))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('meta_description', 'توضیحات سئو')); ?>

                    <?php echo e(Form::text('meta_description', '', array('class' => 'form-control' , 'placeholder' => 'با کاما (،) از هم جدا شود'))); ?>

                </div>
                <br/>
                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-rounded btn-secondary float-right"><i
                            class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                <?php echo e(Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>افزودن', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left'))); ?>

                <?php echo e(Form::close()); ?>

            </div>
        </div>
    <?php $__env->endSlot(); ?>
    <?php $__env->startPush('stylesheets'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/selectize.min.css')); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap-select.min.css')); ?>"/>
        <style>
            .card-body > form {
                max-width: 100% !important;
            }
        </style>
    <?php $__env->stopPush(); ?>
    <?php $__env->startPush('scripts'); ?>
        <script type="text/javascript" src="<?php echo e(asset('js/selectize.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-select.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-select-fa_IR.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/selectize.min.js')); ?>"></script>
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


            $('#districts').selectize({
                plugins: {
                    remove_button: {
                        label: ""
                    }
                },
                persist: false,
                createOnBlur: true,
                create: true
            });

            var lat = $('#city_id option:selected').attr('data-latitude');
            var lng = $('#city_id option:selected').attr('data-longitude');

            // var lat = "35.680673";
            // var lng = "51.404056";

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
                    map.setCenter(new google.maps.LatLng(latitude,longitude));
                    placeMarker(map, latlng)
                })
            }

        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->renderComponent(); ?>