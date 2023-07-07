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
                    <form action="{{route('post-search')}}" method="post" style="width: 95%;">
                        <div class="row">
                            <div class="col-md-6 col-sm-6" style="padding-left: 0;">
                                <input type="text" name="search" class="form-control" placeholder="&#1580;&#1587;&#1578;&#1580;&#1608;...">
                            </div>
                            <div class="col-md-6 col-sm-6" style="padding-right: 0;">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        {{csrf_field()}}
                    </form>
                    <table class="archive-table">
                        @foreach ($data as $key =>$post)
                            @php
                                $final = json_decode($post->reserve);
                            @endphp
                            <tr style="cursor: pointer" data-toggle="modal" data-target="#exampleModal{{$key}}">
                                <td>{{$final->first_name . ' ' .$final->last_name}}</td>
                                <td>{{$final->email}}</td>
                                <td>{{$final->phone}}</td>
                                <td>{{$final->checkIn}}</td>
                                <td>{{$final->checkOut}}</td>
                                <td>{{$final->person}}</td>
                                <td>
                                    @php
                                        $villa = App\Villa::where('id' , $final->villa_id)->first();

                                    @endphp
                                    @if(isset($villa))
                                        {{$villa->name}}
                                    @endif
                                </td>
                            </tr>



                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{$final->first_name . ' ' .$final->last_name .' ایمیل : '.$final->email }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {{$final->body}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        @endforeach
                    </table>
                </div>
                <div class="paginate p-3">
                    {{ $data->links() }}
                    @if(!auth()->user()->hasRole('watcher'))
                    <a href="{{ route('post-create') }}" class="btn btn-rounded btn-primary float-left"><i
                                class="fa fa-circle-o ml-1"></i>&#1575;&#1601;&#1586;&#1608;&#1583;&#1606;</a>
                    @endif
                </div>
            </div>
        </div>
    @endslot
@endcomponent