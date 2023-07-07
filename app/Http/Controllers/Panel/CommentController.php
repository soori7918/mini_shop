<?php

namespace App\Http\Controllers\Panel;

use App\Category;
use App\Comment;
use App\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CommentController extends Controller
{

    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'کامنت‌ها';
        } elseif ('single') {
            return 'کامنت';
        }
    }

    public function controller_paginate()
    {
        $settings = Setting::select('paginate')->latest()->firstOrFail();
        return $settings->paginate;
    }

    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::paginate(12);

        return view('panel.comments.index', compact('comments'), ['title' => $this->controller_title('sum')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::findOrFail($id);
        return view('panel.comments.show', compact('comment'), ['title' => $this->controller_title('single')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        return view('panel.comments.edit', compact('comment'), ['title' => $this->controller_title('single')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        try {
            $comment->body = $request->body;
            $comment->save();

            return redirect()->route('comment-list')->with('flash_message', 'کامنت با موفقیت ویرایش شد.');

        } catch (\Exception $e) {

            return redirect()->back()->withInput();

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        try {

            $comment->delete();
            return redirect()->route('comment-list')->with('flash_message', 'کامنت با موفقیت حذف شد.');

        } catch (\Exception $e) {

            return redirect()->back();

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        try {

            $comment->status = $request->status;

            $comment->save();

            if ($request->status == 'pending') {
                $status = 'در انتظار تایید';
            } elseif ($request->status == 'published') {
                $status = 'منتشر';
            }

            return redirect()->route('comment-list')->with('message', 'کامنت با موفقیت ' . $status . ' شد.');

        } catch (\Exception $e) {

            return redirect()->back()->withInput();

        }

    }

    public function status2($id)
    {
        $comment = Comment::findOrFail($id);

        try {

            if ($comment->main == 0){
                $comment->main = 1;
            }else{
                $comment->main = 0;
            }

            $comment->save();

            return redirect()->route('comment-list')->with('flash_message', 'با موفقیت انجام شد');

        } catch (\Exception $e) {

            return redirect()->back()->withInput();

        }
    }
}
