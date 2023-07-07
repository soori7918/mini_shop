@if(isset($blog))
    <div class="ltn__blog-item ltn__blog-item-3">
        <div class="ltn__blog-img">
            <a href="{{route('user.blog.show',$blog->id)}}"><img src="{{$blog->photo?url($blog->photo):url('assets/user/pic/blog1.jpg')}}" alt="{{$blog->title}}"></a>
        </div>
        <div class="ltn__blog-brief">
            <div class="ltn__blog-meta">
                <ul>
                    <li class="ltn__blog-author">
                        <a href="{{route('user.blog.show',$blog->id)}}"><i class="far fa-user"></i>{{$blog->user?$blog->user->first_name.' '.$blog->last_name:$blog->author}}</a>
                    </li>
                    {{--                                            <li class="ltn__blog-tags">--}}
                    {{--                                                <a href="#"><i class="fas fa-tags"></i>Decorate</a>--}}
                    {{--                                            </li>--}}
                </ul>
            </div>
            <h3 class="ltn__blog-title"><a href="{{route('user.blog.show',$blog->id)}}">{{$blog->title}}</a></h3>
            <div class="ltn__blog-meta-btn">
                <div class="ltn__blog-meta">
                    <ul>
                        <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>{{my_jdate($blog->created_at,'Y/m/d')}}</li>
                    </ul>
                </div>
                <div class="ltn__blog-btn">
                    <a href="{{route('user.blog.show',$blog->id)}}">بیشتر</a>
                </div>
            </div>
        </div>
    </div>
@endif