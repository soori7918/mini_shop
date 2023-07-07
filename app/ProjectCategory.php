<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class ProjectCategory extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

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

    public function metas()
    {
        return $this->morphOne(Meta::class, 'metaable');
    }

}
