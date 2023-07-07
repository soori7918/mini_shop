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
                    <table class="archive-table">
                        <thead>
                        <tr>
                            <th>نام</th>
                            <th>ایمیل</th>
                            <th>موبایل</th>
                            <th>دلیل رد</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        @foreach ($users as $user)
                            <tbody>
                            <tr>
                                <td>{{ $user->first_name }} {{ $user->last_name }} @if($user->account_status == 'active')
                                        <span class="badge badge-success">فعال</span>@elseif($user->account_status == 'pending')
                                        <span class="badge badge-warning">در انتظار تایید</span>@elseif($user->account_status == 'blocked')
                                        <span class="badge badge-secondary">مسدود شده</span>@endif</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->mobile }}</td>
                                <td>{{ $user->status_message }}</td>
                                <td width="140">
                                    <div class="btn-inline">
                                        <a href="{{ route('user-show', $user->id) }}"
                                           class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-eye ml-1"></i>مشاهده مشخصات</a>
                                        @if(!auth()->user()->hasRole('watcher'))
                                        <a href="{{ route('profile-edit', [$user->id,url()->current()]) }}"
                                           class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-edit ml-1"></i>ویرایش</a>
                                        @role('مدیر')
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['user-destroy', $user->id] ]) !!}
                                        {!! Form::button('<i class="fa fa-times mr-1 ml-1"></i>حذف', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger float-left mr-1', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']) !!}
                                        {!! Form::close() !!}
                                        @endrole
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
                <div class="paginate p-3">
                    {{ $users->links() }}
                    @if(!auth()->user()->hasRole('watcher'))
                    <a href="{{ (request()->has('role') && request()->get('role') == 3) ? route('user-property-create', (request()->has('role')) ? 'role=' . request()->get('role') : '') :  route('user-property-create') }}"
                       class="btn btn-rounded btn-primary float-left"><i
                                class="fa fa-circle-o ml-1"></i>افزودن</a>
                    @endif
                </div>
            </div>
        </div>
    @endslot
@endcomponent