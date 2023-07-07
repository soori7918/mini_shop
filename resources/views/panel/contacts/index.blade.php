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
                    <table class="archive-table">
                        @foreach ($contacts as $contact)
                            <tr>
                                <td class="">{{ $contact->name }}</td>
                                <td class="">{{ $contact->email }}</td>
                                <td class="">{{ $contact->phone }}</td>

                                <td class=""><a data-toggle="popover" class="popover_125" title="متن پیام" data-content="{{ $contact->message }}">متن
                                        پیام</a></td>
                                <td width="140" class="">
                                    <div class="btn-inline">
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['contacts-destroy', $contact->id] ]) !!}
                                        {!! Form::button('<i class="fa fa-ban ml-1"></i>حذف', ['type' => 'submit', 'class' => 'btn btn-danger float-left', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                            <?php
                            $contact->update();
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