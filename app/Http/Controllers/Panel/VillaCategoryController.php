<?php

namespace App\Http\Controllers\Panel;

use App\Http\Requests\CategoryRequest;
use App\Setting;
use App\City;
use App\City1;
use App\Category;
use App\Photo;
use App\Project;
use App\Agent;
use App\Villa;
use App\Location;
use App\Property;
use App\Country;
use App\ProjectCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use function PHPSTORM_META\type;

class VillaCategoryController extends Controller
{

    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'پروژه ها';
        } elseif ('single') {
            return 'پروژه';
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
        $projects = Project::orderBy('created_at', 'desc')->with('user')->get();
        return view('panel.villa-categories.index', compact('projects'), ['title' => $this->controller_title('sum')]);
    }

    /**
     * Sort Item.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function sort_item(Request $request)
    {
        $category_item_sort = json_decode($request->sort);
        $this->sort_category($category_item_sort, null);
    }

    /**
     * Sort Category.
     *
     *
     * @param $category_items
     * @param $parent_id
     */
    private function sort_category(array $category_items, $parent_id)
    {
        foreach ($category_items as $index => $category_item) {
            $item = Category::findOrFail($category_item->id);
            $item->sort_id = $index + 1;
            $item->parent_id = $parent_id;
            $item->save();
            if (isset($category_item->children)) {
                $this->sort_category($category_item->children, $item->id);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::get();
        $agents = Agent::get();
        $cities1 = City1::all();
        $contries = Country::get();
        $cities = City::where('state_id',null)->get();
        $propertiesout = Property::where('type', 1)->get();
        $propertiesaccess = Property::where('type', 2)->get();
        $project_categories = ProjectCategory::orderBy('created_at','desc')->get();
        return view('panel.villa-categories.create', compact('agents','contries','locations', 'cities', 'propertiesout', 'propertiesaccess','project_categories','cities1'), ['title' => $this->controller_title('single')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'keyword' => 'required',
            'slug' => 'required',
            'project_code' => 'required',
        ]);

        $project = Project::create([
            'code' => $request->project_code,
            'title' => $request->title,
            'slug' => $request->slug,
            'keyword' => $request->keyword,
            'price_label' => $request->price_label,
            'start_price' => $request->start_price,
            'total' => $request->total,
            'bedroom' => $request->bedroom,
            'bathroom' => $request->bathroom,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'map' => $request->map,
            'agent_id' => $request->agent,
            'count_all_unit' => $request->count_all_unit,
            'count_sale_unit' => $request->count_sale_unit,
            'status' => $request->status,
            'area' => $request->area,
            'wc_count' => $request->wc_count,
            'activity' => $request->activity,
            'created_by' => auth()->id(),
        ]);


        $project->project_category()->attach($request->project_category);
        $project->project_property()->attach($request->project_property);
        $project->project_city()->attach($request->city);
        $project->project_location()->attach($request->neighberhood);
        $project->project_country()->attach($request->country);


        if ($request->hasFile('images')){

            foreach ($request->images as $file) {
                $photo = new Photo();
                $photo->path = file_store($file, 'source/assets/uploads/project/images/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
                $photo->type = 'gallery';
                $project->photos()->save($photo);
            }
        }

        if ($request->hasFile('plans')){
            foreach ($request->plans as $file) {
                $photo = new Photo();
                $photo->path = file_store($file, 'source/assets/uploads/project/plans/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
                $photo->type = 'plan';
                $project->plan_gallery()->save($photo);
            }
        }

        if ($request->hasFile('image')) {
            $project->image = file_store($request->image, 'assets/uploads/projects/image/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/image/', 'image-');;
            $project->save();
        }


        return redirect()->route('villa-category-list', $project->status)->with('flash_message', 'ملک با موفقیت افزوده شد.');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::with('photos')->findOrFail($id);
        $locations = Location::get();
        $cities1 = City1::all();
        $contries = Country::get();
        $agents = Agent::get();
        $cities = City::where('state_id',null)->get();
        $propertiesout = Property::where('type', 1)->get();
        $propertiesaccess = Property::where('type', 2)->get();
        $project_categories = ProjectCategory::orderBy('created_at','desc')->get();
        $selected_project_categorys= $project->project_category->pluck('id')->toArray();
        $selected_project_citys= $project->project_city->pluck('id')->toArray();
        $selected_project_countrys= $project->project_country->pluck('id')->toArray();
        $selected_project_locations= $project->project_location->pluck('id')->toArray();
        $selected_project_propertys= $project->project_property->pluck('id')->toArray();
        return view('panel.villa-categories.edit', compact('agents','selected_project_categorys',
            'selected_project_citys',
            'selected_project_countrys',
            'selected_project_locations',
            'selected_project_propertys',
            'propertiesout','project_categories','project', 'locations','cities1','contries','cities','propertiesaccess'), ['title' => $this->controller_title('single')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'keyword' => 'required',
            'slug' => 'required',
            'project_code' => 'required',
        ]);
        $project = Project::findOrFail($id);
        $project->update([
            'code' => $request->project_code,
            'title' => $request->title,
            'slug' => $request->slug,
            'keyword' => $request->keyword,
            'price_label' => $request->price_label,
            'start_price' => $request->start_price,
            'total' => $request->total,
            'bedroom' => $request->bedroom,
            'bathroom' => $request->bathroom,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'map' => $request->map,
            'agent_id' => $request->agent,
            'count_all_unit' => $request->count_all_unit,
            'count_sale_unit' => $request->count_sale_unit,
            'status' => $request->status,
            'area' => $request->area,
            'wc_count' => $request->wc_count,
            'activity' => $request->activity,
            'created_by' => auth()->id(),
        ]);


        $project->project_category()->sync($request->project_category);
        $project->project_property()->sync($request->project_property);
        $project->project_city()->sync($request->city);
        $project->project_location()->sync($request->neighberhood);
        $project->project_country()->sync($request->country);


        if ($request->hasFile('images')){
            File::delete($project->photos());
            foreach ($request->images as $file) {
                $photo = new Photo();
                $photo->path = file_store($file, 'assets/uploads/project/images/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
                $photo->type = 'gallery';
                $project->photos()->save($photo);
            }
        }

        if ($request->hasFile('plans')){
            File::delete($project->plan_gallery());

            foreach ($request->plans as $file) {
                $photo = new Photo();
                $photo->path = file_store($file, 'assets/uploads/project/plans/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
                $photo->type = 'plan';
                $project->plan_gallery()->save($photo);
            }
        }

        if ($request->hasFile('image')) {
            $project->image = file_store($request->image, 'assets/uploads/projects/image/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/image/', 'image-');;
            $project->save();
        }

        return redirect()->route('villa-category-list')->with('flash_message', 'پروژه با موفقیت ویرایش شد.');



    }
    public function update_count(Request $request, $id)
    {
        $this->validate($request, [
            'count' => 'required',
        ]);
        $item = Category::findOrFail($id);

        if ($request->get('count')>$item->count_all_unit){
            return redirect()->route('villa-category-list')->with('err_message',
                'تعداد وارد شده از تعداد کل بیشتر می باشد');

        }
        try {

        $item->count_sale_unit = $request->get('count');

        $item->update();

        return redirect()->route('villa-category-list')->with('flash_message', 'تعداد با موفقیت ویرایش شد.');

        } catch (\Exception $e) {
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

        $project = Project::findOrFail($id);

        try {
            $project->project_category()->delete();
            $project->project_property()->delete();
            $project->project_city()->delete();
            $project->project_location()->delete();
            $project->project_country()->delete();

            $project->delete();
            return redirect()->route('villa-category-list')->with('flash_message', 'پروژه با موفقیت حذف شد.');

        } catch (\Exception $e) {

            return redirect()->back();

        }
    }

    public function photo_destroy($id)
    {

        $photo = Photo::findOrFail($id);
        try {
            try{
                File::delete($photo->path);
            }catch (\Exception $e){}
            $photo->delete();
            return back()->with('flash_message', 'عکس پروژه با موفقیت حذف شد.');

        } catch (\Exception $e) {

            return redirect()->back();

        }
    }

    public function detail(Request $request)
    {
        $id = $request->get('id');

        $category = Category::find($id);
        $data = [];
        if ($category) {
            $data = $category;
        }


        return response()->json([
            'data' => $data
        ]);
    }
    public function active($id,$type)
    {
        $item=Category::find($id);
        try{
            $item->status=$type;
            $item->update();
            return redirect()->back()->with('flash_message', 'وضعیت پروژه با موفقیت تغییر کرد.');
        } catch (\Exception $e) {
            return redirect()->back()->with('err_message', 'مشکلی در تغییر وضعیت پروژه رخ داد.');
        }
    }
}
