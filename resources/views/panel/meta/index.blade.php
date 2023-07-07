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
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="archive-table">
                        <tr>
                            <th>آدرس صفحه</th>
                            <th>عنوان</th>
                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                        @if(count($items)>0)
                            @foreach($items as $item)
                                <tr>
                                    <td>{{$item->url}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{!! $item->status($item->status) !!}</td>
                                    <td class="text-center">
                                        <a href="{{route('meta-edit',$item->id)}}" class="badge bg-primary ml-1" title="ویرایش"><i class="fa fa-edit"></i> </a>
                                        <a href="javascript:void(0);" onclick="del_row('{{$item->id}}')" class="badge bg-danger ml-1" title="حذف"><i class="fa fa-trash"></i> </a>
                                        @if($item->status=='active')
                                            <a href="javascript:void(0);" onclick="active_row('{{$item->id}}','pending')" class="badge bg-success ml-1" title="نمایش متا فعال است غیر فعال شود؟"><i class="fa fa-check"></i> </a>
                                        @endif
                                        @if($item->status=='pending')
                                            <a href="javascript:void(0);" onclick="active_row('{{$item->id}}','active')" class="badge bg-danger ml-1" title="نمایش متا غیر فعال است فعال شود؟"><i class="fa fa-close"></i> </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center">موردی یافت نشد</td>
                            </tr>
                        @endif
                    </table>
                </div>
                <div class="paginate p-3">
                    {{ $items->links() }}
                    <a href="{{ route('meta-create') }}" class="btn btn-rounded btn-primary float-left"><i class="fa fa-circle-o ml-1"></i>افزودن</a>
                </div>
            </div>
        </div>
    @endslot
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            function active_row(id,type) {
                if(type=='pending')
                {
                    var text_user='غیر فعال می شود';
                }
                if(type=='active')
                {
                    var text_user='فعال می شود';
                }
                Swal.fire({
                    title: text_user ,
                    text: 'برای تغییر وضعیت مطمئن هستید؟',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = '{{url('/')}}/panel/meta-active/'+id+'/'+type;
                    }
                })
            }
            function del_row(id) {
                Swal.fire({
                    text: 'برای حذف مطمئن هستید؟',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = '{{url('/')}}/panel/meta-destroy/'+id;
                    }
                })
            }
        </script>
    @endpush
@endcomponent