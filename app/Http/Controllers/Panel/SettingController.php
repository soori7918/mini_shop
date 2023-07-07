<?php

namespace App\Http\Controllers\Panel;

use App\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'تنظیمات';
        } elseif('single') {
            return 'تنظیم';
        }
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
        $settings = Setting::latest()->first();
        return view('panel.settings.index', compact('settings'), ['title' => $this->controller_title('sum')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SettingRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $settings = Setting::findOrFail($id);
        try {
            $settings->title = $request->title;
            $settings->keywords = $request->keywords;
            $settings->description = $request->description;
            $settings->paginate = $request->paginate;
            $settings->phone = $request->phone;
            $settings->address = $request->address;
            $settings->adress2 = $request->adress2;
            $settings->tel = $request->tel;
            $settings->insta = $request->insta;
            $settings->whatsapp = $request->whatsapp;
            $settings->facebook = $request->facebook;
            $settings->twitter = $request->twitter;
            $settings->conseling_phone = $request->conseling_phone;
            $settings->email = $request->email;

            if ($request->hasFile('logo')) {
                $settings->logo = file_store($request->logo, 'assets/uploads/logo/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/image/', 'image-');;
            }
            $settings->save();

            return redirect()->route('settings.index')->with('flash_message', 'تنظیمات ذخیره شد.');

        } catch (\Exception $e) {

            return redirect()->back()->withInput();

        }

    }

}
