@component('layouts.back')
    @slot('title') &#1605;&#1583;&#1740;&#1585;&#1740;&#1578; {{ $title }} @endslot
    @slot('body')
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>                    </div>
                    <h2>&#1604;&#1740;&#1587;&#1578; {{ $title }}</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="archive-table">
                        @foreach ($posts as $post)
                            <tr>
                                <td>
                                    @if($post->type == 1)
                                        skype
                                    @elseif($post->type == 2)
                                        &#1711;&#1608;&#1711;&#1604;
                                    @elseif($post->type == 3)
                                        linkedin
                                    @elseif($post->type == 4)
                                        &#1570;&#1662;&#1575;&#1585;&#1575;&#1578;
                                    @elseif($post->type == 5)
                                        &#1601;&#1740;&#1587;&#1576;&#1608;&#1705;
                                    @elseif($post->type == 6)
                                        twitter
                                    @elseif($post->type == 7)
                                        instagram
                                    @elseif($post->type == 8)
                                        telegram
                                    @endif
                                </td>
                                <td width="140">
                                    @if(!auth()->user()->hasRole('watcher'))
                                    <div class="btn-inline">
                                        <a href="{{ route('share-edit', $post->id) }}"
                                           class="btn btn-sm btn-info float-left mr-1"><i class="fa fa-edit ml-1"></i>&#1608;&#1740;&#1585;&#1575;&#1740;&#1588;</a>
                                    </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="paginate p-3">
                    {{ $posts->links() }}
                    @if(!auth()->user()->hasRole('watcher'))
                    {{--<a href="{{ route('travel-create') }}" class="btn btn-rounded btn-primary float-left"><i class="fa fa-circle-o ml-1"></i>&#1575;&#1601;&#1586;&#1608;&#1583;&#1606;</a>--}}
                    @endif
                </div>
            </div>
        </div>
    @endslot
@endcomponent