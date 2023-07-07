<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Agent extends Model
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

    public function photos()
    {
        return $this->morphMany('App\Photo', 'pictures')->where('type','agent')->orderBy('sort', 'asc');
    }


    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($post) {
            $post->photos()->get()->each(function ($photo) {
                File::delete($photo);
                $photo->delete();
            });

        });
    }

}
