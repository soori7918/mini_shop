
<header
        class="landing_header d-flex justify-content-center align-items-center shadow-sm position-relative position-relative">
    <nav class="container">

        <div class="d-flex justify-content-center align-items-center landing_m-lg-2rem">
            <button class="landing_btn-menu bg-unset border-0 position-absolute" style="right: 10px; z-index: 2;">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                     class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                          d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </button>
            <a href="#" class="logo">
                <img src="https://estate4istanbul.com/wp-content/uploads/2022/02/خرید-ملک-در-استانبول3-1.png"
                     style="width: 35%;" alt="">
            </a>
            <menu class="" id="landing_menu">
                <ul class="d-flex landing_text-menu">
                    <button class="landing_close bg-unset border-0 mt-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                             class="bi bi-x" viewBox="0 0 16 16">
                            <path
                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </button>
                    @foreach($menus as $menu)
                        {{--                    <li class="pad px-2 py-4">--}}
                        {{--                        <a href="../page/index.html" class="text-a px-2">{{$menu->title}}</a>--}}
                        {{--                    </li>--}}
                        <li class="pad px-2 py-4 {{$menu->children->count() ? 'position-relative li-hover' : '' }}">
                            <a href="../page/about-us.html" class="text-a px-2">{{$menu->title}}</a>

                            @if($menu->children->count())
                                <ul class="sub-menu">
                                    @foreach($menu->children as $child)
                                        <li class="menu-item px-lg-3 py-2 ">
                                            <a class="menu-item-link py-2" href="{{$child->url}}">{{$child->title}}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            @endif
                        </li>
                    @endforeach
                    {{--                    <li class="w-100 line"></li>--}}
                    {{--                    <li class="pad px-2 py-4">--}}
                    {{--                        <a href="../page/about-us.html" class="text-a px-2">مشاوره رایگان</a><img src="" alt="">--}}
                    {{--                    </li>--}}
                    {{--                    <li class="w-100 line"></li>--}}
                    {{--                    <li class="pad px-2 py-4">--}}
                    {{--                        <a href="../page/about-us.html" class="text-a px-2">شهروندی</a>--}}
                    {{--                    </li>--}}
                    {{--                    <li class="w-100 line"></li>--}}
                    {{--                    <li class="pad px-2 py-4 position-relative li-hover">--}}
                    {{--                        <a href="../page/about-us.html" class="text-a px-2">پروژه ها</a>--}}

                    {{--                        <ul class="sub-menu">--}}
                    {{--                            <li class="menu-item px-lg-3 py-2 ">--}}
                    {{--                                <a class="menu-item-link py-2" href="#">پروژه های آفیس</a>--}}
                    {{--                            </li>--}}
                    {{--                            <li class="menu-item px-3 py-2 ">--}}
                    {{--                                <a class="menu-item-link py-2" href="#">پروژه های ویلایی</a>--}}
                    {{--                            </li>--}}
                    {{--                            <li class="menu-item px-3 py-2 ">--}}
                    {{--                                <a class="menu-item-link py-2" href="#">پروژه ای کانسپت--}}
                    {{--                                    هتل--}}
                    {{--                                </a>--}}
                    {{--                            </li>--}}
                    {{--                            <li class="menu-item px-3 py-2 ">--}}
                    {{--                                <a class="menu-item-link py-2" href="#">پروژه های اقساطی</a>--}}
                    {{--                            </li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}
                    {{--                    <li class="w-100 line"></li>--}}
                    {{--                    <li class="pad px-2 py-4">--}}
                    {{--                        <a href="../page/about-us.html" class="text-a px-2">اخبار و مقالات به روز ترکیه</a>--}}
                    {{--                    </li>--}}
                    {{--                    <li class="w-100 line"></li>--}}
                    {{--                    <li class="pad px-2 py-4">--}}
                    {{--                        <a href="../page/about-us.html" class="text-a px-2">درباره ما</a>--}}
                    {{--                    </li>--}}
                    {{--                    <li class="w-100 line"></li>--}}
                    {{--                    <li class="pad px-2 py-4">--}}
                    {{--                        <a href="../page/about-us.html" class="text-a px-2">تماس با ما</a>--}}
                    {{--                    </li>--}}
                </ul>
            </menu>
        </div>
    </nav>
</header>