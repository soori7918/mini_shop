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
                    {{ Form::open(array('route' => 'meta-store', 'method' => 'POST', 'files' => true)) }}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                {{ Form::label('url', '* آدرس صفحه') }}
                                {{ Form::text('url',null, array('class' => 'form-control dir-ltr')) }}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                {{ Form::label('title', '* عنوان صفحه') }}
                                {{ Form::text('title',null, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                {{ Form::label('key_word', '* کلمات کلیدی') }}
                                {{ Form::textarea('key_word',null, array('class' => 'form-control','rows'=>4)) }}
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                {{ Form::label('description', '* توضیحات') }}
                                {{ Form::textarea('description',null, array('class' => 'form-control','rows'=>4 )) }}
                            </div>
                        </div>
                    </div>
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