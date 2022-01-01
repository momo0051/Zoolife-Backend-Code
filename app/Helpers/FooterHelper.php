<?php

namespace App\Helpers;

use App\Models\Footer;
use DB;
use Cookie;

class FooterHelper
{
    public static function getFooterRightContent(){
     $footerContent  = Footer::pluck('left_cms_content')->first();   
     return $footerContent;  
    }

    public static function getFooterLeftContent(){
     $footerContent  = Footer::pluck('right_cms_content')->first();   
     return $footerContent;  
    }
        
}