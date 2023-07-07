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
            <div class="col-md-12">
                @include('panel.villas.searchForm')
            </div>
            <div class="col-sm-12 col-md-12 px-3" style="border: 0px solid #e5eaef;background-color: rgba(255, 255, 255, 0.2);padding: 10px 0 0 0;">
                <div id="dataTable_filter" class="dataTables_filter">
                    <form action="{{route('villa-find','published')}}" method="get">
                        <label>
                            <input type="search" name="search" class="form-control form-control-sm" placeholder="عنوان یا کد ملک">
                            <button type="submit" style="width: 100px" class="btn btn-primary">پیدا کن</button>
                        </label>
                    </form>
                </div>
            </div>
        </div>
    @endslot
@endcomponent