@component('layouts.back')
    @slot('body')
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>
                    </div>

                    {{--                    <h2>{{ $title }} @if($comment->commendable_type == 'App\Post') نوشته : @elseif($comment->commendable_type == 'App\Villa') ویلا : @endif{{ $comment->commendable->name }}</h2>--}}
                </div>
            </div>
            <?php $user = (object)unserialize($comment->creator);?>
            <div class="card-body">
                <div class="row mt-4 mb-4">
                    <div class="col-md-7 post-text">
                        <p>توسط : {{ $user->name }} - {{ $user->email }}</p>
                        <hr>
                        {!! html_entity_decode($comment->body) !!}
                    </div>
                    <div class="col-md-5 post">
                        <ul class="list-group mt-3">
                            <li class="list-group-item"><strong>تاریخ ثبت : </strong>{{ my_jdate($comment->created_at, 'd F Y H:i') }}</li>
                            <li class="list-group-item"><strong>تاریخ بروزرسانی : </strong>{{ my_jdate($comment->updated_at, 'd F Y H:i') }}</li>
                            <li class="list-group-item"><strong>وضعیت : </strong>@if($comment->status == 'published')<span class="badge badge-success">منتشر شده</span>@elseif($comment->status == 'pending')<span
                                        class="badge badge-warning">در انتظار تایید</span>@endif</li>
                        </ul>
                    </div>
                </div>
                <br/>
                <a href="{{ URL::previous() }}" class="btn btn-rounded btn-secondary float-right"><i class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                <a href="{{ route('comment-edit', $comment->id) }}" class="btn btn-rounded btn-success float-left mr-1"><i class="fa fa-edit ml-1"></i>ویرایش</a>
            </div>
        </div>
    @endslot
@endcomponent