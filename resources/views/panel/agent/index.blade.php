@component('layouts.back')
    @slot('title') مدیریت {{ $title }} @endslot
    @slot('body')
        <div class="card" dir="rtl">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>                    </div>
                    <h2>لیست {{ $title }}</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{--                    <form action="{{route('item-search')}}" method="item" style="width: 95%;">--}}
                    {{--                        <div class="row">--}}
                    {{--                            <div class="col-md-6 col-sm-6" style="padding-left: 0;">--}}
                    {{--                                <input type="text" name="search" class="form-control" placeholder="جستجو...">--}}
                    {{--                            </div>--}}
                    {{--                            <div class="col-md-6 col-sm-6" style="padding-right: 0;">--}}
                    {{--                                <button type="submit"><i class="fa fa-search"></i></button>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                        {{csrf_field()}}--}}
                    {{--                    </form>--}}
                    <table class="archive-table">
                        @foreach ($items as $key=> $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td width="140">
                                    @if(!auth()->user()->hasRole('watcher'))
                                        <div class="btn-inline">
{{--                                            <a href="{{ route('agent.sho', $item->id) }}" class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-eye ml-1"></i>مشاهده</a>--}}
                                            <a href="{{ route('agent.edit', $item->id) }}" class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-edit ml-1"></i>ویرایش</a>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['agent.destroy', $item->id] ]) !!}
                                            {!! Form::button('<i class="fa fa-ban ml-1"></i>حذف', ['type' => 'submit', 'class' => 'btn btn-danger float-left', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="paginate p-3">
                    {{ $items->links() }}
                    @if(!auth()->user()->hasRole('watcher'))
                        <a href="{{ route('agent.create') }}" class="btn btn-rounded btn-primary float-left"><i class="fa fa-circle-o ml-1"></i>افزودن</a>
                    @endif
                </div>
            </div>
        </div>
    @endslot
@endcomponent