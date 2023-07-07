@component('layouts.back')
    @slot('title') مدیریت فایل ها@endslot
    @slot('body')
        <style>
            img {
                max-width: 80%;
                max-height: 150px;
            }
        </style>
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>
                    </div>
                    <h2>لیست فایل ها</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="archive-table">
                        @foreach ($data as $slider)
                            <tr>
                                <td>{{ $slider->id }} </td>
                                <td>@if($slider->photo){{url($slider->photo->path)}}@endif</td>
                                <td>
                                    @if(isset($slider->photo->path))
                                        <img style="width: 100px" src="{{url($slider->photo->path)}}">
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="paginate p-3">
                    {{ $data->links() }}
                </div>
            </div>
            <div class="col-sm-12">
                {{ Form::open(array('route' => 'upload-store', 'method' => 'post', 'files' => true)) }}
                <div class="row">
                    <div class="col-md-6" style="margin-top: 10px;">
                        <div class="form-group">
                            {{ Form::label('photo', 'فایل خود را وارد کردن') }}
                            {{ Form::file('photo', array('accept' => '*/*')) }}
                        </div>
                    </div>
                </div>
                <div style="margin-bottom: 20px">
                    {{ Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>افزودن', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left')) }}
                </div>
                <br/>
                {{ Form::close() }}
            </div>
        </div>
    @endslot
@endcomponent