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
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->first_name }} {{ $user->last_name }} @if($user->account_status == 'active')
                                        <span class="badge badge-success">فعال</span>@elseif($user->account_status == 'pending')
                                        <span class="badge badge-warning">در انتظار تایید</span>@elseif($user->account_status == 'blocked')
                                        <span class="badge badge-secondary">مسدود شده</span>@endif</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->mobile }}</td>
                                <td width="140">
                                    <div class="btn-inline">
                                        <a href="{{ route('user-show', $user->id) }}"
                                           class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-eye ml-1"></i>مشاهده مشخصات</a>
                                        <a href="{{ route('user-edit', [$user->id,url()->current()]) }}"
                                           class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-edit ml-1"></i>ویرایش</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="paginate p-3">
                    {{ $users->links() }}
                    <a href="{{ (request()->has('role') && request()->get('role') == 3) ? route('user-property-create', (request()->has('role')) ? 'role=' . request()->get('role') : '') :  route('user-property-create') }}"
                       class="btn btn-rounded btn-primary float-left"><i
                                class="fa fa-circle-o ml-1"></i>افزودن</a>
                </div>
            </div>
        </div>
    @endslot
@endcomponent