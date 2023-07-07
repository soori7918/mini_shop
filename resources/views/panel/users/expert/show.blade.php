@component('layouts.back')
    @slot('title') {{ $title }} {{ $user->first_name }} {{ $user->last_name }} @endslot
    @slot('body')
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>
                    </div>
                    <h2>{{ $title }} {{ $user->first_name }} {{ $user->last_name }}</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="max-with">
                    @if ($user->hasRole('مدیر ملک') || $user->hasRole('call center') || $user->hasRole('call center(sales)') || $user->hasRole('کارشناس فروش'))
                        <ul class="list-group text-right" style="direction: rtl">
                            <li class="list-group-item"><strong>ایمیل
                                    : </strong>{{ $user->email }} @if($user->email_status == 'active')<span
                                        class="badge badge-success">فعال</span>@elseif($user->email_status == 'pending')
                                    <span class="badge badge-warning">در انتظار تایید</span>@endif</li>
                            <li class="list-group-item"><strong> سطح دسترسی
                                    : </strong>{{ $user->roles()->pluck('name')->implode(' ') }}</li>
                            <li class="list-group-item"><strong>موبایل
                                    : </strong>{{ $user->area_code }}{{ $user->mobile }} @if($user->mobile_status == 'active')<span
                                        class="badge badge-success">فعال</span>@elseif($user->mobile_status == 'pending')
                                    <span class="badge badge-warning">در انتظار تایید</span>@endif</li>
                            <li class="list-group-item"><strong>تاریخ عضویت
                                    : </strong>{{ my_jdate($user->created_at, 'd F Y') }}</li>
                            <li class="list-group-item"><strong>وضعیت ثبت نام
                                    : </strong>@if($user->registration == 'complete')<span class="badge badge-success">تکمیل شده</span>@elseif($user->registration == 'not_completed')
                                    <span class="badge badge-danger">تکمیل نشده</span>@endif</li>
                            <li class="list-group-item"><strong>وضعیت کلی
                                    : </strong>@if($user->account_status == 'active')<span class="badge badge-success">فعال</span>@elseif($user->account_status == 'pending')
                                    <span class="badge badge-warning">در انتظار تایید</span>@elseif($user->account_status == 'blocked')
                                    <span class="badge badge-secondary">مسدود شده</span>@endif</li>
                            <li class="list-group-item"><strong>نام ونام خانوادگی (انگلیسی)
                                    : </strong>{{$user->fname_en.' '.$user->lname_en}}</li>
                            <li class="list-group-item"><strong>نام پدر : </strong>{{$user->father_name}}</li>
                            <li class="list-group-item"><strong>جنسیت : </strong>{{$user->gender==0?'مرد':'زن'}}</li>
                            <li class="list-group-item"><strong>کشور در حال زندگی
                                    : </strong>{{$user->countrys?$user->countrys->fa_name:$user->living_country}}</li>
                            <li class="list-group-item"><strong>ملیت : </strong>{{$user->nationality}}</li>
                            <li class="list-group-item"><strong>شغل
                                    : </strong>{{$user->Job!=null?$user->Job:'ثبت نشده'}}</li>
                            <li class="list-group-item"><strong>کدملی/شماره پاسپورت : </strong>{{$user->ncode}}</li>
                            <li class="list-group-item"><strong>آدرس : </strong>{{$user->postal_address}}</li>
                            <li class="list-group-item"><strong>پروف آدرس : </strong>
                                @if($user->address_pic)
                                    <img style="display:block;max-height: 300px"
                                         src="{{ url($user->address_pic) }}">
                                @endif
                            </li>
                            <li class="list-group-item"><strong>پروف پاسپورت : </strong>
                                @if($user->passport_pic)
                                    <img style="display:block;max-height: 300px"
                                         src="{{ url($user->passport_pic) }}">
                                @endif
                            </li>
                        </ul>
                    @elseif($user->hasRole('کاربر'))
                        <ul class="list-group text-right" style="direction: rtl">
                            <li class="list-group-item"><strong>ایمیل : </strong>{{ $user->email }}</li>
                            <li class="list-group-item"><strong> سطح دسترسی
                                    : </strong>{{ $user->roles()->pluck('name')->implode(' ') }}</li>
                            <li class="list-group-item"><strong>موبایل
                                    : </strong>{{ $user->mobile }} @if($user->mobile_status == 'active')<span
                                        class="badge badge-success">فعال</span>@elseif($user->mobile_status == 'pending')
                                    <span class="badge badge-warning">در انتظار تایید</span>@endif</li>
                            <li class="list-group-item"><strong>تاریخ عضویت
                                    : </strong>{{ my_jdate($user->created_at, 'd F Y') }}</li>

                            <li class="list-group-item"><strong>وضعیت ثبت نام : </strong>
                                @if($user->registration == 'complete')
                                    <span class="badge badge-success">تکمیل شده</span>
                                @elseif($user->registration == 'not_completed')
                                    <span class="badge badge-danger">تکمیل نشده</span>
                                @endif
                            </li>

                            <li class="list-group-item"><strong>وضعیت کلی
                                    : </strong>@if($user->account_status == 'active')<span class="badge badge-success">فعال</span>@elseif($user->account_status == 'pending')
                                    <span class="badge badge-warning">در انتظار تایید</span>@elseif($user->account_status == 'blocked')
                                    <span class="badge badge-secondary">مسدود شده</span>@endif</li>
                            <li class="list-group-item"><strong>نام معرف : </strong>{{$user->reagent}}</li>
                            <li class="list-group-item"><strong>جنسیت : </strong>{{$user->gender==0?'مرد':'زن'}}</li>
                            <li class="list-group-item"><strong>کشور در حال زندگی
                                    : </strong>@if($user->living_country=='iran')
                                    ایران @elseif($user->living_country=='turkey')
                                    ترکیه @else{{$user->countrys?$user->countrys->fa_name:$user->living_country}} @endif
                            </li>
                            <li class="list-group-item"><strong>نحوه آشنایی : </strong>{{$user->acquaintance}}</li>
                            <li class="list-group-item"><strong>نوع درخواست : </strong>@if($user->type_request=='rent')
                                    کرایه @elseif($user->type_request=='buy') خرید @endif</li>
                            @php
                                if ($user->location != null){
                                $location = unserialize($user->location);
                                }else{
                                $location = [];
                                }
                            @endphp
                            <li class="list-group-item"><strong>منطقه مد نظر
                                    : </strong> @if(count($location)>0) @foreach($location as $key=> $loc) @php $locc=\App\Location::find($loc)  @endphp @if($key>0)
                                    , @endif {{$locc->name}}  @endforeach @else ثبت نشده @endif</li>
                            <li class="list-group-item"><strong>تعداد اتاق خواب : </strong>{{$user->room_number}}</li>
                            <li class="list-group-item"><strong>بودجه به لیر : </strong><span
                                        class="numberPrice">{{$user->budget}}</span></li>
                            <li class="list-group-item"><strong>توضیح ملک مدنظر شما : </strong>{{$user->text}}</li>
                            <li class="list-group-item"><strong>نیاز به مشاوره آنلاین
                                    : </strong>@if($user->consulting==0) ندارم @elseif($user->consulting==1) دارم @endif
                            </li>
                            <li class="list-group-item"><strong>فوری/عجله ندارم : </strong>{{$user->instant}}</li>
                        </ul>
                    @endif
                    <form class="mt-4" action="{{route('user-status-update',$user->id)}}" method="post"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        <ul class="list-group text-right" style="direction: rtl">
                            <li class="list-group-item"><strong>تغییر وضعیت : </strong>
                                <div class="form-group" style="width: 120px">
                                    {{ Form::select('account_status',['active'=>'active','rejected'=>'rejected'], $user->account_status, array('class' => 'form-control mt-3')) }}
                                </div>
                            </li>
                            <li class="list-group-item status_message" style="display: {{ $user->account_status == 'rejected' ? 'block' : 'none' }}"><strong>پیغام وضعیت برای کاربر : </strong>
                                <div class="form-group">
                                    {{ Form::textarea('status_message', $user->status_message, array('class' => 'form-control mt-3','rows'=>'3')) }}
                                </div>
                            </li>
                            <li class="list-group-item">
                                {{ Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>تغییر وضعیت', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left')) }}
                            </li>
                        </ul>
                    </form>
                    <br/>
                    <a href="{{ URL::previous() }}" class="btn btn-rounded btn-secondary float-right"><i
                                class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                    {{--                    <a href="{{ route('user-edit', $user->id) }}" class="btn btn-rounded btn-success float-left mr-1"><i class="fa fa-edit ml-1"></i>ویرایش</a>--}}
                </div>
            </div>
        </div>
    @endslot
@endcomponent