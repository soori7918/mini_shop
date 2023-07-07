<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token',];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function posts()
    {
        return $this->hasMany('App\Post', 'author_id');
    }

    public function countrys()
    {
        return $this->hasOne('App\Country', 'id', 'living_country');
    }

    public function questionnaire()
    {
        return $this->hasOne('App\Questionnaire', 'user_id', 'id');
    }

    public function locations()
    {
        return $this->hasOne('App\Location', 'id', 'location');
    }

    public function likes()
    {
        return $this->hasMany('App\Like', 'user_id');
    }

    public function photo()
    {
        return $this->morphOne('App\Photo', 'pictures');
    }
    public function photos()
    {
        return $this->morphMany('App\Photo', 'pictures');
    }

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

    public static function langs($i = null)
    {
        $array = ['english' => 'english', 'arabic' => 'arabic', 'turkish' => 'turkish'];

        return is_null($i) ? $array : $array[$i];
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function getBudgetTextAttribute()
    {
        $price = $this->budget;
        if (!$price) {
            return null;
        }

        $price = $this->convert2english($price);
        $type = $this->budget_type;
        switch ($type) {
            case 'euro':
                $type = 'یورو';
                break;
            case 'rial':
                $type = 'ریال';
                break;
            case 'dollar':
                $type = '$';
                break;

            default:
                $type = 'لیر';
                break;
        }


        $result = number_format((int)$price) . $type;
        return $result;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function refer()
    {
        return $this->belongsTo(User::class,'refer_id');
    }
    public function referee()
    {
        return $this->belongsTo(User::class,'referee_id');
    }
    public function ref1()
    {
        return $this->belongsTo(User::class,'ref','code');
    }
    public static function models()
    {
        return [
            'users'=>'کاربران',
            'articles'=>'مقالات',
            'abouts'=>'درباره ما',
            'comments'=>'نظرات',
            'complains'=>'شکایات',
            'contracts'=>'قرارداد ها',
            'notifications'=>'نوتیفیکیشن ها',
            'questionnaires'=>'ارزیابی',
            'questions'=>'سوالات',
            'settings'=>'تنظیمات',
            'sliders'=>'اسلایدر',
            'transactions'=>'ریز تراکنش ها',
            'villas'=>'ملک ها',
        ];
    }

    public static function permissionNames()
    {
        return ['edit'=>'ویرایش','add'=>'افزودن','view'=>'مشاهده لیست','delete'=>'حذف'];
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($user) {
            $user->likes()->get()->each(function ($like) {
                $like->delete();
            });
            $user->posts()->get()->each(function ($post) {
                $post->delete();
            });
        });
    }

    public static function currencies()
    {
        return array(
            'lira' => 'لیر',
//            'dollar' => ' دلار',
//            'rial' => 'ریال',
//            'euro' => 'یورو'
        );
    }

    function convert2english($string)
    {
        $newNumbers = range(0, 9);
        // 1. Persian HTML decimal
        $persianDecimal = array('&#1776;', '&#1777;', '&#1778;', '&#1779;', '&#1780;', '&#1781;', '&#1782;', '&#1783;', '&#1784;', '&#1785;');
        // 2. Arabic HTML decimal
        $arabicDecimal = array('&#1632;', '&#1633;', '&#1634;', '&#1635;', '&#1636;', '&#1637;', '&#1638;', '&#1639;', '&#1640;', '&#1641;');
        // 3. Arabic Numeric
        $arabic = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
        // 4. Persian Numeric
        $persian = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');

        $string = str_replace($persianDecimal, $newNumbers, $string);
        $string = str_replace($arabicDecimal, $newNumbers, $string);
        $string = str_replace($arabic, $newNumbers, $string);
        return str_replace($persian, $newNumbers, $string);
    }
}
