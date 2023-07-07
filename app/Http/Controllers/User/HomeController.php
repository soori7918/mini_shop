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
use App\Agent;
use App\Project;
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
    public function index()
    {
        $user = null;
        if (Auth::check()) {
            $user = Auth::user()->id;
        }
        $sliders = Slider::where('type',2)->orderBy('id','DESC')->get();
        $articles = Article::where('status',1)->take(8)->get();
        $agents = Agent::orderBy('created_at','desc')->take(3)->get();
        $slider_desktop = Slider::where('type',2)->get();
        $cities = City::with('photos')->where('pupular',true)->get();
        $project_categories = ProjectCategory::where('parent_id',0)->get();
        $locations = Location::all();
        $selectedLocations = City::where('status_home','active')->get();
        $menus = Menu::with('children')->where('parent_id',null)->orderBy('created_at','asc')->get();
        $projects = Project::with(['state','city','location','like','seen'])->orderBy('created_at','desc');
        if(request('area_from')){
            $projects = $projects->where('area','<=',request('area_from'));
        }
        if(request('room')){
            $projects = $projects->where('bedroom','<=',request('room'));
        }
        if(request('bathroom')){
            $projects = $projects->where('bathroom','<=',request('bathroom'));
        }
        if(request('search')){
            $projects = $projects->where('start_price','<=',request('search'));
        }
        $projects = $projects->paginate();
        $projects->appends(request()->query());
        return view('user.index', compact('articles','projects','project_categories','menus','sliders','locations','cities','selectedLocations'
            , 'slider_desktop','agents'));
    }

    public function projects()
    {
        $projects = Project::whereHas('project_category')->orderBy('created_at','desc')->paginate(15);
        return view('user.project.index', compact('projects'));
    }

    public function office()
    {
        $projects = Project::with(['project_category'=>function($q){
            $q->where('name','office');
        }])->paginate();
        return view('user.project.index', compact('projects'));
    }
    public function consept()
    {
        $projects = Project::with(['project_category'=>function($q){
            $q->where('name','consept');
        }])->paginate();
        return view('user.project.index', compact('projects'));
    }

    public function villa()
    {
        $projects = Project::with(['project_category'=>function($q){
            $q->where('name','villa');
        }])->paginate();
        return view('user.project.index', compact('projects'));
    }

    public function installments()
    {
        $projects = Project::with(['project_category'=>function($q){
            $q->where('name','installments');
        }])->paginate();
        return view('user.project.index', compact('projects'));
    }

    public function sitemap()
    {
        $projects = Category::where('id', '!=', null)->where('status','published')->get();
        $blogs=Article::where('status',1)->get();

        return response()->view('sitemap',compact('projects','blogs'))->header('Content-Type','text/xml');
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


    public function about_us()
    {
        return view('user.about.show');
    }

    public function conseling()
    {
        $projects = Project::with(['project_category'=>function($q){
            $q->where('name','shahrvandi');
        }])->orderBy('created_at','desc')->take(10)->get();

        $setting=Setting::latest()->first();

        return view('user.conseling.index',compact('projects','setting'));
    }

    public function citizenship()
    {
        return view('user.citizenship.index');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */



    public function contact_us()
    {
        $setting=Setting::latest()->first();
        return view('user.contact.show',compact('setting'));
    }

    public function faq()
    {
        $items=\App\Faq::all();
        return view('page.faq',compact('items'));
    }

}
