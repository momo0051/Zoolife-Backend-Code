<?php

namespace App\Helpers;

class SmsHelper
{
  static function sendSMS($number, $message)
  {
    $url = 'https://www.enjazsms.com/api/sendsms.php?username=mohd-tech&password=550655213&message=' . urlencode($message) . '&numbers=' . $number . '&sender=ZOOLIFE&unicode=E&return=full';
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;
  }
}
