@component('layouts.back')
    @slot('title') ویرایش {{ $title }} {{ $comment->commendable->title }} @endslot
    @slot('body')
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>
                    </div>

                    <h2>ویرایش {{ $title }} {{ $comment->commendable->title }}</h2>
                </div>
            </div>
            <?php $user = (object)unserialize($comment->creator);?>
            <div class="card-body">
                <hr>
                <p>توسط : {{ $user->name }} - {{ $user->email }}</p>
                {{ Form::model($comment, array('route' => array('comment-update', $comment->id), 'method' => 'PATCH', 'files' => true, 'style' => 'width:100%!important;min-width:100%!important')) }}
                <div class="form-group">
                    {{ Form::textarea('body', null, array('id' => 'body', 'class' => 'form-control')) }}
                </div>
                <br/>
                <a href="{{ URL::previous() }}" class="btn btn-rounded btn-secondary float-right"><i class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                {{ Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>ویرایش', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left')) }}
                {{ Form::close() }}
            </div>
        </div>
    @endslot
@endcomponent