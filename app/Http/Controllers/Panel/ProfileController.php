<?php

namespace App\Http\Controllers\Panel;

use App\Country;
use App\Setting;
use App\User;
use App\Photo;
use App\UserCharacter;
use App\ProvinceCity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{

    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'پروفایل';
        } elseif ('single') {
            return 'پروفایل';
        }
    }

    public function controller_paginate()
    {
        $settings = Setting::select('paginate')->latest()->firstOrFail();
        return $settings->paginate;
    }

    public function __construct()
    {
        $this->middleware(['auth']);
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = User::findOrFail($id);
        if (!auth()->user()->hasRole('مدیر')) {
            if ($profile->id != auth()->user()->id) {
                abort(404, 'غیرمجاز');
            }
        }

        return view('panel.profile.show', compact('profile'), ['title' => $this->controller_title('single')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = User::findOrFail($id);
        if (!auth()->user()->hasRole('مدیر')) {
            if ($profile->id != auth()->user()->id) {
                abort(404, 'غیرمجاز');
            }

        }

        $status = $profile->mobile_status;
        $code = $profile->mobile_code;
        $country = Country::orderBy('fa_name', 'asc')->get();

        return view('panel.profile.edit', compact('profile', 'status', 'code', 'country'), ['title' => $this->controller_title('single')]);
    }

    /**
     * Password the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function password($id)
    {
        $profile = User::findOrFail($id);
        if (auth()->user()->role != 'مدیر') {
            if ($profile->id != auth()->user()->id) {
                abort(404, 'غیرمجاز');
            }
        }
        return view('panel.profile.password', compact('profile'), ['title' => $this->controller_title('single')]);
    }

    /**
     * Info the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function info($id)
    {
        $info = UserCharacter::where('user_id', $id)->latest()->with('user')->first();
        $profile = User::findOrFail($id);
        if (auth()->user()->role != 'مدیر') {
            if ($profile->id != auth()->user()->id) {
                abort(404, 'غیرمجاز');
            }
        }
        $provinces = ProvinceCity::where('parent_id', 0)->orderBy('id')->select('id', 'name')->get();
        $cities = ProvinceCity::where('parent_id', '!=', 0)->orderBy('id')->select('id', 'name')->get();
        return view('panel.profile.info', compact('info', 'profile', 'provinces', 'cities'), ['title' => $this->controller_title('single')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $profile = User::findOrFail($id);
        if (!auth()->user()->hasRole('مدیر')) {
            if ($profile->id != auth()->user()->id) {
                abort(404, 'غیرمجاز');
            }
            $check = User::where('mobile', $request->mobile)->where('id','!=', $id)->first();
            if ($check) {
                return redirect()->back()->withErrors('شماره موبایل تکراری است!');
            }
        }
        $this->validate($request, [
            'first_name' => 'required|max:191',
            'last_name' => 'required|max:191',
        ]);

        if (auth()->user()->hasRole('مدیر ملک')) {
            $this->validate($request, [
//                'fname_en' => 'required|max:250',
//                'lname_en' => 'required|max:250',
//                'father_name' => 'required|max:250',
//                'living_country' => 'required',
//                'nationality' => 'required|max:250',
//                'ncode' => 'required',
//                'postal_address' => 'required',
            ], [
                'fname_en.required' => 'نام لاتین خود را وارد کنید',
                'fname_en.max' => 'نام لاتین خود را حداکثر با 250 کاراکتر ثبت کنید',
                'lname_en.required' => 'نام خانوادگی لاتین خود را وارد کنید',
                'lname_en.max' => 'نام خانوادگی لاتین خود را حداکثر با 250 کاراکتر ثبت کنید',
                'father_name.required' => 'نام پدر خود را وارد کنید',
                'father_name.max' => 'نام پدر خود را حداکثر با 250 کاراکتر ثبت کنید',
                'email.required' => 'ایمیل فیلد الزامی می باشد',
                'email.email' => 'فرمت صحیح ایمیل را رعایت کنید(test@test.com)',
                'email.unique' => 'این ایمیل یکبار ثبت نام شده',
                'living_country.required' => 'کشور خود را مشخص کنید',
                'nationality.required' => 'ملیت خود را وارد کنید',
                'nationality.max' => 'ملیت خود را حداکثر با 250 کاراکتر ثبت کنید',
                'ncode.required' => 'لطفا کدملی/شماره پاسپورت خود را وارد کنید',
                'postal_address.required' => 'لطفا آدرس خود را وارد کنید',
                'address_pic.required' => 'پروف آدرس الزامی است.',
                'passport_pic.required' => 'پروف پاسپورت الزامی است.',
            ]);


        }
        if (auth()->user()->hasRole('مدیر')) {
            $this->validate($request, [
//                'mobile' => 'unique:users,mobile',$id,
            ], [
                'fname_en.required' => 'نام لاتین خود را وارد کنید',
                'fname_en.max' => 'نام لاتین خود را حداکثر با 250 کاراکتر ثبت کنید',
                'lname_en.required' => 'نام خانوادگی لاتین خود را وارد کنید',
                'lname_en.max' => 'نام خانوادگی لاتین خود را حداکثر با 250 کاراکتر ثبت کنید',
                'father_name.required' => 'نام پدر خود را وارد کنید',
                'father_name.max' => 'نام پدر خود را حداکثر با 250 کاراکتر ثبت کنید',
                'email.required' => 'ایمیل فیلد الزامی می باشد',
                'email.email' => 'فرمت صحیح ایمیل را رعایت کنید(test@test.com)',
                'email.unique' => 'این ایمیل یکبار ثبت نام شده',
                'living_country.required' => 'کشور خود را مشخص کنید',
                'nationality.required' => 'ملیت خود را وارد کنید',
                'nationality.max' => 'ملیت خود را حداکثر با 250 کاراکتر ثبت کنید',
                'ncode.required' => 'لطفا کدملی/شماره پاسپورت خود را وارد کنید',
                'postal_address.required' => 'لطفا آدرس خود را وارد کنید',
                'address_pic.required' => 'پروف آدرس الزامی است.',
                'passport_pic.required' => 'پروف پاسپورت الزامی است.',
            ]);


        }
        try {

            if ($profile->account_status != 'active' || auth()->user()->hasRole('مدیر')) {
                $profile->first_name = $request->first_name;
                $profile->last_name = $request->last_name;
            }
            if (auth()->user()->hasRole('مدیر')) {
                $profile->mobile = $request->mobile;
            }
            if ($request->hasFile('photo')) {
                if (count($profile->photos)){
                    foreach ($profile->photos as $p){
                        $p->delete();
                    }
                }
                $photo = new Photo();
                $photo->path = file_store($request->photo, 'assets/uploads/user/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
                $profile->photo()->save($photo);
            }

            if ($profile->account_status != 'active' || auth()->user()->hasRole('مدیر')) {
                $profile->fname_en = $request->fname_en;
                $profile->lname_en = $request->lname_en;
                $profile->father_name = $request->father_name;
                $profile->area_code = $request->area_code;
                $profile->gender = $request->gender;
                $profile->living_country = $request->living_country;
                $profile->nationality = $request->nationality;
                $profile->ncode = $request->ncode;
                $code_email = rand(100000, 999999);
                $profile->email_code = $code_email;
                $profile->postal_address = $request->postal_address;
                $profile->password2 = bcrypt($request->password2);
                $profile->registration = 'complete';
                if ($request->user_id == 0) {
                    $profile->user_id = null;
                }else{
                    $profile->user_id = $request->user_id;
                }
                if (auth()->user()->hasRole('مدیر')){
                    // remove current roles
                    if ($request->role_name){
                        foreach ($profile->getRoleNames() as $role_name){
                            $profile->removeRole($role_name);
                        }
                        // assign new roles
                        foreach ($request->role_name as $role_name){
                            $profile->assignRole($role_name);
                        }
                    }
                }

                $address_pic = $request->file('address_pic');
                if ($address_pic) {
                    $profile->address_pic = file_store($address_pic, 'assets/uploads/villas/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/files/', 'file-');
                }

                $passport_pic = $request->file('passport_pic');
                if ($passport_pic) {
                    $profile->passport_pic = file_store($passport_pic, 'assets/uploads/villas/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/files/', 'file-');
                }

                if (auth()->id() == $profile->id){
                    $profile->account_status = 'pending';
                    $profile->editables = null;

                    if ($profile->mobile){
                        $body = [
                            "originator"=>"Khane",
                            "message"=>"خانه استانبول » حساب شما در دست بررسی قرار گرفت",
                            "to"=>[$profile->mobile],
                            "encoding"=>"default"
                        ];
                        MASGSM('http://api.v2.masgsm.com.tr/v2/sms/basic',$body);
                    }
                }
            }
            else {
                $profile->first_name=$request->first_name;
                $profile->last_name=$request->last_name;
                $profile->email=$request->email;
                $profile->area_code=$request->area_code;
//                $profile->mobile=$request->mobile;
            }

            $profile->update();

            if (!is_null(request('callback_url'))){
                return redirect(request('callback_url'))->with('flash_message', 'پروفایل با موفقیت ویرایش شد.');
            }

            return redirect()->route('profile-show', $profile->id)->with('flash_message', 'پروفایل با موفقیت ویرایش شد.');

        } catch (\Exception $e) {
            return redirect()->back()->withInput();
        }

    }

    /**
     * Password the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function password_update(Request $request, $id)
    {
        $profile = User::findOrFail($id);
        if (auth()->user()->role != 'مدیر') {
            if ($profile->id != auth()->user()->id) {
                abort(404, 'غیرمجاز');
            }
        }
        $this->validate($request, [
            'password' => 'required|min:6|confirmed'
        ]);

        try {

            if ($request->password) {
                $profile->password = $request->password;
            }
            $profile->save();

            return redirect()->route('profile-show', $profile->id)->with('flash_message', 'رمز عبور با موفقیت ویرایش شد.');

        } catch (\Exception $e) {

            return redirect()->back()->withInput();

        }

    }

    /**
     * Info the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function info_update(Request $request, $id)
    {
        $profile = User::findOrFail($id);
        if (auth()->user()->role != 'مدیر') {
            if ($profile->id != auth()->user()->id) {
                abort(404, 'غیرمجاز');
            }
        }

        if ($profile->character == 'real') {
            $this->validate($request, [
                'national_code' => 'required|max:191',
                'date_of_birth' => 'required|max:191',
                'postal_code' => 'required|max:191',
                'postal_address' => 'required|max:191',
                'phone' => 'required|max:191'
            ]);
        } elseif ($profile->character == 'legal') {
            $this->validate($request, [
                'company_name' => 'required|max:191',
                'company_registration_number' => 'required|max:191',
                'economical_number' => 'required|max:191',
                'code_national_identity' => 'required|max:191',
                'postal_code' => 'required|max:191',
                'postal_address' => 'required|max:191',
                'phone' => 'required|max:11'
            ]);
        }

        try {

            UserCharacter::updateOrCreate(['user_id' => $profile->id], $request->all());
            return redirect()->route('profile-show', $profile->id)->with('flash_message', 'پروفایل با موفقیت ویرایش شد.');

        } catch (\Exception $e) {

            return redirect()->back()->withInput();

        }

    }

}
