<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['sort_id', 'parent_id', 'name', 'slug', 'type'];

    public function parent()
    {
        return $this->hasOne('App\Category', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Category', 'parent_id')->with('children');
    }


    public function articles()
    {
        return $this->hasMany('App\Article', 'category_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    




}
