<?php

namespace App\Http\Controllers\User;

use App\About;
use App\Article;
use App\Villa;
use App\Category;
use Carbon\Carbon;
use function Couchbase\defaultDecoder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $items = Category::with(['articles'=> function($q){
            $q->where('status',1);
        }])->orderby('created_at','desc')->get();
        $title = 'اخبار-و-مقالات-به-روز-ترکیه';
        return view('user.blog.index',compact('items'),['title'=>$title]);
    }

    public function show($id)
    {
        $item=Article::where('slug',$id)->first();
        $prev = Article::where('type',$item->type)->where('id', '<', $item->id)->max('id');
        $prev_item=Article::find($prev);

        $next = Article::where('type',$item->type)->where('id', '>', $item->id)->min('id');
        $next_item=Article::find($next);
        if(!$item)
        {
            abort(404);
        }
        $item->seen+=1;
        $item->update();

        $title="مشاهده".'('.$item->title.')';
        $items=Article::where('status',1)->orderBy('id','DESC')->where('id','!=',$item->id)->take(6)->get();
//        $villas=Villa::where('status','published')->where('villa_vip',1)->orderBy('id','DESC')->take(4)->get();
        $categories=Category::orderBy('id','DESC')->take(4)->get();
        return view('user.blog.show',compact('item','prev_item','next_item','items','categories'),['title'=>$title]);
    }
}
