@component('layouts.back')
    @slot('title') {{ $title }} {{ $user->first_name }} {{ $user->last_name }} @endslot
    @slot('body')
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>
                    </div>
                    @if(auth()->user()->hasRole('مدیر ملک'))
                        <h2> مشتری {{ $user->id }}</h2>
                    @else
                        <h2> مشتری {{ $user->first_name }} {{ $user->last_name }}</h2>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="max-with">
                        <ul class="list-group text-right mb-5" style="direction: rtl">
                            <li class="list-group-item"><strong>شغل : </strong>
                                {{ $user->job }}
                            </li>
                            <li class="list-group-item"><strong>جنسیت : </strong>
                                {{ $user->gender == 0 ? 'مرد' : 'زن' }}
                            </li>
                            <li class="list-group-item"><strong>نوع درخواست : </strong>
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
                            </li>
                            <li class="list-group-item"><strong>خواب : </strong>
                                @if(!is_null($user->room_number))
                                    @php
                                        $is_serialized=is_serialized($user->room_number);
                                    @endphp
                                    @if(!$is_serialized)
                                        {{ $user->room_number }}
                                    @else
                                    @if(gettype(unserialize($user->room_number))=='array')
                                        @foreach(unserialize($user->room_number) as $property)
                                            {{ $property }} ,
                                        @endforeach
                                    @endif
                                    @endif
                                    @endif
                            </li>
                            <li class="list-group-item"><strong>تاریخ اعلام : </strong>
                                {{ $user->date }}
                            </li>
                            <li class="list-group-item"><strong>مناطق : </strong>
                                @if(!is_null($user->location))
                                    @php
                                        $is_serialized=is_serialized($user->location);
                                    @endphp
                                    @if($is_serialized)
                                        @if(gettype(unserialize($user->location))=='array')
                                        @foreach(unserialize($user->location) as $property)
                                            @php $loc=\App\Location::find($property); @endphp
                                            {{ $loc?$loc->name:'' }} ,
                                        @endforeach
                                        @endif
                                    @endif
                                    @endif
                            </li>
                            <li class="list-group-item"><strong>نوع : </strong>
                                @if(!is_null($user->property_type))
                                        @php
                                            $is_serialized=is_serialized($user->property_type);
                                        @endphp
                                        @if(!$is_serialized)
                                            {{ \App\Villa::types()[$user->property_type] }}
                                        @else
                                            @if(gettype(unserialize($user->property_type))=='array')
                                            @foreach(unserialize($user->property_type) as $property)
                                                {{ \App\Villa::types()[$property] }} ,
                                            @endforeach
                                            @endif
                                        @endif
                                    @endif
                            </li>
                            <li class="list-group-item"><strong>کاربری : </strong>
                                @if(!is_null($user->property_usage))
                                    @php
                                        $is_serialized=is_serialized($user->property_usage);
                                    @endphp
                                    @if(!$is_serialized)
                                        {{ \App\Villa::usering()[$user->property_usage] }}
                                    @else
                                        @if(gettype(unserialize($user->property_usage))=='array')
                                        @foreach(unserialize($user->property_usage) as $property)
                                            {{ \App\Villa::usering()[$property] }} ,
                                        @endforeach
                                        @endif
                                    @endif
                                    @endif
                            </li>
                            <li class="list-group-item"><strong>بودجه : </strong>
                                {{--{{ $user->budget_text }}--}}
                                {{ $user->budget_sales?'(اجاره '.$user->budget_sales. ' لیر)':'' }}
                                {{ $user->budget?'(خرید '.$user->budget. ' لیر)':'' }}
                            </li>
                            <li class="list-group-item"><strong>موقعیت جغرافیایی : </strong>
                                @if($user->living_country == 'iran')
                                        ایران
                                    @elseif($user->living_country == 'turkey')
                                        ترکیه
                                    @endif
                            </li>
                            <li class="list-group-item"><strong>مشاوره آنلاین : </strong>
                                @if($user->consulting == 0)
                                        ندارد
                                    @elseif($user->consulting == 1)
                                        دارد
                                    @endif
                            </li>
                            <li class="list-group-item"><strong>عجله دارد : </strong>
                                {{ $user->instant }}
                            </li>
                        </ul>
                        <ul class="list-group text-right" style="direction: rtl">
                            @if(!auth()->user()->hasRole('مدیر ملک'))
                            <li class="list-group-item"><strong>ایمیل : </strong>
                                {{ $user->email }}
                            </li>
                            <li class="list-group-item"><strong>موبایل : </strong>
                                {{ $user->mobile }}
                            </li>
                            @endif
                            <li class="list-group-item"><strong>منزل مد نظر : </strong>
                                    @if($user->questionnaire)
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
                                    @endif
                            </li>
                            <li class="list-group-item"><strong>منظره : </strong>
                                @if($user->questionnaire)
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
                                @endif
                            </li>
                            <li class="list-group-item"><strong>امکانات داخلی : </strong>
                                @if($user->questionnaire)
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
                                @endif
                            </li>
                            <li class="list-group-item"><strong>امکانات رفاهی : </strong>
                                @if($user->questionnaire)
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
                                @endif
                            </li>
                            <li class="list-group-item"><strong>حیوان خانگی : </strong>
                                @if($user->questionnaire)
                                {{ $user->questionnaire->pet }}
                                @endif
                            </li>
                            <li class="list-group-item"><strong>وسیله نقلیه : </strong>
                                @if($user->questionnaire)
                                {{ $user->questionnaire->vehicle }}
                                @endif
                            </li>
                            <li class="list-group-item"><strong>حداکثر سال ساخت : </strong>
                                @if($user->questionnaire)
                                {{ $user->questionnaire->built_year }}
                                @endif
                            </li>
                            <li class="list-group-item"><strong>بودجه : </strong>
                                @if($user->questionnaire)
                                {{ $user->questionnaire->price }} {{$user->questionnaire->price_type}}
                                @endif
                            </li>
{{--                            <li class="list-group-item"><strong>دلیل کنسلی : </strong>--}}
{{--                                {{ $user->questionnaire->cancel_reasons }}--}}
{{--                            </li>--}}
                        </ul>
                    <br/>
                    <a href="{{ URL::previous() }}" class="btn btn-rounded btn-secondary float-right"><i
                                class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                    {{--                    <a href="{{ route('user-edit', $user->id) }}" class="btn btn-rounded btn-success float-left mr-1"><i class="fa fa-edit ml-1"></i>ویرایش</a>--}}
                </div>
            </div>
        </div>
    @endslot
@endcomponent