@component('layouts.back')
    @slot('title') مدیریت {{ $title }} @endslot
    @slot('body')
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>
                    </div>
                    <h4>
                        لیست ارجاع
                    </h4>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{route('user-search')}}" method="post" style="width: 95%;">
                        <div class="row">
                            <div class="col-md-6 col-sm-6" style="padding-left: 0;">
                                <input type="text" name="search" class="form-control" placeholder="جستجو...">
                            </div>
                            <div class="col-md-6 col-sm-6" style="padding-right: 0;">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        {{csrf_field()}}
                    </form>
                    <table class="archive-table has-lines">
                        <tr>
                            <th>نام</th>
                            <th>کارشناس</th>
                            <th>نوع مشتری</th>
                            <th>موبایل</th>
                            <th>منزل مد نظر</th>
                            <th>منظره</th>
                            <th>مناطق</th>
                            <th>امکانات داخلی</th>
                            <th>امکانات رفاهی</th>
                            <th>حیوان خانگی</th>
                            <th>وسیله نقلیه</th>
                            <th>حداکثر سال ساخت</th>
                            <th>بودجه</th>
                            <th>دلیل کنسلی</th>
                            @if(auth()->user()->hasRole('مدیر'))
                            <th>تاریخ ثبت مشتری</th>
                            <th>تاریخ ثبت ارزیابی</th>
                            <th>تاریخ ثبت ارجاع</th>
                            <th>تعداد بازدید تا امروز</th>
                            <th>تعداد ارجاع کارشناس</th>
                            @endif
                            @if(auth()->user()->hasRole('call center') || auth()->user()->hasRole('call center(sales)'))
                            <th>مشخصات مشتری</th>
                            <th>گزارش کارشناس</th>
                            @endif
                            <th>عملیات</th>
                        </tr>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->first_name }} {{ $user->last_name }}
                                    @if($user->questionnaire->account_status == 'active')
                                        <span class="badge badge-success">فعال</span>
                                    @elseif($user->questionnaire->account_status == 'pending')
                                        <span class="badge badge-warning">در انتظار تایید</span>
                                    @elseif($user->questionnaire->account_status == 'blocked')
                                        <span class="badge badge-secondary">مسدود شده</span>
                                    @endif

                                    @if(!auth()->user()->hasRole('مدیر ملک'))
                                    @if($user->questionnaire->user)
                                    @if($user->user)
                                        <span
                                                class="badge badge-warning">نام کارشناس معرف : {{ $user->user->first_name .' ' . $user->user->last_name }}</span>
                                    @endif
                                    @endif
                                    @endif
                                </td>
                                <td>
                                    {{$user->refer?$user->refer->first_name.' '.$user->refer->last_name:''}}
                                </td>
                                <td>
                                    @if(!is_null($user->type_request))
                                        @php
                                            $is_serialized=is_serialized($user->type_request);
                                        @endphp
                                        @if(!$is_serialized)
                                            {{ $user->type_request == 'rent' ? 'اجاره' : 'خرید' }}
                                        @else
                                            @if(gettype(unserialize($user->type_request))=='array')
                                                @foreach(unserialize($user->type_request) as $property)
                                                    {{ $property == 'rent' ? 'اجاره' : 'خرید' }} ,
                                                @endforeach
                                            @endif
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    {{$user->mobile}}
                                </td>
                                <td>
                                    @php
                                        $is_serialized=is_serialized($user->questionnaire->property_type);
                                    @endphp
                                    @if(!$is_serialized)
                                        {{ \App\Villa::types()[$user->questionnaire->property_type] }}
                                    @else
                                        @if(gettype(unserialize($user->questionnaire->property_type))=='array')
                                            @foreach(unserialize($user->questionnaire->property_type) as $property)
                                                {{ \App\Villa::types()[$property] }} ,
                                            @endforeach
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $is_serialized=is_serialized($user->questionnaire->villa_view);
                                    @endphp
                                    @if(!$is_serialized)
                                        {{ \App\Villa::types()[$user->questionnaire->villa_view] }}
                                    @else
                                        @if(gettype(unserialize($user->questionnaire->villa_view))=='array')
                                            @foreach(unserialize($user->questionnaire->villa_view) as $property)
                                                {{ $property }} ,
                                            @endforeach
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @if(!is_null($user->location))
                                        @php
                                            $is_serialized=is_serialized($user->location);
                                        @endphp
                                        @if($is_serialized)
                                            @if(gettype(unserialize($user->location))=='array')
                                                @foreach(unserialize($user->location) as $property)

                                                    {{$property}} ,
                                                    {{--                                            {{$user->location}}--}}
                                                    {{--                                            @php $loc=\App\Location::where($property); @endphp--}}
                                                    {{--                                            {{ $loc?$loc->name:'' }} ,--}}
                                                @endforeach
                                            @endif
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $is_serialized=is_serialized($user->questionnaire->properties_in);
                                    @endphp
                                    @if(!$is_serialized)
                                        {{ \App\Villa::types()[$user->questionnaire->properties_in] }}
                                    @else
                                        @if(gettype(unserialize($user->questionnaire->properties_in))=='array')
                                            @foreach(unserialize($user->questionnaire->properties_in) as $property)
                                                {{ \App\Property::find($property)["name"] }} ,
                                            @endforeach
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $is_serialized=is_serialized($user->questionnaire->properties_out);
                                    @endphp
                                    @if(!$is_serialized)
                                        {{ \App\Villa::types()[$user->questionnaire->properties_out] }}
                                    @else
                                        @if(gettype(unserialize($user->questionnaire->properties_out))=='array')
                                            @foreach(unserialize($user->questionnaire->properties_out) as $property)
                                                {{ \App\Property::find($property)["name"] }} ,
                                            @endforeach
                                        @endif
                                    @endif
                                </td>
                                <td>{{ $user->questionnaire->pet }}</td>
                                <td>{{ $user->questionnaire->vehicle }}</td>
                                <td>{{ $user->questionnaire->built_year }}</td>
                                <td>{{ $user->questionnaire->price }} {{$user->questionnaire->price_type}}</td>
                                <td>{{ $user->questionnaire->cancel_reasons }}</td>
                                @if(auth()->user()->hasRole('مدیر'))
                                <td>{{$user->created_at}}</td>
                                <td>{{$user->questionnaire->created_at}}</td>
                                <td>{{$user->referred_at}}</td>
                                <td>0</td>
                                <td>{{$user->referred_count}}</td>
                                @endif
                                @if(auth()->user()->hasRole('call center') || auth()->user()->hasRole('call center(sales)'))
                                <td class="text-center">
                                    <a href="{{ route('customer-show', $user->id) }}" class="btn btn-sm btn-warning mr-1"><i class="fa fa-eye ml-1"></i>مشاهده</a>
                                </td>
                                <td>
                                @if($user->refer_report)
                                    <a href="javascript:void(0)" data-target="#reportModal"  data-userId="{{$user->id}}" data-report="{{$user->refer_report}}" data-toggle="modal" class="btn btn-success float-left mr-1 report">
                                        <i class="fa fa-pencil ml-1"></i>مشاهده گزارش
                                    </a>
                                @endif
                                </td>
                                @endif
                                <td>
                                    <div class="d-flex">
                                        @if(auth()->user()->hasRole('call center') || auth()->user()->hasRole('call center(sales)'))
                                            @if($user->referee)
                                                @if($user->referee->hasRole('call center'))
                                                <a href="javascript:void(0)" data-target="#confirmRentModal" onclick="$('.user_id').val('{{$user->id}}');$('.confirm_refer_id').val('{{$user->refer_id}}');" data-toggle="modal" class="btn btn-info float-left mr-1">
                                                    <i class="fa fa-check ml-1"></i>تایید قرارداد
                                                </a>
                                                @else
                                                <a href="javascript:void(0)" data-target="#confirmSalesModal" onclick="$('.user_id').val('{{$user->id}}');$('.confirm_refer_id').val('{{$user->refer_id}}');" data-toggle="modal" class="btn btn-info float-left mr-1">
                                                    <i class="fa fa-check ml-1"></i>تایید قرارداد
                                                </a>
{{--                                                <a href="javascript:void(0)" data-target="#reserveModal" onclick="$('.user_id').val('{{$user->id}}');$('.confirm_refer_id').val('{{$user->refer_id}}');" data-toggle="modal" class="btn btn-primary float-left mr-1">--}}
{{--                                                    <i class="fa fa-check ml-1"></i>رزرو--}}
{{--                                                </a>--}}
                                                @endif
                                            @endif
                                            <a href="javascript:void(0)" data-target="#cancelModal" onclick="$('#cancel_id').val('{{$user->id}}');$('#cancel_refer_id').val('{{$user->refer_id}}');" data-toggle="modal" class="btn btn-danger float-left mr-1">
                                                <i class="fa fa-ban ml-1"></i>کنسل قرارداد
                                            </a>
                                        @endif
                                        @role('مدیر ملک')
                                            <a href="javascript:void(0)" data-target="#reportModal" data-userId="{{$user->id}}" data-report="{{$user->refer_report}}" data-toggle="modal" class="btn btn-success float-left mr-1 report">
                                                <i class="fa fa-pencil ml-1"></i>ثبت گزارش
                                            </a>
                                        @endrole
                                        <a href="javascript:void(0)" data-target="#denyModal" onclick="$('#deny_user_id').val('{{$user->id}}')" data-toggle="modal" class="btn btn-warning float-left mr-1">
                                            <i class="fa fa-ban ml-1"></i>لغو ارجاع
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                {{-- confirm --}}
                <div class="modal" id="reserveModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{route('contract-reserve-store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <style>
                                    .price_type{
                                        top: 0;
                                        position: absolute;
                                        left: 0;
                                        text-align: center;
                                        height: 100%;
                                        line-height: 36px;
                                        background: #00000047;
                                    }
                                </style>
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">رزرو کردن معامله</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <input class="user_id" type="hidden" name="id" value="">
                                    <input class="confirm_refer_id" type="hidden" name="refer_id" value="">
                                    <div class="col-md-12 mb-3">
                                        <label for="budget">مبلغ فروش</label>
                                        <div class="p-relative">
                                            <input type="text" id="price_sales" name="price_sales" class="form-control price_sales" maxlength="100" required>
                                            <select class="form-control priceTypePicker priceTypePicker1 w-25" id="price_type" name="price_type">
                                                @foreach(\App\User::currencies() as $key => $currency)
                                                    <option value="{{ $key }}">{{ $currency }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="budget">مبلغ خرید</label>
                                        <div class="p-relative">
                                            <input type="text" id="price_buy" name="price_buy" class="form-control price_buy" maxlength="100">
                                            <span class="price_type w-25 d-block"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="budget">مالیات</label>
                                        <div class="p-relative">
                                            <input type="text" id="tax" value="0" name="tax" class="form-control price_buy" maxlength="100">
                                            <span class="price_type w-25 d-block"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-12 villa_id_container">
                                        <h4 class="modal-title text-center my-2">انتخاب ملک</h4>
                                        <select class="form-control select2" id="villa_id" name="villa_id">
                                            <option value="">ندارد</option>
                                            @foreach(\App\Villa::orderByDesc('created_at')->get() as $villa)
                                                <option value="{{ $villa->id }}">
                                                    {{$villa->id}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <style>
                                        .custom-file-label{
                                            padding-top: 7px;
                                            height: 31px;
                                        }
                                    </style>

                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            {{ Form::label('name', 'پیوست قرارداد') }}
                                            <div class="custom-file">
                                                {{ Form::file('file', array('accept' => '*', 'class' => 'custom-file-input', 'id' => 'customFile')) }}
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">ارسال</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal" id="confirmSalesModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{route('contract-store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <style>
                                .price_type{
                                    top: 0;
                                    position: absolute;
                                    left: 0;
                                    text-align: center;
                                    height: 100%;
                                    line-height: 36px;
                                    background: #00000047;
                                }
                            </style>
                            <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">تایید کردن معامله</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <input class="user_id" type="hidden" name="id" value="">
                                    <input class="confirm_refer_id" type="hidden" name="refer_id" value="">
                                        <div class="col-md-12 mb-3">
                                            <label for="budget">مبلغ فروش</label>
                                            <div class="p-relative">
                                                <input type="text" id="price_sales" name="price_sales" class="form-control price_sales" maxlength="100" required>
                                                <select class="form-control priceTypePicker priceTypePicker2 w-25" id="price_type" name="price_type">
                                                    @foreach(\App\User::currencies() as $key => $currency)
                                                        <option value="{{ $key }}">{{ $currency }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="budget">مبلغ خرید</label>
                                            <div class="p-relative">
                                                <input type="text" id="price_buy" name="price_buy" class="form-control price_buy" maxlength="100">
                                                <span class="price_type w-25 d-block"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="budget">مالیات</label>
                                            <div class="p-relative">
                                                <input type="text" id="tax" value="0" name="tax" class="form-control price_buy" maxlength="100">
                                                <span class="price_type w-25 d-block"></span>
                                            </div>
                                        </div>

                                    <div class="col-md-12 villa_id_container">
                                        <h4 class="modal-title text-center my-2">انتخاب ملک</h4>
                                        <select class="form-control select2" id="villa_id" name="villa_id">
                                            <option value="">ندارد</option>
                                            @foreach(\App\Villa::orderByDesc('created_at')->get() as $villa)
                                                <option value="{{ $villa->id }}">
                                                    {{$villa->id}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <style>
                                        .custom-file-label{
                                            padding-top: 7px;
                                            height: 31px;
                                        }
                                    </style>

                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            {{ Form::label('name', 'پیوست قرارداد') }}
                                            <div class="custom-file">
                                                {{ Form::file('file', array('accept' => '*', 'class' => 'custom-file-input', 'id' => 'customFile')) }}
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">ارسال</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal" id="confirmRentModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{route('contract-store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <style>
                                    .price_type{
                                        top: 0;
                                        position: absolute;
                                        left: 0;
                                        text-align: center;
                                        height: 100%;
                                        line-height: 36px;
                                        background: #00000047;
                                    }
                                </style>
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">تایید کردن معامله</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <input class="user_id" type="hidden" name="id" value="">
                                    <input class="confirm_refer_id" type="hidden" name="refer_id" value="">

                                        <div class="col-md-12 mb-3">
                                            <label for="budget">مبلغ کمیسیون</label>
                                            <div class="p-relative">
                                                <input type="text" id="price" name="price" class="form-control price" maxlength="100" required>
                                                <select class="form-control priceTypePicker priceTypePicker3 w-25" id="price_type" name="price_type">
                                                    @foreach(\App\User::currencies() as $key => $currency)
                                                        <option value="{{ $key }}">{{ $currency }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="budget">مبلغ اجاره</label>
                                            <div class="p-relative">
                                                <input type="text" id="description" name="description" class="form-control description" maxlength="100">
                                                <span class="price_type w-25 d-block"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <div class="d-flex form-control mb-2">
                                                <input name="rent_by" id="rent_by_estate" value="estate" type="radio" class="ml-2" required>
                                                <label class="pt-1 w-100" for="rent_by_estate">
                                                    توسط
                                                    <mark><b>املاکی</b></mark>
                                                    اجاره داده شده هست
                                                </label>
                                            </div>
                                            <div class="d-flex form-control mb-2">
                                                <input name="rent_by" id="rent_by_expert" value="expert" type="radio" class="ml-2" required>
                                                <label class="pt-1 w-100" for="rent_by_expert">
                                                    توسط
                                                    <mark><b>کارشناس</b></mark>
                                                    اجاره داده شده هست
                                                </label>
                                            </div>
                                            <div class="d-flex form-control mb-2">
                                                <input name="rent_by" id="rent_by_experts_friend" value="experts_friend" type="radio" class="ml-2" required>
                                                <label class="pt-1 w-100" for="rent_by_experts_friend">
                                                    توسط
                                                    <mark><b>کارشناس همکار</b></mark>
                                                    اجاره داده شده هست
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-12 estate_container d-none">
                                            <div class="group-container">
                                                <h4 class="modal-title text-center">مشخصات املاکی</h4>
                                                <div class="col-md-12 mb-2">
                                                    <label for="estate_name">نام املاکی</label>
                                                    <input id="estate_name" name="estate_name" class="form-control" type="text">
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <label for="estate_telephone">شماره تماس املاکی</label>
                                                    <input id="estate_telephone" name="estate_telephone" class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 experts_friends_container d-none">
                                            <select class="form-control select2" id="expert2_id" name="expert2_id" required>
                                                <option value="" {{ old('expert2_id') == 0 ? 'selected' : ''  }}>ندارد</option>
                                                @foreach(\App\User::role('مدیر ملک')->get() as $admin_user)
                                                    <option
                                                            value="{{ $admin_user->id }}"
                                                            {{ old('user_id') == $admin_user->id ? 'selected' : '' }}>
                                                        {{ $admin_user->first_name .' '.$admin_user->last_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                    <style>
                                        .custom-file-label{
                                            padding-top: 7px;
                                            height: 31px;
                                        }
                                    </style>

                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            {{ Form::label('name', 'پیوست قرارداد') }}
                                            <div class="custom-file">
                                                {{ Form::file('file', array('accept' => '*', 'class' => 'custom-file-input', 'id' => 'customFile')) }}
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md-12 mb-3 card_file d-none">
                                            <div class="form-group">
                                                {{ Form::label('card_file', 'پیوست کارت ویزیت') }}
                                                <div class="custom-file">
                                                    {{ Form::file('card_file', array('accept' => '*', 'class' => 'custom-file-input', 'id' => 'customFile')) }}
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>

                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">ارسال</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- cnacel --}}
                <div class="modal" id="cancelModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{route('contract-cancel')}}" method="post">
                            @csrf
                            <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">کنسل کردن معامله</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <input id="cancel_id" type="hidden" name="id" value="">
                                    <input id="cancel_refer_id" type="hidden" name="refer_id" value="">

                                    <div class="col-md-12 mb-3">
                                        <div class="d-flex form-control mb-2">
                                            <input name="cancel_reasons" id="rent_by_estate" value="فایل مناسب با شرایط مشتری یافت نشد" type="checkbox" class="ml-2">
                                            <label class="pt-1 w-100" for="rent_by_estate">
                                                فایل مناسب با شرایط مشتری یافت نشد
                                            </label>
                                        </div>
                                        <div class="d-flex form-control mb-2" style="height: 55px">
                                            <input name="cancel_reasons" id="rent_by_expert" value="مشتری با املاکهای دیگری در ارتباط بود و از املاکهای دیگر منزل مورد نظر پیدا کرد" type="checkbox" class="ml-2">
                                            <label class="pt-1 w-100" for="rent_by_expert">
                                                مشتری با املاکهای دیگری در ارتباط بود و از املاکهای دیگر منزل مورد نظر پیدا کرد
                                            </label>
                                        </div>
                                        <div class="d-flex form-control mb-2">
                                            <input name="cancel_reasons" id="rent_by_experts_friend" value="مشتری منصرف شد" type="checkbox" class="ml-2">
                                            <label class="pt-1 w-100" for="rent_by_experts_friend">
                                                مشتری منصرف شد
                                            </label>
                                        </div>
                                    </div>

                                    <textarea name="cancel_reason" class="form-control d-none" id="" cols="30" rows="10" placeholder="توضیحات"></textarea>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">کنسل کن</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- deny --}}
                <div class="modal" id="denyModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{route('user-refer-deny')}}" method="post">
                            @csrf
                            <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">لغو ارجاع</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <input id="deny_user_id" type="hidden" name="id" value="">
                                    <textarea name="cancel_reason" class="form-control" id="" cols="30" rows="10" placeholder="توضیحات"></textarea>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">لغو ارجاع</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- report --}}
                <div class="modal" id="reportModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{route('user-refer-report')}}" method="post">
                            @csrf
                            <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">گزارش کارشناش</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <input id="report_user_id" type="hidden" name="id" value="">
                                    <textarea name="refer_report" class="form-control" id="refer_report" cols="30" rows="10" placeholder="گزارش انجام یا عدم انجام کار"></textarea>
                                </div>

                                @role('مدیر ملک')
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">ثبت گزارش</button>
                                </div>
                                @endrole
                            </form>
                        </div>
                    </div>
                </div>
                <div class="paginate p-3">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    @endslot
    @push('scripts')
        <script>
            getPriceType($('.priceTypePicker1').find(":selected").text());
            getPriceType($('.priceTypePicker2').find(":selected").text());
            getPriceType($('.priceTypePicker3').find(":selected").text());
            $('.priceTypePicker').change(function () {
                let selected=$(this).find(":selected").text();
                console.log(selected);
                getPriceType(selected);
            })
            function getPriceType(selected){
                $('.price_type').html(selected);
            }

            relatedFunc($("input[name='rent_by']:checked").val());
            $("input[name='rent_by']").click(function() {
                var radioValue = $("input[name='rent_by']:checked").val();
                relatedFunc(radioValue)
            });
            function relatedFunc(radioValue){
                if(radioValue=='estate'){
                    $('.estate_container').removeClass('d-none');
                    $('.card_file').removeClass('d-none');
                    $('.experts_friends_container').addClass('d-none');

                    $('#estate_name').attr('required',true);
                    $('#estate_telephone').attr('required',true);
                    $('#expert2_id').attr('required',false);

                }else if(radioValue=='experts_friend'){
                    $('.experts_friends_container').removeClass('d-none');
                    $('.estate_container').addClass('d-none');
                    $('.card_file').addClass('d-none');

                    $('#estate_name').attr('required',false);
                    $('#estate_telephone').attr('required',false);
                    $('#expert2_id').attr('required',true);

                }else{
                    $('.estate_container').addClass('d-none');
                    $('.experts_friends_container').addClass('d-none');
                    $('.card_file').addClass('d-none');

                    $('#estate_name').attr('required',false);
                    $('#estate_telephone').attr('required',false);
                    $('#expert2_id').attr('required',false);
                }
            }
        </script>
        <script>
            $('.report').click(function () {
                $('#report_user_id').val($(this).attr('data-userId'))
                $('#refer_report').html($(this).attr('data-report'))
            })
        </script>
    @endpush
@endcomponent
