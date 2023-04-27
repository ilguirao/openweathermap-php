<?php

Class Curl{

    private $data;

    function setData($data)
    {
        $this->data = (array) $data;
    }
    function getData()
    {
        return  $this->data;
    }
    
    function executeUrl($url)
    {
        $cr = curl_init();
        curl_setopt($cr, CURLOPT_HEADER, 0);
        curl_setopt($cr, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($cr, CURLOPT_URL, $url);
        curl_setopt($cr, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($cr, CURLOPT_VERBOSE, 0);
        curl_setopt($cr, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($cr);
        curl_close($cr);

        $this->setData(json_decode($response));
    }

}