@component('layouts.back')
    @slot('title') {{ $title }} {{ $gallery->name }} @endslot
    @slot('body')
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>
                    </div>

                    <h2>{{ $title }} {{ $gallery->name }}</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="row gallery">
                    @foreach($gallery->photo as $photo)
                        <div class="col-md-3">
                            <a data-fancybox="gallery" href="{{ url($photo->path) }}">
                                <img src="{{ url($photo->path) }}" alt="{{ $gallery->name }}"/>
                            </a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['gallery-photo-destroy', $photo->id] ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'btn btn-simple btn-danger mt-2', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']) !!}
                            {!! Form::close() !!}
                        </div>
                    @endforeach
                </div>
                {{ Form::open(array('route' => 'gallery-photo-store', 'method' => 'PUT', 'files' => true)) }}
                {{ Form::hidden('gallery', $gallery->id) }}
                <div class="form-group">
                    {{ Form::label('name', 'تصویر جدید  (برای آپلود چند فایل دکمه ctrl را نگهدارید)') }}
                    <div class="custom-file">
                        {{ Form::file('photo[]', array('accept' => 'image/*', 'class' => 'custom-file-input', 'id' => 'customFile' , 'multiple')) }}
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
        <link rel="stylesheet" type="text/css" href="{{ url('assets/admin/css/fancybox.min.css') }}"/>
    @endpush
    @push('scripts')
        <script type="text/javascript" src="{{ url('assets/admin/js/fancybox.min.js') }}"></script>
    @endpush
@endcomponent