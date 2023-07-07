<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Article extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

//    public function photo()
//    {
//        return $this->morphOne('App\Photo', 'pictures');
//    }
//
//    public function comments()
//    {
//        return $this->morphMany('App\Comment', 'commendable');
//    }

//    protected static function boot()
//    {
//        parent::boot();
//        static::deleting(function ($post) {
//            $post->photo()->get()->each(function ($photo) {
//                File::delete($photo);
//                $photo->delete();
//            });
//            $post->comments()->get()->each(function ($comment) {
//                $comment->delete();
//            });
//        });
//    }

}
