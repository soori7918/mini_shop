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
                        {{$title}}
                    </h4>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{route('user-search')}}" method="post" style="width: 95%;">
                        <div class="row">
                            <div class="col-md-6 col-sm-6" style="padding-left: 0;">
                                <input type="text" name="search" class="form-control" placeholder="جستجو...">
                            </div>
                            <div class="col-md-6 col-sm-6" style="padding-right: 0;">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        {{csrf_field()}}
                    </form>
                    <style>
                        #dataTable_wrapper .col-md-6{
                            padding: 0 10px;
                        }
                    </style>
                    <table id="dataTable" class="archive-table table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>کارشناس</th>
                            <th>مبلغ کمیسیون</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>
                                @if($item->expert)
                                    {{ $item->expert->first_name }} {{ $item->expert->last_name }}
                                @endif
                            </td>
                            <td>{{ $item->price??'وارد نشده' }} {{ $item->price_type }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('contract-customers',$item->expert_id)}}" class="btn btn-warning float-left mr-1">
                                        <i class="fa fa-users ml-1"></i>مشتریان
                                    </a>
                                    @if(!request()->type=='canceled')
                                        <a href="{{route('contract-show',$item->id)}}" class="btn btn-info float-left mr-1">
                                            <i class="fa fa-check ml-1"></i>جزئیات
                                        </a>
                                    @endif
                                    {{--                                        <a href="javascript:void(0)" data-target="#confirmModal" onclick="$('#user_id').val('{{$item->id}}')" data-toggle="modal" class="btn btn-info float-left mr-1">--}}
                                    {{--                                            <i class="fa fa-check ml-1"></i>تایید--}}
                                    {{--                                        </a>--}}
                                    {{--                                        <a href="javascript:void(0)" data-target="#denyModal" onclick="$('#deny_user_id').val('{{$item->id}}')" data-toggle="modal" class="btn btn-danger float-left mr-1">--}}
                                    {{--                                            <i class="fa fa-ban ml-1"></i>کنسل--}}
                                    {{--                                        </a>--}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="paginate p-3">
                    {{ $items->links() }}
                </div>
            </div>
        </div>
    @endslot
    @push('scripts')
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
                    order: [[ 0, "desc" ]],
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
