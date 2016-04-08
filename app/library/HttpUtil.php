<?php

class HttpUtil {

  /*  Set Request param
   */
  public static function setRequestData() {

  }

  public static function get_web_page($url) {
    $options = array (CURLOPT_RETURNTRANSFER => true, // return web page
      CURLOPT_HEADER => false, // don't return headers
      CURLOPT_FOLLOWLOCATION => true, // follow redirects
      CURLOPT_ENCODING => "", // handle compressed
      CURLOPT_USERAGENT => "test", // who am i
      CURLOPT_AUTOREFERER => true, // set referer on redirect
      CURLOPT_CONNECTTIMEOUT => 120, // timeout on connect
      CURLOPT_TIMEOUT => 120, // timeout on response
      CURLOPT_MAXREDIRS => 10 ); // stop after 10 redirects

    $ch = curl_init ( $url );
    curl_setopt_array ( $ch, $options );
    $content = curl_exec ( $ch );
    $err = curl_errno ( $ch );
    $errmsg = curl_error ( $ch );
    $header = curl_getinfo ( $ch );
    $httpCode = curl_getinfo ( $ch, CURLINFO_HTTP_CODE );

    curl_close ( $ch );

    $header ['errno'] = $err;
    $header ['errmsg'] = $errmsg;
    $header ['content'] = $content;
    return $header ['content'];
  }

  public function checkRequestData($requestData) {
    $paramArr = Request::all();
    foreach($requestData as $request) {

    }
  }
}

?>
