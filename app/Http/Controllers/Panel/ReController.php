<?php

namespace App\Http\Controllers\Panel;

use App\Http\Requests\PropertyRequest;
use App\Photo;
use App\Setting;
use App\Order;
use App\Upload;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ReController extends Controller
{

    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'رزرو';
        } elseif ('single') {
            return 'رزرو';
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


    public function upload()
    {
        $data = Upload::paginate($this->controller_paginate());

        return view('panel.upload', compact('data'));
    }

    public function upload_store(Request $request)
    {
        try {

            if ($request->hasFile('photo')) {
                $post = Upload::create();

                $photo = new Photo();
                $photo->path = file_store($request->photo, 'assets/uploads/file/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');;
                $post->photo()->save($photo);

                $post->save();
            }else{
                return redirect()->route('upload-list')->with('err_message', 'فایل انتخاب نشده است.');
            }

            return redirect()->route('upload-list')->with('flash_message', 'فایل با موفقیت افزوده شد.');

        } catch (\Exception $e) {

            return redirect()->back()->withInput();

        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $data = Order::orderBy('id','desc')->paginate($this->controller_paginate());

        return view('panel.re.index', compact('data'), ['title' => $this->controller_title('sum')]);
    }

    public function search(Request $request)
    {
        $properties = Property::where('name', 'LIKE', '%' . $request->search . '%')->paginate(99999);
        return view('panel.properties.index', compact('properties'), ['title' => $this->controller_title('sum')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.properties.create', ['title' => $this->controller_title('single')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PropertyRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyRequest $request)
    {
        try {

            $property = Property::create($request->only('name', 'status', 'type'));

            if ($request->hasFile('photo')) {
                $photo = new Photo();
                $photo->path = file_store($request->photo, 'assets/uploads/properties/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
                $property->photo()->save($photo);
            }

            return redirect()->route('property-list')->with('flash_message', 'ویژگی با موفقیت افزوده شد.');

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
        $property = Property::findOrFail($id);
        return view('panel.properties.edit', compact('property'), ['title' => $this->controller_title('single')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PropertyRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyRequest $request, $id)
    {
        $property = Property::findOrFail($id);

        try {

            $property->name = $request->name;
            $property->status = $request->status;
            $property->type = $request->type;
            $property->save();

            if ($request->hasFile('photo')) {
                if ($property->photo) {
                    File::delete($property->photo->path);
                    $property->photo->delete();
                    $photo = new Photo();
                    $photo->path = file_store($request->photo, 'assets/uploads/properties/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
                    $property->photo()->save($photo);
                } else {
                    $photo = new Photo();
                    $photo->path = file_store($request->photo, 'assets/uploads/properties/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
                    $property->photo()->save($photo);
                }
            }

            return redirect()->route('property-list')->with('flash_message', 'ویژگی با موفقیت ویرایش شد.');

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
        $property = Property::findOrFail($id);

        try {

            $property->delete();
            return redirect()->route('property-list')->with('flash_message', 'ویژگی با موفقیت حذف شد.');

        } catch (\Exception $e) {

            return redirect()->back();

        }
    }
}
