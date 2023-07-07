<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Order extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($post) {
            $post->photo()->get()->each(function ($photo) {
                File::delete($photo->path);
                $photo->delete();
            });
            $post->comments()->get()->each(function ($comment) {
                $comment->delete();
            });
        });
    }

}
