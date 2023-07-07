@component('layouts.back')
    @slot('title') {{ $title }} @endslot
    @slot('body')
        <div class="card text-right" dir="rtl">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>
                    </div>
                    <h2>{{ $title }}</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="row mt-4 mb-4">
                    <div class="col-md-12">
                        <p>
                            <strong>نام : </strong>
                            <span>{{ $passport->name }}</span>
                        </p>
                        <p>
                            <strong>شماره تلفن : </strong>
                            <span>{{ $passport->phone }}</span>
                        </p>
                        <p>
                            <strong>ایمیل : </strong>
                            <span>{{ $passport->email }}</span>
                        </p>
                        <p>
                            <strong>پیام : </strong>
                            <span>{!! $passport->message !!}</span>
                        </p>
                    </div>
                </div>
                <br/>
                <a href="{{ URL::previous() }}" class="btn btn-rounded btn-secondary float-right"><i
                            class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
            </div>
        </div>
    @endslot
@endcomponent