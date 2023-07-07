<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;

class Property extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use SoftDeletes;
    protected $guarded = ['id'];
    public $timestamps = false;

    public function photo()
    {
        return $this->morphOne('App\Photo', 'pictures');
    }
}
