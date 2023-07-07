@component('layouts.back')
    @slot('title') مدیریت {{ $title }} @endslot
    @slot('body')
        <style>
            .popover-header
            {
                background-color: #000000;
                color: #fff;
                text-align: center;
            }
            .popover_125
            {
                cursor: pointer;
            }
            .popover-body
            {
                text-align: justify;
                text-align-last: center;
                max-height: 200px;
                overflow-y: auto;
            }
            .bg_def
            {
                background: rgba(255,123,123,0.30);
            }
        </style>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>
                    </div>

                    <h2>لیست {{ $title }}</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="archive-table" style="min-width: 2000px">
                        <tr>
                            <th>نام/سن</th>
                            <th>ایمیل</th>
                            <th>شماره تماس</th>
                            <th>شهر</th>
                            <th>تحصیلات</th>
                            <th>ورود به ترکیه؟</th>
                            <th>تعداد همراه</th>
                            <th>زمان مهاجرت</th>
                            <th>شناخت ازمیر</th>
                            <th>هدف</th>
                            <th>شروع سرمایه گذاری</th>
                            <th>متن پیام</th>
                        </tr>
                        @foreach ($contacts as $contact)
                            <tr>
                                <td class="{{$contact->new==0?'bg_def':''}}">{{ $contact->name }}/{{$contact->age}}</td>
                                <td class="{{$contact->new==0?'bg_def':''}}">{{ $contact->email }}</td>
                                <td class="{{$contact->new==0?'bg_def':''}}">{{ $contact->phone }}</td>
                                <td class="{{$contact->new==0?'bg_def':''}}">{{ $contact->city }}</td>
                                <td class="{{$contact->new==0?'bg_def':''}}">{{ $contact->education }}</td>
                                <td class="{{$contact->new==0?'bg_def':''}}">{{ $contact->login_tr }}</td>
                                <td class="{{$contact->new==0?'bg_def':''}}">{{ $contact->along_count }}</td>
                                <td class="{{$contact->new==0?'bg_def':''}}">{{ $contact->time_tr }}</td>
                                <td class="{{$contact->new==0?'bg_def':''}}">{{ $contact->know_izmir }}</td>
                                <td class="{{$contact->new==0?'bg_def':''}}">{{ $contact->target_tr }}</td>
                                <td class="{{$contact->new==0?'bg_def':''}}">{{ $contact->start_price }}</td>

                                <td class="{{$contact->new==0?'bg_def':''}}"><a data-toggle="popover" class="popover_125" title="متن پیام" data-content="{{ $contact->message }}">متن
                                        پیام</a></td>
                                <td width="140" class="{{$contact->new==0?'bg_def':''}}">
                                    <div class="btn-inline">
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['contacts-destroy', $contact->id] ]) !!}
                                        {!! Form::button('<i class="fa fa-ban ml-1"></i>حذف', ['type' => 'submit', 'class' => 'btn btn-danger float-left', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                            <?php
                            $contact->new=1;$contact->update();
                            ?>
                        @endforeach
                    </table>
                </div>
                <div class="paginate p-3">
                    {{ $contacts->links() }}
                </div>
            </div>
        </div>
    @endslot
    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function () {
                $('[data-toggle="popover"]').popover();
            });
        </script>
    @endpush
@endcomponent