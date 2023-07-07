@component('layouts.back')
    @slot('title') {{ $title }} {{ $profile->first_name }} {{ $profile->last_name }} @endslot
    @slot('body')
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    @if(isset($profile->photo))
                        <div style="background-image: url({{url($profile->photo->path)}});background-size: cover;background-repeat: no-repeat "
                             class="archive-circle">
                        </div>
                    @else
                        <div class="archive-circle">
                            <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>
                        </div>
                    @endif
                    <h2>{{ $title }} {{ $profile->first_name }} {{ $profile->last_name }}</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="max-with">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>ایمیل : </strong>{{ $profile->email }}</li>
                        <li class="list-group-item"><strong> سطح دسترسی
                                : </strong>{{ $profile->roles()->pluck('name')->implode(' ') }}</li>
                        <li class="list-group-item"><strong>موبایل
                                : </strong>{{ $profile->area_code }}{{ $profile->mobile }} @if($profile->mobile_status == 'active')<span
                                    class="badge badge-success">فعال</span>@elseif($profile->mobile_status == 'pending')
                                <span class="badge badge-warning">در انتظار تایید</span>@endif</li>
                        <li class="list-group-item"><strong>تاریخ عضویت
                                : </strong>{{ my_jdate($profile->created_at, 'd F Y') }}</li>
                        <li class="list-group-item"><strong>وضعیت ثبت نام
                                : </strong>@if($profile->registration == 'complete')<span class="badge badge-success">تکمیل شده</span>@elseif($profile->registration == 'not_completed')
                                <span class="badge badge-danger">تکمیل نشده</span>@endif</li>
                        <li class="list-group-item"><strong>وضعیت کلی
                                : </strong>@if($profile->account_status == 'active')<span class="badge badge-success">فعال</span>@elseif($profile->account_status == 'pending')
                                <span class="badge badge-warning">در انتظار تایید</span>
                            @elseif($profile->account_status == 'blocked')
                                <span class="badge badge-secondary">مسدود شده</span>
                            @elseif($profile->account_status == 'rejected')
                                <span class="badge badge-danger">رد شده</span>
                                <p>{!! $profile->status_message !!}</p>
                            @endif
                        </li>
                    </ul>
                    <br/>
                    <a href="{{ URL::previous() }}" class="btn btn-rounded btn-secondary float-right"><i
                                class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                    <a href="{{ route('profile-edit', $profile->id) }}"
                       class="btn btn-rounded btn-warning float-left mr-2"><i
                                class="nc-icon users_single-02 mtp-2 ml-1"></i>ویرایش پروفایل</a>
                    <a href="{{ route('profile-password', $profile->id) }}"
                       class="btn btn-rounded btn-danger float-left"><i class="nc-icon objects_key-25 mtp-2 ml-1"></i>ویرایش
                        رمز عبور</a>
                </div>
            </div>
        </div>
    @endslot
@endcomponent