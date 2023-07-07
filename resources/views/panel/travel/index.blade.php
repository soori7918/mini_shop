@component('layouts.back')
    @slot('title') مدیریت {{ $title }} @endslot
    @slot('body')
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>                    </div>
                    <h2>لیست {{ $title }}</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="archive-table">
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->text }}</td>
                                <td><img src="{{url($post->photo)}}"></td>
                                <td><img src="{{url($post->background)}}"></td>
                                <td width="140">
                                    <div class="btn-inline">
                                        <a href="{{ route('travel-edit', $post->id) }}" class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-edit ml-1"></i>ویرایش</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="paginate p-3">
                    {{ $posts->links() }}
                    {{--<a href="{{ route('travel-create') }}" class="btn btn-rounded btn-primary float-left"><i class="fa fa-circle-o ml-1"></i>افزودن</a>--}}
                </div>
            </div>
        </div>
    @endslot
@endcomponent