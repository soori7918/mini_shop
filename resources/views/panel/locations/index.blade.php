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
{{--                    <form action="{{route('location-search')}}" method="post" style="width: 95%;">--}}
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
                        @foreach ($locations as $location)
                            <tr>
                                <td>{{ $location->name }}</td>
{{--                                <td>{{ $location->city?$location->city->name:'نامشخص' }}</td>--}}
{{--                                <td>@if($location->pic) <img src="{{url($location->pic)}}" style="height: 100px"> @endif</td>--}}
                                <td>@if(count($location->photos)) <img src="{{url($location->photos[0]->path)}}" style="height: 100px"> @endif</td>
                                <td width="140">
                                    @if(!auth()->user()->hasRole('watcher'))
                                    <div class="btn-inline">
                                        @switch($location->status_home)
                                            @case('pending')
                                            <span class="badge badge-danger ml-1">عدم نمایش در صفحه اصلی</span>
                                            <a href="{{route('location-active',[$location->id,'active'])}}" title="نمایش در صفحه اصلی"><span class="badge badge-success"><i class="fa fa-check"></i> </span></a>
                                            @break
                                            @case('active')
                                            <span class="badge badge-success ml-1">نمایش در صفحه اصلی</span>
                                            <a href="{{route('location-active',[$location->id,'pending'])}}" title="عدم نمایش در صفحه اصلی"><span class="badge badge-danger"><i class="fa fa-close"></i> </span></a>
                                            @break
                                            @default
                                        @endswitch

                                            <a href="{{route('location-pupular',$location->id)}}" title="شهر محبوب"><span class="badge badge-success">{!!  $location->pupular == true ? '<i class="fa fa-check"></i>' : 'انتخاب نشده'!!} </span></a>

                                        <a href="{{ route('location-edit', $location->id) }}" class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-edit ml-1"></i>تغییر تصویر</a>
{{--                                        <div>--}}
{{--                                            {!! Form::open(['method' => 'DELETE', 'route' => ['location-destroy', $location->id] ]) !!}--}}
{{--                                            {!! Form::button('<i class="fa fa-ban ml-1"></i>حذف', ['type' => 'submit', 'class' => 'btn btn-danger float-left', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']) !!}--}}
{{--                                            {!! Form::close() !!}--}}
{{--                                        </div>--}}
                                    </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="paginate p-3">
{{--                    {{ $locations->links() }}--}}
{{--                    @if(!auth()->user()->hasRole('watcher'))--}}
{{--                    <a href="{{ route('location-create') }}" class="btn btn-rounded btn-primary float-left"><i class="fa fa-circle-o ml-1"></i>افزودن</a>--}}
{{--                    @endif--}}
                </div>
            </div>
        </div>
    @endslot
@endcomponent