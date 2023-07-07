@component('layouts.back')
    @slot('title') افزودن {{ $title }} @endslot
    @slot('body')
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>
                    </div>

                    <h2>افزودن {{ $title }}</h2>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('city-save') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">نام</label>
                                <input type="text" name="name" id="name" class="form-control"
                                       placeholder="نام منطقه را وارد نمایید">
                                <input type="hidden" name="slug" id="slug">
                            </div>
                            <div class="form-group">
                                <div class="google-map" id="google-map-area" style="width:100%;height:250px"></div>
                            </div>
                            <input type="hidden" id="longitude" name="longitude">
                            <input type="hidden" id="latitude" name="latitude">
                        </div>
                    </div>
                    <button class="btn btn-rounded btn-primary float-left" type="submit"><i
                                class="fa fa-circle-o mtp-1 ml-1"></i>ثبت
                    </button>
                </form>
                <br/>
                <a href="{{ URL::previous() }}" class="btn btn-rounded btn-secondary float-right"><i
                            class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
            </div>
        </div>
    @endslot
    @push('scripts')
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcL_GyWodc1-h7IUTidCeoLKHlTPanbX4&libraries=places&callback=initialize"></script>
        <script>
            slug('#name', '#slug');

            var lat = "41.006979471344955";
            var lng = "28.98226461381144";

            function initialize() {
                var latlng = new google.maps.LatLng(lat, lng);
                var options = {
                    zoom: 9,
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