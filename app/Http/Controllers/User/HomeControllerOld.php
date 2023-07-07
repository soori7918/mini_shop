<?php

namespace App\Http\Controllers\User;

use App\About;
use App\Comment;
use App\Article;
use App\Location;
use App\Insurance;
use App\Post;
use App\Setting;
use App\Menu;
use App\Travel;
use App\Villa;
use App\Slider;
use App\Recently;
use App\Category;
use App\ProjectCategory;
use App\City;
use Carbon\Carbon;
use function Couchbase\defaultDecoder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    function callAPI($method, $url, $data){
        $curl = curl_init();
        switch ($method){
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }
        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'APIKEY: lmro3ykaiJeqxU8Tz7gVh1bMw6RXOptd',
            'Content-Type: application/json',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // EXECUTE:
        $result = curl_exec($curl);
        if(!$result){die("Connection Failure");}
        curl_close($curl);
        return $result;
    }
    public function index()
    {
        $price_min_all=Villa::all()->min('price');
        $price_max_all=Villa::all()->max('price');
        $price_select=[];
        $price_all=$price_max_all-$price_min_all;
        $price_all=round($price_all/7,0);
        foreach (range(1,7) as $i)
        {
            if($i==1)
            {
                $min_s_p=$price_min_all;
                $max_s_p=$min_s_p+$price_all;
            }
            else
            {
                $min_s_p=$start;
                $max_s_p=$min_s_p+$price_all;
            }
            $min_mod=$min_s_p%1000;
            $min_s_p-=$min_mod;
            $max_mod=$max_s_p%1000;
            $max_s_p-=$max_mod;
            $start=$max_s_p;
            array_push($price_select,['min_p'=>$min_s_p,'max_p'=>$max_s_p]);
        }
        $area_min_all=Villa::all()->min('area');
        $area_max_all=Villa::all()->max('area');
        $area_select=[];
        $area_all=$area_max_all-$area_min_all;
        $area_all=round($area_all/7,0);
        foreach (range(1,7) as $i)
        {
            if($i==1)
            {
                $min_s_a=$area_min_all;
                $max_s_a=$min_s_a+$area_all;
            }
            else
            {
                $min_s_a=$start;
                $max_s_a=$min_s_a+$area_all;
            }
            $min_mod=$min_s_a%10;
            $min_s_a-=$min_mod;
            $max_mod=$max_s_a%10;
            $max_s_a-=$max_mod;
            $start=$max_s_a;
            array_push($area_select,['min_a'=>$min_s_a,'max_a'=>$max_s_a]);
        }
        $user = null;

        if (Auth::check()) {
            $user = Auth::user()->id;
        }
        $sliders = Slider::where('type',2)->orderBy('id','DESC')->get();
        $villa = Villa::first();
        $price_min=Villa::all()->min('price');
        $price_max=Villa::all()->max('price');
        $article = Article::where('status',1)->take(8)->get();
        $slider_mobile = Slider::where('type',1)->get();
        $slider_desktop = Slider::where('type',2)->get();
        $villas = Villa::where('status', 'published');
        $villasAsItems = $villas->orderBy('view', 'desc')->take('10')->get();
//        $cities = City::where('state_id',null)->where('city_id',null)->get();
        $states = City::where('state_id',null)->get();
        $cities = City::where('state_id',null)->get();
        $project_categories = ProjectCategory::where('parent_id',0)->get();

        $minimumPrices = $villas->orderBy('price', 'asc')->pluck('price')->toArray();
        $numberOfRooms = $villas->pluck('room_num')->toArray();

        $locations = Location::all();
        $selectedLocations = City::where('status_home','active')->get();
        $villaCategories = Category::where('type', 'villa')->where('status', 'published')->orderBy('id','DESC')->take(10)->get();

        $villas_all = Villa::where('status', 'published')->select('id', 'name', 'title', 'slug', 'latitude', 'longitude')->get();

        $villaTypes = array('مسکونی' => ['1' => 'آپارتمان', '2' => 'رزیدانس', '3' => 'ویلا',], 'تجاری' => ['1' => 'مغازه', '2' => 'دفتر اداری', '3' => 'رستوران /کافه', '4' => 'هتل آپارتمان', '5' => 'سایر']);
        $priceRanges = [
            0 => 'تا 300000 لیر',
            1 => '300000 تا 500000 لیر',
            2 => '500000 تا 1000000 لیر',
            3 => '1 تا 2 میلیون لیر',
            4 => 'بیش از 2 میلیون لیر',
        ];
        $sleeps = array('1' => '1 خوابه', '2' => '2 خوابه', '3' => '3 خوابه', '4' => '4 خوابه', '5' => '5 خوابه', '6' => '5 خوابه +');

        $projectTypes = Category::types();

        $hasSeaVilla = Villa::where([
            ['status', 'published'],
            ['has_sea', true],
        ])->first();

        $hasJungleVilla = Villa::where([
            ['status', 'published'],
            ['has_jungle', true],
        ])->first();

        $isSpecialVilla = Villa::where([
            ['status', 'published'],
            ['is_special', true],
        ])->first();

        $isPopularVilla = Villa::where([
            ['status', 'published'],
            ['is_popular', true],
        ])->first();

        $typeVillas = [
            'has_sea' => $hasSeaVilla,
            'has_jungle' => $hasJungleVilla,
            'is_special' => $isSpecialVilla,
            'is_popular' => $isPopularVilla,
        ];
        $about1=About::where('page','home')->where('status','active')->first();
        $about2=About::where('page','home1')->where('status','active')->first();
        $services=About::where('page','service')->where('status','active')->where('status_home','active')->orderBy('id','desc')->take(4)->get();
        $video=About::where('page','video')->where('status','active')->first();
        $get_data = callAPI('GET', 'http://api.navasan.tech/latest/?api_key=lmro3ykaiJeqxU8Tz7gVh1bMw6RXOptd', false);
        $response = json_decode($get_data, true);
//        $menus = Menu::with('children')->where('parent_id',null)->orderBy('created_at','asc')->get();
        return view('user.index', compact('project_categories','sliders','locations','states','cities','selectedLocations','price_max','price_min',  'villaCategories', 'numberOfRooms','price_max_all','price_min_all','area_min_all','area_max_all'
            , 'minimumPrices', 'villaTypes', 'priceRanges', 'villasAsItems','sleeps','video', 'projectTypes', 'typeVillas','article','slider_mobile','slider_desktop','about1','about2','services','response','price_select','area_select'));
    }

    public function search(Request $request)
    {
        $type=null;
        $about=null;
        $titr='جستجو: '.$request->search;
        $items=Article::where('title','LIKE','%'.$request->search.'%')
//            ->orwhere('text','LIKE','%'.$request->search.'%')->orwhere('text_short','LIKE','%'.$request->search.'%')
            ->orderBy('id','DESC')->paginate(12);
        return view('user.blog.index',compact('items','type','about'),['title'=>$titr]);
    }
    public function loadMore(Request $request)
    {
        $villasAsItems = Villa::where('status', 'published')->orderBy('view', 'desc')->paginate(3);

        return view('villas.item',compact('villasAsItems'))->render();
    }
    public function index1()
    {
        $user = null;


        if (Auth::check()) {
            $user = Auth::user()->id;
        }

        $villa = Villa::first();
        $article = Article::where('status',1)->get();
        $slider_mobile = Slider::where('type',1)->get();
        $slider_desktop = Slider::where('type',2)->get();
        $villas = Villa::where('status', 'published');

        $minimumPrices = $villas->orderBy('price', 'asc')->pluck('price')->toArray();
        $numberOfRooms = $villas->pluck('room_num')->toArray();

        $locations = Location::all();
        $villaCategories = Category::where('type', 'villa')->limit(4)->get();

        $villas_all = Villa::where('status', 'published')->select('id', 'name', 'title', 'slug', 'latitude', 'longitude')->get();

        $villaTypes = array('مسکونی' => ['1' => 'آپارتمان', '2' => 'رزیدانس', '3' => 'ویلا',], 'تجاری' => ['1' => 'مغازه', '2' => 'دفتر اداری', '3' => 'رستوران /کافه', '4' => 'هتل آپارتمان', '5' => 'سایر']);
        $priceRanges = [
            0 => 'تا 300000 لیر',
            1 => '300000 تا 500000 لیر',
            2 => '500000 تا 1000000 لیر',
            3 => '1 تا 2 میلیون لیر',
            4 => 'بیش از 2 میلیون لیر',
        ];
        $sleeps = array('1' => '1 خوابه', '2' => '2 خوابه', '3' => '3 خوابه', '4' => '4 خوابه', '5' => '5 خوابه', '6' => '5 خوابه +');

        $projectTypes = Category::types();

        $hasSeaVilla = Villa::where([
            ['status', 'published'],
            ['has_sea', true],
        ])->first();

        $hasJungleVilla = Villa::where([
            ['status', 'published'],
            ['has_jungle', true],
        ])->first();

        $isSpecialVilla = Villa::where([
            ['status', 'published'],
            ['is_special', true],
        ])->first();

        $isPopularVilla = Villa::where([
            ['status', 'published'],
            ['is_popular', true],
        ])->first();

        $typeVillas = [
            'has_sea' => $hasSeaVilla,
            'has_jungle' => $hasJungleVilla,
            'is_special' => $isSpecialVilla,
            'is_popular' => $isPopularVilla,
        ];

        return view('index', compact('locations', 'price_min','setting', 'villaCategories', 'numberOfRooms'
            , 'minimumPrices', 'villaTypes', 'priceRanges', 'sleeps', 'projectTypes', 'typeVillas','article','slider_mobile','slider_desktop'));
    }
    public function sitemap()
    {
        $projects = Category::where('id', '!=', null)->where('status','published')->get();
        $blogs=Article::where('status',1)->get();

        return response()->view('sitemap',compact('projects','blogs'))->header('Content-Type','text/xml');
    }
    public function search_project(Request $request)
    {
        return view('project.show');
        $villas = Villa::where('status', 'published');
        $locations = [];
        $types = [];
        $numberOfRooms = [];

        if ($request->get('locations') && sizeof($request->get('locations')) > 0) {
            foreach ($request->get('locations') as $location) {
                $locationItem = Location::where('name', $location)->first();
                if ($locationItem && !in_array($locationItem->id, $locations)) {
                    array_push($locations, $locationItem->id);
                }
            }

            $villas = $villas->whereIn('location_id', $locations);
        }

        if ($request->get('types') && sizeof($request->get('types')) > 0) {
            foreach ($request->get('types') as $type) {
                $item = Category::where([
                    ['name', $type],
                    ['type', 'villa']
                ])->first();
                if ($item && !in_array($item->id, $types)) {
                    array_push($types, $item->id);
                }
            }

            $villas = $villas->whereIn('category_id', $types);
        }

        if ($request->get('number_of_rooms') && sizeof($request->get('number_of_rooms')) > 0) {
            foreach ($request->get('number_of_rooms') as $numberOfRoom) {
                if (!in_array($numberOfRoom, $numberOfRooms)) {
                    array_push($numberOfRooms, $numberOfRoom);
                }
            }

            $villas = $villas->whereIn('room_num', $numberOfRooms);
        }

        if ($request->get('price_min')) {
            $villas = $villas->where('price', '>=', $request->get('price_min'));
        }

        $villas = $villas->orderBy('price', 'desc')->get();
        dd($villas);
    }

    public function share(Request $request)
    {
        try {
            if ($request->s) {
                $msg = "http://villexer.com/";
                mail($request->s, "ویلکسر", $msg);
            }
            return redirect()->back()->with('flash_message', 'با موفقیت ارسال شد');
        } catch (\Exception $e) {
            return redirect()->back()->with('err_message', 'ارسال نشد، لطفا مجددا تلاش نمایید');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactus()
    {
        $slider = Slider::orderby('id', 'desc')->first();
        $setting = Setting::find(1);
        return view('contact', compact('slider', 'setting'));
    }
    public function contact()
    {
        $slider = Slider::orderby('id', 'desc')->first();
        $setting = Setting::find(1);
        return view('contact.index', compact('slider', 'setting'));
    }
    public function visitWinner()
    {
        return redirect()->back()->with('flash_message', 'اطلاعات شما ثبت شد - به زودی با شما تماس خواهیم گرفت');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function role()
    {
        $setting = Setting::find(1);
        return view('role', compact('setting'));
    }

    public function bime()
    {
        $setting = Setting::find(1);
        $insurances = Insurance::all();
        return view('bime', compact('insurances', 'setting'));
    }

    public function bime_show($slug)
    {
        $setting = Setting::find(1);
        $item = Insurance::where('slug', $slug)->first();
        return view('bime_show', compact('item', 'setting'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutus()
    {
        return view('page.show');
//        $setting = Setting::find(1);
//        $setting = Setting::find(1);
//        $about = About::latest()->first();
//        $slider = Slider::where('page', 3)->orderby('id', 'desc')->first();
//
//        return view('about', compact('about', 'slider', 'setting'));
    }
    public function about()
    {
        return view('about.index');
    }
    public function company_registration()
    {
        return view('page.company');
    }
    public function faq()
    {
        $items=\App\Faq::all();
        return view('page.faq',compact('items'));
    }
    public function map()
    {
        return view('map.index');
    }
}
