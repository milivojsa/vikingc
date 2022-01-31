<?php

namespace App\Services;

use App\DTO\WeatherAPI\CurrentWeather;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class WeatherAPI extends BaseAPIService
{
    public function sendRequest(mixed $query)
    {
        return Http::get(config('apis.weather.url'), [
            'q' => $query,
            'appid' => config('apis.weather.appid'),
            'units' => 'metric',
        ]);
    }

    public function handleResponseData(array $responseArray): array
    {
        try {
            $currentWeather = new CurrentWeather($responseArray);

            return [
                'temperature' => $currentWeather->main->temp,
                'temperature_min' => $currentWeather->main->temp_min,
                'temperature_max' => $currentWeather->main->temp_max,
                'temperature_feels_like' => $currentWeather->main->feels_like,
                'humidity' => $currentWeather->main->humidity,
            ];
        } catch (UnknownProperties $e) {
            Log::error($e->getMessage());

            return [];
        }
    }
}