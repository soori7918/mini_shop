<?php

namespace App\Http\Controllers\Panel;

use App\Category;
use App\Http\Requests\PostRequest;
use App\Location;
use App\Photo;
use App\Setting;
use App\Article;
use App\Http\Controllers\Controller;
use App\Villa;
use App\Activity;
use Illuminate\Http\Request;
use  Carbon\Carbon;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{

    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'مقالات';
        } elseif ('single') {
            return 'مقاله';
        }
    }

    public function controller_paginate()
    {
        $settings = Setting::select('paginate')->latest()->firstOrFail();
        return $settings->paginate;
    }

    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type=null)
    {
        $title=' مقالات';
        if($type=='article'){$title=' مقالات';}
        elseif($type=='news'){$title=' اخبار';}
        elseif($type=='eghamat'){$title=' اقامت ترکیه';}
        elseif($type=='shahrvandi'){$title=' شهروندی ترکیه';}
        elseif($type=='job'){$title=' کسب و کار در ترکیه';}
        elseif($type=='migration'){$title=' فرهنگ مهاجرت';}
        $posts = Article::where('type',$type==null?'article':$type)->latest()->paginate($this->controller_paginate());
        return view('panel.article.index', compact('posts','type'), ['title' => $title]);
    }

//    public function search(Request $request)
//    {
//        $categories = Category::where('name', 'LIKE', '%' . $request->search . '%')->get();
//        $cat = array();
//        foreach ($categories as $item) {
//            array_push($cat, $item->id);
//        }
//        $posts = Article::where('title', 'LIKE', '%' . $request->search . '%')->orWhereIn('category_id', $cat)->paginate(99999);
//        return view('panel.article.index', compact('posts'), ['title' => $this->controller_title('sum')]);
//    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type=null)
    {
        $categories = Category::where('type', $type==null?'post':$type)->latest()->get();
        $title=' مقالات';
        if($type=='article'){$title=' مقالات';}
        elseif($type=='news'){$title=' اخبار';}
        elseif($type=='eghamat'){$title=' اقامت ترکیه';}
        elseif($type=='shahrvandi'){$title=' شهروندی ترکیه';}
        elseif($type=='job'){$title='  کسب و کار در ترکیه';}
        elseif($type=='migration'){$title=' فرهنگ مهاجرت';}
        return view('panel.article.create',compact('categories','type'), ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $post = Article::create($request->only('category_id','title', 'slug', 'text_short', 'text','status','author', 'page_title', 'keywords', 'description','type'));
                $post->user_id=auth()->user()->id;
            if ($request->hasFile('photo')) {
                $post->photo = file_store($request->photo, 'assets/uploads/article/'.$request->type.'/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');;
            }

            if ($request->hasFile('file')) {
                $post->file = file_store($request->file, 'assets/uploads/article/'.$request->type.'/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/pdf/', 'pdf-');;
            }
            $post->save();
          
            return redirect()->route('article-list',$post->type)->with('flash_message', ' با موفقیت افزوده شد.');

        } catch (\Exception $e) {
            return redirect()->back()->withInput();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Article::findOrFail($id);
        return view('panel.article.show', compact('post'), ['title' => $this->controller_title('single')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Article::findOrFail($id);
        $categories = Category::where('type', $post->type==null?'article':$post->type)->latest()->get();
        $title=' مقالات';
        if($post->type=='article'){$title=' مقالات';}
        elseif($post->type=='news'){$title=' اخبار';}
        elseif($post->type=='eghamat'){$title=' اقامت ترکیه';}
        elseif($post->type=='shahrvandi'){$title=' شهروندی ترکیه';}
        elseif($post->type=='job'){$title='  کسب و کار در ترکیه';}
        elseif($post->type=='migration'){$title=' فرهنگ مهاجرت';}
        return view('panel.article.edit', compact('post','categories'), ['title' => $title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Article::findOrFail($id);

        try {

            $post->category_id = $request->category_id;
//            $post->author_id = $request->author_id;
            $post->title = $request->title;
            $post->slug = $request->slug;
            $post->text_short = $request->text_short;
            $post->text = $request->text;
            $post->status = $request->status;
            $post->page_title = $request->page_title;
            $post->keywords = $request->keywords;
            $post->description = $request->description;
            if ($request->hasFile('photo')) {
                if ($post->photo!=null) {
                    File::delete($post->photo);
                    $post->photo = file_store($request->photo, 'assets/uploads/article/'.$request->type.'/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
                } else {
                    $post->photo = file_store($request->photo, 'assets/uploads/article/'.$request->type.'/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
                }
            }
            if ($request->hasFile('file')) {
                if ($post->file!=null) {
                    File::delete($post->file);
                    $post->file = file_store($request->file, 'assets/uploads/article/'.$request->type.'/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/pdf/', 'pdf-');
                } else {
                    $post->file = file_store($request->file, 'assets/uploads/article/'.$request->type.'/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/pdf/', 'pdf-');
                }
            }
            $post->save();

            Activity::publish('edit',$post)->save();
            return redirect()->route('article-list',$post->type)->with('flash_message', ' با موفقیت ویرایش شد.');

        } catch (\Exception $e) {

            return redirect()->back()->withInput();

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Article::findOrFail($id);

        try {
            File::delete($post->photo);
            File::delete($post->file);
            $post->delete();
    
            return redirect()->back()->with('flash_message', 'مقاله با موفقیت حذف شد.');

        } catch (\Exception $e) {
            return redirect()->back();

        }
    }


}
