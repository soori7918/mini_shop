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
                    <p>درصورت نیاز به تغییر اسلایدر، اسلایدر کنونی حذف و اسلایدر جدید افزوده شود</p>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="archive-table">
                        <tr>
                            <td><h6>عنوان</h6></td>
{{--                            <td><h6>نمایش</h6></td>--}}
                            <td><h6>تصویر اسلایدر</h6></td>
                            <td width="140"><h6>عملیات</h6></td>
                        </tr>
                        @foreach ($sliders as $slider)
                            <tr>
                                <td>{{ $slider->title }} </td>
{{--                                <td>@if($slider->type == 1) موبایل @elseif($slider->type == 2) دکستاپ @endif </td>--}}
                                <td><a href="{{ url($slider->photo?$slider->photo->path:'') }}" target="_blank"><img src="{{ url($slider->photo?$slider->photo->path:'') }}" height="150px"/></a></td>
                                <td width="140">
                                    @if(!auth()->user()->hasRole('watcher'))
                                    <div class="btn-inline">
                                        <a href="{{ route('slider-edit', $slider->id) }}" class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-edit ml-1"></i>ویرایش</a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['slider-destroy', $slider->id] ]) !!}
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
                    {{ $sliders->links() }}
                    <a href="{{route('slider-create')}}" class="btn btn-rounded btn-primary float-left"><i class="fa fa-circle-o ml-1"></i>افزودن</a>
                </div>
            </div>
        </div>
    @endslot
@endcomponent