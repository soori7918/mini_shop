@component('layouts.back')
    @slot('title') مدیریت {{ $title }} @endslot
    @slot('body')
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>
                    </div>
                    <h2>لیست {{ $title }}</h2>
                    <h4 class="mt-3 text-white">{{count($users)}} نفر</h4>
                </div>
            </div>
            <div class="col-md-12">
                @include('panel.users.reportForm')
            </div>


            @isset($subsets)
            <div class="col-md-12 mt-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card text-center pt-3">
                            <i class="fa fa-3x fa-users"></i>
                            <div class="card-body text-center">
                                <h4 class="card-title">تعداد زیر مجوعه ها</h4>
                                <p class="card-text">{{number_format($subsets)}} نفر</p>
                                <a href="{{route('subsetsByUserId-list',$request->user_id)}}" class="btn btn-primary">مشاهده جزئیات</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card text-center pt-3">
                            <i class="fa fa-3x fa-users"></i>
                            <div class="card-body text-center">
                                <h4 class="card-title">تعداد مشتریان</h4>
                                <p class="card-text">{{number_format($customers)}} نفر</p>
                                <a href="{{route('customersByUserId-list',$request->user_id)}}" class="btn btn-primary">مشاهده جزئیات</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card text-center pt-3">
                            <i class="fa fa-3x fa-users"></i>
                            <div class="card-body text-center">
                                <h4 class="card-title">تعداد ویلاهای ثبت شده</h4>
                                <p class="card-text">{{number_format($villas)}} عدد</p>
                                <a href="{{route('villa-list-indexByUserId',$request->user_id)}}" class="btn btn-primary">مشاهده جزئیات</a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            @endisset

            @isset($users)
                <div class="card-body">
                    <div class="">
                    <table id="dataTable" class="archive-table">
                        <thead>
                        <tr>

                            <th>ID</th>
                            <th>کاربر</th>
                            <th>تعداد زیر مجوعه ها</th>
                            <th></th>
                            <th>تعداد مشتریان</th>
                            <th></th>
                            <th>تعداد ملک ثبت شده</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            @php
                                $from=request()->from??'0000-00-00 00:00:00';
                                $to=request()->to??Carbon\Carbon::now();

                                $subsets=\App\User::whereBetween('created_at', [$from, $to])->where('user_id',$user->id)->count();
                                $villas=\App\Villa::whereBetween('created_at', [$from, $to])->where('user_id',$user->id)->count();
                                $customers = \App\User::whereBetween('created_at', [$from, $to])->doesntHave('roles')->where("user_id", $user->id)->count();
                            @endphp
                            <tr>
                                <td>
                                    {{ $user->id }}
                                </td>
                                <td>
                                    {{ fullName($user) }}
                                </td>
                                <td>
                                    <p class="card-text">{{number_format($subsets)}}</p>
                                </td>
                                <td>
                                    <a href="{{route('subsetsByUserId-list',[$user->id,$from,$to])}}" class="btn btn-primary">جزئیات</a>
                                </td>
                                <td>
                                    <p class="card-text">{{number_format($customers)}}</p>
                                </td>
                                <td>
                                    <a href="{{route('customersByUserId-list',[$user->id,$from,$to])}}" class="btn btn-primary">جزئیات</a>
                                </td>
                                <td>
                                    <p class="card-text">{{number_format($villas)}}</p>
                                </td>
                                <td>
                                    <a href="{{route('villa-list-indexByUserId',[$user->id,$from,$to])}}" class="btn btn-primary">جزئیات</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            @endisset


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