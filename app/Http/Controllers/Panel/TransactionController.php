<?php

namespace App\Http\Controllers\Panel;

use App\Http\Requests\AboutRequest;
use App\About;
use App\Http\Controllers\Controller;
use App\Notification;
use App\Transaction;

class TransactionController extends Controller
{

    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'ریز تراکنش ها';
        } elseif('single') {
            return 'تراکنش';
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
        $items = Transaction::where('user_id',auth()->id())->latest()->get();
        return view('panel.transaction.index', compact('items'), ['title' => $this->controller_title('sum')]);
    }

}
