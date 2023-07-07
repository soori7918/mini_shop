<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use function GuzzleHttp\Psr7\uri_for;

class Translate extends Model
{

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    public $timestamps = true;

    public static function start($reqArray = [], $modelName = null, $modelId = null)
    {
        $translates = [];
        $translate_fields = [];
        foreach ($reqArray as $key => $val) {
            if (strpos($key, 'translate_') !== false) {
                $translates[$key] = $val;
            }
        }

        foreach ($translates as $key => $val) {
            $arr = explode('_', $key);
            $translateLang = null;
            $translateVal = null;
            for ($i = 0; $i < sizeof($arr); $i++) {
                $translateLang = $arr[1];
                if ($i >= 2) {
                    if ($i > 2) {
                        $translateVal .= '_' . $arr[$i];
                    } else {
                        $translateVal .= $arr[$i];
                    }
                }
            }

            $translate_fields[$translateVal][$translateLang] = $val;
        }

        foreach ($translate_fields as $key => $field) {
            dump($key);
            foreach ($field as $keyLang => $value) {
                $item = Translate::where([
                    ['model_type', $modelName],
                    ['model_id', $modelId],
                    ['name', $key],
                    ["lang", $keyLang],
                ])->first();

                if (!$item) {
                    $item = new Translate();
                }

                $item->model_type = $modelName;
                $item->model_id = $modelId;
                $item->name = $key;
                $item->lang = $keyLang;

                if (is_array($value)) {
                    $value = json_encode($value);
                }

                $item->value = $value;
                $item->save();
            }
        }
    }

}
