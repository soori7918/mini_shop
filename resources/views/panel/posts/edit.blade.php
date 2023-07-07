@component('layouts.back')
    @slot('title') ویرایش {{ $title }} {{ $post->title }} @endslot
    @slot('body')
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>                    </div>
                    <h2>ویرایش {{ $title }} {{ $post->title }}</h2>
                </div>
            </div>
            <div class="card-body">
                {{ Form::model($post, array('route' => array('post-update', $post->id), 'method' => 'PATCH', 'files' => true, 'style' => 'width:100%!important;min-width:100%!important')) }}
                {{ Form::hidden('author_id', Auth::user()->id) }}
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {{ Form::label('name', 'دسته بندی') }}
                            {{ Form::select('category_id', array_pluck($categories, 'name', 'id'), null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            {{ Form::label('title', 'عنوان نوشته') }}
                            {{ Form::text('title', null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            {{ Form::label('slug', 'نامک') }}
                            {{ Form::text('slug', null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('status', 'وضعیت') }}
                            {{ Form::select('status', array('published' => 'انتشار', 'draft' => 'پیش نویس', 'pending' => 'در انتظار تایید'), null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('page_title', 'عنوان صفحه') }}
                            {{ Form::text('page_title', null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('keywords', 'کلمات کلیدی') }}
                            {{ Form::text('keywords', null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('description', 'توضیحات سئو') }}
                            {{ Form::text('description', null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::textarea('body', null, array('id' => 'body', 'class' => 'form-control textarea')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('name', 'تصویر شاخص 410 * 650 ') }}
                    {{ Form::file('photo', array('accept' => 'image/*')) }}
                </div>
{{--                <div class="form-group">--}}
{{--                    {{ Form::label('name', 'تصویر اسلایدر  1350 * 450') }}--}}
{{--                    {{ Form::file('slider', array('accept' => 'image/*')) }}--}}
{{--                </div>--}}
                <br/>
                <a href="{{ URL::previous() }}" class="btn btn-rounded btn-secondary float-right"><i class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                {{ Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>ویرایش', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left')) }}
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