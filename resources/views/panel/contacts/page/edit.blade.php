@component('layouts.back')
    @slot('title') ویرایش {{ $title }} {{ $item->title }} @endslot
    @slot('body')
        <style>
            .d-ltr{
                direction: ltr!important;
            }
            label{
                direction: rtl!important;
            }
        </style>
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
                {{ Form::model($item,array('route' => array('contact-info-update', $item->id), 'method' => 'POST', 'files' => true)) }}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('title', '* عنوان صفحه') }}
                            {{ Form::text('title',null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group" dir="ltr"  style="margin-bottom: 50px;text-align: left">
                            <label style="width: 100%;text-align: right;">* شماره تماس دفتر(982188884444)</label>
                            {{ Form::text('phone', null, array('placeholder' => '982188884444، 982188883333', 'id' => 'phone', 'class' => 'form-control phone')) }}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group" dir="ltr"  style="margin-bottom: 50px;text-align: left">
                            <label style="width: 100%;text-align: right">شماره تماس هدر سایت(989121113333)</label>
                            {{ Form::text('phone_header', null, array('placeholder' => '989121113333',  'class' => 'form-control text-left d-ltr')) }}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group" dir="ltr"  style="margin-bottom: 50px;text-align: left">
                            <label style="width: 100%;text-align: right">شماره تماس آی کال (989121113333)</label>
                            {{ Form::text('phone_icall', null, array('placeholder' => '989121113333',  'class' => 'form-control text-left d-ltr')) }}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group" dir="ltr"  style="margin-bottom: 50px;text-align: left">
                            <label style="width: 100%;text-align: right">شماره تماس واتساپ(989121113333)</label>
                            {{ Form::text('whatsapp', null, array('placeholder' => '989121113333، 989121112222', 'id' => 'whatsapp', 'class' => 'form-control whatsapp')) }}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group" dir="ltr"  style="margin-bottom: 50px;text-align: left">
                            <label style="width: 100%;text-align: right">شماره تماس واتساپ گوشه سایت(989121113333)</label>
                            {{ Form::text('phone_whatsapp', null, array('placeholder' => '989121113333',  'class' => 'form-control text-left d-ltr')) }}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group" dir="ltr"  style="margin-bottom: 50px;text-align: left">
                            <label style="width: 100%;text-align: right">شماره همراه(989121113333)</label>
                            {{ Form::text('mobile', null, array('placeholder' => '989121113333، 989121112222', 'id' => 'mobile', 'class' => 'form-control mobile')) }}
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::label('address', '* آدرس') }}
                            {{ Form::text('address',null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group" dir="ltr"  style="margin-bottom: 50px;text-align: left">
                            <label style="width: 100%;text-align: right">ایمیل(test@mail.com)</label>
                            {{ Form::text('email', null, array('placeholder' => 'test1@mail.com، test2@mail.com', 'id' => 'email', 'class' => 'form-control email')) }}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group" dir="ltr"  style="margin-bottom: 50px;text-align: left">
                            <label style="width: 100%;text-align: right">ایمیل هدر سایت(test@mail.com)</label>
                            {{ Form::text('email_header', null, array('placeholder' => 'test@mail.com',  'class' => 'form-control text-left d-ltr')) }}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::label('facebook', 'فیسبوک') }}
                            {{ Form::text('facebook',null, array('class' => 'form-control text-left d-ltr')) }}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::label('twitter', 'توئیتر') }}
                            {{ Form::text('twitter',null, array('class' => 'form-control text-left d-ltr')) }}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::label('instagram', 'اینستاگرام') }}
                            {{ Form::text('instagram',null, array('class' => 'form-control text-left d-ltr')) }}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::label('telegram', 'تلگرام') }}
                            {{ Form::text('telegram',null, array('class' => 'form-control text-left d-ltr')) }}
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::label('linkedin', 'لینکدین') }}
                            {{ Form::text('linkedin',null, array('class' => 'form-control text-left d-ltr')) }}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::label('pinterest', 'pinterest') }}
                            {{ Form::text('pinterest',null, array('class' => 'form-control text-left d-ltr')) }}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::label('youtube', 'یوتیوب') }}
                            {{ Form::text('youtube',null, array('class' => 'form-control text-left d-ltr')) }}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::label('aparat', 'آپارات') }}
                            {{ Form::text('aparat',null, array('class' => 'form-control text-left d-ltr')) }}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::label('iframe', 'آیفریم(نقشه)') }}
                            {{ Form::textarea('iframe',null, array('class' => 'form-control text-left d-ltr','rows'=>'3')) }}
                        </div>
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
            .card-body > form {
                max-width: 100% !important;
            }
        </style>
    @endpush
    @push('scripts')
        <script type="text/javascript" src="{{ url('assets/admin/js/selectize.min.js') }}"></script>
        <script type="text/javascript">
            $('#phone').selectize({
                plugins: {
                    remove_button: {
                        label: "×"
                    }
                },
                persist: false,
                createOnBlur: true,
                create: true
            });
            $('#whatsapp').selectize({
                plugins: {
                    remove_button: {
                        label: "×"
                    }
                },
                persist: false,
                createOnBlur: true,
                create: true
            });
            $('#mobile').selectize({
                plugins: {
                    remove_button: {
                        label: "×"
                    }
                },
                persist: false,
                createOnBlur: true,
                create: true
            });
            $('#email').selectize({
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