@component('layouts.back')
    <?php
     if($user->location!=null)
     {
        $user_loc = unserialize($user->location);
     }
     else {
         $user_loc=null;
     }
    ?>
    @slot('title') افزودن {{ $title }} @endslot
    @slot('body')
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>
                    </div>
                    <h4>ویرایش مشتری</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('user-update-save', ['id' => $user->id]) }}{{request('callback_url')?'?callback_url='.request('callback_url'):''}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-row">
                        @if(auth()->user()->hasRole('مدیر') || auth()->user()->hasRole('call center') || auth()->user()->hasRole('call center(sales)'))
                            <div class="col-md-3">
                                <label for="user_id">کارشناس معرف</label>
                                <select class="form-control select2" id="user_id" name="user_id">
                                    <option value="0" {{ (old('user_id') == 0 || !$user->user_id) ? 'selected' : ''  }}>
                                        ندارد
                                    </option>
                                    @foreach(\App\User::role(['مدیر ملک','مدیر','call center','call center(sales)'])->get() as $admin_user)
                                        <option
                                                value="{{ $admin_user->id }}"
                                                {{ old('user_id', $user->user_id) == $admin_user->id ? 'selected' : '' }}>
                                            {{ $admin_user->first_name .' '.$admin_user->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        <div class="col-md-3">
                            <label for="first_name">نام</label>
                            <input type="text"
                                   id="first_name"
                                   name="first_name"
                                   class="form-control"
                                   maxlength="100"
                                   value="{{ old('first_name', $user->first_name) }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="last_name">نام خانوادگی</label>
                            <input type="text"
                                   id="last_name"
                                   name="last_name"
                                   class="form-control"
                                   maxlength="100"
                                   value="{{ old('last_name', $user->last_name) }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="mobile">موبایل</label>
                            <div class="form-inline">
                            <input type="text"
                                   id="mobile"
                                   name="mobile"
                                   class="form-control"
                                   style="direction: ltr; text-align: left;width: 70%"
                                   maxlength="20"
                                   placeholder="(---) --- ----"
                                   value="{{ old('mobile', $user->mobile) }}" required>
                            <input type="text"
                                       id="area_code"
                                       name="area_code"
                                       class="form-control"
                                       style="direction: ltr; text-align: left;width: 25%;margin-right: 5%"
                                       placeholder="---"
                                       value="{{ old('area_code', $user->area_code) }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="mobile1">موبایل 2</label>
                            <div class="form-inline">
                            <input type="text"
                                   id="mobile1"
                                   name="mobile1"
                                   class="form-control"
                                   style="direction: ltr; text-align: left;width: 70%"
                                   maxlength="20"
                                   placeholder="(---) --- ----"
                                   value="{{ old('mobile1', $user->mobile) }}" required>
                            <input type="text"
                                       id="area_code1"
                                       name="area_code1"
                                       class="form-control"
                                       style="direction: ltr; text-align: left;width: 25%;margin-right: 5%"
                                       placeholder="---"
                                       value="{{ old('area_code1', $user->area_code1) }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="job">شغل</label>
                            <input type="text"
                                   id="job"
                                   name="job"
                                   class="form-control"
                                   maxlength="100"
                                   value="{{ old('job', $user->job) }}">
                        </div>
                        <div class="col-md-3">
                            <label for="email">ایمیل</label>
                            <input type="email"
                                   id="email"
                                   name="email"
                                   class="form-control"
                                   maxlength="100"
                                   value="{{ old('email', $user->email) }}">
                        </div>
                        <div class="col-md-3">
                            <label for="gender">جنسیت</label>
                            <select class="form-control"
                                    id="gender"
                                    name="gender">
                                <option value="0" {{ old('gender', $user->gender) == 0 ? 'selected' : '' }}>مرد</option>
                                <option value="1" {{ old('gender', $user->gender) == 1 ? 'selected' : '' }}>زن</option>
                            </select>
                        </div>
                        {{--                        <div class="col-md-3">--}}
                        {{--                            <label for="acquaintance">نحوه آشنایی</label>--}}
                        {{--                            <input type="text"--}}
                        {{--                                   id="acquaintance"--}}
                        {{--                                   name="acquaintance"--}}
                        {{--                                   class="form-control"--}}
                        {{--                                   maxlength="100"--}}
                        {{--                                   value="{{ old('acquaintance', $user->acquaintance) }}">--}}
                        {{--                        </div>--}}

                        <div class="col-md-3">
                            <label for="type_request">نوع درخواست</label>
                            <select class="form-control selectpicker"
                                    id="type_request"
                                    name="type_request[]" multiple>
                                <option @if(!is_null($user->type_request)) @if(is_serialized($user->type_request)) @if($user->type_request!='N;') @if(in_array('rent',unserialize($user->type_request))) selected @endif @endif @endif @endif
                                        value="rent" >
                                    اجاره
                                </option>
                                <option @if(!is_null($user->type_request)) @if(is_serialized($user->type_request)) @if($user->type_request!='N;') @if(in_array('buy',unserialize($user->type_request))) selected @endif @endif @endif @endif
                                        value="buy">
                                    خرید
                                </option>
                            </select>
                        </div>
                        <div class="col-md-3 lavazem-container d-none">
                            <label for="lavazem">وسایل خانه</label>
                            <select class="form-control selectpicker" id="lavazem" name="lavazem">
                                <option value="مبله کامل" {{ old('lavazem') == 'مبله کامل' ? 'selected' : '' }}>مبله کامل</option>
                                <option value="آشپزخانه مبله" {{ old('lavazem', 'آشپزخانه مبله') == 'آشپزخانه مبله' ? 'selected' : '' }}>آشپزخانه مبله</option>
                                <option value="بدون وسایل" {{ old('lavazem', 'بدون وسایل') == 'بدون وسایل' ? 'selected' : '' }}>بدون وسایل</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="location">منطقه مدنظر</label>
                            <select class="form-control selectpicker"
                                    id="location"
                                    name="location[]" multiple>
                                    @foreach(\App\Location::all() as $key=>$location)
                                        <option value="{{ $location->id }}" id="{{ $location->id }}">{{ $location->name }}</option>
                                        @foreach($location->dist($location->id) as $item)
                                            @php
                                                $expload=explode('_',$item);
                                                $slected1=false;
                                                if($user_loc!=null and count($user_loc)>0){

                                                    foreach($user_loc as $loc1){
                                                         if($item==$loc1){
                                                             $slected1=true;
                                                        }
                                                    }
                                                }
                                            @endphp
                                            {{--                                        @if($location->in_arr($item,unserialize($user->location)))--}}
                                            {{--                                        <option value="{{$item}}" selected>district : {{$expload[1]}}</option>--}}
                                            {{--                                        @else--}}
                                            <option class="parent{{$location->id}}" value="{{$item}}" {{$slected1?'selected':''}}>district : {{$expload[1]}} </option>
                                            {{--                                        @endif--}}
                                        @endforeach
                                    @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="property_type">نوع</label>
                            <select class="form-control selectpicker"
                                    id="property_type"
                                    name="property_type[]" multiple>
                                @foreach(\App\Villa::types(false) as $key => $type)
                                    <option
                                            value="{{ $key }}" {{ old('property_type') == $key ? 'selected' : '' }}>{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="property_usage">کاربری</label>
                            <select class="form-control selectpicker"
                                    id="property_usage"
                                    name="property_usage[]" multiple>
                                @foreach(\App\Villa::usering() as $key => $usering)
                                    <option
                                            value="{{ $key }}" {{ old('property_usage', $user->property_usage) == $key ? 'selected' : '' }}>{{ $usering }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="room_number">تعداد اتاق + سالن</label>
                            @php
                                $room_number=[];
                                if (is_serialized($user->room_number)){
                                    $unserialized=unserialize($user->room_number);
                                    if (gettype($unserialized)=='array'){
                                        $room_number=$unserialized;
                                    }
                                }
                            @endphp
                            <select class="form-control selectpicker" id="room_number" name="room_number[]" multiple>
                                <option value="1+0" {{ in_array('1+0',$room_number) ? 'selected' : '' }}>1+0</option>
                                <option value="1+1" {{ in_array('1+1',$room_number) ? 'selected' : '' }}>1+1</option>
                                <option value="2+1" {{ in_array('2+1',$room_number) ? 'selected' : '' }}>2+1</option>
                                <option value="3+1" {{ in_array('3+1',$room_number) ? 'selected' : '' }}>3+1</option>
                                <option value="3+2" {{ in_array('3+2',$room_number) ? 'selected' : '' }}>3+2</option>
                                <option value="4+1" {{ in_array('4+1',$room_number) ? 'selected' : '' }}>4+1</option>
                                <option value="4+2" {{ in_array('4+2',$room_number) ? 'selected' : '' }}>4+2</option>
                            </select>
                        </div>

                        <div class="col-md-3 bootstrap-selects">
                            <label for="budget">بودجه</label>
                            <input type="text"
                                   id="budget"
                                   name="budget"
                                   class="form-control price"
                                   maxlength="100"
                                   value="{{ old('budget', $user->budget) }}">

                            <select class="form-control selectpicker select-picker-2"
                                    id="budget_type"
                                    name="budget_type">
                                @foreach(\App\User::currencies() as $key => $currency)
                                    <option
                                            value="{{ $key }}" {{ old('budget_type', $user->budget_type) == $key ? 'selected' : '' }}>{{ $currency }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 bootstrap-selects budget_sales_container d-none">
                            <label for="budget_sales">بودجه (اجاره)</label>
                            <input type="text"
                                   id="budget_sales"
                                   name="budget_sales"
                                   class="form-control price"
                                   maxlength="100"
                                   value="{{$user->budget_sales}}" style="font-size: 16px">

                            <select class="form-control selectpicker select-picker-2 budget_type"
                                    id="budget_type_sales"
                                    name="budget_type_sales">
                                @foreach(\App\User::currencies() as $key => $currency)
                                    <option
                                            value="{{ $key }}" {{ old('budget_type') == $key ? 'selected' : '' }}>{{ $currency }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="date">تاریخ اعلام</label>
                            <input type="date"
                                   id="date"
                                   name="date"
                                   class="form-control date"
                                   maxlength="100"
                                   value="{{ old('date', $user->date) }}">
                        </div>

                        <div class="col-md-3">
                            <label for="living_country">موقعیت جغرافیایی فعلی</label>
                            <select class="form-control"
                                    id="living_country"
                                    name="living_country">
                                <option value="iran" {{ old('living_country', $user->living_country) == 'iran' ? 'selected' : '' }}>
                                    ایران
                                </option>
                                <option value="turkey" {{ old('living_country', $user->living_country) == 'turkey' ? 'selected' : '' }}>
                                    ترکیه
                                </option>
                                <option value="emirates" {{ old('living_country', $user->living_country) == 'emirates' ? 'selected' : '' }}>
                                    امارات
                                </option>
                                <option value="iraq" {{ old('living_country', $user->living_country) == 'iraq' ? 'selected' : '' }}>
                                    عراق
                                </option>
                                <option value="georgia" {{ old('living_country', $user->living_country) == 'georgia' ? 'selected' : '' }}>
                                    گرجستان
                                </option>
                                <option value="other" {{ old('living_country', $user->living_country) == 'other' ? 'selected' : '' }}>
                                    سایر
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="consulting">نیاز به مشاوره آنلاین</label>
                            <select class="form-control"
                                    id="consulting"
                                    name="consulting">
                                <option value="0" {{ old('consulting', $user->consulting) == 0 ? 'selected' : '' }}>
                                    ندارم
                                </option>
                                <option value="1" {{ old('consulting', $user->consulting) == 1 ? 'selected' : '' }}>
                                    دارم
                                </option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="instant">عجله دارد؟</label>
                            <select class="form-control"
                                    id="instant"
                                    name="instant">
                                <option {{ old('instant', $user->instant) == 'فوری' ? 'selected' : '' }}>فوری</option>
                                <option {{ old('instant', $user->instant) == 'عجله ندارم' ? 'selected' : '' }}>عجله
                                    ندارد
                                </option>
                            </select>
                        </div>

                        @if(auth()->user()->hasRole('مدیر'))
                        <div class="col-md-3">
                            <label for="instant">دسترسی ها</label>
                            {!! Form::select('role_name[]',array_pluck(\App\Role::all(),'name','name'),$user->getRoleNames(),['class'=>'form-control selectpicker','multiple']) !!}
                        </div>
                        @endif

                        <div class="col-md-12">
                            <label for="text" class="d-block w-100 mb-1">گزارش وضعیت ارتباط</label>
                            <textarea id="text" name="text"
                                      class="form-control">{!! old('text', $user->text) !!}</textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-3 mt-4 mr-auto">
                            <button type="submit" class="btn btn-block btn-success">ویرایش</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endslot
    @push('stylesheets')
        <link rel="stylesheet" type="text/css" href="{{ url('assets/admin/css/bootstrap-datepicker.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ url('assets/admin/css/select2.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ url('assets/admin/css/bootstrap-select.min.css') }}"/>
        <style>
            .set-bg {
                text-align: center;
                background: #eeeeee61;
                color: #000;
                padding: 20px;
                border-radius: 5px;
            }
        </style>
    @endpush

    @push('scripts')
        <script type="text/javascript" src="{{ url('assets/admin/js/bootstrap-datepicker.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('assets/admin/js/bootstrap-datepicker-fa.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('assets/admin/js/bootstrap-select.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('assets/admin/js/bootstrap-select-fa_IR.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('assets/admin/js/select2.min.js') }}"></script>
        <script src="{{ url('assets/admin/js/jquery.mask.min.js') }}"></script>
        <script>
            $('#budget').mask("#,##0", {reverse: true});
        </script>
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
            living_country($('#living_country'));
            $('#living_country').change(function () {
                living_country($(this));
            })

            function living_country(el) {
                let val = el.val();
                if (val == 'iran') {
                    $('.bill').show();
                    $('.kimlik').hide();
                } else {
                    $('.bill').show();
                    $('.kimlik').show()
                }
            }
        </script>
        <script>
            // function selectChildren() {
            //     alert('selected');
            // }
            $('#location').change(function() {
                $(this).find("option").each(function()
                {
                    $('.parent').attr('selected','selected')
                });
                $('#location').selectpicker('refresh');
                //alert($(this).attr('data-target'));
                var selectedItem = $('#location').val();
                // //let arraySelected=selectedItem.split(',');
                $.each(selectedItem, function( index, value ) {
                    // alert($(this).find("option[value=5]").is(':selected'))
                    //if($(this).find(`option[value=${value}]`).hasClass())
                    //if($(this).find(`option[class=parent${value}]`))
                    if($.isNumeric(value)){
                        //alert($(this).find("option[value=5]").is(':selected'))
                        if(!$(this).find("option[value=5]").is(':selected')){
                            $('.parent'+value).attr('selected',true)
                            $('#location').selectpicker('refresh');
                        }else{
                            $('.parent'+value).attr('selected',false)
                            $('#location').selectpicker('refresh');
                        }
                    }
                });
            });
            //$('.selectpicker').selectpicker('refresh');
        </script>
        <script>
            getTypeValue($("#type_request"));
            $(document).ready(function(){
                $("#type_request").change(function(){
                    getTypeValue($(this));
                });
            });
            function getTypeValue(el) {
                var selected = el.children("option:selected").val();
                if(selected=='rent'){
                    $('.lavazem-container').removeClass('d-none');
                    $('.budget_sales_container').removeClass('d-none');
                }else{
                    $('.lavazem-container').addClass('d-none');
                    $('.budget_sales_container').addClass('d-none');
                }
            }
        </script>
    @endpush
@endcomponent
