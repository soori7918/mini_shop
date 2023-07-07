@component('layouts.back')
    @slot('title') مدیریت {{ $title }} @endslot
    @slot('body')
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="http://adib-it.com/" target="_blank"><img src="http://www.support.adib-it.com/img/logo.png" style="margin-top: 10px;"></a>
                    </div>
                    <h2>لیست {{ $title }}</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="archive-table">
                        @foreach ($visitlogs as $visitlog)
                            <tr>
                                <td>{{ $visitlog->ip }}</td>
                                <td dir="ltr">{{ $visitlog->browser }}</td>
                                <td>{{ $visitlog->os }}</td>
                                <td>{{ $visitlog->user_name }}</td>
                                <td title="{{ my_jdate($visitlog->updated_at, 'Y/m/d H:i:s') }}">{{ $visitlog->last_visit }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="paginate p-3">
                    {{ $visitlogs->links() }}
                    <span class="btn btn-rounded btn-warning float-left">افراد آنلاین ({{ $online }})</span>
                </div>
            </div>
        </div>
    @endslot
@endcomponent