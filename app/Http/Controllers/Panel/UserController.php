<?php

namespace App\Http\Controllers\Panel;

use App\Category;
use App\Permission;
use App\Photo;
use App\Villa;
use App\QuestionnaireReadyExperts;
use App\Location;
use App\Property;
use App\Setting;
use App\Questionnaire;
use App\City;
use App\User;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use function foo\func;

class UserController extends Controller
{

    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'کاربران';
        } elseif ('single') {
            return 'کاربر';
        }
    }

    public function controller_paginate()
    {
        $settings = Setting::select('paginate')->latest()->firstOrFail();
        return $settings->paginate;
    }

    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin'])->except('sign_in_back');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $title=$this->controller_title('sum');
        if (auth()->user()->hasRole("مدیر") || auth()->user()->hasRole("watcher")) {
            $users1 = User::doesntHave('roles')->get();
            $users2 = User::role('کاربر')->get();
            $users=$users1->merge($users2);
            if (request()->type=='all'){
                $title="همه کاربران";
                $users = User::get();
            }
            elseif (request()->type=='rent'){
                $title="مشتریان اجاره";
                $newUsers=new Collection();
                foreach ($users as $user){
                    if (is_serialized($user->type_request)){
                        $serialized= unserialize($user->type_request);
                        if(gettype($serialized)=='array'){
                            foreach (unserialize($user->type_request) as $val){
                                if ($val=='rent'){
                                    $newUsers=$newUsers->push($user);
                                }
                            }
                        }
                    }
                }
                $users= $newUsers;
            }
            elseif (request()->type=='sales'){
                $title="مشتریان فروش";
                $newUsers=new Collection();
                foreach ($users as $user){
                    if (is_serialized($user->type_request)){
                        $serialized= unserialize($user->type_request);
                        if(gettype($serialized)=='array'){
                            foreach (unserialize($user->type_request) as $val){
                                if ($val=='buy'){
                                    $newUsers=$newUsers->push($user);
                                }
                            }
                        }
                    }
                }
                $users= $newUsers;
            }
            elseif(\request()->type=='customers') {
                $title="مشتریان";
                $users = User::where("user_id", auth()->user()->id)->get();
            }
            elseif (\request()->type=='myCustomers'){
                $title="مشتریان من";
                $users = User::doesntHave('roles')->where("user_id", auth()->user()->id)->get();
            }
            else{
                $title="زیرمجموعه های من";
                $users = User::role(['مدیر ملک','کارشناس فروش','مدیر ملک(برنزی)'])->where("ref", auth()->user()->code)->orWhere("user_id", auth()->id())->role(['مدیر ملک','کارشناس فروش','مدیر ملک(برنزی)'])->get();
                return view('panel.users.subset', compact('users'), ['title' => $title]);
            }
        }
        elseif(\request()->type=='customers') {
            $title="مشتریان";
            $users = User::where("user_id", auth()->user()->id)->get();
        }
        elseif (auth()->user()->hasRole("call center")) {
            $title="مشتریان";
            $users = User::doesntHave('roles')->doesntHave('questionnaire')->where('remove_rent',isset(request()->removed)?1:0)->get();
            $newUsers=new Collection();
            foreach ($users as $user){
                if (is_serialized($user->type_request)){
                    $serialized= unserialize($user->type_request);
                    if(gettype($serialized)=='array'){
                        foreach (unserialize($user->type_request) as $val){
                            if ($val=='rent'){
                                $newUsers=$newUsers->push($user);
                            }
                        }
                    }
                }
            }
            $users= $newUsers;
        }
        elseif (auth()->user()->hasRole("call center(sales)")) {
            $title="مشتریان";
            $users = User::doesntHave('roles')->doesntHave('questionnaire')->where('remove_sales',isset(request()->removed)?1:0)->get();
            $newUsers=new Collection();
            foreach ($users as $user){
                if (is_serialized($user->type_request)){
                    $serialized= unserialize($user->type_request);
                    if(gettype($serialized)=='array'){
                        foreach (unserialize($user->type_request) as $val){
                            if ($val=='buy'){
                                $newUsers=$newUsers->push($user);
                            }
                        }
                    }
                }
            }
            $users= $newUsers;
        }
        else {

            if (\request()->type=='myCustomers'){
                $title="مشتریان من";
                $users = User::doesntHave('roles')->where("user_id", auth()->user()->id)->get();
            }else{
                $title="زیرمجموعه های من";
                $users = User::role(['مدیر ملک','کارشناس فروش','مدیر ملک(برنزی)'])->where("ref", auth()->user()->code)->orWhere("user_id", auth()->id())->role(['مدیر ملک','کارشناس فروش','مدیر ملک(برنزی)'])->get();
                return view('panel.users.subset', compact('users'), ['title' => $title]);
            }
        }

