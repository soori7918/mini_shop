<?php

namespace App\Http\Controllers\Panel;

use App\Role;
use App\Setting;
use App\User;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserPropertyController extends Controller
{

    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'کارشناسان';
        } elseif ('single') {
            return 'مدیر ملک';
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
    public function index(Request $request)
    {
        $users = User::where('account_status','active')->role(['مدیر ملک','call center','call center(sales)','مدیر','تعیین کننده ملک','کارشناس فروش','مدیر ملک(برنزی)'])->orderBy('id', 'ASC')->get();
        return view('panel.users.expert.index', compact('users'), ['title' => $this->controller_title('sum')]);
    }

    public function search(Request $request)
    {
        $users = User::role($this->controller_title('single'))->where('first_name','LIKE','%'.$request->search.'%')->orWhere('last_name','LIKE','%'.$request->search.'%')->orWhere('mobile','LIKE','%'.$request->search.'%')->orWhere('email','LIKE','%'.$request->search.'%')->paginate(99999);
        return view('panel.users.expert.index', compact('users'), ['title' => $this->controller_title('sum')]);
    }

    public function block(Request $request , $id)
    {
        $item = User::findOrfail($id);

        try{
            $item->account_status = 'blocked';
            $item->save();
            return redirect()->route('user-list')->with('flash_message', 'مدیر ملک با موفقیت بلاک شد.');

        } catch (\Exception $e) {

            return redirect()->back()->withInput();

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $langs = User::langs();
        return view('panel.users.expert.create',compact('langs'), ['title' => $this->controller_title('single')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        try {

            $user = new User();
            $user->first_name=$request->first_name;
            $user->last_name=$request->last_name;
            $user->email=$request->email;
            $user->mobile=$request->mobile;
            $user->password=$request->password;
            $user->account_status=$request->account_status;
            $user->mobile_status=$request->mobile_status;
            $user->date_of_birth=$request->date_of_birth;
            $user->gender=$request->gender;
            $user->type=$request->type;
            $user->postal_address=$request->postal_address;
            $user->whatsapp=$request->whatsapp;
            $user->kimlik_number=$request->kimlik_number;
            $user->education=$request->education;
            $user->marital=$request->marital;
            $user->languages=json_encode($request->languages);
            $user->mobile=$request->mobile;
            $user->user_reg=auth()->user()->id;
            $user->mobile_status="pending";
            $user->birth_place=$request->birth_place;
            if ($request->hasFile('bill')) {
                $user->bill = file_store($request->bill, 'assets/uploads/villas/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/files/', 'file-');
            }

            if ($request->hasFile('kimlik')) {
                $user->kimlik = file_store($request->kimlik, 'assets/uploads/villas/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/files/', 'file-');
            }
            $user->save();

            $user->assignRole('مدیر ملک');
            $user->save();

                return redirect()->route('user-property-list')->with('flash_message', 'مدیر ملک با موفقیت افزوده شد.');

        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->withInput();

        }
    }
    public function pending()
    {
        $users = User::where('account_status','pending')->role(['مدیر ملک','مدیر ملک(برنزی)','کارشناس فروش'])->paginate($this->controller_paginate());
        return view('panel.users.expert.pending', compact('users'), ['title' => 'کارشناسان در انتظار تایید']);
    }
    public function rejected()
    {
        $users = User::where('account_status','rejected')->role($this->controller_title('single'))->paginate($this->controller_paginate());
        return view('panel.users.expert.rejected', compact('users'), ['title' => 'کارشناسان رد شده']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('panel.users.show', compact('user'), ['title' => $this->controller_title('single')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('panel.users.expert.edit', compact('user'), ['title' => $this->controller_title('single')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        try {

            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            if ($request->account_status) {
                $user->account_status = $request->account_status;
            } else {
                $user->account_status = 'pending';
            }
            if ($request->mobile_status) {
                $user->mobile_status = $request->mobile_status;
            } else {
                $user->mobile_status = 'pending';
            }
            $user->save();

            return redirect()->route('user-property-list')->with('flash_message', 'مدیر ملک با موفقیت ویرایش شد.');

        } catch (\Exception $e) {

            return redirect()->back()->withInput();

        }

    }

}
