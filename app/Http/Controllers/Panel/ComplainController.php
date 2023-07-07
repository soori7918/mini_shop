<?php

namespace App\Http\Controllers\Panel;

use App\Category;
use App\Http\Requests\PostRequest;
use App\Location;
use App\Photo;
use App\Complain;
use App\Setting;
use App\Http\Controllers\Controller;
use App\User;
use App\Villa;
use App\Activity;
use Illuminate\Http\Request;
use  Carbon\Carbon;
use Illuminate\Support\Facades\File;

class ComplainController extends Controller
{

    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'شکایات';
        } elseif ('single') {
            return 'شکایت';
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
    public function index()
    {
        if (auth()->user()->hasRole("مدیر")) {
            $posts = Complain::where('status',0)->latest()->paginate($this->controller_paginate());
        }else{
            $posts = Complain::where('user_id',auth()->id())->latest()->paginate($this->controller_paginate());
        }
        
        return view('panel.complain.index', compact('posts'), ['title' => $this->controller_title('sum')]);
    }

//    public function search(Request $request)
//    {
//        $categories = Category::where('name', 'LIKE', '%' . $request->search . '%')->get();
//        $cat = array();
//        foreach ($categories as $item) {
//            array_push($cat, $item->id);
//        }
//        $posts = Complain::where('title', 'LIKE', '%' . $request->search . '%')->orWhereIn('category_id', $cat)->paginate(99999);
//        return view('panel.complain.index', compact('posts'), ['title' => $this->controller_title('sum')]);
//    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $categories = Category::where('type', 'post')->latest()->get();
        $users=User::all();
        return view('panel.complain.create',compact('users'), ['title' => $this->controller_title('single')]);
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

            $post = new Complain();
            $post->for_id=$request->for_id;
            $post->date=$request->date;
            $post->title=$request->title;
            $post->title=$request->title;
            //$post->text_short=$request->text_short;
            $post->text=$request->text;
            $post->user_id=auth()->user()->id;
            if ($request->hasFile('file')) {
                $post->file = file_store($request->file, 'assets/uploads/complain/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/files/', 'files-');;
            }
            $post->save();
            return redirect()->route('complain-list')->with('flash_message', 'شکایت با موفقیت ثبت شد.');

        } catch (\Exception $e){
            dd($e);
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
        $post = Complain::findOrFail($id);
        return view('panel.complain.show', compact('post'), ['title' => $this->controller_title('single')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Complain::findOrFail($id);
        if ($post->status>0){
            if (!auth()->user()->hasRole('مدیر')){
                return back()->with('err_message', 'شکایت موردنظر در دست اقدام قرار گرفته ، به همین دلیل امکان ویرایش وجود ندارد');
            }
        }
        $users=User::all();
        return view('panel.complain.edit', compact('post','users'), ['title' => $this->controller_title('single')]);
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
        $post = Complain::findOrFail($id);

        try {

            $post->for_id=$request->for_id;
            $post->date=$request->date;
            $post->title=$request->title;
            $post->title=$request->title;
            //$post->text_short=$request->text_short;
            $post->text=$request->text;
            $post->user_id=auth()->user()->id;
            if ($request->hasFile('file')) {
                $post->file = file_store($request->file, 'assets/uploads/complain/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/files/', 'files-');;
            }
            $post->update();

            return redirect()->route('complain-list')->with('flash_message', 'شکایت با موفقیت ویرایش شد.');

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
        $post = Complain::findOrFail($id);

        try {
            File::delete($post->photo);
            File::delete($post->file);
            $post->delete();
            return redirect()->back()->with('flash_message', 'شکایت با موفقیت حذف شد.');

        } catch (\Exception $e) {
            return redirect()->back();

        }
    }

}
