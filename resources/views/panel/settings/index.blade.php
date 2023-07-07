@component('layouts.back')
    @slot('title') مدیریت {{ $title }} @endslot
    @slot('body')
        <style>
            h3.meta_label {
                width: 100%;
                text-align: center;
                margin-bottom: 10px;
                margin-top: 20px;
            }
            .meta .form-group {
                padding: 0 50px 0 50px;
            }
        </style>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>                    </div>
                    <h2>لیست {{ $title }}</h2>
                </div>
            </div>
            <div class="card-body ">
                {{ Form::model($settings, array('route' => array('settings.update', $settings->id), 'method' => 'PATCH','files'=>'true')) }}
                <div class="row">
                    <div class="form-group col-6">
                        {{ Form::label('title', 'عنوان سایت') }}
                        {{ Form::text('title', null, array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group col-6">
                        {{ Form::label('keywords', 'کلمات کلیدی') }}
                        {{ Form::text('keywords', null, array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group col-6">
                        {{ Form::label('description', 'توضیحات') }}
                        {{ Form::text('description', null, array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group col-6">
                    {{ Form::label('paginate', 'تعداد صفحه بندی') }}
                    {{ Form::text('paginate', null, array('class' => 'form-control')) }}
                </div>
                </div>
                <div class="col-12 py-2 text-center">تنطیمات تماس با ما</div>
                <div class="row">
                    <div class="form-group col-6">
                        {{ Form::label('phone', 'شماره تماس') }}
                        {{ Form::text('phone', null, array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group col-6">
                        {{ Form::label('address', 'آدرس') }}
                        {{ Form::text('address', null, array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group col-6">
                        {{ Form::label('adress2', 'آدرس') }}
                        {{ Form::text('adress2', null, array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group col-6">
                        {{ Form::label('tel', 'شماره  تماس') }}
                        {{ Form::text('tel', null, array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group col-6">
                        {{ Form::label('insta', 'اینستا') }}
                        {{ Form::text('insta', null, array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group col-6">
                        {{ Form::label('whatsapp', 'واتساپ') }}
                        {{ Form::text('whatsapp', null, array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group col-6">
                        {{ Form::label('facebook', 'فیسبوک') }}
                        {{ Form::text('facebook', null, array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group col-6">
                        {{ Form::label('twitter', 'تویتر') }}
                        {{ Form::text('twitter', null, array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group col-6">
                        {{ Form::label('conseling_phone', 'شماره تماس') }}
                        {{ Form::text('conseling_phone', null, array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group col-6">
                        {{ Form::label('email', 'ایمیل ') }}
                        {{ Form::text('email', null, array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group col-6">
                        {{ Form::label('logo', 'لوگو ') }}
                        {{ Form::file('logo', null, array('class' => 'form-control')) }}
                    </div>
                </div>
                <a href="{{ URL::previous() }}" class="btn btn-rounded btn-secondary float-right"><i class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                {{ Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>ویرایش', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left')) }}
                {{ Form::close() }}
            </div>
        </div>
    @endslot
@endcomponent