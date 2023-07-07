<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Project extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function category()
    {
        return $this->belongsTo('App\ProjectCategory', 'category_id');
    }

    public function state()
    {
        return $this->belongsTo('App\City', 'state_id');
    }
    public function city()
    {
        return $this->belongsTo('App\City', 'city_id');
    }
    public function zone()
    {
        return $this->belongsTo('App\City', 'zone_id');
    }

    public function location()
    {
        return $this->belongsTo('App\Location', 'location_id');
    }

    public function metrages()
    {
        return $this->hasMany('App\Metrage','project_id');
    }

    public function photo()
    {
        return $this->morphOne('App\Photo', 'pictures');
    }

    public function photos()
    {
        return $this->morphMany('App\Photo', 'pictures')->where('type','gallery')->orderBy('sort', 'asc');
    }

    public function in_gallery()
    {
        return $this->morphMany('App\Photo', 'pictures')->where('type','in_gallery')->orderBy('sort', 'asc');
    }



    public function plan_gallery()
    {
        return $this->morphMany('App\Photo', 'pictures')->where('type','plan')->orderBy('sort', 'asc');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commendable');
    }

//    public function likes()
//    {
//        return $this->morphMany('App\Like', 'likable');
//    }

    public function like()
    {
        return $this->hasOne('App\Like', 'likable_id')->where('likable_type', 'villa');
//        return $this->hasOne('App\Like', 'likable_id')->where('likable_type', 'villa')->where('user_id', auth()->user()->id);
    }

    public function gallery()
    {
        return $this->hasOne('App\Gallery', 'villa_id');
    }



    public function seen()
    {
        return $this->hasMany('App\VillaSeen', 'villa_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function user_active()
    {
        return $this->belongsTo(User::class,'user_active_id');
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class,'agent_id');
    }




    public function project_category()
    {
        return $this->belongsToMany(
            ProjectCategory::class,
            'project_category',
            'project_id',
            'category_id'
        );
    }

    public function project_city()
    {
        return $this->belongsToMany(
            City::class,
            'project_city',
            'project_id',
            'city_id'
        );
    }


    public function project_country()
    {
        return $this->belongsToMany(
            Country::class,
            'project_country',
            'project_id',
            'country_id'
        );
    }

    public function project_location()
    {
        return $this->belongsToMany(
            Location::class,
            'project_location',
            'project_id',
            'location_id'
        );
    }

    public function project_plan()
    {
        return $this->belongsToMany(
            Photo::class,
            'project_plan',
            'project_id',
            'plan_id'
        );
    }

    public function project_property()
    {
        return $this->belongsToMany(
            Property::class,
            'project_property',
            'project_id',
            'property_id'
        );
    }


    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($villa) {
            $villa->photo()->get()->each(function ($photo) {
                File::delete($photo->path);
                $photo->delete();
            });
            $villa->comments()->get()->each(function ($comment) {
                $comment->delete();
            });
            $villa->likes()->get()->each(function ($like) {
                $like->delete();
            });
            $villa->gallery()->get()->each(function ($gallery) {
                $gallery->delete();
            });
            $villa->seen()->get()->each(function ($seen) {
                $seen->delete();
            });
        });
    }

    public function getProjectCountry(){
        if($this->project_country){
            foreach($this->project_country->take(1) as $country){
                return $country->fa_name;
            }
        }else{
            return '---';
        }
    }
    public function getProjectCity(){
        if($this->project_city){
            foreach($this->project_city->take(1) as $city){
                return $city->name;
            }
        }else{
            return '---';
        }
    }

    public function getProjectLocation(){
        if($this->project_location){
            foreach($this->project_location->take(1) as $city){
                return $city->name;
            }
        }else{
            return '---';
        }
    }

}
