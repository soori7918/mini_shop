<?php

namespace App\Http\Controllers\Panel;

use App\Article;
use App\ArticleCategory;
use App\ArticleAttribute;
use App\AttributeArticleJoin;
use App\Photo;
use App\Faq;
use App\Upload;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class FaqController extends Controller
{
    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'سوالات متداول ها';
        } elseif ('single') {
            return 'سوال متداول';
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
        $items = Faq::paginate($this->controller_paginate());
        return view('panel.faq.index', compact('items'), ['title' => $this->controller_title('sum')]);
    }

    public function create()
    {
        return view('panel.faq.create', ['title' => $this->controller_title('single')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $this->validate($request, [
//            'title' => 'required|max:191',
//        ]);

        try {
            $faq = Faq::create([
                'question' => $request->question,
                'answer' => $request->answer,
            ]);

//            if ($request->hasFile('photo')) {
//                $photo = new Photo();
//                $photo->path = file_store($request->photo, 'assets/uploads/faqs/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');;
//                $faq->photo()->save($photo);
//            }
            return redirect()->route('faq-list')->with('flash_message', 'سوال متداول با موفقیت آپلود شد');

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
        $faq = Faq::findOrFail($id);

        try {
            $faq->delete();
            return redirect()->route('faq-list')->with('flash_message', 'سوال متداول با موفقیت حذف شد');

        } catch (\Exception $e) {

            return redirect()->back();

        }
    }

    public function update(Request $request)
    {
//        Optimizer::saveAs('assets/uploads/faqs/1399-07-06/photos/photo-90361b1bd5b3f4e5f11abf35f0395bd2.jpg');
//
//        return redirect()->back();
//        $this->validate($request, [
//            'title' => 'required|max:191',
//            'type' => 'required',
//            'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:10240',
//        ]);

        $post = Faq::findOrFail($request->id);

        try {

            $post->question = $request->question;
            $post->answer = $request->answer;
            $post->update();

//            if ($request->hasFile('photo')) {
//                if ($post->photo) {
//                    File::delete($post->photo->path);
//                    $post->photo->delete();
//                    $photo = new Photo();
//                    $photo->path = file_store($request->photo, 'assets/uploads/faqs/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
//                    $post->photo()->save($photo);
//                } else {
//                    $photo = new Photo();
//                    $photo->path = file_store($request->photo, 'assets/uploads/faqs/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
//                    $post->photo()->save($photo);
//                }
//            }
            return redirect()->route('faq-list')->with('flash_message', 'سوال متداول با موفقیت ویرایش شد.');

        } catch (\Exception $e) {
            return redirect()->back()->withInput();

        }


    }

    public function edit($id)
    {
        $item = Faq::where('id', $id)->first();
        $title = 'ویرایش سوال متداول';

        return view('panel.faq.edit', compact('item', 'title'));
    }
}