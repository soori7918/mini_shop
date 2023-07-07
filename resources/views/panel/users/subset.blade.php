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
                        {{$title??''}}
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
                            <th>نام</th>
                            @if(auth()->user()->hasRole('call center') || auth()->user()->hasRole('call center(sales)'))
                                <th>معرف</th>
                            @endif
                            <th>شغل</th>
                            <th>تاریخ اعلام</th>
                            <th>تاریخ ثبت نام</th>
                            <th>ملک های معرفی شده</th>
                            <th>مشتریان معرفی شده</th>
                            <th>قراردادهای موفق</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->first_name }} {{ $user->last_name }}
                                    @if($user->account_status == 'active')
                                        <span class="badge badge-success">فعال</span>
                                    @elseif($user->account_status == 'pending')
                                        <span class="badge badge-warning">در انتظار تایید</span>
                                    @elseif($user->account_status == 'blocked')
                                        <span class="badge badge-secondary">مسدود شده</span>
                                    @endif

                                    @if($user->user)
                                        <span class="badge badge-warning">نام کارشناس معرف : {{ $user->user->first_name .' ' . $user->user->last_name }}</span>
                                    @endif
                                </td>
                                @if(auth()->user()->hasRole('call center') || auth()->user()->hasRole('call center(sales)'))
                                    <td>{{ $user->user?$user->first_name.' '.$user->last_name:'بدون معرف' }}</td>
                                @endif
                                <td>{{ $user->job }}</td>
                                <td>{{ $user->date }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{\App\Villa::where('user_id',$user->id)->count()}}</td>
                                <td>{{\App\User::where('user_id',$user->id)->count()}}</td>
                                <td>{{\App\Contract::where('expert_id',$user->id)->count()}}</td>
                                <td>
                                    <a href="javascript:void(0)" data-target="#descModal" onclick="$('#user_id').val('{{$user->id}}');$('#reagent_description').html('{{$user->reagent_description}}');$('#username').html('{{$user->first_name.' '.$user->last_name}}')" data-toggle="modal" class="btn btn-primary float-left mr-1">
                                        توضیحات من
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal" id="descModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{route('user-reagent-description-store')}}" method="post">
                            @csrf
                            <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">توضیحات معرف در مورد
                                    <span id="username"></span>
                                    </h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <input id="user_id" type="hidden" name="user_id" value="">
                                    <textarea name="reagent_description" class="form-control" id="reagent_description" cols="30" rows="10" placeholder="توضیحات"></textarea>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">ثبت</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
{{--                <div class="paginate p-3">--}}
{{--                    {{ $users->links() }}--}}
{{--                </div>--}}
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
