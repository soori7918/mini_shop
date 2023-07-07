<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Gallery extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function villa()
    {
        return $this->belongsTo('App\Villa', 'villa_id');
    }

    public function photo()
    {
        return $this->morphMany('App\Photo', 'pictures');
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($post) {
            $post->photo()->get()->each(function ($photo) {
                File::delete($photo->path);
                $photo->delete();
            });
        });
    }

}
