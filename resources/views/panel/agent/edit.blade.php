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
                    {{ Form::model($item, array('route' => array('agent.update', $item->id), 'method' => 'PATCH', 'files' => true, 'style' => 'width:100%!important;min-width:100%!important')) }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('name', 'عنوان ') }}
                                {{ Form::text('name', $item->name, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('slug', 'نامک') }}
                                {{ Form::text('slug',  $item->slug, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('address', 'آدرس') }}
                                {{ Form::text('address',  $item->address, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('phone', 'شماره تماس') }}
                                {{ Form::text('phone',  $item->phone, array('class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {{ Form::label('description', 'توضیحات کامل') }}
                            <div class="form-group">
                                {{ Form::textarea('description',  $item->description, array('id' => 'body', 'class' => 'form-control textarea')) }}
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
                                {{ Form::label('status', 'وضعیت') }}
                                {{ Form::select('status', array('active' => 'انتشار', 'pending' => 'پیش نویس'), '', array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::label('keywords', 'کلمات کلیدی') }}
                                {{ Form::text('keywords', $item->keyword, array('class' => 'form-control')) }}
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