<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VillaIcal extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'villaical';
    protected $fillable = ['villa_id','ical_url','is_url'];
    public function villa()
    {
        return $this->belongsTo('App\Villa', 'villa_id');
    }

}
