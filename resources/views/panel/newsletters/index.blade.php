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
                    <table class="archive-table">
                        @foreach ($newsletters as $newsletter)
                            <tr>
                                <td>@if($newsletter->email) {{ $newsletter->email }} @else بدون ایمیل @endif</td>
                                <td>@if($newsletter->mobile) {{ $newsletter->mobile }} @else بدون موبایل @endif</td>
                                <td>
                                    {{$newsletter->page_name_display }}
                                </td>
                                <td width="140">
                                    @if(!auth()->user()->hasRole('watcher'))
                                    <div class="btn-inline">
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['newsletter-destroy', $newsletter->id] ]) !!}
                                        {!! Form::button('<i class="fa fa-ban ml-1"></i>حذف', ['type' => 'submit', 'class' => 'btn btn-danger float-left', 'onclick' => 'return confirm(" تمامی نظرات و کامنت های کاربر حذف خواهد شد ؟")']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="paginate p-3">
                    {{ $newsletters->links() }}
                </div>
            </div>
        </div>
    @endslot
@endcomponent