<?php

namespace App\Http\Controllers\Panel;

use App\Http\Requests\GalleryRequest;
use App\Photo;
use App\Setting;
use App\Gallery;
use App\Villa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{

    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'گالری‌ها';
        } elseif ('single') {
            return 'گالری';
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
        $galleries = Gallery::paginate($this->controller_paginate());
        return view('panel.galleries.index', compact('galleries'), ['title' => $this->controller_title('sum')]);
    }

    public function search(Request $request)
    {
        $galleries = Gallery::where('name', 'LIKE', '%' . $request->search . '%')->paginate(99999);
        return view('panel.galleries.index', compact('galleries'), ['title' => $this->controller_title('sum')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villas = Villa::latest()->get();
        return view('panel.galleries.create', compact('villas'), ['title' => $this->controller_title('single')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GalleryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        try {

            Gallery::create($request->only('villa_id', 'name'));

            return redirect()->route('gallery-list')->with('flash_message', 'گالری با موفقیت افزوده شد.');

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
        $gallery = Gallery::findOrFail($id);
        return view('panel.galleries.show', compact('gallery'), ['title' => $this->controller_title('single')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function photo_store(Request $request)
    {
        if (isset($request->photo)) {

            try {
                $gallery = Gallery::findOrFail($request->gallery);

            foreach ($request->photo as $val) {
                $n = $val->getClientOriginalName();
                $na = explode('.' , $n);
                $name = $na[0];
                $photo = new Photo();
                $photo->path = file_store($val, 'assets/uploads/galleries/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');;
                $photo->name = $name;
                $gallery->photo()->save($photo);


            }

            return redirect()->route('gallery-show', $request->gallery)->with('flash_message', 'تصویر با موفقیت افزوده شد.');

            } catch (\Exception $e) {

                return redirect()->back()->withInput();

            }
        } else {

            return redirect()->route('gallery-show', $request->gallery)->with('flash_message', 'تصویر انتخاب نشده است!');
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
        $gallery = Gallery::findOrFail($id);
        $villas = Villa::latest()->get();
        return view('panel.galleries.edit', compact('gallery', 'villas'), ['title' => $this->controller_title('single')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GalleryRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryRequest $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        try {

            $gallery->villa_id = $request->villa_id;
            $gallery->name = $request->name;
            $gallery->save();

            return redirect()->route('gallery-list')->with('flash_message', 'گالری با موفقیت ویرایش شد.');

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
        $gallery = Gallery::findOrFail($id);

        try {

            $gallery->delete();
            return redirect()->route('gallery-list')->with('flash_message', 'گالری با موفقیت حذف شد.');

        } catch (\Exception $e) {

            return redirect()->back();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function photo_destroy($id)
    {
        $photo = Photo::findOrFail($id);

        try {

            File::delete($photo->path);
            $photo->delete();
            return redirect()->back()->with('flash_message', 'تصویر با موفقیت حذف شد.');

        } catch (\Exception $e) {

            return redirect()->back();

        }
    }
}
