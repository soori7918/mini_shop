@component('layouts.back')
    @slot('title') ویرایش {{ $title }} {{ $item->title }} @endslot
    @slot('body')
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>
                    </div>

                    <h2>ویرایش {{ $title }} {{ $item->title }}</h2>
                </div>
            </div>
            <div class="card-body">
                {{ Form::model($item,array('route' => array('about-update', $item->id), 'method' => 'POST', 'files' => true)) }}
                <div class="row">
                    <div class="col-12 text-center alert alert-info p-2">
                        برای تصویر خدمات از تصاویر png و برای درباره ما از jpg استفاده کنید
                    </div>
{{--                    @if(!in_array($item->id,[2,3,4,13,14]))--}}
{{--                    <div class="col-sm-6">--}}
{{--                        <div class="form-group">--}}
{{--                            {{ Form::label('page', '* نوع فیلد') }}--}}
{{--                            <select name="page" class="form-control d-none">--}}
{{--                                <option value="about" {{$item->page=='about'?'selected':''}}>درباره ما</option>--}}
{{--                                <option value="service" {{$item->page=='service'?'selected':''}}>خدمات</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    @endif--}}
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('title', '* عنوان') }}
                            {{ Form::text('title',null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    @if($item->page=='video')
                        <div class="col-sm-12">
                            <div class="form-group">
                                {{ Form::label('text', '* لینک ویدئو') }}
                                {{ Form::text('text',null, array('class' => 'form-control video text-left','dir'=>'ltr','id' => 'video')) }}
                            </div>
                        </div>
                    @else
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::label('text', '* متن') }}
                            {{ Form::textarea('text',null, array('class' => 'form-control textarea','rows'=>4)) }}
                        </div>
                    </div>
                        <div class="col-sm-12 text-input @if($item->page!='service' && $item->page!='home') d-none @endif">
                            <div class="form-group">
                                {{ Form::label('text_input', 'متن صفحه داخلی(درصورت ورود متن صفحه داخلی نمایش دارد)') }}
                                {{ Form::textarea('text_input',null, array('class' => 'form-control textarea','rows'=>4)) }}
                            </div>
                        </div>
                    @endif
                    <div class="col-sm-6 @if(in_array($item->id,[2,4])) d-none @endif">
                        <div class="form-group">
                            {{ Form::label('pic', '* تصویر(png,jpg)') }}
                            {{ Form::file('pic', array('accept' => 'image/*')) }}
                        </div>
                        @if($item->pic)
                            <img src="{{url($item->pic)}}" style="height: 150px">
                        @endif
                    </div>
                </div>
                <a href="{{ URL::previous() }}" class="btn btn-rounded btn-outline-warning float-right"><i class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                {{ Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>ویرایش', array('type' => 'submit', 'class' => 'btn btn-outline-success float-left')) }}
                {{ Form::close() }}
            </div>
        </div>
    @endslot
    @push('stylesheets')
        <link rel="stylesheet" type="text/css" href="{{ url('assets/admin/css/selectize.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ url('assets/admin/css/bootstrap-select.min.css') }}"/>
        <style>
            .selectize-control.form-control
            {
                height: 100px;
            }
            .selectize-control.form-control>.selectize-input
            {
                overflow-y: auto!important;
            }
            .card-body > form {
                max-width: 100% !important;
            }
        </style>
    @endpush
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
            <script type="text/javascript" src="{{ url('assets/admin/js/selectize.min.js') }}"></script>
            <script type="text/javascript">
                $('#video').selectize({
                    plugins: {
                        remove_button: {
                            label: "×"
                        }
                    },
                    persist: false,
                    createOnBlur: true,
                    create: true
                });
            </script>
    @endpush
@endcomponent