<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
