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
        'x-rapidapi-host' => env('HOTELS_RAPIDAPI_HOST'),
        'x-rapidapi-key' => env('HOTELS_RAPIDAPI_KEY'),
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
        'appid' => env('WEATHER_APPID'),
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
        'x-rapidapi-host' => env('COVID_STATS_RAPIDAPI_HOST'),
        'x-rapidapi-key' => env('COVID_STATS_RAPIDAPI_KEY'),
    ],

];