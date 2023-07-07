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
                {{ Form::open(array('route' => 'insurance-store', 'method' => 'PUT', 'files' => true, 'style' => 'width:100%!important;min-width:100%!important')) }}
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {{ Form::label('title', 'عنوان') }}
                            {{ Form::text('title', '', array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            {{ Form::label('slug', 'نامک') }}
                            {{ Form::text('slug', '', array('class' => 'form-control')) }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::textarea('text', '', array('id' => 'body', 'class' => 'form-control textarea')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('name', 'تصویر شاخص') }}
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
    @push('scripts')
        <script src="{{ asset('editor/laravel-ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('editor/laravel-ckeditor/adapters/jquery.js') }}"></script>
        <script type="text/javascript">
            var textareaOptions = {
                filebrowserImageBrowseUrl: '{{ url('filemanager?type=Images') }}',
                filebrowserImageUploadUrl: '{{ url('filemanager/upload?type=Images&_token=') }}',
                filebrowserBrowseUrl: '{{ url('filemanager?type=Files') }}',
                filebrowserUploadUrl: '{{ url('filemanager/upload?type=Files&_token=') }}',
                language: 'fa'
            };
            $('.textarea').ckeditor(textareaOptions);
            slug('#title', '#slug');
        </script>
    @endpush
@endcomponent