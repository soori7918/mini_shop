@component('layouts.back')
    @slot('title') ویرایش قیمت دلار و تومان @endslot
    @slot('body')
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>
                    </div>

                    <h2>ویرایش قیمت دلار و تومان</h2>
                </div>
            </div>
            <div class="card-body">
                {{ Form::model($item,array('route' =>'price-convert-update', 'method' => 'POST', 'files' => true)) }}
                <div class="row">
                    <div class="col-12 text-center alert alert-info p-2">
                        لطفا قیمت روز هر لیر را به دلار و تومان وارد نمایید
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('dolar', 'هر 1 لیر برابر با ... دلار') }}
                            {{ Form::text('dolar',null, array('class' => 'form-control text-center')) }}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('toman', 'هر 1 لیر برابر با ... تومان') }}
                            {{ Form::text('toman',null, array('class' => 'form-control text-center')) }}
                        </div>
                    </div>
                </div>
                <a href="{{ URL::previous() }}" class="btn btn-rounded btn-outline-warning float-right"><i class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                {{ Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>ویرایش', array('type' => 'submit', 'class' => 'btn btn-outline-success float-left')) }}
                {{ Form::close() }}
            </div>
        </div>
    @endslot
@endcomponent