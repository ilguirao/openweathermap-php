<?php

    require_once('functions/functions.php');

    //register in openweathermap.org for get Api Key and copy value in $ApiKey
    $ApiKey = "type your key here";

    $city = $_POST['city'];

    if ($city)
    {
        // Get Lat + Long for next API
        $url = "http://api.openweathermap.org/geo/1.0/direct?q=". $city ."&limit=1&appid=". $ApiKey;
        // Curl connection
        $data = GetRemoteData($url);

        if($data){
            // Get Weather
            $url = "https://api.openweathermap.org/data/2.5/weather?lat=" . $data[0]->lat . "&lon=". $data[0]->lon ."&units=metric&appid=" . $ApiKey;
            // Curl connection
            $data = GetRemoteData($url);
            // You can view all available data with -> var_dump($data);
            echo "<h1>Data for: " . $data->name . " <img src='http://openweathermap.org/img/w/" . $data->weather[0]->icon .".png' /> </h1> ";
            echo "Weather: ". $data->weather[0]->main . "<br>";
            echo "Temp.: ". $data->main->temp . "<br>";
            echo "Temp. min. today: ". $data->main->temp_min . "<br>";
            echo "Temp. max. today: ". $data->main->temp_max . "<br>";           

        }else{
            // Not found city -> Redirect to answer city
            header('Location: form.html');
        }

    }else{
        // No data in Post-> Redirect to answer city
        header('Location: form.html');
    }

?>