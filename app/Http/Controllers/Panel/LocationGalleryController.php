<?php

namespace App\Http\Controllers\Panel;

use App\Http\Requests\GalleryRequest;
use App\Photo;
use App\Setting;
use App\LocationGallery;
use App\Http\Controllers\Controller;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LocationGalleryController extends Controller
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
        $location_galleries = LocationGallery::paginate($this->controller_paginate());
        return view('panel.location-galleries.index', compact('location_galleries'), ['title' => $this->controller_title('sum')]);
    }

    public function search(Request $request)
    {
        $location_galleries = LocationGallery::where('name' , 'LIKE' , '%'.$request->search.'%')->paginate(99999);
        return view('panel.location-galleries.index', compact('location_galleries'), ['title' => $this->controller_title('sum')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::latest()->get();
        return view('panel.location-galleries.create', compact('locations'), ['title' => $this->controller_title('single')]);
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

            LocationGallery::create($request->only('location_id', 'name'));

            return redirect()->route('location-gallery-list')->with('flash_message', 'گالری با موفقیت افزوده شد.');

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
        $gallery = LocationGallery::findOrFail($id);
        return view('panel.location-galleries.show', compact('gallery'), ['title' => $this->controller_title('single')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function photo_store(Request $request)
    {
        if ($request->hasFile('photo')) {

            try {

                $gallery = LocationGallery::findOrFail($request->gallery);
                $photo = new Photo();
                $photo->path = file_store($request->photo, 'assets/uploads/location_galleries/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');;
                $gallery->photo()->save($photo);

                return redirect()->route('location-gallery-show', $request->gallery)->with('flash_message', 'تصویر با موفقیت افزوده شد.');

            } catch (\Exception $e) {

                return redirect()->back()->withInput();

            }
        } else {
            return redirect()->route('location-gallery-show', $request->gallery)->with('flash_message', 'تصویر انتخاب نشده است!');
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
        $gallery = LocationGallery::findOrFail($id);
        $locations = Location::latest()->get();
        return view('panel.location-galleries.edit', compact('gallery', 'locations'), ['title' => $this->controller_title('single')]);
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
        $gallery = LocationGallery::findOrFail($id);

        try {

            $gallery->location_id = $request->location_id;
            $gallery->name = $request->name;
            $gallery->save();

            return redirect()->route('location-gallery-list')->with('flash_message', 'گالری با موفقیت ویرایش شد.');

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
        $gallery = LocationGallery::findOrFail($id);

        try {

            $gallery->delete();
            return redirect()->route('location-gallery-list')->with('flash_message', 'گالری با موفقیت حذف شد.');

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
