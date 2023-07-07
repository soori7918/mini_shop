<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    protected $fillable = ['id','title','text'];
    public function user()
    {
        return $this->hasOne('App\User','id', 'user_id');
    }
    public function form()
    {
        return $this->hasOne('App\User','id', 'for_id');
    }

    public static function getStatus($status)
    {
        switch ($status){
            case 0:
                return [
                    "message"=>"درانتضار بررسی",
                    "badge"=>"warning",
                ];
                break;
            case 1:
                return [
                    "message"=>"در دست اقدام",
                    "badge"=>"primary",
                ];
                break;
            default:
                return [
                    "message"=>"نامشخص",
                    "badge"=>"dark",
                ];
                break;
        }
    }
}
