@component('layouts.back')
    @slot('title') افزودن {{ $title }} @endslot
    @slot('body')
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>                      <h2>افزودن {{ $title }}</h2>
                    </div>
                </div>
                <div class="card-body">
                    {{ Form::model($item, array('route' => array('project-category-update', $item->id), 'method' => 'POST', 'files' => true, 'style' => 'width:100%!important;min-width:100%!important')) }}
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                {{ Form::label('parent_id', 'دسته بندی') }}
                                <select class="form-control" name="parent_id">
                                    <option>انتخاب کنید</option>
                                    @foreach($items as $item)
                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                {{ Form::label('title', 'عنوان دسته بندی') }}
                                {{ Form::text('title', $item->title, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                {{ Form::label('name', 'نام') }}
                                {{ Form::text('name', $item->name, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                {{ Form::label('slug', 'نامک') }}
                                {{ Form::text('slug', $item->slug, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                {{ Form::label('url', 'ادرس') }}
                                {{ Form::text('url', $item->url, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>انتخاب نوع آیکن</label>
                                <br/>
                                <label>
                                    <input class="icon_type"  type="radio" name="type" {{$item->type == "icon" ? 'checked' : ''}}  value="icon" /> آیکن
                                </label>
                                <label>
                                    <input class="icon_type"  type="radio" name="type" {{$item->type == "image" ? 'checked' : ''}}  value="image" /> تصویر
                                </label>
                            </div>
                        </div>
                        <div class="col-6  {{$item->type == "icon" ? 'd-block' : 'd-none'}} icon">
                            <div class="form-group">
                                {{ Form::label('icon', 'ایکن') }}
                                {{ Form::text('icon', $item->icon, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-6 {{$item->type == "image" ? 'd-block' : 'd-none'}} image">
                            <div class="form-group">
                                {{ Form::label('photo', 'تصویر آیکن  ') }}
                                {{ Form::file('photo', array('accept' => 'image/*')) }}
                                <img src="{{ $item->image ? url($item->image ): ''}}" alt="no-pic" width="150px" height="150px">
                            </div>
                        </div>
                    </div>

                    <h2 class="py-3">توضیحات سئو</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('title_seo', 'عنوان') }}
                                {{ Form::text('title_seo', $item->metas ? $item->metas->title : '', array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('url_seo', 'آدرس') }}
                                {{ Form::text('url_seo',  $item->metas ? $item->metas->url :  '', array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('h1_seo', 'h1') }}
                                {{ Form::text('h1_seo', $item->metas ? $item->metas->h1 :  '', array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('keyword_seo', 'کلمات کلیدی') }}
                                {{ Form::text('keyword_seo', $item->metas ? $item->metas->key_word :  '', array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('schima', 'اسکیما') }}
                                {{ Form::text('schima',$item->metas ? $item->metas->schima :  '', array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::label('description_seo', 'توضیحات مختصر') }}
                                {{ Form::textarea('description_seo', $item->metas ? $item->metas->description :  '', array('class' => 'form-control','rows'=>3)) }}
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
                <script>
                    $('.icon_type').on('change',function(){
                        let val = $(this).val();
                        if(val== "icon"){
                            $('.icon').removeClass('d-none')
                            $('.image').addClass('d-none')
                        }else{
                            $('.image').removeClass('d-none')
                            $('.icon').addClass('d-none')

                        }
                    })
                </script>
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