@if(isset($item))
    <div class="ltn__search-by-place-item">
        <div class="search-by-place-img">
            <h6 class="address_project progect_addres_box"><a href="{{route('user.villas.search',[$item->id,'room_num'=>['all'],'type_info'=>['all'],'state_id'=>''])}}"><i class="flaticon-pin"></i> {{$item->state->name . ' / '.$item->city->name}} </a></h6>

            <a href="{{route('user.villas.search',[$item->id,'room_num'=>['all'],'type_info'=>['all'],'state_id'=>''])}}">
{{--            <a href="{{route('user.project.show',$item->id)}}">--}}
                @if(count($item->photos)>0)
                    <img src="{{url($item->photos[0]->path)}}" alt="{{$item->name}}">
                @else
                    <img src="{{$item->pic?url($item->pic):url('assets/user/pic/product.jpg')}}" alt="{{$item->name}}">
                @endif
            </a>
            <div class="search-by-place-badge">
                <ul>
                    <li>{{$item->code}}</li>
                </ul>
            </div>
        </div>
        <div class="search-by-place-info">
            <h6><a href="{{route('user.villas.search',[$item->id,'room_num'=>['all'],'type_info'=>['all'],'state_id'=>''])}}">شروع قیمت از : {{number_format($item->price)}} لیر </a></h6>
            <h6><a href="{{route('user.villas.search',[$item->id,'room_num'=>['all'],'type_info'=>['all'],'state_id'=>''])}}">تعداد واحد های باقی مانده : {{$item->count_all_unit-$item->count_sale_unit}} واحد </a></h6>
{{--            <h6><a href="{{route('user.villas.search',[$item->id,'room_num'=>['all'],'type_info'=>'all','city_id'=>'all'])}}">{{$item->meter_description}}</a></h6>--}}
            <h5><a href="{{route('user.villas.search',[$item->id,'room_num'=>['all'],'type_info'=>['all'],'state_id'=>''])}}">{{$item->name}}</a></h5>
            <div class="search-by-place-btn text-right">
                <a href="{{route('user.villas.search',[$item->id,'room_num'=>['all'],'type_info'=>['all'],'state_id'=>''])}}">مشاهده <i class="fas fa-angle-left top_i"></i></a>
            </div>
        </div>
    </div>
@endif