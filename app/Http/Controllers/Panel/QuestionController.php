<?php

namespace App\Http\Controllers\Panel;

use App\Question;
use App\Setting;
use App\Contact;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{

    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'پرسش ها';
        } elseif ('single') {
            return 'پرسش';
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
        $contacts = Question::latest()->paginate($this->controller_paginate());
        return view('panel.question.index', compact('contacts'), ['title' => $this->controller_title('sum')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Question::findOrFail($id);

        try {

            $contact->delete();
            return redirect()->route('question-list')->with('flash_message', 'پرسش با موفقیت حذف شد.');

        } catch (\Exception $e) {

            return redirect()->back();

        }
    }
}
