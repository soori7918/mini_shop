@component('layouts.back')
    @slot('title') ویرایش {{ $title }} {{ $gallery->name }} @endslot
    @slot('body')
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>
                    </div>
                    <h2>ویرایش {{ $title }} {{ $gallery->name }}</h2>
                </div>
            </div>
            <div class="card-body">
                {{ Form::model($gallery, array('route' => array('location-gallery-update', $gallery->id), 'method' => 'PATCH')) }}
                <div class="form-group">
                    {{ Form::label('location_id', 'نام مقصد') }}
                    {{ Form::select('location_id', array_pluck($locations, 'name', 'id'), null, array('class' => 'form-control selectpicker')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('name', 'نام') }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>
                <br/>
                <a href="{{ URL::previous() }}" class="btn btn-rounded btn-secondary float-right"><i class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                {{ Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>ویرایش', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left')) }}
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
            $('.selectpicker').each(function () {
                $(this).selectpicker();
            });
        </script>
    @endpush
@endcomponent