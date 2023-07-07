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
                  <form method="post" action="<?php echo e(route('villa-category-store')); ?>" enctype="multipart/form-data">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('post'); ?>
                      <div class="row">
                          <div class="col-lg-8">
                              <div class="row">
                                  <div class="col-lg-6 form-group">
                                      <label for="project_code">کد پروژه</label>
                                      <input type="text" class="form-control" name="project_code" placeholder="عنوان">
                                  </div>
                                  <div class="col-lg-6 form-group">
                                      <label for="title">عنوان</label>
                                      <input type="text" class="form-control" name="title" placeholder="عنوان">
                                  </div>
                                  <div class="col-lg-6 form-group">
                                      <label for="slug">اسلاگ</label>
                                      <input type="text" class="form-control" name="slug" >
                                  </div>
                                  <div class="col-lg-6 form-group">
                                      <label for="keyword">کلمات کلیدی</label>
                                      <input type="text" class="form-control" name="keyword" >
                                  </div>
                                  <div class="col-lg-6 form-group">
                                      <label for="price_label">لیبل پشت قیمت</label>
                                      <input type="text" class="form-control" name="price_label" >
                                  </div>
                                  <div class="col-lg-6 form-group">
                                      <label for="start_price">شروع قیمت از (لیر)</label>
                                      <input type="text" class="form-control" name="start_price" >
                                  </div>
                                  <div class="col-lg-6 form-group">
                                      <label for="total">تعداد کل اتاق</label>
                                      <input type="text" class="form-control" name="total" placeholder="">
                                  </div>
                                  <div class="col-lg-6 form-group">
                                      <label for="bedroom">تعداد اتاق خواب</label>
                                      <input type="text" class="form-control" name="bedroom" placeholder="">
                                  </div>
                                  <div class="col-lg-6 form-group">
                                      <label for="bathroom">تعداد حمام</label>
                                      <input type="text" class="form-control" name="bathroom" placeholder="">
                                  </div>
                                  <div class="col-lg-6 form-group">
                                      <label for="activity">کلاس انرژی</label>
                                      <input type="text" class="form-control" name="activity" placeholder="">
                                  </div>
                                  <div class="col-lg-6 form-group">
                                      <label for="area">مساحت پروژه</label>
                                      <input type="text" class="form-control" name="area" placeholder="">
                                  </div>
                                  <div class="col-lg-6 form-group">
                                      <label for="wc_count">تعداد سرویس بهداشتی</label>
                                      <input type="text" class="form-control" name="wc_count" placeholder="">
                                  </div>
                                  <div class="col-lg-6 form-group">
                                      <label for="count_all_unit">تعداد کل واحدها</label>
                                      <input type="text" class="form-control" name="count_all_unit" placeholder="">
                                  </div>
                                  <div class="col-lg-6 form-group">
                                      <label for="count_sale_unit">تعداد واحد های فروش رفته</label>
                                      <input type="text" class="form-control" name="count_sale_unit" placeholder="">
                                  </div>
                                  <div class="col-lg-12 form-group">
                                      <label for="short_description">توضیحات مختصر</label>
                                      <textarea class="form-control " id="short_description" name="short_description" ></textarea>
                                  </div>
                                  <div class="col-lg-12 form-group">
                                      <label for="description">توضیحات پروژه</label>
                                      <textarea class="form-control textarea" id="description" name="description" ></textarea>
                                  </div>
                              </div>
                              <div class="row">
                                  <h3 class="py-3 mb-3">تصویر شاخص</h3>
                                  <div class="col-lg-12 form-group">
                                      <label for="image">تصویر شاخص</label>
                                      <input type="file" class="form-control" name="image"  >
                                  </div>
                              </div>
                              <div class="row">
                                  <h3 class="py-3 mb-3">گالری تصاویر پروژه</h3>
                                  <div class="col-lg-12 form-group">
                                      <label for="images"> گالری تصاویر</label>
                                      <input type="file" class="form-control" name="images[]" multiple >
                                  </div>
                              </div>
                              <div class="row">
                                  <h3 class="py-3 mb-3">آدرس و موقعیت پروژه</h3>
                                  <div class="col-lg-12 form-group">
                                      <textarea class="form-control" rows="3" name="map" ></textarea>
                                  </div>
                              </div>
                              <div class="row">
                                  <h3 class="py-3 mb-3">نماینده</h3>
                                  <div class="col-lg-12 form-group">
                                      <select class="form-control" name="agent">
                                          <option value="">انتخاب کنید</option>
                                          <?php $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($agent->id); ?>"><?php echo e($agent->name); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </select>
                                  </div>
                              </div>
                              <div class="row">
                                  <h3 class="py-3 mb-3">پلن های پروژه</h3>
                                  <div class="col-lg-12 form-group">
                                      <label for="plan">پلن ها</label>
                                      <input type="file" class="form-control" name="plans[]" multiple >
                                  </div>
                              </div>
                              <div class="row">
                                  <h3 class="py-3 mb-3">پروژه های مرتبط</h3>
                                  <div class="col-lg-12 form-group">
                                      <select class="form-control" name="agent">
                                          <option value=""></option>
                                      </select>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-4">
                              <div class="card bg-white p-2 text-black w-100 shadow-sm" style="color: black">
                                    <div class="card-header shadow-sm"  style="color: black">
                                        categories
                                    </div>
                                    <div class="card-body" style="max-height: 250px; overflow-y: scroll">
                                        <?php $__currentLoopData = $project_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <label style="color: black;width: 100%">
                                           <input type="checkbox" value="<?php echo e($project_category->id); ?>"  name="project_category[]"><span class="px-2" style="color: black"><?php echo e($project_category->title); ?></span>
                                       </label>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <a class="btn btn-primary">افزودن</a>
                                </div>
                              <div class="card bg-white p-2 text-black w-100 shadow-sm" style="color: black">
                                    <div class="card-header shadow-sm"  style="color: black">
                                        type
                                    </div>
                                    <div class="card-body" style="max-height: 250px; overflow-y: scroll">
                                        <?php $__currentLoopData = $propertiesout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project_property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <label style="color: black;width: 100%">
                                           <input type="checkbox" value="<?php echo e($project_property->id); ?>"  name="project_property[]"><span class="px-2" style="color: black"><?php echo e($project_property->name); ?></span>
                                       </label>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <a class="btn btn-primary">افزودن</a>
                              </div>
                              <div class="card bg-white p-2 text-black w-100 shadow-sm" style="color: black">
                                    <div class="card-header shadow-sm"  style="color: black">
                                        city
                                    </div>
                                    <div class="card-body" style="max-height: 250px; overflow-y: scroll">
                                        <?php $__currentLoopData = $cities1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <label style="color: black;width: 100%">
                                           <input type="checkbox" value="<?php echo e($city->id); ?>"  name="city[]"><span class="px-2" style="color: black"><?php echo e($city->name); ?></span>
                                       </label>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <a class="btn btn-primary">افزودن</a>
                              </div>
                              <div class="card bg-white p-2 text-black w-100 shadow-sm" style="color: black">
                                    <div class="card-header shadow-sm"  style="color: black">
                                        nighberhood
                                    </div>
                                    <div class="card-body" style="max-height: 250px; overflow-y: scroll">
                                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <label style="color: black;width: 100%">
                                                <input type="checkbox" value="<?php echo e($city->id); ?>"  name="neighberhood[]"><span class="px-2" style="color: black"><?php echo e($city->name); ?></span>
                                            </label>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <a class="btn btn-primary">افزودن</a>
                              </div>
                              <div class="card bg-white p-2 text-black w-100 shadow-sm" style="color: black">
                                    <div class="card-header shadow-sm"  style="color: black">
                                        county
                                    </div>
                                    <div class="card-body" style="max-height: 250px; overflow-y: scroll">
                                        <?php $__currentLoopData = $contries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <label style="color: black;width: 100%">
                                                <input type="checkbox" value="<?php echo e($country->id); ?>"  name="country[]"><span class="px-2" style="color: black"><?php echo e($country->fa_name); ?></span>
                                            </label>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <a class="btn btn-primary">افزودن</a>
                              </div>
                              <div class="card bg-dark p-2 text-white w-100 shadow-sm" style="color: black">
                                    <div class="card-header shadow-sm"  style="color: white">
                                        وضعیت پروژه
                                    </div>
                                    <div class="card-body">
                                        <select class="form-control" name="status">
                                            <option value="">انتخاب کنید</option>
                                            <option value="published">فعال</option>
                                            <option value="pending">در انتظار تایید</option>
                                        </select>
                                    </div>
                                    <a class="btn btn-primary">افزودن</a>
                              </div>

                              <button type="submit" class="btn btn-success">ذخیره پروژه</button>
                          </div>
                      </div>
                  </form>
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
                        icon: "<?php echo e(url('assets/admin/pic/pin.png')); ?>"
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
