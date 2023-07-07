@component('layouts.back')
    @slot('title') مدیریت {{ $title }} @endslot
    @slot('body')
        <style>
            .gallery-item{

            }
            .gallery-item img{
                border-radius: 5px;
                margin: 0 3px;
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
                <div class="row mb-3">
                    <div class="col-md-3">
                        <a href="?type=manager" class="form-control text-center">
                            پیام های مدیریت
                            <span class="badge badge-pill badge-light">{{$manager}}</span>
                            @if($unseenmanager>0)
                            <span class="badge badge-pill badge-warning">{{$unseenmanager}}</span>
                            @endif
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="?type=admin" class="form-control text-center">
                            پیام های ادمین
                            <span class="badge badge-pill badge-light">{{$admin}}</span>
                            @if($unseenadmin>0)
                            <span class="badge badge-pill badge-warning">{{$unseenadmin}}</span>
                            @endif
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="?type=refers" class="form-control text-center">
                            ارجاعات
                            <span class="badge badge-pill badge-light">{{$refers}}</span>
                            @if($unseenrefers>0)
                            <span class="badge badge-pill badge-warning">{{$unseenrefers}}</span>
                            @endif
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="?type=org" class="form-control text-center">
                            اطلاعیه سازمان
                            <span class="badge badge-pill badge-light">{{$org}}</span>
                            @if($unseenorg>0)
                            <span class="badge badge-pill badge-warning">{{$unseenorg}}</span>
                            @endif
                        </a>
                    </div>
                </div>
                <div class="">
                        <table id="dataTable" class="archive-table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>توضیحات</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>
                                        {{ $item->id }}
                                    </td>
                                    <td>
                                        {{ $item->message }}
                                    </td>
                                    <td>
                                        {{ $item->seen==0?'دیده نشده':'دیده شده' }}
                                    </td>
                                    <td width="140">
                                        <div class="{{isMobile()?'d-block':'btn-inline'}}">
                                            <a href="{{route('notification-show',$item->id)}}" class="btn btn-info">مشاهده پیام</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    @endslot
    @push('scripts')
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable( {
                    pageLength: 10,
                    columnDefs: [ {
                        targets: [ 0 ],
                        orderData: [ 0 ]
                    } ]
                } );
            } );
        </script>
    @endpush
@endcomponent
