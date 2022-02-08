<?php

namespace App\Helpers;

class CommonHelper
{
    public static function getPostTime($dateTime, $format = "")
    {
        $returnTime = "";
        if (!empty($dateTime)) {
            $current = date('Y-m-d H:i:s');

            if (!empty($format)) {
                $returnTime = date($format, strtotime($dateTime));
            } else {
                $returnTime = date('D m, Y', strtotime($dateTime));
            }
        }

        return $returnTime;
    }

    public static function getWebUrl($url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL)) { 
            return $url;
        } else {
            return asset($url);
        }
    }

}
