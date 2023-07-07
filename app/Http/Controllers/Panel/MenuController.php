<?php

namespace App\Http\Controllers\Panel;

use App\Article;
use App\ArticleCategory;
use App\ArticleAttribute;
use App\AttributeArticleJoin;
use App\Photo;
use App\Menu;
use App\Upload;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class MenuController extends Controller
{
    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'منو ها';
        } elseif ('single') {
            return 'منو';
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
        $menus = Menu::paginate($this->controller_paginate());
        return view('panel.menu.index', compact('menus'), ['title' => $this->controller_title('sum')]);
    }

    public function create()
    {
        $menus = Menu::paginate($this->controller_paginate());

        return view('panel.menu.create',compact('menus'), ['title' => $this->controller_title('single')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:191',
            'url' => 'required',
            'parent_id' => 'nullable',
        ]);

        try {
            $menu = Menu::create([
                'title' => $request->title,
                'url' => $request->url,
                'parent_id' => $request->parent_id,
                'slug' => $request->slug,
            ]);


            return redirect()->route('menu-list')->with('flash_message', 'منو با موفقیت آپلود شد');

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
        $menu = Menu::findOrFail($id);

        try {
            $menu->delete();
            return redirect()->route('menu-list')->with('flash_message', 'منو با موفقیت حذف شد');

        } catch (\Exception $e) {

            return redirect()->back();

        }
    }

    public function update(Request $request)
    {
//        Optimizer::saveAs('assets/uploads/menus/1399-07-06/photos/photo-90361b1bd5b3f4e5f11abf35f0395bd2.jpg');
//
        $this->validate($request, [
            'title' => 'required|max:191',
            'url' => 'required',
            'parent_id' => 'nullable',
            'slug' => 'required',
        ]);

        $post = Menu::findOrFail($request->id);

        try {

            $post->title = $request->title;
            $post->url = $request->url;
            $post->parent_id = $request->parent_id;
            $post->slug = $request->slug;
            $post->save();


            return redirect()->route('menu-list')->with('flash_message', 'منو با موفقیت ویرایش شد.');

        } catch (\Exception $e) {
            return redirect()->back()->withInput();

        }


    }

    public function edit($id)
    {
        $menu = Menu::where('id', $id)->first();
        $menus = Menu::all();
        $title = 'ویرایش منو';
        return view('panel.menu.edit', compact('menu', 'title','menus'));
    }
}