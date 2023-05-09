<?php

    require_once(__DIR__ . '/clases/city.php');
    require_once(__DIR__ . '/clases/curl.php');

    //register in openweathermap.org for get Api Key and copy value in $ApiKey
    $ApiKey = "type your key here";

    if ($_POST['city'])
    {
        // Get Lat + Long for next API
        $url = "http://api.openweathermap.org/geo/1.0/direct?q=". $_POST['city'] ."&limit=1&appid=". $ApiKey;

        $curl = new Curl();
        $curl->executeUrl($url);
        $data = $curl->getData();
        if($data){
            // Get Weather
            $city = new City($data[0]->lat, $data[0]->lon);
            // rewrite curl to get data of city
            $url = "https://api.openweathermap.org/data/2.5/weather?lat=" . $city->getLatitude()  . "&lon=". $city->getLongitude() ."&units=metric&appid=" . $ApiKey;
            $curl->executeUrl($url);
            $data = $curl->getData();

            $city->setName($data['name']);
            $city->setWeather($data['weather'][0]->main);
            $city->setIcon($data['weather'][0]->icon);
            $city->setTemperature($data['main']->temp);
            $city->setTemperatureMin($data['main']->temp_min);
            $city->setTemperatureMax($data['main']->temp_max);
            
            // You can view all available data with -> var_dump($data);
            echo "<h1>Data for: " . $city->getName() . " <img src='http://openweathermap.org/img/w/" . $city->getIcon() .".png' /> </h1> ";
            echo "Weather: ". $city->getWeather() . "<br>";
            echo "Temp.: ". $city->getTemperature() . "<br>";
            echo "Temp. min. today: ". $city->getTemperatureMin() . "<br>";
            echo "Temp. max. today: ". $city->getTemperatureMax() . "<br>";           

        }else{
            // Not found city -> Redirect to answer city
            header('Location: form.html');
        }

    }else{
        // No data in Post-> Redirect to answer city
        header('Location: form.html');
    }

?>
