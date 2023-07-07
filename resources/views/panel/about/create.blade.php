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
                    {{ Form::open(array('route' => 'about-store', 'method' => 'POST', 'files' => true)) }}
                    <div class="row">
                        <div class="col-12 text-center alert alert-info p-2">
                            برای تصویر خدمات از تصاویر png و برای درباره ما از jpg استفاده کنید
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                {{ Form::label('page', '* نوع فیلد') }}
                                <select name="page" class="form-control page_select">
                                    <option value="about">درباره ما</option>
                                    <option value="service">خدمات</option>
                                </select>
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
                                {{ Form::label('text', '* متن') }}
                                {{ Form::textarea('text',null, array('class' => 'form-control textarea','rows'=>4)) }}
                            </div>
                        </div>
                        <div class="col-sm-12 text-input d-none">
                            <div class="form-group">
                                {{ Form::label('text_input', 'متن صفحه داخلی(درصورت ورود متن صفحه داخلی نمایش دارد)') }}
                                {{ Form::textarea('text_input',null, array('class' => 'form-control textarea','rows'=>4)) }}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                {{ Form::label('pic', '* تصویر(png,jpg)') }}
                                {{ Form::file('pic', array('accept' => 'image/*')) }}
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