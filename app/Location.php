<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Location extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function villas()
    {
        return $this->hasMany('App\Villa', 'location_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commendable');
    }

    public function gallery()
    {
        return $this->hasOne('App\LocationGallery', 'location_id');
    }

    public function photo()
    {
        return $this->morphOne('App\Photo', 'pictures');
    }

    public function photos()
    {
        return $this->morphMany('App\Photo', 'pictures')->orderBy('sort', 'asc');
    }
    public function dist($id)
    {
        $arr = [];
        $loc=Location::find($id);
        $dist = unserialize($loc->districts);
        foreach ($dist as $item) {
            if ($item != '') {
                array_push($arr,$loc->id.'_'.str_replace(' ','',$item));
            }
        }
        return $arr;
    }
    public function in_arr($id,$user_loc)
    {
        foreach ($user_loc as $item) {
          if($id==$item)
          {
              return true;
          }
        }
        return false;
    }

    public function checked_city($id,$city_id)
    {
       $res='d-none';
       if($id=='all')
       {
           $res='';
       }
       elseif($id==$city_id)
       {
           $res='';
       }
        return $res;
    }
    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($location) {
            $location->photo()->get()->each(function ($photo) {
                File::delete($photo->path);
                $photo->delete();
            });
            $location->comments()->get()->each(function ($comment) {
                $comment->delete();
            });
            $location->villas()->get()->each(function ($villa) {
                $villa->delete();
            });
        });
    }

    public function getSummaryAttribute()
    {
        $text = $this->body;
        $text = strip_tags($text);
        $text = trim(preg_replace('/\s\s+/', ' ', $text));
        $text = ltrim(rtrim($text));

        $string = (strlen($text) > 1000) ? substr($text, 0, 1000) . '...' : $text;
        return $string;
    }

}
