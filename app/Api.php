<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Api
{

    public static function curl($url,$json_assoc=true)
    {

        if (extension_loaded('curl')) {

            $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            $response = curl_exec($ch);

            $curl_errno = curl_errno($ch);

            curl_close($ch);

            if ($curl_errno) {

                return false;

            }

        } else {

            $response = @file_get_contents($url);

        }

        $response = json_decode($response,$json_assoc);

        return $response;
    }


}
