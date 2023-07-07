@component('layouts.back')
    <?php
    if($user->location!=null)
    {
        $user_loc = unserialize($user->location);
    }
    else {
        $user_loc=null;
    }
    ?>
    @slot('title') افزودن {{ $title }} @endslot
    @slot('body')
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>
                    </div>
                    <h4>{{$title}}</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('user-permissions-update', ['id' => $user->id]) }}{{request('callback_url')?'?callback_url='.request('callback_url'):''}}" method="post"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">

                        <div class="col-md-12">
                            <label for="instant">دسترسی ها</label>
                            {!! Form::select('role_name[]',array_pluck(\App\Role::all(),'name','name'),$user->getRoleNames(),['class'=>'form-control selectpicker','multiple']) !!}
                        </div>
                        <div class="col-md-6">
                            <label for="instant">بخش ها</label>
                            {!! Form::select('model',\App\User::models(),null,['class'=>'form-control selectpicker']) !!}
                        </div>
                        <div class="col-md-6">
                            <label for="instant">امکانات</label>
                            {!! Form::select('permissions[]',\App\User::permissionNames(),$user->getRoleNames(),['class'=>'form-control selectpicker','multiple']) !!}
                        </div>

                        <div class="col-md-12 mt-5">
                            <div class="col-md-12">
                                <table id="dataTable" class="archive-table">
                                    <thead>
                                    <tr>
                                        <th>بخش</th>
                                        <th>امکان</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($user->getDirectPermissions() as $item)
                                        @php $model=explode('_',$item->name)[1];$permission=explode('_',$item->name)[0]; @endphp
                                        <tr>
                                            <td>
                                                {{ \App\User::models()[$model] }}
                                            </td>
                                            <td>
                                                {{ \App\User::permissionNames()[$permission] }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="col-md-3 mt-4 mr-auto">
                            <button type="submit" class="btn btn-block btn-success">ویرایش</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endslot
    @push('stylesheets')
        <link rel="stylesheet" type="text/css" href="{{ url('assets/admin/css/bootstrap-datepicker.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ url('assets/admin/css/select2.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ url('assets/admin/css/bootstrap-select.min.css') }}"/>
        <style>
            .set-bg {
                text-align: center;
                background: #eeeeee61;
                color: #000;
                padding: 20px;
                border-radius: 5px;
            }
        </style>
    @endpush

    @push('scripts')
        <script type="text/javascript" src="{{ url('assets/admin/js/bootstrap-datepicker.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('assets/admin/js/bootstrap-datepicker-fa.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('assets/admin/js/bootstrap-select.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('assets/admin/js/bootstrap-select-fa_IR.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('assets/admin/js/select2.min.js') }}"></script>
        <script src="{{ url('assets/admin/js/jquery.mask.min.js') }}"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable( {
                    pageLength: 25,
                    columnDefs: [ {
                        targets: [ 0 ],
                        orderData: [ 0 ]
                    } ]
                } );
            } );
        </script>
        <script>
            $('#budget').mask("#,##0", {reverse: true});
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxfZQk73sogROY9KKRmtPIsLSFSjX7o7w&libraries=places&callback=initialize"></script>
        <script type="text/javascript">
            $('.date-picker').each(function () {
                $(this).datepicker({
                    dateFormat: "yy-mm-dd"
                });
            });
            $('.select2').each(function () {
                $(this).select2();
            });
        </script>
    @endpush
@endcomponent
