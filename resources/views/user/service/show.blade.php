@extends('user.layouts.user')
@section('style_css')
  <style>
      .ltn__page-details-inner.ltn__blog-details-inner img {
          width: 90% !important;
          height: auto !important;
      }
  </style>
@endsection
@section('body')

  <!-- PAGE DETAILS AREA START (blog-details) -->
  <div class="ltn__page-details-area ltn__blog-details-area mb-120">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="ltn__blog-details-wrap">
            <div class="ltn__page-details-inner ltn__blog-details-inner">
              <h2 class="ltn__blog-title">
                {{$item->title}}
              </h2>
              {!! $item->text_input !!}
            </div>
          </div>
        </div>
        <div class="col-lg-4 mt-0">
          <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar---">
            @if(count($villas))
              <div class="widget ltn__popular-product-widget">
                <h4 class="ltn__widget-title ltn__widget-title-border-2">ملک های پیشنهادی</h4>
                <div class="row ltn__popular-product-widget-active slick-arrow-1">
                  @foreach($villas as $villa)
                    <div class="col-lg-12 px-3">
                      @include('user.includes.villaCard',['villa'=>$villa])
                    </div>
                  @endforeach
                </div>
              </div>
            @endif
            @if(count($projects))
              <div class="widget ltn__popular-post-widget">
                <h4 class="ltn__widget-title ltn__widget-title-border-2">آخرین پروژه ها</h4>
                <ul>
                  @foreach($projects as $project)
                    <li>
                      <div class="popular-post-widget-item clearfix">
                        <div class="popular-post-widget-img">
                          <a href="{{route('user.project.show',$project->id)}}">
                            @if(count($project->photos)>0)
                              <img src="{{url($project->photos[0]->path)}}"
                                   alt="{{$project->name}}">
                            @else
                              <img src="{{$project->pic!=null?url($project->pic):url('assets/user/pic/product.jpg')}}"
                                   alt="{{$project->name}}">
                            @endif
                          </a>
                        </div>
                        <div class="popular-post-widget-brief">
                          <h6>
                            <a href="{{route('user.villas.search',[$project->id,'room_num'=>['all'],'type_info'=>'all','city_id'=>'all'])}}">
                              {{$project->name}}
                            </a>
                          </h6>
                          <h6>
                            <a href="{{route('user.villas.search',[$project->id,'room_num'=>['all'],'type_info'=>'all','city_id'=>'all'])}}">
                              شروع قیمت از : {{number_format($project->price)}} لیر
                            </a>
                          </h6>
                          <div class="ltn__blog-meta">
                            <ul>
                              <li class="ltn__blog-date">
                                <a href="{{route('user.villas.search',[$project->id,'room_num'=>['all'],'type_info'=>'all','city_id'=>'all'])}}"><i
                                          class="far fa-calendar-alt"></i>{{my_jdate($project->created_at,'Y/m/d')}}
                                </a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </li>
                  @endforeach
                </ul>
              </div>
            @endif
            @if(count($blog))
              <div class="widget ltn__top-rated-product-widget">
                <h4 class="ltn__widget-title ltn__widget-title-border-2">آخرین نوشته ها</h4>
                <ul>
                  @foreach($blog as $blogs)
                    <li>
                      <div class="top-rated-product-item clearfix">
                        <div class="top-rated-product-img">
                          <a href="{{route('user.blog.show',$blogs->id)}}"><img
                                    src="{{$blogs->photo?url($blogs->photo):url('assets/user/pic/product.jpg')}}"
                                    alt="#"></a>
                        </div>
                        <div class="top-rated-product-info">
                          <h6><a href="{{route('user.blog.show',$blogs->id)}}">{{$blogs->title}} </a>
                          </h6>
                          <div class="product-price">
                            <span><i class="far fa-eye"></i> {{$blogs->seen}} </span>
                          </div>
                        </div>
                      </div>
                    </li>
                  @endforeach
                </ul>
              </div>
            @endif
          </aside>
        </div>
      </div>
    </div>
  </div>
  <!-- PAGE DETAILS AREA END -->

@endsection
@section('script_js') @endsection