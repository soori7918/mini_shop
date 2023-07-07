<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

    /**
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function likable()
    {
        return $this->morphTo();
    }
    public function project()
    {
        return $this->hasOne('App\Category', 'id','likable_id');
    }
    public function villa()
    {
        return $this->hasOne('App\Villa', 'id','likable_id');
    }
}
