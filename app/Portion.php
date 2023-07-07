<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portion extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id'];
    public $timestamps = false;

}
