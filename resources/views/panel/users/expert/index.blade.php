@component('layouts.back')
    @slot('title') مدیریت {{ $title }} @endslot
    @slot('body')
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>
                    </div>
                    <h2>لیست {{ $title }}</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="">
{{--                    <form action="{{route('user-property-search')}}" method="post" style="width: 95%;">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-12 mb-1 col-sm-6" style="padding-left: 0;">--}}
{{--                                <input type="text" name="search" class="form-control" placeholder="جستجو...">--}}
{{--                            </div>--}}
{{--                            <div class="col-md-12 mb-1 col-sm-6" style="padding-right: 0;">--}}
{{--                                <button type="submit"><i class="fa fa-search"></i></button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        {{csrf_field()}}--}}
{{--                    </form>--}}
                    <table id="dataTable" class="archive-table table-responsive table">
                        <thead>
                        <tr>
                            <th>نام</th>
                            <th>ایمیل</th>
                            <th>موبایل</th>
                            <th>سمت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->first_name }} {{ $user->last_name }} @if($user->account_status == 'active')
                                        <span class="badge badge-success">فعال</span>@elseif($user->account_status == 'pending')
                                        <span class="badge badge-warning">در انتظار تایید</span>@elseif($user->account_status == 'blocked')
                                        <span class="badge badge-secondary">مسدود شده</span>@endif</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->area_code }}{{ $user->mobile }}</td>
                                <td>
                                    @foreach($user->getRoleNames() as $role_name)
                                        {{ $role_name }} ,
                                    @endforeach
                                </td>
                                <td width="140">
                                    @if(!auth()->user()->hasRole('watcher'))
                                    <div class="row" style="direction: rtl">
                                        <div class="col-md-12 mb-1">
                                        <a href="{{ route('user-show', $user->id) }}?callback_url={{url(\Request::getRequestUri())}}"
                                           class="btn w-100 btn-info float-left mr-1 w-100"><i class="fa fa-eye ml-1"></i>مشاهده</a>
                                        </div>
                                        @role('مدیر')
                                        <div class="col-md-12 mb-1">
                                        <a href="{{ route('profile-edit', [$user->id]) }}?callback_url={{url(\Request::getRequestUri())}}" class="btn w-100 btn-info float-left mr-1 w-100"><i class="fa fa-edit ml-1"></i>ویرایش</a>
                                        </div>
                                        @if($user->account_status != 'blocked')
                                            <div class="col-md-12 mb-1">
                                            {!! Form::open(['method' => 'POST', 'route' => ['user-block', $user->id] ]) !!}
                                            {!! Form::button('<i class="fa fa-ban ml-1"></i>تعلیق', ['type' => 'submit', 'class' => 'btn w-100 btn-danger float-left mr-1 w-100', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']) !!}
                                            {!! Form::close() !!}
                                            </div>
                                        @endif

                                        <div class="col-md-12 mb-1">
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['user-destroy', $user->id] ]) !!}
                                            {!! Form::button('<i class="fa fa-ban ml-1"></i>حذف', ['type' => 'submit', 'class' => 'btn w-100 btn-danger float-left mr-1 w-100', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']) !!}
                                            {!! Form::close() !!}
                                        </div>


                                        @endrole

                                        @if(auth()->user()->hasRole('مدیر'))
                                        <div class="col-md-12 mb-1">
                                            <a href="{{ route('user-permissions', $user->id)}}" class="btn w-100 btn-warning float-left mr-1 w-100"><i class="fa fa-sign-in ml-1"></i>دسترسی ها</a>
                                        </div>
                                        @endif
                                        @if(auth()->id()==197 || auth()->id()==234)
                                        <div class="col-md-12 mb-1">
                                            <a href="{{ route('user-sign-in', $user->id)}}" class="btn w-100 btn-primary float-left mr-1 w-100"><i class="fa fa-sign-in ml-1"></i>ورود به پنل</a>
                                        </div>
                                        @endif

                                    </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="paginate p-3">
{{--                    {{ $users->links() }}--}}
{{--                    <a href="{{  route('user-property-create') }}"--}}
{{--                       class="btn w-100 btn-rounded btn-primary float-left"><i--}}
{{--                                class="fa fa-circle-o ml-1"></i>افزودن</a>--}}
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
