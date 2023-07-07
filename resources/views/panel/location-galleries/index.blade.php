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
                    <form action="{{route('location-gallery-search')}}" method="post" style="width: 95%;">
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
                        @foreach ($location_galleries as $gallery)
                            <tr>
                                <td>{{ $gallery->name }} (مقصد {{ $gallery->location->name }})</td>
                                <td width="140">
                                    <div class="btn-inline">
                                        <a href="{{ route('location-gallery-show', $gallery->id) }}" class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-eye ml-1"></i>مشاهده</a>
                                        <a href="{{ route('location-gallery-edit', $gallery->id) }}" class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-edit ml-1"></i>ویرایش</a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['location-gallery-destroy', $gallery->id] ]) !!}
                                        {!! Form::button('<i class="fa fa-ban ml-1"></i>حذف', ['type' => 'submit', 'class' => 'btn btn-danger float-left', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="paginate p-3">
                    {{ $location_galleries->links() }}
                    <a href="{{ route('location-gallery-create') }}" class="btn btn-rounded btn-primary float-left"><i class="fa fa-circle-o ml-1"></i>افزودن</a>
                </div>
            </div>
        </div>
    @endslot
@endcomponent