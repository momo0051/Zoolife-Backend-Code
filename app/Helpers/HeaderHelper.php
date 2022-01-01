<?php

namespace App\Helpers;

use App\Models\Contact;
use DB;
use Cookie;

class HeaderHelper
{
    public static function getHeaderContactNo()
    {
        $headerContent  = Contact::pluck('contact_no')->first();
        return $headerContent;
    }

    public static function getHeaderEmail()
    {
        $headerContent  = Contact::pluck('email')->first();
        return $headerContent;
    }

    public static function getHeaderAddressOne()
    {
        $headerContent  = Contact::pluck('address_one')->first();
        return $headerContent;
    }

    public static function getHeaderWebAddress()
    {
        $headerContent  = Contact::pluck('web_address')->first();
        return $headerContent;
    }
}
