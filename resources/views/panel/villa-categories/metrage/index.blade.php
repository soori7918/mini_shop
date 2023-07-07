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

{{--                @if(count($project->metrages()))--}}
                    <table id="dataTable" class="archive-table">
                        <thead>
                        <tr>
                            <th>تعداد اتاق</th>
                            <th>قیمت</th>
                            <th>مساحت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($project->metrages as $key=>$item)
                            <tr>
                                <td>
                                    {{ $item->room }}
                                </td>
                                <td>
                                    {{ $item->price }}
                                </td>
                                <td>
                                    {{ $item->metrage }}
                                </td>

                                <td width="160">
                                    @if(!auth()->user()->hasRole('watcher'))
                                        <div class="btn-inline pt-0">
                                            <a href="{{ route('meterage.edit',[ $project->id, $item->id]) }}"
                                               class="btn btn-warning float-left mx-1 mb-0"><i
                                                        class="fa fa-edit ml-1"></i>ویرایش</a>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['meterage.destroy', $project->id] ]) !!}
                                            {!! Form::button('<i class="fa fa-ban ml-1"></i>حذف', ['type' => 'submit', 'class' => 'btn btn-danger float-left', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
{{--                @else--}}
{{--                    موردی وجود ندارد--}}
{{--                @endif--}}


                @if(!auth()->user()->hasRole('watcher'))
                    <div class="paginate p-3 d-flex">
                        <a href="{{ route('meterage.create',$project->id) }}" class="btn btn-rounded btn-primary float-left"><i
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