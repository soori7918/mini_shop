<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['description'];
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
    public static function pages($type)
    {
        switch ($type){
            case 'home':
                return 'صفحه اصلی بالا';
                break;
            case 'home1':
                return 'صفحه اصلی پایین';
                break;
            case 'footer':
                return 'فوتر';
                break;
            case 'about':
                return 'درباره ما';
                break;
            case 'service':
                return 'خدمات';
                break;
            case 'consulting':
                return 'مشاوره';
                break;
            case 'video':
                return 'ویدئو';
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
