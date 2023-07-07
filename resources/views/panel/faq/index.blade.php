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
                            <td><h6>سوال</h6></td>
                            <td><h6>جواب</h6></td>
                            <td width="140"><h6>عملیات</h6></td>
                        </tr>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->question }} </td>
                                <td>{{ $item->answer }} </td>
                                <td width="140">
                                    <div class="btn-inline">
                                        <a href="{{ route('faq-edit', $item->id) }}" class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-edit ml-1"></i>ویرایش</a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['faq-destroy', $item->id] ]) !!}
                                        {!! Form::button('<i class="fa fa-ban ml-1"></i>حذف', ['type' => 'submit', 'class' => 'btn btn-danger float-left', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="paginate p-3">
                    {{ $items->links() }}
                    <a href="{{route('faq-create')}}" class="btn btn-rounded btn-primary float-left"><i class="fa fa-circle-o ml-1"></i>افزودن</a>
                </div>
            </div>
        </div>
    @endslot
@endcomponent