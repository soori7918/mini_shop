<?php

namespace App\Http\Controllers\Panel;

use App\Article;
use App\ArticleCategory;
use App\ArticleAttribute;
use App\AttributeArticleJoin;
use App\Photo;
use App\Slider;
use App\Upload;
use App\Project;
use App\Metrage;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class MeterageController extends Controller
{
    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'متراژ';
        } elseif ('single') {
            return 'متراژ';
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
    public function index($id)
    {
        $project = Project::with('metrages')->findOrFail($id);
        return view('panel.villa-categories.metrage.index', compact('project'), ['title' => $this->controller_title('sum')]);
    }

    public function create($id)
    {
        $project = Project::findOrFail($id);
        return view('panel.villa-categories.metrage.create',compact('project'), ['title' => $this->controller_title('single')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $project = Project::findOrFail($id);

        $this->validate($request, [
            'room' => 'required|max:191',
            'price' => 'required',
            'metrage' => 'required',
        ]);

        try {
           Metrage::create([
                'room' => $request->room,
                'price' => $request->price,
                'metrage' => $request->metrage,
                'project_id' => $project->id,
            ]);


            return redirect()->route('meterage.index',$project->id)->with('flash_message', 'اسلایدر با موفقیت آپلود شد');

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
        $slider = Metrage::findOrFail($id);

        try {
            $slider->delete();
            return redirect()->route('meterage.index')->with('flash_message', 'آیتم با موفقیت حذف شد');

        } catch (\Exception $e) {

            return redirect()->back();

        }
    }

    public function update(Request $request,$project,$id)
    {
//        Optimizer::saveAs('assets/uploads/sliders/1399-07-06/photos/photo-90361b1bd5b3f4e5f11abf35f0395bd2.jpg');
//
//        return redirect()->back();
        $this->validate($request, [
            'room' => 'required|max:191',
            'price' => 'required',
            'metrage' => 'required',
        ]);

        $post = Metrage::findOrFail($id);
        $project = Project::findOrFail($project);

        try {

            $post->room = $request->room;
            $post->price = $request->price;
            $post->metrage = $request->metrage;
            $post->save();

            return redirect()->route('meterage.index',$project->id)->with('flash_message', 'اسلایدر با موفقیت ویرایش شد.');

        } catch (\Exception $e) {
            return redirect()->back()->withInput();

        }


    }

    public function edit($project,$id)
    {
        $project = Project::findOrFail($project);
        $item = Metrage::where('id', $id)->first();
        $title = 'ویرایش آیتم';

        return view('panel.villa-categories.metrage.edit', compact('item','project', 'title'));
    }
}