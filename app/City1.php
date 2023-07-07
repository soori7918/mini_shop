<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City1 extends Model
{
    use SoftDeletes;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public $timestamps = false;
    protected $table="cities1";

    public function photos()
    {
        return $this->morphMany('App\Photo', 'pictures')->orderBy('sort', 'asc');
    }
}
