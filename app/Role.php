<?php

namespace App;

class Role extends \Spatie\Permission\Models\Role
{
    protected $hidden = ['pivot'];
}
