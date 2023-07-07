<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Country extends Model
{
    protected $table='country';
    public $timestamps=false;

    protected $guarded = ['id', 'created_at', 'updated_at'];


}
