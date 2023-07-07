<?php

namespace App\Http\Controllers\Panel;

use App\Http\Requests\CategoryRequest;
use App\Setting;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostCategoryController extends Controller
{

    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'دسته بندی';
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type=null)
    {
        $categories = Category::where(['parent_id' => null, 'type' => $type==null?'article':$type])->with('children')->get();
        $title='دسته بندی مقالات';
        if($type=='article'){$title='دسته بندی مقالات';}
        elseif($type=='news'){$title='دسته بندی اخبار';}
        elseif($type=='eghamat'){$title='دسته بندی اقامت ترکیه';}
        elseif($type=='shahrvandi'){$title='دسته بندی شهروندی ترکیه';}
        elseif($type=='job'){$title='دسته بندی  کسب و کار در ترکیه';}
        return view('panel.post-categories.index', compact('categories','type'), ['title' => $title]);
    }

    /**
     * Sort Item.
     *
     * @param  \Illuminate\Http\Request $request
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
    public function create($type=null)
    {
        $title='دسته بندی مقالات';
        if($type=='article'){$title='دسته بندی مقالات';}
        elseif($type=='news'){$title='دسته بندی اخبار';}
        elseif($type=='eghamat'){$title='دسته بندی اقامت ترکیه';}
        elseif($type=='shahrvandi'){$title='دسته بندی شهروندی ترکیه';}
        elseif($type=='job'){$title='دسته بندی کسب و کار در ترکیه';}
        return view('panel.post-categories.create',compact('type'), ['title' => ' '.$title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        try {

            $item=Category::create($request->only('name', 'slug', 'type'));

            return redirect()->route('post-category-list',$item->type)->with('flash_message', 'دسته بندی با موفقیت افزوده شد.');

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
        $category = Category::findOrFail($id);
        $title='دسته بندی مقالات';
        if($category->type=='article'){$title='دسته بندی مقالات';}
        elseif($category->type=='news'){$title='دسته بندی اخبار';}
        elseif($category->type=='eghamat'){$title='دسته بندی اقامت ترکیه';}
        elseif($category->type=='shahrvandi'){$title='دسته بندی شهروندی ترکیه';}
        elseif($category->type=='job'){$title='دسته بندی کسب و کار در ترکیه';}
        return view('panel.post-categories.edit', compact('category'), ['title' => ' '.$title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);

        try {

            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->save();

            return redirect()->route('post-category-list',$category->type)->with('flash_message', 'دسته بندی با موفقیت ویرایش شد.');

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
        $category = Category::findOrFail($id);
        $type=$category->type;
        if (count($category->children)){
            return redirect()->route('post-category-list',$type)->with('err_message', 'دسته بندی شامل زیردسته می باشد');
        }elseif (count($category->posts)){
            return redirect()->route('post-category-list',$type)->with('err_message', 'دسته بندی به نوشته متصل می باشد');
        }elseif (count($category->posts2)){
            return redirect()->route('post-category-list',$type)->with('err_message', 'دسته بندی به نوشته متصل می باشد');
        }

        try {

            $category->delete();
            return redirect()->route('vila-category-list',$type)->with('flash_message', 'دسته بندی با موفقیت حذف شد.');

        } catch (\Exception $e) {

            return redirect()->back();

        }
    }
}
