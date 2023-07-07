<?php

namespace App\Http\Controllers\Panel;

use App\User;
use App\Setting;
use App\Meta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class MetaController extends Controller
{
    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'لیست Meta';
        } elseif ('single') {
            return 'Meta';
        }
    }

    public function controller_paginate()
    {
        $settings = Setting::select('paginate')->latest()->firstOrFail();
        return $settings->paginate;
    }

    public function __construct()
    {
        $this->middleware(['auth','isAdmin']);
    }

    public function index()
    {
        $items = Meta::orderBy('id','desc')->paginate($this->controller_paginate());
        return view('panel.meta.index', compact('items'), ['title' => 'متا', 'title2' => $this->controller_title('sum')]);
    }
    public function create()
    {
        return view('panel.meta.create', ['title' => 'متا', 'title2' => 'افزودن Meta']);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'url' => 'required|url|unique:metas',
            'title' => 'required|max:250',
            'key_word' => 'required',
            'description' => 'required',
        ],
            [
                'url.required' => 'لطفا آدرس صفحه را وارد کنید',
                'url.url' => 'لطفا آدرس صفحه را صحیح وارد کنید',
                'url.unique' => ' آدرس صفحه تکراری می باشد',
                'title.required' => 'لطفا عنوان را وارد کنید',
                'title.max' => 'عنوان نباید بیشتر از 240 کاراکتر باشد',
                'key_word.required' => 'لطفا کبمات کلیدی را وارد کنید',
                'description.required' => 'لطفا توضیحات را وارد کنید',
            ]);
        try {
            $item = new Meta();
            $item->url = $request->url;
            $item->title = $request->title;
            $item->key_word = $request->key_word;
            $item->description = $request->description;
            $item->save();
            return redirect()->route('meta-list')->with('flash_message', 'متا با موفقیت ایجاد شد.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'مشکلی در ایجاد متا بوجود آمده،مجددا تلاش کنید');
        }
    }

    public function edit($id)
    {
        $item = Meta::find($id);
        return view('panel.meta.edit', compact('item'), ['title' => 'متا', 'title2' => 'ویرایش Meta']);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'url' => 'required|url|unique:metas,url,'.$id,
            'title' => 'required|max:250',
            'key_word' => 'required',
            'description' => 'required',
        ],
            [
                'url.required' => 'لطفا آدرس صفحه را وارد کنید',
                'url.url' => 'لطفا آدرس صفحه را صحیح وارد کنید',
                'url.unique' => ' آدرس صفحه تکراری می باشد',
                'title.required' => 'لطفا عنوان را وارد کنید',
                'title.max' => 'عنوان نباید بیشتر از 240 کاراکتر باشد',
                'key_word.required' => 'لطفا کبمات کلیدی را وارد کنید',
                'description.required' => 'لطفا توضیحات را وارد کنید',
            ]);
        $item = Meta::find($id);
        try {
            $item->url = $request->url;
            $item->title = $request->title;
            $item->key_word = $request->key_word;
            $item->description = $request->description;
            $item->update();
            return redirect()->route('meta-list')->with('flash_message', 'متا با موفقیت ویرایش شد.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'مشکلی در ویرایش متا بوجود آمده،مجددا تلاش کنید');
        }
    }

    public function destroy($id)
    {
        $item = Meta::find($id);
        try {
            $item->delete();
            return redirect()->back()->with('flash_message', 'متا با موفقیت حذف شد.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'مشکلی در حذف متا بوجود آمده،مجددا تلاش کنید');
        }
    }

    public function active($id, $type)
    {
        $item = Meta::find($id);
        try {
            $item->status = $type;
            $item->update();
            if ($type == 'pending') {
                return redirect()->back()->with('flash_message', 'نمایش متا با موفقیت غیر فعال شد.');
            }
            if ($type == 'active') {
                return redirect()->back()->with('flash_message', 'نمایش متا با موفقیت فعال شد.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'مشکلی در تغییر وضعیت کاربر بوجود آمده،مجددا تلاش کنید');
        }
    }
}


