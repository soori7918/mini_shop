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
                        @if(request()->type=='canceled')
                        معاملات کنسل شده
                        @else
                        معاملات انجام شده
                        @endif
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
                            <th>نام مشتری</th>
                            <th>کارشناس</th>
                            <th>نوع درخواست</th>
                            <th>مشتری</th>
                            <th>مبلغ کمیسیون</th>
                            <th>تاریخ</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{ $item->user->first_name }} {{ $item->user->last_name }}
                                    @if($item->user->questionnaire->account_status == 'active')
                                        <span class="badge badge-success">فعال</span>
                                    @elseif($item->user->questionnaire->account_status == 'pending')
                                        <span class="badge badge-warning">در انتظار تایید</span>
                                    @elseif($item->user->questionnaire->account_status == 'blocked')
                                        <span class="badge badge-secondary">مسدود شده</span>
                                    @endif

                                    @if($item->user->questionnaire->user)
                                    @if($item->user)
                                    @if($item->user->user)
                                        <span
                                                class="badge badge-warning">نام کارشناس معرف : {{ $item->user->user->first_name .' ' . $item->user->user->last_name }}</span>
                                @endif
                                @endif
                                @endif
                                </td>
                                <td>
                                    @if($item->expert)
                                    {{ $item->expert->first_name }} {{ $item->expert->last_name }}
                                    @endif
                                </td>
                                <td>
                                    @if(!is_null($item->user->type_request))
                                        @php
                                            $is_serialized=is_serialized($item->user->type_request);
                                        @endphp
                                        @if(!$is_serialized)
                                            {{ $user->type_request == 'rent' ? 'اجاره' : 'خرید' }}
                                        @else
                                            @if(gettype(unserialize($item->user->type_request))=='array')
                                                @foreach(unserialize($item->user->type_request) as $property)
                                                    {{ $property == 'rent' ? 'اجاره' : 'خرید' }} ,
                                                @endforeach
                                            @endif
                                        @endif
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('customer-show', $item->user->id) }}" class="btn btn-sm btn-warning mr-1"><i class="fa fa-eye ml-1"></i>مشاهده</a>
                                </td>
                                <td>{{ $item->price }} {{ $item->price_type }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <div class="d-flex">
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
                {{-- confirm --}}
                <div class="modal" id="confirmModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{route('contract-store')}}" method="post">
                            @csrf
                            <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">کنسل کردن معامله</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <input id="user_id" type="hidden" name="id" value="">

                                    <div class="col-md-12 mb-3">
                                        <label for="budget">مبلغ کمیسیون</label>
                                        <div class="p-relative">
                                            <input type="text" id="price" name="price" class="form-control price" maxlength="100">
                                            <select class="form-control priceTypePicker w-25" id="price_type" name="price_type">
                                                @foreach(\App\User::currencies() as $key => $currency)
                                                    <option value="{{ $key }}">{{ $currency }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <div class="d-flex form-control mb-2">
                                            <input name="rent_by" id="rent_by_estate" value="estate" type="radio" class="ml-2">
                                            <label class="pt-1 w-100" for="rent_by_estate">
                                                توسط
                                                <mark><b>املاکی</b></mark>
                                                اجاره داده شده هست
                                            </label>
                                        </div>
                                        <div class="d-flex form-control mb-2">
                                            <input name="rent_by" id="rent_by_expert" value="expert" type="radio" class="ml-2">
                                            <label class="pt-1 w-100" for="rent_by_expert">
                                                توسط
                                                <mark><b>کارشناس</b></mark>
                                                اجاره داده شده هست
                                            </label>
                                        </div>
                                        <div class="d-flex form-control mb-2">
                                            <input name="rent_by" id="rent_by_experts_friend" value="experts_friend" type="radio" class="ml-2">
                                            <label class="pt-1 w-100" for="rent_by_experts_friend">
                                                توسط
                                                <mark><b>آشنای کارشناس</b></mark>
                                                اجاره داده شده هست
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-12 estate_container d-none">
                                        <div class="group-container">
                                            <h4 class="modal-title text-center">مشخصات املاکی</h4>
                                            <div class="col-md-12 mb-2">
                                                <label for="estate_name">نام املاکی</label>
                                                <input id="estate_name" name="estate_name" class="form-control" type="text">
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label for="estate_telephone">شماره تماس املاکی</label>
                                                <input id="estate_telephone" name="estate_telephone" class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>

                                    <style>
                                        .custom-file-label{
                                            padding-top: 7px;
                                            height: 31px;
                                        }
                                    </style>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            {{ Form::label('name', 'پیوست') }}
                                            <div class="custom-file">
                                                {{ Form::file('file', array('accept' => 'image/*', 'class' => 'custom-file-input', 'id' => 'customFile')) }}
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <textarea name="description" class="form-control" id="" cols="30" rows="4" placeholder="توضیحات..."></textarea>
                                    </div>

                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">ارسال</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- deny --}}
                <div class="modal" id="denyModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{route('user-refer-deny')}}" method="post">
                            @csrf
                            <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">کنسل کردن معامله</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <input id="deny_user_id" type="hidden" name="id" value="">
                                    <textarea name="cancel_reason" class="form-control" id="" cols="30" rows="10" placeholder="توضیحات"></textarea>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">کنسل کن</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="paginate p-3">
                    {{ $items->links() }}
                </div>
            </div>
        </div>
    @endslot
    @push('scripts')
        <script>
            relatedFunc($("input[name='rent_by']:checked").val());
            $("input[name='rent_by']").click(function() {
                var radioValue = $("input[name='rent_by']:checked").val();
                relatedFunc(radioValue)
            });
            function relatedFunc(radioValue){
                if(radioValue=='estate'){
                    $('.estate_container').removeClass('d-none')
                }else{
                    $('.estate_container').addClass('d-none')
                }
            }
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
