<?php

namespace App\Http\Controllers\Panel;

use App\Photo;
use App\Setting;
use App\Agent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AgentController extends Controller
{

    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'نماینده ها';
        } elseif ('single') {
            return 'نماینده';
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
        $title='لیست نمایندگان';

        $items = Agent::orderBy('created_at','desc')->paginate();
        return view('panel.agent.index', compact('items'), ['title' => $title]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type=null)
    {
        $title=' افزودن نماینده';

        return view('panel.agent.create', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $item = Agent::create($request->only('name', 'slug', 'description','address', 'phone','status'));
            $item->created_by=auth()->user()->id;
            if ($request->hasFile('photo')) {
                $item->photo = file_store($request->photo, 'assets/uploads/agent/'.$request->type.'/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');;
            }

            $item->save();

            return redirect()->route('agent.index')->with('flash_message', ' با موفقیت افزوده شد.');

        } catch (\Exception $e) {
            return redirect()->back()->withInput();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Agent::findOrFail($id);
        return view('panel.agent.show', compact('item'), ['title' => $this->controller_title('single')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Agent::findOrFail($id);
        $title=' مقالات';
        return view('panel.agent.edit', compact('item'), ['title' => $title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Agent::findOrFail($id);

        try {

            $item->name = $request->name;
            $item->slug = $request->slug;
            $item->description = $request->description;
            $item->address = $request->address;
            $item->status = $request->status;
            $item->phone = $request->phone;

            if ($request->hasFile('photo')) {
                if ($item->photo!=null) {
                    File::delete($item->photo);
                    $item->photo = file_store($request->photo, 'assets/uploads/agent/'.$request->type.'/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
                } else {
                    $item->photo = file_store($request->photo, 'assets/uploads/agent/'.$request->type.'/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
                }
            }

            $item->save();

//            Activity::publish('edit',$item)->save();
            return redirect()->route('agent.index')->with('flash_message', ' با موفقیت ویرایش شد.');

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
        $post = Agent::findOrFail($id);

        try {
            File::delete($post->photo);
            $post->delete();

            return redirect()->back()->with('flash_message', 'نماینده با موفقیت حذف شد.');

        } catch (\Exception $e) {
            return redirect()->back();

        }
    }


}
