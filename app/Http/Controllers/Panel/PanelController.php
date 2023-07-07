<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Property;
use App\Villa;
use App\ProvinceCity;
use App\Photo;
use App\User;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PanelController extends Controller
{

    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'داشبورد';
        } elseif ('single') {
            return 'داشبورد';
        }
    }

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->account_status == 'blocked') {
            if (Auth::user()->status_message != null) {
                $msg = Auth::user()->status_message;
            } else {
                $msg = 'حساب کاربری شما مسدود می باشد';
            }
            Auth::logout();
            return redirect('/')->with('err_message', $msg);
        } elseif (Auth::user()->account_status == 'pending') {

        }

        $users_count = User::where('user_id', Auth::id())->count();
//        $users_count = User::doesntHave('roles')->where('user_id', Auth::id())->count();

        $properties_count = Villa::where('user_id', Auth::id())->count();
        $published_count = Villa::where('user_id', Auth::id())->where('status','published')->count();
        $pending_count = Villa::where('user_id', Auth::id())->where('status','pending')->count();
        $refers_count=User::where('refer_id',auth()->id())->count();
        return view('panel.dashboard', compact('users_count', 'properties_count','published_count','pending_count','refers_count'), ['title' => $this->controller_title('sum')]);
    }

    public function arz()
    {
        $arz = \App\About::where('id', 1)->first();
        return view('panel.arz', compact('arz'), ['title' => 'تبدیل لیر به ارز های موجود']);
    }

    public function arz_u($slug, Request $request)
    {
        $arz = \App\About::where('id', 1)->first();
        $arz->$slug = $request->price;
        $arz->update();
        return redirect()->back()->with('success_message', 'ویرایش انجام شد');
    }

    public function upload(Request $request, $folder, $waterMark = 0, $height = null, $width = null)
    {
        if ($request->hasFile('file')) {

            $type = $request->file('file')->extension();


            $photo = file_store($request->file, 'assets/uploads/' . $folder . '/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/', 'photo-');
            //$photo = file_store($request->file, 'assets/uploads/' . $folder . '/' . jdf(date('Y/m/d'), 'Y-m-d') . '/', 'photo-');

            if ($type == 'mpga'){



                return response([
                    'data' => $photo,
                ]);
            }


            $img = Image::make($photo); //your image I assume you have in public directory



            if (!is_null($width) && !is_null($height)) {

                $img->resize($height, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

            }


            if ($waterMark == 1) {
                $img->insert('assets/user/pic/logo.png', 'bottom', 30, 0); //insert watermark in (also from public_directory)
            }

            $img->save($photo); //save created image (will override old image)


            // optimize image
//            ImageOptimizer::optimize($photo);

            return response([
                'data' => $photo,
            ]);
        }


    }

    public function deleteUpload(Request $request)
    {
        $photo = Photo::where('path', $request->url)->first();


        if (!is_null($photo)) {

            $result = $photo->delete();

            File::delete($request->url);


            return response([
                'result' => $result
            ]);


        } else {


            $old_path = $request->url;

            $item = File::delete($old_path);

            return response([
                'result' => $item
            ]);
        }
    }


    public function dashboard()
    {
        if (!auth()->user()->hasRole("مدیر")){
            if (Auth::user()->account_status == 'blocked') {

                Auth::logout();
                return redirect('/')->with('err_message', 'حساب کاربری شما مسدود می باشد');
            } elseif (Auth::user()->account_status == 'pending'and !auth()->user()->hasRole("کارشناس فروش")) {
                Auth::logout();
                return redirect('/')->with('err_message', 'حساب کاربری شما در انتظار تایید مدیر می باشد');
            }
        }


        dd('dddd');
//        $users_count = User::doesntHave('roles')->where('user_id', Auth::id())->count();
        $properties_count = Villa::where('user_id', Auth::id())->count();
        $published_count = Villa::where('user_id', Auth::id())->where('status','published')->count();
        $pending_count = Villa::where('user_id', Auth::id())->where('status','pending')->count();
        $refers_count=User::where('refer_id',auth()->id())->count();
//        return view('panel.dashboard', compact('users_count', 'properties_count','pending_count','published_count','refers_count'), ['title' => $this->controller_title('sum')]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function city($id)
    {
        $cities = ProvinceCity::where('parent_id', $id)->get();
        $options = array();
        foreach ($cities as $city) {
            $options += array($city->id => $city->name);
        }
        return Response::json($options);
    }

    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function properties($id)
    {
        $properties = Property::where('category_id', $id)->get();
        $options = array();
        foreach ($properties as $property) {
            $options += array($property->id => $property->name);
        }
        return Response::json($options);
    }


    public function setPhotoSort(Request $request)
    {
        $photo_id = $request->get('photo_id');
        $sort = $request->get('sort');

        $photo = Photo::find($photo_id);
        $photo->sort = $sort;
        $photo->save();
    }

    public function setPhotoDelete(Request $request)
    {
        $photo_id = $request->get('photo_id');

        $photo = Photo::find($photo_id);
        $photo->delete();
    }

    public function setPhotoPrimary(Request $request)
    {
        $photo_id = $request->get('photo_id');

        $photo = Photo::find($photo_id);

        $photos = Photo::where([
            ['pictures_type', $photo->pictures_type],
            ['pictures_id', $photo->pictures_id]
        ])->get();

        foreach ($photos as $p) {
            $p->prim = 0;
            $p->save();
        }

        $photo->prim = 1;
        $photo->save();
    }

    public function price_index()
    {
        $item=Setting::find(1);
        return view('panel.price_convert',compact('item'));
    }

    public function price_update(Request $request)
    {
        try{
            $item=Setting::find(1);
            $item->dolar=$request->dolar;
            $item->toman=$request->toman;
            $item->update();
            return redirect()->back()->with('flash_message', 'با موفقیت ایجاد شد.');
        }
        catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'مشکلی بوجود آمده،مجددا تلاش کنید');
        }
    }
}
