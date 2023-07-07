<?php

namespace App\Http\Controllers\Panel;

use App\Category;
use App\Http\Requests\InsRequest;
use App\Photo;
use App\Setting;
use App\Insurance;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class InsuranceController extends Controller
{

    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'بیمه ها';
        } elseif ('single') {
            return 'بیمه';
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
        $posts = Insurance::latest()->paginate($this->controller_paginate());
        return view('panel.insurance.index', compact('posts'), ['title' => $this->controller_title('sum')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.insurance.create', ['title' => $this->controller_title('single')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsRequest $request)
    {
//        try {

            $post = Insurance::create($request->only('title', 'slug', 'text'));

            if ($request->hasFile('photo')) {
                $photo = new Photo();
                $photo->path = file_store($request->photo, 'assets/uploads/insurances/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');;
                $post->photo()->save($photo);
            }

            return redirect()->route('insurance-list')->with('flash_message', 'بیمه با موفقیت افزوده شد.');

//        } catch (\Exception $e) {
//
//            return redirect()->back()->withInput();
//
//        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Insurance::findOrFail($id);
        return view('panel.insurance.edit', compact('post'), ['title' => $this->controller_title('single')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(InsRequest $request, $id)
    {
        $post = Insurance::findOrFail($id);

        try {

            $post->title = $request->title;
            $post->slug = $request->slug;
            $post->text = $request->text;
            $post->save();

            if ($request->hasFile('photo')) {
                if ($post->photo) {
                    File::delete($post->photo->path);
                    $post->photo->delete();
                    $photo = new Photo();
                    $photo->path = file_store($request->photo, 'assets/uploads/insurances/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
                    $post->photo()->save($photo);
                } else {
                    $photo = new Photo();
                    $photo->path = file_store($request->photo, 'assets/uploads/insurances/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
                    $post->photo()->save($photo);
                }
            }

            return redirect()->route('insurance-list')->with('flash_message', 'بیمه با موفقیت ویرایش شد.');

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
        $post = Insurance::findOrFail($id);

        try {

            $post->delete();
            return redirect()->route('insurance-list')->with('flash_message', 'بیمه با موفقیت حذف شد.');

        } catch (\Exception $e) {

            return redirect()->back();

        }
    }
}
