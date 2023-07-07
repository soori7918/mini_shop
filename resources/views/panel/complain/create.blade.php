@component('layouts.back')
    @slot('title') افزودن {{ $title }} @endslot
    @slot('body')
        <div class="card" dir="rtl">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>
                        <h2>افزودن {{ $title }}</h2>
                    </div>
                </div>
                <div class="card-body">
                    {{ Form::open(array('route' => 'complain-store', 'method' => 'PUT', 'files' => true, 'style' => 'width:100%!important;min-width:100%!important')) }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::label('title', 'موضوع شکایت') }}
                                {{ Form::text('title', '', array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('for_id', 'طرف شکایت؟ ', array('style' => 'font-size: 10px')) }}
                                <select class="form-control select2" name="for_id">
                                    <option value="">انتخاب کنید</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">
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
                                {{ Form::date('date', '', array('class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
{{--                        <div class="col-md-12">--}}
{{--                            {{ Form::label('text_short', 'خلاصه توضیحات') }}--}}
{{--                            <div class="form-group">--}}
{{--                                {{ Form::textarea('text_short', '', array('class' => 'form-control')) }}--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="col-md-12">
                            {{ Form::label('text', 'توضیحات کامل') }}
                            <div class="form-group">
                                {{ Form::textarea('text', '', array('id' => 'body', 'class' => 'form-control textarea')) }}
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
                <script type="text/javascript" src="{{ url('assets/admin/js/bootstrap-datepicker.min.js') }}"></script>
                <script type="text/javascript" src="{{ url('assets/admin/js/bootstrap-datepicker-fa.min.js') }}"></script>
                <script type="text/javascript" src="{{ url('assets/admin/js/bootstrap-select.min.js') }}"></script>
                <script type="text/javascript" src="{{ url('assets/admin/js/bootstrap-select-fa_IR.min.js') }}"></script>
                <script type="text/javascript" src="{{ url('assets/admin/js/select2.min.js') }}"></script>
                <script src="{{ url('assets/admin/js/jquery.mask.min.js') }}"></script>
                <script>
                    $('#mobile').mask('(000) 000 0000');

                    var date = new Date();
                    var day = ("0" + date.getDate()).slice(-2);
                    var month = ("0" + (date.getMonth() + 1)).slice(-2);
                    var today = date.getFullYear() + "-" + (month) + "-" + (day);
                    $('.date').val(today);

                </script>
                <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxfZQk73sogROY9KKRmtPIsLSFSjX7o7w&libraries=places&callback=initialize"></script>
                <script type="text/javascript">
                    $('.date-picker').each(function () {
                        $(this).datepicker({
                            dateFormat: "yy-mm-dd"
                        });
                    });
                    $('.select2').each(function () {
                        $(this).select2();
                    });
                    living_country($('#living_country'));
                    $('#living_country').change(function () {
                        living_country($(this));
                    })

                    function living_country(el) {
                        let val = el.val();
                        if (val == 'iran') {
                            $('.bill').show();
                            $('.kimlik').hide();
                        } else {
                            $('.bill').show();
                            $('.kimlik').show();
                        }
                    }

                </script>
        @endpush
        @endcomponent