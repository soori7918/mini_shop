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
                {{ Form::open(array('route' => 'property-store', 'method' => 'PUT', 'files' => true)) }}
                <div class="form-group">
                    {{ Form::label('name', 'نام ویژگی') }}
                    {{ Form::text('name', '', array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('status', 'نمایش ') }}
                    {{ Form::select('status', array('no' => 'خیر', 'yes' => 'بله'), '', array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('type', 'مکان ویژگی') }}
                    {{ Form::select('type', array('0' => 'امکانات داخلی', '1' => 'امکانات رفاهی','2'=>'دسترسی ها'), '', array('class' => 'form-control')) }}
                </div>
{{--                <div class="form-group">--}}
{{--                    {{ Form::label('view', 'منظره') }}--}}
{{--                    {{ Form::select('view', array('0' => 'کوهستانی', '1' => 'دریا','2'=>'جنگلی'), '', array('class' => 'form-control')) }}--}}
{{--                </div>--}}
                <div class="form-group">
                    {{ Form::label('name', 'آیکن ویژگی') }}
                    <div class="custom-file">
                        {{ Form::file('photo', array('accept' => 'image/*', 'class' => 'custom-file-input', 'id' => 'customFile')) }}
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                <br/>
                <a href="{{ URL::previous() }}" class="btn btn-rounded btn-secondary float-right"><i class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                {{ Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>افزودن', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left')) }}
                {{ Form::close() }}
            </div>
        </div>
    @endslot
    @push('stylesheets')
        <link rel="stylesheet" type="text/css" href="{{ url('assets/admin/css/bootstrap-select.min.css') }}"/>
    @endpush
    @push('scripts')
        <script type="text/javascript" src="{{ url('assets/admin/js/bootstrap-select.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('assets/admin/js/bootstrap-select-fa_IR.min.js') }}"></script>
        <script type="text/javascript">
            $('.selectpicker').selectpicker();
        </script>
    @endpush
@endcomponent