<?php

namespace App\Http\Controllers\Panel;

use App\Category;
use App\Contract;
use App\Wallet;
use App\Transaction;
use App\Villa;
use App\Photo;
use App\Location;
use App\Property;
use App\Portion;
use App\Setting;
use App\Questionnaire;
use App\City;
use App\User;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use function foo\func;

class ContractController extends Controller
{

    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'قراردادها';
        } elseif ('single') {
            return 'قرارداد';
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
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user=auth()->user();
        if (request()->type=='canceled'){
            if($user->hasRole('مدیر') || $user->hasRole('call center') || $user->hasRole('call center(sales)')){
                $items=Contract::where('status',0)->with('expert')->select('id','expert_id','user_id','expert2_id',DB::raw('count(expert_id) as total'))->groupBy('expert_id')->orderByDesc('total')->paginate($this->controller_paginate());
                //$items=Contract::where('status',0)->orderByDesc('created_at')->with(['portion','user','expert'])->paginate($this->controller_paginate());
                return view('panel.contract.undone', compact('items'), ['title' => 'انجام نشده']);
            }else{
                $items=Contract::where('status',0)->where('expert_id',$user->id)->orderByDesc('created_at')->paginate($this->controller_paginate());
            }
        }else{
            if($user->hasRole('مدیر')){
                $items=Contract::where('status',1)->orderByDesc('created_at')->with(['portion'])->paginate($this->controller_paginate());
            }elseif($user->hasRole('call center')){
                $items=Contract::where('status',1)->whereHas('user',function ($q){
                    $q->where('referee_id',auth()->id());
                })->orderByDesc('created_at')->with(['portion'])->paginate($this->controller_paginate());
            }elseif($user->hasRole('call center(sales)')){
                $items=Contract::where('status',1)->whereHas('user',function ($q){
                    $q->where('referee_id',auth()->id());
                })->orderByDesc('created_at')->with(['portion'])->paginate($this->controller_paginate());
            }else{
                $items=Contract::where('status',1)->where('expert_id',$user->id)->orderByDesc('created_at')->paginate($this->controller_paginate());
            }
        }
        return view('panel.contract.index', compact('items'), ['title' => $this->controller_title('sum')]);
    }

    public function customers($id)
    {
        $user=auth()->user();
        $items=Contract::where('status',0)->where('expert_id',$id)->orderByDesc('created_at')->with(['portion','user','expert'])->get()->unique('user_id');

        return view('panel.contract.customers', compact('items'), ['title' => 'لیست مشتریان']);
    }

    public function canceled_index()
    {
        $user=auth()->user();
        $items=Contract::where('status',0)->with(['portion','user','expert'])->select('id','expert_id',DB::raw('count(expert_id) as total'))->groupBy('expert_id')->orderByDesc('total')->paginate($this->controller_paginate());

        return view('panel.contract.canceled', compact('items'), ['title' => $this->controller_title('sum')]);
    }

    public function show($id)
    {
        $item=Contract::find($id);
        return view('panel.contract.show',compact('item'),['title' => 'جزئیات قرارداد']);
    }

    public function store(Request $request)
    {

        if ($request->rent_by){
            if ($request->rent_by=='estate'){
                $this->validate($request, [
                    'estate_name' => 'required',
                    'estate_telephone' => 'required',
                    'price' => 'required',
                    'rent_by' => 'required',
                    'file' => 'required',
                ]);
            }else{
                $this->validate($request, [
                    'price' => 'required',
                    'rent_by' => 'required',
                    'file' => 'required',
                ]);
            }
        }
        $user=User::find($request->id);
        $number=Contract::number();
        $item=new Contract();
        $item->user_id=(int)$request->id;
        $item->expert_id=(int)$user->refer_id;
        $item->expert2_id=(int)$request->expert2_id;
        $item->villa_id=(int)$request->villa_id;
        $item->estate_name=$request->estate_name;
        $item->estate_telephone=$request->estate_telephone;
        $item->price=$request->price?$request->price:$request->price_sales;
        $item->price_sales=$request->price_sales;
        $item->price_buy=$request->price_buy;
        $item->tax=$request->tax;
        $item->price_type=$request->price_type;
        $item->rent_by=$request->rent_by;
        $item->file=$request->file;
        $item->description=$request->description;
        $item->number=$number;
        $item->status=1;

        if ($request->hasFile('file')) {
            $item->file = file_store($request->file, 'assets/uploads/villas/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/files/', 'file-');
        }

        if ($request->hasFile('card_file')) {
            $item->card_file = file_store($request->card_file, 'assets/uploads/villas/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/files/', 'file-');
        }

        $item->save();

        if ($request->villa_id){
            $villa=Villa::find($request->villa_id);
            $price=$request->price_sales-$request->price_buy-$request->tax;

            // سهم دارنده فایل
            $yedki_percentage=$villa->yedki_percentage>0?$villa->yedki_percentage:0;
            $villa_creator_percentage=5;
            $villa_creator_portion= $this->calcPercentage($price,5)+($this->calcPercentage($price,$yedki_percentage)/2);

            // سهم کارشناس
            $expert_percentage=5;
            $expert_portion= $this->calcPercentage($price,$expert_percentage);

            // سهم معرف
            $reagent_percentage=0;
            $reagent_reagent_percentage=0;
            $reagent_portion=0;
            $reagent_reagent_portion=0;
            if ($user->user){
                if ($user->user->user){
                    $reagent_portion= $this->calcPercentage($price,45);
                    $reagent_reagent_portion= $this->calcPercentage($price,10);
                    $reagent_percentage=45;
                    $reagent_reagent_percentage=10;
                }else{
                    $reagent_portion= $this->calcPercentage($price,50);
                    $reagent_percentage=50;
                    $reagent_reagent_percentage=0;
                }
            }

            // سهم املاکی
            $estate_portion=0;

            // سهم خیریه
            $charity_percentage=10;
            $charity_portion= $this->calcPercentage($price,10);

            // سهم کال سنتر
            $call_center_percentage=1;
            $call_center_portion= $this->calcPercentage($price,$call_center_percentage);

            // مجموع سهم ها
            $sum_of_portions=$villa_creator_portion+$expert_portion+$reagent_portion+$reagent_reagent_portion+$estate_portion+$charity_portion+$call_center_portion;

            // سهم شرکت
            $comany_portion=$price-$sum_of_portions;
            $comany_percentage=100-($reagent_percentage+$reagent_reagent_percentage+$villa_creator_percentage+$expert_percentage+$charity_percentage+$call_center_percentage);


            // ***********************
            // اختصاص سهم ها به کیف پول
            // ***********************

            // سهم دارنده فایل
            if ($villa->user_id){
                $this->saveInWallet($villa->user_id,$villa_creator_portion,$request->price_type);
                $this->sendNotification($villa->user_id,$villa_creator_portion,$request->price_type);
                $this->saveInTransactions($villa->user_id,$item->id,$number,$request->id,$villa_creator_portion,$request->price_type);
            }

            // سهم کارشناس
            if ($user->refer_id){
                $this->saveInWallet($user->refer_id,$expert_portion,$request->price_type);
                $this->sendNotification($user->refer_id,$expert_portion,$request->price_type);
                $this->saveInTransactions($user->refer_id,$item->id,$number,$request->id,$expert_portion,$request->price_type);
            }

            // سهم معرف و بالاسری
            if ($user->user){
                if ($user->user->user){
                    // سهم معرف
                    $this->saveInWallet($user->user_id,$reagent_portion,$request->price_type);
                    $this->sendNotification($user->user_id,$reagent_portion,$request->price_type);
                    $this->saveInTransactions($user->user_id,$item->id,$number,$request->id,$reagent_portion,$request->price_type);
                    // سهم معرف معرف
                    $this->saveInWallet($user->user->user_id,$reagent_reagent_portion,$request->price_type);
                    $this->sendNotification($user->user->user_id,$reagent_reagent_portion,$request->price_type);
                    $this->saveInTransactions($user->user->user_id,$item->id,$number,$request->id,$reagent_reagent_portion,$request->price_type);
                }else{
                    // سهم معرف
                    $this->saveInWallet($user->user_id,$reagent_portion,$request->price_type);
                    $this->sendNotification($user->user_id,$reagent_portion,$request->price_type);
                    $this->saveInTransactions($user->user_id,$item->id,$number,$request->id,$reagent_portion,$request->price_type);
                }
            }

            // سهم کال سنتر
            if ($user->refree_id){
                $this->saveInWallet($user->refree_id,$call_center_portion,$request->price_type);
                $this->sendNotification($user->refree_id,$call_center_portion,$request->price_type);
                $this->saveInTransactions($user->refree_id,$item->id,$number,$request->id,$call_center_portion,$request->price_type);
            }

            // save in portion
            $this->saveInPortion($item->id,0,$expert_percentage,0,0,$reagent_percentage,$villa_creator_percentage,$reagent_reagent_percentage,$charity_percentage,$call_center_percentage,$comany_percentage,'percentage');


        }

        if ($request->rent_by){
            if ($request->rent_by=='estate'){
                // expert portion
                $this->saveInWallet($user->refer_id,$request->price/8,$request->price_type);
                $this->sendNotification($user->refer_id,$request->price/8,$request->price_type);
                $this->saveInTransactions($user->refer_id,$item->id,$number,$request->id,$request->price/8,$request->price_type);
                // reagent portion
                if ($user->user_id){
                    $this->saveInWallet($user->user_id,$request->price/4,$request->price_type);
                    $this->sendNotification($user->user_id,$request->price/4,$request->price_type);
                    $this->saveInTransactions($user->user_id,$item->id,$number,$request->id,$request->price/4,$request->price_type);
                }

                $this->saveInPortion($item->id,2,8,0,8,4,0,0,0,0,0,'division');

            }elseif ($request->rent_by=='expert'){
                // expert portion
                $this->saveInWallet($user->refer_id,($request->price/8)+($request->price/2),$request->price_type);
                $this->sendNotification($user->refer_id,($request->price/8)+($request->price/2),$request->price_type);
                $this->saveInTransactions($user->refer_id,$item->id,$number,$request->id,($request->price/8)+($request->price/2),$request->price_type);
                // reagent portion
                if ($user->user_id){
                    $this->saveInWallet($user->user_id,$request->price/4,$request->price_type);
                    $this->sendNotification($user->user_id,$request->price/4,$request->price_type);
                    $this->saveInTransactions($user->user_id,$item->id,$number,$request->id,$request->price/4,$request->price_type);
                }

                $this->saveInPortion($item->id,0,'8+2',0,8,4,0,0,0,0,0,'division');
            }else{
                // expert portion
                $this->saveInWallet($user->refer_id,$request->price/8,$request->price_type);
                $this->sendNotification($user->refer_id,$request->price/8,$request->price_type);
                $this->saveInTransactions($user->refer_id,$item->id,$number,$request->id,$request->price/8,$request->price_type);
                // expert2 portion
                $this->saveInWallet($request->expert2_id,$request->price/2,$request->price_type);
                $this->sendNotification($request->expert2_id,$request->price/2,$request->price_type);
                $this->saveInTransactions($request->expert2_id,$item->id,$number,$request->id,$request->price/2,$request->price_type);
                // reagent portion
                if ($user->user_id){
                    $this->saveInWallet($user->user_id,$request->price/4,$request->price_type);
                    $this->sendNotification($user->user_id,$request->price/4,$request->price_type);
                    $this->saveInTransactions($user->user_id,$item->id,$number,$request->id,$request->price/4,$request->price_type);
                }

                $this->saveInPortion($item->id,0,8,2,8,4,0,0,0,0,0,'division');

            }
        }

        $user->refer_id=0;
        $user->update();

        //return $request;
        return back()->with('flash_message', 'با موفقیت قرارداد ثبت شد.');

    }

    public function sendNotification($user_id,$price,$price_type)
    {
        $not= new \App\Notification();
        $not->user_id=$user_id;
        $not->message="مبلغ $price $price_type به کیف پولتان افزوده شد";
        $not->save();
    }

    public function calcPercentage($price,$percentage)
    {
        return $price*$percentage/100;
    }

    public function saveInWallet($user_id,$price,$price_type)
    {
        $wallet=Wallet::where('user_id',$user_id)->first();
        if (!$wallet){
            $wallet=new Wallet();
        }
        $wallet->user_id=$user_id;
        $wallet[$price_type]+=$price;
        $wallet->save();
    }

    public function saveInPortion($contract_id,$estate,$expert,$experts_friend,$office,$reagent,$villa_creator,$reagent_reagent,$charity,$call_center,$company,$calculate_type)
    {
        $portion=new Portion();
        $portion->contract_id=$contract_id;
        $portion->estate=$estate;
        $portion->expert=$expert;
        $portion->experts_friend=$experts_friend;
        $portion->office=$office;
        $portion->reagent=$reagent;
        $portion->villa_creator=$villa_creator;
        $portion->reagent_reagent=$reagent_reagent;
        $portion->charity=$charity;
        $portion->call_center=$call_center;
        $portion->company=$company;
        $portion->calculate_type=$calculate_type;
        $portion->save();
    }


    public function saveInTransactions($user_id,$contract_id,$number,$from_id,$price,$price_type)
    {
        $portion=new Transaction();
        $portion->user_id=$user_id;
        $portion->from_id=$from_id;
        $portion->contract_id=$contract_id;
        $portion->number=$number;
        $portion->price=$price;
        $portion->price_type=$price_type;
        $portion->title='واریز سهم قرارداد به کیف پول';
        $portion->status='واریز شد';
        $portion->from="مشتری به شماره کاربری $from_id";
        $portion->to="مشتری به شماره کاربری $user_id";
        $portion->save();
    }

    public function deny()
    {
        $user=User::find($request->id);
        $user->rent_status=0;
        $user->refer_id=3;
        $user->update();

        return back()->with('flash_message', 'با موفقیت کنسل شد.');

    }

    public function cancel(Request $request)
    {
        $user=User::find($request->id);
        $item=new Contract();
        $item->user_id=$request->id;
        $item->expert_id=$user->refer_id;
        $item->cancel_reasons=isset($item->cancel_reasons)?$request->cancel_reasons:'';
        $item->status=0;

        $item->save();

        //$user->refer_id=0;
        $user->rent_status=isset($request->status)?$request->status:4;
        $user->referred = 0;
        $user->cancel_reason=$request->cancel_reasons;
        $user->update();

        return back()->with('flash_message', 'با موفقیت قرارداد کنسل شد.');

    }

    public function reserve_store(Request $request)
    {
        $villa=Villa::find($request->villa_id);
        $user=User::find($request->user_id);
        $user->rent_status=6;
        $user->reserved=1;
        $villa->reserved=1;
        $villa->reserved_user_id=$request->user_id;
        $villa->reserved_villa_id=$request->villa_id;
        $user->update();
        $villa->update();
        return back()->with('flash_message', 'با موفقیت رزرو شد');
    }

}
