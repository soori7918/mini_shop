@extends('user.layouts.user')
@section('style_css') @endsection
@section('body')
    <!-- PRODUCT DETAILS AREA START -->
    <div class="body">
        <div class="container py-5">
            <div class="row">
                @if($projects->count())
                @foreach($projects as $project)
                    <div class="col-lg-3 col-12">
                        <div data-aos="fade-left"
                             data-aos-anchor="#example-anchor"
                             data-aos-offset="500"
                             data-aos-duration="500">

                            <a href="{{route('user.project.show',$project->slug)}}">
                                <div class="project_item bg-white shadow-sm rounded-sm my-2">
                                    <div class="project_image position-relative">
                                        <img src="{{$project->image ?: ''}}" />
                                        <div class="project_image_detail "></div>
                                        <div class="project_image_detail_1 text-white d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <i class="fa fa-map-marker  px-2"></i>
                                                <small>{{$project->getProjectCountry()."/".$project->getProjectCity()."/".$project->getProjectLocation()}}</small>
                                            </div>
                                            <div class="d-flex align-items-center  justify-content-center">
                                                <i class="fa fa-eye small px-2"></i>
                                                <small>{{number_format($project->seen)}}</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="project_content p-2">
                                        <div class="project_content_description d-flex flex-column">
                                            <strong class="py-2">{{$project->title}}</strong>
                                            <span class="py-2 text-warning font-weight-bold">{{$project->price_label}} $ {{$project->start_price}}</span>
                                            <p>{{ str_limit($project->short_description, 30)}}</p>
                                        </div>
                                        <div class="project_content_footer py-2 d-flex align-items-center justify-content-between">
                                            <ul class="project_detail">
                                                <li class="px-2"><i class="fa fa-superscript px-2" aria-hidden="true"></i>{{$project->area}}</li>
                                                <li class="px-2"><i class="fa fa-bed px-2" aria-hidden="true"></i>{{$project->bedroom}}</li>
                                                <li class="px-2"><i class="fa fa-bath px-2" aria-hidden="true"></i>{{$project->bathroom}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
                @endif
            </div>
            {{ $projects->links() }}
        </div>
    </div>
    <!-- PRODUCT DETAILS AREA END -->

@endsection
@section('script_js') @endsection