<?php

namespace App\Http\Controllers\User;

use App\Category;
use App\Project;
use App\Menu;
use Carbon\Carbon;
use function Couchbase\defaultDecoder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index($id=null)
    {
        $items=Category::where('type', 'villa')->where('status', 'published')->orderBy('id','DESC')->paginate(12);
        return view('user.project.index',compact('items'),['title'=>'پروژه ها']);
    }
    public function show($id)
    {
        $project = Project::with('photos','plan_gallery','metrages')->where('slug',$id)->first();

        $title="پروژه (".$project->name.")";
        return view('user.project.show',compact('project'),['title'=>$title]);
    }

}
