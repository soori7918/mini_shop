<?php

namespace App\Http\Controllers\Panel;

use App\User;
use App\Setting;
use App\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'درباره ما';
        } elseif ('single') {
            return 'درباره ما';
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
        $items = About::orderBy('id','desc')->paginate($this->controller_paginate());
        return view('panel.about.index', compact('items'), ['title' => 'درباره ما', 'title2' => $this->controller_title('sum')]);
    }
    public function create()
    {
        return view('panel.about.create', ['title' => 'درباره ما', 'title2' => 'افزودن درباره ما']);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:250',
            'text' => 'required',
            'pic' => 'required|image|mimes:jpeg,jpg,png|max:5200',
        ],
            [
                'title.required' => 'لطفا عنوان را وارد کنید',
                'title.max' => 'عنوان نباید بیشتر از 240 کاراکتر باشد',
                'text.required' => 'لطفا متن را وارد کنید',
                'pic.required' => 'لطفا تصویر را وارد کنید',
                'pic.image' => 'لطفا یک تصویر را انتخاب کنید',
                'pic.mimes' => 'لطفا یک تصویر با فرمت (jpg,png) انتخاب کنید',
                'pic.max' => 'حجم تصویر زیر 5 مگ باشد',
            ]);
        try {
            $item = new About();
            $item->title = $request->title;
            $item->text = $request->text;
            if($request->page=='service')
            {
                $item->text_input = $request->text_input;
            }
            $item->page = $request->page;
            if ($request->hasFile('pic')) {
                $item->pic = file_store($request->pic, 'assets/uploads/about/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'about-pic-');;
            }
            $item->save();
            return redirect()->route('about-list')->with('flash_message', 'درباره ما با موفقیت ایجاد شد.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'مشکلی در ایجاد درباره ما بوجود آمده،مجددا تلاش کنید');
        }
    }

    public function edit($id)
    {
        $item = About::find($id);
        return view('panel.about.edit', compact('item'), ['title' => 'درباره ما', 'title2' => 'ویرایش درباره ما']);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:250',
            'text' => 'required',
            'pic' => 'nullable|image|mimes:jpeg,jpg,png|max:5200',
        ],
            [
                'title.required' => 'لطفا عنوان را وارد کنید',
                'title.max' => 'عنوان نباید بیشتر از 240 کاراکتر باشد',
                'text.required' => 'لطفا متن را وارد کنید',
                'pic.image' => 'لطفا یک تصویر را انتخاب کنید',
                'pic.mimes' => 'لطفا یک تصویر با فرمت (jpg,png) انتخاب کنید',
                'pic.max' => 'حجم تصویر زیر 5 مگ باشد',
            ]);
        $item = About::find($id);
        try {
            $item->title = $request->title;
            $item->text = $request->text;
            if($item->page=='service' || $item->page=='home')
            {
                $item->text_input = $request->text_input;
            }

//            if(!in_array($item->id,[2,3,4,13,14]))
//            {
//                $item->page = $request->page;
//            }
            if ($request->hasFile('pic')) {
                if(is_file($item->pic))
                {
                    File::delete($item->pic);
                }
                $item->pic = file_store($request->pic, 'assets/uploads/about/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'about-pic-');;
            }
            $item->update();
            return redirect()->route('about-list')->with('flash_message', 'درباره ما با موفقیت ویرایش شد.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'مشکلی در ویرایش درباره ما بوجود آمده،مجددا تلاش کنید');
        }
    }

    public function destroy($id)
    {
        $item = About::find($id);
        if(in_array($item->id,[2,3,4]))
        {
            abort(404);
        }
        try {
            $item->delete();
            return redirect()->back()->with('flash_message', 'درباره ما با موفقیت حذف شد.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'مشکلی در حذف درباره ما بوجود آمده،مجددا تلاش کنید');
        }
    }

    public function active($id, $type,$item_type)
    {
        $item = About::find($id);
        try {
            $item->$item_type = $type;
            $item->update();
            if ($type == 'pending') {
                return redirect()->back()->with('flash_message', 'نمایش درباره ما با موفقیت غیر فعال شد.');
            }
            if ($type == 'active') {
                return redirect()->back()->with('flash_message', 'نمایش درباره ما با موفقیت فعال شد.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'مشکلی در تغییر وضعیت درباره ما بوجود آمده،مجددا تلاش کنید');
        }
    }
}


