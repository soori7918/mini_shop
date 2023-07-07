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
                        لیست ارزیابی ها
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
                            @if(!auth()->user()->hasRole('مدیر ملک'))
                            <th>کارشناس</th>
                            @endif
                            <td>نوع درخواست</td>
                            <th>منزل مد نظر</th>
                            <th>منظره</th>
                            <th>منطقه</th>
                            <th>امکانات داخلی</th>
                            <th>امکانات رفاهی</th>
                            <th>حیوان خانگی</th>
                            <th>وسیله نقلیه</th>
                            <th>حداکثر سال ساخت</th>
                            <th>بودجه</th>
                            <th>مشخصات مشتری</th>
                            <th>دلیل کنسلی</th>
                            <th>عملیات</th>
                        </tr>
                        @foreach ($users as $user)
                            <tr style="background: {{$user->rent_status==3?'brown':''}} {{$user->rent_status==4?'burlywood':''}}">
                                <td>
                                    {{$user->id}}#
                                    @if(!auth()->user()->hasRole('مدیر ملک'))
                                        {{ $user->first_name }} {{ $user->last_name }}
                                        @if($user->questionnaire->account_status == 'active')
                                            <span class="badge badge-success">فعال</span>
                                        @elseif($user->questionnaire->account_status == 'pending')
                                            <span class="badge badge-warning">در انتظار تایید</span>
                                        @elseif($user->questionnaire->account_status == 'blocked')
                                            <span class="badge badge-secondary">مسدود شده</span>
                                        @endif

                                        @if(auth()->user()->hasRole('call center') ||auth()->user()->hasRole('call center(sales)'))
                                        @if($user->questionnaire->user)
                                            @if($user->user)
                                                <span
                                                        class="badge badge-warning">نام کارشناس معرف : {{ $user->user->first_name .' ' . $user->user->last_name }}</span>
                                            @endif
                                        @endif
                                        @endif
                                    @endif
                                </td>
                                @if(!auth()->user()->hasRole('مدیر ملک'))
                                <td>
                                    {{$user->refer?$user->refer->first_name.' '.$user->refer->last_name:''}}
                                </td>
                                @endif
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
                                                    @php $loc=\App\Location::find($property); @endphp
                                                    {{ $loc?$loc->name:'' }} ,
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
{{--                                @if($user->rent_status==3)--}}
{{--                                    @if()--}}
{{--                                    <td>{{ $user->questionnaire->built_year }}</td>--}}
{{--                                    @endif--}}
{{--                                @endif--}}
                                <td>{{ number_format((int)$user->questionnaire->price) }} {{$user->questionnaire->price_type}}</td>
                                <td class="text-center">
                                    <a href="{{ route('customer-show', $user->id) }}" class="btn btn-sm btn-warning mr-1"><i class="fa fa-eye ml-1"></i>مشاهده</a>
                                </td>
                                <td>{{ $user->questionnaire->cancel_reasons }}</td>
                                <td>
                                    <div class="d-flex">
                                        @if(auth()->user()->hasRole('call center') || auth()->user()->hasRole('call center(sales)'))
                                            @php $isRaised=\App\QuestionnaireReadyExperts::where('user_id',auth()->id())->where('questionnaire_id',$user->questionnaire->id)->get(); @endphp
                                            @if(count($isRaised))
                                            @endif
                                            <a href="{{route('raisedUsers',$user->questionnaire->id)}}" class="btn btn-warning float-left mr-1"><i class="fa fa-hand-o-up ml-1"></i>درخواست ها</a>
                                            <a href="javascript:void(0)" data-target="#referModal" onclick="$('#refer_id').val('{{$user->id}}')" data-toggle="modal" class="btn btn-info float-left mr-1"><i class="fa fa-share-square ml-1"></i>ارجاع</a>
                                        @if($user->rent_status==3 || $user->rent_status==4)
                                            @if($user->cancel_reason)
                                                <a href="javascript:void(0)" data-target="#descriptionModal" onclick="$('#cancel_reason').val('{{$user->cancel_reason}}')" data-toggle="modal" class="btn btn-secondary float-left mr-1"><i class="fa fa-info ml-1"></i>توضیحات</a>
                                            @endif
                                        @endif
                                            {!! Form::open(['method' => 'POST', 'route' => ['contract-cancel'],'class'=>'mb-0' ]) !!}
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <input type="hidden" name="refer_id" value="{{$user->user_id}}">
                                            <input type="hidden" name="status" value="5">
                                            {!! Form::button('<i class="fa fa-ban ml-1"></i>کنسل', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger float-left mr-1', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']) !!}
                                            {!! Form::close() !!}
                                        @endif
                                        @role('مدیر ملک')
                                            @php $isRaised=\App\QuestionnaireReadyExperts::where('user_id',auth()->id())->where('questionnaire_id',$user->questionnaire->id)->first(); @endphp
                                            <a href="javascript:void(0)" class="mr-1" onclick="raise_hand('{{$user->questionnaire->id}}')"><i class="fa fa-2x fa-hand-o-{{$isRaised?'down':'up'}} raise_hand{{$user->questionnaire->id}}"></i>
                                                <div style="vertical-align: middle;" class="like-loader{{$user->questionnaire->id}} spinner-grow spinner-grow-sm text-danger d-none"></div>
                                            </a>
                                        @endrole
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- The Modal -->
                <div class="modal" id="referModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{route('user-refer')}}" method="post">
                            @csrf
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">ارجاع به کارشناس</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <input id="refer_id" type="hidden" name="id" value="">
                                <select class="form-control select2" id="user_id" name="user_id" required>
                                    <option value="0" {{ old('user_id') == 0 ? 'selected' : ''  }}>ندارد</option>
                                    @foreach(\App\User::role('مدیر ملک')->get() as $admin_user)
                                        <option
                                                value="{{ $admin_user->id }}"
                                                {{ old('user_id') == $admin_user->id ? 'selected' : '' }}>
                                            {{ $admin_user->first_name .' '.$admin_user->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger">ارجاع</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- The Modal -->
                <div class="modal" id="descriptionModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">توضیحات کنسلی</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <textarea disabled class="form-control" id="cancel_reason" cols="30" rows="10" placeholder="توضیحات"></textarea>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">خواندم</button>
                                </div>
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
            function raise_hand(id) {
                $('.like-loader'+id).toggleClass('d-none');
                //$(el).toggleClass('d-none');
                $.ajax({
                    url:  '{{url('/')}}'+'/panel/raise_hand/'+id,
                    context: document.body
                }).done(function(data) {
                    $('.like-loader'+id).toggleClass('d-none');
                    if(data=='false'){
                        $('.raise_hand'+id).removeClass('fa-hand-o-down');
                        $('.raise_hand'+id).addClass('fa-hand-o-up');
                    }else{
                    $('.raise_hand'+id).addClass('fa-hand-o-down');
                    $('.raise_hand'+id).removeClass('fa-hand-o-up');
                    }
                    // $(el).toggleClass('d-none');
                });
            }
        </script>
    @endpush
@endcomponent
