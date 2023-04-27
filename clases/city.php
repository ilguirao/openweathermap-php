<?php

Class City {

    private float $latitude;
    private float  $longitude;
    private string $name;
    private string $icon;
    private string $weather;
    private float $temperature;
    private float $temperatureMin;
    private float $temperatureMax;

    function __construct($latitude, $longitude){
        $this->setLatitude($latitude);
        $this->setLongitude($longitude);
    }

    function setLatitude($latitude){
        $this->latitude = $latitude;
    }
    function getLatitude(){
        return $this->latitude;
    }

    function setLongitude($longitude){
        $this->longitude = $longitude;
    }
    function getLongitude(){
        return $this->longitude;
    }

    function setName($name){
        $this->name = $name;
    }
    function getName(){
        return $this->name;
    }

    function setIcon($icon){
        $this->icon = $icon;
    }
    function getIcon(){
        return $this->icon;
    }

    function setWeather($weather){
        $this->weather = $weather;
    }
    function getWeather(){
        return $this->weather;
    }

    function setTemperature($temperature){
        $this->temperature = $temperature;
    }
    function getTemperature(){
        return $this->temperature;
    }

    function setTemperatureMin($temperatureMin){
        $this->temperatureMin = $temperatureMin;
    }
    function getTemperatureMin(){
        return $this->temperatureMin;
    }

    function setTemperatureMax($temperatureMax){
        $this->temperatureMax = $temperatureMax;
    }
    function getTemperatureMax(){
        return $this->temperatureMax;
    }

}