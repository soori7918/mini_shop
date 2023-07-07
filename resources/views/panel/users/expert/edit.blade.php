@component('layouts.back')
    @slot('title') ویرایش {{ $title }} {{ $user->first_name }} {{ $user->last_name }} @endslot
    @slot('body')
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>                    </div>
                    <h2>ویرایش {{ $title }} {{ $user->first_name }} {{ $user->last_name }}</h2>
                </div>
            </div>
            <div class="card-body">
                {{ Form::model($user, array('route' => array('user-property-update', $user->id), 'method' => 'PATCH', 'files' => true)) }}
                <input type="hidden" name="url" value="{{isset($url)?$url:url()->previous()}}">
                @if(auth()->user()->hasRole('مدیر') || auth()->user()->hasRole('call center') || auth()->user()->hasRole('call center(sales)'))
                    <div class="form-group">
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
                <div class="form-group">
                    {{ Form::label('first_name', 'نام') }}
                    {{ Form::text('first_name', null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('last_name', 'نام خانوادگی') }}
                    {{ Form::text('last_name', null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('email', 'ایمیل') }}
                    {{ Form::email('email', null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('area_code', 'پیش شماره') }}
                    {{ Form::text('area_code', null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('mobile', 'موبایل') }}
                    {{ Form::text('mobile', null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('date_of_birth', 'تاریخ تولد') }}
                    {{ Form::text('date_of_birth', null, array('class' => 'form-control date-picker')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('birth_place', 'محل تولد') }}
                    {{ Form::text('birth_place', null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('mobile', 'شماره تماس') }}
                    {{ Form::text('mobile', null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('kimlik_number', 'شماره کیملیک') }}
                    {{ Form::text('kimlik_number', null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('education', 'تحصیلات') }}
                    {{ Form::text('education', null, array('class' => 'form-control')) }}
                </div>
{{--                <div class="form-group">--}}
{{--                    {{ Form::label('languages', 'مسلط به زبان های') }}--}}
{{--                    {{ Form::select('languages[]',$langs, json_decode($user->languages), array('class' => 'form-control selectpicker', 'multiple')) }}--}}
{{--                </div>--}}
                <div class="form-group">
                    {{ Form::label('marital', 'وضعیت تاهل') }}
                    {{ Form::select('marital',['0'=>'مجرد','1'=>'متاهل'], null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('gender', 'جنسیت') }}
                    {{ Form::select('gender',['0'=>'مرد','1'=>'زن'], null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('type', 'نوع کاربر') }}
                    {{ Form::select('type',['0'=>'کارشناس','1'=>'آژانس'], null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('living_country', 'محل زندگی') }}
                    {{ Form::select('living_country',['iran'=>'iran','turkey'=>'turkey'], null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('postal_address', 'آدرس پستی') }}
                    {{ Form::text('postal_address', null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('password', 'رمز عبور') }}
                    {{ Form::password('password', array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('password', 'تکرار رمز عبور') }}
                    {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
                </div>
                @if(auth()->user()->hasRole('مدیر'))
                    <div class="form-group">
                        <label for="instant">دسترسی ها</label>
                        {!! Form::select('role_name[]',array_pluck(\App\Role::all(),'name','name'),$user->getRoleNames(),['class'=>'form-control selectpicker','multiple']) !!}
                    </div>
                @endif

                <div class="form-group d-flex">
                    <div class="float-left mb-2 mr-4">
                        <span class="switch switch-success">
                            <label>
                                <span class="switch-title">وضعیت حساب کاربری</span>
                                <input type="checkbox" name="account_status" id="account_status" value="active" {{ $user->account_status == 'active' ? 'checked' : '' }}>
                                <span></span>
                            </label>
                        </span>
                        </div>
                        <div class="float-left mb-2">
                        <span class="switch switch-success">
                            <label>
                                <span class="switch-title">وضعیت موبایل</span>
                                <input type="checkbox" name="mobile_status" id="mobile_status" value="active" {{ $user->mobile_status == 'active' ? 'checked' : '' }}>
                                <span></span>
                            </label>
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group bill col-md-6">
                        <div class="set-bg">
                            <label>قبض تلفن</label>
                            <input type="file" class="gallery-multiple" name="bill" accept="image/*">
                            @if($user->bill)
                                <div class="row">
                                    <a href="{{url($user->bill)}}" target="_blank" class="col-md-2 mx-auto">
                                        <img class="img-fluid" src="{{url($user->bill)}}" alt="">
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group kimlik col-md-6">
                        <div class="set-bg">
                            <label>تصویر کارت کیملیک</label>
                            <input type="file" class="gallery-multiple" name="kimlik" accept="image/*">
                            @if($user->kimlik)
                                <div class="row">
                                    <a href="{{url($user->kimlik)}}" target="_blank" class="col-md-2 mx-auto">
                                        <img class="img-fluid" src="{{url($user->kimlik)}}" alt="">
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <br/>
                <a href="{{ URL::previous() }}" class="btn btn-rounded btn-secondary float-right"><i class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                {{ Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>ثبت', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left')) }}
                {{ Form::close() }}
            </div>
        </div>
    @endslot
    @push('stylesheets')
        <link rel="stylesheet" type="text/css" href="{{ url('assets/admin/css/bootstrap-datepicker.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ url('assets/admin/css/bootstrap-select.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ url('assets/admin/css/select2.min.css') }}"/>
        <style>
            .set-bg{
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
        <script src="{{ asset('editor/laravel-ckeditor/adapters/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ url('assets/admin/js/select2.min.js') }}"></script>
        <script>
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
                let val=el.val();
                if(val=='iran'){
                    $('.bill').show();
                    $('.kimlik').hide();
                }else{
                    $('.bill').show();
                    $('.kimlik').show();
                }
            }
        </script>
    @endpush
@endcomponent