//        $users->appends(request()->only('type'));
        return view('panel.users.index', compact('users'), ['title' => $title]);
    }

    public function sign_in($id)
    {
        session(['user_id'=>auth()->id()]);
        auth()->loginUsingId($id);
        return redirect()->route('index');
    }
    public function sign_in_back($id)
    {
        session()->forget('user_id');
        auth()->loginUsingId($id);
        return redirect(route('user-property-list'));
    }

    public function pending()
    {
        $users = User::where('account_status', 'pending')->paginate($this->controller_paginate());
        return view('panel.users.pending', compact('users'), ['title' => $this->controller_title('sum')]);
    }

    public function search(Request $request)
    {
        if (auth()->user()->hasRole("مدیر")) {
            $users = User::role(['کاربر'])->where('first_name', 'LIKE', '%' . $request->search . '%')->orWhere('last_name', 'LIKE', '%' . $request->search . '%')->orWhere('mobile', 'LIKE', '%' . $request->search . '%')->orWhere('email', 'LIKE', '%' . $request->search . '%')->paginate(99999);
        } else {
            $users = User::where('user_reg', auth()->user()->id)->role($this->controller_title('single'))->where('first_name', 'LIKE', '%' . $request->search . '%')->orWhere('last_name', 'LIKE', '%' . $request->search . '%')->where('user_reg', auth()->user()->id)->orWhere('mobile', 'LIKE', '%' . $request->search . '%')->orWhere('email', 'LIKE', '%' . $request->search . '%')->where('user_reg', auth()->user()->id)->paginate(99999);
        }
        return view('panel.users.index', compact('users'), ['title' => $this->controller_title('sum')]);
    }

    public function block(Request $request, $id)
    {
        $item = User::findOrfail($id);

        try {
            $item->account_status = 'blocked';
            $item->save();
            return redirect()->route('user-list')->with('flash_message', 'کاربر با موفقیت بلاک شد.');

        } catch (\Exception $e) {

            return redirect()->back()->withInput();

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $langs = User::langs();
        return view('panel.users.create', compact('langs'), ['title' => $this->controller_title('single')]);
    }

    public function questionnaire($id)
    {
        $item=Questionnaire::where('user_id',$id)->first();
        $langs = User::langs();
        $categories = Category::where('type', 'villa')->latest()->get();
        $propertiesin = Property::where('type', 0)->get();
        $propertiesout = Property::where('type', 1)->get();
        $propertiesaccess = Property::where('type', 2)->get();
        $locations = Location::get();
        $cities = City::get();
        return view('panel.users.questionnaire', compact('langs','item','id', 'categories', 'propertiesin', 'propertiesout', 'propertiesaccess', 'locations', 'villas', 'districts', 'cities'), ['title' => $this->controller_title('single')]);
    }

    public function questionnaire_list()
    {
        if (auth()->user()->hasRole('مدیر ملک')){
            $users=User::whereHas('questionnaire')->where('rent_status','<=',4)->where('referred',0)->get();
            if (request()->type=='sales'){
                $newUsers=new Collection();
                foreach ($users as $user){
                    if (is_serialized($user->type_request)){
                        $serialized= unserialize($user->type_request);
                        if(gettype($serialized)=='array'){
                            foreach (unserialize($user->type_request) as $val){
                                if ($val=='buy'){
                                    $newUsers=$newUsers->push($user);
                                }
                            }
                        }
                    }
                }
                $users= $newUsers->paginate($this->controller_paginate());
            }elseif (request()->type=='rent'){
                $newUsers=new Collection();
                foreach ($users as $user){
                    if (is_serialized($user->type_request)){
                        $serialized= unserialize($user->type_request);
                        if(gettype($serialized)=='array'){
                            foreach (unserialize($user->type_request) as $val){
                                if ($val=='rent'){
                                    $newUsers=$newUsers->push($user);
                                }
                            }
                        }
                    }
                }
                $users= $newUsers->paginate($this->controller_paginate());
            }
        }else{
            $users=User::whereHas('questionnaire')->where('rent_status','<=',4)->where('referred',0)->get();
        }
        if (request()->type=='sales'){
            $newUsers=new Collection();
            foreach ($users as $user){
                if (is_serialized($user->type_request)){
                    $serialized= unserialize($user->type_request);
                    if(gettype($serialized)=='array'){
                        foreach (unserialize($user->type_request) as $val){
                            if ($val=='buy'){
                                $newUsers=$newUsers->push($user);
                            }
                        }
                    }
                }
            }
            $users= $newUsers->paginate($this->controller_paginate());
        }elseif (request()->type=='rent'){
            $newUsers=new Collection();
            foreach ($users as $user){
                if (is_serialized($user->type_request)){
                    $serialized= unserialize($user->type_request);
                    if(gettype($serialized)=='array'){
                        foreach (unserialize($user->type_request) as $val){
                            if ($val=='rent'){
                                $newUsers=$newUsers->push($user);
                            }
                        }
                    }
                }
            }
            $users= $newUsers->paginate($this->controller_paginate());
        }else{
            $users= $users->paginate($this->controller_paginate());
        }
        return view('panel.users.questionnaire_index', compact('users'), ['title' => $this->controller_title('sum')]);
    }

    public function questionnaire_store(Request $request)
    {
        $user=User::find($request->user_id);
        $item=Questionnaire::where('user_id',$request->user_id)->first();
        if (!$item){
            $item=new Questionnaire();
        }

        $item->user_id=$request->user_id;
        $item->pet=$request->pet;
        $item->property_type=serialize($request->property_type);
        $item->villa_view=serialize($request->villa_view);
        $item->vehicle=$request->vehicle;
        $item->properties_in=serialize($request->properties_in);
        $item->properties_out=serialize($request->properties_out);
        $item->lavazem=$request->lavazem;
        $item->built_year=$request->built_year;
        $item->price=str_replace(',','',$request->price);
        $item->price_type=$request->price_type;
        $item->cancel_reasons=$request->cancel_reasons;
        $item->description=$request->description;
        $file = $request->file('file');
        if ($request->hasFile('file')) {
            $item->file = file_store($file, 'assets/uploads/villas/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/files/', 'file-');
        }

        $item->save();
//        $user->rent_status=1;
//        $user->update();

        return redirect()->route('user-list')->with('flash_message', 'پرسشنامه با موفقیت ثبت شد.');


    }

    public function refer(Request $request)
    {
        //return $request;
        $user = User::find($request->id);
        $user->refer_id = (int)$request->user_id;
        $user->cancel_reason = '';
        $user->rent_status = 0;
        $user->referee_id = auth()->id();
        $user->referred = 1;
        $user->referred_at = Carbon::now();
        $user->referred_count += 1;
        $user->update();
        $this->sendNotification($user->id,$user->first_name.' '.$user->last_name);
        return redirect()->route('user_questionnaire_list')->with('flash_message', 'موفقیت ارجاع داده شد.');

    }
    public function sendNotification($user_id,$name)
    {
        $not= new \App\Notification();
        $not->user_id=$user_id;
        $not->type='refers';
        $not->message="کاربر گرامی ، مشتری $name به شما ارجاع داده شد";
        $not->save();
    }
    public function refer_deny(Request $request)
    {
        //return $request;
        $user = User::find($request->id);
        //$user->refer_id = 0;
        $user->cancel_reason = $request->cancel_reason;
        $user->rent_status = 3;
        $user->referred = 0;
        $user->update();
        return redirect()->back()->with('flash_message', 'با موفقیت لغو شد.');

    }
    public function refer_report(Request $request)
    {
        //return $request;
        $user = User::find($request->id);
        $user->refer_report= $request->refer_report??"";
        $user->update();
        $not= new \App\Notification();
        $not->user_id=$user->referee_id;
        $not->type='admin';
        $expert=fullName($user->refer);
        $not->message="کارشناس $expert برای ارجاع گزارش فعالیت ثبت کرد";
        $not->save();

        return redirect()->back()->with('flash_message', 'گزارش با موفقیت ثبت شد.');

    }

    public function refer_list()
    {
        $user=auth()->user();
        if ($user->hasRole('مدیر ملک')){
            $users=User::where('refer_id',$user->id)->where('referred',1)->where('reserved',0)->paginate($this->controller_paginate());
        }else{
            if (auth()->user()->hasRole('call center')){
                $users=User::where('referee_id',auth()->id())->where('refer_id','!=',0)->where('referred',1)->where('reserved',0)->with(['referee'])->paginate($this->controller_paginate());
                $newUsers=new Collection();
                foreach ($users as $user){
                    if (is_serialized($user->type_request)){
                        $serialized= unserialize($user->type_request);
                        if(gettype($serialized)=='array'){
                            foreach (unserialize($user->type_request) as $val){
                                if ($val=='rent'){
                                    $newUsers=$newUsers->push($user);
                                }
                            }
                        }
                    }
                }
                $users= $newUsers->paginate($this->controller_paginate());
            }elseif (auth()->user()->hasRole('call center(sales)')){
                $users=User::where('referee_id',auth()->id())->where('refer_id','!=',0)->where('referred',1)->where('reserved',0)->with(['referee'])->paginate($this->controller_paginate());
                $newUsers=new Collection();
                foreach ($users as $user){
                    if (is_serialized($user->type_request)){
                        $serialized= unserialize($user->type_request);
                        if(gettype($serialized)=='array'){
                            foreach (unserialize($user->type_request) as $val){
                                if ($val=='buy'){
                                    $newUsers=$newUsers->push($user);
                                }
                            }
                        }
                    }
                }
                $users= $newUsers->paginate($this->controller_paginate());
            }else{
                $users=User::where('refer_id','!=',0)->where('referred',1)->where('reserved',0)->with(['referee'])->paginate($this->controller_paginate());
            }
        }

        return view('panel.users.refer', compact('users'), ['title' => $this->controller_title('sum')]);
    }

    public function refer_report_list()
    {
        $user=auth()->user();
        $users=User::whereHas('questionnaire')->where('referred',1)->where('reserved',0)->paginate($this->controller_paginate());

        return view('panel.users.referReport', compact('users'), ['title' => $this->controller_title('sum')]);
    }

//    public function refer_deny(Request $request)
//    {
//        //return $request;
//        $user=User::find($request->id);
//        $user->refer_id= (int)$request->user_id;
//        $user->update();
//        return redirect()->route('questionnaire-list')->with('flash_message', 'موفقیت ارجاع داده شد.');
//
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'mobile' => 'required'
        ]);

        $mobile = preg_replace('/[^0-9]/', '', $request->get('mobile'));
        $mobile1 = preg_replace('/[^0-9]/', '', $request->get('mobile1'));

        if (User::where('mobile', $mobile)->first()) {
            return redirect()->back()->withErrors('شماره موبایل تکراری است!');
        }

        $role = auth()->user()->hasRole('مدیر ملک');
        if ($role) {
        }

        try {

            $data = $request->all();
            $data['location'] = serialize($request->location);
            $data['property_type'] = serialize($request->property_type);
            $data['property_usage'] = serialize($request->property_usage);
            $data['type_request'] = serialize($request->type_request);
            $data['room_number'] = serialize($request->room_number);
            $data['email_status'] = 'active';
            $data['budget'] = str_replace(',','',$request->budget);
            $data['mobile_status'] = 'active';
            $data['account_status'] = 'active';
            $data['budget_sales'] = str_replace(',','',$request->budget_sales);
            $data['password'] = Hash::make(Str::random(16));
            $data['mobile'] = $mobile;
            $data['mobile1'] = $mobile1;
            $data['lavazem'] = $request->type_request=='rent'?$request->lavazem:'';

            if ($role) {
                auth()->user()->users()->create($data);
            } else {
                if ($request->user_id == 0) {
                    $data['user_id'] = auth()->user()->id;
                }
                User::create($data);
            }
//            }

            if (!is_null(request('callback_url'))){
                return redirect(request('callback_url'))->with('flash_message', 'کاربر با موفقیت افزوده شد.');
            }
            return redirect()->route('user-list')->with('flash_message', 'کاربر با موفقیت افزوده شد.');


        } catch (\Exception $e) {
            return redirect()->back()->withInput();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('panel.users.show', compact('user'), ['title' => $this->controller_title('single')]);
    }
    public function customer_show($id)
    {
        $user = User::findOrFail($id);
        return view('panel.users.customer_show', compact('user'), ['title' => $this->controller_title('single')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $langs = User::langs();
        return view('panel.users.edit', compact('user', 'langs'), ['title' => $this->controller_title('single')]);
    }

    public function permissions($id)
    {
        $user = User::findOrFail($id);
        return view('panel.users.permissions', compact('user'), ['title' => 'دسترسی ها']);
    }
    public function permissions_update(Request $request, $id)
    {
        //return $request;
        $user = User::findOrFail($id);

        $names=['add','delete','view','edit'];
        foreach ($names as $name){

            $permissionName=$name.'_'.$request->model;

            //if (!$user->hasPermissionTo($permissionName)){
                $user->revokePermissionTo($permissionName);
            //}

        }

        if(count($request->permissions)){
            foreach ($request->permissions as $permission){

                $permissionName=$permission.'_'.$request->model;
                $old=Permission::where('name',$permissionName)->first();
                if (!$old){
                    $newPermission=new Permission();
                    $newPermission->name=$permissionName;
                    $newPermission->guard_name='web';
                    $newPermission->save();
                }
                $user->givePermissionTo($permissionName);

            }
        }
        //return $user->getDirectPermissions();


        // remove current roles
        foreach ($user->getRoleNames() as $role_name){
            $user->removeRole($role_name);
        }
        // assign new roles
        foreach ($request->role_name as $role_name){
            $user->assignRole($role_name);
        }

        //return $user;
//        }
        if (!is_null(request('callback_url'))){
            return redirect(request('callback_url'))->with('flash_message', 'دسترسی با موفقیت ویرایش شد.');
        }
        return redirect()->back()->with('flash_message', 'دسترسی با موفقیت ویرایش شد.');

//        } catch (\Exception $e) {
//
//            return redirect()->back()->withInput();
//
//        }

    }
    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param int $id
     * @return Response
     */
    public function status_update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->account_status = $request->account_status;
        $user->status_message = $request->status_message;
        $user->editables = serialize($request->editables);

        if ($user->account_status == 'active') {
            $user->email_status = 'active';

            $not= new \App\Notification();
            $not->user_id=$user->id;
            $not->type='admin';
            $not->message="خانه استانبول » حساب شما تایید شد";
            $not->save();

            if ($user->mobile){
                $body = [
                    "originator"=>"Khane",
                    "message"=>"خانه استانبول » حساب شما تایید شد",
                    "to"=>[$user->mobile],
                    "encoding"=>"default"
                ];
                MASGSM('http://api.v2.masgsm.com.tr/v2/sms/basic',$body);
            }

            $user->roles()->detach();
            $user->assignRole('مدیر ملک');

        }else{
            if ($user->mobile){

                $message=$request->status_message;
                $not= new \App\Notification();
                $not->user_id=$user->id;
                $not->type='admin';
                $not->message="خانه استانبول » حساب شما بنا به دلایلی رد شده است. دلیل : $message";
                $not->save();

                $body = [
                    "originator"=>"Khane",
                    "message"=>"خانه استانبول » حساب شما بنا به دلایلی رد شده است وارد حساب خود شده و نسبت به ویرایش موارد اقدام نمایید",
                    "to"=>[$user->mobile],
                    "encoding"=>"default"
                ];
                MASGSM('http://api.v2.masgsm.com.tr/v2/sms/basic',$body);
            }
        }

        $user->update();
        return back()->with('flash_message', 'وضعیت با موفقیت ویرایش شد.');

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'mobile' => 'required'
        ]);
        $user = User::findOrFail($id);
        $role = auth()->user()->hasRole('مدیر ملک');

        //return $request;
        if ($role && $user && $user->user_id != auth()->user()->id) {
            return redirect()->back()->withErrors('Oops!');
        }

        $mobile = preg_replace('/[^0-9]/', '', $request->get('mobile'));
        $mobile1 = preg_replace('/[^0-9]/', '', $request->get('mobile1'));
        $check = User::where('mobile', $mobile)->where('id','!=', $user->id)->first();
        if ($check) {
            return redirect()->back()->withErrors('شماره موبایل تکراری است!');
        }

        $data = $request->all();
        $data['location'] = serialize($request->location);
        $data['property_type'] = serialize($request->property_type);
        $data['property_usage'] = serialize($request->property_usage);
        $data['type_request'] = serialize($request->type_request);
        $data['room_number'] = serialize($request->room_number);
        $data['mobile'] = $mobile;
        $data['budget_sales'] = str_replace(',','',$request->budget_sales);
        $data['budget'] = str_replace(',','',$request->budget);
        $data['mobile1'] = $mobile1;
        $data['role_name'] = '';
        $data['lavazem'] = $request->type_request=='rent'?$request->lavazem:'';
        $data['mobile'] = preg_replace('/[^0-9]/', '', $request->get('mobile'));

        if ($role) {
            $user->update($data);
        } else {
            if ($request->user_id == 0) {
                $data['user_id'] = null;
            }
            $user->update($data);
        }

        if (auth()->user()->hasRole('مدیر')){
            // remove current roles
            if ($request->role_name){
                foreach ($user->getRoleNames() as $role_name){
                    $user->removeRole($role_name);
                }
                // assign new roles
                foreach ($request->role_name as $role_name){
                    $user->assignRole($role_name);
                }
            }
        }

        //return $user;
