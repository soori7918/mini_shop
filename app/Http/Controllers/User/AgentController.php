<?php

namespace App\Http\Controllers\User;

use App\Category;
use App\Project;
use App\Menu;
use App\Agent;
use Carbon\Carbon;
use function Couchbase\defaultDecoder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class AgentController extends Controller
{
    public function index($id=null)
    {
        $items=Category::where('type', 'villa')->where('status', 'published')->orderBy('id','DESC')->paginate(12);
        return view('user.project.index',compact('items'),['title'=>'پروژه ها']);
    }
    public function show($slug)
    {
        $agent = Agent::where('slug',$slug)->first();

        $title="نماینده (".$agent->name.")";
        return view('user.agent.show',compact('agent'),['title'=>$title]);
    }

}
