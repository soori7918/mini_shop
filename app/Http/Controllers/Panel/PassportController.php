<?php

namespace App\Http\Controllers\Panel;

use App\Passport;
use App\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class PassportController extends Controller
{

    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'پاسپورت ها';
        } elseif ('single') {
            return 'پاسپورت';
        }
    }

    public function controller_paginate()
    {
        $settings = Setting::select('paginate')->latest()->firstOrFail();
        return $settings->paginate;
    }

    public function __construct()
    {
        $this->middleware(['auth', 'SuperAdmin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $items = Passport::latest()->paginate($this->controller_paginate());
        return view('panel.passport.index', compact('items'), ['title' => $this->controller_title('sum')]);
    }

    /**
     * Display the specified resource.
     *
     * @param Passport $passport
     * @return Response
     */
    public function show(Passport $passport)
    {
        return view('panel.passport.show', compact('passport'), ['title' => $this->controller_title('single')]);
    }
}
