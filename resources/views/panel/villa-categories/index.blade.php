@component('layouts.back')
    @slot('title') مدیریت {{ $title }} @endslot
    @slot('body')
        <style>
            .dd-list {
                direction: rtl;
                text-align: right;
            }

            .dd-item {
                background: #ca5858;
                margin-bottom: 10px;
                padding: 5px 15px;
                line-height: 40px;
                border-radius: 3px;
            }

            .dd-handle {
                display: inline-block;
            }

            .btn-inline {
                display: inline-flex;
                float: left;
            }

            .archive-table thead {
                background: #b41f25;
                line-height: 4;
            }

            .archive-table tbody tr {
                border-bottom: 2px solid #fd7a7a;
            }

            form input[type="number"] {
                width: 55px;
                text-align: center;
                border-radius: 50px;
                border: unset;
                box-shadow: 0 0 1px 1px #343333;
            }
        </style>
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

                    @if(count($projects))
                        <table id="dataTable" class="archive-table">
                            <thead>
                            <tr>
                                <th>تصویر</th>
                                <th>عنوان</th>
                                <th>وضعیت</th>
                                <th>کل واحد ها</th>
                                <th>فروخته شده</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($projects as $key=>$project)
                                <tr>
                                    <td>
                                        <img src="{{$project->image!=null?url($project->image):''}}" width="55" alt="">
                                    </td>
                                    <td>
                                        {{ $project->title }}
                                        ( {{$project->user?$project->user['first_name'].' '.$project->user['last_name']:'مریم کیامرام'}}
                                        )
                                    </td>
                                    <td>
                                        @switch($project->status)
                                            @case('pending')
                                            <span class="badge badge-danger">عدم نمایش</span>
                                            <a href="{{route('villa-category-active',[$project->id,'published'])}}"><span class="badge badge-success"><i class="fa fa-check"></i> </span></a>
                                            @break
                                            @case('published')
                                            <span class="badge badge-success">نمایش</span>
                                            <a href="{{route('villa-category-active',[$project->id,'pending'])}}"><span class="badge badge-danger"><i class="fa fa-close"></i> </span></a>
                                            @break
                                            @default
                                        @endswitch
                                    </td>
                                    <td>
                                        {{$project->count_all_unit}}
                                    </td>
                                    <td>
                                        {!! Form::open(['method' => 'POST', 'route' => ['villa-category-update-count', $project->id],'id'=>'form_count_'.$key ]) !!}
                                        فروش رفته

                                        <input type="number" name="count" value="{{$project->count_sale_unit}}" class="counter" data-id="{{$key}}">
                                        {!! Form::close() !!}
                                    </td>
                                    <td width="160">
                                        @if(!auth()->user()->hasRole('watcher'))
                                            <div class="btn-inline pt-0">
                                                <a href="{{ route('meterage.index', $project->id) }}"
                                                   class="btn btn-warning float-left mx-1 mb-0"><i
                                                            class="fa fa-edit ml-1"></i>لیست متراژ</a>
                                                <a href="{{ route('villa-category-edit', $project->id) }}"
                                                   class="btn btn-warning float-left mx-1 mb-0"><i
                                                            class="fa fa-edit ml-1"></i>ویرایش</a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['villa-category-destroy', $project->id] ]) !!}
                                                {!! Form::button('<i class="fa fa-ban ml-1"></i>حذف', ['type' => 'submit', 'class' => 'btn btn-danger float-left', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        موردی وجود ندارد
                    @endif

            
                @if(!auth()->user()->hasRole('watcher'))
                    <div class="paginate p-3 d-flex">
                        <a href="{{ route('villa-category-create') }}" class="btn btn-rounded btn-primary float-left"><i
                                    class="fa fa-circle-o ml-1"></i>افزودن</a>
                    </div>
                @endif
            </div>
        </div>
    @endslot
    @push('scripts')
        <script type="text/javascript" src="{{ url('assets/admin/js/easing.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('assets/admin/js/nestable.min.js') }}"></script>
        <script type="text/javascript">
            $('.dd').nestable();
            {{--$('.dd').on('change', function () {--}}
                {{--$.post('{{ route('villa-category-sort') }}', {--}}
                    {{--sort: JSON.stringify($('.dd').nestable('serialize')),--}}
                    {{--_token: '{{ csrf_token() }}'--}}
                {{--}, function () {--}}
                    {{--$.jGrowl('ذخیره شد', {life: 3000, position: 'bottom-right', theme: 'bg-success'});--}}
                {{--});--}}
            {{--});--}}
            $(".counter").on('change', function () {
                var id=$(this).attr('data-id');
                $('#form_count_'+id).submit();
            })
        </script>
    @endpush
@endcomponent