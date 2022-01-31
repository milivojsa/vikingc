<?php

namespace Tests\Unit;

use App\Services\CovidStatsAPI;
use App\Services\WeatherAPI;
use PHPUnit\Framework\TestCase;

class WeatherAPITest extends TestCase
{
    private array $responseArray = [
        "coord" => [
            "lon" => 40.0000,
            "lat" => 40.0000,
        ],
        "weather" => [
            0 => [
                "id" => 800,
                "main" => "Clear",
                "description" => "clear sky",
                "icon" => "01n",
            ],
        ],
        "base" => "stations",
        "main" => [
            "temp" => -0.13,
            "feels_like" => -3.6,
            "temp_min" => -0.19,
            "temp_max" => 2.27,
            "pressure" => 1022,
            "humidity" => 71,
            "sea_level" => 1022,
            "grnd_level" => 1010,
        ],
        "visibility" => 10000,
        "wind" => [
            "speed" => 2.94,
            "deg" => 247,
            "gust" => 3.41,
        ],
        "clouds" => [
            "all" => 5,
        ],
        "dt" => 1656156156,
        "sys" => [
            "type" => 2,
            "id" => 561156,
            "country" => "TC",
            "sunrise" => 1643522693,
            "sunset" => 1643557664,
        ],
        "timezone" => 3600,
        "id" => 1661615,
        "name" => "Test city",
        "cod" => 200,
    ];

    /**
     * @test
     * @covers \App\Services\WeatherAPI::handleResponseData
     */
    public function data_is_handled_properly()
    {
        $weatherAPI = new WeatherAPI();

        $result = $weatherAPI->handleResponseData($this->responseArray);

        $this->assertNotEquals([], $result);
        $this->assertEquals([
            'temperature' => -0.13,
            'temperature_min' => -0.19,
            'temperature_max' => 2.27,
            'temperature_feels_like' => -3.6,
            'humidity' => 71,
        ], $result);
    }
}