//        }
        if (!is_null(request('callback_url'))){
            return redirect(request('callback_url'))->with('flash_message', 'کاربر با موفقیت ویرایش شد.');
        }
        return redirect()->route('user-list')->with('flash_message', 'کاربر با موفقیت ویرایش شد.');

//        } catch (\Exception $e) {
//
//            return redirect()->back()->withInput();
//
//        }

    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        try {
            if (auth()->user()->hasRole('مدیر')) {
                $user->delete();
            } elseif (auth()->user()->hasRole('مدیر ملک')) {
                if ($user->user_id == auth()->user()->id) {
                    $user->delete();
                }
            }
            return redirect()->back()->with('flash_message', 'حذف کاربر با موفقیت انجام شد');;
        } catch (\Exception $e) {
            return redirect()->back()->with('err_message', 'مشکلی در حذف به وجود آمد، لطفا با پشتیبانی تماس بگیرید.');;
        }

    }
    public function remove(Request $request)
    {
        $user = User::findOrFail($request->id);

        try {
            if (auth()->user()->hasRole('call center(sales)')){
                $user->remove_sales=1;
                $user->remove_sales_reason=$request->remove_reason;
            }else{
                $user->remove_rent=1;
                $user->remove_rent_reason=$request->remove_reason;
            }
            $user->update();
            return redirect()->back()->with('flash_message', 'حذف کاربر با موفقیت انجام شد');;
        } catch (\Exception $e) {
            return redirect()->back()->with('err_message', 'مشکلی در حذف به وجود آمد، لطفا با پشتیبانی تماس بگیرید.');;
        }

    }

    public function reagent_description_store(Request $request)
    {
        $user=User::find($request->user_id);
        $user->reagent_description=$request->reagent_description;
        $user->update();
        return redirect()->back()->with('flash_message', 'موفقیت انجام شد');

    }


    public function raise_hand(Request $request)
    {
        $item=QuestionnaireReadyExperts::where('user_id',auth()->id())->where('questionnaire_id',$request->id)->first();

        if ($item){
            $item->delete();
            return 'false';
        }

        $item=new QuestionnaireReadyExperts();
        $item->questionnaire_id=$request->id;
        $item->user_id=auth()->id();
        $item->save();

        return 'true';
    }

    public function raisedUsers($id)
    {
        $items=QuestionnaireReadyExperts::where('questionnaire_id',$id)->get();
        return view('panel.users.raised', compact('items'), ['title' => 'درخواست ارجاع']);
    }

    public function report_index()
    {
        $users=\App\User::role(['مدیر ملک','مدیر','call center','call center(sales)'])->get();
        return view('panel.users.report',compact('users'), ['title' => 'گزارش کاربر']);
    }
    public function report_search(Request $request)
    {

        $from=$request->from??'0000-00-00 00:00:00';
        $to=$request->to??Carbon::now();

        if (!is_null($request->user_id)){
            $subsets=User::whereBetween('created_at', [$from, $to])->where('user_id',$request->user_id)->count();
            $villas=Villa::whereBetween('created_at', [$from, $to])->where('user_id',$request->user_id)->count();
            $customers = User::whereBetween('created_at', [$from, $to])->doesntHave('roles')->where("user_id", $request->user_id)->count();
        }else{
            $users=\App\User::role(['مدیر ملک','مدیر','call center','call center(sales)'])->get();
        }

        return view('panel.users.report',compact('subsets','villas','customers','request','users'), ['title' => 'گزارش کاربر']);
    }

    public function customersByUserId($id,$from,$to)
    {
        $user=User::find($id);

        $title="مشتریان ".$user->first_name.' '.$user->last_name;
        $users = User::doesntHave('roles')->where("user_id", $id)->whereBetween('created_at', [$from, $to])->paginate($this->controller_paginate());

        $users->appends(request()->only('type'));
        return view('panel.users.index', compact('users'), ['title' => $title]);
    }

    public function subsetsByUserId($id,$from,$to)
    {
        $user=User::find($id);

        $title="زیرمجموعه های ".$user->first_name.' '.$user->last_name;;
        $users = User::where("user_id", $id)->whereBetween('created_at', [$from, $to])->paginate($this->controller_paginate());
        return view('panel.users.subset', compact('users'), ['title' => $title]);
    }

}
