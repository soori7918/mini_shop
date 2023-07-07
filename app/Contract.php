<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Contract as newContract;

class Contract extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id'];


    public static function number()
    {
        $number=mt_rand(111111,999999);
        $item=newContract::where('number',$number)->first();
        if ($item){
            self::number();
        }
        return $number;

    }
    public function villa()
    {
        return $this->belongsTo('App\Villa');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function expert()
    {
        return $this->belongsTo('App\User','expert_id');
    }
    public function expert2()
    {
        return $this->belongsTo('App\User','expert2_id');
    }
    public function portion()
    {
        return $this->hasOne('App\Portion','contract_id','id');
    }
}