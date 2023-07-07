<?php

namespace App\Http\Controllers\Panel;

use App\Category;
use App\Location;
use App\Photo;
use App\Setting;
use App\ProjectCategory;
use App\Http\Controllers\Controller;
use App\Villa;
use Illuminate\Http\Request;
use  Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class ProjectCategoryController extends Controller
{

    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'دسته بندی ها';
        } elseif ('single') {
            return 'دسته بندی';
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

    public function index()
    {
        $items = ProjectCategory::latest()->paginate($this->controller_paginate());
        return view('panel.project-category.index', compact('items'), ['title' => $this->controller_title('sum')]);
    }

    public function create()
    {
        $items = ProjectCategory::get();

        return view('panel.project-category.create',compact('items'), ['title' => $this->controller_title('single')]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=> 'required'
        ]);

        $item = new ProjectCategory();
        $item->title = $request->get('title');
        $item->parent_id = $request->get('parent_id');
        $item->slug = $request->get('slug');
        $item->name = $request->get('name');
        $item->url = $request->get('url');
        $item->type = $request->get('type');
        $item->icon = $request->get('icon');
        $item->created_by = Auth::user()->id;
        $item->save();

        if ($request->hasFile('photo')) {
            $item->image = file_store($request->photo, 'assets/uploads/project_category/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');;
            $item->save();
        }

        createMeta($item,$request);

        return redirect()->route('project-category-list');
    }

    public function edit($id)
    {
        $item = ProjectCategory::findOrFail($id);
        $items = ProjectCategory::all();
        return view('panel.project-category.edit', compact('item','items'),['title' => $this->controller_title('single')]);
    }
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'title'=> 'required'
        ]);

        $item = ProjectCategory::findOrFail($id);
        $item->title = $request->get('title');
        $item->parent_id = $request->get('parent_id');
        $item->slug = $request->get('slug');
        $item->url = $request->get('url');
        $item->name = $request->get('name');
        $item->type = $request->get('type');
        $item->icon = $request->get('icon');
        $item->updated_by = Auth::user()->id;
        $item->save();
        if ($request->hasFile('photo')) {
            $item->image = file_store($request->photo, 'assets/uploads/project_category/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');;
            $item->save();
        }
        updateMeta($item,$request);


        return redirect()->route('project-category-list');
    }

    public function destroy($id)
    {
        $item = ProjectCategory::findOrFail($id);
        if($item->image){
            File::delete($item->image);
        }
        $item->delete();

        return redirect()->route('project-category-list');
    }

}
