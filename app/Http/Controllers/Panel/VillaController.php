<?php

namespace App\Http\Controllers\Panel;

use App\Category;
use App\Http\Requests\VillaRequest;
use App\Location;
use App\City;
use App\Photo;
use App\Post;
use App\Property;
use App\Setting;
use App\Project;
use App\Villa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use  Carbon\Carbon;

class VillaController extends Controller
{

    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'ملک‌ها';
        } elseif ('single') {
            return 'ملک';
        }
    }

    public function controller_paginate()
    {
        $settings = Setting::select('paginate')->latest()->firstOrFail();
        return 100;
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
    public function index($type=null)
    {
        $categories = Category::where('type', 'villa')->latest()->get();
        $propertiesin = Property::where('type', 0)->get();
        $propertiesout = Property::where('type', 1)->get();
        $propertiesaccess = Property::where('type', 2)->get();
        $locations = Location::get();
        $villas = Villa::select('id', 'name')->latest()->get();
        $cities = City::where('state_id', null)->get();
        if (Auth::user()->hasRole('مدیر ملک')) {
            if($type==null)
            {
                $villas = Villa::where('user_id', Auth::user()->id)->latest()->paginate(10);
            }
            else
            {
                $villas = Villa::where('status', $type)->where('user_id', Auth::user()->id)->latest()->paginate(10);
            }
        } elseif (Auth::user()->hasRole('تعیین کننده ملک')) {
            if($type==null)
            {
                $villas = Villa::latest()->paginate(10);
            }
            else
            {
                $villas = Villa::where('status', $type)->latest()->paginate(10);
            }

        } else {
            if($type==null)
            {
                $villas = Villa::latest()->paginate(10);
            }
            else
            {
                $villas = Villa::where('status', $type)->latest()->paginate(10);
            }
        }
        $price_min = Villa::all()->min('price');

        $price_max = Villa::all()->max('price');

        return view('panel.villas.index', compact('categories', 'price_min', 'price_max', 'propertiesin', 'propertiesout', 'propertiesaccess', 'locations', 'villas', 'cities', 'villas', 'type'), ['title' => $this->controller_title('sum')]);
    }

    public function search_index()
    {
        $categories = Category::where('type', 'villa')->latest()->get();
        $propertiesin = Property::where('type', 0)->get();
        $propertiesout = Property::where('type', 1)->get();
        $propertiesaccess = Property::where('type', 2)->get();
        $locations = Location::get();
        $villas = Villa::select('id', 'name')->latest()->get();
        $cities = City::get();
        $price_min = Villa::all()->min('price');
        $price_max = Villa::all()->max('price');

        return view('panel.villas.search', compact('categories', 'price_max', 'price_min', 'propertiesin', 'propertiesout', 'propertiesaccess', 'locations', 'villas', 'cities', 'villas', 'type'), ['title' => 'جستجوی ملک']);
    }

    public function search(Request $request, $type = null)
    {

        //return $request;

        $categories = Category::where('type', 'villa')->latest()->get();
        $propertiesin = Property::where('type', 0)->get();
        $propertiesout = Property::where('type', 1)->get();
        $propertiesaccess = Property::where('type', 2)->get();
        $locations = Location::get();
        $villas = Villa::select('id', 'name')->latest()->get();
        $cities = City::get();

        $price_min = Villa::all()->min('price');

        $price_max = Villa::all()->max('price');


        $villas = Villa::orderByDesc('created_at');
        if (!is_null($request->location_id)) {
            $villas = $villas->where('location_id', (int)$request->location_id);
        }
        if (!is_null($request->city_id)) {
            $villas = $villas->where('city_id', (int)$request->city_id);
        }
        if (!is_null($request->type)) {
            if ($request->type != 'published') {
                $villas = $villas->where('type', 'new');
            }
        }
        if (!is_null($request->type_info)) {
            if (count(array_filter($request->type_info)) > 0) {
                $villas = $villas->whereIn('type_info', $request->type_info);
            }
        }
        if (!is_null($request->built_year)) {
            $villas = $villas->where('built_year', '<=', (int)$request->built_year);
        }
        if (!is_null($request->b_or_t)) {
            $villas = $villas->where('b_or_t', $request->b_or_t);
        }
        if (!is_null($request->furniture)) {
            $villas = $villas->where('furniture', $request->furniture);
        }
        if (!is_null($request->salon_num)) {
            $villas = $villas->where('salon_num', (int)$request->salon_num);
        }
        if (!is_null($request->room_num)) {
            if (count(array_filter($request->room_num)) > 0) {
                $villas = $villas->where('room_num', (int)$request->room_num);
            }
        }
        if (!is_null($request->area)) {
            $villas = $villas->where('area', $request->area);
        }
        if (!is_null($request->area_net)) {
            $villas = $villas->where('area_net', $request->area_net);
        }
        if (!is_null($request->floor_num)) {
            $villas = $villas->where('floor_num', $request->floor_num);
        }
        if (!is_null($request->floor)) {
            $villas = $villas->where('floor', (int)$request->floor);
        }
        if (!is_null($request->number_of_wc)) {
            $villas = $villas->where('number_of_wc', (int)$request->number_of_wc);
        }
        if (!is_null($request->price)) {
            $min_price = explode(';', $request->price)[0];
            $max_price = explode(';', $request->price)[1];
            $villas = $villas->where('price', '>=', (int)$min_price);
            $villas = $villas->where('price', '<=', (int)$max_price);
        }
        if (!is_null($request->tip_info)) {
            $villas = $villas->where('tip_info', $request->tip_info);
        }
        if (!is_null($type)) {
            $villas = $villas->where('status', $type);
        }

        $villas = $villas->paginate($this->controller_paginate());
        $villas->appends($request->all());

        return view('panel.villas.index', compact('categories', 'price_min', 'price_max', 'propertiesin', 'propertiesout', 'propertiesaccess', 'locations', 'villas', 'cities', 'villas', 'type'), ['title' => $this->controller_title('sum')]);
    }

    public function find(Request $request, $type = null)
    {

        $categories = Category::where('type', 'villa')->latest()->get();
        $propertiesin = Property::where('type', 0)->get();
        $propertiesout = Property::where('type', 1)->get();
        $propertiesaccess = Property::where('type', 2)->get();
        $locations = Location::get();
        $villas = Villa::select('id', 'name')->latest()->get();
        $cities = City::get();
        $price_min = Villa::all()->min('price');
        $price_max = Villa::all()->max('price');

        if (Auth::user()->hasRole('مدیر ملک')) {
            if (is_numeric($request->search)) {
                $villas = Villa::where('status', $type)->where([
                    ['id', $request->search],
                    ['user_id', Auth::user()->id]
                ])->where('status', $type)->paginate(9999);
            } else {
                $villas = Villa::where('status', $type)->where([
                    ['name', 'LIKE', '%' . $request->search . '%'],
                    ['user_id', Auth::user()->id]
                ])->where('status', $type)->where('status', $type)->paginate(9999);
            }
        } else {
            if (is_numeric($request->search)) {
                $villas = Villa::where('id', $request->search)->paginate(9999);
            } else {
                $villas = Villa::where('status', $type)->where('name', 'LIKE', '%' . $request->search . '%')->paginate(9999);
            }
        }
        return view('panel.villas.index', compact('categories', 'propertiesin', 'price_max', 'price_min', 'propertiesout', 'propertiesaccess', 'locations', 'villas', 'cities', 'villas', 'type'), ['title' => $this->controller_title('sum')]);

    }

    /**
     * Show list of districts.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function districts($id)
    {
        $location = Location::find($id);
        $districts = [];
        if ($location) {
            $districts = unserialize($location->districts);
        }

        $options = array();
        foreach ($districts as $district) {
            $options += array($district => $district);
        }
//        return Response::json($options);
        return $options;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('type', 'villa')->latest()->get();
        $propertiesin = Property::where('type', 0)->get();
        $propertiesout = Property::where('type', 1)->get();
        $propertiesaccess = Property::where('type', 2)->get();
        $locations = Location::get();
        $villas = Villa::select('id', 'name')->latest()->get();
        $cities = City::where('state_id', null)->get();
        return view('panel.villas.create', compact('categories', 'cities', 'propertiesin', 'propertiesout', 'propertiesaccess', 'locations', 'villas'), ['title' => $this->controller_title('single')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param VillaRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd('test');
        $this->validate($request, [
            'title' => 'required',
            'keyword' => 'required',
            'slug' => 'required',
            'code' => 'required',
        ]);

        $project = Project::create([
            'code' => json_encode($request->code),
            'title' => $request->title,
            'slug' => $request->slug,
            'keyword' => $request->keyword,
            'price_label' => $request->price_label,
            'start_price' => $request->start_price,
            'total' => $request->total,
            'bedroom' => $request->bedroom,
            'bathroom' => $request->bathroom,
            'description' => $request->description,
            'map' => $request->map,
            'agent' => $request->agent,
            'user_id' => auth()->id(),
        ]);

         $project->project_category()->sync([
             'category_id' => $request->project_category
         ]);

         $project->project_property()->sync([
             'category_id' => $request->project_property
         ]);

         $project->project_city()->sync([
             'city_id' => $request->city
         ]);

         $project->project_location()->sync([
             'location_id' => $request->neighberhood
         ]);



        foreach ($request->gallery as $file) {
            $photo = new Photo();
            $photo->path = $file;
            $photo->type = 'gallery';
            $project->photos()->save($photo);
        }


        foreach ($request->plan_gallery as $file) {
            $photo = new Photo();
            $photo->path = $file;
            $photo->type = 'plan_gallery';
            $project->plan_gallery()->save($photo);
        }



        if ($request->hasFile('video')) {
            $project->video = file_store($request->video, 'assets/uploads/projects/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/videos/', 'video-');;
            $project->save();
        }


        return redirect()->route('project-list', $project->status)->with('flash_message', 'ملک با موفقیت افزوده شد.');

//        } catch (\Exception $e) {
//
//            return redirect()->back()->with('err_message', 'خطایی رخ داده است، لطفا بررسی نمایید');
//
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        if (!Auth::user()->hasRole('مدیر')) {
//            return redirect()->back()->withErrors('شما دسترسی این قسمت را ندارید!');
//        }

        $villa = Villa::findOrFail($id);

//        if (!Auth::user()->hasRole('مدیر')) {
//            if ($villa->user_id != Auth::user()->id) {
//                abort(404);
//            }
//        }

        $villas = Villa::where('id', '!=', $id)->select('id', 'name')->latest()->get();

        $location = Location::find($villa->location_id);
        $districts = [];
        if ($location) {
            $districts = unserialize($location->districts);
        }

        $categories = Category::where('type', 'villa')->latest()->get();
        $propertiesin = Property::where('type', 0)->get();
        $propertiesout = Property::where('type', 1)->get();
        $propertiesaccess = Property::where('type', 2)->get();
        $locations = Location::get();
        $cities = City::get();
        return view('panel.villas.show', compact('villa', 'categories', 'propertiesin', 'propertiesout', 'propertiesaccess', 'locations', 'villas', 'districts', 'cities'), ['title' => $this->controller_title('single')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $villa = Villa::findOrFail($id);

        if (!Auth::user()->hasRole('مدیر')) {
            if ($villa->user_id != Auth::user()->id) {
                abort(404);
            }
        }

        $villas = Villa::where('id', '!=', $id)->select('id', 'name')->latest()->get();

        $location = Location::find($villa->location_id);
        if ($location) {
            $districts = unserialize($location->districts);
        }

        $categories = Category::where('type', 'villa')->latest()->get();
        $propertiesin = Property::where('type', 0)->get();
        $propertiesout = Property::where('type', 1)->get();
        $propertiesaccess = Property::where('type', 2)->get();
        $locations = Location::get();
        $states = City::where('state_id',null)->get();
        $cities = City::where('state_id',$villa->state_id)->get();
        $zones = City::where('city_id',$villa->city_id)->get();
        return view('panel.villas.edit', compact('villa', 'categories', 'propertiesin', 'propertiesout', 'propertiesaccess', 'locations', 'villas', 'districts' ,'states','cities','zones'), ['title' => $this->controller_title('single')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param VillaRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ini_set('memory_limit', '256M');
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'body' => 'required',
        ]);

        $villa = Villa::findOrFail($id);

        if (!Auth::user()->hasRole('مدیر')) {
            if ($villa->user_id != Auth::user()->id) {
                abort(404);
            }
        }

        $changes = [];
        $descriptions = [];

        if (isset($request->some_title)) {
            foreach ($request->some_title as $title => $val) {
                if (isset($request->some_description[$title])) {
                    array_push($descriptions, ['title' => $val, 'description' => $request->some_description[$title]]);
                }
            }
        }

//        if ($request->last_discount) {
//            $last_discount = 'yes';
//        } else {
//            $last_discount = 'no';
//        }

//        try {
        if ($request->category_id != '' and $request->category_id != null) {
            $cat = Category::find($request->category_id);
            if ($cat == null or $cat == '') {
                return redirect()->back()->with('err_message',
                    'دسته بندی انتخابی صحیح نیست لطفا مجدد بررسی کنید');

            }
        } else {
            $cat = null;
        }
        $villa->villa_now = json_encode($request->villaNow);
        $villa->category_id = $request->category_id == '' ? null : $request->category_id;
        $villa->name = $request->name;
        $villa->slug = $request->slug;
        $villa->villa_vip = $request->villa_vip;
        //$villa->location_id = $request->location_id;
        //$villa->district = $request->district;
        $villa->type = $villa->built_year == 0 ? 'new' : 'old';
        //$villa->usering = serialize($request->usering);
        $villa->built_year = $request->built_year;
        $villa->b_or_t = $request->b_or_t;
        $villa->furniture = $request->furniture;
        $villa->kitchen = $request->kitchen;
        //$villa->salon_num = $request->salon_num;
        $villa->room_num = $request->room_num;
        $villa->area = $request->area;
        //$villa->floor_num = $request->floor_num;
        $villa->floor = $request->floor;
        $villa->number_of_wc = $request->number_of_wc;
        $villa->estate_name = $request->estate_name;
        $villa->villa_space = $request->villa_space;
        $villa->estate_phone = $request->estate_phone;
        $villa->villa_view = serialize($request->villa_view);

        $villa->nearest = serialize($request->nearest);
        $villa->properties_in = serialize($request->properties_in);
//        $villa->properties_out = serialize($request->properties_out);
//        $villa->properties_access = serialize($request->properties_access);
        $villa->villa_place = serialize($request->villa_place);
        $villa->price = (int)str_replace(',', '', $request->price);
        $villa->price_type = $request->price_type;
        $villa->type_info = $request->type_info;
        $villa->type_villa = $request->type_villa;
        //$villa->tip_info = $request->tip_info;
        $villa->body = $request->body;
        $villa->services = $request->services;
        $villa->information = $request->information;
        $villa->latitude = $request->latitude;
        $villa->longitude = $request->longitude;

        $villa->descriptions = serialize($descriptions);
        //$villa->prices = serialize($request->some_room);
        $villa->status = $request->status ? $request->status : 'pending';
        $villa->meta_keywords = $request->meta_keywords;
        $villa->meta_description = $request->meta_description;
        $villa->link1 = $request->link1;
        $villa->link2 = $request->link2;
        $villa->link3 = $request->link3;
        $villa->link4 = $request->link4;
        $villa->type_sale = $request->type_sale;

        if ($cat == null) {
            $villa->state_id = $request->state_id;
            $villa->city_id = $request->city_id;
            $villa->zone_id = $request->zone_id;
            $villa->address = $request->address1;
            $villa->properties_out = json_encode($request->properties_out);
            $villa->properties_access = json_encode($request->properties_access);

        } else {
            $villa->state_id = $cat->state_id;
            $villa->city_id = $cat->city_id;
            $villa->zone_id = $cat->zone_id;
            $villa->address = $cat->address;
            $villa->properties_out = $cat->properties_out;;
            $villa->properties_access = $cat->properties_access;;
        }


        if (!Auth::user()->hasRole('مدیر')) {
            $villa->status = 'pending';
        }

        if ($villa->location) {
            $villa->location_name = $villa->location->name;
        }

        $villa->update();


        foreach (Category::types() as $key => $type) {
            $villa->$key = false;
        }

        $types = $request->get('types');

        if ($types && is_array($types) && sizeof($types) > 0) {
            foreach ($types as $type) {
                $villa->$type = true;
            }
        }

        if ($request->hasFile('video')) {
            $villa->video = file_store($request->video, 'assets/uploads/villas/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/videos/', 'video-');
        }


        $villa->save();


        $changes = $villa->getChanges();
        if ($request->hasFile('photo')) {
            if ($villa->photo) {
                File::delete($villa->photo->path);
                $villa->photo->delete();
                $photo = new Photo();
                $photo->path = file_store($request->photo, 'assets/uploads/villas/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
                $villa->photo()->save($photo);
            } else {
                $photo = new Photo();
                $photo->path = file_store($request->photo, 'assets/uploads/villas/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
                $villa->photo()->save($photo);
            }
            $changes['photo'] = $villa->photo->path;
        }

        $files = $request->file('gallery');
        $files_in = $request->file('in_gallery');
        $files_out = $request->file('out_gallery');
        $files_plan = $request->file('plan_gallery');
        if ($request->hasFile('gallery')) {
            foreach ($files as $file) {
                $photo = new Photo();
                $photo->type = 'gallery';
                $photo->path = file_store($file, 'assets/uploads/villas/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
                $villa->photos()->save($photo);
            }
        }
        if ($request->hasFile('in_gallery')) {
            foreach ($files_in as $file) {
                $photo = new Photo();
                $photo->type = 'in_gallery';
                $photo->path = file_store($file, 'assets/uploads/villas/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-in_gallery');
                $villa->in_gallery()->save($photo);
            }
        }
        if ($request->hasFile('out_gallery')) {
            foreach ($files_out as $file) {
                $photo = new Photo();
                $photo->type = 'out_gallery';
                $photo->path = file_store($file, 'assets/uploads/villas/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-out_gallery');
                $villa->out_gallery()->save($photo);
            }
        }
        if ($request->hasFile('plan_gallery')) {
            foreach ($files_plan as $file) {
                $photo = new Photo();
                $photo->type = 'plan_gallery';
                $photo->path = file_store($file, 'assets/uploads/villas/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-plan_gallery');
                $villa->plan_gallery()->save($photo);
            }
        }

        $villa->updated_columns = json_encode($changes);
        $villa->save();
        return redirect()->route('villa-list', $villa->status)->with('flash_message', 'ملک با موفقیت ویرایش شد.');

//        } catch (\Exception $e) {
//            return redirect()->back()->with('err_message', 'خطایی رخ داده است، لطفا بررسی نمایید');
//
//        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $villa = Villa::findOrFail($id);

        if (!Auth::user()->hasRole('مدیر')) {
            if ($villa->user_id != Auth::user()->id) {
                abort(404);
            }
        }

        try {

            $type = $villa->status;
            $villa->delete();

            return redirect()->route('villa-list', $type)->with('flash_message', 'ملک با موفقیت حذف شد.');

        } catch (\Exception $e) {
            return redirect()->back();
        }
    }



    public function verify(Request $request)
    {
        $id = $request->get('id');
        $villa = Villa::find($id);
        $villa->status = $request->get('status');
        $villa->save();

        return redirect()->route('villa-list', $villa->status);
    }

    public function sendNotification($user_id, $message, $type, $link = null)
    {
        $not = new \App\Notification();
        $not->user_id = $user_id;
        $not->type = $type;
        $not->message = $message;
        $not->link = $link;
        $not->save();
    }

    public function status(Villa $villa, Request $request)
    {
        $user = Auth::user();
        if ($user->hasRole('مدیر') || $user->hasRole('تعیین کننده ملک')) {
            $this->validate($request, [
                'status' => 'required|in:published,draft,pending,failed'
            ]);

            $villa->status = $request->get('status');
            $villa->status_message = $request->get('status_message');
            $villa->user_active_id = $user->id;
            $villa->date_active = date('Y-d-m');
            $villa->update();

            // send notification
            $id = $villa->id;
            if ($request->status == 'failed') {
                $message = "ملک شما با شناسه $id به دلایل زیر رد شد: 
$request->status_message;
";
            } else {
                $message = "ملک شما با شناسه $id تایید شد";
            }
            $link = route('villa-show', $villa->id);

            $this->sendNotification($villa->user_id, $message, 'admin', $link);
        } else {
            return redirect()->back()->withErrors('شما مجوز دسترسی به این قسمت را ندارید!');
        }

        return redirect()->route('villa-list', 'pending')->with('flash_message', 'وضعیت ایتم با موفقیت تغییر کرد.');
    }

    public function active($id,$type)
    {
        $item=Villa::find($id);
        try{
            $item->status=$type;
            $item->update();
            return redirect()->back()->with('flash_message', 'وضعیت ملک با موفقیت تغییر کرد.');
        } catch (\Exception $e) {
            return redirect()->back()->with('err_message', 'مشکلی در تغییر وضعیت ملک رخ داد.');
        }
    }
    public function active_sale($id,$type)
    {
        $item=Villa::find($id);
        try{
            $item->sale_status=$type;
            $item->update();
            return redirect()->back()->with('flash_message', 'وضعیت فروش ملک با موفقیت تغییر کرد.');
        } catch (\Exception $e) {
            return redirect()->back()->with('err_message', 'مشکلی در تغییر وضعیت فروش ملک رخ داد.');
        }
    }
    public function indexByUserId($id, $from, $to)
    {
        $type = 'published';
        $categories = Category::where('type', 'villa')->latest()->get();
        $propertiesin = Property::where('type', 0)->get();
        $propertiesout = Property::where('type', 1)->get();
        $propertiesaccess = Property::where('type', 2)->get();
        $locations = Location::get();
        $villas = Villa::select('id', 'name')->latest()->get();
        $cities = City::get();
        $villas = Villa::whereBetween('created_at', [$from, $to])->where('user_id', $id)->latest()->paginate(10);

        return view('panel.villas.index', compact('categories', 'type', 'propertiesin', 'propertiesout', 'propertiesaccess', 'locations', 'villas', 'cities', 'villas', 'type'), ['title' => $this->controller_title('sum')]);
    }
}
