<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Sms;
use App\Country;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/panel';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['complete', 'complete_store']);
//        $this->middleware('auth')->only(['complete','complete_store']);
    }

    public function complete(Request $request)
    {
        $user = auth()->user();
        $status = $user->mobile_status;
        $code = $user->mobile_code;
        $country = Country::orderBy('fa_name', 'asc')->get();
        // check if code entered
        if ($request->code) {
            if ($code == $request->code) {
                $user->account_status = 'active';
                $user->mobile_status = 'active';
                $user->update();
                return redirect()->back();
//                return redirect()->route('front-index')->with('flash_message','به خانه استانبول خوش آمدید');
            }
            request()->session()->flash('err_message', 'کد وارد شده اشتباه است');
        }

        if (is_null($code)) {
            //send sms
            $code = 'K-' . mt_rand(11111, 99999);
            Sms::SendSms($code, $user->mobile);
            $user->mobile_code = $code;
            $user->update();
            request()->session()->flash('flash_message', 'کد به شماره موبایلتان ارسال گردید');
        }

        return view('auth.complete', compact('status', 'code', 'country'));
//        return redirect()->route('front-index')->with('flash_message','به خانه استانبول خوش آمدید');
    }

    public function complete_store(Request $request)
    {

//        return $request;
        $user = auth()->user();
        if (!$user) {
            return redirect()->back()->withErrors('متاسفانه مشکلی پیش آمده است ...');
        }
        $status = $user->mobile_status;
        $code = $user->mobile_code;
        $code_email = rand(100000, 999999);

        if (auth()->user()->hasRole('کاربر')) {
            $this->validate($request, [
                'password' => 'required|confirmed|min:6',
                'reagent' => 'nullable|max:250',
                'email' => 'required|email|unique:users',
                'gender' => 'required',
                'acquaintance' => 'nullable|max:250',
                'type_request' => 'required',
                'budget' => 'required',
                'living_country' => 'required',
                'consulting' => 'required',
            ], [
                'reagent.max' => 'معرف خود را حداکثر با 250 کاراکتر ثبت کنید',
                'email.required' => 'ایمیل فیلد الزامی می باشد',
                'email.email' => 'فرمت صحیح ایمیل را رعایت کنید(test@test.com)',
                'email.unique' => 'این ایمیل یکبار ثبت نام شده',
                'gender.required' => 'لطفا جنسیت خود را مشخص کنید',
                'acquaintance.max' => 'نحوه آشنایی خود را با حداکثر 250 کاراکتر ثبت کنید',
                'type_request.required' => 'نوع درخواست خود را مشخص کنید',
                'budget.required' => 'بودجه خود را به لیر وارد کنید',
                'living_country.required' => 'موقعیت جغرافیایی فعلی خود را مشخص کنید',
                'consulting.required' => 'نیاز به مشاوره آنلاین فیلد الزامی می باشد',
            ]);
            $user->reagent = $request['reagent'];
            $user->email = $request['email'];
            $user->gender = $request['gender'];
            $user->acquaintance = $request['acquaintance'];
            $user->type_request = $request['type_request'];
            $user->location = serialize($request['location']);
            $user->room_number = $request['room_number'];
            $user->budget = $request['budget'];
            $user->text = $request['text'];
            $user->living_country = $request['living_country'];
            $user->consulting = $request['consulting'];
            $user->instant = $request['instant'];
            $user->registration = 'complete';
            $user->update();
            request()->session()->flash('flash_message', 'ثبت نام شما کامل شد');
        } elseif (auth()->user()->hasRole('مدیر ملک')) {
            $this->validate($request, [
                'fname_en' => 'required|max:250',
                'lname_en' => 'required|max:250',
                'father_name' => 'required|max:250',
                'email' => 'required|email|unique:users',
                'living_country' => 'required',
                'nationality' => 'required|max:250',
                'ncode' => 'required',
                'postal_address' => 'required',
                'address_pic' => 'required',
                'passport_pic' => 'required',
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
            ]);
            $user->fname_en = $request['fname_en'];
            $user->lname_en = $request['lname_en'];
            $user->father_name = $request['father_name'];
            $user->email = $request['email'];
            $user->gender = $request['gender'];
            $user->living_country = $request['living_country'];
            $user->nationality = $request['nationality'];
            $user->ncode = $request['ncode'];
            $user->email_code = $code_email;
            $user->postal_address = $request['postal_address'];
            $user->password2 = bcrypt($request['password2']);
            $user->registration = 'complete';

            $address_pic = $request->file('address_pic');
            $address_path = public_path('images') . '/' . $address_pic->getClientOriginalName();
            $address_pic->move(public_path('images'), $address_pic->getClientOriginalName());

            $passport_pic = $request->file('passport_pic');
            $passport_path = public_path('images') . '/' . $passport_pic->getClientOriginalName();
            $passport_pic->move(public_path('images'), $passport_pic->getClientOriginalName());

            $address_path = substr($address_path, strpos($address_path, "source"));
            $passport_path = substr($passport_path, strpos($passport_path, "source"));

            $user->address_pic = $address_path;
            $user->passport_pic = $passport_path;

            $user->update();
            if (!is_null($user->email)) {
                $activation_link = url('email_active');
                $from_mail = env('MAIL_USERNAME');
                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                $headers .= "From: <$from_mail>" . "\r\n";
                $msg = '<span style="font-size:20px">جهت تایید ایمیل خود </span>';
                $msg .= '<a href="' . $activation_link . '/' . $user->id . ' / ' . $code_email . '" style="font - size: 25px">اینجا کلیک کنید</a>';
                mail($user->email, 'تایید ایمیل کارشناس', $msg, $headers);
            }
            auth()->logout();
            request()->session()->flash('flash_message', 'ایمیلی برای آدرس ایمیل شما ارسال شد جهت تکمیل ثبت نام');
        }


        return redirect('/');

    }

    public function email_active($id, $code)
    {
        $user = User::find($id);
        if ($user) {
            if ($user->email_code == $code) {
                $user->email_status = 'active';
                $user->update();
                request()->session()->flash('flash_message', 'ایمیل شما تایید شد تا 24 ساعت آینده اکانت شما فعال میشود');
                return redirect('/');
            } else {
                request()->session()->flash('err_message', 'اطلاعات دریافتی اشتباه است');
                return redirect('/');
            }
        } else {
            request()->session()->flash('err_message', 'اطلاعات دریافتی اشتباه است');
            return redirect('/');
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $data['mobile'] = preg_replace('/[^0-9]/', '', $data['mobile']);
        if ($data['type'] == 'expert') {
            return Validator::make($data, [
                'fname_en' => 'required|max:250',
                'lname_en' => 'required|max:250',
                'father_name' => 'required|max:250',
                'email' => 'required|email|unique:users',
                'living_country' => 'required',
                'nationality' => 'required|max:250',
                'ncode' => 'required',
                'postal_address' => 'required',
                'address_pic' => 'required',
                'passport_pic' => 'required',
                'mobile' => 'unique:users',
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
            ]);
        }
        if ($data['type_country'] == 'tr') {
            return Validator::make($data, [
                'full_name' => 'required|min:5|max:250',
                'mobile' => 'required|unique:users|regex:/(5)[0-9]{9}/|digits:10|numeric',
                'password' => 'required|min:6'
            ], [
                'full_name.required' => 'نام و نام خانوادگی فیلد الزامی می باشد',
                'full_name.min' => 'نام و نام خانوادگی حداقل 5 کاراکتر باشد',
                'full_name.max' => 'نام و نام خانوادگی حداکثر 250 کاراکتر باشد',
                'mobile.required' => 'موبایل فیلد الزامی می باشد',
                'mobile.users' => 'این شماره موبایل یکبار ثبت نام شده',
                'mobile.regex' => 'شماره موبایل ترک با فرمت(*********5) وارد کنید',
                'mobile.digits' => 'شماره موبایل ترک 10 رقمی وارد کنید بدون صفر ابتدایی',
                'mobile.numeric' => 'شماره موبایل ترک تمام کاراکتر ها عددی باشد',
                'password.required' => 'پسورد فیلد الزامی می باشد',
                'password.min' => 'پسورد حداقل 6 کاراکتر باشد',
            ]);
        }
        if ($data['type_country'] == 'fa') {
            return Validator::make($data, [
                'full_name' => 'required|min:5|max:250',
                'mobile' => 'required|unique:users|regex:/(9)[0-9]{9}/|digits:10|numeric',
                'password' => 'required|min:6'
            ], [
                'full_name.required' => 'نام و نام خانوادگی فیلد الزامی می باشد',
                'full_name.min' => 'نام و نام خانوادگی حداقل 5 کاراکتر باشد',
                'full_name.max' => 'نام و نام خانوادگی حداکثر 250 کاراکتر باشد',
                'mobile.required' => 'موبایل فیلد الزامی می باشد',
                'mobile.users' => 'این شماره موبایل یکبار ثبت نام شده',
                'mobile.regex' => 'شماره موبایل ایران با فرمت(********9) وارد کنید',
                'mobile.digits' => 'شماره موبایل ایران 10 رقمی وارد کنید بدون صفر ابتدایی',
                'mobile.numeric' => 'شماره موبایل ایران تمام کاراکتر ها عددی باشد',
                'password.required' => 'پسورد فیلد الزامی می باشد',
                'password.min' => 'پسورد حداقل 6 کاراکتر باشد',
            ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $data['mobile'] = preg_replace('/[^0-9]/', '', $data['mobile']);

        $request = request();
        $code = 'K-' . mt_rand(11111, 99999);
        $user = new User();
        $nameExploded = explode(' ', $data['full_name']);
        if (count($nameExploded) > 1) {
            $user->first_name = $nameExploded[0];
            $user->last_name = $nameExploded[1];
            if (count($nameExploded) > 2) {
                $user->last_name = $user->last_name . " " . $nameExploded[2];
            }
        } else {
            $user->first_name = $data['full_name'];
        }
        $user->mobile = $data['mobile'];

        $user->password = $data['password'];
        $user->country = $data['type_country'];
        if ($data['type_country']=='fa'){
            $user->area_code='0098';
        }else{
            $user->area_code='0090';

        }
        $user->mobile_code = $code;
        $user->code = rand(100000000, 999999999);

        if ($request->type == 'expert_sell') {
            $user->mobile_status = 'active';
            $user->account_status = 'active';
        }else{
            $user->job = $data['job'];
            $user->account_status = 'pending';
        }
        if (array_key_exists('ref', $data) && $data['ref']) {
            $user->ref = $data['ref'];
        }

        $user->save();

        if ($request->type == 'expert') {
            $user->assignRole('مدیر ملک');
            $user->mobile_status = 'active';
        } elseif ($request->type == 'expert_sell') {
            $user->assignRole('کارشناس فروش');
            session()->forget('verify_code');
            session()->forget('mobile_num');
        }else{
            $user->assignRole('کاربر');
            $user->account_status = 'active';
            $user->mobile_status = 'active';
        }
//        if ($user->country == 'fa') {
//            Sms::SendSms($code, $user->mobile);
//            auth()->loginUsingId($user->id);
//            return redirect()->route('front.complete')->with('flash_message', 'پیامک تایید برایتان ارسال شد');
//        } else
//        {

        $user->save();

        auth()->loginUsingId($user->id);

        if ($request->type == 'expert') {

            $user = auth()->user();

            $user->assignRole('مدیر ملک(برنزی)');
            
            $status = $user->mobile_status;
            $code = $user->mobile_code;
            $code_email = rand(100000, 999999);

            $user->user_id = (int)$request['user_id'];
            $user->fname_en = $request['fname_en'];
            $user->lname_en = $request['lname_en'];
            $user->father_name = $request['father_name'];
            $user->email = $request['email'];
            $user->gender = $request['gender'];
            $user->living_country = $request['living_country'];
            $user->nationality = $request['nationality'];
            $user->ncode = $request['ncode'];
            $user->email_code = $code_email;
            $user->postal_address = $request['postal_address'];
            $user->password2 = bcrypt($request['password2']);
            $user->registration = 'complete';

            $address_pic = $request->file('address_pic');
            $address_path = public_path('images') . '/' . $address_pic->getClientOriginalName();
            $address_pic->move(public_path('images'), $address_pic->getClientOriginalName());

            $passport_pic = $request->file('passport_pic');
            $passport_path = public_path('images') . '/' . $passport_pic->getClientOriginalName();
            $passport_pic->move(public_path('images'), $passport_pic->getClientOriginalName());

            $address_path = substr($address_path, strpos($address_path, "source"));
            $passport_path = substr($passport_path, strpos($passport_path, "source"));

            $user->address_pic = $address_path;
            $user->passport_pic = $passport_path;

            $user->update();
            if (!is_null($user->email)) {
                $activation_link = url('email_active');
                $from_mail = env('MAIL_USERNAME');
                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                $headers .= "From: <$from_mail>" . "\r\n";
                $msg = '<span style="font-size:20px">جهت تایید ایمیل خود </span>';
                $msg .= '<a href="' . $activation_link . '/' . $user->id . ' / ' . $code_email . '" style="font - size: 25px">اینجا کلیک کنید</a>';
                mail($user->email, 'تایید ایمیل کارشناس', $msg, $headers);
                auth()->logout();
                request()->session()->flash('flash_message', 'ایمیلی برای آدرس ایمیل شما ارسال شد جهت تکمیل ثبت نام');
            }
//            dd($user);
            return redirect('/');
        } else {
            return redirect()->route('index')->with('flash_message', 'اطلاعات تکمیلی انجام شود');
        }


//        }

    }

    public function register_office_1()
    {

        $country = Country::orderBy('fa_name', 'asc')->get();

        return view('auth.register_office_1', compact('status', 'code', 'country'));
    }

    public function register_office()
    {

        $country = Country::orderBy('fa_name', 'asc')->get();

        return view('auth.register_office', compact('status', 'code', 'country'));
    }

    public function register_office_send_code(Request $request)
    {
        $mobile = preg_replace('/[^0-9]/', '',$request->get('mobile'));
        $user=User::where('mobile',$mobile)->first();
            if($user){
                return response()->json(['error' => true,'masage'=>'شماره تکراری می باشد']);
            }else{
                if ($request->get('type')=='98+'){
                    $verify=1399;
                }else{
                    $verify=rand(55555,99999);
                    session(['verify_code' => $verify]);
                    session(['mobile_num' => $mobile]);
//                session('mobile_num');
                    $body = [
                        "originator"=>"Khane",
                        "message"=>"khaneistanbul code: ".$verify,
                        "to"=>[$mobile],
                        "encoding"=>"default"
                    ];
                    MASGSM('http://api.v2.masgsm.com.tr/v2/sms/basic',$body);
                }

                return response()->json(['error' => false,'masage'=>'کد ارسال شد','code'=>$verify,'m'=>$mobile]);

            }



    }
    public function register_office_check_code(Request $request)
    {

        $veryfi_code = $request->get('veryfi_code');
            if(session('verify_code')!=$veryfi_code){
                return response()->json(['error' => true,'masage'=>'کد وارد شده اشتباه می باشد']);
            }else{
                return response()->json(['error' => false,'masage'=>'کد ارسال شده صحیح است .']);
            }



    }
    public function request_expert(Request $request)
    {
        $this->validate($request, [
            'address_pic' => 'required',
            'passport_pic' => 'required',
        ], [

            'passport_pic.required' => 'لطفا تصویر پاسپورت خود را وارد کنید',
            'address_pic.required' => 'لطفا تصویر قبض را وارد کنید',
        ]);
        $user=auth()->user();
        $address_pic = $request->file('address_pic');
        $address_path = public_path('images') . '/' . $address_pic->getClientOriginalName();
        $address_pic->move(public_path('images'), $address_pic->getClientOriginalName());

        $passport_pic = $request->file('passport_pic');
        $passport_path = public_path('images') . '/' . $passport_pic->getClientOriginalName();
        $passport_pic->move(public_path('images'), $passport_pic->getClientOriginalName());

        $address_path = substr($address_path, strpos($address_path, "source"));
        $passport_path = substr($passport_path, strpos($passport_path, "source"));

        $user->address_pic = $address_path;
        $user->passport_pic = $passport_path;
        $user->account_status = 'pending';
        //auth()->user()->roles()->detach();

        $user->update();
        //$user->assignRole('مدیر ملک');
        //Auth::logout();
        return redirect('/login')->with('err_message', 'درخواست شما ارسال شد و در انتظار بررسی قرار گرفت');
    }
}
