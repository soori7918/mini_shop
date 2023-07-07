@component('layouts.back')
    @slot('title') مدیریت {{ $title }} @endslot
    @slot('body')
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>
                    </div>
                    <h4>
                        لیست گزارش ارجاع
                    </h4>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <style>
                        #dataTable_wrapper .col-md-6{
                            padding: 0 10px;
                        }
                    </style>
                    <table id="dataTable" class="archive-table table">
                        <thead>
                        <tr>
                            <th>نام مشتری</th>
                            <th>کارشناس معرف</th>
                            <th>کارشناس ارجاع</th>
                            <th>تاریخ ثبت مشتری</th>
                            <th>تاریخ ثبت ارزیابی</th>
                            <th>تاریخ ثبت ارجاع</th>
                            <th>تعداد بازدید تا امروز</th>
                            <th>تعداد ارجاع کارشناس</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                <td>
                                    @if(!auth()->user()->hasRole('مدیر ملک'))
                                        @if($user->questionnaire->user)
                                            @if($user->user)
                                            {{ $user->user->first_name .' ' . $user->user->last_name }}
                                            @endif
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    {{$user->refer?$user->refer->first_name.' '.$user->refer->last_name:''}}
                                </td>
                                <td>{{$user->created_at}}</td>
                                <td>{{$user->questionnaire->created_at}}</td>
                                <td>{{$user->referred_at}}</td>
                                <td>0</td>
                                <td>{{$user->referred_count}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="paginate p-3">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    @endslot
    @push('scripts')
        <script>
            getPriceType($('.priceTypePicker1').find(":selected").text());
            getPriceType($('.priceTypePicker2').find(":selected").text());
            getPriceType($('.priceTypePicker3').find(":selected").text());
            $('.priceTypePicker').change(function () {
                let selected=$(this).find(":selected").text();
                console.log(selected);
                getPriceType(selected);
            })
            function getPriceType(selected){
                $('.price_type').html(selected);
            }

            relatedFunc($("input[name='rent_by']:checked").val());
            $("input[name='rent_by']").click(function() {
                var radioValue = $("input[name='rent_by']:checked").val();
                relatedFunc(radioValue)
            });
            function relatedFunc(radioValue){
                if(radioValue=='estate'){
                    $('.estate_container').removeClass('d-none');
                    $('.card_file').removeClass('d-none');
                    $('.experts_friends_container').addClass('d-none');

                    $('#estate_name').attr('required',true);
                    $('#estate_telephone').attr('required',true);
                    $('#expert2_id').attr('required',false);

                }else if(radioValue=='experts_friend'){
                    $('.experts_friends_container').removeClass('d-none');
                    $('.estate_container').addClass('d-none');
                    $('.card_file').addClass('d-none');

                    $('#estate_name').attr('required',false);
                    $('#estate_telephone').attr('required',false);
                    $('#expert2_id').attr('required',true);

                }else{
                    $('.estate_container').addClass('d-none');
                    $('.experts_friends_container').addClass('d-none');
                    $('.card_file').addClass('d-none');

                    $('#estate_name').attr('required',false);
                    $('#estate_telephone').attr('required',false);
                    $('#expert2_id').attr('required',false);
                }
            }
        </script>
        <script>
            $('.report').click(function () {
                $('#report_user_id').val($(this).attr('data-userId'))
                $('#refer_report').html($(this).attr('data-report'))
            })
        </script>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable( {
                    pageLength: 25,
                    columnDefs: [ {
                        targets: [ 0 ],
                        orderData: [ 0 ]
                    } ],
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                } );
            } );
        </script>
    @endpush
@endcomponent
