@component('layouts.back')
    @slot('title') افزودن {{ $title }} @endslot
    @slot('body')
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>
                    </div>

                    <h2>افزودن {{ $title }}</h2>
                </div>
            </div>
            <div class="card-body">
                {{ Form::open(array('route' => 'ical-store', 'method' => 'PUT','files' => true)) }}
                <div class="form-group">
                    {{ Form::label('first_name', 'نام') }}
                    {{ Form::select('villa_id', $villas, $villa!=null?$villa->id:null, array('class' => 'form-control'))}}
                </div>
                <div class="form-group">
                    {{ Form::label('file_name', ' فایل') }}
                    {{ Form::file('ical')}}
                </div>
                <div class="form-group">
                    {{ Form::label('icalurl', ' آدرس فایل') }}
                    {{ Form::text('icalurl',$villa!=null?$villa->villaical->ical_url:null)}}
                </div>                
                {{ Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>افزودن', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left')) }}
                {{ Form::close() }}
            </div>
        </div>
    @endslot
@endcomponent