@component('layouts.back')
    @slot('title') مدیریت {{ $title }} @endslot
    @slot('body')
        <div class="card">
            <div class="card-header archive-card-header">
                <div class="archive-circle-wrap">
                    <div class="archive-circle">
                        <a href="{{url('/')}}" target="_blank"><img src="{{logo()}}" style="margin-top: 10px;"></a>
                    </div>
                    <h4>
                        جزئیات قرارداد
                    </h4>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{route('user-search')}}" method="post" style="width: 95%;">
                        <div class="row">
                            <div class="col-md-6 col-sm-6" style="padding-left: 0;">
                                <input type="text" name="search" class="form-control" placeholder="جستجو...">
                            </div>
                            <div class="col-md-6 col-sm-6" style="padding-right: 0;">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        {{csrf_field()}}
                    </form>
                    <table class="archive-table has-lines">
                        <tr>
                            <th>مبلغ کمیسیون</th>
                            <td>{{$item->portion->calculate_type=='percentage'?number_format($item->price_sales-$item->price_buy):number_format($item->price)}} <span class="badge badge-light">{{$item->price_type}}</span></td>
                        </tr>
                        <tr>
                            <th>سهم ها</th>
                            <th>سود</th>
                        </tr>
                        @if($item->portion->calculate_type=='percentage')
                            @php $price=$item->price_sales-$item->price_buy @endphp
                            <tr>
                                <td>
                                    سهم دارنده فایل
                                    <span class="badge badge-success">{{$item->villa->user?$item->villa->user->first_name.' '.$item->villa->user->last_name:'نا مشخص'}}</span>
                                    <span class="badge badge-primary">{{$item->portion->villa_creator}}%</span>
                                </td>
                                <td>{{number_format(($price*$item->portion->villa_creator)/100)}} <span class="badge badge-light">{{$item->price_type}}</span></td>
                            </tr>
                            <tr>
                                <td>
                                    سهم کارشناس
                                    <span class="badge badge-success">{{$item->expert?$item->expert->first_name.' '.$item->expert->last_name:'نا مشخص'}}</span>
                                    <span class="badge badge-primary">{{$item->portion->expert}}%</span>
                                </td>
                                <td>{{number_format(($price*$item->portion->expert)/100)}} <span class="badge badge-light">{{$item->price_type}}</span></td>
                            </tr>
                            <tr>
                                <td>
                                    سهم معرف
                                    <span class="badge badge-success">{{$item->user->user?$item->user->user->first_name.' '.$item->user->user->last_name:'نا مشخص'}}</span>
                                    <span class="badge badge-primary">{{$item->portion->reagent}}%</span>
                                </td>
                                <td>{{number_format(($price*$item->portion->reagent)/100)}} <span class="badge badge-light">{{$item->price_type}}</span></td>
                            </tr>
                            <tr>
                                <td>
                                    سهم معرف معرف
                                    <span class="badge badge-success">{{$item->user->user->user?$item->user->user->user->first_name.' '.$item->user->user->user->last_name:'نا مشخص'}}</span>
                                    <span class="badge badge-primary">{{$item->portion->reagent_reagent}}%</span>
                                </td>
                                <td>{{number_format(($price*$item->portion->reagent_reagent)/100)}} <span class="badge badge-light">{{$item->price_type}}</span></td>
                            </tr>
                            <tr>
                                <td>
                                    سهم خیریه
                                    <span class="badge badge-primary">{{$item->portion->charity}}%</span>
                                </td>
                                <td>{{number_format(($price*$item->portion->charity)/100)}} <span class="badge badge-light">{{$item->price_type}}</span></td>
                            </tr>
                            <tr>
                                <td>
                                    سهم کال سنتر
                                    <span class="badge badge-primary">{{$item->portion->call_center}}%</span>
                                </td>
                                <td>{{number_format(($price*$item->portion->call_center)/100)}} <span class="badge badge-light">{{$item->price_type}}</span></td>
                            </tr>
                            <tr>
                                <td>
                                    سهم خانه استانبول
                                    <span class="badge badge-primary">{{$item->portion->company}}%</span>
                                </td>
                                <td>{{number_format(($price*$item->portion->company)/100)}} <span class="badge badge-light">{{$item->price_type}}</span></td>
                            </tr>
                            <tr>
                                <td>
                                    مبغ یدکی
                                </td>
                                <td>
                                    @if($item->villa)
                                        @if($item->villa->yedki_percentage>0)
                                            {{number_format(($price*$item->villa->yedki_percentage)/100)}}
                                            <span class="badge badge-light">{{$item->price_type}}</span>
                                        @else
                                            وارد نشده
                                        @endif
                                    @else
                                        وارد نشده
                                    @endif
                                </td>
                            </tr>
                        @else
                        <tr>
                            <td>
                                سهم املاکی
                                <span class="badge badge-primary">1 از {{$item->portion->estate}}</span>
                            </td>
                            <td>{{$item->portion->estate!=0?$item->price/$item->portion->estate:0}} <span class="badge badge-light">{{$item->price_type}}</span></td>
                        </tr>
                        <tr>
                            <td>
                                سهم کارشناس
                                <span class="badge badge-success">{{$item->expert?$item->expert->first_name.' '.$item->expert->last_name:'نا مشخص'}}</span>
                                <span class="badge badge-primary">1 از {{$item->portion->expert}}</span>
                            </td>
                            <td>
                                @if(is_numeric($item->portion->expert))
                                {{$item->portion->expert!=0?$item->price/$item->portion->expert:0}} <span class="badge badge-light">{{$item->price_type}}</span>
                                @else
                                    @php
                                        $array=[];
                                        $array=explode('+',$item->portion->expert);
                                    @endphp
                                    @foreach($array as $portion)
                                        {{$portion!=0?$item->price/$portion:0}} <span class="badge badge-light">{{$item->price_type}}</span>
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                سهم کارشناس معرف مشتری
                                <span class="badge badge-success">{{$item->user->user?$item->user->user->first_name.' '.$item->user->user->last_name:'نا مشخص'}}</span>
                                <span class="badge badge-primary">1 از {{$item->portion->reagent}}</span>
                            </td>
                            <td>{{$item->portion->reagent!=0?$item->price/$item->portion->reagent:0}} <span class="badge badge-light">{{$item->price_type}}</span></td>
                        </tr>
                        <tr>
                            <td>
                                سهم کارشناس معرف ملک
                                <span class="badge badge-success">{{$item->expert2?$item->expert2->first_name.' '.$item->expert2->last_name:'نا مشخص'}}</span>
                                <span class="badge badge-primary">1 از {{$item->portion->experts_friend}}</span>
                            </td>
                            <td>{{$item->portion->experts_friend!=0?$item->price/$item->portion->experts_friend:0}} <span class="badge badge-light">{{$item->price_type}}</span></td>
                        </tr>
                        <tr>
                            <td>
                                سهم دفتر
                                <span class="badge badge-primary">1 از {{$item->portion->office}}</span>
                            </td>
                            <td>{{$item->portion->office!=0?$item->price/$item->portion->office:0}} <span class="badge badge-light">{{$item->price_type}}</span></td>
                        </tr>
                        @endif
                    </table>
                    <div class="col-md-12 mt-3">
                        <label for="file">پیوست قرارداد</label>
                        <a class="form-control text-center" href="{{url($item->file)}}" target="_blank">دانلود</a>
                    </div>
                    @if($item->card_file)
                    <div class="col-md-12 mt-3">
                        <label for="file">کارت ویزیت</label>
                        <a class="form-control text-center" href="{{url($item->card_file)}}" target="_blank">دانلود</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    @endslot
    @push('scripts')
        <script>
            relatedFunc($("input[name='rent_by']:checked").val());
            $("input[name='rent_by']").click(function() {
                var radioValue = $("input[name='rent_by']:checked").val();
                relatedFunc(radioValue)
            });
            function relatedFunc(radioValue){
                if(radioValue=='estate'){
                    $('.estate_container').removeClass('d-none')
                }else{
                    $('.estate_container').addClass('d-none')
                }
            }
        </script>
    @endpush
@endcomponent
