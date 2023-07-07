<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static function status($type)
    {
        switch ($type){
            case 'pending':
                return '<span class="badge bg-danger">غیر فعال</span>';
                break;
            case 'active':
                return '<span class="badge bg-success">فعال</span>';
                break;
            default:
                return '';
                break;
        }
    }
    public static function array_select($type)
    {
        $item=explode(',',$type);
        return $item;
    }
}
