<?php

namespace App\Http\Controllers\User;

use App\About;
use Carbon\Carbon;
use function Couchbase\defaultDecoder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use function Sodium\compare;

class AboutController extends Controller
{
    public function show()
    {
        $items=About::where('page','about')->where('status','active')->get();
        return view('user.about.show',compact('items'),['title'=>'درباره ما']);
    }

}
