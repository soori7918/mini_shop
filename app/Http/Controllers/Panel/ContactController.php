<?php

namespace App\Http\Controllers\Panel;

use App\Setting;
use App\Contact;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{

    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'تماس';
        } elseif ('single') {
            return 'تماس';
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
        $contacts = Contact::latest()->paginate($this->controller_paginate());
        return view('panel.contacts.index', compact('contacts'), ['title' => $this->controller_title('sum')]);
    }
    public function index1()
    {
        $contacts = Contact::where('type','consulting')->latest()->paginate($this->controller_paginate());
        return view('panel.contacts.index1', compact('contacts'), ['title' => 'درخواست مشاوره']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);

        try {

            $contact->delete();
            return redirect()->back()->with('flash_message', ' با موفقیت حذف شد.');

        } catch (\Exception $e) {

            return redirect()->back();

        }
    }
}
