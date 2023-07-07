@component('layouts.back')
    @slot('title') {{ $title }} {{ $post->title }} @endslot
    @slot('body')
        <div class="card text-right" dir="rtl">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>                    </div>
                    <h2>{{ $title }} {{ $post->title }}</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="row mt-4 mb-4">
                    <div class="col-md-8 post-text">
                        <p class="text-justify">{!! str_limit(strip_tags($post->text), $limit = 300, $end = '...') !!}</p>
                        <hr/>
                        {!! html_entity_decode($post->text) !!}
                    </div>
                    <div class="col-md-4 post">
                        @if($post->file)
                            <img src="{{ url($post->file) }}" alt="{{ $post->title }}" width="250px">
                     
                        @endif
                        <ul class="list-group mt-3">
                            <li class="list-group-item"><strong>شاکی : </strong>{{ $post->user->first_name }} {{ $post->user->last_name }}</li>
                            <li class="list-group-item"><strong>متشاکی : </strong>{{ $post->form->first_name }} {{ $post->form->last_name }}</li>
                            <li class="list-group-item"><strong>تاریخ مشاجره : </strong>{{ my_jdate($post->date, 'd F Y ') }}</li>
                            <li class="list-group-item"><strong>تاریخ ثبت : </strong>{{ my_jdate($post->created_at, 'd F Y H:i') }}</li>
                            <li class="list-group-item"><strong>تاریخ بروزرسانی : </strong>{{ my_jdate($post->updated_at, 'd F Y H:i') }}</li>
                            <li class="list-group-item"><strong>وضعیت : </strong>@if($post->status == '1')<span class="badge badge-success">منتشر شده</span>@elseif($post->status == '2')<span class="badge badge-secondary">پیش نویس</span>@endif</li>
                        </ul>
                    </div>
                </div>
                <br/>
                <a href="{{ URL::previous() }}" class="btn btn-rounded btn-secondary float-right"><i class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                <a href="{{ route('complain-edit', $post->id) }}" class="btn btn-rounded btn-success float-left mr-1"><i class="fa fa-edit ml-1"></i>ویرایش</a>
            </div>
        </div>
    @endslot
@endcomponent