<?php

namespace App\Http\Controllers\User;

use App\Faq;
use Carbon\Carbon;
use function Couchbase\defaultDecoder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function show()
    {
        $faqs=Faq::orderBy('id','desc')->get();
        return view('user.faq.show',compact('faqs'),['title'=>'سوالات متداول']);
    }
}
