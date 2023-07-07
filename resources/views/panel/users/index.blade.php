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
                        {{$title??''}}
                    </h4>
                </div>
            </div>
            <div class="card-body">
{{--                <form action="{{route('user-search')}}?customer=true" method="post" class="mb-4" style="width: 95%;">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-6 col-sm-6" style="padding-left: 0;">--}}
{{--                            <input type="text" name="search" class="form-control" placeholder="جستجو...">--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 col-sm-6" style="padding-right: 0;">--}}
{{--                            <button type="submit"><i class="fa fa-search"></i></button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    {{csrf_field()}}--}}
{{--                </form>--}}
                <div class="table-responsive">
                    <style>
                        #dataTable_wrapper .col-md-6{
                            padding: 0 10px;
                        }
                    </style>
                    <table id="dataTable" class="archive-table table">
                        <thead>
                            <tr>
                                <th>نام</th>
                                @if(request()->type!='all')
                                @if(auth()->user()->hasRole('call center') || auth()->user()->hasRole('call center(sales)'))
                                <th>معرف</th>
                                @endif
                                <th>شغل</th>
                                <th>جنسیت</th>
                                <th>نوع درخواست</th>
                                <th>خواب</th>
                                <th>تاریخ اعلام</th>
                                <th>تاریخ ثبت نام</th>
                                <th>مناطق</th>
                                <th>نوع</th>
                                <th>کاربری</th>
                                <th>بودجه</th>
                                <th>موقعیت جغرافیایی</th>
                                <th>مشاوره آنلاین</th>
                                <th>عجله دارد</th>
                                @if(!auth()->user()->hasRole('مدیر ملک'))
                                <th>ایمیل</th>
                                <th>موبایل</th>
                                @endif
                                @endif
                                @if(request()->type=='all')
                                <th>دسترسی ها</th>
                                @endif
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>#{{$user->id}} {{ $user->first_name }} {{ $user->last_name }}
{{--                                    @if($user->account_status == 'active')--}}
{{--                                        <span class="badge badge-success">فعال</span>--}}
{{--                                    @elseif($user->account_status == 'pending')--}}
{{--                                        <span class="badge badge-warning">در انتظار تایید</span>--}}
{{--                                    @elseif($user->account_status == 'blocked')--}}
{{--                                        <span class="badge badge-secondary">مسدود شده</span>--}}
{{--                                    @endif--}}

                                    @if($user->user)
                                        <span
                                            class="badge badge-warning">نام کارشناس معرف : {{ $user->user->first_name .' ' . $user->user->last_name }}</span>
                                @endif
                                @if(request()->type!='all')
                                @if(auth()->user()->hasRole('call center') || auth()->user()->hasRole('call center(sales)'))
                                <td>{{ $user->user?$user->first_name.' '.$user->last_name:'بدون معرف' }}</td>
                                @endif
                                <td>{{ $user->job }}</td>
                                <td>{{ $user->gender == 0 ? 'مرد' : 'زن' }}</td>
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
                                </td>
                                <td>{{ $user->date }}</td>
                                <td>{{ $user->created_at }}</td>
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
                                    @if(!is_null($user->property_type))
                                        @php
                                            $is_serialized=is_serialized($user->property_type);
                                        @endphp
                                        @if(!$is_serialized)
                                            {{ \App\Villa::types()[$user->property_type]??'' }}
                                        @else
                                            @if(gettype(unserialize($user->property_type))=='array')
                                            @foreach(unserialize($user->property_type) as $property)
                                                {{ \App\Villa::types()[$property]??'' }} ,
                                            @endforeach
                                            @endif
                                        @endif
                                    @endif
                                </td>
                                <td>
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
                                </td>
                                <td>
                                    @if(auth()->user()->hasRole('call center(sales)'))
                                        @if($user->budget_sales)
                                        {{ $user->budget_sales }}
                                        {{ $user->budget_type }}
                                        @endif
                                    @elseif(auth()->user()->hasRole('call center'))
                                        {{ $user->budget_sales?'(اجاره '.$user->budget_sales. ' لیر)':'' }}
                                        {{ $user->budget?'(خرید '.$user->budget. ' لیر)':'' }}                                    @else
                                        {{ $user->budget_sales?'(اجاره '.$user->budget_sales. ' لیر)':'' }}
                                        {{ $user->budget?'(خرید '.$user->budget. ' لیر)':'' }}                                    @endif
                                </td>
                                <td>
                                    @if($user->living_country == 'iran')
                                        ایران
                                    @elseif($user->living_country == 'turkey')
                                        ترکیه
                                    @endif
                                </td>
                                <td>
                                    @if($user->consulting == 0)
                                        ندارد
                                    @elseif($user->consulting == 1)
                                        دارد
                                    @endif
                                </td>
                                <td>{{ $user->instant }}</td>
                                @if(!auth()->user()->hasRole('مدیر ملک'))
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->mobile }}</td>
                                @endif
                                @endif
                                @if(request()->type=='all')
                                    <td>
                                        @foreach($user->getRoleNames() as $role_name)
                                            {{ $role_name }} ,
                                        @endforeach
                                    </td>
                                @endif
                                <td width="140">
                                    @if(!auth()->user()->hasRole('watcher'))
                                    <div class="btn-inline">
                                        @role('مدیر')
                                        {{--                                        <a href="{{ route('user-show', $user->id) }}"--}}
                                        {{--                                           class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-eye ml-1"></i>مشاهده</a>--}}
                                        <a href="{{ route('user-edit', [$user->id]) }}?callback_url={{url(\Request::getRequestUri())}}"
                                           class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-edit ml-1"></i>ویرایش</a>
                                        @if($user->account_status != 'blocked')
                                            {!! Form::open(['method' => 'POST', 'route' => ['user-block', $user->id] ]) !!}
                                            {!! Form::button('<i class="fa fa-ban ml-1"></i>بلاک', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger float-left mr-1', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']) !!}
                                            {!! Form::close() !!}
                                        @endif

                                        {!! Form::open(['method' => 'DELETE', 'route' => ['user-destroy', $user->id] ]) !!}
                                        {!! Form::button('<i class="fa fa-times ml-1"></i>حذف', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger float-left mr-1', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']) !!}
                                        {!! Form::close() !!}

                                        @endrole

                                        @role('مدیر ملک')
                                            <a href="{{ route('customer-show', $user->id) }}" class="btn btn-sm btn-warning mr-1"><i class="fa fa-eye ml-1"></i>مشاهده</a>
                                        @endrole
                                        @role('call center')
                                            <a href="{{route('user-questionnaire',$user->id)}}" class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-info ml-1"></i>پرسش نامه</a>
                                            <a href="{{ route('user-edit', [$user->id]) }}?callback_url={{url(\Request::getRequestUri())}}"
                                               class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-edit ml-1"></i></a>
                                            <a href="javascript:void(0)" data-target="#removeModal" onclick="$('#remove_user_id').val('{{$user->id}}')" data-toggle="modal" class="btn btn-warning float-left mr-1">
                                                <i class="fa fa-ban ml-1"></i>حذف
                                            </a>
                                        @endrole
                                        @role('call center(sales)')
                                            <a href="{{route('user-questionnaire',$user->id)}}" class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-info ml-1"></i>پرسش نامه</a>
                                            <a href="{{ route('user-edit', [$user->id]) }}?callback_url={{url(\Request::getRequestUri())}}"
                                               class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-edit ml-1"></i></a>
                                            <a href="javascript:void(0)" data-target="#removeModal" onclick="$('#remove_user_id').val('{{$user->id}}')" data-toggle="modal" class="btn btn-warning float-left mr-1">
                                                <i class="fa fa-ban ml-1"></i>حذف
                                            </a>
                                        @endrole
                                    </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal" id="removeModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{route('user-remove')}}" method="post">
                            @csrf
                            <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">حذف کار بر از لیست</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <input id="remove_user_id" type="hidden" name="id" value="">
                                    <textarea name="remove_reason" class="form-control" id="" cols="30" rows="10" placeholder="دلیل"></textarea>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">حذف</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="paginate p-3">
{{--                    {{ $users->links() }}--}}
                    {{--                    @role('مدیر')--}}
                    {{--                    <a href="{{ (request()->has('role') && request()->get('role') == 3) ? route('user-property-create', (request()->has('role')) ? 'role=' . request()->get('role') : '') :  route('user-property-create') }}"--}}
                    {{--                       class="btn btn-rounded btn-primary float-left"><i--}}
                    {{--                            class="fa fa-circle-o ml-1"></i>افزودن</a>--}}
                    {{--                    @endrole--}}

                    {{--                    @role('مدیر ملک')--}}
                    @if(!auth()->user()->hasRole('watcher'))
                        <a href="{{ route('user-create') }}?callback_url={{url(\Request::getRequestUri())}}"
                           class="btn btn-rounded btn-primary float-left"><i
                                class="fa fa-circle-o ml-1"></i>افزودن</a>
                    @endif
                    {{--                    @endrole--}}
                </div>
            </div>
        </div>
    @endslot
    @push('scripts')
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable( {
                    pageLength: 10,
                    columnDefs: [ {
                        targets: [ 0 ],
                        orderData: [ 0 ]
                    } ]
                } );
            } );
        </script>
    @endpush
@endcomponent
