@component('layouts.back')
    @slot('title') افزودن {{ $title }} @endslot
    @slot('body')
        <div class="card text-center" dir="rtl">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        {{--                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>                    </div>--}}
                        <h2>افزودن {{ $title }}</h2>
                    </div>
                </div>
                <div class="card-body">
                    <div class="post">
                        <form action="{{route('menu-update',$menu->id)}}"  method="POST">
                            @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('title', 'عنوان') }}
                                    {{ Form::text('title', $menu->title, array('class' => 'form-control','id'=>'title')) }}

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('slug', 'اسلاگ') }}
                                    {{ Form::text('slug',  $menu->slug, array('class' => 'form-control','id'=>'slug')) }}

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('parent_id', 'منو والد') }}
                                    <select class="form-control" name="parent_id">
                                        <option value="">انتخاب کنید</option>
                                        @foreach($menus as $menu)
                                            <option value="{{$menu->id}}">{{$menu->title}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('url', 'آدرس') }}
                                    {{ Form::text('url',  $menu->url, array('class' => 'form-control')) }}

                                </div>
                            </div>
                            {{--                        <div class="col-md-6" hidden>--}}
                            {{--                            <div class="form-group">--}}
                            {{--                                {{ Form::label('type', 'نمایش') }}--}}
                            {{--                                <select name="type" class="form-control">--}}
                            {{--                                    <option value="1">موبایل</option>--}}
                            {{--                                    <option value="2" selected>دکستاپ</option>--}}
                            {{--                                </select>--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}
                            {{--                        <div class="col-md-6" style="margin-top: 10px;">--}}
                            {{--                            <div class="form-group">--}}
                            {{--                                {{ Form::label('photo', 'تصویر') }}--}}
                            {{--                                {{ Form::file('photo', array('accept' => '*/*')) }}--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}
                        </div>
                        <br/>
                        <a href="{{ URL::previous() }}" class="btn btn-rounded btn-secondary float-right"><i class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                            <button type="submit" class="btn btn-rounded btn-primary float-left"><i class="fa fa-circle-o mtp-1 ml-1"></i>افزودن</button>
                        </form>
                    </div>
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
                    $('.textarea').ckeditor(textareaOptions)
                    slug('#title', '#slug');
                    console.log(slug('#title', '#slug'))
                    $('.click-to-add-description').on('click', function () {
                        var number = rollDice();
                        otherAdd(number);
                    });

                    function otherAdd(number) {
                        $('.some_description').append('<div class="parent-description"><a href="javascript:void(0)" class="close-tab"><i class="fa fa-close"></i></a><div class="form-group"><label for="some_title[]">عنوان</label> <input placeholder="عنوان" class="form-control" required name="some_title[]" type="text" id="some_title[]"></div><div class="form-group"><textarea class="form-control textarea" required name="some_description[]" cols="50" rows="10"></textarea></div></div>');
                        $('.close-tab').click(function () {
                            $(this).parent().remove()
                        });
                        $('.textarea').ckeditor(textareaOptions);
                    }

                    function rollDice() {
                        return (Math.floor(Math.random() * 6) + 1);
                    }
                </script>
        @endpush
        @endcomponent