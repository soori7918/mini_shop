@extends('user.layouts.user')
@section('style_css') @endsection
@section('body')
    <div class="body">
       <section class="conseling_section">
            <img src="{{asset('user/pic/slider1.jpg')}}" />
       </section>
        <section class="project_list">
            <div class="container mt-5 my-5">
                <div class="row">
                    @if($projects->count())
                        @foreach($projects as $project)
                            <div class="col-lg-6 col-12 px-3 my-3">
                                <div class="bg-white shadow-sm project_list_card">
                                    <div class="row">
                                        <div class="col-lg-4 col-12 p-0">
                                            <div class="img_card">
                                                <img src="{{$project->image ?: ''}}" >
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-12 justify-content-right p-2">
                                            <h2 class="py-2">{{$project->title}}</h2>
                                            <div class="section_title_border"></div>
                                            <ul>
                                                <li class="py-1">مساحت پروژه :{{$project->area}}</li>
                                                <li class="py-1">تعداد خواب :{{$project->bedroom}}</li>
                                                <li class="py-1">تعداد حمام : {{$project->bathroom}}</li>
                                            </ul>
                                            <p>{{ str_limit($project->short_description, 30)}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                            <div class="row py text-center">
                                <div class="col-lg-4 col-12 mx-auto">
                                    <a class="btn btn-warning" href="https://api.whatsapp.com/send/?phone={{$setting->conseling_phone}}&text=خرید-خانه-در-استانبول&type=phone_number&app_absent=0">درخواست مشاوره</a>
                                </div>
                            </div>
                </div>
            </div>

        </section>
    </div>


@endsection
@section('script_js') @endsection