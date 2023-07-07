<?php

namespace App\Http\Controllers\Panel;

use App\Http\Requests\PostRequest;
use App\Setting;
use App\Newsletter;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class NewsletterController extends Controller
{

    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'کابران عضو شده';
        } elseif ('single') {
            return 'کاربر';
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
    public function home()
    {
        $newsletters = Newsletter::where('page_name', 'home')->latest()->paginate($this->controller_paginate());
        return view('panel.newsletters.index', compact('newsletters'), ['title' => $this->controller_title('sum')]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function location()
    {
        $newsletters = Newsletter::where('page_name', 'location')->latest()->paginate($this->controller_paginate());
        return view('panel.newsletters.index', compact('newsletters'), ['title' => $this->controller_title('sum')]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function villa()
    {
        $newsletters = Newsletter::where('page_name', 'villa')->latest()->paginate($this->controller_paginate());
        return view('panel.newsletters.index', compact('newsletters'), ['title' => $this->controller_title('sum')]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blog()
    {
        $newsletters = Newsletter::where('page_name', 'blog')->latest()->paginate($this->controller_paginate());
        return view('panel.newsletters.index', compact('newsletters'), ['title' => $this->controller_title('sum')]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = Newsletter::find($id);

        Post::where('author_id', $news->id)->delete();


        $news->delete();

        return redirect()->route('newsletter-blog')->with('flash_message', 'با موفقیت حذف شد.');

    }
}
