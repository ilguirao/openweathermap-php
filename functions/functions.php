<?php

function GetRemoteData($url){
    $cr = curl_init();
    curl_setopt($cr, CURLOPT_HEADER, 0);
    curl_setopt($cr, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($cr, CURLOPT_URL, $url);
    curl_setopt($cr, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($cr, CURLOPT_VERBOSE, 0);
    curl_setopt($cr, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($cr);
    curl_close($cr);

    return json_decode($response);
}


?>