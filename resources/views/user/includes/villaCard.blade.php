@if(isset($villa))
    <div class="ltn__product-item ltn__product-item-4 text-center---">
        <div class="product-img">
            @if($villa->sale_status=='active')
                <img src="{{url('assets/user/pic/sale1.png')}}" class="img_sale_png" alt="vandidad">
            @endif
            <a href="{{route('user.villa.show',$villa->id)}}">
                <img src="{{count($villa->photos)?url($villa->photos[0]->path):url('assets/user/pic/product.jpg')}}" alt="{{$villa->name}}">
            </a>
            <div class="product-badge">
                <ul>
{{--                    @if($villa->sale_status=='active')--}}
{{--                        <li class="sale-badge">--}}
{{--                            <i class="fas fa-dollar-sign ml-1"></i>  فروخته شد--}}
{{--                        </li>--}}
{{--                    @else--}}
                        <li class="sale-badge {{$villa->types_villa_color($villa->type_villa)}}">
                            {{$villa->types_villa(true,$villa->type_villa)}}
                        </li>
{{--                    @endif--}}
                </ul>
            </div>
            <div class="product-img-location-gallery">
                @if($villa->city)
                    <div class="product-img-location">
                        <ul>
                            <li>
                                <a href="{{route('user.villa.show',$villa->id)}}"><i class="flaticon-pin"></i> {{$villa->state?$villa->state->name:''}} / {{$villa->city?$villa->city->name:''}}</a>
                            </li>
                        </ul>
                    </div>
                @endif
                <div class="product-img-gallery">
                    <ul>
                        <li>
                            <a href="{{route('user.villa.show',$villa->id)}}"><i class="fas fa-camera"></i> {{count($villa->photos)}}</a>
                        </li>
                        @if($villa->video!=null && $villa->video!='')
                            <li>
                                <a href="{{route('user.villa.show',$villa->id)}}"><i class="fas fa-film"></i> </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="product-info">
            <div class="product-price">
                <span class="lira_price{{$villa->id}} price_all{{$villa->id}} price_villa  price_villa1"><i class="fas fa-money-bill-wave mr-1"></i> {{number_format($villa->price)}}/لیر</span>
                <span class="dollar_price{{$villa->id}} price_all{{$villa->id}} price_villa  price_villa2"><i class="fas fa-money-bill-wave mr-1"></i>{{number_format($villa->convertPrice($villa->price,'dollar'))}}/دلار</span>
                <span class="toman_price{{$villa->id}} price_all{{$villa->id}} price_villa price_villa3"><i class="fas fa-money-bill-wave mr-1"></i>{{number_format($villa->convertPrice($villa->price,'toman'))}}/تومان</span>
{{--                <div class="dropdown price_type_dropdown">--}}
{{--                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{$villa->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                        <span class="drop_span_price_type{{$villa->id}}">/لیر</span>--}}
{{--                    </button>--}}
{{--                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$villa->id}}">--}}
{{--                        <a class="dropdown-item select_price_type select_price_type{{$villa->id}} d-none" data-type="lira_price{{$villa->id}}" data-btn="drop_span_price_type{{$villa->id}}" data-val="/لیر" data-price="price_all{{$villa->id}}" data-this="select_price_type{{$villa->id}}" href="javascript:void(0);">لیر</a>--}}
{{--                        <a class="dropdown-item select_price_type select_price_type{{$villa->id}}" data-type="toman_price{{$villa->id}}" data-btn="drop_span_price_type{{$villa->id}}" data-val="/تومان" data-price="price_all{{$villa->id}}" data-this="select_price_type{{$villa->id}}" href="javascript:void(0);">تومان</a>--}}
{{--                        <a class="dropdown-item select_price_type select_price_type{{$villa->id}}" data-type="dollar_price{{$villa->id}}" data-btn="drop_span_price_type{{$villa->id}}" data-val="/دلار" data-price="price_all{{$villa->id}}" data-this="select_price_type{{$villa->id}}" href="javascript:void(0);">دلار</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <h3 class="product-title"><a href="{{route('user.villa.show',$villa->id)}}">{{$villa->name}}</a></h3>
            {{--                                <div class="product-description">--}}
            {{--                                    <p>Beautiful Huge 1 Family House In Heart Of <br>--}}
            {{--                                        Westbury. Newly Renovated With New Wood</p>--}}
            {{--                                </div>--}}
            <ul class="ltn__list-item-2 ltn__list-item-2-before text-center">
                <li><span>{{$villa->room_num}} <i class="flaticon-bed"></i></span>
                    خواب
                </li>
                <li><span>{{$villa->number_of_wc}} <i class="flaticon-clean"></i></span>
                    WC
                </li>
                <li><span>{{$villa->area}} <i class="flaticon-square-shape-design-interface-tool-symbol"></i></span>
                    متراژ
                </li>
                <li><span>{{$villa->type_sale}} <i class="fas fa-hand-holding-usd"></i></span>
                    فروش
                </li>
            </ul>
        </div>
        {{--                            <div class="product-info-bottom">--}}
        {{--                                @if($villa->user)--}}
        {{--                                <div class="real-estate-agent">--}}
        {{--                                    <div class="agent-img">--}}
        {{--                                        <a href="{{route('user.villa.show',$villa->id)}}"><img src="{{$villa->user->photo?url($villa->user->photo->path):url('source/assets/user/pic/author.jpg')}}" alt="#"></a>--}}
        {{--                                    </div>--}}
        {{--                                    <div class="agent-brief">--}}
        {{--                                        <h6><a href="{{route('user.villa.show',$villa->id)}}">{{$villa->user->first_name.' '.$villa->user->last_name}}</a></h6>--}}
        {{--                                        <small>{{$villa->user->roles[0]->name}}</small>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                @endif--}}
        {{--                                <div class="product-hover-action">--}}
        {{--                                    <ul>--}}
        {{--                                        <li>--}}
        {{--                                            <a href="https://web.whatsapp.com/send?text={{ route('front.villas.show', $villa->id) }}" target="_blank" title="اشتراک گذاری در واتساپ">--}}
        {{--                                                <i class="icon-share"></i>--}}
        {{--                                            </a>--}}
        {{--                                        </li>--}}
        {{--                                        <li>--}}
        {{--                                            <a href="{{route('user.villa.show',$villa->id)}}" title="جزئیات ملک">--}}
        {{--                                                <i class="flaticon-add"></i>--}}
        {{--                                            </a>--}}
        {{--                                        </li>--}}
        {{--                                    </ul>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
    </div>
@endif
