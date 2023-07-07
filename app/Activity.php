<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Activity as Act;

class Activity extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','created_at','updated_at'];

    public static function publish($action,$model)
    {
        $user=auth()->user();
        $username=$user->first_name.' '.$user->last_name;
        $item=new Act();
        $item->user_id=$user->id;
        $item->model=get_class($model);
        $item->model_id=$model->id;
        $item->action=$action;
        $item->description="";
        return $item;
    }

    public function model()
    {
        $this->morphTo();
    }

}
