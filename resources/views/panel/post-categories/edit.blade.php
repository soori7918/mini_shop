@component('layouts.back')
    @slot('title') ویرایش {{ $title }} {{ $category->name }} @endslot
    @slot('body')
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>
                    </div>
                    <h2>ویرایش {{ $title }} {{ $category->name }}</h2>
                </div>
            </div>
            <div class="card-body">
                {{ Form::model($category, array('route' => array('post-category-update', $category->id), 'method' => 'PATCH')) }}
                <div class="form-group">
                    {{ Form::label('name', 'نام') }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('slug', 'نامک') }}
                    {{ Form::text('slug', null, array('class' => 'form-control')) }}
                </div>
                <br/>
                <a href="{{ URL::previous() }}" class="btn btn-rounded btn-secondary float-right"><i class="fa fa-chevron-circle-right ml-1"></i>بازگشت</a>
                {{ Form::button('<i class="fa fa-circle-o mtp-1 ml-1"></i>ویرایش', array('type' => 'submit', 'class' => 'btn btn-rounded btn-primary float-left')) }}
                {{ Form::close() }}
            </div>
        </div>
    @endslot
    @push('scripts')
        <script type="text/javascript">
            slug('#name', '#slug');
        </script>
    @endpush
@endcomponent