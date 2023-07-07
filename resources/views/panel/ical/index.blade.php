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
                    <form action="{{route('ical-search')}}" method="post" style="width: 95%;">
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
                    @if(count($icals))
                    <table class="archive-table">
                        @foreach ($icals as $ical)
                            <tr>
                                <td>{{ $ical->villa->name }}</td>
                                <td>{{ $ical->ical_url }}</td>  
                                <td><a class="btn btnprimary" href="{{ route('ical-create',$ical->villa->id) }}">ویرایش</a></td>
                                <td><a class="btn btnprimary" href="{{ route('ical-destroy',$ical->id)}}">حذف</a></td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                        موردی وجود ندارد
                    @endif
                </div>
                <div class="paginate p-3">
                    {{ $icals->links() }}
                    <a href="{{ route('ical-create',0) }}" class="btn btn-rounded btn-primary float-left"><i class="fa fa-circle-o ml-1"></i>افزودن</a>
                </div>
            </div>
        </div>
    @endslot
@endcomponent