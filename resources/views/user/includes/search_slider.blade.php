<form action="" method="get" class="search_project">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 mt-2">
                <select name="room_num" class="chosen-select form-control">
                    <option value="">تعداد خواب</option>
                    @foreach(range(1,10) as $key)
                        <option value="{{$key}}">{{$key}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mt-2">
                <select name="type_info" class="chosen-select form-control">
                    <option value="">نوع ملک</option>
                    @foreach(\App\Villa::types() as $key=>$type)
                        <option value="{{$key}}">{{ $type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mt-2">
                <select name="city_id" class="chosen-select form-control">
                    <option value="">منطقه</option>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-8 mt-3">
                <div class="container-fluid">
                    <div class="row px-3">
                        <div class="col-md-12 col-xs-12">
                            <div class="form-group bootstrap-selects @if($errors->has('price')) has-danger @endif" style="direction: ltr">
                                <input type="text" class="js-range-slider" id="demo_2" name="price" value="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 btn_search mt-3">
                <button type="submit" class="btn_default">
                    <span></span>
                    <span>جستجوی ملک</span>
                </button>
            </div>
        </div>
    </div>
</form>