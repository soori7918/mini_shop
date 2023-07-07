<?php

namespace App\Http\Controllers\Panel;

use App\Http\Requests\AboutRequest;
use App\About;
use App\Http\Controllers\Controller;
use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'پیام ها';
        } elseif('single') {
            return 'پیام';
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
    public function index(Request $request)
    {
        $manager=Notification::where('user_id',auth()->id())->where('type','manager')->count();
        $unseenmanager=Notification::where('user_id',auth()->id())->where('seen',0)->where('type','manager')->count();
        $admin=Notification::where('user_id',auth()->id())->where('type','admin')->count();
        $unseenadmin=Notification::where('user_id',auth()->id())->where('seen',0)->where('type','admin')->count();
        $refers=Notification::where('user_id',auth()->id())->where('type','refers')->count();
        $unseenrefers=Notification::where('user_id',auth()->id())->where('seen',0)->where('type','refers')->count();
        $org=Notification::where('user_id',auth()->id())->where('type','org')->count();
        $unseenorg=Notification::where('user_id',auth()->id())->where('seen',0)->where('type','org')->count();
        if ($request->type){
            $items = Notification::where('user_id',auth()->id())->where('type',$request->type)->latest()->get();
        }else{
            $items = Notification::where('user_id',auth()->id())->latest()->get();
        }
        return view('panel.notification.index', compact('items','manager','unseenmanager','admin','unseenadmin','refers','unseenrefers','org','unseenorg'), ['title' => $this->controller_title('sum')]);
    }

    public function show($id)
    {
        $item=Notification::where('user_id',auth()->id())->where('id',$id)->first();
        return view('panel.notification.show', compact('item'), ['title' => $this->controller_title('single')]);
    }
}
