@component('layouts.back')
    @slot('title') ویرایش رمز عبور {{ $title }} {{ $profile->first_name }} {{ $profile->last_name }} @endslot
    @slot('body')
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>                    </div>
                    <h2>ویرایش رمز عبور {{ $title }} {{ $profile->first_name }} {{ $profile->last_name }}</h2>
                </div>
            </div>
            <div class="card-body">
                {{ Form::model($profile, array('route' => array('profile-password-update', $profile->id), 'method' => 'PATCH')) }}
                <div class="form-group">
                    {{ Form::label('password', 'رمز عبور') }}
                    {{ Form::password('password', array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('password', 'تکرار رمز عبور') }}
                    {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
                </div>
                <br/>
                <a href="{{ URL::previous() }}" class="btn btn-rounded btn-secondary float-right"><i class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                {{ Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>ویرایش', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left')) }}
                {{ Form::close() }}
            </div>
        </div>
    @endslot
@endcomponent