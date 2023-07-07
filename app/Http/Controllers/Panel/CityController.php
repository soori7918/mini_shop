<?php

namespace App\Http\Controllers\Panel;

use App\Category;
use App\Location;
use App\Photo;
use App\Setting;
use App\City;
use App\Http\Controllers\Controller;
use App\Villa;
use Illuminate\Http\Request;
use  Carbon\Carbon;
use Illuminate\Support\Facades\File;

class CityController extends Controller
{

    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'منطقه ها';
        } elseif ('single') {
            return 'منطقه';
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

    public function index()
    {
        $items = City::latest()->paginate($this->controller_paginate());
        return view('panel.cities.index', compact('items'), ['title' => $this->controller_title('sum')]);
    }

    public function create()
    {
        return view('panel.cities.create', ['title' => $this->controller_title('single')]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required'
        ]);

        $item = new City();
        $item->name = $request->get('name');
        $item->slug = $request->get('slug');
        $item->latitude = $request->get('latitude');
        $item->longitude = $request->get('longitude');

        $item->save();

        return redirect()->route('city-list');
    }

}
