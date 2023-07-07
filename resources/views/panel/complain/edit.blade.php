@component('layouts.back')
    @slot('title') ویرایش {{ $title }} {{ $post->title }} @endslot
    @slot('body')
        <div class="card archive-card-header"  dir="rtl">
            <div class="card-header ">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>                    </div>
                    <h2>ویرایش {{ $title }} {{ $post->title }}</h2>
                </div>
            </div>
            <div class="card-body">
                {{ Form::model($post, array('route' => array('complain-update', $post->id), 'method' => 'PATCH', 'files' => true, 'style' => 'width:100%!important;min-width:100%!important')) }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('title', 'موضوع شکایت') }}
                            {{ Form::text('title', null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('for_id', 'طرف شکایت؟ ', array('style' => 'font-size: 10px')) }}
                            <select class="form-control select2" name="for_id">
                                <option value="">انتخاب کنید</option>
                                @foreach($users as $user)
                                    <option {{$post->for_id==$user->id?'selected':''}} value="{{$user->id}}">
                                        {{$user->first_name.' '.$user->last_name}}
                                    </option>
                                @endforeach
                            </select>

                            {{--                                {{ Form::select('for_id[]', array_pluck($users, 'first_name', 'id'), null, array('class' => 'form-control selectpicker', 'multiple')) }}--}}
                        </div>
                    </div>

                    <div class="col-md-6 ">
                        <div class="form-group">
                            {{ Form::label('date', 'در تاریخ') }}
                            {{ Form::date('date', null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                </div>
                <div class="row">
{{--                    <div class="col-md-12">--}}
{{--                        {{ Form::label('text_short', 'خلاصه توضیحات') }}--}}
{{--                        <div class="form-group">--}}
{{--                            {{ Form::textarea('text_short', null, array('class' => 'form-control')) }}--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="col-md-12">
                        {{ Form::label('text', 'توضیحات کامل') }}
                        <div class="form-group">
                            {{ Form::textarea('text', null, array('id' => 'body', 'class' => 'form-control textarea')) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('file', 'فایل') }}
                            {{ Form::file('file', array('accept' => '*')) }}
                        </div>
                    </div>
                </div>
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