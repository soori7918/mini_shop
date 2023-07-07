@component('layouts.back')
    @slot('title') ویرایش {{ $title }} {{ $profile->first_name }} {{ $profile->last_name }} @endslot
    @slot('body')
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>
                    </div>
                    <h2>ویرایش {{ $title }} {{ $profile->first_name }} {{ $profile->last_name }}
{{--                        @if(auth()->user()->hasRole('مدیر'))--}}
{{--                        <a href="{{ route('user-edit', [$profile->id]) }}?callback_url={{url(\Request::getRequestUri())}}" class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-edit ml-1"></i>ویرایش بیشتر</a>--}}
{{--                        @endif--}}
                    </h2>
                </div>
            </div>
            <div class="card-body">
                {{ Form::model($profile, array('route' => array('profile-update', $profile->id), 'method' => 'PATCH' , 'files' => true)) }}
                <input type="hidden" name="callback_url" value="{{request('callback_url')?request('callback_url'):''}}">
                @if(auth()->user()->hasRole('مدیر') || auth()->user()->hasRole('call center') || auth()->user()->hasRole('call center(sales)') || auth()->user()->hasRole('تعیین کننده ملک'))
                    <div class="form-group">
                        <label for="user_id">کارشناس معرف</label>
                        <select class="form-control select2" id="user_id" name="user_id">
                            <option value="0" {{ (old('user_id') == 0 || !$profile->user_id) ? 'selected' : ''  }}>
                                ندارد
                            </option>
                            @foreach(\App\User::role(['مدیر ملک','مدیر','call center','call center(sales)','تعیین کننده ملک'])->get() as $admin_user)
                                <option
                                        value="{{ $admin_user->id }}"
                                        {{ old('user_id', $profile->user_id) == $admin_user->id ? 'selected' : '' }}>
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
                    {{ Form::email('email', null, array('class' => 'form-control disabled')) }}
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
                    {{ Form::label('name', 'تصویر پروفایل') }}
                    <div class="custom-file">
                        {{ Form::file('photo', array('accept' => 'image/*', 'class' => 'custom-file-input', 'id' => 'customFile')) }}
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                @if(auth()->user()->hasRole('مدیر'))
                    <div class="form-group">
                        <label for="instant">دسترسی ها</label>
                        {!! Form::select('role_name[]',array_pluck(\App\Role::all(),'name','name'),$profile->getRoleNames(),['class'=>'form-control selectpicker','multiple']) !!}
                    </div>
                @endif
                @role('کاربر')
                <div class="form-group form-group-radio">
                    <div class="radio">
                        <input type="radio" name="character" id="real"
                               value="real" {{ $profile->character == 'real' ? 'checked' : '' }}>
                        <label for="real">شخص حقیقی</label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="character" id="legal"
                               value="legal" {{ $profile->character == 'legal' ? 'checked' : '' }}>
                        <label for="legal">شخص حقوقی</label>
                    </div>
                </div>
                @endrole
                <br/>
                @if(auth()->user()->hasRole('مدیر') || auth()->user()->hasRole('مدیر ملک'))
                <div class="row mb-3" uk-grid>
                    @php
                        $editables=[];
                        if (!is_null($profile->editables)){
                            if (is_serialized($profile->editables)){
                                $editables=unserialize($profile->editables);
                            }
                        }
                        if (is_null($editables)){
                            $editables=[];
                        }
                    @endphp
                    @if(count($editables) && auth()->user()->hasRole('مدیر ملک'))
                        <div class="col-md-12 pb-3">
                            <div class="alert alert-info px-3 py-2" style="display: initial">
                                مواردی که باید اصلاح شود : ↓
                            </div>
                        </div>
                    @endif
                    @if(in_array('fname_en',$editables) || auth()->user()->hasRole('مدیر'))
                    <div class="col-md-6">
                        <label for="fname_en" class="float-right">نام (لاتین پاسپورتی)</label>
                        <input id="fname_en" name="fname_en" class="form-control text-left" type="text"
                               placeholder="نام (لاتین پاسپورتی) " value="{{old('fname_en', $profile->fname_en)}}">
                    </div>
                    @endif
                    @if(in_array('lname_en',$editables) || auth()->user()->hasRole('مدیر'))
                    <div class="col-md-6">
                        <label for="lname_en" class="float-right">نام خانوادگی (لاتین پاسپورتی)</label>
                        <input id="lname_en" name="lname_en" class="form-control text-left" type="text"
                               placeholder="نام خانوادگی (لاتین پاسپورتی) " value="{{old('lname_en', $profile->lname_en)}}">
                    </div>
                    @endif
                    @if(in_array('father_name',$editables) || auth()->user()->hasRole('مدیر'))
                    <div class="col-md-6">
                        <label for="father_name" class="float-right">نام پدر</label>
                        <input id="father_name" class="form-control" name="father_name" type="text" placeholder="نام پدر "
                               value="{{old('father_name', $profile->father_name)}}">
                    </div>
                    @endif
                    @if(in_array('gender',$editables) || auth()->user()->hasRole('مدیر'))
                    <div class="col-md-6">
                        <label for="gender" class="float-right">جنسیت</label>
                        {{ Form::select('gender',['0'=>'مرد','1'=>'زن'], null, array('placeholder' => 'جنسیت', 'class' =>  'form-control')) }}
                    </div>
                    @endif
                    @if(in_array('living_country',$editables) || auth()->user()->hasRole('مدیر'))
                    <div class="col-md-6">
                        <label for="living_country" class="float-right">کشور</label>
                        {{ Form::select('living_country',[array_pluck($country, 'fa_name', 'id')], null, array('id'=>'living_country','placeholder' => 'کشور', 'class' => 'form-control')) }}
                    </div>
                    @endif
                    @if(in_array('nationality',$editables) || auth()->user()->hasRole('مدیر'))
                    <div class="col-md-6">
                        <label for="nationality" class="float-right">ملیت</label>
                        <input id="nationality" name="nationality" type="text" placeholder="ملیت"
                               class="form-control "
                               value="{{old('nationality', $profile->nationality)}}">
                    </div>
                    @endif
                    @if(in_array('ncode',$editables) || auth()->user()->hasRole('مدیر'))
                    <div class="col-md-6">
                        <div class="control_box">
                            <label for="nationality" class="float-right">َشماره پاسپورت/کدملی</label>
                            <input id="ncode" name="ncode" class="text-left form-control " type="text"
                                   placeholder="َشماره پاسپورت/کدملی" value="{{old('ncode', $profile->ncode)}}"
                                   title=" فقط عدد و حروف a-z بصورت کوچک و بزرگ مجاز است">
                        </div>
                    </div>
                    @endif
                    @if(in_array('postal_address',$editables) || auth()->user()->hasRole('مدیر'))
                    <div class="col-md-12">
                        <label for="postal_address" class="float-right">آدرس کامل محل سکونت</label>
                        <textarea name="postal_address" id="postal_address" rows="3"
                                   class="form-control "
                                  placeholder="آدرس کامل محل سکونت">{{old('postal_address', $profile->postal_address)}}</textarea>
                    </div>
                    @endif
                    @if(in_array('address_pic',$editables) || auth()->user()->hasRole('مدیر'))
                    <div class="col-md-12">
                        <label for="address_pic" class="float-right">پروف آدرس</label>
                        <input type="file" accept="image/*" name="address_pic" id="address_pic" class="form-control">
                        @if($profile->address_pic)
                            <img style="display:block;max-height: 200px"
                                 src="{{ url($profile->address_pic) }}">
                        @endif
                    </div>
                    @endif
                    @if(in_array('passport_pic',$editables) || auth()->user()->hasRole('مدیر'))
                    <div class="col-md-12">
                        <label for="passport_pic" class="float-right">پروف پاسپورت</label>
                        <input type="file" accept="image/*" name="passport_pic" id="passport_pic" class="form-control">
                        @if($profile->passport_pic)
                            <img style="display:block;max-height: 300px"
                                 src="{{ url($profile->passport_pic) }}">
                        @endif
                    </div>
                    @endif
                </div>
                @endif
                <a href="{{ URL::previous() }}" class="btn btn-rounded btn-secondary float-right"><i
                            class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                {{ Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>ویرایش', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left')) }}
                {{ Form::close() }}
            </div>
        </div>
    @endslot
    @push('stylesheets')
        <link rel="stylesheet" type="text/css" href="{{ url('assets/admin/css/bootstrap-datepicker.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ url('assets/admin/css/select2.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ url('assets/admin/css/bootstrap-select.min.css') }}"/>
    @endpush

    @push('scripts')
        <script type="text/javascript" src="{{ url('assets/admin/js/bootstrap-datepicker.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('assets/admin/js/bootstrap-datepicker-fa.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('assets/admin/js/bootstrap-select.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('assets/admin/js/bootstrap-select-fa_IR.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('assets/admin/js/select2.min.js') }}"></script>
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
        </script>
        <script>
            $('#first_name,#last_name').on('keypress', function (event) {
                var regex = new RegExp("^[a-zA-Z0-9]+$");
                var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                if (regex.test(key)) {
                    event.preventDefault();
                    $.jGrowl('فقط حروف فارسی مورد پذبرش است', {life: 3000, position: 'bottom-right', theme: 'bg-info'});
                    return false;
                }
            });
        </script>
    @endpush
@endcomponent