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
                        @foreach ($comments as $key => $comment)
                            <?php $user = (object)unserialize($comment->creator);?>
                            @if(!is_null($user))
                                <tr>
                                    {{--<td>#{{ $comment->id }}</td>--}}
                                    <td>{{ $user->name }} {{ rank($comment->rank, '') }}</td>
                                    <td>{{$comment->commendable->category->type}}</td>
                                    <td>@if($comment->commendable->name){{$comment->commendable->name}}@else {{$comment->commendable->title}} @endif</td>
                                    <td>{{ $user->email }}</td>

                                    {{--<td>@if($comment->commendable_type == 'App\Post') نوشته--}}


                                        {{--: {{ $comment->commendable->title }} @elseif($comment->commendable_type == 'App\Villa')--}}
                                            {{--ویلا--}}
                                            {{--: {{ $comment->commendable->name }} @elseif($comment->commendable_type == 'App\Location')--}}
                                            {{--مقصد : {{ $comment->commendable->name }} @endif</td>--}}


                                    <td width="140">
                                        @if(!auth()->user()->hasRole('watcher'))
                                        <div class="btn-inline">
                                            <a href="{{ route('comment-show', $comment->id) }}"
                                               class="btn btn-sm btn-info float-left mr-1"><i
                                                        class="fa fa-eye ml-1"></i>مشاهده</a>
                                            <a href="{{ route('comment-edit', $comment->id) }}"
                                               class="btn btn-sm btn-info float-left mr-1"><i
                                                        class="fa fa-edit ml-1"></i>ویرایش</a>

                                            <a href="{{ route('comment-status2', $comment->id) }}"
                                               class="btn btn-sm btn-info float-left mr-1">@if($comment->main == 0)<span style="color:green;"><i class="fa fa-eye"></i>نمایش در صفحه اصلی  </span>@else <span style="color: red"><i class="fa fa-eye"></i> عدم نمایش در صفحه اصلی </span>@endif</a>

                                            {!! Form::open(['method' => 'PATCH', 'route' => ['comment-status', $comment->id] ]) !!}
                                            @if($comment->status == 'published')
                                                {!! Form::hidden('status', 'pending') !!}
                                                {!! Form::button('<i class="nc-icon ui-1_simple-remove ml-1"></i>عدم انتشار', ['type' => 'submit', 'class' => 'btn btn-danger float-left confirm']) !!}
                                            @elseif($comment->status == 'pending')
                                                {!! Form::hidden('status', 'published') !!}
                                                {!! Form::button('<i class="nc-icon ui-1_check ml-1"></i>انتشار', ['type' => 'submit', 'class' => 'btn btn-success float-left confirm']) !!}
                                            @endif
                                            {!! Form::close() !!}
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['comment-destroy', $comment->id] ]) !!}
                                            {!! Form::button('<i class="fa fa-ban ml-1"></i>حذف', ['type' => 'submit', 'class' => 'btn btn-danger float-left', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
                <div class="paginate p-3">
                    {{ $comments->links() }}
                </div>
            </div>
        </div>
    @endslot
@endcomponent