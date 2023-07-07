<?php

namespace App\Http\Controllers\Panel;

use App\User;
use App\Setting;
use App\ContactInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ContactInfoController extends Controller
{
    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'تماس با ما';
        } elseif ('single') {
            return 'تماس با ما';
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
        $items = ContactInfo::orderBy('id','desc')->paginate($this->controller_paginate());
        return view('panel.contacts.page.index', compact('items'), ['title' => 'تماس با ما', 'title2' => $this->controller_title('sum')]);
    }
    public function create()
    {
        return view('panel.contacts.page.create', ['title' => 'تماس با ما', 'title2' => 'افزودن تماس با ما']);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:250',
            'phone' => 'required',
            'address' => 'required',
        ],
            [
                'title.required' => 'لطفا عنوان را وارد کنید',
                'title.max' => 'عنوان نباید بیشتر از 240 کاراکتر باشد',
                'phone.required' => 'لطفا شماره تماس دفتر را وارد کنید',
                'address.required' => 'لطفا آدرس را وارد کنید',
            ]);
        try {
            $item = new ContactInfo();
            $item->title = $request->title;
            $item->phone = $request->phone;
            $item->phone_header = $request->phone_header;
            $item->phone_icall = $request->phone_icall;
            $item->whatsapp = $request->whatsapp;
            $item->phone_whatsapp = $request->phone_whatsapp;
            $item->mobile = $request->mobile;
            $item->address = $request->address;
            $item->email = $request->email;
            $item->email_header = $request->email_header;
            $item->facebook = $request->facebook;
            $item->twitter = $request->twitter;
            $item->instagram = $request->instagram;
            $item->telegram = $request->telegram;
            $item->linkedin = $request->linkedin;
            $item->pinterest = $request->pinterest;
            $item->aparat = $request->aparat;
            $item->youtube = $request->youtube;
            $item->iframe = $request->iframe;
            $item->save();
            return redirect()->route('contact-info-list')->with('flash_message', 'تماس با ما با موفقیت ایجاد شد.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'مشکلی در ایجاد تماس با ما بوجود آمده،مجددا تلاش کنید');
        }
    }

    public function edit($id)
    {
        $item = ContactInfo::find($id);
        return view('panel.contacts.page.edit', compact('item'), ['title' => 'تماس با ما', 'title2' => 'ویرایش تماس با ما']);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:250',
            'phone' => 'required',
            'address' => 'required',
        ],
            [
                'title.required' => 'لطفا عنوان را وارد کنید',
                'title.max' => 'عنوان نباید بیشتر از 240 کاراکتر باشد',
                'phone.required' => 'لطفا شماره تماس دفتر را وارد کنید',
                'address.required' => 'لطفا آدرس را وارد کنید',
            ]);
        $item = ContactInfo::find($id);
        try {
            $item->title = $request->title;
            $item->phone = $request->phone;
            $item->phone_header = $request->phone_header;
            $item->phone_icall = $request->phone_icall;
            $item->whatsapp = $request->whatsapp;
            $item->phone_whatsapp = $request->phone_whatsapp;
            $item->mobile = $request->mobile;
            $item->address = $request->address;
            $item->email = $request->email;
            $item->email_header = $request->email_header;
            $item->facebook = $request->facebook;
            $item->twitter = $request->twitter;
            $item->instagram = $request->instagram;
            $item->telegram = $request->telegram;
            $item->linkedin = $request->linkedin;
            $item->pinterest = $request->pinterest;
            $item->aparat = $request->aparat;
            $item->youtube = $request->youtube;
            $item->iframe = $request->iframe;
            $item->update();
            return redirect()->route('contact-info-list')->with('flash_message', 'تماس با ما با موفقیت ویرایش شد.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'مشکلی در ویرایش تماس با ما بوجود آمده،مجددا تلاش کنید');
        }
    }

    public function destroy($id)
    {
        $item = ContactInfo::find($id);
        try {
            $item->delete();
            return redirect()->back()->with('flash_message', 'تماس با ما با موفقیت حذف شد.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'مشکلی در حذف تماس با ما بوجود آمده،مجددا تلاش کنید');
        }
    }

    public function active($id, $type,$item_type)
    {
        $item = ContactInfo::find($id);
        try {
            $item->$item_type = $type;
            $item->update();
            if ($type == 'pending') {
                return redirect()->back()->with('flash_message', 'نمایش تماس با ما با موفقیت غیر فعال شد.');
            }
            if ($type == 'active') {
                return redirect()->back()->with('flash_message', 'نمایش تماس با ما با موفقیت فعال شد.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'مشکلی در تغییر وضعیت تماس با ما بوجود آمده،مجددا تلاش کنید');
        }
    }
}


