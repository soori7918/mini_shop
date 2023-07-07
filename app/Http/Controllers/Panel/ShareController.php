<?php

namespace App\Http\Controllers\Panel;

use App\Category;
use App\Http\Requests\PostRequest;
use App\Photo;
use App\Setting;
use App\Share;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ShareController extends Controller
{

    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'لینک';
        } elseif ('single') {
            return 'لینک';
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
        $posts = Share::paginate($this->controller_paginate());
        return view('panel.share.index', compact('posts'), ['title' => $this->controller_title('sum')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.Share.create', ['title' => $this->controller_title('single')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if ($request->hasFile('photo')) {
                $photo = file_store($request->photo, 'assets/uploads/Shares/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');;
            }

            if ($request->hasFile('background')) {
                $background = file_store($request->background, 'assets/uploads/Shares/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');;
            }

            $post = Share::create([
                'text' => $request->text,
                'photo' => $photo,
                'background' => $background,
            ]);

            return redirect()->route('Share-list')->with('flash_message', 'نوشته با موفقیت افزوده شد.');

        } catch (\Exception $e) {

            return redirect()->back()->withInput();

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $item = Share::findOrFail($id);
        return view('panel.share.edit', compact('item'), ['title' => $this->controller_title('single')]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $post = Share::findOrFail($request->id);

        try {

            $post->link = $request->link;
            $post->save();

            return redirect()->route('share-list')->with('flash_message', 'با موفقیت ویرایش شد');

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
