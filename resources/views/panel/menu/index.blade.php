@component('layouts.back')
    @slot('title') مدیریت {{ $title }} @endslot
    @slot('body')
        <style>
            img {
                max-width: 80%;
                max-height: 150px;
            }
        </style>
        <div class="card text-center" dir="rtl">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>                    </div>
                    <h2>لیست {{ $title }}</h2>
                    <p>درصورت نیاز به تغییر منو، منو کنونی حذف و منو جدید افزوده شود</p>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="archive-table">
                        <tr>
                            <td><h6>عنوان</h6></td>
                            {{--                            <td><h6>نمایش</h6></td>--}}
                            <td><h6>لینک</h6></td>
                            <td width="140"><h6>عملیات</h6></td>
                        </tr>
                        @foreach ($menus as $menu)
                            <tr>
                                <td>{{ $menu->title }} </td>
                                {{--                                <td>@if($menu->type == 1) موبایل @elseif($menu->type == 2) دکستاپ @endif </td>--}}
                                <td>{{$menu->url}}</td>
                                <td width="140">
                                    @if(!auth()->user()->hasRole('watcher'))
                                        <div class="btn-inline">
                                            <a href="{{ route('menu-edit', $menu->id) }}" class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-edit ml-1"></i>ویرایش</a>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['menu-destroy', $menu->id] ]) !!}
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
                    {{ $menus->links() }}
                    <a href="{{route('menu-create')}}" class="btn btn-rounded btn-primary float-left"><i class="fa fa-circle-o ml-1"></i>افزودن</a>
                </div>
            </div>
        </div>
    @endslot
@endcomponent