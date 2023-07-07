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

class ServiceController extends Controller
{
    public function index($slug=null)
    {
        $items=About::where('page','service')->where('status','active')->orderBy('id','ASC')->get();
        return view('user.service.index',compact('items'),['title'=>'خدمات']);
    }
    public function show($id)
    {
        $item=About::find($id);
        if($item->page!='service' || $item->text_input==null || $item->text_input=='' || $item->status!='active')
        {
            abort(404);
        }
        $blog=Article::where('status',1)->orderBy('id','DESC')->where('id','!=',$item->id)->take(6)->get();
        $villas=Villa::where('status','published')->where('villa_vip',1)->orderBy('id','DESC')->take(4)->get();
        $projects=Category::where('type', 'villa')->where('status', 'published')->orderBy('id','DESC')->take(4)->get();
        return view('user.service.show',compact('item','blog','villas','projects'),['title'=>'خدمت ('.$item->title.') ']);
    }
}
