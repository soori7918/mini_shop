<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    /**
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function pictures()
    {
        return $this->morphTo();
    }

}
