<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class QuestionnaireReadyExperts extends Authenticatable
{

    protected $fillable = ['id'];

    public function questionnaire()
    {
        return $this->hasOne('App\Questionnaire', 'user_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
