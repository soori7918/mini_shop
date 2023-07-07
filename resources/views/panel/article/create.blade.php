@component('layouts.back')
    @slot('title') افزودن {{ $title }} @endslot
    @slot('body')
        <div class="card" dir="rtl">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>                      <h2>افزودن {{ $title }}</h2>
                </div>
            </div>
            <div class="card-body">
                {{ Form::open(array('route' => 'article-store', 'method' => 'PUT', 'files' => true, 'style' => 'width:100%!important;min-width:100%!important')) }}
                {{ Form::hidden('type', $type) }}
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            {{ Form::label('category_id', 'دسته بندی') }}
                            {{ Form::select('category_id', [''=>'بدون دسته بندی',array_pluck($categories, 'name', 'id')], '', array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('title', 'عنوان ') }}
                            {{ Form::text('title', '', array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('slug', 'نامک') }}
                            {{ Form::text('slug', '', array('class' => 'form-control')) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {{ Form::label('text_short', 'خلاصه توضیحات') }}
                        <div class="form-group">
                            {{ Form::textarea('text_short', '', array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-md-12">
                        {{ Form::label('text', 'توضیحات کامل') }}
                        <div class="form-group">
                            {{ Form::textarea('text', '', array('id' => 'body', 'class' => 'form-control textarea')) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('photo', 'تصویر شاخص  410 * 650') }}
                            {{ Form::file('photo', array('accept' => 'image/*')) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            @if($type=='radio_vandidad')
                                {{ Form::label('file', 'فایل mp3') }}
                                {{ Form::file('file', array('accept' => '.mp3')) }}
                                @else
                            {{ Form::label('file', 'فایل pdf') }}
                            {{ Form::file('file', array('accept' => '.pdf')) }}
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('status', 'وضعیت') }}
                            {{ Form::select('status', array('1' => 'انتشار', '0' => 'پیش نویس'), '', array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('author', 'نویسنده') }}
                            {{ Form::text('author', auth()->user()->first_name, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('page_title', 'عنوان صفحه') }}
                            {{ Form::text('page_title', '', array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('keywords', 'کلمات کلیدی') }}
                            {{ Form::text('keywords', '', array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('description', 'توضیحات سئو') }}
                            {{ Form::text('description', '', array('class' => 'form-control')) }}
                        </div>
                    </div>
                </div>




                <br/>
                <a href="{{ URL::previous() }}" class="btn btn-rounded btn-secondary float-right"><i
                            class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
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