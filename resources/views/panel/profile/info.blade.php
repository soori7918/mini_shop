@component('layouts.back')
    @slot('title') ویرایش اطلاعات {{ $title }} {{ $profile->first_name }} {{ $profile->last_name }} @endslot
    @slot('body')
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>                    </div>
                    <h2>ویرایش اطلاعات {{ $title }} {{ $profile->first_name }} {{ $profile->last_name }}</h2>
                </div>
            </div>
            <div class="card-body">
                {{ Form::model($info, array('route' => array('profile-info-update', $profile->id), 'method' => 'PATCH')) }}
                {{ Form::hidden('latitude', null, array('id' => 'latitude')) }}
                {{ Form::hidden('longitude', null, array('id' => 'longitude')) }}
                @if($profile->character == 'real')
                    <div class="form-group">
                        {{ Form::label('national_code', 'کد ملی') }}
                        {{ Form::text('national_code', null, array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('date_of_birth', 'تاریخ تولد') }}
                        {{ Form::text('date_of_birth', null, array('class' => 'form-control date-picker')) }}
                    </div>
                @endif
                @if($profile->character == 'legal')
                    <div class="form-group">
                        {{ Form::label('company_name', 'نام شرکت') }}
                        {{ Form::text('company_name', null, array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('company_registration_number', 'شماره ثبت شرکت') }}
                        {{ Form::text('company_registration_number', null, array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('economical_number', 'شماره اقتصادی') }}
                        {{ Form::text('economical_number', null, array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('code_national_identity', 'کد / شناسه ملی') }}
                        {{ Form::text('code_national_identity', null, array('class' => 'form-control')) }}
                    </div>
                @endif
                <div class="form-group">
                    {{ Form::label('province_id', 'استان') }}
                    {{ Form::select('province_id', array_pluck($provinces, 'name', 'id'), null, array('class' => 'form-control select2')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('city_id', 'شهر') }}
                    {{ Form::select('city_id', array_pluck($cities, 'name', 'id'), null, array('class' => 'form-control select2')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('postal_code', 'کد پستی') }}
                    {{ Form::text('postal_code', null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('postal_address', 'آدرس پستی') }}
                    {{ Form::text('postal_address', null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('phone', 'تلفن ثابت') }}
                    {{ Form::text('phone', null, array('class' => 'form-control')) }}
                </div>
                <br/>
                <a href="{{ URL::previous() }}" class="btn btn-rounded btn-secondary float-right"><i class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                {{ Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>ویرایش اطلاعات', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left')) }}
                <a href="javascript:void(0)" class="btn btn-rounded btn-danger float-left ml-2" data-toggle="modal" data-target="#map"><i class="nc-icon location_pin mtp-1 ml-1"></i>ثبت آدرس روی نقشه</a>
                {{ Form::close() }}
            </div>
        </div>
        <!-- Map -->
        <div class="modal fade" id="map" tabindex="-1" role="dialog" aria-labelledby="mapLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="mapLabel">ثبت آدرس روی نقشه</h4>
                    </div>
                    <div class="modal-body">
                        <div class="google-map" id="google-map-area" style="width:100%;height:500px"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">انجام شد</button>
                    </div>
                </div>
            </div>
        </div>
    @endslot
    @push('stylesheets')
        <link rel="stylesheet" type="text/css" href="{{ url('assets/admin/css/bootstrap-datepicker.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ url('assets/admin/css/select2.min.css') }}"/>
    @endpush
    @push('scripts')
        <script type="text/javascript" src="{{ url('assets/admin/js/bootstrap-datepicker.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('assets/admin/js/bootstrap-datepicker-fa.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('assets/admin/js/select2.min.js') }}"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxfZQk73sogROY9KKRmtPIsLSFSjX7o7w&libraries=places&callback=initialize"></script>
        <script type="text/javascript">
            $('.date-picker').each(function () {
                $(this).datepicker({
                    dateFormat: "yy-mm-dd"
                });
            });
            $('.select2').each(function () {
                $(this).select2();
            });
            $('select[name="province_id"]').on('change', function () {
                var province_id = $(this).val();
                if (province_id) {
                    $.ajax({
                        url: '/star/panel/city/' + province_id,
                        type: "get",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="city_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="city_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="city_id"]').empty();
                }
            });

            var lat = "{{ number_format((float)$info->latitude, 5, '.', '') }}";
            var lng = "{{ number_format((float)$info->longitude, 5, '.', '') }}";

            function initialize() {
                var latlng = new google.maps.LatLng(lat, lng);
                var options = {
                    zoom: 13,
                    center: latlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    styles: [{"featureType": "all", "elementType": "geometry.fill", "stylers": [{"weight": "2.00"}]}, {"featureType": "all", "elementType": "geometry.stroke", "stylers": [{"color": "#9c9c9c"}]}, {
                        "featureType": "all",
                        "elementType": "labels.text",
                        "stylers": [{"visibility": "on"}]
                    }, {"featureType": "landscape", "elementType": "all", "stylers": [{"color": "#f2f2f2"}]}, {"featureType": "landscape", "elementType": "geometry.fill", "stylers": [{"color": "#ffffff"}]}, {
                        "featureType": "landscape.man_made",
                        "elementType": "geometry.fill",
                        "stylers": [{"color": "#ffffff"}]
                    }, {"featureType": "poi", "elementType": "all", "stylers": [{"visibility": "off"}]}, {"featureType": "road", "elementType": "all", "stylers": [{"saturation": -100}, {"lightness": 45}]}, {
                        "featureType": "road",
                        "elementType": "geometry.fill",
                        "stylers": [{"color": "#eeeeee"}]
                    }, {"featureType": "road", "elementType": "labels.text.fill", "stylers": [{"color": "#7b7b7b"}]}, {"featureType": "road", "elementType": "labels.text.stroke", "stylers": [{"color": "#ffffff"}]}, {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [{"visibility": "simplified"}]
                    }, {"featureType": "road.arterial", "elementType": "labels.icon", "stylers": [{"visibility": "off"}]}, {"featureType": "transit", "elementType": "all", "stylers": [{"visibility": "off"}]}, {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [{"color": "#46bcec"}, {"visibility": "on"}]
                    }, {"featureType": "water", "elementType": "geometry.fill", "stylers": [{"color": "#c8d7d4"}]}, {"featureType": "water", "elementType": "labels.text.fill", "stylers": [{"color": "#070707"}]}, {
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
                        icon: "{{ url('assets/admin/pic/pin.png') }}"
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
        </script>
    @endpush
@endcomponent