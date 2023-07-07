<form action="{{route('user-report-search')}}" id="searchForm" method="get">
    <div class="row" style="border: 0px solid #e5eaef;background-color: rgba(255, 255, 255, 0.2);padding: 20px;">
        <div class="col-md-3 col-xs-12">
            <label for="user_id">کاربر</label>
            <select class="form-control select2" id="user_id" name="user_id">
                <option value="" {{ old('user_id') == 0 ? 'selected' : ''  }}>ندارد</option>
                @foreach(\App\User::role(['مدیر ملک','مدیر','call center','call center(sales)'])->get() as $admin_user)
                    <option
                            value="{{ $admin_user->id }}"
                            {{request('user_id')==$admin_user->id?'selected':''}}>
                        {{ $admin_user->first_name .' '.$admin_user->last_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 col-xs-12">
            <div class="form-group w-100" style="display: inline-grid !important;">
                {{ Form::label('از تاریخ', '') }}
                <input name="from" class="datepicker form-control" value="{{request('from')}}" data-date-format="yyyy/mm/dd/">
            </div>
        </div>
        <div class="col-md-3 col-xs-12">
            <div class="form-group w-100" style="display: inline-grid !important;">
                {{ Form::label('تا تاریخ', '') }}
                <input name="to" class="datepicker form-control" value="{{request('to')}}" data-date-format="mm/dd/">
            </div>
        </div>
        <div class="col-md-3 col-xs-12">
            <div class="form-group w-100" style="display: inline-grid !important;">
                {{ Form::label('', 'فیلتر کن',array('style'=>'opacity:0')) }}
                <div class="">
                    <button class="btn btn-info" style="height: 38px;width: 70%;" type="submit">فیلتر کن</button>
                    <button type="button" class="btn btn-warning" style="height: 38px;width: 27%;" onclick="$('#searchForm').trigger('reset')">
                        <i class="fa fa-2x fa-retweet ml-1"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@push('stylesheets')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{ url('assets/admin/css/select2.min.css') }}"/>
    <!--Plugin CSS file with desired skin-->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/admin/css/bootstrap-select.min.css') }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css"/>
    <style>
        .set-bg {
            text-align: center;
            background: #eeeeee61;
            color: #000;
            padding: 20px;
            border-radius: 5px;
        }
    </style>
@endpush
@push('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
{{--    <script type="text/javascript" src="{{ url('assets/admin/js/bootstrap-datepicker-fa.min.js') }}"></script>--}}
    <script type="text/javascript" src="{{ url('assets/admin/js/bootstrap-select.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/admin/js/bootstrap-select-fa_IR.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/admin/js/select2.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
    <script src="{{ url('assets/admin/js/jquery.mask.min.js') }}"></script>
    <script>
        var custom_values = [200000, 400000, 600000, 800000, 1000000, 1350000, 1700000, 2000000, 2500000, 3000000, 4000000, 5000000, 10000000, 20000000];
        // be careful! FROM and TO should be index of values array
                @if(request('price'))
        var my_from = custom_values.indexOf({{explode(';',request('price'))[0]}});
        var my_to = custom_values.indexOf({{explode(';',request('price'))[1]}});
                @else
        var my_from = custom_values.indexOf(400000);
        var my_to = custom_values.indexOf(1350000);
        @endif

        $(".js-range-slider").ionRangeSlider({
            type: "double",
            grid: true,
            from: my_from,
            to: my_to,
            values: custom_values
        });
    </script>
    <script>
        getCityId($('select[name=city_id]').find(":selected").val())
        $('select[name=city_id]').change(function () {
            let selected=$(this).find(":selected").val();
            getCityId(selected)
        })
        function getCityId(selected){
            if(selected==''){
                $('select[name=location_id]').attr('disabled',true)
                // $('select[name=type]').attr('disabled',true)
            }else{
                $('select[name=location_id]').attr('disabled',false)
                // $('select[name=type]').attr('disabled',false)
            }
        }

        checkType($("input[name='type']"));
        $("input[name='type']").click(function() {
            checkType($(this));
        });
        function checkType(el){
            if(el.is(':checked')){
                $('input[name=built_year]').attr('disabled',true)
            }else{
                $('input[name=built_year]').attr('disabled',false)
            }
        }
    </script>
    <script>
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            // startDate: '-3d'
        });
    </script>
@endpush