<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Insurance extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = false;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function photo()
    {
        return $this->morphOne('App\Photo', 'pictures');
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
