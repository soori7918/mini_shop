<?php

namespace App\Http\Controllers\Panel;

use App\Category;
use App\Http\Requests\LocationRequest;
use App\Photo;
use App\City;
use App\Post;
use App\Setting;
use App\Location;
use App\Http\Controllers\Controller;
use App\Villa;
use  Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LocationController extends Controller
{

    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'مناطق استانبول';
        } elseif ('single') {
            return 'منطقه استانبول';
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
    public function index(Request $request)
    {
//        $locations = Location::where('id', '!=', null);
//        if ($request->get('city') && $request->get('city') != '') {
//            $locations = $locations->where('city_id', $request->get('city'));
//        }
//        $locations = $locations->orderBy('city_id', 'asc')->paginate($this->controller_paginate());
        $locations=City::where('state_id',34)->where('city_id',null)->get();
        return view('panel.locations.index', compact('locations'), ['title' => $this->controller_title('sum')]);
    }

    public function search(Request $request)
    {
        $locations = Location::where('name', 'LIKE', '%' . $request->search . '%')->orWhere('slogan', 'LIKE', '%' . $request->search . '%')->paginate(99999);
        return view('panel.locations.index', compact('locations'), ['title' => $this->controller_title('sum')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::get();
        return view('panel.locations.create', compact('cities'), ['title' => $this->controller_title('single')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LocationRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationRequest $request)
    {

//        try {

        $districts = [];
        $district = explode(',', $request->districts);
        $districts = array_merge($districts, $district);

        $descriptions = [];

        if (isset($request->some_title)) {
            foreach ($request->some_title as $title => $val) {
                if (isset($request->some_description[$title])) {
                    array_push($descriptions, ['title' => $val, 'description' => $request->some_description[$title]]);
                }
            }
        }

        $location = Location::create([
            'name' => $request->name,
            'city_id' => $request->city_id,
            'url' => $request->url,
            'districts' => serialize($districts),
            //'slogan' => $request->slogan,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'descriptions' => serialize($descriptions),
            'body' => $request->body,
            'type' => $request->type,
            'status' => $request->status,
            'title' => $request->title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
        ]);

        $item = $location;

        $files = $request->file('gallery');
        if ($request->hasFile('gallery')) {
            foreach ($files as $file) {
                $photo = new Photo();
                $photo->path = file_store($file, 'assets/uploads/locations/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
                $item->photo()->save($photo);
            }
        }

        if ($request->hasFile('photo')) {
            $photo = new Photo();
            $photo->path = file_store($request->photo, 'assets/uploads/locations/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');;
            $location->photo()->save($photo);
        }

        if ($request->hasFile('slider')) {
            $photo_slider = new Photo();
            $photo_slider->path = file_store($request->slider, 'assets/uploads/posts/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');;

            $location->slider = $photo_slider->path;

        }

        if ($request->hasFile('home')) {
            $photo_photo = new Photo();
            $photo_photo->path = file_store($request->home, 'assets/uploads/posts/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');;

            $location->home = $photo_photo->path;
            $location->save();


        }


        if ($request->refer && $request->refer != '') {
            return redirect()->route('location-list', 'city=' . $request->refer)->with('flash_message', 'محل با موفقیت افزوده شد.');
        }

        return redirect()->route('location-list')->with('flash_message', 'محل با موفقیت افزوده شد.');

//        } catch (\Exception $e) {
//
//            return redirect()->back()->withInput();
//
//        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location=City::where('id',$id)->where('state_id',34)->where('city_id',null)->first();
        if(!$location)
        {
            abort(404);
        }
        return view('panel.locations.edit', compact('location'), ['title' => $this->controller_title('single')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param LocationRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $location = City::findOrFail($id);
//
//        $districts = [];
//        $district = explode(',', $request->districts);
//        $districts = array_merge($districts, $district);
//
//        $descriptions = [];
//
//        if (isset($request->some_title)) {
//            foreach ($request->some_title as $title => $val) {
//                if (isset($request->some_description[$title])) {
//                    array_push($descriptions, ['title' => $val, 'description' => $request->some_description[$title]]);
//                }
//            }
//        }

        try {

//            $location->name = $request->name;
//            $location->city_id = $request->city_id;
//            $location->url = $request->url;
//            $location->districts = serialize($districts);
//            $location->slogan = $request->slogan;
//            $location->latitude = $request->latitude;
//            $location->longitude = $request->longitude;
//            $location->descriptions = serialize($descriptions);
//            $location->body = $request->body;
//            $location->status = $request->status;
//            $location->title = $request->title;
//            $location->type = $request->type;
//            $location->meta_keywords = $request->meta_keywords;
//            $location->meta_description = $request->meta_description;
//            $location->save();
//
//            $item = $location;
//
            $files = $request->file('gallery');
            if ($request->hasFile('gallery')) {
                foreach ($files as $file) {
                    $photo = new Photo();
                    $photo->path = file_store($file, 'assets/uploads/locations/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
                    $location->photos()->save($photo);
                }
            }

//            if ($request->hasFile('pic')) {
//                if ($location->photo) {
//                    File::delete($location->pic);
//                }
//                $location->pic = file_store($request->pic, 'assets/uploads/locations/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
//                $location->update();
//            }


//            if ($request->hasFile('slider')) {
//                $photo_slider = new Photo();
//                $photo_slider->path = file_store($request->slider, 'assets/uploads/posts/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');;
//
//                $location->slider = $photo_slider->path;
//            }
//
//            if ($request->hasFile('home')) {
//                $photo_photo = new Photo();
//                $photo_photo->path = file_store($request->home, 'assets/uploads/posts/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');;
//
//                $location->home = $photo_photo->path;
//                $location->save();
//
//            }
//
//        
//            if ($request->refer && $request->refer != '') {
//                return redirect()->route('location-list', 'city=' . $request->refer)->with('flash_message', 'محل با موفقیت ویرایش شد.');
//            }
            return redirect()->route('location-list')->with('flash_message', ' با موفقیت ویرایش شد.');

        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->withInput();

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::findOrFail($id);

        try {

            $location->delete();
         
            return redirect()->route('location-list')->with('flash_message', 'محل با موفقیت حذف شد.');

        } catch (\Exception $e) {

            return redirect()->back();

        }
    }


    public function active($id,$type)
    {
        $item=City::where('id',$id)->where('state_id',34)->where('city_id',null)->first();
        if(!$item)
        {
            abort(404);
        }
        try{
            if($type=='active')
            {
                if(count($item->photos)<=0)
                {
                    return redirect()->back()->with('err_message', 'جهت نمایش در صفحه اصلی ابتدا یک تصویر برای منطقه تعریف کنید');
                }
            }
            $item->status_home=$type;
            $item->update();
            return redirect()->back()->with('flash_message', 'وضعیت با موفقیت تغییر کرد.');
        } catch (\Exception $e) {
            return redirect()->back()->with('err_message', 'مشکلی در تغییر وضعیت رخ داد.');
        }
    }

    public function pupular($id)
    {
        $item=City::where('id',$id)->where('state_id',34)->where('city_id',null)->first();
        if(!$item)
        {
            abort(404);
        }
        try{
           if ($item->pupular==0){
               $item->pupular=1;
               $item->update();


           }else{
               $item->pupular=0;
               $item->update();

           }

            return redirect()->back()->with('flash_message', 'وضعیت با موفقیت تغییر کرد.');
        } catch (\Exception $e) {
            return redirect()->back()->with('err_message', 'مشکلی در تغییر وضعیت رخ داد.');
        }
    }
}
