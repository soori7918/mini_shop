<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Setting;
use App\User;
use Illuminate\Support\Facades\Cache;
use Sarfraznawaz2005\VisitLog\Models\VisitLog;

class VisitlogController extends Controller
{

    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'بازدید ها';
        } elseif ('single') {
            return 'بازدید';
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
        $visitlogs = VisitLog::paginate($this->controller_paginate());
        $users = User::get();
        $online = 0;
        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id)) {
                $online++;
            }
        }
        return view('panel.visitlogs.index', compact('visitlogs', 'online'), ['title' => $this->controller_title('sum')]);
    }

}
