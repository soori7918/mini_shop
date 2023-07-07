@component('layouts.back')
    @slot('title') {{ 'مدیریت شهرها' }} @endslot
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
                    <table class="archive-table">
                        <tr>
                            <td><h6>نام</h6></td>
                            <td width="140"><h6>عملیات</h6></td>
                        </tr>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->name }} </td>
                                <td width="140">
                                    <div class="btn-inline">
                                        <a href="{{ route('location-list', 'city='.$item->id) }}"
                                           class="btn btn-sm btn-info float-left mr-1">لیست نواحی</a>
                                        @if(!auth()->user()->hasRole('watcher'))
                                        <a href="{{ route('city-edit', $item->id) }}"
                                           class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-edit ml-1"></i>ویرایش</a>
                                        <a href="{{ route('city-delete', $item->id) }}"
                                           class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-trash ml-1"></i>حذف</a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="paginate p-3">
                    {{ $items->links() }}
                    @if(!auth()->user()->hasRole('watcher'))
                    <a href="{{route('city-create')}}" class="btn btn-rounded btn-primary float-left"><i
                                class="fa fa-circle-o ml-1"></i>افزودن</a>
                    @endif
                </div>
            </div>
        </div>
    @endslot
@endcomponent