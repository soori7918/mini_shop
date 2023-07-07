@component('layouts.back')
    @slot('title') {{ 'مدیریت شهرها' }} @endslot
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
                            <td><h6>نام</h6></td>
                            <td><h6>تبدیل</h6></td>
                        </tr>
                            <tr>
                                <td>دلار</td>
                                <td>
                                    <form method="post" action="{{route('arz-update','dolar')}}" style="margin-top: 25px">
                                        {{csrf_field()}}
                                        <input type="text" class="form-control text-left" name="price" value="{{$arz->dolar}}" onchange="this.form.submit()">
                                    </form>
                                </td>
                            </tr>
                        <tr>
                            <td>یورو</td>
                            <td>
                                <form method="post" action="{{route('arz-update','euro')}}" style="margin-top: 25px">
                                    {{csrf_field()}}
                                    <input type="text" class="form-control text-left" name="price" value="{{$arz->euro}}" onchange="this.form.submit()">
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>ریال</td>
                            <td>
                                <form method="post" action="{{route('arz-update','rial')}}" style="margin-top: 25px">
                                    {{csrf_field()}}
                                    <input type="text" class="form-control text-left" name="price" value="{{$arz->rial}}" onchange="this.form.submit()">
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="paginate p-3">
                </div>
            </div>
        </div>
    @endslot
@endcomponent