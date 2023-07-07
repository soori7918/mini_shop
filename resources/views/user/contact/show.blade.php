@extends('user.layouts.user')
@section('style_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jgrowl.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/contact.css') }}"/>
    <script src="https://use.fontawesome.com/83dfdfbf2c.js"></script>
    <style>

    </style>
@endsection
@section('body')

    <div class="body">

        <section class="contact_us">
            <div class="container">
                <div class="text-right py-4">
                    <h3 class="text-right">تماس با ما</h3>
                    <p class="text-right">جهت ارسال پیام فرم زیر را تکمیل نمایید</p>
                </div>
            </div>
            <div class="container bg-white shadow-sm">
                <div class="row mb-5">
                    <div class="col-lg-7 p-4 d-flex align-items-center">
                        <form action="{{route('user.contact.post')}}" method="post" class="w-100" >
                            @csrf
                            <div class="row">
                                <h3 class="py-3">ارتباط با ما</h3>
                                <div class="form-group col-lg-6 py-2 col-12">
                                    <input type="text" name="name" class="form-control" placeholder="نام و نام خانوادگی"/>
                                </div>
                                <div class="form-group col-lg-6 py-2 col-12">
                                    <input type="text" name="email" class="form-control" placeholder="ایمیل"/>
                                </div>
                                <div class="form-group col-lg-6 py-2 col-12">
                                    <input type="text" name="subject" class="form-control" placeholder="موضوع"/>
                                </div>
                                <div class="form-group col-lg-6 py-2 col-12">
                                    <input type="text" name="phone" class="form-control" placeholder="شماره تماس"/>
                                </div>
                                <div class="form-group col-lg-12 py-2 col-12">
                                    <textarea class="form-control" name="message" ></textarea>
                                </div>
                                <div class="form-group text-center py-2 col-lg-12 col-12">
                                    <button type="submit" class="btn btn-success"  >ارسال پیام</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-5 p-0">
                    <div class="contact-details">
                           <div class="d-flex align-items-center ">
                               <div class="contact_icon" >
                                   <i class="fa fa-map-marker "></i>
                               </div>
                               <div class="contact_detail d-flex px-2 flex-column">
                                    <strong class="text-white py-1">آدرس دفتر</strong>
                                    <small class="text-white  py-1">{{$setting->address}}</small>
                               </div>
                           </div>
                            <div class="d-flex align-items-center ">
                               <div class="contact_icon" >
                                   <i class="fa fa-phone"></i>
                               </div>
                               <div class="contact_detail d-flex px-2  flex-column">
                                    <strong class="text-white py-1">شماره تماس</strong>
                                    <small class="text-white  py-1">{{$setting->phone}}</small>
                               </div>
                           </div>
                            <div class="d-flex  align-items-center">
                               <div class="contact_icon" >
                                   <i class="fa fa-envelope" aria-hidden="true"></i>
                               </div>
                               <div class="contact_detail d-flex flex-column px-2 ">
                                    <strong class="text-white py-1">ایمیل</strong>
                                    <small class="text-white  py-1">{{$setting->email}}</small>
                               </div>
                           </div>

                        <div class="d-flex align-items-center justify-content-between">
                            <div class="social_networks d-flex align-items-center justify-content-between">
                                <div class="social_item d-flex flex-column align-items-center justify-content-center">
                                    <a href="{{$setting->insta}}">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </div>
                                <div class="social_item d-flex flex-column align-items-center justify-content-center">
                                    <a href="{{$setting->whatsapp}}">
                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="social_item d-flex flex-column align-items-center justify-content-center">
                                    <a href="{{$setting->whatsapp}}">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="social_item d-flex flex-column align-items-center justify-content-center">
                                    <a href="{{$setting->twitter}}"><i class="fa fa-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
    </div>
    <!-- CONTACT MESSAGE AREA END -->




@endsection
@section('script_js')
    <script type="text/javascript" src="{{ asset('js/jgrowl.min.js') }}"></script>
    @if (count($errors) > 0)
        <script type="text/javascript">
            $.jGrowl('<ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>', {
                life: 8000,
                position: 'bottom-right',
                theme: 'bg-danger'
            });
        </script>
    @endif
    @if(Session::has('flash_message'))
        <script type="text/javascript">
            $.jGrowl('{!! session("flash_message") !!}', {life: 8000, position: 'bottom-right', theme: 'bg-success'});
        </script>
    @endif
    @if(Session::has('err_message'))
        <script type="text/javascript">
            $.jGrowl('{!! session("err_message") !!}', {life: 8000, position: 'bottom-right', theme: 'bg-danger'});
        </script>
    @endif
@endsection