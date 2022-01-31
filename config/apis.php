<?php

return [

    /*
    |--------------------------------------------------------------------------
    | HotelsAPI
    |--------------------------------------------------------------------------
    |
    | Configuration for hotels API.
    |
    */

    'hotels' => [
        'url' => 'https://hotels4.p.rapidapi.com/locations/v2/search',
        'x-rapidapi-host' => 'hotels4.p.rapidapi.com',
        'x-rapidapi-key' => 'igUJCLIEnDmshJiOQEtDi2i4u8nnp1Y5R2jjsnstCAemJWv2j9',
    ],

    /*
    |--------------------------------------------------------------------------
    | WeatherAPI
    |--------------------------------------------------------------------------
    |
    | Configuration for weather API.
    |
    */

    'weather' => [
        'url' => 'api.openweathermap.org/data/2.5/weather',
        'appid' => '09995706147d8c42f61618dca7083751',
    ],

    /*
    |--------------------------------------------------------------------------
    | CovidStatsAPI
    |--------------------------------------------------------------------------
    |
    | Configuration for covid stats API.
    |
    */

    'covid_stats' => [
        'url' => 'https://covid-19-data.p.rapidapi.com/country',
        'x-rapidapi-host' => 'covid-19-data.p.rapidapi.com',
        'x-rapidapi-key' => 'igUJCLIEnDmshJiOQEtDi2i4u8nnp1Y5R2jjsnstCAemJWv2j9',
    ],

];