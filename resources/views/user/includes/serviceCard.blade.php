@if(isset($service))
    <?php
    $pic=explode('.',$service->pic);
    $end=end($pic);
    ?>
    @if($service->text_input!=null && $service->text_input!='')
        <a href="{{route('user.service.show',$service->id)}}">
    @endif
            @if(in_array($end,['jpg','jpeg']) && $service->pic)
                <div class="ltn__feature-item ltn__feature-item-6 text-center p-0 {{$key==1?'active':''}}">
                    <img class="w-100" src="{{$service->pic?url($service->pic):url('assets/user/pic/icons/12.png')}}" alt="{{$service->title}}">
                </div>
                @else
                <div class="ltn__feature-item ltn__feature-item-6 text-center {{$key==1?'active':''}}">
        {{--        <img class="bg_service" src="{{url('assets/user/pic/tr2.png')}}" alt="{{$service->title}}">--}}
                <div class="ltn__feature-icon">
                    <!-- <span><i class="flaticon-house"></i></span> -->
                    <img src="{{$service->pic?url($service->pic):url('assets/user/pic/icons/12.png')}}" alt="{{$service->title}}">
                </div>
                <div class="ltn__feature-info">
                    @if($service->text_input!=null && $service->text_input!='')
                        <h3><a href="{{route('user.service.show',$service->id)}}">{{$service->title}}</a></h3>
                    <a href="{{route('user.service.show',$service->id)}}">
                        {!! $service->text !!}
                    </a>
                    @else
                        <h3><a>{{$service->title}}</a></h3>
                        {!! $service->text !!}
                    @endif
                </div>
                </div>
            @endif
        @if($service->text_input!=null && $service->text_input!='')
            </a>
        @endif
@endif