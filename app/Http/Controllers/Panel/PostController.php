<?php

namespace App\Http\Controllers\Panel;

use App\Category;
use App\Http\Requests\PostRequest;
use App\Location;
use App\Photo;
use App\Setting;
use App\Post;
use App\Http\Controllers\Controller;
use App\Villa;
use Illuminate\Http\Request;
use  Carbon\Carbon;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{

    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'نوشته‌ها';
        } elseif ('single') {
            return 'نوشته';
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

 
    public function index($type=null)
    {
        $posts = Post::latest()->paginate($this->controller_paginate());
        $title=' مقالات';
        if($type=='article'){$title=' مقالات';}
        elseif($type=='news'){$title=' اخبار';}
        elseif($type=='eghamat'){$title=' اقامت ترکیه';}
        elseif($type=='shahrvandi'){$title=' شهروندی ترکیه';}
        elseif($type=='job'){$title=' کسب و کار و ثبت شرکت';}
        return view('panel.posts.index', compact('posts'), ['title' => $title]);
    }

    public function search(Request $request)
    {
        $categories = Category::where('name', 'LIKE', '%' . $request->search . '%')->get();
        $cat = array();
        foreach ($categories as $item) {
            array_push($cat, $item->id);
        }
        $posts = Post::where('title', 'LIKE', '%' . $request->search . '%')->orWhereIn('category_id', $cat)->paginate(99999);
        return view('panel.posts.index', compact('posts'), ['title' => $this->controller_title('sum')]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type=null)
    {
        $title=' مقالات';
        if($type=='article'){$title=' مقالات';}
        elseif($type=='news'){$title=' اخبار';}
        elseif($type=='eghamat'){$title=' اقامت ترکیه';}
        elseif($type=='shahrvandi'){$title=' شهروندی ترکیه';}
        elseif($type=='job'){$title=' کسب و کار و ثبت شرکت';}
        $categories = Category::where('type', $type==null?'post':$type)->latest()->get();
        return view('panel.posts.create', compact('categories','type'), ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        try {

            $post = Post::create($request->only('category_id', 'author_id', 'title', 'slug', 'body', 'page_title', 'keywords', 'description', 'status'));

            if ($request->hasFile('photo')) {
                $photo = new Photo();
                $photo->path = file_store($request->photo, 'assets/uploads/posts/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');;
                $post->photo()->save($photo);
            }

//            if ($request->hasFile('slider')) {
//                $photo_slider = new Photo();
//                $photo_slider->path = file_store($request->slider, 'assets/uploads/posts/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');;
//
//                $post->slider = $photo_slider->path;
//                $post->save();
//            }


            return redirect()->route('post-list')->with('flash_message', 'نوشته با موفقیت افزوده شد.');

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
        $post = Post::findOrFail($id);
        $title=' مقالات';
        if($post->type=='article'){$title=' مقالات';}
        elseif($post->type=='news'){$title=' اخبار';}
        elseif($post->type=='eghamat'){$title=' اقامت ترکیه';}
        elseif($post->type=='shahrvandi'){$title=' شهروندی ترکیه';}
        elseif($post->type=='job'){$title=' کسب و کار و ثبت شرکت';}
        return view('panel.posts.show', compact('post'), ['title' => $title]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::where('type', $post->type==null?'post':$post->type)->latest()->get();
        $title=' مقالات';
        if($post->type=='article'){$title=' مقالات';}
        elseif($post->type=='news'){$title=' اخبار';}
        elseif($post->type=='eghamat'){$title=' اقامت ترکیه';}
        elseif($post->type=='shahrvandi'){$title=' شهروندی ترکیه';}
        elseif($post->type=='job'){$title=' کسب و کار و ثبت شرکت';}
        return view('panel.posts.edit', compact('post', 'categories'), ['title' => $title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        try {

            $post->category_id = $request->category_id;
            $post->author_id = $request->author_id;
            $post->title = $request->title;
            $post->slug = $request->slug;
            $post->body = $request->body;
            $post->page_title = $request->page_title;
            $post->keywords = $request->keywords;
            $post->description = $request->description;
            $post->status = $request->status;
            $post->save();

            if ($request->hasFile('photo')) {
                if ($post->photo) {
                    File::delete($post->photo->path);
                    $post->photo->delete();
                    $photo = new Photo();
                    $photo->path = file_store($request->photo, 'assets/uploads/posts/'.$post->type.'/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
                    $post->photo()->save($photo);
                } else {
                    $photo = new Photo();
                    $photo->path = file_store($request->photo, 'assets/uploads/posts/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
                    $post->photo()->save($photo);
                }
            }


//            if ($request->hasFile('slider')) {
//                $photo_slider = new Photo();
//                $photo_slider->path = file_store($request->slider, 'assets/uploads/posts/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');;
//
//                $post->slider = $photo_slider->path;
//                $post->save();
//            }

         
            return redirect()->route('post-list')->with('flash_message', 'نوشته با موفقیت ویرایش شد.');

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
        $post = Post::findOrFail($id);

        try {

            $post->delete();
            
            return redirect()->route('post-list')->with('flash_message', 'نوشته با موفقیت حذف شد.');

        } catch (\Exception $e) {

            return redirect()->back();

        }
    }

    
}
