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
            <div class="col-md-12">
{{--                @include('panel.villas.searchForm')--}}
            </div>
            <div class="card-body">
                <div class="">
                    <div class="row" style="border: 0px solid #e5eaef;background-color: rgba(255, 255, 255, 0.2);padding: 10px 0 0 0;">
                        <div class="col-sm-12 col-md-12">
                            <div id="dataTable_filter" class="dataTables_filter">
                                <form action="{{route('villa-find',$type)}}" method="get">
                                    <label>
                                        <input type="search" name="search" class="form-control form-control-sm" placeholder="عنوان یا کد ملک">
                                        <button type="submit" style="width: 100px" class="btn btn-primary">پیدا کن</button>
                                    </label>
                                </form>
                            </div>
                        </div>
                    </div>
                    @if(count($villas))
                        <table id="dataTable" class="archive-table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>عنوان</th>
                                @if(!isMobile())
                                <th>دسته بندی(پروژه)</th>
                                <th>دسته ملک</th>
{{--                                <th>تصاویر</th>--}}
                                <th>وضعیت فروش</th>
                                <th>وضعیت</th>
{{--                                <th>کاربر</th>--}}
                                <th>قیمت</th>
{{--                                <th>منطقه</th>--}}
                                <th>بازدید</th>
                                @endif
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($villas as $villa)
                                @php $soldout=\App\Contract::where('villa_id',$villa->id)->first(); @endphp
                                <tr>
                                    <td>
                                        {{ $villa->id }}
                                    </td>
                                    <td>
                                        @if($villa->sale_status=='active')
                                        <span class="badge badge-danger">فروخته شده</span>
                                        @endif
                                        {{ $villa->name }}
                                    </td>

                                    @php $status_villa="" @endphp
                                    @if(!isMobile())
                                        <td>
                                            {{ $villa->category?$villa->category->name:'__' }}
                                        </td>
                                        <td>
                                            {{$villa->types_villa(true,$villa->type_villa)}}
                                        </td>
{{--                                    <td>--}}
{{--                                        <div class="" style="display: flex">--}}
{{--                                            @foreach($villa->photos->take(5) as $photo)--}}
{{--                                                <div class="gallery-item" data-id="{{ $photo->id }}">--}}
{{--                                                    <a href="{{ url($photo->path) }}" target="_blank"><img style="width: 30px;" src="{{ url($photo->path) }}"></a>--}}
{{--                                                </div>--}}
{{--                                            @endforeach--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
                                        <td>
                                            @switch($villa->sale_status)
                                                @case('pending')
                                                <span class="badge badge-danger">فروش نرفته</span>
                                                <a href="{{route('villa-active-sale',[$villa->id,'active'])}}" title="تبدیل به فروخته شده"><span class="badge badge-success"><i class="fa fa-check"></i> </span></a>
                                                @break
                                                @case('active')
                                                <span class="badge badge-success">فروخته شده</span>
                                                <a href="{{route('villa-active-sale',[$villa->id,'pending'])}}" title="تبدیل به فروش نرفته"><span class="badge badge-danger"><i class="fa fa-close"></i> </span></a>
                                                @break
                                                @default
                                            @endswitch
                                        </td>
                                    <td>
                                        @switch($villa->status)
                                            @case('pending')
                                            <span class="badge badge-danger">عدم نمایش</span>
                                            <a href="{{route('villa-active',[$villa->id,'published'])}}"><span class="badge badge-success"><i class="fa fa-check"></i> </span></a>
                                            @break
                                            @case('published')
                                            <span class="badge badge-success">نمایش</span>
                                            <a href="{{route('villa-active',[$villa->id,'pending'])}}"><span class="badge badge-danger"><i class="fa fa-close"></i> </span></a>
                                            @break
                                            @default
                                        @endswitch
                                    </td>
{{--                                    <td>--}}
{{--                                        @if($villa->user_id==auth()->id() || auth()->user()->hasRole('مدیر') || auth()->user()->hasRole('تعیین کننده ملک'))--}}
{{--                                        {{ ($villa->user) ? $villa->user->first_name . ' ' . $villa->user->last_name : 'بودن ادمین' }}--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
                                    <td>
                                        <span class="badge badge-warning py-2">{{ number_format($villa->price) }}</span>
                                    </td>
{{--                                    <td>{{ $villa->location?$villa->location->name:'' }}</td>--}}
                                    <td class="text-center">{{ $villa->view}}</td>
                                    @endif
                                    <td width="140">
                                        @if(!auth()->user()->hasRole('watcher'))
                                        <div class="row">
{{--                                            <div class="col-md-12 px-1 pb-1">--}}
{{--                                                <a href="{{route('front.villas.preview',[$villa->id,auth()->id()])}}"--}}
{{--                                                   class="btn btn-success float-left w-100" target="_blank">--}}
{{--                                                    <i class="fa fa-paper-plane"></i>  اشتراک گذاری--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
                                            @role('تعیین کننده ملک')
{{--                                            <div class="col-md-12 px-1 pb-1">--}}
{{--                                                <a href="{{ route('villa-show', $villa->id) }}"--}}
{{--                                                   class="btn  btn-info float-left w-100 "><i--}}
{{--                                                            class="fa fa-eye ml-1"></i>بررسی--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
                                            @endrole
                                            @role('مدیر')
                                            @if($villa->status=='published' || $villa->status=='failed')
{{--                                            <div class="col-md-6 px-1 pb-1">--}}
{{--                                                <a href="javascript:void(0);"--}}
{{--                                                   class="btn  btn-info float-left  modal_show w-100" data-name="{{$villa->name}}" data-user="{{$villa->user_active?$villa->user_active->first_name.' '.$villa->user_active->last_name : 'ثبت نشده'}}" data-create="{{my_jdate($villa->created_at,'Y/m/d')}}" data-date="{{is_null($villa->date_active)?'ثبت نشده':my_jdate($villa->date_active,'Y/m/d')}}" data-status="{{$status_villa}}">--}}
{{--                                                    <i class="fa fa-info"></i>  جزئیات--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
                                            <div class="col-md-6 px-1 pb-1">
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['villa-destroy', $villa->id] ]) !!}
                                                {!! Form::button('<i class="fa fa-ban ml-1"></i>حذف', ['type' => 'submit', 'class' => 'btn  btn-danger float-left w-100 ', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']) !!}
                                                {!! Form::close() !!}
                                                </div>
                                            @endif
{{--                                            <div class="col-md-6 px-1 pb-1">--}}
{{--                                                <a href="{{ route('villa-show', $villa->id) }}"--}}
{{--                                                   class="btn  btn-info float-left w-100 "><i--}}
{{--                                                        class="fa fa-eye ml-1"></i>{{ (Auth::user()->id == 1) ? 'بررسی' : 'مشاهده' }}--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                            @if($villa->status!="failed")--}}
                                            <div class="col-md-6 px-1 pb-1">
                                                <a href="{{ route('villa-edit', $villa->id) }}"
                                                   class="btn  btn-info float-left w-100 "><i
                                                            class="fa fa-edit ml-1"></i>ویرایش</a>
                                            </div>
{{--                                            @endif--}}
                                            @endrole
                                            @role('مدیر ملک')
                                            <div class="col-md-6 px-1 pb-1">
                                                <a href="{{ route('villa-show', $villa->id) }}"
                                                   class="btn  btn-info float-left w-100 "><i
                                                            class="fa fa-eye ml-1"></i>{{ (Auth::user()->id == 1) ? 'بررسی' : 'مشاهده' }}
                                                </a>
                                            </div>
                                            @if($villa->user_id==auth()->id())
                                            <div class="col-md-6 px-1 pb-1">
                                                <a href="{{ route('villa-edit', $villa->id) }}"
                                                   class="btn  btn-warning float-left w-100 "><i
                                                            class="fa fa-edit ml-1"></i>ویرایش</a>
                                            </div>
                                            @endif
                                            <div class="col-md-6 px-1 pb-1">
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['villa-destroy', $villa->id] ]) !!}
                                                {!! Form::button('<i class="fa fa-ban ml-1"></i>حذف', ['type' => 'submit', 'class' => 'btn  btn-danger float-left w-100 ', 'onclick' => 'return confirm("آیا مطمئن هستید؟")']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                            @endrole
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        موردی وجود ندارد
                    @endif
                </div>
                <div class="paginate p-3">
                    {{ $villas->links() }}
                    @if(!auth()->user()->hasRole('watcher'))
                    <a href="{{ route('villa-create') }}" class="btn btn-rounded btn-primary float-left"><i
                            class="fa fa-circle-o ml-1"></i>افزودن</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal_info_villa" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal_villa_name"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">وضعیت : </label>
                                <span id="modal_status_show"></span>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">توسط: </label>
                                <span id="modal_user_show"></span>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">زمان تغییر وضعیت: </label>
                                <span id="modal_date_show"></span>
                            </div>
                        <div class="form-group">
                                <label for="message-text" class="col-form-label">زمان ایجاد : </label>
                                <span id="modal_create_show"></span>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    @endslot
    @push('scripts')
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $('.modal_show').click(function () {
                var villa_name=$(this).attr('data-name');
                var status=$(this).attr('data-status');
                var user_name=$(this).attr('data-user');
                var tarikh=$(this).attr('data-date');
                var create=$(this).attr('data-create');
                $('#modal_villa_name').text(villa_name);
                $('#modal_status_show').text(status);
                $('#modal_user_show').text(user_name);
                $('#modal_date_show').text(tarikh);
                $('#modal_create_show').text(create);
                $('#modal_info_villa').modal('show')
            })
        </script>
        {{--<script>--}}
            {{--$(document).ready(function() {--}}
                {{--$('#dataTable').DataTable( {--}}
                    {{--pageLength: 100,--}}
                    {{--columnDefs: [ {--}}
                        {{--targets: [ 0 ],--}}
                        {{--orderData: [ 0 ]--}}
                    {{--},{--}}
                        {{--targets: [ 2 ],--}}
                        {{--orderData: [ 2 ]--}}
                    {{--}, {--}}
                        {{--targets: [ 1 ],--}}
                        {{--orderData: [ 1, 0 ]--}}
                    {{--}, {--}}
                        {{--targets: [ 4 ],--}}
                        {{--orderData: [ 4, 0 ]--}}
                    {{--} ]--}}
                {{--} );--}}
            {{--} );--}}
        {{--</script>--}}
    @endpush
@endcomponent
